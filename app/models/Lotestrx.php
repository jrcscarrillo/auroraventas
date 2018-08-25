<?php

class Lotestrx extends \Phalcon\Mvc\Model {

    protected $TxnLineID;
    protected $TimeCreated;
    protected $TimeModified;
    protected $EditSequence;
    protected $TxnDate;
    protected $RefNumber;
    protected $ItemRef_ListID;
    protected $ItemRef_FullName;
    protected $Memo;
    protected $MemoTrx;
    protected $NumeroTrx;
    protected $FechaTrx;
    protected $TipoTrx;
    protected $OrigenTrx;
    protected $DestinoTrx;
    protected $OrigenSub;
    protected $DestinoSub;
    protected $QtyTrx;
    protected $IDKEY;
    protected $Estado;

// **********************
// GETTER METHODS
// **********************


    function getTxnLineID() {
        return $this->TxnLineID;
    }

    function getTimeCreated() {
        return $this->TimeCreated;
    }

    function getTimeModified() {
        return $this->TimeModified;
    }

    function getEditSequence() {
        return $this->EditSequence;
    }

    function getTxnDate() {
        return $this->TxnDate;
    }

    function getRefNumber() {
        return $this->RefNumber;
    }

    function getItemRefListID() {
        return $this->ItemRef_ListID;
    }

    function getItemRefFullName() {
        return $this->ItemRef_FullName;
    }

    function getMemo() {
        return $this->Memo;
    }

    function getMemoTrx() {
        return $this->MemoTrx;
    }

    function getNumeroTrx() {
        return $this->NumeroTrx;
    }

    function getFechaTrx() {
        return $this->FechaTrx;
    }

    function getTipoTrx() {
        return $this->TipoTrx;
    }

    function getOrigenTrx() {
        return $this->OrigenTrx;
    }

    function getDestinoTrx() {
        return $this->DestinoTrx;
    }

    function getOrigenSub() {
        return $this->OrigenSub;
    }

    function getDestinoSub() {
        return $this->DestinoSub;
    }

    function getQtyTrx() {
        return $this->QtyTrx;
    }

    function getIDKEY() {
        return $this->IDKEY;
    }

    function getEstado() {
        return $this->Estado;
    }

    function getOrigenDesc() {
        $parameters = array('conditions' => '[ListID] = "' . $this->OrigenTrx . '"');
        $bodega = Bodegas::findFirst($parameters);
        
        return $bodega->getName();
    }
    function getDestinoDesc() {
        $parameters = array('conditions' => '[ListID] = "' . $this->DestinoTrx . '"');
        $bodega = Bodegas::findFirst($parameters);
        
        return $bodega->getName();
    }

    function getOrigenSubDesc() {
        $parameters = array('conditions' => '[ListID] = "' . $this->OrigenSub . '"');
        $bodega = Bodegas::findFirst($parameters);
        
        return $bodega->getName();
    }
    function getDestinoSubDesc() {
        $parameters = array('conditions' => '[ListID] = "' . $this->DestinoSub . '"');
        $bodega = Bodegas::findFirst($parameters);
        
        return $bodega->getName();
    }

    function getHeladoDesc() {
        $parameters = array('conditions' => '[quickbooks_listid] = "' . $this->ItemRef_ListID . '"');
        $helado = Items::findFirst($parameters);
        
        return $helado->sales_desc;
    }


    function getOrigenTomaFisica() {
        $parameters = array('conditions' => '[Name] = "TOMA FISICA"');
        $bodega = Bodegas::findFirst($parameters);
        
        return $bodega->getListID();
    }    
// **********************
// SETTER METHODS
// **********************


    function setTxnLineID($val) {
        $this->TxnLineID = $val;
    }

    function setTimeCreated($val) {
        $this->TimeCreated = $val;
    }

    function setTimeModified($val) {
        $this->TimeModified = $val;
    }

    function setEditSequence($val) {
        $this->EditSequence = $val;
    }

    function setTxnDate($val) {
        $this->TxnDate = $val;
    }

    function setRefNumber($val) {
        $this->RefNumber = $val;
    }

    function setItemRefListID($val) {
        $this->ItemRef_ListID = $val;
    }

    function setItemRefFullName($val) {
        $this->ItemRef_FullName = $val;
    }

    function setMemo($val) {
        $this->Memo = $val;
    }

    function setMemoTrx($val) {
        $this->MemoTrx = $val;
    }

    function setNumeroTrx($val) {
        $this->NumeroTrx = $val;
    }

    function setFechaTrx($val) {
        $this->FechaTrx = $val;
    }

    function setTipoTrx($val) {
        $this->TipoTrx = $val;
    }

    function setOrigenTrx($val) {
        $this->OrigenTrx = $val;
    }

    function setDestinoTrx($val) {
        $this->DestinoTrx = $val;
    }

    function setOrigenSub($val) {
        $this->OrigenSub = $val;
    }

    function setDestinoSub($val) {
        $this->DestinoSub = $val;
    }
    function setQtyTrx($val) {
        $this->QtyTrx = $val;
    }

    function setIDKEY($val) {
        $this->IDKEY = $val;
    }

    function setEstado($val) {
        $this->Estado = $val;
    }

    public function initialize() {
        $this->setSchema("carrillo_dbaurora");
        $this->setSource("lotestrx");
        $this->belongsTo('IDKEY', '\Lotestrxcab', 'TxnID', ['alias' => 'Lotestrxcab']);
        $this->belongsTo(
           'ItemRef_ListID',
           'Items',
           'quickbooks_listid');
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource() {
        return 'lotestrx';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Lotestrx[]|Lotestrx|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Lotestrx|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

    public function existenciasBodega($params) {
                $iniDate = $params['iniDate'];
        $finDate = $params['finDate'];
        $bodega = $params['bodega'];
        $producto = $params['producto'];
        $movimiento = array("Ingresos" => 0, "Egresos" => 0, "Disponible" => 0, "BodegaIN" => "", "BodegaOUT" => "",);

        $parameters = array('conditions' => '([OrigenTrx] = "' . $bodega . '" OR [DestinoTrx] = "' . $bodega . '" ) ' . ' AND [ItemRef_ListID] = "' . $producto . '" AND [TxnDate] < "' . $iniDate . '"');
        $in_outs = $this->find($parameters);
        foreach ($in_outs as $ing_egr) {
//            if($ing_egr->TipoTrx === 'INVENTARIO-INICIAL' or $ing_egr->TipoTrx === 'ORDEN-PRODUCCION'){
            if($ing_egr->OrigenTrx === $bodega){
                $movimiento['Egresos'] += $ing_egr->QtyTrx;
            } else { 
                $movimiento['Ingresos'] += $ing_egr->QtyTrx;
            }
        }
        $movimiento['Disponible'] = $movimiento['Ingresos'] - $movimiento['Egresos'];
        $movimiento['BodegaIN'] = $bodega;
        $movimiento['BodegaOUT'] = $producto;
        return $movimiento;
    }

    
    public function disponibleBodega($bodega, $producto) {
        $movimiento = array("Ingresos" => 0, "Egresos" => 0, "Disponible" => 0, "BodegaIN" => "", "BodegaOUT" => "",);

        $parameters = array('conditions' => '[ItemRef_ListID] = "' . $producto . '" AND ([OrigenTrx] = "' . $bodega . '" OR [DestinoTrx] = "' . $bodega . '")');
        $in_outs = $this->find($parameters);
        foreach ($in_outs as $ing_egr) {
            if ($ing_egr->DestinoTrx === $bodega) {
                $movimiento['Ingresos'] += $ing_egr->QtyTrx;
            } elseif ($ing_egr->OrigenTrx === $bodega) {
                $movimiento['Egresos'] += $ing_egr->QtyTrx;
            }
        }
        $movimiento['Disponible'] = $movimiento['Ingresos'] - $movimiento['Egresos'];
        return $movimiento;        
    }
    
    public function disponibleVolante($bodega, $producto, $referencia) {
        $movimiento = array("Ingresos" => 0, "Egresos" => 0, "Disponible" => 0, "BodegaIN" => "", "BodegaOUT" => "",);

        $parameters = array('conditions' => '[ItemRef_ListID] = "' . $producto . '" AND [RefNumber] = "' . $referencia . '" AND ([OrigenTrx] = "' . $bodega . '" OR [DestinoTrx] = "' . $bodega . '")');
        $in_outs = $this->find($parameters);
        foreach ($in_outs as $ing_egr) {
            if ($ing_egr->DestinoTrx === $bodega) {
                $movimiento['Ingresos'] += $ing_egr->QtyTrx;
            } elseif ($ing_egr->OrigenTrx === $bodega) {
                $movimiento['Egresos'] += $ing_egr->QtyTrx;
            }
        }
        $movimiento['Disponible'] = $movimiento['Ingresos'] - $movimiento['Egresos'];
        return $movimiento;        
    }
    
}
