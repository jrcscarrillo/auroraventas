<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Date;
use Phalcon\Forms\Element\Numeric;
use \Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\PresenceOf;

class InventarioIndexForm extends Form {

    public function initialize() {
//        $bodegasQuery = Bodegas::find([
//            "columns" => "Name, ListID"
//           ]); 
//        $OrigenTrx = new Select(
//           'OrigenTrx',
//           $bodegasQuery,
//           [
//              'using'      => [
//                 'ListID',
//                 'Name',
//                 ]
//              ]
//           );
//
//        $this->add($OrigenTrx);
//        
//        $heladosQuery = Items::find([
//            "columns" => "quickbooks_listid, sales_desc"
//           ]); 
//        $ItemRef_ListID = new Select(
//           'ItemRef_ListID',
//           $heladosQuery,
//           [
//              'using'      => [
//                 'quickbooks_listid',
//                 'sales_desc',
//                 ]
//              ]
//           );
//
//        $this->add($ItemRef_ListID);
        
        $TxnDate = new Date("TxnDate");
        $TxnDate->setLabel("Fecha Inventario");
        $TxnDate->addValidators(array(
           new PresenceOf(array(
              'message' => 'Mensaje de validacion'
              ))
        ));
        $this->add($TxnDate);

    }

}
