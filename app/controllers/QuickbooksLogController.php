<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class QuickbooksLogController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for quickbooks_log
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'quickbookslog', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "quickbooks_log_id";

        $quickbookslog = QuickbooksLog::find($parameters);
        if (count($quickbookslog) == 0) {
            $this->flash->notice("The search did not find any quickbooks_log");

            $this->dispatcher->forward([
                "controller" => "quickbookslog",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $quickbookslog,
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
     * Edits a quickbooks_log
     *
     * @param string $quickbooks_log_id
     */
    public function editAction($quickbooks_log_id)
    {
        if (!$this->request->isPost()) {

            $quickbooks_log = QuickbooksLog::findFirstByquickbooks_log_id($quickbooks_log_id);
            if (!$quickbooks_log) {
                $this->flash->error("quickbooks_log was not found");

                $this->dispatcher->forward([
                    'controller' => "quickbookslog",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->quickbooks_log_id = $quickbooks_log->quickbooks_log_id;

            $this->tag->setDefault("quickbooks_log_id", $quickbooks_log->quickbooks_log_id);
            $this->tag->setDefault("quickbooks_ticket_id", $quickbooks_log->quickbooks_ticket_id);
            $this->tag->setDefault("batch", $quickbooks_log->batch);
            $this->tag->setDefault("msg", $quickbooks_log->msg);
            $this->tag->setDefault("log_datetime", $quickbooks_log->log_datetime);
            
        }
    }

    /**
     * Creates a new quickbooks_log
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "quickbookslog",
                'action' => 'index'
            ]);

            return;
        }

        $quickbooks_log = new QuickbooksLog();
        $quickbooks_log->Quickbooks_ticket_id = $this->request->getPost("quickbooks_ticket_id");
        $quickbooks_log->Batch = $this->request->getPost("batch");
        $quickbooks_log->Msg = $this->request->getPost("msg");
        $quickbooks_log->Log_datetime = $this->request->getPost("log_datetime");
        

        if (!$quickbooks_log->save()) {
            foreach ($quickbooks_log->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "quickbookslog",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("quickbooks_log was created successfully");

        $this->dispatcher->forward([
            'controller' => "quickbooks_log",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a quickbooks_log edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "quickbookslog",
                'action' => 'index'
            ]);

            return;
        }

        $quickbooks_log_id = $this->request->getPost("quickbooks_log_id");
        $quickbooks_log = QuickbooksLog::findFirstByquickbooks_log_id($quickbooks_log_id);

        if (!$quickbooks_log) {
            $this->flash->error("quickbooks_log does not exist " . $quickbooks_log_id);

            $this->dispatcher->forward([
                'controller' => "quickbookslog",
                'action' => 'index'
            ]);

            return;
        }

        $quickbooks_log->Quickbooks_ticket_id = $this->request->getPost("quickbooks_ticket_id");
        $quickbooks_log->Batch = $this->request->getPost("batch");
        $quickbooks_log->Msg = $this->request->getPost("msg");
        $quickbooks_log->Log_datetime = $this->request->getPost("log_datetime");
        

        if (!$quickbooks_log->save()) {

            foreach ($quickbooks_log->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "quickbookslog",
                'action' => 'edit',
                'params' => [$quickbooks_log->quickbooks_log_id]
            ]);

            return;
        }

        $this->flash->success("quickbooks_log was updated successfully");

        $this->dispatcher->forward([
            'controller' => "quickbookslog",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a quickbooks_log
     *
     * @param string $quickbooks_log_id
     */
    public function deleteAction($quickbooks_log_id)
    {
        $quickbooks_log = QuickbooksLog::findFirstByquickbooks_log_id($quickbooks_log_id);
        if (!$quickbooks_log) {
            $this->flash->error("quickbooks_log was not found");

            $this->dispatcher->forward([
                'controller' => "quickbookslog",
                'action' => 'index'
            ]);

            return;
        }

        if (!$quickbooks_log->delete()) {

            foreach ($quickbooks_log->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "quickbookslog",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("quickbooks_log was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "quickbookslog",
            'action' => "index"
        ]);
    }

}
