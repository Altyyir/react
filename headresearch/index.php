<?php
session_start();
include 'dbconn.php';

if (!isset($_GET['filterType'])) {
  $currentYear = date("Y");
  header("location: ./index.php?filterType=annual&annual=" . $currentYear . "&quarter=none");
}

if (isset($_SESSION['user_id'])) {
  if ($_SESSION['authority'] == "System Admin") {
    header('location: ./systemadmin/');
  } elseif ($_SESSION['authority'] == "Faculty Researcher") {
    header('location: ./');
  } elseif ($_SESSION['authority'] == "Vice Chancellor for Research, Development & Extension Services") {
    header('location: ./vcrdes/');
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
  <meta property="og:image" content="https:/fillow.dexignlab.com/xhtml/social-image.png">
  <meta name="format-detection" content="telephone=no">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

  <!-- PAGE TITLE HERE -->
  <title>Head of Research</title>

  <!-- FAVICONS ICON -->
  <link rel="shortcut icon" type="image/jpg" href="images/bsu.png">
  <link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
  <link href="vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
  <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
  <link rel="stylesheet" href="vendor/chartist/css/chartist.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

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
    <div class="header border-bottom">
      <div class="header-content">
        <nav class="navbar navbar-expand">
          <div class="collapse navbar-collapse justify-content-between">
            <div class="header-left">
              <div class="dashboard_bar">
                Dashboard
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
          <li>
            <a href="index.php">
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
          <li>
            <a class="has-arrow " href="javascript:void()" aria-expanded="false">
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
              <li>
                <a class="has-arrow " href="javascript:void()" aria-expanded="false">
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
            </ul>
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
            </ul>
            <ul aria-expanded="false">
              <li>
                <a class="has-arrow " href="javascript:void()" aria-expanded="false">
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
              </li>
            </ul>
            <ul aria-expanded="false">
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
          </li>
          <li><a href="tablereport.php?college=All&filtertype=annual&year=none" class="">
              <i class="material-symbols-outlined">task</i>
              <span class="nav-text">Report</span>
            </a>
          </li>

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
      <!-- row -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-12">
            <div class="row">
              <div class="row">
                <div class="col-xl-12">
                  <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <div class="input-group contacts-search mb-2">
                      <!--                                <input type="text" class="form-control" placeholder="Search here...">
                                            <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span> -->
                    </div>
                    <div class="mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                      <a href="javascript:void(0);" class="btn btn-primary btn-rounded fs-16"><i style='font-size: 14px;' class='fas'>&#xf0b0;</i> Filter
                      </a>
                    </div>
                    <div class="modal fade" id="exampleModalCenter">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" style="font-size: 20px">Filter</h5>
                          </div>
                          <form method="get" action="">
                            <div class="modal-body">
                              <div class="col-lg-12 mb-3">
                                <label class="form-label">Filter by
                                </label>
                                <select id="dataFilter" class="form-control" name="filterType">
                                  <option value="none" selected="">Choose Filter</option>
                                  <option value="quarter">Quarterly</option>
                                  <option value="annual">Annually</option>
                                </select>
                              </div>
                              <div id="annualFilterRow" class="col-lg-12 mb-3" style="display: none;">
                                <label class="form-label">Filter by
                                </label>
                                <select id="annualFilterInput" class="form-control" name="annual">
                                  <option value="none" selected="">Choose Year</option>
                                  <?php
                                  $sql = "SELECT DISTINCT(YEAR(dateAdded)) AS year FROM research_topic ORDER BY year DESC";
                                  $result = $conn->query($sql);
                                  while ($yearRow = $result->fetch_assoc()) {
                                  ?>
                                    <option value="<?= $yearRow['year'] ?>"><?= $yearRow['year'] ?></option>
                                  <?php
                                  }
                                  ?>
                                </select>
                              </div>
                              <div id="quarterFilterRow" class="col-lg-12 mb-3" style="display: none;">
                                <label class="form-label">Filter by
                                </label>
                                <select id="quarterFilterInput" class="form-control" name="quarter">
                                  <option value="none" selected="">Choose Quarter</option>
                                  <option value="first">First Quarter</option>
                                  <option value="second">Second Quarter</option>
                                  <option value="third">Third Quarter</option>
                                  <option value="fourth">Fourth Quarter</option>
                                </select>
                              </div>

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-3">
                <div class="card">
                  <div class="card-body d-flex px-4 justify-content-between">
                    <div>
                      <div class="">
                        <?php
                        if (isset($_GET['filterType']) && $_GET['filterType'] == "quarter") {
                          if (isset($_GET['quarter']) && $_GET['quarter'] == "first") {
                            $yearFilter = $_GET['annual'];
                            if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                              $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 1 and 3 AND YEAR(dateAdded) = '$yearFilter'";
                            } else {
                              $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 1 and 3";
                            }
                          } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "second") {
                            $yearFilter = $_GET['annual'];
                            if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                              $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 4 and 6 AND YEAR(dateAdded) = '$yearFilter'";
                            } else {
                              $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 4 and 6";
                            }
                          } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "third") {
                            $yearFilter = $_GET['annual'];
                            if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                              $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 7 and 9 AND YEAR(dateAdded) = '$yearFilter'";
                            } else {
                              $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 7 and 9";
                            }
                          } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "fourth") {
                            $yearFilter = $_GET['annual'];
                            if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                              $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 10 and 12 AND YEAR(dateAdded) = '$yearFilter'";
                            } else {
                              $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 10 and 12";
                            }
                          } else {
                            $sql = "SELECT COUNT(*) AS `total` FROM `research_topic`";
                          }
                        } elseif (isset($_GET['filterType']) && $_GET['filterType'] == "annual") {
                          if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                            $yearFilter = $_GET['annual'];
                            $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE YEAR(dateAdded) = '$yearFilter'";
                          } else {
                            $sql = "SELECT COUNT(*) AS `total` FROM `research_topic`";
                          }
                        } else {
                          $sql = "SELECT COUNT(*) AS `total` FROM `research_topic`";
                        }
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        ?>
                        <h2 class="fs-32 font-w700"><?= $row['total'] ?></h2>
                        <span class="fs-18 font-w500 d-block">No. of Research Projects</span>
                        <span class="fs-15 font-w500 d-block"><?= $_GET['annual'] ?><?php if ($_GET['filterType'] == "quarter") {
                                                                                      echo ucwords(" - " . $_GET['quarter'] . " quarter");
                                                                                    } ?></span>
                      </div>
                    </div>
                    <div id="NewCustomers3"></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-3">
                <div class="card">
                  <div class="card-body d-flex px-4 justify-content-between">
                    <div>
                      <div class="">
                        <?php
                        if (isset($_GET['filterType']) && $_GET['filterType'] == "quarter") {
                          if (isset($_GET['quarter']) && $_GET['quarter'] == "first") {
                            $yearFilter = $_GET['annual'];
                            if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                              $sql = "SELECT COUNT(DISTINCT(r.name)) AS `total` FROM `research_topic` AS rt INNER JOIN `research_representatives` AS rr ON rt.id = rr.research_topic_id INNER JOIN `representative` AS r ON rr.id = r.research_representatives_id WHERE MONTH(rt.dateAdded) BETWEEN 1 and 3 AND YEAR(rt.dateAdded) = '$yearFilter'";
                            } else {
                              $sql = "SELECT COUNT(DISTINCT(r.name)) AS `total` FROM `research_topic` AS rt INNER JOIN `research_representatives` AS rr ON rt.id = rr.research_topic_id INNER JOIN `representative` AS r ON rr.id = r.research_representatives_id WHERE MONTH(rt.dateAdded) BETWEEN 1 and 3";
                            }
                          } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "second") {
                            $yearFilter = $_GET['annual'];
                            if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                              $sql = "SELECT COUNT(DISTINCT(r.name)) AS `total` FROM `research_topic` AS rt INNER JOIN `research_representatives` AS rr ON rt.id = rr.research_topic_id INNER JOIN `representative` AS r ON rr.id = r.research_representatives_id WHERE MONTH(rt.dateAdded) BETWEEN 4 and 6 AND YEAR(rt.dateAdded) = '$yearFilter'";
                            } else {
                              $sql = "SELECT COUNT(DISTINCT(r.name)) AS `total` FROM `research_topic` AS rt INNER JOIN `research_representatives` AS rr ON rt.id = rr.research_topic_id INNER JOIN `representative` AS r ON rr.id = r.research_representatives_id WHERE MONTH(rt.dateAdded) BETWEEN 4 and 6";
                            }
                            //
                          } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "third") {
                            $yearFilter = $_GET['annual'];
                            if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                              $sql = "SELECT COUNT(DISTINCT(r.name)) AS `total` FROM `research_topic` AS rt INNER JOIN `research_representatives` AS rr ON rt.id = rr.research_topic_id INNER JOIN `representative` AS r ON rr.id = r.research_representatives_id WHERE MONTH(rt.dateAdded) BETWEEN 7 and 9 AND YEAR(rt.dateAdded) = '$yearFilter'";
                            } else {
                              $sql = "SELECT COUNT(DISTINCT(r.name)) AS `total` FROM `research_topic` AS rt INNER JOIN `research_representatives` AS rr ON rt.id = rr.research_topic_id INNER JOIN `representative` AS r ON rr.id = r.research_representatives_id WHERE MONTH(rt.dateAdded) BETWEEN 7 and 9";
                            }
                            //
                          } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "fourth") {
                            $yearFilter = $_GET['annual'];
                            if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                              $sql = "SELECT COUNT(DISTINCT(r.name)) AS `total` FROM `research_topic` AS rt INNER JOIN `research_representatives` AS rr ON rt.id = rr.research_topic_id INNER JOIN `representative` AS r ON rr.id = r.research_representatives_id WHERE MONTH(rt.dateAdded) BETWEEN 10 and 12 AND YEAR(rt.dateAdded) = '$yearFilter'";
                            } else {
                              $sql = "SELECT COUNT(DISTINCT(r.name)) AS `total` FROM `research_topic` AS rt INNER JOIN `research_representatives` AS rr ON rt.id = rr.research_topic_id INNER JOIN `representative` AS r ON rr.id = r.research_representatives_id WHERE MONTH(rt.dateAdded) BETWEEN 10 and 12";
                            }
                          } else {
                            $sql = "SELECT COUNT(DISTINCT(r.name)) AS `total` FROM `research_topic` AS rt INNER JOIN `research_representatives` AS rr ON rt.id = rr.research_topic_id INNER JOIN `representative` AS r ON rr.id = r.research_representatives_id";
                          }
                        } elseif (isset($_GET['filterType']) && $_GET['filterType'] == "annual") {
                          if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                            $yearFilter = $_GET['annual'];
                            $sql = "SELECT COUNT(DISTINCT(r.name)) AS `total` FROM `research_topic` AS rt INNER JOIN `research_representatives` AS rr ON rt.id = rr.research_topic_id INNER JOIN `representative` AS r ON rr.id = r.research_representatives_id WHERE YEAR(rt.dateAdded) = '$yearFilter'";
                          } else {
                            $sql = "SELECT COUNT(DISTINCT(r.name)) AS `total` FROM `research_topic` AS rt INNER JOIN `research_representatives` AS rr ON rt.id = rr.research_topic_id INNER JOIN `representative` AS r ON rr.id = r.research_representatives_id";
                          }
                        } else {
                          $sql = "SELECT COUNT(DISTINCT(r.name)) AS `total` FROM `research_topic` AS rt INNER JOIN `research_representatives` AS rr ON rt.id = rr.research_topic_id INNER JOIN `representative` AS r ON rr.id = r.research_representatives_id";
                        }
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        ?>

                        <h2 class="fs-32 font-w700"><?= $row['total'] ?></h2>
                        <span class="fs-18 font-w500 d-block">No. of Faculty Researchers</span>
                        <span class="fs-15 font-w500 d-block"><?= $_GET['annual'] ?><?php if ($_GET['filterType'] == "quarter") {
                                                                                      echo ucwords(" - " . $_GET['quarter'] . " quarter");
                                                                                    } ?></span>
                      </div>
                    </div>
                    <div id="NewCustomers6"></div>
                    <!-- <div class="bilog">
                                            <img src="http://cdn.onlinewebfonts.com/svg/img_122918.png" alt="certificate" style="width: 30px;"> 
                                        </div> -->
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-3">
                <div class="card">
                  <div class="card-body d-flex px-4 justify-content-between">
                    <div>
                      <div class="">
                        <?php
                        if (isset($_GET['filterType']) && $_GET['filterType'] == "quarter") {
                          if (isset($_GET['quarter']) && $_GET['quarter'] == "first") {
                            $yearFilter = $_GET['annual'];
                            if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                              $sql = "SELECT COUNT(*) AS `total` FROM `conferences` WHERE MONTH(dateAdded) BETWEEN 1 and 3 AND YEAR(dateAdded) = '$yearFilter'";
                            } else {
                              $sql = "SELECT COUNT(*) AS `total` FROM `conferences` WHERE MONTH(dateAdded) BETWEEN 1 and 3";
                            }
                          } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "second") {
                            $yearFilter = $_GET['annual'];
                            if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                              $sql = "SELECT COUNT(*) AS `total` FROM `conferences` WHERE MONTH(dateAdded) BETWEEN 4 and 6 AND YEAR(dateAdded) = '$yearFilter'";
                            } else {
                              $sql = "SELECT COUNT(*) AS `total` FROM `conferences` WHERE MONTH(dateAdded) BETWEEN 4 and 6";
                            }
                          } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "third") {
                            $yearFilter = $_GET['annual'];
                            if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                              $sql = "SELECT COUNT(*) AS `total` FROM `conferences` WHERE MONTH(dateAdded) BETWEEN 7 and 9 AND YEAR(dateAdded) = '$yearFilter'";
                            } else {
                              $sql = "SELECT COUNT(*) AS `total` FROM `conferences` WHERE MONTH(dateAdded) BETWEEN 7 and 9";
                            }
                          } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "fourth") {
                            $yearFilter = $_GET['annual'];
                            if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                              $sql = "SELECT COUNT(*) AS `total` FROM `conferences` WHERE MONTH(dateAdded) BETWEEN 10 and 12 AND YEAR(dateAdded) = '$yearFilter'";
                            } else {
                              $sql = "SELECT COUNT(*) AS `total` FROM `conferences` WHERE MONTH(dateAdded) BETWEEN 10 and 12";
                            }
                          } else {
                            $sql = "SELECT COUNT(*) AS `total` FROM `conferences`";
                          }
                        } elseif (isset($_GET['filterType']) && $_GET['filterType'] == "annual") {
                          if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                            $yearFilter = $_GET['annual'];
                            $sql = "SELECT COUNT(*) AS `total` FROM `conferences` WHERE YEAR(dateAdded) = '$yearFilter'";
                          } else {
                            $sql = "SELECT COUNT(*) AS `total` FROM `conferences`";
                          }
                        } else {
                          $sql = "SELECT COUNT(*) AS `total` FROM `conferences`";
                        }
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        ?>
                        <h2 class="fs-32 font-w700"><?= $row['total'] ?></h2>
                        <span class="fs-18 font-w500 d-block">No. of Conferences Attend</span>
                        <span class="fs-15 font-w500 d-block"><?= $_GET['annual'] ?><?php if ($_GET['filterType'] == "quarter") {
                                                                                      echo ucwords(" - " . $_GET['quarter'] . " quarter");
                                                                                    } ?></span>
                      </div>
                    </div>
                    <div id="NewCustomers1"></div>
                    <!-- <div class="bilog">
                                            <img src="http://cdn.onlinewebfonts.com/svg/img_122918.png" alt="certificate" style="width: 30px;"> 
                                        </div> -->
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-3">
                <div class="card">
                  <div class="card-body d-flex px-4 justify-content-between">
                    <div>
                      <div class="">
                        <?php
                        if (isset($_GET['filterType']) && $_GET['filterType'] == "quarter") {
                          if (isset($_GET['quarter']) && $_GET['quarter'] == "first") {
                            $yearFilter = $_GET['annual'];
                            if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                              $sql = "SELECT COUNT(*) AS `total` FROM `scw_` WHERE MONTH(dateAdded) BETWEEN 1 and 3 AND YEAR(dateAdded) = '$yearFilter'";
                            } else {
                              $sql = "SELECT COUNT(*) AS `total` FROM `scw_` WHERE MONTH(dateAdded) BETWEEN 1 and 3";
                            }
                          } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "second") {
                            $yearFilter = $_GET['annual'];
                            if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                              $sql = "SELECT COUNT(*) AS `total` FROM `scw_` WHERE MONTH(dateAdded) BETWEEN 4 and 6 AND YEAR(dateAdded) = '$yearFilter'";
                            } else {
                              $sql = "SELECT COUNT(*) AS `total` FROM `scw_` WHERE MONTH(dateAdded) BETWEEN 4 and 6";
                            }
                          } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "third") {
                            $yearFilter = $_GET['annual'];
                            if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                              $sql = "SELECT COUNT(*) AS `total` FROM `scw_` WHERE MONTH(dateAdded) BETWEEN 7 and 9 AND YEAR(dateAdded) = '$yearFilter'";
                            } else {
                              $sql = "SELECT COUNT(*) AS `total` FROM `scw_` WHERE MONTH(dateAdded) BETWEEN 7 and 9";
                            }
                          } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "fourth") {
                            $yearFilter = $_GET['annual'];
                            if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                              $sql = "SELECT COUNT(*) AS `total` FROM `scw_` WHERE MONTH(dateAdded) BETWEEN 10 and 12 AND YEAR(dateAdded) = '$yearFilter'";
                            } else {
                              $sql = "SELECT COUNT(*) AS `total` FROM `scw_` WHERE MONTH(dateAdded) BETWEEN 10 and 12";
                            }
                          } else {
                            $sql = "SELECT COUNT(*) AS `total` FROM `scw_`";
                          }
                        } elseif (isset($_GET['filterType']) && $_GET['filterType'] == "annual") {
                          if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                            $yearFilter = $_GET['annual'];
                            $sql = "SELECT COUNT(*) AS `total` FROM `scw_` WHERE YEAR(dateAdded) = '$yearFilter'";
                          } else {
                            $sql = "SELECT COUNT(*) AS `total` FROM `scw_`";
                          }
                        } else {
                          $sql = "SELECT COUNT(*) AS `total` FROM `scw_`";
                        }
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        ?>
                        <h2 class="fs-32 font-w700"><?= $row['total'] ?></h2>
                        <span class="fs-18 font-w500 d-block">No. of Publications</span>
                        <span class="fs-15 font-w500 d-block"><?= $_GET['annual'] ?><?php if ($_GET['filterType'] == "quarter") {
                                                                                      echo ucwords(" - " . $_GET['quarter'] . " quarter");
                                                                                    } ?></span>
                      </div>
                    </div>
                    <div id="NewCustomers"></div>
                    <!-- <div class="bilog">
                                            <img src="http://cdn.onlinewebfonts.com/svg/img_122918.png" alt="certificate" style="width: 30px;"> 
                                        </div> -->
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-3">
                <div class="card">
                  <div class="card-body d-flex px-4 justify-content-between">
                    <div>
                      <div class="">
                        <?php
                        if (isset($_GET['filterType']) && $_GET['filterType'] == "quarter") {
                          if (isset($_GET['quarter']) && $_GET['quarter'] == "first") {
                            $yearFilter = $_GET['annual'];
                            if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                              $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` WHERE MONTH(`rt`.`dateAdded`) BETWEEN 1 and 3 AND YEAR(`rt`.`dateAdded`) = '$yearFilter'";
                            } else {
                              $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` WHERE MONTH(`rt`.`dateAdded`) BETWEEN 1 and 3";
                            }
                          } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "second") {
                            $yearFilter = $_GET['annual'];
                            if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                              $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` WHERE MONTH(`rt`.`dateAdded`) BETWEEN 4 and 6 AND YEAR(`rt`.`dateAdded`) = '$yearFilter'";
                            } else {
                              $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` WHERE MONTH(`rt`.`dateAdded`) BETWEEN 4 and 6";
                            }
                          } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "third") {
                            $yearFilter = $_GET['annual'];
                            if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                              $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` WHERE MONTH(`rt`.`dateAdded`) BETWEEN 7 and 9 AND YEAR(`rt`.`dateAdded`) = '$yearFilter'";
                            } else {
                              $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` WHERE MONTH(`rt`.`dateAdded`) BETWEEN 7 and 9";
                            }
                          } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "fourth") {
                            $yearFilter = $_GET['annual'];
                            if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                              $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` WHERE MONTH(`rt`.`dateAdded`) BETWEEN 10 and 12 AND YEAR(`rt`.`dateAdded`) = '$yearFilter'";
                            } else {
                              $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` WHERE MONTH(`rt`.`dateAdded`) BETWEEN 10 and 12";
                            }
                          } else {
                            $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id`";
                          }
                        } elseif (isset($_GET['filterType']) && $_GET['filterType'] == "annual") {
                          if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                            $yearFilter = $_GET['annual'];
                            $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` WHERE YEAR(`rt`.`dateAdded`) = '$yearFilter'";
                          } else {
                            $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id`";
                          }
                        } else {
                          $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id`";
                        }
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        ?>
                        <h2 class="fs-32 font-w700"><?php if ($row['total'] != null) {
                                                      echo '₱' . number_format($row['total']);
                                                    } else {
                                                      echo "₱0";
                                                    } ?></h2>
                        <span class="fs-18 font-w500 d-block">Gross Expenditure on R&D</span>
                        <span class="fs-15 font-w500 d-block"><?= $_GET['annual'] ?><?php if ($_GET['filterType'] == "quarter") {
                                                                                      echo ucwords(" - " . $_GET['quarter'] . " quarter");
                                                                                    } ?></span>
                      </div>
                    </div>
                    <div id="NewCustomers4"></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-3">
                <div class="card">
                  <div class="card-body d-flex px-4 justify-content-between">
                    <div>
                      <div class="">
                        <?php
                        if (isset($_GET['filterType']) && $_GET['filterType'] == "quarter") {
                          if (isset($_GET['quarter']) && $_GET['quarter'] == "first") {
                            $yearFilter = $_GET['annual'];
                            if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                              $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` WHERE MONTH(`rt`.`dateAdded`) BETWEEN 1 and 3 AND YEAR(`rt`.`dateAdded`) = '$yearFilter' AND NOT `status` LIKE 'For Evaluation' AND `partnership` LIKE 'Institutionaly Funded'";
                            } else {
                              $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` WHERE MONTH(`rt`.`dateAdded`) BETWEEN 1 and 3 AND NOT `status` LIKE 'For Evaluation' AND `partnership` LIKE 'Institutionaly Funded'";
                            }
                          } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "second") {
                            $yearFilter = $_GET['annual'];
                            if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                              $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` WHERE MONTH(`rt`.`dateAdded`) BETWEEN 4 and 6 AND YEAR(`rt`.`dateAdded`) = '$yearFilter' AND NOT `status` LIKE 'For Evaluation' AND `partnership` LIKE 'Institutionaly Funded'";
                            } else {
                              $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` WHERE MONTH(`rt`.`dateAdded`) BETWEEN 4 and 6 AND NOT `status` LIKE 'For Evaluation' AND `partnership` LIKE 'Institutionaly Funded'";
                            }
                          } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "third") {
                            $yearFilter = $_GET['annual'];
                            if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                              $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` WHERE MONTH(`rt`.`dateAdded`) BETWEEN 7 and 9 AND YEAR(`rt`.`dateAdded`) = '$yearFilter' AND NOT `status` LIKE 'For Evaluation' AND `partnership` LIKE 'Institutionaly Funded'";
                            } else {
                              $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` WHERE MONTH(`rt`.`dateAdded`) BETWEEN 7 and 9 AND NOT `status` LIKE 'For Evaluation' AND `partnership` LIKE 'Institutionaly Funded'";
                            }
                          } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "fourth") {
                            $yearFilter = $_GET['annual'];
                            if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                              $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` WHERE MONTH(`rt`.`dateAdded`) BETWEEN 10 and 12 AND YEAR(`rt`.`dateAdded`) = '$yearFilter' AND NOT `status` LIKE 'For Evaluation' AND `partnership` LIKE 'Institutionaly Funded'";
                            } else {
                              $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` WHERE MONTH(`rt`.`dateAdded`) BETWEEN 10 and 12 AND NOT `status` LIKE 'For Evaluation' AND `partnership` LIKE 'Institutionaly Funded'";
                            }
                          } else {
                            $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` AND NOT `status` LIKE 'For Evaluation' AND `partnership` LIKE 'Institutionaly Funded'";
                          }
                        } elseif (isset($_GET['filterType']) && $_GET['filterType'] == "annual") {
                          if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                            $yearFilter = $_GET['annual'];
                            $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` WHERE YEAR(`rt`.`dateAdded`) = '$yearFilter' AND NOT `status` LIKE 'For Evaluation' AND `partnership` LIKE 'Institutionaly Funded'";
                          } else {
                            $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` AND NOT `status` LIKE 'For Evaluation' AND `partnership` LIKE 'Institutionaly Funded'";
                          }
                        } else {
                          $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` AND NOT `status` LIKE 'For Evaluation' AND `partnership` LIKE 'Institutionaly Funded'";
                        }
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        ?>
                        <h2 class="fs-32 font-w700"><?php if ($row['total'] != null) {
                                                      echo '₱' . number_format($row['total']);
                                                    } else {
                                                      echo "₱0";
                                                    } ?></h2>
                        <span class="fs-18 font-w500 d-block">Gross Expenditure on R&D (Institutionally)</span>
                        <span class="fs-15 font-w500 d-block"><?= $_GET['annual'] ?><?php if ($_GET['filterType'] == "quarter") {
                                                                                      echo ucwords(" - " . $_GET['quarter'] . " quarter");
                                                                                    } ?></span>
                      </div>
                    </div>
                    <div id="NewCustomers5"></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-3">
                <div class="card">
                  <div class="card-body d-flex px-4 justify-content-between">
                    <div>
                      <div class="">
                        <?php
                        if (isset($_GET['filterType']) && $_GET['filterType'] == "quarter") {
                          if (isset($_GET['quarter']) && $_GET['quarter'] == "first") {
                            $yearFilter = $_GET['annual'];
                            if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                              $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` WHERE MONTH(`rt`.`dateAdded`) BETWEEN 1 and 3 AND YEAR(`rt`.`dateAdded`) = '$yearFilter' AND NOT `status` LIKE 'For Evaluation' AND `partnership` LIKE 'Externaly Funded'";
                            } else {
                              $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` WHERE MONTH(`rt`.`dateAdded`) BETWEEN 1 and 3 AND NOT `status` LIKE 'For Evaluation' AND `partnership` LIKE 'Externaly Funded'";
                            }
                          } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "second") {
                            $yearFilter = $_GET['annual'];
                            if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                              $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` WHERE MONTH(`rt`.`dateAdded`) BETWEEN 4 and 6 AND YEAR(`rt`.`dateAdded`) = '$yearFilter' AND NOT `status` LIKE 'For Evaluation' AND `partnership` LIKE 'Externaly Funded'";
                            } else {
                              $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` WHERE MONTH(`rt`.`dateAdded`) BETWEEN 4 and 6 AND NOT `status` LIKE 'For Evaluation' AND `partnership` LIKE 'Externaly Funded'";
                            }
                          } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "third") {
                            $yearFilter = $_GET['annual'];
                            if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                              $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` WHERE MONTH(`rt`.`dateAdded`) BETWEEN 7 and 9 AND YEAR(`rt`.`dateAdded`) = '$yearFilter' AND NOT `status` LIKE 'For Evaluation' AND `partnership` LIKE 'Externaly Funded'";
                            } else {
                              $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` WHERE MONTH(`rt`.`dateAdded`) BETWEEN 7 and 9 AND NOT `status` LIKE 'For Evaluation' AND `partnership` LIKE 'Externaly Funded'";
                            }
                          } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "fourth") {
                            $yearFilter = $_GET['annual'];
                            if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                              $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` WHERE MONTH(`rt`.`dateAdded`) BETWEEN 10 and 12 AND YEAR(`rt`.`dateAdded`) = '$yearFilter' AND NOT `status` LIKE 'For Evaluation' AND `partnership` LIKE 'Externaly Funded'";
                            } else {
                              $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` WHERE MONTH(`rt`.`dateAdded`) BETWEEN 10 and 12 AND NOT `status` LIKE 'For Evaluation' AND `partnership` LIKE 'Externaly Funded'";
                            }
                          } else {
                            $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` AND NOT `status` LIKE 'For Evaluation' AND `partnership` LIKE 'Externaly Funded'";
                          }
                        } elseif (isset($_GET['filterType']) && $_GET['filterType'] == "annual") {
                          if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                            $yearFilter = $_GET['annual'];
                            $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` WHERE YEAR(`rt`.`dateAdded`) = '$yearFilter' AND NOT `status` LIKE 'For Evaluation' AND `partnership` LIKE 'Externaly Funded'";
                          } else {
                            $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` AND NOT `status` LIKE 'For Evaluation' AND `partnership` LIKE 'Externaly Funded'";
                          }
                        } else {
                          $sql = "SELECT SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` AND NOT `status` LIKE 'For Evaluation' AND `partnership` LIKE 'Externaly Funded'";
                        }
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        ?>
                        <h2 class="fs-32 font-w700"><?php if ($row['total'] != null) {
                                                      echo '₱' . number_format($row['total']);
                                                    } else {
                                                      echo "₱0";
                                                    } ?></h2>
                        <span class="fs-18 font-w500 d-block">Gross Expenditure on R&D (Externally)</span>
                        <span class="fs-15 font-w500 d-block"><?= $_GET['annual'] ?><?php if ($_GET['filterType'] == "quarter") {
                                                                                      echo ucwords(" - " . $_GET['quarter'] . " quarter");
                                                                                    } ?></span>
                      </div>
                    </div>
                    <div id="NewCustomers2"></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-3">
                <div class="card">
                  <div class="card-body d-flex px-4 justify-content-between">
                    <div>
                      <div class="">

                        <h2 class="fs-32 font-w700">000</h2>
                        <span class="fs-18 font-w500 d-block">No. of Paper Presented</span>
                        <span class="fs-15 font-w500 d-block"><?= $_GET['annual'] ?><?php if ($_GET['filterType'] == "quarter") {
                                                                                      echo ucwords(" - " . $_GET['quarter'] . " quarter");
                                                                                    } ?></span>
                      </div>
                    </div>
                    <div id="NewCustomers7"></div>
                    <!-- <div class="bilog">
                                            <img src="http://cdn.onlinewebfonts.com/svg/img_122918.png" alt="certificate" style="width: 30px;"> 
                                        </div> -->
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-3">
                <div class="card">
                  <div class="card-body d-flex px-4 justify-content-between">
                    <div>
                      <div class="">

                        <h2 class="fs-32 font-w700">000</h2>
                        <span class="fs-18 font-w500 d-block">No. of Poster Presented</span>
                        <span class="fs-15 font-w500 d-block"><?= $_GET['annual'] ?><?php if ($_GET['filterType'] == "quarter") {
                                                                                      echo ucwords(" - " . $_GET['quarter'] . " quarter");
                                                                                    } ?></span>
                      </div>
                    </div>
                    <div id="NewCustomers8"></div>
                    <!-- <div class="bilog">
                                            <img src="http://cdn.onlinewebfonts.com/svg/img_122918.png" alt="certificate" style="width: 30px;"> 
                                        </div> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-12">
              <div class="card">
                <div class="card-body border-0">
                  <div class="row">
                    <div class="col">
                      <h4 class="fs-20 font-w700 mb-2">Research Statistics (<?= $_GET['annual'] ?><?php if ($_GET['filterType'] == "quarter") {
                                                                                                    echo ucwords(" - " . $_GET['quarter'] . " quarter");
                                                                                                  } ?>)</h4>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div id="emailchart"></div>
                    </div>
                    <div class="col">
                      <div class="card-body">
                        <div>
                          <div class="d-flex align-items-center justify-content-between  mb-4">
                            <span class="fs-18 font-w600">Total Research Projects</span>
                            <?php
                            if (isset($_GET['filterType']) && $_GET['filterType'] == "quarter") {
                              if (isset($_GET['quarter']) && $_GET['quarter'] == "first") {
                                $yearFilter = $_GET['annual'];
                                if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 1 and 3 AND YEAR(dateAdded) = '$yearFilter'";
                                } else {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 1 and 3";
                                }
                              } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "second") {
                                $yearFilter = $_GET['annual'];
                                if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 4 and 6 AND YEAR(dateAdded) = '$yearFilter'";
                                } else {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 4 and 6";
                                }
                              } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "third") {
                                $yearFilter = $_GET['annual'];
                                if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 7 and 9 AND YEAR(dateAdded) = '$yearFilter'";
                                } else {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 7 and 9";
                                }
                              } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "fourth") {
                                $yearFilter = $_GET['annual'];
                                if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 10 and 12 AND YEAR(dateAdded) = '$yearFilter'";
                                } else {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 10 and 12";
                                }
                              } else {
                                $sql = "SELECT COUNT(*) AS `total` FROM `research_topic`";
                              }
                            } elseif (isset($_GET['filterType']) && $_GET['filterType'] == "annual") {
                              if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                                $yearFilter = $_GET['annual'];
                                $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE YEAR(dateAdded) = '$yearFilter'";
                              } else {
                                $sql = "SELECT COUNT(*) AS `total` FROM `research_topic`";
                              }
                            } else {
                              $sql = "SELECT COUNT(*) AS `total` FROM `research_topic`";
                            }
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            ?>
                            <span class="fs-18 font-w600"><?= $row['total'] ?></span>
                          </div>
                          <div class="d-flex align-items-center justify-content-between  mb-4">
                            <span class="fs-18 font-w500">
                              <svg class="me-3" width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="20" height="20" rx="6" fill="#F8BABA"></rect>
                              </svg>
                              For Evaluation
                            </span>
                            <?php
                            if (isset($_GET['filterType']) && $_GET['filterType'] == "quarter") {
                              if (isset($_GET['quarter']) && $_GET['quarter'] == "first") {
                                $yearFilter = $_GET['annual'];
                                if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'For Evaluation' AND MONTH(dateAdded) BETWEEN 1 and 3 AND YEAR(dateAdded) = '$yearFilter'";
                                } else {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'For Evaluation' AND MONTH(dateAdded) BETWEEN 1 and 3";
                                }
                              } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "second") {
                                $yearFilter = $_GET['annual'];
                                if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'For Evaluation' AND MONTH(dateAdded) BETWEEN 4 and 6 AND YEAR(dateAdded) = '$yearFilter'";
                                } else {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'For Evaluation' AND MONTH(dateAdded) BETWEEN 4 and 6";
                                }
                              } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "third") {
                                $yearFilter = $_GET['annual'];
                                if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'For Evaluation' AND MONTH(dateAdded) BETWEEN 7 and 9 AND YEAR(dateAdded) = '$yearFilter'";
                                } else {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'For Evaluation' AND MONTH(dateAdded) BETWEEN 7 and 9";
                                }
                              } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "fourth") {
                                $yearFilter = $_GET['annual'];
                                if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'For Evaluation' AND MONTH(dateAdded) BETWEEN 10 and 12 AND YEAR(dateAdded) = '$yearFilter'";
                                } else {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'For Evaluation' AND MONTH(dateAdded) BETWEEN 10 and 12";
                                }
                              } else {
                                $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'For Evaluation'";
                              }
                            } elseif (isset($_GET['filterType']) && $_GET['filterType'] == "annual") {
                              if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                                $yearFilter = $_GET['annual'];
                                $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'For Evaluation' AND YEAR(dateAdded) = '$yearFilter'";
                              } else {
                                $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'For Evaluation'";
                              }
                            } else {
                              $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'For Evaluation'";
                            }
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            ?>
                            <span class="fs-18 font-w600"><?= $row['total'] ?></span>
                          </div>
                          <div class="d-flex align-items-center justify-content-between  mb-4">
                            <span class="fs-18 font-w500">
                              <svg class="me-3" width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="20" height="20" rx="6" fill="#F83E3E"></rect>
                              </svg>
                              Approved with notice to proceed
                            </span>
                            <?php
                            if (isset($_GET['filterType']) && $_GET['filterType'] == "quarter") {
                              if (isset($_GET['quarter']) && $_GET['quarter'] == "first") {
                                $yearFilter = $_GET['annual'];
                                if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Approved with notice to proceed' AND MONTH(dateAdded) BETWEEN 1 and 3 AND YEAR(dateAdded) = '$yearFilter'";
                                } else {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Approved with notice to proceed' AND MONTH(dateAdded) BETWEEN 1 and 3";
                                }
                              } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "second") {
                                $yearFilter = $_GET['annual'];
                                if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Approved with notice to proceed' AND MONTH(dateAdded) BETWEEN 4 and 6 AND YEAR(dateAdded) = '$yearFilter'";
                                } else {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Approved with notice to proceed' AND MONTH(dateAdded) BETWEEN 4 and 6";
                                }
                              } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "third") {
                                $yearFilter = $_GET['annual'];
                                if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Approved with notice to proceed' AND MONTH(dateAdded) BETWEEN 7 and 9 AND YEAR(dateAdded) = '$yearFilter'";
                                } else {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Approved with notice to proceed' AND MONTH(dateAdded) BETWEEN 7 and 9";
                                }
                              } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "fourth") {
                                $yearFilter = $_GET['annual'];
                                if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Approved with notice to proceed' AND MONTH(dateAdded) BETWEEN 10 and 12 AND YEAR(dateAdded) = '$yearFilter'";
                                } else {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Approved with notice to proceed' AND MONTH(dateAdded) BETWEEN 10 and 12";
                                }
                              } else {
                                $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Approved with notice to proceed'";
                              }
                            } elseif (isset($_GET['filterType']) && $_GET['filterType'] == "annual") {
                              if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                                $yearFilter = $_GET['annual'];
                                $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Approved with notice to proceed' AND YEAR(dateAdded) = '$yearFilter'";
                              } else {
                                $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Approved with notice to proceed'";
                              }
                            } else {
                              $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Approved with notice to proceed'";
                            }
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            ?>
                            <span class="fs-18 font-w600"><?= $row['total'] ?></span>
                          </div>
                          <div class="d-flex align-items-center justify-content-between  mb-4">
                            <span class="fs-18 font-w500">
                              <svg class="me-3" width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="20" height="20" rx="6" fill="#e79f31"></rect>
                              </svg>
                              Ongoing
                            </span>
                            <?php
                            if (isset($_GET['filterType']) && $_GET['filterType'] == "quarter") {
                              if (isset($_GET['quarter']) && $_GET['quarter'] == "first") {
                                $yearFilter = $_GET['annual'];
                                if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Ongoing' AND MONTH(dateAdded) BETWEEN 1 and 3 AND YEAR(dateAdded) = '$yearFilter'";
                                } else {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Ongoing' AND MONTH(dateAdded) BETWEEN 1 and 3";
                                }
                              } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "second") {
                                $yearFilter = $_GET['annual'];
                                if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Ongoing' AND MONTH(dateAdded) BETWEEN 4 and 6 AND YEAR(dateAdded) = '$yearFilter'";
                                } else {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Ongoing' AND MONTH(dateAdded) BETWEEN 4 and 6";
                                }
                              } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "third") {
                                $yearFilter = $_GET['annual'];
                                if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Ongoing' AND MONTH(dateAdded) BETWEEN 7 and 9 AND YEAR(dateAdded) = '$yearFilter'";
                                } else {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Ongoing' AND MONTH(dateAdded) BETWEEN 7 and 9";
                                }
                              } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "fourth") {
                                $yearFilter = $_GET['annual'];
                                if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Ongoing' AND MONTH(dateAdded) BETWEEN 10 and 12 AND YEAR(dateAdded) = '$yearFilter'";
                                } else {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Ongoing' AND MONTH(dateAdded) BETWEEN 10 and 12";
                                }
                              } else {
                                $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Ongoing'";
                              }
                            } elseif (isset($_GET['filterType']) && $_GET['filterType'] == "annual") {
                              if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                                $yearFilter = $_GET['annual'];
                                $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Ongoing' AND YEAR(dateAdded) = '$yearFilter'";
                              } else {
                                $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Ongoing'";
                              }
                            } else {
                              $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Ongoing'";
                            }
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            ?>
                            <span class="fs-18 font-w600"><?= $row['total'] ?></span>
                          </div>
                          <div class="d-flex align-items-center justify-content-between  mb-4">
                            <span class="fs-18 font-w500">
                              <svg class="me-3" width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="20" height="20" rx="6" fill="#DB7093"></rect>
                              </svg>
                              Completed
                            </span>
                            <?php
                            if (isset($_GET['filterType']) && $_GET['filterType'] == "quarter") {
                              if (isset($_GET['quarter']) && $_GET['quarter'] == "first") {
                                $yearFilter = $_GET['annual'];
                                if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Completed' AND MONTH(dateAdded) BETWEEN 1 and 3 AND YEAR(dateAdded) = '$yearFilter'";
                                } else {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Completed' AND MONTH(dateAdded) BETWEEN 1 and 3";
                                }
                              } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "second") {
                                $yearFilter = $_GET['annual'];
                                if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Completed' AND MONTH(dateAdded) BETWEEN 4 and 6 AND YEAR(dateAdded) = '$yearFilter'";
                                } else {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Completed' AND MONTH(dateAdded) BETWEEN 4 and 6";
                                }
                              } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "third") {
                                $yearFilter = $_GET['annual'];
                                if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Completed' AND MONTH(dateAdded) BETWEEN 7 and 9 AND YEAR(dateAdded) = '$yearFilter'";
                                } else {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Completed' AND MONTH(dateAdded) BETWEEN 7 and 9";
                                }
                              } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "fourth") {
                                $yearFilter = $_GET['annual'];
                                if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Completed' AND MONTH(dateAdded) BETWEEN 10 and 12 AND YEAR(dateAdded) = '$yearFilter'";
                                } else {
                                  $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Completed' AND MONTH(dateAdded) BETWEEN 10 and 12";
                                }
                              } else {
                                $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Completed'";
                              }
                            } elseif (isset($_GET['filterType']) && $_GET['filterType'] == "annual") {
                              if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                                $yearFilter = $_GET['annual'];
                                $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Completed' AND YEAR(dateAdded) = '$yearFilter'";
                              } else {
                                $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Completed'";
                              }
                            } else {
                              $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Completed'";
                            }
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            ?>
                            <span class="fs-18 font-w600"><?= $row['total'] ?></span>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="col-md-12">
                <div class="card"> <!-- style="height: 450px -->
                  <div class="card-header">
                    <h4 class="card-title">Target <span id="academic-year-semester-header"></span></h4>
                    <div class="dropdown">
                      <div class="btn-link" data-bs-toggle="modal" data-bs-target="#exampleModalCenter5">
                        <svg width="15" height="15" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <circle cx="12.4999" cy="3.5" r="2.5" fill="#A5A5A5"></circle>
                          <circle cx="12.4999" cy="11.5" r="2.5" fill="#A5A5A5"></circle>
                          <circle cx="12.4999" cy="19.5" r="2.5" fill="#A5A5A5"></circle>
                        </svg>
                      </div>
                      <div class="modal fade" id="exampleModalCenter5">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" style="font-size: 20px">Target</h5>
                            </div>
                            <div class="modal-body">
                              <div class="col-lg-12 mb-3">
                                <label for="">College</label>
                                <select id="select-college" class="form-control">
                                  <option value="CABEIHM">CABEIHM</option>
                                  <option value="CAS">CAS</option>
                                  <option value="CICS">CICS</option>
                                  <option value="CET">CET</option>
                                  <option value="CONAHS">CONAHS</option>
                                  <option value="CTE">CTE</option>
                                </select>
                              </div>
                              <div class="col-lg-12 mb-3">
                                <label class="form-label">Academic Year
                                </label>
                                <select id="select-academic-year" class="form-control">
                                  <?php
                                  $currentYear = DATE("Y");
                                  $currentMonth = DATE("m");
                                  if ($currentMonth < 6) {
                                    $currentYear--;
                                  }
                                  $i = 0;
                                  while ($i < 5) {
                                  ?>
                                    <option value="<?= $currentYear . "-" . $currentYear + 1 ?>"><?= $currentYear . "-" . $currentYear + 1 ?></option>
                                  <?php
                                    $i++;
                                    $currentYear++;
                                  }
                                  ?>
                                </select>
                              </div>
                              <div class="col-lg-12 mb-3">
                                <label for="">Semester</label>
                                <select id="select-semester" class="form-control">
                                  <option value="1">First Semester</option>
                                  <option value="2">Second Semester</option>
                                </select>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                              <button id="submit-academic-year" type="button" class="btn btn-primary">Submit</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <canvas id="lineChart_3"></canvas> <!-- // style="max-height:360px" -->
                  </div>
                  <div class="card-footer text-center">
                    <svg class="me-3" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect width="20" height="20" rx="6" fill="#DB7093"></rect>
                    </svg>
                    Accomplishment

                    <svg class="me-3" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-left: 10px;">
                      <rect width="20" height="20" rx="6" fill="#F83E3E"></rect>
                    </svg>
                    Target
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="fs-20 font-w700 mb-2">Research Projects (<?= $_GET['annual'] ?><?php if ($_GET['filterType'] == "quarter") {
                                                                                                  echo ucwords(" - " . $_GET['quarter'] . " quarter");
                                                                                                } ?>)</h4>
                      <!-- <h1 style="font-size:12px">By number of Research R&D per Colleges</h1> -->
                    </div>
                    <div class="card-body">
                      <canvas id="horizontal-bar-chart"></canvas>
                    </div>
                    <div class="card-footer text-center">
                      <svg class="me-3" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="20" height="20" rx="6" fill="rgba(248,186,186, 1)"></rect>
                      </svg>
                      No. of Research Projects
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="fs-20 font-w700 mb-2">Faculty Researcher (<?= $_GET['annual'] ?><?php if ($_GET['filterType'] == "quarter") {
                                                                                                    echo ucwords(" - " . $_GET['quarter'] . " quarter");
                                                                                                  } ?>)</h4>
                      <div class="row"></div>

                    </div>
                    <div class="card-body">
                      <canvas id="barChart_2"></canvas>
                    </div>
                    <div class="card-footer text-center">
                      <svg class="me-3" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="20" height="20" rx="6" fill="rgba(248,186,186, 1)"></rect>
                      </svg>
                      No. of Faculty Researcher
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="fs-20 font-w700 mb-2">Conferences Attended (<?= $_GET['annual'] ?><?php if ($_GET['filterType'] == "quarter") {
                                                                                                      echo ucwords(" - " . $_GET['quarter'] . " quarter");
                                                                                                    } ?>)</h4>
                    </div>

                    <div class="card-body">
                      <canvas id="areaChart_2"></canvas>
                    </div>
                    <div class="card-footer text-center">
                      <svg class="me-3" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="20" height="20" rx="6" fill="rgba(248, 62, 62, 1)"></rect>
                      </svg>
                      No. of Conferences Attended
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="fs-20 font-w700 mb-2">Publication (<?= $_GET['annual'] ?><?php if ($_GET['filterType'] == "quarter") {
                                                                                            echo ucwords(" - " . $_GET['quarter'] . " quarter");
                                                                                          } ?>)</h4>
                      <div class="row">
                        <!-- <h1 style="font-size:12px">By number of Publication per Colleges</h1> -->
                      </div>

                    </div>
                    <div class="card-body">
                      <canvas id="lineChart_1"></canvas>
                    </div>
                    <div class="card-footer text-center">
                      <svg class="me-3" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="20" height="20" rx="6" fill="rgba(248, 62, 62, 1)"></rect>
                      </svg>
                      No. of Publication
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="fs-20 font-w700 mb-2">R&D Expenditures (<?= $_GET['annual'] ?><?php if ($_GET['filterType'] == "quarter") {
                                                                                                  echo ucwords(" - " . $_GET['quarter'] . " quarter");
                                                                                                } ?>)</h4>
                    </div>
                    <div class="card-body">
                      <div id="rnd-chart" class="ct-chart ct-golden-section chartlist-chart"></div>
                    </div>
                    <div class="card-footer text-center">
                      <svg class="me-3" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="20" height="20" rx="6" fill="#DB7093"></rect>
                      </svg>
                      Externally Funded

                      <svg class="me-3" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-left: 10px;">
                        <rect width="20" height="20" rx="6" fill="rgba(231,159,49, 1)"></rect>
                      </svg>
                      Institutionally Funded
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="fs-20 font-w700 mb-2">Inventions (<?= $_GET['annual'] ?><?php if ($_GET['filterType'] == "quarter") {
                                                                                            echo ucwords(" - " . $_GET['quarter'] . " quarter");
                                                                                          } ?>)</h4>
                    </div>
                    <div class="card-body">
                      <canvas id="barChart_1"></canvas>
                    </div>
                    <div class="card-footer text-center">
                      <svg class="me-3" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="20" height="20" rx="6" fill="rgba(231,159,49, 1)"></rect>
                      </svg>
                      No. of Inventions
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="fs-20 font-w700 mb-2">Ongoing Research Projects (<?= $_GET['annual'] ?><?php if ($_GET['filterType'] == "quarter") {
                                                                                                          echo ucwords(" - " . $_GET['quarter'] . " quarter");
                                                                                                        } ?>)</h4>
                      <!-- h1 style="font-size:12px">By number of Ongoing Research Projects per Colleges</h1> -->
                    </div>
                    <div class="card-body">
                      <div id="morris_donught" class="morris_chart_height"></div>
                    </div>
                    <div class="card-footer text-center">
                      <svg class="me-3" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="20" height="20" rx="6" fill="#DB7093"></rect>
                      </svg>
                      Ongoing Research Projects

                      <svg class="me-3" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-left: 10px;">
                        <rect width="20" height="20" rx="6" fill="#F83E3E"></rect>
                      </svg>
                      Total Research Projects
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="fs-20 font-w700 mb-0">Completed Research Projects (<?= $_GET['annual'] ?><?php if ($_GET['filterType'] == "quarter") {
                                                                                                            echo ucwords(" - " . $_GET['quarter'] . " quarter");
                                                                                                          } ?>)</h4>
                      <!-- <h1 style="font-size:12px">By number of Completed Research Projects per Colleges</h1> -->
                    </div>
                    <div class="card-body pb-0">
                      <canvas id="lineChartComResPerYear"></canvas>
                    </div>
                    <div class="card-footer text-center">
                      <svg class="me-3" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="20" height="20" rx="6" fill="rgba(219, 112, 147, 1)"></rect>
                      </svg>
                      No. of Completed Research Projects
                    </div>
                  </div>
                </div>
                <!-- <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="fs-20 font-w700 mb-0">Research Projects (<?= $_GET['annual'] ?>)</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="extreme-chart" class="ct-chart ct-golden-section chartlist-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="fs-20 font-w700 mb-0">Faculty Researcher (<?= $_GET['annual'] ?>)</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="extreme-chart" class="ct-chart ct-golden-section chartlist-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="fs-20 font-w700 mb-0">Conferences Attended (<?= $_GET['annual'] ?>)</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="extreme-chart" class="ct-chart ct-golden-section chartlist-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="fs-20 font-w700 mb-0">Publication (<?= $_GET['annual'] ?>)</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="extreme-chart" class="ct-chart ct-golden-section chartlist-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="fs-20 font-w700 mb-0">Inventions (<?= $_GET['annual'] ?>)</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="extreme-chart" class="ct-chart ct-golden-section chartlist-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="fs-20 font-w700 mb-0">Ongoing Research Projects (<?= $_GET['annual'] ?>)</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="extreme-chart" class="ct-chart ct-golden-section chartlist-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="fs-20 font-w700 mb-0">Completed Research Projects (<?= $_GET['annual'] ?>)</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="extreme-chart" class="ct-chart ct-golden-section chartlist-chart"></div>
                                    </div>
                                </div>
                            </div> -->
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
  <!-- Required vendors -->
  <script src="vendor/global/global.min.js"></script>
  <script src="vendor/chart.js/Chart.bundle.min.js"></script>
  <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

  <!-- Apex Chart -->
  <script src="vendor/apexchart/apexchart.js"></script>

  <script src="vendor/chart.js/Chart.bundle.min.js"></script>

  <!-- Chart piety plugin files -->
  <script src="vendor/peity/jquery.peity.min.js"></script>
  <!-- Dashboard 1 -->
  <script src="js/dashboard/dashboard-1.js"></script>

  <script src="vendor/owl-carousel/owl.carousel.js"></script>

  <script src="js/custom.min.js"></script>
  <script src="js/dlabnav-init.js"></script>

  <script src="vendor/chart.js/Chart.bundle.min.js"></script>
  <script src="js/plugins-init/chartjs-init.js"></script>

  <!-- Chart Chartist plugin files -->
  <script src="vendor/chartist/js/chartist.min.js"></script>
  <script src="vendor/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
  <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
  <script src="js/plugins-init/chartist-init.js"></script>

  <!-- Chart Morris plugin files -->
  <script src="vendor/raphael/raphael.min.js"></script>
  <script src="vendor/morris/morris.min.js"></script>
  <script src="js/plugins-init/morris-init.js"></script>

  <script>
    document.getElementById("dataFilter").addEventListener('change', function() {
      var quarterFilterRow = document.getElementById("quarterFilterRow");
      var annualFilterRow = document.getElementById("annualFilterRow");

      var quarterFilterInput = document.getElementById("quarterFilterInput");
      var annualFilterInput = document.getElementById("annualFilterInput");

      if (this.value == "quarter") {
        quarterFilterRow.style.display = "block";
        annualFilterRow.style.display = "block";
      } else if (this.value == "annual") {
        quarterFilterRow.style.display = "none";
        annualFilterRow.style.display = "block";
        quarterFilterInput.value = "none";
      } else if (this.value == "none") {
        quarterFilterRow.style.display = "none";
        annualFilterRow.style.display = "none";
        annualFilterInput.value = "none";
        quarterFilterInput.value = "none";
      }
    });

    function cardsCenter() {

      /*  testimonial one function by = owl.carousel.js */



      jQuery('.card-slider').owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        //center:true,
        slideSpeed: 3000,
        paginationSpeed: 3000,
        dots: true,
        navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
        responsive: {
          0: {
            items: 1
          },
          576: {
            items: 1
          },
          800: {
            items: 1
          },
          991: {
            items: 1
          },
          1200: {
            items: 1
          },
          1600: {
            items: 1
          }
        }
      })
    }

    jQuery(window).on('load', function() {
      setTimeout(function() {
        cardsCenter();
      }, 1000);
    });
  </script>

  <!-- GRAPHS -->
  <script type="text/javascript">
    // Target
    var targetChart = function() {
      var targetChart;

      //dual line chart
      if (jQuery('#lineChart_3').length > 0) {
        const lineChart_3 = document.getElementById("lineChart_3").getContext('2d');
        //generate gradient
        const lineChart_3gradientStroke1 = lineChart_3.createLinearGradient(500, 0, 100, 0);
        lineChart_3gradientStroke1.addColorStop(0, "rgba(248,62,62, 1)");
        lineChart_3gradientStroke1.addColorStop(1, "rgba(248,62,62, 0.5)");

        const lineChart_3gradientStroke2 = lineChart_3.createLinearGradient(500, 0, 100, 0);
        lineChart_3gradientStroke2.addColorStop(0, "rgba(219,112,147, 1)");
        lineChart_3gradientStroke2.addColorStop(1, "rgba(219,112,147, 1)");

        lineChart_3.height = 100;

        document.getElementById("submit-academic-year").addEventListener("click", function() {
          var academicYear = document.getElementById("select-academic-year").value;
          var semester = document.getElementById("select-semester").value;
          var college = document.getElementById("select-college").value;
          var semesterString;

          if (semester == 1) {
            semesterString = "First Semester";
          } else {
            semesterString = "Second Semester";
          }

          document.getElementById("academic-year-semester-header").innerHTML = "(" + academicYear + ") " + "(" + semesterString + ") " + "(" + college + ") ";

          var getTargetData = new XMLHttpRequest();
          getTargetData.open("POST", "get.target.data.php");
          getTargetData.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          getTargetData.send("academicyear=" + academicYear + "&semester=" + semester + "&college=" + college);
          getTargetData.onload = function() {
            var data = JSON.parse(this.responseText);

            targetChart.destroy();

            targetChart = new Chart(lineChart_3, {
              type: 'line',
              data: {
                defaultFontFamily: 'Poppins',
                labels: ["Research Presentation", "Institution Research Proposed/Produced/Completed", "Research Development Culture in the Academic", "Research Publication"],
                datasets: [{
                  label: "Target",
                  data: data[0],
                  borderColor: lineChart_3gradientStroke1,
                  borderWidth: "5",
                  backgroundColor: 'transparent',
                  pointBackgroundColor: 'rgba(248,62,62, 0.5)'
                }, {
                  label: "Accomplishment",
                  data: data[1],
                  borderColor: lineChart_3gradientStroke2,
                  borderWidth: "5",
                  backgroundColor: 'transparent',
                  pointBackgroundColor: 'rgba(219, 112, 147, 1)'
                }]
              },
              options: {
                legend: false,
                scales: {
                  yAxes: [{
                    ticks: {
                      beginAtZero: true,
                      stepSize: 10,
                      padding: 10
                    }
                  }],
                  xAxes: [{
                    ticks: {
                      padding: 5
                    }
                  }]
                }
              }
            });
          }
        });

        var academicYear = document.getElementById("select-academic-year").value;
        var semester = document.getElementById("select-semester").value;
        var college = document.getElementById("select-college").value;
        var semesterString;

        if (semester == 1) {
          semesterString = "First Semester";
        } else {
          semesterString = "Second Semester";
        }

        document.getElementById("academic-year-semester-header").innerHTML = "(" + academicYear + ") " + "(" + semesterString + ") " + "(" + college + ") ";

        var getTargetData = new XMLHttpRequest();
        getTargetData.open("POST", "get.target.data.php");
        getTargetData.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        getTargetData.send("academicyear=" + academicYear + "&semester=" + semester + "&college=" + college);
        getTargetData.onload = function() {
          var data = JSON.parse(this.responseText);

          targetChart = new Chart(lineChart_3, {
            type: 'line',
            data: {
              defaultFontFamily: 'Poppins',
              labels: ["Research Presentation", "Institution Research Proposed/Produced/Completed", "Research Development Culture in the Academic", "Research Publication"],
              datasets: [{
                label: "Target",
                data: data[0],
                borderColor: lineChart_3gradientStroke1,
                borderWidth: "5",
                backgroundColor: 'transparent',
                pointBackgroundColor: 'rgba(248,62,62, 0.5)'
              }, {
                label: "Accomplishment",
                data: data[1],
                borderColor: lineChart_3gradientStroke2,
                borderWidth: "5",
                backgroundColor: 'transparent',
                pointBackgroundColor: 'rgba(219, 112, 147, 1)'
              }]
            },
            options: {
              legend: false,
              scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero: true,
                    stepSize: 10,
                    padding: 10
                  }
                }],
                xAxes: [{
                  ticks: {
                    padding: 5
                  }
                }]
              }
            }
          });
        }
      }
    }

    const barChart_10 = document.getElementById("horizontal-bar-chart").getContext('2d');
    //generate gradient
    const barChart_10gradientStroke = barChart_10.createLinearGradient(0, 0, 0, 250);
    barChart_10gradientStroke.addColorStop(0, "rgba(248,186,186, 1)");
    barChart_10gradientStroke.addColorStop(1, "rgba(248,186,186, 1)");

    barChart_10.height = 100;

    new Chart(barChart_10, {
      type: 'bar',
      data: {
        defaultFontFamily: 'Poppins',
        labels: ['CICS', 'CABEIHM', 'CAS', 'CET', 'CONAHS', 'CTE'],
        datasets: [{
          label: "No. of Reserach Projects",
          data: <?php
                $labels = array('CICS', 'CABEIHM', 'CAS', 'CET', 'CONAHS', 'CTE');
                if (isset($_GET['filterType']) && $_GET['filterType'] == "quarter") {
                  if (isset($_GET['quarter']) && $_GET['quarter'] == "first") {
                    $yearFilter = $_GET['annual'];
                    if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                      $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM `research_topic` AS rt INNER JOIN college AS c ON rt.college_id = c.id WHERE MONTH(rt.dateAdded) BETWEEN 1 and 3 AND YEAR(rt.dateAdded) = '$yearFilter' GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6  END";
                    } else {
                      $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM `research_topic` AS rt INNER JOIN college AS c ON rt.college_id = c.id WHERE MONTH(rt.dateAdded) BETWEEN 1 and 3 GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                    }
                  } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "second") {
                    $yearFilter = $_GET['annual'];
                    if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                      $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM `research_topic` AS rt INNER JOIN college AS c ON rt.college_id = c.id WHERE MONTH(rt.dateAdded) BETWEEN 4 and 6 AND YEAR(rt.dateAdded) = '$yearFilter' GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                    } else {
                      $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM `research_topic` AS rt INNER JOIN college AS c ON rt.college_id = c.id WHERE MONTH(rt.rt.dateAdded) BETWEEN 4 and 6 GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                    }
                  } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "third") {
                    $yearFilter = $_GET['annual'];
                    if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                      $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM `research_topic` AS rt INNER JOIN college AS c ON rt.college_id = c.id WHERE MONTH(rt.dateAdded) BETWEEN 7 and 9 AND YEAR(rt.dateAdded) = '$yearFilter' GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                    } else {
                      $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM `research_topic` AS rt INNER JOIN college AS c ON rt.college_id = c.id WHERE MONTH(rt.dateAdded) BETWEEN 7 and 9 GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                    }
                  } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "fourth") {
                    $yearFilter = $_GET['annual'];
                    if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                      $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM `research_topic` AS rt INNER JOIN college AS c ON rt.college_id = c.id WHERE MONTH(rt.dateAdded) BETWEEN 10 and 12 AND YEAR(rt.dateAdded) = '$yearFilter' GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                    } else {
                      $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM `research_topic` AS rt INNER JOIN college AS c ON rt.college_id = c.id WHERE MONTH(rt.dateAdded) BETWEEN 10 and 12 GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                    }
                  } else {
                    $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM `research_topic` AS rt INNER JOIN college AS c ON rt.college_id = c.id GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                  }
                } elseif (isset($_GET['filterType']) && $_GET['filterType'] == "annual") {
                  if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                    $yearFilter = $_GET['annual'];
                    $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM `research_topic` AS rt INNER JOIN college AS c ON rt.college_id = c.id WHERE YEAR(rt.dateAdded) = '$yearFilter' GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                  } else {
                    $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM `research_topic` AS rt INNER JOIN college AS c ON rt.college_id = c.id GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                  }
                } else {
                  $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM `research_topic` AS rt INNER JOIN college AS c ON rt.college_id = c.id GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                }
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $data = [];
                foreach ($labels as $value) {
                  if (isset($row)) {
                    if ($value == $row['abbreviation_college']) {
                      $data[] = $row['total'];
                      $row = $result->fetch_assoc();
                    } else {
                      $data[] = 0;
                    }
                  } else {
                    $data[] = 0;
                  }
                }
                echo '[' . implode(', ', $data) . '],';
                ?>
          borderColor: barChart_10gradientStroke,
          borderWidth: "0",
          backgroundColor: barChart_10gradientStroke,
          hoverBackgroundColor: barChart_10gradientStroke
        }]
      },
      options: {
        legend: false,
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true,
              stepSize: 10,
            }
          }],
          xAxes: [{
            // Change here
            barPercentage: 0.5
          }]
        }
      }
    });


    // FACULTY RESEARCHER
    const barChart_2 = document.getElementById("barChart_2").getContext('2d');
    //generate gradient
    const barChart_2gradientStroke = barChart_2.createLinearGradient(0, 0, 0, 250);
    barChart_2gradientStroke.addColorStop(0, "rgba(248,186,186, 1)");
    barChart_2gradientStroke.addColorStop(1, "rgba(248,186,186, 1)");

    barChart_2.height = 100;

    new Chart(barChart_2, {
      type: 'bar',
      data: {
        defaultFontFamily: 'Poppins',
        labels: ['CICS', 'CABEIHM', 'CAS', 'CET', 'CONAHS', 'CTE'],
        datasets: [{
          label: "No. of Faculty Researcher",
          data: <?php
                $labels = array('CICS', 'CABEIHM', 'CAS', 'CET', 'CONAHS', 'CTE');
                if (isset($_GET['filterType']) && $_GET['filterType'] == "quarter") {
                  if (isset($_GET['quarter']) && $_GET['quarter'] == "first") {
                    $yearFilter = $_GET['annual'];
                    if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                      $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM research_topic AS rt INNER JOIN research_representatives AS rr ON rt.id = rr.research_topic_id INNER JOIN representative AS r ON rr.id = r.research_representatives_id INNER JOIN college AS c ON rt.college_id = c.id WHERE MONTH(rt.dateAdded) BETWEEN 1 and 3 AND YEAR(rt.dateAdded) = '$yearFilter' GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                    } else {
                      $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM research_topic AS rt INNER JOIN research_representatives AS rr ON rt.id = rr.research_topic_id INNER JOIN representative AS r ON rr.id = r.research_representatives_id INNER JOIN college AS c ON rt.college_id = c.id WHERE MONTH(rt.dateAdded) BETWEEN 1 and 3 GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                    }
                  } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "second") {
                    $yearFilter = $_GET['annual'];
                    if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                      $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM research_topic AS rt INNER JOIN research_representatives AS rr ON rt.id = rr.research_topic_id INNER JOIN representative AS r ON rr.id = r.research_representatives_id INNER JOIN college AS c ON rt.college_id = c.id WHERE MONTH(rt.dateAdded) BETWEEN 4 and 6 AND YEAR(rt.dateAdded) = '$yearFilter' GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                    } else {
                      $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM research_topic AS rt INNER JOIN research_representatives AS rr ON rt.id = rr.research_topic_id INNER JOIN representative AS r ON rr.id = r.research_representatives_id INNER JOIN college AS c ON rt.college_id = c.id WHERE MONTH(rt.dateAdded) BETWEEN 4 and 6 GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                    }
                  } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "third") {
                    $yearFilter = $_GET['annual'];
                    if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                      $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM research_topic AS rt INNER JOIN research_representatives AS rr ON rt.id = rr.research_topic_id INNER JOIN representative AS r ON rr.id = r.research_representatives_id INNER JOIN college AS c ON rt.college_id = c.id WHERE MONTH(rt.dateAdded) BETWEEN 7 and 9 AND YEAR(rt.dateAdded) = '$yearFilter' GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                    } else {
                      $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM research_topic AS rt INNER JOIN research_representatives AS rr ON rt.id = rr.research_topic_id INNER JOIN representative AS r ON rr.id = r.research_representatives_id INNER JOIN college AS c ON rt.college_id = c.id WHERE MONTH(rt.dateAdded) BETWEEN 7 and 9 GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                    }
                  } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "fourth") {
                    $yearFilter = $_GET['annual'];
                    if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                      $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM research_topic AS rt INNER JOIN research_representatives AS rr ON rt.id = rr.research_topic_id INNER JOIN representative AS r ON rr.id = r.research_representatives_id INNER JOIN college AS c ON rt.college_id = c.id WHERE MONTH(rt.dateAdded) BETWEEN 10 and 12 AND YEAR(rt.dateAdded) = '$yearFilter' GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                    } else {
                      $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM research_topic AS rt INNER JOIN research_representatives AS rr ON rt.id = rr.research_topic_id INNER JOIN representative AS r ON rr.id = r.research_representatives_id INNER JOIN college AS c ON rt.college_id = c.id WHERE MONTH(rt.dateAdded) BETWEEN 10 and 12 GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                    }
                  } else {
                    $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM research_topic AS rt INNER JOIN research_representatives AS rr ON rt.id = rr.research_topic_id INNER JOIN representative AS r ON rr.id = r.research_representatives_id INNER JOIN college AS c ON rt.college_id = c.id GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                  }
                } elseif (isset($_GET['filterType']) && $_GET['filterType'] == "annual") {
                  if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                    $yearFilter = $_GET['annual'];
                    $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM research_topic AS rt INNER JOIN research_representatives AS rr ON rt.id = rr.research_topic_id INNER JOIN representative AS r ON rr.id = r.research_representatives_id INNER JOIN college AS c ON rt.college_id = c.id WHERE YEAR(rt.dateAdded) = '$yearFilter' GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                  } else {
                    $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM research_topic AS rt INNER JOIN research_representatives AS rr ON rt.id = rr.research_topic_id INNER JOIN representative AS r ON rr.id = r.research_representatives_id INNER JOIN college AS c ON rt.college_id = c.id GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                  }
                } else {
                  $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM research_topic AS rt INNER JOIN research_representatives AS rr ON rt.id = rr.research_topic_id INNER JOIN representative AS r ON rr.id = r.research_representatives_id INNER JOIN college AS c ON rt.college_id = c.id GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                }
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $data = [];
                foreach ($labels as $value) {
                  if (isset($row)) {
                    if ($value == $row['abbreviation_college']) {
                      $data[] = $row['total'];
                      $row = $result->fetch_assoc();
                    } else {
                      $data[] = 0;
                    }
                  } else {
                    $data[] = 0;
                  }
                }
                echo '[' . implode(', ', $data) . '],';
                ?>

          borderColor: barChart_2gradientStroke,
          borderWidth: "0",
          backgroundColor: barChart_2gradientStroke,
          hoverBackgroundColor: barChart_2gradientStroke
        }]
      },
      options: {
        legend: false,
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true,
              stepSize: 20,

            }
          }],
          xAxes: [{
            // Change here
            barPercentage: 0.5
          }]
        }
      }
    });

    // CONFERENCES ATTENDED
    var areaChart2 = function() {
      //gradient area chart
      if (jQuery('#areaChart_2').length > 0) {
        const areaChart_2 = document.getElementById("areaChart_2").getContext('2d');
        //generate gradient
        const areaChart_2gradientStroke = areaChart_2.createLinearGradient(0, 1, 0, 500);
        areaChart_2gradientStroke.addColorStop(0, "rgba(248, 62, 62, 0.2)");
        areaChart_2gradientStroke.addColorStop(1, "rgba(248, 62, 62, 0)");

        areaChart_2.height = 100;

        new Chart(areaChart_2, {
          type: 'line',
          data: {
            defaultFontFamily: 'Poppins',
            labels: ['CICS', 'CABEIHM', 'CAS', 'CET', 'CONAHS', 'CTE'],
            datasets: [{
              label: "No. of Conferences Attended",
              data: <?php
                    $labels = array('CICS', 'CABEIHM', 'CAS', 'CET', 'CONAHS', 'CTE');
                    if (isset($_GET['filterType']) && $_GET['filterType'] == "quarter") {
                      if (isset($_GET['quarter']) && $_GET['quarter'] == "first") {
                        $yearFilter = $_GET['annual'];
                        if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                          $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `conferences` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id WHERE MONTH(con.dateAdded) BETWEEN 1 and 3 AND YEAR(con.dateAdded) = '$yearFilter' GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                        } else {
                          $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `conferences` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id WHERE MONTH(con.dateAdded) BETWEEN 1 and 3 GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                        }
                      } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "second") {
                        $yearFilter = $_GET['annual'];
                        if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                          $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `conferences` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id WHERE MONTH(con.dateAdded) BETWEEN 4 and 6 AND YEAR(con.dateAdded) = '$yearFilter' GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                        } else {
                          $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `conferences` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id WHERE MONTH(con.dateAdded) BETWEEN 4 and 6 GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                        }
                      } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "third") {
                        $yearFilter = $_GET['annual'];
                        if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                          $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `conferences` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id WHERE MONTH(con.dateAdded) BETWEEN 7 and 9 AND YEAR(con.dateAdded) = '$yearFilter' GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                        } else {
                          $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `conferences` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id WHERE MONTH(con.dateAdded) BETWEEN 7 and 9 GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                        }
                      } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "fourth") {
                        $yearFilter = $_GET['annual'];
                        if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                          $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `conferences` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id WHERE MONTH(con.dateAdded) BETWEEN 10 and 12 AND YEAR(con.dateAdded) = '$yearFilter' GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                        } else {
                          $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `conferences` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id WHERE MONTH(con.dateAdded) BETWEEN 10 and 12 GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                        }
                      } else {
                        $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `conferences` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                      }
                    } elseif (isset($_GET['filterType']) && $_GET['filterType'] == "annual") {
                      if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                        $yearFilter = $_GET['annual'];
                        $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `conferences` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id WHERE YEAR(con.dateAdded) = '$yearFilter' GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                      } else {
                        $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `conferences` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                      }
                    } else {
                      $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `conferences` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                    }
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $data = [];
                    foreach ($labels as $value) {
                      if (isset($row)) {
                        if ($value == $row['abbreviation_college']) {
                          $data[] = $row['total'];
                          $row = $result->fetch_assoc();
                        } else {
                          $data[] = 0;
                        }
                      } else {
                        $data[] = 0;
                      }
                    }
                    echo '[' . implode(', ', $data) . '],';
                    ?>

              borderColor: "#f83e3e",
              borderWidth: "4",
              backgroundColor: areaChart_2gradientStroke
            }]
          },
          options: {
            legend: false,
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true,
                  stepSize: 10,
                  padding: 5
                }
              }],
              xAxes: [{
                ticks: {
                  padding: 5
                }
              }]
            }
          }
        });
      }
    };

    // PUBLICATION
    var lineChart1 = function() {


      if (jQuery('#lineChart_1').length > 0) {


        //basic line chart
        const lineChart_1 = document.getElementById("lineChart_1").getContext('2d');
        const lineChart_1GradientStroke = lineChart_1.createLinearGradient(0, 1, 0, 500);
        lineChart_1GradientStroke.addColorStop(0, "rgba(248, 62, 62, 0.2)");
        lineChart_1GradientStroke.addColorStop(1, "rgba(248, 62, 62, 0)");


        lineChart_1.height = 100;

        new Chart(lineChart_1, {
          type: 'line',
          data: {
            defaultFontFamily: 'Poppins',
            labels: ['CICS', 'CABEIHM', 'CAS', 'CET', 'CONAHS', 'CTE'],
            datasets: [{
              label: "No. of Publication",
              data: <?php
                    $labels = array('CICS', 'CABEIHM', 'CAS', 'CET', 'CONAHS', 'CTE');
                    if (isset($_GET['filterType']) && $_GET['filterType'] == "quarter") {
                      if (isset($_GET['quarter']) && $_GET['quarter'] == "first") {
                        $yearFilter = $_GET['annual'];
                        if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                          $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `scw_` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id WHERE MONTH(con.dateAdded) BETWEEN 1 and 3 AND YEAR(con.dateAdded) = '$yearFilter' GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                        } else {
                          $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `scw_` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id WHERE MONTH(con.dateAdded) BETWEEN 1 and 3 GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                        }
                      } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "second") {
                        $yearFilter = $_GET['annual'];
                        if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                          $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `scw_` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id WHERE MONTH(con.dateAdded) BETWEEN 4 and 6 AND YEAR(con.dateAdded) = '$yearFilter' GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                        } else {
                          $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `scw_` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id WHERE MONTH(con.dateAdded) BETWEEN 4 and 6 GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                        }
                      } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "third") {
                        $yearFilter = $_GET['annual'];
                        if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                          $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `scw_` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id WHERE MONTH(con.dateAdded) BETWEEN 7 and 9 AND YEAR(con.dateAdded) = '$yearFilter' GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                        } else {
                          $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `scw_` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id WHERE MONTH(con.dateAdded) BETWEEN 7 and 9 GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                        }
                      } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "fourth") {
                        $yearFilter = $_GET['annual'];
                        if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                          $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `scw_` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id WHERE MONTH(con.dateAdded) BETWEEN 10 and 12 AND YEAR(con.dateAdded) = '$yearFilter' GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                        } else {
                          $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `scw_` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id WHERE MONTH(con.dateAdded) BETWEEN 10 and 12 GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                        }
                      } else {
                        $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `scw_` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                      }
                    } elseif (isset($_GET['filterType']) && $_GET['filterType'] == "annual") {
                      if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                        $yearFilter = $_GET['annual'];
                        $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `scw_` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id WHERE YEAR(con.dateAdded) = '$yearFilter' GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                      } else {
                        $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `scw_` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                      }
                    } else {
                      $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `scw_` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                    }
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $data = [];
                    foreach ($labels as $value) {
                      if (isset($row)) {
                        if ($value == $row['abbreviation_college']) {
                          $data[] = $row['total'];
                          $row = $result->fetch_assoc();
                        } else {
                          $data[] = 0;
                        }
                      } else {
                        $data[] = 0;
                      }
                    }
                    echo '[' . implode(', ', $data) . '],';
                    ?>

              borderColor: "#f83e3e",
              borderWidth: "4",
              backgroundColor: lineChart_1GradientStroke
              // pointBackgroundColor: 'rgba(248,62,62, 0)'
            }]
          },
          options: {
            legend: false,
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true,
                  stepSize: 10,
                  padding: 10
                }
              }],
              xAxes: [{
                ticks: {
                  padding: 5
                }
              }]
            }
          }
        });

      }

      // RND

      <?php
      $labels = array('CICS', 'CABEIHM', 'CAS', 'CET', 'CONAHS', 'CTE');
      if (isset($_GET['filterType']) && $_GET['filterType'] == "quarter") {
        if (isset($_GET['quarter']) && $_GET['quarter'] == "first") {
          $yearFilter = $_GET['annual'];
          if (isset($_GET['annual']) && $_GET['annual'] != "none") {
            $sql = "SELECT `c`.`abbreviation_college`, SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` INNER JOIN `college` AS `c` ON `rt`.`college_id` = `c`.`id` WHERE `rt`.`partnership` = 'Externaly Funded' AND MONTH(`rt`.`dateAdded`) BETWEEN 1 and 3 AND YEAR(`rt`.`dateAdded`) = '$yearFilter' GROUP BY `c`.`abbreviation_college` ORDER BY CASE WHEN `c`.`abbreviation_college` = 'CICS' THEN 1 WHEN `c`.`abbreviation_college` = 'CABEIHM' THEN 2 WHEN `c`.`abbreviation_college` = 'CAS' THEN 3 WHEN `c`.`abbreviation_college` = 'CET' THEN 4 WHEN `c`.`abbreviation_college` = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
            $sql2 = "SELECT `c`.`abbreviation_college`, SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` INNER JOIN `college` AS `c` ON `rt`.`college_id` = `c`.`id` WHERE `rt`.`partnership` = 'Institutionaly Funded' AND MONTH(`rt`.`dateAdded`) BETWEEN 1 and 3 AND YEAR(`rt`.`dateAdded`) = '$yearFilter' GROUP BY `c`.`abbreviation_college` ORDER BY CASE WHEN `c`.`abbreviation_college` = 'CICS' THEN 1 WHEN `c`.`abbreviation_college` = 'CABEIHM' THEN 2 WHEN `c`.`abbreviation_college` = 'CAS' THEN 3 WHEN `c`.`abbreviation_college` = 'CET' THEN 4 WHEN `c`.`abbreviation_college` = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
          } else {
            $sql = "SELECT `c`.`abbreviation_college`, SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` INNER JOIN `college` AS `c` ON `rt`.`college_id` = `c`.`id` WHERE `rt`.`partnership` = 'Externaly Funded' AND MONTH(`rt`.`dateAdded`) BETWEEN 1 and 3 GROUP BY `c`.`abbreviation_college` ORDER BY CASE WHEN `c`.`abbreviation_college` = 'CICS' THEN 1 WHEN `c`.`abbreviation_college` = 'CABEIHM' THEN 2 WHEN `c`.`abbreviation_college` = 'CAS' THEN 3 WHEN `c`.`abbreviation_college` = 'CET' THEN 4 WHEN `c`.`abbreviation_college` = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
            $sql2 = "SELECT `c`.`abbreviation_college`, SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` INNER JOIN `college` AS `c` ON `rt`.`college_id` = `c`.`id` WHERE `rt`.`partnership` = 'Institutionaly Funded' AND MONTH(`rt`.`dateAdded`) BETWEEN 1 and 3 GROUP BY `c`.`abbreviation_college` ORDER BY CASE WHEN `c`.`abbreviation_college` = 'CICS' THEN 1 WHEN `c`.`abbreviation_college` = 'CABEIHM' THEN 2 WHEN `c`.`abbreviation_college` = 'CAS' THEN 3 WHEN `c`.`abbreviation_college` = 'CET' THEN 4 WHEN `c`.`abbreviation_college` = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
          }
        } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "second") {
          $yearFilter = $_GET['annual'];
          if (isset($_GET['annual']) && $_GET['annual'] != "none") {
            $sql = "SELECT `c`.`abbreviation_college`, SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` INNER JOIN `college` AS `c` ON `rt`.`college_id` = `c`.`id` WHERE `rt`.`partnership` = 'Externaly Funded' AND MONTH(`rt`.`dateAdded`) BETWEEN 4 and 6 AND YEAR(`rt`.`dateAdded`) = '$yearFilter' GROUP BY `c`.`abbreviation_college` ORDER BY CASE WHEN `c`.`abbreviation_college` = 'CICS' THEN 1 WHEN `c`.`abbreviation_college` = 'CABEIHM' THEN 2 WHEN `c`.`abbreviation_college` = 'CAS' THEN 3 WHEN `c`.`abbreviation_college` = 'CET' THEN 4 WHEN `c`.`abbreviation_college` = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
            $sql2 = "SELECT `c`.`abbreviation_college`, SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` INNER JOIN `college` AS `c` ON `rt`.`college_id` = `c`.`id` WHERE `rt`.`partnership` = 'Institutionaly Funded' AND MONTH(`rt`.`dateAdded`) BETWEEN 4 and 6 AND YEAR(`rt`.`dateAdded`) = '$yearFilter' GROUP BY `c`.`abbreviation_college` ORDER BY CASE WHEN `c`.`abbreviation_college` = 'CICS' THEN 1 WHEN `c`.`abbreviation_college` = 'CABEIHM' THEN 2 WHEN `c`.`abbreviation_college` = 'CAS' THEN 3 WHEN `c`.`abbreviation_college` = 'CET' THEN 4 WHEN `c`.`abbreviation_college` = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
          } else {
            $sql = "SELECT `c`.`abbreviation_college`, SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` INNER JOIN `college` AS `c` ON `rt`.`college_id` = `c`.`id` WHERE `rt`.`partnership` = 'Externaly Funded' AND MONTH(`rt`.`dateAdded`) BETWEEN 4 and 6 GROUP BY `c`.`abbreviation_college` ORDER BY CASE WHEN `c`.`abbreviation_college` = 'CICS' THEN 1 WHEN `c`.`abbreviation_college` = 'CABEIHM' THEN 2 WHEN `c`.`abbreviation_college` = 'CAS' THEN 3 WHEN `c`.`abbreviation_college` = 'CET' THEN 4 WHEN `c`.`abbreviation_college` = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
            $sql2 = "SELECT `c`.`abbreviation_college`, SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` INNER JOIN `college` AS `c` ON `rt`.`college_id` = `c`.`id` WHERE `rt`.`partnership` = 'Institutionaly Funded' AND MONTH(`rt`.`dateAdded`) BETWEEN 4 and 6 GROUP BY `c`.`abbreviation_college` ORDER BY CASE WHEN `c`.`abbreviation_college` = 'CICS' THEN 1 WHEN `c`.`abbreviation_college` = 'CABEIHM' THEN 2 WHEN `c`.`abbreviation_college` = 'CAS' THEN 3 WHEN `c`.`abbreviation_college` = 'CET' THEN 4 WHEN `c`.`abbreviation_college` = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
          }
        } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "third") {
          $yearFilter = $_GET['annual'];
          if (isset($_GET['annual']) && $_GET['annual'] != "none") {
            $sql = "SELECT `c`.`abbreviation_college`, SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` INNER JOIN `college` AS `c` ON `rt`.`college_id` = `c`.`id` WHERE `rt`.`partnership` = 'Externaly Funded' AND MONTH(`rt`.`dateAdded`) BETWEEN 7 and 9 AND YEAR(`rt`.`dateAdded`) = '$yearFilter' GROUP BY `c`.`abbreviation_college` ORDER BY CASE WHEN `c`.`abbreviation_college` = 'CICS' THEN 1 WHEN `c`.`abbreviation_college` = 'CABEIHM' THEN 2 WHEN `c`.`abbreviation_college` = 'CAS' THEN 3 WHEN `c`.`abbreviation_college` = 'CET' THEN 4 WHEN `c`.`abbreviation_college` = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
            $sql2 = "SELECT `c`.`abbreviation_college`, SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` INNER JOIN `college` AS `c` ON `rt`.`college_id` = `c`.`id` WHERE `rt`.`partnership` = 'Institutionaly Funded' AND MONTH(`rt`.`dateAdded`) BETWEEN 7 and 9 AND YEAR(`rt`.`dateAdded`) = '$yearFilter' GROUP BY `c`.`abbreviation_college` ORDER BY CASE WHEN `c`.`abbreviation_college` = 'CICS' THEN 1 WHEN `c`.`abbreviation_college` = 'CABEIHM' THEN 2 WHEN `c`.`abbreviation_college` = 'CAS' THEN 3 WHEN `c`.`abbreviation_college` = 'CET' THEN 4 WHEN `c`.`abbreviation_college` = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
          } else {
            $sql = "SELECT `c`.`abbreviation_college`, SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` INNER JOIN `college` AS `c` ON `rt`.`college_id` = `c`.`id` WHERE `rt`.`partnership` = 'Externaly Funded' AND MONTH(`rt`.`dateAdded`) BETWEEN 7 and 9 GROUP BY `c`.`abbreviation_college` ORDER BY CASE WHEN `c`.`abbreviation_college` = 'CICS' THEN 1 WHEN `c`.`abbreviation_college` = 'CABEIHM' THEN 2 WHEN `c`.`abbreviation_college` = 'CAS' THEN 3 WHEN `c`.`abbreviation_college` = 'CET' THEN 4 WHEN `c`.`abbreviation_college` = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
            $sql2 = "SELECT `c`.`abbreviation_college`, SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` INNER JOIN `college` AS `c` ON `rt`.`college_id` = `c`.`id` WHERE `rt`.`partnership` = 'Institutionaly Funded' AND MONTH(`rt`.`dateAdded`) BETWEEN 7 and 9 GROUP BY `c`.`abbreviation_college` ORDER BY CASE WHEN `c`.`abbreviation_college` = 'CICS' THEN 1 WHEN `c`.`abbreviation_college` = 'CABEIHM' THEN 2 WHEN `c`.`abbreviation_college` = 'CAS' THEN 3 WHEN `c`.`abbreviation_college` = 'CET' THEN 4 WHEN `c`.`abbreviation_college` = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
          }
        } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "fourth") {
          $yearFilter = $_GET['annual'];
          if (isset($_GET['annual']) && $_GET['annual'] != "none") {
            $sql = "SELECT `c`.`abbreviation_college`, SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` INNER JOIN `college` AS `c` ON `rt`.`college_id` = `c`.`id` WHERE `rt`.`partnership` = 'Externaly Funded' AND MONTH(`rt`.`dateAdded`) BETWEEN 10 and 12 AND YEAR(`rt`.`dateAdded`) = '$yearFilter' GROUP BY `c`.`abbreviation_college` ORDER BY CASE WHEN `c`.`abbreviation_college` = 'CICS' THEN 1 WHEN `c`.`abbreviation_college` = 'CABEIHM' THEN 2 WHEN `c`.`abbreviation_college` = 'CAS' THEN 3 WHEN `c`.`abbreviation_college` = 'CET' THEN 4 WHEN `c`.`abbreviation_college` = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
            $sql2 = "SELECT `c`.`abbreviation_college`, SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` INNER JOIN `college` AS `c` ON `rt`.`college_id` = `c`.`id` WHERE `rt`.`partnership` = 'Institutionaly Funded' AND MONTH(`rt`.`dateAdded`) BETWEEN 10 and 12 AND YEAR(`rt`.`dateAdded`) = '$yearFilter' GROUP BY `c`.`abbreviation_college` ORDER BY CASE WHEN `c`.`abbreviation_college` = 'CICS' THEN 1 WHEN `c`.`abbreviation_college` = 'CABEIHM' THEN 2 WHEN `c`.`abbreviation_college` = 'CAS' THEN 3 WHEN `c`.`abbreviation_college` = 'CET' THEN 4 WHEN `c`.`abbreviation_college` = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
          } else {
            $sql = "SELECT `c`.`abbreviation_college`, SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` INNER JOIN `college` AS `c` ON `rt`.`college_id` = `c`.`id` WHERE `rt`.`partnership` = 'Externaly Funded' AND MONTH(`rt`.`dateAdded`) BETWEEN 10 and 12 GROUP BY `c`.`abbreviation_college` ORDER BY CASE WHEN `c`.`abbreviation_college` = 'CICS' THEN 1 WHEN `c`.`abbreviation_college` = 'CABEIHM' THEN 2 WHEN `c`.`abbreviation_college` = 'CAS' THEN 3 WHEN `c`.`abbreviation_college` = 'CET' THEN 4 WHEN `c`.`abbreviation_college` = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
            $sql2 = "SELECT `c`.`abbreviation_college`, SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` INNER JOIN `college` AS `c` ON `rt`.`college_id` = `c`.`id` WHERE `rt`.`partnership` = 'Institutionaly Funded' AND MONTH(`rt`.`dateAdded`) BETWEEN 10 and 12 GROUP BY `c`.`abbreviation_college` ORDER BY CASE WHEN `c`.`abbreviation_college` = 'CICS' THEN 1 WHEN `c`.`abbreviation_college` = 'CABEIHM' THEN 2 WHEN `c`.`abbreviation_college` = 'CAS' THEN 3 WHEN `c`.`abbreviation_college` = 'CET' THEN 4 WHEN `c`.`abbreviation_college` = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
          }
        } else {
          $sql = "SELECT `c`.`abbreviation_college`, SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` INNER JOIN `college` AS `c` ON `rt`.`college_id` = `c`.`id` WHERE `rt`.`partnership` = 'Externaly Funded' GROUP BY `c`.`abbreviation_college` ORDER BY CASE WHEN `c`.`abbreviation_college` = 'CICS' THEN 1 WHEN `c`.`abbreviation_college` = 'CABEIHM' THEN 2 WHEN `c`.`abbreviation_college` = 'CAS' THEN 3 WHEN `c`.`abbreviation_college` = 'CET' THEN 4 WHEN `c`.`abbreviation_college` = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
          $sql2 = "SELECT `c`.`abbreviation_college`, SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` INNER JOIN `college` AS `c` ON `rt`.`college_id` = `c`.`id` WHERE `rt`.`partnership` = 'Institutionaly Funded' GROUP BY `c`.`abbreviation_college` ORDER BY CASE WHEN `c`.`abbreviation_college` = 'CICS' THEN 1 WHEN `c`.`abbreviation_college` = 'CABEIHM' THEN 2 WHEN `c`.`abbreviation_college` = 'CAS' THEN 3 WHEN `c`.`abbreviation_college` = 'CET' THEN 4 WHEN `c`.`abbreviation_college` = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
        }
      } elseif (isset($_GET['filterType']) && $_GET['filterType'] == "annual") {
        if (isset($_GET['annual']) && $_GET['annual'] != "none") {
          $yearFilter = $_GET['annual'];
          $sql = "SELECT `c`.`abbreviation_college`, SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` INNER JOIN `college` AS `c` ON `rt`.`college_id` = `c`.`id` WHERE `rt`.`partnership` = 'Externaly Funded' AND YEAR(`rt`.`dateAdded`) = '$yearFilter' GROUP BY `c`.`abbreviation_college` ORDER BY CASE WHEN `c`.`abbreviation_college` = 'CICS' THEN 1 WHEN `c`.`abbreviation_college` = 'CABEIHM' THEN 2 WHEN `c`.`abbreviation_college` = 'CAS' THEN 3 WHEN `c`.`abbreviation_college` = 'CET' THEN 4 WHEN `c`.`abbreviation_college` = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
          $sql2 = "SELECT `c`.`abbreviation_college`, SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` INNER JOIN `college` AS `c` ON `rt`.`college_id` = `c`.`id` WHERE `rt`.`partnership` = 'Institutionaly Funded' AND YEAR(`rt`.`dateAdded`) = '$yearFilter' GROUP BY `c`.`abbreviation_college` ORDER BY CASE WHEN `c`.`abbreviation_college` = 'CICS' THEN 1 WHEN `c`.`abbreviation_college` = 'CABEIHM' THEN 2 WHEN `c`.`abbreviation_college` = 'CAS' THEN 3 WHEN `c`.`abbreviation_college` = 'CET' THEN 4 WHEN `c`.`abbreviation_college` = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
        } else {
          $sql = "SELECT `c`.`abbreviation_college`, SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` INNER JOIN `college` AS `c` ON `rt`.`college_id` = `c`.`id` WHERE `rt`.`partnership` = 'Externaly Funded' GROUP BY `c`.`abbreviation_college` ORDER BY CASE WHEN `c`.`abbreviation_college` = 'CICS' THEN 1 WHEN `c`.`abbreviation_college` = 'CABEIHM' THEN 2 WHEN `c`.`abbreviation_college` = 'CAS' THEN 3 WHEN `c`.`abbreviation_college` = 'CET' THEN 4 WHEN `c`.`abbreviation_college` = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
          $sql2 = "SELECT `c`.`abbreviation_college`, SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` INNER JOIN `college` AS `c` ON `rt`.`college_id` = `c`.`id` WHERE `rt`.`partnership` = 'Institutionaly Funded' GROUP BY `c`.`abbreviation_college` ORDER BY CASE WHEN `c`.`abbreviation_college` = 'CICS' THEN 1 WHEN `c`.`abbreviation_college` = 'CABEIHM' THEN 2 WHEN `c`.`abbreviation_college` = 'CAS' THEN 3 WHEN `c`.`abbreviation_college` = 'CET' THEN 4 WHEN `c`.`abbreviation_college` = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
        }
      } else {
        $sql = "SELECT `c`.`abbreviation_college`, SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` INNER JOIN `college` AS `c` ON `rt`.`college_id` = `c`.`id` WHERE `rt`.`partnership` = 'Externaly Funded' GROUP BY `c`.`abbreviation_college` ORDER BY CASE WHEN `c`.`abbreviation_college` = 'CICS' THEN 1 WHEN `c`.`abbreviation_college` = 'CABEIHM' THEN 2 WHEN `c`.`abbreviation_college` = 'CAS' THEN 3 WHEN `c`.`abbreviation_college` = 'CET' THEN 4 WHEN `c`.`abbreviation_college` = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
        $sql2 = "SELECT `c`.`abbreviation_college`, SUM(`e`.`quantity` * `e`.`unit_cost`) AS `total` FROM `research_topic` AS `rt` INNER JOIN `expenses` AS `e` ON `rt`.`id` = `e`.`research_topic_id` INNER JOIN `college` AS `c` ON `rt`.`college_id` = `c`.`id` WHERE `rt`.`partnership` = 'Institutionaly Funded' GROUP BY `c`.`abbreviation_college` ORDER BY CASE WHEN `c`.`abbreviation_college` = 'CICS' THEN 1 WHEN `c`.`abbreviation_college` = 'CABEIHM' THEN 2 WHEN `c`.`abbreviation_college` = 'CAS' THEN 3 WHEN `c`.`abbreviation_college` = 'CET' THEN 4 WHEN `c`.`abbreviation_college` = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
      }

      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $data = [];
      foreach ($labels as $value) {
        if (isset($row)) {
          if ($value == $row['abbreviation_college']) {
            $data[] = $row['total'];
            $row = $result->fetch_assoc();
          } else {
            $data[] = 0;
          }
        } else {
          $data[] = 0;
        }
      }
      $externalyFunded = '[' . implode(', ', $data) . '],';

      $result = $conn->query($sql2);
      $row = $result->fetch_assoc();
      $data = [];
      foreach ($labels as $value) {
        if (isset($row)) {
          if ($value == $row['abbreviation_college']) {
            $data[] = $row['total'];
            $row = $result->fetch_assoc();
          } else {
            $data[] = 0;
          }
        } else {
          $data[] = 0;
        }
      }
      $institutionalyFunded = '[' . implode(', ', $data) . '],';
      ?>

      new Chartist.Bar('#rnd-chart', {
        defaultFontFamily: 'Poppins',
        labels: ['CICS', 'CABEIHM', 'CAS', 'CET', 'CONAHS', 'CTE'],
        series: [
          <?= $externalyFunded ?>
          <?= $institutionalyFunded ?>
        ]
      }, {
        seriesBarDistance: 10,
        axisX: {
          offset: 10
        },
        axisY: {
          offset: 50,
          labelInterpolationFnc: function(value) {
            return '₱' + value
          },
          scaleMinSpace: 15
        },
        plugins: [
          Chartist.plugins.tooltip()
        ]
      });


      // COMPLETED RESEARCH PROJECT
      if (jQuery('#lineChartComResPerYear').length > 0) {


        //basic line chart
        const lineChartComResPerYear = document.getElementById("lineChartComResPerYear").getContext('2d');

        lineChartComResPerYear.height = 100;

        new Chart(lineChartComResPerYear, {
          type: 'line',
          data: {
            defaultFontFamily: 'Poppins',
            labels: ['CICS', 'CABEIHM', 'CAS', 'CET', 'CONAHS', 'CTE'],
            datasets: [{
              label: 'No. of Completed Research Projects',
              data: <?php
                    $labels = array('CICS', 'CABEIHM', 'CAS', 'CET', 'CONAHS', 'CTE');
                    if (isset($_GET['filterType']) && $_GET['filterType'] == "quarter") {
                      if (isset($_GET['quarter']) && $_GET['quarter'] == "first") {
                        $yearFilter = $_GET['annual'];
                        if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                          $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM `research_topic` AS rt INNER JOIN college AS c ON rt.college_id = c.id WHERE rt.status = 'Completed' AND MONTH(rt.dateAdded) BETWEEN 1 and 3 AND YEAR(rt.dateAdded) = '$yearFilter' GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                        } else {
                          $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM `research_topic` AS rt INNER JOIN college AS c ON rt.college_id = c.id WHERE rt.status = 'Completed' AND MONTH(rt.dateAdded) BETWEEN 1 and 3 GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                        }
                      } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "second") {
                        $yearFilter = $_GET['annual'];
                        if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                          $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM `research_topic` AS rt INNER JOIN college AS c ON rt.college_id = c.id WHERE rt.status = 'Completed' AND MONTH(rt.dateAdded) BETWEEN 4 and 6 AND YEAR(rt.dateAdded) = '$yearFilter' GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                        } else {
                          $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM `research_topic` AS rt INNER JOIN college AS c ON rt.college_id = c.id WHERE rt.status = 'Completed' AND MONTH(rt.dateAdded) BETWEEN 4 and 6 GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                        }
                      } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "third") {
                        $yearFilter = $_GET['annual'];
                        if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                          $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM `research_topic` AS rt INNER JOIN college AS c ON rt.college_id = c.id WHERE rt.status = 'Completed' AND MONTH(rt.dateAdded) BETWEEN 7 and 9 AND YEAR(rt.dateAdded) = '$yearFilter' GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                        } else {
                          $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM `research_topic` AS rt INNER JOIN college AS c ON rt.college_id = c.id WHERE rt.status = 'Completed' AND MONTH(rt.dateAdded) BETWEEN 7 and 9 GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                        }
                      } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "fourth") {
                        $yearFilter = $_GET['annual'];
                        if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                          $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM `research_topic` AS rt INNER JOIN college AS c ON rt.college_id = c.id WHERE rt.status = 'Completed' AND MONTH(rt.dateAdded) BETWEEN 10 and 12 AND YEAR(rt.dateAdded) = '$yearFilter' GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                        } else {
                          $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM `research_topic` AS rt INNER JOIN college AS c ON rt.college_id = c.id WHERE rt.status = 'Completed' AND MONTH(rt.dateAdded) BETWEEN 10 and 12 GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                        }
                      } else {
                        $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM `research_topic` AS rt INNER JOIN college AS c ON rt.college_id = c.id WHERE rt.status = 'Completed' GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                      }
                    } elseif (isset($_GET['filterType']) && $_GET['filterType'] == "annual") {
                      if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                        $yearFilter = $_GET['annual'];
                        $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM `research_topic` AS rt INNER JOIN college AS c ON rt.college_id = c.id WHERE rt.status = 'Completed' AND YEAR(rt.dateAdded) = '$yearFilter' GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                      } else {
                        $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM `research_topic` AS rt INNER JOIN college AS c ON rt.college_id = c.id WHERE rt.status = 'Completed' GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                      }
                    } else {
                      $sql = "SELECT c.abbreviation_college, COUNT(*) AS total FROM `research_topic` AS rt INNER JOIN college AS c ON rt.college_id = c.id WHERE rt.status = 'Completed' GROUP BY c.abbreviation_college ORDER BY CASE WHEN c.abbreviation_college = 'CICS' THEN 1 WHEN c.abbreviation_college = 'CABEIHM' THEN 2 WHEN c.abbreviation_college = 'CAS' THEN 3 WHEN c.abbreviation_college = 'CET' THEN 4 WHEN c.abbreviation_college = 'CONAHS' THEN 5 WHEN c.abbreviation_college = 'CTE' THEN 6 END";
                    }
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $data = [];
                    foreach ($labels as $value) {
                      if (isset($row)) {
                        if ($value == $row['abbreviation_college']) {
                          $data[] = $row['total'];
                          $row = $result->fetch_assoc();
                        } else {
                          $data[] = 0;
                        }
                      } else {
                        $data[] = 0;
                      }
                    }
                    echo '[' . implode(', ', $data) . '],';
                    ?>
              borderColor: 'rgba(219, 112, 147, 1)',
              borderWidth: "4",
              backgroundColor: 'rgba(219, 112, 147, 0.2)',
              pointBackgroundColor: 'rgba(219, 112, 147, 0)'
            }]
          },
          options: {
            legend: false,
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true,
                  stepSize: 10,
                  padding: 10
                }
              }],
              xAxes: [{
                ticks: {
                  padding: 5
                }
              }]
            }
          }
        });

      }
    };

    // INVENTIONS
    var barChart1 = function() {
      if (jQuery('#barChart_1').length > 0) {
        const barChart_1 = document.getElementById("barChart_1").getContext('2d');

        barChart_1.height = 100;

        new Chart(barChart_1, {
          type: 'bar',
          data: {
            defaultFontFamily: 'Poppins',
            labels: ['CICS', 'CABEIHM', 'CAS', 'CET', 'CONAHS', 'CTE'],
            datasets: [{
              label: "No. of Inventions",
              data: <?php
                    $labels = array('CICS', 'CABEIHM', 'CAS', 'CET', 'CONAHS', 'CTE');
                    if (isset($_GET['filterType']) && $_GET['filterType'] == "quarter") {
                      if (isset($_GET['quarter']) && $_GET['quarter'] == "first") {
                        $yearFilter = $_GET['annual'];
                        if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                          $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `inventions` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id WHERE MONTH(con.dateAdded) BETWEEN 1 and 3 AND YEAR(con.dateAdded) = '$yearFilter' GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                        } else {
                          $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `inventions` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id WHERE MONTH(con.dateAdded) BETWEEN 1 and 3 GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                        }
                      } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "second") {
                        $yearFilter = $_GET['annual'];
                        if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                          $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `inventions` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id WHERE MONTH(con.dateAdded) BETWEEN 4 and 6 AND YEAR(con.dateAdded) = '$yearFilter' GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                        } else {
                          $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `inventions` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id WHERE MONTH(con.dateAdded) BETWEEN 4 and 6 GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                        }
                      } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "third") {
                        $yearFilter = $_GET['annual'];
                        if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                          $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `inventions` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id WHERE MONTH(con.dateAdded) BETWEEN 7 and 9 AND YEAR(con.dateAdded) = '$yearFilter' GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                        } else {
                          $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `inventions` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id WHERE MONTH(con.dateAdded) BETWEEN 7 and 9 GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                        }
                      } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "fourth") {
                        $yearFilter = $_GET['annual'];
                        if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                          $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `inventions` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id WHERE MONTH(con.dateAdded) BETWEEN 10 and 12 AND YEAR(con.dateAdded) = '$yearFilter' GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                        } else {
                          $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `inventions` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id WHERE MONTH(con.dateAdded) BETWEEN 10 and 12 GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                        }
                      } else {
                        $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `inventions` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                      }
                    } elseif (isset($_GET['filterType']) && $_GET['filterType'] == "annual") {
                      if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                        $yearFilter = $_GET['annual'];
                        $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `inventions` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id WHERE YEAR(con.dateAdded) = '$yearFilter' GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                      } else {
                        $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `inventions` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                      }
                    } else {
                      $sql = "SELECT col.abbreviation_college, COUNT(*) AS total FROM `inventions` AS con INNER JOIN faculty_user AS fu ON con.added_by = fu.id INNER JOIN college AS col ON fu.college_id = col.id GROUP BY col.abbreviation_college ORDER BY CASE WHEN col.abbreviation_college = 'CICS' THEN 1 WHEN col.abbreviation_college = 'CABEIHM' THEN 2 WHEN col.abbreviation_college = 'CAS' THEN 3 WHEN col.abbreviation_college = 'CET' THEN 4 WHEN col.abbreviation_college = 'CONAHS' THEN 5 END";
                    }
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $data = [];
                    foreach ($labels as $value) {
                      if (isset($row)) {
                        if ($value == $row['abbreviation_college']) {
                          $data[] = $row['total'];
                          $row = $result->fetch_assoc();
                        } else {
                          $data[] = 0;
                        }
                      } else {
                        $data[] = 0;
                      }
                    }
                    echo '[' . implode(', ', $data) . '],';
                    ?>
              borderColor: '#e79f31',
              borderWidth: "0",
              backgroundColor: 'rgba(231,159,49, 1)'
            }]
          },
          options: {
            legend: false,
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true,
                  stepSize: 10, // Set stepSize to 1 to display only integer values on the y-axis
                }
              }],
              xAxes: [{
                barPercentage: 0.5
              }]
            }
          }
        });
      }
    }


    // ONGOING RESEARCH PROJECT

    var donutChart = function() {
      Morris.Donut({
        element: 'morris_donught',
        data: [{
          label: "\xa0 \xa0 Total Research Projects \xa0 \xa0",
          value: <?php
                  if (isset($_GET['filterType']) && $_GET['filterType'] == "quarter") {
                    if (isset($_GET['quarter']) && $_GET['quarter'] == "first") {
                      $yearFilter = $_GET['annual'];
                      if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                        $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 1 and 3 AND YEAR(dateAdded) = '$yearFilter'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();

                        $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Ongoing' AND MONTH(dateAdded) BETWEEN 1 and 3 AND YEAR(dateAdded) = '$yearFilter'";
                        $result = $conn->query($sql);
                        $row2 = $result->fetch_assoc();
                      } else {
                        $college = $_SESSION['college'];
                        $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 1 and 3";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();

                        $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Ongoing' AND MONTH(dateAdded) BETWEEN 1 and 3";
                        $result = $conn->query($sql);
                        $row2 = $result->fetch_assoc();
                      }
                    } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "second") {
                      $yearFilter = $_GET['annual'];
                      if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                        $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 4 and 6 AND YEAR(dateAdded) = '$yearFilter'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();

                        $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Ongoing' AND MONTH(dateAdded) BETWEEN 4 and 6 AND YEAR(dateAdded) = '$yearFilter'";
                        $result = $conn->query($sql);
                        $row2 = $result->fetch_assoc();
                      } else {
                        $college = $_SESSION['college'];
                        $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 4 and 6";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();

                        $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Ongoing' AND MONTH(dateAdded) BETWEEN 4 and 6";
                        $result = $conn->query($sql);
                        $row2 = $result->fetch_assoc();
                      }
                    } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "third") {
                      $yearFilter = $_GET['annual'];
                      if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                        $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 7 and 9 AND YEAR(dateAdded) = '$yearFilter'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();

                        $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Ongoing' AND MONTH(dateAdded) BETWEEN 7 and 9 AND YEAR(dateAdded) = '$yearFilter'";
                        $result = $conn->query($sql);
                        $row2 = $result->fetch_assoc();
                      } else {
                        $college = $_SESSION['college'];
                        $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 7 and 9";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();

                        $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Ongoing' AND MONTH(dateAdded) BETWEEN 7 and 9";
                        $result = $conn->query($sql);
                        $row2 = $result->fetch_assoc();
                      }
                    } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "fourth") {
                      $yearFilter = $_GET['annual'];
                      if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                        $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 10 and 12 AND YEAR(dateAdded) = '$yearFilter'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();

                        $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Ongoing' AND MONTH(dateAdded) BETWEEN 10 and 12 AND YEAR(dateAdded) = '$yearFilter'";
                        $result = $conn->query($sql);
                        $row2 = $result->fetch_assoc();
                      } else {
                        $college = $_SESSION['college'];
                        $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 10 and 12";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();

                        $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Ongoing' AND MONTH(dateAdded) BETWEEN 10 and 12";
                        $result = $conn->query($sql);
                        $row2 = $result->fetch_assoc();
                      }
                    } else {
                      $sql = "SELECT COUNT(*) AS `total` FROM `research_topic`";
                      $result = $conn->query($sql);
                      $row = $result->fetch_assoc();

                      $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Ongoing'";
                      $result = $conn->query($sql);
                      $row2 = $result->fetch_assoc();
                    }
                  } elseif (isset($_GET['filterType']) && $_GET['filterType'] == "annual") {
                    if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                      $yearFilter = $_GET['annual'];

                      $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE YEAR(dateAdded) = '$yearFilter'";
                      $result = $conn->query($sql);
                      $row = $result->fetch_assoc();

                      $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Ongoing' AND YEAR(dateAdded) = '$yearFilter'";
                      $result = $conn->query($sql);
                      $row2 = $result->fetch_assoc();
                    } else {
                      $sql = "SELECT COUNT(*) AS `total` FROM `research_topic`";
                      $result = $conn->query($sql);
                      $row = $result->fetch_assoc();

                      $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Ongoing'";
                      $result = $conn->query($sql);
                      $row2 = $result->fetch_assoc();
                    }
                  } else {
                    $sql = "SELECT COUNT(*) AS `total` FROM `research_topic`";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();

                    $sql = "SELECT COUNT(*) AS `total` FROM `research_topic` WHERE `status` = 'Ongoing'";
                    $result = $conn->query($sql);
                    $row2 = $result->fetch_assoc();
                  }
                  echo $row['total']
                  ?>,

        }, {
          label: "\xa0 \xa0 Ongoing Research Project \xa0 \xa0",
          value: <?php
                  echo $row2['total'];
                  ?>
        }],
        resize: true,
        redraw: true,
        colors: ['#F83E3E', '#DB7093'],
        //responsive:true,

      });
    }

    var revenueMap = function() {}

    var emailchart = function() {
      var options = {
        labels: ['Approved with notice to proceed', 'Completed', 'For Evaluation', 'Ongoing'],
        series: <?php
                $labels = array('Approved With Notice to Proceed', 'Completed', 'For Evaluation', 'Ongoing');
                if (isset($_GET['filterType']) && $_GET['filterType'] == "quarter") {
                  if (isset($_GET['quarter']) && $_GET['quarter'] == "first") {
                    $yearFilter = $_GET['annual'];
                    if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                      $sql = "SELECT COUNT(*) AS `total`, `status` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 1 and 3 AND YEAR(dateAdded) = '$yearFilter' GROUP BY `status` ORDER BY `status`";
                    } else {
                      $sql = "SELECT COUNT(*) AS `total`, `status` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 1 and 3 GROUP BY `status` ORDER BY `status`";
                    }
                  } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "second") {
                    $yearFilter = $_GET['annual'];
                    if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                      $sql = "SELECT COUNT(*) AS `total`, `status` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 4 and 6 AND YEAR(dateAdded) = '$yearFilter' GROUP BY `status` ORDER BY `status`";
                    } else {
                      $sql = "SELECT COUNT(*) AS `total`, `status` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 4 and 6 GROUP BY `status` ORDER BY `status`";
                    }
                  } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "third") {
                    $yearFilter = $_GET['annual'];
                    if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                      $sql = "SELECT COUNT(*) AS `total`, `status` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 7 and 9 AND YEAR(dateAdded) = '$yearFilter' GROUP BY `status` ORDER BY `status`";
                    } else {
                      $sql = "SELECT COUNT(*) AS `total`, `status` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 7 and 9 GROUP BY `status` ORDER BY `status`";
                    }
                  } elseif (isset($_GET['quarter']) && $_GET['quarter'] == "fourth") {
                    $yearFilter = $_GET['annual'];
                    if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                      $sql = "SELECT COUNT(*) AS `total`, `status` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 10 and 12 AND YEAR(dateAdded) = '$yearFilter' GROUP BY `status` ORDER BY `status`";
                    } else {
                      $sql = "SELECT COUNT(*) AS `total`, `status` FROM `research_topic` WHERE MONTH(dateAdded) BETWEEN 10 and 12 GROUP BY `status` ORDER BY `status`";
                    }
                  } else {
                    $sql = "SELECT COUNT(*) AS `total`, `status` FROM `research_topic` GROUP BY `status` ORDER BY `status`";
                  }
                } elseif (isset($_GET['filterType']) && $_GET['filterType'] == "annual") {
                  if (isset($_GET['annual']) && $_GET['annual'] != "none") {
                    $yearFilter = $_GET['annual'];
                    $sql = "SELECT COUNT(*) AS `total`, `status` FROM `research_topic` WHERE YEAR(dateAdded) = '$yearFilter' GROUP BY `status` ORDER BY `status`";
                  } else {
                    $sql = "SELECT COUNT(*) AS `total`, `status` FROM `research_topic` GROUP BY `status` ORDER BY `status`";
                  }
                } else {
                  $sql = "SELECT COUNT(*) AS `total`, `status` FROM `research_topic` GROUP BY `status` ORDER BY `status`";
                }
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $data = [];
                foreach ($labels as $value) {
                  if (isset($row)) {
                    if ($value == $row['status']) {
                      $data[] = $row['total'];
                      $row = $result->fetch_assoc();
                    } else {
                      $data[] = 0;
                    }
                  } else {
                    $data[] = 0;
                  }
                }
                echo '[' . implode(', ', $data) . '],';
                ?>

        chart: {
          type: 'donut',
          height: 300
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          width: 0,
        },
        colors: ['#F83E3E', '#DB7093', '#F8BABA', '#e79f31'],
        legend: {
          position: 'bottom',
          show: false
        },
        responsive: [{
            breakpoint: 1800,
            options: {
              chart: {
                height: 300
              },
            }
          },
          {
            breakpoint: 1800,
            options: {
              chart: {
                height: 200
              },
            }
          }
        ]
      };

      var chart = new ApexCharts(document.querySelector("#emailchart"), options);
      chart.render();

    }

    var extremeChart = function() {
      // Extreme responsive configuration

      new Chartist.Bar('#extreme-chart', {
        labels: ['CICS', 'CABEIHM', 'CAS', 'CET', 'CONAHS', 'CTE'],
        series: [
          [5, 4, 3, 7, 8],
          [3, 2, 9, 5, 3],
          [1, 5, 8, 4, 4],
          [2, 3, 4, 6, 1],

        ]
      }, {
        // Default mobile configuration
        stackBars: true,
        axisX: {
          labelInterpolationFnc: function(value) {
            return value.split(/\s+/).map(function(word) {
              return word[0];
            }).join('');
          }
        },

        axisY: {
          offset: 20
        },

        plugins: [
          Chartist.plugins.tooltip()
        ]

      }, [
        // Options override for media > 400px
        ['screen and (min-width: 400px)', {
          reverseData: true,
          horizontalBars: true,
          axisX: {
            labelInterpolationFnc: Chartist.noop
          },
          axisY: {
            offset: 30
          }
        }],
        // Options override for media > 800px
        ['screen and (min-width: 800px)', {
          stackBars: false,
          seriesBarDistance: 10
        }],

        // Options override for media > 1000px
        ['screen and (min-width: 1000px)', {
          reverseData: false,
          horizontalBars: false,
          seriesBarDistance: 17
        }]

      ]);

    }
  </script>
</body>

</html>