<?php
require_once('../tcpdf/config/tcpdf_config_alt.php');
require_once('../tcpdf/tcpdf.php');
require_once('api/utils.php');

$lot_id = isset($_GET['id'])?$_GET['id']:echoJson(400);

$bind = array(":id"=>$lot_id);

$json = $db->select("{$db_name}.sticker", "lot_id=:id", $bind, "*");

// no result
if(!$json)
  echoJson(406);

/***********************************************************/
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {


  //Page header
  public function Header() {

    // get the current page break margin
    $bMargin = $this->getBreakMargin();
    // get current auto-page-break mode
    $auto_page_break = $this->AutoPageBreak;
    // disable auto-page-break
    $this->SetAutoPageBreak(false, 0);
    // set bacground image
    $img_file = 'assets/images/sticker.png';
    $this->Image($img_file, 0, 0, 200, 200, '', '', '', false, 150, '', false, false, 0);
    // restore auto-page-break status
    $this->SetAutoPageBreak($auto_page_break, $bMargin);
    // set the starting point for the page content
    $this->setPageMark();

  }

  // Page footer
  public function Footer() {

  }
}

// create new PDF document
$custom_layout = array(200, 200);
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, $custom_layout, true, 'UTF-8', false);
$pdf->setFontSubsetting(false);

// set margins
$pdf->SetMargins(PDF_MARGIN_HEADER, PDF_MARGIN_TOP, PDF_MARGIN_HEADER);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM-5);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// define barcode style
$fgcolor = false;
//$fgcolor = array(239,83,80);
$style = array(
  'position' => '',
  'align' => 'L',
  'stretch' => false,
  'fitwidth' => true,
  'cellfitalign' => '',
  'border' => false,
  'hpadding' => 'auto',
  'vpadding' => 'auto',
  'fgcolor' => $fgcolor, //array(0,0,0),
  'bgcolor' => false, //array(255,255,255),
  'text' => true,
  'fontsize' => 8,
  'stretchtext' => 4
);

$pdf->SetFont('dejavusans', '', 10, '');


foreach($json as $j){
  // add a page
  $pdf->AddPage();

  // QRCODE,L : QR-CODE Low error correction
  $pdf->write2DBarcode('hajj.live/app/?id='.$j['id'], 'QRCODE,L', 75, 120, 50, 50, $style, 'N');

  $pdf->SetFont('helvetica', '', 34 , '', 'default', true );
  $pdf->Text( 87, 110, $j['id'], false, false, true, 0, 0, '', false, '', 0, false, 'T', 'M', false );

}

//Close and output PDF document
$pdf->Output("stickers.pdf", 'I');
?>
