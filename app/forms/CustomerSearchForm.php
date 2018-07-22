<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Numeric;

class CustomerSearchForm extends Form {

    public function initialize($entity = null, $options = array()) {

        $Name = new Text("Name");
        $Name->setLabel("Razon Social");
        $this->add($Name);

        $FullName = new Text("FullName");
        $FullName->setLabel("Razon Social Completa");
        $this->add($FullName);

        $AccountNumber = new Numeric("AccountNumber");
        $AccountNumber->setLabel("Numero Identificacion");
        $this->add($AccountNumber);

    }

}
