<?php 
require 'dbconn.php';
require ('vendor/fpdf/fpdf.php');


function hex2dec($couleur = "#000000"){
    $R = substr($couleur, 1, 2);
    $rouge = hexdec($R);
    $V = substr($couleur, 3, 2);
    $vert = hexdec($V);
    $B = substr($couleur, 5, 2);
    $bleu = hexdec($B);
    $tbl_couleur = array();
    $tbl_couleur['R']=$rouge;
    $tbl_couleur['V']=$vert;
    $tbl_couleur['B']=$bleu;
    return $tbl_couleur;
}

//conversion pixel -> millimeter at 72 dpi
function px2mm($px){
    return $px*25.4/72;
}

function txtentities($html){
    $trans = get_html_translation_table(HTML_ENTITIES);
    $trans = array_flip($trans);
    return strtr($html, $trans);
}
////////////////////////////////////

class PDF extends FPDF
{
//variables of html parser
protected $B;
protected $I;
protected $U;
protected $HREF;
protected $fontlist;
protected $issetfont;
protected $issetcolor;

function __construct($orientation='P', $unit='mm', $size='A4')
{
    //Call parent constructor
    parent::__construct($orientation,$unit,$size);
    //Initialization
    $this->B=0;
    $this->I=0;
    $this->U=0;
    $this->HREF='';
    $this->fontlist=array('arial', 'times', 'courier', 'helvetica', 'symbol');
    $this->issetfont=false;
    $this->issetcolor=false;
}

    function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Tracking No.________________',0,0,'L');
    $this->Cell(0,10,'Page '.$this->PageNo().' of {nb}',0,0,'R');
}

function WriteHTML($html)
{
    //HTML parser
    $html=strip_tags($html,"<b><u><i><a><img><p><br><strong><em><font><tr><blockquote>"); //supprime tous les tags sauf ceux reconnus
    $html=str_replace("\n",' ',$html); //remplace retour à la ligne par un espace
    $a=preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE); //éclate la chaîne avec les balises
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            //Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            else
                $this->MultiCell(175, 5, "VII. Executive Brief: \n" . $e, "1","0");
                // $this->Write(5,txtentities($e));
        }
        else
        {
            //Tag
            if($e[0]=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                //Extract attributes
                $a2=explode(' ',$e);
                $tag=strtoupper(array_shift($a2));
                $attr=array();
                foreach($a2 as $v)
                {
                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                        $attr[strtoupper($a3[1])]=$a3[2];
                }
                $this->OpenTag($tag,$attr);
            }
        }
    }
}

function OpenTag($tag, $attr)
{
    //Opening tag
    switch($tag){
        case 'STRONG':
            $this->SetStyle('B',true);
            break;
        case 'EM':
            $this->SetStyle('I',true);
            break;
        case 'B':
        case 'I':
        case 'U':
            $this->SetStyle($tag,true);
            break;
        case 'A':
            $this->HREF=$attr['HREF'];
            break;
        case 'IMG':
            if(isset($attr['SRC']) && (isset($attr['WIDTH']) || isset($attr['HEIGHT']))) {
                if(!isset($attr['WIDTH']))
                    $attr['WIDTH'] = 0;
                if(!isset($attr['HEIGHT']))
                    $attr['HEIGHT'] = 0;
                $this->Image($attr['SRC'], $this->GetX(), $this->GetY(), px2mm($attr['WIDTH']), px2mm($attr['HEIGHT']));
            }
            break;
        case 'TR':
        case 'BLOCKQUOTE':
        case 'BR':
            $this->Ln(5);
            break;
        case 'P':
            $this->Ln(10);
            break;
        case 'FONT':
            if (isset($attr['COLOR']) && $attr['COLOR']!='') {
                $coul=hex2dec($attr['COLOR']);
                $this->SetTextColor($coul['R'],$coul['V'],$coul['B']);
                $this->issetcolor=true;
            }
            if (isset($attr['FACE']) && in_array(strtolower($attr['FACE']), $this->fontlist)) {
                $this->SetFont(strtolower($attr['FACE']));
                $this->issetfont=true;
            }
            break;
    }
}

function CloseTag($tag)
{
    //Closing tag
    if($tag=='STRONG')
        $tag='B';
    if($tag=='EM')
        $tag='I';
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF='';
    if($tag=='FONT'){
        if ($this->issetcolor==true) {
            $this->SetTextColor(0);
        }
        if ($this->issetfont) {
            $this->SetFont('arial');
            $this->issetfont=false;
        }
    }
}

function SetStyle($tag, $enable)
{
    //Modify style and select corresponding font
    $this->$tag+=($enable ? 1 : -1);
    $style='';
    foreach(array('B','I','U') as $s)
    {
        if($this->$s>0)
            $style.=$s;
    }
    $this->SetFont('',$style);
}

function PutLink($URL, $txt)
{
    //Put a hyperlink
    $this->SetTextColor(0,0,255);
    $this->SetStyle('U',true);
    $this->Write(5,$txt,$URL);
    $this->SetStyle('U',false);
    $this->SetTextColor(0);
}

}



$pdf = new PDF('P', 'mm', 'Legal');

$id = $_GET['id'];

$query = "SELECT * FROM research_topic WHERE `id` = '$id'"; // Replace 'your_table_name' with your actual table name
$result = mysqli_query($conn, $query); // Assuming you have an open database connection

while ($row = mysqli_fetch_assoc($result)) {

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetTitle('Research Proposal');


// $pdf -> SetDisplayMode('real','default');
$pdf -> SetFont('arial', '', 10);
$pdf ->SetLeftMargin(18);

$pdf -> Cell(19, 18, '', "1","0", 'C');
$pdf -> Image('images/bsu.png',19,11,17,0,'');
$pdf -> Cell(68, 18, 'Reference No.: BatStateU-FO-RES-02', "1","0", 'C');
$pdf -> Cell(55, 18, 'Effectivity Date: May 18, 2022', "1","0", 'C');
$pdf -> Cell(39, 18, 'Revision No.:' . $row['revision_no'], "1","0", 'C');
$pdf -> ln();
$pdf -> SetFont('arial', 'B', 12);
$pdf -> Cell(181, 9, 'DETAILED RESEARCH PROPOSAL', "1","0", 'C');
$pdf -> SetFont('arial', '', 11);
$pdf -> ln();
$pdf -> MultiCell(181, 7, 'I. Research Project Title: ' . $row['project_title'], "1");
$pdf -> ln(0);  
$pdf -> MultiCell(181, 9, 'II. BatStateU Research Agenda: ' . $row['research_agenda'], "1");
$pdf -> ln(0);
$pdf -> MultiCell(181, 55, '', "1");
$pdf -> Write(-103, "III. Sustainable Development Goal :", );
$pdf -> Write(-47, "\n");
$pdf->SetX($pdf->GetX() - -4);
if ($row['sdg_1'] == "1") {
    $pdf->Cell(4, 4, '     SDG1: No Poverty', 1, 0, 'L', true);
} else {
    $pdf->Cell(4, 4, '     SDG1: No Poverty', 1, 0, 'L', false);
}
$pdf->SetX($pdf->GetX() - -80);
if ($row['sdg_10'] == "1") {
    $pdf->Cell(4, 4, "     SDG10: Reduced Inequalities", 1, 0, 'L', true);
} else {
    $pdf->Cell(4, 4, "     SDG10: Reduced Inequalities", 1, 0, 'L', false);
}
$pdf -> Write(5, "\n");
$pdf->SetX($pdf->GetX() - -4);
if ($row['sdg_2'] == "1") {
    $pdf->Cell(4, 4, '     SDG2: Zero Hunger', 1, 0, 'L', true);
} else {
    $pdf->Cell(4, 4, '     SDG2: Zero Hunger', 1, 0, 'L', false);
}
$pdf->SetX($pdf->GetX() - -80);
if ($row['sdg_11'] == "1") {
    $pdf->Cell(4, 4, "     SDG11: Sustainable Cities & Communities", 1, 0, 'L', true);
} else {
    $pdf->Cell(4, 4, "     SDG11: Sustainable Cities & Communities", 1, 0, 'L', false);
}
$pdf -> Write(5, "\n");
$pdf->SetX($pdf->GetX() - -4);
if ($row['sdg_3'] == "1") {
    $pdf->Cell(4, 4, '     SDG3: Good Health & Well-being', 1, 0, 'L', true);
} else {
    $pdf->Cell(4, 4, '     SDG3: Good Health & Well-being', 1, 0, 'L', false);
}
$pdf->SetX($pdf->GetX() - -80);
if ($row['sdg_12'] == "1") {
    $pdf->Cell(4, 4, "     SDG12: Responsible Consumption & Production", 1, 0, 'L', true);
} else {
    $pdf->Cell(4, 4, "     SDG12: Responsible Consumption & Production", 1, 0, 'L', false);
}
$pdf -> Write(5, "\n");
$pdf->SetX($pdf->GetX() - -4);
if ($row['sdg_4'] == "1") {
    $pdf->Cell(4, 4, '     SDG4: Quality Education', 1, 0, 'L', true);
} else {
    $pdf->Cell(4, 4, '     SDG4: Quality Education', 1, 0, 'L', false);
}
$pdf->SetX($pdf->GetX() - -80);
if ($row['sdg_13'] == "1") {
    $pdf->Cell(4, 4, "     SDG13: Climate Action", 1, 0, 'L', true);
} else {
    $pdf->Cell(4, 4, "     SDG13: Climate Action", 1, 0, 'L', false);
}
$pdf -> Write(5, "\n");
$pdf->SetX($pdf->GetX() - -4);
if ($row['sdg_5'] == "1") {
    $pdf->Cell(4, 4, '     SDG5: Gender Equality', 1, 0, 'L', true);
} else {
    $pdf->Cell(4, 4, '     SDG5: Gender Equality', 1, 0, 'L', false);
}
$pdf->SetX($pdf->GetX() - -80);
if ($row['sdg_14'] == "1") {
    $pdf->Cell(4, 4, "     SDG14: Life Below Water", 1, 0, 'L', true);
} else {
    $pdf->Cell(4, 4, "     SDG14: Life Below Water", 1, 0, 'L', false);
}
$pdf -> Write(5, "\n");
$pdf->SetX($pdf->GetX() - -4);
if ($row['sdg_6'] == "1") {
    $pdf->Cell(4, 4, '     SDG6: Clean Water & Sanitation', 1, 0, 'L', true);
} else {
    $pdf->Cell(4, 4, '     SDG6: Clean Water & Sanitation', 1, 0, 'L', false);
}
$pdf->SetX($pdf->GetX() - -80);
if ($row['sdg_15'] == "1") {
    $pdf->Cell(4, 4, "     SDG15: Life on Land", 1, 0, 'L', true);
} else {
    $pdf->Cell(4, 4, "     SDG15: Life on Land", 1, 0, 'L', false);
}
$pdf -> Write(5, "\n");
$pdf->SetX($pdf->GetX() - -4);
if ($row['sdg_7'] == "1") {
    $pdf->Cell(4, 4, '     SDG7: Affordable and Clean Energy', 1, 0, 'L', true);
} else {
    $pdf->Cell(4, 4, '     SDG7: Affordable and Clean Energy', 1, 0, 'L', false);
}
$pdf->SetX($pdf->GetX() - -80);
if ($row['sdg_16'] == "1") {
    $pdf->Cell(4, 4, "     SDG16: Peace, Justice, & Strong Institutions", 1, 0, 'L', true);
} else {
    $pdf->Cell(4, 4, "     SDG16: Peace, Justice, & Strong Institutions", 1, 0, 'L', false);
}
$pdf -> Write(5, "\n");
$pdf->SetX($pdf->GetX() - -4);
if ($row['sdg_8'] == "1") {
    $pdf->Cell(4, 4, '     SDG8: Decent Work & Economic Growth', 1, 0, 'L', true);
} else {
    $pdf->Cell(4, 4, '     SDG8: Decent Work & Economic Growth', 1, 0, 'L', false);
}
$pdf->SetX($pdf->GetX() - -80);
if ($row['sdg_17'] == "1") {
    $pdf->Cell(4, 4, "     SDG17: Partnerships for the Goals", 1, 0, 'L', true);
} else {
    $pdf->Cell(4, 4, "     SDG17: Partnerships for the Goals", 1, 0, 'L', false);
}
$pdf -> Write(5, "\n");
$pdf->SetX($pdf->GetX() - -4);
if ($row['sdg_9'] == "1") {
    $pdf->Cell(4, 4, '     SDG9: Industry, Innovation, & Infrastructure', 1, 0, 'L', true);
} else {
    $pdf->Cell(4, 4, '     SDG9: Industry, Innovation, & Infrastructure', 1, 0, 'L', false);
}

$query = "SELECT * FROM `research_representatives` WHERE `research_topic_id` = '$id'"; // Replace 'your_table_name' with your actual table name
$result = mysqli_query($conn, $query); // Assuming you have an open database connection
$text="";
$first = true;

while ($row2 = mysqli_fetch_assoc($result)) {
    if($first) {
        $text = $text . $row2['role'] . ":\n";
        $first = !$first;
    } else {
        $text = $text . "     " . $row2['role'] . ":\n";
    }
    $research_representative_ids = $row2['id'];
    $sql = "SELECT * FROM `representative` WHERE `research_representatives_id` = '$research_representative_ids'";
    $result3 = $conn->query($sql);
    while ($row3 = $result3->fetch_assoc()) {
        $text = $text . "          " . $row3['name'] . "\n";
        // $sql = "SELECT * FROM `representative` WHERE `research_representatives_id` = '$research_representative_ids'";
        //   $result4 = $conn->query($sql);   
    }
} 

$pdf -> ln(7);
$pdf -> MultiCell(181, 5, "IV. ".$text, "1","0");


$pdf -> ln(0);
$pdf -> MultiCell(181, 25, '', "1");
$pdf -> Write(-44, "V. Proponent Agency: Batangas State University The National Engineering University:", );
$pdf -> Write(-18, "\n");
$pdf->SetX($pdf->GetX() - -5);
$pdf -> Write(3, "Department: " . $row['department']);
$pdf -> Write(6, "\n");
$pdf->SetX($pdf->GetX() - -5);
$pdf -> Write(3, "College: ". $row['college']);
$pdf -> Write(6, "\n");
$pdf->SetX($pdf->GetX() - -5);
$pdf -> Write(3, "Campus: ". $row['campus']);

$pdf -> ln(6);
$pdf -> MultiCell(181, 5, "VI. Executive Brief: \n" . str_replace('&nbsp;', '', strip_tags($row['executive_brief'])), "1","0");
$pdf -> ln(0);
$pdf -> MultiCell(181, 5, "VII. Rationale: \n" . str_replace('&nbsp;', '', strip_tags($row['rationale'])), "1","0");
$pdf -> ln(0);
$pdf -> MultiCell(181, 5, "VIII. Objectives of the Project: \n" . str_replace('&nbsp;', '', strip_tags($row['objective'])), "1","0");

$pdf -> ln(0);
$pdf -> MultiCell(181, 50, '', "1");
$pdf -> Write(-93, "IX. Expected Output of the Project: (based on expanded 6Ps of research)", );
$pdf -> Write(-2, "\n");
$pdf->SetX($pdf->GetX() - -4);
$pdf -> Write(-75, "1. Publication: " . $row['publication']);
$pdf -> Write(-34, "\n");
$pdf->SetX($pdf->GetX() - -4);
$pdf -> Write(3, "2. Patent: " . $row['patent']);
$pdf -> Write(5, "\n");
$pdf->SetX($pdf->GetX() - -4);
$pdf -> Write(3, "3. Product: " . $row['product']);
$pdf -> Write(5, "\n");
$pdf->SetX($pdf->GetX() - -4);
$pdf -> Write(3, "4. People Service: " . $row['people_service']);
$pdf -> Write(5, "\n");
$pdf->SetX($pdf->GetX() - -4);
$pdf -> Write(3, "5. Place and Partnership: " . $row['partners_hip']);
$pdf -> Write(5, "\n");
$pdf->SetX($pdf->GetX() - -4);
$pdf -> Write(3, "6. Policy: " . $row['policy']);
$pdf -> Write(5, "\n");
$pdf->SetX($pdf->GetX() - -4);
$pdf -> Write(3, "7. Social Impact: " . $row['social_impact']);
$pdf -> Write(5, "\n");
$pdf->SetX($pdf->GetX() - -4);
$pdf -> Write(3, "8. Economic Impact: " . $row['economic_impact']);

$pdf -> ln(6);
$pdf -> MultiCell(181, 5, "X. Review of Related Literature: \n" . str_replace('&nbsp;', '', strip_tags($row['rrl'])), "1");
$pdf -> ln(0);
$pdf -> MultiCell(181, 5, "XI. Methodology: \n" . str_replace('&nbsp;', '', strip_tags($row['methodology'])), "1","0");

$pdf -> ln(0);
$pdf -> Cell(181, 9, 'XII. Line-Item Budget: See attach Form B', "1","0", 'L');
$pdf -> ln();
$pdf -> Cell(90, 9, '1. Maintenance and Operating Expenses', "1","0", 'C');
$pdf -> Cell(91, 9, '', "1","0", 'C');
$pdf -> ln();
$pdf -> Cell(90, 9, '2. Capital Outlay and Equipment', "1","0", 'C');
$pdf -> Cell(91, 9, '', "1","0", 'C');

$pdf -> ln();
$pdf -> SetFont('arial', 'I', 11);
$pdf -> MultiCell(181,6,"Required Attachment (use appropriate ISO Form): \n (A) Major Activities \n (B) Line-item Budget \n (C) Curriculum Vitae", "1", );

// $pdf -> AddPage();
$pdf -> SetFont('arial', '', 11);
$pdf -> MultiCell(181,7,"Prepared by: \n \n \n \n \n", "1");
$pdf -> Write(-5, "Date Signed:\n");
$pdf -> SetFont('', 'B');
$pdf -> Write(-30, "                                       _________________________________________\n");
$pdf -> SetFont('Arial', 'B', 11);
$pdf -> Write(40,  "                                                            JHORELY C. GABRIEL\n");
$pdf->SetFont('Arial', '', 10);
$pdf->Write(-30, "                                                                            Project Leader", 'C');


$pdf->SetFont('Arial', '', 10);
$pdf -> ln(-5);
$pdf -> MultiCell(181, 5, "Pursuant to Republic Act No. 10173, also know as the Data Privacy Act of 2012, the Batangas State University,the National Engineering University, recognizes its commitment to protect and respect the privacy of its customers and/or stakeholders and ensure that all information collected from them are all processed in accordance with the principles of transparency, legitimate purpose and proportionality mandated under the Data Privacy Act of 2012.", "1",);

$pdf -> ln(0);
$pdf->SetFont('Arial', '', 11);
$pdf -> Cell(181, 9, 'To be accomplished by the Research Office', "1","0", 'C');


$pdf -> ln();
$pdf->SetFont('Arial', '', 11);
$pdf -> Cell(90, 40, '', "1","0", 'L');
$pdf -> Cell(91, 40, '', "1","0", 'L');
$pdf -> Write(2, "Checked and Verified by:", "L");
$pdf -> Write(2, "                                            Checked and Verified by:\n", "R");

$pdf->Write(66, "Date Signed:");
$pdf->Write(66, "                                                               Date Signed:\n");
$pdf->SetFont('', 'B');
$pdf->Write(-100, "         _______________________________");
$pdf->Write(-100, "                     _______________________________\n");
$pdf->Write(110,  "                  Dr. ROSENDA A. BRONCE");
$pdf->Write(110,  "                           Assoc. Prof. ALBERTSON D. AMANTE\n");
$pdf->SetFont('Arial', '', 10);
$pdf->Write(-102, "                              Director, Research", 'C');
$pdf->Write(-102, "                                                         Vice President for RDES\n", 'C');


$pdf -> ln(62);
$pdf -> SetFont('arial', '', 11);
$pdf -> MultiCell(181,7,"Approved by the Research Council Represented by: \n \n \n \n \n", "1");
$pdf -> Write(-5, "Date Signed:\n");
$pdf -> SetFont('', 'B');
$pdf -> Write(-30, "                                       _________________________________________\n");
$pdf -> SetFont('Arial', 'B', 11);
$pdf -> Write(40,  "                                                            DR. TIRSO A. RONQUILLO\n");
$pdf->SetFont('Arial', '', 10);
$pdf->Write(-30, "                                                                           University President", 'C');




// FOR THE BUDGET
$id = $_GET['id'];

$query = "SELECT * FROM research_topic WHERE `id` = '$id'"; // Replace 'your_table_name' with your actual table name
$result = mysqli_query($conn, $query); // Assuming you have an open database connection

while ($row = mysqli_fetch_assoc($result)) {

$pdf->AddPage();
$pdf -> Write(0, "Attachment B-BatstateU-F0-RES-02 \n");

$pdf -> SetFont('arial', 'B', 11);
$pdf -> Cell(181, 20, "LINE-ITEM BUDGET \n", "0","0", 'C');
$pdf -> ln(17);
$pdf -> SetFont('arial', 'B', 11);
$pdf -> Cell(45, 9, 'Research Project Title:', "1","0", 'L');
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(136, 9, ' '. $row['project_title'], "1","0", 'L');
}

$text = "";
$first = true;
$query = "SELECT * FROM `research_representatives` WHERE `research_topic_id` = '$id'";
$result = $conn->query($query);
while($row = $result->fetch_assoc()) {
    if($first) {
        $pdf -> ln(9);
        $pdf -> SetFont('arial', 'B', 11);
        $pdf -> Cell(45, 9, $row['role'], "1","0", 'L');
        $pdf -> SetFont('arial', '', 11);
        $research_representatives_id = $row['id'];
        $query2 = "SELECT * FROM `representative` WHERE `research_representatives_id` = '$research_representatives_id'";
        $result2 = $conn->query($query2);
        while($row2 = $result2->fetch_assoc()) {
            $text = $text . $row2['name'] . "\n";
        }
        $pdf -> MultiCell(136, 5, "".$text, "1","0");
        $first = !$first;
    } else {
        $pdf -> ln(0);
        $pdf -> SetFont('arial', 'B', 11);
        $pdf -> Cell(45, 9, $row['role'], "1","0", 'L');
        $pdf -> SetFont('arial', '', 11);
        $pdf -> MultiCell(136, 5, $text, "1","0");
    }
}

// $pdf -> ln(9);
// $pdf -> SetFont('arial', 'B', 11);
// $pdf -> Cell(45, 9, "Project Leader: \n", "1","0", 'L');
// $pdf -> SetFont('arial', '', 11);
// $pdf -> MultiCell(136, 5, "IV. ".$text, "1","0");
// $pdf -> ln(0);
// $pdf -> SetFont('arial', 'B', 11);
// $pdf -> Cell(45, 9, "Asst. Project Leader: \n", "1","0", 'L');
// $pdf -> SetFont('arial', '', 11);
// $pdf -> MultiCell(136, 5, "IV. ".$text, "1","0");
// $pdf -> ln(0);
// $pdf -> SetFont('arial', 'B', 11);
// $pdf -> Cell(45, 9, 'Project Staff (s): ', "1","0", 'L');
// $pdf -> SetFont('arial', '', 11);
// $pdf -> MultiCell(136, 5, "IV. ".$text, "1","0");



$query = "SELECT * FROM research_topic WHERE `id` = '$id'"; // Replace 'your_table_name' with your actual table name
$result = mysqli_query($conn, $query); // Assuming you have an open database connection

while ($row = mysqli_fetch_assoc($result)) {


$pdf-> Cell(181, 9, "Campus: \n" . $row['campus'], "1", "0", 'L');
$pdf -> ln(9);
$pdf-> Cell(181, 9, "College: \n" . $row['college'], "1", "0", 'L');
}
$pdf -> ln(9);
$pdf -> SetFont('arial', 'B', 11);
$pdf -> Cell(106, 7, "ITEM", "1","0", 'C');
$pdf -> Cell(75, 7, "AMOUNT (php)", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', 'B', 11);
$pdf -> Cell(106, 7, "I. Maintenance and Other Operating Expenses (MOOE)", "1","0", 'C');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "          1. Traveling Cost", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');

$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "                    a. Local ", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$text = "";
$query2 = "SELECT * FROM `expenses` WHERE `research_topic_id` = '$id' AND `category` = 'Local'";
$result2 = $conn->query($query2);
while($row2 = $result2->fetch_assoc()) {
    $text = $text . $row2['item_description'] . " (" . $row2['unit_cost'] . " * " . $row2['quantity'] . ")" . "\n";
    $pdf -> Cell(106, 7, "                        " . $text, "1","0", 'L');
    $pdf -> Cell(75, 7, $row2['unit_cost'] * $row2['quantity'], "1","0", 'C');
    $pdf -> ln(7);
}
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "                    b. Foreign ", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "          2. Training Expenses \n", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "          3. Supplies and Materials \n", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$text = "";
$query2 = "SELECT * FROM `expenses` WHERE `research_topic_id` = '$id' AND `category` = 'supplies and materials'";
$result2 = $conn->query($query2);
while($row2 = $result2->fetch_assoc()) {
    $text = $text . $row2['item_description'] . " (" . $row2['unit_cost'] . " * " . $row2['quantity'] . ")" . "\n";
    $pdf -> Cell(106, 7, "                    " . $text, "1","0", 'L');
    $pdf -> Cell(75, 7, $row2['unit_cost'] * $row2['quantity'], "1","0", 'C');
    $pdf -> ln(7);
}
$pdf -> Cell(106, 7, "                    a. Office Supplies \n", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "                    b. Accountable Forms \n", "1","0",);
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "                    c. Drugs and Medicines \n", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "                    d. Laboratory Expenses \n", "1","0",);
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "                    e. Textbook and Instructional Materials \n", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "                    f. Others \n", "1","0",);
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "          4. Postage and Deliveries \n", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "          5. Communication Expenses \n", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "                    a. Telephone Expenses \n", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "                    b. Internet Expenses \n", "1","0",);
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "                    c. Others \n", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "          6. Rent Expenses \n", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "          7. Transportation and Delivery Expenses \n", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "          8. Subscription Expenses \n", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "          9. Professional Services \n", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "                    a. Consultancy Services \n", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "                    b. General Services \n", "1","0",);
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "                    c. Other Professional Services \n", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "          10. Repairs and Maintenance of Facilities \n", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "                    a. IT Equipment and Software \n", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "                    b. Laboratory Equipment \n", "1","0",);
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "                    c. Technical and Scientific Equipment \n", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "                    d. Machineries and Equipment \n", "1","0",);
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "                    e. Others \n", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "          11. Taxes, Duties, Patent and Licenses \n", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "          12. Other Maintenance and Operating Expenses \n", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "                    a. Advertising Expenses \n", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "                    b. Printing and Binding Expenses \n", "1","0",);
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "          13. Others Financial Charges \n", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', 'B', 11);
$pdf -> Cell(106, 7, "II. Capital Outlay and Equipment (COE)", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "          1. IT Equipment and Software \n", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "          2. Machineries \n", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "          3. Communication Equipment \n", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "          4. Laboratory Equipment \n", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "          5. Technical and Scientific \n", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', '', 11);
$pdf -> Cell(106, 7, "          6. Others \n", "1","0", 'L');
$pdf -> Cell(75, 7, "", "1","0", 'C');
$pdf -> ln(7);
$pdf -> SetFont('arial', 'B', 11);
$pdf -> Cell(106, 11, "          TOTAL PROJECT COST\n", "1","0", 'R');
$pdf -> Cell(75, 11, "", "1","0", 'C');
$pdf -> ln(11);
$pdf -> SetFont('arial', '', 11);
$pdf -> MultiCell(181,7,"Prepared by: \n \n \n \n \n", "1");
$pdf -> Write(-5, "Date Signed:\n");
$pdf -> SetFont('', 'B');
$pdf -> Write(-30, "                                       _________________________________________\n");
$pdf -> SetFont('Arial', 'B', 11);
$pdf -> Write(40,  "                                                            JHORELY C. GABRIEL\n");
$pdf->SetFont('Arial', '', 10);
$pdf->Write(-30, "                                                                            Project Leader", 'C');

$pdf -> ln(-5);
$pdf->SetFont('Arial', 'I', 11);
$pdf -> Cell(181, 9, 'To be accomplished by the Research Office', "1","0", 'C');

$pdf -> ln(9);
$pdf -> SetFont('arial', '', 11);
$pdf -> MultiCell(181,7,"Certified Funds Available: \n \n \n \n \n", "1");
$pdf -> Write(-5, "Date Signed:\n");
$pdf -> SetFont('', 'B');
$pdf -> Write(-30, "                                       _________________________________________\n");
$pdf -> SetFont('Arial', 'B', 11);
$pdf -> Write(40,  "                                                            MR. ROMEO L. RAMOS\n");
$pdf->SetFont('Arial', '', 10);
$pdf->Write(-30, "                                                                  Director, Financial Services", 'C');


$pdf -> ln(-5);
$pdf->SetFont('Arial', '', 11);
$pdf -> Cell(90, 40, '', "1","0", 'L');
$pdf -> Cell(91, 40, '', "1","0", 'L');
$pdf -> Write(2, "Recommending Approval:", "L");
$pdf -> Write(2, "                                            Recommending Approval:\n", "R");

$pdf->Write(66, "Date Signed:");
$pdf->Write(66, "                                                               Date Signed:\n");
$pdf->SetFont('', 'B');
$pdf->Write(-110, "         _______________________________");
$pdf->Write(-110, "                     _______________________________\n");
$pdf->Write(120,  "        Assoc. Prof. ALBERTSON D. AMANTE");
$pdf->Write(120,  "                       Atty. LUZVIMINDA C. ROSALES\n");
$pdf->SetFont('Arial', '', 10);
$pdf->Write(-110, "        Vice President for Research,Development and", 'C');
$pdf->Write(-110, "                    Vice President for Administrator & Finance\n", 'C');
$pdf->Write(120, "                               Extension Services", 'C');


$pdf -> ln(70);
$pdf -> SetFont('arial', '', 11);
$pdf -> MultiCell(181,7,"Approved by the Research Council Represented by: \n \n \n \n \n", "1");
$pdf -> Write(-5, "Date Signed:\n");
$pdf -> SetFont('', 'B');
$pdf -> Write(-30, "                                       _________________________________________\n");
$pdf -> SetFont('Arial', 'B', 11);
$pdf -> Write(40,  "                                                            DR. TIRSO A. RONQUILLO\n");
$pdf->SetFont('Arial', '', 10);
$pdf->Write(-30, "                                                                           University President", 'C');




$pdf -> Output();
    

}


 ?>