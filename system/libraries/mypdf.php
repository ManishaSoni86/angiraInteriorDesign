<?php

require_once('tcpdf/tcpdf.php');

class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		// Logo
		$this->getCSSBorderWidth (2);
		$this->getCSSBorderStyle ('solid');
		$border_style = array('all' => array('width' => 2, 'cap' => 'square', 'join' => 'miter', 'dash' => 1, 'phase' => 0));
		$image_file = K_PATH_IMAGES.'logo.png';
		$this->Image($image_file, 10, 10, 30, '10', 'png', '', 'T', false, 300, '', false, false, 1, false, FALSE, FALSE);
		// Set font
		$this->SetFont('helvetica', 'B', 20);
		// Title
		$this->Cell(110, 20, 'INVOICE', '15', false, 'C', 0, '', 0, false, 'M', 'M');
		
				
		$this->SetFont('Times', '', 15);
		$this->SetY(17);
		$this->Cell(0, 0, 'Reg No: ......................', '15', false, 'R', 0, '', 0, false, 'M', 'M');
		$this->SetLineStyle( array( 'width' => 0.40, 'color' => array(0, 0, 0)));

       $this->Line(0, 22, $this->getPageWidth(), 22); 
		$this->Ln(50);
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}

?>