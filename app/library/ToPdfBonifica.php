<?php

use Phalcon\Mvc\User\Component as componente;

class ToPdfBonifica extends componente {

    function imprimeBonifica($vendedor) {

        $myfile = fopen("bonifica.txt", "w") or die("Unable to open file!");
        $html = '<html><head>
            <style>
            	@page {
		size: 21cm 29cm;
		margin: 2%;	
		margin-header: .5cm;
		margin-footer: .5cm;
		margin-left: 1cm;
		margin-right: 1cm;
	}

	@page standard {
		size: auto;
		margin: 10%;
		marks: none;
	}

	@page standard :first {
		margin-top: 7cm;    
	}

	h1.heading3 {	color: #FF1188;
		page-break-before: right;
	}

	br.paging { page-break-after: always; }

		body { font-family: DejaVuSansCondensed; font-size: 11pt;  }
		p { 	text-align: justify; margin-bottom: 4pt;  margin-top:0pt; }

		hr {	width: 100%; height: 1px; 
			text-align: center; color: #999999; 
			margin-top: 8pt; margin-bottom: 8pt; }

		a {	color: #000066; font-style: normal; text-decoration: underline; 
			font-weight: normal; }

		pre { font-family: DejaVuSansMono; font-size: 9pt; }

		h1 {	font-weight: normal; font-size: 26pt; color: #000066; 
			font-family: DejaVuSansCondensed; margin-top: 18pt; margin-bottom: 6pt; 
			border-top: 0.075cm solid #000000; border-bottom: 0.075cm solid #000000; 
			text-align: ; page-break-after:avoid; }
		h2 {	font-weight: bold; font-size: 12pt; color: #000066; 
			font-family: DejaVuSansCondensed; margin-top: 6pt; margin-bottom: 6pt; 
			border-top: 0.07cm solid #000000; border-bottom: 0.07cm solid #000000; 
			text-align: ;  text-transform: uppercase; page-break-after:avoid; }
		h3 {	font-weight: normal; font-size: 26pt; color: #000000; 
			font-family: DejaVuSansCondensed; margin-top: 0pt; margin-bottom: 6pt; 
			border-top: 0; border-bottom: 0; 
			text-align: ; page-break-after:avoid; }
		h4 {	font-weight: ; font-size: 13pt; color: #9f2b1e; 
			font-family: DejaVuSansCondensed; margin-top: 10pt; margin-bottom: 7pt; 
			text-align: ;  margin-collapse:collapse; page-break-after:avoid; }
		h5 {	font-weight: bold; font-style:italic; ; font-size: 11pt; color: #000044; 
			font-family: DejaVuSansCondensed; margin-top: 8pt; margin-bottom: 4pt; 
			text-align: ;  page-break-after:avoid; }
		h6 {	font-weight: bold; font-size: 9.5pt; color: #333333; 
			font-family: DejaVuSansCondensed; margin-top: 6pt; margin-bottom: ; 
			text-align: ;  page-break-after:avoid; }
';
        $bonif = $this->session->get('bonifica');
        $html .= '</style></head><body>
<htmlpageheader name="myHeader1">
<table class="items" width="100%" style="font-size: 8pt; border-collapse: collapse; " >
<thead>
<tr>
<th colspan="3"><h5>Reporte de Bonificaciones (lista General)</h5></th>
<th align="left"><pre>Fecha Desde :';
        $html .= date('d-m-Y', strtotime($bonif['iniDate'])) . '</pre></th>
<th colspan="3" align="left"><pre>Fecha Hasta :';
        $html .= date('d-m-Y', strtotime($bonif['finDate'])) . '</pre></th></tr>
<tr>
                <th width="10%" style="font-weight: bold;">Rep.</th><hr>
                <th width="10%" style="font-weight: bold;"># Pedido</th><hr>
                <th width="10%" style="font-weight: bold;">Emision</th><hr>
                <th align="center" width="40%" style="font-weight: bold;">Producto</th><hr>
                <th align="right" width="10%" style="font-weight: bold;">Cantidad</th><hr>
                <th align="right" width="10%" style="font-weight: bold;">Precio</th><hr>
                <th align="right" width="10%" style="font-weight: bold;">Acumulado</th><hr>
</tr></thead>
            </htmlpageheader>';

        $html .= '<tbody>';
        $valortotal = 0;
        fwrite($myfile, "Estas son las fechas " . $bonif['iniDate'] . " " . $bonif['finDate'] . "\r\n");
        foreach ($vendedor as $linea) {
            $lineaproducto = $linea->bonificadetalle;
            $flag = true;
            fwrite($myfile, "Este es el pedido " . $linea->RefNumber) . "\r\n";
            foreach ($lineaproducto as $producto) {
                if ($flag) {
                    $flag = false;
                    $html .= '<tr><td>' . $linea->SalesRepRef_FullName . '</td>';
                    $html .= '<td>' . $linea->RefNumber . '</td>';
                    $html .= '<td align="center">' . date('d-m-Y', strtotime($linea->TxnDate)) . '</td></tr>';
                }
                fwrite($myfile, "Este es el producto " . $producto->Description . "\r\n");
                $html .= '<tr><td></td><td></td><td></td>';
                $html .= '<td>' . $producto->Description . '</td>';
                $html .= '<td align="right">' . number_format($producto->Quantity, 2, ",", ".") . '</td>';
                $html .= '<td align="right">' . number_format($producto->Rate, 2, ",", ".") . '</td>';
                $valortotal = $valortotal + $producto->Rate * $producto->Quantity;
                $html .= '<td align="right">' . number_format($valortotal, 2, ",", ".") . '</td></tr>';
            }
        }
        $html .= '</tbody></table></body></html>';

        $mpdf = new \Mpdf\Mpdf([
           'margin_left' => 5,
           'margin_right' => 5,
           'margin_top' => 5,
           'margin_bottom' => 5,
           'margin_header' => 0,
           'margin_footer' => 0,
        ]);
        $mpdf->SetHTMLHeaderByName('MyHeader1');

        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("Los Coqueiros - Factura");
        $mpdf->SetAuthor("Los Coqueiros");

        $mpdf->SetDisplayMode('fullpage');

        $mpdf->WriteHTML($html);
        $condicion = 1;
        if ($condicion == 1) {
            $mpdf->Output();
        } else {
            $firmado = __FILE__ . 'bonificaciones';
            $mpdf->Output($firmado, 'F');
        }
    }

    function alistaFactura($producto) {
        
    }
}
