 <?php 
require 'dbconn.php';
require ('vendor/fpdf/fpdf.php');

class PDF extends FPDF
{

function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','',10);
    
    // You can replace the text with an imag
    $this->Image('images/footer.png');  // Adjust the coordinates and size as needed
    
}
}


$pdf = new FPDF('L', 'mm', 'Legal');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetTitle('Report');

$pdf -> SetFont('arial', '', 10);
$pdf -> SetLeftMargin(-100);
$pdf -> Cell(100, 20, '', "0","0", 'C');
$pdf -> Image('images/header.png',-1,-1,360,0,'');

$pdf -> SetFont('times', 'B', 14);
$pdf -> SetLeftMargin(133);

$pdf -> ln(45);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Cell(100, 10, '2023 ANNUALLY ACCOMPLISHMENT REPORT', "0","0", 'C');
$pdf->SetXY($x + 100, $y);

$pdf -> ln(8);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Cell(100, 10, 'Quarter _()', "0","0", 'C');
$pdf->SetXY($x + 100, $y);

$pdf -> SetFont('times', 'B', 13);
$pdf->SetFillColor(161, 156, 156);
$pdf -> SetLeftMargin(15);

$pdf -> ln(20);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Cell(327, 10, 'Conducted Research Capability Trainings', "1","0", 'L', true);
$pdf->SetXY($x + 100, $y);


$pdf->SetFillColor(236, 235, 235);
$pdf -> ln();
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Cell(82, 10, 'Event/Activity', "1","0", 'C', true);
$pdf -> Cell(81, 10, 'Date', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Place', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Personnel(s) involved', "1","0", 'C', true);
$pdf->SetXY($x + 81, $y);


$pdf -> SetFont('times', '', 13);
$pdf -> SetLeftMargin(15);
$pdf -> ln();
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(81, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 81, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);


$pdf -> ln(-10);
$pdf -> SetFont('times', 'B', 13);
$pdf->SetFillColor(161, 156, 156);
$pdf -> SetLeftMargin(15);

$pdf -> ln(20);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Cell(327, 10, 'Completed Research Projects', "1","0", 'L', true);
$pdf->SetXY($x + 100, $y);


$pdf->SetFillColor(236, 235, 235);
$pdf -> ln();
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Cell(82, 10, 'Event/Activity', "1","0", 'C', true);
$pdf -> Cell(81, 10, 'Date', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Place', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Personnel(s) involved', "1","0", 'C', true);
$pdf->SetXY($x + 81, $y);

$pdf -> SetFont('times', '', 13);
$pdf -> SetLeftMargin(15);
$pdf -> ln();
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(81, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 81, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);


$pdf -> ln(-10);
$pdf -> SetFont('times', 'B', 13);
$pdf->SetFillColor(161, 156, 156);
$pdf -> SetLeftMargin(15);

$pdf -> ln(20);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Cell(327, 10, 'Approved On-going Research Project Institutionally Funded', "1","0", 'L', true);
$pdf->SetXY($x + 100, $y);


$pdf->SetFillColor(236, 235, 235);
$pdf -> ln();
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Cell(82, 10, 'Event/Activity', "1","0", 'C', true);
$pdf -> Cell(81, 10, 'Date', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Place', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Personnel(s) involved', "1","0", 'C', true);
$pdf->SetXY($x + 81, $y);

$pdf -> SetFont('times', '', 13);
$pdf -> SetLeftMargin(15);
$pdf -> ln();
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(81, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 81, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);


$pdf -> ln(10);
$pdf -> SetFont('times', 'B', 13);
$pdf->SetFillColor(161, 156, 156);
$pdf -> SetLeftMargin(15);

$pdf -> ln(20);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Cell(327, 10, 'On-going Externally-Funded Research Projects', "1","0", 'L', true);
$pdf->SetXY($x + 100, $y);


$pdf->SetFillColor(236, 235, 235);
$pdf -> ln(-174);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Cell(82, 10, 'Event/Activity', "1","0", 'C', true);
$pdf -> Cell(81, 10, 'Date', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Place', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Personnel(s) involved', "1","0", 'C', true);
$pdf->SetXY($x + 82, $y);

$pdf -> SetFont('times', '', 13);
$pdf -> SetLeftMargin(15);
$pdf -> ln(10);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(81, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 81, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);



$pdf -> ln(10);
$pdf -> SetFont('times', 'B', 13);
$pdf->SetFillColor(161, 156, 156);
$pdf -> SetLeftMargin(15);

$pdf -> ln(0);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Cell(327, 10, 'Approved Institutionally Funded Research with budget more than Php 150,000.00', "1","0", 'L', true);
$pdf->SetXY($x + 100, $y);


$pdf->SetFillColor(236, 235, 235);
$pdf -> ln(10);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Cell(82, 10, 'Event/Activity', "1","0", 'C', true);
$pdf -> Cell(81, 10, 'Date', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Place', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Personnel(s) involved', "1","0", 'C', true);
$pdf->SetXY($x + 82, $y);

$pdf -> SetFont('times', '', 13);
$pdf -> SetLeftMargin(15);
$pdf -> ln(10);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(81, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 81, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);


$pdf -> ln(10);
$pdf -> SetFont('times', 'B', 13);
$pdf->SetFillColor(161, 156, 156);
$pdf -> SetLeftMargin(15);

$pdf -> ln(0);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Cell(327, 10, 'Approved Institutionally Funded Research with budget less than Php 150,000.00', "1","0", 'L', true);
$pdf->SetXY($x + 100, $y);


$pdf->SetFillColor(236, 235, 235);
$pdf -> ln(10);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Cell(82, 10, 'Event/Activity', "1","0", 'C', true);
$pdf -> Cell(81, 10, 'Date', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Place', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Personnel(s) involved', "1","0", 'C', true);
$pdf->SetXY($x + 82, $y);

$pdf -> SetFont('times', '', 13);
$pdf -> SetLeftMargin(15);
$pdf -> ln(10);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(81, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 81, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);


$pdf -> ln(10);
$pdf -> SetFont('times', 'B', 13);
$pdf->SetFillColor(161, 156, 156);
$pdf -> SetLeftMargin(15);

$pdf -> ln(0);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Cell(327, 10, 'Presented Research Outputs in Regional/National and International Conferences', "1","0", 'L', true);
$pdf->SetXY($x + 100, $y);


$pdf->SetFillColor(236, 235, 235);
$pdf -> ln(10);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Cell(82, 10, 'Event/Activity', "1","0", 'C', true);
$pdf -> Cell(81, 10, 'Date', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Place', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Personnel(s) involved', "1","0", 'C', true);
$pdf->SetXY($x + 82, $y);

$pdf -> SetFont('times', '', 13);
$pdf -> SetLeftMargin(15);
$pdf -> ln(10);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(81, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 81, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);



$pdf -> ln(10);
$pdf -> SetFont('times', 'B', 13);
$pdf->SetFillColor(161, 156, 156);
$pdf -> SetLeftMargin(15);

$pdf -> ln(0);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Cell(327, 10, 'Submitted Paper/Proposal for Institutional Funding - Research Colloquium (Call for Proposals)', "1","0", 'L', true);
$pdf->SetXY($x + 100, $y);


$pdf->SetFillColor(236, 235, 235);
$pdf -> ln(10);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Cell(82, 10, 'Event/Activity', "1","0", 'C', true);
$pdf -> Cell(81, 10, 'Date', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Place', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Personnel(s) involved', "1","0", 'C', true);
$pdf->SetXY($x + 82, $y);

$pdf -> SetFont('times', '', 13);
$pdf -> SetLeftMargin(15);
$pdf -> ln(10);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(81, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 81, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);



$pdf -> ln(10);
$pdf -> SetFont('times', 'B', 13);
$pdf->SetFillColor(161, 156, 156);
$pdf -> SetLeftMargin(15);

$pdf -> ln(0);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Cell(327, 10, 'Submitted Paper/Proposal for Local Institutional Funding - Research Colloquium (Call for Proposals)', "1","0", 'L', true);
$pdf->SetXY($x + 100, $y);


$pdf->SetFillColor(236, 235, 235);
$pdf -> ln(10);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Cell(82, 10, 'Event/Activity', "1","0", 'C', true);
$pdf -> Cell(81, 10, 'Date', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Place', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Personnel(s) involved', "1","0", 'C', true);
$pdf->SetXY($x + 82, $y);

$pdf -> SetFont('times', '', 13);
$pdf -> SetLeftMargin(15);
$pdf -> ln(10);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(81, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 81, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);


$pdf -> ln(10);
$pdf -> SetFont('times', 'B', 13);
$pdf->SetFillColor(161, 156, 156);
$pdf -> SetLeftMargin(15);

$pdf -> ln(0);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Cell(327, 10, 'Publication of Research output in ISI/Scopus journals', "1","0", 'L', true);
$pdf->SetXY($x + 100, $y);


$pdf->SetFillColor(236, 235, 235);
$pdf -> ln(-170);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Cell(82, 10, 'Event/Activity', "1","0", 'C', true);
$pdf -> Cell(81, 10, 'Date', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Place', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Personnel(s) involved', "1","0", 'C', true);
$pdf->SetXY($x + 82, $y);

$pdf -> SetFont('times', '', 13);
$pdf -> SetLeftMargin(15);
$pdf -> ln(10);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(81, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 81, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);




$pdf -> ln(10);
$pdf -> SetFont('times', 'B', 13);
$pdf->SetFillColor(161, 156, 156);
$pdf -> SetLeftMargin(15);

$pdf -> ln(0);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Cell(327, 10, 'Faculty Engagement in the conduct of research and research related activities such as trainings and seminars', "1","0", 'L', true);
$pdf->SetXY($x + 100, $y);


$pdf->SetFillColor(236, 235, 235);
$pdf -> ln(10);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Cell(82, 10, 'Event/Activity', "1","0", 'C', true);
$pdf -> Cell(81, 10, 'Date', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Place', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Personnel(s) involved', "1","0", 'C', true);
$pdf->SetXY($x + 82, $y);

$pdf -> SetFont('times', '', 13);
$pdf -> SetLeftMargin(15);
$pdf -> ln(10);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(81, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 81, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(82, 10, 'Example', 1, 'C');
$pdf->SetXY($x + 82, $y);



$pdf -> Output();