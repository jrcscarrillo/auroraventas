<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class YourcodeController extends ControllerBase {

    public function initialize() {
        $this->tag->setTitle('YourCode');
        parent::initialize();
    }

    public function indexventasAction() {
        $this->session->conditions = null;
        $this->view->form = new YourCodeForm;
        $usuario = $this->session->get('auth', 'id');
        $this->tag->setDefault('userId', $usuario['id']);
    }

}
