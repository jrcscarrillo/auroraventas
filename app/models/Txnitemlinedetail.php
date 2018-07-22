<?php

class Txnitemlinedetail extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Primary
     * @Column(type="string", length=25, nullable=false)
     */
    protected $txnLineID;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    protected $itemRef_ListID;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $itemRef_FullName;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    protected $inventorySiteRef_ListID;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $inventorySiteRef_FullName;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    protected $inventorySiteLocationRef_ListID;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $inventorySiteLocationRef_FullName;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $serialNumber;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $lotNumber;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $description;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $quantity;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $unitOfMeasure;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    protected $overrideUOMSetRef_ListID;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $overrideUOMSetRef_FullName;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $cost;

    /**
     *
     * @var double
     * @Column(type="double", length=15, nullable=false)
     */
    protected $amount;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    protected $customerRef_ListID;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $customerRef_FullName;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    protected $classRef_ListID;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $classRef_FullName;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    protected $salesTaxCodeRef_ListID;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $salesTaxCodeRef_FullName;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $billableStatus;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    protected $linkedTxnID;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    protected $linkedTxnLineID;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $customField1;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $customField2;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $customField3;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $customField4;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $customField5;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $customField6;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $customField7;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $customField8;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $customField9;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $customField10;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $customField11;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $customField12;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $customField13;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $customField14;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $customField15;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    protected $iDKEY;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $groupIDKEY;

    /**
     * Method to set the value of field txnLineID
     *
     * @param string $txnLineID
     * @return $this
     */
    public function setTxnLineID($txnLineID)
    {
        $this->txnLineID = $txnLineID;

        return $this;
    }

    /**
     * Method to set the value of field itemRef_ListID
     *
     * @param string $itemRef_ListID
     * @return $this
     */
    public function setItemRefListID($itemRef_ListID)
    {
        $this->itemRef_ListID = $itemRef_ListID;

        return $this;
    }

    /**
     * Method to set the value of field itemRef_FullName
     *
     * @param string $itemRef_FullName
     * @return $this
     */
    public function setItemRefFullName($itemRef_FullName)
    {
        $this->itemRef_FullName = $itemRef_FullName;

        return $this;
    }

    /**
     * Method to set the value of field inventorySiteRef_ListID
     *
     * @param string $inventorySiteRef_ListID
     * @return $this
     */
    public function setInventorySiteRefListID($inventorySiteRef_ListID)
    {
        $this->inventorySiteRef_ListID = $inventorySiteRef_ListID;

        return $this;
    }

    /**
     * Method to set the value of field inventorySiteRef_FullName
     *
     * @param string $inventorySiteRef_FullName
     * @return $this
     */
    public function setInventorySiteRefFullName($inventorySiteRef_FullName)
    {
        $this->inventorySiteRef_FullName = $inventorySiteRef_FullName;

        return $this;
    }

    /**
     * Method to set the value of field inventorySiteLocationRef_ListID
     *
     * @param string $inventorySiteLocationRef_ListID
     * @return $this
     */
    public function setInventorySiteLocationRefListID($inventorySiteLocationRef_ListID)
    {
        $this->inventorySiteLocationRef_ListID = $inventorySiteLocationRef_ListID;

        return $this;
    }

    /**
     * Method to set the value of field inventorySiteLocationRef_FullName
     *
     * @param string $inventorySiteLocationRef_FullName
     * @return $this
     */
    public function setInventorySiteLocationRefFullName($inventorySiteLocationRef_FullName)
    {
        $this->inventorySiteLocationRef_FullName = $inventorySiteLocationRef_FullName;

        return $this;
    }

    /**
     * Method to set the value of field serialNumber
     *
     * @param string $serialNumber
     * @return $this
     */
    public function setSerialNumber($serialNumber)
    {
        $this->serialNumber = $serialNumber;

        return $this;
    }

    /**
     * Method to set the value of field lotNumber
     *
     * @param string $lotNumber
     * @return $this
     */
    public function setLotNumber($lotNumber)
    {
        $this->lotNumber = $lotNumber;

        return $this;
    }

    /**
     * Method to set the value of field description
     *
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Method to set the value of field quantity
     *
     * @param string $quantity
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Method to set the value of field unitOfMeasure
     *
     * @param string $unitOfMeasure
     * @return $this
     */
    public function setUnitOfMeasure($unitOfMeasure)
    {
        $this->unitOfMeasure = $unitOfMeasure;

        return $this;
    }

    /**
     * Method to set the value of field overrideUOMSetRef_ListID
     *
     * @param string $overrideUOMSetRef_ListID
     * @return $this
     */
    public function setOverrideUOMSetRefListID($overrideUOMSetRef_ListID)
    {
        $this->overrideUOMSetRef_ListID = $overrideUOMSetRef_ListID;

        return $this;
    }

    /**
     * Method to set the value of field overrideUOMSetRef_FullName
     *
     * @param string $overrideUOMSetRef_FullName
     * @return $this
     */
    public function setOverrideUOMSetRefFullName($overrideUOMSetRef_FullName)
    {
        $this->overrideUOMSetRef_FullName = $overrideUOMSetRef_FullName;

        return $this;
    }

    /**
     * Method to set the value of field cost
     *
     * @param string $cost
     * @return $this
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Method to set the value of field amount
     *
     * @param double $amount
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Method to set the value of field customerRef_ListID
     *
     * @param string $customerRef_ListID
     * @return $this
     */
    public function setCustomerRefListID($customerRef_ListID)
    {
        $this->customerRef_ListID = $customerRef_ListID;

        return $this;
    }

    /**
     * Method to set the value of field customerRef_FullName
     *
     * @param string $customerRef_FullName
     * @return $this
     */
    public function setCustomerRefFullName($customerRef_FullName)
    {
        $this->customerRef_FullName = $customerRef_FullName;

        return $this;
    }

    /**
     * Method to set the value of field classRef_ListID
     *
     * @param string $classRef_ListID
     * @return $this
     */
    public function setClassRefListID($classRef_ListID)
    {
        $this->classRef_ListID = $classRef_ListID;

        return $this;
    }

    /**
     * Method to set the value of field classRef_FullName
     *
     * @param string $classRef_FullName
     * @return $this
     */
    public function setClassRefFullName($classRef_FullName)
    {
        $this->classRef_FullName = $classRef_FullName;

        return $this;
    }

    /**
     * Method to set the value of field salesTaxCodeRef_ListID
     *
     * @param string $salesTaxCodeRef_ListID
     * @return $this
     */
    public function setSalesTaxCodeRefListID($salesTaxCodeRef_ListID)
    {
        $this->salesTaxCodeRef_ListID = $salesTaxCodeRef_ListID;

        return $this;
    }

    /**
     * Method to set the value of field salesTaxCodeRef_FullName
     *
     * @param string $salesTaxCodeRef_FullName
     * @return $this
     */
    public function setSalesTaxCodeRefFullName($salesTaxCodeRef_FullName)
    {
        $this->salesTaxCodeRef_FullName = $salesTaxCodeRef_FullName;

        return $this;
    }

    /**
     * Method to set the value of field billableStatus
     *
     * @param string $billableStatus
     * @return $this
     */
    public function setBillableStatus($billableStatus)
    {
        $this->billableStatus = $billableStatus;

        return $this;
    }

    /**
     * Method to set the value of field linkedTxnID
     *
     * @param string $linkedTxnID
     * @return $this
     */
    public function setLinkedTxnID($linkedTxnID)
    {
        $this->linkedTxnID = $linkedTxnID;

        return $this;
    }

    /**
     * Method to set the value of field linkedTxnLineID
     *
     * @param string $linkedTxnLineID
     * @return $this
     */
    public function setLinkedTxnLineID($linkedTxnLineID)
    {
        $this->linkedTxnLineID = $linkedTxnLineID;

        return $this;
    }

    /**
     * Method to set the value of field customField1
     *
     * @param string $customField1
     * @return $this
     */
    public function setCustomField1($customField1)
    {
        $this->customField1 = $customField1;

        return $this;
    }

    /**
     * Method to set the value of field customField2
     *
     * @param string $customField2
     * @return $this
     */
    public function setCustomField2($customField2)
    {
        $this->customField2 = $customField2;

        return $this;
    }

    /**
     * Method to set the value of field customField3
     *
     * @param string $customField3
     * @return $this
     */
    public function setCustomField3($customField3)
    {
        $this->customField3 = $customField3;

        return $this;
    }

    /**
     * Method to set the value of field customField4
     *
     * @param string $customField4
     * @return $this
     */
    public function setCustomField4($customField4)
    {
        $this->customField4 = $customField4;

        return $this;
    }

    /**
     * Method to set the value of field customField5
     *
     * @param string $customField5
     * @return $this
     */
    public function setCustomField5($customField5)
    {
        $this->customField5 = $customField5;

        return $this;
    }

    /**
     * Method to set the value of field customField6
     *
     * @param string $customField6
     * @return $this
     */
    public function setCustomField6($customField6)
    {
        $this->customField6 = $customField6;

        return $this;
    }

    /**
     * Method to set the value of field customField7
     *
     * @param string $customField7
     * @return $this
     */
    public function setCustomField7($customField7)
    {
        $this->customField7 = $customField7;

        return $this;
    }

    /**
     * Method to set the value of field customField8
     *
     * @param string $customField8
     * @return $this
     */
    public function setCustomField8($customField8)
    {
        $this->customField8 = $customField8;

        return $this;
    }

    /**
     * Method to set the value of field customField9
     *
     * @param string $customField9
     * @return $this
     */
    public function setCustomField9($customField9)
    {
        $this->customField9 = $customField9;

        return $this;
    }

    /**
     * Method to set the value of field customField10
     *
     * @param string $customField10
     * @return $this
     */
    public function setCustomField10($customField10)
    {
        $this->customField10 = $customField10;

        return $this;
    }

    /**
     * Method to set the value of field customField11
     *
     * @param string $customField11
     * @return $this
     */
    public function setCustomField11($customField11)
    {
        $this->customField11 = $customField11;

        return $this;
    }

    /**
     * Method to set the value of field customField12
     *
     * @param string $customField12
     * @return $this
     */
    public function setCustomField12($customField12)
    {
        $this->customField12 = $customField12;

        return $this;
    }

    /**
     * Method to set the value of field customField13
     *
     * @param string $customField13
     * @return $this
     */
    public function setCustomField13($customField13)
    {
        $this->customField13 = $customField13;

        return $this;
    }

    /**
     * Method to set the value of field customField14
     *
     * @param string $customField14
     * @return $this
     */
    public function setCustomField14($customField14)
    {
        $this->customField14 = $customField14;

        return $this;
    }

    /**
     * Method to set the value of field customField15
     *
     * @param string $customField15
     * @return $this
     */
    public function setCustomField15($customField15)
    {
        $this->customField15 = $customField15;

        return $this;
    }

    /**
     * Method to set the value of field iDKEY
     *
     * @param string $iDKEY
     * @return $this
     */
    public function setIDKEY($iDKEY)
    {
        $this->iDKEY = $iDKEY;

        return $this;
    }

    /**
     * Method to set the value of field groupIDKEY
     *
     * @param string $groupIDKEY
     * @return $this
     */
    public function setGroupIDKEY($groupIDKEY)
    {
        $this->groupIDKEY = $groupIDKEY;

        return $this;
    }

    /**
     * Returns the value of field txnLineID
     *
     * @return string
     */
    public function getTxnLineID()
    {
        return $this->txnLineID;
    }

    /**
     * Returns the value of field itemRef_ListID
     *
     * @return string
     */
    public function getItemRefListID()
    {
        return $this->itemRef_ListID;
    }

    /**
     * Returns the value of field itemRef_FullName
     *
     * @return string
     */
    public function getItemRefFullName()
    {
        return $this->itemRef_FullName;
    }

    /**
     * Returns the value of field inventorySiteRef_ListID
     *
     * @return string
     */
    public function getInventorySiteRefListID()
    {
        return $this->inventorySiteRef_ListID;
    }

    /**
     * Returns the value of field inventorySiteRef_FullName
     *
     * @return string
     */
    public function getInventorySiteRefFullName()
    {
        return $this->inventorySiteRef_FullName;
    }

    /**
     * Returns the value of field inventorySiteLocationRef_ListID
     *
     * @return string
     */
    public function getInventorySiteLocationRefListID()
    {
        return $this->inventorySiteLocationRef_ListID;
    }

    /**
     * Returns the value of field inventorySiteLocationRef_FullName
     *
     * @return string
     */
    public function getInventorySiteLocationRefFullName()
    {
        return $this->inventorySiteLocationRef_FullName;
    }

    /**
     * Returns the value of field serialNumber
     *
     * @return string
     */
    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    /**
     * Returns the value of field lotNumber
     *
     * @return string
     */
    public function getLotNumber()
    {
        return $this->lotNumber;
    }

    /**
     * Returns the value of field description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Returns the value of field quantity
     *
     * @return string
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Returns the value of field unitOfMeasure
     *
     * @return string
     */
    public function getUnitOfMeasure()
    {
        return $this->unitOfMeasure;
    }

    /**
     * Returns the value of field overrideUOMSetRef_ListID
     *
     * @return string
     */
    public function getOverrideUOMSetRefListID()
    {
        return $this->overrideUOMSetRef_ListID;
    }

    /**
     * Returns the value of field overrideUOMSetRef_FullName
     *
     * @return string
     */
    public function getOverrideUOMSetRefFullName()
    {
        return $this->overrideUOMSetRef_FullName;
    }

    /**
     * Returns the value of field cost
     *
     * @return string
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Returns the value of field amount
     *
     * @return double
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Returns the value of field customerRef_ListID
     *
     * @return string
     */
    public function getCustomerRefListID()
    {
        return $this->customerRef_ListID;
    }

    /**
     * Returns the value of field customerRef_FullName
     *
     * @return string
     */
    public function getCustomerRefFullName()
    {
        return $this->customerRef_FullName;
    }

    /**
     * Returns the value of field classRef_ListID
     *
     * @return string
     */
    public function getClassRefListID()
    {
        return $this->classRef_ListID;
    }

    /**
     * Returns the value of field classRef_FullName
     *
     * @return string
     */
    public function getClassRefFullName()
    {
        return $this->classRef_FullName;
    }

    /**
     * Returns the value of field salesTaxCodeRef_ListID
     *
     * @return string
     */
    public function getSalesTaxCodeRefListID()
    {
        return $this->salesTaxCodeRef_ListID;
    }

    /**
     * Returns the value of field salesTaxCodeRef_FullName
     *
     * @return string
     */
    public function getSalesTaxCodeRefFullName()
    {
        return $this->salesTaxCodeRef_FullName;
    }

    /**
     * Returns the value of field billableStatus
     *
     * @return string
     */
    public function getBillableStatus()
    {
        return $this->billableStatus;
    }

    /**
     * Returns the value of field linkedTxnID
     *
     * @return string
     */
    public function getLinkedTxnID()
    {
        return $this->linkedTxnID;
    }

    /**
     * Returns the value of field linkedTxnLineID
     *
     * @return string
     */
    public function getLinkedTxnLineID()
    {
        return $this->linkedTxnLineID;
    }

    /**
     * Returns the value of field customField1
     *
     * @return string
     */
    public function getCustomField1()
    {
        return $this->customField1;
    }

    /**
     * Returns the value of field customField2
     *
     * @return string
     */
    public function getCustomField2()
    {
        return $this->customField2;
    }

    /**
     * Returns the value of field customField3
     *
     * @return string
     */
    public function getCustomField3()
    {
        return $this->customField3;
    }

    /**
     * Returns the value of field customField4
     *
     * @return string
     */
    public function getCustomField4()
    {
        return $this->customField4;
    }

    /**
     * Returns the value of field customField5
     *
     * @return string
     */
    public function getCustomField5()
    {
        return $this->customField5;
    }

    /**
     * Returns the value of field customField6
     *
     * @return string
     */
    public function getCustomField6()
    {
        return $this->customField6;
    }

    /**
     * Returns the value of field customField7
     *
     * @return string
     */
    public function getCustomField7()
    {
        return $this->customField7;
    }

    /**
     * Returns the value of field customField8
     *
     * @return string
     */
    public function getCustomField8()
    {
        return $this->customField8;
    }

    /**
     * Returns the value of field customField9
     *
     * @return string
     */
    public function getCustomField9()
    {
        return $this->customField9;
    }

    /**
     * Returns the value of field customField10
     *
     * @return string
     */
    public function getCustomField10()
    {
        return $this->customField10;
    }

    /**
     * Returns the value of field customField11
     *
     * @return string
     */
    public function getCustomField11()
    {
        return $this->customField11;
    }

    /**
     * Returns the value of field customField12
     *
     * @return string
     */
    public function getCustomField12()
    {
        return $this->customField12;
    }

    /**
     * Returns the value of field customField13
     *
     * @return string
     */
    public function getCustomField13()
    {
        return $this->customField13;
    }

    /**
     * Returns the value of field customField14
     *
     * @return string
     */
    public function getCustomField14()
    {
        return $this->customField14;
    }

    /**
     * Returns the value of field customField15
     *
     * @return string
     */
    public function getCustomField15()
    {
        return $this->customField15;
    }

    /**
     * Returns the value of field iDKEY
     *
     * @return string
     */
    public function getIDKEY()
    {
        return $this->iDKEY;
    }

    /**
     * Returns the value of field groupIDKEY
     *
     * @return string
     */
    public function getGroupIDKEY()
    {
        return $this->groupIDKEY;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("carrillo_dbaurora");
        $this->setSource("txnitemlinedetail");
        $this->belongsTo('iDKEY', 'Vendorcredit', 'TxnID');
        $this->belongsTo('itemRef_ListID', 'Items', 'ListID');
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'txnitemlinedetail';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Txnitemlinedetail[]|Txnitemlinedetail|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Txnitemlinedetail|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
