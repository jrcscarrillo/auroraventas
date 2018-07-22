<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class PedidosdetalleController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for pedidosdetalle
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Pedidosdetalle', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "TxnLineID";

        $pedidosdetalle = Pedidosdetalle::find($parameters);
        if (count($pedidosdetalle) == 0) {
            $this->flash->notice("The search did not find any pedidosdetalle");

            $this->dispatcher->forward([
                "controller" => "pedidosdetalle",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $pedidosdetalle,
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
     * Edits a pedidosdetalle
     *
     * @param string $TxnLineID
     */
    public function editAction($TxnLineID)
    {
        if (!$this->request->isPost()) {

            $pedidosdetalle = Pedidosdetalle::findFirstByTxnLineID($TxnLineID);
            if (!$pedidosdetalle) {
                $this->flash->error("pedidosdetalle was not found");

                $this->dispatcher->forward([
                    'controller' => "pedidosdetalle",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->TxnLineID = $pedidosdetalle->getTxnlineid();

            $this->tag->setDefault("TxnLineID", $pedidosdetalle->getTxnlineid());
            $this->tag->setDefault("ItemRef_ListID", $pedidosdetalle->getItemrefListid());
            $this->tag->setDefault("ItemRef_FullName", $pedidosdetalle->getItemrefFullname());
            $this->tag->setDefault("Description", $pedidosdetalle->getDescription());
            $this->tag->setDefault("Quantity", $pedidosdetalle->getQuantity());
            $this->tag->setDefault("UnitOfMeasure", $pedidosdetalle->getUnitofmeasure());
            $this->tag->setDefault("Rate", $pedidosdetalle->getRate());
            $this->tag->setDefault("RatePercent", $pedidosdetalle->getRatepercent());
            $this->tag->setDefault("Amount", $pedidosdetalle->getAmount());
            $this->tag->setDefault("InventorySiteRef_ListID", $pedidosdetalle->getInventorysiterefListid());
            $this->tag->setDefault("InventorySiteRef_FullName", $pedidosdetalle->getInventorysiterefFullname());
            $this->tag->setDefault("SerialNumber", $pedidosdetalle->getSerialnumber());
            $this->tag->setDefault("LotNumber", $pedidosdetalle->getLotnumber());
            $this->tag->setDefault("SalesTaxCodeRef_ListID", $pedidosdetalle->getSalestaxcoderefListid());
            $this->tag->setDefault("SalesTaxCodeRef_FullName", $pedidosdetalle->getSalestaxcoderefFullname());
            $this->tag->setDefault("Invoiced", $pedidosdetalle->getInvoiced());
            $this->tag->setDefault("IsManuallyClosed", $pedidosdetalle->getIsmanuallyclosed());
            $this->tag->setDefault("Other1", $pedidosdetalle->getOther1());
            $this->tag->setDefault("Other2", $pedidosdetalle->getOther2());
            $this->tag->setDefault("IDKEY", $pedidosdetalle->getIdkey());
            
        }
    }

    /**
     * Creates a new pedidosdetalle
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "pedidosdetalle",
                'action' => 'index'
            ]);

            return;
        }

        $pedidosdetalle = new Pedidosdetalle();
        $pedidosdetalle->setTxnlineid($this->request->getPost("TxnLineID"));
        $pedidosdetalle->setItemrefListid($this->request->getPost("ItemRef_ListID"));
        $pedidosdetalle->setItemrefFullname($this->request->getPost("ItemRef_FullName"));
        $pedidosdetalle->setDescription($this->request->getPost("Description"));
        $pedidosdetalle->setQuantity($this->request->getPost("Quantity"));
        $pedidosdetalle->setUnitofmeasure($this->request->getPost("UnitOfMeasure"));
        $pedidosdetalle->setRate($this->request->getPost("Rate"));
        $pedidosdetalle->setRatepercent($this->request->getPost("RatePercent"));
        $pedidosdetalle->setAmount($this->request->getPost("Amount"));
        $pedidosdetalle->setInventorysiterefListid($this->request->getPost("InventorySiteRef_ListID"));
        $pedidosdetalle->setInventorysiterefFullname($this->request->getPost("InventorySiteRef_FullName"));
        $pedidosdetalle->setSerialnumber($this->request->getPost("SerialNumber"));
        $pedidosdetalle->setLotnumber($this->request->getPost("LotNumber"));
        $pedidosdetalle->setSalestaxcoderefListid($this->request->getPost("SalesTaxCodeRef_ListID"));
        $pedidosdetalle->setSalestaxcoderefFullname($this->request->getPost("SalesTaxCodeRef_FullName"));
        $pedidosdetalle->setInvoiced($this->request->getPost("Invoiced"));
        $pedidosdetalle->setIsmanuallyclosed($this->request->getPost("IsManuallyClosed"));
        $pedidosdetalle->setOther1($this->request->getPost("Other1"));
        $pedidosdetalle->setOther2($this->request->getPost("Other2"));
        $pedidosdetalle->setIdkey($this->request->getPost("IDKEY"));
        

        if (!$pedidosdetalle->save()) {
            foreach ($pedidosdetalle->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "pedidosdetalle",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("pedidosdetalle was created successfully");

        $this->dispatcher->forward([
            'controller' => "pedidosdetalle",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a pedidosdetalle edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "pedidosdetalle",
                'action' => 'index'
            ]);

            return;
        }

        $TxnLineID = $this->request->getPost("TxnLineID");
        $pedidosdetalle = Pedidosdetalle::findFirstByTxnLineID($TxnLineID);

        if (!$pedidosdetalle) {
            $this->flash->error("pedidosdetalle does not exist " . $TxnLineID);

            $this->dispatcher->forward([
                'controller' => "pedidosdetalle",
                'action' => 'index'
            ]);

            return;
        }

        $pedidosdetalle->setTxnlineid($this->request->getPost("TxnLineID"));
        $pedidosdetalle->setItemrefListid($this->request->getPost("ItemRef_ListID"));
        $pedidosdetalle->setItemrefFullname($this->request->getPost("ItemRef_FullName"));
        $pedidosdetalle->setDescription($this->request->getPost("Description"));
        $pedidosdetalle->setQuantity($this->request->getPost("Quantity"));
        $pedidosdetalle->setUnitofmeasure($this->request->getPost("UnitOfMeasure"));
        $pedidosdetalle->setRate($this->request->getPost("Rate"));
        $pedidosdetalle->setRatepercent($this->request->getPost("RatePercent"));
        $pedidosdetalle->setAmount($this->request->getPost("Amount"));
        $pedidosdetalle->setInventorysiterefListid($this->request->getPost("InventorySiteRef_ListID"));
        $pedidosdetalle->setInventorysiterefFullname($this->request->getPost("InventorySiteRef_FullName"));
        $pedidosdetalle->setSerialnumber($this->request->getPost("SerialNumber"));
        $pedidosdetalle->setLotnumber($this->request->getPost("LotNumber"));
        $pedidosdetalle->setSalestaxcoderefListid($this->request->getPost("SalesTaxCodeRef_ListID"));
        $pedidosdetalle->setSalestaxcoderefFullname($this->request->getPost("SalesTaxCodeRef_FullName"));
        $pedidosdetalle->setInvoiced($this->request->getPost("Invoiced"));
        $pedidosdetalle->setIsmanuallyclosed($this->request->getPost("IsManuallyClosed"));
        $pedidosdetalle->setOther1($this->request->getPost("Other1"));
        $pedidosdetalle->setOther2($this->request->getPost("Other2"));
        $pedidosdetalle->setIdkey($this->request->getPost("IDKEY"));
        

        if (!$pedidosdetalle->save()) {

            foreach ($pedidosdetalle->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "pedidosdetalle",
                'action' => 'edit',
                'params' => [$pedidosdetalle->getTxnlineid()]
            ]);

            return;
        }

        $this->flash->success("pedidosdetalle was updated successfully");

        $this->dispatcher->forward([
            'controller' => "pedidosdetalle",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a pedidosdetalle
     *
     * @param string $TxnLineID
     */
    public function deleteAction($TxnLineID)
    {
        $pedidosdetalle = Pedidosdetalle::findFirstByTxnLineID($TxnLineID);
        if (!$pedidosdetalle) {
            $this->flash->error("pedidosdetalle was not found");

            $this->dispatcher->forward([
                'controller' => "pedidosdetalle",
                'action' => 'index'
            ]);

            return;
        }

        if (!$pedidosdetalle->delete()) {

            foreach ($pedidosdetalle->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "pedidosdetalle",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("pedidosdetalle was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "pedidosdetalle",
            'action' => "index"
        ]);
    }

}
