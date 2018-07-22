<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class WarehouseController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for warehouse
     */
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
            $this->flash->notice("The search did not find any warehouse");

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

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a warehouse
     *
     * @param string $listID
     */
    public function editAction($listID)
    {
        if (!$this->request->isPost()) {

            $warehouse = Warehouse::findFirstBylistID($listID);
            if (!$warehouse) {
                $this->flash->error("warehouse was not found");

                $this->dispatcher->forward([
                    'controller' => "warehouse",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->listID = $warehouse->getListid();

            $this->tag->setDefault("listID", $warehouse->getListid());
            $this->tag->setDefault("timeCreated", $warehouse->getTimecreated());
            $this->tag->setDefault("timeModified", $warehouse->getTimemodified());
            $this->tag->setDefault("editSequence", $warehouse->getEditsequence());
            $this->tag->setDefault("name", $warehouse->getName());
            $this->tag->setDefault("isActive", $warehouse->getIsactive());
            $this->tag->setDefault("description", $warehouse->getDescription());
            $this->tag->setDefault("address", $warehouse->getAddress());
            $this->tag->setDefault("phone", $warehouse->getPhone());
            $this->tag->setDefault("email", $warehouse->getEmail());
            $this->tag->setDefault("tipoId", $warehouse->getTipoid());
            $this->tag->setDefault("numeroId", $warehouse->getNumeroid());
            $this->tag->setDefault("customField1", $warehouse->getCustomfield1());
            $this->tag->setDefault("customField2", $warehouse->getCustomfield2());
            $this->tag->setDefault("customField3", $warehouse->getCustomfield3());
            $this->tag->setDefault("status", $warehouse->getStatus());
            
        }
    }

    /**
     * Creates a new warehouse
     */
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
        $warehouse->setListid($this->request->getPost("listID"));
        $warehouse->setTimecreated($this->request->getPost("timeCreated"));
        $warehouse->setTimemodified($this->request->getPost("timeModified"));
        $warehouse->setEditsequence($this->request->getPost("editSequence"));
        $warehouse->setName($this->request->getPost("name"));
        $warehouse->setIsactive($this->request->getPost("isActive"));
        $warehouse->setDescription($this->request->getPost("description"));
        $warehouse->setAddress($this->request->getPost("address"));
        $warehouse->setPhone($this->request->getPost("phone"));
        $warehouse->setEmail($this->request->getPost("email", "email"));
        $warehouse->setTipoid($this->request->getPost("tipoId"));
        $warehouse->setNumeroid($this->request->getPost("numeroId"));
        $warehouse->setCustomfield1($this->request->getPost("customField1"));
        $warehouse->setCustomfield2($this->request->getPost("customField2"));
        $warehouse->setCustomfield3($this->request->getPost("customField3"));
        $warehouse->setStatus($this->request->getPost("status"));
        

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

        $this->flash->success("warehouse was created successfully");

        $this->dispatcher->forward([
            'controller' => "warehouse",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a warehouse edited
     *
     */
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
            $this->flash->error("warehouse does not exist " . $listID);

            $this->dispatcher->forward([
                'controller' => "warehouse",
                'action' => 'index'
            ]);

            return;
        }

        $warehouse->setListid($this->request->getPost("listID"));
        $warehouse->setTimecreated($this->request->getPost("timeCreated"));
        $warehouse->setTimemodified($this->request->getPost("timeModified"));
        $warehouse->setEditsequence($this->request->getPost("editSequence"));
        $warehouse->setName($this->request->getPost("name"));
        $warehouse->setIsactive($this->request->getPost("isActive"));
        $warehouse->setDescription($this->request->getPost("description"));
        $warehouse->setAddress($this->request->getPost("address"));
        $warehouse->setPhone($this->request->getPost("phone"));
        $warehouse->setEmail($this->request->getPost("email", "email"));
        $warehouse->setTipoid($this->request->getPost("tipoId"));
        $warehouse->setNumeroid($this->request->getPost("numeroId"));
        $warehouse->setCustomfield1($this->request->getPost("customField1"));
        $warehouse->setCustomfield2($this->request->getPost("customField2"));
        $warehouse->setCustomfield3($this->request->getPost("customField3"));
        $warehouse->setStatus($this->request->getPost("status"));
        

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

        $this->flash->success("warehouse was updated successfully");

        $this->dispatcher->forward([
            'controller' => "warehouse",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a warehouse
     *
     * @param string $listID
     */
    public function deleteAction($listID)
    {
        $warehouse = Warehouse::findFirstBylistID($listID);
        if (!$warehouse) {
            $this->flash->error("warehouse was not found");

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

        $this->flash->success("warehouse was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "warehouse",
            'action' => "index"
        ]);
    }

}
