<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

date_default_timezone_set('America/Guayaquil');

class PedidostmpController extends ControllerBase {

    private $helados;

    public function initialize() {
        $this->tag->setTitle('Pedidos');
        parent::initialize();
    }

    public function newventasAction($ListID) {
        $this->session->conditions = null;
        $parameters = array('conditions' => '[tipoCod] = "NUM" AND [type] = "PEDIDO"');
        $numero = Codetype::findFirst($parameters);
        $codeValue = $numero->getCodeValue();
        $codeValue++;
        $numero->setCodeValue($codeValue);
        if (!$numero->save()) {

            foreach ($numero->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
               'controller' => "index",
               'action' => 'index',
            ]);

            return;
        }
        $cliente = Customer::findFirstByListID($ListID);
        $fecha = date('d-m-Y');
        $this->tag->setDefault("RefNumber", $codeValue);
        $this->tag->setDefault("TxnDate", $fecha);
        $this->tag->setDefault("DueDate", $fecha);
        $this->tag->setDefault("PONumber", 'n/a');
        $this->tag->setDefault("Memo", 'n/a');
        $this->tag->setDefault("CustomerRef_ListID", $ListID);
        $this->tag->setDefault("CustomerRef_FullName", $cliente->FullName);
        $this->tag->setDefault("SalesRepRef_ListID", $cliente->SalesRepRef_ListID);
        $this->tag->setDefault("SalesRepRef_FullName", $cliente->SalesRepRef_FullName);
        $this->tag->setDefault("TermsRef_FullName", $cliente->TermsRef_FullName);
        $this->tag->setDefault("TermsRef_ListID", $cliente->TermsRef_ListID);

        $nivelprecio = 'NORMAL';
        if ($cliente->PriceLevelRef_ListID > ' ') {
            $nivelprecio = $cliente->PriceLevelRef_ListID;
        }

        $l = $this->generaTmp($nivelprecio);
        $this->session->set('prod', $l);
        $valor = 0.00;
        for ($i = 0; $i === $l; $i++) {
            $campo = 'ingresa' . $i;
            $this->tag->setDefault($campo, $valor);
            $campo1 = 'cortesia' . $i;
            $this->tag->setDefault($campo1, $valor);
            $campo2 = 'bonifica' . $i;
            $this->tag->setDefault($campo2, $valor);
        }
        $this->session->set('helados', $this->helados);
        $this->view->form = new PedidosCabForm();
        $this->view->helados = $this->helados;
    }

    public function searchventasAction() {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Pedidostmp', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "TxnID";

        $pedidostmp = Pedidostmp::find($parameters);
        if (count($pedidostmp) == 0) {
            $this->flash->notice("The search did not find any pedidostmp");

            $this->dispatcher->forward([
               "controller" => "pedidostmp",
               "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
           'data' => $pedidostmp,
           'limit' => 10,
           'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    public function newAction() {
        
    }

    public function editventasAction($TxnID) {
        
    }

    public function createventasAction() {
        
    }

    public function saveventasAction() {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
               'controller' => "customer",
               'action' => 'search'
            ]);

            return;
        }

        $estado = $this->grabapedido();
        if ($estado === "ERROR") {
            $this->flash->error('ERROR No se ha podido grabar el pedido, contactar mantenimiento');
            $this->dispatcher->forward([
               'controller' => "customer",
               'action' => 'index'
            ]);
        }
        $this->dispatcher->forward([
           'controller' => "pedidostmp",
           'action' => 'aprobarventas'
        ]);
    }

    public function aprobarventasAction() {
        $posteado = $this->session->get('posteado');
        $pedido = Pedidos::findFirstByTxnID($posteado['RefNumber']);
        if (!$pedido) {
            $this->flash->error('ERROR en la aplicacion llamar a mantenimiento ' . $posteado['RefNumber']);
            $this->dispatcher->forward([
               'controller' => "customer",
               'action' => 'search'
            ]);
        }

        $this->session->set('helados', $pedido);
        $this->view->pedido = $pedido;
    }

    public function pasaventasAction() {
        $posteado = $this->session->get('posteado');
        $pedido = Pedidos::findFirstByTxnID($posteado['RefNumber']);
        if ($pedido->getStatus() <> 'GRABADO') {
            $this->flash->notice('Este pedido no puede ser procesado esta ' . $posteado['RefNumber'] . ' ' . $pedido->getStatus());
            $this->dispatcher->forward([
               'controller' => "customer",
               'action' => 'search'
            ]);
        }

        $this->topdf->llenaFactura();
        $this->topdf->creaFactura(2);
//        $estado = $this->enviarEmail();
        $this->flash->notice('Se ha generado el pedido numero ' . $posteado['RefNumber'] . ' y tambien el documento PDF del pedido ... ');
        $this->dispatcher->forward([
           'controller' => "customer",
           'action' => 'index'
        ]);
    }

    public function deleteAction($TxnID) {
        $pedidostmp = Pedidostmp::findFirstByTxnID($TxnID);
        if (!$pedidostmp) {
            $this->flash->error("Este pedido " . $TxnID . " no fue encontrado");

            $this->dispatcher->forward([
               'controller' => "pedidostmp",
               'action' => 'index'
            ]);

            return;
        }

        if (!$pedidostmp->delete()) {

            foreach ($pedidostmp->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
               'controller' => "pedidostmp",
               'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("Este pedido " . $pedidostmp->TxnNumber . "fue eliminado satisfactoriamente");

        $this->dispatcher->forward([
           'controller' => "pedidostmp",
           'action' => "index"
        ]);
    }

    function generaTmp($nivelprecio) {

        $this->helados = array();
        $l = 0;
        $parameters = array('conditions' => '[type] = "Assembly"');
        $numero = Items::find($parameters);
        $campo = 'ingresa';
        $this->session->set('precios', $campo . ' ' . $nivelprecio);
        foreach ($numero as $producto) {
            if (substr($producto->description, 0, 1) === '7') {
                $l++;
                $this->helados[$l]['listid'] = $producto->quickbooks_listid;
                $this->helados[$l]['name'] = $producto->name;
                $this->helados[$l]['sales_desc'] = $producto->sales_desc;
                $this->helados[$l]['sales_price'] = number_format($producto->sales_price, '2', ',', '.');
                $this->helados[$l]['quantityOnHand'] = number_format($producto->QuantityOnHand, '2', ',', '.');
                $this->helados[$l]['ItemrefFullname'] = $producto->fullname;
                $this->helados[$l]['Description'] = $producto->description;
                $this->helados[$l]['Quantity'] = 0.00;
                $this->helados[$l]['Unitofmeasure'] = 'ea';
                $this->helados[$l]['Rate'] = $producto->sales_price;
                if ($nivelprecio != 'NORMAL') {
                    $newprice = $this->buscarprecio($nivelprecio, $producto->quickbooks_listid);
                    if ($newprice > 0) {
                        $this->helados[$l]['Rate'] = $newprice;
                        $this->helados[$l]['sales_price'] = number_format($newprice, '2', ',', '.');
                    }
                }
                $this->helados[$l]['Ratepercent'] = 0;
                $this->helados[$l]['Amount'] = 0.00;
                $this->helados[$l]['SalestaxcoderefListid'] = $producto->sales_tax_code_ref_listid;
                $this->helados[$l]['SalestaxcoderefFullname'] = $producto->sales_tax_code_ref_fullname;
                $campo = 'ingresa' . $l;
                $campo1 = 'cortesia' . $l;
                $campo2 = 'bonifica' . $l;
                $this->helados[$l][$campo] = number_format(0, '2', ',', '.');
                $this->helados[$l][$campo1] = number_format(0, '2', ',', '.');
                $this->helados[$l][$campo2] = number_format(0, '2', ',', '.');
            }
        }
        return $l;
    }

    function buscarprecio($nivelprecio, $item) {
        $precios = $this->session->get('precios');
        $parameters = array('conditions' => '[IDKEY] = :precio: AND [ItemRef_ListID] = :item:', 'bind' => array('precio' => $nivelprecio, 'item' => $item));
        $precio = Pricelevelperitemdetail::findFirst($parameters);
        if (!$precio) {
            $estado = "No se ha encontrado precios";
            $newprice = 0;
        } else {
            $estado = "Estos son los precios";
            $newprice = $precio->getCustomPrice();
        }
        $precios = $precios . $nivelprecio . ' ' . $item . ' ' . $estado;
        $this->session->set('precios', $precios);
        return $newprice;
    }

    function grabapedido() {
        $this->helados = $this->session->get('helados');
        $auth = $this->session->get('auth');
        $fecha = date('Y-m-d H:m:s');
        $pedido = new Pedidos();
        $pedido->setTxnID($this->request->getPost("RefNumber"));

        $pedido->setTimeCreated($fecha);
        $pedido->setTimeModified($fecha);
        $pedido->setTxnNumber($this->request->getPost("RefNumber"));
        $pedido->setCustomerRefListID($this->request->getPost("CustomerRef_ListID"));
        $pedido->setCustomerRefFullName($this->request->getPost("CustomerRef_FullName"));
        $pedido->setTxnDate(date('Y-m-d H:m:s', strtotime($this->request->getPost("TxnDate"))));
        $pedido->setRefNumber($this->request->getPost("RefNumber"));
        $pedido->setPONumber($this->request->getPost("PONumber"));
        $pedido->setTermsRefListID($this->request->getPost("TermsRef_ListID"));
        $pedido->setTermsRefFullName($this->request->getPost("TermsRef_FullName"));
        $pedido->setDueDate(date('Y-m-d H:m:s', strtotime($this->request->getPost("DueDate"))));
        $pedido->setSalesRepRefListID($this->request->getPost("SalesRepRef_ListID"));
        $pedido->setSalesRepRefFullName($this->request->getPost("SalesRepRef_FullName"));
        $pedido->setCustomerMsgRefFullName($auth['username']);
        $pedido->setSubtotal(0);
        $pedido->setSalesTaxTotal(0);
        $pedido->setTotalAmount(0);
        $pedido->setIsManuallyClosed('false');
        $pedido->setIsFullyInvoiced('false');
        $pedido->setMemo($this->request->getPost("Memo"));

        if (!$pedido->save()) {
            foreach ($pedido->getMessages() as $message) {
                $this->flash->error($message);
            }
            return "ERROR";
        }

        $w_iva = 0.00;
        $w_subtotal = 0.00;
        $w_total = 0.00;
        $w_cien = $this->request->getPost('tipo');
        $d_campo = array();
        $d_campo1 = array();
        $d_campo2 = array();

        $num = count($this->helados);
        for ($i = 1; $i < $num + 1; $i++) {

            $l = $i - 1;
            $cien = 100 + $i;
            $dosc = 200 + $i;
            $tresc = 300 + $i;

            $campo = 'ingresa' . $l;
            $campo1 = 'cortesia' . $l;
            $campo2 = 'bonifica' . $l;
            $d_campo[$l] = 0.00;
            $d_campo1[$l] = 0.00;
            $d_campo2[$l] = 0.00;
            if ($this->request->getPost($campo) > 0) {
                $d_campo[$l] = $this->request->getPost($campo);
                $pedidosdetalle = new Pedidosdetalle();
                $pedidosdetalle->setTxnLineID($this->request->getPost("RefNumber") . $cien);
                $pedidosdetalle->setItemRefListID($this->helados[$i]['listid']);
                $pedidosdetalle->setItemRefFullName($this->helados[$i]['ItemrefFullname']);
                $pedidosdetalle->setDescription($this->helados[$i]['Description']);

                $pedidosdetalle->setQuantity($this->request->getPost($campo));
                $pedidosdetalle->setUnitOfMeasure('ea');
                $pedidosdetalle->setRate($this->helados[$i]['Rate']);
                $pedidosdetalle->setRatePercent($this->helados[$i]['Ratepercent']);
                $amount = $this->helados[$i]['Rate'] * $this->request->getPost($campo);
                $w_subtotal = $w_subtotal + $amount;
                $w_iva = $w_iva + ($amount * $w_cien / 100);
                $pedidosdetalle->setAmount($amount);
                $pedidosdetalle->setInventorySiteRefListID('n/a');
                $pedidosdetalle->setInventorySiteRefFullName('n/a');
                $pedidosdetalle->setSerialNumber('n/a');
                $pedidosdetalle->setLotNumber('n/a');
                $pedidosdetalle->setSalesTaxCodeRefListID($this->helados[$i]['SalestaxcoderefListid']);
                $pedidosdetalle->setSalesTaxCodeRefFullName($this->helados[$i]['SalestaxcoderefFullname']);
                $pedidosdetalle->setInvoiced('false');
                $pedidosdetalle->setIsManuallyClosed('false');
                $pedidosdetalle->setOther1('n/a');
                $pedidosdetalle->setOther2('n/a');
                $pedidosdetalle->setIDKEY($this->request->getPost("RefNumber"));


                if (!$pedidosdetalle->save()) {
                    foreach ($pedidosdetalle->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                    return "ERROR";
                }
            }
            if ($this->request->getPost($campo1) > 0) {
                $d_campo1[$l] = $this->request->getPost($campo1);
                $pedidosdetalle = new Pedidosdetalle();
                $pedidosdetalle->setTxnLineID($this->request->getPost("RefNumber") . $dosc);
                $pedidosdetalle->setItemRefListID($this->helados[$i]['listid']);
                $pedidosdetalle->setItemRefFullName($this->helados[$i]['ItemrefFullname']);
                $pedidosdetalle->setDescription($this->helados[$i]['Description']);

                $pedidosdetalle->setQuantity($this->request->getPost($campo1));
                $pedidosdetalle->setUnitOfMeasure('ea');
                $pedidosdetalle->setRate(0);
                $pedidosdetalle->setRatePercent(0);
                $amount = 0;
                $pedidosdetalle->setAmount($amount);
                $pedidosdetalle->setInventorySiteRefListID('n/a');
                $pedidosdetalle->setInventorySiteRefFullName('n/a');
                $pedidosdetalle->setSerialNumber('n/a');
                $pedidosdetalle->setLotNumber('n/a');
                $pedidosdetalle->setSalesTaxCodeRefListID($this->helados[$i]['SalestaxcoderefListid']);
                $pedidosdetalle->setSalesTaxCodeRefFullName($this->helados[$i]['SalestaxcoderefFullname']);
                $pedidosdetalle->setInvoiced('false');
                $pedidosdetalle->setIsManuallyClosed('false');
                $pedidosdetalle->setOther1('n/a');
                $pedidosdetalle->setOther2('n/a');
                $pedidosdetalle->setIDKEY($this->request->getPost("RefNumber"));


                if (!$pedidosdetalle->save()) {
                    foreach ($pedidosdetalle->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                    return "ERROR";
                }
            }
            if ($this->request->getPost($campo2) > 0) {
                $d_campo2[$l] = $this->request->getPost($campo2);
                $pedidosdetalle = new Bonificadetalle();
                $pedidosdetalle->setTxnLineID($this->request->getPost("RefNumber") . $tresc);
                $pedidosdetalle->setItemRefListID($this->helados[$i]['listid']);
                $pedidosdetalle->setItemRefFullName($this->helados[$i]['ItemrefFullname']);
                $pedidosdetalle->setDescription($this->helados[$i]['Description']);

                $pedidosdetalle->setQuantity($this->request->getPost($campo2));
                $pedidosdetalle->setUnitOfMeasure('ea');
                $pedidosdetalle->setRate(0);
                $pedidosdetalle->setRatePercent(0);
                $amount = 0;
                $pedidosdetalle->setAmount($amount);
                $pedidosdetalle->setInventorySiteRefListID('n/a');
                $pedidosdetalle->setInventorySiteRefFullName('n/a');
                $pedidosdetalle->setSerialNumber('n/a');
                $pedidosdetalle->setLotNumber('n/a');
                $pedidosdetalle->setSalesTaxCodeRefListID($this->helados[$i]['SalestaxcoderefListid']);
                $pedidosdetalle->setSalesTaxCodeRefFullName($this->helados[$i]['SalestaxcoderefFullname']);
                $pedidosdetalle->setInvoiced('false');
                $pedidosdetalle->setIsManuallyClosed('false');
                $pedidosdetalle->setOther1('n/a');
                $pedidosdetalle->setOther2('n/a');
                $pedidosdetalle->setIDKEY($this->request->getPost("RefNumber"));


                if (!$pedidosdetalle->save()) {
                    foreach ($pedidosdetalle->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                    return "ERROR";
                }
            }
        }
        $this->session->set('posteado', $this->request->getPost());
        $this->session->set('campo', $d_campo);
        $this->session->set('campo1', $d_campo1);
        $this->session->set('campo2', $d_campo2);

        $reg = Pedidos::findFirstByTxnID($this->request->getPost("RefNumber"));
        $reg->setSubtotal($w_subtotal);
        $reg->setSalesTaxTotal($w_iva);
        $reg->setTotalAmount($w_subtotal + $w_iva);
        $reg->setStatus('GRABADO');

        if (!$reg->save()) {
            foreach ($reg->getMessages() as $message) {
                $this->flash->error($message);
            }
            return "ERROR";
        }
    }

    public function eliminarAction() {
        $posteado = $this->session->get('posteado');
        $estado = $this->elimina();
        if ($estado === 'ERROR') {
            $this->flash->error('ERROR en la aplicacion llamar a mantenimiento ' . $posteado("RefNumber"));
        } else {
            $this->flash->success("El Pedido ha sido eliminado");
        }

        $this->dispatcher->forward([
           'controller' => "customer",
           'action' => "index"
        ]);
    }

    public function elimina() {
        $posteado = $this->session->get('posteado');
        $pedido = Pedidos::findFirst($posteado['RefNumber']);
        if (!$pedido) {
            return "ERROR";
        }
        if (!$pedido->delete()) {

            foreach ($pedido->getMessages() as $message) {
                $this->flash->error($message);
            }

            return "ERROR";
        }
    }

    public function corregirAction() {
        $estado = $this->elimina();
        if ($estado === 'ERROR') {
            $this->flash->error('ERROR en la aplicacion llamar a mantenimiento ' . $posteado("RefNumber"));
            $this->dispatcher->forward([
               'controller' => "customer",
               'action' => 'index'
            ]);
        }
        $posteado = $this->session->get('posteado');
        $codeValue = $posteado['RefNumber'];
        $cliente = Customer::findFirstByListID($posteado['CustomerRef_ListID']);
        $fecha = date('d-m-Y');
        $this->tag->setDefault("RefNumber", $codeValue);
        $this->tag->setDefault("TxnDate", $fecha);
        $this->tag->setDefault("DueDate", $fecha);
        $this->tag->setDefault("PONumber", 'n/a');
        $this->tag->setDefault("Memo", 'n/a');
        $this->tag->setDefault("CustomerRef_ListID", $cliente->ListID);
        $this->tag->setDefault("CustomerRef_FullName", $cliente->FullName);
        $this->tag->setDefault("SalesRepRef_ListID", $cliente->SalesRepRef_ListID);
        $this->tag->setDefault("SalesRepRef_FullName", $cliente->SalesRepRef_FullName);
        $this->tag->setDefault("TermsRef_FullName", $cliente->TermsRef_FullName);
        $this->tag->setDefault("TermsRef_ListID", $cliente->TermsRef_ListID);

        $nivelprecio = 'NORMAL';
        if ($cliente->PriceLevelRef_ListID > ' ') {
            $nivelprecio = $cliente->PriceLevelRef_ListID;
        }

        $l = $this->generaTmp($nivelprecio);
        $this->session->set('prod', $l);
        $d_campo = $this->session->get('campo');
        $d_campo1 = $this->session->get('campo1');
        $d_campo2 = $this->session->get('campo2');
        for ($i = 0; $i === $l; $i++) {
            $valor = $d_campo[$i];
            $campo = 'ingresa' . $i;
            $this->tag->setDefault($campo, $valor);
            $valor = $d_campo1[$i];
            $campo1 = 'cortesia' . $i;
            $this->tag->setDefault($campo1, $valor);
            $valor = $d_campo2[$i];
            $campo2 = 'bonifica' . $i;
            $this->tag->setDefault($campo2, $valor);
        }
        $this->session->set('helados', $this->helados);
        $this->view->form = new PedidosCabForm();
        $this->view->helados = $this->helados;
        $this->view->d_campo = $d_campo;
        $this->view->d_campo1 = $d_campo1;
        $this->view->d_campo2 = $d_campo2;
    }

}
