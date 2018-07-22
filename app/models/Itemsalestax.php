<?php

class Itemsalestax extends \Phalcon\Mvc\Model {

    protected $ListID;   // (normal Attribute)
    protected $TimeCreated;   // (normal Attribute)
    protected $TimeModified;   // (normal Attribute)
    protected $EditSequence;   // (normal Attribute)
    protected $Name;   // (normal Attribute)
    protected $BarCodeValue;   // (normal Attribute)
    protected $IsActive;   // (normal Attribute)
    protected $ClassRef_ListID;   // (normal Attribute)
    protected $ClassRef_FullName;   // (normal Attribute)
    protected $ItemDesc;   // (normal Attribute)
    protected $IsUsedOnPurchaseTransaction;   // (normal Attribute)
    protected $TaxRate;   // (normal Attribute)
    protected $TaxVendorRef_ListID;   // (normal Attribute)
    protected $TaxVendorRef_FullName;   // (normal Attribute)
    protected $Status;   // (normal Attribute)

// **********************
// GETTER METHODS
// **********************

    function getListID() {
        return $this->ListID;
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

    function getName() {
        return $this->Name;
    }

    function getBarCodeValue() {
        return $this->BarCodeValue;
    }

    function getIsActive() {
        return $this->IsActive;
    }

    function getClassRefListID() {
        return $this->ClassRef_ListID;
    }

    function getClassRefFullName() {
        return $this->ClassRef_FullName;
    }

    function getItemDesc() {
        return $this->ItemDesc;
    }

    function getIsUsedOnPurchaseTransaction() {
        return $this->IsUsedOnPurchaseTransaction;
    }

    function getTaxRate() {
        return $this->TaxRate;
    }

    function getTaxVendorRefListID() {
        return $this->TaxVendorRef_ListID;
    }

    function getTaxVendorRefFullName() {
        return $this->TaxVendorRef_FullName;
    }

    function getStatus() {
        return $this->Status;
    }

// **********************
// SETTER METHODS
// **********************


    function setListID($val) {
        $this->ListID = $val;
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

    function setName($val) {
        $this->Name = $val;
    }

    function setBarCodeValue($val) {
        $this->BarCodeValue = $val;
    }

    function setIsActive($val) {
        $this->IsActive = $val;
    }

    function setClassRefListID($val) {
        $this->ClassRef_ListID = $val;
    }

    function setClassRefFullName($val) {
        $this->ClassRef_FullName = $val;
    }

    function setItemDesc($val) {
        $this->ItemDesc = $val;
    }

    function setIsUsedOnPurchaseTransaction($val) {
        $this->IsUsedOnPurchaseTransaction = $val;
    }

    function setTaxRate($val) {
        $this->TaxRate = $val;
    }

    function setTaxVendorRefListID($val) {
        $this->TaxVendorRef_ListID = $val;
    }

    function setTaxVendorRefFullName($val) {
        $this->TaxVendorRef_FullName = $val;
    }

    function setStatus($val) {
        $this->Status = $val;
    }

    /**
     * Initialize method for model.
     */
    public function initialize() {
        $this->setSchema("carrillo_dbaurora");
        $this->setSource("itemsalestax");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource() {
        return 'itemsalestax';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Itemsalestax[]|Itemsalestax|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Itemsalestax|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

}
