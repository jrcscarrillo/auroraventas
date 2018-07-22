<?php

class Employee extends \Phalcon\Mvc\Model
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
    public $suffix;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $jobTitle;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    public $supervisorRef_ListID;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $supervisorRef_FullName;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $department;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $description;

    /**
     *
     * @var double
     * @Column(type="double", length=15, nullable=false)
     */
    public $targetBonus;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $employeeAddress_Addr1;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $employeeAddress_Addr2;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $employeeAddress_Addr3;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $employeeAddress_Addr4;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $employeeAddress_City;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $employeeAddress_State;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $employeeAddress_PostalCode;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $employeeAddress_Country;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $printAs;

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
    public $pagerPIN;

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
    public $sSN;

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
    public $emergencyContactPrimaryName;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $emergencyContactPrimaryValue;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $emergencyContactPrimaryRelation;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $emergencyContactSecondaryName;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $emergencyContactSecondaryValue;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $emergencyContactSecondaryRelation;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $employeeType;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $gender;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $partOrFullTime;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $exempt;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $keyEmployee;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $hiredDate;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $originalHireDate;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $adjustedServiceDate;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $releasedDate;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $birthDate;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $uSCitizen;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $ethnicity;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $disabled;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $disabilityDesc;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $onFile;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $workAuthExpireDate;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $uSVeteran;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $militaryStatus;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $accountNumber;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $notes;

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
        $this->setSource("employee");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'employee';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Employee[]|Employee|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Employee|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
