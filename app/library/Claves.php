<?php

use Phalcon\Mvc\User\Component;

class Claves extends Component {

    function __construct() {
        
    }

    public function respuestaSRI($firmado, $ambiente) {
        $respuestaSRI = array();
        $doc = new DOMDocument();
        $doc->load($firmado);
        $claveAcceso = $doc->getElementsByTagName('claveAcceso')->item(0)->nodeValue;
        $_SESSION['claveAcceso'] = $claveAcceso . ' firmado ' . $firmado . ' ambiente ' . $ambiente;
        if ($ambiente == 1) {
            $wsdl = "https://celcer.sri.gob.ec/comprobantes-electronicos-ws/AutorizacionComprobantesOffline?wsdl";
        } else {
            $wsdl = "https://cel.sri.gob.ec/comprobantes-electronicos-ws/AutorizacionComprobantesOffline?wsdl";
        }

        $options = array('soap_version' => SOAP_1_1, 'trace' => true);
        $client = new SoapClient($wsdl, $options);

        try {
            $respuesta = $client->autorizacionComprobante(array('claveAccesoComprobante' => $claveAcceso));
            $datosXML = $client->__getLastResponse();
        } catch (SoapFault $exp) {
            
        }
        $doc1 = new DOMDocument();
        $doc1->loadXML($datosXML);
        $claveConsultada = $doc1->getElementsByTagName('claveAccesoConsultada')->item(0)->nodeValue;
        if ($claveAcceso === $claveConsultada) {
            $proceso = $doc1->getElementsByTagName('estado')->item(0)->nodeValue;
            if ($proceso === "AUTORIZADO") {
                $nroAut = $doc1->getElementsByTagName('numeroAutorizacion')->item(0)->nodeValue;
                $fecAut = $doc1->getElementsByTagName('fechaAutorizacion')->item(0)->nodeValue;
                $respuestaSRI['mensaje'] = $proceso;
                $respuestaSRI['numeroAutorizacion'] = $nroAut;
                $respuestaSRI['fechaAutorizacion'] = $fecAut;
            } else {
                $respuestaSRI['mensaje'] = $this->facturaRechazada($doc1);
            }
        } else {
            $respuestaSRI['mensaje'] = $this->facturaRechazada($doc1);
        }
        $doc1->save('porFormato.xml');
        return $respuestaSRI;
    }
    function facturaRechazada($node) {
        $mensaje = '';
        try {
            $Tag_autorizacion = $node->getElementsByTagName('autorizacion');
            foreach ($Tag_autorizacion as $autoriza) {
                $string_mensaje = NULL;
                if ($autoriza->hasChildNodes()) {
                    foreach ($autoriza->childNodes as $child) {
                        switch ($child->nodeName) {
                            case 'estado':
                                $string_mensaje = " EL MENSAJE DE RECHAZO TIENE => estado:" . $child->nodeValue;
                                break;
                            case 'fechaAutorizacion':
                                $stringDate = strtotime($child->nodeValue);
                                $dateString = date('d/m/Y h:m:s', $stringDate);
                                $string_mensaje .= ' fecha rechazo: ' . $dateString . " en ";
                                break;
                            case 'ambiente':
                                $string_mensaje .= ' ambiente de: ' . $child->nodeValue;
                                break;
                            default:
                                break;
                        }
                    }
                }
                $mensaje .= $string_mensaje;
            }
        } catch (Exception $exc) {
            $mensaje .= $exc->getTraceAsString();
        }
        $mensaje .= $this->sri_mensajes_rechazada($node);
        return $mensaje;
    }
    function sriCliente($firmado, $ambiente) {
        $doc = new DOMDocument();
        $doc->load($firmado);
        $content = $doc->saveXML();
        if ($ambiente == 1) {
            $wsdl = "https://celcer.sri.gob.ec/comprobantes-electronicos-ws/RecepcionComprobantesOffline?wsdl";
        } else {
            $wsdl = "https://cel.sri.gob.ec/comprobantes-electronicos-ws/RecepcionComprobantesOffline?wsdl";
        }
        $options = array('soap_version' => SOAP_1_1, 'trace' => true);
        $client = new SoapClient($wsdl, $options);
        try {
            $respuesta = $client->ValidarComprobante(array('xml' => $content));
            $datosXML = $client->__getLastResponse();
        } catch (SoapFault $exp) {
            
        }
        $doc = new DOMDocument();
        $doc->loadXML($datosXML);
        $mensaje = $doc->getElementsByTagName('estado')->item(0)->nodeValue;
        if ($mensaje == 'RECIBIDA') {
            $recibida = "RECIBIDA";
        } else {
            $mensaje = $this->sri_mensajes_rechazada($doc);
        }
        return $mensaje;
    }
    function sri_mensajes_rechazada($node) {
        $fin_mensaje = '';
        try {
            $Tag_mensajes = $node->getElementsByTagName('mensaje');
            foreach ($Tag_mensajes as $autoriza) {
                $string_mensaje = NULL;
                if ($autoriza->hasChildNodes()) {
                    foreach ($autoriza->childNodes as $mensaje) {
                        switch ($mensaje->nodeName) {
                            case "identificador":
                                $string_mensaje = " EL MENSAJE DE ERROR TIENE => codigo: " . $mensaje->nodeValue;
                                break;
                            case "mensaje":
                                $string_mensaje .= ' mensaje: ' . $mensaje->nodeValue;
                                break;
                            case "informacionAdicional":
                                $string_mensaje .= ' informacion adicional: ' . $mensaje->nodeValue;
                                break;
                            case "tipo":
                                $string_mensaje .= ' tipo: ' . $mensaje->nodeValue;
                                break;
                        }
                    }
                    $fin_mensaje .= $string_mensaje;
                }
            }
        } catch (Exception $exc) {
            $fin_mensaje .= $exc->getTraceAsString();
        }
        return $fin_mensaje;
    }
    function generaString($param) {
        $claveArray = [];
        $limite = $param['longitud'];

        for ($x = 0; $x < $limite; $x++) {
            $claveArray[$x] = 0;
        }

        $args['tabla'] = $param['dato'];
        $args['posini'] = 0;
        $args['posfin'] = $param['longitud'];
        $args['vector'] = $param['vector'];
        $args['relleno'] = $param['relleno'];

        if ($args['vector'] == "I") {
            $claveArray = $this->haceIzq($args);
        } else {
            $claveArray = $this->haceDer($args);
        }
        return $claveArray;
    }

    function haceDer($param) {
//    echo 'Viene ';
//    var_dump($param);
        $paso = str_split($param['tabla']);
//    var_dump($paso);
        $claveArray = [];
        $limite = $param['posfin'];
        for ($x = 0; $x < $limite; $x++) {
            $claveArray[$x] = 0;
        }
        $j = count($paso) - 1;
        $posini = $param['posini'];
        $posfin = $param['posfin'];
        $flag = TRUE;
        while ($flag) {
            if ($posfin >= $posini) {
//        echo 'Esto tiene ini ' . $posini . ' Esto tiene fin ' . $posfin;
                if ($j >= 0) {
                    $claveArray[$posfin] = $paso[$j];
                    if ($param['relleno'] == 'N') {
                        if (!is_numeric($claveArray[$posfin])) {
                            $claveArray[$posfin] = '0';
                        }
                    } else {
                        if (is_numeric($claveArray[$posfin])) {
                            $claveArray[$posfin] = ' ';
                        }
                    }

                    $j--;
                } else {
                    if ($param['relleno'] == 'N') {
                        $claveArray[$posfin] = '0';
                    } else {
                        $claveArray[$posfin] = ' ';
                    }
                }
                $posfin--;
            } else {
                $flag = FALSE;
            }
        }
        return $claveArray;
    }

    function haceIzq($param) {
//    echo 'Viene ';
//    var_dump($param);
        $paso = str_split($param['tabla']);
        $claveArray = [];
        $limite = $param['posfin'];
        for ($x = 0; $x < $limite; $x++) {
            $claveArray[$x] = 0;
        }
        $j = count($paso) - 1;
        $i = 0;
        $posini = $param['posini'];
        $posfin = $param['posfin'];
        $flag = TRUE;
        while ($flag) {
            if ($posini <= $posfin) {
//        echo 'Esto tiene ini ' . $posini . ' Esto tiene fin ' . $posfin;
                if ($i <= $j) {
                    $claveArray[$posini] = $paso[$i];
                    if ($param['relleno'] == 'N') {
                        if (!is_numeric($claveArray[$posini])) {
                            $claveArray[$posini] = '0';
                        }
                    } else {
                        if (is_numeric($claveArray[$posini])) {
                            $claveArray[$posini] = ' ';
                        }
                    }

                    $i++;
                } else {
                    if ($param['relleno'] == 'N') {
                        $claveArray[$posini] = '0';
                    } else {
                        $claveArray[$posini] = ' ';
                    }
                }
                $posini++;
            } else {
                $flag = FALSE;
            }
        }
        return $claveArray;
    }

    function limpiaString($string) {

        $string = str_replace(
           array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'), array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'), $string
        );

        $string = str_replace(
           array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'), array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'), $string
        );

        $string = str_replace(
           array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'), array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'), $string
        );

        $string = str_replace(
           array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'), array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'), $string
        );

        $string = str_replace(
           array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'), array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'), $string
        );

        $string = str_replace(
           array('ñ', 'Ñ', 'ç', 'Ç'), array('n', 'N', 'c', 'C',), $string
        );

        return preg_replace('/[^A-Za-z0-9 ,.\-]/', ' ', $string); // Removes special chars.
    }

    /*
     * El argumento $param debe ser una array asociativa 
     */

//$args['fecha'] = '02062014';
//$args['tipodoc'] = '01';
//$args['ruc'] = '1792067464001';
//$args['ambiente'] = '2';
//$args['establecimiento'] = '001';
//$args['punto'] = '001';
//$args['factura'] = '000039540';
//$args['codigo'] = '00039540';
//$args['emision'] = '1';
//$claveArray = [];
//$claveArray = generaClave($args);
//echo 'Esta es la resultante ';
//var_dump($claveArray);
//$digito = poneDigito($claveArray);
//echo 'Este es el digito autoverificador => ' . $digito;
    function poneDigito($param) {
        $posfin = 47;
        $flag = TRUE;
        $j = 2;
        $suma = 0;
        while ($flag) {
            if ($posfin >= 0) {
                $suma = $suma + ($param[$posfin] * $j);
//            echo $suma;
                $j++;
                if ($j > 7) {
                    $j = 2;
                }
                $posfin--;
            } else {
                $flag = FALSE;
            }
        }
//    echo 'Esta es la suma ' . $suma;
        $tienecero = $suma % 11;
        if ($tienecero == 0) {
            $digito = 0;
        } else {
            $digito = 11 - ($suma % 11);
        }
//    echo '<br>Este es el digito verificador ' . $digito;
        if ($digito == 10) {
            $digito = 1;
        }
        return $digito;
    }

    function generaClave($param) {
        $claveArray = [];
        /*
         * Generar con ceros la tabla de hasta 49 posiciones
         */
        for ($x = 0; $x < 49; $x++) {
            $claveArray[$x] = 0;
        }
        /*
         * Proceso de convertir cada campo en array para adicionar a la array de la clave
         */

        $args['tabla'] = $param['fecha'];
        $args['posini'] = 0;
        $args['posfin'] = 7;
        $args['claveArray'] = $claveArray;
        $claveArray = $this->haceArray($args);
//echo 'Pasa fecha';

        $args['tabla'] = $param['tipodoc'];
        $args['posini'] = 8;
        $args['posfin'] = 9;
        $args['claveArray'] = $claveArray;
        $claveArray = $this->haceArray($args);
//echo 'Pasa tipo documento';

        $args['tabla'] = $param['ruc'];
        $args['posini'] = 10;
        $args['posfin'] = 22;
        $args['claveArray'] = $claveArray;
        $claveArray = $this->haceArray($args);
//echo 'Pasa ruc';


        $args['tabla'] = $param['ambiente'];
        $args['posini'] = 23;
        $args['posfin'] = 23;
        $args['claveArray'] = $claveArray;
        $claveArray = $this->haceArray($args);



        $args['tabla'] = $param['establecimiento'];
        $args['posini'] = 24;
        $args['posfin'] = 26;
        $args['claveArray'] = $claveArray;
        $claveArray = $this->haceArray($args);



        $args['tabla'] = $param['punto'];
        $args['posini'] = 27;
        $args['posfin'] = 29;
        $args['claveArray'] = $claveArray;
        $claveArray = $this->haceArray($args);



        $args['tabla'] = $param['factura'];
        $args['posini'] = 30;
        $args['posfin'] = 38;
        $args['claveArray'] = $claveArray;
        $claveArray = $this->haceArray($args);



        $args['tabla'] = $param['codigo'];
        $args['posini'] = 39;
        $args['posfin'] = 46;
        $args['claveArray'] = $claveArray;
        $claveArray = $this->haceArray($args);



        $args['tabla'] = $param['emision'];
        $args['posini'] = 47;
        $args['posfin'] = 47;
        $args['claveArray'] = $claveArray;
        $claveArray = $this->haceArray($args);
        $digito = $this->poneDigito($claveArray);
        $claveArray[48] = $digito;
        return $claveArray;
    }

    function haceArray($param) {
//    echo 'Viene ';
//    var_dump($param);
        $paso = str_split($param['tabla']);

        $j = count($paso) - 1;
        $posini = $param['posini'];
        $posfin = $param['posfin'];
        $claveArray = $param['claveArray'];
        $flag = TRUE;
        while ($flag) {
            if ($posfin >= $posini) {
//        echo 'Esto tiene ini ' . $posini . ' Esto tiene fin ' . $posfin;
                if ($j >= 0) {
                    $claveArray[$posfin] = $paso[$j];
                    $j--;
                }
                $posfin--;
            } else {
                $flag = FALSE;
            }
        }
        return $claveArray;
    }

    function generaContingencia($param) {
        $claveArray = [];
        /*
         * Generar con ceros la tabla de hasta 49 posiciones
         */
        for ($x = 0; $x < 49; $x++) {
            $claveArray[$x] = 0;
        }
        /*
         * Proceso de convertir cada campo en array para adicionar a la array de la clave
         */

        $args['tabla'] = $param['fecha'];
        $args['posini'] = 0;
        $args['posfin'] = 7;
        $args['claveArray'] = $claveArray;
        $claveArray = haceArray($args);
//echo 'Pasa fecha';

        $args['tabla'] = $param['tipodoc'];
        $args['posini'] = 8;
        $args['posfin'] = 9;
        $args['claveArray'] = $claveArray;
        $claveArray = haceArray($args);
//echo 'Pasa tipo documento';

        $args['tabla'] = $param['ruc'];
        $args['posini'] = 10;
        $args['posfin'] = 22;
        $args['claveArray'] = $claveArray;
        $claveArray = haceArray($args);
//echo 'Pasa ruc';


        $args['tabla'] = $param['ambiente'];
        $args['posini'] = 23;
        $args['posfin'] = 23;
        $args['claveArray'] = $claveArray;
        $claveArray = haceArray($args);



        $args['tabla'] = $param['contingencia'];
        $args['posini'] = 24;
        $args['posfin'] = 46;
        $args['claveArray'] = $claveArray;
        $claveArray = haceArray($args);

        $args['tabla'] = $param['emision'];
        $args['posini'] = 47;
        $args['posfin'] = 47;
        $args['claveArray'] = $claveArray;
        $claveArray = haceArray($args);
        $digito = poneDigito($claveArray);
        $claveArray[48] = $digito;
        return $claveArray;
    }

    function generaDoc($RefNumber) {

        $doc = array();
        $guiones = explode('-', $RefNumber);
        $args1['dato'] = $guiones[2];
        $args1['longitud'] = 8; // debe ser -1 de la longitud deseada
        $args1['vector'] = 'D'; //I=Izquierdo D=Derecho;
        $args1['relleno'] = 'N'; //N=Numero A=Alfas;
        $doc['documento'] = implode($this->generaString($args1));

        $args1['dato'] = $guiones[1];
        $args1['longitud'] = 2; // debe ser -1 de la longitud deseada
        $args1['vector'] = 'D'; //I=Izquierdo D=Derecho;
        $args1['relleno'] = 'N'; //N=Numero A=Alfas;
        $doc['punto'] = implode($this->generaString($args1));

        $args1['dato'] = $guiones[0];
        $args1['longitud'] = 2; // debe ser -1 de la longitud deseada
        $args1['vector'] = 'D'; //I=Izquierdo D=Derecho;
        $args1['relleno'] = 'N'; //N=Numero A=Alfas;
        $doc['estab'] = implode($this->generaString($args1));
        return $doc;
    }

    function registraContribuyente($ruc) {
        $rucPasa = array(
           'id' => $ruc->Id,
           'estab' => $ruc->CodEmisor,
           'punto' => $ruc->Punto,
           'ruc' => $ruc->Ruc,
           'razon' => $ruc->Razon,
           'emision' => $ruc->Emision,
           'ambiente' => $ruc->Ambiente,
           'NombreComercial' => $ruc->NombreComercial,
           'DirMatriz' => $ruc->DirMatriz,
           'DirEmisor' => $ruc->DirEmisor,
           'Resolucion' => $ruc->Resolucion,
           'LlevaContabilidad' => $ruc->LlevaContabilidad
        );
        return $rucPasa;
    }

    function registraArchivos($estab, $punto, $documento, $pref, $direc) {
        $prefijo = $pref . '_' . $estab . $punto . '_' . $documento . '.xml';
        $prefij = $pref . '_' . $estab . $punto . '_' . $documento . '.pdf';
        $firmado = $_SERVER['DOCUMENT_ROOT'] . '/ComprobantesSRI/' . $direc . '/firmados/' . $prefijo;
        $autorizado = $_SERVER['DOCUMENT_ROOT'] . '/ComprobantesSRI/' . $direc . '/autorizados/' . $prefijo;
        $elpdf = $_SERVER['DOCUMENT_ROOT'] . '/ComprobantesSRI/' . $direc . '/autorizados/' . $prefij;
        $generado = $_SERVER['DOCUMENT_ROOT'] . '/ComprobantesSRI/' . $direc . '/generados/' . $prefijo;
        $creado = $_SERVER['DOCUMENT_ROOT'] . '/ComprobantesSRI/ecuador/generado.xml';
        $pasado = $_SERVER['DOCUMENT_ROOT'] . '/ComprobantesSRI/ecuador/firmado.xml';
        $archivos = array(
           'firmado' => $firmado,
           'autorizado' => $autorizado,
           'elpdf' => $elpdf,
           'generado' => $generado,
           'creado' => $creado,
           'pasado' => $pasado
        );
        return $archivos;
    }

    function crea_clave($paramClave) {

        $creaClave = array();
        $stringDate = strtotime($paramClave['fechaDocumento']);
        $dateString = date('dmY', $stringDate);
        $args['fecha'] = $dateString;
        $args['tipodoc'] = $paramClave['tipoDocumento'];

        $args1['dato'] = $paramClave['rucComprador'];
        $creaClave['tipoIdentificacion'] = '04'; // ruc 04 cedula 05 pasaporte 06 consumidor final 07
        $args1['longitud'] = 12;
        if ($paramClave['rucComprador'] == '9999999999999') {
            $creaClave['tipoIdentificacion'] = '07';
        } else {
            if (strlen($paramClave['rucComprador']) == 10) {
                $creaClave['tipoIdentificacion'] = '05';
                $args1['longitud'] = 9;
            } elseif (strlen($paramClave['rucComprador']) < 10 OR strlen($paramClave['rucComprador']) > 13) {
                $creaClave['tipoIdentificacion'] = '08';
                $args1['longitud'] = strlen($paramClave['rucComprador']) - 1;
            }
        }

        $args1['vector'] = 'D'; //I=Izquierdo D=Derecho;
        $args1['relleno'] = 'N'; //N=Numero A=Alfas;
        $creaClave['rucLimpio'] = implode($this->generaString($args1));

        $args['ruc'] = $paramClave['ruc']; // llenar a 13 si es cedula

        $args['ambiente'] = $paramClave['ambiente'];
        $args['establecimiento'] = $paramClave['estab'];
        $args['punto'] = $paramClave['punto'];

        $args1['dato'] = $paramClave['numeroDocumento'];
        $args1['longitud'] = 8; // debe ser -1 de la longitud deseada
        $args1['vector'] = 'D'; //I=Izquierdo D=Derecho;
        $args1['relleno'] = 'N'; //N=Numero A=Alfas;
        $creaClave['numeroDocumentoLleno'] = implode($this->generaString($args1));

        $args['factura'] = $creaClave['numeroDocumentoLleno']; // llenar a 9

        $args1['dato'] = $paramClave['numeroTransaccion'];
        $args1['longitud'] = 7; // debe ser -1 de la longitud deseada
        $args1['vector'] = 'D'; //I=Izquierdo D=Derecho;
        $args1['relleno'] = 'N'; //N=Numero A=Alfas;
        $creaClave['numeroTransaccionLleno'] = implode($this->generaString($args1));

        $args['codigo'] = $creaClave['numeroTransaccionLleno']; // mismo numero factura? o secuencial
        $args['emision'] = $paramClave['emision'];
        $claveArray = [];

        $claveArray = $this->generaClave($args);

        $creaClave['claveAcceso'] = $claveArray;
        return $creaClave;
    }

    function guid($opt = true) {       //  Set to true/false as your default way to do this.
        if (function_exists('com_create_guid')) {
            if ($opt) {
                return com_create_guid();
            } else {
                return trim(com_create_guid(), '{}');
            }
        } else {
            mt_srand((double) microtime() * 10000);    // optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);    // "-"
            $left_curly = $opt ? chr(123) : "";     //  "{"
            $right_curly = $opt ? chr(125) : "";    //  "}"
            $uuid = $left_curly
               . substr($charid, 0, 8) . $hyphen
               . substr($charid, 8, 4) . $hyphen
               . substr($charid, 12, 4) . $hyphen
               . substr($charid, 16, 4) . $hyphen
               . substr($charid, 20, 12)
               . $right_curly;
            return $uuid;
        }
    }
    
    public function nuevoNumero($tipo, $elemento) {
        $parameters = array('conditions' => '[tipoCod] = "' . $tipo . '" AND [type] = "' . $elemento . '"');
        $numero = Codetype::findFirst($parameters);
        $codeValue = $numero->getCodeValue();
        $codeValue++;
        $numero->setCodeValue($codeValue);
        $pasar = array("Mensaje" => "OK", "Nuevo Valor" => $codeValue);
        if (!$numero->save()) {
            foreach ($numero->getMessages() as $message) {
                $pasar['Mensaje'] = $message;
            }
        }
        return $pasar;
    }

}