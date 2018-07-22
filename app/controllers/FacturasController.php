<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class FacturasController extends ControllerBase {

    public function initialize() {
        $this->tag->setTitle('Facturas');
        parent::initialize();
    }

    public function indexAction() {
        $this->session->conditions = null;
        $this->view->form = new FacturasForm;
    }

    public function searchAction() {
        $numberPage = 1;
        if (!$this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Invoice', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $auth = $this->session->get('auth');
        $parameters["order"] = "RefNumber";
        if ($auth['tipo'] == 'ADMINISTRADOR') {
            $parameters["conditions"] = 'CustomField15 =  "AUTORIZADO"';
        } else {
            $parameters["conditions"] = 'CustomField15 =  "AUTORIZADO" AND CustomerRef_ListID = "' . $auth['qbid'] . '"';
        }
        $miscodigos = Invoice::find($parameters);
        if (count($miscodigos) == 0) {
            $this->flash->notice("El resultado de la busqueda no arrojo ninguna factura autorizada por el SRI");
            $this->dispatcher->forward([
               "controller" => "facturas",
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

    public function bajarAction($TxnID) {
        $parameters = array('conditions' => '[TxnID] = :txnid:', 'bind' => array('txnid' => $TxnID));

        $factura = Invoice::findFirst($parameters);
        if ($factura == false) {
            $this->flash->error("Esta factura no existe");
            return $this->dispatcher->forward(
                  [
                     "controller" => "facturas",
                     "action" => "index",
                  ]
            );
        }

        $this->_registerInvoice($factura);
        $this->respuestaSRI(1);
        $this->enviarEmail();
        return $this->dispatcher->forward(
              [
                 "controller" => "facturas",
                 "action" => "index",
              ]
        );
    }

    public function imprimirAction($TxnID) {
        $parameters = array('conditions' => '[TxnID] = :txnid:', 'bind' => array('txnid' => $TxnID));

        $factura = Invoice::findFirst($parameters);
        if ($factura == false) {
            $this->flash->error("Esta factura no existe");
            return $this->dispatcher->forward(
                  [
                     "controller" => "facturas",
                     "action" => "index",
                  ]
            );
        }

        $this->_registraFactura($factura);
        $this->respuestaSRI(1);
        $this->enviarEmail();
        return $this->dispatcher->forward(
              [
                 "controller" => "facturas",
                 "action" => "search",
              ]
        );
    }

    private function _registraFactura($arreglo) {

        $guiones = explode('-', $arreglo->RefNumber);
        $args1['dato'] = $guiones[2];
        $args1['longitud'] = 8; // debe ser -1 de la longitud deseada
        $args1['vector'] = 'D'; //I=Izquierdo D=Derecho;
        $args1['relleno'] = 'N'; //N=Numero A=Alfas;
        $documento = implode($this->claves->generaString($args1));

        $args1['dato'] = $guiones[1];
        $args1['longitud'] = 2; // debe ser -1 de la longitud deseada
        $args1['vector'] = 'D'; //I=Izquierdo D=Derecho;
        $args1['relleno'] = 'N'; //N=Numero A=Alfas;
        $punto = implode($this->claves->generaString($args1));

        $args1['dato'] = $guiones[0];
        $args1['longitud'] = 2; // debe ser -1 de la longitud deseada
        $args1['vector'] = 'D'; //I=Izquierdo D=Derecho;
        $args1['relleno'] = 'N'; //N=Numero A=Alfas;
        $estab = implode($this->claves->generaString($args1));
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
           'numeroDocumento' => $documento,
           'direccionComprador' => $arreglo->BillAddress_Addr1,
           'BillAddress_City' => $arreglo->BillAddress_City,
           'BillAddress_State' => $arreglo->BillAddress_State,
           'BillAddress_PostalCode' => $arreglo->BillAddress_PostalCode,
           'BillAddress_Country' => $arreglo->BillAddress_Country,
           'SalesRepRef_FullName' => $arreglo->SalesRepRef_FullName,
           'Subtotal' => $arreglo->Subtotal,
           'SalesTaxPercentage' => $arreglo->SalesTaxPercentage,
           'SalesTaxTotal' => $arreglo->SalesTaxTotal,
           'AppliedAmount' => $arreglo->AppliedAmount,
           'BalanceRemaining' => $arreglo->BalanceRemaining,
           'CustomField1' => $arreglo->CustomField1,
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
        $this->session->set('facturas', array());
        $this->session->set('programas', array());
        /**
         *      EL SIGUIENTE GRUPO DE INSTRUCCIONES SOLO SE APLICA CUANDO EN EL NUMERO DE FACTURA ESTAN integrados el establecimiento y el punto de emision
         *      SOLO FUNCIONA CUANDO EL RUC ES IGUAL
         */
        $parameters = array('conditions' => '[CodEmisor] = :estab: AND [Punto] = :punto:', 'bind' => array('estab' => $estab, 'punto' => $punto));
        $contribuyente = Contribuyente::findFirst($parameters);
        if ($contribuyente == false) {
            $this->flash->error("Este contribuyente no existe");
            return $this->dispatcher->forward(
                  [
                     "controller" => "facturas",
                     "action" => "search",
                  ]
            );
        }
        $this->_registraContribuyente($contribuyente);
    }

    private function _registraContribuyente($ruc) {
        $this->session->set('contribuyente', array(
           'id' => $ruc->Id,
           'estab' => $ruc->CodEmisor,
           'punto' => $ruc->Punto,
           'ruc' => $ruc->Ruc,
           'razon' => $ruc->Razon,
           'emision' => $ruc->Emision,
           'ambiente' => $ruc->Ambiente,
           'NombreComercial' => $ruc->NombreComercial,
           'DirMatriz' => $ruc->DirMatriz,
           'DirEmisor' => $ruc->DirEmisor,
           'Resolucion' => $ruc->Resolucion,
           'LlevaContabilidad' => $ruc->LlevaContabilidad
        ));
    }


    private function respuestaSRI($condicion) {
        $w_cabecera = $this->session->get('cabecera');
        $prefijo = 'fact' . $w_cabecera['numeroDocumento'] . '.xml';
        $firmado = $_SERVER['DOCUMENT_ROOT'] . '/ComprobantesSRI/facturas/firmados/' . $prefijo;
        $this->session->set('firmado', $firmado);
        $doc = new DOMDocument();
        $doc->load($firmado);
        $claveAcceso = $doc->getElementsByTagName('claveAcceso')->item(0)->nodeValue;
        $this->session->set('claveAcceso', $claveAcceso);
        $this->topdf->llenaFactura();
        $this->topdf->creaFactura($condicion);
    }

    private function enviarEmail() {
        $w_cab = $this->session->get('cabecera');
        $w_con = $this->session->get('contribuyente');
        $w_aut = $this->session->get('auth');
        
        $part = '<div><p><strong>FACTURACION ELECTRONICA LOS COQUEIROS</strong></p><br>
           <p>Estimado(a) </p><br><p><strong>' .
           $w_cab['razonSocialComprador'] .
           '</strong></p><br><p>Heladerías Cofrunat Cia. Ltda.,  le informa que se ha generado su comprobante electrónico,</p><br><p><strong>' .
           $w_con['estab'] . '-' . $w_con['punto'] . '-' . substr($this->session->get('claveAcceso'), 30, 9) . '</strong></p><br> ' .
           '<p>que adjuntamos en formato XML de acuerdo a los requerimientos del SRI.</p><br>
         <p>Podrá revisar este y todos sus documentos electrónicos en </p><br>
         <p>https://declaraciones.sri.gob.ec/comprobantes-electronicos-internet/\r\npublico/validezComprobantes.jsf?pathMPT=Facturaci%F3n%20Electr%F3nica&actualMPT=Validez%20de%20comprobantes\r\n

</p><br><br><p>Atentamente,</p><br><br>

<p>Heladerías Cofrunat Cia. Ltda. </p>';



        $paraemail['part'] = $part;
        $paraemail['body'] = $part;
        $param = $this->session->get('firmado');
        $paraemail['attach'] = $param;
        $paraemail['subject'] = 'LOS COQUEIROS - Factura Autorizada';
        $paraemail['fromemail']['email'] = 'xavierbustos@loscoqueiros.com';
        $paraemail['fromemail']['nombre'] = 'Heladerias Cofrunat Cia. Ltda.';
        $paraemail['toemail']['email'] = $w_aut['email'];
        $paraemail['toemail']['nombre'] = $w_aut['name'];
        $paraemail['bccemail']['email'] = $w_cab['CustomField12'];
        $paraemail['bccemail']['nombre'] = $w_cab['razonSocialComprador'];
        $exp = $this->sendmail->enviaEmail($paraemail);
    }

}
