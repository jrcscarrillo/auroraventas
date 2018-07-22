<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class CodeController extends ControllerBase {

    public function initialize() {
        $this->tag->setTitle('Code');
        parent::initialize();
    }

    public function indexAction() {
        $this->session->conditions = null;
        $this->view->form = new CodeForm;
    }

    public function newAction() {
        $this->view->form = new CodeForm();
    }

    public function searchAction() {
        $numberPage = 1;

        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Code", $this->request->getPost());
            $this->persistent->searchParams = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }
        $parameters = array();
        if ($this->persistent->searchParams) {
            $parameters = $this->persistent->searchParams;
        }
        $misCodigos = Code::find($parameters);
        if (count($misCodigos) == 0) {
            $this->flash->notice("The search did not find any code in our database");
            return $this->dispatcher->forward(
                  [
                     "controller" => "code",
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

    public function saveAction() {
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(
                  [
                     "controller" => "index",
                     "action" => "index",
                  ]
            );
        }
        $id = $this->request->getPost("id", "int");
        $code = Code::findFirstById($id);
        if (!$code) {
            $this->flash->error("Code does not exist");

            return $this->dispatcher->forward(
                  [
                     "controller" => "code",
                     "action" => "index",
                  ]
            );
        }

        $form = new CodeForm;

        $data = $this->request->getPost();
        if (!$form->isValid($data, $code)) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                  [
                     "controller" => "index",
                     "action" => "index",
                  ]
            );
        }
        $code->dateModified = new Phalcon\Db\RawValue('now()');
        if ($code->save() == false) {
            foreach ($code->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                  [
                     "controller" => "code",
                     "action" => "edit",
                  ]
            );
        }

        $this->flash->success("Code was updated successfully");

        return $this->dispatcher->forward(
              [
                 "controller" => "code",
                 "action" => "search",
              ]
        );
    }

    public function createAction() {
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(
                  [
                     "controller" => "code",
                     "action" => "index",
                  ]
            );
        }

        $form = new CodeForm;
        $code = new Code();

        $data = $this->request->getPost();
        if (!$form->isValid($data, $code)) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                  [
                     "controller" => "code",
                     "action" => "new",
                  ]
            );
        }
        $code->dateCreated = new Phalcon\Db\RawValue('now()');
        $code->dateModified = new Phalcon\Db\RawValue('now()');
        if ($code->save() == false) {
            foreach ($code->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                  [
                     "controller" => "code",
                     "action" => "new",
                  ]
            );
        }

        $form->clear();

        $this->flash->success("A new Code was added to our database successfully");

        return $this->dispatcher->forward(
              [
                 "controller" => "code",
                 "action" => "index",
              ]
        );
    }

    /**
     * Edits a code based on its id
     */
    public function editAction($id) {

        if (!$this->request->isPost()) {

            $code = Code::findFirstById($id);
            if (!$code) {
                $this->flash->error("Code was not found");

                return $this->dispatcher->forward(
                      [
                         "controller" => "code",
                         "action" => "index",
                      ]
                );
            }

            $this->view->form = new CodeForm($code, array('edit' => true));
        }
    }

    public function deleteAction($id) {

        $codigo = Code::findFirstById($id);
        if (!$codigo) {
            $this->flash->error("This code was not found");

            return $this->dispatcher->forward(
                  [
                     "controller" => "code",
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
                     "controller" => "code",
                     "action" => "search",
                  ]
            );
        }

        $this->flash->success("This code was deleted from our database");

        return $this->dispatcher->forward(
              [
                 "controller" => "code",
                 "action" => "search",
              ]
        );
    }

}
