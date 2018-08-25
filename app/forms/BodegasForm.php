<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;

class BodegasForm extends Form {

    public function initialize($entity = null, $options = array()) {

        $Name = new Text("name");
        $Name->setLabel("Nombre Clase/Bodega");
        $this->add($Name);

        $FullName = new Text("description");
        $FullName->setLabel("Nombre Largo");
        $this->add($FullName);
        
        $Estado = new Text("Estado");
        $Estado->setLabel("Estado");
        $this->add($Estado);

    }

}
