<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Numeric;

class RouteForm extends Form {

    public function initialize($entity = null, $options = array()) {

        $Name = new Text("name");
        $Name->setLabel("Nombre Corto");
        $this->add($Name);

        $FullName = new Text("description");
        $FullName->setLabel("Nombre Largo");
        $this->add($FullName);

        $phone = new Numeric("phone");
        $phone->setLabel("Numero de Telefono");
        $this->add($phone);

    }

}
