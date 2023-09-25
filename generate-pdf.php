<?php

require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;

//$html = '<h1 style="color: green">Example</h1>';
//$html .= "Hello <em>$name</em>";
//$html .= '<img src="example.png">';
//$html .= "Quantity: $quantity";

/**
 * Set the Dompdf options
 */


$dompdf = new Dompdf();
ob_start();
require('student-view.php');

$html=ob_get_contents();

//$html .=  '<div style="display: block;"><img src="mahara.png" alt="mahara" width="500" height="600"></div>';
ob_get_clean();
$dompdf->loadHtml($html);
//$dompdf->loadHtmlFile("template.html");

/**
 * Set the paper size and orientation
 */
$dompdf->setPaper("A4", "landscape");

/**
 * Load the HTML and replace placeholders with values from the form
 */



/**
 * Create the PDF and set attributes
 */
$dompdf->render();

$dompdf->stream("MAHARA.pdf", ["Attachment" => 0]);