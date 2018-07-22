<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Validation\Validator\PresenceOf;

class InvoiceEditForm extends Form {

    public function initialize() {

        if (!isset($options['edit'])) {
            $element = new Text("TxnID");
            $this->add($element->setLabel("Identificacion QB Factura"));
        } else {
            $this->add(new Hidden("TxnID"));
        }        

        $CustomField2 = new Text("CustomField2");
        $CustomField2->setLabel("Datos Adicionales");
        $CustomField2->setFilters(array('striptags', 'strig'));
        $CustomField2->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($CustomField2);

    }

}
