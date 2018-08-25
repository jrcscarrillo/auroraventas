<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class RouteController extends ControllerBase {

    protected $forma;

    public function initialize() {
        $this->tag->setTitle('Rutas');
        parent::initialize();
    }

    public function indexAction() {
        $this->session->conditions = null;
        $this->view->form = new RouteForm();
        $this->tag->setDefault("name", "");
        $this->tag->setDefault("description", "");
        $this->tag->setDefault("phone", "");
    }

    public function searchAction() {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Route', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "listID";

        $route = Route::find($parameters);
        if (count($route) == 0) {
            $this->flash->notice("No existen rutas con estos parametros de busqueda");

            $this->dispatcher->forward([
               "controller" => "route",
               "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
           'data' => $route,
           'limit' => 10,
           'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    public function newAction() {
        $this->view->form = new RouteNewForm;
    }

    public function editAction($listID) {
        if (!$this->request->isPost()) {

            $route = Route::findFirstBylistID($listID);
            if (!$route) {
                $this->flash->error("La ruta no ha sido encontrada");

                $this->dispatcher->forward([
                   'controller' => "route",
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

    public function createAction() {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
               'controller' => "route",
               'action' => 'index'
            ]);

            return;
        }

        $route = new Route();
        $id = $this->claves->guid();
        $route->setListid($id);
        $route->setEditsequence(rand(3000, 30000));
        $route->setName($this->request->getPost("name"));
        $route->setDescription($this->request->getPost("description"));
        $route->setAddress($this->request->getPost("address"));
        $route->setPhone($this->request->getPost("phone"));
        $route->setEmail($this->request->getPost("email"));
        $route->setTipoid($this->request->getPost("tipoId"));
        $route->setNumeroid($this->request->getPost("numeroId"));
        $route->setCustomfield1($this->request->getPost("customField1"));


        if (!$route->save()) {
            foreach ($route->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
               'controller' => "route",
               'action' => 'new'
            ]);

            return;
        }
        $this->view->disable();
        $this->flash->success("La ruta fue creada exitosamente");

        return $this->dispatcher->forward([
           'controller' => "ruta",
           'action' => 'index'
        ]);
    }

    public function saveAction() {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
               'controller' => "route",
               'action' => 'index'
            ]);

            return;
        }

        $listID = $this->request->getPost("listID");
        $route = Route::findFirstBylistID($listID);

        if (!$route) {
            $this->flash->error("Esta ruta no existe " . $listID);

            $this->dispatcher->forward([
               'controller' => "route",
               'action' => 'index'
            ]);

            return;
        }
        $fecha = date('Y-m-d H:m:s');
        $route->setTimemodified($fecha);
        $route->setName($this->request->getPost("name"));
        $route->setDescription($this->request->getPost("description"));
        $route->setAddress($this->request->getPost("address"));
        $route->setPhone($this->request->getPost("phone"));
        $route->setEmail($this->request->getPost("email"));
        $route->setTipoid($this->request->getPost("tipoId"));
        $route->setNumeroid($this->request->getPost("numeroId"));
        $route->setCustomfield1($this->request->getPost("customField1"));


        if (!$route->save()) {

            foreach ($route->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
               'controller' => "route",
               'action' => 'edit',
               'params' => [$route->getlistID()]
            ]);

            return;
        }
        $this->view->disable();
        $this->flash->success("La ruta fue actualizada satisfactoriamente");
//        return $this->dispatcher->forward([
//           'controller' => "route",
//           'action' => 'search'
//        ]);
        $this->request->redirect("route/search");
        return false;
    }

    /**
     * Deletes a route
     *
     * @param string $listID
     */
    public function deleteAction($listID) {
        $route = Route::findFirstBylistID($listID);
        if (!$route) {
            $this->flash->error("La ruta no ha sido encontrada");

            $this->dispatcher->forward([
               'controller' => "route",
               'action' => 'index'
            ]);

            return;
        }

        if (!$route->delete()) {

            foreach ($route->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
               'controller' => "route",
               'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("La ruta fue eliminada exitosamente");

        $this->dispatcher->forward([
           'controller' => "route",
           'action' => "search"
        ]);
    }

}
