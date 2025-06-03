<?php
 ob_start();
 //inclui o autoload do composer (caso use dependencia instaladas por ele)
 require_once(__DIR__ . '/fpdf/fpdf.php');

class NOVOPDF extends FPDF {
    function header() {
      $this->Image('logo.png',5,1,50);

      $this->Ln(30);
      $this->SetFont('Arial','B',15);
      $this->Cell(80);
      $this->Cell(30,10, iconv('UTF-8', 'ISO-8859-1//TRANSLIT', 'Relatório'), 1, 0, 'C');
      $this->Ln(15);
      $this->SetFont('Arial','',12);
      $this->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1//TRANSLIT', 'Pamella Rafaeli Neves'), 0, 1, 'C');
  
      $this->Ln(10);
   
    }
    function footer() {
      $this->SetY(-15);
      $this->SetFont('Arial','I',8);
      $this->Cell(0,10, 'Página ' . $this->PageNo().'/{nb}', 0, 0, 'C');
    }
}
$pdf = new NOVOPDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Times','',12);
for ($i = 1;$i <= 80; $i++) {
    $pdf->Cell(0,10, 'Teste de Linha ' . $i, 0, 1);
}
$pdf->Output("relatorio_produtos.pdf", "I");

?>