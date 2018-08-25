<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Db\Adapter\Pdo\Mysql as db;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\Printer;

class ReportepedidosController extends ControllerBase {

    private $tipo;
    private $inidate;

    public function initialize() {
        $this->tag->setTitle('Reportes');
        parent::initialize();
    }

    public function indexAction() {
        $form = new ReporteindexForm;
        $this->view->form = $form;
    }

    public function searchAction() {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Bonificadetalle', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "TxnLineID";

        $bonificadetalle = Bonificadetalle::find($parameters);
        if (count($bonificadetalle) == 0) {
            $this->flash->notice("The search did not find any bonificadetalle");

            $this->dispatcher->forward([
               "controller" => "bonificadetalle",
               "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
           'data' => $bonificadetalle,
           'limit' => 10,
           'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    public function imprimirAction() {
        $auth = $this->session->get('auth');
        if ($auth['tipo'] <> 'ADMINISTRADOR') {
            $this->flash->notice('Este reporte esta protegido por el momento ');
            $this->dispatcher->forward([
               'controller' => 'index',
               'action' => 'index'
            ]);
        }
        $this->tipo = $this->request->getPost('tipo');
        $this->inidate = $this->request->getPost('iniDate');
        $this->session->set('RPEDIDOS', array(
           'iniDate' => $this->request->getPost('iniDate'),
           'proceso' => $this->request->getPost('tipo')
        ));
//        var_dump($_SESSION);
        if ($this->tipo === "1") {
            $this->dispatcher->forward([
               'action' => 'totalmensual',
            ]);
        } elseif ($this->tipo === "2") {
            $this->dispatcher->forward([
               'action' => 'totalrep',
            ]);
        } elseif ($this->tipo === "3") {
            $this->dispatcher->forward([
               'action' => 'totalitem',
            ]);
        } elseif ($this->tipo === "4") {
            $this->dispatcher->forward([
               'action' => 'repmensual',
            ]);
        } elseif ($this->tipo === "5") {
            $this->dispatcher->forward([
               'action' => 'itemmensual',
            ]);
        }
    }

    public function totalmensualAction() {
        $rpedidos = $this->session->get('iniDate');
        $year = date('Y', strtotime($rpedidos['iniDate']));
        $db = array('host' => 'localhost',
           'username' => 'carrillo_db',
           'password' => 'AnyaCarrill0',
           'dbname' => 'carrillo_dbaurora');
        $phql = 'SELECT YEAR(TxnDate) AS ANIO, MONTH(TxnDate) AS MES, '
           . 'SalesRepRef_FullName AS REPRESENTANTE, COUNT(*), SUM(Subtotal) AS VENTAS, '
           . 'SUM(SalesTaxTotal) AS IVA FROM pedidos GROUP BY YEAR(TxnDate), MONTH(TxnDate), SalesRepRef_FullName';
        $stmt = new db($db);
        $result = $stmt->fetchAll($phql);
        $this->view->result = $result;
    }

    public function totalrepAction() {

        $connector = new NetworkPrintConnector("192.168.1.3");
        $printer = new Printer($connector);
        $printer->text("Hello World!\n");
        $printer->cut();
        $printer->close();
        $this->flash->notice('Se imprimio algo?');
    }

}
