<?php

/**
 * Description of VerificarControler
 *
 * @author jrcsc
 */


use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class VerificarControler extends ControllerBase {
    public function initialize() {
        $this->tag->setTitle('Verificar');
        parent::initialize();
    }

    public function indexAction() {
        $this->session->conditions = null;
        $this->view->form = new VerificarForm;
    }
    
    public function procesarAction() {
        
    }
}
