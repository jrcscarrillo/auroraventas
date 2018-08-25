<?php

use Phalcon\Mvc\User\Component as componente;

/**
 * 
 */
class ToPdf extends componente {

    function creaFactura($condicion) {

        $contribuyente = $this->session->get('contribuyente');
        $helados = $this->session->get('helados');
        $cliente = Customer::findFirstByListID($helados->CustomerRef_ListID);
        if ($cliente == false) {
            $this->flash->error("Este cliente no existe");
            return $this->dispatcher->forward(
                  [
                     "controller" => "customer",
                     "action" => "search",
                  ]
            );
        }
//        echo 'CLIENTE ' . $cliente->FullName;
//        echo 'PEDIDO ' . $helados->RefNumber;
        $html = '
<html>
<head>
<style>
body {font-family: sans-serif;
    font-size: 10pt;
}
p { margin: 0pt; }
table {
    border-radius: 10px;
}
table.items {
    border: 0.1mm solid #000000;
}
td { vertical-align: top; }
.items td {
    border-left: 0.1mm solid #000000;
    border-right: 0.1mm solid #000000;
    border-bottom: 0.1mm solid #000000;
}
table thead th { background-color: #fcf8f2;
    text-align: center;
    border: 0.1mm solid #000000;
    font-variant: small-caps;
}

table td.clave { background-color: #fcf8f2;
    text-align: center;
        font-family: Lucida Sans Unicode;
        font-size: 11pt;
        color: #B8860B;
}

table td.izq { background-color: #fcf8f2;
    text-align: left;
    border: 0.1mm solid #000000;
        font-family: Lucida Sans Unicode;
        font-size: 8pt;
}

table td.der { background-color: #fcf8f2;
    text-align: left;
        font-family: Lucida Sans Unicode;
        font-size: 16pt;
}

table td.der1 { background-color: #fcf8f2;
    text-align: left;
        font-family: Lucida Sans Unicode;
        font-size: 10pt;
}

table td.derch { background-color: #fcf8f2;
    text-align: left;
        font-family: Lucida Sans Unicode;
        font-size: 7pt;
}
.items td.blanktotal {
    background-color: #EEEEEE;
    border: 0.1mm solid #000000;
    background-color: #FFFFFF;
    border: 0mm none #000000;
    border-top: 0.1mm solid #000000;
    border-right: 0.1mm solid #000000;
}
.items td.totals {
    text-align: right;
    border: 0.1mm solid #000000;
}
.items td.cost {
    text-align: "." center;
}

.barcode {
    padding: 1.5mm;
    margin: 0;
    vertical-align: top;
    color: #000000;
}
.barcodecell {
    text-align: center;
    vertical-align: middle;
    padding: 0;
}

</style>
</head>
<body>

<table width="100%"><tr>
<td width="48%" style="color:#0000BB;" text-align:"center">
<img width="250" height="200" src="https://carrillosteam.com/public/img/logo.jpg" align="middle"><br />
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
        $html .= $contribuyente['LlevaContabilidad'] . '</span></p></td>
</tr>
</table>
</td>
<td width="1%">&nbsp;</td>
<td width="51%" class="izq">
<table style="font-family: serif;">
<tr>
<td class="der"><span color="#A52A2A"><strong>RUC : </strong></span><span color="#B8860B">';

        $html .= $contribuyente['ruc'] . '</span></td>
</tr>
<tr>
<td class="der"><span color="#A52A2A"><strong>Nro. Pedido : </strong></span><span color="#B8860B">';

        $html .= $helados->RefNumber . '</span></td>
</tr>
<tr>
<td class="derch"><span color="#A52A2A"><strong>Razon Social : </strong></span><span color="#B8860B">';

        $html .= $helados->CustomerRef_FullName . '</span></td></tr><tr>
<td class="derch"><span color="#A52A2A"><strong>Identificacion : </strong></span><span color="#B8860B">';

        $html .= $helados->CustomerRef_ListID . '</span></td>
</tr>
<tr>
<td class="derch"><span color="#A52A2A"><strong>Nombre Comercial : </strong></span><span color="#B8860B">';

        $html .= $helados->CustomerRef_FullName . '</span></td></tr><tr>
<td class="derch"><span color="#A52A2A"><strong>Fecha de Pago : </strong></span><span color="#B8860B">';

        $html .= date('F j, Y', strtotime($helados->DueDate)) . '</span></td>
</tr>
<tr>
<td class="derch"><span color="#A52A2A"><strong>Direccion : </strong></span><span color="#B8860B">';

        $html .= $cliente->BillAddress_City . ", " . $cliente->BillAddress_Addr1 . '</span></td></tr><tr>
<td class="derch"><span color="#A52A2A"><strong>Fecha Emision : </strong></span><span color="#B8860B">';

        $html .= date('F j, Y', strtotime($helados->TxnDate)) . '</span></td>
</tr>
</table></td></tr></table>

<br />

<table class="items" width="100%" style="font-size: 8pt; border-collapse: collapse; " cellpadding="2">
<thead>
<tr>
                <th align="center" width="14%" style="font-weight: bold;">Codigo</th>
                <th align="center" width="40%" style="font-weight: bold;">Descripcion</th>
                <th align="right" width="9%" style="font-weight: bold;">Cantidad</th>
                <th align="right" width="9%" style="font-weight: bold;">Precio</th>
                <th align="right" width="9%" style="font-weight: bold;">Dscto.</th>
                <th align="right" width="9%" style="font-weight: bold;">Precio Total</th>
</tr>
</thead>
<tbody>
<!-- ITEMS HERE -->';
        $productos = $helados->pedidosdetalle;
        foreach ($productos as $producto) {
            $html .= '<tr><td>' . substr($producto->Description, 0, 13) . '</td>';
            $html .= '<td>' . substr($producto->Description, 14) . '</td>';
            $html .= '<td align="right">' . number_format($producto->Quantity, 2, ',', '.') . '</td>';
            $html .= '<td align="right">' . number_format($producto->Rate, 2, ',', '.') . '</td>';
            $html .= '<td align="right">0,00</td>';
            $html .= '<td align="right">' . number_format($producto->Amount, 2, ',', '.') . '</td></tr>';
        }

        $html .= '<!-- END ITEMS HERE -->
<tr>
<td class="blanktotal" colspan="4" rowspan="6">
<span align="center">Informacion Adicional</span>';
        $html .= '<p>TEL : ' . $cliente->Phone . '</p>
            <p>EMAIL : ' . $cliente->Email . '</p>
            <p>RUTA : ' . $cliente->CustomField1 . '</p>
            <p>ASESOR : ' . $cliente->SalesRepRef_FullName . '</p>
            <p>OBSERVACIONES : ' . $helados->Memo . '</p>
            </td>
<td class="totals" align="right">Subtotal 12% :</td>
<td class="totals" align="right">';

        $html .= number_format($helados->Subtotal, 2, ',', '.') . '</td>
</tr>
<tr>
<td class="totals" align="right">Subtotal 0% :</td>
<td class="totals" align="right">0.00</td>
</tr>
<tr>
<td class="totals" align="right">Sin Impuestos :</td>
<td class="totals" align="right">0.00</td>
</tr>
<tr>
<td class="totals" align="right"><b>IVA 12% :</b></td>
<td class="totals" align="right"><b>';

        $html .= number_format($helados->SalesTaxTotal, 2, ',', '.') . '</b></td>
</tr>
<tr>
<td class="totals" align="right">Descuentos :</td>
<td class="totals" align="right">0.00</td>
</tr>
<tr>
<td class="totals" align="right"><b>Importe Total:</b></td>
<td class="totals" align="right"><b>';

        $html .= number_format($helados->TotalAmount, 2, ',', '.') . '</b></td>
</tr>
</tbody>
</table>
</body>
</html>
';

        $this->session->set('html', $html);
//        $myfile = fopen('pedidos.html', 'w');
//        fwrite($myfile, $html);
        $mpdf = new \Mpdf\Mpdf([
           'margin_left' => 4,
           'margin_right' => 3,
           'margin_top' => 8,
           'margin_bottom' => 5,
           'margin_header' => 1,
           'margin_footer' => 1
        ]);
//        fclose($myfile);
        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("Los Coqueiros - Factura");
        $mpdf->SetAuthor("Los Coqueiros");
        $mpdf->SetWatermarkText("");
        $mpdf->showWatermarkText = true;
        $mpdf->watermark_font = 'DejaVuSansCondensed';
        $mpdf->watermarkTextAlpha = 0.1;
        $mpdf->SetDisplayMode('fullpage');

        $mpdf->WriteHTML($html);
        if ($condicion == 1) {
            $filename = 'pedido' . trim($helados->RefNumber) . '.pdf';
            $mpdf->Output($filename, \Mpdf\Output\Destination::INLINE);
        } else {
            $filename = $_SERVER['DOCUMENT_ROOT'] . '/ComprobantesSRI/pedidos/pedido' . trim($helados->RefNumber) . '.pdf';
            $mpdf->Output($filename, 'F');
        }
    }

    function llenaFactura() {

        $parameters = array('conditions' => "[CodEmisor] = '001' AND [Punto] = '001'");
        $contribuyente = Contribuyente::findFirst($parameters);
        if ($contribuyente == false) {
            $this->flash->error("Este contribuyente no existe");
            return $this->dispatcher->forward(
                  [
                     "controller" => "customer",
                     "action" => "search",
                  ]
            );
        }
        $rucPasa = $this->claves->registraContribuyente($contribuyente);
        $this->session->set('contribuyente', $rucPasa);
    }

}
