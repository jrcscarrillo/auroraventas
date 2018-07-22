<?php

class Codetype extends \Phalcon\Mvc\Model {

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $id;

    /**
     *
     * @var string
     * @Column(type="string", length=11, nullable=false)
     */
    protected $tipoCod;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    protected $type;

    /**
     *
     * @var integer
     * @Column(type="integer", length=3, nullable=false)
     */
    protected $codeValue;

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id) {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field tipoCod
     *
     * @param string $tipoCod
     * @return $this
     */
    public function setTipoCod($tipoCod) {
        $this->tipoCod = $tipoCod;

        return $this;
    }

    /**
     * Method to set the value of field type
     *
     * @param string $type
     * @return $this
     */
    public function setType($type) {
        $this->type = $type;

        return $this;
    }

    /**
     * Method to set the value of field codeValue
     *
     * @param integer $codeValue
     * @return $this
     */
    public function setCodeValue($codeValue) {
        $this->codeValue = $codeValue;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Returns the value of field tipoCod
     *
     * @return string
     */
    public function getTipoCod() {
        return $this->tipoCod;
    }

    /**
     * Returns the value of field type
     *
     * @return string
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Returns the value of field codeValue
     *
     * @return integer
     */
    public function getCodeValue() {
        return $this->codeValue;
    }

    /**
     * Initialize method for model.
     */
    public function initialize() {
        $this->setSchema("carrillo_dbaurora");
        $this->setSource("codetype");
        $this->hasMany('id', 'Code', 'typeId', ['alias' => 'Code']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource() {
        return 'codetype';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Codetype[]|Codetype|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Codetype|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

}
