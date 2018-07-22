<?php

class Usuarios extends \Phalcon\Mvc\Model
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
    public $userName;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $fullName;

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
     * @Column(type="string", length=25, nullable=false)
     */
    public $parentRef_ListID;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $parentRef_FullName;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $sublevel;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $companyName;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    public $salutation;

    /**
     *
     * @var string
     * @Column(type="string", length=55, nullable=false)
     */
    public $firstName;

    /**
     *
     * @var string
     * @Column(type="string", length=55, nullable=false)
     */
    public $middleName;

    /**
     *
     * @var string
     * @Column(type="string", length=55, nullable=false)
     */
    public $lastName;

    /**
     *
     * @var string
     * @Column(type="string", length=128, nullable=false)
     */
    public $password;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $billAddress_Addr1;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $billAddress_Addr2;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $billAddress_Addr3;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $billAddress_Addr4;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $billAddress_Addr5;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $billAddress_City;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    public $billAddress_State;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    public $billAddress_PostalCode;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    public $billAddress_Country;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $billAddress_Note;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $printAs;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    public $phone;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    public $mobile;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    public $pager;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    public $altPhone;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    public $fax;

    /**
     *
     * @var string
     * @Column(type="string", length=55, nullable=false)
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
     * @Column(type="string", length=25, nullable=false)
     */
    public $customerTypeRef_ListID;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $customerTypeRef_FullName;

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
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    public $salesRepRef_ListID;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $salesRepRef_FullName;

    /**
     *
     * @var double
     * @Column(type="double", length=15, nullable=false)
     */
    public $balance;

    /**
     *
     * @var double
     * @Column(type="double", length=15, nullable=false)
     */
    public $totalBalance;

    /**
     *
     * @var double
     * @Column(type="double", length=15, nullable=false)
     */
    public $creditLimit;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=false)
     */
    public $tipoID;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    public $numeroID;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $notes;

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
        $this->setSource("usuarios");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'usuarios';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Usuarios[]|Usuarios|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Usuarios|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
