<?php

use Phalcon\Mvc\User\Component as componente;

class ToPrtProd extends componente {
    protected $iniDate;
    protected $finDate;
       function impCabecera($params) {

        /**
         *          en los parametros vienen los siguientes campos: Fecha inicial, Fecha final, estado
         *          retorna el XML con las cabeceras del reporte
         */
        $this->iniDate = $params['iniDate'];
        $this->finDate = $params['finDate'];
        $html = '
<html>
<head>
</head>
<body>';
        $args = array('conditions' => 'TxnDate BETWEEN ?1 AND ?2',
           'bind' => array(
              1 => $this->iniDate,
              2 => $this->finDate),
           'order' => '[RefNumber]'
        );
        $lotes = Lotesdetalle::find($args);
        $html .= '<table><tbody>';
        foreach ($lotes as $lote) {
            $itemLote = $lote->items;
            if ($lote->Estado != "PASADO") {
                $html .= '<tr> <td class="izq1" width="12%">';
                $html .= date('d-m-Y', strtotime($lote->TxnDate));
                $html .= '</td><td class="izq1" width="20%">';
                $html .= $lote->RefNumber;
                $html .= '<p>' . $itemLote->sales_desc . '</p></td>';

                $html .= '<td class="der" width="12%">';
                $html .= number_format($lote->QtyProducida, 0, '.', '.');
                $shtml = $this->buscaBodega($lote->BodProducida);
                $html .= $shtml . '</td>';
                $html .= '<td class="der" width="12%">';
                $html .= number_format($lote->QtyBuena, 0, '.', '.');
                $shtml = $this->buscaBodega($lote->BodBuena);
                $html .= $shtml . '</td>';
                $html .= '<td class="der" width="12%">';
                $html .= number_format($lote->QtyMala, 0, '.', '.');
                if ($lote->QtyMala > 0) {
                    $shtml = $this->buscaBodega($lote->BodMala);
                    $html .= $shtml;
                }
                $html .= '</td>';
                $html .= '<td class="der" width="12%">';
                $html .= number_format($lote->QtyReproceso, 0, '.', '.');
                if ($lote->QtyReproceso > 0) {
                    $shtml = $this->buscaBodega($lote->BodReproceso);
                    $html .= $shtml;
                }
                $html .= '</td>';
                $html .= '<td class="der" width="12%">';
                $html .= number_format($lote->QtyMuestra, 0, '.', '.');
                if ($lote->QtyMuestra > 0) {
                    $shtml = $this->buscaBodega($lote->BodMuestra);
                    $html .= $shtml;
                }
                $html .= '</td>';
                $html .= '<td class="der" width="12%">';
                $html .= number_format($lote->QtyLab, 0, '.', '.');
                if ($lote->QtyLab > 0) {
                    $shtml = $this->buscaBodega($lote->BodLab);
                    $html .= $shtml;
                }
                $html .= '</td>';
                $html .= '</tr><tr><td colspan="8"></td></tr><hr />';
            } else {
                $html .= '<tr> <td class="izq1" width="12%">';
                $html .= date('d-m-Y', strtotime($lote->TxnDate));
                $html .= '</td><td class="izq1" width="20%">';
                $html .= $lote->RefNumber;
                $html .= '<p>' . $itemLote->sales_desc . '</p></td>';
                $html .= '<td class="der" width="12%">';
                $html .= number_format($lote->QtyProducida, 0, '.', '.');
                $html .= '<p>SIN PROCESAR</p></td>';
                $html .= '</tr><tr><td colspan="8"></td></tr><hr />';
            }
        }
        $html .= '</tbody></table></body>
</html>';

        $mpdf = new \Mpdf\Mpdf([
           'margin_left' => 4,
           'margin_right' => 3,
           'margin_top' => 22,
           'margin_bottom' => 5,
           'margin_header' => 2,
           'margin_footer' => 1
        ]);
        $shtml = $this->sacaCabecera();
        $mpdf->SetHTMLHeader('<div style="text-align: right; font-weight: bold;">Desde : ' . date('d-m-Y', strtotime($this->iniDate)) . '    Hasta : ' . date('d-m-Y', strtotime($this->finDate)) . '       Produccion - Lista de Ordenes</div>' . $shtml);
        $mpdf->SetHTMLFooter('<table width="100%"><tr><td width="33%">{DATE j-m-Y}</td><td width="33%" align="center">{PAGENO}/{nbpg}</td>
        <td width="33%" style="text-align: right;">Aurora - MultiBodegas</td></tr></table>');
        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("Los Coqueiros - Produccion");
        $mpdf->SetAuthor("Los Coqueiros");
        $mpdf->SetDisplayMode('fullpage');
        $archivo = APP_PATH . 'public\css\reporte.css';
        $stylesheet = file_get_contents($archivo); 
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML($html);
        $filename = 'pedido001.pdf';
        $mpdf->Output($filename, \Mpdf\Output\Destination::INLINE);
    }

    function sacaCabecera() {
        $html = '<table width="100%"><thead><tr><th class="izq" width="12%">
                <p color="#A52A2A"><strong>Fecha</strong></p></th><th class="izq" width="20%">
                <p color="#A52A2A"><strong>Numero Lote</strong></p></th><th class="izq" width="12%">
                <p color="#A52A2A"><strong>Producida</strong></p></th><th class="izq"  width="12%">
                <p color="#A52A2A"><strong>Buena</strong></p></th><th class="izq"  width="12%">
                <p color="#A52A2A"><strong>Mala</strong></p></th><th class="izq"  width="12%">
                <p color="#A52A2A"><strong>Reproceso</strong></p></th><th class="izq"  width="12%">
                <p color="#A52A2A"><strong>Muestra</strong></p></th><th class="izq"  width="12%">
                <p color="#A52A2A"><strong>Laboratorio</strong></p></th></tr></thead></table><hr>';
        return $html;
    }

    function buscaBodega($bodega) {
        $wareh = Bodegas::findFirstByListID($bodega);
        if (!$wareh) {
            return '<p>ERROR</p>';
        }
        $html = '<p>' . $wareh->Name . '</p>';
        return $html;
    }

}
