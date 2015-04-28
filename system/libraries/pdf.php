<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('Fpdf.php');
require('barcode.php');
class Pdf extends FPDF
{
	function __construct($orientation='P', $unit='mm', $size='A4')
  {
    // Call parent constructor
    parent::__construct($orientation,$unit,$size);
  }
  
// Page header
function Header()
{ ?>
	<img alt="123ABC" src="barcode.php?codetype=code39&size=40&text=rin" />
	<?php 
    // Logo
    $this->Image('http://localhost/assets/app/images/aside.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Title',1,0,'C');
    // Line break
    $this->Ln(40);
	$this->Write('10', '');
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
?>