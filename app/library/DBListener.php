<?php
use Phalcon\Logger\AdapterInterface;
use Phalcon\Logger;
/**
 * Description of dbListener
 *
 * @author jrcsc
 */
class DBListener {
    protected $logger;
    public function __construct(AdapterInterface $logger) {
        $this->logger = $logger;
    }
    public function afterQuery($event, $connection) {
        $this->logger->debug($connection->getSQLStatement());
    }
}
