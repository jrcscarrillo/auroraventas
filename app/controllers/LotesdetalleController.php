<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

date_default_timezone_set('America/Guayaquil');

class LotesdetalleController extends ControllerBase {

    public function initialize() {
        $this->tag->setTitle('Lote Produccion');
        parent::initialize();
    }

    public function indexAction() {
        $this->session->conditions = null;
        $this->view->form = new LotesdetalleForm;
    }

    public function searchAction() {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Lotesdetalle', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "RefNumber";

        $lotesdetalle = Lotesdetalle::find($parameters);
        if (count($lotesdetalle) == 0) {
            $this->flash->notice("Los parametros de busqueda no han encontrado lotes");

            $this->dispatcher->forward([
               "controller" => "lotesdetalle",
               "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
           'data' => $lotesdetalle,
           'limit' => 100,
           'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    public function saveproduccionAction() {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
               'controller' => "lotesdetalle",
               'action' => 'index'
            ]);

            return;
        }

        $TxnID = $this->request->getPost("TxnID");
        $lotesdetalle = Lotesdetalle::findFirstByTxnID($TxnID);

        if (!$lotesdetalle) {
            $this->flash->error("Este lote no existe " . $TxnID);

            $this->dispatcher->forward([
               'controller' => "lotesdetalle",
               'action' => 'search'
            ]);

            return;
        }

        $fecha = date('Y-m-d H:m:s');
        $lotesdetalle->setTimeModified($fecha);
        $lotesdetalle->setBodBuena($this->request->getPost("tipoBuenos"));
        $lotesdetalle->setBodMala($this->request->getPost("tipoMalos"));
        $lotesdetalle->setBodReproceso($this->request->getPost("tipoReproceso"));
        $lotesdetalle->setBodMuestra($this->request->getPost("tipoMuestra"));
        $lotesdetalle->setBodLab($this->request->getPost("tipoLab"));
        $lotesdetalle->setBodProducida($this->request->getPost("tipoProd"));
        $lotesdetalle->setQtyBuena($this->request->getPost("QtyBuena"));
        $lotesdetalle->setQtyMala($this->request->getPost("QtyMala"));
        $lotesdetalle->setQtyReproceso($this->request->getPost("QtyReproceso"));
        $lotesdetalle->setQtyMuestra($this->request->getPost("QtyMuestra"));
        $lotesdetalle->setQtyLab($this->request->getPost("QtyLab"));
        $lotesdetalle->setMemo($this->request->getPost("Memo"));
        if ($lotesdetalle->QtyProducida != ($this->request->getPost("QtyBuena") + $this->request->getPost("QtyMala") + $this->request->getPost("QtyReproceso") + $this->request->getPost("QtyMuestra") + $this->request->getPost("QtyLab"))) {
            $lotesdetalle->setEstado("ERRORES");
        } else {
            $lotesdetalle->setEstado("PROCESADO");
        }
        if (!$lotesdetalle->save()) {

            foreach ($lotesdetalle->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward([
               'action' => 'index'
            ]);
        }
        $estado = "INIT";
        if ($lotesdetalle->QtyProducida != ($this->request->getPost("QtyBuena") + $this->request->getPost("QtyMala") + $this->request->getPost("QtyReproceso") + $this->request->getPost("QtyMuestra") + $this->request->getPost("QtyLab"))) {
            $this->flash->warning("La suma no coincide con la cantidad producida");
            $estado = "ERROR";
        }
        $nro_bod = 0;
        $arm_bodegas = array();
        if ($this->request->getPost("QtyBuena") > 0) {
            $nro_bod ++;
            array_push($arm_bodegas, $lotesdetalle->BodBuena);
            if ($lotesdetalle->BodBuena === 'SIN BODEGA') {
                $this->flash->warning("Bodega de buenos invalida");
                $estado = "ERROR";
            }
        } 
        if ($this->request->getPost("QtyMala") > 0) {
            $nro_bod ++;
            array_push($arm_bodegas, $lotesdetalle->BodMala);
            if ($lotesdetalle->BodMala === 'SIN BODEGA') {
                $this->flash->warning("Bodega de malos invalida");
                $estado = "ERROR";
            }
        } 
        if ($this->request->getPost("QtyReproceso")  > 0) {
            $nro_bod ++;
            array_push($arm_bodegas, $lotesdetalle->BodReproceso);
            if ($lotesdetalle->BodReproceso === 'SIN BODEGA') {
                $this->flash->warning("Bodega de reproceso invalida");
                $estado = "ERROR";
            }
        } 
        if ($this->request->getPost("QtyMuestra") > 0) {
            $nro_bod ++;
            array_push($arm_bodegas, $lotesdetalle->BodMuestra);
            if ($lotesdetalle->BodMuestra === 'SIN BODEGA') {
                $this->flash->warning("Bodega de muestras invalida");
                $estado = "ERROR";
            }
        } 
        if ($this->request->getPost("QtyLab") > 0) {
            $nro_bod ++;
            array_push($arm_bodegas, $lotesdetalle->BodLab);
            if ($lotesdetalle->BodLab === 'SIN BODEGA') {
                $this->flash->warning("Bodega de laboratorio invalida");
                $estado = "ERROR";
            }
        } 
        if ($lotesdetalle->QtyProducida > 0) {
            $nro_bod ++;
            array_push($arm_bodegas, $lotesdetalle->BodProducida);
            if ($lotesdetalle->BodProducida === 'SIN BODEGA') {
                $this->flash->warning("Bodega de descarga materia prima invalida");
                $estado = "ERROR";
            }
        }
        $duplicados = array_count_values($arm_bodegas);
        $num = count($duplicados);
        if ($num < $nro_bod) {
            $this->flash->warning("Existen bodegas duplicadas");
            $estado = "ERROR";
        }

        if ($estado != "INIT") {
            $this->view->lotesdetalle = $lotesdetalle;
            $this->view->form = new ProduccionForm();
            $this->tag->setDefault("tipoBuenos", $lotesdetalle->getBodBuena());
            $this->tag->setDefault("tipoMalos", $lotesdetalle->getBodMala());
            $this->tag->setDefault("tipoReproceso", $lotesdetalle->getBodReproceso());
            $this->tag->setDefault("tipoMuestra", $lotesdetalle->getBodMuestra());
            $this->tag->setDefault("tipoLab", $lotesdetalle->getBodLab());
            $this->tag->setDefault("tipoProd", $lotesdetalle->getBodProducida());
            $this->tag->setDefault("TxnID", $lotesdetalle->getTxnID());
            $this->tag->setDefault("QtyBuena", $lotesdetalle->getQtyBuena());
            $this->tag->setDefault("QtyMala", $lotesdetalle->getQtyMala());
            $this->tag->setDefault("QtyReproceso", $lotesdetalle->getQtyReproceso());
            $this->tag->setDefault("QtyMuestra", $lotesdetalle->getQtyMuestra());
            $this->tag->setDefault("QtyLab", $lotesdetalle->getQtyLab());
            $this->tag->setDefault("Memo", $lotesdetalle->getMemo());
            return $this->dispatcher->forward([
                  'controller' => "lotesdetalle",
                  'action' => 'procesar',
                  'params' => [$lotesdetalle->getTxnID()]
            ]);
        }
        $this->flash->success("La orden de produccion " . $lote->RefNumber . "fue procesada satisfactoriamente");

        return $this->dispatcher->forward([
              'controller' => "lotesdetalle",
              'action' => 'search'
        ]);
    }

    public function procesarAction($TxnID) {
        if (!$this->request->isPost()) {

            $lotesdetalle = Lotesdetalle::findFirstByTxnID($TxnID);
            if (!$lotesdetalle) {
                $this->flash->error("El lote no ha sido encontrado");

                $this->dispatcher->forward([
                   'controller' => "lotesdetalle",
                   'action' => 'index'
                ]);

                return;
            }

            if ($lotesdetalle->getEstado() === 'CERRADO') {
                $this->flash->error("El lote " . $lotesdetalle->getRefNumber() . "ya fue previamente cerrado ");

                $this->dispatcher->forward([
                   'controller' => "lotesdetalle",
                   'action' => 'index'
                ]);

                return;
            }
            $this->view->lotesdetalle = $lotesdetalle;
            $this->view->form = new ProduccionForm();
            $this->tag->setDefault("tipoBuenos", $lotesdetalle->getBodBuena());
            $this->tag->setDefault("tipoMalos", $lotesdetalle->getBodMala());
            $this->tag->setDefault("tipoReproceso", $lotesdetalle->getBodReproceso());
            $this->tag->setDefault("tipoMuestra", $lotesdetalle->getBodMuestra());
            $this->tag->setDefault("tipoLab", $lotesdetalle->getBodLab());
            $this->tag->setDefault("tipoProd", $lotesdetalle->getBodProducida());
            $this->tag->setDefault("TxnID", $lotesdetalle->getTxnID());
            $this->tag->setDefault("QtyBuena", $lotesdetalle->getQtyBuena());
            $this->tag->setDefault("QtyMala", $lotesdetalle->getQtyMala());
            $this->tag->setDefault("QtyReproceso", $lotesdetalle->getQtyReproceso());
            $this->tag->setDefault("QtyMuestra", $lotesdetalle->getQtyMuestra());
            $this->tag->setDefault("QtyLab", $lotesdetalle->getQtyLab());
            $this->tag->setDefault("Memo", $lotesdetalle->getMemo());
        }
    }

    public function cerrarAction($TxnID) {
        $lotesdetalle = Lotesdetalle::findFirstByTxnID($TxnID);
        if (!$lotesdetalle) {
            $this->flash->error("El lote no ha sido encontrado");

            return $this->dispatcher->forward([
                  'controller' => "lotesdetalle",
                  'action' => 'index'
            ]);
        }
        if ($lotesdetalle->getEstado() === 'CERRADO') {
            $this->flash->error("El lote " . $lotesdetalle->getRefNumber() . " ya fue previamente cerrado ");

            return $this->dispatcher->forward([
                  'controller' => "lotesdetalle",
                  'action' => 'search'
            ]);
        }
        $lotesdetalle->setEstado("CERRADO");
        if (!$lotesdetalle->save()) {

            foreach ($lotesdetalle->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
               'controller' => "lotesdetalle",
               'action' => 'index'
            ]);

            return;
        }

        for ($index = 1; $index < 6; $index++) {
            $procesa = 'NO';
            switch ($index) {
                case 1:
                    if ($lotesdetalle->getQtyBuena() > 0) {
                        $procesa = 'SI';
                    }
                    break;
                case 2:
                    if ($lotesdetalle->getQtyMala() > 0) {
                        $procesa = 'SI';
                    }
                    break;
                case 3:
                    if ($lotesdetalle->getQtyMuestra() > 0) {
                        $procesa = 'SI';
                    }
                    break;
                case 4:
                    if ($lotesdetalle->getQtyReproceso() > 0) {
                        $procesa = 'SI';
                    }
                    break;
                case 5:
                    if ($lotesdetalle->getQtyLab() > 0) {
                        $procesa = 'SI';
                    }
                    break;
            }
            if ($procesa === 'SI') {
                $parameters = array('conditions' => '[tipoCod] = "NUM" AND [type] = "PRODUCCION"');
                $numero = Codetype::findFirst($parameters);
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
                $lotestrxcab = new Lotestrxcab();
                $lotestrx = new Lotestrx();

                $clave = $this->claves->guid();
                $lotestrxcab->setTxnID($clave);
                $lotestrx->setIDKEY($clave);
                $clave = $this->claves->guid();
                $lotestrx->setTxnLineID($clave);

                $lotestrxcab->setOrigenID($lotesdetalle->getBodProducida());
                switch ($index) {
                    case 1;
                        $lotestrxcab->setDestinoID($lotesdetalle->getBodBuena());
                        $lotestrx->setDestinoTrx($lotesdetalle->getBodBuena());
                        $lotestrx->setDestinoSub($lotesdetalle->getBodBuena());
                        $lotestrx->setQtyTrx($lotesdetalle->getQtyBuena());
                        break;
                    case 2;
                        $lotestrxcab->setDestinoID($lotesdetalle->getBodMala());
                        $lotestrx->setDestinoTrx($lotesdetalle->getBodMala());
                        $lotestrx->setDestinoSub($lotesdetalle->getBodMala());
                        $lotestrx->setQtyTrx($lotesdetalle->getQtyMala());
                        break;
                    case 3;
                        $lotestrxcab->setDestinoID($lotesdetalle->getBodMuestra());
                        $lotestrx->setDestinoTrx($lotesdetalle->getBodMuestra());
                        $lotestrx->setDestinoSub($lotesdetalle->getBodMuestra());
                        $lotestrx->setQtyTrx($lotesdetalle->getQtyMuestra());
                        break;
                    case 4;
                        $lotestrxcab->setDestinoID($lotesdetalle->getBodReproceso());
                        $lotestrx->setDestinoTrx($lotesdetalle->getBodReproceso());
                        $lotestrx->setDestinoSub($lotesdetalle->getBodReproceso());
                        $lotestrx->setQtyTrx($lotesdetalle->getQtyReproceso());
                        break;
                    case 5;
                        $lotestrxcab->setDestinoID($lotesdetalle->getBodLab());
                        $lotestrx->setDestinoTrx($lotesdetalle->getBodLab());
                        $lotestrx->setDestinoSub($lotesdetalle->getBodLab());
                        $lotestrx->setQtyTrx($lotesdetalle->getQtyLab());
                        break;
                }


                $lotestrxcab->setEditSequence(rand(1500, 15000));
                $lotestrxcab->setEstado('CERRADO');
                $lotestrxcab->setRefNumber($codeValue);
                $lotestrxcab->setTxnDate(date('Y-m-d'));

                $lotestrx->setEditSequence(rand(25000, 750000));
                $lotestrx->setEstado('CERRADO');
                $lotestrx->setFechaTrx(date('Y-m-d'));
                $lotestrx->setItemRefFullName($lotesdetalle->getItemRefFullName());
                $lotestrx->setItemRefListID($lotesdetalle->getItemRefListID());
                $lotestrx->setMemo($lotesdetalle->getMemo());
                $lotestrx->setMemoTrx('n/d');
                $lotestrx->setNumeroTrx($codeValue);
                $lotestrx->setOrigenTrx($lotesdetalle->getBodProducida());
                $lotestrx->setOrigenSub($lotesdetalle->getBodProducida());
                $lotestrx->setRefNumber($lotesdetalle->getRefNumber());
                $lotestrx->setTipoTrx('ORDEN-PRODUCCION');
                $lotestrxcab->setRefType('ORDEN-PRODUCCION');
                $lotestrx->setTxnDate($lotesdetalle->getTxnDate());

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
            }
        }

        $this->flash->success("El lote " . $lotesdetalle->getRefNumber() . " ha sido cerrado satisfactoriamente");
        /**
         *      SOLO PARA PROBAR CALCULO DE DISPONIBLES
         */
//        $bodega = $lotestrx->getOrigenTrx();
//        $producto = $lotestrx->getItemRefListID();
//        $movimiento = $lotestrx->disponibleBodega($bodega, $producto);
//        $this->flash->success("El lote tiene Ingresos =>" . $movimiento['Ingresos'] . " y Egresos => " . $movimiento['Egresos']);
//        $this->dispatcher->forward([
//           'controller' => "lotesdetalle",
//           'action' => "index"
//        ]);
    }

}
