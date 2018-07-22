<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class PedidosController extends ControllerBase {

    public function initialize() {
        $this->tag->setTitle('Pedidos');
        parent::initialize();
    }

    public function indexAction() {
        $this->session->conditions = null;
        $this->view->form = new PedidosForm;
    }

    public function searchAction($params) {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Pedidos', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }
        $parameters = $this->persistent->parameters;

        if (!is_array($parameters)) {
            $parameters = [];
        }
        $auth = $this->session->get('auth');
        if ($auth['tipo'] === 'ADMINISTRADOR') {
            if ($this->request->getPost('TxnDate') > "") {
                $parameters = array('conditions' => '[TimeCreated] >= :TxnDate:', 'bind' => array('TxnDate' => $this->request->getPost('TxnDate')));
            }
            $this->persistent->parameters = $parameters;
        } else {
            if ($this->request->getPost('TxnDate') > "") {
                $parameters = array('conditions' => '[TimeCreated] >= :TxnDate: AND [CustomerMsgRef_FullName] = :user:', 'bind' => array('TxnDate' => $this->request->getPost('TxnDate'), 'user' => $auth['username']));
            } else {
                
            }
            $this->persistent->parameters = $parameters;
        }


        $parameters["order"] = "RefNumber";
        $pedidos = Pedidos::find($parameters);
        if (count($pedidos) == 0) {
            $this->flash->notice("No se han encontrado pedidos con esos argumentos");

            $this->dispatcher->forward([
               "controller" => "pedidos",
               "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
           'data' => $pedidos,
           'limit' => 100,
           'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    public function newAction() {
        
    }

    public function editAction($RefNumber) {
        if (!$this->request->isPost()) {

            $pedido = Pedidos::findFirstByRefNumber($RefNumber);
            if (!$pedido) {
                $this->flash->error("pedido no se ha encontrado" . $RefNumber);

                $this->dispatcher->forward([
                   'controller' => "pedidos",
                   'action' => 'index'
                ]);
            }

            if ($pedido->Status === 'FACTURADO') {
                $this->flash->notice('El pedido ya esta ingresado al Quickbooks con este numero secreto ' . $pedido->TxnID);
            } else {

                $pedido->setStatus('PASADO');

                if (!$pedido->save()) {
                    foreach ($reg->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                    $this->flash->error('Este pedido no puede irse a la cola del Quickbooks ' . $posteado['RefNumber']);
                    $this->dispatcher->forward([
                       'controller' => "customer",
                       'action' => 'search'
                    ]);
                }

                $cola = new QuickbooksQueue();
                $cola->setqbusername('jrcscarrillo');
                $cola->setqbaction('SalesOrderAdd');
                $cola->setident($RefNumber);
                $cola->setpriority(100);
                $cola->setqbstatus('q');
                $fecha = date('Y-m-d H:i:s');
                $cola->setenqueuedatetime($fecha);
                if (!$cola->save()) {
                    foreach ($cola->getMessages() as $message) {
                        $this->flash->error($message);
                    }

                    $this->dispatcher->forward([
                       'controller' => "index",
                       'action' => 'index'
                    ]);
                }
                $this->flash->notice('El pedido se ha ingresado a la cola del Quickbooks con este numero ' . $pedido->RefNumber);
            }
        }

        $this->dispatcher->forward([
           'controller' => "pedidos",
           'action' => 'index'
        ]);
    }

    public function createAction() {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
               'controller' => "pedidos",
               'action' => 'index'
            ]);

            return;
        }

        $pedido = new Pedidos();
        $pedido->setTxnid($this->request->getPost("TxnID"));

        if (!$pedido->save()) {
            foreach ($pedido->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
               'controller' => "pedidos",
               'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("pedido was created successfully");

        $this->dispatcher->forward([
           'controller' => "pedidos",
           'action' => 'index'
        ]);
    }

    public function saveAction() {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
               'controller' => "pedidos",
               'action' => 'index'
            ]);

            return;
        }

        $TxnID = $this->request->getPost("TxnID");
        $pedido = Pedidos::findFirstByTxnID($TxnID);

        if (!$pedido) {
            $this->flash->error("pedido does not exist " . $TxnID);

            $this->dispatcher->forward([
               'controller' => "pedidos",
               'action' => 'index'
            ]);

            return;
        }

        $pedido->setTxnid($this->request->getPost("TxnID"));
        $pedido->setTimecreated($this->request->getPost("TimeCreated"));
        $pedido->setTimemodified($this->request->getPost("TimeModified"));
        $pedido->setEditsequence($this->request->getPost("EditSequence"));
        $pedido->setTxnnumber($this->request->getPost("TxnNumber"));
        $pedido->setCustomerrefListid($this->request->getPost("CustomerRef_ListID"));
        $pedido->setCustomerrefFullname($this->request->getPost("CustomerRef_FullName"));
        $pedido->setTxndate($this->request->getPost("TxnDate"));
        $pedido->setRefnumber($this->request->getPost("RefNumber"));
        $pedido->setPonumber($this->request->getPost("PONumber"));
        $pedido->setTermsrefListid($this->request->getPost("TermsRef_ListID"));
        $pedido->setTermsrefFullname($this->request->getPost("TermsRef_FullName"));
        $pedido->setDuedate($this->request->getPost("DueDate"));
        $pedido->setSalesreprefListid($this->request->getPost("SalesRepRef_ListID"));
        $pedido->setSalesreprefFullname($this->request->getPost("SalesRepRef_FullName"));
        $pedido->setSubtotal($this->request->getPost("Subtotal"));
        $pedido->setSalestaxtotal($this->request->getPost("SalesTaxTotal"));
        $pedido->setTotalamount($this->request->getPost("TotalAmount"));
        $pedido->setIsmanuallyclosed($this->request->getPost("IsManuallyClosed"));
        $pedido->setIsfullyinvoiced($this->request->getPost("IsFullyInvoiced"));
        $pedido->setMemo($this->request->getPost("Memo"));
        $pedido->setCustomermsgrefListid($this->request->getPost("CustomerMsgRef_ListID"));
        $pedido->setCustomermsgrefFullname($this->request->getPost("CustomerMsgRef_FullName"));
        $pedido->setOther($this->request->getPost("Other"));
        $pedido->setStatus($this->request->getPost("Status"));


        if (!$pedido->save()) {

            foreach ($pedido->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
               'controller' => "pedidos",
               'action' => 'edit',
               'params' => [$pedido->getTxnid()]
            ]);

            return;
        }

        $this->flash->success("pedido was updated successfully");

        $this->dispatcher->forward([
           'controller' => "pedidos",
           'action' => 'index'
        ]);
    }

    public function deleteAction($TxnID) {
        $pedido = Pedidos::findFirstByRefNumber($TxnID);
        if (!$pedido) {
            $this->flash->error("pedido no ha sido registrado");

            $this->dispatcher->forward([
               'controller' => "pedidos",
               'action' => 'index'
            ]);
        }
        $this->session->set('helados', $pedido);
        $estado = $this->enviarEmail();

        $this->flash->success("pedido no puede ser impreso todavia");

        $this->dispatcher->forward([
           'controller' => "pedidos",
           'action' => "search"
        ]);
    }

    private function enviarEmail() {

        $helados = $this->session->get('helados');
        $auth = $this->session->get('auth');
        $part = '<div><p><strong>INGRESO PEDIDOS LOS COQUEIROS</strong></p><br>
           <p>Estimado(a) </p><br><p><strong>' .
           $helados->CustomerRef_FullName .
           '</strong></p><br><p>Heladerías Cofrunat Cia. Ltda.,  le informa que se ha generado su pedido,</p><br><p><strong>' .
           $helados->RefNumber . '</strong></p><br> ' .
           '<p>que adjuntamos en formato PDF para que lo guarde en sus archivos.</p><br>
</p><br><br><p>Atentamente,</p><br><br><p>Heladerías Cofrunat Cia. Ltda. </p>';



        $paraemail['part'] = $part;
        $paraemail['body'] = $part;

        $filename = $_SERVER['DOCUMENT_ROOT'] . '/ComprobantesSRI/pedidos/pedido' . trim($helados->RefNumber) . '.pdf';
        $param = $filename;
        $paraemail['attach'] = $param;
        $paraemail['subject'] = 'LOS COQUEIROS - Pedido Autorizado';
        $paraemail['fromemail']['email'] = 'xavierbustos@loscoqueiros.com';
        $paraemail['fromemail']['nombre'] = 'Heladerias Cofrunat Cia. Ltda.';
        $paraemail['toemail']['email'] = $auth['email'];
        $paraemail['toemail']['nombre'] = $auth['name'];
        $paraemail['bccemail']['email'] = 'abyghail85@hotmail.com';
        $paraemail['bccemail']['nombre'] = 'Departamento de Ventas';
//        $exp = $this->sendmail->enviaEmail($paraemail);
        $this->topdf->llenaFactura();
        $this->topdf->creaFactura(1);
    }

}
