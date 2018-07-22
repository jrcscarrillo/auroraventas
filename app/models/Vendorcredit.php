<?php

class Vendorcredit extends \Phalcon\Mvc\Model {

    protected $TxnID;   // (normal Attribute)
    protected $TimeCreated;   // (normal Attribute)
    protected $TimeModified;   // (normal Attribute)
    protected $EditSequence;   // (normal Attribute)
    protected $TxnNumber;   // (normal Attribute)
    protected $VendorRef_ListID;   // (normal Attribute)
    protected $VendorRef_FullName;   // (normal Attribute)
    protected $APAccountRef_ListID;   // (normal Attribute)
    protected $APAccountRef_FullName;   // (normal Attribute)
    protected $TxnDate;   // (normal Attribute)
    protected $CreditAmount;   // (normal Attribute)
    protected $CurrencyRef_ListID;   // (normal Attribute)
    protected $CurrencyRef_FullName;   // (normal Attribute)
    protected $ExchangeRate;   // (normal Attribute)
    protected $CreditAmountInHomeCurrency;   // (normal Attribute)
    protected $RefNumber;   // (normal Attribute)
    protected $Memo;   // (normal Attribute)
    protected $OpenAmount;   // (normal Attribute)
    protected $CustomField1;   // (normal Attribute)
    protected $CustomField2;   // (normal Attribute)
    protected $CustomField3;   // (normal Attribute)
    protected $CustomField4;   // (normal Attribute)
    protected $CustomField5;   // (normal Attribute)
    protected $CustomField6;   // (normal Attribute)
    protected $CustomField7;   // (normal Attribute)
    protected $CustomField8;   // (normal Attribute)
    protected $CustomField9;   // (normal Attribute)
    protected $CustomField10;   // (normal Attribute)
    protected $CustomField11;   // (normal Attribute)
    protected $CustomField12;   // (normal Attribute)
    protected $CustomField13;   // (normal Attribute)
    protected $CustomField14;   // (normal Attribute)
    protected $CustomField15;   // (normal Attribute)
    protected $Status;   // (normal Attribute)

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

    function getTxnNumber() {
        return $this->TxnNumber;
    }

    function getVendorRefListID() {
        return $this->VendorRef_ListID;
    }

    function getVendorRefFullName() {
        return $this->VendorRef_FullName;
    }

    function getAPAccountRefListID() {
        return $this->APAccountRef_ListID;
    }

    function getAPAccountRefFullName() {
        return $this->APAccountRef_FullName;
    }

    function getTxnDate() {
        return $this->TxnDate;
    }

    function getCreditAmount() {
        return $this->CreditAmount;
    }

    function getCurrencyRefListID() {
        return $this->CurrencyRef_ListID;
    }

    function getCurrencyRefFullName() {
        return $this->CurrencyRef_FullName;
    }

    function getExchangeRate() {
        return $this->ExchangeRate;
    }

    function getCreditAmountInHomeCurrency() {
        return $this->CreditAmountInHomeCurrency;
    }

    function getRefNumber() {
        return $this->RefNumber;
    }

    function getMemo() {
        return $this->Memo;
    }

    function getOpenAmount() {
        return $this->OpenAmount;
    }

    function getCustomField1() {
        return $this->CustomField1;
    }

    function getCustomField2() {
        return $this->CustomField2;
    }

    function getCustomField3() {
        return $this->CustomField3;
    }

    function getCustomField4() {
        return $this->CustomField4;
    }

    function getCustomField5() {
        return $this->CustomField5;
    }

    function getCustomField6() {
        return $this->CustomField6;
    }

    function getCustomField7() {
        return $this->CustomField7;
    }

    function getCustomField8() {
        return $this->CustomField8;
    }

    function getCustomField9() {
        return $this->CustomField9;
    }

    function getCustomField10() {
        return $this->CustomField10;
    }

    function getCustomField11() {
        return $this->CustomField11;
    }

    function getCustomField12() {
        return $this->CustomField12;
    }

    function getCustomField13() {
        return $this->CustomField13;
    }

    function getCustomField14() {
        return $this->CustomField14;
    }

    function getCustomField15() {
        return $this->CustomField15;
    }

    function getStatus() {
        return $this->Status;
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

    function setTxnNumber($val) {
        $this->TxnNumber = $val;
    }

    function setVendorRefListID($val) {
        $this->VendorRef_ListID = $val;
    }

    function setVendorRefFullName($val) {
        $this->VendorRef_FullName = $val;
    }

    function setAPAccountRefListID($val) {
        $this->APAccountRef_ListID = $val;
    }

    function setAPAccountRefFullName($val) {
        $this->APAccountRef_FullName = $val;
    }

    function setTxnDate($val) {
        $this->TxnDate = $val;
    }

    function setCreditAmount($val) {
        $this->CreditAmount = $val;
    }

    function setCurrencyRefListID($val) {
        $this->CurrencyRef_ListID = $val;
    }

    function setCurrencyRefFullName($val) {
        $this->CurrencyRef_FullName = $val;
    }

    function setExchangeRate($val) {
        $this->ExchangeRate = $val;
    }

    function setCreditAmountInHomeCurrency($val) {
        $this->CreditAmountInHomeCurrency = $val;
    }

    function setRefNumber($val) {
        $this->RefNumber = $val;
    }

    function setMemo($val) {
        $this->Memo = $val;
    }

    function setOpenAmount($val) {
        $this->OpenAmount = $val;
    }

    function setCustomField1($val) {
        $this->CustomField1 = $val;
    }

    function setCustomField2($val) {
        $this->CustomField2 = $val;
    }

    function setCustomField3($val) {
        $this->CustomField3 = $val;
    }

    function setCustomField4($val) {
        $this->CustomField4 = $val;
    }

    function setCustomField5($val) {
        $this->CustomField5 = $val;
    }

    function setCustomField6($val) {
        $this->CustomField6 = $val;
    }

    function setCustomField7($val) {
        $this->CustomField7 = $val;
    }

    function setCustomField8($val) {
        $this->CustomField8 = $val;
    }

    function setCustomField9($val) {
        $this->CustomField9 = $val;
    }

    function setCustomField10($val) {
        $this->CustomField10 = $val;
    }

    function setCustomField11($val) {
        $this->CustomField11 = $val;
    }

    function setCustomField12($val) {
        $this->CustomField12 = $val;
    }

    function setCustomField13($val) {
        $this->CustomField13 = $val;
    }

    function setCustomField14($val) {
        $this->CustomField14 = $val;
    }

    function setCustomField15($val) {
        $this->CustomField15 = $val;
    }

    function setStatus($val) {
        $this->Status = $val;
    }

    /**
     * Initialize method for model.
     */
    public function initialize() {
        $this->setSchema("carrillo_dbaurora");
        $this->setSource("vendorcredit");
        $this->hasMany('TxnID', 'Txnitemlinedetail', 'IDKEY');
        $this->belongsTo('VendorRef_ListID', 'Vendor', 'ListID');
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource() {
        return 'vendorcredit';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Vendorcredit[]|Vendorcredit|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Vendorcredit|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

}
