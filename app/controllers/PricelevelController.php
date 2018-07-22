<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class PricelevelController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for pricelevel
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Pricelevel', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "ListID";

        $pricelevel = Pricelevel::find($parameters);
        if (count($pricelevel) == 0) {
            $this->flash->notice("The search did not find any pricelevel");

            $this->dispatcher->forward([
                "controller" => "pricelevel",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $pricelevel,
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
     * Edits a pricelevel
     *
     * @param string $ListID
     */
    public function editAction($ListID)
    {
        if (!$this->request->isPost()) {

            $pricelevel = Pricelevel::findFirstByListID($ListID);
            if (!$pricelevel) {
                $this->flash->error("pricelevel was not found");

                $this->dispatcher->forward([
                    'controller' => "pricelevel",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->ListID = $pricelevel->getListid();

            $this->tag->setDefault("ListID", $pricelevel->getListid());
            $this->tag->setDefault("TimeCreated", $pricelevel->getTimecreated());
            $this->tag->setDefault("TimeModified", $pricelevel->getTimemodified());
            $this->tag->setDefault("EditSequence", $pricelevel->getEditsequence());
            $this->tag->setDefault("Name", $pricelevel->getName());
            $this->tag->setDefault("IsActive", $pricelevel->getIsactive());
            $this->tag->setDefault("PriceLevelType", $pricelevel->getPriceleveltype());
            $this->tag->setDefault("PriceLevelFixedPercentage", $pricelevel->getPricelevelfixedpercentage());
            $this->tag->setDefault("CurrencyRef_ListID", $pricelevel->getCurrencyrefListid());
            $this->tag->setDefault("CurrencyRef_FullName", $pricelevel->getCurrencyrefFullname());
            $this->tag->setDefault("Status", $pricelevel->getStatus());
            
        }
    }

    /**
     * Creates a new pricelevel
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "pricelevel",
                'action' => 'index'
            ]);

            return;
        }

        $pricelevel = new Pricelevel();
        $pricelevel->setListid($this->request->getPost("ListID"));
        $pricelevel->setTimecreated($this->request->getPost("TimeCreated"));
        $pricelevel->setTimemodified($this->request->getPost("TimeModified"));
        $pricelevel->setEditsequence($this->request->getPost("EditSequence"));
        $pricelevel->setName($this->request->getPost("Name"));
        $pricelevel->setIsactive($this->request->getPost("IsActive"));
        $pricelevel->setPriceleveltype($this->request->getPost("PriceLevelType"));
        $pricelevel->setPricelevelfixedpercentage($this->request->getPost("PriceLevelFixedPercentage"));
        $pricelevel->setCurrencyrefListid($this->request->getPost("CurrencyRef_ListID"));
        $pricelevel->setCurrencyrefFullname($this->request->getPost("CurrencyRef_FullName"));
        $pricelevel->setStatus($this->request->getPost("Status"));
        

        if (!$pricelevel->save()) {
            foreach ($pricelevel->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "pricelevel",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("pricelevel was created successfully");

        $this->dispatcher->forward([
            'controller' => "pricelevel",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a pricelevel edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "pricelevel",
                'action' => 'index'
            ]);

            return;
        }

        $ListID = $this->request->getPost("ListID");
        $pricelevel = Pricelevel::findFirstByListID($ListID);

        if (!$pricelevel) {
            $this->flash->error("pricelevel does not exist " . $ListID);

            $this->dispatcher->forward([
                'controller' => "pricelevel",
                'action' => 'index'
            ]);

            return;
        }

        $pricelevel->setListid($this->request->getPost("ListID"));
        $pricelevel->setTimecreated($this->request->getPost("TimeCreated"));
        $pricelevel->setTimemodified($this->request->getPost("TimeModified"));
        $pricelevel->setEditsequence($this->request->getPost("EditSequence"));
        $pricelevel->setName($this->request->getPost("Name"));
        $pricelevel->setIsactive($this->request->getPost("IsActive"));
        $pricelevel->setPriceleveltype($this->request->getPost("PriceLevelType"));
        $pricelevel->setPricelevelfixedpercentage($this->request->getPost("PriceLevelFixedPercentage"));
        $pricelevel->setCurrencyrefListid($this->request->getPost("CurrencyRef_ListID"));
        $pricelevel->setCurrencyrefFullname($this->request->getPost("CurrencyRef_FullName"));
        $pricelevel->setStatus($this->request->getPost("Status"));
        

        if (!$pricelevel->save()) {

            foreach ($pricelevel->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "pricelevel",
                'action' => 'edit',
                'params' => [$pricelevel->getListid()]
            ]);

            return;
        }

        $this->flash->success("pricelevel was updated successfully");

        $this->dispatcher->forward([
            'controller' => "pricelevel",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a pricelevel
     *
     * @param string $ListID
     */
    public function deleteAction($ListID)
    {
        $pricelevel = Pricelevel::findFirstByListID($ListID);
        if (!$pricelevel) {
            $this->flash->error("pricelevel was not found");

            $this->dispatcher->forward([
                'controller' => "pricelevel",
                'action' => 'index'
            ]);

            return;
        }

        if (!$pricelevel->delete()) {

            foreach ($pricelevel->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "pricelevel",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("pricelevel was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "pricelevel",
            'action' => "index"
        ]);
    }

}
