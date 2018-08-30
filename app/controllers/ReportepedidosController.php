<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Db\Adapter\Pdo\Mysql as db;
use Phalcon\Paginator\Adapter\Model as Paginator;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as lector;

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
           'finDate' => $this->request->getPost('finDate'),
           'proceso' => $this->request->getPost('tipo')
        ));
//        var_dump($_SESSION);
        if ($this->tipo === "1") {
            $this->dispatcher->forward([
               'controller' => "reportepedidos",
               'action' => 'totalmensual',
            ]);
        } elseif ($this->tipo === "2") {
            $this->dispatcher->forward([
               'controller' => "reportepedidos",
               'action' => 'totalrep',
            ]);
        } elseif ($this->tipo === "3") {
            $this->dispatcher->forward([
               'controller' => "reportepedidos",
               'action' => 'totalitem',
            ]);
        } elseif ($this->tipo === "4") {
            $this->dispatcher->forward([
               'controller' => "reportepedidos",
               'action' => 'repmensual',
            ]);
        } elseif ($this->tipo === "5") {
            $this->dispatcher->forward([
               'controller' => "reportepedidos",
               'action' => 'itemmensual',
            ]);
        }
    }

    public function totalmensualAction() {
        $posteado = $this->session->get('RPEDIDOS');
        $ini = date('Y-m-d', strtotime($posteado['iniDate']));
        $fin = date('Y-m-d', strtotime($posteado['finDate']));
        $autorizado = 'AUTORIZADO';
        $db = array('host' => 'localhost',
           'username' => 'carrillo_db',
           'password' => 'AnyaCarrill0',
           'dbname' => 'carrillo_dbaurora');
        $phql = 'SELECT YEAR(TxnDate) AS ANIO, MONTH(TxnDate) AS MES, '
           . 'SalesRepRef_FullName AS REPRESENTANTE, COUNT(*), SUM(Subtotal) AS VENTAS, '
           . 'SUM(SalesTaxTotal) AS IVA FROM pedidos GROUP BY YEAR(TxnDate), MONTH(TxnDate), SalesRepRef_FullName';
        $sql = "SELECT I.CustomerRef_FullName AS cliente, I.RefNumber AS factura, "
           . "I.TxnDate AS fecha, I.Subtotal AS bruto, I.SalesTaxTotal AS iva, C.AccountNUmber AS ruc "
           . "FROM invoice AS I INNER JOIN customer AS C ON C.ListID = I.CustomerRef_ListID WHERE I.CustomField15 = '". $autorizado . "' AND I.TxnDate >= '" . $ini . "' AND I.TxnDate <= '" . $fin . "' ORDER BY I.RefNumber ";
        $stmt = new db($db);
        $result = $stmt->fetchAll($phql);
        $facturas = $stmt->fetchAll($sql);
        $this->view->result = $result;
        $lector = new lector();
        $temp = $lector->load('template.xlsx');
        $sheet = $temp->setActiveSheetIndexByName('numerico');
        $sheet->setCellValue('C4', 'Desde : ' . $ini . ' Hasta : ' . $fin);
        $fila = 7;
        $total_E = 0;
        $total_F = 0;
        $total_G = 0;
        $total_H = 0;
        foreach ($facturas as $factura) {
            $fila++;
            $sheet->setCellValue('A' . $fila, $factura['factura']);
            $sheet->setCellValue('B' . $fila, date('d-M-Y', strtotime($factura['fecha'])));
            $sheet->setCellValue('C' . $fila, " " . $factura['ruc']);
            $sheet->setCellValue('D' . $fila, $factura['cliente']);
            $sheet->setCellValue('G' . $fila, $factura['iva']);
            $total_G += $factura['iva'];
            if ($factura['iva'] > 0) {
                $sheet->setCellValue('E' . $fila, $factura['bruto']);
                $total_E += $factura['bruto'];
            } else {
                $sheet->setCellValue('F' . $fila, $factura['bruto']);
                $total_F += $factura['bruto'];
            }
            $sheet->setCellValue('H' . $fila, $factura['iva'] + $factura['bruto']);
            $total_H += ($factura['iva'] + $factura['bruto']);
        }

        $fila += 2;
        $sheet->setCellValue('D' . $fila, 'Totales => ');
        $sheet->setCellValue('E' . $fila, $total_E);
        $sheet->setCellValue('F' . $fila, $total_F);
        $sheet->setCellValue('G' . $fila, $total_G);
        $sheet->setCellValue('H' . $fila, $total_H);

        $stmt = null;
        $sql = "SELECT I.CustomerRef_FullName AS cliente, I.RefNumber AS factura, I.SalesRepRef_FullName AS rep, "
           . "I.TxnDate AS fecha, I.Subtotal AS bruto, I.SalesTaxTotal AS iva, C.AccountNUmber AS ruc "
           . "FROM invoice AS I INNER JOIN customer AS C ON C.ListID = I.CustomerRef_ListID WHERE I.CustomField15 = '". $autorizado . "' AND I.TxnDate >= '" . $ini . "' AND I.TxnDate <= '" . $fin . "' ORDER BY I.SalesRepRef_FullName, I.RefNumber ";
        $stmt = new db($db);
        $facturas = $stmt->fetchAll($sql);

        $sheet = $temp->setActiveSheetIndexByName('vendedor');
        $sheet->setCellValue('C4', 'Desde : ' . $ini . ' Hasta : ' . $fin);
        $fila = 7;
        $gtotal_E = 0;
        $gtotal_F = 0;
        $gtotal_G = 0;
        $gtotal_H = 0;
        $total_E = 0;
        $total_F = 0;
        $total_G = 0;
        $total_H = 0;
        $rep = 'ZZZZZZZ';
        foreach ($facturas as $factura) {
            if ($rep === 'ZZZZZZZ') {
                $total_E = 0;
                $total_F = 0;
                $total_G = 0;
                $total_H = 0;
                $rep = $factura['rep'];
            }
            if ($rep <> $factura['rep']) {
                $fila++;
                $sheet->setCellValue('D' . $fila, 'Total por Representante => ');
                $sheet->setCellValue('E' . $fila, $total_E);
                $sheet->setCellValue('F' . $fila, $total_F);
                $sheet->setCellValue('G' . $fila, $total_G);
                $sheet->setCellValue('H' . $fila, $total_H);
                $fila++;
                $gtotal_E += $total_E;
                $gtotal_F += $total_F;
                $gtotal_G += $total_G;
                $gtotal_H += $total_H;
                $total_E = 0;
                $total_F = 0;
                $total_G = 0;
                $total_H = 0;
                $fila++;
                $rep = $factura['rep'];
            }
            $fila++;
            $sheet->setCellValue('A' . $fila, $factura['factura']);
            $sheet->setCellValue('B' . $fila, date('d-M-Y', strtotime($factura['fecha'])));
            $sheet->setCellValue('C' . $fila, " " . $factura['ruc']);
            $sheet->setCellValue('D' . $fila, $factura['cliente']);
            $sheet->setCellValue('G' . $fila, $factura['iva']);
            $total_G += $factura['iva'];
            if ($factura['iva'] > 0) {
                $sheet->setCellValue('E' . $fila, $factura['bruto']);
                $total_E += $factura['bruto'];
            } else {
                $sheet->setCellValue('F' . $fila, $factura['bruto']);
                $total_F += $factura['bruto'];
            }
            $sheet->setCellValue('H' . $fila, $factura['iva'] + $factura['bruto']);
            $total_H += ($factura['iva'] + $factura['bruto']);
        }

        $fila += 2;
        $sheet->setCellValue('D' . $fila, 'Total por Representante => ');
        $sheet->setCellValue('E' . $fila, $total_E);
        $sheet->setCellValue('F' . $fila, $total_F);
        $sheet->setCellValue('G' . $fila, $total_G);
        $sheet->setCellValue('H' . $fila, $total_H);

        $gtotal_E += $total_E;
        $gtotal_F += $total_F;
        $gtotal_G += $total_G;
        $gtotal_H += $total_H;

        $fila += 2;
        $sheet->setCellValue('D' . $fila, 'Totales => ');
        $sheet->setCellValue('E' . $fila, $gtotal_E);
        $sheet->setCellValue('F' . $fila, $gtotal_F);
        $sheet->setCellValue('G' . $fila, $gtotal_G);
        $sheet->setCellValue('H' . $fila, $gtotal_H);


        $stmt = null;
        /**
         * 
         */
        $sql = "SELECT I.CustomerRef_FullName AS cliente, I.RefNumber AS factura, "
           . "I.TxnDate AS fecha, I.Subtotal AS bruto, I.SalesTaxTotal AS iva, C.AccountNUmber AS ruc "
           . "FROM creditmemo AS I INNER JOIN customer AS C ON C.ListID = I.CustomerRef_ListID WHERE I.CustomField15 = '". $autorizado . "' AND I.TxnDate >= '" . $ini . "' AND I.TxnDate <= '" . $fin . "' ORDER BY I.RefNumber ";
        $stmt = new db($db);
        $facturas = $stmt->fetchAll($sql);
        $sheet = $temp->setActiveSheetIndexByName('notas');
        $sheet->setCellValue('C4', 'Desde : ' . $ini . ' Hasta : ' . $fin);
        $fila = 7;
        $total_E = 0;
        $total_F = 0;
        $total_G = 0;
        $total_H = 0;
        foreach ($facturas as $factura) {
            $fila++;
            $sheet->setCellValue('A' . $fila, $factura['factura']);
            $sheet->setCellValue('B' . $fila, date('d-M-Y', strtotime($factura['fecha'])));
            $sheet->setCellValue('C' . $fila, " " . $factura['ruc']);
            $sheet->setCellValue('D' . $fila, $factura['cliente']);
            $sheet->setCellValue('G' . $fila, $factura['iva']);
            $total_G += $factura['iva'];
            if ($factura['iva'] > 0) {
                $sheet->setCellValue('E' . $fila, $factura['bruto']);
                $total_E += $factura['bruto'];
            } else {
                $sheet->setCellValue('F' . $fila, $factura['bruto']);
                $total_F += $factura['bruto'];
            }
            $sheet->setCellValue('H' . $fila, $factura['iva'] + $factura['bruto']);
            $total_H += ($factura['iva'] + $factura['bruto']);
        }

        $fila += 2;
        $sheet->setCellValue('D' . $fila, 'Totales => ');
        $sheet->setCellValue('E' . $fila, $total_E);
        $sheet->setCellValue('F' . $fila, $total_F);
        $sheet->setCellValue('G' . $fila, $total_G);
        $sheet->setCellValue('H' . $fila, $total_H);

        $stmt = null;
        /**
         * 
         */
        $sql = "SELECT I.VendorRef_FullName AS cliente, I.RefNumber AS factura, T.Cost AS porc, T.Amount AS retenido, T.IDKEY AS clave, "
           . "I.TxnDate AS fecha, I.CreditAmount AS bruto, T.ItemRef_FullName AS tipo, T.Quantity AS base, C.AccountNumber AS ruc "
           . "FROM vendorcredit AS I INNER JOIN vendor AS C ON C.ListID = I.VendorRef_ListID INNER JOIN txnitemlinedetail AS T ON I.TxnID = T.IDKEY WHERE I.CustomField15 = '". $autorizado . "' AND I.TxnDate >= '" . $ini . "' AND I.TxnDate <= '" . $fin . "' ORDER BY I.RefNumber ";
        $stmt = new db($db);
        $facturas = $stmt->fetchAll($sql);
        $sheet = $temp->setActiveSheetIndexByName('retencion');
        $sheet->setCellValue('C4', 'Desde : ' . $ini . ' Hasta : ' . $fin);
        $fila = 7;
        $total_E = 0;
        $total_F = 0;
        $total_G = 0;
        $gtotal_E = 0;
        $gtotal_F = 0;
        $gtotal_G = 0;
        $ret = 'ZZZZZZZ';
        foreach ($facturas as $factura) {
            if ($ret === 'ZZZZZZZ') {
                $ret = $factura['factura'];
                $val = $factura['bruto'];
                $total_E = 0;
                $total_F = 0;
                $fila++;
            }
            if ($ret <> $factura['factura']) {

                $gtotal_G += $val;
                $gtotal_E += $total_E;
                $gtotal_F += $total_F;
                $sheet->setCellValue('E' . $fila, $total_E);
                $sheet->setCellValue('F' . $fila, $total_F);
                $ret = $factura['factura'];
                $val = $factura['bruto'];
                $total_E = 0;
                $total_F = 0;
                $fila++;
            }

            $sheet->setCellValue('A' . $fila, $factura['factura']);
            $sheet->setCellValue('B' . $fila, date('d-M-Y', strtotime($factura['fecha'])));
            $sheet->setCellValue('C' . $fila, " " . $factura['ruc']);
            $sheet->setCellValue('D' . $fila, $factura['cliente']);
            $sheet->setCellValue('G' . $fila, $factura['bruto']);

            $tipo = explode(':', $factura['tipo']);
            if ($tipo[1] > '700') {
                $total_E += $factura['retenido'];
            } else {
                $total_F += $factura['retenido'];
            }
        }


        $gtotal_G += $val;
        $gtotal_E += $total_E;
        $gtotal_F += $total_F;
        $sheet->setCellValue('E' . $fila, $total_E);
        $sheet->setCellValue('F' . $fila, $total_F);
        $fila += 2;
        $sheet->setCellValue('D' . $fila, 'Totales => ');
        $sheet->setCellValue('E' . $fila, $gtotal_E);
        $sheet->setCellValue('F' . $fila, $gtotal_F);
        $sheet->setCellValue('G' . $fila, $gtotal_G);

        $writer = new Xlsx($temp);
        $filename = 'reporte_' . date('M-Y', strtotime($ini)) . '.xlsx';
        $writer->save($filename);
//        $this->enviarEmail($filename);
        $aux = "Content-Disposition: attachment; filename=" . $filename;
        Header('Content-Type: application/vnd.ms-excel');
        Header($aux);
        $writer->save('php://output');
        $this->flash->success("Se ha generado el archivo de excel : " . $filename . ' exitosamente ');
        $this->dispatcher->forward([
           "controller" => "yourcode",
           "action" => "indexventas"
        ]);
        exit();
    }

    private function enviarEmail($archivo) {

        $auth = $this->session->get('auth');
        $part = '<div><p><strong>REPORTE DE VENTAS LOS COQUEIROS</strong></p><br>
           <p>Estimado(a) </p><br><p><strong>Administrador</strong></p><br><p>Heladerías Cofrunat Cia. Ltda.,  le informa que se ha generado su reporte,</p><br><p><strong>' .
           '</strong></p><br> ' .
           '<p>que adjuntamos en formato xlsx para que lo guarde en sus archivos.</p><br>
</p><br><br><p>Atentamente,</p><br><br><p>Heladerías Cofrunat Cia. Ltda. </p>';



        $paraemail['part'] = $part;
        $paraemail['body'] = $part;

        $filename = $archivo;
        $param = $filename;
        $paraemail['attach'] = $param;
        $paraemail['subject'] = 'LOS COQUEIROS - Reporte Ventas';
        $paraemail['fromemail']['email'] = 'xavierbustos@loscoqueiros.com';
        $paraemail['fromemail']['nombre'] = 'Heladerias Cofrunat Cia. Ltda.';
        $paraemail['toemail']['email'] = $auth['email'];
        $paraemail['toemail']['nombre'] = $auth['name'];
        $exp = $this->sendmail->enviaEmail($paraemail);
//        var_dump($paraemail);
    }

}
