<?php

class QuickbooksQueue extends \Phalcon\Mvc\Model {

// **********************
// ATTRIBUTE DECLARATION
// **********************


    protected $quickbooks_queue_id;
    protected $quickbooks_ticket_id;
    protected $qb_username;
    protected $qb_action;
    protected $ident;
    protected $extra;
    protected $qbxml;
    protected $priority;
    protected $qb_status;
    protected $msg;
    protected $enqueue_datetime;
    protected $dequeue_datetime;

// **********************
// GETTER METHODS
// **********************


    function getquickbooksqueueid() {
        return $this->quickbooks_queue_id;
    }

    function getquickbooksticketid() {
        return $this->quickbooks_ticket_id;
    }

    function getqbusername() {
        return $this->qb_username;
    }

    function getqbaction() {
        return $this->qb_action;
    }

    function getident() {
        return $this->ident;
    }

    function getextra() {
        return $this->extra;
    }

    function getqbxml() {
        return $this->qbxml;
    }

    function getpriority() {
        return $this->priority;
    }

    function getqbstatus() {
        return $this->qb_status;
    }

    function getmsg() {
        return $this->msg;
    }

    function getenqueuedatetime() {
        return $this->enqueue_datetime;
    }

    function getdequeuedatetime() {
        return $this->dequeuedatetime;
    }

// **********************
// SETTER METHODS
// **********************


    function setquickbooksqueueid($val) {
        $this->quickbooks_queue_id = $val;
    }

    function setquickbooksticketid($val) {
        $this->quickbooks_ticket_id = $val;
    }

    function setqbusername($val) {
        $this->qb_username = $val;
    }

    function setqbaction($val) {
        $this->qb_action = $val;
    }

    function setident($val) {
        $this->ident = $val;
    }

    function setextra($val) {
        $this->extra = $val;
    }

    function setqbxml($val) {
        $this->qbxml = $val;
    }

    function setpriority($val) {
        $this->priority = $val;
    }

    function setqbstatus($val) {
        $this->qb_status = $val;
    }

    function setmsg($val) {
        $this->msg = $val;
    }

    function setenqueuedatetime($val) {
        $this->enqueue_datetime = $val;
    }

    function setdequeuedatetime($val) {
        $this->dequeue_datetime = $val;
    }

    public function initialize() {
        $this->setSchema("carrillo_dbaurora");
        $this->setSource("quickbooks_queue");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource() {
        return 'quickbooks_queue';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return QuickbooksQueue[]|QuickbooksQueue|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return QuickbooksQueue|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

}
