<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class WarehouseController extends ControllerBase
{
    public function initialize() {
        $this->tag->setTitle('Bodegas');
        parent::initialize();
    }

    public function indexAction() {
        $this->session->conditions = null;
        $this->view->form = new RouteForm();
        $this->tag->setDefault("name", "");
        $this->tag->setDefault("description", "");
        $this->tag->setDefault("phone", "");
    }
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Warehouse', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "listID";

        $warehouse = Warehouse::find($parameters);
        if (count($warehouse) == 0) {
            $this->flash->notice("La se encontro la bodega o bodegas con esos paramentros");

            $this->dispatcher->forward([
                "controller" => "warehouse",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $warehouse,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    public function newAction()
    {
        $this->view->form = new RouteNewForm();
    }

    public function editAction($listID)
    {
        if (!$this->request->isPost()) {

            $warehouse = Warehouse::findFirstBylistID($listID);
            if (!$warehouse) {
                $this->flash->error("La bodega no ha sido encontrada");

                $this->dispatcher->forward([
                    'controller' => "warehouse",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->form = new RouteNewForm();

            $this->tag->setDefault("listID", $warehouse->getlistID());
            $this->tag->setDefault("name", $warehouse->getname());
            $this->tag->setDefault("description", $warehouse->getdescription());
            $this->tag->setDefault("address", $warehouse->getaddress());
            $this->tag->setDefault("phone", $warehouse->getphone());
            $this->tag->setDefault("email", $warehouse->getemail());
            $this->tag->setDefault("tipoId", $warehouse->gettipoId());
            $this->tag->setDefault("numeroId", $warehouse->getnumeroId());
            $this->tag->setDefault("customField1", $warehouse->getcustomField1());            
        }
    }

    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "warehouse",
                'action' => 'index'
            ]);

            return;
        }

        $warehouse = new Warehouse();
        $id = $this->claves->guid();
        $warehouse->setlistID($id);
        $warehouse->seteditSequence(rand(100, 10000));
        $warehouse->setname($this->request->getPost("name"));
        $warehouse->setisActive(1);
        $warehouse->setdescription($this->request->getPost("description"));
        $warehouse->setaddress($this->request->getPost("address"));
        $warehouse->setphone($this->request->getPost("phone"));
        $warehouse->setemail($this->request->getPost("email", "email"));
        $warehouse->settipoId($this->request->getPost("tipoId"));
        $warehouse->setnumeroId($this->request->getPost("numeroId"));
        $warehouse->setcustomField1($this->request->getPost("customField1"));         

        if (!$warehouse->save()) {
            foreach ($warehouse->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "warehouse",
                'action' => 'new'
            ]);

            return;
        }
        $this->view->disable();
        $this->flash->success("La bodega fue generada satisfactoriamente");

        $this->dispatcher->forward([
            'controller' => "warehouse",
            'action' => 'index'
        ]);
    }

    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "warehouse",
                'action' => 'index'
            ]);

            return;
        }

        $listID = $this->request->getPost("listID");
        $warehouse = Warehouse::findFirstBylistID($listID);

        if (!$warehouse) {
            $this->flash->error("Esta bodega no existe " . $listID);

            $this->dispatcher->forward([
                'controller' => "warehouse",
                'action' => 'index'
            ]);

            return;
        }

        $fecha = date('Y-m-d H:m:s');
        $warehouse->setTimemodified($fecha);
        $warehouse->setName($this->request->getPost("name"));
        $warehouse->setDescription($this->request->getPost("description"));
        $warehouse->setAddress($this->request->getPost("address"));
        $warehouse->setPhone($this->request->getPost("phone"));
        $warehouse->setEmail($this->request->getPost("email"));
        $warehouse->setTipoid($this->request->getPost("tipoId"));
        $warehouse->setNumeroid($this->request->getPost("numeroId"));
        $warehouse->setCustomfield1($this->request->getPost("customField1"));  
        if (!$warehouse->save()) {

            foreach ($warehouse->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "warehouse",
                'action' => 'edit',
                'params' => [$warehouse->getListid()]
            ]);

            return;
        }
        $this->view->disable();
        $this->flash->success("La bodega fue actualizada satisfactoriamente");

        return $this->dispatcher->forward([
            'controller' => "warehouse",
            'action' => 'search'
        ]);
    }

    public function deleteAction($listID)
    {
        $warehouse = Warehouse::findFirstBylistID($listID);
        if (!$warehouse) {
            $this->flash->error("Esta bodega no fue encontrada");

            $this->dispatcher->forward([
                'controller' => "warehouse",
                'action' => 'index'
            ]);

            return;
        }

        if (!$warehouse->delete()) {

            foreach ($warehouse->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "warehouse",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("La bodega fue eliminada satisfactoriamente");

        $this->dispatcher->forward([
            'controller' => "warehouse",
            'action' => "search"
        ]);
    }

}
