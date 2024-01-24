<?php
 session_start();
include 'dbconn.php';

if (isset($_SESSION['user_id'])) {
    if($_SESSION['authority'] == "System Admin") {
        header('location: ./systemadmin/');
    } elseif($_SESSION['authority'] == "Vice Chancellor for Research, Development & Extension Services") {
        header('location: ./vcrdes/');
    } elseif($_SESSION['authority'] == "Head Research") {
        header('location: ./headresearch/');
    } elseif($_SESSION['authority'] == "Dean/Associate Dean") {
        header('location: ./dean/');
    } elseif($_SESSION['authority'] == "College Research Coordinator") {
        header('location: ./researchcoordinator/');
    }
} else {
  header('location: ./page-login.php');
  exit();
}

  $user_id = $_SESSION['user_id'];

  $j = 0;
  while($j < 43) {
    echo "s";
    $j++;
  }

  if(isset($_POST['submit'])) {
    $research_project_title = $_POST['research_project_title'];
    $research_agenda = $_POST['research_agenda'];
    $partnership = $_POST['partnership'];
    $sponsor = $_POST['sponsor'];
    if(isset($_POST['sdg1'])){
      $sdg1 = "1";
    } else {
      $sdg1 = "0";
    }
    if(isset($_POST['sdg2'])){
      $sdg2 = "1";
    } else {
      $sdg2 = "0";
    }
    if(isset($_POST['sdg3'])){
      $sdg3 = "1";
    } else {
      $sdg3 = "0";
    }
    if(isset($_POST['sdg4'])){
      $sdg4 = "1";
    } else {
      $sdg4 = "0";
    }
    if(isset($_POST['sdg5'])){
      $sdg5 = "1";
    } else {
      $sdg5 = "0";
    }
    if(isset($_POST['sdg6'])){
      $sdg6 = "1";
    } else {
      $sdg6 = "0";
    }
    if(isset($_POST['sdg7'])){
      $sdg7 = "1";
    } else {
      $sdg7 = "0";
    }
    if(isset($_POST['sdg8'])){
      $sdg8 = "1";
    } else {
      $sdg8 = "0";
    }
    if(isset($_POST['sdg9'])){
      $sdg9 = "1";
    } else {
      $sdg9 = "0";
    }
    if(isset($_POST['sdg10'])){
      $sdg10 = "1";
    } else {
      $sdg10 = "0";
    }
    if(isset($_POST['sdg11'])){
      $sdg11 = "1";
    } else {
      $sdg11 = "0";
    }
    if(isset($_POST['sdg12'])){
      $sdg12 = "1";
    } else {
      $sdg12 = "0";
    }
    if(isset($_POST['sdg13'])){
      $sdg13 = "1";
    } else {
      $sdg13 = "0";
    }
    if(isset($_POST['sdg14'])){
      $sdg14 = "1";
    } else {
      $sdg14 = "0";
    }
    if(isset($_POST['sdg15'])){
      $sdg15 = "1";
    } else {
      $sdg15 = "0";
    }
    if(isset($_POST['sdg16'])){
      $sdg16 = "1";
    } else {
      $sdg16 = "0";
    }
    if(isset($_POST['sdg17'])){
      $sdg17 = "1";
    } else {
      $sdg17 = "0";
    }
    $revision = $_POST['revision'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $female_no = $_POST['female_no'];
    $male_no = $_POST['male_no'];
    $campus = $_POST['campus'];
    $college = $_POST['college'];
    $department = $_POST['department'];
    $total_roles = $_POST['total_roles'] + 1;
    $executive_brief = $_POST['executive_brief'];
    $rationale = $_POST['rationale'];
    $objective = $_POST['objective'];
    $publication = $_POST['publication'];
    $patent = $_POST['patent'];
    $product = $_POST['product'];
    $peopleservice = $_POST['peopleservice'];
    $partnership2 = $_POST['partnership2'];
    $policy = $_POST['policy'];
    $socialimpact = $_POST['socialimpact'];
    $economicimpact = $_POST['economicimpact'];
    $rrl = $_POST['rrl'];
    $methodology = $_POST['methodology'];
    $status = "For Evaluation";
    $agency = $_POST['agency'];

    $id = array();

    $i = 0;
    while($i < $total_roles) {
      $sql = "SELECT UUID() AS id";
      $result = $conn->query($sql); 
      $row = $result->fetch_assoc();
      array_push($id, $row['id']);
      $i++;
    }

    $sql = "INSERT INTO `research_topic`(`id`, `added_by`, `project_title`, `research_agenda`, `partnership`, `agency`, `sponsor`, `sdg_1`, `sdg_2`, `sdg_3`, `sdg_4`, `sdg_5`, `sdg_6`, `sdg_7`, `sdg_8`, `sdg_9`, `sdg_10`, `sdg_11`, `sdg_12`, `sdg_13`, `sdg_14`, `sdg_15`, `sdg_16`, `sdg_17`, `revision_no`, `start_date`, `end_date`, `female_no`, `male_no`, `college_id`, `department_id`, `executive_brief`, `rationale`, `objective`, `publication`, `patent`, `product`, `people_service`, `partners_hip`, `policy`, `social_impact`, `economic_impact`, `rrl`, `methodology`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../");
      exit();
    }
    mysqli_stmt_bind_param($stmt, "sssssssssssssssssssssssssssssssssssssssssssss", $id[0], $user_id, $research_project_title, $research_agenda, $partnership, $agency, $sponsor, $sdg1, $sdg2, $sdg3, $sdg4, $sdg5, $sdg6, $sdg7, $sdg8, $sdg9, $sdg10, $sdg11, $sdg12, $sdg13, $sdg14, $sdg15, $sdg16, $sdg17, $revision, $startdate, $enddate, $female_no, $male_no, $college, $department, $executive_brief, $rationale, $objective, $publication, $patent, $product, $peopleservice, $partnership2, $policy, $socialimpact, $economicimpact, $rrl, $methodology, $status);
    mysqli_stmt_execute($stmt);

    $i = 1;
    $total_roles;
    foreach($_POST['roleName'] as $value) {
      $sql = "INSERT INTO `research_representatives`(`id`, `research_topic_id`, `role`) VALUES ('$id[$i]','$id[0]','$value')";
      $result = $conn->query($sql);
      $i++;
    }
    $same = $_POST['roles_position'][0];
    $k = 0;
    
    $i = 1;
    foreach($_POST['roles_position'] as $value) {
      $name = $_POST['roles_name'][$k];
      $designation = $_POST['roles_description'][$k];
      if($same != $value) {
        $same = $value;
        $i++;
      }
      $sql = "INSERT INTO `representative`(`research_representatives_id`, `name`, `designation`) VALUES (?,?,?)";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../");
        exit();
      }
      mysqli_stmt_bind_param($stmt, "sss", $id[$i], $name, $designation);
      mysqli_stmt_execute($stmt);
      $k++;
    }

    $same = $_POST['responsibilities_position'][0];
    $i = 1;
    $k = 0;

    foreach($_POST['responsibilities_position'] as $value) {
      $responsibility = $_POST['responsibilities'][$k];
      if($same != $value) {
        $same = $value;
        $i++;
      }
      $sql = "INSERT INTO `research_representatives_responsibilities`(`research_representatives_id`, `responsibility`) VALUES (?,?)";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../");
        exit();
      }
      mysqli_stmt_bind_param($stmt, "ss", $id[$i], $responsibility);
      mysqli_stmt_execute($stmt);
      $k++;
    }

    $k = 0;
    foreach($_POST['category'] as $category) {
      $item_description = $_POST['itemDescription'][$k];
      $quantity = $_POST['qual'][$k];
      $unit_cost = $_POST['unitCost'][$k];
      $sql = "INSERT INTO `expenses`(`research_topic_id`, `category`, `item_description`, `quantity`, `unit_cost`) VALUES (?,?,?,?,?)";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../");
        exit();
      }
      mysqli_stmt_bind_param($stmt, "sssss", $id[0], $category, $item_description, $quantity, $unit_cost);
      mysqli_stmt_execute($stmt);
      $k++;
    }

    header("location: ./proposal.php");
  }
?>