<?php
session_start();
include 'dbconn.php';

if (isset($_SESSION['user_id'])) {
  if ($_SESSION['authority'] == "System Admin") {
    header('location: ./systemadmin/');
  } elseif ($_SESSION['authority'] == "Faculty Researcher") {
    header('location: ./');
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
  <meta property="og:image" content="https://fillow.dexignlab.com/xhtml/social-image.png">
  <meta name="format-detection" content="telephone=no">

  <!-- PAGE TITLE HERE -->
  <title>VCRDES</title>

  <!-- FAVICONS ICON -->
  <link rel="shortcut icon" type="image/jpg" href="images/bsu.png">
  <link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
  <link href="vendor/lightgallery/css/lightgallery.min.css" rel="stylesheet">
  <link href="vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

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
          <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
      </div>
    </div>
    <!--**********************************
            Nav header end
        ***********************************-->


    <!--**********************************
            Header start
        ***********************************-->
    <div class="header">
      <div class="header-content">
        <nav class="navbar navbar-expand">
          <div class="collapse navbar-collapse justify-content-between">
            <div class="header-left">
              <div class="dashboard_bar">
                Profile
              </div>

            </div>
            <ul class="navbar-nav header-right">
              <li class="nav-item d-flex align-items-center">
                <div class="input-group search-area">
                  <input type="text" class="form-control" placeholder="Explore ReAcT">
                  <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
                </div>
              </li>
              <li class="nav-item dropdown notification_dropdown">
                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                  <svg width="28" height="28" viewbox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M23.3333 19.8333H23.1187C23.2568 19.4597 23.3295 19.065 23.3333 18.6666V12.8333C23.3294 10.7663 22.6402 8.75902 21.3735 7.12565C20.1068 5.49228 18.3343 4.32508 16.3333 3.80679V3.49996C16.3333 2.88112 16.0875 2.28763 15.6499 1.85004C15.2123 1.41246 14.6188 1.16663 14 1.16663C13.3812 1.16663 12.7877 1.41246 12.3501 1.85004C11.9125 2.28763 11.6667 2.88112 11.6667 3.49996V3.80679C9.66574 4.32508 7.89317 5.49228 6.6265 7.12565C5.35983 8.75902 4.67058 10.7663 4.66667 12.8333V18.6666C4.67053 19.065 4.74316 19.4597 4.88133 19.8333H4.66667C4.35725 19.8333 4.0605 19.9562 3.84171 20.175C3.62292 20.3938 3.5 20.6905 3.5 21C3.5 21.3094 3.62292 21.6061 3.84171 21.8249C4.0605 22.0437 4.35725 22.1666 4.66667 22.1666H23.3333C23.6428 22.1666 23.9395 22.0437 24.1583 21.8249C24.3771 21.6061 24.5 21.3094 24.5 21C24.5 20.6905 24.3771 20.3938 24.1583 20.175C23.9395 19.9562 23.6428 19.8333 23.3333 19.8333Z" fill="#717579"></path>
                    <path d="M9.9819 24.5C10.3863 25.2088 10.971 25.7981 11.6766 26.2079C12.3823 26.6178 13.1838 26.8337 13.9999 26.8337C14.816 26.8337 15.6175 26.6178 16.3232 26.2079C17.0288 25.7981 17.6135 25.2088 18.0179 24.5H9.9819Z" fill="#717579"></path>
                  </svg>
                  <?php
                  $userID = $_SESSION['user_id'];
                  $sql = "SELECT COUNT(*) AS `total` FROM `notification` AS `n` INNER JOIN `user_notification` AS `un` ON `n`.`id` = `un`.`notification_id` INNER JOIN `faculty_user` AS `fu` ON `n`.`user_id` = `fu`.`id` WHERE `un`.`state` = 0 AND `un`.`user_id` = ?";
                  $stmt = mysqli_stmt_init($conn);
                  if (!mysqli_stmt_prepare($stmt, $sql)) {
                    // header("location: ./index.php?error");
                    exit();
                  }
                  mysqli_stmt_bind_param($stmt, "s", $userID);
                  mysqli_stmt_execute($stmt);
                  $result = mysqli_stmt_get_result($stmt);
                  if ($row = mysqli_fetch_assoc($result)) {
                    $total = $row['total'];
                  }
                  ?>
                  <span class="badge light text-white bg-warning rounded-circle"><?= $total ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                  <div id="DZ_W_Notification1" class="widget-media dlab-scroll p-3" style="height:380px;">
                    <ul class="timeline">
                      <?php
                      $userID = $_SESSION['user_id'];
                      $sql = "SELECT `fu`.`title`, `fu`.`first_name`, `fu`.`middle_name`, `fu`.`last_name`, `fu`.`image_path`, `n`.`category`, `n`.`description`, `n`.`date_added`, `un`.`id` FROM `notification` AS `n` INNER JOIN `user_notification` AS `un` ON `n`.`id` = `un`.`notification_id` INNER JOIN `faculty_user` AS `fu` ON `n`.`user_id` = `fu`.`id` WHERE `un`.`state` = 0 AND `un`.`user_id` = ? ORDER BY `n`.`date_added` DESC";
                      $stmt = mysqli_stmt_init($conn);
                      if (!mysqli_stmt_prepare($stmt, $sql)) {
                        // header("location: ./index.php?error");
                        exit();
                      }
                      mysqli_stmt_bind_param($stmt, "s", $userID);
                      mysqli_stmt_execute($stmt);
                      $result = mysqli_stmt_get_result($stmt);
                      if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                          <li>
                            <div class="timeline-panel">
                              <div class="media me-2">
                                <img src="../profile_upload/<?php echo $row['image_path'] != "" ? $row['image_path'] : '../profile_upload/bsu.png'; ?>" width="45" alt="">
                              </div>
                              <div class="media-body">
                                <a href="./update.notification.php?id=<?= $row['id'] ?>" style="font-size: 14px; font-style: italic;"><?= $row['title'] . ' ' . $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name'] . ' ' . $row['description'] ?></a>
                                <h6 class="mb-1" style="font-size:14px; font-weight:600"><?= $row['title'] . ' ' . $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name'] ?></h6>
                                <?php
                                $dateString = $row['date_added'];
                                $dateTime = new DateTime($dateString);
                                $formattedDate = $dateTime->format('d F Y - h:i A');
                                ?>
                                <small class="d-block"><?= $formattedDate ?></small>
                              </div>
                            </div>
                          </li>
                        <?php
                        }
                      } else {
                        ?>
                        <li>
                          <div class="timeline-panel">
                            No Notification
                          </div>
                        </li>
                      <?php
                      }
                      ?>
                    </ul>
                  </div>
                </div>
              </li>

              <li class="nav-item dropdown  header-profile">
                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                  <?php
                  $id = $_SESSION['user_id'];
                  $sql = "SELECT * FROM `faculty_user` WHERE `id` = $id";
                  $result = $conn->query($sql);
                  $row = $result->fetch_assoc();
                  ?>
                  <img src="../profile_upload/<?php echo $row['image_path'] != "" ? $row['image_path'] : 'profile_upload/bsu.png'; ?>" width="56" alt="">
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                  <a href="profile.php" class="dropdown-item ai-icon">
                    <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                      <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span class="ms-2">Profile </span>
                  </a>
                  <a href="../logout.php" class="dropdown-item ai-icon">
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
          <!-- <li>
            <a href="#" class="">
                <i class="fas fa-bullseye"></i>
              <span class="nav-text">Target</span>
            </a>
          </li> -->
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
          <li><a href="collegesfolder.php" class="">
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
    <form method="post" action="update.profile.php">
      <div class="modal fade" id="modalGrid">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" style="font-size: 25px">Update Info</h5>
            </div>
            <?php
            $id = $_SESSION['user_id'];
            $sql = "SELECT * FROM `faculty_user` WHERE `id` = $id";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            ?>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-5">
                  <label>Title</label>
                  <input name="title" type="text" class="form-control form-control-lg" value="<?= $row['title'] ?>">
                </div>
                <div class="col-md-7"><label>First Name</label>
                  <input name="first_name" type="text" class="form-control form-control-lg" value="<?= $row['first_name'] ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-5" style="padding-top: 10px">
                  <label>Middle Name</label>
                  <input name="middle_name" type="text" class="form-control form-control-lg" value="<?= $row['middle_name'] ?>">
                </div>
                <div class="col-md-7" style="padding-top: 10px">
                  <label>Last Name</label>
                  <input name="last_name" type="text" class="form-control form-control-lg" value="<?= $row['last_name'] ?>">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <div class="content-body">
      <div class="container-fluid">
        <!-- row -->
        <div class="row">
          <div class="col-lg-10" style="padding-top: 60px; padding-left: 200px">
            <div class="profile card card-body px-3 pt-3 pb-0">
              <div class="profile-head">
                <!-- <div class="row"> -->
                <div class="profile-info justify-content-center">
                  <div class="profile-photo">
                    <?php
                    $id = $_SESSION['user_id'];
                    $sql = "SELECT * FROM `faculty_user` WHERE `id` = $id";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    ?>
                    <img src="../profile_upload/<?php echo $row['image_path'] != "" ? $row['image_path'] : 'profile_upload/bsu.png'; ?>" style="aspect-ratio: 0;" class="img-fluid rounded-circle" alt="">
                    <form id="picture-form" method="POST" action="update.profile.picture.php" enctype="multipart/form-data">
                      <input type="file" name="file" id="file" onchange="uploadProfilePicture()" accept=".jpg, .jpeg, .png, .jfif, image/jpeg, image/png">
                    </form>
                    <label for="file" id="uploadBtn"><i class="fas fa-camera"></i></label>
                  </div>
                </div>
                <!-- </div>-->
                <?php
                $id = $_SESSION['user_id'];
                $sql = "SELECT * FROM `faculty_user` WHERE `id` = $id";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                ?>
                <div class="row" style="margin-top: 0px auto;">
                  <h4 style="font-size:27px; text-align: center;"><?php echo $row["title"] . " " . $row["first_name"] . " " . $row["middle_name"] . " " . $row["last_name"]; ?></h4>
                </div>
                <div class="row">
                  <h4 style="font-size:19px; text-align: center;"><?php echo $row["authority"] ?></h4>
                </div>
                <div>
                  <div class="row">
                    <div class="col mb-4" style="padding-top: 25px; padding-left: 300px">
                      <a href="#" class="btn btn-dark btn-rounded fs-16" data-bs-toggle="modal" data-bs-target="#modalGrid"><i class="bi bi-person-circle me-3 scale4" style="color: #fff; font-size: 14px;"></i>Profile</a>
                      <!-- <a href="#" class="btn btn-dark btn-rounded fs-16" data-bs-toggle="modal" data-bs-target="#modalGrid2"><i class="bi bi-shield-lock me-3 scale4" style="color: #fff; font-size: 14px;"></i>Password</a> -->
                      <div class="modal fade" id="modalGrid2">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" style="font-size: 25px">Update Password</h5>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-12">
                                  <label>Old Password</label>
                                  <input type="password" id="confirm_password" class="form-control form-control-lg password-input" placeholder="Old Password" name="confirm_password" oninput="ValidateInput()" required>
                                  <i style="height: 100px; padding-right: 30px; color: #ff0000;" id="toggle-confirm-password" class="fas fa-eye password-icon"></i>
                                </div>
                                <div class="col-md-12" style="margin-top: 10px">
                                  <label>New Password</label>
                                  <input type="password" id="password" class="form-control form-control-lg password-input" placeholder="New Password" name="password" oninput="ValidateInput()" required>
                                  <i style="padding-top: 33px; padding-right: 30px;" id="togglepassword" class="fas fa-eye password-icon"></i>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Update</button>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xl-4">
                <div class="row">
                  <div class="col-xl-12">
                    <div class="card">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xl-4">
              <div class="row">
                <div class="col-xl-12">
                  <div class="card">
                  </div>
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

  <!--removeIf(production)-->

  <!--**********************************
        Scripts
    ***********************************-->
  <!-- Required vendors -->
  <script src="vendor/global/global.min.js"></script>
  <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
  <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
  <script src="vendor/chart.js/Chart.bundle.min.js"></script>
  <script src="vendor/lightgallery/js/lightgallery-all.min.js"></script>
  <script src="js/custom.min.js"></script>
  <script src="js/dlabnav-init.js"></script>
  <script src="js/demo.js"></script>
  <script src="vendor/sweetalert2/dist/sweetalert2.min.js"></script>
  <script src="js/plugins-init/sweetalert.init.js"></script>
  <script src="js/styleSwitcher.js"></script>
  <script>
    const imgDiv = document.querySelector('.profile-photo');
    const img = document.querySelector('.img-fluid');
    const file = document.querySelector('#file');
    const uploadbtn = document.querySelector('#uploadBtn');

    file.addEventListener('change', function() {
      const chosenFile = this.files[0]; // Get the first selected file
      if (chosenFile) {
        const validExtensions = ['png', 'jpeg', 'jpg', 'jfif'];
        const fileExtension = chosenFile.name.split('.').pop().toLowerCase();

        if (validExtensions.includes(fileExtension)) {
          const reader = new FileReader();

          reader.addEventListener('load', function() {
            img.setAttribute('src', reader.result);
          });

          reader.readAsDataURL(chosenFile);
        } else {
          swal("Oops...", "Please select a PNG, JPEG, JFIF or JPG file.", "error");
        }
      }
    });
  </script>
  <script type="text/javascript">
    function uploadProfilePicture() {
      document.getElementById('picture-form').submit();
    }
    // JavaScript for password toggle

    document.addEventListener("DOMContentLoaded", function() {
      const passwordField = document.getElementById("password");
      const toggleButton = document.getElementById("togglepassword");

      toggleButton.addEventListener("click", function() {
        if (passwordField.type === "password") {
          passwordField.type = "text";
          toggleButton.classList.remove("fa-eye");
          toggleButton.classList.add("fa-eye-slash");
        } else {
          passwordField.type = "password";
          toggleButton.classList.remove("fa-eye-slash");
          toggleButton.classList.add("fa-eye");
        }
      });
    });


    // JavaScript for confirm password toggle
    document.getElementById("toggle-confirm-password").addEventListener("click", function() {
      var confirmPasswordInput = document.getElementById("confirm_password");
      if (confirmPasswordInput.type === "password") {
        confirmPasswordInput.type = "text";
        document.getElementById("toggle-confirm-password").classList.remove("fa-eye");
        document.getElementById("toggle-confirm-password").classList.add("fa-eye-slash");
      } else {
        confirmPasswordInput.type = "password";
        document.getElementById("toggle-confirm-password").classList.remove("fa-eye-slash");
        document.getElementById("toggle-confirm-password").classList.add("fa-eye");
      }
    });
  </script>


</body>

</html>