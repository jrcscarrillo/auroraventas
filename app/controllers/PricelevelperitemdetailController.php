<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class PricelevelperitemdetailController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for pricelevelperitemdetail
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Pricelevelperitemdetail', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "ItemRef_ListID";

        $pricelevelperitemdetail = Pricelevelperitemdetail::find($parameters);
        if (count($pricelevelperitemdetail) == 0) {
            $this->flash->notice("The search did not find any pricelevelperitemdetail");

            $this->dispatcher->forward([
                "controller" => "pricelevelperitemdetail",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $pricelevelperitemdetail,
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
     * Edits a pricelevelperitemdetail
     *
     * @param string $ItemRef_ListID
     */
    public function editAction($ItemRef_ListID)
    {
        if (!$this->request->isPost()) {

            $pricelevelperitemdetail = Pricelevelperitemdetail::findFirstByItemRef_ListID($ItemRef_ListID);
            if (!$pricelevelperitemdetail) {
                $this->flash->error("pricelevelperitemdetail was not found");

                $this->dispatcher->forward([
                    'controller' => "pricelevelperitemdetail",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->ItemRef_ListID = $pricelevelperitemdetail->getItemrefListid();

            $this->tag->setDefault("ItemRef_ListID", $pricelevelperitemdetail->getItemrefListid());
            $this->tag->setDefault("ItemRef_FullName", $pricelevelperitemdetail->getItemrefFullname());
            $this->tag->setDefault("CustomPrice", $pricelevelperitemdetail->getCustomprice());
            $this->tag->setDefault("CustomPricePercent", $pricelevelperitemdetail->getCustompricepercent());
            $this->tag->setDefault("CustomField1", $pricelevelperitemdetail->getCustomfield1());
            $this->tag->setDefault("CustomField2", $pricelevelperitemdetail->getCustomfield2());
            $this->tag->setDefault("CustomField3", $pricelevelperitemdetail->getCustomfield3());
            $this->tag->setDefault("CustomField4", $pricelevelperitemdetail->getCustomfield4());
            $this->tag->setDefault("CustomField5", $pricelevelperitemdetail->getCustomfield5());
            $this->tag->setDefault("CustomField6", $pricelevelperitemdetail->getCustomfield6());
            $this->tag->setDefault("CustomField7", $pricelevelperitemdetail->getCustomfield7());
            $this->tag->setDefault("CustomField8", $pricelevelperitemdetail->getCustomfield8());
            $this->tag->setDefault("CustomField9", $pricelevelperitemdetail->getCustomfield9());
            $this->tag->setDefault("CustomField10", $pricelevelperitemdetail->getCustomfield10());
            $this->tag->setDefault("CustomField11", $pricelevelperitemdetail->getCustomfield11());
            $this->tag->setDefault("CustomField12", $pricelevelperitemdetail->getCustomfield12());
            $this->tag->setDefault("CustomField13", $pricelevelperitemdetail->getCustomfield13());
            $this->tag->setDefault("CustomField14", $pricelevelperitemdetail->getCustomfield14());
            $this->tag->setDefault("CustomField15", $pricelevelperitemdetail->getCustomfield15());
            $this->tag->setDefault("IDKEY", $pricelevelperitemdetail->getIdkey());
            
        }
    }

    /**
     * Creates a new pricelevelperitemdetail
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "pricelevelperitemdetail",
                'action' => 'index'
            ]);

            return;
        }

        $pricelevelperitemdetail = new Pricelevelperitemdetail();
        $pricelevelperitemdetail->setItemrefListid($this->request->getPost("ItemRef_ListID"));
        $pricelevelperitemdetail->setItemrefFullname($this->request->getPost("ItemRef_FullName"));
        $pricelevelperitemdetail->setCustomprice($this->request->getPost("CustomPrice"));
        $pricelevelperitemdetail->setCustompricepercent($this->request->getPost("CustomPricePercent"));
        $pricelevelperitemdetail->setCustomfield1($this->request->getPost("CustomField1"));
        $pricelevelperitemdetail->setCustomfield2($this->request->getPost("CustomField2"));
        $pricelevelperitemdetail->setCustomfield3($this->request->getPost("CustomField3"));
        $pricelevelperitemdetail->setCustomfield4($this->request->getPost("CustomField4"));
        $pricelevelperitemdetail->setCustomfield5($this->request->getPost("CustomField5"));
        $pricelevelperitemdetail->setCustomfield6($this->request->getPost("CustomField6"));
        $pricelevelperitemdetail->setCustomfield7($this->request->getPost("CustomField7"));
        $pricelevelperitemdetail->setCustomfield8($this->request->getPost("CustomField8"));
        $pricelevelperitemdetail->setCustomfield9($this->request->getPost("CustomField9"));
        $pricelevelperitemdetail->setCustomfield10($this->request->getPost("CustomField10"));
        $pricelevelperitemdetail->setCustomfield11($this->request->getPost("CustomField11"));
        $pricelevelperitemdetail->setCustomfield12($this->request->getPost("CustomField12"));
        $pricelevelperitemdetail->setCustomfield13($this->request->getPost("CustomField13"));
        $pricelevelperitemdetail->setCustomfield14($this->request->getPost("CustomField14"));
        $pricelevelperitemdetail->setCustomfield15($this->request->getPost("CustomField15"));
        $pricelevelperitemdetail->setIdkey($this->request->getPost("IDKEY"));
        

        if (!$pricelevelperitemdetail->save()) {
            foreach ($pricelevelperitemdetail->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "pricelevelperitemdetail",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("pricelevelperitemdetail was created successfully");

        $this->dispatcher->forward([
            'controller' => "pricelevelperitemdetail",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a pricelevelperitemdetail edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "pricelevelperitemdetail",
                'action' => 'index'
            ]);

            return;
        }

        $ItemRef_ListID = $this->request->getPost("ItemRef_ListID");
        $pricelevelperitemdetail = Pricelevelperitemdetail::findFirstByItemRef_ListID($ItemRef_ListID);

        if (!$pricelevelperitemdetail) {
            $this->flash->error("pricelevelperitemdetail does not exist " . $ItemRef_ListID);

            $this->dispatcher->forward([
                'controller' => "pricelevelperitemdetail",
                'action' => 'index'
            ]);

            return;
        }

        $pricelevelperitemdetail->setItemrefListid($this->request->getPost("ItemRef_ListID"));
        $pricelevelperitemdetail->setItemrefFullname($this->request->getPost("ItemRef_FullName"));
        $pricelevelperitemdetail->setCustomprice($this->request->getPost("CustomPrice"));
        $pricelevelperitemdetail->setCustompricepercent($this->request->getPost("CustomPricePercent"));
        $pricelevelperitemdetail->setCustomfield1($this->request->getPost("CustomField1"));
        $pricelevelperitemdetail->setCustomfield2($this->request->getPost("CustomField2"));
        $pricelevelperitemdetail->setCustomfield3($this->request->getPost("CustomField3"));
        $pricelevelperitemdetail->setCustomfield4($this->request->getPost("CustomField4"));
        $pricelevelperitemdetail->setCustomfield5($this->request->getPost("CustomField5"));
        $pricelevelperitemdetail->setCustomfield6($this->request->getPost("CustomField6"));
        $pricelevelperitemdetail->setCustomfield7($this->request->getPost("CustomField7"));
        $pricelevelperitemdetail->setCustomfield8($this->request->getPost("CustomField8"));
        $pricelevelperitemdetail->setCustomfield9($this->request->getPost("CustomField9"));
        $pricelevelperitemdetail->setCustomfield10($this->request->getPost("CustomField10"));
        $pricelevelperitemdetail->setCustomfield11($this->request->getPost("CustomField11"));
        $pricelevelperitemdetail->setCustomfield12($this->request->getPost("CustomField12"));
        $pricelevelperitemdetail->setCustomfield13($this->request->getPost("CustomField13"));
        $pricelevelperitemdetail->setCustomfield14($this->request->getPost("CustomField14"));
        $pricelevelperitemdetail->setCustomfield15($this->request->getPost("CustomField15"));
        $pricelevelperitemdetail->setIdkey($this->request->getPost("IDKEY"));
        

        if (!$pricelevelperitemdetail->save()) {

            foreach ($pricelevelperitemdetail->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "pricelevelperitemdetail",
                'action' => 'edit',
                'params' => [$pricelevelperitemdetail->getItemrefListid()]
            ]);

            return;
        }

        $this->flash->success("pricelevelperitemdetail was updated successfully");

        $this->dispatcher->forward([
            'controller' => "pricelevelperitemdetail",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a pricelevelperitemdetail
     *
     * @param string $ItemRef_ListID
     */
    public function deleteAction($ItemRef_ListID)
    {
        $pricelevelperitemdetail = Pricelevelperitemdetail::findFirstByItemRef_ListID($ItemRef_ListID);
        if (!$pricelevelperitemdetail) {
            $this->flash->error("pricelevelperitemdetail was not found");

            $this->dispatcher->forward([
                'controller' => "pricelevelperitemdetail",
                'action' => 'index'
            ]);

            return;
        }

        if (!$pricelevelperitemdetail->delete()) {

            foreach ($pricelevelperitemdetail->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "pricelevelperitemdetail",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("pricelevelperitemdetail was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "pricelevelperitemdetail",
            'action' => "index"
        ]);
    }

}
