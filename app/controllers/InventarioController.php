<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

date_default_timezone_set('America/Guayaquil');

class InventarioController extends ControllerBase {

    public function initialize() {
        $this->tag->setTitle('Inventario Inicial');
        parent::initialize();
    }

    public function indexAction() {
        $this->session->conditions = null;
        $this->view->form = new InventarioIndexForm;
    }

    public function newAction() {
        $this->session->conditions = null;
        $this->view->form = new InventarioNewForm;
    }

    public function searchAction() {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Lotestrx', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
//        if (!is_array($parameters)) {
            $parameters = [];
//        }
        $parameters["order"] = "RefNumber";
        $parameters["conditions"] = '[TxnDate] = "' . $this->request->getPost('TxnDate') . '" AND [TipoTrx] = "INVENTARIO-INICIAL"';
        $parameters["conditions"] = '[TipoTrx] = "INVENTARIO-INICIAL"';

        $inventario = Lotestrx::find($parameters);
        if (count($inventario) == 0) {
            $this->flash->notice("Los parametros de busqueda no han encontrado lotes");

            $this->dispatcher->forward([
               "controller" => "inventario",
               "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
           'data' => $inventario,
           'limit' => 100,
           'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    public function createAction() {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
               'controller' => "inventario",
               'action' => 'index'
            ]);

            return;
        }
        $parameters = array('conditions' => '[tipoCod] = "NUM" AND [type] = "TOMAFISICA"');
        $numero = Codetype::findFirst($parameters);
        if (!$numero) {

            $this->flash->error("No existe numeracion para la toma fisica");

            $this->dispatcher->forward([
               'action' => 'index'
            ]);
        }
        $codeValue = $numero->getCodeValue();
        $codeValue++;
        $numero->setCodeValue($codeValue);
        if (!$numero->save()) {

            foreach ($numero->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward([
                  'controller' => "index",
                  'action' => 'index',
            ]);
        }
        $parameters = array('conditions' => '[quickbooks_listid] = "' . $this->request->getPost('ItemRef_ListID') . '"');
        $item = Items::findFirst($parameters);
        $sales_desc = $item->sales_desc; 
        $lotestrxcab = new Lotestrxcab();
        $lotestrx = new Lotestrx();

        $clave = $this->claves->guid();
        $lotestrxcab->setTxnID($clave);
        $lotestrx->setIDKEY($clave);
        $clave = $this->claves->guid();
        $lotestrx->setTxnLineID($clave);

        $lotestrxcab->setOrigenID($lotestrx->getOrigenTomaFisica());
        $lotestrxcab->setDestinoID($this->request->getPost('DestinoTrx'));
        $lotestrx->setDestinoTrx($this->request->getPost('DestinoTrx'));
        $lotestrx->setQtyTrx($this->request->getPost('QtyTrx'));


        $lotestrxcab->setEditSequence(rand(1500, 15000));
        $lotestrxcab->setEstado('CERRADO');
        $lotestrxcab->setRefNumber($codeValue);
        $lotestrxcab->setTxnDate($this->request->getPost('TxnDate'));

        $lotestrx->setEditSequence(rand(25000, 750000));
        $lotestrx->setEstado('CERRADO');
        $lotestrx->setFechaTrx(date('Y-m-d'));
        $lotestrx->setItemRefFullName($sales_desc);
        $lotestrx->setItemRefListID($this->request->getPost('ItemRef_ListID'));
        $lotestrx->setMemoTrx($this->request->getPost('MemoTrx'));
        $lotestrx->setNumeroTrx($codeValue);
        $lotestrx->setOrigenTrx($lotestrx->getOrigenTomaFisica());
        $lotestrx->setRefNumber($codeValue);
        $lotestrx->setTipoTrx('INVENTARIO-INICIAL');
        $lotestrxcab->setRefType('INVENTARIO-INICIAL');
        $lotestrx->setTxnDate($this->request->getPost('TxnDate'));

        if (!$lotestrxcab->save()) {

            foreach ($lotestrxcab->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward([
                  'controller' => "lotesdetalle",
                  'action' => 'index',
            ]);
        }

        if (!$lotestrx->save()) {

            foreach ($lotestrx->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward([
                  'controller' => "lotesdetalle",
                  'action' => 'index',
            ]);
        }

        $this->flash->success("Toma fisica inicial del " . $lotestrx->getItemRefFullName() . " por " . $this->request->getPost('QtyTrx') . " ha sido grabado satisfactoriamente");

        $this->dispatcher->forward([
           'action' => 'new'
        ]);
    }

        public function deleteAction($TxnLineID)
    {
        $lotestrx = Lotestrx::findFirstByTxnLineID($TxnLineID);
        if (!$lotestrx) {
            $this->flash->error("Ese inventario inicial no ha sido encontrado");

            return $this->dispatcher->forward([
                'action' => 'index'
            ]);
        }

        if (!$lotestrx->delete()) {

            foreach ($lotestrx->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward([
                'action' => 'search'
            ]);
        }

        $this->flash->success("Este producto " . $lotestrx->ItemRef_FullName . " con "  . $lotestrx->QtyTrx . " unidades ha sido eliminado del inventario inicial");

        $this->dispatcher->forward([
            'action' => "search"
        ]);
    }

}
