<?php

/**
 * Description of Facturae
 *
 * @author jrcsc
 */
class Facturae {
    /* CONSTANTS */

    const SCHEMA_3_2 = "3.2";
    const SCHEMA_3_2_1 = "3.2.1";
    const SCHEMA_3_2_2 = "3.2.2";

    /* PRIVATE CONSTANTS */

    private static $SCHEMA_NS = array(
       self::SCHEMA_3_2 => "http://www.facturae.es/Facturae/2009/v3.2/Facturae",
       self::SCHEMA_3_2_1 => "http://www.facturae.es/Facturae/2014/v3.2.1/Facturae",
       self::SCHEMA_3_2_2 => "http://www.facturae.gob.es/formato/Versiones/Facturaev3_2_2.xml"
    );


    /* ATTRIBUTES */
    private $signTime = NULL;
    private $publicKey = NULL;
    private $derKey = NULL;
    private $privateKey = NULL;

    public function __construct($schemaVersion = self::SCHEMA_3_2_1) {
        $this->setSchemaVersion($schemaVersion);
    }

    private function random() {
//        if (function_exists('random_int')) {
//            return random_int(0x10000000, 0x7FFFFFFF);
//        } else {
//            return rand(100000, 999999);
//        }
        return rand(100000, 999999);
    }
  
    public function setSchemaVersion($schemaVersion) {
        $this->version = $schemaVersion;
    }

    public function setSignTime($time) {
        $this->signTime = is_string($time) ? strtotime($time) : $time;
    }

    /**
     * Load a PKCS#12 Certificate Store
     *
     * @param  string  $pkcs12File  The certificate store file name
     * @param  string  $pkcs12Pass  Encryption password for unlocking the PKCS#12 file
     * @return boolean              Success
     */
    private function loadPkcs12($pkcs12File, $pkcs12Pass = "") {
        if (!is_file($pkcs12File))
            return false;
        if (openssl_pkcs12_read(file_get_contents($pkcs12File), $certs, $pkcs12Pass)) {
            $this->publicKey = openssl_x509_read($certs['cert']);
            $this->privateKey = openssl_pkey_get_private($certs['pkey']);
        }

        return (!empty($this->publicKey) && !empty($this->privateKey));
    }

    /**
     * Load a X.509 certificate and PEM encoded private key
     *
     * @param  string $publicPath  Path to public key PEM file
     * @param  string $privatePath Path to private key PEM file
     * @param  string $passphrase  Private key passphrase
     * @return bool                Success
     */
    private function loadX509($publicPath, $privatePath, $derPath, $passphrase = "") {
        $this->publicKey = openssl_x509_read(file_get_contents($publicPath));
        $this->derKey = file_get_contents($derPath);
        $this->privateKey = openssl_pkey_get_private(
           file_get_contents($privatePath), $passphrase
        );
        return (!empty($this->publicKey) && !empty($this->privateKey));
    }

    /**
     * Sign
     *
     * @param  string  $publicPath  Path to public key PEM file or PKCS#12 certificate store
     * @param  string  $privatePath Path to private key PEM file (should be NULL in case of PKCS#12)
     * @param  string  $passphrase  Private key passphrase
     * @param  array   $policy      Facturae sign policy
     * @return boolean              Success
     */
    public function sign() {
//    public function sign($archivopkcs12, $passphrase) {
        $this->publicKey = NULL;
        $this->derKey = NULL;
        $this->privateKey = NULL;

        // Generate random IDs
        $this->signatureID = $this->random();
        $this->signedInfoID = $this->random();
        $this->signedPropertiesID = $this->random();
        $this->signatureValueID = $this->random();
        $this->certificateID = $this->random();
        $this->referenceID = $this->random();
        $this->signatureSignedPropertiesID = $this->random();
        $this->signatureObjectID = $this->random();
        $publicPath = $_SERVER['DOCUMENT_ROOT'] . '/ComprobantesSRI/ecuador/clave_publica.pem';
        $derPath = $_SERVER['DOCUMENT_ROOT'] . '/ComprobantesSRI/ecuador/clave_publica.der';
        $privatePath = $_SERVER['DOCUMENT_ROOT'] . '/ComprobantesSRI/ecuador/clave_privada.pem';
        $passphrase = 'AnyaCarrill0';
        $archivopkcs12 = 'hugo_xavier_bustos_neira.pfx';
        $clavepkcs12 = 'FE2018coq';
//        return $this->loadX509($publicPath, $privatePath, $derPath, $passphrase);
        return $this->loadPkcs12($archivopkcs12, $clavepkcs12);
    }

    /**
     * Inject signature
     *
     * @param  string Unsigned XML document
     * @return string Signed XML document
     */
    private function injectSignature($doc) {

//        $xml = str_replace("\r", "", $xml);
//        $xml = str_replace("\n", "", $xml);
        $xml = $doc->C14N();
        $_SESSION['injectSignature'] = $xml;
        $xmlns = array();
        $xmlns[] = 'xmlns:ds="http://www.w3.org/2000/09/xmldsig#"';
        $xmlns[] = 'xmlns:etsi="http://uri.etsi.org/01903/v1.3.2#"';
        $xmlns = implode(' ', $xmlns);


        // Prepare signed properties
        $signTime = is_null($this->signTime) ? time() : $this->signTime;
        $certData = openssl_x509_parse($this->publicKey);
//        $certDigest = openssl_x509_fingerprint($this->publicKey, "sha1", true); // ALTERNATIVA 1
//        $certDigest = base64_encode($certDigest); // ALTERNATIVA 1
//        $certDigest = base64_encode(sha1($this->derKey, true)); // ALTERNATIVA 2
/**
 *      INICIO de la ALTERNATIVA 3
 */
        $archivopkcs12 = $_SERVER['DOCUMENT_ROOT'] . '/ComprobantesSRI/ecuador/hugo_xavier_bustos_neira.pfx';
        $certificado_p12 = file_get_contents($archivopkcs12);
        if (openssl_pkcs12_read($certificado_p12, $pkcs12, "FE2018coq" )) {
            $certificado = $pkcs12['extracerts'][0];
            $certificado = str_replace('—–BEGIN CERTIFICATE—–', '', $certificado);
            $certificado = str_replace('—–END CERTIFICATE—–', '', $certificado);
            $certificado = str_replace('\n', '', $certificado);
            $certificado = str_split($certificado, 76);
            $certificado = implode('\n', $certificado);
            $certificado_b64 = str_replace('\n', '', $certificado);
            $certDigest = base64_encode(hash('sha1', base64_decode($certificado_b64), true));
        }
/**
 *      FIN de la ATERNATIVA 3
 */        
        $certIssuer = array();
        foreach ($certData['issuer'] as $item => $value) {
            $certIssuer[] = $item . '=' . $value;
        }
        $certIssuer = implode(',', $certIssuer);
        // Generate signed properties
        $prop = '<etsi:SignedProperties Id="Signature' . $this->signatureID .
           '-SignedProperties' . $this->signatureSignedPropertiesID . '">' .
           '<etsi:SignedSignatureProperties>' .
           '<etsi:SigningTime>' . date('c', $signTime) . '</etsi:SigningTime>' .
           '<etsi:SigningCertificate>' .
           '<etsi:Cert>' .
           '<etsi:CertDigest>' .
           '<ds:DigestMethod Algorithm="http://www.w3.org/2000/09/xmldsig#sha1"></ds:DigestMethod>' .
           '<ds:DigestValue>' . $certDigest . '</ds:DigestValue>' .
           '</etsi:CertDigest>' .
           '<etsi:IssuerSerial>' .
           '<ds:X509IssuerName>' . $certIssuer . '</ds:X509IssuerName>' .
           '<ds:X509SerialNumber>' . $certData['serialNumber'] . '</ds:X509SerialNumber>' .
           '</etsi:IssuerSerial>' .
           '</etsi:Cert>' .
           '</etsi:SigningCertificate>' .
           '</etsi:SignedSignatureProperties>' .
           '<etsi:SignedDataObjectProperties>' .
           '<etsi:DataObjectFormat ObjectReference="#Reference-ID-' . $this->referenceID . '">' .
           '<etsi:Description>Factura electrónica Generada por CarrillosTeam.com</etsi:Description>' .
           '<etsi:MimeType>text/xml</etsi:MimeType>' .
           '</etsi:DataObjectFormat>' .
           '</etsi:SignedDataObjectProperties>' .
           '</etsi:SignedProperties>';
        $_SESSION['Generate signed properties'] = $prop;
        // Prepare key info
        $publicPEM = "";
        openssl_x509_export($this->publicKey, $publicPEM);
        $publicPEM = str_replace("-----BEGIN CERTIFICATE-----", "", $publicPEM);
        $publicPEM = str_replace("-----END CERTIFICATE-----", "", $publicPEM);
        $publicPEM = str_replace("\n", "", $publicPEM);
        $publicPEM = str_replace("\r", "", chunk_split($publicPEM, 76));

        $privateData = openssl_pkey_get_details($this->privateKey);
        $modulus = chunk_split(base64_encode($privateData['rsa']['n']), 76);
        $modulus = str_replace("\r", "", $modulus);
        $exponent = base64_encode($privateData['rsa']['e']);
        // Generate KeyInfo
        $kInfo = '<ds:KeyInfo Id="Certificate' . $this->certificateID . '">' . "\n" .
           '<ds:X509Data>' . "\n" .
           '<ds:X509Certificate>' . "\n" . $publicPEM . '</ds:X509Certificate>' . "\n" .
           '</ds:X509Data>' . "\n" .
           '<ds:KeyValue>' . "\n" .
           '<ds:RSAKeyValue>' . "\n" .
           '<ds:Modulus>' . "\n" . $modulus . '</ds:Modulus>' . "\n" .
           '<ds:Exponent>' . $exponent . '</ds:Exponent>' . "\n" .
           '</ds:RSAKeyValue>' . "\n" .
           '</ds:KeyValue>' . "\n" .
           '</ds:KeyInfo>';
        $_SESSION['Generate KeyInfo '] =  $kInfo;
        // Calculate digests
        $xmlprop = str_replace('<etsi:SignedProperties', '<etsi:SignedProperties ' . $xmlns, $prop);
        $propDigest = base64_encode(sha1($xmlprop, true));
        $xmlkinfo = str_replace('<ds:KeyInfo', '<ds:KeyInfo ' . $xmlns, $kInfo);
        $kInfoDigest = base64_encode(sha1($xmlkinfo, true));
        $documentDigest = base64_encode(sha1($xml, true));

        // <br> Generate SignedInfo<br> 
        $sInfo = '<ds:SignedInfo Id="Signature-SignedInfo' . $this->signedInfoID . '">' . "\n" .
           '<ds:CanonicalizationMethod Algorithm="http://www.w3.org/TR/2001/REC-xml-c14n-20010315">' .
           '</ds:CanonicalizationMethod>' . "\n" .
           '<ds:SignatureMethod Algorithm="http://www.w3.org/2000/09/xmldsig#rsa-sha1">' .
           '</ds:SignatureMethod>' . "\n" .
           '<ds:Reference Id="SignedPropertiesID' . $this->signedPropertiesID . '" ' .
           'Type="http://uri.etsi.org/01903#SignedProperties" ' .
           'URI="#Signature' . $this->signatureID . '-SignedProperties' .
           $this->signatureSignedPropertiesID . '">' . "\n" .
           '<ds:DigestMethod Algorithm="http://www.w3.org/2000/09/xmldsig#sha1">' .
           '</ds:DigestMethod>' . "\n" .
           '<ds:DigestValue>' . $propDigest . '</ds:DigestValue>' . "\n" .
           '</ds:Reference>' . "\n" .
           '<ds:Reference URI="#Certificate' . $this->certificateID . '">' . "\n" .
           '<ds:DigestMethod Algorithm="http://www.w3.org/2000/09/xmldsig#sha1">' .
           '</ds:DigestMethod>' . "\n" .
           '<ds:DigestValue>' . $kInfoDigest . '</ds:DigestValue>' . "\n" .
           '</ds:Reference>' . "\n" .
           '<ds:Reference Id="Reference-ID-' . $this->referenceID . '" URI="#comprobante">' . "\n" .
           '<ds:Transforms>' . "\n" .
           '<ds:Transform Algorithm="http://www.w3.org/2000/09/xmldsig#enveloped-signature">' .
           '</ds:Transform>' . "\n" .
           '</ds:Transforms>' . "\n" .
           '<ds:DigestMethod Algorithm="http://www.w3.org/2000/09/xmldsig#sha1">' .
           '</ds:DigestMethod>' . "\n" .
           '<ds:DigestValue>' . $documentDigest . '</ds:DigestValue>' . "\n" .
           '</ds:Reference>' . "\n" .
           '</ds:SignedInfo>';

        $_SESSION['Generate SignedInfo '] = $sInfo;
        // Calculate signature
        $signaturePayload = str_replace('<ds:SignedInfo', '<ds:SignedInfo ' . $xmlns, $sInfo);
        $signatureResult = "";
        openssl_sign($signaturePayload, $signatureResult, $this->privateKey);
        $signatureResult = chunk_split(base64_encode($signatureResult), 76);
        $signatureResult = str_replace("\r", "", $signatureResult);

        // <br>Make signature<br>
        $sig = '<ds:Signature xmlns:ds="http://www.w3.org/2000/09/xmldsig#" xmlns:etsi="http://uri.etsi.org/01903/v1.3.2#" Id="Signature' . $this->signatureID . '">' . "\n" .
           $sInfo . "\n" .
           '<ds:SignatureValue Id="SignatureValue' . $this->signatureValueID . '">' . "\n" .
           $signatureResult .
           '</ds:SignatureValue>' . "\n" .
           $kInfo . "\n" .
           '<ds:Object Id="Signature' . $this->signatureID . '-Object' . $this->signatureObjectID . '">' .
           '<etsi:QualifyingProperties Target="#Signature' . $this->signatureID . '">' .
           $prop .
           '</etsi:QualifyingProperties>' .
           '</ds:Object>' .
           '</ds:Signature>';

        $_SESSION['Make signature'] = $sig;
        // Inject signature
        $xml1 = str_replace('<factura id="comprobante" version="1.1.0">', '<?xml version="1.0"?>' . '<factura id="comprobante" version="1.1.0">', $xml);
        $xml2 = str_replace('</factura>', $sig . '</factura>', $xml1);
        return $xml2;
    }

    /**
     * Export
     *
     * Get Facturae XML data
     *
     * @param  string     $filePath Path to save invoice
     * @return string|int           XML data|Written file bytes
     */
    public function export($filePath, $archivo) {

        $doc = new DOMDocument();
        $doc->load($archivo);
        $_SESSION['export '] = '<h2>Empezar</h2><br>';
        $xml = $this->injectSignature($doc);
        if (!is_null($filePath))
            return file_put_contents($filePath, $xml);
        return $xml;
    }

}
