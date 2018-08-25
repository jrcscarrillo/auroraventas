<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Date;

class LotesdetalleForm extends Form {
    public function initialize($entity = null, $options = array()) {

        $RefNumber = new Text("RefNumber");
        $RefNumber->setLabel("Numero de Lote");
        $this->add($RefNumber);

        $TxnDate = new Date("TxnDate");
        $TxnDate->setLabel("Fecha de Produccion");
        $this->add($TxnDate);

        $Estado = new Text("Estado");
        $Estado->setLabel("Estado");
        $this->add($Estado);

    }
}
