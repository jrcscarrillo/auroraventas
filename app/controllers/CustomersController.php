<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class CustomersController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for customers
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Customers', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "ListID";

        $customers = Customers::find($parameters);
        if (count($customers) == 0) {
            $this->flash->notice("The search did not find any customers");

            $this->dispatcher->forward([
                "controller" => "customers",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $customers,
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
     * Edits a customer
     *
     * @param string $ListID
     */
    public function editAction($ListID)
    {
        if (!$this->request->isPost()) {

            $customer = Customers::findFirstByListID($ListID);
            if (!$customer) {
                $this->flash->error("customer was not found");

                $this->dispatcher->forward([
                    'controller' => "customers",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->ListID = $customer->ListID;

            $this->tag->setDefault("ListID", $customer->ListID);
            $this->tag->setDefault("TimeCreated", $customer->TimeCreated);
            $this->tag->setDefault("TimeModified", $customer->TimeModified);
            $this->tag->setDefault("Name", $customer->Name);
            $this->tag->setDefault("FullName", $customer->FullName);
            $this->tag->setDefault("FirstName", $customer->FirstName);
            $this->tag->setDefault("MiddleName", $customer->MiddleName);
            $this->tag->setDefault("LastName", $customer->LastName);
            $this->tag->setDefault("Contact", $customer->Contact);
            $this->tag->setDefault("ShipAddress_Addr1", $customer->ShipAddress_Addr1);
            $this->tag->setDefault("ShipAddress_Addr2", $customer->ShipAddress_Addr2);
            $this->tag->setDefault("ShipAddress_City", $customer->ShipAddress_City);
            $this->tag->setDefault("ShipAddress_State", $customer->ShipAddress_State);
            $this->tag->setDefault("ShipAddress_Province", $customer->ShipAddress_Province);
            $this->tag->setDefault("ShipAddress_PostalCode", $customer->ShipAddress_PostalCode);
            
        }
    }

    /**
     * Creates a new customer
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "customers",
                'action' => 'index'
            ]);

            return;
        }

        $customer = new Customers();
        $customer->Listid = $this->request->getPost("ListID");
        $customer->Timecreated = $this->request->getPost("TimeCreated");
        $customer->Timemodified = $this->request->getPost("TimeModified");
        $customer->Name = $this->request->getPost("Name");
        $customer->Fullname = $this->request->getPost("FullName");
        $customer->Firstname = $this->request->getPost("FirstName");
        $customer->Middlename = $this->request->getPost("MiddleName");
        $customer->Lastname = $this->request->getPost("LastName");
        $customer->Contact = $this->request->getPost("Contact");
        $customer->Shipaddress_addr1 = $this->request->getPost("ShipAddress_Addr1");
        $customer->Shipaddress_addr2 = $this->request->getPost("ShipAddress_Addr2");
        $customer->Shipaddress_city = $this->request->getPost("ShipAddress_City");
        $customer->Shipaddress_state = $this->request->getPost("ShipAddress_State");
        $customer->Shipaddress_province = $this->request->getPost("ShipAddress_Province");
        $customer->Shipaddress_postalcode = $this->request->getPost("ShipAddress_PostalCode");
        

        if (!$customer->save()) {
            foreach ($customer->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "customers",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("customer was created successfully");

        $this->dispatcher->forward([
            'controller' => "customers",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a customer edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "customers",
                'action' => 'index'
            ]);

            return;
        }

        $ListID = $this->request->getPost("ListID");
        $customer = Customers::findFirstByListID($ListID);

        if (!$customer) {
            $this->flash->error("customer does not exist " . $ListID);

            $this->dispatcher->forward([
                'controller' => "customers",
                'action' => 'index'
            ]);

            return;
        }

        $customer->Listid = $this->request->getPost("ListID");
        $customer->Timecreated = $this->request->getPost("TimeCreated");
        $customer->Timemodified = $this->request->getPost("TimeModified");
        $customer->Name = $this->request->getPost("Name");
        $customer->Fullname = $this->request->getPost("FullName");
        $customer->Firstname = $this->request->getPost("FirstName");
        $customer->Middlename = $this->request->getPost("MiddleName");
        $customer->Lastname = $this->request->getPost("LastName");
        $customer->Contact = $this->request->getPost("Contact");
        $customer->Shipaddress_addr1 = $this->request->getPost("ShipAddress_Addr1");
        $customer->Shipaddress_addr2 = $this->request->getPost("ShipAddress_Addr2");
        $customer->Shipaddress_city = $this->request->getPost("ShipAddress_City");
        $customer->Shipaddress_state = $this->request->getPost("ShipAddress_State");
        $customer->Shipaddress_province = $this->request->getPost("ShipAddress_Province");
        $customer->Shipaddress_postalcode = $this->request->getPost("ShipAddress_PostalCode");
        

        if (!$customer->save()) {

            foreach ($customer->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "customers",
                'action' => 'edit',
                'params' => [$customer->ListID]
            ]);

            return;
        }

        $this->flash->success("customer was updated successfully");

        $this->dispatcher->forward([
            'controller' => "customers",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a customer
     *
     * @param string $ListID
     */
    public function deleteAction($ListID)
    {
        $customer = Customers::findFirstByListID($ListID);
        if (!$customer) {
            $this->flash->error("customer was not found");

            $this->dispatcher->forward([
                'controller' => "customers",
                'action' => 'index'
            ]);

            return;
        }

        if (!$customer->delete()) {

            foreach ($customer->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "customers",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("customer was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "customers",
            'action' => "index"
        ]);
    }

}
