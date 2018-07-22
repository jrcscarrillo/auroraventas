<?php

class Appliedtosync extends \Phalcon\Mvc\Model
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
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $datecreated;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    public $user;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $billDesde;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $billHasta;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $invoiceDesde;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $invoiceHasta;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $billCreditDesde;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $billCreditHasta;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $creditMemoDesde;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $creditMemoHasta;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $productionDesde;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $productionHasta;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $retencionDesde;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $retencionHasta;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $otrosDesde;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $otrosHasta;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("carrillo_dbaurora");
        $this->setSource("appliedtosync");
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Appliedtosync[]|Appliedtosync|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Appliedtosync|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'appliedtosync';
    }

}
