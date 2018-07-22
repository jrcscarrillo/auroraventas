<?php

class Code extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $developerId;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $typeId;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $description;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    public $file;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    public $site;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $dateCreated;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $dateModified;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("carrillo_dbaurora");
        $this->hasMany('id', 'Yourcode', 'codeId', ['alias' => 'Yourcode']);
        $this->belongsTo('developerId', 'Developers', 'id', ['alias' => 'Developers']);
        $this->belongsTo('typeId', 'Codetype', 'id', ['alias' => 'Codetype']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'code';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Code[]|Code
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Code
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
