<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class CreditmemoController extends ControllerBase {

    public $ambiente;
    public $txt_ambiente;
    public $firmado;
    
    public function initialize() {
        $this->tag->setTitle('NotasQB');
        parent::initialize();
    }

    public function indexAction() {
        $this->session->conditions = null;
        $this->view->form = new CreditmemoForm;
    }

    public function searchAction() {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Creditmemo', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "RefNumber";

        $creditmemo = Creditmemo::find($parameters);
        if (count($creditmemo) == 0) {
            $this->flash->notice("No existes notas de credito bajo esos parametros");

            $this->dispatcher->forward([
               "controller" => "creditmemo",
               "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
           'data' => $creditmemo,
           'limit' => 10,
           'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    public function autorizarAction($TxnID) {
        $parameters = array('conditions' => '[TxnID] = :txnid:', 'bind' => array('txnid' => $TxnID));
        $credito = Creditmemo::findFirst($parameters);
        if ($credito == false) {
            $this->flash->error("Esta nota de credito no existe");
            return $this->dispatcher->forward(
                  [
                     "controller" => "creditmemo",
                     "action" => "index",
                  ]
            );
        }

        $this->_registraCredito($credito);
        
        $this->flash->success('Nota Credito del QB Seleccionada || ' . $credito->RefNumber);
        $mensaje = $this->claves->respuestaSRI($this->firmado, $this->ambiente);
        if($mensaje['mensaje'] === "AUTORIZADO"){
            $this->notaAutorizada($mensaje);
        } else {
            $this->flash->error('EN ' . $this->txt_ambiente . $mensaje['mensaje']);
        }
        return $this->dispatcher->forward(
              [
                 "controller" => "creditmemo",
                 "action" => "search",
              ]
        );
    }    

    public function impresionAction($TxnID) {
        $parameters = array('conditions' => '[TxnID] = :txnid:', 'bind' => array('txnid' => $TxnID));
        $credito = Creditmemo::findFirst($parameters);
        if ($credito == false) {
            $this->flash->error("Esta nota de credito no existe");
            return $this->dispatcher->forward(
                  [
                     "controller" => "creditmemo",
                     "action" => "index",
                  ]
            );
        }

        $this->_registraCredito($credito);
        
        $this->flash->success('Nota Credito del QB Seleccionada || ' . $credito->RefNumber);
        $this->respuestaSRI(1);
        $credito->setCustomField10('IMPRESO');
        if (!$credito->save()) {

            foreach ($credito->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
               'controller' => "creditmemo",
               'action' => 'index',
            ]);

            return;
        }
        return $this->dispatcher->forward(
              [
                 "controller" => "creditmemo",
                 "action" => "search",
              ]
        );
    }

    private function respuestaSRI() {
        $w_cabecera = $this->session->get('cabecera');
        $a = $this->session->get('archivos');
        $firmado = $a['firmado'];
        $doc = new DOMDocument();
        $doc->load($firmado);
        $claveAcceso = $doc->getElementsByTagName('claveAcceso')->item(0)->nodeValue;
        $this->session->set('claveAcceso', $claveAcceso);
        $this->topdfnota->llenaNota();
        $this->topdfnota->creaNota(1);
        if ($w_cabecera['CustomField15'] === "AUTORIZADO") {
            $estado = $this->enviarEmail();
        }
    }

    private function enviarEmail() {
        $w_cab = $this->session->get('cabecera');
        $a = $this->session->get('archivos');
        $w_con = $this->session->get('contribuyente');
        $w_aut = $this->session->get('auth');

        $part = '<div><p><strong>FACTURACION ELECTRONICA LOS COQUEIROS</strong></p><br>
           <p>Estimado(a) </p><br><p><strong>' .
           $w_cab['razonSocialComprador'] .
           '</strong></p><br><p>Heladerías Cofrunat Cia. Ltda.,  le informa que se ha generado su comprobante electrónico,</p><br><p><strong>' .
           $w_con['estab'] . '-' . $w_con['punto'] . '-' . $w_cab['numeroDocumento'] . '</strong></p><br> ' .
           '<p>que adjuntamos en formato XML de acuerdo a los requerimientos del SRI.</p><br>
         <p>Podrá revisar este y todos sus documentos electrónicos en </p><br>
         <p>https://declaraciones.sri.gob.ec/comprobantes-electronicos-internet/\r\npublico/validezComprobantes.jsf?pathMPT=Facturaci%F3n%20Electr%F3nica&actualMPT=Validez%20de%20comprobantes\r\n

</p><br><br><p>Atentamente,</p><br><br>

<p>Heladerías Cofrunat Cia. Ltda. </p>';



        $paraemail['part'] = $part;
        $paraemail['body'] = $part;
        $param = $a['firmado'];
        $param1 = $a['elpdf'];
        $paraemail['attach'] = $param;
        $paraemail['attach1'] = $param1;
        $paraemail['subject'] = 'LOS COQUEIROS - Nota Credito Autorizada';
        $paraemail['fromemail']['email'] = 'xavierbustos@loscoqueiros.com';
        $paraemail['fromemail']['nombre'] = 'Heladerias Cofrunat Cia. Ltda.';
        $paraemail['toemail']['email'] = $w_aut['email'];
        $paraemail['toemail']['nombre'] = $w_aut['name'];
        $paraemail['bccemail']['email'] = $w_cab['CustomField12'];
        $paraemail['bccemail']['nombre'] = $w_cab['razonSocialComprador'];
        $exp = $this->sendmail->enviaEmail($paraemail);
        return $exp;
    }    
    
    function notaAutorizada($param) {
        $w_cabecera = $this->session->get('cabecera');
        $TxnID = $w_cabecera["TxnID"];
        $credit = Creditmemo::findFirstByTxnID($TxnID);

        if (!$credit) {
            $this->flash->error("Nota de credito no existe " . $TxnID);

            $this->dispatcher->forward([
               'controller' => "creditmemo",
               'action' => 'index'
            ]);
            return;
        }
        $credit->customer->Email === NULL ? $email = "Sin Email" : $email = $credit->customer->Email;
        $credit->customer->Phone === NULL ? $phone = "Sin Telefono" : $phone = $credit->customer->Phone;
        $credit->customer->CompanyName === NULL ? $CompanyName = "" : $CompanyName = $credit->customer->CompanyName;
 
        $credit->setCustomField9($CompanyName);
        $credit->setCustomField11($phone);
        $credit->setCustomField12($email);
        if ($param['mensaje'] === "AUTORIZADO") {
            $nroAut = $param['numeroAutorizacion'];
            $fecAut = $param['fechaAutorizacion'];
            $credit->setCustomField14($nroAut);
            $credit->setCustomField13($fecAut);
            $this->topdfnota->llenaNota();
            $this->topdfnota->creaNota(2);
        }
        $credit->setCustomField15($param['mensaje']);
        if (!$credit->save()) {

            foreach ($credit->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
               'controller' => "creditmemo",
               'action' => 'index',
            ]);

            return;
        }
        $this->flash->success("la nota de credito ahora esta " . $param['mensaje']);
    }
    
    public function firmarAction($TxnID) {
        $parameters = array('conditions' => '[TxnID] = :txnid:', 'bind' => array('txnid' => $TxnID));
        $credito = Creditmemo::findFirst($parameters);
        if ($credito == false) {
            $this->flash->error("Esta nota de credito no existe");
            return $this->dispatcher->forward(
                  [
                     "controller" => "creditmemo",
                     "action" => "index",
                  ]
            );
        }

        $this->_registraCredito($credito);
        
        $this->flash->success('Nota Credito del QB Seleccionada || ' . $credito->RefNumber);
        $this->firmaCredito($credito);
        return $this->dispatcher->forward(
              [
                 "controller" => "creditmemo",
                 "action" => "search",
              ]
        );
    }

    private function firmaCredito($credito) {
        $this->session->set('stringDetalles', '<detalles>');

        foreach ($credito->creditmemolinedetail as $producto) {
            if ($producto->ItemRef_ListID <> " ") {
                $stringItem = $this->procesaItem($producto);
            }
        }

        $this->totalCredito($credito);
//        $this->flash->notice('Este es el ambiente ' . $this->ambiente. ' y este es el archivo ' . $this->firmado);
        $mensaje = $this->claves->sriCliente($this->firmado, $this->ambiente);
        if ($mensaje == "RECIBIDA"){
            $this->flash->success('EN ' . $this->txt_ambiente . $mensaje . ' la notaCR esta => ' . $mensaje);
            $param['mensaje'] = 'RECIBIDA';
            $this->notaAutorizada($param);
        } else {
            $this->flash->error('EN ' . $this->txt_ambiente . $mensaje);
        }
    }

    function totalCredito($credito) {

        $a = $this->session->get('archivos');
        $w_credito = $this->session->get('credito');
        $w_cabecera = $this->session->get('cabecera');
        $w_ruc = $this->session->get('contribuyente');
        $salida = $a['generado'];
        $firmado = $a['firmado'];
        $this->firmado = $firmado;
        $pasaXML = $a['creado'];
        $regresaXML = $a['pasado'];
        
        $paramClave['rucComprador'] = $credito->customer->AccountNumber;
        $paramClave['fechaDocumento'] = $w_cabecera['fechaDocumento'];
        $paramClave['numeroDocumento'] = $w_cabecera['numeroDocumento'];
        $paramClave['tipoDocumento'] = '04';
        $paramClave['numeroTransaccion'] = $w_cabecera['numeroTransaccion'];
        $paramClave['ruc'] = $w_ruc['ruc'];
        $paramClave['ambiente'] = $w_ruc['ambiente'];
        $this->ambiente = $w_ruc['ambiente'];
        if ($this->ambiente == 1) {
            $this->txt_ambiente = "Pruebas";
        } else {
            $this->txt_ambiente = "Produccion";
        }
        $paramClave['emision'] = $w_ruc['emision'];
        $paramClave['punto'] = $w_ruc['punto'];
        $paramClave['estab'] = $w_ruc['estab'];
        $creaClave = $this->claves->crea_clave($paramClave);
        $this->session->set('claves', $creaClave);
        $this->session->set('paramclave', $paramClave);

        $stringDate = strtotime($w_cabecera['fechaDocumento']);
        $dateString = date('d/m/Y', $stringDate);
        $out_SinImp = number_format($w_credito['valorSinImpuestos'], '2', '.', '');
        $out_Base = number_format($w_credito['baseImponible'], '2', '.', '');
        $out_ValorImp = number_format($w_credito['valorImpuestos'], '2', '.', '');
        $out_Total = number_format($w_credito['valorTotal'], '2', '.', '');
        $raz = explode(':', $w_cabecera['razonSocialComprador']);
        $regresaName = $this->claves->limpiaString($raz[0]);
        $regresaDireccion = $this->claves->limpiaString($w_cabecera['direccionComprador']);

        $stringTributaria = '<infoTributaria><ambiente>' . $w_ruc['ambiente'] . '</ambiente>';
        $stringTributaria .= '<tipoEmision>' . $w_ruc['emision'] . '</tipoEmision><razonSocial>' . $w_ruc['razon'] . '</razonSocial>';
        $stringTributaria .= '<nombreComercial>' . $w_ruc['NombreComercial'] . '</nombreComercial>';
        $stringTributaria .= '<ruc>' . $w_ruc['ruc'] . '</ruc><claveAcceso>' . implode($creaClave['claveAcceso']) . '</claveAcceso><codDoc>04</codDoc>';
        $stringTributaria .= '<estab>' . $w_ruc['estab'] . '</estab><ptoEmi>' . $w_ruc['punto'] . '</ptoEmi><secuencial>' . $creaClave['numeroDocumentoLleno'] . '</secuencial>';
        $stringTributaria .= '<dirMatriz>' . $w_ruc['DirMatriz'] . '</dirMatriz></infoTributaria>';
        $stringInfo = '<infoNotaCredito><fechaEmision>' . $dateString . '</fechaEmision><dirEstablecimiento>' . $regresaDireccion . '</dirEstablecimiento>';
        $stringInfo .= '<tipoIdentificacionComprador>' . $creaClave['tipoIdentificacion'] . '</tipoIdentificacionComprador>';
        $stringInfo .= '<razonSocialComprador>' . $regresaName . '</razonSocialComprador>';
        $stringInfo .= '<identificacionComprador>' . $creaClave['rucLimpio'] . '</identificacionComprador>';
        if ($w_cabecera['CustomField2'] != " ") {
        $stringInfo .= '<contribuyenteEspecial>' . $w_cabecera['CustomField2'] . '</contribuyenteEspecial>';
        }
        if ($w_cabecera['CustomField3'] != " ") {
            $stringInfo .= '<obligadoContabilidad>' . $w_cabecera['CustomField3'] . '</obligadoContabilidad>';
        }
        if ($w_cabecera['CustomField4'] != " ") {
            $stringInfo .= '<rise>' . $w_cabecera['CustomField4'] . '</rise>';
        }
        $stringDate = strtotime($w_cabecera['fechaSustento']);
        $dateString = date('d/m/Y', $stringDate);
        $wk_doc = $this->claves->generaDoc($w_cabecera['docSustento']);
        $wk_docSustentoCompuesto = $wk_doc['estab'] . '-' . $wk_doc['punto'] . '-' . $wk_doc['documento'];
        $stringInfo .= '<codDocModificado>01</codDocModificado><numDocModificado>' . $wk_docSustentoCompuesto . '</numDocModificado>';
        $stringInfo .= '<fechaEmisionDocSustento>' . $dateString . '</fechaEmisionDocSustento>'; // Obligatorio Fecha dd/mm/aaaa
        $stringInfo .= '<totalSinImpuestos>' . $out_SinImp . '</totalSinImpuestos>';
        $stringInfo .= '<valorModificacion>' . $out_Total . '</valorModificacion>><moneda>DOLAR</moneda>';
        $stringInfo .= '<totalConImpuestos><totalImpuesto><codigo>' . $this->session->get('codigoImpuesto');
        $stringInfo .= '</codigo><codigoPorcentaje>' . $this->session->get('codigoTarifaImpuesto') . '</codigoPorcentaje>';
        $stringInfo .= '<baseImponible>' . $out_Base . '</baseImponible>';
        $stringInfo .= '<valor>' . $out_ValorImp . '</valor></totalImpuesto></totalConImpuestos>';
        $stringInfo .= '<motivo>' . $w_cabecera['Memo'] . '</motivo></infoNotaCredito>';

        $stringFactura = '<notaCredito id="comprobante" version="1.1.0">' . $stringTributaria . $stringInfo . $this->session->get('stringDetalles') . '</detalles></notaCredito>';


        $stringDoc = '<?xml version="1.0" encoding="UTF-8" ?>';
        $stringDoc .= $stringFactura;
        $doc = new DOMDocument();
        $doc->loadXML($stringDoc);
        $doc->saveXML();
        file_put_contents($pasaXML, $stringDoc);
        $this->session->set('documentoXML', $pasaXML);
//        $ret = exec('c:\wamp64\www\ComprobantesSRI\ecuador\corre.bat', $out, $return);
        $docpasa = new DOMDocument();
        $docpasa->load($pasaXML);
        $docpasa->save($salida);
        $string_shell = '/bin/bash/ /home/online/public_html/ComprobantesSRI/ecuador/arranca.sh';
        $ret = shell_exec($string_shell);
        $ret = shell_exec('/home/online/public_html/public/arranca.sh');
        $docregresa = new DOMDocument();
        $docregresa->load($regresaXML);
        $docregresa->save($firmado);
    }

    function procesaItem($producto) {

        $db_valor = $producto->Amount * $this->session->get('porcentajeImpuesto') / 100;
        $w_credito = $this->session->get('credito');
        $w_string = $this->session->get('stringDetalles');
        $subtotal = $w_credito['baseImponible'];
        $subtotalImpuestos = $w_credito['valorImpuestos'];
        $subtotalSinImpuestos = $w_credito['valorSinImpuestos'];
        $valorTotal = $w_credito['valorTotal'];
        $out_valor = number_format($db_valor, '2', '.', '');
        $out_Amount = number_format($producto->Amount, '2', '.', '');
        $item = $producto->items;
        $regresaDescripcion = $this->claves->limpiaString($item->description);
        $stringItem = '<detalle><codigoInterno>' . $producto->ItemRef_ListID . '</codigoInterno>';
        $stringItem .= '<descripcion>' . $regresaDescripcion . '</descripcion><cantidad>' . $producto->Quantity . '</cantidad>';
        $stringItem .= '<precioUnitario>' . $producto->Rate . '</precioUnitario><descuento>0</descuento>';
        $stringItem .= '<precioTotalSinImpuesto>' . $out_Amount . '</precioTotalSinImpuesto>';
        $stringItem .= '<impuestos><impuesto><codigo>' . $this->session->get('codigoImpuesto') . '</codigo><codigoPorcentaje>' . $this->session->get('codigoTarifaImpuesto') . '</codigoPorcentaje>';
        $stringItem .= '<tarifa>' . $this->session->get('porcentajeImpuesto') . '</tarifa><baseImponible>' . $out_Amount . '</baseImponible><valor>' . $out_valor . '</valor></impuesto></impuestos></detalle>';

        $this->session->set('credito', array(
           'baseImponible' => $subtotal + $producto->Amount,
           'valorImpuestos' => $subtotalImpuestos + $db_valor,
           'valorSinImpuestos' => $subtotalSinImpuestos + $producto->Amount,
           'valorTotal' => $valorTotal + $producto->Amount + $db_valor
        ));
        $w_string .= $stringItem;
        $this->session->set('stringDetalles', $w_string);
        return true;
    }

    private function _registraCredito($arreglo) {

        $doc = $this->claves->generaDoc($arreglo->RefNumber);                   // convierte la notacion 1-1-1 a 001-001-000000001
        $factura = Invoice::findFirstByRefNumber($arreglo->other);              // bsca el numero de factura generada para la nota de credito en el QB
        if ($factura == false) {
            $fechSustento = date('d-m-Y');
        } else {
            $fechSustento = date('d-m-Y', strtotime($factura->TxnDate));
        }        
        $this->session->set('cabecera', array(
           'TxnID' => $arreglo->TxnID,
           'TimeCreated' => $arreglo->TimeCreated,
           'TimeModified' => $arreglo->TimeModified,
           'EditSequence' => $arreglo->EditSequence,
           'numeroTransaccion' => $arreglo->TxnNumber,
           'CustomerRef_ListID' => $arreglo->CustomerRef_ListID,
           'razonSocialComprador' => $arreglo->CustomerRef_FullName,
           'fechaDocumento' => $arreglo->TxnDate,
           'fechaPago' => $arreglo->DueDate,
           'docSustento' => $arreglo->Other,
           'Memo' => $arreglo->Memo,
           'fechaSustento' => $fechSustento,
           'numeroDocumento' => $doc['documento'],
           'direccionComprador' => $arreglo->BillAddress_Addr1,
           'BillAddress_City' => $arreglo->BillAddress_City,
           'BillAddress_State' => $arreglo->BillAddress_State,
           'BillAddress_PostalCode' => $arreglo->BillAddress_PostalCode,
           'BillAddress_Country' => $arreglo->BillAddress_Country,
           'SalesRepRef_FullName' => $arreglo->SalesRepRef_FullName,
           'CustomerMsgRef_FullName' => $arreglo->CustomerMsgRef_FullName,
           'Subtotal' => $arreglo->Subtotal,
           'SalesTaxPercentage' => $arreglo->SalesTaxPercentage,
           'SalesTaxTotal' => $arreglo->SalesTaxTotal,
           'TotalAmount' => $arreglo->TotalAmount,
           'CustomField1' => $arreglo->CustomField1,
           'CustomField2' => $arreglo->CustomField2,
           'CustomField3' => $arreglo->CustomField3,
           'CustomField4' => $arreglo->CustomField4,
           'CustomField9' => $arreglo->CustomField9,
           'CustomField11' => $arreglo->CustomField11,
           'CustomField12' => $arreglo->CustomField12,
           'CustomField13' => $arreglo->CustomField13,
           'CustomField14' => $arreglo->CustomField14,
           'CustomField15' => $arreglo->CustomField15
        ));
        $this->session->set('credito', array(
           'baseImponible' => 0,
           'valorImpuestos' => 0,
           'valorSinImpuestos' => 0,
           'valorDescuentos' => 0,
           'valorTotal' => 0
        ));
        $this->session->set('codigoImpuesto', '2');
        $this->session->set('porcentajeImpuesto', '12');
        $this->session->set('codigoTarifaImpuesto', '2');
        $parameters = array('conditions' => '[CodEmisor] = :estab: AND [Punto] = :punto:', 'bind' => array('estab' => $doc['estab'], 'punto' => $doc['punto']));
        $contribuyente = Contribuyente::findFirst($parameters);
        if ($contribuyente == false) {
            $this->flash->error("Este contribuyente no existe");
            return $this->dispatcher->forward(
                  [
                     "controller" => "creditmemo",
                     "action" => "search",
                  ]
            );
        }
        $rucPasa = $this->claves->registraContribuyente($contribuyente);
        $this->session->set('contribuyente', $rucPasa);
        $archivos = $this->claves->registraArchivos($rucPasa['estab'], $rucPasa['punto'], $doc['documento'],'nota', 'notas');
        $this->session->set('archivos', $archivos);
        $c = $this->session->get('contribuyente');
        $a = $this->session->get('archivos');
        $this->ambiente = $c['ambiente'];
        $this->firmado = $a['firmado'];
    }

}
