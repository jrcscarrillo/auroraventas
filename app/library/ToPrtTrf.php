<?php

use Phalcon\Mvc\User\Component as componente;

class ToPrtTrf extends componente {
       function imprimeTransferencia() {
           $TxnID = $this->session->get('transferencia');
           
        $html = '<html>
                    <head>
                    </head>
                    <body>';
        $parameters = array('conditions' => '[IDKEY] = :guid:', 'bind' => array('guid' => $TxnID));
        $resultado = Lotestrx::find($parameters);
        $html .= '<table class="items" width="100%" style="font-size: 8pt; border-collapse: collapse; " cellpadding="2"><tbody>';
        $flagPrimeravez = true;
        foreach ($resultado as $movimiento) {
            if($flagPrimeravez) {
                $shtml = $this->sacaCabecera($movimiento);
                $flagPrimeravez = false;
            }
            if($movimiento->getQtyTrx() > 0) {
        $parameters = array('conditions' => '[quickbooks_listid] = :id:', 'bind' => array('id' => $movimiento->getItemRefListID()));
        $item = Items::findFirst($parameters);                
                $html .= '<tr> <td class="izq1" width="20%">';
                $html .= $item->name;
                $html .= '</td><td class="izq1" width="40%">';
                $html .= $item->sales_desc;
                $html .= '</td><td class="der" width="9%">';
                $html .= number_format($movimiento->getQtyTrx(), 0, ',', '.');
                $html .= '</td>';
                $html .= '<td class="izq1">' . $movimiento->getMemoTrx() . '</td></tr>';
            }
        }
        $html .= '</tbody></table></body>
            </html>';

        $mpdf = new \Mpdf\Mpdf([
           'margin_left' => 4,
           'margin_right' => 3,
           'margin_top' => 90,
           'margin_bottom' => 5,
           'margin_header' => 2,
           'margin_footer' => 1
        ]);
        
        $mpdf->SetHTMLHeader('<div style="text-align: right; font-weight: bold;">       Inventarios - Transferencias</div>' . $shtml);
        $mpdf->SetHTMLFooter('<table width="100%" style="font-size: 8pt; border-collapse: collapse; " cellpadding="12">
            <tr><td style="text-align: center; font-weight: bold; "><hr>
            <p>Elaborador Por:</p>
            </td><td style="text-align: center; font-weight: bold; "><hr>
            <p>Recibido Por:</p>
            </td><td style="text-align: center; font-weight: bold; "><hr>
            <p>Aprobador Por:</p>
            </td></tr>            
            <tr><td width="33%">{DATE j-m-Y}</td><td width="33%" align="center">{PAGENO}/{nbpg}</td>
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

    function sacaCabecera($movimiento) {
        $contribuyente = $this->session->get('contribuyente');
        $html = 
        '<table width="100%">
            <tr>
                <td width="48%" style="color:#0000BB;" text-align:"center">
                <img width="250" height="200" src="https://carrillosteam.com/public/img/logo.jpg" align="middle">
                <br />
                <table width="100%" style="font-family: serif;">
                    <tr>
                        <td class="izq">
                            <p color="#A52A2A"><strong>';
                            $html .= $contribuyente['razon'] . '</strong></p>
                            <p color="#A52A2A"><strong>';
                            $html .= $contribuyente['NombreComercial'] . '</strong></p>
                            <p color="#A52A2A"><strong>Direccion Matriz : </strong><span color="#B8860B">';
                            $html .= $contribuyente['DirMatriz'] . '</span></p>
                            <p color="#A52A2A"><strong>Direccion Emisor : </strong><span color="#B8860B">';
                            $html .= $contribuyente['DirEmisor'] . '</span></p>
                            <p color="#A52A2A"><strong>Obligado a llevar contabilidad : </strong><span color="#B8860B">';
                            $html .= $contribuyente['LlevaContabilidad'] . '</span></p>
                        </td>
                    </tr>
                </table>
                </td>
                <td width="1%">&nbsp;</td>
                <td width="51%" class="izq">
                <table style="font-family: serif;">
                    <tr>
                        <td class="derch"><span color="#A52A2A"><strong>RUC : </strong></span><span color="#B8860B">';
                        $html .= $contribuyente['ruc'] . '</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="derch"><span color="#A52A2A"><strong>Nro. Transferencia: </strong></span><span color="#B8860B">';
                        $html .= $movimiento->getRefNumber() . '</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="derch"><span color="#A52A2A"><strong>BODEGA ENTREGA: </strong></span><span color="#B8860B">';
                        $html .= $movimiento->getOrigenDesc() . '</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="derch"><span color="#A52A2A"><strong>BODEGA RECIBE : </strong></span><span color="#B8860B">';
                        $html .= $movimiento->getDestinoDesc() . '</span></td>
                    </tr>
                    <tr>
                        <td class="derch"><span color="#A52A2A"><strong>Observaciones : </strong></span><span color="#B8860B">';
                        $html .= $movimiento->getMemo() . '</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="derch"><span color="#A52A2A"><strong>Fecha de Emision : </strong></span><span color="#B8860B">';
                        $html .= date('F j, Y', strtotime($movimiento->getTxnDate())) . '</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="derch"><span color="#A52A2A"><strong>Id BODEGA ENTREGA: </strong></span><span color="#B8860B">';
                        $html .= $movimiento->getOrigenTrx() .  '</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="derch"><span color="#A52A2A"><strong>Id BODEGA RECIBE: </strong></span><span color="#B8860B">';
                        $html .= $movimiento->getDestinoTrx() . '</span>
                        </td>
                    </tr>
                </table>
            </td>
            </tr>
        </table>

<br />

<table class="items" width="100%" style="font-size: 8pt; border-collapse: collapse; " cellpadding="2">
<thead><tr>
                <th align="center" width="20%" style="font-weight: bold;">Codigo</th>
                <th align="center" width="40%" style="font-weight: bold;">Descripcion</th>
                <th align="right" width="9%" style="font-weight: bold;">Cantidad</th>
                <th align="center" width="31%" style="font-weight: bold;">Observaciones</th>
</tr></thead>
</table>';
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
    //put your code here
}
