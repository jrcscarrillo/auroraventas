<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Date;
use Phalcon\Forms\Element\Numeric;
use \Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\PresenceOf;

class ProduccionForm extends Form {

    public function initialize() {
/**
 *  Utilizando el metodo ya definido en el modelo de la tabla bodegas
 *  solo pedimos los campos type que tiene la descripcion del elemento
 *  y codeValue que tiene el valor que se guarda en la base de datos
 */
        $qryProduccion = Bodegas::find([
            "columns" => "FullName, ListID", "conditions" => "Sublevel = '1' AND (Status = 'CON-MOV' OR Status = 'AUX-MOV')",  "order" => "FullName"
           ]); 
/**
 *  en la variable $tipoAdd guardamos los parametros de la seleciion del tipo de usuario
 */
        $tipoProduccion = new Select(
           'tipoProduccion',
           $qryProduccion,
           [
              'using'      => [
                 'ListID',
                 'FullName',
                 ]
              ]
           );

        $this->add($tipoProduccion);
        
        $tipoBuenos = new Select(
           'tipoBuenos',
           $qryProduccion,
           [
              'using'      => [
                 'ListID',
                 'FullName',
                 ]
              ]
           );

        $this->add($tipoBuenos);
        
        $tipoMalos = new Select(
           'tipoMalos',
           $qryProduccion,
           [
              'using'      => [
                 'ListID',
                 'FullName',
                 ]
              ]
           );

        $this->add($tipoMalos);
        
        $tipoMuestra = new Select(
           'tipoMuestra',
           $qryProduccion,
           [
              'using'      => [
                 'ListID',
                 'FullName',
                 ]
              ]
           );

        $this->add($tipoMuestra);
        
        $tipoReproceso = new Select(
           'tipoReproceso',
           $qryProduccion,
           [
              'using'      => [
                 'ListID',
                 'FullName',
                 ]
              ]
           );

        $this->add($tipoReproceso);
        
        $tipoLab = new Select(
           'tipoLab',
           $qryProduccion,
           [
              'using'      => [
                 'ListID',
                 'FullName',
                 ]
              ]
           );

        $this->add($tipoLab);
        
        $tipoProd = new Select(
           'tipoProd',
           $qryProduccion,
           [
              'using'      => [
                 'ListID',
                 'FullName',
                 ]
              ]
           );

        $this->add($tipoProd);
        
        $TxnID = new Text("TxnID");
        $TxnID->setLabel("Clave QB");
        $TxnID->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($TxnID);
        
        $Memo = new Text("Memo");
        $Memo->setLabel("Notas");
        $Memo->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($Memo);
        
        $TxnDate = new Date("TxnDate");
        $TxnDate->setLabel("Fecha Produccion");
        $TxnDate->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($TxnDate);

        $QtyBuena = new Numeric("QtyBuena");
        $QtyBuena->setLabel("Cantidad Buena");
        $QtyBuena->setFilters(array('striptags', 'strig'));
        $QtyBuena->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($QtyBuena);

        $QtyMala = new Numeric("QtyMala");
        $QtyMala->setLabel("Cantidad Mala ");
        $QtyMala->setFilters(array('striptags', 'strig'));
        $QtyMala->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($QtyMala);

        $QtyReproceso = new Numeric("QtyReproceso");
        $QtyReproceso->setLabel("Cantidad Reproceso");
        $QtyReproceso->setFilters(array('striptags', 'strig'));
        $QtyReproceso->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($QtyReproceso);

        $QtyMuestra = new Numeric("QtyMuestra");
        $QtyMuestra->setLabel("Cantidad Muestra");
        $QtyMuestra->setFilters(array('striptags', 'strig'));
        $QtyMuestra->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($QtyMuestra);

        $QtyLab = new Numeric("QtyLab");
        $QtyLab->setLabel("Cantidad Lab");
        $QtyLab->setFilters(array('striptags', 'strig'));
        $QtyLab->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($QtyLab);

    }

}
