<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class SalesorderlinedetailController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for salesorderlinedetail
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Salesorderlinedetail', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "TxnLineID";

        $salesorderlinedetail = Salesorderlinedetail::find($parameters);
        if (count($salesorderlinedetail) == 0) {
            $this->flash->notice("The search did not find any salesorderlinedetail");

            $this->dispatcher->forward([
                "controller" => "salesorderlinedetail",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $salesorderlinedetail,
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
     * Edits a salesorderlinedetail
     *
     * @param string $TxnLineID
     */
    public function editAction($TxnLineID)
    {
        if (!$this->request->isPost()) {

            $salesorderlinedetail = Salesorderlinedetail::findFirstByTxnLineID($TxnLineID);
            if (!$salesorderlinedetail) {
                $this->flash->error("salesorderlinedetail was not found");

                $this->dispatcher->forward([
                    'controller' => "salesorderlinedetail",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->TxnLineID = $salesorderlinedetail->getTxnlineid();

            $this->tag->setDefault("TxnLineID", $salesorderlinedetail->getTxnlineid());
            $this->tag->setDefault("ItemRef_ListID", $salesorderlinedetail->getItemrefListid());
            $this->tag->setDefault("ItemRef_FullName", $salesorderlinedetail->getItemrefFullname());
            $this->tag->setDefault("Description", $salesorderlinedetail->getDescription());
            $this->tag->setDefault("Quantity", $salesorderlinedetail->getQuantity());
            $this->tag->setDefault("UnitOfMeasure", $salesorderlinedetail->getUnitofmeasure());
            $this->tag->setDefault("OverrideUOMSetRef_ListID", $salesorderlinedetail->getOverrideuomsetrefListid());
            $this->tag->setDefault("OverrideUOMSetRef_FullName", $salesorderlinedetail->getOverrideuomsetrefFullname());
            $this->tag->setDefault("Rate", $salesorderlinedetail->getRate());
            $this->tag->setDefault("RatePercent", $salesorderlinedetail->getRatepercent());
            $this->tag->setDefault("ClassRef_ListID", $salesorderlinedetail->getClassrefListid());
            $this->tag->setDefault("ClassRef_FullName", $salesorderlinedetail->getClassrefFullname());
            $this->tag->setDefault("Amount", $salesorderlinedetail->getAmount());
            $this->tag->setDefault("InventorySiteRef_ListID", $salesorderlinedetail->getInventorysiterefListid());
            $this->tag->setDefault("InventorySiteRef_FullName", $salesorderlinedetail->getInventorysiterefFullname());
            $this->tag->setDefault("SerialNumber", $salesorderlinedetail->getSerialnumber());
            $this->tag->setDefault("LotNumber", $salesorderlinedetail->getLotnumber());
            $this->tag->setDefault("SalesTaxCodeRef_ListID", $salesorderlinedetail->getSalestaxcoderefListid());
            $this->tag->setDefault("SalesTaxCodeRef_FullName", $salesorderlinedetail->getSalestaxcoderefFullname());
            $this->tag->setDefault("Invoiced", $salesorderlinedetail->getInvoiced());
            $this->tag->setDefault("IsManuallyClosed", $salesorderlinedetail->getIsmanuallyclosed());
            $this->tag->setDefault("Other1", $salesorderlinedetail->getOther1());
            $this->tag->setDefault("Other2", $salesorderlinedetail->getOther2());
            $this->tag->setDefault("CustomField1", $salesorderlinedetail->getCustomfield1());
            $this->tag->setDefault("CustomField2", $salesorderlinedetail->getCustomfield2());
            $this->tag->setDefault("CustomField3", $salesorderlinedetail->getCustomfield3());
            $this->tag->setDefault("CustomField4", $salesorderlinedetail->getCustomfield4());
            $this->tag->setDefault("CustomField5", $salesorderlinedetail->getCustomfield5());
            $this->tag->setDefault("CustomField6", $salesorderlinedetail->getCustomfield6());
            $this->tag->setDefault("CustomField7", $salesorderlinedetail->getCustomfield7());
            $this->tag->setDefault("CustomField8", $salesorderlinedetail->getCustomfield8());
            $this->tag->setDefault("CustomField9", $salesorderlinedetail->getCustomfield9());
            $this->tag->setDefault("CustomField10", $salesorderlinedetail->getCustomfield10());
            $this->tag->setDefault("CustomField11", $salesorderlinedetail->getCustomfield11());
            $this->tag->setDefault("CustomField12", $salesorderlinedetail->getCustomfield12());
            $this->tag->setDefault("CustomField13", $salesorderlinedetail->getCustomfield13());
            $this->tag->setDefault("CustomField14", $salesorderlinedetail->getCustomfield14());
            $this->tag->setDefault("CustomField15", $salesorderlinedetail->getCustomfield15());
            $this->tag->setDefault("IDKEY", $salesorderlinedetail->getIdkey());
            $this->tag->setDefault("GroupIDKEY", $salesorderlinedetail->getGroupidkey());
            
        }
    }

    /**
     * Creates a new salesorderlinedetail
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "salesorderlinedetail",
                'action' => 'index'
            ]);

            return;
        }

        $salesorderlinedetail = new Salesorderlinedetail();
        $salesorderlinedetail->setTxnlineid($this->request->getPost("TxnLineID"));
        $salesorderlinedetail->setItemrefListid($this->request->getPost("ItemRef_ListID"));
        $salesorderlinedetail->setItemrefFullname($this->request->getPost("ItemRef_FullName"));
        $salesorderlinedetail->setDescription($this->request->getPost("Description"));
        $salesorderlinedetail->setQuantity($this->request->getPost("Quantity"));
        $salesorderlinedetail->setUnitofmeasure($this->request->getPost("UnitOfMeasure"));
        $salesorderlinedetail->setOverrideuomsetrefListid($this->request->getPost("OverrideUOMSetRef_ListID"));
        $salesorderlinedetail->setOverrideuomsetrefFullname($this->request->getPost("OverrideUOMSetRef_FullName"));
        $salesorderlinedetail->setRate($this->request->getPost("Rate"));
        $salesorderlinedetail->setRatepercent($this->request->getPost("RatePercent"));
        $salesorderlinedetail->setClassrefListid($this->request->getPost("ClassRef_ListID"));
        $salesorderlinedetail->setClassrefFullname($this->request->getPost("ClassRef_FullName"));
        $salesorderlinedetail->setAmount($this->request->getPost("Amount"));
        $salesorderlinedetail->setInventorysiterefListid($this->request->getPost("InventorySiteRef_ListID"));
        $salesorderlinedetail->setInventorysiterefFullname($this->request->getPost("InventorySiteRef_FullName"));
        $salesorderlinedetail->setSerialnumber($this->request->getPost("SerialNumber"));
        $salesorderlinedetail->setLotnumber($this->request->getPost("LotNumber"));
        $salesorderlinedetail->setSalestaxcoderefListid($this->request->getPost("SalesTaxCodeRef_ListID"));
        $salesorderlinedetail->setSalestaxcoderefFullname($this->request->getPost("SalesTaxCodeRef_FullName"));
        $salesorderlinedetail->setInvoiced($this->request->getPost("Invoiced"));
        $salesorderlinedetail->setIsmanuallyclosed($this->request->getPost("IsManuallyClosed"));
        $salesorderlinedetail->setOther1($this->request->getPost("Other1"));
        $salesorderlinedetail->setOther2($this->request->getPost("Other2"));
        $salesorderlinedetail->setCustomfield1($this->request->getPost("CustomField1"));
        $salesorderlinedetail->setCustomfield2($this->request->getPost("CustomField2"));
        $salesorderlinedetail->setCustomfield3($this->request->getPost("CustomField3"));
        $salesorderlinedetail->setCustomfield4($this->request->getPost("CustomField4"));
        $salesorderlinedetail->setCustomfield5($this->request->getPost("CustomField5"));
        $salesorderlinedetail->setCustomfield6($this->request->getPost("CustomField6"));
        $salesorderlinedetail->setCustomfield7($this->request->getPost("CustomField7"));
        $salesorderlinedetail->setCustomfield8($this->request->getPost("CustomField8"));
        $salesorderlinedetail->setCustomfield9($this->request->getPost("CustomField9"));
        $salesorderlinedetail->setCustomfield10($this->request->getPost("CustomField10"));
        $salesorderlinedetail->setCustomfield11($this->request->getPost("CustomField11"));
        $salesorderlinedetail->setCustomfield12($this->request->getPost("CustomField12"));
        $salesorderlinedetail->setCustomfield13($this->request->getPost("CustomField13"));
        $salesorderlinedetail->setCustomfield14($this->request->getPost("CustomField14"));
        $salesorderlinedetail->setCustomfield15($this->request->getPost("CustomField15"));
        $salesorderlinedetail->setIdkey($this->request->getPost("IDKEY"));
        $salesorderlinedetail->setGroupidkey($this->request->getPost("GroupIDKEY"));
        

        if (!$salesorderlinedetail->save()) {
            foreach ($salesorderlinedetail->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "salesorderlinedetail",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("salesorderlinedetail was created successfully");

        $this->dispatcher->forward([
            'controller' => "salesorderlinedetail",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a salesorderlinedetail edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "salesorderlinedetail",
                'action' => 'index'
            ]);

            return;
        }

        $TxnLineID = $this->request->getPost("TxnLineID");
        $salesorderlinedetail = Salesorderlinedetail::findFirstByTxnLineID($TxnLineID);

        if (!$salesorderlinedetail) {
            $this->flash->error("salesorderlinedetail does not exist " . $TxnLineID);

            $this->dispatcher->forward([
                'controller' => "salesorderlinedetail",
                'action' => 'index'
            ]);

            return;
        }

        $salesorderlinedetail->setTxnlineid($this->request->getPost("TxnLineID"));
        $salesorderlinedetail->setItemrefListid($this->request->getPost("ItemRef_ListID"));
        $salesorderlinedetail->setItemrefFullname($this->request->getPost("ItemRef_FullName"));
        $salesorderlinedetail->setDescription($this->request->getPost("Description"));
        $salesorderlinedetail->setQuantity($this->request->getPost("Quantity"));
        $salesorderlinedetail->setUnitofmeasure($this->request->getPost("UnitOfMeasure"));
        $salesorderlinedetail->setOverrideuomsetrefListid($this->request->getPost("OverrideUOMSetRef_ListID"));
        $salesorderlinedetail->setOverrideuomsetrefFullname($this->request->getPost("OverrideUOMSetRef_FullName"));
        $salesorderlinedetail->setRate($this->request->getPost("Rate"));
        $salesorderlinedetail->setRatepercent($this->request->getPost("RatePercent"));
        $salesorderlinedetail->setClassrefListid($this->request->getPost("ClassRef_ListID"));
        $salesorderlinedetail->setClassrefFullname($this->request->getPost("ClassRef_FullName"));
        $salesorderlinedetail->setAmount($this->request->getPost("Amount"));
        $salesorderlinedetail->setInventorysiterefListid($this->request->getPost("InventorySiteRef_ListID"));
        $salesorderlinedetail->setInventorysiterefFullname($this->request->getPost("InventorySiteRef_FullName"));
        $salesorderlinedetail->setSerialnumber($this->request->getPost("SerialNumber"));
        $salesorderlinedetail->setLotnumber($this->request->getPost("LotNumber"));
        $salesorderlinedetail->setSalestaxcoderefListid($this->request->getPost("SalesTaxCodeRef_ListID"));
        $salesorderlinedetail->setSalestaxcoderefFullname($this->request->getPost("SalesTaxCodeRef_FullName"));
        $salesorderlinedetail->setInvoiced($this->request->getPost("Invoiced"));
        $salesorderlinedetail->setIsmanuallyclosed($this->request->getPost("IsManuallyClosed"));
        $salesorderlinedetail->setOther1($this->request->getPost("Other1"));
        $salesorderlinedetail->setOther2($this->request->getPost("Other2"));
        $salesorderlinedetail->setCustomfield1($this->request->getPost("CustomField1"));
        $salesorderlinedetail->setCustomfield2($this->request->getPost("CustomField2"));
        $salesorderlinedetail->setCustomfield3($this->request->getPost("CustomField3"));
        $salesorderlinedetail->setCustomfield4($this->request->getPost("CustomField4"));
        $salesorderlinedetail->setCustomfield5($this->request->getPost("CustomField5"));
        $salesorderlinedetail->setCustomfield6($this->request->getPost("CustomField6"));
        $salesorderlinedetail->setCustomfield7($this->request->getPost("CustomField7"));
        $salesorderlinedetail->setCustomfield8($this->request->getPost("CustomField8"));
        $salesorderlinedetail->setCustomfield9($this->request->getPost("CustomField9"));
        $salesorderlinedetail->setCustomfield10($this->request->getPost("CustomField10"));
        $salesorderlinedetail->setCustomfield11($this->request->getPost("CustomField11"));
        $salesorderlinedetail->setCustomfield12($this->request->getPost("CustomField12"));
        $salesorderlinedetail->setCustomfield13($this->request->getPost("CustomField13"));
        $salesorderlinedetail->setCustomfield14($this->request->getPost("CustomField14"));
        $salesorderlinedetail->setCustomfield15($this->request->getPost("CustomField15"));
        $salesorderlinedetail->setIdkey($this->request->getPost("IDKEY"));
        $salesorderlinedetail->setGroupidkey($this->request->getPost("GroupIDKEY"));
        

        if (!$salesorderlinedetail->save()) {

            foreach ($salesorderlinedetail->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "salesorderlinedetail",
                'action' => 'edit',
                'params' => [$salesorderlinedetail->getTxnlineid()]
            ]);

            return;
        }

        $this->flash->success("salesorderlinedetail was updated successfully");

        $this->dispatcher->forward([
            'controller' => "salesorderlinedetail",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a salesorderlinedetail
     *
     * @param string $TxnLineID
     */
    public function deleteAction($TxnLineID)
    {
        $salesorderlinedetail = Salesorderlinedetail::findFirstByTxnLineID($TxnLineID);
        if (!$salesorderlinedetail) {
            $this->flash->error("salesorderlinedetail was not found");

            $this->dispatcher->forward([
                'controller' => "salesorderlinedetail",
                'action' => 'index'
            ]);

            return;
        }

        if (!$salesorderlinedetail->delete()) {

            foreach ($salesorderlinedetail->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "salesorderlinedetail",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("salesorderlinedetail was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "salesorderlinedetail",
            'action' => "index"
        ]);
    }

}
