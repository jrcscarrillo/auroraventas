<?php

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as lector;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Font;

class ReporteinventariosController extends ControllerBase {

    protected $tipo;
    protected $inidate;
    protected $findate;
    protected $bodega;
    protected $producto;

    public function initialize() {
        $this->tag->setTitle('R.Inv.');
        parent::initialize();
    }

    public function indexAction() {
        $form = new ReporteInventariosForm;
        $this->view->form = $form;
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
//        var_dump($_POST);
        $this->tipo = $this->request->getPost('tipo');
        $this->inidate = $this->request->getPost('iniDate');
        $this->findate = $this->request->getPost('finDate');
        $this->bodega = $this->request->getPost('DestinoTrx');
        $this->producto = $this->request->getPost('ItemRef_ListID');
        $this->session->set('RINVENTARIOS', array(
           'iniDate' => $this->request->getPost('iniDate'),
           'finDate' => $this->request->getPost('finDate'),
           'proceso' => $this->request->getPost('tipo'),
           'bodega' => $this->request->getPost('DestinoTrx'),
           'producto' => $this->request->getPost('ItemRef_ListID')
        ));
        if ($this->tipo === "1") {
            $this->dispatcher->forward([
               'action' => 'movbodega',
            ]);
        } elseif ($this->tipo === "2") {
            $this->dispatcher->forward([
               'action' => 'movproducto',
            ]);
        } elseif ($this->tipo === "3") {
            $this->dispatcher->forward([
               'action' => 'movtrx',
            ]);
        } elseif ($this->tipo === "4") {
            $this->dispatcher->forward([
               'action' => 'movinicial',
            ]);
        } elseif ($this->tipo === "5") {
            $this->dispatcher->forward([
               'action' => 'movtransferencia',
            ]);
        }
    }

    public function movinicialAction() {
        $params = $this->session->get('RINVENTARIOS');
        $mov = 'INVENTARIO-INICIAL';
        $this->tipo = $params['proceso'];
        $this->inidate = $params['iniDate'];
        $this->findate = $params['finDate'];
        $this->bodega = $params['bodega'];
        $this->producto = $params['producto'];
        if ($this->bodega === 'TODOS' and $this->producto === 'TODOS') {
            $args = array('conditions' => 'TxnDate BETWEEN ?1 AND ?2 AND TipoTrx = ?3',
               'bind' => array(
                  1 => $this->inidate,
                  2 => $this->findate,
                  3 => $mov),
               'order' => '[RefNumber]'
            );
        } elseif ($this->bodega === 'TODOS') {
            $args = array('conditions' => 'ItemRef_ListID = ?1 AND TxnDate BETWEEN ?2 AND ?3 AND TipoTrx = ?4',
               'bind' => array(
                  1 => $this->producto,
                  2 => $this->inidate,
                  3 => $this->findate,
                  4 => $mov),
               'order' => '[RefNumber]'
            );
        } elseif ($this->producto === 'TODOS') {
            $args = array('conditions' => 'DestinoTrx = ?1 AND (TxnDate BETWEEN ?2 AND ?3) AND TipoTrx = ?4',
               'bind' => array(
                  1 => $this->bodega,
                  2 => $this->inidate,
                  3 => $this->findate,
                  4 => $mov),
               'order' => '[RefNumber]'
            );
        } else {
            $args = array('conditions' => 'DestinoTrx = ?1 AND ItemRef_ListID = ?2 AND TxnDate BETWEEN ?3 AND ?4 AND TipoTrx = ?5',
               'bind' => array(
                  1 => $this->bodega,
                  2 => $this->producto,
                  3 => $this->inidate,
                  4 => $this->findate,
                  5 => $mov),
               'order' => '[RefNumber]'
            );
        }

        $lotes = Lotestrx::find($args);
        if (!$lotes) {
            $this->flash->notice('No existen movimientos para estos datos ' . $mov . ' fecha inicial ' . $this->inidate . ' fecha final ' . $this->findate . ' esta bodega ' . $this->bodega) . ' este producto ' . $this->producto;
            return $this->dispatcher->forward([
                  "action" => "index"
            ]);
        }
        $lector = new lector();
        $temp = $lector->load('plantilla.xlsx');
        $sheet = $temp->setActiveSheetIndexByName('fisico');
        $sheet->setCellValue('C4', 'Desde : ' . $this->inidate . ' Hasta : ' . $this->findate);
        $fila = 7;
        $ctrl_bodega = 'INICIO';
        foreach ($lotes as $lote) {
            $fila++;
            if ($ctrl_bodega <> $lote->DestinoTrx) {
                $sheet->setCellValue('C' . $fila, $this->buscaBodega($lote->DestinoTrx));
                $fila++;
                $ctrl_bodega = $lote->DestinoTrx;
            }
            $itemLote = $lote->items;
            $sheet->setCellValue('A' . $fila, $lote->RefNumber);
            $sheet->setCellValue('B' . $fila, date('d-m-Y', strtotime($lote->TxnDate)));
            $sheet->setCellValue('C' . $fila, $itemLote->sales_desc);
            $sheet->setCellValue('D' . $fila, $lote->QtyTrx);
        }

        $writer = new Xlsx($temp);
        ob_end_clean();
        $filename = 'tomafisica.xlsx';
        $writer->save($filename);
        $aux = "Content-Disposition: attachment; filename=" . $filename;
        Header('Content-Type: application/vnd.ms-excel');
        Header($aux);
        $writer->save('php://output');
        $this->flash->success("Se ha generado el archivo de excel : " . $filename . ' exitosamente ');
        return $this->dispatcher->forward([
              "action" => "index"
        ]);
    }

    function buscaBodega($bodega) {
        $wareh = Bodegas::findFirstByListID($bodega);
        if (!$wareh) {
            return 'ERROR bodega no encontrada';
        }
        return $wareh->Name;
    }

    function buscaCliente($bodega) {
        $wareh = Customer::findFirstByListID($bodega);
        if (!$wareh) {
            return 'ERROR cliente no encontrado';
        }
        return $wareh->Name;
    }

    public function movbodegaAction() {
        $params = $this->session->get('RINVENTARIOS');
        $this->tipo = $params['proceso'];
        $this->inidate = $params['iniDate'];
        $this->findate = $params['finDate'];
        $this->bodega = $params['bodega'];
        $this->producto = $params['producto'];

        $pasar = array("caso" => 0, "iniDate" => $params['iniDate'], "finDate" => $params['finDate'], "bodega" => $params['bodega'], "producto" => $params['producto'],);

        $args = array('conditions' => 'Status = "CON-MOV" AND ListID = ?1',
           'bind' => array(
              1 => $this->bodega));
        $bodegas = Bodegas::find($args);
        foreach ($bodegas as $bodega) {
            if ($this->producto === 'TODOS') {
                $args = array('conditions' => '(DestinoTrx = ?1 OR OrigenTrx = ?1) AND TxnDate BETWEEN ?2 AND ?3',
                   'bind' => array(
                      1 => $bodega->ListID,
                      2 => $this->inidate,
                      3 => $this->findate),
                   'order' => 'ItemRef_ListID, TxnDate'
                );
            } else {
                $args = array('conditions' => '(DestinoTrx = ?1 OR OrigenTrx = ?1) AND ItemRef_ListID = ?2 AND TxnDate BETWEEN ?3 AND ?4',
                   'bind' => array(
                      1 => $bodega->ListID,
                      2 => $this->producto,
                      3 => $this->inidate,
                      4 => $this->findate),
                   'order' => 'ItemRef_ListID, TxnDate'
                );
            }

            $lotes = Lotestrx::find($args);
            if (count($lotes) === 0) {
                $this->flash->notice('No existen movimientos para estos datos ' . $mov . ' fecha inicial ' . $this->inidate . ' fecha final ' . $this->findate . ' esta bodega ' . $this->bodega) . ' este producto ' . $this->producto;
                return $this->dispatcher->forward([
                      "action" => "index"
                ]);
            }
            $this->flash->notice('procesa ' . count($lotes) . ' fecha inicial ' . $this->inidate . ' fecha final ' . $this->findate . ' esta bodega ' . $this->bodega) . ' este producto ' . $this->producto;
            $lector = new lector();
            $temp = $lector->load('plantilla.xlsx');
            $temp->getSecurity()->setLockWindows(true);
            $temp->getSecurity()->setLockStructure(true);
            $temp->getSecurity()->setWorkbookPassword('L0$c0queir0s');
            $sheet = $temp->setActiveSheetIndexByName('nivel1');
            $sheet->setCellValue('C4', 'Desde : ' . $this->inidate . ' Hasta : ' . $this->findate);
            $fila = 7;
            $w_ing = 0;
            $w_egr = 0;
            $calculado = 0;
            $ctrl_bodega = 'INICIO';
            $ctrl_producto = 'INICIO';
            $pasar = array("caso" => 0, "iniDate" => $this->inidate, "finDate" => $this->findate, "bodega" => "", "producto" => "");
            foreach ($lotes as $lote) {
                $fila++;
                if ($ctrl_producto === 'INICIO') {
                    $ctrl_producto = $lote->ItemRef_ListID;
                    $pasar['bodega'] = $args['bind'][1];
                    $ctrl_bodega = $args['bind'][1];
                    $pasar['producto'] = $ctrl_producto;
                    $movimiento = $lote->existenciasBodega($pasar);
                    $calculado = $movimiento['Disponible'];
                    $itemLote = $lote->items;
                    
                    $temp->getActiveSheet()->getStyle('C' . $fila)->applyFromArray(array(
//                    $sheet->getStyle('C' . $fila)->applyFromArray(array(
                       'fill' => array(
                          'type' => Fill::FILL_SOLID,
                          'color' => array('argb' => 'FF0A9433' )
                          ),
                       'font'  => array(
                          'bold'  =>  true
                          )
                       )
                       );
                    
                    $sheet->setCellValue('C' . $fila, $itemLote->sales_desc);
                    $fila++;
                    $shtml = $this->buscaBodega($ctrl_bodega);
                    $sheet->setCellValue('C' . $fila, $shtml);
                    $sheet->setCellValue('G' . $fila, $movimiento['Disponible']);
                    $sheet->setCellValue('H' . $fila, 'SALDO INICIAL AL ' . date('d-m-Y', strtotime($this->inidate)));
                    $fila++;
                }
                if ($ctrl_producto != $lote->ItemRef_ListID) {
                    $fila++;
                    $calculado = $movimiento['Disponible'] + $w_ing - $w_egr;
                    $shtml = $this->buscaBodega($ctrl_bodega);
                    $sheet->setCellValue('C' . $fila, $shtml);
                    $sheet->setCellValue('G' . $fila, $calculado);
                    $sheet->setCellValue('H' . $fila, 'SALDO FINAL AL ' . date('d-m-Y', strtotime($this->findate)));

                    $w_ing = 0;
                    $w_egr = 0;
                    $ctrl_producto = $lote->ItemRef_ListID;
                    $pasar['bodega'] = $args['bind'][1];
                    $ctrl_bodega = $args['bind'][1];
                    $pasar['producto'] = $ctrl_producto;
                    $movimiento = $lote->existenciasBodega($pasar);
                    $calculado = $movimiento['Disponible'];
                    $fila++;
                    $itemLote = $lote->items;
                    $sheet->setCellValue('C' . $fila, $itemLote->sales_desc);
                    $fila++;
                    $shtml = $this->buscaBodega($ctrl_bodega);
                    $sheet->setCellValue('C' . $fila, $shtml);
                    $sheet->setCellValue('G' . $fila, $movimiento['Disponible']);
                    $sheet->setCellValue('H' . $fila, 'SALDO INICIAL AL ' . date('d-m-Y', strtotime($this->inidate)));
                    $fila++;
                }
                $sheet->setCellValue('A' . $fila, $lote->RefNumber);
                $sheet->setCellValue('B' . $fila, date('d-m-Y', strtotime($lote->TxnDate)));
                $shtml = $this->buscaBodega($lote->OrigenTrx);
                $sheet->setCellValue('C' . $fila, $shtml);
                if ($lote->TipoTrx === 'FACTURA' or $lote->TipoTrx === 'NOTA-CREDITO') {
                    $shtml = $this->buscaCliente($lote->DestinoTrx);
                } else {
                    $shtml = $this->buscaBodega($lote->DestinoTrx);
                }
                $sheet->setCellValue('D' . $fila, $shtml);
                if ($ctrl_bodega === $lote->OrigenTrx) {
                    $w_egr += $lote->QtyTrx;
                    $calculado = $calculado - $lote->QtyTrx;
                    $sheet->setCellValue('F' . $fila, $lote->QtyTrx);
                    $sheet->setCellValue('G' . $fila, $calculado);
                } else {
                    $w_ing += $lote->getQtyTrx();
                    $calculado = $calculado + $lote->getQtyTrx();
                    $sheet->setCellValue('E' . $fila, $lote->QtyTrx);
                    $sheet->setCellValue('G' . $fila, $calculado);
                }
                $sheet->setCellValue('H' . $fila, $lote->TipoTrx);
            }
            $fila++;
            $calculado = $movimiento['Disponible'] + $w_ing - $w_egr;
            $shtml = $this->buscaBodega($ctrl_bodega);
            $sheet->setCellValue('C' . $fila, $shtml);
            $sheet->setCellValue('G' . $fila, $calculado);
            $sheet->setCellValue('H' . $fila, 'SALDO FINAL AL ' . date('d-m-Y', strtotime($this->findate)));
        }
        $writer = new Xlsx($temp);
        ob_end_clean();
        $filename = 'nivel1' . trim($this->bodega) . '.xlsx';
        
        $aux = "Content-Disposition: attachment; filename=" . $filename;
        Header('Content-Type: application/vnd.ms-excel');
        Header($aux);
        
        $writer->save($filename);
        $writer->save('php://output');
        $this->flash->success("Se ha generado el archivo de excel : " . $filename . ' exitosamente ');
        return $this->dispatcher->forward([
              "action" => "index"
        ]);
    }
}