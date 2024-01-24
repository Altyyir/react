<?php
require('vendor/fpdf/fpdf.php');
include 'dbconn.php';

$personalProfileID = $_GET['id'];

$sql = "SELECT psn.*, YEAR(psn.dateofbirth) AS birth_year, MONTH(psn.dateofbirth) AS birth_month, DAY(psn.dateofbirth) AS birth_day,  cp.campus_name FROM personal_profile AS psn INNER JOIN faculty_user AS fct ON psn.added_by = fct.id INNER JOIN college AS cl ON fct.college_id = cl.id INNER JOIN campus AS cp ON cl.campus_id = cp.id WHERE psn.id = $personalProfileID";
$result = $conn->query($sql);
$personalProfileRow = $result->fetch_assoc();
$addedBy = $personalProfileRow['added_by'];

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
        $h = 5*$nb;
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
}

$pdf = new PDF('P','mm','Legal');
$pdf->AddPage();

$pdf->SetFont('Times','',10);
$pdf->Cell(0, 6, 'Attachment D-BatStateU-FO-RES-02', 0, 2, 'L');

$pdf->SetFont('Times','B',10);
$pdf->Cell(0, 6, 'CURRICULUM VITAE', 0, 2, 'C');

$pdf->SetFont('Times','B',9);
$pdf->SetFillColor(141, 141, 141);
$pdf->SetDrawColor(141, 141, 141);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(0, 6, 'PERSONAL INFORMATION', 1, 2, 'L', true);

$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Times','',9);
$pdf->Cell(65.3, 6, 'Last Name', 1, 0, 'C', false);
$pdf->Cell(65.3, 6, 'First Name', 1, 0, 'C', false);
$pdf->Cell(65.3, 6, 'Middle Name', 1, 0, 'C', false);

$pdf->Ln();
$pdf->Cell(65.3, 6, strtoupper($personalProfileRow['lastname']), 'LTB', 0, 'C', false);
$pdf->Cell(65.3, 6, strtoupper($personalProfileRow['firstname']), 'TB', 0, 'C', false);
$pdf->Cell(65.3, 6, strtoupper($personalProfileRow['middlename']), 'RTB', 0, 'C', false);

$pdf->Ln();
$pdf->Cell(84, 6, 'Agency: BATANGAS STATE UNIVERSITY', 1, 0, 'L', false);
$pdf->Cell(50, 6, 'Gender: '.strtoupper($personalProfileRow['gender']), 1, 0, 'L', false);
$pdf->Cell(62, 6, 'Birthday (mm/dd/yyy): '.$personalProfileRow['birth_month'].'/'.$personalProfileRow['birth_day'].'/'.$personalProfileRow['birth_year'], 1, 0, 'L', false);

$pdf->Ln();
$pdf->Cell(0, 6, '', 1, 0, 'L', false);

$pdf->Ln();
$pdf->Cell(49, 6, 'Region', 1, 0, 'C', false);
$pdf->Cell(49, 6, 'Province', 1, 0, 'C', false);
$pdf->Cell(49, 6, 'Barangay', 1, 0, 'C', false);
$pdf->Cell(49, 6, 'Street', 1, 0, 'C', false);

$pdf->Ln();
$pdf->Cell(49, 6, strtoupper($personalProfileRow['region']), 1, 0, 'C', false);
$pdf->Cell(49, 6, strtoupper($personalProfileRow['province']), 1, 0, 'C', false);
$pdf->Cell(49, 6, strtoupper($personalProfileRow['barangay']), 1, 0, 'C', false);
$pdf->Cell(49, 6, strtoupper($personalProfileRow['sss']), 1, 0, 'C', false);

$pdf->Ln();
$pdf->Cell(65.3, 8, 'Landline no.: ', 1, 0, 'L', false);
$pdf->Cell(65.3, 8, 'Cellphone no.: '.strtoupper($personalProfileRow['mobileno']), 1, 0, 'L', false);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Cell(65.3, 4, 'Email Address: ', 'LTR', 0, 'L', false);
$pdf->SetXY($x, $y+4);
$pdf->Cell(65.3, 4, $personalProfileRow['emailprimary'], 'LBR', 0, 'L', false);

$pdf->Ln();
$pdf->SetFont('Times','B',9);
$pdf->SetFillColor(141, 141, 141);
$pdf->SetDrawColor(141, 141, 141);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(0, 6, 'ACADEMIC BACKGROUND', 1, 2, 'L', true);

$pdf->Ln(0);
$pdf->SetFillColor(240, 240, 240);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(35, 12, 'Degree Earned', 1, 0, 'C', true);
$pdf->Cell(25, 12, 'Major Field', 1, 0, 'C', true);
$pdf->Cell(25, 12, 'Sector', 1, 0, 'C', true);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell(25, 6, 'Learning Institution', 1, 'C', true);
$pdf->SetXY($x+25, $y);
$pdf->Cell(22, 12, 'Status', 1, 0, 'C', true);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Cell(22, 6, 'Year Taken', 1, 0, 'C', true);
$pdf->SetXY($x, $y+6);
$pdf->Cell(11, 6, 'Start', 1, 0, 'C', true);
$pdf->Cell(11, 6, 'End', 1, 0, 'C', true);
$pdf->SetXY($x+22, $y);
$pdf->Cell(42, 12, 'Thesis', 1, 0, 'C', true);

$pdf->Ln();
$pdf->SetFont('Times','',8);
$pdf->SetWidths(array(35, 25, 25, 25, 22, 11, 11, 42));
$pdf->SetAligns(array('C', 'C', 'C', 'C', 'C', 'C', 'C', 'C'));
$sql = "SELECT *, YEAR(year_start) AS start, YEAR(year_end) AS end FROM academic_background WHERE added_by = $addedBy";
$result = $conn->query($sql);
while($academicBackgroundRow = $result->fetch_assoc()) {
    $pdf->Row(array(strtoupper($academicBackgroundRow['degree']), strtoupper($academicBackgroundRow['major_field']), strtoupper($academicBackgroundRow['sector']), strtoupper($academicBackgroundRow['institution']), strtoupper($academicBackgroundRow['status']), strtoupper($academicBackgroundRow['start']), strtoupper($academicBackgroundRow['end']), strtoupper($academicBackgroundRow['thesis'])));
}
$pdf->Row(array('', '', '', '', '', '', '', ''));

$pdf->Ln(0);
$pdf->SetFont('Times','B',9);
$pdf->SetFillColor(240, 240, 240);
$pdf->SetDrawColor(141, 141, 141);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(0, 6, 'SCHOLARSHIP', 1, 2, 'L', true);

$pdf->Ln(0);
$pdf->SetFillColor(240, 240, 240);
$pdf->SetTextColor(0, 0, 0);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell(35, 20, 'Sponsor', 1, 'C', true);
$pdf->SetXY($x+35, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell(25, 10, 'Primary Sponsor', 1, 'C', true);
$pdf->SetXY($x+25, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell(25, 10, 'Scholarship Period', 1, 'C', true);
$pdf->SetXY($x, $y+10);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetFont('Times','',9);
$pdf->MultiCell(12.5, 10, 'Start', 1, 'C', true);
$pdf->SetXY($x+12.5, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell(12.5, 10, 'End', 1, 'C', true);
$pdf->SetXY($x+12.5, $y-10);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetFont('Times','B',9);
$pdf->MultiCell(25, 10, 'Extension Period', 1, 'C', true);
$pdf->SetXY($x, $y+10);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetFont('Times','',9);
$pdf->MultiCell(12.5, 10, 'Start', 1, 'C', true);
$pdf->SetXY($x+12.5, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell(12.5, 10, 'End', 1, 'C', true);
$pdf->SetXY($x+12.5, $y-10);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetFont('Times','B',9);
$pdf->MultiCell(86, 10, 'Scholarship Grants', 1, 'C', true);
$pdf->SetXY($x, $y+10);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetFont('Times','',9);
$pdf->MultiCell(21.5, 10, 'Item Expenses', 1, 'C', true);
$pdf->SetXY($x+21.5, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell(21.5, 5, 'Amount Approved', 1, 'C', true);
$pdf->SetXY($x+21.5, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell(21.5, 5, 'Amount Released', 1, 'C', true);
$pdf->SetXY($x+21.5, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell(21.5, 10, 'Date Released', 1, 'C', true);

$pdf->Ln(0);
$pdf->SetFont('Times','',8);
$pdf->SetWidths(array(35, 25, 12.5, 12.5, 12.5, 12.5, 21.5, 21.5, 21.5, 21.5));
$pdf->SetAligns(array('C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C'));
$pdf->Row(array('N/A', '', '', '', '', '', '', '', '', ''));
$pdf->Row(array('', '', '', '', '', '', '', '', '', ''));

$pdf->Ln(0);
$pdf->SetFont('Times','B',9);
$pdf->SetFillColor(141, 141, 141);
$pdf->SetDrawColor(141, 141, 141);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(0, 6, 'EMPLOYMENT', 1, 2, 'L', true);

$pdf->Ln(0);
$pdf->SetFillColor(240, 240, 240);
$pdf->SetTextColor(0, 0, 0);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell(35, 16, 'Agency', 1, 'C', true);
$pdf->SetXY($x+35, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell(38, 16, 'Plantilla Position', 1, 'C', true);
$pdf->SetXY($x+38, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell(37, 16, 'Status of Appointment', 1, 'C', true);
$pdf->SetXY($x+37, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell(43, 8, 'Date of Appointment', 1, 'C', true);
$pdf->SetXY($x, $y+8);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetFont('Times','',9);
$pdf->MultiCell(21.5, 8, 'Start', 1, 'C', true);
$pdf->SetXY($x+21.5, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell(21.5, 8, 'End', 1, 'C', true);
$pdf->SetXY($x+21.5, $y-8);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetFont('Times','B',9);
$pdf->MultiCell(43, 16, 'Monthly Salary', 1, 'C', true);

$pdf->Ln(0);
$pdf->SetWidths(array(35, 38, 37, 21.5, 21.5, 43));
$pdf->SetAligns(array('C', 'C', 'C', 'C', 'C', 'C'));
$pdf->SetFont('Times','',8);
$sql = "SELECT * FROM employment WHERE added_by = $addedBy";
$result = $conn->query($sql);
while($employmentRow = $result->fetch_assoc()) {
    $pdf->Row(array(strtoupper($employmentRow['agency']), strtoupper($employmentRow['plantilla_position']), strtoupper($employmentRow['status']), strtoupper($employmentRow['appointment_start']), strtoupper($employmentRow['appointment_end']), strtoupper($employmentRow['monthly_salary'])));
}
$pdf->Row(array('', '', '', '', '', ''));

$pdf->Ln(0);
$pdf->SetFont('Times','B',9);
$pdf->SetFillColor(141, 141, 141);
$pdf->SetDrawColor(141, 141, 141);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(0, 6, 'FIELD OF SPECIALIZATION', 1, 2, 'L', true);

$pdf->Ln(0);
$pdf->SetFillColor(240, 240, 240);
$pdf->SetTextColor(0, 0, 0);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell(110, 8, 'Specialization', 1, 'C', true);
$pdf->SetXY($x+110, $y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell(86, 8, 'Primary Field', 1, 'C', true);

$pdf->Ln(0);
$pdf->SetFont('Times','',8);
$pdf->SetWidths(array(110, 86));
$pdf->SetAligns(array('C', 'C'));
$sql = "SELECT * FROM specialization WHERE added_by = $addedBy";
$result = $conn->query($sql);
while($specializationRow = $result->fetch_assoc()) {
    $pdf->Row(array(strtoupper($specializationRow['specialization']), strtoupper($specializationRow['primary_field'])));
}
$pdf->Row(array('', ''));

$pdf->Ln(0);
$pdf->SetFont('Times','B',9);
$pdf->SetFillColor(141, 141, 141);
$pdf->SetDrawColor(141, 141, 141);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(0, 6, 'R&D AWARDS', 1, 2, 'L', true);

$pdf->Ln(0);
$pdf->SetFillColor(240, 240, 240);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(39.2, 8, 'Title of R&D Award', 1, 0, 'C', true);
$pdf->Cell(39.2, 8, 'Rank', 1, 0, 'C', true);
$pdf->Cell(39.2, 8, 'Category', 1, 0, 'C', true);
$pdf->Cell(39.2, 8, 'Granting Institution', 1, 0, 'C', true);
$pdf->Cell(39.2, 8, 'Year Granted', 1, 0, 'C', true);

$pdf->Ln();
$pdf->SetWidths(array(39.2, 39.2, 39.2, 39.2, 39.2));
$pdf->SetAligns(array('C', 'C', 'C', 'C', 'C'));
$pdf->SetFont('Times','',8);
$sql = "SELECT `award`, `rank`, `category`, `granting_institution`, YEAR(`year_granted`) AS `year_granted` FROM `award` WHERE `added_by` = $addedBy";
$result = $conn->query($sql);
while($awardRow = $result->fetch_assoc()) {
    $pdf->Row(array(strtoupper($awardRow['award']), strtoupper($awardRow['rank']), strtoupper($awardRow['category']), strtoupper($awardRow['granting_institution']), strtoupper($awardRow['year_granted'])));    
}
$pdf->Row(array('', '', '', '', ''));


$pdf->SetFont('times', 'B', 10);
$pdf->SetFillColor(141, 141, 141);
$pdf->SetDrawColor(141, 141, 141);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(196, 6, 'R&D PROJECTS HEADED/CONDUCTED', 1, 0, 'L', true); // database name projectprofile

$pdf->Ln();
$pdf->SetFont('times', 'B', 9);
$pdf->SetFillColor(240, 240, 240);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(39.2, 12, 'Title of R&D Project', 1, 0, 'C', true);
$pdf->Cell(39.2, 12, 'Designation', 1, 0, 'C', true);
$pdf->Cell(39.2, 12, 'Sector', 1, 0, 'C', true);
$pdf->Cell(55, 12, 'Current Status', 1, 0, 'C', true);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->Cell(23.4, 6, 'Year', 1, 0, 'C', true);
$pdf->SetXY($x, $y+6);
$pdf->SetFont('times', '', 9);
$pdf->Cell(11.7, 6, 'From', 1, 0, 'C', true);
$pdf->Cell(11.7, 6, 'To', 1, 0, 'C', true);

$pdf->Ln();
$pdf->SetFont('times', '', 8);
$pdf->SetWidths(array(39.2, 39.2, 39.2, 55, 11.7, 11.7));
$pdf->SetAligns(array('C', 'C', 'C', 'C', 'C', 'C'));
$sql = "SELECT titleproject, positionproject, sector, status, YEAR(from_project) AS year_from, YEAR(to_project) AS year_to FROM project_profile WHERE added_by = $addedBy";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    $pdf->Row(array(strtoupper($row['titleproject']), strtoupper($row['positionproject']), strtoupper($row['sector']), strtoupper($row['status']), strtoupper($row['year_from']), strtoupper($row['year_to'])));
    
}
$pdf->Row(array('', '', '', '', '', ''));


$pdf->Ln(0);
$pdf->SetFont('times', 'B', 10);
$pdf->SetFillColor(141, 141, 141);
$pdf->SetDrawColor(141, 141, 141);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(196, 6, 'R&D RELATED PUBLICATIONS ', 1, 0, 'L', true); //database name scw_

$pdf->Ln();
$pdf->SetFont('times', 'B', 9);
$pdf->SetFillColor(240, 240, 240);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(39.2, 12, 'Title of R&D Project', 1, 0, 'C', true);
$pdf->Cell(28, 12, 'Year Published', 1, 0, 'C', true);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->MultiCell(25, 6, 'Place of Publication', 1, 'C', true);
$pdf->SetXY($x+25, $y);
$pdf->Cell(65, 12, 'Publication Group', 1, 0, 'C', true);
$pdf->Cell(38.8, 12, 'Authoring Type', 1, 0, 'C', true);

$pdf->Ln();
$pdf->SetFont('times', '', 8);
$pdf->SetWidths(array(39.2, 28, 25, 65, 38.8));
$pdf->SetAligns(array('C', 'C', 'C', 'C', 'C'));
$sql = "SELECT title, year_published, place_publication, publication_group, authoring_type FROM scw_ WHERE added_by = $addedBy";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    $pdf->Row(array(strtoupper($row['title']), strtoupper($row['year_published']), strtoupper($row['place_publication']), strtoupper($row['publication_group']), strtoupper($row['authoring_type'])));
}
$pdf->Row(array('', '', '', '', ''));

$pdf->Ln(0);
$pdf->SetFont('times', 'B', 10);
$pdf->SetFillColor(141, 141, 141);
$pdf->SetDrawColor(141, 141, 141);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(196, 6, 'R&D PRESENTATION ', 1, 0, 'L', true); //database name conferences

$pdf->Ln();
$pdf->SetFont('times', 'B', 9);
$pdf->SetFillColor(240, 240, 240);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(39.2, 12, 'Title of Research Paper', 1, 0, 'C', true);
$pdf->Cell(31, 12, 'Conference Title', 1, 0, 'C', true);
$pdf->Cell(30, 12, 'Category', 1, 0, 'C', true);
$pdf->Cell(27, 12, 'Date', 1, 0, 'C', true);
$pdf->Cell(30, 12, 'Venue', 1, 0, 'C', true);
$pdf->Cell(38.8, 12, 'Sponsor', 1, 0, 'C', true);

$pdf->Ln();
$pdf->SetFont('times', '', 8);
$pdf->SetWidths(array(39.2, 31, 30, 27, 30, 38.8));
$pdf->SetAligns(array('C', 'C', 'C', 'C', 'C', 'C'));
$sql = "SELECT themetitle, conference_title, organizer, conference, from_conference, to_conference, venue FROM conferences WHERE added_by = $addedBy";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    $dateString1 = $row['from_conference'];
    $dateTime1 = new DateTime($dateString1);
    $formattedDate1 = $dateTime1->format('F d, Y');

    $dateString2 = $row['to_conference'];
    $dateTime2 = new DateTime($dateString2);
    $formattedDate2 = $dateTime2->format('F d, Y');
    $pdf->Row(array(strtoupper($row['themetitle']), strtoupper($row['conference_title']), strtoupper($row['conference']), strtoupper($formattedDate1." - ".$formattedDate2), strtoupper($row['venue']), strtoupper($row['organizer'])));    
}
$pdf->Row(array('', '', '', '', '', ''));

$pdf->Output();
?>