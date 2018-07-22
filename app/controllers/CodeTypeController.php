<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
class CodeTypeController extends ControllerBase
{
    public function initialize() {
        $this->tag->setTitle('CodeType');
        parent::initialize();
    }

    public function indexAction() {
        $this->session->conditions = null;
        $this->view->form = new CodeTypeForm;
    }
    
        public function newAction() {
        $this->view->form = new CodeTypeForm();
    }

    public function searchAction() {
        $numberPage = 1;
        
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Codetype", $this->request->getPost());
            $this->persistent->searchParams = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }
        $parameters = array();
        if ($this->persistent->searchParams) {
            $parameters = $this->persistent->searchParams;
        }
        $misCodigos = Codetype::find($parameters);
        if (count($misCodigos) == 0) {
            $this->flash->notice("The search did not find any code type in our database");
            return $this->dispatcher->forward(
                            [
                                "controller" => "codetype",
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
    
        public function saveAction()
    {
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(
                [
                    "controller" => "codetype",
                    "action"     => "index",
                ]
            );
        }
        $id = $this->request->getPost("id", "int");
        $codetype = Codetype::findFirstById($id);
        if (!$codetype) {
            $this->flash->error("Code type does not exist");

            return $this->dispatcher->forward(
                [
                    "controller" => "codetype",
                    "action"     => "index",
                ]
            );
        }

        $form = new CodeTypeForm();

        $data = $this->request->getPost();
        if (!$form->isValid($data, $codetype)) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                [
                    "controller" => "codetype",
                    "action"     => "index",
                ]
            );
        }

        if ($codetype->save() == false) {
            foreach ($codetype->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                [
                    "controller" => "codetype",
                    "action"     => "edit",
                ]
            );
        }

        $form->clear();

        $this->flash->success("Code type was updated successfully");

        return $this->dispatcher->forward(
            [
                "controller" => "codetype",
                "action"     => "index",
            ]
        );
    }

        public function createAction()
    {
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(
                [
                    "controller" => "codetype",
                    "action"     => "index",
                ]
            );
        }

        $form = new CodeTypeForm();
        $codetype = new Codetype();

        $data = $this->request->getPost();
        if (!$form->isValid($data, $codetype)) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                [
                    "controller" => "codetype",
                    "action"     => "new",
                ]
            );
        }
        
        if ($codetype->save() == false) {
            foreach ($codetype->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                [
                    "controller" => "codetype",
                    "action"     => "new",
                ]
            );
        }

        $form->clear();

        $this->flash->success("A new code type was added to our database successfully");

        return $this->dispatcher->forward(
            [
                "controller" => "codetype",
                "action"     => "index",
            ]
        );
    }
    
        public function editAction($id) {
        if (!$this->request->isPost()) {
            $codigo = Codetype::findFirstById($id);
            if (!$codigo) {
                $this->flash->error("This code type was not found");
                return $this->dispatcher->forward(
                      [
                         "controller" => "codetype",
                         "action" => "index",
                      ]
                );
            }
            $this->view->form = new CodeTypeForm($codigo, array('edit' => true));
        }
    }
    
        public function deleteAction($id) {

        $codigo = Codetype::findFirstById($id);
        if (!$codigo) {
            $this->flash->error("This code type was not found");

            return $this->dispatcher->forward(
                  [
                     "controller" => "codetype",
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
                     "controller" => "codetype",
                     "action" => "search",
                  ]
            );
        }

        $this->flash->success("This code type was deleted from our database");

        return $this->dispatcher->forward(
              [
                 "controller" => "codetype",
                 "action" => "search",
              ]
        );
    }
}

