<?php

class Items extends \Phalcon\Mvc\Model
{

// **********************
// ATTRIBUTE DECLARATION
// **********************


public $id;   // (normal Attribute)
public $name;   // (normal Attribute)
public $fullname;   // (normal Attribute)
public $description;   // (normal Attribute)
public $quickbooks_listid;   // (normal Attribute)
public $quickbooks_editsequence;   // (normal Attribute)
public $quickbooks_errnum;   // (normal Attribute)
public $quickbooks_errmsg;   // (normal Attribute)
public $is_active;   // (normal Attribute)
public $parent_reference_listid;   // (normal Attribute)
public $parent_reference_full_name;   // (normal Attribute)
public $sublevel;   // (normal Attribute)
public $unit_of_measure_set_ref_listid;   // (normal Attribute)
public $unit_of_measure_set_ref_fullname;   // (normal Attribute)
public $type;   // (normal Attribute)
public $sales_tax_code_ref_listid;   // (normal Attribute)
public $sales_tax_code_ref_fullname;   // (normal Attribute)
public $sales_desc;   // (normal Attribute)
public $sales_price;   // (normal Attribute)
public $income_account_ref_listid;   // (normal Attribute)
public $income_account_ref_fullname;   // (normal Attribute)
public $purchase_cost;   // (normal Attribute)
public $COGS_account_ref_listid;   // (normal Attribute)
public $COGS_account_ref_fullname;   // (normal Attribute)
public $assests_account_ref_listid;   // (normal Attribute)
public $assests_acc;   // (normal Attribute)
public $purchase_desc;   // (normal Attribute)
public $QuantityOnHand;   // (normal Attribute)
public $QuantityOnOrder;   // (normal Attribute)
public $QuantityOnSalesOrder;   // (normal Attribute)
public $AverageCost;   // (normal Attribute)
    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("carrillo_dbaurora");
        $this->setSource("items");
        $this->hasMany(
           'quickbooks_listid',
           'invoicelinedetail',
           'ItemRef_ListID'
           );
        
        $this->hasMany(
           'quickbooks_listid',
           'lotestrx',
           'ItemRef_ListID'
           );
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'items';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Items[]|Items|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Items|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
