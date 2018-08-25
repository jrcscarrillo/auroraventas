<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class BodegasController extends ControllerBase {

    public function initialize() {
        $this->tag->setTitle('Clase/Bodega');
        parent::initialize();
    }

    public function indexAction() {
        $this->session->conditions = null;
        $this->view->form = new BodegasForm;
    }

    public function searchAction() {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Bodegas', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "FullName";

        $bodegas = Bodegas::find($parameters);
        if (count($bodegas) == 0) {
            $this->flash->notice("Los parametros de busqueda no han seleccionado clase/bodega alguna");

            $this->dispatcher->forward([
               "controller" => "bodegas",
               "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
           'data' => $bodegas,
           'limit' => 10,
           'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    public function newAction($ListID) {

            $bodega = Bodegas::findFirstByListID($ListID);
            if (!$bodega) {
                $this->flash->error("bodega was not found");
                return $this->dispatcher->forward([
                   'action' => 'index'
                ]);
            }
        $bodega->setStatus("CON-MOV");
        if (!$bodega->save()) {
            foreach ($bodega->getMessages() as $message) {
                $this->flash->error($message);
            }
            return $this->dispatcher->forward([
               'action' => 'index'
            ]);
        }

        $this->flash->success("La bodega acepta movimientos");

        return $this->dispatcher->forward([
           'action' => 'index'
        ]);        
    }

    public function editAction($ListID) {

            $bodega = Bodegas::findFirstByListID($ListID);
            if (!$bodega) {
                $this->flash->error("bodega was not found");
                return $this->dispatcher->forward([
                   'action' => 'index'
                ]);
            }
        $bodega->setStatus("SIN-MOV");
        if (!$bodega->save()) {
            foreach ($bodega->getMessages() as $message) {
                $this->flash->error($message);
            }
            return $this->dispatcher->forward([
               'action' => 'index'
            ]);
        }

        $this->flash->success("La bodega no acepta movimientos");

        return $this->dispatcher->forward([
           'action' => 'index'
        ]);        
    }

    public function saveAction() {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
               'controller' => "bodegas",
               'action' => 'index'
            ]);

            return;
        }

        $ListID = $this->request->getPost("ListID");
        $bodega = Bodegas::findFirstByListID($ListID);

        if (!$bodega) {
            $this->flash->error("bodega does not exist " . $ListID);

            $this->dispatcher->forward([
               'controller' => "bodegas",
               'action' => 'index'
            ]);

            return;
        }

        $bodega->setListid($this->request->getPost("ListID"));
        $bodega->setTimecreated($this->request->getPost("TimeCreated"));
        $bodega->setTimemodified($this->request->getPost("TimeModified"));
        $bodega->setEditsequence($this->request->getPost("EditSequence"));
        $bodega->setName($this->request->getPost("Name"));
        $bodega->setFullname($this->request->getPost("FullName"));
        $bodega->setIsactive($this->request->getPost("IsActive"));
        $bodega->setParentrefListid($this->request->getPost("ParentRef_ListID"));
        $bodega->setParentrefFullname($this->request->getPost("ParentRef_FullName"));
        $bodega->setSublevel($this->request->getPost("Sublevel"));
        $bodega->setStatus($this->request->getPost("Status"));
        $bodega->setEstado($this->request->getPost("Estado"));


        if (!$bodega->save()) {

            foreach ($bodega->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
               'controller' => "bodegas",
               'action' => 'edit',
               'params' => [$bodega->getListid()]
            ]);

            return;
        }

        $this->flash->success("bodega was updated successfully");

        $this->dispatcher->forward([
           'controller' => "bodegas",
           'action' => 'index'
        ]);
    }

}
