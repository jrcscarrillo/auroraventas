<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class UsersController extends ControllerBase {

    public function initialize() {
        $this->tag->setTitle('Usuarios');
        parent::initialize();
    }

    public function indexAction() {
        $this->session->conditions = null;
        $this->view->form = new UsersForm;
    }

    /**
     * Searches for users
     */
    public function searchAction() {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Users', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "id";

        $miscodigos = Users::find($parameters);
        if (count($miscodigos) == 0) {
            $this->flash->notice("La busqueda no encontro ningun usuario");

            $this->dispatcher->forward([
               "controller" => "users",
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

    public function editAction($id) {
        if (!$this->request->isPost()) {

            $user = Users::findFirstByid($id);
            if (!$user) {
                $this->flash->error("Usuario no ha sido encontrado");

                $this->dispatcher->forward([
                   'controller' => "users",
                   'action' => 'index'
                ]);

                return;
            }

            $user->setactive('Y');
            if (!$user->save()) {

                foreach ($user->getMessages() as $message) {
                    $this->flash->error($message);
                }

                $this->dispatcher->forward([
                   'controller' => "users",
                   'action' => 'index',
                ]);

                return;
            }

            $this->flash->success("El usuario ahora esta habilitado");
            $part = '<span><b>Le informamos que usted esta habilitado en su rol para utilizar https://loscoqueiros.online</b><span>';
            $paraemail['part'] = $part;
            $paraemail['body'] = $part;
            $paraemail['subject'] = 'SUPER HELADOS LOS COQUEIROS - Usuario Habilitado';
            $paraemail['fromemail']['email'] = 'xavierbustos@loscoqueiros.com';
            $paraemail['fromemail']['nombre'] = 'Heladerias Cofrunat Cia. Ltda.';
            $paraemail['toemail']['email'] = $this->email;
            $paraemail['toemail']['nombre'] = $this->name;
            $paraemail['bccemail']['email'] = 'jrcscarrillo@gmail.com';
            $paraemail['bccemail']['nombre'] = 'Juan Carrillo';
            $exp = $this->sendmail->enviaEmail($paraemail);
        }
    }

    public function deleteAction($id) {
        if (!$this->request->isPost()) {

            $user = Users::findFirstByid($id);
            if (!$user) {
                $this->flash->error("Usuario no ha sido encontrado");

                $this->dispatcher->forward([
                   'controller' => "users",
                   'action' => 'index'
                ]);

                return;
            }

        if (!$user->delete()) {

            foreach ($user->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "users",
                'action' => 'search'
            ]);

            return;
        }

            $this->flash->success("El usuario ahora esta ELIMINADO");
        }
    }

}
