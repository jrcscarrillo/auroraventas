<?php

/**
 * Description of ImprimirForm
 *
 * @author jrcsc
 */
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Date;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Validation\Validator\PresenceOf;

class ImprimirForm extends Form {

    public function initialize() {

        $TxnDate = new Date("TxnDate");
        $TxnDate->setLabel("Fecha Factura");
        $TxnDate->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($TxnDate);

        $RefNumber = new Text("RefNumber");
        $RefNumber->setLabel("Numero Factura");
        $RefNumber->setFilters(array('striptags', 'strig'));
        $RefNumber->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($RefNumber);

        $CustomField15 = new Text("CustomField15");
        $CustomField15->setLabel("Estado Facturacion Electronica");
        $CustomField15->setFilters(array('striptags', 'strig'));
        $CustomField15->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($CustomField15);

        $CustomField10 = new Text("CustomField10");
        $CustomField10->setLabel("Estado Impreso");
        $CustomField10->setFilters(array('striptags', 'strig'));
        $CustomField10->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($CustomField10);
    }

}
