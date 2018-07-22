<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class AppliedtosyncController extends ControllerBase {

    public function initialize() {
        $this->tag->setTitle('Fechas');
        parent::initialize();
    }

    public function indexAction() {
        $this->session->conditions = null;
        $this->view->form = new FechasForm;
    }

    public function saveAction()
    {
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(
                [
                    "controller" => "appliedtosync",
                    "action"     => "index",
                ]
            );
        }
        $id = $this->request->getPost("id", "int");
        $modelo = Fechas::findFirstById($id);
        if (!$modelo) {
            $this->flash->error("Fecha de sincronizacion No existe");

            return $this->dispatcher->forward(
                [
                    "controller" => "appliedtosync",
                    "action"     => "index",
                ]
            );
        }

        $form = new FechasForm;

        $data = $this->request->getPost();
        if (!$form->isValid($data, $modelo)) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                [
                    "controller" => "appliedtosync",
                    "action"     => "index",
                ]
            );
        }

        if ($modelo->save() == false) {
            foreach ($modelo->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                [
                    "controller" => "appliedtosync",
                    "action"     => "edit",
                ]
            );
        }

        $form->clear();

        $this->flash->success("Fecha de sincronizacion ha sido actualizada");

        return $this->dispatcher->forward(
            [
                "controller" => "appliedtosync",
                "action"     => "index",
            ]
        );
    }

    public function newAction() {
        $this->view->form = new FechasForm;
    }

    public function searchAction() {
        $numberPage = 1;

        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Appliedtosync", $this->request->getPost());
            $this->persistent->searchParams = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }
        $parameters = array();
        if ($this->persistent->searchParams) {
            $parameters = $this->persistent->searchParams;
        }
        $misCodigos = Appliedtosync::find($parameters);
        if (count($misCodigos) == 0) {
            $this->flash->notice("La busqueda no ha encontrado ninguna Fecha de sincronizacion con sus parametros");
            return $this->dispatcher->forward(
                  [
                     "controller" => "appliedtosync",
                     "action" => "index",
                  ]
            );
        }

        $paginator = new Paginator(array(
           "data" => $misCodigos,
           "limit" => 10,
           "page" => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
        $this->view->elementos = $misCodigos;
    }

    public function editAction($id) {
        if (!$this->request->isPost()) {
            $codigo = Appliedtosync::findFirstById($id);
            if (!$codigo) {
                $this->flash->error("Esta Fecha de sincronizacion no ha sido encontrada");
                return $this->dispatcher->forward(
                      [
                         "controller" => "appliedtosync",
                         "action" => "index",
                      ]
                );
            }
            $this->view->form = new FechasForm($codigo, array('edit' => true));
        }
    }

    public function deleteAction($id) {

        $codigo = Appliedtosync::findFirstById($id);
        if (!$codigo) {
            $this->flash->error("Esta Fecha de sincronizacion no ha sido encontrada");

            return $this->dispatcher->forward(
                  [
                     "controller" => "appliedtosync",
                     "action" => "index",
                  ]
            );
        }

        if (!$codigo->delete()) {
            foreach ($codigo->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                  [
                     "controller" => "appliedtosync",
                     "action" => "search",
                  ]
            );
        }

        $this->flash->success("Esta Fecha de sincronizacion ha sido borrada ");

        return $this->dispatcher->forward(
              [
                 "controller" => "appliedtosync",
                 "action" => "search",
              ]
        );
    }
    public function createAction()
    {
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(
                [
                    "controller" => "appliedtosync",
                    "action"     => "index",
                ]
            );
        }


        $modelo = new Appliedtosync();
        $form = new FechasForm;
        $data = $this->request->getPost();
        if (!$form->isValid($data, $modelo)) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                [
                    "controller" => "appliedtosync",
                    "action"     => "new",
                ]
            );
        }
        
        $modelo->datecreated = date('Y-m-d');
        $usuario = $this->session->get('auth');
        $modelo->user = $usuario['username'];
        if ($modelo->save() == false) {
            foreach ($modelo->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                [
                    "controller" => "appliedtosync",
                    "action"     => "new",
                ]
            );
        }

        $form->clear();

        $this->flash->success("Una nueva Fecha de sincronizacion ha sido adicionada");

        return $this->dispatcher->forward(
            [
                "controller" => "appliedtosync",
                "action"     => "index",
            ]
        );
    }
}
