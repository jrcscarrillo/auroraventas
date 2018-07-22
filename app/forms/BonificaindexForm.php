<?php

use \Phalcon\Forms\Form;
use \Phalcon\Forms\Element\Date;
use \Phalcon\Forms\Element\Select;
use \Phalcon\Validation\Validator\PresenceOf;

class BonificaindexForm extends Form {
    public function initialize()
    {
        $tipos = Codetype::find([
            "columns" => "type, codeValue",
            "conditions" => "tipoCod = ?1",
            "bind"       => [1 => "BONIFICA"]
           ]); 
        $tipoAdd = new Select(
           'tipo',
           $tipos,
           [
              'using'      => [
                 'codeValue',
                 'type',
                 ]
              ]
           );

        $this->add($tipoAdd);

        $iniDate = new Date("iniDate");
        $iniDate->setLabel("Fecha Inicio");
        $iniDate->addValidators(array(
           new PresenceOf(array(
              'message' => 'Ingresar fecha inicial de las bonificaciones'
              ))
        ));
        $this->add($iniDate);      
        
        $finDate = new Date("finDate");
        $finDate->setLabel("Fecha Final");
        $finDate->addValidators(array(
           new PresenceOf(array(
              'message' => 'Ingresar fecha final de las bonificaciones'
              ))
        ));
        $this->add($finDate);
        
    }
    
}
