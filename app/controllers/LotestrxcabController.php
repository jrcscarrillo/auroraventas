<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Db\Adapter\Pdo\Mysql as db;
use Phalcon\Paginator\Adapter\Model as Paginator;

class LotestrxcabController extends ControllerBase {

    protected $lotestrxtmp;
    protected $lotestrxcab;
    protected $registro;

    public function initialize() {
        $this->tag->setTitle('Transferencia');
        parent::initialize();
    }

    public function indexAction() {
        $this->session->conditions = null;
        $this->view->form = new LotesCabForm;
    }

    public function searchAction() {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Lotestrxcab', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "RefNumber";

        $lotestrxcab = Lotestrxcab::find($parameters);
        if (count($lotestrxcab) == 0) {
            $this->flash->notice("La busqueda no encontro transferencias con esos argumentos de busqueda");

            $this->dispatcher->forward([
               "controller" => "lotestrxcab",
               "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
           'data' => $lotestrxcab,
           'limit' => 10,
           'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    public function newAction() {
        $this->view->form = new LotesCabNewForm();
    }

    function disponibleAction() {
        if (!$this->request->isPost()) {
            $this->flash->warning('no se han ingresado datos');
            return $this->dispatcher->forward([
                  'controller' => "lotestrxcab",
                  'action' => 'index'
            ]);
        }
        $RefType = $this->request->getPost('RefType');
        $parameters = array('conditions' => '[tipoCod] = "NUMT" AND [type] = :tipotransfer:', 'bind' => array('tipotransfer' => $RefType));
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

        $fecha = date('Y-m-d');

        $lotestrx = new Lotescabtmp();
        $lotestrx->setEstado('INITRANSFER');
        $lotestrx->setTxnDate($fecha);
        $lotestrx->setRefNumber($codeValue);
        $lotestrx->setDestinoTrx($this->request->getPost('destino'));
        $lotestrx->setOrigenTrx($this->request->getPost('origen'));
        $bodega = Bodegas::findFirst([
              "columns" => "ListID, Name",
              "conditions" => "ListID = ?1",
              "bind" => [1 => $this->request->getPost('destino')]
        ]);
        $lotestrx->setDestinoDesc($bodega->Name);
        $bodega = Bodegas::findFirst([
              "columns" => "ListID, Name",
              "conditions" => "ListID = ?1",
              "bind" => [1 => $this->request->getPost('origen')]
        ]);
        $lotestrx->setOrigenDesc($bodega->Name);
        $lotestrx->setTipoTrx($numero->getType());
        $lotestrx->setMemo('n/d');
        if (!$lotestrx->save()) {
            foreach ($lotestrx->getMessages() as $message) {
                $this->flash->error($message);
            }
            return $this->dispatcher->forward([
                  'controller' => "lotestrxcab",
                  'action' => 'index',
            ]);
        }
        $this->tag->setDefault("Memo", "Escriba alguna observacion");
        $this->view->form = new LotesCabNewForm();
        $this->view->lotestrx = $lotestrx;
    }

    function calcularAction($refnumber) {

        if ($this->request->isPost()) {
            $memo = $this->request->getPost('Memo');
        } else {
            $memo = 'n/d';
        }
        $lotestrx = Lotescabtmp::findFirst([
              "conditions" => "[RefNumber] = ?1",
              "bind" => [1 => $refnumber]
        ]);
        $items = Items::find([
              "conditions" => "type = ?1",
              "bind" => [1 => 'Assembly']
        ]);
        foreach ($items as $helado) {
            $lotestrxtmp = new Lotestrxtmp();
            $lotestrxtmp->setDestinoDesc($lotestrx->getDestinoDesc());
            $lotestrxtmp->setDestinoTrx($lotestrx->getDestinoTrx());
            $lotestrxtmp->setOrigenDesc($lotestrx->getOrigenDesc());
            $lotestrxtmp->setOrigenTrx($lotestrx->getOrigenTrx());
            $lotestrxtmp->setRefNumber($lotestrx->getRefNumber());
            $lotestrxtmp->setTxnDate($lotestrx->getTxnDate());
            $lotestrxtmp->setMemo($lotestrx->getMemo());
            $lotestrxtmp->setTipoTrx($lotestrx->getTipoTrx());
            $lotestrxtmp->setItemRefListID($helado->quickbooks_listid);
            $lotestrxtmp->setName($helado->name);
            $lotestrxtmp->setItemRefFullName($helado->description);
            $lotestrxtmp->setSales_Desc($helado->sales_desc);
            $porLote = new Lotestrx();
            $bodega = $lotestrx->getOrigenTrx();
            $producto = $helado->quickbooks_listid;
            $movimiento = $porLote->disponibleBodega($bodega, $producto);
            $lotestrxtmp->setDisponible($movimiento['Disponible']);
            $lotestrxtmp->setSales_Desc($helado->sales_desc);
            if (!$lotestrxtmp->save()) {
                foreach ($lotestrxtmp->getMessages() as $message) {
                    $this->flash->error($message);
                }
                return $this->dispatcher->forward([
                      'controller' => "lotestrxcab",
                      'action' => 'index',
                ]);
            }
        }
        $movimiento = Lotestrxtmp::find([
              "conditions" => "[RefNumber] = ?1",
              "bind" => [1 => $refnumber]
        ]);

        $this->view->form = new LotesCabNewForm();
        $this->view->lotestrx = $lotestrx;
        $this->view->helados = $movimiento;
    }

    public function editAction($TxnID) {
        if (!$this->request->isPost()) {

            $lotestrxcab = Lotestrxcab::findFirstByTxnID($TxnID);
            if (!$lotestrxcab) {
                $this->flash->error("lotestrxcab was not found");

                $this->dispatcher->forward([
                   'controller' => "lotestrxcab",
                   'action' => 'index'
                ]);

                return;
            }

            $this->view->TxnID = $lotestrxcab->getTxnid();

            $this->tag->setDefault("TxnID", $lotestrxcab->getTxnid());
            $this->tag->setDefault("TimeCreated", $lotestrxcab->getTimecreated());
            $this->tag->setDefault("TimeModified", $lotestrxcab->getTimemodified());
            $this->tag->setDefault("EditSequence", $lotestrxcab->getEditsequence());
            $this->tag->setDefault("TxnDate", $lotestrxcab->getTxndate());
            $this->tag->setDefault("RefNumber", $lotestrxcab->getRefnumber());
            $this->tag->setDefault("OrigenID", $lotestrxcab->getOrigenid());
            $this->tag->setDefault("DestinoID", $lotestrxcab->getDestinoid());
            $this->tag->setDefault("VehicleID", $lotestrxcab->getVehicleid());
            $this->tag->setDefault("RouteID", $lotestrxcab->getRouteid());
            $this->tag->setDefault("DriverID", $lotestrxcab->getDriverid());
            $this->tag->setDefault("Responsable", $lotestrxcab->getResponsable());
            $this->tag->setDefault("Status", $lotestrxcab->getStatus());
            $this->tag->setDefault("Estado", $lotestrxcab->getEstado());
        }
    }

    public function createAction() {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
               'controller' => "lotestrxcab",
               'action' => 'index'
            ]);

            return;
        }

        $lotestrxcab = new Lotestrxcab();
        $lotestrxcab->setTxnid($this->request->getPost("TxnID"));
        $lotestrxcab->setTimecreated($this->request->getPost("TimeCreated"));
        $lotestrxcab->setTimemodified($this->request->getPost("TimeModified"));
        $lotestrxcab->setEditsequence($this->request->getPost("EditSequence"));
        $lotestrxcab->setTxndate($this->request->getPost("TxnDate"));
        $lotestrxcab->setRefnumber($this->request->getPost("RefNumber"));
        $lotestrxcab->setOrigenid($this->request->getPost("OrigenID"));
        $lotestrxcab->setDestinoid($this->request->getPost("DestinoID"));
        $lotestrxcab->setVehicleid($this->request->getPost("VehicleID"));
        $lotestrxcab->setRouteid($this->request->getPost("RouteID"));
        $lotestrxcab->setDriverid($this->request->getPost("DriverID"));
        $lotestrxcab->setResponsable($this->request->getPost("Responsable"));
        $lotestrxcab->setStatus($this->request->getPost("Status"));
        $lotestrxcab->setEstado($this->request->getPost("Estado"));


        if (!$lotestrxcab->save()) {
            foreach ($lotestrxcab->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
               'controller' => "lotestrxcab",
               'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("lotestrxcab was created successfully");

        $this->dispatcher->forward([
           'controller' => "lotestrxcab",
           'action' => 'index'
        ]);
    }

    public function saveAction($refnumber) {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward([
                  'action' => 'index'
            ]);
        }
        $cabecera = Lotescabtmp::findFirst([
              "conditions" => "[RefNumber] = ?1",
              "bind" => [1 => $refnumber]
        ]);

        $movimiento = Lotestrxtmp::find([
              "conditions" => "[RefNumber] = ?1",
              "bind" => [1 => $refnumber]
        ]);
        $flagError = false;
        $ix = 0;
        foreach ($movimiento as $provar) {
            $campo = 'ingresa' . $ix;
            $campoA = 'memo' . $ix;
            if($this->request->getPost($campo)){
                $valordato1 = $this->request->getPost($campo);
            } else {
                $valordato1 = 0;
            }
            if($this->request->getPost($campoA)){
                $valordato2 = $this->request->getPost($campoA);
            } else {
                $valordato2 = ' ';
            }
            $provar->setQtyTrx($valordato1);
            $provar->setMemoTrx($valordato2);
            if ($provar->getQtyTrx() > $provar->getDisponible()) {
                $flagError = true;
                $provar->setMemo('Cantidad transferida es mayor que el disponible');
            }
            $provar->save();
            $ix++;
        }
        if ($flagError) {
            $this->flash->warning('Cantidad transferida es mayor que el disponible');
            return $this->dispatcher->forward([
                  'controller' => "lotestrxcab",
                  'action' => 'index'
            ]);
        }
        $aprobado = Lotestrxtmp::find([
              "conditions" => "[RefNumber] = ?1",
              "bind" => [1 => $refnumber]
        ]);
        $firstTime = true;
        foreach ($aprobado as $paleta) {
            if ($firstTime) {
                $firstTime = false;
                $lotestrxcab = new Lotestrxcab();
                $clave = $this->claves->guid();
                $lotestrxcab->setTxnID($clave);
                $lotestrxcab->setOrigenID($paleta->getOrigenTrx());
                $lotestrxcab->setDestinoID($paleta->getDestinoTrx());
                $lotestrxcab->setEditSequence(rand(1500, 15000));
                $lotestrxcab->setEstado('CERRADO');
                $lotestrxcab->setRefType($paleta->getTipoTrx());
                $lotestrxcab->setRefNumber($paleta->getRefNumber());
                $lotestrxcab->setTxnDate(date('Y-m-d'));
                if (!$lotestrxcab->save()) {

                    foreach ($lotestrxcab->getMessages() as $message) {
                        $this->flash->error($message);
                    }

                    return $this->dispatcher->forward([
                          'action' => 'index',
                    ]);
                }
            }

            if ($paleta->QtyTrx > 0) {
                $lotestrx = new Lotestrx();
                $lotestrx->setIDKEY($clave);
                $clavex = $this->claves->guid();
                $lotestrx->setTxnLineID($clavex);
                $lotestrx->setDestinoTrx($paleta->DestinoTrx);
                $lotestrx->setDestinoSub($paleta->DestinoTrx);
                $lotestrx->setQtyTrx($paleta->QtyTrx);
                $lotestrx->setEditSequence(rand(25000, 750000));
                $lotestrx->setEstado('CERRADO');
                $lotestrx->setFechaTrx(date('Y-m-d'));
                $lotestrx->setItemRefFullName($paleta->ItemRef_FullName);
                $lotestrx->setItemRefListID($paleta->ItemRef_ListID);
                $lotestrx->setMemo($cabecera->Memo);
                $lotestrx->setMemoTrx($paleta->MemoTrx);
                $lotestrx->setNumeroTrx($paleta->RefNumber);
                $lotestrx->setOrigenTrx($paleta->OrigenTrx);
                $lotestrx->setOrigenSub($paleta->OrigenTrx);
                $lotestrx->setRefNumber($paleta->RefNumber);
                $lotestrx->setTipoTrx($paleta->TipoTrx);
                $lotestrx->setTxnDate($paleta->TxnDate);
//                $this->flash->notice($paleta->MemoTrx . " producto " . $paleta->ItemRef_FullName . " cantidad " . $paleta->QtyTrx);
                if (!$lotestrx->save()) {

                    foreach ($lotestrx->getMessages() as $message) {
                        $this->flash->error($message);
                    }

                    return $this->dispatcher->forward([
                          'action' => 'index',
                    ]);
                }
            }
        }
        $this->flash->success("Se han generado los movimientos de inventarios de la transferencia " . $refnumber);

        $this->dispatcher->forward([
           'controller' => "lotestrxcab",
           'action' => "index"
        ]);
    }

    public function deleteAction($TxnID) {
        $lotestrxcab = Lotestrxcab::findFirstByTxnID($TxnID);
        if (!$lotestrxcab) {
            $this->flash->error("lotestrxcab was not found");

            $this->dispatcher->forward([
               'controller' => "lotestrxcab",
               'action' => 'index'
            ]);

            return;
        }

        if (!$lotestrxcab->delete()) {

            foreach ($lotestrxcab->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
               'controller' => "lotestrxcab",
               'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("lotestrxcab was deleted successfully");

        $this->dispatcher->forward([
           'controller' => "lotestrxcab",
           'action' => "index"
        ]);
    }

    function imprimirAction($TxnID) {
        
        $this->session->set('transferencia', $TxnID);
        $this->topdf->llenaFactura();
        $RefNumber = $this->toprttrf->imprimeTransferencia();
        $this->flash->notice('Se ha generado el reporte de la transferencia #' . $RefNumber);
        return $this->dispatcher->forward([
           'action' => 'index'
        ]);

        
    }

}
