<?php

use \App\Core\Controller;
use Dompdf\Dompdf;

class Pdf extends Controller
{
  public function index()
  {
    $dompdf = new Dompdf();

    // Create PDF inline:
    // $dompdf->loadHtml('<h1>hello world</h1><hr><p>PDF!</p>');

    // Load PDF content from a file
    ob_start();
    require_once "assets/files/table.html";
    $dompdf->loadHtml(ob_get_clean());

    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();

    // $dompdf->stream(); // Directly downloads the PDF
    $dompdf->stream("Meu PDF", ["Attachment" => false]);
  }
}

?>
