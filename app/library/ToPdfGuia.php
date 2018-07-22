<?php

use Phalcon\Mvc\User\Component as componente;

/**
 * 
 */
class ToPdfGuia extends componente {

    function creaGuia($condicion) {

        $contribuyente = $this->session->get('contribuyente');
        $fuente = $this->session->get('fuente');
        $a = $this->session->get('archivos');
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
<img width="250" height="200" src="';

        $html .= $_SERVER['DOCUMENT_ROOT'] . '/public/img/' . 'logo.jpg" align="middle"><br />
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
</tr>';
        if ($fuente['CustomField15'] == "AUTORIZADO") {
            $html .= '<tr><p color="#FFFFFF">Relleno</p></tr>';
        }
        $html .= '</table>
</td>
<td width="1%">&nbsp;</td>
<td width="51%" class="izq">
<table style="font-family: serif;">
<tr>
<td class="der"><span color="#A52A2A"><strong>RUC : </strong></span><span color="#B8860B">';

        $html .= $fuente['ruc'] . '</span></td>
</tr>
<tr>
<td class="der"><span color="#A52A2A"><strong>Nro. Guia : </strong></span><span color="#B8860B">';

        $html .= $fuente['estab'] . '-' . $fuente['ptoEmi'] . '-' . $fuente['secuencial'] . '</span></td>
</tr>
<tr>
<td class="der"><span color="#A52A2A"><strong>Clave Acceso : </strong></span></td>
</tr>

<tr>
<tr><td class="barcodecell"><barcode code="';
        $html .= substr($fuente['claveAcceso'], 0, 48) . '" type="C128C" class="barcode" /></td></tr>
<tr>
<td class="clave"><span>';

        $html .= $fuente['claveAcceso'] . '</span></td>
</tr>
<tr>';
        if ($fuente['CustomField15'] == "AUTORIZADO") {
            $html .= '<td class="der1"><span color="#A52A2A"><strong>Numero Autorizacion: </strong></span></td></tr><tr>
        <td class="clave"><span>';
            $html .= $fuente['claveAcceso'] . '</span></td></tr><tr>';
            $html .= '<td class="der1"><span color="#A52A2A"><strong>Fecha y hora de Autorizacion: </strong></span></td></tr><tr>
        <td class="clave"><span>';
            $html .= $fuente['CustomField13'] . '</span></td></tr><tr>';
            $html .= '<td class="der1"><span color="#A52A2A"><strong>Ambiente : </strong></span><span color="#B8860B">';
            if ($contribuyente['ambiente'] == 1) {
                $porambiente = 'PRUEBAS';
            } else {
                $porambiente = 'PRODUCCION';
            }
            $html .= $porambiente . '</span></td>
</tr>
<tr>
<td class="der1"><span color="#A52A2A"><strong>Emision : </strong></span><span color="#B8860B">';
            if ($contribuyente['emision'] == 1) {
                $poremision = 'NORMAL';
            } else {
                $poremision = 'CONTINGENCIA';
            }
            $html .= $poremision . '</span></td>
</tr></table>';
        } else {
            $html .= '<td class="der"><span color="#A52A2A"><strong>Ambiente : </strong></span><span color="#B8860B">';
            if ($contribuyente['ambiente'] == 1) {
                $porambiente = 'PRUEBAS';
            } else {
                $porambiente = 'PRODUCCION';
            }
            $html .= $porambiente . '</span></td>
</tr>
<tr>
<td class="der"><span color="#A52A2A"><strong>Emision : </strong></span><span color="#B8860B">';
            if ($contribuyente['emision'] == 1) {
                $poremision = 'NORMAL';
            } else {
                $poremision = 'CONTINGENCIA';
            }
            $html .= $poremision . '</span></td>
</tr></table>';
        }

        $html .= '</tr></table>

<table width="100%">
<tr>
<td class="izq">
<span color="#A52A2A"><strong>Identificacion Transportista                    : </strong></span><span color="#B8860B">';
        $html .= $fuente['rucTransportista'] . '</span></p><p>'
           . '<span color="#A52A2A"><strong>Razon Social / Nombres y Apellidos              : </strong></span><span color="#B8860B">';

        $html .= $fuente['razonSocialTransportista'] . '</span></p><p>'
           . '<span color="#A52A2A"><strong>Placa                                             : </strong></span><span color="#B8860B">';

        $html .= $fuente['placa'] . '</span></p><p><span color="#A52A2A"><strong>Punto de Partida                                 : </strong></span><span color="#B8860B">';

        $html .= $fuente['dirPartida'] . '</span></p><p><span color="#A52A2A"><strong>Fecha Inicio                                      : </strong></span><span color="#B8860B">';

        $html .= $fuente['fechaIniTransporte'] . '</span></p><p><span color="#A52A2A"><strong>Fecha Final                                      </strong></span><span color="#B8860B">';
        ;

        $html .= $fuente['fechaFinTransporte'] . '</span></p></td>
</tr>
</table>

<table width="100%">
<tr>
<td class="izq"><p><span color="#A52A2A"><strong>Motivo Traslado : </strong></span><span color="#B8860B">';

        $html .= $fuente['motivoTraslado'] . '</span></p><p><span color="#A52A2A"><strong>Ruta : </strong></span><span color="#B8860B">';

        $html .= $fuente['ruta'] . '</span></p><p><span color="#A52A2A"><strong>Destino : </strong></span><span color="#B8860B">';

        $html .= $fuente['dirDestinatario'] . '</span></p><p><span color="#A52A2A"><strong>Identificacion Destinatario : </strong></span><span color="#B8860B">';

        $html .= $fuente['identificacionDestinatario'] . '</span></p><p><span color="#A52A2A"><strong>Razon Social Destinatario : </strong></span><span color="#B8860B">';

        $html .= $fuente['razonSocialDestinatario'] . '</span></p></td>
</tr>
</table>

<br />

<table class="items" width="100%" style="font-size: 8pt; border-collapse: collapse; " cellpadding="2">
<thead>
<tr>
                <th align="center" width="24%" style="font-weight: bold;">CodigoPrincipal</th>
                <th align="center" width="24%" style="font-weight: bold;">Codigo Auxiliar</th>
                <th align="left" width="38%" style="font-weight: bold;">Descripcion</th>
                <th align="right" width="14%" style="font-weight: bold;">Cantidad</th>
</tr>

</thead>
<tbody>
<!-- ITEMS HERE -->';

        for ($i = 1; $i <= count($fuente['codigo']); $i++) {
            $html .= '<tr><td>' . substr($fuente['descripcion'][$i], 0, 13) . '</td>';
            $html .= '<td>' . $fuente['codigo'][$i] . '</td>';
            $html .= '<td>' . substr($fuente['descripcion'][$i], 14) . '</td>';
            $html .= '<td align="right">' . $fuente['cantidad'][$i] . '</td></tr>';
        }

        $html .= '<!-- END ITEMS HERE -->
</tbody>
</table>
</body>
</html>
';

        $this->session->set('html', $html);
        $mpdf = new \Mpdf\Mpdf([
           'margin_left' => 4,
           'margin_right' => 3,
           'margin_top' => 8,
           'margin_bottom' => 5,
           'margin_header' => 1,
           'margin_footer' => 1
        ]);

        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("Los Coqueiros - Guia");
        $mpdf->SetAuthor("Los Coqueiros");
        $mpdf->SetWatermarkText("");
        if ($fuente['CustomField15'] === "AUTORIZADO") {
            $mpdf->SetWatermarkText("Autorizada");
        }

        $mpdf->showWatermarkText = true;
        $mpdf->watermark_font = 'DejaVuSansCondensed';
        $mpdf->watermarkTextAlpha = 0.1;
        $mpdf->SetDisplayMode('fullpage');

        $mpdf->WriteHTML($html);

        if ($condicion == 1) {
            $mpdf->Output();
        } else {
            $firmado = $a['elpdf'];
            $mpdf->Output($firmado, 'F');
        }
    }

    function llenaGuia() {

        $a = $this->session->get('archivos');
        $firmado = $a['firmado'];
        $w_cabecera = $this->session->get('cabecera');
        $ruc = $this->session->get('contribuyente');
        $doc1 = new DOMDocument();
        $doc1->load($firmado);

        $fuente['ciudad'] = $w_cabecera['direccionComprador'];
        $stringDate = strtotime($w_cabecera['fechaDocumento']);
        $dateString = date('d/m/Y', $stringDate);
        $fuente['fechaDocumento'] = $dateString;
        $fuente['CustomField1'] = $w_cabecera['CustomField1'];
        $fuente['CustomField9'] = $w_cabecera['CustomField9'];
        $fuente['CustomField11'] = $w_cabecera['CustomField11'];
        $fuente['CustomField12'] = $w_cabecera['CustomField12'];
        $fuente['SalesRepRef_FullName'] = $w_cabecera['SalesRepRef_FullName'];
        $fuente['Memo'] = $w_cabecera['Memo'];
        $fuente['TermsRef_FullName'] = $w_cabecera['TermsRef_FullName'];
        if ($w_cabecera['CustomField13'] <> "") {
            $fuente['CustomField13'] = $w_cabecera['CustomField13'];
            $fuente['CustomField14'] = $w_cabecera['CustomField14'];
        } else {
            $fuente['CustomField13'] = $this->session->get('fechaAutorizacion');
            $fuente['CustomField14'] = $this->session->get('numeroAutorizacion');
        }
        $fuente['CustomField15'] = $w_cabecera['CustomField15'];
        $fuente['ambiente'] = $doc1->getElementsByTagName('ambiente')->item(0)->nodeValue;
        $fuente['tipoEmision'] = $doc1->getElementsByTagName('tipoEmision')->item(0)->nodeValue;
        $fuente['razonSocial'] = $doc1->getElementsByTagName('razonSocial')->item(0)->nodeValue;
        $fuente['nombreComercial'] = $doc1->getElementsByTagName('nombreComercial')->item(0)->nodeValue;
        $fuente['ruc'] = $doc1->getElementsByTagName('ruc')->item(0)->nodeValue;
        $fuente['claveAcceso'] = $doc1->getElementsByTagName('claveAcceso')->item(0)->nodeValue;
        $fuente['codDoc'] = $doc1->getElementsByTagName('codDoc')->item(0)->nodeValue;
        $fuente['estab'] = $doc1->getElementsByTagName('estab')->item(0)->nodeValue;
        $fuente['ptoEmi'] = $doc1->getElementsByTagName('ptoEmi')->item(0)->nodeValue;
        $fuente['secuencial'] = $doc1->getElementsByTagName('secuencial')->item(0)->nodeValue;
        $fuente['dirMatriz'] = $doc1->getElementsByTagName('dirMatriz')->item(0)->nodeValue;
        $fuente['fechaEmision'] = $doc1->getElementsByTagName('fechaEmision')->item(0)->nodeValue;
        $fuente['obligado'] = $doc1->getElementsByTagName('obligadoContabilidad')->item(0)->nodeValue;
        $fuente['dirEstablecimiento'] = $doc1->getElementsByTagName('dirEstablecimiento')->item(0)->nodeValue;
        $fuente['dirPartida'] = $doc1->getElementsByTagName('dirPartida')->item(0)->nodeValue;
        $fuente['razonSocialTransportista'] = $doc1->getElementsByTagName('razonSocialTransportista')->item(0)->nodeValue;
        $fuente['tipoIdentificacionTransportista'] = $doc1->getElementsByTagName('tipoIdentificacionTransportista')->item(0)->nodeValue;
        $fuente['rucTransportista'] = $doc1->getElementsByTagName('rucTransportista')->item(0)->nodeValue;
        $fuente['fechaIniTransporte'] = $doc1->getElementsByTagName('fechaIniTransporte')->item(0)->nodeValue;
        $fuente['fechaFinTransporte'] = $doc1->getElementsByTagName('fechaFinTransporte')->item(0)->nodeValue;
        $fuente['placa'] = $doc1->getElementsByTagName('placa')->item(0)->nodeValue;
        $fuente['identificacionDestinatario'] = $doc1->getElementsByTagName('identificacionDestinatario')->item(0)->nodeValue;
        $fuente['razonSocialDestinatario'] = $doc1->getElementsByTagName('razonSocialDestinatario')->item(0)->nodeValue;
        $fuente['dirDestinatario'] = $doc1->getElementsByTagName('dirDestinatario')->item(0)->nodeValue;
        $fuente['motivoTraslado'] = $doc1->getElementsByTagName('motivoTraslado')->item(0)->nodeValue;
        $fuente['ruta'] = $doc1->getElementsByTagName('ruta')->item(0)->nodeValue;
        $fuente['elemento1'] = 'Identificacion (Transportista)                       :';


        $Tag_product = $doc1->getElementsByTagName('detalle');
        $lineas = 0;
        foreach ($Tag_product as $producto) {
            $lineas++;
            if ($producto->hasChildNodes()) {
                foreach ($producto->childNodes as $child) {
                    switch ($child->nodeName) {
                        case 'codigoInterno':
                            $fuente['codigo'][$lineas] = $child->nodeValue;
                            break;
                        case 'cantidad':
                            $fuente['cantidad'][$lineas] = $child->nodeValue;
                            break;
                        case 'descripcion':
                            $fuente['descripcion'][$lineas] = $child->nodeValue;
                            break;
                    }
                }
            }
        }

        $this->session->set('fuente', $fuente);
    }

}
