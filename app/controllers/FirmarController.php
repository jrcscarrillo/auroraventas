<?php

/**
 * Description of FirmarController
 *
 * @author jrcsc
 */


use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class FirmarController extends ControllerBase {
    public function initialize() {
        $this->tag->setTitle('Firmar');
        parent::initialize();
    }

    public function indexAction() {
        $this->session->conditions = null;
        $this->view->form = new FirmarForm;
    }
    
    public function procesarAction() {
        $sinfirmar = "SIN FIRMAR";
        $parameters = array('conditions' => '[CustomerField15] = :sinfirmar:', 'bind' => array('sinfirmar' => $sinfirmar));

        if (!$this->session->has('contribuyente')) {
            $this->flash->error("No se ha seleccionado al contribuyente");
            return $this->dispatcher->forward(
                  [
                     "controller" => "firmar",
                     "action" => "index",
                  ]
            );
        }

        $factura = Invoice::findFirst($parameters);
        if ($factura == false) {
            $this->flash->error("Esta factura no existe");
            return $this->dispatcher->forward(
                  [
                     "controller" => "invoice",
                     "action" => "index",
                  ]
            );
        }

        $this->_registerInvoice($factura);
        $this->flash->success('Factura del QB Seleccionada || ' . $factura->RefNumber);
        $this->firmaFactura($factura);
        return $this->dispatcher->forward(
              [
                 "controller" => "invoice",
                 "action" => "search",
              ]
        );        
    }
}
