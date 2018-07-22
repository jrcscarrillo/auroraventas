<?php

class Driver extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Primary
     * @Column(type="string", length=25, nullable=false)
     */
    protected $listID;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $timeCreated;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $timeModified;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $editSequence;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $name;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    protected $isActive;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $description;

    /**
     *
     * @var string
     * @Column(type="string", length=75, nullable=false)
     */
    protected $address;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=false)
     */
    protected $phone;

    /**
     *
     * @var string
     * @Column(type="string", length=125, nullable=false)
     */
    protected $email;

    /**
     *
     * @var string
     * @Column(type="string", length=2, nullable=false)
     */
    protected $tipoId;

    /**
     *
     * @var string
     * @Column(type="string", length=13, nullable=false)
     */
    protected $numeroId;

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
     * @Column(type="string", length=10, nullable=false)
     */
    protected $status;

    /**
     * Method to set the value of field listID
     *
     * @param string $listID
     * @return $this
     */
    public function setListID($listID)
    {
        $this->listID = $listID;

        return $this;
    }

    /**
     * Method to set the value of field timeCreated
     *
     * @param string $timeCreated
     * @return $this
     */
    public function setTimeCreated($timeCreated)
    {
        $this->timeCreated = $timeCreated;

        return $this;
    }

    /**
     * Method to set the value of field timeModified
     *
     * @param string $timeModified
     * @return $this
     */
    public function setTimeModified($timeModified)
    {
        $this->timeModified = $timeModified;

        return $this;
    }

    /**
     * Method to set the value of field editSequence
     *
     * @param integer $editSequence
     * @return $this
     */
    public function setEditSequence($editSequence)
    {
        $this->editSequence = $editSequence;

        return $this;
    }

    /**
     * Method to set the value of field name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Method to set the value of field isActive
     *
     * @param integer $isActive
     * @return $this
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

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
     * Method to set the value of field address
     *
     * @param string $address
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Method to set the value of field phone
     *
     * @param string $phone
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Method to set the value of field email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Method to set the value of field tipoId
     *
     * @param string $tipoId
     * @return $this
     */
    public function setTipoId($tipoId)
    {
        $this->tipoId = $tipoId;

        return $this;
    }

    /**
     * Method to set the value of field numeroId
     *
     * @param string $numeroId
     * @return $this
     */
    public function setNumeroId($numeroId)
    {
        $this->numeroId = $numeroId;

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
     * Method to set the value of field status
     *
     * @param string $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Returns the value of field listID
     *
     * @return string
     */
    public function getListID()
    {
        return $this->listID;
    }

    /**
     * Returns the value of field timeCreated
     *
     * @return string
     */
    public function getTimeCreated()
    {
        return $this->timeCreated;
    }

    /**
     * Returns the value of field timeModified
     *
     * @return string
     */
    public function getTimeModified()
    {
        return $this->timeModified;
    }

    /**
     * Returns the value of field editSequence
     *
     * @return integer
     */
    public function getEditSequence()
    {
        return $this->editSequence;
    }

    /**
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field isActive
     *
     * @return integer
     */
    public function getIsActive()
    {
        return $this->isActive;
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
     * Returns the value of field address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Returns the value of field phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Returns the value of field email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Returns the value of field tipoId
     *
     * @return string
     */
    public function getTipoId()
    {
        return $this->tipoId;
    }

    /**
     * Returns the value of field numeroId
     *
     * @return string
     */
    public function getNumeroId()
    {
        return $this->numeroId;
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
     * Returns the value of field status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("carrillo_dbaurora");
        $this->setSource("driver");
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Driver[]|Driver|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Driver|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'driver';
    }

}
