<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class CambiodetalleController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for cambiodetalle
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Cambiodetalle', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "TxnLineID";

        $cambiodetalle = Cambiodetalle::find($parameters);
        if (count($cambiodetalle) == 0) {
            $this->flash->notice("The search did not find any cambiodetalle");

            $this->dispatcher->forward([
                "controller" => "cambiodetalle",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $cambiodetalle,
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
     * Edits a cambiodetalle
     *
     * @param string $TxnLineID
     */
    public function editAction($TxnLineID)
    {
        if (!$this->request->isPost()) {

            $cambiodetalle = Cambiodetalle::findFirstByTxnLineID($TxnLineID);
            if (!$cambiodetalle) {
                $this->flash->error("cambiodetalle was not found");

                $this->dispatcher->forward([
                    'controller' => "cambiodetalle",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->TxnLineID = $cambiodetalle->getTxnlineid();

            $this->tag->setDefault("TxnLineID", $cambiodetalle->getTxnlineid());
            $this->tag->setDefault("ItemRef_ListID", $cambiodetalle->getItemrefListid());
            $this->tag->setDefault("ItemRef_FullName", $cambiodetalle->getItemrefFullname());
            $this->tag->setDefault("Description", $cambiodetalle->getDescription());
            $this->tag->setDefault("Quantity", $cambiodetalle->getQuantity());
            $this->tag->setDefault("UnitOfMeasure", $cambiodetalle->getUnitofmeasure());
            $this->tag->setDefault("Rate", $cambiodetalle->getRate());
            $this->tag->setDefault("RatePercent", $cambiodetalle->getRatepercent());
            $this->tag->setDefault("Amount", $cambiodetalle->getAmount());
            $this->tag->setDefault("InventorySiteRef_ListID", $cambiodetalle->getInventorysiterefListid());
            $this->tag->setDefault("InventorySiteRef_FullName", $cambiodetalle->getInventorysiterefFullname());
            $this->tag->setDefault("SerialNumber", $cambiodetalle->getSerialnumber());
            $this->tag->setDefault("LotNumber", $cambiodetalle->getLotnumber());
            $this->tag->setDefault("SalesTaxCodeRef_ListID", $cambiodetalle->getSalestaxcoderefListid());
            $this->tag->setDefault("SalesTaxCodeRef_FullName", $cambiodetalle->getSalestaxcoderefFullname());
            $this->tag->setDefault("Invoiced", $cambiodetalle->getInvoiced());
            $this->tag->setDefault("IsManuallyClosed", $cambiodetalle->getIsmanuallyclosed());
            $this->tag->setDefault("Other1", $cambiodetalle->getOther1());
            $this->tag->setDefault("Other2", $cambiodetalle->getOther2());
            $this->tag->setDefault("IDKEY", $cambiodetalle->getIdkey());
            
        }
    }

    /**
     * Creates a new cambiodetalle
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "cambiodetalle",
                'action' => 'index'
            ]);

            return;
        }

        $cambiodetalle = new Cambiodetalle();
        $cambiodetalle->setTxnlineid($this->request->getPost("TxnLineID"));
        $cambiodetalle->setItemrefListid($this->request->getPost("ItemRef_ListID"));
        $cambiodetalle->setItemrefFullname($this->request->getPost("ItemRef_FullName"));
        $cambiodetalle->setDescription($this->request->getPost("Description"));
        $cambiodetalle->setQuantity($this->request->getPost("Quantity"));
        $cambiodetalle->setUnitofmeasure($this->request->getPost("UnitOfMeasure"));
        $cambiodetalle->setRate($this->request->getPost("Rate"));
        $cambiodetalle->setRatepercent($this->request->getPost("RatePercent"));
        $cambiodetalle->setAmount($this->request->getPost("Amount"));
        $cambiodetalle->setInventorysiterefListid($this->request->getPost("InventorySiteRef_ListID"));
        $cambiodetalle->setInventorysiterefFullname($this->request->getPost("InventorySiteRef_FullName"));
        $cambiodetalle->setSerialnumber($this->request->getPost("SerialNumber"));
        $cambiodetalle->setLotnumber($this->request->getPost("LotNumber"));
        $cambiodetalle->setSalestaxcoderefListid($this->request->getPost("SalesTaxCodeRef_ListID"));
        $cambiodetalle->setSalestaxcoderefFullname($this->request->getPost("SalesTaxCodeRef_FullName"));
        $cambiodetalle->setInvoiced($this->request->getPost("Invoiced"));
        $cambiodetalle->setIsmanuallyclosed($this->request->getPost("IsManuallyClosed"));
        $cambiodetalle->setOther1($this->request->getPost("Other1"));
        $cambiodetalle->setOther2($this->request->getPost("Other2"));
        $cambiodetalle->setIdkey($this->request->getPost("IDKEY"));
        

        if (!$cambiodetalle->save()) {
            foreach ($cambiodetalle->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "cambiodetalle",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("cambiodetalle was created successfully");

        $this->dispatcher->forward([
            'controller' => "cambiodetalle",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a cambiodetalle edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "cambiodetalle",
                'action' => 'index'
            ]);

            return;
        }

        $TxnLineID = $this->request->getPost("TxnLineID");
        $cambiodetalle = Cambiodetalle::findFirstByTxnLineID($TxnLineID);

        if (!$cambiodetalle) {
            $this->flash->error("cambiodetalle does not exist " . $TxnLineID);

            $this->dispatcher->forward([
                'controller' => "cambiodetalle",
                'action' => 'index'
            ]);

            return;
        }

        $cambiodetalle->setTxnlineid($this->request->getPost("TxnLineID"));
        $cambiodetalle->setItemrefListid($this->request->getPost("ItemRef_ListID"));
        $cambiodetalle->setItemrefFullname($this->request->getPost("ItemRef_FullName"));
        $cambiodetalle->setDescription($this->request->getPost("Description"));
        $cambiodetalle->setQuantity($this->request->getPost("Quantity"));
        $cambiodetalle->setUnitofmeasure($this->request->getPost("UnitOfMeasure"));
        $cambiodetalle->setRate($this->request->getPost("Rate"));
        $cambiodetalle->setRatepercent($this->request->getPost("RatePercent"));
        $cambiodetalle->setAmount($this->request->getPost("Amount"));
        $cambiodetalle->setInventorysiterefListid($this->request->getPost("InventorySiteRef_ListID"));
        $cambiodetalle->setInventorysiterefFullname($this->request->getPost("InventorySiteRef_FullName"));
        $cambiodetalle->setSerialnumber($this->request->getPost("SerialNumber"));
        $cambiodetalle->setLotnumber($this->request->getPost("LotNumber"));
        $cambiodetalle->setSalestaxcoderefListid($this->request->getPost("SalesTaxCodeRef_ListID"));
        $cambiodetalle->setSalestaxcoderefFullname($this->request->getPost("SalesTaxCodeRef_FullName"));
        $cambiodetalle->setInvoiced($this->request->getPost("Invoiced"));
        $cambiodetalle->setIsmanuallyclosed($this->request->getPost("IsManuallyClosed"));
        $cambiodetalle->setOther1($this->request->getPost("Other1"));
        $cambiodetalle->setOther2($this->request->getPost("Other2"));
        $cambiodetalle->setIdkey($this->request->getPost("IDKEY"));
        

        if (!$cambiodetalle->save()) {

            foreach ($cambiodetalle->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "cambiodetalle",
                'action' => 'edit',
                'params' => [$cambiodetalle->getTxnlineid()]
            ]);

            return;
        }

        $this->flash->success("cambiodetalle was updated successfully");

        $this->dispatcher->forward([
            'controller' => "cambiodetalle",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a cambiodetalle
     *
     * @param string $TxnLineID
     */
    public function deleteAction($TxnLineID)
    {
        $cambiodetalle = Cambiodetalle::findFirstByTxnLineID($TxnLineID);
        if (!$cambiodetalle) {
            $this->flash->error("cambiodetalle was not found");

            $this->dispatcher->forward([
                'controller' => "cambiodetalle",
                'action' => 'index'
            ]);

            return;
        }

        if (!$cambiodetalle->delete()) {

            foreach ($cambiodetalle->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "cambiodetalle",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("cambiodetalle was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "cambiodetalle",
            'action' => "index"
        ]);
    }

}
