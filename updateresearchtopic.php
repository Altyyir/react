<?php
 session_start();
include 'dbconn.php';

$_SESSION['researchTopicID'] = $_GET['id'];

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
  $id = $_GET['id'];

  $sql = "SELECT * FROM `research_topic` WHERE `id` = '$id'";
  $result = $conn->query($sql);
  $data = $result->fetch_assoc();
?>
<?php
  require 'dbconn.php';
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
    <link rel="shortcut icon" type="image/png" href="images/maamnoey.png">
    <link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="vendor/jquery-smartwizard/dist/css/smart_wizard.min.css" rel="stylesheet">
    <link href="vendor/nestable2/css/jquery.nestable.min.css" rel="stylesheet">
    <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
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
                <div class="dashboard_bar"> Research Project</div>
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
                <a href="proposal.php">Research Projects</a>
              </li>
              <li class="breadcrumb-item active">
                <a href="researchtopic.php">Update Research Project Form</a>
              </li>
            </ol>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Update Research Project Form</h4>
                </div>
                <div class="card-body">
                  <div id="smartwizard" class="form-wizard order-create">
                    <ul class="nav nav-wizard">
                      <li>
                        <a class="nav-link" href="#a">
                          <span>1</span>
                        </a>
                      </li>
                      <li>
                        <a class="nav-link" href="#b">
                          <span>2</span>
                        </a>
                      </li>
                      <li>
                        <a class="nav-link" href="#c">
                          <span>3</span>
                        </a>
                      </li>
                      <li>
                        <a class="nav-link" href="#d">
                          <span>4</span>
                        </a>
                      </li>
                      <li>
                        <a class="nav-link" href="#e">
                          <span>5</span>
                        </a>
                      </li>
                      <li>
                        <a class="nav-link" href="#f">
                          <span>6</span>
                        </a>
                      </li>
                      <li>
                        <a class="nav-link" href="#g">
                          <span>7</span>
                        </a>
                      </li>
                      <li>
                        <a class="nav-link" href="#h">
                          <span>8</span>
                        </a>
                      </li>
                      <li>
                        <a class="nav-link" href="#i">
                          <span>9</span>
                        </a>
                      </li>
                    </ul>
                    <form method="post" action="update.research.topic.php">
                      <div class="tab-content">
                        <div id="a" class="tab-pane" role="tabpanel">
                            <div class="row">
                              <div class="mb-12 col-md-12">
                                <label class="form-label ">Research Project Title <span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control form-control-lg" id="validationCustom04" rows="5" placeholder="Project Title" name="research_project_title" id="title" required><?=$data['project_title']?></textarea>
                                <div class="title_error_message" class="text-danger"></div>
                              </div>
                              <div class="col-lg-6 mb-2" style="margin-top: 14px;">
                                <label class="form-label">BatStateU Research Agenda <span class="text-danger">*</span>
                                </label>
                                <select id="inputState" class="default-select form-control form-control-lg wide" name="research_agenda">
                                  <option>Choose Research Agenda</option>
                                  <option <?php if($data['research_agenda'] == "Agriculture, Aquatic, and Natural Resources Research (AANRR)"){echo "selected";}?>>Agriculture, Aquatic, and Natural Resources Research (AANRR)</option>
                                  <option <?php if($data['research_agenda'] == "Disaster Risk Management and Health Research (DRMHR)"){echo "selected";}?>>Disaster Risk Management and Health Research (DRMHR)</option>
                                  <option <?php if($data['research_agenda'] == "Industry, Energy and Merging Technology Research (IEETR)"){echo "selected";}?>>Industry, Energy and Merging Technology Research (IEETR)</option>
                                  <option <?php if($data['research_agenda'] == "Integrated Basic anfd Applied Research (IBAR)"){echo "selected";}?>>Integrated Basic anfd Applied Research (IBAR)</option>
                                </select>
                              </div>
                              <div class="col-lg-6 mb-2" style="margin-top: 14px;">
                                <label class="form-label">Nature of Partnership <span class="text-danger">*</span>
                                </label>
                                <select id="partnership" class="default-select form-control default-select wide" name="partnership">
                                  <option>Choose Nature of Partnership</option>
                                  <option <?php if($data['partnership'] == "Institutionaly Funded"){echo "selected";}?>>Institutionaly Funded</option>
                                  <option <?php if($data['partnership'] == "Externaly Funded"){echo "selected";}?>>Externaly Funded</option>
                                </select>
                              </div>
                            <!--   <div class="mb-12 col-md-12" style="margin-top: 7px;">
                                <div class="mb-3">
                                  <label class="form-label">Name of Sponsor <span class="text-danger"> *</span>
                                  </label>
                                  <input class="form-control form-control-lg" id="validationCustom04" rows="5" placeholder="Sponsor"  name="sponsor" id="title" value="<?=$data['sponsor']?>" required></input>
                                  <div class="title_error_message" class="text-danger"></div>
                                </div>
                              </div> -->
                              <div class="row">
                                <div class="mb-12 col-md-12" style="margin-top: 14px;">
                                  <label class="form-label">Sustainable Development Goal <span class="text-danger">*</span>
                                  </label>
                                  <div class="row" style="margin-top: 14px; margin-left: 10px;">
                                    <div class="col-xl-4 col-xxl-6 col-6">
                                      <div class="form-check custom-checkbox mb-3 checkbox-success">
                                        <input type="checkbox" class="form-check-input" id="customCheckBox3" name="sdg1" value="1" <?php if($data['sdg_1'] == "1"){echo "checked";}?>>
                                        <label class="form-check-label" style="font-size: 14px" for="customCheckBox3">SDG1: No Proverty</label>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-xxl-6 col-6">
                                      <div class="form-check custom-checkbox mb-3 checkbox-success">
                                        <input type="checkbox" class="form-check-input" id="customCheckBox3" name="sdg10" <?php if($data['sdg_10'] == "1"){echo "checked";}?>>
                                        <label class="form-check-label" style="font-size: 14px" for="customCheckBox3">SDG10: Reduced Inequalities</label>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-xxl-6 col-6">
                                      <div class="form-check custom-checkbox mb-3 checkbox-success">
                                        <input type="checkbox" class="form-check-input" id="customCheckBox3" name="sdg2" <?php if($data['sdg_2'] == "1"){echo "checked";}?>>
                                        <label class="form-check-label" style="font-size: 14px" for="customCheckBox3">SDG2: Zero Hunger</label>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-xxl-6 col-6">
                                      <div class="form-check custom-checkbox mb-3 checkbox-success">
                                        <input type="checkbox" class="form-check-input" id="customCheckBox3" name="sdg11" <?php if($data['sdg_11'] == "1"){echo "checked";}?>>
                                        <label class="form-check-label" style="font-size: 14px" for="customCheckBox3">SDG11: Sustainable Cities & Communities</label>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-xxl-6 col-6">
                                      <div class="form-check custom-checkbox mb-3 checkbox-success">
                                        <input type="checkbox" class="form-check-input" id="customCheckBox3" name="sdg3" <?php if($data['sdg_3'] == "1"){echo "checked";}?>>
                                        <label class="form-check-label" style="font-size: 14px" for="customCheckBox3">SDG3: Good Health & Well-being</label>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-xxl-6 col-6">
                                      <div class="form-check custom-checkbox mb-3 checkbox-success">
                                        <input type="checkbox" class="form-check-input" id="customCheckBox3" name="sdg12" <?php if($data['sdg_12'] == "1"){echo "checked";}?>>
                                        <label class="form-check-label" style="font-size: 14px" for="customCheckBox3">SDG12: Responsible Consumption & Production</label>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-xxl-6 col-6">
                                      <div class="form-check custom-checkbox mb-3 checkbox-success">
                                        <input type="checkbox" class="form-check-input" id="customCheckBox3" name="sdg4" <?php if($data['sdg_4'] == "1"){echo "checked";}?>>
                                        <label class="form-check-label" style="font-size: 14px" for="customCheckBox3">SDG4: Quality Education</label>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-xxl-6 col-6">
                                      <div class="form-check custom-checkbox mb-3 checkbox-success">
                                        <input type="checkbox" class="form-check-input" id="customCheckBox3" name="sdg13" <?php if($data['sdg_13'] == "1"){echo "checked";}?>>
                                        <label class="form-check-label" style="font-size: 14px" for="customCheckBox3">SDG13: Climate Action</label>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-xxl-6 col-6">
                                      <div class="form-check custom-checkbox mb-3 checkbox-success">
                                        <input type="checkbox" class="form-check-input" id="customCheckBox3" name="sdg5" <?php if($data['sdg_5'] == "1"){echo "checked";}?>>
                                        <label class="form-check-label" style="font-size: 14px" for="customCheckBox3">SDG5: Gender Quality</label>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-xxl-6 col-6">
                                      <div class="form-check custom-checkbox mb-3 checkbox-success">
                                        <input type="checkbox" class="form-check-input" id="customCheckBox3" name="sdg14" <?php if($data['sdg_14'] == "1"){echo "checked";}?>>
                                        <label class="form-check-label" style="font-size: 14px" for="customCheckBox3">SDG14: Life Below Water</label>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-xxl-6 col-6">
                                      <div class="form-check custom-checkbox mb-3 checkbox-success">
                                        <input type="checkbox" class="form-check-input" id="customCheckBox3" name="sdg6" <?php if($data['sdg_6'] == "1"){echo "checked";}?>>
                                        <label class="form-check-label" style="font-size: 14px" for="customCheckBox3">SDG6: Clean Water & Sanitation</label>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-xxl-6 col-6">
                                      <div class="form-check custom-checkbox mb-3 checkbox-success">
                                        <input type="checkbox" class="form-check-input" id="customCheckBox3" name="sdg15" <?php if($data['sdg_15'] == "1"){echo "checked";}?>>
                                        <label class="form-check-label" style="font-size: 14px" for="customCheckBox3">SDG15: Life on Land</label>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-xxl-6 col-6">
                                      <div class="form-check custom-checkbox mb-3 checkbox-success">
                                        <input type="checkbox" class="form-check-input" id="customCheckBox3" name="sdg7" <?php if($data['sdg_7'] == "1"){echo "checked";}?>>
                                        <label class="form-check-label" style="font-size: 14px" for="customCheckBox3">SDG7: Affordable and Clean Energy</label>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-xxl-6 col-6">
                                      <div class="form-check custom-checkbox mb-3 checkbox-success">
                                        <input type="checkbox" class="form-check-input" id="customCheckBox3" name="sdg16" <?php if($data['sdg_16'] == "1"){echo "checked";}?>>
                                        <label class="form-check-label" style="font-size: 14px" for="customCheckBox3">SDG16: Peace, Justice, & Strong Institutions</label>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-xxl-6 col-6">
                                      <div class="form-check custom-checkbox mb-3 checkbox-success">
                                        <input type="checkbox" class="form-check-input" id="customCheckBox3" name="sdg8" <?php if($data['sdg_8'] == "1"){echo "checked";}?>>
                                        <label class="form-check-label" style="font-size: 14px" for="customCheckBox3">SDG8: Decent Work & Economic Growth</label>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-xxl-6 col-6">
                                      <div class="form-check custom-checkbox mb-3 checkbox-success">
                                        <input type="checkbox" class="form-check-input" id="customCheckBox3" name="sdg17" <?php if($data['sdg_17'] == "1"){echo "checked";}?>>
                                        <label class="form-check-label" style="font-size: 14px" for="customCheckBox3">SDG17: Partnerships for the Goals</label>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-xxl-6 col-6">
                                      <div class="form-check custom-checkbox mb-3 checkbox-success">
                                        <input type="checkbox" class="form-check-input" id="customCheckBox3" name="sdg9" <?php if($data['sdg_9'] == "1"){echo "checked";}?>>
                                        <label class="form-check-label" style="font-size: 14px" for="customCheckBox3">SDG9: Industry, Innovation, & Infrastructure</label>
                                      </div>
                                    </div>
                                    <div class="row mb-3">
                                      <div class="err">Select At Least One Sustainable Goal</div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-6 mb-3">
                                <label class="form-label">Proponent Agency <span class="text-danger">*</span>
                                </label>
                                <input id="agency" class="form-control form-control-lg" type="text" value="<?=$data['agency']?>">
                              </div>
                              <div class="col-lg-6 mb-3">
                                <label class="form-label">Revision No.</label>
                                <input class="form-control" type="number" name="revision" id="input2" value="<?=$data['revision_no']?>">
                              </div>
                              <div class="col-lg-6 mb-3">
                                <label class="form-label">Start Date <span class="text-danger">*</span>
                                </label>
                                <?php
                                if($data['status'] == "For Evaluation") {
                                  $readonly = "";
                                } else {
                                  $readonly = "readonly";
                                }
                                ?>
                                <input type="date" class="form-control form-control-lg" name="startdate" <?=$readonly?> required id="startdate" value="<?=$data['start_date']?>">
                              </div>
                              <div class="col-lg-6 mb-3">
                                <label class="form-label">End Date <span class="text-danger">*</span>
                                </label>
                                <input type="date" class="form-control form-control-lg" name="enddate" <?=$readonly?> required id="enddate" value="<?=$data['end_date']?>">
                              </div>
                              <!-- <div class="col-lg-6 mb-3">
                                <label class="form-label">No. of BatStateU Female Participants <span class="text-danger">*</span>
                                </label>
                                <input class="form-control form-control-lg" type="number" name="female_no" id="input1" value="<?=$data['female_no']?>">
                                <div id="error-message" class="text-danger"></div>
                              </div>
                              <div class="col-lg-6 mb-3">
                                <label class="form-label">No. of BatStateU Male Participants <span class="text-danger">*</span>
                                </label>
                                <input class="form-control form-control-lg" type="number" name="male_no" id="input3" value="<?=$data['male_no']?>">
                                <div id="male-error-message" class="text-danger"></div>
                              </div> -->
                            </div>
                        </div>
                        <div id="b" class="tab-pane" role="tabpanel">
                          <div class="row">
                            <div class="col-lg-12 mb-3">
                              <label>Campus <span class="text-danger">*</span>
                              </label>
                              <input type="text" class="form-control form-control-lg wide"  name="campus" id="campus" value="ARASOF - Nasugbu " readonly>
                            </div>
                            <div class="col-lg-12 mb-3">
                              <label>College <span class="text-danger">*</span>
                              </label>
                              <?php
                                $collegeID = $data['college_id'];
                                $sql = "SELECT * FROM college WHERE id = $collegeID";
                                $collegeResult = $conn->query($sql);
                                $collegeRow = $collegeResult->fetch_assoc();
                              ?>
                              <input type="text" class="form-control form-control-lg wide"  name="college" id="college" value="<?=$collegeRow['college_name']?>" readonly>
                            </div>
                            <div class="col-lg-12 mb-3">
                              <label>Department <span class="text-danger">*</span>
                              </label>
                              <?php
                                $departmentID = $data['department_id'];
                                $sql = "SELECT * FROM program WHERE id = $departmentID";
                                $programResult = $conn->query($sql);
                                $programRow = $programResult->fetch_assoc();
                              ?>
                              <input type="text" class="form-control form-control-lg wide"  name="department" id="department" value="<?=$programRow['program']?>" readonly>
                            </div>
                            <div class="row">
                              <div class="col-xl-12">
                                <div class="d-flex justify-content-between flex-wrap">
                                  <div class="input-group contacts-search mb-4">
                                    <label style="margin-left: 40px">Roles</label>
                                    <input type="text" name="total_roles" id="total_roles" value="3" style="display: none;">
                                  </div>
                                  <div class="mb-4" style="margin-left: 40px;">
                                    <button type="button" onclick="addRoles()" class="btn btn-primary shadow btn-xs sharp">
                                      <i class="fas fa-plus"></i>
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <hr style="width: 100%; margin-left: 10px; margin-right: 20px;">
                            <div class="table-responsive">
                              <div class="modal fade modal1" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" style="font-size: 23px">Add</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body" style="padding: 0.875rem">
                                    <?php
                                      $id = $_GET['id'];
                                      $sql = "SELECT COUNT(*) AS total FROM representative_roles";
                                      $representative_rolesResult = $conn->query($sql);
                                      $representative_rolesRow = $representative_rolesResult->fetch_assoc();
                                    ?>
                                    <input type="text" id="total-role" value="<?=$representative_rolesRow['total']?>" style="display: none">
                                      <div class="card-body">
                                        <div class="table-responsive">
                                          <table class="table header-border table-responsive-sm" id="myTable">
                                            <thead>
                                              <tr>
                                                <th class="col-md-4" style="text-align: left;">Name</th>
                                                <th class="col-md-7" style="text-align: left;">Designation</th>
                                                <th class="col-md-1" style="text-align: right;">Action</th>
                                              </tr>
                                            </thead>
                                            <tbody id="tbody_roles1"></tbody>
                                          </table>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <?php
                                $id = $_GET['id'];
                                $sql = "SELECT * FROM research_representatives WHERE research_topic_id = '$id'";
                                $research_representativesResult = $conn->query($sql);
                                $count = 1;
                                $memRow = 1;
                                $responbilityRow = 1;
                                $expenses = 1;
                                $expensesTotal = 0;
                                while($research_representativesRow = $research_representativesResult->fetch_assoc()) {
                              ?>
                              <div id="role<?=$count?>">
                                <table class="table header-border table-responsive-sm">
                                  <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <div class="col-md-11">
                                      <input class="form-control form-control-lg" id="role_description_<?=$count?>" type="text" value="<?=$research_representativesRow['role']?>" name="roleName[]">
                                    </div>
                                    <div class="md-1" style="padding-right: 33px;">
                                      <button type="button" name="addRole" onclick="removeRole(<?=$count?>)" class="btn btn-danger shadow btn-xs sharp">
                                        <i class="fas fa-trash"></i>
                                      </button>
                                    </div>
                                  </div>
                                  <thead>
                                    <tr>
                                      <th class="col-md-4" style="text-align: left;">Name</th>
                                      <th class="col-md-7" style="text-align: left;">Designation</th>
                                      <th class="col-md-1" style="align-items: center;">
                                        <button type="button" name="addRole" class="btn btn-primary shadow btn-xs sharp" data-bs-toggle="modal" data-bs-target=".modal1" onclick="setSelectRole(<?=$count?>)">
                                          <i class="fas fa-user-plus"></i>
                                        </button>
                                        <button style="margin-left:1px;background: white;" type="button" name="addRole" class="btn btn-primary shadow btn-xs sharp" onclick="addCustomMember(<?=$count?>)">
                                          <i class="fas fa-plus" style="color: #1dbf1d"></i>
                                        </button>
                                      </th>
                                    </tr>
                                  </thead>
                                  <tbody id="member<?=$count?>">
                                    <?php
                                      $research_representativesID = $research_representativesRow['id'];
                                      $sql = "SELECT * FROM representative WHERE research_representatives_id = '$research_representativesID'";
                                      $representativeResult = $conn->query($sql);
                                      while($representativeRow = $representativeResult->fetch_assoc()) {
                                    ?>
                                    <tr id="memRow<?=$memRow?>">
                                      <td style="display: none;">
                                        <input class="form-control form-control-lg" name="roles_position[]" value="<?=$count?>" />
                                      </td>
                                      <td>
                                        <input class="form-control form-control-lg" id="name-0-<?=$count?>" name="roles_name[]" name="representative_<?=$memRow?>" value="<?=$representativeRow['name']?>">
                                      </td>
                                      <td>
                                        <input class="form-control form-control-lg" name="roles_description[]" value="<?=$representativeRow['designation']?>">
                                      </td>
                                      <td>
                                        <button type="button" name="addRole" onclick="removeCustomMember(`<?=$memRow?>`, `<?=$count?>`)" class="btn btn-danger shadow btn-xs sharp">
                                          <i class="fas fa-minus"></i>
                                        </button>
                                      </td>
                                    </tr>
                                    <?php
                                        $memRow++;
                                      }
                                    ?>
                                  </tbody>
                                </table>
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th class="col-md-11" style="text-align: left;">Responsibility</th>
                                      <th class="col-md-1" style="align-items: center;">
                                        <button type="button" name="addRole" class="btn btn-primary shadow btn-xs sharp" data-bs-toggle="modal" data-bs-target=".responsibility_modal_<?=$count?>" onclick="openModal(<?=$count?>)">
                                          <i class="fas fa-plus"></i>
                                        </button>
                                        <div class="modal fade responsibility_modal_<?=$count?>" tabindex="-1" role="dialog" aria-hidden="true">
                                          <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" style="font-size:23px">Add Project Leader/s Responsibility</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                              </div>
                                              <div class="modal-body" style="padding: 0.875rem">
                                                <div class="card-body">
                                                  <div class="table-responsive">
                                                    <table class="table header-border table-responsive-sm" >
                                                      <thead>
                                                        <tr>
                                                          <th class="col-md-4" style="text-align: left;">Role</th>
                                                          <th class="col-md-7" style="text-align: left;">Resposibility</th>
                                                          <th class="col-md-1" style="text-align: right;">Action</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody id="responsibility_list_<?=$count?>">
                                                        <!-- List Responsibility of Leader -->
                                                      </tbody>
                                                    </table>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <button style="margin-left:1px;background: white;" type="button" name="addRole" class="btn btn-primary shadow btn-xs sharp" onclick="addCustomResponsibility(<?=$count?>)">
                                          <i class="fas fa-plus" style="color: #1dbf1d"></i>
                                        </button>
                                      </th>
                                    </tr>
                                  </thead>
                                  <tbody id="added_responsibility_list_<?=$count?>">
                                    <?php
                                      $research_representativesID = $research_representativesRow['id'];
                                      $sql = "SELECT * FROM research_representatives_responsibilities WHERE research_representatives_id = '$research_representativesID'";
                                      $research_representatives_responsibilitiesResult = $conn->query($sql);
                                      while($research_representatives_responsibilitiesRow = $research_representatives_responsibilitiesResult->fetch_assoc()) {
                                    ?>
                                    <tr id="responsibility_row_<?=$responbilityRow?>">
                                      <td style="display: none;">
                                        <input class="form-control form-control-lg" name="responsibilities_position[]" value="<?=$count?>" />
                                      </td>
                                      <td>
                                        <input class="form-control form-control-lg" id="responsibility_description_0_<?=$count?>" name="responsibilities[]" value="<?=$research_representatives_responsibilitiesRow['responsibility']?>">
                                      </td>
                                      <td>
                                        <button type="button" class="btn btn-danger shadow btn-xs sharp" onclick="removeCustomResponsibility(<?=$responbilityRow?>)">
                                          <i class="fas fa-minus"></i>
                                        </button>
                                      </td>
                                    </tr>
                                    <?php
                                        $responbilityRow++;
                                      }
                                    ?>
                                  </tbody>
                                </table>
                              </div>
                              <?php
                                  $count++;
                                }
                              ?>
                              <div id="table_roles"></div>
                              <div id="role_modal"></div>
                              <div id="responsibility_modal"></div>
                            </div>
                          </div>
                        </div>
                        <div id="c" class="tab-pane" role="tabpanel">
                          <div class="col-xl-12 col-xxl-12">
                            <div class="card-body" style="">Executive Brief <span class="text-danger"> *</span>
                              <textarea class="form-control" id="editor1" name="executive_brief"><?=$data['executive_brief']?></textarea>
                            </div>
                          </div>
                        </div>
                        <div id="d" class="tab-pane" role="tabpanel">
                          <div class="col-xl-12 col-xxl-12">
                            <div class="card-body ">Rationale of the Project <span class="text-danger"> *</span>
                              <textarea class="form-control" id="editor2" name="rationale"><?=$data['rationale']?></textarea>
                            </div>
                          </div>
                        </div>
                        <div id="e" class="tab-pane" role="tabpanel">
                          <div class="col-xl-12 col-xxl-12">
                            <div class="card-body ">Objectives of the Project (General and Specific) <span class="text-danger"> *</span>
                              <textarea class="form-control" id="editor3" name="objective"><?=$data['objective']?></textarea>
                            </div>
                          </div>
                        </div>
                        <div id="f" class="tab-pane" role="tabpanel">
                          <div class="col-xl-11 col-xxl-12">
                            <div class="card-body">Expected Output of the Project <span class="text-danger"> *</span>
                            </div>
                            <div class="card-body" style="padding-left: 90px;">
                              <div class="basic-form" style="font-size:14px">
                                  <div class="mb-2 row">
                                    <label class="col-sm-2 form-label" style="text-align:justify; padding-top: 10px;">Publication</label>
                                    <div class="col-lg-10">
                                      <input type="text" class="form-control form-control-lg" placeholder="Publication" name="publication" value="<?=$data['publication']?>">
                                    </div>
                                  </div>
                                  <div class="mb-2 row">
                                    <label class="col-sm-2 form-label" style="text-align:justify; padding-top: 10px;">Patent</label>
                                    <div class="col-lg-10">
                                      <input type="text" class="form-control form-control-lg" placeholder="Patent" name="patent" value="<?=$data['patent']?>">
                                    </div>
                                  </div>
                                  <div class="mb-2 row">
                                    <label class="col-sm-2 form-label" style="text-align:justify; padding-top: 10px;">Product</label>
                                    <div class="col-lg-10">
                                      <input type="text" class="form-control form-control-lg" placeholder="Product" name="product" value="<?=$data['product']?>">
                                    </div>
                                  </div>
                                  <div class="mb-2 row">
                                    <label class="col-sm-2 form-label" style="text-align:justify; padding-top: 10px;">People Service</label>
                                    <div class="col-lg-10">
                                      <input type="text" class="form-control form-control-lg" placeholder="People Service" name="peopleservice" value="<?=$data['people_service']?>">
                                    </div>
                                  </div>
                                  <div class="mb-2 row">
                                    <label class="col-sm-2 form-label" style="text-align:justify; padding-top: 10px;">Partnership</label>
                                    <div class="col-lg-10">
                                      <input type="text" class="form-control form-control-lg" placeholder="Partnership" name="partnership2" value="<?=$data['partners_hip']?>">
                                    </div>
                                  </div>
                                  <div class="mb-2 row">
                                    <label class="col-sm-2 form-label" style="text-align:justify; padding-top: 10px;">Policy</label>
                                    <div class="col-lg-10">
                                      <input type="text" class="form-control form-control-lg" placeholder="Policy" name="policy" value="<?=$data['policy']?>">
                                    </div>
                                  </div>
                                  <div class="mb-2 row">
                                    <label class="col-sm-2 form-label" style="text-align:justify; padding-top: 10px;">Social Impact</label>
                                    <div class="col-lg-10">
                                      <input type="text" class="form-control form-control-lg" placeholder="Social Impact" name="socialimpact" value="<?=$data['social_impact']?>">
                                    </div>
                                  </div>
                                  <div class="mb-2 row">
                                    <label class="col-sm-2 form-label" style="text-align:justify; padding-top: 10px;">Ecomonic Impact</label>
                                    <div class="col-lg-10">
                                      <input type="text" class="form-control form-control-lg" placeholder="Ecomonic Impact" name="economicimpact" value="<?=$data['economic_impact']?>">
                                    </div>
                                  </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div id="g" class="tab-pane" role="tabpanel">
                          <div class="col-xl-12 col-xxl-12">
                            <div class="card-body ">Review of Related Literature <span class="text-danger"> *</span>
                              <textarea class="form-control" id="editor4" name="rrl"><?=$data['rrl']?></textarea>
                            </div>
                          </div>
                        </div>
                        <div id="h" class="tab-pane" role="tabpanel">
                          <div class="col-xl-12 col-xxl-12">
                            <div class="card-body ">Methodology <span class="text-danger"> *</span>
                              <textarea class="form-control" id="editor5" name="methodology"><?=$data['methodology']?></textarea>
                            </div>
                          </div>
                        </div>
                        <div id="i" class="tab-pane" role="tabpanel">
                          <div class="card-body">
                            <div class="col-xl-12 col-xxl-12">
                              <div class="col-md-6">
                                <div class="card-content">
                                  <div class="nestable">
                                    <div class="dd" id="nestable2">
                                        <ol class="dd-list" style="width: 960px;">
                                          <?php
                                            $id = $_GET['id'];
                                            $sql = "SELECT * FROM expenses WHERE category IN ('local', 'foreign', 'training expenses', 'supplies and materials', 'postage and deliveries', 'telephone expenses', 'internet expenses', 'other communication expenses', 'rent expenses', 'transportation and delivery expenses', 'subscription expenses', 'consultancy services', 'general services', 'other professional services', 'it equipment and software', 'laboratory equipment', 'technical and scientific equipment', 'machineries and equipment', 'other repairs and maintenance of facilities', 'taxes, duties, patent, and licenses', 'advertising expenses', 'printing and binding expenses', 'other financial charges', 'it equipment and software (coe)', 'machineries', 'communication equipment', 'laboratory equipment (coe)', 'technical and scientific equipment (coe)', 'other coe') AND research_topic_id = '$id'";
                                            $expensesResult = $conn->query($sql);
                                            if($expensesRow = $expensesResult->fetch_assoc()) {
                                              $collapsed = "";
                                            } else {
                                              $collapsed = "dd-collapsed";
                                            }
                                          ?>
                                          <li class="dd-item <?=$collapsed?>" data-id="1">
                                            <div class="dd-handle" style="font-weight: 600;">Maintenance and Other Operating Expenses (MOOE)</div>
                                            <ol class="dd-list">
                                              <li class="dd-item dd-collapsed" data-id="2">
                                                <div class="dd-handle">Traveling Cost</div>
                                                <ol class="dd-list">
                                                  <li class="dd-item dd-collapsed" data-id="3">
                                                    <div class="dd-handle">Local</div>
                                                    <ol class="dd-list">
                                                      <div class="table-responsive" id="next1">
                                                        <table class="table table-responsive">
                                                          <thead>
                                                            <tr>
                                                              <th class="col-md-5">Item Description</th>
                                                              <th class="col-md-2">Quantity</th>
                                                              <th class="col-md-2">Unit Cost</th>
                                                              <th>Total</th>
                                                              <th class="col-md-1">
                                                                <button type="button" id="addrow1" name="addrow" class="btn btn-primary shadow btn-xs sharp">
                                                                  <i class="fas fa-plus"></i>
                                                                </button>
                                                              </th>
                                                            </tr>
                                                          </thead>
                                                        </table>
                                                        <?php
                                                          $id = $_GET['id'];
                                                          $sql = "SELECT * FROM expenses WHERE research_topic_id = '$id' AND category = 'local'";
                                                          $expensesResult = $conn->query($sql);
                                                          while($expensesRow = $expensesResult->fetch_assoc()) {
                                                        ?>
                                                        <div class="table-responsive">
                                                          <table class="table table-responsive">
                                                            <tbody>
                                                              <tr>
                                                                <td style="display: none;">
                                                                  <input class="form-control form-control-lg" name="category[]" value="supplies and materials" />
                                                                </td>
                                                                <td class="col-md-5">
                                                                  <input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item<?=$expenses?>" value="<?=$expensesRow['item_description']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="qual[]" id="quantity<?=$expenses?>" onkeyup="quantityfunc(<?=$expenses?>)" value="<?=$expensesRow['quantity']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="unitCost[]" step="any" id="cost<?=$expenses?>" onkeyup="unitfunc(<?=$expenses?>)" value="<?=$expensesRow['unit_cost']?>">
                                                                </td>
                                                                <td class="netPrice" id="netPrice<?=$expenses?>">₱ <?=$expensesRow['quantity']*$expensesRow['unit_cost']?></td>
                                                                <td style="padding: 0px">
                                                                <th class="col-md-1" style="padding-top: 20px">
                                                                  <button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel(<?=$expenses?>)" class="col-md-2">
                                                                    <i class="fa fa-trash"></i>
                                                                  </button>
                                                                </th>
                                                                </td>
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                        </div>
                                                        <?php
                                                            $expensesTotal = $expensesTotal + ($expensesRow['quantity']*$expensesRow['unit_cost']);
                                                            $expenses++;
                                                          }
                                                        ?>
                                                      </div>
                                                    </ol>
                                                  </li>
                                                  <li class="dd-item dd-collapsed" data-id="4">
                                                    <div class="dd-handle">Foreign</div>
                                                    <ol class="dd-list">
                                                      <div class="table-responsive" id="next2">
                                                        <table class="table table-responsive">
                                                          <thead>
                                                            <tr>
                                                              <th class="col-md-5">Item Description</th>
                                                              <th class="col-md-2">Quantity</th>
                                                              <th class="col-md-2">Unit Cost</th>
                                                              <th>Total</th>
                                                              <th class="col-md-1">
                                                                <button type="button" id="addrow2" name="addrow" class="btn btn-primary shadow btn-xs sharp">
                                                                  <i class="fas fa-plus"></i>
                                                                </button>
                                                              </th>
                                                            </tr>
                                                          </thead>
                                                        </table>
                                                        <?php
                                                          $id = $_GET['id'];
                                                          $sql = "SELECT * FROM expenses WHERE research_topic_id = '$id' AND category = 'foreign'";
                                                          $expensesResult = $conn->query($sql);
                                                          while($expensesRow = $expensesResult->fetch_assoc()) {
                                                        ?>
                                                        <div class="table-responsive">
                                                          <table class="table table-responsive">
                                                            <tbody>
                                                              <tr>
                                                                <td style="display: none;">
                                                                  <input class="form-control form-control-lg" name="category[]" value="supplies and materials" />
                                                                </td>
                                                                <td class="col-md-5">
                                                                  <input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item<?=$expenses?>" value="<?=$expensesRow['item_description']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="qual[]" id="quantity<?=$expenses?>" onkeyup="quantityfunc(<?=$expenses?>)" value="<?=$expensesRow['quantity']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="unitCost[]" step="any" id="cost<?=$expenses?>" onkeyup="unitfunc(<?=$expenses?>)" value="<?=$expensesRow['unit_cost']?>">
                                                                </td>
                                                                <td class="netPrice" id="netPrice<?=$expenses?>">₱ <?=$expensesRow['quantity']*$expensesRow['unit_cost']?></td>
                                                                <td style="padding: 0px">
                                                                <th class="col-md-1" style="padding-top: 20px">
                                                                  <button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel(<?=$expenses?>)" class="col-md-2">
                                                                    <i class="fa fa-trash"></i>
                                                                  </button>
                                                                </th>
                                                                </td>
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                        </div>
                                                        <?php
                                                            $expensesTotal = $expensesTotal + ($expensesRow['quantity']*$expensesRow['unit_cost']);
                                                            $expenses++;
                                                          }
                                                        ?>
                                                      </div>
                                                    </ol>
                                                  </li>
                                                </ol>
                                              </li>
                                              <li class="dd-item dd-collapsed" data-id="5">
                                                <div class="dd-handle">Training Expenses</div>
                                                <ol class="dd-list">
                                                  <div class="table-responsive" id="next3">
                                                    <table class="table table-responsive">
                                                      <thead>
                                                        <tr>
                                                          <th class="col-md-5">Item Description</th>
                                                          <th class="col-md-2">Quantity</th>
                                                          <th class="col-md-2">Unit Cost</th>
                                                          <th>Total</th>
                                                          <th class="col-md-1">
                                                            <button type="button" id="addrow3" name="addrow" class="btn btn-primary shadow btn-xs sharp">
                                                              <i class="fas fa-plus"></i>
                                                            </button>
                                                          </th>
                                                        </tr>
                                                      </thead>
                                                    </table>
                                                    <?php
                                                      $id = $_GET['id'];
                                                      $sql = "SELECT * FROM expenses WHERE research_topic_id = '$id' AND category = 'training expenses'";
                                                      $expensesResult = $conn->query($sql);
                                                      while($expensesRow = $expensesResult->fetch_assoc()) {
                                                    ?>
                                                    <div class="table-responsive">
                                                      <table class="table table-responsive">
                                                        <tbody>
                                                          <tr>
                                                            <td style="display: none;">
                                                              <input class="form-control form-control-lg" name="category[]" value="supplies and materials" />
                                                            </td>
                                                            <td class="col-md-5">
                                                              <input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item<?=$expenses?>" value="<?=$expensesRow['item_description']?>">
                                                            </td>
                                                            <td class="col-md-2">
                                                              <input type="number" class="form-control" name="qual[]" id="quantity<?=$expenses?>" onkeyup="quantityfunc(<?=$expenses?>)" value="<?=$expensesRow['quantity']?>">
                                                            </td>
                                                            <td class="col-md-2">
                                                              <input type="number" class="form-control" name="unitCost[]" step="any" id="cost<?=$expenses?>" onkeyup="unitfunc(<?=$expenses?>)" value="<?=$expensesRow['unit_cost']?>">
                                                            </td>
                                                            <td class="netPrice" id="netPrice<?=$expenses?>">₱ <?=$expensesRow['quantity']*$expensesRow['unit_cost']?></td>
                                                            <td style="padding: 0px">
                                                            <th class="col-md-1" style="padding-top: 20px">
                                                              <button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel(<?=$expenses?>)" class="col-md-2">
                                                                <i class="fa fa-trash"></i>
                                                              </button>
                                                            </th>
                                                            </td>
                                                          </tr>
                                                        </tbody>
                                                      </table>
                                                    </div>
                                                    <?php
                                                        $expensesTotal = $expensesTotal + ($expensesRow['quantity']*$expensesRow['unit_cost']);
                                                        $expenses++;
                                                      }
                                                    ?>
                                                  </div>
                                                </ol>
                                              </li>
                                              <li class="dd-item dd-collapsed" data-id="6">
                                                <div class="dd-handle">Supplies and Materials</div>
                                                <ol class="dd-list">
                                                  <div class="table-responsive" id="next4">
                                                    <table class="table table-responsive">
                                                      <thead>
                                                        <tr>
                                                          <th class="col-md-5">Item Description</th>
                                                          <th class="col-md-2">Quantity</th>
                                                          <th class="col-md-2">Unit Cost</th>
                                                          <th>Total</th>
                                                          <th class="col-md-1">
                                                            <button type="button" id="addrow4" name="addrow" class="btn btn-primary shadow btn-xs sharp">
                                                              <i class="fas fa-plus"></i>
                                                            </button>
                                                          </th>
                                                        </tr>
                                                      </thead>
                                                    </table>
                                                    <?php
                                                      $id = $_GET['id'];
                                                      $sql = "SELECT * FROM expenses WHERE research_topic_id = '$id' AND category = 'supplies and materials'";
                                                      $expensesResult = $conn->query($sql);
                                                      while($expensesRow = $expensesResult->fetch_assoc()) {
                                                    ?>
                                                    <div class="table-responsive">
                                                      <table class="table table-responsive">
                                                        <tbody>
                                                          <tr>
                                                            <td style="display: none;">
                                                              <input class="form-control form-control-lg" name="category[]" value="supplies and materials" />
                                                            </td>
                                                            <td class="col-md-5">
                                                              <input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item<?=$expenses?>" value="<?=$expensesRow['item_description']?>">
                                                            </td>
                                                            <td class="col-md-2">
                                                              <input type="number" class="form-control" name="qual[]" id="quantity<?=$expenses?>" onkeyup="quantityfunc(<?=$expenses?>)" value="<?=$expensesRow['quantity']?>">
                                                            </td>
                                                            <td class="col-md-2">
                                                              <input type="number" class="form-control" name="unitCost[]" step="any" id="cost<?=$expenses?>" onkeyup="unitfunc(<?=$expenses?>)" value="<?=$expensesRow['unit_cost']?>">
                                                            </td>
                                                            <td class="netPrice" id="netPrice<?=$expenses?>">₱ <?=$expensesRow['quantity']*$expensesRow['unit_cost']?></td>
                                                            <td style="padding: 0px">
                                                            <th class="col-md-1" style="padding-top: 20px">
                                                              <button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel(<?=$expenses?>)" class="col-md-2">
                                                                <i class="fa fa-trash"></i>
                                                              </button>
                                                            </th>
                                                            </td>
                                                          </tr>
                                                        </tbody>
                                                      </table>
                                                    </div>
                                                    <?php
                                                        $expensesTotal = $expensesTotal + ($expensesRow['quantity']*$expensesRow['unit_cost']);
                                                        $expenses++;
                                                      }
                                                    ?>
                                                  </div>
                                                </ol>
                                              </li>
                                              <li class="dd-item dd-collapsed" data-id="13">
                                                <div class="dd-handle">Postage and Deliveries</div>
                                                <ol class="dd-list">
                                                  <div class="table-responsive" id="next5">
                                                    <table class="table table-responsive">
                                                      <thead>
                                                        <tr>
                                                          <th class="col-md-5">Item Description</th>
                                                          <th class="col-md-2">Quantity</th>
                                                          <th class="col-md-2">Unit Cost</th>
                                                          <th>Total</th>
                                                          <th class="col-md-1">
                                                            <button type="button" id="addrow5" name="addrow" class="btn btn-primary shadow btn-xs sharp">
                                                              <i class="fas fa-plus"></i>
                                                            </button>
                                                          </th>
                                                        </tr>
                                                      </thead>
                                                    </table>
                                                    <?php
                                                      $id = $_GET['id'];
                                                      $sql = "SELECT * FROM expenses WHERE research_topic_id = '$id' AND category = 'postage and deliveries'";
                                                      $expensesResult = $conn->query($sql);
                                                      while($expensesRow = $expensesResult->fetch_assoc()) {
                                                    ?>
                                                    <div class="table-responsive">
                                                      <table class="table table-responsive">
                                                        <tbody>
                                                          <tr>
                                                            <td style="display: none;">
                                                              <input class="form-control form-control-lg" name="category[]" value="supplies and materials" />
                                                            </td>
                                                            <td class="col-md-5">
                                                              <input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item<?=$expenses?>" value="<?=$expensesRow['item_description']?>">
                                                            </td>
                                                            <td class="col-md-2">
                                                              <input type="number" class="form-control" name="qual[]" id="quantity<?=$expenses?>" onkeyup="quantityfunc(<?=$expenses?>)" value="<?=$expensesRow['quantity']?>">
                                                            </td>
                                                            <td class="col-md-2">
                                                              <input type="number" class="form-control" name="unitCost[]" step="any" id="cost<?=$expenses?>" onkeyup="unitfunc(<?=$expenses?>)" value="<?=$expensesRow['unit_cost']?>">
                                                            </td>
                                                            <td class="netPrice" id="netPrice<?=$expenses?>">₱ <?=$expensesRow['quantity']*$expensesRow['unit_cost']?></td>
                                                            <td style="padding: 0px">
                                                            <th class="col-md-1" style="padding-top: 20px">
                                                              <button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel(<?=$expenses?>)" class="col-md-2">
                                                                <i class="fa fa-trash"></i>
                                                              </button>
                                                            </th>
                                                            </td>
                                                          </tr>
                                                        </tbody>
                                                      </table>
                                                    </div>
                                                    <?php
                                                        $expensesTotal = $expensesTotal + ($expensesRow['quantity']*$expensesRow['unit_cost']);
                                                        $expenses++;
                                                      }
                                                    ?>
                                                  </div>
                                                </ol>
                                              </li>
                                              <li class="dd-item dd-collapsed" data-id="14">
                                                <div class="dd-handle">Communication Expenses</div>
                                                <ol class="dd-list">
                                                  <li class="dd-item dd-collapsed" data-id="15">
                                                    <div class="dd-handle">Telephone Expenses</div>
                                                    <ol class="dd-list">
                                                      <div class="table-responsive" id="next6">
                                                        <table class="table table-responsive">
                                                          <thead>
                                                            <tr>
                                                              <th class="col-md-5">Item Description</th>
                                                              <th class="col-md-2">Quantity</th>
                                                              <th class="col-md-2">Unit Cost</th>
                                                              <th>Total</th>
                                                              <th class="col-md-1">
                                                                <button type="button" id="addrow6" name="addrow" class="btn btn-primary shadow btn-xs sharp">
                                                                  <i class="fas fa-plus"></i>
                                                                </button>
                                                              </th>
                                                            </tr>
                                                          </thead>
                                                        </table>
                                                        <?php
                                                          $id = $_GET['id'];
                                                          $sql = "SELECT * FROM expenses WHERE research_topic_id = '$id' AND category = 'telephone expenses'";
                                                          $expensesResult = $conn->query($sql);
                                                          while($expensesRow = $expensesResult->fetch_assoc()) {
                                                        ?>
                                                        <div class="table-responsive">
                                                          <table class="table table-responsive">
                                                            <tbody>
                                                              <tr>
                                                                <td style="display: none;">
                                                                  <input class="form-control form-control-lg" name="category[]" value="supplies and materials" />
                                                                </td>
                                                                <td class="col-md-5">
                                                                  <input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item<?=$expenses?>" value="<?=$expensesRow['item_description']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="qual[]" id="quantity<?=$expenses?>" onkeyup="quantityfunc(<?=$expenses?>)" value="<?=$expensesRow['quantity']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="unitCost[]" step="any" id="cost<?=$expenses?>" onkeyup="unitfunc(<?=$expenses?>)" value="<?=$expensesRow['unit_cost']?>">
                                                                </td>
                                                                <td class="netPrice" id="netPrice<?=$expenses?>">₱ <?=$expensesRow['quantity']*$expensesRow['unit_cost']?></td>
                                                                <td style="padding: 0px">
                                                                <th class="col-md-1" style="padding-top: 20px">
                                                                  <button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel(<?=$expenses?>)" class="col-md-2">
                                                                    <i class="fa fa-trash"></i>
                                                                  </button>
                                                                </th>
                                                                </td>
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                        </div>
                                                        <?php
                                                            $expensesTotal = $expensesTotal + ($expensesRow['quantity']*$expensesRow['unit_cost']);
                                                            $expenses++;
                                                          }
                                                        ?>
                                                      </div>
                                                    </ol>
                                                  </li>
                                                  <li class="dd-item dd-collapsed" data-id="16">
                                                    <div class="dd-handle">Internet Expenses</div>
                                                    <ol class="dd-list">
                                                      <div class="table-responsive" id="next7">
                                                        <table class="table table-responsive">
                                                          <thead>
                                                            <tr>
                                                              <th class="col-md-5">Item Description</th>
                                                              <th class="col-md-2">Quantity</th>
                                                              <th class="col-md-2">Unit Cost</th>
                                                              <th>Total</th>
                                                              <th class="col-md-1">
                                                                <button type="button" id="addrow7" name="addrow" class="btn btn-primary shadow btn-xs sharp">
                                                                  <i class="fas fa-plus"></i>
                                                                </button>
                                                              </th>
                                                            </tr>
                                                          </thead>
                                                        </table>
                                                        <?php
                                                          $id = $_GET['id'];
                                                          $sql = "SELECT * FROM expenses WHERE research_topic_id = '$id' AND category = 'internet expenses'";
                                                          $expensesResult = $conn->query($sql);
                                                          while($expensesRow = $expensesResult->fetch_assoc()) {
                                                        ?>
                                                        <div class="table-responsive">
                                                          <table class="table table-responsive">
                                                            <tbody>
                                                              <tr>
                                                                <td style="display: none;">
                                                                  <input class="form-control form-control-lg" name="category[]" value="supplies and materials" />
                                                                </td>
                                                                <td class="col-md-5">
                                                                  <input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item<?=$expenses?>" value="<?=$expensesRow['item_description']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="qual[]" id="quantity<?=$expenses?>" onkeyup="quantityfunc(<?=$expenses?>)" value="<?=$expensesRow['quantity']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="unitCost[]" step="any" id="cost<?=$expenses?>" onkeyup="unitfunc(<?=$expenses?>)" value="<?=$expensesRow['unit_cost']?>">
                                                                </td>
                                                                <td class="netPrice" id="netPrice<?=$expenses?>">₱ <?=$expensesRow['quantity']*$expensesRow['unit_cost']?></td>
                                                                <td style="padding: 0px">
                                                                <th class="col-md-1" style="padding-top: 20px">
                                                                  <button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel(<?=$expenses?>)" class="col-md-2">
                                                                    <i class="fa fa-trash"></i>
                                                                  </button>
                                                                </th>
                                                                </td>
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                        </div>
                                                        <?php
                                                            $expensesTotal = $expensesTotal + ($expensesRow['quantity']*$expensesRow['unit_cost']);
                                                            $expenses++;
                                                          }
                                                        ?>
                                                      </div>
                                                    </ol>
                                                  </li>
                                                  <li class="dd-item dd-collapsed" data-id="17">
                                                    <div class="dd-handle">Others</div>
                                                    <ol class="dd-list">
                                                      <div class="table-responsive" id="next8">
                                                        <table class="table table-responsive">
                                                          <thead>
                                                            <tr>
                                                              <th class="col-md-5">Item Description</th>
                                                              <th class="col-md-2">Quantity</th>
                                                              <th class="col-md-2">Unit Cost</th>
                                                              <th>Total</th>
                                                              <th class="col-md-1">
                                                                <button type="button" id="addrow8" name="addrow" class="btn btn-primary shadow btn-xs sharp">
                                                                  <i class="fas fa-plus"></i>
                                                                </button>
                                                              </th>
                                                            </tr>
                                                          </thead>
                                                        </table>
                                                        <?php
                                                          $id = $_GET['id'];
                                                          $sql = "SELECT * FROM expenses WHERE research_topic_id = '$id' AND category = 'other communication expenses'";
                                                          $expensesResult = $conn->query($sql);
                                                          while($expensesRow = $expensesResult->fetch_assoc()) {
                                                        ?>
                                                        <div class="table-responsive">
                                                          <table class="table table-responsive">
                                                            <tbody>
                                                              <tr>
                                                                <td style="display: none;">
                                                                  <input class="form-control form-control-lg" name="category[]" value="supplies and materials" />
                                                                </td>
                                                                <td class="col-md-5">
                                                                  <input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item<?=$expenses?>" value="<?=$expensesRow['item_description']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="qual[]" id="quantity<?=$expenses?>" onkeyup="quantityfunc(<?=$expenses?>)" value="<?=$expensesRow['quantity']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="unitCost[]" step="any" id="cost<?=$expenses?>" onkeyup="unitfunc(<?=$expenses?>)" value="<?=$expensesRow['unit_cost']?>">
                                                                </td>
                                                                <td class="netPrice" id="netPrice<?=$expenses?>">₱ <?=$expensesRow['quantity']*$expensesRow['unit_cost']?></td>
                                                                <td style="padding: 0px">
                                                                <th class="col-md-1" style="padding-top: 20px">
                                                                  <button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel(<?=$expenses?>)" class="col-md-2">
                                                                    <i class="fa fa-trash"></i>
                                                                  </button>
                                                                </th>
                                                                </td>
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                        </div>
                                                        <?php
                                                            $expensesTotal = $expensesTotal + ($expensesRow['quantity']*$expensesRow['unit_cost']);
                                                            $expenses++;
                                                          }
                                                        ?>
                                                      </div>
                                                    </ol>
                                                  </li>
                                                </ol>
                                              </li>
                                              <li class="dd-item dd-collapsed" data-id="18">
                                                <div class="dd-handle">Rent Expenses</div>
                                                <ol class="dd-list">
                                                  <div class="table-responsive" id="next9">
                                                    <table class="table table-responsive">
                                                      <thead>
                                                        <tr>
                                                          <th class="col-md-5">Item Description</th>
                                                          <th class="col-md-2">Quantity</th>
                                                          <th class="col-md-2">Unit Cost</th>
                                                          <th>Total</th>
                                                          <th class="col-md-1">
                                                            <button type="button" id="addrow9" name="addrow" class="btn btn-primary shadow btn-xs sharp">
                                                              <i class="fas fa-plus"></i>
                                                            </button>
                                                          </th>
                                                        </tr>
                                                      </thead>
                                                    </table>
                                                    <?php
                                                      $id = $_GET['id'];
                                                      $sql = "SELECT * FROM expenses WHERE research_topic_id = '$id' AND category = 'rent expenses'";
                                                      $expensesResult = $conn->query($sql);
                                                      while($expensesRow = $expensesResult->fetch_assoc()) {
                                                    ?>
                                                    <div class="table-responsive">
                                                      <table class="table table-responsive">
                                                        <tbody>
                                                          <tr>
                                                            <td style="display: none;">
                                                              <input class="form-control form-control-lg" name="category[]" value="supplies and materials" />
                                                            </td>
                                                            <td class="col-md-5">
                                                              <input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item<?=$expenses?>" value="<?=$expensesRow['item_description']?>">
                                                            </td>
                                                            <td class="col-md-2">
                                                              <input type="number" class="form-control" name="qual[]" id="quantity<?=$expenses?>" onkeyup="quantityfunc(<?=$expenses?>)" value="<?=$expensesRow['quantity']?>">
                                                            </td>
                                                            <td class="col-md-2">
                                                              <input type="number" class="form-control" name="unitCost[]" step="any" id="cost<?=$expenses?>" onkeyup="unitfunc(<?=$expenses?>)" value="<?=$expensesRow['unit_cost']?>">
                                                            </td>
                                                            <td class="netPrice" id="netPrice<?=$expenses?>">₱ <?=$expensesRow['quantity']*$expensesRow['unit_cost']?></td>
                                                            <td style="padding: 0px">
                                                            <th class="col-md-1" style="padding-top: 20px">
                                                              <button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel(<?=$expenses?>)" class="col-md-2">
                                                                <i class="fa fa-trash"></i>
                                                              </button>
                                                            </th>
                                                            </td>
                                                          </tr>
                                                        </tbody>
                                                      </table>
                                                    </div>
                                                    <?php
                                                        $expensesTotal = $expensesTotal + ($expensesRow['quantity']*$expensesRow['unit_cost']);
                                                        $expenses++;
                                                      }
                                                    ?>
                                                  </div>
                                                </ol>
                                              </li>
                                              <li class="dd-item dd-collapsed" data-id="19">
                                                <div class="dd-handle">Transportation and Delivery Expenses</div>
                                                <ol class="dd-list">
                                                  <div class="table-responsive" id="next10">
                                                    <table class="table table-responsive">
                                                      <thead>
                                                        <tr>
                                                          <th class="col-md-5">Item Description</th>
                                                          <th class="col-md-2">Quantity</th>
                                                          <th class="col-md-2">Unit Cost</th>
                                                          <th>Total</th>
                                                          <th class="col-md-1">
                                                            <button type="button" id="addrow10" name="addrow" class="btn btn-primary shadow btn-xs sharp">
                                                              <i class="fas fa-plus"></i>
                                                            </button>
                                                          </th>
                                                        </tr>
                                                      </thead>
                                                    </table>
                                                    <?php
                                                      $id = $_GET['id'];
                                                      $sql = "SELECT * FROM expenses WHERE research_topic_id = '$id' AND category = 'transportation and delivery expenses'";
                                                      $expensesResult = $conn->query($sql);
                                                      while($expensesRow = $expensesResult->fetch_assoc()) {
                                                    ?>
                                                    <div class="table-responsive">
                                                      <table class="table table-responsive">
                                                        <tbody>
                                                          <tr>
                                                            <td style="display: none;">
                                                              <input class="form-control form-control-lg" name="category[]" value="supplies and materials" />
                                                            </td>
                                                            <td class="col-md-5">
                                                              <input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item<?=$expenses?>" value="<?=$expensesRow['item_description']?>">
                                                            </td>
                                                            <td class="col-md-2">
                                                              <input type="number" class="form-control" name="qual[]" id="quantity<?=$expenses?>" onkeyup="quantityfunc(<?=$expenses?>)" value="<?=$expensesRow['quantity']?>">
                                                            </td>
                                                            <td class="col-md-2">
                                                              <input type="number" class="form-control" name="unitCost[]" step="any" id="cost<?=$expenses?>" onkeyup="unitfunc(<?=$expenses?>)" value="<?=$expensesRow['unit_cost']?>">
                                                            </td>
                                                            <td class="netPrice" id="netPrice<?=$expenses?>">₱ <?=$expensesRow['quantity']*$expensesRow['unit_cost']?></td>
                                                            <td style="padding: 0px">
                                                            <th class="col-md-1" style="padding-top: 20px">
                                                              <button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel(<?=$expenses?>)" class="col-md-2">
                                                                <i class="fa fa-trash"></i>
                                                              </button>
                                                            </th>
                                                            </td>
                                                          </tr>
                                                        </tbody>
                                                      </table>
                                                    </div>
                                                    <?php
                                                        $expensesTotal = $expensesTotal + ($expensesRow['quantity']*$expensesRow['unit_cost']);
                                                        $expenses++;
                                                      }
                                                    ?>
                                                  </div>
                                                </ol>
                                              </li>
                                              <li class="dd-item dd-collapsed" data-id="20">
                                                <div class="dd-handle">Subscription Expenses</div>
                                                <ol class="dd-list">
                                                  <div class="table-responsive" id="next11">
                                                    <table class="table table-responsive">
                                                      <thead>
                                                        <tr>
                                                          <th class="col-md-5">Item Description</th>
                                                          <th class="col-md-2">Quantity</th>
                                                          <th class="col-md-2">Unit Cost</th>
                                                          <th>Total</th>
                                                          <th class="col-md-1">
                                                            <button type="button" id="addrow11" name="addrow" class="btn btn-primary shadow btn-xs sharp">
                                                              <i class="fas fa-plus"></i>
                                                            </button>
                                                          </th>
                                                        </tr>
                                                      </thead>
                                                    </table>
                                                    <?php
                                                      $id = $_GET['id'];
                                                      $sql = "SELECT * FROM expenses WHERE research_topic_id = '$id' AND category = 'subscription expenses'";
                                                      $expensesResult = $conn->query($sql);
                                                      while($expensesRow = $expensesResult->fetch_assoc()) {
                                                    ?>
                                                    <div class="table-responsive">
                                                      <table class="table table-responsive">
                                                        <tbody>
                                                          <tr>
                                                            <td style="display: none;">
                                                              <input class="form-control form-control-lg" name="category[]" value="supplies and materials" />
                                                            </td>
                                                            <td class="col-md-5">
                                                              <input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item<?=$expenses?>" value="<?=$expensesRow['item_description']?>">
                                                            </td>
                                                            <td class="col-md-2">
                                                              <input type="number" class="form-control" name="qual[]" id="quantity<?=$expenses?>" onkeyup="quantityfunc(<?=$expenses?>)" value="<?=$expensesRow['quantity']?>">
                                                            </td>
                                                            <td class="col-md-2">
                                                              <input type="number" class="form-control" name="unitCost[]" step="any" id="cost<?=$expenses?>" onkeyup="unitfunc(<?=$expenses?>)" value="<?=$expensesRow['unit_cost']?>">
                                                            </td>
                                                            <td class="netPrice" id="netPrice<?=$expenses?>">₱ <?=$expensesRow['quantity']*$expensesRow['unit_cost']?></td>
                                                            <td style="padding: 0px">
                                                            <th class="col-md-1" style="padding-top: 20px">
                                                              <button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel(<?=$expenses?>)" class="col-md-2">
                                                                <i class="fa fa-trash"></i>
                                                              </button>
                                                            </th>
                                                            </td>
                                                          </tr>
                                                        </tbody>
                                                      </table>
                                                    </div>
                                                    <?php
                                                        $expensesTotal = $expensesTotal + ($expensesRow['quantity']*$expensesRow['unit_cost']);
                                                        $expenses++;
                                                      }
                                                    ?>
                                                  </div>
                                                </ol>
                                              </li>
                                              <li class="dd-item dd-collapsed" data-id="21">
                                                <div class="dd-handle">Professional Services</div>
                                                <ol class="dd-list">
                                                  <li class="dd-item dd-collapsed" data-id="22">
                                                    <div class="dd-handle">Consultancy Services</div>
                                                    <ol class="dd-list">
                                                      <div class="table-responsive" id="next12">
                                                        <table class="table table-responsive">
                                                          <thead>
                                                            <tr>
                                                              <th class="col-md-5">Item Description</th>
                                                              <th class="col-md-2">Quantity</th>
                                                              <th class="col-md-2">Unit Cost</th>
                                                              <th>Total</th>
                                                              <th class="col-md-1">
                                                                <button type="button" id="addrow12" name="addrow" class="btn btn-primary shadow btn-xs sharp">
                                                                  <i class="fas fa-plus"></i>
                                                                </button>
                                                              </th>
                                                            </tr>
                                                          </thead>
                                                        </table>
                                                        <?php
                                                          $id = $_GET['id'];
                                                          $sql = "SELECT * FROM expenses WHERE research_topic_id = '$id' AND category = 'consultancy services'";
                                                          $expensesResult = $conn->query($sql);
                                                          while($expensesRow = $expensesResult->fetch_assoc()) {
                                                        ?>
                                                        <div class="table-responsive">
                                                          <table class="table table-responsive">
                                                            <tbody>
                                                              <tr>
                                                                <td style="display: none;">
                                                                  <input class="form-control form-control-lg" name="category[]" value="supplies and materials" />
                                                                </td>
                                                                <td class="col-md-5">
                                                                  <input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item<?=$expenses?>" value="<?=$expensesRow['item_description']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="qual[]" id="quantity<?=$expenses?>" onkeyup="quantityfunc(<?=$expenses?>)" value="<?=$expensesRow['quantity']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="unitCost[]" step="any" id="cost<?=$expenses?>" onkeyup="unitfunc(<?=$expenses?>)" value="<?=$expensesRow['unit_cost']?>">
                                                                </td>
                                                                <td class="netPrice" id="netPrice<?=$expenses?>">₱ <?=$expensesRow['quantity']*$expensesRow['unit_cost']?></td>
                                                                <td style="padding: 0px">
                                                                <th class="col-md-1" style="padding-top: 20px">
                                                                  <button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel(<?=$expenses?>)" class="col-md-2">
                                                                    <i class="fa fa-trash"></i>
                                                                  </button>
                                                                </th>
                                                                </td>
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                        </div>
                                                        <?php
                                                            $expensesTotal = $expensesTotal + ($expensesRow['quantity']*$expensesRow['unit_cost']);
                                                            $expenses++;
                                                          }
                                                        ?>
                                                      </div>
                                                    </ol>
                                                  </li>
                                                  <li class="dd-item dd-collapsed" data-id="23">
                                                    <div class="dd-handle">General Services</div>
                                                    <ol class="dd-list">
                                                      <div class="table-responsive" id="next13">
                                                        <table class="table table-responsive">
                                                          <thead>
                                                            <tr>
                                                              <th class="col-md-5">Item Description</th>
                                                              <th class="col-md-2">Quantity</th>
                                                              <th class="col-md-2">Unit Cost</th>
                                                              <th>Total</th>
                                                              <th class="col-md-1">
                                                                <button type="button" id="addrow13" name="addrow" class="btn btn-primary shadow btn-xs sharp">
                                                                  <i class="fas fa-plus"></i>
                                                                </button>
                                                              </th>
                                                            </tr>
                                                          </thead>
                                                        </table>
                                                        <?php
                                                          $id = $_GET['id'];
                                                          $sql = "SELECT * FROM expenses WHERE research_topic_id = '$id' AND category = 'general services'";
                                                          $expensesResult = $conn->query($sql);
                                                          while($expensesRow = $expensesResult->fetch_assoc()) {
                                                        ?>
                                                        <div class="table-responsive">
                                                          <table class="table table-responsive">
                                                            <tbody>
                                                              <tr>
                                                                <td style="display: none;">
                                                                  <input class="form-control form-control-lg" name="category[]" value="supplies and materials" />
                                                                </td>
                                                                <td class="col-md-5">
                                                                  <input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item<?=$expenses?>" value="<?=$expensesRow['item_description']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="qual[]" id="quantity<?=$expenses?>" onkeyup="quantityfunc(<?=$expenses?>)" value="<?=$expensesRow['quantity']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="unitCost[]" step="any" id="cost<?=$expenses?>" onkeyup="unitfunc(<?=$expenses?>)" value="<?=$expensesRow['unit_cost']?>">
                                                                </td>
                                                                <td class="netPrice" id="netPrice<?=$expenses?>">₱ <?=$expensesRow['quantity']*$expensesRow['unit_cost']?></td>
                                                                <td style="padding: 0px">
                                                                <th class="col-md-1" style="padding-top: 20px">
                                                                  <button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel(<?=$expenses?>)" class="col-md-2">
                                                                    <i class="fa fa-trash"></i>
                                                                  </button>
                                                                </th>
                                                                </td>
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                        </div>
                                                        <?php
                                                            $expensesTotal = $expensesTotal + ($expensesRow['quantity']*$expensesRow['unit_cost']);
                                                            $expenses++;
                                                          }
                                                        ?>
                                                      </div>
                                                    </ol>
                                                  </li>
                                                  <li class="dd-item dd-collapsed" data-id="24">
                                                    <div class="dd-handle">Other Proffessional Services</div>
                                                    <ol class="dd-list">
                                                      <div class="table-responsive" id="next14">
                                                        <table class="table table-responsive">
                                                          <thead>
                                                            <tr>
                                                              <th class="col-md-5">Item Description</th>
                                                              <th class="col-md-2">Quantity</th>
                                                              <th class="col-md-2">Unit Cost</th>
                                                              <th>Total</th>
                                                              <th class="col-md-1">
                                                                <button type="button" id="addrow14" name="addrow" class="btn btn-primary shadow btn-xs sharp">
                                                                  <i class="fas fa-plus"></i>
                                                                </button>
                                                              </th>
                                                            </tr>
                                                          </thead>
                                                        </table>
                                                        <?php
                                                          $id = $_GET['id'];
                                                          $sql = "SELECT * FROM expenses WHERE research_topic_id = '$id' AND category = 'other professional services'";
                                                          $expensesResult = $conn->query($sql);
                                                          while($expensesRow = $expensesResult->fetch_assoc()) {
                                                        ?>
                                                        <div class="table-responsive">
                                                          <table class="table table-responsive">
                                                            <tbody>
                                                              <tr>
                                                                <td style="display: none;">
                                                                  <input class="form-control form-control-lg" name="category[]" value="supplies and materials" />
                                                                </td>
                                                                <td class="col-md-5">
                                                                  <input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item<?=$expenses?>" value="<?=$expensesRow['item_description']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="qual[]" id="quantity<?=$expenses?>" onkeyup="quantityfunc(<?=$expenses?>)" value="<?=$expensesRow['quantity']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="unitCost[]" step="any" id="cost<?=$expenses?>" onkeyup="unitfunc(<?=$expenses?>)" value="<?=$expensesRow['unit_cost']?>">
                                                                </td>
                                                                <td class="netPrice" id="netPrice<?=$expenses?>">₱ <?=$expensesRow['quantity']*$expensesRow['unit_cost']?></td>
                                                                <td style="padding: 0px">
                                                                <th class="col-md-1" style="padding-top: 20px">
                                                                  <button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel(<?=$expenses?>)" class="col-md-2">
                                                                    <i class="fa fa-trash"></i>
                                                                  </button>
                                                                </th>
                                                                </td>
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                        </div>
                                                        <?php
                                                            $expensesTotal = $expensesTotal + ($expensesRow['quantity']*$expensesRow['unit_cost']);
                                                            $expenses++;
                                                          }
                                                        ?>
                                                      </div>
                                                    </ol>
                                                  </li>
                                                </ol>
                                              </li>
                                              <li class="dd-item dd-collapsed" data-id="25">
                                                <div class="dd-handle">Repairs and Maintenance of Facilities</div>
                                                <ol class="dd-list">
                                                  <li class="dd-item dd-collapsed" data-id="26">
                                                    <div class="dd-handle">IT Equipment and Software</div>
                                                    <ol class="dd-list">
                                                      <div class="table-responsive" id="next15">
                                                        <table class="table table-responsive">
                                                          <thead>
                                                            <tr>
                                                              <th class="col-md-5">Item Description</th>
                                                              <th class="col-md-2">Quantity</th>
                                                              <th class="col-md-2">Unit Cost</th>
                                                              <th>Total</th>
                                                              <th class="col-md-1">
                                                                <button type="button" id="addrow15" name="addrow" class="btn btn-primary shadow btn-xs sharp">
                                                                  <i class="fas fa-plus"></i>
                                                                </button>
                                                              </th>
                                                            </tr>
                                                          </thead>
                                                        </table>
                                                        <?php
                                                          $id = $_GET['id'];
                                                          $sql = "SELECT * FROM expenses WHERE research_topic_id = '$id' AND category = 'it equipment and software'";
                                                          $expensesResult = $conn->query($sql);
                                                          while($expensesRow = $expensesResult->fetch_assoc()) {
                                                        ?>
                                                        <div class="table-responsive">
                                                          <table class="table table-responsive">
                                                            <tbody>
                                                              <tr>
                                                                <td style="display: none;">
                                                                  <input class="form-control form-control-lg" name="category[]" value="supplies and materials" />
                                                                </td>
                                                                <td class="col-md-5">
                                                                  <input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item<?=$expenses?>" value="<?=$expensesRow['item_description']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="qual[]" id="quantity<?=$expenses?>" onkeyup="quantityfunc(<?=$expenses?>)" value="<?=$expensesRow['quantity']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="unitCost[]" step="any" id="cost<?=$expenses?>" onkeyup="unitfunc(<?=$expenses?>)" value="<?=$expensesRow['unit_cost']?>">
                                                                </td>
                                                                <td class="netPrice" id="netPrice<?=$expenses?>">₱ <?=$expensesRow['quantity']*$expensesRow['unit_cost']?></td>
                                                                <td style="padding: 0px">
                                                                <th class="col-md-1" style="padding-top: 20px">
                                                                  <button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel(<?=$expenses?>)" class="col-md-2">
                                                                    <i class="fa fa-trash"></i>
                                                                  </button>
                                                                </th>
                                                                </td>
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                        </div>
                                                        <?php
                                                            $expensesTotal = $expensesTotal + ($expensesRow['quantity']*$expensesRow['unit_cost']);
                                                            $expenses++;
                                                          }
                                                        ?>
                                                      </div>
                                                    </ol>
                                                  </li>
                                                  <li class="dd-item dd-collapsed" data-id="27">
                                                    <div class="dd-handle">Laboratory Equipment</div>
                                                    <ol class="dd-list">
                                                      <div class="table-responsive" id="next16">
                                                        <table class="table table-responsive">
                                                          <thead>
                                                            <tr>
                                                              <th class="col-md-5">Item Description</th>
                                                              <th class="col-md-2">Quantity</th>
                                                              <th class="col-md-2">Unit Cost</th>
                                                              <th>Total</th>
                                                              <th class="col-md-1">
                                                                <button type="button" id="addrow16" name="addrow" class="btn btn-primary shadow btn-xs sharp">
                                                                  <i class="fas fa-plus"></i>
                                                                </button>
                                                              </th>
                                                            </tr>
                                                          </thead>
                                                        </table>
                                                        <?php
                                                          $id = $_GET['id'];
                                                          $sql = "SELECT * FROM expenses WHERE research_topic_id = '$id' AND category = 'laboratory equipment'";
                                                          $expensesResult = $conn->query($sql);
                                                          while($expensesRow = $expensesResult->fetch_assoc()) {
                                                        ?>
                                                        <div class="table-responsive">
                                                          <table class="table table-responsive">
                                                            <tbody>
                                                              <tr>
                                                                <td style="display: none;">
                                                                  <input class="form-control form-control-lg" name="category[]" value="supplies and materials" />
                                                                </td>
                                                                <td class="col-md-5">
                                                                  <input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item<?=$expenses?>" value="<?=$expensesRow['item_description']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="qual[]" id="quantity<?=$expenses?>" onkeyup="quantityfunc(<?=$expenses?>)" value="<?=$expensesRow['quantity']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="unitCost[]" step="any" id="cost<?=$expenses?>" onkeyup="unitfunc(<?=$expenses?>)" value="<?=$expensesRow['unit_cost']?>">
                                                                </td>
                                                                <td class="netPrice" id="netPrice<?=$expenses?>">₱ <?=$expensesRow['quantity']*$expensesRow['unit_cost']?></td>
                                                                <td style="padding: 0px">
                                                                <th class="col-md-1" style="padding-top: 20px">
                                                                  <button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel(<?=$expenses?>)" class="col-md-2">
                                                                    <i class="fa fa-trash"></i>
                                                                  </button>
                                                                </th>
                                                                </td>
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                        </div>
                                                        <?php
                                                            $expensesTotal = $expensesTotal + ($expensesRow['quantity']*$expensesRow['unit_cost']);
                                                            $expenses++;
                                                          }
                                                        ?>
                                                      </div>
                                                    </ol>
                                                  </li>
                                                  <li class="dd-item dd-collapsed" data-id="28">
                                                    <div class="dd-handle">Technical and Scientific Equipment</div>
                                                    <ol class="dd-list">
                                                      <div class="table-responsive" id="next17">
                                                        <table class="table table-responsive">
                                                          <thead>
                                                            <tr>
                                                              <th class="col-md-5">Item Description</th>
                                                              <th class="col-md-2">Quantity</th>
                                                              <th class="col-md-2">Unit Cost</th>
                                                              <th>Total</th>
                                                              <th class="col-md-1">
                                                                <button type="button" id="addrow17" name="addrow" class="btn btn-primary shadow btn-xs sharp">
                                                                  <i class="fas fa-plus"></i>
                                                                </button>
                                                              </th>
                                                            </tr>
                                                          </thead>
                                                        </table>
                                                        <?php
                                                          $id = $_GET['id'];
                                                          $sql = "SELECT * FROM expenses WHERE research_topic_id = '$id' AND category = 'technical and scientific equipment'";
                                                          $expensesResult = $conn->query($sql);
                                                          while($expensesRow = $expensesResult->fetch_assoc()) {
                                                        ?>
                                                        <div class="table-responsive">
                                                          <table class="table table-responsive">
                                                            <tbody>
                                                              <tr>
                                                                <td style="display: none;">
                                                                  <input class="form-control form-control-lg" name="category[]" value="supplies and materials" />
                                                                </td>
                                                                <td class="col-md-5">
                                                                  <input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item<?=$expenses?>" value="<?=$expensesRow['item_description']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="qual[]" id="quantity<?=$expenses?>" onkeyup="quantityfunc(<?=$expenses?>)" value="<?=$expensesRow['quantity']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="unitCost[]" step="any" id="cost<?=$expenses?>" onkeyup="unitfunc(<?=$expenses?>)" value="<?=$expensesRow['unit_cost']?>">
                                                                </td>
                                                                <td class="netPrice" id="netPrice<?=$expenses?>">₱ <?=$expensesRow['quantity']*$expensesRow['unit_cost']?></td>
                                                                <td style="padding: 0px">
                                                                <th class="col-md-1" style="padding-top: 20px">
                                                                  <button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel(<?=$expenses?>)" class="col-md-2">
                                                                    <i class="fa fa-trash"></i>
                                                                  </button>
                                                                </th>
                                                                </td>
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                        </div>
                                                        <?php
                                                            $expensesTotal = $expensesTotal + ($expensesRow['quantity']*$expensesRow['unit_cost']);
                                                            $expenses++;
                                                          }
                                                        ?>
                                                      </div>
                                                    </ol>
                                                  </li>
                                                  <li class="dd-item dd-collapsed" data-id="29">
                                                    <div class="dd-handle">Machineries and Equipment</div>
                                                    <ol class="dd-list">
                                                      <div class="table-responsive" id="next18">
                                                        <table class="table table-responsive">
                                                          <thead>
                                                            <tr>
                                                              <th class="col-md-5">Item Description</th>
                                                              <th class="col-md-2">Quantity</th>
                                                              <th class="col-md-2">Unit Cost</th>
                                                              <th>Total</th>
                                                              <th class="col-md-1">
                                                                <button type="button" id="addrow18" name="addrow" class="btn btn-primary shadow btn-xs sharp">
                                                                  <i class="fas fa-plus"></i>
                                                                </button>
                                                              </th>
                                                            </tr>
                                                          </thead>
                                                        </table>
                                                        <?php
                                                          $id = $_GET['id'];
                                                          $sql = "SELECT * FROM expenses WHERE research_topic_id = '$id' AND category = 'machineries and equipment'";
                                                          $expensesResult = $conn->query($sql);
                                                          while($expensesRow = $expensesResult->fetch_assoc()) {
                                                        ?>
                                                        <div class="table-responsive">
                                                          <table class="table table-responsive">
                                                            <tbody>
                                                              <tr>
                                                                <td style="display: none;">
                                                                  <input class="form-control form-control-lg" name="category[]" value="supplies and materials" />
                                                                </td>
                                                                <td class="col-md-5">
                                                                  <input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item<?=$expenses?>" value="<?=$expensesRow['item_description']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="qual[]" id="quantity<?=$expenses?>" onkeyup="quantityfunc(<?=$expenses?>)" value="<?=$expensesRow['quantity']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="unitCost[]" step="any" id="cost<?=$expenses?>" onkeyup="unitfunc(<?=$expenses?>)" value="<?=$expensesRow['unit_cost']?>">
                                                                </td>
                                                                <td class="netPrice" id="netPrice<?=$expenses?>">₱ <?=$expensesRow['quantity']*$expensesRow['unit_cost']?></td>
                                                                <td style="padding: 0px">
                                                                <th class="col-md-1" style="padding-top: 20px">
                                                                  <button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel(<?=$expenses?>)" class="col-md-2">
                                                                    <i class="fa fa-trash"></i>
                                                                  </button>
                                                                </th>
                                                                </td>
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                        </div>
                                                        <?php
                                                            $expensesTotal = $expensesTotal + ($expensesRow['quantity']*$expensesRow['unit_cost']);
                                                            $expenses++;
                                                          }
                                                        ?>
                                                      </div>
                                                    </ol>
                                                  </li>
                                                  <li class="dd-item dd-collapsed" data-id="30">
                                                    <div class="dd-handle">Others</div>
                                                    <ol class="dd-list">
                                                      <div class="table-responsive" id="next19">
                                                        <table class="table table-responsive">
                                                          <thead>
                                                            <tr>
                                                              <th class="col-md-5">Item Description</th>
                                                              <th class="col-md-2">Quantity</th>
                                                              <th class="col-md-2">Unit Cost</th>
                                                              <th>Total</th>
                                                              <th class="col-md-1">
                                                                <button type="button" id="addrow19" name="addrow" class="btn btn-primary shadow btn-xs sharp">
                                                                  <i class="fas fa-plus"></i>
                                                                </button>
                                                              </th>
                                                            </tr>
                                                          </thead>
                                                        </table>
                                                        <?php
                                                          $id = $_GET['id'];
                                                          $sql = "SELECT * FROM expenses WHERE research_topic_id = '$id' AND category = 'other repairs and maintenance of facilities'";
                                                          $expensesResult = $conn->query($sql);
                                                          while($expensesRow = $expensesResult->fetch_assoc()) {
                                                        ?>
                                                        <div class="table-responsive">
                                                          <table class="table table-responsive">
                                                            <tbody>
                                                              <tr>
                                                                <td style="display: none;">
                                                                  <input class="form-control form-control-lg" name="category[]" value="supplies and materials" />
                                                                </td>
                                                                <td class="col-md-5">
                                                                  <input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item<?=$expenses?>" value="<?=$expensesRow['item_description']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="qual[]" id="quantity<?=$expenses?>" onkeyup="quantityfunc(<?=$expenses?>)" value="<?=$expensesRow['quantity']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="unitCost[]" step="any" id="cost<?=$expenses?>" onkeyup="unitfunc(<?=$expenses?>)" value="<?=$expensesRow['unit_cost']?>">
                                                                </td>
                                                                <td class="netPrice" id="netPrice<?=$expenses?>">₱ <?=$expensesRow['quantity']*$expensesRow['unit_cost']?></td>
                                                                <td style="padding: 0px">
                                                                <th class="col-md-1" style="padding-top: 20px">
                                                                  <button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel(<?=$expenses?>)" class="col-md-2">
                                                                    <i class="fa fa-trash"></i>
                                                                  </button>
                                                                </th>
                                                                </td>
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                        </div>
                                                        <?php
                                                            $expensesTotal = $expensesTotal + ($expensesRow['quantity']*$expensesRow['unit_cost']);
                                                            $expenses++;
                                                          }
                                                        ?>
                                                      </div>
                                                    </ol>
                                                  </li>
                                                </ol>
                                              </li>
                                              <li class="dd-item dd-collapsed" data-id="31">
                                                <div class="dd-handle">Taxes, Duties, Patent, and Licenses</div>
                                                <ol class="dd-list">
                                                  <div class="table-responsive" id="next20">
                                                    <table class="table table-responsive">
                                                      <thead>
                                                        <tr>
                                                          <th class="col-md-5">Item Description</th>
                                                          <th class="col-md-2">Quantity</th>
                                                          <th class="col-md-2">Unit Cost</th>
                                                          <th>Total</th>
                                                          <th class="col-md-1">
                                                            <button type="button" id="addrow20" name="addrow" class="btn btn-primary shadow btn-xs sharp">
                                                              <i class="fas fa-plus"></i>
                                                            </button>
                                                          </th>
                                                        </tr>
                                                      </thead>
                                                    </table>
                                                    <?php
                                                      $id = $_GET['id'];
                                                      $sql = "SELECT * FROM expenses WHERE research_topic_id = '$id' AND category = 'taxes, duties, patent, and licenses'";
                                                      $expensesResult = $conn->query($sql);
                                                      while($expensesRow = $expensesResult->fetch_assoc()) {
                                                    ?>
                                                    <div class="table-responsive">
                                                      <table class="table table-responsive">
                                                        <tbody>
                                                          <tr>
                                                            <td style="display: none;">
                                                              <input class="form-control form-control-lg" name="category[]" value="supplies and materials" />
                                                            </td>
                                                            <td class="col-md-5">
                                                              <input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item<?=$expenses?>" value="<?=$expensesRow['item_description']?>">
                                                            </td>
                                                            <td class="col-md-2">
                                                              <input type="number" class="form-control" name="qual[]" id="quantity<?=$expenses?>" onkeyup="quantityfunc(<?=$expenses?>)" value="<?=$expensesRow['quantity']?>">
                                                            </td>
                                                            <td class="col-md-2">
                                                              <input type="number" class="form-control" name="unitCost[]" step="any" id="cost<?=$expenses?>" onkeyup="unitfunc(<?=$expenses?>)" value="<?=$expensesRow['unit_cost']?>">
                                                            </td>
                                                            <td class="netPrice" id="netPrice<?=$expenses?>">₱ <?=$expensesRow['quantity']*$expensesRow['unit_cost']?></td>
                                                            <td style="padding: 0px">
                                                            <th class="col-md-1" style="padding-top: 20px">
                                                              <button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel(<?=$expenses?>)" class="col-md-2">
                                                                <i class="fa fa-trash"></i>
                                                              </button>
                                                            </th>
                                                            </td>
                                                          </tr>
                                                        </tbody>
                                                      </table>
                                                    </div>
                                                    <?php
                                                        $expensesTotal = $expensesTotal + ($expensesRow['quantity']*$expensesRow['unit_cost']);
                                                        $expenses++;
                                                      }
                                                    ?>
                                                  </div>
                                                </ol>
                                              </li>
                                              <li class="dd-item dd-collapsed" data-id="32">
                                                <div class="dd-handle">Other Maintenance and Operating Expenses</div>
                                                <ol class="dd-list">
                                                  <li class="dd-item dd-collapsed" data-id="33">
                                                    <div class="dd-handle">Advertising Expenses</div>
                                                    <ol class="dd-list">
                                                      <div class="table-responsive" id="next21">
                                                        <table class="table table-responsive">
                                                          <thead>
                                                            <tr>
                                                              <th class="col-md-5">Item Description</th>
                                                              <th class="col-md-2">Quantity</th>
                                                              <th class="col-md-2">Unit Cost</th>
                                                              <th>Total</th>
                                                              <th class="col-md-1">
                                                                <button type="button" id="addrow21" name="addrow" class="btn btn-primary shadow btn-xs sharp">
                                                                  <i class="fas fa-plus"></i>
                                                                </button>
                                                              </th>
                                                            </tr>
                                                          </thead>
                                                        </table>
                                                        <?php
                                                          $id = $_GET['id'];
                                                          $sql = "SELECT * FROM expenses WHERE research_topic_id = '$id' AND category = 'advertising expenses'";
                                                          $expensesResult = $conn->query($sql);
                                                          while($expensesRow = $expensesResult->fetch_assoc()) {
                                                        ?>
                                                        <div class="table-responsive">
                                                          <table class="table table-responsive">
                                                            <tbody>
                                                              <tr>
                                                                <td style="display: none;">
                                                                  <input class="form-control form-control-lg" name="category[]" value="supplies and materials" />
                                                                </td>
                                                                <td class="col-md-5">
                                                                  <input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item<?=$expenses?>" value="<?=$expensesRow['item_description']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="qual[]" id="quantity<?=$expenses?>" onkeyup="quantityfunc(<?=$expenses?>)" value="<?=$expensesRow['quantity']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="unitCost[]" step="any" id="cost<?=$expenses?>" onkeyup="unitfunc(<?=$expenses?>)" value="<?=$expensesRow['unit_cost']?>">
                                                                </td>
                                                                <td class="netPrice" id="netPrice<?=$expenses?>">₱ <?=$expensesRow['quantity']*$expensesRow['unit_cost']?></td>
                                                                <td style="padding: 0px">
                                                                <th class="col-md-1" style="padding-top: 20px">
                                                                  <button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel(<?=$expenses?>)" class="col-md-2">
                                                                    <i class="fa fa-trash"></i>
                                                                  </button>
                                                                </th>
                                                                </td>
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                        </div>
                                                        <?php
                                                            $expensesTotal = $expensesTotal + ($expensesRow['quantity']*$expensesRow['unit_cost']);
                                                            $expenses++;
                                                          }
                                                        ?>
                                                      </div>
                                                    </ol>
                                                  </li>
                                                  <li class="dd-item dd-collapsed" data-id="34">
                                                    <div class="dd-handle">Printing and Binding Expenses</div>
                                                    <ol class="dd-list">
                                                      <div class="table-responsive" id="next22">
                                                        <table class="table table-responsive">
                                                          <thead>
                                                            <tr>
                                                              <th class="col-md-5">Item Description</th>
                                                              <th class="col-md-2">Quantity</th>
                                                              <th class="col-md-2">Unit Cost</th>
                                                              <th>Total</th>
                                                              <th class="col-md-1">
                                                                <button type="button" id="addrow22" name="addrow" class="btn btn-primary shadow btn-xs sharp">
                                                                  <i class="fas fa-plus"></i>
                                                                </button>
                                                              </th>
                                                            </tr>
                                                          </thead>
                                                        </table>
                                                        <?php
                                                          $id = $_GET['id'];
                                                          $sql = "SELECT * FROM expenses WHERE research_topic_id = '$id' AND category = 'printing and binding expenses'";
                                                          $expensesResult = $conn->query($sql);
                                                          while($expensesRow = $expensesResult->fetch_assoc()) {
                                                        ?>
                                                        <div class="table-responsive">
                                                          <table class="table table-responsive">
                                                            <tbody>
                                                              <tr>
                                                                <td style="display: none;">
                                                                  <input class="form-control form-control-lg" name="category[]" value="supplies and materials" />
                                                                </td>
                                                                <td class="col-md-5">
                                                                  <input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item<?=$expenses?>" value="<?=$expensesRow['item_description']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="qual[]" id="quantity<?=$expenses?>" onkeyup="quantityfunc(<?=$expenses?>)" value="<?=$expensesRow['quantity']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="unitCost[]" step="any" id="cost<?=$expenses?>" onkeyup="unitfunc(<?=$expenses?>)" value="<?=$expensesRow['unit_cost']?>">
                                                                </td>
                                                                <td class="netPrice" id="netPrice<?=$expenses?>">₱ <?=$expensesRow['quantity']*$expensesRow['unit_cost']?></td>
                                                                <td style="padding: 0px">
                                                                <th class="col-md-1" style="padding-top: 20px">
                                                                  <button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel(<?=$expenses?>)" class="col-md-2">
                                                                    <i class="fa fa-trash"></i>
                                                                  </button>
                                                                </th>
                                                                </td>
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                        </div>
                                                        <?php
                                                            $expensesTotal = $expensesTotal + ($expensesRow['quantity']*$expensesRow['unit_cost']);
                                                            $expenses++;
                                                          }
                                                        ?>
                                                      </div>
                                                    </ol>
                                                  </li>
                                                </ol>
                                              </li>
                                              <li class="dd-item dd-collapsed" data-id="35">
                                                <div class="dd-handle">Others Financial Charges</div>
                                                <ol class="dd-list">
                                                  <div class="table-responsive" id="next23">
                                                    <table class="table table-responsive">
                                                      <thead>
                                                        <tr>
                                                          <th class="col-md-5">Item Description</th>
                                                          <th class="col-md-2">Quantity</th>
                                                          <th class="col-md-2">Unit Cost</th>
                                                          <th>Total</th>
                                                          <th class="col-md-1">
                                                            <button type="button" id="addrow23" name="addrow" class="btn btn-primary shadow btn-xs sharp">
                                                              <i class="fas fa-plus"></i>
                                                            </button>
                                                          </th>
                                                        </tr>
                                                      </thead>
                                                    </table>
                                                    <?php
                                                          $id = $_GET['id'];
                                                          $sql = "SELECT * FROM expenses WHERE research_topic_id = '$id' AND category = 'other financial charges'";
                                                          $expensesResult = $conn->query($sql);
                                                          while($expensesRow = $expensesResult->fetch_assoc()) {
                                                        ?>
                                                        <div class="table-responsive">
                                                          <table class="table table-responsive">
                                                            <tbody>
                                                              <tr>
                                                                <td style="display: none;">
                                                                  <input class="form-control form-control-lg" name="category[]" value="supplies and materials" />
                                                                </td>
                                                                <td class="col-md-5">
                                                                  <input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item<?=$expenses?>" value="<?=$expensesRow['item_description']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="qual[]" id="quantity<?=$expenses?>" onkeyup="quantityfunc(<?=$expenses?>)" value="<?=$expensesRow['quantity']?>">
                                                                </td>
                                                                <td class="col-md-2">
                                                                  <input type="number" class="form-control" name="unitCost[]" step="any" id="cost<?=$expenses?>" onkeyup="unitfunc(<?=$expenses?>)" value="<?=$expensesRow['unit_cost']?>">
                                                                </td>
                                                                <td class="netPrice" id="netPrice<?=$expenses?>">₱ <?=$expensesRow['quantity']*$expensesRow['unit_cost']?></td>
                                                                <td style="padding: 0px">
                                                                <th class="col-md-1" style="padding-top: 20px">
                                                                  <button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel(<?=$expenses?>)" class="col-md-2">
                                                                    <i class="fa fa-trash"></i>
                                                                  </button>
                                                                </th>
                                                                </td>
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                        </div>
                                                        <?php
                                                            $expensesTotal = $expensesTotal + ($expensesRow['quantity']*$expensesRow['unit_cost']);
                                                            $expenses++;
                                                          }
                                                        ?>
                                                  </div>
                                                </ol>
                                              </li>
                                            </ol>
                                          </li>
                                        </ol>
                                        <div class="card-content">
                                          <div class="nestable">
                                            <div class="dd" id="nestable2">
                                              <ol class="dd-list" style="width: 960px;">
                                                <?php
                                                  $id = $_GET['id'];
                                                  $sql = "SELECT * FROM expenses WHERE category IN ('it equipment and software (coe)', 'machineries', 'communication equipment', 'laboratory equipment (coe)', 'technical and scientific equipment (coe)', 'other coe') AND research_topic_id = '$id'";
                                                  $expensesResult = $conn->query($sql);
                                                  if($expensesRow = $expensesResult->fetch_assoc()) {
                                                    $collapsed = "";
                                                  } else {
                                                    $collapsed = "dd-collapsed";
                                                  }
                                                ?>
                                                <li class="dd-item <?=$collapsed?>" data-id="36">
                                                  <div class="dd-handle" style="font-weight: 600;">Capital OutLay and Equipment (COE)</div>
                                                  <ol class="dd-list">
                                                    <li class="dd-item dd-collapsed" data-id="37">
                                                      <div class="dd-handle">IT Equipment and Software</div>
                                                      <ol class="dd-list">
                                                        <div class="table-responsive" id="next24">
                                                          <table class="table table-responsive">
                                                            <thead>
                                                              <tr>
                                                                <th class="col-md-5">Item Description</th>
                                                                <th class="col-md-2">Quantity</th>
                                                                <th class="col-md-2">Unit Cost</th>
                                                                <th>Total</th>
                                                                <th class="col-md-1">
                                                                  <button type="button" id="addrow24" name="addrow" class="btn btn-primary shadow btn-xs sharp">
                                                                    <i class="fas fa-plus"></i>
                                                                  </button>
                                                                </th>
                                                              </tr>
                                                            </thead>
                                                          </table>
                                                          <?php
                                                            $id = $_GET['id'];
                                                            $sql = "SELECT * FROM expenses WHERE research_topic_id = '$id' AND category = 'it equipment and software (coe)'";
                                                            $expensesResult = $conn->query($sql);
                                                            while($expensesRow = $expensesResult->fetch_assoc()) {
                                                          ?>
                                                          <div class="table-responsive">
                                                            <table class="table table-responsive">
                                                              <tbody>
                                                                <tr>
                                                                  <td style="display: none;">
                                                                    <input class="form-control form-control-lg" name="category[]" value="supplies and materials" />
                                                                  </td>
                                                                  <td class="col-md-5">
                                                                    <input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item<?=$expenses?>" value="<?=$expensesRow['item_description']?>">
                                                                  </td>
                                                                  <td class="col-md-2">
                                                                    <input type="number" class="form-control" name="qual[]" id="quantity<?=$expenses?>" onkeyup="quantityfunc(<?=$expenses?>)" value="<?=$expensesRow['quantity']?>">
                                                                  </td>
                                                                  <td class="col-md-2">
                                                                    <input type="number" class="form-control" name="unitCost[]" step="any" id="cost<?=$expenses?>" onkeyup="unitfunc(<?=$expenses?>)" value="<?=$expensesRow['unit_cost']?>">
                                                                  </td>
                                                                  <td class="netPrice" id="netPrice<?=$expenses?>">₱ <?=$expensesRow['quantity']*$expensesRow['unit_cost']?></td>
                                                                  <td style="padding: 0px">
                                                                  <th class="col-md-1" style="padding-top: 20px">
                                                                    <button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel(<?=$expenses?>)" class="col-md-2">
                                                                      <i class="fa fa-trash"></i>
                                                                    </button>
                                                                  </th>
                                                                  </td>
                                                                </tr>
                                                              </tbody>
                                                            </table>
                                                          </div>
                                                          <?php
                                                              $expensesTotal = $expensesTotal + ($expensesRow['quantity']*$expensesRow['unit_cost']);
                                                              $expenses++;
                                                            }
                                                          ?>
                                                        </div>
                                                      </ol>
                                                    </li>
                                                    <li class="dd-item dd-collapsed" data-id="38">
                                                      <div class="dd-handle">Machineries</div>
                                                      <ol class="dd-list">
                                                        <div class="table-responsive" id="next25">
                                                          <table class="table table-responsive">
                                                            <thead>
                                                              <tr>
                                                                <th class="col-md-5">Item Description</th>
                                                                <th class="col-md-2">Quantity</th>
                                                                <th class="col-md-2">Unit Cost</th>
                                                                <th>Total</th>
                                                                <th class="col-md-1">
                                                                  <button type="button" id="addrow25" name="addrow" class="btn btn-primary shadow btn-xs sharp">
                                                                    <i class="fas fa-plus"></i>
                                                                  </button>
                                                                </th>
                                                              </tr>
                                                            </thead>
                                                          </table>
                                                          <?php
                                                            $id = $_GET['id'];
                                                            $sql = "SELECT * FROM expenses WHERE research_topic_id = '$id' AND category = 'machineries'";
                                                            $expensesResult = $conn->query($sql);
                                                            while($expensesRow = $expensesResult->fetch_assoc()) {
                                                          ?>
                                                          <div class="table-responsive">
                                                            <table class="table table-responsive">
                                                              <tbody>
                                                                <tr>
                                                                  <td style="display: none;">
                                                                    <input class="form-control form-control-lg" name="category[]" value="supplies and materials" />
                                                                  </td>
                                                                  <td class="col-md-5">
                                                                    <input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item<?=$expenses?>" value="<?=$expensesRow['item_description']?>">
                                                                  </td>
                                                                  <td class="col-md-2">
                                                                    <input type="number" class="form-control" name="qual[]" id="quantity<?=$expenses?>" onkeyup="quantityfunc(<?=$expenses?>)" value="<?=$expensesRow['quantity']?>">
                                                                  </td>
                                                                  <td class="col-md-2">
                                                                    <input type="number" class="form-control" name="unitCost[]" step="any" id="cost<?=$expenses?>" onkeyup="unitfunc(<?=$expenses?>)" value="<?=$expensesRow['unit_cost']?>">
                                                                  </td>
                                                                  <td class="netPrice" id="netPrice<?=$expenses?>">₱ <?=$expensesRow['quantity']*$expensesRow['unit_cost']?></td>
                                                                  <td style="padding: 0px">
                                                                  <th class="col-md-1" style="padding-top: 20px">
                                                                    <button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel(<?=$expenses?>)" class="col-md-2">
                                                                      <i class="fa fa-trash"></i>
                                                                    </button>
                                                                  </th>
                                                                  </td>
                                                                </tr>
                                                              </tbody>
                                                            </table>
                                                          </div>
                                                          <?php
                                                              $expensesTotal = $expensesTotal + ($expensesRow['quantity']*$expensesRow['unit_cost']);
                                                              $expenses++;
                                                            }
                                                          ?>
                                                        </div>
                                                      </ol>
                                                    </li>
                                                    <li class="dd-item dd-collapsed" data-id="39">
                                                      <div class="dd-handle">Communication Equipment</div>
                                                      <ol class="dd-list">
                                                        <div class="table-responsive" id="next26">
                                                          <table class="table table-responsive">
                                                            <thead>
                                                              <tr>
                                                                <th class="col-md-5">Item Description</th>
                                                                <th class="col-md-2">Quantity</th>
                                                                <th class="col-md-2">Unit Cost</th>
                                                                <th>Total</th>
                                                                <th class="col-md-1">
                                                                  <button type="button" id="addrow26" name="addrow" class="btn btn-primary shadow btn-xs sharp">
                                                                    <i class="fas fa-plus"></i>
                                                                  </button>
                                                                </th>
                                                              </tr>
                                                            </thead>
                                                          </table>
                                                          <?php
                                                            $id = $_GET['id'];
                                                            $sql = "SELECT * FROM expenses WHERE research_topic_id = '$id' AND category = 'communication expenses'";
                                                            $expensesResult = $conn->query($sql);
                                                            while($expensesRow = $expensesResult->fetch_assoc()) {
                                                          ?>
                                                          <div class="table-responsive">
                                                            <table class="table table-responsive">
                                                              <tbody>
                                                                <tr>
                                                                  <td style="display: none;">
                                                                    <input class="form-control form-control-lg" name="category[]" value="supplies and materials" />
                                                                  </td>
                                                                  <td class="col-md-5">
                                                                    <input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item<?=$expenses?>" value="<?=$expensesRow['item_description']?>">
                                                                  </td>
                                                                  <td class="col-md-2">
                                                                    <input type="number" class="form-control" name="qual[]" id="quantity<?=$expenses?>" onkeyup="quantityfunc(<?=$expenses?>)" value="<?=$expensesRow['quantity']?>">
                                                                  </td>
                                                                  <td class="col-md-2">
                                                                    <input type="number" class="form-control" name="unitCost[]" step="any" id="cost<?=$expenses?>" onkeyup="unitfunc(<?=$expenses?>)" value="<?=$expensesRow['unit_cost']?>">
                                                                  </td>
                                                                  <td class="netPrice" id="netPrice<?=$expenses?>">₱ <?=$expensesRow['quantity']*$expensesRow['unit_cost']?></td>
                                                                  <td style="padding: 0px">
                                                                  <th class="col-md-1" style="padding-top: 20px">
                                                                    <button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel(<?=$expenses?>)" class="col-md-2">
                                                                      <i class="fa fa-trash"></i>
                                                                    </button>
                                                                  </th>
                                                                  </td>
                                                                </tr>
                                                              </tbody>
                                                            </table>
                                                          </div>
                                                          <?php
                                                              $expensesTotal = $expensesTotal + ($expensesRow['quantity']*$expensesRow['unit_cost']);
                                                              $expenses++;
                                                            }
                                                          ?>
                                                        </div>
                                                      </ol>
                                                    </li>
                                                    <li class="dd-item dd-collapsed" data-id="40">
                                                      <div class="dd-handle">Laboratory Equipment</div>
                                                      <ol class="dd-list">
                                                        <div class="table-responsive" id="next27">
                                                          <table class="table table-responsive">
                                                            <thead>
                                                              <tr>
                                                                <th class="col-md-5">Item Description</th>
                                                                <th class="col-md-2">Quantity</th>
                                                                <th class="col-md-2">Unit Cost</th>
                                                                <th>Total</th>
                                                                <th class="col-md-1">
                                                                  <button type="button" id="addrow27" name="addrow" class="btn btn-primary shadow btn-xs sharp">
                                                                    <i class="fas fa-plus"></i>
                                                                  </button>
                                                                </th>
                                                              </tr>
                                                            </thead>
                                                          </table>
                                                          <?php
                                                            $id = $_GET['id'];
                                                            $sql = "SELECT * FROM expenses WHERE research_topic_id = '$id' AND category = 'laboratory equipment (coe)'";
                                                            $expensesResult = $conn->query($sql);
                                                            while($expensesRow = $expensesResult->fetch_assoc()) {
                                                          ?>
                                                          <div class="table-responsive">
                                                            <table class="table table-responsive">
                                                              <tbody>
                                                                <tr>
                                                                  <td style="display: none;">
                                                                    <input class="form-control form-control-lg" name="category[]" value="supplies and materials" />
                                                                  </td>
                                                                  <td class="col-md-5">
                                                                    <input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item<?=$expenses?>" value="<?=$expensesRow['item_description']?>">
                                                                  </td>
                                                                  <td class="col-md-2">
                                                                    <input type="number" class="form-control" name="qual[]" id="quantity<?=$expenses?>" onkeyup="quantityfunc(<?=$expenses?>)" value="<?=$expensesRow['quantity']?>">
                                                                  </td>
                                                                  <td class="col-md-2">
                                                                    <input type="number" class="form-control" name="unitCost[]" step="any" id="cost<?=$expenses?>" onkeyup="unitfunc(<?=$expenses?>)" value="<?=$expensesRow['unit_cost']?>">
                                                                  </td>
                                                                  <td class="netPrice" id="netPrice<?=$expenses?>">₱ <?=$expensesRow['quantity']*$expensesRow['unit_cost']?></td>
                                                                  <td style="padding: 0px">
                                                                  <th class="col-md-1" style="padding-top: 20px">
                                                                    <button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel(<?=$expenses?>)" class="col-md-2">
                                                                      <i class="fa fa-trash"></i>
                                                                    </button>
                                                                  </th>
                                                                  </td>
                                                                </tr>
                                                              </tbody>
                                                            </table>
                                                          </div>
                                                          <?php
                                                              $expensesTotal = $expensesTotal + ($expensesRow['quantity']*$expensesRow['unit_cost']);
                                                              $expenses++;
                                                            }
                                                          ?>
                                                        </div>
                                                      </ol>
                                                    </li>
                                                    <li class="dd-item dd-collapsed" data-id="41">
                                                      <div class="dd-handle">Techinical and Scientific Equipment</div>
                                                      <ol class="dd-list">
                                                        <div class="table-responsive" id="next28">
                                                          <table class="table table-responsive">
                                                            <thead>
                                                              <tr>
                                                                <th class="col-md-5">Item Description</th>
                                                                <th class="col-md-2">Quantity</th>
                                                                <th class="col-md-2">Unit Cost</th>
                                                                <th>Total</th>
                                                                <th class="col-md-1">
                                                                  <button type="button" id="addrow28" name="addrow" class="btn btn-primary shadow btn-xs sharp">
                                                                    <i class="fas fa-plus"></i>
                                                                  </button>
                                                                </th>
                                                              </tr>
                                                            </thead>
                                                          </table>
                                                          <?php
                                                            $id = $_GET['id'];
                                                            $sql = "SELECT * FROM expenses WHERE research_topic_id = '$id' AND category = 'technical and scientific equipment (coe)'";
                                                            $expensesResult = $conn->query($sql);
                                                            while($expensesRow = $expensesResult->fetch_assoc()) {
                                                          ?>
                                                          <div class="table-responsive">
                                                            <table class="table table-responsive">
                                                              <tbody>
                                                                <tr>
                                                                  <td style="display: none;">
                                                                    <input class="form-control form-control-lg" name="category[]" value="supplies and materials" />
                                                                  </td>
                                                                  <td class="col-md-5">
                                                                    <input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item<?=$expenses?>" value="<?=$expensesRow['item_description']?>">
                                                                  </td>
                                                                  <td class="col-md-2">
                                                                    <input type="number" class="form-control" name="qual[]" id="quantity<?=$expenses?>" onkeyup="quantityfunc(<?=$expenses?>)" value="<?=$expensesRow['quantity']?>">
                                                                  </td>
                                                                  <td class="col-md-2">
                                                                    <input type="number" class="form-control" name="unitCost[]" step="any" id="cost<?=$expenses?>" onkeyup="unitfunc(<?=$expenses?>)" value="<?=$expensesRow['unit_cost']?>">
                                                                  </td>
                                                                  <td class="netPrice" id="netPrice<?=$expenses?>">₱ <?=$expensesRow['quantity']*$expensesRow['unit_cost']?></td>
                                                                  <td style="padding: 0px">
                                                                  <th class="col-md-1" style="padding-top: 20px">
                                                                    <button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel(<?=$expenses?>)" class="col-md-2">
                                                                      <i class="fa fa-trash"></i>
                                                                    </button>
                                                                  </th>
                                                                  </td>
                                                                </tr>
                                                              </tbody>
                                                            </table>
                                                          </div>
                                                          <?php
                                                              $expensesTotal = $expensesTotal + ($expensesRow['quantity']*$expensesRow['unit_cost']);
                                                              $expenses++;
                                                            }
                                                          ?>
                                                        </div>
                                                      </ol>
                                                    </li>
                                                    <li class="dd-item dd-collapsed" data-id="42">
                                                      <div class="dd-handle">Others</div>
                                                      <ol class="dd-list">
                                                        <div class="table-responsive" id="next29">
                                                          <table class="table table-responsive">
                                                            <thead>
                                                              <tr>
                                                                <th class="col-md-5">Item Description</th>
                                                                <th class="col-md-2">Quantity</th>
                                                                <th class="col-md-2">Unit Cost</th>
                                                                <th>Total</th>
                                                                <th class="col-md-1">
                                                                  <button type="button" id="addrow29" name="addrow" class="btn btn-primary shadow btn-xs sharp">
                                                                    <i class="fas fa-plus"></i>
                                                                  </button>
                                                                </th>
                                                              </tr>
                                                            </thead>
                                                          </table>
                                                          <?php
                                                            $id = $_GET['id'];
                                                            $sql = "SELECT * FROM expenses WHERE research_topic_id = '$id' AND category = 'other coe'";
                                                            $expensesResult = $conn->query($sql);
                                                            while($expensesRow = $expensesResult->fetch_assoc()) {
                                                          ?>
                                                          <div class="table-responsive">
                                                            <table class="table table-responsive">
                                                              <tbody>
                                                                <tr>
                                                                  <td style="display: none;">
                                                                    <input class="form-control form-control-lg" name="category[]" value="supplies and materials" />
                                                                  </td>
                                                                  <td class="col-md-5">
                                                                    <input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item<?=$expenses?>" value="<?=$expensesRow['item_description']?>">
                                                                  </td>
                                                                  <td class="col-md-2">
                                                                    <input type="number" class="form-control" name="qual[]" id="quantity<?=$expenses?>" onkeyup="quantityfunc(<?=$expenses?>)" value="<?=$expensesRow['quantity']?>">
                                                                  </td>
                                                                  <td class="col-md-2">
                                                                    <input type="number" class="form-control" name="unitCost[]" step="any" id="cost<?=$expenses?>" onkeyup="unitfunc(<?=$expenses?>)" value="<?=$expensesRow['unit_cost']?>">
                                                                  </td>
                                                                  <td class="netPrice" id="netPrice<?=$expenses?>">₱ <?=$expensesRow['quantity']*$expensesRow['unit_cost']?></td>
                                                                  <td style="padding: 0px">
                                                                  <th class="col-md-1" style="padding-top: 20px">
                                                                    <button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel(<?=$expenses?>)" class="col-md-2">
                                                                      <i class="fa fa-trash"></i>
                                                                    </button>
                                                                  </th>
                                                                  </td>
                                                                </tr>
                                                              </tbody>
                                                            </table>
                                                          </div>
                                                          <?php
                                                              $expensesTotal = $expensesTotal + ($expensesRow['quantity']*$expensesRow['unit_cost']);
                                                              $expenses++;
                                                            }
                                                          ?>
                                                        </div>
                                                      </ol>
                                                    </div>
                                                  </li>
                                                </ol>
                                            <hr style="width: 955px;">
                                          </li>
                                        </ol>
                                        </div>
                                      </div>
                                    </div>
                                    <table>
                                      <tfoot>
                                        <tr style="font-size: 24px;">
                                          <th colspan="2">Total:</th>
                                          <th id="total" style="padding-left: 8px">₱ <?=$expensesTotal?></th>
                                        </tr>
                                      </tfoot>
                                    </table>

                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
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
    <script src="vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="js/plugins-init/sweetalert.init.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    <script src="vendor/nestable2/js/jquery.nestable.min.js"></script>
    <script src="js/plugins-init/nestable-init.js"></script>
    <!-- <script src="vendor/nestable2/js/addItems.js"></script> -->
    <script src="js/plugins-init/checkbox.js"></script>
    <script src="js/plugins-init/campus.js"></script>
    <script src="js/plugins-init/errormessage.js"></script>
    <!-- <script src="js/plugins-init/edit.role.js"></script> -->
    <script src="js/plugins-init/campus_college_department.js"></script>
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="js/plugins-init/datatables.init.js"></script>
    <script>
      $(document).ready(function() {
        // SmartWizard initialize
        $('#smartwizard').smartWizard();
      });
    </script>
    <script>

      for(var i = 1; i <= 5; i++) {
        ClassicEditor
          .create( document.querySelector( '#editor'+i ), {
            // plugins: [ Image, /* ... */ ],
            ckfinder:
            {
              uploadUrl: 'fileupload'+i+'.php'
            },
          })
          .then(editor => {
            console.log(editor);
          })
          .catch( error => {
              console.error( error );
          } );
      }
    </script>

    <script>
      <?php
        $id = $_GET['id'];
        $sql = "SELECT COUNT(*) AS total FROM research_representatives WHERE research_topic_id = '$id'";
        $research_representativesResult = $conn->query($sql);
        $research_representativesRow = $research_representativesResult->fetch_assoc();
      ?>
      var role = <?=$research_representativesRow['total']+1?>;
      var member = 1;
      <?php
        $id = $_GET['id'];
        $sql = "SELECT COUNT(*) AS total FROM research_representatives AS rr INNER JOIN representative AS r ON rr.id = r.research_representatives_id WHERE research_topic_id = '$id'";
        $research_representativesResult = $conn->query($sql);
        $research_representativesRow = $research_representativesResult->fetch_assoc();
      ?>
      var memRow = <?=$research_representativesRow['total']+1?>;
      <?php
        $id = $_GET['id'];
        $sql = "SELECT COUNT(*) AS total FROM research_representatives AS rr INNER JOIN research_representatives_responsibilities AS rrr ON rr.id = rrr.research_representatives_id WHERE research_topic_id = '$id'";
        $research_representativesResult = $conn->query($sql);
        $research_representativesRow = $research_representativesResult->fetch_assoc();
      ?>
      var responbilityRow = <?=$research_representativesRow['total']+1?>;
      var selectedRole;
      var total = document.getElementById("total-role").value;

      function addRoles() {
        var newrow = $('#table_roles').append('<div id="role'+role+'"><table class="table header-border table-responsive-sm"><div class="d-flex justify-content-between align-items-center flex-wrap"><div class="col-md-11"><input class="form-control form-control-lg" id="role_description_'+role+'" type="text" placeholder="Role" name="roleName[]"></div><div class="md-1" style="padding-right: 33px;"><button type="button" name="addRole" onclick="removeRole('+role+')" class="btn btn-danger shadow btn-xs sharp"><i class="fas fa-trash"></i></button></div></div><thead><tr><th class="col-md-4" style="text-align: left;">Name</th><th class="col-md-7" style="text-align: left;">Designation</th><th class="col-md-1" style="align-items: center;"><button type="button" name="addRole" class="btn btn-primary shadow btn-xs sharp" data-bs-toggle="modal" data-bs-target=".modal1" onclick="setSelectRole('+role+')"><i class="fas fa-user-plus"></i></button><button style="margin-left:6px;background: white;" type="button" name="addRole" class="btn btn-primary shadow btn-xs sharp" onclick="addCustomMember('+role+')"><i class="fas fa-plus"style="color:#1dbf1d"></i></button></th></tr></thead><tbody id="member'+role+'"></tbody></table><table class="table"><thead><tr><th class="col-md-11" style="text-align: left;">Responsibility</th><th class="col-md-1" style="align-items: center;"><button type="button" name="addRole" class="btn btn-primary shadow btn-xs sharp" data-bs-toggle="modal" onclick="openModal('+role+')" data-bs-target=".responsibility_modal_'+role+'"><i class="fas fa-plus"></i></button><button style="margin-left:6px;background: white;" type="button" name="addRole" class="btn btn-primary shadow btn-xs sharp"  onclick="addCustomResponsibility('+role+')"><i class="fas fa-plus" style="color: #1dbf1d"></i></button></th></tr></thead><tbody id="added_responsibility_list_'+role+'"></tbody></table>');
        
        var xhttp = new XMLHttpRequest();
        var id = "tbody_roles"+role;
        xhttp.onreadystatechange = function(){
          document.getElementById(id).innerHTML = this.responseText;
        };
        xhttp.open("GET", "roles.php?q="+role);
        xhttp.send();

        var newResponsibilityModal = $('#responsibility_modal').append('<div class="modal fade responsibility_modal_'+role+'" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" style="font-size:23px">Add Responsibility</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body" style="padding: 0.875rem"><div class="card-body"><div class="table-responsive"><table class="table header-border table-responsive-sm"><thead><tr><th class="col-md-4" style="text-align: left;">Role</th><th class="col-md-7" style="text-align: left;">Resposibility</th><th class="col-md-1" style="text-align: right;">Action</th></tr></thead><tbody id="responsibility_list_'+role+'"><!-- List Responsibility of Leader --></tbody></table></div></div></div></div></div></div>');

        var totalRoles = document.getElementById('total_roles').value;
        document.getElementById('total_roles'). value = Number(totalRoles) + 1
        role++;
      }

      loadRoles();

      function setSelectRole(q){
        selectedRole = q;
      }

      function loadRoles(){
        var xhttp1 = new XMLHttpRequest();
        xhttp1.onreadystatechange = function(){
          document.getElementById("tbody_roles"+1).innerHTML = this.responseText;
        };
        
        xhttp1.open("GET", "roles.php?q="+1);
        xhttp1.send();
      }

      function addMember(q){
        var name = document.getElementById("name-"+q).innerHTML;
        var desig = document.getElementById("designation-"+q).innerHTML;
        var newrow = $('#member'+selectedRole).append('<tr id="memRow'+memRow+'"><td style="display: none;"><input class="form-control form-control-lg" name="roles_position[]" value="'+selectedRole+'"/></td></td><td><input class="form-control form-control-lg" readonly id="name-'+q+'" name="roles_name[]" value="'+name+'"></td><td><input class="form-control form-control-lg" readonly name="roles_description[]" value="'+desig+'"></td><td><button type="button" name="addRole" onclick="removeMember(\''+memRow+'\',\''+q+'\',\''+selectedRole+'\')" class="btn btn-danger shadow btn-xs sharp"><i class="fas fa-minus"></i></button></td></tr>');
        $('#row-'+q).hide();
        memRow++;
      }

      function addCustomMember(q){
        var newrow = $('#member'+q).append('<tr id="memRow'+memRow+'"><td style="display: none;"><input class="form-control form-control-lg" name="roles_position[]" value="'+q+'"/></td><td><input class="form-control form-control-lg" id="name-0-'+q+'" name="roles_name[]" name="representative_'+memRow+'"></td><td><input class="form-control form-control-lg" name="roles_description[]"></td><td><button type="button" name="addRole" onclick="removeCustomMember(`'+memRow+'`, `'+q+'`)" class="btn btn-danger shadow btn-xs sharp"><i class="fas fa-minus"></i></button></td></tr>');
        memRow++;
      }

      function removeCustomMember(q, w){
        $('#memRow'+q).remove();
      }

      function removeMember(q, t, u){
        $('#row-'+t).show();
        $('#memRow'+q).remove();
      }

      function removeRole(q) {
        for(var i = 1; i <= total; i++){
          var val1 = document.getElementById("name-"+i+"-"+q);
          if(val1){
            $('#row-'+i).show();
          }
        }
        $('#role'+q).remove();
        var totalRoles = document.getElementById('total_roles').value;
        document.getElementById('total_roles'). value = Number(totalRoles) - 1
      }

      function openModal(q) {
        var forRole = "";
        forRole = document.getElementById("role_description_"+q).value;
        var responsiblityList = new XMLHttpRequest();
        responsiblityList.onreadystatechange = function (){
          document.getElementById("responsibility_list_"+q).innerHTML = this.responseText;
          for(var i = 1; i <= 17; i++){
            if(!document.getElementById("responsibility_description_"+i+"_"+q)){
              continue;
            }
            if(document.getElementById("responsibility_description_"+i+"_"+q).value == document.getElementById("list_responsibility_description_"+i+"_"+q).innerHTML){
              $('#list_responsibility_row_'+i+'_'+q).hide();
            }
          }
        };
        responsiblityList.open("GET", "responsibility.php?q="+q+"&forRole="+forRole);
        responsiblityList.send();
      }

      function addResponsibility(q, u){
        var responsibility_description = document.getElementById("list_responsibility_description_"+q+"_"+u).innerHTML;
        var newrow = $('#added_responsibility_list_'+u).append('<tr id="responsibility_row_'+responbilityRow+'"><td style="display: none;"><input class="form-control form-control-lg" name="responsibilities_position[]" value="'+u+'"/></td><td><input class="form-control form-control-lg" readonly id="responsibility_description_'+q+'_'+u+'" name="responsibilities[]" value="'+responsibility_description+'"></td><td><button type="button" class="btn btn-danger shadow btn-xs sharp" onclick="removeResponsibility(\''+responbilityRow+'\', \''+q+'\', \''+u+'\')"><i class="fas fa-minus"></i></button></td></tr>');
        $('#list_responsibility_row_'+q+'_'+u).hide();
        responbilityRow++;
      }

      function addCustomResponsibility(q) {
        var newrow = $('#added_responsibility_list_'+q).append('<tr id="responsibility_row_'+responbilityRow+'"><td style="display: none;"><input class="form-control form-control-lg" name="responsibilities_position[]" value="'+q+'"/></td><td><input class="form-control form-control-lg" id="responsibility_description_0_'+q+'" name="responsibilities[]"></td><td><button type="button" class="btn btn-danger shadow btn-xs sharp" onclick="removeCustomResponsibility('+responbilityRow+')"><i class="fas fa-minus"></i></button></td></tr>');
        responbilityRow++;
      }

      function removeCustomResponsibility(q) {
        $('#responsibility_row_'+q).remove();
      }

      function removeResponsibility(row, q, u) {
        $('#list_responsibility_row_'+q+'_'+u).show();
        $('#responsibility_row_'+row).remove();
      }
    </script>

    <script>
      <?php
        $id = $_GET['id'];
        $sql = "SELECT COUNT(*) AS total FROM expenses WHERE research_topic_id = '$id'";
        $expensesResult = $conn->query($sql);
        $expensesRow = $expensesResult->fetch_assoc();
      ?>
      var i = <?=$expensesRow['total']?>;
      var total = <?=$expensesTotal?>;
      $('#addrow1').click(function(){
        // var length = $('').length;
        // // alert(length);
        // var i = parseInt(length)+parseInt(1);
        var newrow = $('#next1').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="local"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
        i++;
      });
      $('body').on('click','.btn-danger',function(){
        $(this).closest('div').remove()
      });


      $('#addrow2').click(function(){
        // var length = $('').length;
        // // alert(length);
        // var i = parseInt(length)+parseInt(1);
        var newrow = $('#next2').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="foreign"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
        i++;
      });
      $('body').on('click','.btn-danger',function(){
        $(this).closest('div').remove()
      });


      $('#addrow3').click(function(){
        // var length = $('').length;
        // // alert(length);
        // var i = parseInt(length)+parseInt(1);
        var newrow = $('#next3').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="training expenses"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
        i++;
      });
      $('body').on('click','.btn-danger',function(){
        $(this).closest('div').remove()
      });


      $('#addrow4').click(function(){
        // var length = $('').length;
        // // alert(length);
        // var i = parseInt(length)+parseInt(1);
        var newrow = $('#next4').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="supplies and materials"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
        i++;
      });
      $('body').on('click','.btn-danger',function(){
        $(this).closest('div').remove()
      });


      $('#addrow5').click(function(){
        // var length = $('').length;
        // // alert(length);
        // var i = parseInt(length)+parseInt(1);
        var newrow = $('#next5').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="postage and deliveries"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
        i++;
      });
      $('body').on('click','.btn-danger',function(){
        $(this).closest('div').remove()
      });


      $('#addrow6').click(function(){
        // var length = $('').length;
        // // alert(length);
        // var i = parseInt(length)+parseInt(1);
        var newrow = $('#next6').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="telephone expenses"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
        i++;
      });
      $('body').on('click','.btn-danger',function(){
        $(this).closest('div').remove()
      });


      $('#addrow7').click(function(){
        // var length = $('').length;
        // // alert(length);
        // var i = parseInt(length)+parseInt(1);
        var newrow = $('#next7').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="internet expenses"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
        i++;
      });
      $('body').on('click','.btn-danger',function(){
        $(this).closest('div').remove()
      });


      $('#addrow8').click(function(){
        // var length = $('').length;
        // // alert(length);
        // var i = parseInt(length)+parseInt(1);
        var newrow = $('#next8').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="other communication expenses"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
        i++;
      });
      $('body').on('click','.btn-danger',function(){
        $(this).closest('div').remove()
      });


      $('#addrow9').click(function(){
        // var length = $('').length;
        // // alert(length);
        // var i = parseInt(length)+parseInt(1);
        var newrow = $('#next9').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="rent expenses"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
        i++;
      });
      $('body').on('click','.btn-danger',function(){
        $(this).closest('div').remove()
      });


      $('#addrow10').click(function(){
        // var length = $('').length;
        // // alert(length);
        // var i = parseInt(length)+parseInt(1);
        var newrow = $('#next10').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="transportation and delivery expenses"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
        i++;
      });
      $('body').on('click','.btn-danger',function(){
        $(this).closest('div').remove()
      });

      $('#addrow11').click(function(){
        // var length = $('').length;
        // // alert(length);
        // var i = parseInt(length)+parseInt(1);
        var newrow = $('#next11').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="subscription expenses"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
        i++;
      });
      $('body').on('click','.btn-danger',function(){
        $(this).closest('div').remove()
      });


      $('#addrow12').click(function(){
        // var length = $('').length;
        // // alert(length);
        // var i = parseInt(length)+parseInt(1);
        var newrow = $('#next12').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="consultancy services"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
        i++;
      });
      $('body').on('click','.btn-danger',function(){
        $(this).closest('div').remove()
      });


      $('#addrow13').click(function(){
        // var length = $('').length;
        // // alert(length);
        // var i = parseInt(length)+parseInt(1);
        var newrow = $('#next13').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="general services"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
        i++;
      });
      $('body').on('click','.btn-danger',function(){
        $(this).closest('div').remove()
      });


      $('#addrow14').click(function(){
        // var length = $('').length;
        // // alert(length);
        // var i = parseInt(length)+parseInt(1);
        var newrow = $('#next14').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="other professional services"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
        i++;
      });
      $('body').on('click','.btn-danger',function(){
        $(this).closest('div').remove()
      });


      $('#addrow15').click(function(){
        // var length = $('').length;
        // // alert(length);
        // var i = parseInt(length)+parseInt(1);
        var newrow = $('#next15').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="it equipment and software"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
        i++;
      });
      $('body').on('click','.btn-danger',function(){
        $(this).closest('div').remove()
      });


      $('#addrow16').click(function(){
        // var length = $('').length;
        // // alert(length);
        // var i = parseInt(length)+parseInt(1);
        var newrow = $('#next16').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="laboratory equipment"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
        i++;
      });
      $('body').on('click','.btn-danger',function(){
        $(this).closest('div').remove()
      });


      $('#addrow17').click(function(){
        // var length = $('').length;
        // // alert(length);
        // var i = parseInt(length)+parseInt(1);
        var newrow = $('#next17').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="technical and scientific equipment"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
        i++;
      });
      $('body').on('click','.btn-danger',function(){
        $(this).closest('div').remove()
      });


      $('#addrow18').click(function(){
        // var length = $('').length;
        // // alert(length);
        // var i = parseInt(length)+parseInt(1);
        var newrow = $('#next18').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="machineries and equipment"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
        i++;
      });
      $('body').on('click','.btn-danger',function(){
        $(this).closest('div').remove()
      });


      $('#addrow19').click(function(){
        // var length = $('').length;
        // // alert(length);
        // var i = parseInt(length)+parseInt(1);
        var newrow = $('#next19').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="other repairs and maintenance of facilities"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
        i++;
      });
      $('body').on('click','.btn-danger',function(){
        $(this).closest('div').remove()
      });


      $('#addrow20').click(function(){
        // var length = $('').length;
        // // alert(length);
        // var i = parseInt(length)+parseInt(1);
        var newrow = $('#next20').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="taxes, duties, patent, and licenses"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
        i++;
      });
      $('body').on('click','.btn-danger',function(){
        $(this).closest('div').remove()
      });


      $('#addrow21').click(function(){
        // var length = $('').length;
        // // alert(length);
        // var i = parseInt(length)+parseInt(1);
        var newrow = $('#next21').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="advertising expenses"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
        i++;
      });
      $('body').on('click','.btn-danger',function(){
        $(this).closest('div').remove()
      });


      $('#addrow22').click(function(){
        // var length = $('').length;
        // // alert(length);
        // var i = parseInt(length)+parseInt(1);
        var newrow = $('#next22').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="printing and binding expenses"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
        i++;
      });
      $('body').on('click','.btn-danger',function(){
        $(this).closest('div').remove()
      });


      $('#addrow23').click(function(){
        // var length = $('').length;
        // // alert(length);
        // var i = parseInt(length)+parseInt(1);
        var newrow = $('#next23').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="other financial charges"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
        i++;
      });
      $('body').on('click','.btn-danger',function(){
        $(this).closest('div').remove()
      });


      $('#addrow24').click(function(){
        // var length = $('').length;
        // // alert(length);
        // var i = parseInt(length)+parseInt(1);
        var newrow = $('#next24').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="it equipment and software (coe)"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
        i++;
      });
      $('body').on('click','.btn-danger',function(){
        $(this).closest('div').remove()
      });


      $('#addrow25').click(function(){
        // var length = $('').length;
        // // alert(length);
        // var i = parseInt(length)+parseInt(1);
        var newrow = $('#next25').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="machineries"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
        i++;
      });
      $('body').on('click','.btn-danger',function(){
        $(this).closest('div').remove()
      });


      $('#addrow26').click(function(){
        // var length = $('').length;
        // // alert(length);
        // var i = parseInt(length)+parseInt(1);
        var newrow = $('#next26').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="communication equipment"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
        i++;
      });
      $('body').on('click','.btn-danger',function(){
        $(this).closest('div').remove()
      });


      $('#addrow27').click(function(){
        // var length = $('').length;
        // // alert(length);
        // var i = parseInt(length)+parseInt(1);
        var newrow = $('#next27').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="laboratory equipment (coe)"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
        i++;
      });
      $('body').on('click','.btn-danger',function(){
        $(this).closest('div').remove()
      });


      $('#addrow28').click(function(){
        // var length = $('').length;
        // // alert(length);
        // var i = parseInt(length)+parseInt(1);
        var newrow = $('#next28').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="technical and scientific equipment (coe)"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
        i++;
      });
      $('body').on('click','.btn-danger',function(){
        $(this).closest('div').remove()
      });


      $('#addrow29').click(function(){
        // var length = $('').length;
        // // alert(length);
        // var i = parseInt(length)+parseInt(1);
        var newrow = $('#next29').append('<div class="table-responsive"><table class="table table-responsive"><tbody><tr><td style="display: none;"><input class="form-control form-control-lg" name="category[]" value="other coe"/></td><td class="col-md-5"><input type="text" class="form-control" placeholder="Item Description" name="itemDescription[]" id="item'+i+'"></td><td class="col-md-2"><input type="number" class="form-control" name="qual[]" id="quantity'+i+'" onkeyup="quantityfunc('+i+')"></td><td class="col-md-2"><input type="number" class="form-control" name="unitCost[]" step="any" id="cost'+i+'" onkeyup="unitfunc('+i+')"></td><td class="netPrice" id="netPrice'+i+'">0</td><td style="padding: 0px"><th class="col-md-1" style="padding-top: 20px"><button type="button" value="Remove" id="remove" class="btn btn-danger shadow btn-xs sharp" onclick="BtnDel('+i+')" class="col-md-2"><i class="fa fa-trash"></i></button></th></td></tr></tbody></table></div></div>');
        i++;
      });
      $('body').on('click','.btn-danger',function(){
        $(this).closest('div').remove()
      });


      // var total = document.getElementById("total");
      // var netPrice = document.getElementsByClassName("netPrice");


      // function quantityfunc(q){
      //  var quantityValue = document.getElementById("quantity"+q).value;
      //  var unitValue = document.getElementById("cost"+q).value;
      //  if(quantityValue == null && unitValue == null){
      //    return;
      //  }
      //  document.getElementById("netPrice"+q).innerHTML = quantityValue * unitValue;
      //  var k = 0;
      //  total = 0;
      //  while(k < i) {
      //    if(document.getElementById("netPrice"+k) == null){
      //      k++;
      //      continue;
      //    }
      //    total += parseInt(document.getElementById("netPrice"+k).innerHTML);
      //    console.log(total);
      //    k++;
      //  }
      // }

      // function unitfunc(q){
      //  var quantityValue = document.getElementById("quantity"+q).value;
      //  var unitValue = document.getElementById("cost"+q).value;
      //  if(quantityValue == null && unitValue == null){
      //    return;
      //  }
      //  document.getElementById("netPrice"+q).innerHTML = quantityValue * unitValue;
      //  var k = 0;
      //  total = 0;
      //  while(k < i) {
      //    if(document.getElementById("netPrice"+k) == null){
      //      k++;
      //      continue;
      //    }
      //    total += parseInt(document.getElementById("netPrice"+k).innerHTML);
      //    console.log(total);
      //    k++;
      //  }
      //  document.getElementById("total").innerHTML = total;
      // }


      // function BtnDel(q){
      //  var k = 0;
      //  total = 0;
      //  while(k < i) {
      //    if(document.getElementById("netPrice"+k) == null || k == q){
      //      k++;
      //      continue;
      //    }
      //    total += parseInt(document.getElementById("netPrice"+k).innerHTML);
      //    console.log(total);
      //    k++;
      //  }
      //  document.getElementById("total").innerHTML = total;
      // }

      function formatWithPesoSign(value) {
          // Add a comma as a thousands separator and the peso sign
          return '₱ ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      }

      function quantityfunc(q) {
          var quantityValue = document.getElementById("quantity" + q).value;
          var unitValue = document.getElementById("cost" + q).value;
          if (quantityValue == null && unitValue == null) {
              return;
          }
          var netPriceValue = quantityValue * unitValue;
          document.getElementById("netPrice" + q).innerHTML = formatWithPesoSign(netPriceValue);
          var k = 0;
          total = 0;
          while (k <= i) {
              if (document.getElementById("netPrice" + k) == null) {
                  k++;
                  continue;
              }
              total += parseInt(document.getElementById("netPrice" + k).innerHTML.replace('₱', '').replace(/,/g, ''));
              console.log(total);
              k++;
          }
          document.getElementById("total").innerHTML = formatWithPesoSign(total);
      }

      function unitfunc(q) {
          var quantityValue = document.getElementById("quantity" + q).value;
          var unitValue = document.getElementById("cost" + q).value;
          if (quantityValue == null && unitValue == null) {
              return;
          }
          var netPriceValue = quantityValue * unitValue;
          document.getElementById("netPrice" + q).innerHTML = formatWithPesoSign(netPriceValue);
          var k = 0;
          total = 0;
          while (k <= i) {
              if (document.getElementById("netPrice" + k) == null) {
                  k++;
                  continue;
              }
              total += parseInt(document.getElementById("netPrice" + k).innerHTML.replace('₱', '').replace(/,/g, ''));
              console.log(total);
              k++;
          }
          document.getElementById("total").innerHTML = formatWithPesoSign(total);
      }

      function BtnDel(q) {
          var k = 0;
          total = 0;
          while (k < i) {
              if (document.getElementById("netPrice" + k) == null || k == q) {
                  k++;
                  continue;
              }
              total += parseInt(document.getElementById("netPrice" + k).innerHTML.replace('₱', '').replace(/,/g, ''));
              console.log(total);
              k++;
          }
          document.getElementById("total").innerHTML = formatWithPesoSign(total);
      }

    </script>

  <script>
    document.getElementById("partnership").addEventListener("change", function() {
      var agency = document.getElementById('agency');
      if(this.value == 'Institutionaly Funded') {
        agency.value = "Batangas State University The National Engineering University";
        agency.setAttribute("readonly", "");
      } else {
        agency.value = "";
        agency.removeAttribute("readonly", "");
      }
    })
  </script>
    <script>
    // Get the current date in the format YYYY-MM-DD
    var currentDate = new Date().toISOString().split('T')[0];

    // Set the min attribute of the date input to the current date
    document.getElementById('startdate').min = currentDate;
</script>
 <script>
    // Get the current date in the format YYYY-MM-DD
    var currentDate = new Date().toISOString().split('T')[0];

    // Set the min attribute of the date input to the current date
    document.getElementById('enddate').min = currentDate;
</script>
  </body>
</html>