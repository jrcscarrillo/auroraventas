<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class VehicleController extends ControllerBase
{
    public function initialize() {
        $this->tag->setTitle('Vehiculos');
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
            $query = Criteria::fromInput($this->di, 'Vehicle', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "listID";

        $vehicle = Vehicle::find($parameters);
        if (count($vehicle) == 0) {
            $this->flash->notice("No existen vehiculos con esos parametros de busqueda");

            $this->dispatcher->forward([
                "controller" => "vehicle",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $vehicle,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    public function newAction()
    {
        $this->view->form = new RouteNewForm();
    }

    public function editAction($ListID)
    {
        if (!$this->request->isPost()) {

            $vehicle = Vehicle::findFirstByListID($ListID);
            if (!$vehicle) {
                $this->flash->error("Vehiculo no existe");

                $this->dispatcher->forward([
                    'controller' => "vehicle",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->form = new RouteNewForm();

            $this->tag->setDefault("listID", $route->getlistID());
            $this->tag->setDefault("name", $route->getname());
            $this->tag->setDefault("description", $route->getdescription());
            $this->tag->setDefault("address", $route->getaddress());
            $this->tag->setDefault("phone", $route->getphone());
            $this->tag->setDefault("email", $route->getemail());
            $this->tag->setDefault("tipoId", $route->gettipoId());
            $this->tag->setDefault("numeroId", $route->getnumeroId());
            $this->tag->setDefault("customField1", $route->getcustomField1());            
        }
    }

    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "vehicle",
                'action' => 'index'
            ]);

            return;
        }

        $vehicle = new Vehicle();
        $id = $this->claves->guid();
        $vehicle->setlistID($id);
        $vehicle->seteditSequence(rand(100, 10000));
        $vehicle->setname($this->request->getPost("name"));
        $vehicle->setisActive(1);
        $vehicle->setdescription($this->request->getPost("description"));
        $vehicle->setaddress($this->request->getPost("address"));
        $vehicle->setphone($this->request->getPost("phone"));
        $vehicle->setemail($this->request->getPost("email", "email"));
        $vehicle->settipoId($this->request->getPost("tipoId"));
        $vehicle->setnumeroId($this->request->getPost("numeroId"));
        $vehicle->setcustomField1($this->request->getPost("customField1"));        

        if (!$vehicle->save()) {
            foreach ($vehicle->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "vehicle",
                'action' => 'new'
            ]);

            return;
        }

        $this->view->disable();
        $this->flash->success("El vehiculo ha sido generado satisfactoriamente");
        return $this->dispatcher->forward([
            'controller' => "vehicle",
            'action' => 'index'
        ]);
        
    }

    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "vehicle",
                'action' => 'index'
            ]);

            return;
        }

        $ListID = $this->request->getPost("ListID");
        $vehicle = Vehicle::findFirstByListID($ListID);

        if (!$vehicle) {
            $this->flash->error("Este Vehiculo no existe " . $ListID);

            $this->dispatcher->forward([
                'controller' => "vehicle",
                'action' => 'index'
            ]);

            return;
        }

        $fecha = date('Y-m-d H:m:s');
        $vehicle->setTimemodified($fecha);
        $vehicle->setName($this->request->getPost("name"));
        $vehicle->setDescription($this->request->getPost("description"));
        $vehicle->setAddress($this->request->getPost("address"));
        $vehicle->setPhone($this->request->getPost("phone"));
        $vehicle->setEmail($this->request->getPost("email"));
        $vehicle->setTipoid($this->request->getPost("tipoId"));
        $vehicle->setNumeroid($this->request->getPost("numeroId"));
        $vehicle->setCustomfield1($this->request->getPost("customField1"));        

        if (!$vehicle->save()) {

            foreach ($vehicle->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "vehicle",
                'action' => 'edit',
                'params' => [$vehicle->getlistID()]
            ]);

            return;
        }

        $this->flash->success("El vehiculo ha sido modificado satisfactoriamente");

        $this->dispatcher->forward([
            'controller' => "vehicle",
            'action' => 'search'
        ]);
    }

    public function deleteAction($ListID)
    {
        $vehicle = Vehicle::findFirstByListID($ListID);
        if (!$vehicle) {
            $this->flash->error("vehicle was not found");

            $this->dispatcher->forward([
                'controller' => "vehicle",
                'action' => 'index'
            ]);

            return;
        }

        if (!$vehicle->delete()) {

            foreach ($vehicle->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "vehicle",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("El vehiculo ha sido eliminado satisfactoriamente");

        $this->dispatcher->forward([
            'controller' => "vehicle",
            'action' => "search"
        ]);
    }

}
