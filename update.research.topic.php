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

  if(isset($_POST['submit'])) {
     $id = $_SESSION['researchTopicID'];
  
     $research_project_title = $_POST['research_project_title'] ? $_POST['research_project_title'] : null;
  
     $research_agenda = $_POST['research_agenda'] ? $_POST['research_agenda'] : null;
  
     $partnership = $_POST['partnership'] ? $_POST['partnership'] : null;
    
    // echo $sponsor = $_POST['sponsor'];
    // echo "<br>";
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
    $revision = $_POST['revision'] ? $_POST['revision'] : null;
  
    $startdate = $_POST['startdate'] ? $_POST['startdate'] : null;
  
    $enddate = $_POST['enddate'] ? $_POST['enddate'] : null;
  
    $total_roles = $_POST['total_roles'] ? $_POST['total_roles'] : null;
  
    $executive_brief = $_POST['executive_brief'] ? $_POST['executive_brief'] : null;
  
    $rationale = $_POST['rationale'] ? $_POST['rationale'] : null;
  
    $objective = $_POST['objective'] ? $_POST['objective'] : null;
  
    $publication = $_POST['publication'] ? $_POST['publication'] : null;
  
    $patent = $_POST['patent'] ? $_POST['patent'] : null;
  
    $product = $_POST['product'] ? $_POST['product'] : null;
  
    $peopleservice = $_POST['peopleservice'] ? $_POST['peopleservice'] : null;
  
    $partnership2 = $_POST['partnership2'] ? $_POST['partnership2'] : null;
  
    $policy = $_POST['policy'] ? $_POST['policy'] : null;
  
    $socialimpact = $_POST['socialimpact'] ? $_POST['socialimpact'] : null;
  
    $economicimpact = $_POST['economicimpact'] ? $_POST['economicimpact'] : null;
  
    $rrl = $_POST['rrl'] ? $_POST['rrl'] : null;
  
    $methodology = $_POST['methodology'] ? $_POST['methodology'] : null;

    $id2 = array();

    $i = 0;
    while($i < $total_roles) {
      $sql = "SELECT UUID() AS id";
      $result = $conn->query($sql); 
      $row = $result->fetch_assoc();
      array_push($id2, $row['id']);
      $i++;
    }

    $research_representative_ids = array();

    $sql = "SELECT * FROM research_representatives WHERE `research_topic_id` LIKE '$id'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
      array_push($research_representative_ids, $row['id']);
    }

    foreach($research_representative_ids as $value) {
      $sql = "DELETE FROM `representative` WHERE `research_representatives_id` LIKE '$value'";
      $conn->query($sql);
      $sql = "DELETE FROM `research_representatives_responsibilities` WHERE `research_representatives_id` LIKE '$value'";
      $conn->query($sql);
    }
    
    $sql = "DELETE FROM `research_representatives` WHERE `research_topic_id` LIKE '$id'";
    $conn->query($sql);

    $sql = "DELETE FROM `expenses` WHERE `research_topic_id` LIKE '$id'";
    $conn->query($sql);

    $sql = "UPDATE `research_topic` SET `project_title`=?,`research_agenda`=?,`partnership`=?,`sdg_1`=?,`sdg_2`=?,`sdg_3`=?,`sdg_4`=?,`sdg_5`=?,`sdg_6`=?,`sdg_7`=?,`sdg_8`=?,`sdg_9`=?,`sdg_10`=?,`sdg_11`=?,`sdg_12`=?,`sdg_13`=?,`sdg_14`=?,`sdg_15`=?,`sdg_16`=?,`sdg_17`=?,`revision_no`=?,`start_date`=?,`end_date`=?,`executive_brief`=?,`rationale`=?,`objective`=?,`publication`=?,`patent`=?,`product`=?,`people_service`=?,`partners_hip`=?,`policy`=?,`social_impact`=?,`economic_impact`=?,`rrl`=?,`methodology`=? WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../");
      exit();
    }
    mysqli_stmt_bind_param($stmt, "sssssssssssssssssssssssssssssssssssss", $research_project_title, $research_agenda, $partnership, $sdg1, $sdg2, $sdg3, $sdg4, $sdg5, $sdg6, $sdg7, $sdg8, $sdg9, $sdg10, $sdg11, $sdg12, $sdg13, $sdg14, $sdg15, $sdg16, $sdg17, $revision, $startdate, $enddate, $executive_brief, $rationale, $objective, $publication, $patent, $product, $peopleservice, $partnership2, $policy, $socialimpact, $economicimpact, $rrl, $methodology, $id);
    mysqli_stmt_execute($stmt);

    $i = 0;
    $total_roles;
    foreach($_POST['roleName'] as $value) {
      $sql = "INSERT INTO `research_representatives`(`id`, `research_topic_id`, `role`) VALUES ('$id2[$i]','$id','$value')";
      $result = $conn->query($sql);
      $i++;
    }
    $same = $_POST['roles_position'][0];
    $k = 0;
    
    $i = 0;
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
      mysqli_stmt_bind_param($stmt, "sss", $id2[$i], $name, $designation);
      mysqli_stmt_execute($stmt);
      $k++;
    }

    $same = $_POST['responsibilities_position'][0];
    $i = 0;
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
      mysqli_stmt_bind_param($stmt, "ss", $id2[$i], $responsibility);
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
      mysqli_stmt_bind_param($stmt, "sssss", $id, $category, $item_description, $quantity, $unit_cost);
      mysqli_stmt_execute($stmt);
      $k++;
    }

    header("location: ./proposal.php");
  }
?>