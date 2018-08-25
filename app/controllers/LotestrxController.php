<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class LotestrxController extends ControllerBase
{
    public function initialize() {
        $this->tag->setTitle('Transferencia');
        parent::initialize();
    }

    public function indexAction() {
        $this->session->conditions = null;
        $this->view->form = new lotesCabForm;
    }

    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Lotestrx', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "NumeroTrx";

        $lotestrx = Lotestrx::find($parameters);
        if (count($lotestrx) == 0) {
            $this->flash->notice("NO se han encontrado transferencias con esos argumentos");

            $this->dispatcher->forward([
                "controller" => "lotestrxcab",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $lotestrx,
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
     * Edits a lotestrx
     *
     * @param string $TxnLineID
     */
    public function editAction($TxnLineID)
    {
        if (!$this->request->isPost()) {

            $lotestrx = Lotestrx::findFirstByTxnLineID($TxnLineID);
            if (!$lotestrx) {
                $this->flash->error("lotestrx was not found");

                $this->dispatcher->forward([
                    'controller' => "lotestrx",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->TxnLineID = $lotestrx->getTxnlineid();

            $this->tag->setDefault("TxnLineID", $lotestrx->getTxnlineid());
            $this->tag->setDefault("TimeCreated", $lotestrx->getTimecreated());
            $this->tag->setDefault("TimeModified", $lotestrx->getTimemodified());
            $this->tag->setDefault("EditSequence", $lotestrx->getEditsequence());
            $this->tag->setDefault("TxnDate", $lotestrx->getTxndate());
            $this->tag->setDefault("RefNumber", $lotestrx->getRefnumber());
            $this->tag->setDefault("ItemRef_ListID", $lotestrx->getItemrefListid());
            $this->tag->setDefault("ItemRef_FullName", $lotestrx->getItemrefFullname());
            $this->tag->setDefault("Memo", $lotestrx->getMemo());
            $this->tag->setDefault("MemoTrx", $lotestrx->getMemotrx());
            $this->tag->setDefault("NumeroTrx", $lotestrx->getNumerotrx());
            $this->tag->setDefault("FechaTrx", $lotestrx->getFechatrx());
            $this->tag->setDefault("TipoTrx", $lotestrx->getTipotrx());
            $this->tag->setDefault("OrigenTrx", $lotestrx->getOrigentrx());
            $this->tag->setDefault("DestinoTrx", $lotestrx->getDestinotrx());
            $this->tag->setDefault("QtyTrx", $lotestrx->getQtytrx());
            $this->tag->setDefault("IDKEY", $lotestrx->getIdkey());
            $this->tag->setDefault("Estado", $lotestrx->getEstado());
            
        }
    }

    /**
     * Creates a new lotestrx
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "lotestrx",
                'action' => 'index'
            ]);

            return;
        }

        $lotestrx = new Lotestrx();
        $lotestrx->setTxnlineid($this->request->getPost("TxnLineID"));
        $lotestrx->setTimecreated($this->request->getPost("TimeCreated"));
        $lotestrx->setTimemodified($this->request->getPost("TimeModified"));
        $lotestrx->setEditsequence($this->request->getPost("EditSequence"));
        $lotestrx->setTxndate($this->request->getPost("TxnDate"));
        $lotestrx->setRefnumber($this->request->getPost("RefNumber"));
        $lotestrx->setItemrefListid($this->request->getPost("ItemRef_ListID"));
        $lotestrx->setItemrefFullname($this->request->getPost("ItemRef_FullName"));
        $lotestrx->setMemo($this->request->getPost("Memo"));
        $lotestrx->setMemotrx($this->request->getPost("MemoTrx"));
        $lotestrx->setNumerotrx($this->request->getPost("NumeroTrx"));
        $lotestrx->setFechatrx($this->request->getPost("FechaTrx"));
        $lotestrx->setTipotrx($this->request->getPost("TipoTrx"));
        $lotestrx->setOrigentrx($this->request->getPost("OrigenTrx"));
        $lotestrx->setDestinotrx($this->request->getPost("DestinoTrx"));
        $lotestrx->setQtytrx($this->request->getPost("QtyTrx"));
        $lotestrx->setIdkey($this->request->getPost("IDKEY"));
        $lotestrx->setEstado($this->request->getPost("Estado"));
        

        if (!$lotestrx->save()) {
            foreach ($lotestrx->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "lotestrx",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("lotestrx was created successfully");

        $this->dispatcher->forward([
            'controller' => "lotestrx",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a lotestrx edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "lotestrx",
                'action' => 'index'
            ]);

            return;
        }

        $TxnLineID = $this->request->getPost("TxnLineID");
        $lotestrx = Lotestrx::findFirstByTxnLineID($TxnLineID);

        if (!$lotestrx) {
            $this->flash->error("lotestrx does not exist " . $TxnLineID);

            $this->dispatcher->forward([
                'controller' => "lotestrx",
                'action' => 'index'
            ]);

            return;
        }

        $lotestrx->setTxnlineid($this->request->getPost("TxnLineID"));
        $lotestrx->setTimecreated($this->request->getPost("TimeCreated"));
        $lotestrx->setTimemodified($this->request->getPost("TimeModified"));
        $lotestrx->setEditsequence($this->request->getPost("EditSequence"));
        $lotestrx->setTxndate($this->request->getPost("TxnDate"));
        $lotestrx->setRefnumber($this->request->getPost("RefNumber"));
        $lotestrx->setItemrefListid($this->request->getPost("ItemRef_ListID"));
        $lotestrx->setItemrefFullname($this->request->getPost("ItemRef_FullName"));
        $lotestrx->setMemo($this->request->getPost("Memo"));
        $lotestrx->setMemotrx($this->request->getPost("MemoTrx"));
        $lotestrx->setNumerotrx($this->request->getPost("NumeroTrx"));
        $lotestrx->setFechatrx($this->request->getPost("FechaTrx"));
        $lotestrx->setTipotrx($this->request->getPost("TipoTrx"));
        $lotestrx->setOrigentrx($this->request->getPost("OrigenTrx"));
        $lotestrx->setDestinotrx($this->request->getPost("DestinoTrx"));
        $lotestrx->setQtytrx($this->request->getPost("QtyTrx"));
        $lotestrx->setIdkey($this->request->getPost("IDKEY"));
        $lotestrx->setEstado($this->request->getPost("Estado"));
        

        if (!$lotestrx->save()) {

            foreach ($lotestrx->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "lotestrx",
                'action' => 'edit',
                'params' => [$lotestrx->getTxnlineid()]
            ]);

            return;
        }

        $this->flash->success("lotestrx was updated successfully");

        $this->dispatcher->forward([
            'controller' => "lotestrx",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a lotestrx
     *
     * @param string $TxnLineID
     */
    public function deleteAction($TxnLineID)
    {
        $lotestrx = Lotestrx::findFirstByTxnLineID($TxnLineID);
        if (!$lotestrx) {
            $this->flash->error("lotestrx was not found");

            $this->dispatcher->forward([
                'controller' => "lotestrx",
                'action' => 'index'
            ]);

            return;
        }

        if (!$lotestrx->delete()) {

            foreach ($lotestrx->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "lotestrx",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("lotestrx was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "lotestrx",
            'action' => "index"
        ]);
    }

}
