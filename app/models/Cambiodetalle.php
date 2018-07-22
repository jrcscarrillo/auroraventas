<?php

class Cambiodetalle extends \Phalcon\Mvc\Model {

    protected $TxnLineID;
    protected $ItemRef_ListID;
    protected $ItemRef_FullName;
    protected $Description;
    protected $Quantity;
    protected $UnitOfMeasure;
    protected $Rate;
    protected $RatePercent;
    protected $Amount;
    protected $InventorySiteRef_ListID;
    protected $InventorySiteRef_FullName;
    protected $SerialNumber;
    protected $LotNumber;
    protected $SalesTaxCodeRef_ListID;
    protected $SalesTaxCodeRef_FullName;
    protected $Invoiced;
    protected $IsManuallyClosed;
    protected $Other1;
    protected $Other2;
    protected $IDKEY;

// **********************
// GETTER METHODS
// **********************


    function getTxnLineID() {
        return $this->TxnLineID;
    }

    function getItemRefListID() {
        return $this->ItemRef_ListID;
    }

    function getItemRefFullName() {
        return $this->ItemRef_FullName;
    }

    function getDescription() {
        return $this->Description;
    }

    function getQuantity() {
        return $this->Quantity;
    }

    function getUnitOfMeasure() {
        return $this->UnitOfMeasure;
    }

    function getRate() {
        return $this->Rate;
    }

    function getRatePercent() {
        return $this->RatePercent;
    }

    function getAmount() {
        return $this->Amount;
    }

    function getInventorySiteRefListID() {
        return $this->InventorySiteRef_ListID;
    }

    function getInventorySiteRefFullName() {
        return $this->InventorySiteRef_FullName;
    }

    function getSerialNumber() {
        return $this->SerialNumber;
    }

    function getLotNumber() {
        return $this->LotNumber;
    }

    function getSalesTaxCodeRefListID() {
        return $this->SalesTaxCodeRef_ListID;
    }

    function getSalesTaxCodeRefFullName() {
        return $this->SalesTaxCodeRef_FullName;
    }

    function getInvoiced() {
        return $this->Invoiced;
    }

    function getIsManuallyClosed() {
        return $this->IsManuallyClosed;
    }

    function getOther1() {
        return $this->Other1;
    }

    function getOther2() {
        return $this->Other2;
    }

    function getIDKEY() {
        return $this->IDKEY;
    }

// **********************
// SETTER METHODS
// **********************


    function setTxnLineID($val) {
        $this->TxnLineID = $val;
    }

    function setItemRefListID($val) {
        $this->ItemRef_ListID = $val;
    }

    function setItemRefFullName($val) {
        $this->ItemRef_FullName = $val;
    }

    function setDescription($val) {
        $this->Description = $val;
    }

    function setQuantity($val) {
        $this->Quantity = $val;
    }

    function setUnitOfMeasure($val) {
        $this->UnitOfMeasure = $val;
    }

    function setRate($val) {
        $this->Rate = $val;
    }

    function setRatePercent($val) {
        $this->RatePercent = $val;
    }

    function setAmount($val) {
        $this->Amount = $val;
    }

    function setInventorySiteRefListID($val) {
        $this->InventorySiteRef_ListID = $val;
    }

    function setInventorySiteRefFullName($val) {
        $this->InventorySiteRef_FullName = $val;
    }

    function setSerialNumber($val) {
        $this->SerialNumber = $val;
    }

    function setLotNumber($val) {
        $this->LotNumber = $val;
    }

    function setSalesTaxCodeRefListID($val) {
        $this->SalesTaxCodeRef_ListID = $val;
    }

    function setSalesTaxCodeRefFullName($val) {
        $this->SalesTaxCodeRef_FullName = $val;
    }

    function setInvoiced($val) {
        $this->Invoiced = $val;
    }

    function setIsManuallyClosed($val) {
        $this->IsManuallyClosed = $val;
    }

    function setOther1($val) {
        $this->Other1 = $val;
    }

    function setOther2($val) {
        $this->Other2 = $val;
    }

    function setIDKEY($val) {
        $this->IDKEY = $val;
    }

    /**
     * Initialize method for model.
     */
    public function initialize() {
        $this->setSchema("carrillo_dbaurora");
        $this->setSource("cambiodetalle");
        $this->belongsTo('IDKEY', 'Pedidos', 'TxnID', ['alias' => 'Pedidos']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource() {
        return 'cambiodetalle';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Cambiodetalle[]|Cambiodetalle|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Cambiodetalle|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

}
