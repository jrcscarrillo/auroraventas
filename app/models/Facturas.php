<?php

class Facturas extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Primary
     * @Column(type="string", length=25, nullable=false)
     */
    public $txnID;

    /**
     *
     * @var string
     * @Column(type="string", length=1, nullable=false)
     */
    public $ambiente;

    /**
     *
     * @var string
     * @Column(type="string", length=1, nullable=false)
     */
    public $tipoEmision;

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
    public $comercial;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $ruc;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    public $claveAcceso;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    public $estab;

    /**
     *
     * @var string
     * @Column(type="string", length=2, nullable=false)
     */
    public $codDoc;

    /**
     *
     * @var string
     * @Column(type="string", length=3, nullable=false)
     */
    public $punto;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $sq;

    /**
     *
     * @var string
     * @Column(type="string", length=300, nullable=false)
     */
    public $dirMatriz;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $fechaEmision;

    /**
     *
     * @var string
     * @Column(type="string", length=300, nullable=false)
     */
    public $dirEstab;

    /**
     *
     * @var string
     * @Column(type="string", length=2, nullable=false)
     */
    public $contEsp;

    /**
     *
     * @var string
     * @Column(type="string", length=2, nullable=false)
     */
    public $llevaContab;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $tipoId;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $nroId;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    public $guia;

    /**
     *
     * @var string
     * @Column(type="string", length=300, nullable=false)
     */
    public $razonComprador;

    /**
     *
     * @var double
     * @Column(type="double", length=11, nullable=false)
     */
    public $totalImpto;

    /**
     *
     * @var double
     * @Column(type="double", length=11, nullable=false)
     */
    public $propina;

    /**
     *
     * @var double
     * @Column(type="double", length=11, nullable=false)
     */
    public $importeTotal;

    /**
     *
     * @var string
     * @Column(type="string", length=1, nullable=false)
     */
    public $moneda;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $fechaAutoriza;

    /**
     *
     * @var string
     * @Column(type="string", length=51, nullable=false)
     */
    public $numeroAutoriza;

    /**
     *
     * @var string
     * @Column(type="string", length=51, nullable=false)
     */
    public $codMsg;

    /**
     *
     * @var string
     * @Column(type="string", length=51, nullable=false)
     */
    public $mensaje;

    /**
     *
     * @var string
     * @Column(type="string", length=51, nullable=false)
     */
    public $msgAdicional;

    /**
     *
     * @var string
     * @Column(type="string", length=51, nullable=false)
     */
    public $tipoError;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $idComprobantes;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("carrillo_dbaurora");
        $this->setSource("facturas");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'facturas';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Facturas[]|Facturas|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Facturas|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
