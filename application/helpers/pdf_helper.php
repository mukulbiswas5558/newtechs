<?php
use Dompdf\Dompdf;

function pdf_create($html, $filename = '', $stream = TRUE, $paper = 'A4', $orientation = 'portrait')
{
    require_once APPPATH . 'vendor/autoload.php';

    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper($paper, $orientation);
    $dompdf->render();

    if ($stream) {
        $dompdf->stream($filename . ".pdf", array("Attachment" => 1)); // Stream PDF for download
    } else {
        return $dompdf->output(); // Return the output as string
    }
}