<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Date;
use Phalcon\Validation\Validator\PresenceOf;

class VendorcreditForm  extends Form {
    public function initialize() {

        $VendorRef_FullName = new Text("VendorRef_FullName");
        $VendorRef_FullName->setLabel("Proveedor Razon Social");
        $VendorRef_FullName->setFilters(array('striptags', 'strig'));
        $VendorRef_FullName->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($VendorRef_FullName);

        $TxnDate = new Date("TxnDate");
        $TxnDate->setLabel("Fecha Retencion");
        $TxnDate->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($TxnDate);

        $RefNumber = new Text("RefNumber");
        $RefNumber->setLabel("Numero Retencion");
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
    }        
    }
