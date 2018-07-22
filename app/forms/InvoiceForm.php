<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Date;
use Phalcon\Validation\Validator\PresenceOf;

class InvoiceForm extends Form {

    public function initialize() {


        $CustomerRef_FullName = new Text("CustomerRef_FullName");
        $CustomerRef_FullName->setLabel("Cliente Razon Social");
        $CustomerRef_FullName->setFilters(array('striptags', 'strig'));
        $CustomerRef_FullName->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($CustomerRef_FullName);

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

        $SalesRepRef_FullName = new Text("SalesRepRef_FullName");
        $SalesRepRef_FullName->setLabel("Vendedor");
        $SalesRepRef_FullName->setFilters(array('striptags', 'strig'));
        $SalesRepRef_FullName->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($SalesRepRef_FullName);

        $CustomField15 = new Text("CustomField15");
        $CustomField15->setLabel("Estado Facturacion Electronica");
        $CustomField15->setFilters(array('striptags', 'strig'));
        $CustomField15->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($CustomField15);
    }

}
