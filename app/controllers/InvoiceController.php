<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class InvoiceController extends ControllerBase {

    protected $ambiente;
    protected $txt_ambiente;
    protected $firmado;

    public function initialize() {
        $this->tag->setTitle('FacturasQB');
        parent::initialize();
    }

    public function indexAction() {
        $this->session->conditions = null;
        $this->view->form = new InvoiceForm;
    }

    public function searchAction() {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Invoice', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }
        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "RefNumber";
        $miscodigos = Invoice::find($parameters);
        if (count($miscodigos) == 0) {
            $this->flash->notice("El resultado de la busqueda no arrojo ninguna factura sincronizada desde el QB");
            $this->dispatcher->forward([
               "controller" => "invoice",
               "action" => "index"
            ]);
            return;
        }
        $paginator = new Paginator([
           'data' => $miscodigos,
           'limit' => 10,
           'page' => $numberPage
        ]);
        $this->view->page = $paginator->getPaginate();
    }

    /**
     * 
     * @param type $TxnID
     * @return type
     */
    public function firmarAction($TxnID) {
        $parameters = array('conditions' => '[TxnID] = :txnid:', 'bind' => array('txnid' => $TxnID));
        $factura = Invoice::findFirst($parameters);
        if ($factura == false) {
            $this->flash->error("Esta factura no existe");
            return $this->dispatcher->forward(
                  [
                     "controller" => "invoice",
                     "action" => "index",
                  ]
            );
        }

        $this->_registerInvoice($factura);
        $this->flash->success('Factura del QB Seleccionada || ' . $factura->RefNumber);
        $this->firmaFactura($factura);
        return $this->dispatcher->forward(
              [
                 "controller" => "invoice",
                 "action" => "search",
              ]
        );
    }

    public function autorizarAction($TxnID) {
        $parameters = array('conditions' => '[TxnID] = :txnid:', 'bind' => array('txnid' => $TxnID));
        $factura = Invoice::findFirst($parameters);
        if ($factura == false) {
            $this->flash->error("Esta factura no existe");
            return $this->dispatcher->forward(
                  [
                     "controller" => "invoice",
                     "action" => "index",
                  ]
            );
        }

        $this->_registerInvoice($factura);
        $this->flash->success('Factura del QB Seleccionada || ' . $factura->RefNumber);
        $mensaje = $this->claves->respuestaSRI($this->firmado, $this->ambiente);
        if($mensaje['mensaje'] === "AUTORIZADO"){
            $this->facturaAutorizada($mensaje);
        } else {
            $this->flash->error('EN ' . $this->txt_ambiente . $mensaje['mensaje']);
        }
        return $this->dispatcher->forward(
              [
                 "controller" => "invoice",
                 "action" => "search",
              ]
        );
    }

 public function impresionAction($TxnID) {
        $parameters = array('conditions' => '[TxnID] = :txnid:', 'bind' => array('txnid' => $TxnID));
        $factura = Invoice::findFirst($parameters);
        if ($factura == false) {
            $this->flash->error("Esta factura no existe");
            return $this->dispatcher->forward(
                  [
                     "controller" => "invoice",
                     "action" => "index",
                  ]
            );
        }

        $this->_registerInvoice($factura);
        
        $this->flash->success('Factura del QB Seleccionada || ' . $factura->RefNumber);
        $this->respuestaSRI(1);
        $factura->setCustomField10('IMPRESO');
        if (!$factura->save()) {

            foreach ($factura->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
               'controller' => "invoice",
               'action' => 'index',
            ]);

            return;
        }
        return $this->dispatcher->forward(
              [
                 "controller" => "invoice",
                 "action" => "search",
              ]
        );
    }    
    
    private function _registerInvoice($arreglo) {


        $doc = $this->claves->generaDoc($arreglo->RefNumber);
        $this->session->set('cabecera', array(
           'TxnID' => $arreglo->TxnID,
           'TimeCreated' => $arreglo->TimeCreated,
           'TimeModified' => $arreglo->TimeModified,
           'EditSequence' => $arreglo->EditSequence,
           'numeroTransaccion' => $arreglo->TxnNumber,
           'CustomerRef_ListID' => $arreglo->CustomerRef_ListID,
           'razonSocialComprador' => $arreglo->CustomerRef_FullName,
           'TermsRef_FullName' => $arreglo->TermsRef_FullName,
           'fechaDocumento' => $arreglo->TxnDate,
           'fechaPago' => $arreglo->DueDate,
           'Memo' => $arreglo->Memo,
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
           'AppliedAmount' => $arreglo->AppliedAmount,
           'BalanceRemaining' => $arreglo->BalanceRemaining,
           'CustomField1' => $arreglo->CustomField1,
           'CustomField9' => $arreglo->CustomField9,
           'CustomField11' => $arreglo->CustomField11,
           'CustomField12' => $arreglo->CustomField12,
           'CustomField13' => $arreglo->CustomField13,
           'CustomField14' => $arreglo->CustomField14,
           'CustomField15' => $arreglo->CustomField15
        ));
        $this->session->set('factura', array(
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
                     "controller" => "invoice",
                     "action" => "search",
                  ]
            );
        }
        $rucPasa = $this->claves->registraContribuyente($contribuyente);
        $this->session->set('contribuyente', $rucPasa);
        $archivos = $this->claves->registraArchivos($rucPasa['estab'], $rucPasa['punto'], $doc['documento'], 'fact', 'facturas');
        $this->session->set('archivos', $archivos);
        $c = $this->session->get('contribuyente');
        $a = $this->session->get('archivos');
        $this->ambiente = $c['ambiente'];
        $this->firmado = $a['firmado'];
    }

    private function respuestaSRI() {

        $w_cabecera = $this->session->get('cabecera');
        $a = $this->session->get('archivos');
        $firmado = $a['firmado'];
        $doc = new DOMDocument();
        $doc->load($firmado);
        $claveAcceso = $doc->getElementsByTagName('claveAcceso')->item(0)->nodeValue;
        $this->session->set('claveAcceso', $claveAcceso);
        $this->topdf->llenaFactura();
        $this->topdf->creaFactura(1);
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
        $paraemail['subject'] = 'LOS COQUEIROS - Factura Autorizada';
        $paraemail['fromemail']['email'] = 'xavierbustos@loscoqueiros.com';
        $paraemail['fromemail']['nombre'] = 'Heladerias Cofrunat Cia. Ltda.';
        $paraemail['toemail']['email'] = $w_aut['email'];
        $paraemail['toemail']['nombre'] = $w_aut['name'];
        $paraemail['bccemail']['email'] = $w_cab['CustomField12'];
        $paraemail['bccemail']['nombre'] = $w_cab['razonSocialComprador'];
        $exp = $this->sendmail->enviaEmail($paraemail);
        return $exp;
    }
    /**
     * 
     * @param type $param
     */
    private function firmaFactura($factura) {
        $this->session->set('stringDetalles', '<detalles>');

        foreach ($factura->invoicelinedetail as $producto) {
            if ($producto->ItemRef_ListID <> " ") {
                $stringItem = $this->procesaItem($producto);
            }
        }

        $this->totalFactura($factura);
        $mensaje = $this->claves->sriCliente($this->firmado, $this->ambiente);
        if ($mensaje == "RECIBIDA") {
            $this->flash->success('EN ' . $this->txt_ambiente . ' la factura esta => ' . $mensaje);
            $param['mensaje'] = 'RECIBIDA';
            $this->facturaAutorizada($param);
        } else {
            $this->flash->error('EN ' . $this->txt_ambiente . $mensaje);
        }
    }

    function facturaAutorizada($param) {
        $w_cabecera = $this->session->get('cabecera');
        $TxnID = $w_cabecera["TxnID"];
        $invoice = Invoice::findFirstByTxnID($TxnID);

        if (!$invoice) {
            $this->flash->error("factura no existe " . $TxnID);

            $this->dispatcher->forward([
               'controller' => "invoice",
               'action' => 'index'
            ]);
            return;
        }
        $recibida = $this->session->get("respuestaSRI");
        $ListID = $invoice->getCustomerRefListID();
        $cliente = Customer::findFirstByListID($ListID);
        if ($cliente) {
            $cliente->Email === NULL ? $email = "Sin Email" : $email = $cliente->Email;
            $cliente->Phone === NULL ? $phone = "Sin Telefono" : $phone = $cliente->Phone;
            $cliente->CompanyName === NULL ? $CompanyName = "" : $CompanyName = $cliente->CompanyName;
        }

        $invoice->setCustomField9($CompanyName);
        $invoice->setCustomField11($phone);
        $invoice->setCustomField12($email);
        if ($param['mensaje'] === "AUTORIZADO") {
            $nroAut = $param['numeroAutorizacion'];
            $fecAut = $param['fechaAutorizacion'];
            $invoice->setCustomField14($nroAut);
            $invoice->setCustomField13($fecAut);
            $this->topdf->llenaFactura();
            $this->topdf->creaFactura(2);
        }
        $invoice->setCustomField15($param['mensaje']);
        if (!$invoice->save()) {

            foreach ($invoice->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
               'controller' => "invoice",
               'action' => 'index',
            ]);

            return;
        }
        $this->flash->success("la factura ahora esta " . $param['mensaje']);
    }

    function totalFactura($factura) {

        $a = $this->session->get('archivos');
        $w_factura = $this->session->get('factura');
        $w_cabecera = $this->session->get('cabecera');
        $w_ruc = $this->session->get('contribuyente');
        $salida = $a['generado'];
        $firmado = $a['firmado'];
        $this->firmado = $firmado;
        $pasaXML = $a['creado'];
        $regresaXML = $a['pasado'];
        
        $paramClave['rucComprador'] = $factura->customer->AccountNumber;
        $paramClave['fechaDocumento'] = $w_cabecera['fechaDocumento'];
        $paramClave['numeroDocumento'] = $w_cabecera['numeroDocumento'];
        $paramClave['tipoDocumento'] = '01';
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
        $out_SinImp = number_format($w_factura['valorSinImpuestos'], '2', '.', '');
        $out_Base = number_format($w_factura['baseImponible'], '2', '.', '');
        $out_ValorImp = number_format($w_factura['valorImpuestos'], '2', '.', '');
        $out_Total = number_format($w_factura['valorTotal'], '2', '.', '');
        $raz = explode(':', $w_cabecera['razonSocialComprador']);
        $regresaName = $this->claves->limpiaString($raz[0]);
        $regresaDireccion = $this->claves->limpiaString($w_cabecera['direccionComprador']);

        $stringTributaria = '<infoTributaria><ambiente>' . $w_ruc['ambiente'] . '</ambiente>';
        $stringTributaria .= '<tipoEmision>' . $w_ruc['emision'] . '</tipoEmision><razonSocial>' . $w_ruc['razon'] . '</razonSocial>';
        $stringTributaria .= '<nombreComercial>' . $w_ruc['NombreComercial'] . '</nombreComercial>';
        $stringTributaria .= '<ruc>' . $w_ruc['ruc'] . '</ruc><claveAcceso>' . implode($creaClave['claveAcceso']) . '</claveAcceso><codDoc>01</codDoc>';
        $stringTributaria .= '<estab>' . $w_ruc['estab'] . '</estab><ptoEmi>' . $w_ruc['punto'] . '</ptoEmi><secuencial>' . $creaClave['numeroDocumentoLleno'] . '</secuencial>';
        $stringTributaria .= '<dirMatriz>' . $w_ruc['DirMatriz'] . '</dirMatriz></infoTributaria>';
        $stringInfo = '<infoFactura><fechaEmision>' . $dateString . '</fechaEmision><dirEstablecimiento>' . $regresaDireccion . '</dirEstablecimiento>';
        $stringInfo .= '<obligadoContabilidad>' . $w_ruc['LlevaContabilidad'] . '</obligadoContabilidad>';
        $stringInfo .= '<tipoIdentificacionComprador>' . $creaClave['tipoIdentificacion'] . '</tipoIdentificacionComprador><razonSocialComprador>' . $regresaName . '</razonSocialComprador>';
        $stringInfo .= '<identificacionComprador>' . $creaClave['rucLimpio'] . '</identificacionComprador><totalSinImpuestos>' . $out_SinImp . '</totalSinImpuestos>';
        $stringInfo .= '<totalDescuento>0.00</totalDescuento><totalConImpuestos><totalImpuesto><codigo>' . $this->session->get('codigoImpuesto');
        $stringInfo .= '</codigo><codigoPorcentaje>' . $this->session->get('codigoTarifaImpuesto') . '</codigoPorcentaje><baseImponible>' . $out_Base . '</baseImponible>';
        $stringInfo .= '<valor>' . $out_ValorImp . '</valor></totalImpuesto></totalConImpuestos><propina>0.00</propina><importeTotal>' . $out_Total;
        $stringInfo .= '</importeTotal><moneda>DOLAR</moneda></infoFactura>';

        $stringFactura = '<factura id="comprobante" version="1.1.0">' . $stringTributaria . $stringInfo . $this->session->get('stringDetalles') . '</detalles></factura>';

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
        $w_factura = $this->session->get('factura');
        $w_string = $this->session->get('stringDetalles');
        $subtotal = $w_factura['baseImponible'];
        $subtotalImpuestos = $w_factura['valorImpuestos'];
        $subtotalSinImpuestos = $w_factura['valorSinImpuestos'];
        $valorTotal = $w_factura['valorTotal'];
        $out_valor = number_format($db_valor, '2', '.', '');
        $out_Amount = number_format($producto->Amount, '2', '.', '');
        $item = $producto->items;
        $regresaDescripcion = $this->claves->limpiaString($item->description);
        $stringItem = '<detalle><codigoPrincipal>' . $producto->ItemRef_ListID . '</codigoPrincipal>';
        $stringItem .= '<descripcion>' . $regresaDescripcion . '</descripcion><cantidad>' . $producto->Quantity . '</cantidad>';
        $stringItem .= '<precioUnitario>' . $producto->Rate . '</precioUnitario><descuento>0</descuento>';
        $stringItem .= '<precioTotalSinImpuesto>' . $out_Amount . '</precioTotalSinImpuesto>';
        $stringItem .= '<impuestos><impuesto><codigo>' . $this->session->get('codigoImpuesto') . '</codigo><codigoPorcentaje>' . $this->session->get('codigoTarifaImpuesto') . '</codigoPorcentaje>';
        $stringItem .= '<tarifa>' . $this->session->get('porcentajeImpuesto') . '</tarifa><baseImponible>' . $out_Amount . '</baseImponible><valor>' . $out_valor . '</valor></impuesto></impuestos></detalle>';

        $this->session->set('factura', array(
           'baseImponible' => $subtotal + $producto->Amount,
           'valorImpuestos' => $subtotalImpuestos + $db_valor,
           'valorSinImpuestos' => $subtotalSinImpuestos + $producto->Amount,
           'valorTotal' => $valorTotal + $producto->Amount + $db_valor
        ));
        $w_string .= $stringItem;
        $this->session->set('stringDetalles', $w_string);
        return true;
    }

}
