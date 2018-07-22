<?php

class Pricelevelperitemdetail extends \Phalcon\Mvc\Model
{

// **********************
// ATTRIBUTE DECLARATION
// **********************


protected $ItemRef_ListID;   
protected $ItemRef_FullName;   
protected $CustomPrice;   
protected $CustomPricePercent;   
protected $CustomField1;   
protected $CustomField2;   
protected $CustomField3;   
protected $CustomField4;   
protected $CustomField5;   
protected $CustomField6;   
protected $CustomField7;   
protected $CustomField8;   
protected $CustomField9;   
protected $CustomField10;   
protected $CustomField11;   
protected $CustomField12;   
protected $CustomField13;   
protected $CustomField14;   
protected $CustomField15;   
protected $IDKEY;   
protected $GroupIDKEY;   

// **********************
// GETTER METHODS
// **********************


function getItemRefListID()
{
return $this->ItemRef_ListID;
}

function getItemRefFullName()
{
return $this->ItemRef_FullName;
}

function getCustomPrice()
{
return $this->CustomPrice;
}

function getCustomPricePercent()
{
return $this->CustomPricePercent;
}

function getCustomField1()
{
return $this->CustomField1;
}

function getCustomField2()
{
return $this->CustomField2;
}

function getCustomField3()
{
return $this->CustomField3;
}

function getCustomField4()
{
return $this->CustomField4;
}

function getCustomField5()
{
return $this->CustomField5;
}

function getCustomField6()
{
return $this->CustomField6;
}

function getCustomField7()
{
return $this->CustomField7;
}

function getCustomField8()
{
return $this->CustomField8;
}

function getCustomField9()
{
return $this->CustomField9;
}

function getCustomField10()
{
return $this->CustomField10;
}

function getCustomField11()
{
return $this->CustomField11;
}

function getCustomField12()
{
return $this->CustomField12;
}

function getCustomField13()
{
return $this->CustomField13;
}

function getCustomField14()
{
return $this->CustomField14;
}

function getCustomField15()
{
return $this->CustomField15;
}

function getIDKEY()
{
return $this->IDKEY;
}

function getGroupIDKEY()
{
return $this->GroupIDKEY;
}

// **********************
// SETTER METHODS
// **********************


function setItemRefListID($val)
{
$this->ItemRef_ListID =  $val;
}

function setItemRefFullName($val)
{
$this->ItemRef_FullName =  $val;
}

function setCustomPrice($val)
{
$this->CustomPrice =  $val;
}

function setCustomPricePercent($val)
{
$this->CustomPricePercent =  $val;
}

function setCustomField1($val)
{
$this->CustomField1 =  $val;
}

function setCustomField2($val)
{
$this->CustomField2 =  $val;
}

function setCustomField3($val)
{
$this->CustomField3 =  $val;
}

function setCustomField4($val)
{
$this->CustomField4 =  $val;
}

function setCustomField5($val)
{
$this->CustomField5 =  $val;
}

function setCustomField6($val)
{
$this->CustomField6 =  $val;
}

function setCustomField7($val)
{
$this->CustomField7 =  $val;
}

function setCustomField8($val)
{
$this->CustomField8 =  $val;
}

function setCustomField9($val)
{
$this->CustomField9 =  $val;
}

function setCustomField10($val)
{
$this->CustomField10 =  $val;
}

function setCustomField11($val)
{
$this->CustomField11 =  $val;
}

function setCustomField12($val)
{
$this->CustomField12 =  $val;
}

function setCustomField13($val)
{
$this->CustomField13 =  $val;
}

function setCustomField14($val)
{
$this->CustomField14 =  $val;
}

function setCustomField15($val)
{
$this->CustomField15 =  $val;
}

function setIDKEY($val)
{
$this->IDKEY =  $val;
}

function setGroupIDKEY($val)
{
$this->GroupIDKEY =  $val;
}
    public function initialize()
    {
        $this->setSchema("carrillo_dbaurora");
        $this->setSource("pricelevelperitemdetail");
        $this->belongsTo('IDKEY', 'Pricelevel', 'ListID', ['alias' => 'Pricelevel']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'pricelevelperitemdetail';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Pricelevelperitemdetail[]|Pricelevelperitemdetail|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Pricelevelperitemdetail|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
