<?php

class Vendor extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Primary
     * @Column(type="string", length=25, nullable=false)
     */
    public $listID;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $timeCreated;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $timeModified;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $editSequence;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $name;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $isActive;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    public $classRef_ListID;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $classRef_FullName;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $companyName;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $salutation;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $firstName;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $middleName;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $lastName;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $jobTitle;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $suffix;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $vendorAddress_Addr1;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $vendorAddress_Addr2;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $vendorAddress_Addr3;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $vendorAddress_Addr4;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $vendorAddress_Addr5;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $vendorAddress_City;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $vendorAddress_State;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $vendorAddress_PostalCode;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $vendorAddress_Country;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $vendorAddress_Note;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $shipAddress_Addr1;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $shipAddress_Addr2;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $shipAddress_Addr3;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $shipAddress_Addr4;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $shipAddress_Addr5;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $shipAddress_City;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $shipAddress_State;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $shipAddress_PostalCode;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $shipAddress_Country;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $shipAddress_Note;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $phone;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $mobile;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $pager;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $altPhone;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $fax;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $email;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $cc;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $contact;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $altContact;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $nameOnCheck;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $notes;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $accountNumber;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    public $vendorTypeRef_ListID;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $vendorTypeRef_FullName;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    public $termsRef_ListID;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $termsRef_FullName;

    /**
     *
     * @var double
     * @Column(type="double", length=15, nullable=false)
     */
    public $creditLimit;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $vendorTaxIdent;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $isVendorEligibleFor1099;

    /**
     *
     * @var double
     * @Column(type="double", length=15, nullable=false)
     */
    public $balance;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    public $currencyRef_ListID;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $currencyRef_FullName;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    public $billingRateRef_ListID;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $billingRateRef_FullName;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    public $salesTaxCodeRef_ListID;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $salesTaxCodeRef_FullName;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $salesTaxCountry;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $isSalesTaxAgency;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    public $salesTaxReturnRef_ListID;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $salesTaxReturnRef_FullName;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $taxRegistrationNumber;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $reportingPeriod;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $isTaxTrackedOnPurchases;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    public $taxOnPurchasesAccountRef_ListID;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $taxOnPurchasesAccountRef_FullName;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $isTaxTrackedOnSales;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    public $taxOnSalesAccountRef_ListID;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $taxOnSalesAccountRef_FullName;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $isTaxOnTax;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    public $prefillAccountRef_ListID;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $prefillAccountRef_FullName;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    public $customField1;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    public $customField2;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    public $customField3;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    public $customField4;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    public $customField5;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    public $customField6;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    public $customField7;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    public $customField8;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    public $customField9;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    public $customField10;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    public $customField11;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    public $customField12;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    public $customField13;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    public $customField14;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    public $customField15;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=true)
     */
    public $status;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("carrillo_dbaurora");
        $this->setSource("vendor");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'vendor';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Vendor[]|Vendor|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Vendor|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
