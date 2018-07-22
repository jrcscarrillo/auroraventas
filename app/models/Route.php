<?php

class Route extends \Phalcon\Mvc\Model {

// **********************
// ATTRIBUTE DECLARATION
// **********************


    protected $listID;
    protected $timeCreated;
    protected $timeModified;
    protected $editSequence;
    protected $name;
    protected $isActive;
    protected $description;
    protected $address;
    protected $phone;
    protected $email;
    protected $tipoId;
    protected $numeroId;
    protected $customField1;
    protected $customField2;
    protected $customField3;
    protected $status;

// **********************
// GETTER METHODS
// **********************


    function getlistID() {
        return $this->listID;
    }

    function gettimeCreated() {
        return $this->timeCreated;
    }

    function gettimeModified() {
        return $this->timeModified;
    }

    function geteditSequence() {
        return $this->editSequence;
    }

    function getname() {
        return $this->name;
    }

    function getisActive() {
        return $this->isActive;
    }

    function getdescription() {
        return $this->description;
    }

    function getaddress() {
        return $this->address;
    }

    function getphone() {
        return $this->phone;
    }

    function getemail() {
        return $this->email;
    }

    function gettipoId() {
        return $this->tipoId;
    }

    function getnumeroId() {
        return $this->numeroId;
    }

    function getcustomField1() {
        return $this->customField1;
    }

    function getcustomField2() {
        return $this->customField2;
    }

    function getcustomField3() {
        return $this->customField3;
    }

    function getstatus() {
        return $this->status;
    }

// **********************
// SETTER METHODS
// **********************


    function setlistID($val) {
        $this->listID = $val;
    }

    function settimeCreated($val) {
        $this->timeCreated = $val;
    }

    function settimeModified($val) {
        $this->timeModified = $val;
    }

    function seteditSequence($val) {
        $this->editSequence = $val;
    }

    function setname($val) {
        $this->name = $val;
    }

    function setisActive($val) {
        $this->isActive = $val;
    }

    function setdescription($val) {
        $this->description = $val;
    }

    function setaddress($val) {
        $this->address = $val;
    }

    function setphone($val) {
        $this->phone = $val;
    }

    function setemail($val) {
        $this->email = $val;
    }

    function settipoId($val) {
        $this->tipoId = $val;
    }

    function setnumeroId($val) {
        $this->numeroId = $val;
    }

    function setcustomField1($val) {
        $this->customField1 = $val;
    }

    function setcustomField2($val) {
        $this->customField2 = $val;
    }

    function setcustomField3($val) {
        $this->customField3 = $val;
    }

    function setstatus($val) {
        $this->status = $val;
    }

    public function initialize() {
        $this->setSchema("carrillo_dbaurora");
        $this->setSource("route");

        $this->setup(
           array('notNullValidations' => false)
        );
    }

    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource() {
        return 'route';
    }

}
