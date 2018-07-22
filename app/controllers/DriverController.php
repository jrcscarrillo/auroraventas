<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class DriverController extends ControllerBase {

    public function initialize() {
        $this->tag->setTitle('Choferes');
        parent::initialize();
    }

    public function indexAction() {
        $this->session->conditions = null;
        $this->view->form = new DriverForm;
        $this->tag->setDefault("name", "");
        $this->tag->setDefault("description", "");
        $this->tag->setDefault("phone", "");
    }

    public function searchAction() {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Driver', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "listID";

        $driver = Driver::find($parameters);
        if (count($driver) == 0) {
            $this->flash->notice("Los parametros de busqueda no coiciden con algun chofer");

            $this->dispatcher->forward([
               "controller" => "driver",
               "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
           'data' => $driver,
           'limit' => 10,
           'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    public function newAction() {
        $this->view->form = new DriverNewForm();
    }

    public function editAction($listID) {
        if (!$this->request->isPost()) {

            $driver = Driver::findFirstBylistID($listID);
            if (!$driver) {
                $this->flash->error("Este chofer no esta en la base de datos");

                $this->dispatcher->forward([
                   'controller' => "driver",
                   'action' => 'index'
                ]);

                return;
            }

            $this->view->form = new DriverNewForm();
            $this->tag->setDefault("listID", $driver->getListid());
            $this->tag->setDefault("name", $driver->getName());
            $this->tag->setDefault("description", $driver->getDescription());
            $this->tag->setDefault("address", $driver->getAddress());
            $this->tag->setDefault("phone", $driver->getPhone());
            $this->tag->setDefault("email", $driver->getEmail());
            $this->tag->setDefault("tipoId", $driver->getTipoid());
            $this->tag->setDefault("numeroId", $driver->getNumeroid());
            $this->tag->setDefault("customField1", $driver->getCustomfield1());
        }
    }

    public function createAction() {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
               'controller' => "driver",
               'action' => 'index'
            ]);

            return;
        }

        $driver = new Driver();
        $id = $this->claves->guid();
        $driver->setListid($id);
        $driver->setEditsequence(rand(100, 10000));
        $driver->setName($this->request->getPost("name"));
        $driver->setIsactive(1);
        $driver->setDescription($this->request->getPost("description"));
        $driver->setAddress($this->request->getPost("address"));
        $driver->setPhone($this->request->getPost("phone"));
        $driver->setEmail($this->request->getPost("email", "email"));
        $driver->setTipoid($this->request->getPost("tipoId"));
        $driver->setNumeroid($this->request->getPost("numeroId"));
        $driver->setCustomfield1($this->request->getPost("customField1"));


        if (!$driver->save()) {
            foreach ($driver->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
               'controller' => "driver",
               'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("El chofer fue generado exitosamente");

        $this->dispatcher->forward([
           'controller' => "driver",
           'action' => 'index'
        ]);
    }

    public function saveAction() {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
               'controller' => "driver",
               'action' => 'index'
            ]);

            return;
        }

        $listID = $this->request->getPost("listID");
        $driver = Driver::findFirstBylistID($listID);

        if (!$driver) {
            $this->flash->error("Este chofer no existe " . $listID);

            $this->dispatcher->forward([
               'controller' => "driver",
               'action' => 'index'
            ]);

            return;
        }

        $fecha = date('Y-m-d H:m:s');
        $driver->setTimemodified($fecha);
        $driver->setName($this->request->getPost("name"));
        $driver->setDescription($this->request->getPost("description"));
        $driver->setAddress($this->request->getPost("address"));
        $driver->setPhone($this->request->getPost("phone"));
        $driver->setEmail($this->request->getPost("email", "email"));
        $driver->setTipoid($this->request->getPost("tipoId"));
        $driver->setNumeroid($this->request->getPost("numeroId"));
        $driver->setCustomfield1($this->request->getPost("customField1"));


        if (!$driver->save()) {

            foreach ($driver->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
               'controller' => "driver",
               'action' => 'edit',
               'params' => [$driver->getListid()]
            ]);

            return;
        }

        $this->flash->success("El chofer fue actualizado exitosamente");

        $this->dispatcher->forward([
           'controller' => "driver",
           'action' => 'index'
        ]);
    }

    public function deleteAction($listID) {
        $driver = Driver::findFirstBylistID($listID);
        if (!$driver) {
            $this->flash->error("El chofer no esta registrado");

            $this->dispatcher->forward([
               'controller' => "driver",
               'action' => 'index'
            ]);

            return;
        }

        if (!$driver->delete()) {

            foreach ($driver->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
               'controller' => "driver",
               'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("El chofer ha sido eliminado de nuestra base de datos");

        $this->dispatcher->forward([
           'controller' => "driver",
           'action' => "index"
        ]);
    }

}
