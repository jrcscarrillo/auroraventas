<?php

/**
 * Description of ImprimirController
 *
 * @author jrcsc
 * Dos opciones de impresion, para las recibidas y para las autorizada de cualquier documento
 * 
 */
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class ImprimirController extends ControllerBase {

    public function initialize() {
        $this->tag->setTitle('Imprimir');
        parent::initialize();
    }

    public function indexAction() {
        $this->session->conditions = null;
        $this->view->form = new ImprimirForm;
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
        $auth = $this->session->get('auth');
        $miscodigos = Invoice::find($parameters);
        if (count($miscodigos) == 0) {
            $this->flash->notice("El resultado de la busqueda no arrojo ninguna factura registrada para el SRI");

            $this->dispatcher->forward([
               "controller" => "imprimir",
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

    function leeArchivos() {
        $dir = $_SERVER['DOCUMENT_ROOT'] . '/ComprobantesSRI/facturas/firmados';
        $foo = $this->getFilesFromDir($dir);
        foreach ($foo as $archivo) {

            $doc = new DOMDocument();
            $doc->load($archivo);
            $info = $doc->getElementsByTagName('infoTributaria');
            foreach ($info as $node) {
                if ($node->hasChildNodes()) {
                    foreach ($node->childNodes as $nivel1) {
                        switch ($nivel1->nodeName) {
                            case 'estab':
                                $estab = $nivel1->nodeValue;
                                break;
                            case 'ptoEmi':
                                $ptoEmi = $nivel1->nodeValue;
                                break;
                            case 'secuencial':
                                $secuencial = $nivel1->nodeValue;
                                break;
                        }
                    }
                }
//            echo 'Procesando el archivo ' . $archivo . ' tiene ' . $estab . ' ' . $ptoEmi . ' ' . $secuencial . '<br>';
            }

            $nuevo = $dir . '/fact_' . $estab . $ptoEmi . '_' . $secuencial . '.xml';
//        echo 'Para renombrar ' . $archivo . ' con el nuevo ' . $nuevo . '<br><br>';
            rename($archivo, $nuevo);
        }
    }

    function getFilesFromDir($dir) {

        $files = array();
        if ($handle = opendir($dir)) {
            while (false !== ($file = readdir($handle))) {
                if ($file != "." && $file != "..") {
                    if (is_dir($dir . '/' . $file)) {
                        $dir2 = $dir . '/' . $file;
                        $files[] = $this->getFilesFromDir($dir2);
                    } else {
                        $files[] = $dir . '/' . $file;
                    }
                }
            }
            closedir($handle);
        }

        return $this->array_flat($files);
    }

    function array_flat($array) {

        foreach ($array as $a) {
            if (is_array($a)) {
                $tmp = array_merge($tmp, array_flat($a));
            } else {
                $tmp[] = $a;
            }
        }

        return $tmp;
    }

    public function impresionAction($TxnID) {
//        $this->leeArchivos();
        $parameters = array('conditions' => '[TxnID] = :txnid:', 'bind' => array('txnid' => $TxnID));

        $factura = Invoice::findFirst($parameters);
        if ($factura == false) {
            $this->flash->error("Esta factura no existe");
            return $this->dispatcher->forward(
                  [
                     "controller" => "imprimir",
                     "action" => "index",
                  ]
            );
        }

        $this->_registraFactura($factura);
        $this->_registraArchivos();
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
                 "controller" => "imprimir",
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
           'fechaPago' => $arreglo->DueDate,
           'numeroDocumento' => $documento,
           'direccionComprador' => $arreglo->BillAddress_Addr1,
           'BillAddress_City' => $arreglo->BillAddress_City,
           'BillAddress_State' => $arreglo->BillAddress_State,
           'BillAddress_PostalCode' => $arreglo->BillAddress_PostalCode,
           'BillAddress_Country' => $arreglo->BillAddress_Country,
           'SalesRepRef_FullName' => $arreglo->SalesRepRef_FullName,
           'Memo' => $arreglo->Memo,
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
                     "controller" => "imprimir",
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

    private function _registraArchivos() {
        $ruc = $this->session->get('contribuyente');
        $cab = $this->session->get('cabecera');
        $prefijo = 'fact_' . $ruc['estab'] . $ruc['punto'] . '_' . $cab['numeroDocumento'] . '.xml';
        $prefij = 'fact_' . $ruc['estab'] . $ruc['punto'] . '_' . $cab['numeroDocumento'] . '.pdf';
        $firmado = $_SERVER['DOCUMENT_ROOT'] . '/ComprobantesSRI/facturas/firmados/' . $prefijo;
        $autorizado = $_SERVER['DOCUMENT_ROOT'] . '/ComprobantesSRI/facturas/autorizados/' . $prefijo;
        $elpdf = $_SERVER['DOCUMENT_ROOT'] . '/ComprobantesSRI/facturas/autorizados/' . $prefij;
        $generado = $_SERVER['DOCUMENT_ROOT'] . '/ComprobantesSRI/facturas/generados/' . $prefijo;
        $creado = $_SERVER['DOCUMENT_ROOT'] . '/ComprobantesSRI/ecuador/generado.xml';
        $pasado = $_SERVER['DOCUMENT_ROOT'] . '/ComprobantesSRI/ecuador/firmado.xml';
        $this->session->set('archivos', array(
           'firmado' => $firmado,
           'autorizado' => $autorizado,
           'elpdf' => $elpdf,
           'generado' => $generado,
           'creado' => $creado,
           'pasado' => $pasado
        ));
    }

    private function respuestaSRI($condicion) {
        $w_cabecera = $this->session->get('cabecera');
        $a = $this->session->get('archivos');
        $firmado = $a['firmado'];
        $doc = new DOMDocument();
        $doc->load($firmado);
        $claveAcceso = $doc->getElementsByTagName('claveAcceso')->item(0)->nodeValue;
        $this->session->set('claveAcceso', $claveAcceso);
        $this->topdf->llenaFactura();
        $this->topdf->creaFactura($condicion);
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

}
