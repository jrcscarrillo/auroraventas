<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Validation\Validator\PresenceOf;
class VehicleForm extends Form {
    public function initialize() {
        $Name = new Text("CustomerRef_FullName");
        $Name->setLabel("Cliente Razon Social");
        $Name->setFilters(array('striptags', 'strig'));
        $Name->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($Name);

    }
}
