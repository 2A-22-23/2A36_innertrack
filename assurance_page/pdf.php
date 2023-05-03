<?php
require_once('C:/xampp/htdocs/InnerTrack/Front/vendor/tecnickcom/tcpdf/tcpdf.php');
require_once 'C:/xampp/htdocs/InnerTrack/Front/vendor/autoload.php';

require 'db.php';

$sql = 'SELECT * FROM liste';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Produit List');
$pdf->SetSubject('Produit List');

// Add a page
$pdf->AddPage();

// Output table header
$pdf->SetFont('helvetica', 'B', 12);

$pdf->Cell(30, 7, 'NOM', 1);
$pdf->Cell(50, 7, 'EMAIL', 1);
$pdf->Cell(30, 7, 'type', 1);
$pdf->Cell(30, 7, 'dateINSER', 1);
$pdf->Cell(30, 7, 'dateEXPER', 1);
$pdf->Cell(30, 7, 'description', 1);
$pdf->Ln();

// Output table data
$pdf->SetFont('helvetica', '', 10);
foreach ($people as $person) {
    
    $pdf->Cell(30, 7, $person->name, 1);
    $pdf->Cell(50, 7, $person->mail, 1);
    $pdf->Cell(30, 7, $person->type_assurance, 1);
    $pdf->Cell(30, 7, $person->dateEffet, 1);
    $pdf->Cell(30, 7, $person->dateExpiration, 1);
    $pdf->Cell(30, 7, $person->description, 1);
    $pdf->Ln();
}

// Close and output PDF document
$pdf->Output('assurance.pdf', 'D');