<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class ItemsController extends ControllerBase
{

        public function initialize() {
        $this->tag->setTitle('Items');
        parent::initialize();
    }
    public function indexAction()
    {
        $this->session->conditions = null;
        $this->view->form = new ItemsForm;
    }


    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Items', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "id";

        $items = Items::find($parameters);
        if (count($items) == 0) {
            $this->flash->notice("The search did not find any items");

            $this->dispatcher->forward([
                "controller" => "items",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $items,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    public function newAction()
    {
        $this->view->form = new ItemsForm();
    }

    public function editAction($id)
    {
        if (!$this->request->isPost()) {

            $item = Items::findFirstByid($id);
            if (!$item) {
                $this->flash->error("Helado no existe en nuestros registros");

                $this->dispatcher->forward([
                    'controller' => "items",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->form = new ItemsForm($item, array('edit' => true));
            
        }
    }

    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "items",
                'action' => 'index'
            ]);

            return;
        }

        $form = new ItemsForm();
        $items = new Items();

        $data = $this->request->getPost();
        if (!$form->isValid($data, $items)) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                  [
                     "controller" => "items",
                     "action" => "new",
                  ]
            );
        }

        if (!$item->save()) {
            foreach ($item->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "items",
                'action' => 'new'
            ]);

            return;
        }
        $form->clear();
        $this->flash->success("Un nuevo helado se ha agregado satisfactoriamente");

        $this->dispatcher->forward([
            'controller' => "items",
            'action' => 'index'
        ]);
    }

    public function saveAction() {
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(
                  [
                     "controller" => "items",
                     "action" => "index",
                  ]
            );
        }
        $id = $this->request->getPost("id", "int");
        $items = Items::findFirstById($id);
        if (!$items) {
            $this->flash->error("Helado no existe");

            return $this->dispatcher->forward(
                  [
                     "controller" => "items",
                     "action" => "index",
                  ]
            );
        }

        $form = new ItemsForm();

        $data = $this->request->getPost();
        if (!$form->isValid($data, $items)) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                  [
                     "controller" => "items",
                     "action" => "index",
                  ]
            );
        }

        if ($items->save() == false) {
            foreach ($items->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                  [
                     "controller" => "items",
                     "action" => "edit",
                  ]
            );
        }

        $form->clear();

        $this->flash->success("El helado se actualizo satisfactoriamente");
        $_POST['id'] = null;
        $_POST['sales_price'] = null;
        $_POST['sales_desc'] = "";
        $_POST['description'] = "";
        $_POST['fullname'] = "";
        $_POST['name'] = "";
        
        return $this->dispatcher->forward(
              [
                 "controller" => "items",
                 "action" => "search",
              ]
        );
    }

    public function deleteAction($id)
    {
        $item = Items::findFirstByid($id);
        if (!$item) {
            $this->flash->error("Helado no existe");

            $this->dispatcher->forward([
                'controller' => "items",
                'action' => 'index'
            ]);

            return;
        }

        if (!$item->delete()) {

            foreach ($item->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "items",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("Helado retirado de nuestros registros");

        $this->dispatcher->forward([
            'controller' => "items",
            'action' => "index"
        ]);
    }

}
