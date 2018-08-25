<?php

use \Phalcon\Forms\Form;
use \Phalcon\Forms\Element\Date;
use \Phalcon\Forms\Element\Select;
use \Phalcon\Validation\Validator\PresenceOf;

class ReporteInventariosForm extends Form {
    public function initialize()
    {

        $tipos = Codetype::find([
            "columns" => "type, codeValue",
            "conditions" => "tipoCod = ?1",
            "bind"       => [1 => "RINVENTARIO"]
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
        $tipoAdd->setLabel("Tipo Reporte");
        $this->add($tipoAdd);

        $iniDate = new Date("iniDate");
        $iniDate->setLabel("Fecha Inicio");
        $iniDate->addValidators(array(
           new PresenceOf(array(
              'message' => 'Ingresar fecha del reporte solo se considera mes y anio'
              ))
        ));
        $this->add($iniDate);      

        $finDate = new Date("finDate");
        $finDate->setLabel("Fecha Final");
        $finDate->addValidators(array(
           new PresenceOf(array(
              'message' => 'Ingresar fecha del reporte solo se considera mes y anio'
              ))
        ));
        $this->add($finDate); 
        
        $bodegasQuery = Bodegas::find([
            "columns" => "FullName, ListID",
           "conditions" => "Sublevel = '1' AND Status = 'CON-MOV'",
           "order"  => "FullName"
           ]); 
        $DestinoTrx = new Select(
           'DestinoTrx',
           $bodegasQuery,
           [
              'using'      => [
                 'ListID',
                 'FullName',
                 ]
              ]
           );
        $DestinoTrx->setLabel("Bodega");
        $this->add($DestinoTrx);
        
        $heladosQuery = Items::find([
            "columns" => "quickbooks_listid, sales_desc, quickbooks_editsequence",
            "order"     => "quickbooks_editsequence"
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
        $ItemRef_ListID->setLabel("Producto");
        $this->add($ItemRef_ListID);
        
    }
    
}
