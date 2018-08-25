<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Date;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\PresenceOf;

class LotesCabNewForm extends Form {

    public function initialize($entity = null, $options = array()) {

        $tipos = Codetype::find([
              "columns" => "type, id",
              "conditions" => "tipoCod = ?1",
              "bind" => [1 => "NUMT"]
        ]);

        $tipo = new Select(
           'RefType', $tipos, [
           'using' => [
              'type',
              'type',
           ]
           ]
        );

        $this->add($tipo);
        
        $Bodegas = Bodegas::find([
              "columns" => "FullName, ListID", "conditions" => "Sublevel = '1' AND Status = 'CON-MOV'", "order" => "FullName"
        ]);
        $origen = new Select(
           'origen', $Bodegas, [
           'using' => [
              'ListID',
              'FullName',
           ]
           ]
        );

        $this->add($origen);

        $destino = new Select(
           'destino', $Bodegas, [
           'using' => [
              'ListID',
              'FullName',
           ]
           ]
        );

        $this->add($destino);

        $TxnDate = new Date("TxnDate");
        $TxnDate->setLabel("Fecha Produccion");
        $TxnDate->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($TxnDate);
        
        $TipoTrx = new Text("TipoTrx");
        $TipoTrx->setLabel("Tipo Transferencia");
        $TipoTrx->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($TipoTrx);

        $Estado = new Text("Estado");
        $Estado->setLabel("Estado");
        $this->add($Estado);

        $Memo = new Text("Memo");
        $Memo->setLabel("Memo");
        $this->add($Memo);

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
