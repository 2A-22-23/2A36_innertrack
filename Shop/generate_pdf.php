<?php 
include 'connectionDB.php';
require('fpdf/fpdf.php'); // Include FPDF library

$sql = "SELECT * FROM article";
$stmt = $con->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Create new PDF document
$pdf = new FPDF();
$pdf->AddPage();

$title = 'Liste des articles';

// set font for the title
$pdf->SetFont('helvetica', 'B', 16);

// print the title on the page
$pdf->Cell(0, 10, $title, 0, 1, 'C');

// Set font and font size
$pdf->SetFont('Arial','B',12);


    $pdf->Cell(50,10,"Nom article",1,0);
    $pdf->Cell(30,10,"Prix",1,0);
    $pdf->Cell(30,10,"Marque",1,0);
    $pdf->Cell(80,10,"Description",1,0);
    $pdf->Ln();
// Loop through the data and add it to the PDF document
foreach($data as $row) {
    $pdf->Cell(50,10,$row['nom_article'],1,0);
    $pdf->Cell(30,10,$row['prix'] . ' DT',1,0);
    $pdf->Cell(30,10,$row['marque'],1,0);
    $pdf->Cell(80,10,$row['description'],1,0);
    $pdf->Ln();
}

// Output PDF file
$pdf->Output('articles.pdf', 'D');
?>