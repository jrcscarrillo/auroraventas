<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Date;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\PresenceOf;

class LotesCabForm extends Form {

    public function initialize($entity = null, $options = array()) {

        $tipos = Codetype::find([
            "columns" => "type, id",
            "conditions" => "tipoCod = ?1",
            "bind"       => [1 => "NUMT"]
           ]); 

        $tipoAdd = new Select(
           'RefType',
           $tipos,
           [
              'using'      => [
                 'type',
                 'type',
                 ]
              ]
           );

        $this->add($tipoAdd); 
        
        $TxnDate = new Date("TxnDate");
        $TxnDate->setLabel("Fecha Produccion");
        $TxnDate->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($TxnDate);
        
        $Estado = new Text("Estado");
        $Estado->setLabel("Estado");
        $this->add($Estado);
        
        $RefNumber = new Numeric("RefNumber");
        $RefNumber->setLabel("Numero de Referencia");
        $RefNumber->setFilters(array('striptags', 'strig'));
        $RefNumber->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($RefNumber);
    }

}
