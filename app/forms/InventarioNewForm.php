<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Date;
use Phalcon\Forms\Element\Numeric;
use \Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\PresenceOf;

class InventarioNewForm extends Form {

    public function initialize() {
        $bodegasQuery = Bodegas::find([
            "columns" => "Name, ListID"
           ]); 
        $DestinoTrx = new Select(
           'DestinoTrx',
           $bodegasQuery,
           [
              'using'      => [
                 'ListID',
                 'Name',
                 ]
              ]
           );

        $this->add($DestinoTrx);
        
        $heladosQuery = Items::find([
            "columns" => "quickbooks_listid, sales_desc"
           ]); 
        $ItemRef_ListID = new Select(
           'ItemRef_ListID',
           $heladosQuery,
           [
              'using'      => [
                 'quickbooks_listid',
                 'sales_desc',
                 ]
              ]
           );

        $this->add($ItemRef_ListID);
        
        $TxnDate = new Date("TxnDate");
        $TxnDate->setLabel("Fecha Inventario");
        $TxnDate->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($TxnDate);
        
        $MemoTrx = new Text("MemoTrx");
        $MemoTrx->setLabel("Observaciones");
        $MemoTrx->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($MemoTrx);
        
        $QtyTrx = new Numeric("QtyTrx");
        $QtyTrx->setLabel("Cantidad");
        $QtyTrx->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($QtyTrx);

    }

}
