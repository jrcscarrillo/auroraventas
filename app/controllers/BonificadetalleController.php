<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class BonificadetalleController extends ControllerBase {

    private $tipo;
    private $inidate;
    private $findate;

    public function initialize() {
        $this->tag->setTitle('Bonificaciones');
        parent::initialize();
    }

    public function indexAction() {
        $form = new BonificaindexForm;
        $this->view->form = $form;
    }

    public function searchAction() {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Bonificadetalle', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "TxnLineID";

        $bonificadetalle = Bonificadetalle::find($parameters);
        if (count($bonificadetalle) == 0) {
            $this->flash->notice("The search did not find any bonificadetalle");

            $this->dispatcher->forward([
               "controller" => "bonificadetalle",
               "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
           'data' => $bonificadetalle,
           'limit' => 10,
           'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    public function imprimirAction() {
        $this->tipo = $this->request->getPost('tipo');
        $this->inidate = $this->request->getPost('iniDate');
        $this->findate = $this->request->getPost('finDate');
        $this->session->set('bonifica', array(
           'iniDate' => $this->request->getPost('iniDate'),
           'finDate' => $this->request->getPost('finDate'),
           'proceso' => $this->request->getPost('tipo')
        ));
        $vendedor = Pedidos::find([
              'conditions' => 'TxnDate >= :iniDate: AND TxnDate <= :finDate:',
              'bind' => ['iniDate' => $this->inidate, 'finDate' => $this->findate],
              'order' => 'SalesRepRef_FullName'
        ]);
        if (!$vendedor) {
            $this->flash->error('No hay pedidos on bonificaciones ');
            $this->dispatcher->forward([
               'controller' => "bonificadetalle",
               'action' => 'index',
            ]);
            return;
        }
        if ($this->tipo === "1") {
            $this->topdfbonifica->imprimeBonifica($vendedor);
        } elseif ($this->tipo === "2") {
            
        } elseif ($this->tipo === "3") {
            
        } elseif ($this->tipo === "4") {
            $this->facturarAhora();
        }
    }

    public function facturarAhora() {
        $vendedor = Pedidos::find([
              'conditions' => 'TxnDate >= :iniDate: AND TxnDate <= :finDate:',
              'bind' => ['iniDate' => $this->inidate, 'finDate' => $this->findate],
              'order' => 'SalesRepRef_FullName'
        ]);
        $acum = array();
        foreach ($vendedor as $linea) {
            $lineaproducto = $linea->bonificadetalle;

            foreach ($lineaproducto as $producto) {
                $prod = $producto->ItemRef_ListID;
                $acum[$prod]['rate'] = $producto->Rate;
                $acum[$prod]['fullname'] = $producto->ItemRef_FullName;
                $acum[$prod]['descripcion'] = $producto->Description;
                $acum[$prod]['cantidad'] = $acum[$prod]['cantidad'] + $producto->Quantity;
            }
        }
//        print_r($acum);
        $this->saveventas($acum);
    }

    public function saveventas($acum) {

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
        $fecha = date('Y-m-d H:m:s');
        $pedido = new Pedidos();
        $pedido->setTxnID($codeValue);

        $pedido->setTimeCreated($fecha);
        $pedido->setTimeModified($fecha);
        $pedido->setTxnNumber($codeValue);
        $pedido->setTxnDate(date('Y-m-d H:m:s', strtotime($fecha)));
        $pedido->setRefNumber($codeValue);
        $pedido->setPONumber('Bonificaciones');
        $pedido->setDueDate(date('Y-m-d H:m:s', strtotime($fecha)));
        $pedido->setSubtotal(0);
        $pedido->setSalesTaxTotal(0);
        $pedido->setTotalAmount(0);
        $pedido->setIsManuallyClosed('false');
        $pedido->setIsFullyInvoiced('false');
        $pedido->setMemo('Facturar las bonificaciones');
        $pedido->setCustomerRefListID("80000554-1333656345");
        $pedido->setCustomerRefFullName("HELADERIAS COFRUNAT (INTERNOS)");
        $pedido->setTermsRefListID("80000004-1316622029");
        $pedido->setTermsRefFullName("Contado");
        $pedido->setSalesRepRefListID(" ");
        $pedido->setSalesRepRefFullName(" ");
        if (!$pedido->save()) {
            foreach ($pedido->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
               'controller' => "customer",
               'action' => 'search'
            ]);
        }

        $w_iva = 0.00;
        $w_subtotal = 0.00;
        $w_total = 0.00;
        $w_cien = 12;
        $i = 0;
        foreach ($acum as $key => $value) {

            if ($value['cantidad'] > 0) {
                $pedidosdetalle = new Pedidosdetalle();
                $pedidosdetalle->setTxnLineID($codeValue . $i);
                $pedidosdetalle->setItemRefListID($key);
                $pedidosdetalle->setItemRefFullName($value['fullname']);
                $pedidosdetalle->setDescription($value['descripcion']);

                $pedidosdetalle->setQuantity($value['cantidad']);
                $pedidosdetalle->setUnitOfMeasure('ea');
                $pedidosdetalle->setRate($value['rate']);
                $pedidosdetalle->setRatePercent(0);
                $amount = $value['rate'] * $value['cantidad'];
                $w_subtotal = $w_subtotal + $amount;
                $w_iva = $w_iva + ($amount * $w_cien / 100);
                $pedidosdetalle->setAmount($amount);
                $pedidosdetalle->setInventorySiteRefListID('n/a');
                $pedidosdetalle->setInventorySiteRefFullName('n/a');
                $pedidosdetalle->setSerialNumber('n/a');
                $pedidosdetalle->setLotNumber('n/a');
                $pedidosdetalle->setInvoiced('false');
                $pedidosdetalle->setIsManuallyClosed('false');
                $pedidosdetalle->setOther1('n/a');
                $pedidosdetalle->setOther2('n/a');
                $pedidosdetalle->setIDKEY($codeValue);
                $pedidosdetalle->setSalesTaxCodeRefListID('80000001-1316622024');
                $pedidosdetalle->setSalesTaxCodeRefFullName('Tax');
                $i++;

                if (!$pedidosdetalle->save()) {
                    foreach ($pedidosdetalle->getMessages() as $message) {
                        $this->flash->error($message);
                    }

                    $this->dispatcher->forward([
                       'controller' => "customer",
                       'action' => 'search'
                    ]);
                }
            }
        }

        $reg = Pedidos::findFirstByTxnID($codeValue);
        $reg->setSubtotal($w_subtotal);
        $reg->setSalesTaxTotal($w_iva);
        $reg->setTotalAmount($w_subtotal + $w_iva);
        $reg->setStatus('PASADO');

        if (!$reg->save()) {
            foreach ($reg->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
               'controller' => "customer",
               'action' => 'search'
            ]);
        }
        $this->flash->notice('Se ha generado el pedido numero ' . $codeValue);
        $this->dispatcher->forward([
           'controller' => "bonificadetalle",
           'action' => 'index'
        ]);
    }

}
