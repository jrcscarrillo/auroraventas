<?php

require_once APP_PATH . 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

/**
 * Description of ToPhp
 *
 * @author jrcsc
 */
class ToPhp {

    function __construct() {
        
    }

    function htmltopdf($htmlfile, $pdf) {
        // Instantiate and use the dompdf class
        $dompdf = new Dompdf();
        // Load content from html file
        $html = file_get_contents($htmlfile);
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF (1 = download and 0 = preview)
        $dompdf->stream($pdf, array("Attachment" => 1));
    }

    //put your code here
}
