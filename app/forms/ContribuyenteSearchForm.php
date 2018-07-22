<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;

class ContribuyenteSearchForm extends Form {

    public function initialize($entity = null, $options = array()) {

        $Razon = new Text("Razon");
        $Razon->setLabel("Razon");
        $this->add($Razon);

        $NombreComercial = new Text("NombreComercial");
        $NombreComercial->setLabel("Nombre Comercial");
        $this->add($NombreComercial);

        $CodEmisor = new Numeric("CodEmisor");
        $CodEmisor->setLabel("Establecimiento");
        $this->add($CodEmisor);

        $Punto = new Numeric("Punto");
        $Punto->setLabel("Punto Emision");
        $this->add($Punto);
    }

}
