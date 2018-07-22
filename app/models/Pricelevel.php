<?php

class Pricelevel extends \Phalcon\Mvc\Model
{
// **********************
// ATTRIBUTE DECLARATION
// **********************


protected $ListID;   
protected $TimeCreated;   
protected $TimeModified;   
protected $EditSequence;   
protected $Name;   
protected $IsActive;   
protected $PriceLevelType;   
protected $PriceLevelFixedPercentage;   
protected $CurrencyRef_ListID;   
protected $CurrencyRef_FullName;   
protected $Status;   

// **********************
// GETTER METHODS
// **********************


function getListID()
{
return $this->ListID;
}

function getTimeCreated()
{
return $this->TimeCreated;
}

function getTimeModified()
{
return $this->TimeModified;
}

function getEditSequence()
{
return $this->EditSequence;
}

function getName()
{
return $this->Name;
}

function getIsActive()
{
return $this->IsActive;
}

function getPriceLevelType()
{
return $this->PriceLevelType;
}

function getPriceLevelFixedPercentage()
{
return $this->PriceLevelFixedPercentage;
}

function getCurrencyRefListID()
{
return $this->CurrencyRef_ListID;
}

function getCurrencyRefFullName()
{
return $this->CurrencyRef_FullName;
}

function getStatus()
{
return $this->Status;
}

// **********************
// SETTER METHODS
// **********************


function setListID($val)
{
$this->ListID =  $val;
}

function setTimeCreated($val)
{
$this->TimeCreated =  $val;
}

function setTimeModified($val)
{
$this->TimeModified =  $val;
}

function setEditSequence($val)
{
$this->EditSequence =  $val;
}

function setName($val)
{
$this->Name =  $val;
}

function setIsActive($val)
{
$this->IsActive =  $val;
}

function setPriceLevelType($val)
{
$this->PriceLevelType =  $val;
}

function setPriceLevelFixedPercentage($val)
{
$this->PriceLevelFixedPercentage =  $val;
}

function setCurrencyRefListID($val)
{
$this->CurrencyRef_ListID =  $val;
}

function setCurrencyRefFullName($val)
{
$this->CurrencyRef_FullName =  $val;
}

function setStatus($val)
{
$this->Status =  $val;
}

public function initialize()
    {
        $this->setSchema("carrillo_dbaurora");
        $this->setSource("pricelevel");
        $this->hasMany('ListID', 'Pricelevelperitemdetail', 'IDKEY', ['alias' => 'Pricelevelperitemdetail']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'pricelevel';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Pricelevel[]|Pricelevel|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Pricelevel|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
