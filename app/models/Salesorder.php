<?php

class Salesorder extends \Phalcon\Mvc\Model {

// **********************
// ATTRIBUTE DECLARATION
// **********************


    protected $TxnID;   // (normal Attribute)
    protected $TimeCreated;   // (normal Attribute)
    protected $TimeModified;   // (normal Attribute)
    protected $EditSequence;   // (normal Attribute)
    protected $TxnNumber;   // (normal Attribute)
    protected $CustomerRef_ListID;   // (normal Attribute)
    protected $CustomerRef_FullName;   // (normal Attribute)
    protected $ClassRef_ListID;   // (normal Attribute)
    protected $ClassRef_FullName;   // (normal Attribute)
    protected $TemplateRef_ListID;   // (normal Attribute)
    protected $TemplateRef_FullName;   // (normal Attribute)
    protected $TxnDate;   // (normal Attribute)
    protected $RefNumber;   // (normal Attribute)
    protected $BillAddress_Addr1;   // (normal Attribute)
    protected $BillAddress_Addr2;   // (normal Attribute)
    protected $BillAddress_Addr3;   // (normal Attribute)
    protected $BillAddress_Addr4;   // (normal Attribute)
    protected $BillAddress_Addr5;   // (normal Attribute)
    protected $BillAddress_City;   // (normal Attribute)
    protected $BillAddress_State;   // (normal Attribute)
    protected $BillAddress_PostalCode;   // (normal Attribute)
    protected $BillAddress_Country;   // (normal Attribute)
    protected $BillAddress_Note;   // (normal Attribute)
    protected $ShipAddress_Addr1;   // (normal Attribute)
    protected $ShipAddress_Addr2;   // (normal Attribute)
    protected $ShipAddress_Addr3;   // (normal Attribute)
    protected $ShipAddress_Addr4;   // (normal Attribute)
    protected $ShipAddress_Addr5;   // (normal Attribute)
    protected $ShipAddress_City;   // (normal Attribute)
    protected $ShipAddress_State;   // (normal Attribute)
    protected $ShipAddress_PostalCode;   // (normal Attribute)
    protected $ShipAddress_Country;   // (normal Attribute)
    protected $ShipAddress_Note;   // (normal Attribute)
    protected $PONumber;   // (normal Attribute)
    protected $TermsRef_ListID;   // (normal Attribute)
    protected $TermsRef_FullName;   // (normal Attribute)
    protected $DueDate;   // (normal Attribute)
    protected $SalesRepRef_ListID;   // (normal Attribute)
    protected $SalesRepRef_FullName;   // (normal Attribute)
    protected $FOB;   // (normal Attribute)
    protected $ShipDate;   // (normal Attribute)
    protected $ShipMethodRef_ListID;   // (normal Attribute)
    protected $ShipMethodRef_FullName;   // (normal Attribute)
    protected $Subtotal;   // (normal Attribute)
    protected $ItemSalesTaxRef_ListID;   // (normal Attribute)
    protected $ItemSalesTaxRef_FullName;   // (normal Attribute)
    protected $SalesTaxPercentage;   // (normal Attribute)
    protected $SalesTaxTotal;   // (normal Attribute)
    protected $TotalAmount;   // (normal Attribute)
    protected $CurrencyRef_ListID;   // (normal Attribute)
    protected $CurrencyRef_FullName;   // (normal Attribute)
    protected $ExchangeRate;   // (normal Attribute)
    protected $TotalAmountInHomeCurrency;   // (normal Attribute)
    protected $IsManuallyClosed;   // (normal Attribute)
    protected $IsFullyInvoiced;   // (normal Attribute)
    protected $Memo;   // (normal Attribute)
    protected $CustomerMsgRef_ListID;   // (normal Attribute)
    protected $CustomerMsgRef_FullName;   // (normal Attribute)
    protected $IsToBePrinted;   // (normal Attribute)
    protected $IsToBeEmailed;   // (normal Attribute)
    protected $IsTaxIncluded;   // (normal Attribute)
    protected $CustomerSalesTaxCodeRef_ListID;   // (normal Attribute)
    protected $CustomerSalesTaxCodeRef_FullName;   // (normal Attribute)
    protected $Other;   // (normal Attribute)
    protected $LinkedTxn;   // (normal Attribute)
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

    function getCustomerRefListID() {
        return $this->CustomerRef_ListID;
    }

    function getCustomerRefFullName() {
        return $this->CustomerRef_FullName;
    }

    function getClassRefListID() {
        return $this->ClassRef_ListID;
    }

    function getClassRefFullName() {
        return $this->ClassRef_FullName;
    }

    function getTemplateRefListID() {
        return $this->TemplateRef_ListID;
    }

    function getTemplateRefFullName() {
        return $this->TemplateRef_FullName;
    }

    function getTxnDate() {
        return $this->TxnDate;
    }

    function getRefNumber() {
        return $this->RefNumber;
    }

    function getBillAddressAddr1() {
        return $this->BillAddress_Addr1;
    }

    function getBillAddressAddr2() {
        return $this->BillAddress_Addr2;
    }

    function getBillAddressAddr3() {
        return $this->BillAddress_Addr3;
    }

    function getBillAddressAddr4() {
        return $this->BillAddress_Addr4;
    }

    function getBillAddressAddr5() {
        return $this->BillAddress_Addr5;
    }

    function getBillAddressCity() {
        return $this->BillAddress_City;
    }

    function getBillAddressState() {
        return $this->BillAddress_State;
    }

    function getBillAddressPostalCode() {
        return $this->BillAddress_PostalCode;
    }

    function getBillAddressCountry() {
        return $this->BillAddress_Country;
    }

    function getBillAddressNote() {
        return $this->BillAddress_Note;
    }

    function getShipAddressAddr1() {
        return $this->ShipAddress_Addr1;
    }

    function getShipAddressAddr2() {
        return $this->ShipAddress_Addr2;
    }

    function getShipAddressAddr3() {
        return $this->ShipAddress_Addr3;
    }

    function getShipAddressAddr4() {
        return $this->ShipAddress_Addr4;
    }

    function getShipAddressAddr5() {
        return $this->ShipAddress_Addr5;
    }

    function getShipAddressCity() {
        return $this->ShipAddress_City;
    }

    function getShipAddressState() {
        return $this->ShipAddress_State;
    }

    function getShipAddressPostalCode() {
        return $this->ShipAddress_PostalCode;
    }

    function getShipAddressCountry() {
        return $this->ShipAddress_Country;
    }

    function getShipAddressNote() {
        return $this->ShipAddress_Note;
    }

    function getPONumber() {
        return $this->PONumber;
    }

    function getTermsRefListID() {
        return $this->TermsRef_ListID;
    }

    function getTermsRefFullName() {
        return $this->TermsRef_FullName;
    }

    function getDueDate() {
        return $this->DueDate;
    }

    function getSalesRepRefListID() {
        return $this->SalesRepRef_ListID;
    }

    function getSalesRepRefFullName() {
        return $this->SalesRepRef_FullName;
    }

    function getFOB() {
        return $this->FOB;
    }

    function getShipDate() {
        return $this->ShipDate;
    }

    function getShipMethodRefListID() {
        return $this->ShipMethodRef_ListID;
    }

    function getShipMethodRefFullName() {
        return $this->ShipMethodRef_FullName;
    }

    function getSubtotal() {
        return $this->Subtotal;
    }

    function getItemSalesTaxRefListID() {
        return $this->ItemSalesTaxRef_ListID;
    }

    function getItemSalesTaxRefFullName() {
        return $this->ItemSalesTaxRef_FullName;
    }

    function getSalesTaxPercentage() {
        return $this->SalesTaxPercentage;
    }

    function getSalesTaxTotal() {
        return $this->SalesTaxTotal;
    }

    function getTotalAmount() {
        return $this->TotalAmount;
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

    function getTotalAmountInHomeCurrency() {
        return $this->TotalAmountInHomeCurrency;
    }

    function getIsManuallyClosed() {
        return $this->IsManuallyClosed;
    }

    function getIsFullyInvoiced() {
        return $this->IsFullyInvoiced;
    }

    function getMemo() {
        return $this->Memo;
    }

    function getCustomerMsgRefListID() {
        return $this->CustomerMsgRef_ListID;
    }

    function getCustomerMsgRefFullName() {
        return $this->CustomerMsgRef_FullName;
    }

    function getIsToBePrinted() {
        return $this->IsToBePrinted;
    }

    function getIsToBeEmailed() {
        return $this->IsToBeEmailed;
    }

    function getIsTaxIncluded() {
        return $this->IsTaxIncluded;
    }

    function getCustomerSalesTaxCodeRefListID() {
        return $this->CustomerSalesTaxCodeRef_ListID;
    }

    function getCustomerSalesTaxCodeRefFullName() {
        return $this->CustomerSalesTaxCodeRef_FullName;
    }

    function getOther() {
        return $this->Other;
    }

    function getLinkedTxn() {
        return $this->LinkedTxn;
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

    function setCustomerRefListID($val) {
        $this->CustomerRef_ListID = $val;
    }

    function setCustomerRefFullName($val) {
        $this->CustomerRef_FullName = $val;
    }

    function setClassRefListID($val) {
        $this->ClassRef_ListID = $val;
    }

    function setClassRefFullName($val) {
        $this->ClassRef_FullName = $val;
    }

    function setTemplateRefListID($val) {
        $this->TemplateRef_ListID = $val;
    }

    function setTemplateRefFullName($val) {
        $this->TemplateRef_FullName = $val;
    }

    function setTxnDate($val) {
        $this->TxnDate = $val;
    }

    function setRefNumber($val) {
        $this->RefNumber = $val;
    }

    function setBillAddressAddr1($val) {
        $this->BillAddress_Addr1 = $val;
    }

    function setBillAddressAddr2($val) {
        $this->BillAddress_Addr2 = $val;
    }

    function setBillAddressAddr3($val) {
        $this->BillAddress_Addr3 = $val;
    }

    function setBillAddressAddr4($val) {
        $this->BillAddress_Addr4 = $val;
    }

    function setBillAddressAddr5($val) {
        $this->BillAddress_Addr5 = $val;
    }

    function setBillAddressCity($val) {
        $this->BillAddress_City = $val;
    }

    function setBillAddressState($val) {
        $this->BillAddress_State = $val;
    }

    function setBillAddressPostalCode($val) {
        $this->BillAddress_PostalCode = $val;
    }

    function setBillAddressCountry($val) {
        $this->BillAddress_Country = $val;
    }

    function setBillAddressNote($val) {
        $this->BillAddress_Note = $val;
    }

    function setShipAddressAddr1($val) {
        $this->ShipAddress_Addr1 = $val;
    }

    function setShipAddressAddr2($val) {
        $this->ShipAddress_Addr2 = $val;
    }

    function setShipAddressAddr3($val) {
        $this->ShipAddress_Addr3 = $val;
    }

    function setShipAddressAddr4($val) {
        $this->ShipAddress_Addr4 = $val;
    }

    function setShipAddressAddr5($val) {
        $this->ShipAddress_Addr5 = $val;
    }

    function setShipAddressCity($val) {
        $this->ShipAddress_City = $val;
    }

    function setShipAddressState($val) {
        $this->ShipAddress_State = $val;
    }

    function setShipAddressPostalCode($val) {
        $this->ShipAddress_PostalCode = $val;
    }

    function setShipAddressCountry($val) {
        $this->ShipAddress_Country = $val;
    }

    function setShipAddressNote($val) {
        $this->ShipAddress_Note = $val;
    }

    function setPONumber($val) {
        $this->PONumber = $val;
    }

    function setTermsRefListID($val) {
        $this->TermsRef_ListID = $val;
    }

    function setTermsRefFullName($val) {
        $this->TermsRef_FullName = $val;
    }

    function setDueDate($val) {
        $this->DueDate = $val;
    }

    function setSalesRepRefListID($val) {
        $this->SalesRepRef_ListID = $val;
    }

    function setSalesRepRefFullName($val) {
        $this->SalesRepRef_FullName = $val;
    }

    function setFOB($val) {
        $this->FOB = $val;
    }

    function setShipDate($val) {
        $this->ShipDate = $val;
    }

    function setShipMethodRefListID($val) {
        $this->ShipMethodRef_ListID = $val;
    }

    function setShipMethodRefFullName($val) {
        $this->ShipMethodRef_FullName = $val;
    }

    function setSubtotal($val) {
        $this->Subtotal = $val;
    }

    function setItemSalesTaxRefListID($val) {
        $this->ItemSalesTaxRef_ListID = $val;
    }

    function setItemSalesTaxRefFullName($val) {
        $this->ItemSalesTaxRef_FullName = $val;
    }

    function setSalesTaxPercentage($val) {
        $this->SalesTaxPercentage = $val;
    }

    function setSalesTaxTotal($val) {
        $this->SalesTaxTotal = $val;
    }

    function setTotalAmount($val) {
        $this->TotalAmount = $val;
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

    function setTotalAmountInHomeCurrency($val) {
        $this->TotalAmountInHomeCurrency = $val;
    }

    function setIsManuallyClosed($val) {
        $this->IsManuallyClosed = $val;
    }

    function setIsFullyInvoiced($val) {
        $this->IsFullyInvoiced = $val;
    }

    function setMemo($val) {
        $this->Memo = $val;
    }

    function setCustomerMsgRefListID($val) {
        $this->CustomerMsgRef_ListID = $val;
    }

    function setCustomerMsgRefFullName($val) {
        $this->CustomerMsgRef_FullName = $val;
    }

    function setIsToBePrinted($val) {
        $this->IsToBePrinted = $val;
    }

    function setIsToBeEmailed($val) {
        $this->IsToBeEmailed = $val;
    }

    function setIsTaxIncluded($val) {
        $this->IsTaxIncluded = $val;
    }

    function setCustomerSalesTaxCodeRefListID($val) {
        $this->CustomerSalesTaxCodeRef_ListID = $val;
    }

    function setCustomerSalesTaxCodeRefFullName($val) {
        $this->CustomerSalesTaxCodeRef_FullName = $val;
    }

    function setOther($val) {
        $this->Other = $val;
    }

    function setLinkedTxn($val) {
        $this->LinkedTxn = $val;
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
        $this->setSource("salesorder");
        $this->hasMany('TxnID', 'Salesorderlinedetail', 'IDKEY', ['alias' => 'Salesorderlinedetail']);
        $this->belongsTo('CustomerRef_ListID', 'Customer', 'ListID');
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource() {
        return 'salesorder';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Salesorder[]|Salesorder|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Salesorder|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

}
