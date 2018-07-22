<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class SalesorderController extends ControllerBase {

    protected $ambiente;
    protected $txt_ambiente;
    protected $firmado;
    protected $placa;
    protected $tipoid;
    protected $numeroid;
    protected $email;
    protected $vehiculo;
    protected $dirvehiculo;
    protected $chofer;
    protected $dirchofer;

    public function initialize() {
        $this->tag->setTitle('GuiasQB');
        parent::initialize();
    }

    public function indexAction() {
        $this->session->conditions = null;
        $this->view->form = new SalesorderForm;
    }

    public function searchAction() {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Salesorder', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "TxnID";

        $salesorder = Salesorder::find($parameters);
        if (count($salesorder) == 0) {
            $this->flash->notice("The search did not find any salesorder");

            $this->dispatcher->forward([
               "controller" => "salesorder",
               "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
           'data' => $salesorder,
           'limit' => 10,
           'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    public function autorizarAction($TxnID) {
        $parameters = array('conditions' => '[TxnID] = :txnid:', 'bind' => array('txnid' => $TxnID));
        $orden = Salesorder::findFirst($parameters);
        if ($orden == false) {
            $this->flash->error("Esta guia de remision no existe");
            return $this->dispatcher->forward(
                  [
                     "controller" => "salesorder",
                     "action" => "index",
                  ]
            );
        }

        $this->_registraGuia($orden);

        $this->flash->success('Guia de remision del QB Seleccionada || ' . $orden->RefNumber);
        $mensaje = $this->claves->respuestaSRI($this->firmado, $this->ambiente);
        if ($mensaje['mensaje'] === "AUTORIZADO") {
            $this->guiaAutorizada($mensaje);
        } else {
            $this->flash->error('EN ' . $this->txt_ambiente . $mensaje['mensaje']);
        }
        return $this->dispatcher->forward(
              [
                 "controller" => "salesorder",
                 "action" => "search",
              ]
        );
    }

    public function impresionAction($TxnID) {
        $parameters = array('conditions' => '[TxnID] = :txnid:', 'bind' => array('txnid' => $TxnID));
        $orden = Salesorder::findFirst($parameters);
        if ($orden == false) {
            $this->flash->error("Esta guia de remision no existe");
            return $this->dispatcher->forward(
                  [
                     "controller" => "salesorder",
                     "action" => "index",
                  ]
            );
        }

        $this->_registraGuia($orden);

        $this->flash->success('Guia de remision del QB Seleccionada || ' . $orden->RefNumber);
        $this->respuestaSRI(1);
        $orden->setCustomField10('IMPRESO');
        if (!$orden->save()) {

            foreach ($orden->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
               'controller' => "salesorder",
               'action' => 'index',
            ]);

            return;
        }
        return $this->dispatcher->forward(
              [
                 "controller" => "salesorder",
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
        $this->topdfguia->llenaGuia();
        $this->topdfguia->creaGuia(1);
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
        $paraemail['subject'] = 'LOS COQUEIROS - Guia Autorizada';
        $paraemail['fromemail']['email'] = 'xavierbustos@loscoqueiros.com';
        $paraemail['fromemail']['nombre'] = 'Heladerias Cofrunat Cia. Ltda.';
        $paraemail['toemail']['email'] = $w_aut['email'];
        $paraemail['toemail']['nombre'] = $w_aut['name'];
        $paraemail['bccemail']['email'] = $w_cab['CustomField12'];
        $paraemail['bccemail']['nombre'] = $w_cab['razonSocialComprador'];
        $exp = $this->sendmail->enviaEmail($paraemail);
        return $exp;
    }

    function guiaAutorizada($param) {
        $w_cabecera = $this->session->get('cabecera');
        $TxnID = $w_cabecera["TxnID"];
        $orden = Salesorder::findFirstByTxnID($TxnID);

        if (!$orden) {
            $this->flash->error("Guia de remision no existe " . $TxnID);

            $this->dispatcher->forward([
               'controller' => "salesorder",
               'action' => 'index'
            ]);
            return;
        }
        $orden->customer->Email === NULL ? $email = "Sin Email" : $email = $orden->customer->Email;
        $orden->customer->Phone === NULL ? $phone = "Sin Telefono" : $phone = $orden->customer->Phone;
        $orden->customer->CompanyName === NULL ? $CompanyName = "" : $CompanyName = $orden->customer->CompanyName;

        $orden->setCustomField9($CompanyName);
        $orden->setCustomField11($phone);
        $orden->setCustomField12($email);
        if ($param['mensaje'] === "AUTORIZADO") {
            $nroAut = $param['numeroAutorizacion'];
            $fecAut = $param['fechaAutorizacion'];
            $orden->setCustomField14($nroAut);
            $orden->setCustomField13($fecAut);
            $this->topdfnota->llenaNota();
            $this->topdfnota->creaNota(2);
        }
        $orden->setCustomField15($param['mensaje']);
        if (!$orden->save()) {

            foreach ($orden->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
               'controller' => "salesorder",
               'action' => 'index',
            ]);

            return;
        }
        $this->flash->success("la guia de remision ahora esta " . $param['mensaje']);
    }

    public function firmarAction($TxnID) {
        $parameters = array('conditions' => '[TxnID] = :txnid:', 'bind' => array('txnid' => $TxnID));
        $guia = Salesorder::findFirst($parameters);
        if ($guia == false) {
            $this->flash->error("Esta guia de remision no existe");
            return $this->dispatcher->forward(
                  [
                     "controller" => "salesorder",
                     "action" => "index",
                  ]
            );
        }

        $this->_registraGuia($guia);

        $this->flash->success('Guia de remision del QB Seleccionada || ' . $guia->RefNumber);
        $this->firmaGuia($guia);
        return $this->dispatcher->forward(
              [
                 "controller" => "salesorder",
                 "action" => "search",
              ]
        );
    }

    private function firmaGuia($guia) {
        $this->session->set('stringDetalles', '<detalles>');

        foreach ($guia->salesorderlinedetail as $producto) {
            if ($producto->ItemRef_ListID <> " ") {
                $stringItem = $this->procesaItem($producto);
            }
        }

        $this->totalGuia($guia);
//        $this->flash->notice('Este es el ambiente ' . $this->ambiente. ' y este es el archivo ' . $this->firmado);
        $mensaje = $this->claves->sriCliente($this->firmado, $this->ambiente);
        if ($mensaje == "RECIBIDA") {
            $this->flash->success('EN ' . $this->txt_ambiente . $mensaje . ' la guia de remision esta => ' . $mensaje);
            $param['mensaje'] = 'RECIBIDA';
            $this->guiaAutorizada($param);
        } else {
            $this->flash->error('EN ' . $this->txt_ambiente . $mensaje);
        }
    }

    function totalGuia($guia) {

        $a = $this->session->get('archivos');
        $w_cabecera = $this->session->get('cabecera');
        $w_ruc = $this->session->get('contribuyente');
        $salida = $a['generado'];
        $firmado = $a['firmado'];
        $this->firmado = $firmado;
        $pasaXML = $a['creado'];
        $regresaXML = $a['pasado'];

        $paramClave['rucComprador'] = $guia->customer->AccountNumber;
        $paramClave['fechaDocumento'] = $w_cabecera['fechaDocumento'];
        $paramClave['numeroDocumento'] = $w_cabecera['numeroDocumento'];
        $paramClave['tipoDocumento'] = '06';
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
        $raz = explode(':', $w_cabecera['razonSocialComprador']);
        $regresaName = $this->claves->limpiaString($raz[0]);
        $regresaDireccion = $this->claves->limpiaString($w_cabecera['direccionComprador']);

        $stringTributaria = '<infoTributaria><ambiente>' . $w_ruc['ambiente'] . '</ambiente>';
        $stringTributaria .= '<tipoEmision>' . $w_ruc['emision'] . '</tipoEmision><razonSocial>' . $w_ruc['razon'] . '</razonSocial>';
        $stringTributaria .= '<nombreComercial>' . $w_ruc['NombreComercial'] . '</nombreComercial>';
        $stringTributaria .= '<ruc>' . $w_ruc['ruc'] . '</ruc><claveAcceso>' . implode($creaClave['claveAcceso']) . '</claveAcceso><codDoc>06</codDoc>';
        $stringTributaria .= '<estab>' . $w_ruc['estab'] . '</estab><ptoEmi>' . $w_ruc['punto'] . '</ptoEmi><secuencial>' . $creaClave['numeroDocumentoLleno'] . '</secuencial>';
        $stringTributaria .= '<dirMatriz>' . $w_ruc['DirMatriz'] . '</dirMatriz></infoTributaria>';

        $stringInfo = '<infoGuiaRemision><dirEstablecimiento>' . $w_ruc['DirMatriz'] . '</dirEstablecimiento>';
        $stringInfo .= '<dirPartida>' . $w_ruc['DirEmisor'] . '</dirPartida>';
        $stringInfo .= '<razonSocialTransportista>' . $this->chofer . '</razonSocialTransportista>';
        $stringInfo .= '<tipoIdentificacionTransportista>' . $this->tipoid . '</tipoIdentificacionTransportista>';
        $stringInfo .= '<rucTransportista>' . $this->numeroid . '</rucTransportista>';
        $stringInfo .= '<fechaIniTransporte>' . $dateString . '</fechaIniTransporte>';
        $stringInfo .= '<fechaFinTransporte>' . $dateString . '</fechaFinTransporte>';
        $stringInfo .= '<placa>' . $this->placa . '</placa>';
        $stringInfo .= '</infoGuiaRemision>';

        $stringDestinatarios = '<destinatarios><destinatario><identificacionDestinatario>' . $creaClave['rucLimpio'] . '</identificacionDestinatario>';
        $stringDestinatarios .= '<razonSocialDestinatario>' . $regresaName . '</razonSocialDestinatario>';
        $stringDestinatarios .= '<dirDestinatario>' . $regresaDireccion . '</dirDestinatario>';
        $stringDestinatarios .= '<motivoTraslado>' . $w_cabecera['motivo'] . '</motivoTraslado>';
        $stringDestinatarios .= '<ruta>' . $w_cabecera['CustomField1'] . '</ruta>';

        $stringFactura = '<guiaRemision id="comprobante" version="1.1.0">' . $stringTributaria . $stringInfo . $stringDestinatarios . $this->session->get('stringDetalles') . '</detalles></destinatario></destinatarios></guiaRemision>';


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

        $w_string = $this->session->get('stringDetalles');
        $ext = explode(':', $producto->ItemRef_FullName);
        if ($ext[0] === 'VEHICULOS' OR $ext[0] === 'CHOFERES') {
            $item = Items::findFirstByquickbooks_listid($producto->ItemRef_ListID);
            if ($ext[0]  === 'VEHICULOS') {
                $this->placa = $item->placa;
                $div1 = explode(':', $item->description);
                $this->vehiculo = $item->description;
            } elseif ($ext[0] === 'CHOFERES') {
                $this->tipoid = $item->tipoid;
                $this->numeroid = $item->numeroid;
                $this->email = $item->email;
                $div1 = explode(':', $item->description);
                $this->chofer = $div1[0];
                $this->dirchofer = $div1[1];
            }
        } else {
            $regresaDescripcion = $this->claves->limpiaString($producto->Description);
            $stringItem = '<detalle><codigoInterno>' . $producto->ItemRef_ListID . '</codigoInterno>';
            $stringItem .= '<descripcion>' . $regresaDescripcion . '</descripcion><cantidad>' . $producto->Quantity . '</cantidad></detalle>';

            $w_string .= $stringItem;
            $this->session->set('stringDetalles', $w_string);
        }
        return true;
    }

    private function _registraGuia($arreglo) {

        $doc = $this->claves->generaDoc($arreglo->RefNumber);                   // convierte la notacion 1-1-1 a 001-001-000000001
        $cliente = $arreglo->customer;
        $this->session->set('cabecera', array(
           'TxnID' => $arreglo->TxnID,
           'TimeCreated' => $arreglo->TimeCreated,
           'TimeModified' => $arreglo->TimeModified,
           'EditSequence' => $arreglo->EditSequence,
           'numeroTransaccion' => $arreglo->TxnNumber,
           'CustomerRef_ListID' => $arreglo->CustomerRef_ListID,
           'razonSocialComprador' => $arreglo->CustomerRef_FullName,
           'fechaDocumento' => $arreglo->TxnDate,
           'motivo' => $arreglo->Memo,
           'numeroDocumento' => $doc['documento'],
           'SalesRepRef_FullName' => $arreglo->SalesRepRef_FullName,
           'CustomerMsgRef_FullName' => $arreglo->CustomerMsgRef_FullName,
                      'direccionComprador' => $arreglo->BillAddress_Addr1,
           'ciudad' => $arreglo->BillAddress_City,
           'provincia' => $arreglo->BillAddress_State,
           'zipcode' => $arreglo->BillAddress_PostalCode,
           'pais' => $arreglo->BillAddress_Country,
           'Subtotal' => $arreglo->Subtotal,
           'SalesTaxPercentage' => $arreglo->SalesTaxPercentage,
           'SalesTaxTotal' => $arreglo->SalesTaxTotal,
           'TotalAmount' => $arreglo->TotalAmount,
           'CustomField1' => $cliente->CustomField1,
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
        $parameters = array('conditions' => '[CodEmisor] = :estab: AND [Punto] = :punto:', 'bind' => array('estab' => $doc['estab'], 'punto' => $doc['punto']));
        $contribuyente = Contribuyente::findFirst($parameters);
        if ($contribuyente == false) {
            $this->flash->error("Este contribuyente no existe");
            return $this->dispatcher->forward(
                  [
                     "controller" => "salesorder",
                     "action" => "search",
                  ]
            );
        }
        $rucPasa = $this->claves->registraContribuyente($contribuyente);
        $this->session->set('contribuyente', $rucPasa);
        $archivos = $this->claves->registraArchivos($rucPasa['estab'], $rucPasa['punto'], $doc['documento'], 'guia', 'guias');
        $this->session->set('archivos', $archivos);
        $c = $this->session->get('contribuyente');
        $a = $this->session->get('archivos');
        $this->ambiente = $c['ambiente'];
        $this->firmado = $a['firmado'];
    }

}
