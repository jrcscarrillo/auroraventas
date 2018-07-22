<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\PresenceOf;

class PedidosCabForm extends Form {

    public function initialize() {

        /**
         *  Utilizando el metodo ya definido en el modelo phalcon de la tabla itemsalestax
         *  solo pedimos los campos que tienen la descripcion del impuesto y el porcentaje
         */
        $tipos = Itemsalestax::find([
              "columns" => "ItemDesc, TaxRate"
        ]);
        /**
         *  en la variable $tipoAdd guardamos los parametros de la seleciion del porcentaje del iva
         */
        $tipoAdd = new Select(
           'tipo', $tipos, [
           'using' => [
              'TaxRate',
              'ItemDesc',
           ]
           ]
        );

        $this->add($tipoAdd);

        $TxnDate = new Text("TxnDate");
        $TxnDate->setLabel("Fecha Pedido");
        $this->add($TxnDate);

        $DueDate = new Text("DueDate");
        $DueDate->setLabel("Fecha Pago");
        $this->add($DueDate);

        $RefNumber = new Numeric("RefNumber");
        $RefNumber->setLabel("Numero del Pedido");
        $RefNumber->setFilters(array('striptags', 'string'));
        $RefNumber->addValidators(array(
           new PresenceOf(array(
              'message' => 'Ingrese un numero de pedido'
              ))
        ));
        $this->add($RefNumber);

        $PONumber = new Text("PONumber");
        $PONumber->setLabel("Numero de la orden de compra");
        $PONumber->setFilters(array('striptags', 'string'));
        $PONumber->addValidators(array(
           new PresenceOf(array(
              'message' => 'Ingrese un numero de orden de compra'
              ))
        ));
        $this->add($PONumber);


        $Memo = new Text("Memo");
        $Memo->setLabel("Observaciones para el Pedido");
        $Memo->setFilters(array('striptags', 'string'));
        $Memo->addValidators(array(
           new PresenceOf(array(
              'message' => 'Ingrese instrucciones especiales para este pedido'
              ))
        ));
        $this->add($Memo);

        $CustomerRef_ListID = new Text("CustomerRef_ListID");
        $CustomerRef_ListID->setLabel("ID Cliente");
        $this->add($CustomerRef_ListID);

        $CustomerRef_FullName = new Text("CustomerRef_FullName");
        $CustomerRef_FullName->setLabel("Razon Social Cliente");
        $this->add($CustomerRef_FullName);

        $TermsRef_ListID = new Text("TermsRef_ListID");
        $TermsRef_ListID->setLabel("Plazo");
        $this->add($TermsRef_ListID);

        $TermsRef_FullName = new Text("TermsRef_FullName");
        $TermsRef_FullName->setLabel("plazo");
        $this->add($TermsRef_FullName);

        $SalesRepRef_ListID = new Text("SalesRepRef_ListID");
        $SalesRepRef_ListID->setLabel("ID Representante");
        $this->add($SalesRepRef_ListID);

        $SalesRepRef_FullName = new Text("SalesRepRef_FullName");
        $SalesRepRef_FullName->setLabel("Razon Social Representante");
        $this->add($SalesRepRef_FullName);

        for ($i = 0; $i < count($array); $i++) {
            
        }
    }

}
