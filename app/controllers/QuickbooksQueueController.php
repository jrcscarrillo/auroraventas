<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class QuickbooksQueueController extends ControllerBase
{

    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    public function createqueue()
    {
        $cola = $this->session->get('cola');
        $quickbooks_queue = new QuickbooksQueue();
        $quickbooks_queue->setQuickbooksTicketId($cola["quickbooks_ticket_id"]);
        $quickbooks_queue->setQbUsername($cola["qb_username"]);
        $quickbooks_queue->setQbAction($cola["qb_action"]);
        $quickbooks_queue->setIdent($cola["ident"]);
        $quickbooks_queue->setExtra($cola["extra"]);
        $quickbooks_queue->setQbxml($cola["qbxml"]);
        $quickbooks_queue->setPriority($cola["priority"]);
        $quickbooks_queue->setQbStatus($cola["qb_status"]);
        $quickbooks_queue->setMsg($cola["msg"]);
        $quickbooks_queue->setEnqueueDatetime($cola["enqueue_datetime"]);
        $quickbooks_queue->setDequeueDatetime($cola["dequeue_datetime"]);
        

        if (!$quickbooks_queue->save()) {
            foreach ($quickbooks_queue->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "index",
                'action' => 'index'
            ]);

            return;
        }

        $this->flash->success("Se adiciono a la cola del QBWC");
    }

}
