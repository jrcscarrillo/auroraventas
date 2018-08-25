<?php

class Lotestrxcab extends \Phalcon\Mvc\Model {

    protected $TxnID;
    protected $TimeCreated;
    protected $TimeModified;
    protected $EditSequence;
    protected $TxnDate;
    protected $RefType;
    protected $RefNumber;
    protected $OrigenID;
    protected $DestinoID;
    protected $VehicleID;
    protected $RouteID;
    protected $DriverID;
    protected $Responsable;
    protected $Status;
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

    function getRefNumber() {
        return $this->RefNumber;
    }

    function getRefType() {
        return $this->RefType;
    }

    function getOrigenID() {
        return $this->OrigenID;
    }

    function getDestinoID() {
        return $this->DestinoID;
    }

    function getVehicleID() {
        return $this->VehicleID;
    }

    function getRouteID() {
        return $this->RouteID;
    }

    function getDriverID() {
        return $this->DriverID;
    }

    function getResponsable() {
        return $this->Responsable;
    }

    function getStatus() {
        return $this->Status;
    }

    function getEstado() {
        return $this->Estado;
    }
    
    function getOrigenDesc() {
        $parameters = array('conditions' => '[ListID] = "' . $this->OrigenID . '"');
        $bodega = Bodegas::findFirst($parameters);
        
        return $bodega->getName();
    }
    function getDestinoDesc() {
        $parameters = array('conditions' => '[ListID] = "' . $this->DestinoID . '"');
        $bodega = Bodegas::findFirst($parameters);
        
        return $bodega->getName();
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

    function setRefType($val) {
        $this->RefType = $val;
    }

    function setRefNumber($val) {
        $this->RefNumber = $val;
    }

    function setOrigenID($val) {
        $this->OrigenID = $val;
    }

    function setDestinoID($val) {
        $this->DestinoID = $val;
    }

    function setVehicleID($val) {
        $this->VehicleID = $val;
    }

    function setRouteID($val) {
        $this->RouteID = $val;
    }

    function setDriverID($val) {
        $this->DriverID = $val;
    }

    function setResponsable($val) {
        $this->Responsable = $val;
    }

    function setStatus($val) {
        $this->Status = $val;
    }

    function setEstado($val) {
        $this->Estado = $val;
    }

    public function initialize() {
        $this->setSchema("carrillo_dbaurora");
        $this->setSource("lotestrxcab");
        $this->hasMany('TxnID', 'Lotestrx', 'IDKEY', ['alias' => 'Lotestrx']);
    }

    public function getSource() {
        return 'lotestrxcab';
    }

    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

}
