<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class ItemsalestaxController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for itemsalestax
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Itemsalestax', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "ListID";

        $itemsalestax = Itemsalestax::find($parameters);
        if (count($itemsalestax) == 0) {
            $this->flash->notice("The search did not find any itemsalestax");

            $this->dispatcher->forward([
                "controller" => "itemsalestax",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $itemsalestax,
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
     * Edits a itemsalestax
     *
     * @param string $ListID
     */
    public function editAction($ListID)
    {
        if (!$this->request->isPost()) {

            $itemsalestax = Itemsalestax::findFirstByListID($ListID);
            if (!$itemsalestax) {
                $this->flash->error("itemsalestax was not found");

                $this->dispatcher->forward([
                    'controller' => "itemsalestax",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->ListID = $itemsalestax->getListid();

            $this->tag->setDefault("ListID", $itemsalestax->getListid());
            $this->tag->setDefault("TimeCreated", $itemsalestax->getTimecreated());
            $this->tag->setDefault("TimeModified", $itemsalestax->getTimemodified());
            $this->tag->setDefault("EditSequence", $itemsalestax->getEditsequence());
            $this->tag->setDefault("Name", $itemsalestax->getName());
            $this->tag->setDefault("BarCodeValue", $itemsalestax->getBarcodevalue());
            $this->tag->setDefault("IsActive", $itemsalestax->getIsactive());
            $this->tag->setDefault("ClassRef_ListID", $itemsalestax->getClassrefListid());
            $this->tag->setDefault("ClassRef_FullName", $itemsalestax->getClassrefFullname());
            $this->tag->setDefault("ItemDesc", $itemsalestax->getItemdesc());
            $this->tag->setDefault("IsUsedOnPurchaseTransaction", $itemsalestax->getIsusedonpurchasetransaction());
            $this->tag->setDefault("TaxRate", $itemsalestax->getTaxrate());
            $this->tag->setDefault("TaxVendorRef_ListID", $itemsalestax->getTaxvendorrefListid());
            $this->tag->setDefault("TaxVendorRef_FullName", $itemsalestax->getTaxvendorrefFullname());
            $this->tag->setDefault("Status", $itemsalestax->getStatus());
            
        }
    }

    /**
     * Creates a new itemsalestax
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "itemsalestax",
                'action' => 'index'
            ]);

            return;
        }

        $itemsalestax = new Itemsalestax();
        $itemsalestax->setListid($this->request->getPost("ListID"));
        $itemsalestax->setTimecreated($this->request->getPost("TimeCreated"));
        $itemsalestax->setTimemodified($this->request->getPost("TimeModified"));
        $itemsalestax->setEditsequence($this->request->getPost("EditSequence"));
        $itemsalestax->setName($this->request->getPost("Name"));
        $itemsalestax->setBarcodevalue($this->request->getPost("BarCodeValue"));
        $itemsalestax->setIsactive($this->request->getPost("IsActive"));
        $itemsalestax->setClassrefListid($this->request->getPost("ClassRef_ListID"));
        $itemsalestax->setClassrefFullname($this->request->getPost("ClassRef_FullName"));
        $itemsalestax->setItemdesc($this->request->getPost("ItemDesc"));
        $itemsalestax->setIsusedonpurchasetransaction($this->request->getPost("IsUsedOnPurchaseTransaction"));
        $itemsalestax->setTaxrate($this->request->getPost("TaxRate"));
        $itemsalestax->setTaxvendorrefListid($this->request->getPost("TaxVendorRef_ListID"));
        $itemsalestax->setTaxvendorrefFullname($this->request->getPost("TaxVendorRef_FullName"));
        $itemsalestax->setStatus($this->request->getPost("Status"));
        

        if (!$itemsalestax->save()) {
            foreach ($itemsalestax->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "itemsalestax",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("itemsalestax was created successfully");

        $this->dispatcher->forward([
            'controller' => "itemsalestax",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a itemsalestax edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "itemsalestax",
                'action' => 'index'
            ]);

            return;
        }

        $ListID = $this->request->getPost("ListID");
        $itemsalestax = Itemsalestax::findFirstByListID($ListID);

        if (!$itemsalestax) {
            $this->flash->error("itemsalestax does not exist " . $ListID);

            $this->dispatcher->forward([
                'controller' => "itemsalestax",
                'action' => 'index'
            ]);

            return;
        }

        $itemsalestax->setListid($this->request->getPost("ListID"));
        $itemsalestax->setTimecreated($this->request->getPost("TimeCreated"));
        $itemsalestax->setTimemodified($this->request->getPost("TimeModified"));
        $itemsalestax->setEditsequence($this->request->getPost("EditSequence"));
        $itemsalestax->setName($this->request->getPost("Name"));
        $itemsalestax->setBarcodevalue($this->request->getPost("BarCodeValue"));
        $itemsalestax->setIsactive($this->request->getPost("IsActive"));
        $itemsalestax->setClassrefListid($this->request->getPost("ClassRef_ListID"));
        $itemsalestax->setClassrefFullname($this->request->getPost("ClassRef_FullName"));
        $itemsalestax->setItemdesc($this->request->getPost("ItemDesc"));
        $itemsalestax->setIsusedonpurchasetransaction($this->request->getPost("IsUsedOnPurchaseTransaction"));
        $itemsalestax->setTaxrate($this->request->getPost("TaxRate"));
        $itemsalestax->setTaxvendorrefListid($this->request->getPost("TaxVendorRef_ListID"));
        $itemsalestax->setTaxvendorrefFullname($this->request->getPost("TaxVendorRef_FullName"));
        $itemsalestax->setStatus($this->request->getPost("Status"));
        

        if (!$itemsalestax->save()) {

            foreach ($itemsalestax->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "itemsalestax",
                'action' => 'edit',
                'params' => [$itemsalestax->getListid()]
            ]);

            return;
        }

        $this->flash->success("itemsalestax was updated successfully");

        $this->dispatcher->forward([
            'controller' => "itemsalestax",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a itemsalestax
     *
     * @param string $ListID
     */
    public function deleteAction($ListID)
    {
        $itemsalestax = Itemsalestax::findFirstByListID($ListID);
        if (!$itemsalestax) {
            $this->flash->error("itemsalestax was not found");

            $this->dispatcher->forward([
                'controller' => "itemsalestax",
                'action' => 'index'
            ]);

            return;
        }

        if (!$itemsalestax->delete()) {

            foreach ($itemsalestax->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "itemsalestax",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("itemsalestax was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "itemsalestax",
            'action' => "index"
        ]);
    }

}
