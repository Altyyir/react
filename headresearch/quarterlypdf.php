 <?php 
require 'dbconn.php';
require ('vendor/fpdf/fpdf.php');

class PDF extends FPDF
{

protected $widths;
protected $aligns;

function SetWidths($w)
{
    // Set the array of column widths
    $this->widths = $w;
}

function SetAligns($a)
{
    // Set the array of column alignments
    $this->aligns = $a;
}

function Row($data)
{
    // Calculate the height of the row
    $nb = 0;
    for($i=0;$i<count($data);$i++)
        $nb = max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h = 7*$nb;
    // Issue a page break first if needed
    $this->CheckPageBreak($h);
    // Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w = $this->widths[$i];
        $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        // Save the current position
        $x = $this->GetX();
        $y = $this->GetY();
        // Draw the border
        $this->Rect($x,$y,$w,$h);
        // Print the text
        $this->MultiCell($w,5,$data[$i],0,$a);
        // Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    // Go to the next line
    $this->Ln($h);
}

function CheckPageBreak($h)
{
    // If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
}

function NbLines($w, $txt)
{
    // Compute the number of lines a MultiCell of width w will take
    if(!isset($this->CurrentFont))
        $this->Error('No font has been set');
    $cw = $this->CurrentFont['cw'];
    if($w==0)
        $w = $this->w-$this->rMargin-$this->x;
    $wmax = ($w-2*$this->cMargin)*1000/$this->FontSize;
    $s = str_replace("\r",'',(string)$txt);
    $nb = strlen($s);
    if($nb>0 && $s[$nb-1]=="\n")
        $nb--;
    $sep = -1;
    $i = 0;
    $j = 0;
    $l = 0;
    $nl = 1;
    while($i<$nb)
    {
        $c = $s[$i];
        if($c=="\n")
        {
            $i++;
            $sep = -1;
            $j = $i;
            $l = 0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep = $i;
        $l += $cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i = $sep+1;
            $sep = -1;
            $j = $i;
            $l = 0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}

function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-30);
    
    // You can replace the text with an imag
    $this->Image('images/footer.png');  // Adjust the coordinates and size as needed
    
}
}


$pdf = new PDF('L', 'mm', 'Legal');
$pdf->SetAutoPageBreak(true, 30);
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
$year = $_GET['year'];
$college = $_GET['college'];
if(isset($_GET['quarter'])) {
    $reportType = "Quarterly";
} else {
    $reportType = "Annually";
}
$pdf -> Cell(100, 10, $year.' '.strtoupper($reportType).' ACCOMPLISHMENT REPORT', "0","0", 'C');
$pdf->SetXY($x + 100, $y);

$pdf -> ln(8);
$x = $pdf->GetX();
$y = $pdf->GetY();
if(isset($_GET['quarter'])) {
    $pdf -> Cell(100, 10, 'Quarter '.$_GET['quarter'], "0","0", 'C');
} else {
    $pdf -> Cell(100, 10, '', "0","0", 'C');
}
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

$pdf->Ln();
$pdf -> SetFont('times', '', 13);
$pdf->SetWidths(array(82,81,82,82));
$pdf->SetAligns(array('C','C','C','C'));
if(isset($_GET['quarter'])) {
    $quarter = $_GET['quarter'];
    $startQ = ($quarter * 3) - 2;
    $endQ = $quarter * 3;
    if($_GET['college'] == "All") {
        $sql = "SELECT title_ctc, from_ctc, to_ctc, venue_ctc FROM ctc WHERE YEAR(dateAdded) = '$year' AND MONTH(dateAdded) BETWEEN $startQ AND $endQ ORDER BY dateAdded DESC";
    } else {
        $sql = "SELECT title_ctc, from_ctc, to_ctc, venue_ctc FROM ctc INNER JOIN faculty_user AS fu ON ctc.added_by = fu.id INNER JOIN college AS c ON fu.college_id = c.id WHERE YEAR(ctc.dateAdded) = '$year' AND MONTH(ctc.dateAdded) BETWEEN $startQ AND $endQ AND c.abbreviation_college = '$college' ORDER BY ctc.dateAdded DESC";
    }
} else {
    if($_GET['college'] == "All") {
        $sql = "SELECT title_ctc, from_ctc, to_ctc, venue_ctc FROM ctc WHERE YEAR(dateAdded) = '$year' ORDER BY dateAdded DESC";
    } else {
        $sql = "SELECT title_ctc, from_ctc, to_ctc, venue_ctc FROM ctc INNER JOIN faculty_user AS fu ON ctc.added_by = fu.id INNER JOIN college AS c ON fu.college_id = c.id WHERE YEAR(ctc.dateAdded) = '$year' ORDER BY ctc.dateAdded DESC";
    }
}
$ctcResult = $conn->query($sql);
while($ctcRow = $ctcResult->fetch_assoc()) {
    $dateString1 = $ctcRow['from_ctc'];
    $dateTime1 = new DateTime($dateString1);
    $formattedDate1 = $dateTime1->format('F d, Y');

    $dateString2 = $ctcRow['to_ctc'];
    $dateTime2 = new DateTime($dateString2);
    $formattedDate2 = $dateTime2->format('F d, Y');
    $pdf->Row(array($ctcRow['title_ctc'],$formattedDate1." - ".$formattedDate2,$ctcRow['venue_ctc'],""));
}
$pdf->Row(array("","","",""));

$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetFillColor(161, 156, 156);
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
if(isset($_GET['quarter'])) {
    $quarter = $_GET['quarter'];
    $startQ = ($quarter * 3) - 2;
    $endQ = $quarter * 3;
    if($_GET['college'] == "All") {
        $sql = "SELECT id, project_title, dateAdded, agency, end_date FROM research_topic WHERE YEAR(dateAdded) = '$year' AND MONTH(dateAdded) BETWEEN $startQ AND $endQ AND status = 'Completed' ORDER BY dateAdded DESC";
    } else {
        $sql = "SELECT rt.id, project_title, rt.dateAdded, agency, end_date FROM research_topic AS rt INNER JOIN college AS c ON rt.college_id = c.id WHERE YEAR(rt.dateAdded) = '$year' AND MONTH(rt.dateAdded) BETWEEN $startQ AND $endQ AND status = 'Completed' AND c.abbreviation_college = '$college' ORDER BY rt.dateAdded DESC";
    }
} else {
    if($_GET['college'] == "All") {
        $sql = "SELECT id, project_title, dateAdded, agency, end_date FROM research_topic WHERE YEAR(dateAdded) = '$year' AND status = 'Completed' ORDER BY dateAdded DESC";
    } else {
        $sql = "SELECT rt.id, project_title, rt.dateAdded, agency, end_date FROM research_topic AS rt INNER JOIN college AS c ON rt.college_id = c.id WHERE YEAR(rt.dateAdded) = '$year' AND status = 'Completed' AND c.abbreviation_college = '$college' ORDER BY rt.dateAdded DESC";
    }
}
$researchTopicResult = $conn->query($sql);
while($researchTopicRow = $researchTopicResult->fetch_assoc()) {
    $dateString = $researchTopicRow['end_date'];
    $dateTime = new DateTime($dateString);
    $formattedDate = $dateTime->format('F d, Y');

    $researchTopicID = $researchTopicRow['id'];
    $nameArray = array();
    $sql = "SELECT DISTINCT r.name FROM research_representatives AS rr INNER JOIN representative AS r ON rr.id = r.research_representatives_id WHERE rr.research_topic_id = '$researchTopicID'";
    $nameResult = $conn->query($sql);
    while($nameRow = $nameResult->fetch_assoc()) {
        array_push($nameArray, $nameRow['name']);
    }

    $names = implode(",\n", $nameArray);

    $pdf->SetAligns(array("C", "C", "C", ""));
    $pdf->SetWidths(array(82,81,82,82));
    $pdf->Row(array($researchTopicRow['project_title'], $formattedDate, $researchTopicRow['agency'], $names));
}
$pdf->SetWidths(array(82,81,82,82));
$pdf->Row(array("", "", "", ""));

$pdf->Ln(0);
$pdf -> SetFont('times', 'B', 13);
$pdf->SetFillColor(161, 156, 156);
$pdf -> Cell(327, 10, 'Approved On-going Research Project Institutionally Funded', "1","0", 'L', true);

$pdf->Ln();
$pdf->SetFillColor(236, 235, 235);
$pdf -> Cell(82, 10, 'Event/Activity', "1","0", 'C', true);
$pdf -> Cell(81, 10, 'Date', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Place', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Personnel(s) involved', "1","0", 'C', true);

$pdf->Ln();
$pdf -> SetFont('times', '', 13);
if(isset($_GET['quarter'])) {
    $quarter = $_GET['quarter'];
    $startQ = ($quarter * 3) - 2;
    $endQ = $quarter * 3;
    if($_GET['college'] == "All") {
        $sql = "SELECT id, project_title, dateAdded, agency, start_date FROM research_topic WHERE YEAR(dateAdded) = '$year' AND MONTH(dateAdded) BETWEEN $startQ AND $endQ AND status = 'Ongoing' AND partnership = 'Institutionaly Funded' ORDER BY dateAdded DESC";
    } else {
        $sql = "SELECT rt.id, project_title, rt.dateAdded, agency, start_date FROM research_topic AS rt INNER JOIN college AS c ON rt.college_id = c.id WHERE YEAR(rt.dateAdded) = '$year' AND MONTH(rt.dateAdded) BETWEEN $startQ AND $endQ AND status = 'Ongoing' AND partnership = 'Institutionaly Funded' AND c.abbreviation_college = '$college' ORDER BY rt.dateAdded DESC";
    }
} else {
    if($_GET['college'] == "All") {
        $sql = "SELECT id, project_title, dateAdded, agency, start_date FROM research_topic WHERE YEAR(dateAdded) = '$year' AND status = 'Ongoing' AND partnership = 'Institutionaly Funded' ORDER BY dateAdded DESC";
    } else {
        $sql = "SELECT rt.id, project_title, rt.dateAdded, agency, start_date FROM research_topic AS rt INNER JOIN college AS c ON rt.college_id = c.id WHERE YEAR(rt.dateAdded) = '$year' AND status = 'Ongoing' AND partnership = 'Institutionaly Funded' AND c.abbreviation_college = '$college' ORDER BY rt.dateAdded DESC";
    }
}
$researchTopicResult = $conn->query($sql);
while($researchTopicRow = $researchTopicResult->fetch_assoc()) {
    $dateString = $researchTopicRow['start_date'];
    $dateTime = new DateTime($dateString);
    $formattedDate = $dateTime->format('F d, Y');

    $researchTopicID = $researchTopicRow['id'];
    $nameArray = array();
    $sql = "SELECT DISTINCT r.name FROM research_representatives AS rr INNER JOIN representative AS r ON rr.id = r.research_representatives_id WHERE rr.research_topic_id = '$researchTopicID'";
    $nameResult = $conn->query($sql);
    while($nameRow = $nameResult->fetch_assoc()) {
        array_push($nameArray, $nameRow['name']);
    }

    $names = implode(",\n", $nameArray);

    $pdf->SetAligns(array("C", "C", "C", "C"));
    $pdf->SetWidths(array(82,81,82,82));
    $pdf->Row(array($researchTopicRow['project_title'], $formattedDate, $researchTopicRow['agency'], $names));
}
$pdf->SetWidths(array(82,81,82,82));
$pdf->Row(array("", "", "", ""));

$pdf->Ln(0);
$pdf -> SetFont('times', 'B', 13);
$pdf->SetFillColor(161, 156, 156);
$pdf -> Cell(327, 10, 'On-going Externally-Funded Research Projects', "1","0", 'L', true);

$pdf->Ln();
$pdf->SetFillColor(236, 235, 235);
$pdf -> Cell(82, 10, 'Event/Activity', "1","0", 'C', true);
$pdf -> Cell(81, 10, 'Date', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Place', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Personnel(s) involved', "1","0", 'C', true);

$pdf->Ln();
$pdf -> SetFont('times', '', 13);
if(isset($_GET['quarter'])) {
    $quarter = $_GET['quarter'];
    $startQ = ($quarter * 3) - 2;
    $endQ = $quarter * 3;
    if($_GET['college'] == "All") {
        $sql = "SELECT id, project_title, dateAdded, agency, start_date FROM research_topic WHERE YEAR(dateAdded) = '$year' AND MONTH(dateAdded) BETWEEN $startQ AND $endQ AND status = 'Ongoing' AND partnership = 'Externaly Funded' ORDER BY dateAdded DESC";
    } else {
        $sql = "SELECT rt.id, project_title, rt.dateAdded, agency, start_date FROM research_topic AS rt INNER JOIN college AS c ON rt.college_id = c.id WHERE YEAR(rt.dateAdded) = '$year' AND MONTH(rt.dateAdded) BETWEEN $startQ AND $endQ AND status = 'Ongoing' AND partnership = 'Externaly Funded' AND c.abbreviation_college = '$college' ORDER BY rt.dateAdded DESC";
    }
} else {
    if($_GET['college'] == "All") {
        $sql = "SELECT id, project_title, dateAdded, agency, start_date FROM research_topic WHERE YEAR(dateAdded) = '$year' AND status = 'Ongoing' AND partnership = 'Externaly Funded' ORDER BY dateAdded DESC";
    } else {
        $sql = "SELECT rt.id, project_title, rt.dateAdded, agency, start_date FROM research_topic AS rt INNER JOIN college AS c ON rt.college_id = c.id WHERE YEAR(rt.dateAdded) = '$year' AND status = 'Ongoing' AND partnership = 'Externaly Funded' AND c.abbreviation_college = '$college' ORDER BY rt.dateAdded DESC";
    }
}
$researchTopicResult = $conn->query($sql);
while($researchTopicRow = $researchTopicResult->fetch_assoc()) {
    $dateString = $researchTopicRow['start_date'];
    $dateTime = new DateTime($dateString);
    $formattedDate = $dateTime->format('F d, Y');

    $researchTopicID = $researchTopicRow['id'];
    $nameArray = array();
    $sql = "SELECT DISTINCT r.name FROM research_representatives AS rr INNER JOIN representative AS r ON rr.id = r.research_representatives_id WHERE rr.research_topic_id = '$researchTopicID'";
    $nameResult = $conn->query($sql);
    while($nameRow = $nameResult->fetch_assoc()) {
        array_push($nameArray, $nameRow['name']);
    }

    $names = implode(",\n", $nameArray);

    $pdf->SetAligns(array("C", "C", "C", ""));
    $pdf->SetWidths(array(82,81,82,82));
    $pdf->Row(array($researchTopicRow['project_title'], $formattedDate, $researchTopicRow['agency'], $names));
}

$pdf->SetWidths(array(82,81,82,82));
$pdf->Row(array("", "", "", ""));

$pdf->Ln(0);
$pdf -> SetFont('times', 'B', 13);
$pdf->SetFillColor(161, 156, 156);
$pdf -> Cell(327, 10, 'Approved Institutionally Funded Research with budget more than Php 150,000.00', "1","0", 'L', true);

$pdf->Ln();
$pdf->SetFillColor(236, 235, 235);
$pdf -> Cell(82, 10, 'Event/Activity', "1","0", 'C', true);
$pdf -> Cell(81, 10, 'Date', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Place', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Personnel(s) involved', "1","0", 'C', true);

$pdf->Ln();
$pdf -> SetFont('times', '', 13);
if(isset($_GET['quarter'])) {
    $quarter = $_GET['quarter'];
    $startQ = ($quarter * 3) - 2;
    $endQ = $quarter * 3;
    if($_GET['college'] == "All") {
        $sql = "SELECT rt.id, e.research_topic_id, rt.project_title, rt.agency, rt.dateAdded FROM research_topic AS rt INNER JOIN expenses AS e ON rt.id = e.research_topic_id WHERE YEAR(dateAdded) = '$year' AND MONTH(dateAdded) BETWEEN $startQ AND $endQ AND rt.status = 'Approved With Notice to Proceed' AND rt.partnership = 'Institutionaly Funded' GROUP BY e.research_topic_id HAVING SUM(e.quantity * e.unit_cost) > 150000  ORDER BY dateAdded DESC";
    } else {
        $sql = "SELECT rt.id, e.research_topic_id, rt.project_title, rt.agency, rt.dateAdded FROM research_topic AS rt INNER JOIN college AS c ON rt.college_id = c.id INNER JOIN expenses AS e ON rt.id = e.research_topic_id WHERE YEAR(rt.dateAdded) = '$year' AND MONTH(rt.dateAdded) BETWEEN $startQ AND $endQ AND rt.status = 'Approved With Notice to Proceed' AND rt.partnership = 'Institutionaly Funded' AND c.abbreviation_college = '$college' GROUP BY e.research_topic_id HAVING SUM(e.quantity * e.unit_cost) > 150000  ORDER BY rt.dateAdded DESC";
    }
} else {
    if($_GET['college'] == "All") {
        $sql = "SELECT rt.id, e.research_topic_id, rt.project_title, rt.agency, rt.dateAdded FROM research_topic AS rt INNER JOIN expenses AS e ON rt.id = e.research_topic_id WHERE YEAR(dateAdded) = '$year' AND rt.status = 'Approved With Notice to Proceed' AND rt.partnership = 'Institutionaly Funded' GROUP BY e.research_topic_id HAVING SUM(e.quantity * e.unit_cost) > 150000  ORDER BY dateAdded DESC";
    } else {
        $sql = "SELECT rt.id, e.research_topic_id, rt.project_title, rt.agency, rt.dateAdded FROM research_topic AS rt INNER JOIN college AS c ON rt.college_id = c.id INNER JOIN expenses AS e ON rt.id = e.research_topic_id WHERE YEAR(rt.dateAdded) = '$year' AND rt.status = 'Approved With Notice to Proceed' AND rt.partnership = 'Institutionaly Funded' AND c.abbreviation_college = '$college' GROUP BY e.research_topic_id HAVING SUM(e.quantity * e.unit_cost) > 150000  ORDER BY rt.dateAdded DESC";
    }
}
$researchTopicResult = $conn->query($sql);
while($researchTopicRow = $researchTopicResult->fetch_assoc()) {
    $dateString = $researchTopicRow['dateAdded'];
    $dateTime = new DateTime($dateString);
    $formattedDate = $dateTime->format('F d, Y');

    $researchTopicID = $researchTopicRow['id'];
    $nameArray = array();
    $sql = "SELECT DISTINCT r.name FROM research_representatives AS rr INNER JOIN representative AS r ON rr.id = r.research_representatives_id WHERE rr.research_topic_id = '$researchTopicID'";
    $nameResult = $conn->query($sql);
    while($nameRow = $nameResult->fetch_assoc()) {
        array_push($nameArray, $nameRow['name']);
    }

    $names = implode(",\n", $nameArray);

    $pdf->SetAligns(array("C", "C", "C", ""));
    $pdf->SetWidths(array(82,81,82,82));
    $pdf->Row(array($researchTopicRow['project_title'], $formattedDate, $researchTopicRow['agency'], $names));
}

$pdf->SetWidths(array(82,81,82,82));
$pdf->Row(array("", "", "", ""));

$pdf->Ln(0);
$pdf -> SetFont('times', 'B', 13);
$pdf->SetFillColor(161, 156, 156);
$pdf -> Cell(327, 10, 'Approved Institutionally Funded Research with budget less than Php 150,000.00', "1","0", 'L', true);

$pdf->Ln();
$pdf->SetFillColor(236, 235, 235);
$pdf -> Cell(82, 10, 'Event/Activity', "1","0", 'C', true);
$pdf -> Cell(81, 10, 'Date', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Place', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Personnel(s) involved', "1","0", 'C', true);

$pdf->Ln();
$pdf -> SetFont('times', '', 13);
// $sql = "SELECT rt.id, e.research_topic_id, rt.project_title, rt.dateAdded FROM research_topic AS rt INNER JOIN expenses AS e ON rt.id = e.research_topic_id WHERE YEAR(rt.dateAdded) = '2023' AND MONTH(rt.dateAdded) BETWEEN 10 AND 12 AND rt.status = 'Approved With Notice to Proceed' AND rt.partnership = 'Institutionaly Funded' GROUP BY e.research_topic_id HAVING SUM(e.quantity * e.unit_cost) < 150000 ORDER BY rt.dateAdded DESC";
if(isset($_GET['quarter'])) {
    $quarter = $_GET['quarter'];
    $startQ = ($quarter * 3) - 2;
    $endQ = $quarter * 3;
    if($_GET['college'] == "All") {
        $sql = "SELECT rt.id, e.research_topic_id, rt.project_title, rt.agency, rt.dateAdded FROM research_topic AS rt INNER JOIN expenses AS e ON rt.id = e.research_topic_id WHERE YEAR(dateAdded) = '$year' AND MONTH(dateAdded) BETWEEN $startQ AND $endQ AND rt.status = 'Approved With Notice to Proceed' AND rt.partnership = 'Institutionaly Funded' GROUP BY e.research_topic_id HAVING SUM(e.quantity * e.unit_cost) < 150000  ORDER BY dateAdded DESC";
    } else {
        $sql = "SELECT rt.id, e.research_topic_id, rt.project_title, rt.agency, rt.dateAdded FROM research_topic AS rt INNER JOIN college AS c ON rt.college_id = c.id INNER JOIN expenses AS e ON rt.id = e.research_topic_id WHERE YEAR(rt.dateAdded) = '$year' AND MONTH(rt.dateAdded) BETWEEN $startQ AND $endQ AND rt.status = 'Approved With Notice to Proceed' AND rt.partnership = 'Institutionaly Funded' AND c.abbreviation_college = '$college' GROUP BY e.research_topic_id HAVING SUM(e.quantity * e.unit_cost) < 150000  ORDER BY rt.dateAdded DESC";
    }
} else {
    if($_GET['college'] == "All") {
        $sql = "SELECT rt.id, e.research_topic_id, rt.project_title, rt.agency, rt.dateAdded FROM research_topic AS rt INNER JOIN expenses AS e ON rt.id = e.research_topic_id WHERE YEAR(dateAdded) = '$year' AND rt.status = 'Approved With Notice to Proceed' AND rt.partnership = 'Institutionaly Funded' GROUP BY e.research_topic_id HAVING SUM(e.quantity * e.unit_cost) < 150000  ORDER BY dateAdded DESC";
    } else {
        $sql = "SELECT rt.id, e.research_topic_id, rt.project_title, rt.agency, rt.dateAdded FROM research_topic AS rt INNER JOIN college AS c ON rt.college_id = c.id INNER JOIN expenses AS e ON rt.id = e.research_topic_id WHERE YEAR(rt.dateAdded) = '$year' AND rt.status = 'Approved With Notice to Proceed' AND rt.partnership = 'Institutionaly Funded' AND c.abbreviation_college = '$college' GROUP BY e.research_topic_id HAVING SUM(e.quantity * e.unit_cost) < 150000  ORDER BY rt.dateAdded DESC";
    }
}
$researchTopicResult = $conn->query($sql);
while($researchTopicRow = $researchTopicResult->fetch_assoc()) {
    $dateString = $researchTopicRow['dateAdded'];
    $dateTime = new DateTime($dateString);
    $formattedDate = $dateTime->format('F d, Y');

    $researchTopicID = $researchTopicRow['id'];
    $nameArray = array();
    $sql = "SELECT DISTINCT r.name FROM research_representatives AS rr INNER JOIN representative AS r ON rr.id = r.research_representatives_id WHERE rr.research_topic_id = '$researchTopicID'";
    $nameResult = $conn->query($sql);
    while($nameRow = $nameResult->fetch_assoc()) {
        array_push($nameArray, $nameRow['name']);
    }

    $names = implode(",\n", $nameArray);

    $pdf->SetAligns(array("C", "C", "C", ""));
    $pdf->SetWidths(array(82,81,82,82));
    $pdf->Row(array($researchTopicRow['project_title'], $formattedDate, $researchTopicRow['agency'], $names));
}

$pdf->SetWidths(array(82,81,82,82));
$pdf->Row(array("", "", "", ""));

$pdf->Ln(0);
$pdf -> SetFont('times', 'B', 13);
$pdf->SetFillColor(161, 156, 156);
$pdf -> Cell(327, 10, 'Presented Research Outputs in Regional/National and International Conferences', "1","0", 'L', true);

$pdf->Ln();
$pdf->SetFillColor(236, 235, 235);
$pdf -> Cell(82, 10, 'Event/Activity', "1","0", 'C', true);
$pdf -> Cell(81, 10, 'Date', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Place', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Personnel(s) involved', "1","0", 'C', true);

$pdf->Ln();
$pdf -> SetFont('times', '', 13);
if(isset($_GET['quarter'])) {
    $quarter = $_GET['quarter'];
    $startQ = ($quarter * 3) - 2;
    $endQ = $quarter * 3;
    if($_GET['college'] == "All") {
        $sql = "SELECT con.themetitle, con.dateAdded, con.venue FROM conferences AS con WHERE YEAR(con.dateAdded) = '$year' AND MONTH(con.dateAdded) BETWEEN $startQ AND $endQ";
    } else {
        $sql = "SELECT con.themetitle, con.dateAdded, con.venue FROM conferences AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS c ON fu.college_id = c.id WHERE YEAR(con.dateAdded) = '$year' AND MONTH(con.dateAdded) BETWEEN $startQ AND $endQ AND c.abbreviation_college = '$college'";
    }
} else {
    if($_GET['college'] == "All") {
        $sql = "SELECT con.themetitle, con.dateAdded, con.venue FROM conferences AS con WHERE YEAR(con.dateAdded) = '$year'";
    } else {
        $sql = "SELECT con.themetitle, con.dateAdded, con.venue FROM conferences AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS c ON fu.college_id = c.id WHERE YEAR(con.dateAdded) = '$year' AND c.abbreviation_college = '$college'";
    }
}
$conferencesResult = $conn->query($sql);
while($conferencesRow = $conferencesResult->fetch_assoc()) {
    $dateString = $conferencesRow['dateAdded'];
    $dateTime = new DateTime($dateString);
    $formattedDate = $dateTime->format('F d, Y');

    $pdf->SetAligns(array("C", "C", "C", ""));
    $pdf->SetWidths(array(82,81,82,82));
    $pdf->Row(array($conferencesRow['themetitle'], $formattedDate, $conferencesRow['venue'], ""));
}

// $pdf->SetWidths(array(82,81,82,82));
// $pdf->Row(array("", "", "", ""));

// $pdf->Ln(0);
// $pdf -> SetFont('times', 'B', 13);
// $pdf->SetFillColor(161, 156, 156);
// $pdf -> Cell(327, 10, 'Submitted Paper/Proposal for Institutional Funding - Research Colloquium (Call for Proposals)', "1","0", 'L', true);

// $pdf->Ln();
// $pdf->SetFillColor(236, 235, 235);
// $pdf -> Cell(82, 10, 'Event/Activity', "1","0", 'C', true);
// $pdf -> Cell(81, 10, 'Date', "1","0", 'C', true);
// $pdf -> Cell(82, 10, 'Place', "1","0", 'C', true);
// $pdf -> Cell(82, 10, 'Personnel(s) involved', "1","0", 'C', true);

// $pdf->Ln();
// $pdf -> SetFont('times', '', 13);
// $sql = "SELECT rt.id, e.research_topic_id, rt.project_title, rt.dateAdded FROM research_topic AS rt INNER JOIN expenses AS e ON rt.id = e.research_topic_id WHERE YEAR(rt.dateAdded) = '2023' AND MONTH(rt.dateAdded) BETWEEN 10 AND 12 AND rt.status = 'For Evaluation' AND rt.partnership = 'Institutionaly Funded' GROUP BY e.research_topic_id HAVING SUM(e.quantity * e.unit_cost) < 150000 ORDER BY rt.dateAdded DESC";
// $researchTopicResult = $conn->query($sql);
// while($researchTopicRow = $researchTopicResult->fetch_assoc()) {
//     $dateString = $researchTopicRow['dateAdded'];
//     $dateTime = new DateTime($dateString);
//     $formattedDate = $dateTime->format('F d, Y');

//     $researchTopicID = $researchTopicRow['id'];
//     $nameArray = array();
//     $sql = "SELECT DISTINCT r.name FROM research_representatives AS rr INNER JOIN representative AS r ON rr.id = r.research_representatives_id WHERE rr.research_topic_id = '$researchTopicID'";
//     $nameResult = $conn->query($sql);
//     while($nameRow = $nameResult->fetch_assoc()) {
//         array_push($nameArray, $nameRow['name']);
//     }

//     $names = implode(",\n", $nameArray);

//     $pdf->SetAligns(array("C", "C", "", ""));
//     $pdf->SetWidths(array(82,81,82,82));
//     $pdf->Row(array($researchTopicRow['project_title'], $formattedDate, "", $names));
// }

// $pdf->SetWidths(array(82,81,82,82));
// $pdf->Row(array("", "", "", ""));

// $pdf->Ln(0);
// $pdf -> SetFont('times', 'B', 13);
// $pdf->SetFillColor(161, 156, 156);
// $pdf -> Cell(327, 10, 'Submitted Paper/Proposal for Local Institutional Funding - Research Colloquium (Call for Proposals)', "1","0", 'L', true);

// $pdf->Ln();
// $pdf->SetFillColor(236, 235, 235);
// $pdf -> Cell(82, 10, 'Event/Activity', "1","0", 'C', true);
// $pdf -> Cell(81, 10, 'Date', "1","0", 'C', true);
// $pdf -> Cell(82, 10, 'Place', "1","0", 'C', true);
// $pdf -> Cell(82, 10, 'Personnel(s) involved', "1","0", 'C', true);

// $pdf->Ln();
// $pdf -> SetFont('times', '', 13);
// $sql = "SELECT rt.id, e.research_topic_id, rt.project_title, rt.dateAdded FROM research_topic AS rt INNER JOIN expenses AS e ON rt.id = e.research_topic_id WHERE YEAR(rt.dateAdded) = '2023' AND MONTH(rt.dateAdded) BETWEEN 10 AND 12 AND rt.status = 'For Evaluation' AND rt.partnership = 'Institutionaly Funded' GROUP BY e.research_topic_id HAVING SUM(e.quantity * e.unit_cost) < 150000 ORDER BY rt.dateAdded DESC";
// $researchTopicResult = $conn->query($sql);
// while($researchTopicRow = $researchTopicResult->fetch_assoc()) {
//     $dateString = $researchTopicRow['dateAdded'];
//     $dateTime = new DateTime($dateString);
//     $formattedDate = $dateTime->format('F d, Y');

//     $researchTopicID = $researchTopicRow['id'];
//     $nameArray = array();
//     $sql = "SELECT DISTINCT r.name FROM research_representatives AS rr INNER JOIN representative AS r ON rr.id = r.research_representatives_id WHERE rr.research_topic_id = '$researchTopicID'";
//     $nameResult = $conn->query($sql);
//     while($nameRow = $nameResult->fetch_assoc()) {
//         array_push($nameArray, $nameRow['name']);
//     }

//     $names = implode(",\n", $nameArray);

//     $pdf->SetAligns(array("C", "C", "", ""));
//     $pdf->SetWidths(array(82,81,82,82));
//     $pdf->Row(array($researchTopicRow['project_title'], $formattedDate, "", $names));
// }


$pdf->SetWidths(array(82,81,82,82));
$pdf->Row(array("", "", "", ""));

$pdf->Ln(0);
$pdf -> SetFont('times', 'B', 13);
$pdf->SetFillColor(161, 156, 156);
$pdf -> Cell(327, 10, 'Publication of Research output in ISI/Scopus journals', "1","0", 'L', true);

$pdf->Ln();
$pdf->SetFillColor(236, 235, 235);
$pdf -> Cell(82, 10, 'Event/Activity', "1","0", 'C', true);
$pdf -> Cell(81, 10, 'Date', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Place', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Personnel(s) involved', "1","0", 'C', true);

$pdf->Ln();
$pdf -> SetFont('times', '', 13);
if(isset($_GET['quarter'])) {
    $quarter = $_GET['quarter'];
    $startQ = ($quarter * 3) - 2;
    $endQ = $quarter * 3;
    if($_GET['college'] == "All") {
        $sql = "SELECT con.title, con.dateAdded, con.place_publication FROM scw_ AS con WHERE YEAR(con.dateAdded) = '$year' AND MONTH(con.dateAdded) BETWEEN $startQ AND $endQ";
    } else {
        $sql = "SELECT con.title, con.dateAdded, con.place_publication FROM scw_ AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS c ON fu.college_id = c.id WHERE YEAR(con.dateAdded) = '$year' AND MONTH(con.dateAdded) BETWEEN $startQ AND $endQ AND c.abbreviation_college = '$college'";
    }
} else {
    if($_GET['college'] == "All") {
        $sql = "SELECT con.title, con.dateAdded, con.place_publication FROM scw_ AS con WHERE YEAR(con.dateAdded) = '$year'";
    } else {
        $sql = "SELECT con.title, con.dateAdded, con.place_publication FROM scw_ AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS c ON fu.college_id = c.id WHERE YEAR(con.dateAdded) = '$year' AND c.abbreviation_college = '$college'";
    }
}
$publicationResult = $conn->query($sql);
while($publicationRow = $publicationResult->fetch_assoc()) {
    $dateString = $publicationRow['dateAdded'];
    $dateTime = new DateTime($dateString);
    $formattedDate = $dateTime->format('F d, Y');

    $pdf->SetAligns(array("C", "C", "C", ""));
    $pdf->SetWidths(array(82,81,82,82));
    $pdf->Row(array($publicationRow['title'], $formattedDate, $publicationRow['place_publication'], ""));
}

$pdf->SetWidths(array(82,81,82,82));
$pdf->Row(array("", "", "", ""));

$pdf->Ln(0);
$pdf -> SetFont('times', 'B', 13);
$pdf->SetFillColor(161, 156, 156);
$pdf -> Cell(327, 10, 'Faculty Engagement in the conduct of research and research related activities such as trainings and seminars', "1","0", 'L', true);

$pdf->Ln();
$pdf->SetFillColor(236, 235, 235);
$pdf -> Cell(82, 10, 'Event/Activity', "1","0", 'C', true);
$pdf -> Cell(81, 10, 'Date', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Place', "1","0", 'C', true);
$pdf -> Cell(82, 10, 'Personnel(s) involved', "1","0", 'C', true);

$pdf->Ln();
$pdf -> SetFont('times', '', 13);
if(isset($_GET['quarter'])) {
    $quarter = $_GET['quarter'];
    $startQ = ($quarter * 3) - 2;
    $endQ = $quarter * 3;
    if($_GET['college'] == "All") {
        $sql = "SELECT con.title_seminar, con.dateAdded, con.venue_seminar FROM seminar_training AS con WHERE YEAR(con.dateAdded) = '$year' AND MONTH(con.dateAdded) BETWEEN $startQ AND $endQ";
    } else {
        $sql = "SELECT con.title_seminar, con.dateAdded, con.venue_seminar FROM seminar_training AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS c ON fu.college_id = c.id WHERE YEAR(con.dateAdded) = '$year' AND MONTH(con.dateAdded) BETWEEN $startQ AND $endQ AND c.abbreviation_college = '$college'";
    }
} else {
    if($_GET['college'] == "All") {
        $sql = "SELECT con.title_seminar, con.dateAdded, con.venue_seminar FROM seminar_training AS con WHERE YEAR(con.dateAdded) = '$year'";
    } else {
        $sql = "SELECT con.title_seminar, con.dateAdded, con.venue_seminar FROM seminar_training AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS c ON fu.college_id = c.id WHERE YEAR(con.dateAdded) = '$year' AND c.abbreviation_college = '$college'";
    }
}
$seminarResult = $conn->query($sql);
while($seminarRow = $seminarResult->fetch_assoc()) {
    $dateString = $seminarRow['dateAdded'];
    $dateTime = new DateTime($dateString);
    $formattedDate = $dateTime->format('F d, Y');

    $pdf->SetAligns(array("C", "C", "C", ""));
    $pdf->SetWidths(array(82,81,82,82));
    $pdf->Row(array($seminarRow['title_seminar'], $formattedDate, $seminarRow['venue_seminar'], ""));
}

$pdf->SetWidths(array(82,81,82,82));
$pdf->Row(array("", "", "", ""));

$pdf->Ln(2);
$pdf -> SetFont('times', 'I', 13);
$pdf -> Cell(327, 10, '* Briefly specify the What? Who? Where? When? Why? How? of the event / activity. ', "0","0", 'L');


$pdf->Ln(20);
$pdf -> SetFont('times', '', 13);
$pdf -> Cell(327, 10, 'Noted by:', "0","0", 'L');

$pdf->Ln(15);
$pdf -> SetFont('times', '', 13);
$pdf -> Cell(327, 10, '_________________________', "0","0", 'L');

$pdf->Ln(5);
$pdf -> SetFont('times', 'B', 13);
$sql = "SELECT * FROM faculty_user WHERE authority = 'Head Research'";
$facultyUserResult = $conn->query($sql);
$facultyUserRow = $facultyUserResult->fetch_assoc();
$pdf -> Cell(327, 10, $facultyUserRow['title'].' '.strtoupper($facultyUserRow['first_name'].' '.$facultyUserRow['middle_name'].' '.$facultyUserRow['last_name']), "0","0", 'L');

$pdf->Ln(5);
$pdf -> SetFont('times', '', 13);
$pdf -> Cell(327, 10, 'Head, Research Office', "0","0", 'L');


// $pdf -> ln(-10);
// $pdf -> SetFont('times', 'B', 13);
// $pdf->SetFillColor(161, 156, 156);
// $pdf -> SetLeftMargin(15);

// $pdf -> ln(20);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> Cell(327, 10, 'Approved On-going Research Project Institutionally Funded', "1","0", 'L', true);
// $pdf->SetXY($x + 100, $y);


// $pdf->SetFillColor(236, 235, 235);
// $pdf -> ln();
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> Cell(82, 10, 'Event/Activity', "1","0", 'C', true);
// $pdf -> Cell(81, 10, 'Date', "1","0", 'C', true);
// $pdf -> Cell(82, 10, 'Place', "1","0", 'C', true);
// $pdf -> Cell(82, 10, 'Personnel(s) involved', "1","0", 'C', true);
// $pdf->SetXY($x + 81, $y);

// $pdf -> SetFont('times', '', 13);
// $pdf -> SetLeftMargin(15);
// $pdf -> ln();
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(82, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 82, $y);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(81, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 81, $y);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(82, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 82, $y);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(82, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 82, $y);


// $pdf -> ln(10);
// $pdf -> SetFont('times', 'B', 13);
// $pdf->SetFillColor(161, 156, 156);
// $pdf -> SetLeftMargin(15);

// $pdf -> ln(20);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> Cell(327, 10, 'On-going Externally-Funded Research Projects', "1","0", 'L', true);
// $pdf->SetXY($x + 100, $y);


// $pdf->SetFillColor(236, 235, 235);
// $pdf -> ln(-174);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> Cell(82, 10, 'Event/Activity', "1","0", 'C', true);
// $pdf -> Cell(81, 10, 'Date', "1","0", 'C', true);
// $pdf -> Cell(82, 10, 'Place', "1","0", 'C', true);
// $pdf -> Cell(82, 10, 'Personnel(s) involved', "1","0", 'C', true);
// $pdf->SetXY($x + 82, $y);

// $pdf -> SetFont('times', '', 13);
// $pdf -> SetLeftMargin(15);
// $pdf -> ln(10);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(82, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 82, $y);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(81, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 81, $y);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(82, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 82, $y);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(82, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 82, $y);



// $pdf -> ln(10);
// $pdf -> SetFont('times', 'B', 13);
// $pdf->SetFillColor(161, 156, 156);
// $pdf -> SetLeftMargin(15);

// $pdf -> ln(0);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> Cell(327, 10, 'Approved Institutionally Funded Research with budget more than Php 150,000.00', "1","0", 'L', true);
// $pdf->SetXY($x + 100, $y);


// $pdf->SetFillColor(236, 235, 235);
// $pdf -> ln(10);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> Cell(82, 10, 'Event/Activity', "1","0", 'C', true);
// $pdf -> Cell(81, 10, 'Date', "1","0", 'C', true);
// $pdf -> Cell(82, 10, 'Place', "1","0", 'C', true);
// $pdf -> Cell(82, 10, 'Personnel(s) involved', "1","0", 'C', true);
// $pdf->SetXY($x + 82, $y);

// $pdf -> SetFont('times', '', 13);
// $pdf -> SetLeftMargin(15);
// $pdf -> ln(10);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(82, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 82, $y);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(81, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 81, $y);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(82, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 82, $y);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(82, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 82, $y);


// $pdf -> ln(10);
// $pdf -> SetFont('times', 'B', 13);
// $pdf->SetFillColor(161, 156, 156);
// $pdf -> SetLeftMargin(15);

// $pdf -> ln(0);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> Cell(327, 10, 'Approved Institutionally Funded Research with budget less than Php 150,000.00', "1","0", 'L', true);
// $pdf->SetXY($x + 100, $y);


// $pdf->SetFillColor(236, 235, 235);
// $pdf -> ln(10);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> Cell(82, 10, 'Event/Activity', "1","0", 'C', true);
// $pdf -> Cell(81, 10, 'Date', "1","0", 'C', true);
// $pdf -> Cell(82, 10, 'Place', "1","0", 'C', true);
// $pdf -> Cell(82, 10, 'Personnel(s) involved', "1","0", 'C', true);
// $pdf->SetXY($x + 82, $y);

// $pdf -> SetFont('times', '', 13);
// $pdf -> SetLeftMargin(15);
// $pdf -> ln(10);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(82, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 82, $y);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(81, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 81, $y);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(82, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 82, $y);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(82, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 82, $y);


// $pdf -> ln(10);
// $pdf -> SetFont('times', 'B', 13);
// $pdf->SetFillColor(161, 156, 156);
// $pdf -> SetLeftMargin(15);

// $pdf -> ln(0);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> Cell(327, 10, 'Presented Research Outputs in Regional/National and International Conferences', "1","0", 'L', true);
// $pdf->SetXY($x + 100, $y);


// $pdf->SetFillColor(236, 235, 235);
// $pdf -> ln(10);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> Cell(82, 10, 'Event/Activity', "1","0", 'C', true);
// $pdf -> Cell(81, 10, 'Date', "1","0", 'C', true);
// $pdf -> Cell(82, 10, 'Place', "1","0", 'C', true);
// $pdf -> Cell(82, 10, 'Personnel(s) involved', "1","0", 'C', true);
// $pdf->SetXY($x + 82, $y);

// $pdf -> SetFont('times', '', 13);
// $pdf -> SetLeftMargin(15);
// $pdf -> ln(10);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(82, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 82, $y);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(81, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 81, $y);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(82, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 82, $y);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(82, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 82, $y);



// $pdf -> ln(10);
// $pdf -> SetFont('times', 'B', 13);
// $pdf->SetFillColor(161, 156, 156);
// $pdf -> SetLeftMargin(15);

// $pdf -> ln(0);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> Cell(327, 10, 'Submitted Paper/Proposal for Institutional Funding - Research Colloquium (Call for Proposals)', "1","0", 'L', true);
// $pdf->SetXY($x + 100, $y);


// $pdf->SetFillColor(236, 235, 235);
// $pdf -> ln(10);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> Cell(82, 10, 'Event/Activity', "1","0", 'C', true);
// $pdf -> Cell(81, 10, 'Date', "1","0", 'C', true);
// $pdf -> Cell(82, 10, 'Place', "1","0", 'C', true);
// $pdf -> Cell(82, 10, 'Personnel(s) involved', "1","0", 'C', true);
// $pdf->SetXY($x + 82, $y);

// $pdf -> SetFont('times', '', 13);
// $pdf -> SetLeftMargin(15);
// $pdf -> ln(10);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(82, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 82, $y);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(81, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 81, $y);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(82, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 82, $y);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(82, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 82, $y);



// $pdf -> ln(10);
// $pdf -> SetFont('times', 'B', 13);
// $pdf->SetFillColor(161, 156, 156);
// $pdf -> SetLeftMargin(15);

// $pdf -> ln(0);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> Cell(327, 10, 'Submitted Paper/Proposal for Local Institutional Funding - Research Colloquium (Call for Proposals)', "1","0", 'L', true);
// $pdf->SetXY($x + 100, $y);


// $pdf->SetFillColor(236, 235, 235);
// $pdf -> ln(10);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> Cell(82, 10, 'Event/Activity', "1","0", 'C', true);
// $pdf -> Cell(81, 10, 'Date', "1","0", 'C', true);
// $pdf -> Cell(82, 10, 'Place', "1","0", 'C', true);
// $pdf -> Cell(82, 10, 'Personnel(s) involved', "1","0", 'C', true);
// $pdf->SetXY($x + 82, $y);

// $pdf -> SetFont('times', '', 13);
// $pdf -> SetLeftMargin(15);
// $pdf -> ln(10);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(82, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 82, $y);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(81, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 81, $y);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(82, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 82, $y);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(82, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 82, $y);


// $pdf -> ln(10);
// $pdf -> SetFont('times', 'B', 13);
// $pdf->SetFillColor(161, 156, 156);
// $pdf -> SetLeftMargin(15);

// $pdf -> ln(0);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> Cell(327, 10, 'Publication of Research output in ISI/Scopus journals', "1","0", 'L', true);
// $pdf->SetXY($x + 100, $y);


// $pdf->SetFillColor(236, 235, 235);
// $pdf -> ln(-170);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> Cell(82, 10, 'Event/Activity', "1","0", 'C', true);
// $pdf -> Cell(81, 10, 'Date', "1","0", 'C', true);
// $pdf -> Cell(82, 10, 'Place', "1","0", 'C', true);
// $pdf -> Cell(82, 10, 'Personnel(s) involved', "1","0", 'C', true);
// $pdf->SetXY($x + 82, $y);

// $pdf -> SetFont('times', '', 13);
// $pdf -> SetLeftMargin(15);
// $pdf -> ln(10);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(82, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 82, $y);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(81, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 81, $y);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(82, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 82, $y);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(82, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 82, $y);




// $pdf -> ln(10);
// $pdf -> SetFont('times', 'B', 13);
// $pdf->SetFillColor(161, 156, 156);
// $pdf -> SetLeftMargin(15);

// $pdf -> ln(0);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> Cell(327, 10, 'Faculty Engagement in the conduct of research and research related activities such as trainings and seminars', "1","0", 'L', true);
// $pdf->SetXY($x + 100, $y);


// $pdf->SetFillColor(236, 235, 235);
// $pdf -> ln(10);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> Cell(82, 10, 'Event/Activity', "1","0", 'C', true);
// $pdf -> Cell(81, 10, 'Date', "1","0", 'C', true);
// $pdf -> Cell(82, 10, 'Place', "1","0", 'C', true);
// $pdf -> Cell(82, 10, 'Personnel(s) involved', "1","0", 'C', true);
// $pdf->SetXY($x + 82, $y);

// $pdf -> SetFont('times', '', 13);
// $pdf -> SetLeftMargin(15);
// $pdf -> ln(10);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(82, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 82, $y);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(81, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 81, $y);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(82, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 82, $y);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(82, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 82, $y);


// $pdf -> ln();
// $pdf -> SetFont('times', 'B', 13);
// $pdf->SetFillColor(161, 156, 156);
// $pdf -> SetLeftMargin(15);


// $pdf -> ln(-10);
// $pdf -> ln(0);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> Cell(327, 10, 'Faculty Engagement in the conduct of research and research related activities such as trainings and seminars', "1","0", 'L', true);
// $pdf->SetXY($x + 100, $y);


// $pdf->SetFillColor(236, 235, 235);
// $pdf -> ln(10);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> Cell(82, 10, 'Event/Activity', "1","0", 'C', true);
// $pdf -> Cell(81, 10, 'Date', "1","0", 'C', true);
// $pdf -> Cell(82, 10, 'Place', "1","0", 'C', true);
// $pdf -> Cell(82, 10, 'Personnel(s) involved', "1","0", 'C', true);
// $pdf->SetXY($x + 82, $y);


// $pdf -> SetFont('times', '', 13);
// $pdf -> SetLeftMargin(15);
// $pdf -> ln(10);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(82, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 82, $y);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(81, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 81, $y);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(82, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 82, $y);
// $x = $pdf->GetX();
// $y = $pdf->GetY();
// $pdf -> MultiCell(82, 10, 'Example', 1, 'C');
// $pdf->SetXY($x + 82, $y);



$pdf -> Output();