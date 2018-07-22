<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class AplicacionesController extends ControllerBase {

    public function initialize() {
        $this->tag->setTitle('Aplicaciones');
        parent::initialize();
    }

    public function indexAction() {
        $this->session->conditions = null;
        $this->view->form = new AplicacionesForm;
    }

    public function saveAction()
    {
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(
                [
                    "controller" => "aplicaciones",
                    "action"     => "index",
                ]
            );
        }
        $id = $this->request->getPost("id", "int");
        $modelo = Aplicaciones::findFirstById($id);
        if (!$modelo) {
            $this->flash->error("Aplicacion No existe");

            return $this->dispatcher->forward(
                [
                    "controller" => "aplicaciones",
                    "action"     => "index",
                ]
            );
        }

        $form = new AplicacionesForm;

        $data = $this->request->getPost();
        if (!$form->isValid($data, $modelo)) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                [
                    "controller" => "aplicaciones",
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
                    "controller" => "aplicaciones",
                    "action"     => "edit",
                ]
            );
        }

        $form->clear();

        $this->flash->success("La Aplicacion ha sido actualizada");

        return $this->dispatcher->forward(
            [
                "controller" => "aplicaciones",
                "action"     => "index",
            ]
        );
    }

    public function newAction() {
        $this->view->form = new AplicacionesForm;
    }

    public function searchAction() {
        $numberPage = 1;

        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Aplicaciones", $this->request->getPost());
            $this->persistent->searchParams = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }
        $parameters = array();
        if ($this->persistent->searchParams) {
            $parameters = $this->persistent->searchParams;
        }
        $misCodigos = Aplicaciones::find($parameters);
        if (count($misCodigos) == 0) {
            $this->flash->notice("La busqueda no ha encontrado ninguna Aplicacion con sus parametros");
            return $this->dispatcher->forward(
                  [
                     "controller" => "aplicaciones",
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
            $codigo = Aplicaciones::findFirstById($id);
            if (!$codigo) {
                $this->flash->error("Esta Aplicacion no ha sido encontrada");
                return $this->dispatcher->forward(
                      [
                         "controller" => "aplicaciones",
                         "action" => "index",
                      ]
                );
            }
            $this->view->form = new AplicacionesForm($codigo, array('edit' => true));
        }
    }

    public function deleteAction($id) {

        $codigo = Aplicaciones::findFirstById($id);
        if (!$codigo) {
            $this->flash->error("Esta Aplicacion no ha sido encontrada");

            return $this->dispatcher->forward(
                  [
                     "controller" => "aplicaciones",
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
                     "controller" => "aplicaciones",
                     "action" => "search",
                  ]
            );
        }

        $this->flash->success("Esta Aplicacion ha sido borrada ");

        return $this->dispatcher->forward(
              [
                 "controller" => "aplicaciones",
                 "action" => "search",
              ]
        );
    }
    public function createAction()
    {
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(
                [
                    "controller" => "aplicaciones",
                    "action"     => "index",
                ]
            );
        }

        $form = new AplicacionesForm;
        $modelo = new Aplicaciones();

        $data = $this->request->getPost();
        if (!$form->isValid($data, $modelo)) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                [
                    "controller" => "aplicaciones",
                    "action"     => "new",
                ]
            );
        }
        $modelo->fechaCreacion = date('Y-m-d');
        $usuario = $this->session->get('auth');
        $modelo->ultimoUsuario = $usuario['username'];        
        if ($modelo->save() == false) {
            foreach ($modelo->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                [
                    "controller" => "aplicaciones",
                    "action"     => "new",
                ]
            );
        }

        $form->clear();

        $this->flash->success("Una nueva Aplicacion ha sido adicionada");

        return $this->dispatcher->forward(
            [
                "controller" => "aplicaciones",
                "action"     => "index",
            ]
        );
    }
}
