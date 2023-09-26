<?php
  require 'dbconn.php';

  $j = 0;
  while($j < 43) {
    echo "s";
    $j++;
  }

  if(isset($_GET['submit'])) {
    $research_project_title = $_GET['research_project_title'];
    $research_agenda = $_GET['research_agenda'];
    $partnership = $_GET['partnership'];
    $sponsor = $_GET['sponsor'];
    if(isset($_GET['sdg1'])){
      $sdg1 = "1";
    } else {
      $sdg1 = "0";
    }
    if(isset($_GET['sdg2'])){
      $sdg2 = "1";
    } else {
      $sdg2 = "0";
    }
    if(isset($_GET['sdg3'])){
      $sdg3 = "1";
    } else {
      $sdg3 = "0";
    }
    if(isset($_GET['sdg4'])){
      $sdg4 = "1";
    } else {
      $sdg4 = "0";
    }
    if(isset($_GET['sdg5'])){
      $sdg5 = "1";
    } else {
      $sdg5 = "0";
    }
    if(isset($_GET['sdg6'])){
      $sdg6 = "1";
    } else {
      $sdg6 = "0";
    }
    if(isset($_GET['sdg7'])){
      $sdg7 = "1";
    } else {
      $sdg7 = "0";
    }
    if(isset($_GET['sdg8'])){
      $sdg8 = "1";
    } else {
      $sdg8 = "0";
    }
    if(isset($_GET['sdg9'])){
      $sdg9 = "1";
    } else {
      $sdg9 = "0";
    }
    if(isset($_GET['sdg10'])){
      $sdg10 = "1";
    } else {
      $sdg10 = "0";
    }
    if(isset($_GET['sdg11'])){
      $sdg11 = "1";
    } else {
      $sdg11 = "0";
    }
    if(isset($_GET['sdg12'])){
      $sdg12 = "1";
    } else {
      $sdg12 = "0";
    }
    if(isset($_GET['sdg13'])){
      $sdg13 = "1";
    } else {
      $sdg13 = "0";
    }
    if(isset($_GET['sdg14'])){
      $sdg14 = "1";
    } else {
      $sdg14 = "0";
    }
    if(isset($_GET['sdg15'])){
      $sdg15 = "1";
    } else {
      $sdg15 = "0";
    }
    if(isset($_GET['sdg16'])){
      $sdg16 = "1";
    } else {
      $sdg16 = "0";
    }
    if(isset($_GET['sdg17'])){
      $sdg17 = "1";
    } else {
      $sdg17 = "0";
    }
    $revision = $_GET['revision'];
    $startdate = $_GET['startdate'];
    $enddate = $_GET['enddate'];
    $female_no = $_GET['female_no'];
    $male_no = $_GET['male_no'];
    $campus = $_GET['campus'];
    $college = $_GET['college'];
    $department = $_GET['department'];
    $total_roles = $_GET['total_roles'] + 1;
    $executive_brief = $_GET['executive_brief'];
    $rationale = $_GET['rationale'];
    $objective = $_GET['objective'];
    $publication = $_GET['publication'];
    $patent = $_GET['patent'];
    $product = $_GET['product'];
    $peopleservice = $_GET['peopleservice'];
    $partnership2 = $_GET['partnership2'];
    $policy = $_GET['policy'];
    $socialimpact = $_GET['socialimpact'];
    $economicimpact = $_GET['economicimpact'];
    $rrl = $_GET['rrl'];
    $methodology = $_GET['methodology'];

    $id = array();

    $i = 0;
    while($i < $total_roles) {
      $sql = "SELECT UUID() AS id";
      $result = $conn->query($sql); 
      $row = $result->fetch_assoc();
      array_push($id, $row['id']);
      $i++;
    }

    $sql = "INSERT INTO `research_topic`(`id`, `project_title`, `research_agenda`, `partnership`, `sponsor`, `sdg_1`, `sdg_2`, `sdg_3`, `sdg_4`, `sdg_5`, `sdg_6`, `sdg_7`, `sdg_8`, `sdg_9`, `sdg_10`, `sdg_11`, `sdg_12`, `sdg_13`, `sdg_14`, `sdg_15`, `sdg_16`, `sdg_17`, `revision_no`, `start_date`, `end_date`, `female_no`, `male_no`, `campus`, `college`, `department`, `executive_brief`, `rationale`, `objective`, `publication`, `patent`, `product`, `people_service`, `partners_hip`, `policy`, `social_impact`, `economic_impact`, `rrl`, `methodology`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../");
      exit();
    }
    mysqli_stmt_bind_param($stmt, "sssssssssssssssssssssssssssssssssssssssssss", $id[0], $research_project_title, $research_agenda, $partnership, $sponsor, $sdg1, $sdg2, $sdg3, $sdg4, $sdg5, $sdg6, $sdg7, $sdg8, $sdg9, $sdg10, $sdg11, $sdg12, $sdg13, $sdg14, $sdg15, $sdg16, $sdg17, $revision, $startdate, $enddate, $female_no, $male_no, $campus, $college, $department, $executive_brief, $rationale, $objective, $publication, $patent, $product, $peopleservice, $partnership2, $policy, $socialimpact, $economicimpact, $rrl, $methodology);
    mysqli_stmt_execute($stmt);

    $i = 1;
    $total_roles;
    while($i < $total_roles) {
      $sql = "INSERT INTO `research_representatives`(`id`, `research_topic_id`) VALUES ('$id[$i]','$id[0]')";
      $result = $conn->query($sql);
      $i++;
    }
    $same = $_GET['roles_position'][0];
    $k = 0;
    
    $i = 1;
    foreach($_GET['roles_position'] as $value) {
      $name = $_GET['roles_name'][$k];
      $designation = $_GET['roles_description'][$k];
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

    $same = $_GET['responsibilities_position'][0];
    $i = 1;
    $k = 0;

    foreach($_GET['responsibilities_position'] as $value) {
      $responsibility = $_GET['responsibilities'][$k];
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
    foreach($_GET['category'] as $category) {
      $item_description = $_GET['itemDescription'][$k];
      $quantity = $_GET['qual'][$k];
      $unit_cost = $_GET['unitCost'][$k];
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

    header("location: ./kanban.php");
  }
?>