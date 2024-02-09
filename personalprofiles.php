<?php
session_start();
$user_id = $_SESSION['user_id'];

include 'dbconn.php';

if (isset($_SESSION['user_id'])) {
  if ($_SESSION['authority'] == "System Admin") {
    header('location: ./systemadmin/');
  } elseif ($_SESSION['authority'] == "Vice Chancellor for Research, Development & Extension Services") {
    header('location: ./vcrdes/');
  } elseif ($_SESSION['authority'] == "Head Research") {
    header('location: ./headresearch/');
  } elseif ($_SESSION['authority'] == "Dean/Associate Dean") {
    header('location: ./dean/');
  } elseif ($_SESSION['authority'] == "College Research Coordinator") {
    header('location: ./researchcoordinator/');
  }
} else {
  header('location: ./page-login.php');
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $title_profile = $_POST['title_profile'];
  $lastname = $_POST['lastname'];
  $firstname = $_POST['firstname'];
  $middlename = $_POST['middlename'];
  $dateofbirth = $_POST['dateofbirth'];
  $placeofbirth = $_POST['placeofbirth'];
  $civilstatus = $_POST['civilstatus'];
  $gender = $_POST['gender'];
  $citizenship = $_POST['citizenship'];
  $mobileno = $_POST['mobileno'];
  $emailprimary = $_POST['emailprimary'];
  $emailsecondary = $_POST['emailsecondary'];
  $region = $_POST['region'];
  $province = $_POST['province'];
  $barangay = $_POST['barangay'];
  $sss = $_POST['sss'];
  $zipcode = $_POST['zipcode'];

  $targetDir = "personal-profile-upload/"; // Change this to the desired folder
  $targetFile = $targetDir . uniqid() . "." . pathinfo($_FILES["profile-pic"]["name"], PATHINFO_EXTENSION);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

  $allowedFormats = ["jpg", "jpeg", "png", "gif"];
  if (!in_array($imageFileType, $allowedFormats)) {
    echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
    $uploadOk = 0;
  }

  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  } else {
    // Move the file to the specified folder
    if (move_uploaded_file($_FILES["profile-pic"]["tmp_name"], $targetFile)) {
      echo "The file " . basename($_FILES["profile-pic"]["name"]) . " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }

  $sql = "SELECT * FROM `personal_profile` WHERE `added_by` = {$user_id}";
  $result = $conn->query($sql);

  if (!$row = $result->fetch_assoc()) {
    $sql = "INSERT INTO personal_profile (title_profile, lastname, firstname,middlename, dateofbirth, placeofbirth, civilstatus, gender, citizenship, mobileno, emailprimary, emailsecondary, region, province, barangay, sss, zipcode, profile_pic, added_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
      mysqli_stmt_bind_param($stmt, "sssssssssssssssssss", $title_profile, $lastname, $firstname, $middlename, $dateofbirth, $placeofbirth, $civilstatus, $gender, $citizenship, $mobileno, $emailprimary, $emailsecondary, $region, $province, $barangay, $sss, $zipcode, $targetFile, $user_id);
      if (mysqli_stmt_execute($stmt)) {
        // $user_id = $_SESSION['user_id'];
        // $category = "personal profiles";
        // $description = "has added his/her personal profile.";
        // $sql = "INSERT INTO `notification`(`user_id`, `category`, `description`) VALUES (?, ?, ?)";
        // $stmt = mysqli_stmt_init($conn);
        // if (!mysqli_stmt_prepare($stmt, $sql)) {
        //   header("location: ./personalprofiles.php?error");
        //   exit();
        // }
        // mysqli_stmt_bind_param($stmt, "sss", $user_id, $category, $description);
        // mysqli_stmt_execute($stmt);
        // $notificationID = $conn->insert_id;
        // mysqli_stmt_close($stmt);

        // $college_id = $_SESSION['college'];
        // $sql = "SELECT * FROM `college` WHERE `id` = ?";
        // $stmt = mysqli_stmt_init($conn);
        // if (!mysqli_stmt_prepare($stmt, $sql)) {
        //   header("location: ./personalprofiles.php?error");
        //   exit();
        // }
        // mysqli_stmt_bind_param($stmt, "s", $college_id);
        // mysqli_stmt_execute($stmt);
        // $result = mysqli_stmt_get_result($stmt);
        // $row = mysqli_fetch_assoc($result);
        // $collegeAbbrev = $row['abbreviation_college'];
        // mysqli_stmt_close($stmt);

        // $sql = "SELECT `fu`.`id` FROM `faculty_user` AS `fu` LEFT JOIN `college` AS `c` ON `fu`.`college_id` = `c`.`id` WHERE `c`.`abbreviation_college` = ? OR `fu`.`college_id` IS NULL";
        // $stmt = mysqli_stmt_init($conn);
        // if (!mysqli_stmt_prepare($stmt, $sql)) {
        //   header("location: ./personalprofiles.php?error");
        //   exit();
        // }
        // mysqli_stmt_bind_param($stmt, "s", $collegeAbbrev);
        // mysqli_stmt_execute($stmt);
        // $result = mysqli_stmt_get_result($stmt);

        // while ($row = mysqli_fetch_assoc($result)) {
        //   $user_id = $row['id'];
        //   $sql = "INSERT INTO `user_notification`(`notification_id`, `user_id`) VALUES (?, ?)";
        //   $stmt = mysqli_stmt_init($conn);
        //   if (!mysqli_stmt_prepare($stmt, $sql)) {
        //     header("location: ./personalprofiles.php?error");
        //     exit();
        //   }
        //   mysqli_stmt_bind_param($stmt, "ss", $notificationID, $user_id);
        //   mysqli_stmt_execute($stmt);
        //   mysqli_stmt_close($stmt);
        // }
        header("location: tablepersonal.php");
        exit();
      } else {
        // Insert failed
      }
      mysqli_stmt_close($stmt);
      exit();
    }
  }
}

$sql = "SELECT * FROM `personal_profile` WHERE `added_by` = {$user_id}";
$result = $conn->query($sql);
$user_row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <meta name="robots" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
  <meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
  <meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
  <meta property="og:image" content="https:/fillow.dexignlab.com/xhtml/social-image.png">
  <meta name="format-detection" content="telephone=no">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <!-- PAGE TITLE HERE -->
  <title>Faculty Researcher</title>
  <!-- FAVICONS ICON -->
  <link rel="shortcut icon" type="image/png" href="images/bsu.png">
  <link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
  <link href="vendor/jquery-smartwizard/dist/css/smart_wizard.min.css" rel="stylesheet">
  <link href="vendor/nestable2/css/jquery.nestable.min.css" rel="stylesheet">
  <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/personalprofiles.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Style css -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <!--*******************
    Preloader start
    ********************-->
  <div id="preloader">
    <div class="lds-ripple">
      <div></div>
      <div></div>
    </div>
  </div>
  <!--*******************
    Preloader end
    ********************-->
  <!--**********************************
    Main wrapper start
    ***********************************-->
  <div id="main-wrapper">
    <!--**********************************
      Nav header start
      ***********************************-->
    <div class="nav-header">
      <a href="index.php" class="brand-logo">
        <img src="images/bsu.png" class="circle" width="65" height="55">
        <div class="brand-title">
          <h2 class="">ReAcT</h2>
        </div>
      </a>
      <div class="nav-control">
        <div class="hamburger">
          <span class="line"></span>
          <span class="line"></span>
          <span class="line"></span>
        </div>
      </div>
    </div>
    <!--**********************************
      Nav header end
      ***********************************-->
    <!--**********************************
      Header start
      ***********************************-->
    <div class="header border-bottom">
      <div class="header-content">
        <nav class="navbar navbar-expand">
          <div class="collapse navbar-collapse justify-content-between">
            <div class="header-left">
              <div class="dashboard_bar">My Profile</div>
            </div>
            <ul class="navbar-nav header-right">
              <li class="nav-item d-flex align-items-center">
                <div class="input-group search-area">
                  <input type="text" class="form-control" placeholder="Explore ReAcT">
                  <span class="input-group-text">
                    <a href="javascript:void(0)">
                      <i class="flaticon-381-search-2"></i>
                    </a>
                  </span>
                </div>
              </li>
              <!-- <li class="nav-item dropdown notification_dropdown">
                  <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                    <svg width="28" height="28" viewbox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M23.3333 19.8333H23.1187C23.2568 19.4597 23.3295 19.065 23.3333 18.6666V12.8333C23.3294 10.7663 22.6402 8.75902 21.3735 7.12565C20.1068 5.49228 18.3343 4.32508 16.3333 3.80679V3.49996C16.3333 2.88112 16.0875 2.28763 15.6499 1.85004C15.2123 1.41246 14.6188 1.16663 14 1.16663C13.3812 1.16663 12.7877 1.41246 12.3501 1.85004C11.9125 2.28763 11.6667 2.88112 11.6667 3.49996V3.80679C9.66574 4.32508 7.89317 5.49228 6.6265 7.12565C5.35983 8.75902 4.67058 10.7663 4.66667 12.8333V18.6666C4.67053 19.065 4.74316 19.4597 4.88133 19.8333H4.66667C4.35725 19.8333 4.0605 19.9562 3.84171 20.175C3.62292 20.3938 3.5 20.6905 3.5 21C3.5 21.3094 3.62292 21.6061 3.84171 21.8249C4.0605 22.0437 4.35725 22.1666 4.66667 22.1666H23.3333C23.6428 22.1666 23.9395 22.0437 24.1583 21.8249C24.3771 21.6061 24.5 21.3094 24.5 21C24.5 20.6905 24.3771 20.3938 24.1583 20.175C23.9395 19.9562 23.6428 19.8333 23.3333 19.8333Z" fill="#717579"></path>
                      <path d="M9.9819 24.5C10.3863 25.2088 10.971 25.7981 11.6766 26.2079C12.3823 26.6178 13.1838 26.8337 13.9999 26.8337C14.816 26.8337 15.6175 26.6178 16.3232 26.2079C17.0288 25.7981 17.6135 25.2088 18.0179 24.5H9.9819Z" fill="#717579"></path>
                    </svg>
                    <span class="badge light text-white bg-warning rounded-circle">1</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end">
                    <div id="DZ_W_Notification1" class="widget-media dlab-scroll p-3" style="height:200px;">
                      <ul class="timeline">
                        <li>
                          <div class="timeline-panel">
                            <div class="media me-2">
                              <img alt="image" width="50" src="images/avatar/1.jpg">
                            </div>
                            <div class="media-body">
                              <h6 class="mb-1">5 ddays left to finished your paper</h6>
                              <small class="d-block">29 July 2023 - 02:26 PM</small>
                            </div>
                          </div>
                        </li>
                        <li></li>
                      </ul>
                    </div>
                    <a class="all-notification" href="javascript:void(0);">See all notifications <i class="ti-arrow-end"></i>
                    </a>
                  </div>
                </li> -->
              <li class="nav-item dropdown  header-profile">
                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                  <?php
                  $id = $_SESSION['user_id'];
                  $sql = "SELECT * FROM `faculty_user` WHERE `id` = $id";
                  $result = $conn->query($sql);
                  $row = $result->fetch_assoc();
                  ?>
                  <img src="profile_upload/<?php echo $row['image_path'] != "" ? $row['image_path'] : 'profile_upload/bsu.png'; ?>" width="56" alt="">
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                  <a href="profile.php" class="dropdown-item ai-icon">
                    <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                      <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span class="ms-2">Profile </span>
                  </a>
                  <a href="logout.php" class="dropdown-item ai-icon">
                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                      <polyline points="16 17 21 12 16 7"></polyline>
                      <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                    <span class="ms-2">Logout </span>
                  </a>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
    <!--**********************************
Header end ti-comment-alt
***********************************-->
    <!--**********************************
Sidebar start
***********************************-->
    <div class="dlabnav">
      <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
          <li><a href="index.php">
              <i class="fas fa-home"></i>
              <span class="nav-text">Dashboard</span>
            </a>
          </li>
          <li>
            <a href="target.php" class="">
              <i class="fas fa-bullseye"></i>
              <span class="nav-text">Target</span>
            </a>
          </li>
          <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
              <i class="fas fa-user"></i>
              <span class="nav-text">My Profile</span>
            </a>
            <ul aria-expanded="false">
              <li><a href="tablepersonal.php">Personal Profile</a></li>
              <li><a href="tableacademic.php">Academic Background</a></li>
              <li><a href="tableemployment.php">Employment</a></li>
              <li><a href="tablespecialization.php">Field of Specialization</a></li>
              <li><a href="tableawards.php">R&D Awards</a></li>
              <li><a href="tableconferences.php">Conferences</a></li>
              <li><a href="tableprojectprofiles.php">Project Profiles</a></li>
              <li><a href="tablescw.php">Scientific/Creative Works</a></li>
              <li><a href="tableinventions.php">Inventions</a></li>
            </ul>
          </li>

          <li>
            <a href="proposal.php" class="">
              <i class="fas fa-clipboard"></i>
              <span class="nav-text">Research Projects</span>
            </a>
          </li>
          <li>
            <a href="tabletraining.seminar.php" class="">
              <i class="material-symbols-outlined">clinical_notes</i>
              <span class="nav-text">Seminar/Training</span>
            </a>
          </li>
          <li><a href="createfolder.php" class="">
              <i class="material-symbols-outlined">database</i>
              <span class="nav-text">Repository</span>
            </a>
          </li>
          <li>
            <a class="has-arrow " href="#" aria-expanded="false">
              <i class="fas fa-server "></i>
              <span class="nav-text">Research Resources </span>
            </a>
            <ul aria-expanded="false">
              <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                  <span>Online Resources</span>
                </a>
                <ul aria-expanded="false">
                  <li><a href="https://www.emerald.com/insight/" target="_blank">Emerald Insight</a></li>
                  <li><a href="https://ieeexplore.ieee.org/Xplore/home.jsp" target="_blank">IEEE Xplore</a></li>
                  <li><a href="https://www.elib.gov.ph/" target="_blank">Philippine eLib</a></li>
                  <li><a href="https://www.pressreader.com/" target="_blank">PressReader</a></li>
                  <li><a href="https://www.sciencedirect.com/" target="_blank">ScienceDirect</a></li>
                  <li><a href="https://portal.igpublish.com/iglibrary/" target="_blank">iGLibrary</a></li>
                  <li><a href="https://link.gale.com/apps/menu?u=phbsuan" target="_blank">GALE ONEFILE CUSTOM 250</a></li>
                  <li><a href="https://ebookhub.ph/" target="_blank">Philippine Ebook Hub</a></li>
                  <li><a href="https://ejournals.ph/" target="_blank">Philippine eJournals</a></li>
                  <li><a href="https://www.proquest.com/?accountid=211711" target="_blank">ProQuest Academic Research Library</a></li>
                  <li><a href="https://asmedigitalcollection.asme.org" target="_blank">ASME Digital Collection</a></li>
                  <li><a href="http://search.ebscohost.com" target="_blank">Art and Architecture Complete</a></li>
                  <li><a href="https://cdasiaonline.com/ServiceLogin?redirect_to=https%3A%2F%2Fcdasiaonline.com%2F" target="_blank">CD Asia</a></li>
                  <li><a href="https://academic.eb.com/levels/collegiate" target="_blank">Britannica Academic</a></li>
                  <li><a href=" https://bit.ly/PerlegoAccess-PB" target="_blank">Perlego</a></li>
                </ul>
              </li>
              <ul aria-expanded="false">
                <li>
                  <a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <span>Open Resources</span>
                  </a>
                  <ul aria-expanded="false">
                    <li><a href="https://library.batstate-u.edu.ph/#/main/resources" target="_blank">Digital Library & Institution Repository</a></li>
                    <li><a href="https://library.batstate-u.edu.ph/#/main/resources" target="_blank">Open Access eBooks</a></li>
                    <li><a href="https://library.batstate-u.edu.ph/#/main/resources" target="_blank">Open Access eJournals</a></li>
                    <li><a href="https://library.batstate-u.edu.ph/#/main/resources" target="_blank">Open Textbooks</a></li>
                    <li><a href="https://library.batstate-u.edu.ph/#/main/resources" target="_blank">Reference Sources</a></li>
                    <li><a href="https://library.batstate-u.edu.ph/#/main/resources" target="_blank">Digital Content Creation Tools</a></li>
                    <li><a href="https://library.batstate-u.edu.ph/#/main/resources" target="_blank">Subject Webliographies</a></li>
                    <li><a href="https://library.batstate-u.edu.ph/#/main/resources" target="_blank">Trial Databases</a></li>
                    <li><a href="https://americanspacesph.org/elibraryusa/" target="_blank">Elibrary USA</a></li>
                  </ul>
                </li>
                <ul aria-expanded="false">
                  <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                      <span>Research Support Tools</span>
                    </a>
                    <ul aria-expanded="false">
                      <li><a href="https://library.batstate-u.edu.ph/#/main/researchtools" target="_blank">Patent Search</a></li>
                      <li><a href="https://library.batstate-u.edu.ph/#/main/researchtools" target="_blank">Open Theses/Disserttion</a></li>
                      <li><a href="https://library.batstate-u.edu.ph/#/main/researchtools" target="_blank">The Open Citation Index</a></li>
                      <li><a href="https://library.batstate-u.edu.ph/#/main/researchtools" target="_blank">Citation Management Tools</a></li>
                      <li><a href="https://library.batstate-u.edu.ph/#/main/researchtools" target="_blank">Research and Collaboration Tools</a></li>
                      <li><a href="https://library.batstate-u.edu.ph/#/main/researchtools" target="_blank">Western Pacific Region Index Medicus</a></li>
                    </ul>
                  <li>

                    <a class="has-arrow " href="javascript:void()" aria-expanded="false">
                      <span>Services</span>
                    </a>
                    <ul aria-expanded="false">
                      <li><a href="https://library.batstate-u.edu.ph/#/main/chatelvira" target="_blank">Chat ELVIRA</a></li>
                      <li><a href="https://library.batstate-u.edu.ph/#/main/scanningservices" target="_blank">Scanning Services</a></li>
                      <li><a href="https://library.batstate-u.edu.ph/#/user/home" target="_blank">BatStateU Library System</a></li>
                      <li><a href="https://library.batstate-u.edu.ph/#/user/requestreferralletter" target="_blank">Referral Letter</a></li>
                      <li><a href="https://library.batstate-u.edu.ph/#/user/requestreferralletter" target="_blank">Certificate for Thesis submission</a></li>
                      <li><a href="https://library.batstate-u.edu.ph/#/main/libraryreservation" target="_blank">Library Reservation</a></li>
                      <li><a href="https://library.batstate-u.edu.ph/#/main/turnitin" target="_blank">Turnitin Similarity Checker</a></li>
                    </ul>
                  </li>
                </ul>
                <div class="copyright">
                  <p>© 2023 All Rights Reserved</p>
                </div>
      </div>
    </div>
    <!--**********************************
Sidebar end
***********************************-->
    <!--**********************************
Content body start
***********************************-->
    <div class="content-body">
      <div class="container-fluid">
        <div class="row page-titles">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="tablepersonal.php">My Profile</a>
            </li>
            <li class="breadcrumb-item active">
              <a href="personalprofiles.php">Personal Profile</a>
            </li>
          </ol>
        </div>
        <div class="row">
          <div class="col s12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Personal Profile</h4>
              </div>
              <div class="card-body">
                <form method="post" action="#" enctype="multipart/form-data" id="personalprofiles">
                  <div class="row mb-3">
                    <div class="col-3 text-end">
                      <img class="profile-pic" id="profile-pic" src="<?php if ($user_row) {
                                                                        echo $user_row['profile_pic'];
                                                                      } else {
                                                                        echo "images/profile.jpeg";
                                                                      } ?>" width="170" height="170">
                    </div>

                    <div class="col-9">
                      <div class="row">
                        <h3>Upload photo</h3>
                        <p class="pt-5">*Photo must be 2x2 colored with white background (photo will be used on Membership ID)</p>
                        <input type="file" class="form-control form-control-lg" id="validationCustom04" rows="5" name="profile-pic" style="padding-top: 10px;" accept=".jpg, .png, .jpeg" multiple onchange="displayImage(event)" <?php if ($user_row) {
                                                                                                                                                                                                                                    echo "disabled";
                                                                                                                                                                                                                                  } ?>>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 mb-3">
                      <label class="form-label">Title <span class="text-danger">*</span>
                      </label>
                      <select class="default-select form-control default-select wide" name="title_profile" <?php if ($user_row) {
                                                                                                              echo "disabled";
                                                                                                            } ?>>
                        <option value="">Select Title</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Mr.") {
                                  echo "selected";
                                } ?>>Mr.</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Mrs.") {
                                  echo "selected";
                                } ?>>Mrs.</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Ms.") {
                                  echo "selected";
                                } ?>>Ms.</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Dr.") {
                                  echo "selected";
                                } ?>>Dr.</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "NS") {
                                  echo "selected";
                                } ?>>NS</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Prof.") {
                                  echo "selected";
                                } ?>>Prof.</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Rev.") {
                                  echo "selected";
                                } ?>>Rev.</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Engr.") {
                                  echo "selected";
                                } ?>>Engr.</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Capt.") {
                                  echo "selected";
                                } ?>>Capt.</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Mayor") {
                                  echo "selected";
                                } ?>>Mayor</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Lt.-Col.") {
                                  echo "selected";
                                } ?>>Lt.-Col.</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Col.") {
                                  echo "selected";
                                } ?>>Col.</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Lady") {
                                  echo "selected";
                                } ?>>Lady</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Lt.-Cmdr.") {
                                  echo "selected";
                                } ?>>Lt.-Cmdr.</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "The Hon.") {
                                  echo "selected";
                                } ?>>The Hon.</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Cmdr.") {
                                  echo "selected";
                                } ?>>Cmdr.</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Flt. Lt.") {
                                  echo "selected";
                                } ?>>Flt. Lt.</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Brgdr.") {
                                  echo "selected";
                                } ?>>Brgdr.</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Judge") {
                                  echo "selected";
                                } ?>>Judge</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "The Hon. Mrs") {
                                  echo "selected";
                                } ?>>The Hon. Mrs</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Wng. Cmdr.") {
                                  echo "selected";
                                } ?>>Wng. Cmdr.</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Group Capt.") {
                                  echo "selected";
                                } ?>>Group Capt.</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Rt. Hon. Lord") {
                                  echo "selected";
                                } ?>>Rt. Hon. Lord</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Revd Father") {
                                  echo "selected";
                                } ?>>Revd Father</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Revd Canon") {
                                  echo "selected";
                                } ?>>Revd Canon</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Maj. Gen.") {
                                  echo "selected";
                                } ?>>Maj. Gen.</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Air Cdre.") {
                                  echo "selected";
                                } ?>>Air Cdre.</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Viscount") {
                                  echo "selected";
                                } ?>>Viscount</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Dame") {
                                  echo "selected";
                                } ?>>Dame</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Rear Admrl.") {
                                  echo "selected";
                                } ?>>Rear Admrl.</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Asc prof") {
                                  echo "selected";
                                } ?>>Asc prof</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Fr.") {
                                  echo "selected";
                                } ?>>Fr.</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Sen.") {
                                  echo "selected";
                                } ?>>Sen.</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Sec.") {
                                  echo "selected";
                                } ?>>Sec.</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Asst. Prof.") {
                                  echo "selected";
                                } ?>>Asst. Prof.</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Sr.") {
                                  echo "selected";
                                } ?>>Sr.</option>
                        <option <?php if ($user_row && $user_row['title_profile'] == "Sir") {
                                  echo "selected";
                                } ?>>Sir</option>
                      </select>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label class="form-label ">Last Name <span class="text-danger">*</span>
                      </label>
                      <input class="form-control form-control-lg" rows="5" placeholder="Last Name" name="lastname" value="<?php if ($user_row) {
                                                                                                                            echo $user_row['lastname'];
                                                                                                                          } else {
                                                                                                                            echo "";
                                                                                                                          } ?>" <?php if ($user_row) {
                                                                                                                                  echo "disabled";
                                                                                                                                } ?>></input>
                    </div>
                    <div class="col-lg-3 mb-3">
                      <label class="form-label ">First Name <span class="text-danger">*</span>
                      </label>
                      <input class="form-control form-control-lg" rows="5" placeholder="First Name" name="firstname" value="<?php if ($user_row) {
                                                                                                                              echo $user_row['firstname'];
                                                                                                                            } else {
                                                                                                                              echo "";
                                                                                                                            } ?>" <?php if ($user_row) {
                                                                                                                                    echo "disabled";
                                                                                                                                  } ?>></input>
                    </div>
                    <div class="col-lg-3 mb-3">
                      <label class="form-label ">Middle Name
                      </label>
                      <input class="form-control form-control-lg" rows="5" placeholder="Middle Name" name="middlename" value="<?php if ($user_row) {
                                                                                                                                echo $user_row['middlename'];
                                                                                                                              } else {
                                                                                                                                echo "";
                                                                                                                              } ?>" <?php if ($user_row) {
                                                                                                                                      echo "disabled";
                                                                                                                                    } ?>></input>
                    </div>
                    <div class="col-lg-3 mb-3">
                      <label class="form-label">Date of birth <span class="text-danger">*</span>
                      </label>
                      <input type="date" class="form-control form-control-lg" name="dateofbirth" value="<?php if ($user_row) {
                                                                                                          echo $user_row['dateofbirth'];
                                                                                                        } else {
                                                                                                          echo "";
                                                                                                        } ?>" <?php if ($user_row) {
                                                                                                                echo "disabled";
                                                                                                              } ?>>
                    </div>
                    <div class="col-lg-9 mb-3">
                      <label class="form-label ">Place of Birth <span class="text-danger">*</span>
                      </label>
                      <input class="form-control form-control-lg" rows="5" placeholder="Place of Birth" name="placeofbirth" value="<?php if ($user_row) {
                                                                                                                                      echo $user_row['placeofbirth'];
                                                                                                                                    } else {
                                                                                                                                      echo "";
                                                                                                                                    } ?>" <?php if ($user_row) {
                                                                                                                                            echo "disabled";
                                                                                                                                          } ?>></input>
                    </div>
                    <div class="col-lg-3 mb-3">
                      <label class="form-label">Civil Status <span class="text-danger">*</span>
                      </label>
                      <select class="default-select form-control default-select wide" name="civilstatus" <?php if ($user_row) {
                                                                                                            echo "disabled";
                                                                                                          } ?>>
                        <option value="">Choose Civil Status</option>
                        <option <?php if ($user_row && $user_row['civilstatus'] == "Single") {
                                  echo "selected";
                                } ?>>Single</option>
                        <option <?php if ($user_row && $user_row['civilstatus'] == "Married") {
                                  echo "selected";
                                } ?>>Married</option>
                        <option <?php if ($user_row && $user_row['civilstatus'] == "Seperated") {
                                  echo "selected";
                                } ?>>Seperated</option>
                        <option <?php if ($user_row && $user_row['civilstatus'] == "Widow") {
                                  echo "selected";
                                } ?>>Widow</option>
                        <option <?php if ($user_row && $user_row['civilstatus'] == "Annulled") {
                                  echo "selected";
                                } ?>>Annulled</option>
                        <option <?php if ($user_row && $user_row['civilstatus'] == "Widower") {
                                  echo "selected";
                                } ?>>Widower</option>
                        <option <?php if ($user_row && $user_row['civilstatus'] == "Single Parent") {
                                  echo "selected";
                                } ?>>Single Parent</option>
                      </select>
                    </div>
                    <div class="col-lg-3 mb-3">
                      <label class="form-label">Gender <span class="text-danger">*</span>
                      </label>
                      <select class="default-select form-control default-select wide" name="gender" <?php if ($user_row) {
                                                                                                      echo "disabled";
                                                                                                    } ?>>
                        <option value="">Choose Gender</option>
                        <option <?php if ($user_row && $user_row['gender'] == "Female") {
                                  echo "selected";
                                } ?>>Female</option>
                        <option <?php if ($user_row && $user_row['gender'] == "Male") {
                                  echo "selected";
                                } ?>>Male</option>
                      </select>
                    </div>
                    <div class="col-lg-3 mb-3">
                      <label class="form-label ">Citizenship <span class="text-danger">*</span>
                      </label>
                      <input class="form-control form-control-lg" rows="5" placeholder="Citizenship" name="citizenship" value="<?php if ($user_row) {
                                                                                                                                  echo $user_row['citizenship'];
                                                                                                                                } else {
                                                                                                                                  echo "";
                                                                                                                                } ?>" <?php if ($user_row) {
                                                                                                                                        echo "disabled";
                                                                                                                                      } ?>></input>
                    </div>
                    <div class="col-lg-3 mb-3">
                      <label class="form-label ">Mobile No. <span class="text-danger">*</span>
                      </label>
                      <input type="number" class="form-control form-control-lg" rows="5" placeholder="Mobile No." name="mobileno" value="<?php if ($user_row) {
                                                                                                                                            echo $user_row['mobileno'];
                                                                                                                                          } else {
                                                                                                                                            echo "";
                                                                                                                                          } ?>" <?php if ($user_row) {
                                                                                                                                                  echo "disabled";
                                                                                                                                                } ?>></input>
                    </div>
                    <div class="col-lg-6 mb-3">
                      <label class="form-label">Email (Primary)<span class="text-danger">*</span>
                      </label>
                      <input type="email" class="form-control form-control-lg" placeholder="Email" name="emailprimary" value="<?php if ($user_row) {
                                                                                                                                echo $user_row['emailprimary'];
                                                                                                                              } else {
                                                                                                                                echo "";
                                                                                                                              } ?>" <?php if ($user_row) {
                                                                                                                                      echo "disabled";
                                                                                                                                    } ?>>
                    </div>
                    <div class="col-lg-6 mb-3">
                      <label class="form-label">Email (Secondary)
                      </label>
                      <input type="email" class="form-control form-control-lg" placeholder="(optional)" name="emailsecondary" value="<?php if ($user_row) {
                                                                                                                                        echo $user_row['emailsecondary'];
                                                                                                                                      } else {
                                                                                                                                        echo "";
                                                                                                                                      } ?>" <?php if ($user_row) {
                                                                                                                                              echo "disabled";
                                                                                                                                            } ?>>
                    </div>
                    <div class="col-lg-6 mb-3">
                      <label class="form-label">Region <span class="text-danger">*</span></label>
                      <select id="regionSelect" class="default-select form-control default-select wide" name="region" <?php if ($user_row) {
                                                                                                                        echo "disabled";
                                                                                                                      } ?>>
                        <option value="">Choose Region</option>
                        <option <?php if ($user_row && $user_row['region'] == "NCR") {
                                  echo "selected";
                                } ?> value="NCR">National Capital Region (NCR)</option>
                        <option <?php if ($user_row && $user_row['region'] == "CAR") {
                                  echo "selected";
                                } ?> value="CAR">Cordillera Administrative Region (CAR)</option>
                        <option <?php if ($user_row && $user_row['region'] == "ILOCOS") {
                                  echo "selected";
                                } ?> value="ILOCOS">Region I (ILOCOS REGION)</option>
                        <option <?php if ($user_row && $user_row['region'] == "CAGAYAN") {
                                  echo "selected";
                                } ?> value="CAGAYAN">Region II (CAGAYAN VALLEY)</option>
                        <option <?php if ($user_row && $user_row['region'] == "CENTRAL") {
                                  echo "selected";
                                } ?> value="CENTRAL">Region III (CENTRAL LUZON)</option>
                        <option <?php if ($user_row && $user_row['region'] == "CALABARZON") {
                                  echo "selected";
                                } ?> value="CALABARZON">Region IV-A (CALABARZON)</option>
                        <option <?php if ($user_row && $user_row['region'] == "MIMAROPA") {
                                  echo "selected";
                                } ?> value="MIMAROPA">Region IV-B (MIMAROPA)</option>
                        <option <?php if ($user_row && $user_row['region'] == "BICOL") {
                                  echo "selected";
                                } ?> value="BICOL">Region V (BICOL REGION)</option>
                        <option <?php if ($user_row && $user_row['region'] == "WESTERN") {
                                  echo "selected";
                                } ?> value="WESTERN">Region VI (WESTERN VISAYAS)</option>
                        <option <?php if ($user_row && $user_row['region'] == "CENTRAL_VISAYAS") {
                                  echo "selected";
                                } ?> value="CENTRAL_VISAYAS">Region VII (CENTRAL VISAYAS)</option>
                        <option <?php if ($user_row && $user_row['region'] == "EASTERN") {
                                  echo "selected";
                                } ?> value="EASTERN">Region VIII (EASTERN VISAYAS)</option>
                        <option <?php if ($user_row && $user_row['region'] == "ZAMBOANGA") {
                                  echo "selected";
                                } ?> value="ZAMBOANGA">Region IX (ZAMBOANGA PENINSULA)</option>
                        <option <?php if ($user_row && $user_row['region'] == "NORTHERN") {
                                  echo "selected";
                                } ?> value="NORTHERN">Region X (NORTHERN MINDANAO)</option>
                        <option <?php if ($user_row && $user_row['region'] == "DAVAO") {
                                  echo "selected";
                                } ?> value="DAVAO">Region XI (DAVAO REGION)</option>
                        <option <?php if ($user_row && $user_row['region'] == "SOCCSKSARGEN") {
                                  echo "selected";
                                } ?> value="SOCCSKSARGEN">Region XII (SOCCSKSARGEN)</option>
                        <option <?php if ($user_row && $user_row['region'] == "CARAGA") {
                                  echo "selected";
                                } ?> value="CARAGA">Region XIII (CARAGA)</option>
                        <option <?php if ($user_row && $user_row['region'] == "BARMM") {
                                  echo "selected";
                                } ?> value="BARMM">Bangsamora Autonomous Region in Muslim Mindanao (BARMM)</option>
                        <!-- Add other regions as needed -->
                      </select>
                    </div>
                    <div class="col-lg-6 mb-3">
                      <label class="form-label">Province <span class="text-danger">*</span></label>
                      <select id="provinceSelect" class="default-select form-control default-select wide" name="province" required <?php if ($user_row) {
                                                                                                                                      echo "disabled";
                                                                                                                                    } ?>>
                        <option value="">Choose Province</option>
                        <?php
                        if ($user_row) {
                        ?>
                          <option value="<?= $user_row['province'] ?>" selected><?= $user_row['province'] ?></option>
                        <?php
                        }
                        ?>
                        <!-- The province options will be dynamically populated here -->
                      </select>
                    </div>
                    <div class="col-lg-4 mb-3">
                      <label class="form-label ">Barangay
                      </label>
                      <input class="form-control form-control-lg" id="validationCustom04" rows="5" placeholder="Barangay" name="barangay" value="<?php if ($user_row) {
                                                                                                                                                    echo $user_row['barangay'];
                                                                                                                                                  } else {
                                                                                                                                                    echo "";
                                                                                                                                                  } ?>" <?php if ($user_row) {
                                                                                                                                                          echo "disabled";
                                                                                                                                                        } ?>></input>
                    </div>
                    <div class="col-lg-4 mb-3">
                      <label class="form-label ">State/Street/Subdivision
                      </label>
                      <input class="form-control form-control-lg" id="validationCustom04" rows="5" placeholder="State/Street/Subdivision" name="sss" value="<?php if ($user_row) {
                                                                                                                                                              echo $user_row['sss'];
                                                                                                                                                            } else {
                                                                                                                                                              echo "";
                                                                                                                                                            } ?>" <?php if ($user_row) {
                                                                                                                                                                    echo "disabled";
                                                                                                                                                                  } ?>></input>
                    </div>
                    <div class="col-lg-4 mb-3">
                      <label class="form-label ">Zip Code
                      </label>
                      <input type="number" class="form-control form-control-lg" id="validationCustom04" rows="5" placeholder="e.g. 1234" name="zipcode" value="<?php if ($user_row) {
                                                                                                                                                                  echo $user_row['zipcode'];
                                                                                                                                                                } else {
                                                                                                                                                                  echo "";
                                                                                                                                                                } ?>" <?php if ($user_row) {
                                                                                                                                                                        echo "disabled";
                                                                                                                                                                      } ?>></input>
                    </div>
                    <div class="col-md-2" style="margin-top: 10px;">
                      <?php
                      $id = $_SESSION['user_id'];
                      $sql = "SELECT * FROM `personal_profile` WHERE `added_by` = $id";
                      $result = $conn->query($sql);
                      if (!$row = $result->fetch_assoc()) {
                      ?>
                        <button type="submit" class="btn btn-primary mb-2">Submit</button>
                      <?php
                      }
                      ?>
                      <a href="tablepersonal.php" type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--**********************************
Content body end
***********************************-->
  <!--**********************************
Footer start
***********************************-->
  <div class="footer">
    <div class="copyright">
      <p>Copyright © Designed &amp; Developed by ReAcT 2023</p>
    </div>
  </div>
  <!--**********************************
Footer end
***********************************-->
  <!--**********************************
Support ticket button start
***********************************-->
  <!--**********************************
Support ticket button end
***********************************-->
  </div>
  <!--**********************************
Main wrapper end
***********************************-->
  <!--**********************************
Scripts
***********************************-->
  <!--  vendors -->
  <script src="vendor/global/global.min.js"></script>
  <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
  <script src="vendor/draggable/draggable.js"></script>
  <script src="js/custom.min.js"></script>
  <script src="js/dlabnav-init.js"></script>
  <script src="js/demo.js"></script>
  <script src="js/styleSwitcher.js"></script>
  <script src="vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js"></script>
  <!--    <script src="vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="js/plugins-init/sweetalert.init.js"></script> -->
  <script src="vendor/nestable2/js/jquery.nestable.min.js"></script>
  <script src="js/plugins-init/nestable-init.js"></script>
  <script src="js/plugins-init/errormessage.js"></script>

  <script>
    // Define the province options for each region
    const provinceOptions = {
      NCR: ["NCR, City of Manila, First District", "NCR, Second District", "NCR, Third District", "NCR, Fourth District"],
      CAR: ["Abra", "Apayao", "Benguet", "Ifugao", "Kalinga", "Mountain Province"],
      ILOCOS: ["Ilocos Norte", "Ilocos Sur", "La Union", "Pangasinan"],
      CAGAYAN: ["Batanes", "Cagayan", "Isabela", "Nueva Vizcaya", "Quirino"],
      CENTRAL: ["Aurora", "Bataan", "Bulacan", "Nueva Ecija", "Pampanga", "Tarlac", "Zambales"],
      CALABARZON: ["Cavite", "Batangas", "Laguna", "Quezon", "Rizal"],
      MIMAROPA: ["Marinduque", "Occidental Mindoro", "Oriental Mindoro", "Palawan", "Romblon"],
      BICOL: ["Albay", "Camarines Norte", "Camarines Sur", "Catanduanes", "Masbate", "Sorsogon"],
      WESTERN: ["Aklan", "Antique", "Capiz", "Guimaras", "Ilolo", "Negros Occidental"],
      CENTRAL_VISAYAS: ["Bohol", "Cebu", "Negros", "Siquijor"],
      EASTERN: ["Biliran", "Eastern Samar", "Leyte", "Northern Samar", "Samar (WESTERN SAMAR)", "Southern Leyte"],
      ZAMBOANGA: ["Zamboanga Del Norte", "Zamboanga Del Sur", "Zamboanga Sibugay", "City of Isabela"],
      NORTHERN: ["Bukidnon", "Camiguin", "Lanao Del Norte", "Misamis Occidental", "Misamis Oriental"],
      DAVAO: ["Compostela Valley", "Davao Del Norte", "Davao Del Sur", "Davao Occidental", "Davao Oriental"],
      SOCCSKSARGEN: ["Cotabato (NORTH COTABATO)", "Sarangani", "South Cotabato", "Sultan Kudarat", "Cotabato City"],
      CARAGA: ["Agusan Del Norte", "Agusan Del Sur", "Dinagat Islands", "Surigao Del Norte", "Surigao Del Sur"],
      BARMM: ["Basilan", "Lanao Del Sur", "Maguindanao", "Sulu", "Tawi-tawi", "Cotabato"]
      // Define options for other regions here
    };

    const regionSelect = document.getElementById("regionSelect");
    const provinceSelect = document.getElementById("provinceSelect");

    regionSelect.addEventListener("change", function() {
      const selectedRegion = regionSelect.value;
      const provinceOptionsForRegion = provinceOptions[selectedRegion];

      // Clear existing options
      provinceSelect.innerHTML = "<option selected>Choose Province</option>";

      // Add new options based on the selected region
      provinceOptionsForRegion.forEach((province) => {
        const option = document.createElement("option");
        option.value = province;
        option.text = province;
        provinceSelect.appendChild(option);
      });
    });
  </script>
  <script>
    function displayImage(event) {
      const input = event.target;
      const image = document.getElementById('profile-pic');

      if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
          image.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
  <script>
    document.getElementById("personalprofiles").addEventListener("submit", function(e) {
      if (!this.checkValidity()) {
        // If the form is not valid, prevent the default submit action
        e.preventDefault();
        // Display SweetAlert error message
        swal({
          title: 'Oops...',
          text: 'Please fill out all required fields.',
          icon: 'error',
        });
      } else {
        // If the form is valid, you can submit it or perform other actions
        // Display SweetAlert success message
        e.preventDefault();
        swal({
          title: 'Success!',
          text: 'Your work has been saved!',
          icon: 'success',
        }).then((j) => {
          this.submit();
        });
      }
    });
    // Function to show SweetAlert
    function showAlert() {
      swal({
        title: "Good job!",
        text: "Your work has been saved!",
        icon: "success",
        button: "OK",
        dangerMode: true,
      }).then((e) => {
        document.getElementById("personalprofiles").submit();
      });

      // Example: Call the showAlert function on button click
      // $(document).ready(function () {
      //     $('#showAlertButton').click(function () {
      //         showAlert();
      //     });
      // });
    }
  </script>


</body>

</html>