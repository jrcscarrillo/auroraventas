<?php

class Contribuyente extends \Phalcon\Mvc\Model
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
     * @Column(type="integer", length=13, nullable=false)
     */
    public $ruc;

    /**
     *
     * @var string
     * @Column(type="string", length=300, nullable=false)
     */
    public $razon;

    /**
     *
     * @var string
     * @Column(type="string", length=300, nullable=false)
     */
    public $nombreComercial;

    /**
     *
     * @var string
     * @Column(type="string", length=300, nullable=false)
     */
    public $dirMatriz;

    /**
     *
     * @var string
     * @Column(type="string", length=300, nullable=false)
     */
    public $dirEmisor;

    /**
     *
     * @var integer
     * @Column(type="integer", length=3, nullable=false)
     */
    public $codEmisor;

    /**
     *
     * @var integer
     * @Column(type="integer", length=3, nullable=false)
     */
    public $punto;

    /**
     *
     * @var integer
     * @Column(type="integer", length=5, nullable=false)
     */
    public $resolucion;

    /**
     *
     * @var string
     * @Column(type="string", length=2, nullable=false)
     */
    public $llevaContabilidad;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $logo;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $ambiente;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $emision;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $contingencia;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("carrillo_dbaurora");
        $this->setSource("contribuyente");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'contribuyente';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Contribuyente[]|Contribuyente|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Contribuyente|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
