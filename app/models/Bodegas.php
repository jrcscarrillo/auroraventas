<?php

class Bodegas extends \Phalcon\Mvc\Model
{

protected $ListID;   
protected $TimeCreated;   
protected $TimeModified;   
protected $EditSequence;   
protected $Name;   
protected $FullName;   
protected $IsActive;   
protected $ParentRef_ListID;   
protected $ParentRef_FullName;   
protected $Sublevel;   
protected $Status;   
protected $Estado;   


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

function getFullName()
{
return $this->FullName;
}

function getIsActive()
{
return $this->IsActive;
}

function getParentRefListID()
{
return $this->ParentRef_ListID;
}

function getParentRefFullName()
{
return $this->ParentRef_FullName;
}

function getSublevel()
{
return $this->Sublevel;
}

function getStatus()
{
return $this->Status;
}

function getEstado()
{
return $this->Estado;
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

function setFullName($val)
{
$this->FullName =  $val;
}

function setIsActive($val)
{
$this->IsActive =  $val;
}

function setParentRefListID($val)
{
$this->ParentRefListID =  $val;
}

function setParentRefFullName($val)
{
$this->ParentRef_FullName =  $val;
}

function setSublevel($val)
{
$this->Sublevel =  $val;
}

function setStatus($val)
{
$this->Status =  $val;
}

function setEstado($val)
{
$this->Estado =  $val;
}

    public function initialize()
    {
        $this->setSchema("carrillo_dbaurora");
        $this->setSource("bodegas");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'bodegas';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Bodegas[]|Bodegas|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Bodegas|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
