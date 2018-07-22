<?php

use \Phalcon\Forms\Form;
use \Phalcon\Forms\Element\Date;
use \Phalcon\Forms\Element\Select;
use \Phalcon\Validation\Validator\PresenceOf;

class ReporteindexForm extends Form {
    public function initialize()
    {
        $tipos = Codetype::find([
            "columns" => "type, codeValue",
            "conditions" => "tipoCod = ?1",
            "bind"       => [1 => "RPEDIDOS"]
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
              'message' => 'Ingresar fecha del reporte solo se considera mes y anio'
              ))
        ));
        $this->add($iniDate);      
        
    }
    
}
