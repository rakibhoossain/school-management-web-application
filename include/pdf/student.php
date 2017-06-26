<?php
require('../../core/connect.php');
require 'fpdf/fpdf.php';

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('../../images/logo.png',8.5,0.2,3);
    // Arial bold 15
    $this->SetFont('Arial','B',16);
    // Move to the right
    // $this->Cell(207);


    $this->Ln(0.661458);
    // Title
    $this->Cell(0,0.423333,'Student Informations',0,1,'C');
    // Line break
    $this->Ln(0.661458);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-1);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,1,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
//595 × 842
$pdf = new PDF('P','cm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
// for($i=1;$i<=40;$i++)
//     $pdf->Cell(0,10,'Printing line number '.$i,0,1);





	
    
		$pdf->SetFont('Arial','B',10.5);

	   	$pdf->Cell(0.79375,0.423333,'Roll',1);
	   	$pdf->Cell(3.069167,0.423333,'Full Name',1);
	   	$pdf->Cell(1.940278,0.423333,'Class',1);
	   	$pdf->Cell(3.421944,0.423333,'Subject',1);
	   	// $pdf->Cell(1.234722,0.423333,'Gender',1);
	   	// $pdf->Cell(1.411111,0.423333,'Birth Day',1);
	   	// $pdf->Cell(3.527778,0.423333,'Address',1);
	   	$pdf->Cell(2.363611,0.423333,'City',1);
	   	$pdf->Cell(1.763889,0.423333,'Zip',1);
	   	$pdf->Cell(2.187222,0.423333,'Phone',1);
	   	$pdf->Cell(3.633611,0.423333,'Email',1);



	   	$sql = "SELECT * FROM student ORDER BY roll";
    	$result = $conn->query($sql);

		$pdf->Ln();

		if ($result->num_rows > 0) {
			$pdf->SetFont('Arial','',9);
		    while($row = $result->fetch_assoc()) {


		   	$pdf->Cell(0.79375,0.423333,$row["roll"],1);
		   	$pdf->Cell(3.069167,0.423333,$row["f_name"].' '.$row["l_name"],1);
		   	$pdf->Cell(1.940278,0.423333,$row["class"],1);
		   	$pdf->Cell(3.421944,0.423333,$row["section"],1);
		   	// $pdf->Cell(1.234722,0.423333,'Gender',1);
		   	// $pdf->Cell(1.411111,0.423333,'Birth Day',1);
		   	// $pdf->Cell(3.527778,0.423333,$row["address"],1);
		   	$pdf->Cell(2.363611,0.423333,$row["city"],1);
		   	$pdf->Cell(1.763889,0.423333,$row["zip"],1);
		   	$pdf->Cell(2.187222,0.423333,$row["phone"],1);
		   	$pdf->Cell(3.633611,0.423333,$row["email"],1);


		   	$pdf->Ln();
		    }
		}    

// foreach($result as $row) {
// 	$pdf->SetFont('Arial','',12);	
// 	$pdf->Ln();
// 	foreach($row as $column)
// 		$pdf->Cell(90,12,$column,1);
// }







$pdf->Output();
?>