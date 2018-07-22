<?php

class Yourcode extends \Phalcon\Mvc\Model
{
    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $userId;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $codeId;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $dateAdded;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    public $obs;

    /**
     *
     * @var string
     * @Column(type="string", length=5, nullable=false)
     */
    public $status;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("carrillo_dbaurora");
        $this->belongsTo('userId', 'Users', 'id', ['alias' => 'Users']);
        $this->belongsTo('codeId', 'Code', 'id', ['alias' => 'Code']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'yourcode';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Yourcode[]|Yourcode
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Yourcode
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
