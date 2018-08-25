<?php

class Lotesdetalle extends \Phalcon\Mvc\Model {

// **********************
// ATTRIBUTE DECLARATION
// **********************

    protected $TxnID;
    protected $TimeCreated;
    protected $TimeModified;
    protected $EditSequence;
    protected $TxnDate;
    protected $TxnNumber;
    protected $RefNumber;
    protected $ItemRef_ListID;
    protected $ItemRef_FullName;
    protected $EmployeeRef_ListID;
    protected $EmployeeRef_FullName;
    protected $Memo;
    protected $BodProducida;
    protected $QtyProducida;
    protected $BodBuena;
    protected $QtyBuena;
    protected $BodMala;
    protected $QtyMala;
    protected $BodReproceso;
    protected $QtyReproceso;
    protected $BodMuestra;
    protected $QtyMuestra;
    protected $BodLab;
    protected $QtyLab;
    protected $IsPending;
    protected $Estado;

// **********************
// GETTER METHODS
// **********************


    function getTxnID() {
        return $this->TxnID;
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

    function getTxnNumber() {
        return $this->TxnNumber;
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

    function getEmployeeRefListID() {
        return $this->EmployeeRef_ListID;
    }

    function getEmployeeRefFullName() {
        return $this->EmployeeRef_FullName;
    }

    function getMemo() {
        return $this->Memo;
    }

    function getBodProducida() {
        return $this->BodProducida;
    }

    function getQtyProducida() {
        return $this->QtyProducida;
    }

    function getBodBuena() {
        return $this->BodBuena;
    }

    function getQtyBuena() {
        return $this->QtyBuena;
    }

    function getBodMala() {
        return $this->BodMala;
    }

    function getQtyMala() {
        return $this->QtyMala;
    }

    function getBodReproceso() {
        return $this->BodReproceso;
    }

    function getQtyReproceso() {
        return $this->QtyReproceso;
    }

    function getBodMuestra() {
        return $this->BodMuestra;
    }

    function getQtyMuestra() {
        return $this->QtyMuestra;
    }

    function getBodLab() {
        return $this->BodLab;
    }

    function getQtyLab() {
        return $this->QtyLab;
    }

    function getIsPending() {
        return $this->IsPending;
    }

    function getEstado() {
        return $this->Estado;
    }

// **********************
// SETTER METHODS
// **********************


    function setTxnID($val) {
        $this->TxnID = $val;
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

    function setTxnNumber($val) {
        $this->TxnNumber = $val;
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

    function setEmployeeRefListID($val) {
        $this->EmployeeRef_ListID = $val;
    }

    function setEmployeeRefFullName($val) {
        $this->EmployeeRef_FullName = $val;
    }

    function setMemo($val) {
        $this->Memo = $val;
    }

    function setBodProducida($val) {
        $this->BodProducida = $val;
    }

    function setQtyProducida($val) {
        $this->QtyProducida = $val;
    }

    function setBodBuena($val) {
        $this->BodBuena = $val;
    }

    function setQtyBuena($val) {
        $this->QtyBuena = $val;
    }

    function setBodMala($val) {
        $this->BodMala = $val;
    }

    function setQtyMala($val) {
        $this->QtyMala = $val;
    }

    function setBodReproceso($val) {
        $this->BodReproceso = $val;
    }

    function setQtyReproceso($val) {
        $this->QtyReproceso = $val;
    }

    function setBodMuestra($val) {
        $this->BodMuestra = $val;
    }

    function setQtyMuestra($val) {
        $this->QtyMuestra = $val;
    }

    function setBodLab($val) {
        $this->BodLab = $val;
    }

    function setQtyLab($val) {
        $this->QtyLab = $val;
    }

    function setIsPending($val) {
        $this->IsPending = $val;
    }

    function setEstado($val) {
        $this->Estado = $val;
    }

    public function initialize() {
        $this->setSchema("carrillo_dbaurora");
        $this->setSource("lotesdetalle");
        $this->belongsTo(
           'ItemRef_ListID',
           'Items',
           'quickbooks_listid');        
    }

    public function getSource() {
        return 'lotesdetalle';
    }

    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

}
