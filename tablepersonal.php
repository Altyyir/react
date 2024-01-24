<?php 
session_start();

$user_id = $_SESSION['user_id'];

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


    if(isset($_GET['id']))
        {
            $id = $_GET['id'];
        
                $query = "DELETE FROM personal_profile WHERE id='$id'";
                $query_run = mysqli_query($conn, $query);
        
                if($query_run)
                {
                    echo '';
        
                }
                else
                {
                        echo '';
                }
        }
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {  
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

    if(!$row = $result->fetch_assoc()) {
      $sql = "INSERT INTO personal_profile (title_profile, lastname, firstname,middlename, dateofbirth, placeofbirth, civilstatus, gender, citizenship, mobileno, emailprimary, emailsecondary, region, province, barangay, sss, zipcode, profile_pic, added_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
      $stmt = mysqli_prepare($conn, $sql);

      if ($stmt) {
          mysqli_stmt_bind_param($stmt, "sssssssssssssssssss", $title_profile, $lastname, $firstname, $middlename, $dateofbirth, $placeofbirth, $civilstatus, $gender, $citizenship, $mobileno, $emailprimary, $emailsecondary, $region, $province, $barangay, $sss, $zipcode, $targetFile, $user_id);
          if (mysqli_stmt_execute($stmt)) {
              header("location: tablepersonal.php"); 
          } else {
              // Insert failed
          }
          mysqli_stmt_close($stmt);
          exit();
      }
    } else {
      if(isset($_FILES["profile-pic"]) && $_FILES["profile-pic"]["error"] == UPLOAD_ERR_OK) {
        unlink($row['profile_pic']);
        $sql = "UPDATE `personal_profile` SET `title_profile`= ?,`lastname`= ?,`firstname`= ?,`middlename`= ?,`dateofbirth`= ?,`placeofbirth`= ?,`civilstatus`= ?,`gender`= ?,`citizenship`= ?,`mobileno`= ?,`emailprimary`= ?,`emailsecondary`= ?,`region`= ?,`province`= ?,`barangay`= ?,`sss`= ?,`zipcode`= ?,`profile_pic`= ? WHERE `added_by` = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if($stmt) {
          mysqli_stmt_bind_param($stmt, "sssssssssssssssssss", $title_profile, $lastname, $firstname, $middlename, $dateofbirth, $placeofbirth, $civilstatus, $gender, $citizenship, $mobileno, $emailprimary, $emailsecondary, $region, $province, $barangay, $sss, $zipcode, $targetFile, $user_id);
          if (mysqli_stmt_execute($stmt)) {
              header("location: tablepersonal.php"); 
          } else {
              // Insert failed
          }
          mysqli_stmt_close($stmt);
        }
      } else {
        $sql = "UPDATE `personal_profile` SET `title_profile`= ?,`lastname`= ?,`firstname`= ?,`middlename`= ?,`dateofbirth`= ?,`placeofbirth`= ?,`civilstatus`= ?,`gender`= ?,`citizenship`= ?,`mobileno`= ?,`emailprimary`= ?,`emailsecondary`= ?,`region`= ?,`province`= ?,`barangay`= ?,`sss`= ?,`zipcode`= ? WHERE `added_by` = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if($stmt) {
          mysqli_stmt_bind_param($stmt, "ssssssssssssssssss", $title_profile, $lastname, $firstname, $middlename, $dateofbirth, $placeofbirth, $civilstatus, $gender, $citizenship, $mobileno, $emailprimary, $emailsecondary, $region, $province, $barangay, $sss, $zipcode, $user_id);
          if (mysqli_stmt_execute($stmt)) {
              header("location: tablepersonal.php"); 
          } else {
              // Insert failed
          }
          mysqli_stmt_close($stmt);
        }
      }
    }             
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
  <title>Faculty Researcher</title>
  
  <!-- FAVICONS ICON -->
  <link rel="shortcut icon" type="image/jpg" href="images/bsu.png">
  <link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
  <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
    <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

  
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
                              
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
              <li class="nav-item d-flex align-items-center">
                <div class="input-group search-area">
                  <input type="text" class="form-control" placeholder="Explore ReAcT">
                  <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
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
                      <li>
                      </li>
                    </ul>
                  </div>
                  <a class="all-notification" href="javascript:void(0);">See all notifications <i class="ti-arrow-end"></i></a>
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
                    <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    <span class="ms-2">Profile </span>
                  </a>
                  <a href="logout.php" class="dropdown-item ai-icon">
                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
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
            <!-- row -->
            <div class="container-fluid">
                

                <div class="row">
                    <div class="col-xl-12">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <div class="input-group contacts-search mb-4">
<!--                                <input type="text" class="form-control" placeholder="Search here...">
                                <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span> -->
                            </div>
                                <div class="mb-4">
                                    <a href="personalprofiles.php" type="button" class="btn btn-primary btn-rounded fs-16"><i class="fas fa-plus me-3 scale4" style="color: #fff;"></i>Add 1 Personal Profile</a>
                                  </div>
                            </div>
                        </div>
                    </div>              
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example5" class="display">
                                    <thead>
                                        <tr>
                                            <th class="col-md-3"><strong>Name</strong></th>
                                            <th class="col-md-3" style="text-align: center;"><strong>Email</strong></th>
                                            <th class="col-md-3" style="text-align: center;"><strong>Mobile No.</strong></th>
                                            <th class="col-md-2" style="text-align: center;"><strong>Action</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $query = "SELECT * FROM personal_profile WHERE added_by = $user_id ORDER BY `id` DESC";
                                            $result = mysqli_query($conn, $query);
                                            $count = 1;
                                            while($row = mysqli_fetch_array($result)) {
                                         ?>                                       
                                        <tr>
                                           <td class="col-md-3"><?php echo $row["title_profile"].' '.$row["firstname"] . ' ' . $row["middlename"] . ' ' . $row["lastname"]; ?></td>
                                          <td class="col-md-3" style="text-align: center;"><?php echo $row["emailprimary"]?></td>
                                            <td class="col-md-3" style="text-align: center;"><?php echo $row["mobileno"]?></td>
                                            <td class="col-md-2" style="text-align: center;">
                                                <a href="#" class="btn btn-dark shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" title='Update'><i class="fas fa-pencil-alt"></i></a>
                                                <a onclick="deleteRecord(`<?=$row['id']?>`)" class="btn btn-dark shadow btn-xs sharp me-1" title='Delete'><i class="fas fa-trash"></i></a>
                                                <a href="personalpdf.php?id=<?php echo $row['id'] ?>" target="_blank" class="btn btn-dark shadow btn-xs sharp me-1" name="approve" value="approve" ><i class="fas fa-cloud-download-alt" title='Technical CV'></i></a>
                                        </td>
                                        <div class="modal fade bd-example-modal-lg">
                                                        <div class="modal-dialog modal-lg ">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" style="font-size: 23px">Update Personal Profile</h5>
                                                                </div>
                                                                <div class="modal-body" style="overflow-y: scroll; max-height: calc(100vh - 200px);">
                                                                    <div class="card-body">
                                                                     <form method="post" action="#" enctype="multipart/form-data">
                                                                        <div class="row mb-3">
                                                                          <div class="col-3 text-end">
                                                                            <img class="profile-pic" id="profile-pic" src="<?php if($row) {echo $row['profile_pic'];} else {echo "#";}?>" width="170" height="170">
                                                                          </div>

                                                                          <div class="col-9 px-5">
                                                                            <div class="row">
                                                                              <h3>Upload photo</h3>
                                                                              <p class="pt-5">*Photo must be 2x2 colored with white background (photo will be used on Membership ID)</p>
                                                                              <input type="file" class="form-control form-control-lg" id="validationCustom04" rows="5" name="profile-pic" style="padding-top: 10px;" accept=".jpg, .png, .jpeg" multiple onchange="displayImage(event)">
                                                                            </div>
                                                                         </div>
                                                                        </div>

                                                                          <div class="row">
                                                                            <div class="col-lg-3 mb-3">
                                                                                <label class="form-label">Title <span class="text-danger">*</span>
                                                                                </label>
                                                                                <select id="inputState" class="default-select form-control default-select wide" name="title_profile" >
                                                                                  <option>Select Title</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Mr.") {echo "selected";}?>>Mr.</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Mrs.") {echo "selected";}?>>Mrs.</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Ms.") {echo "selected";}?>>Ms.</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Dr.") {echo "selected";}?>>Dr.</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "NS") {echo "selected";}?>>NS</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Prof.") {echo "selected";}?>>Prof.</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Rev.") {echo "selected";}?>>Rev.</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Engr.") {echo "selected";}?>>Engr.</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Capt.") {echo "selected";}?>>Capt.</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Mayor") {echo "selected";}?>>Mayor</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Lt.-Col.") {echo "selected";}?>>Lt.-Col.</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Col.") {echo "selected";}?>>Col.</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Lady") {echo "selected";}?>>Lady</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Lt.-Cmdr.") {echo "selected";}?>>Lt.-Cmdr.</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "The Hon.") {echo "selected";}?>>The Hon.</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Cmdr.") {echo "selected";}?>>Cmdr.</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Flt. Lt.") {echo "selected";}?>>Flt. Lt.</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Brgdr.") {echo "selected";}?>>Brgdr.</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Judge") {echo "selected";}?>>Judge</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "The Hon. Mrs") {echo "selected";}?>>The Hon. Mrs</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Wng. Cmdr.") {echo "selected";}?>>Wng. Cmdr.</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Group Capt.") {echo "selected";}?>>Group Capt.</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Rt. Hon. Lord") {echo "selected";}?>>Rt. Hon. Lord</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Revd Father") {echo "selected";}?>>Revd Father</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Revd Canon") {echo "selected";}?>>Revd Canon</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Maj. Gen.") {echo "selected";}?>>Maj. Gen.</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Air Cdre.") {echo "selected";}?>>Air Cdre.</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Viscount") {echo "selected";}?>>Viscount</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Dame") {echo "selected";}?>>Dame</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Rear Admrl.") {echo "selected";}?>>Rear Admrl.</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Asc prof") {echo "selected";}?>>Asc prof</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Fr.") {echo "selected";}?>>Fr.</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Sen.") {echo "selected";}?>>Sen.</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Sec.") {echo "selected";}?>>Sec.</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Asst. Prof.") {echo "selected";}?>>Asst. Prof.</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Sr.") {echo "selected";}?>>Sr.</option>
                                                                                  <option <?php if($row && $row['title_profile'] == "Sir") {echo "selected";}?>>Sir</option>
                                                                                </select>
                                                                              </div>
                                                                              <div class="col-md-3 mb-3">
                                                                                <label class="form-label ">Last Name <span class="text-danger">*</span>
                                                                                </label>
                                                                                 <input class="form-control form-control-lg" id="validationCustom04" rows="5" placeholder="Last Name"  name="lastname" required value="<?php if($row) {echo $row['lastname'];} else {echo "";}?>"></input>
                                                                              </div>
                                                                              <div class="col-lg-3 mb-3">
                                                                                <label class="form-label ">First Name <span class="text-danger">*</span>
                                                                                </label>
                                                                                 <input class="form-control form-control-lg" id="validationCustom04" rows="5" placeholder="First Name"  name="firstname"  required value="<?php if($row) {echo $row['firstname'];} else {echo "";}?>"></input>
                                                                              </div>
                                                                              <div class="col-lg-3 mb-3">
                                                                                <label class="form-label ">Middle Name 
                                                                                </label>
                                                                                 <input class="form-control form-control-lg" id="validationCustom04" rows="5" placeholder="Middle Name"  name="middlename" value="<?php if($row) {echo $row['middlename'];} else {echo "";}?>"></input>
                                                                              </div>
                                                                              <div class="col-lg-3 mb-3">
                                                                                <label class="form-label">Date of birth <span class="text-danger">*</span>
                                                                                </label>
                                                                                <input type="date" class="form-control form-control-lg" name="dateofbirth" required value="<?php if($row) {echo $row['dateofbirth'];} else {echo "";}?>">
                                                                              </div>
                                                                              <div class="col-lg-9 mb-3">
                                                                                <label class="form-label ">Place of Birth <span class="text-danger">*</span>
                                                                                </label>
                                                                                 <input class="form-control form-control-lg" id="validationCustom04" rows="5" placeholder="Place of Birth"  name="placeofbirth" value="<?php if($row) {echo $row['placeofbirth'];} else {echo "";}?>"></input>
                                                                              </div>
                                                                              <div class="col-lg-3 mb-3">
                                                                                <label class="form-label">Civil Status <span class="text-danger">*</span>
                                                                                </label>
                                                                              <select id="inputState" class="default-select form-control default-select wide" name="civilstatus" required>
                                                                                    <option>Choose Civil Status</option>
                                                                                    <option <?php if($row && $row['civilstatus'] == "Single") {echo "selected";}?>>Single</option>
                                                                                    <option <?php if($row && $row['civilstatus'] == "Married") {echo "selected";}?>>Married</option>
                                                                                    <option <?php if($row && $row['civilstatus'] == "Seperated") {echo "selected";}?>>Seperated</option>
                                                                                    <option <?php if($row && $row['civilstatus'] == "Widow") {echo "selected";}?>>Widow</option>
                                                                                    <option <?php if($row && $row['civilstatus'] == "Annulled") {echo "selected";}?>>Annulled</option>
                                                                                    <option <?php if($row && $row['civilstatus'] == "Widower") {echo "selected";}?>>Widower</option>
                                                                                    <option <?php if($row && $row['civilstatus'] == "Single Parent") {echo "selected";}?>>Single Parent</option>
                                                                                  </select>
                                                                              </div>
                                                                              <div class="col-lg-3 mb-3">
                                                                                <label class="form-label">Gender <span class="text-danger">*</span>
                                                                                </label>
                                                                                  <select id="inputState" class="default-select form-control default-select wide" name="gender" required>
                                                                                    <option>Choose Gender</option>
                                                                                    <option <?php if($row && $row['gender'] == "Female") {echo "selected";}?>>Female</option>
                                                                                    <option <?php if($row && $row['gender'] == "Male") {echo "selected";}?>>Male</option>
                                                                                  </select>
                                                                              </div>
                                                                              <div class="col-lg-3 mb-3">
                                                                                <label class="form-label ">Citizenship <span class="text-danger">*</span>
                                                                                </label>
                                                                                 <input class="form-control form-control-lg" id="validationCustom04" rows="5" placeholder="Citizenship"  name="citizenship" required value="<?php if($row) {echo $row['citizenship'];} else {echo "";}?>"></input>
                                                                              </div>
                                                                              <div class="col-lg-3 mb-3">
                                                                                <label class="form-label ">Mobile No. <span class="text-danger">*</span>
                                                                                </label>
                                                                                 <input type="number" class="form-control form-control-lg" id="validationCustom04" rows="5" placeholder="Mobile No."  name="mobileno" required value="<?php if($row) {echo $row['mobileno'];} else {echo "";}?>"></input>
                                                                              </div>
                                                                              <div class="col-lg-6 mb-3">
                                                                                 <label class="form-label">Email (Primary)<span class="text-danger">*</span>
                                                                                 </label>
                                                                                <input type="email" class="form-control form-control-lg" placeholder="Email" name="emailprimary" required value="<?php if($row) {echo $row['emailprimary'];} else {echo "";}?>">
                                                                              </div>
                                                                              <div class="col-lg-6 mb-3">
                                                                                 <label class="form-label">Email (Secondary)
                                                                                 </label>
                                                                                <input type="email" class="form-control form-control-lg" placeholder="(optional)" name="emailsecondary" value="<?php if($row) {echo $row['emailsecondary'];} else {echo "";}?>">
                                                                              </div>
                                                                              <div class="col-lg-6 mb-3">
                                                                                  <label class="form-label">Region <span class="text-danger">*</span></label>
                                                                                  <select id="regionSelect" class="default-select form-control default-select wide" name="region" required>
                                                                                    <option>Choose Region</option>
                                                                                    <option <?php if($row && $row['region'] == "NCR") {echo "selected";}?> value="NCR">National Capital Region (NCR)</option>
                                                                                    <option <?php if($row && $row['region'] == "CAR") {echo "selected";}?> value="CAR">Cordillera Administrative Region (CAR)</option>
                                                                                    <option <?php if($row && $row['region'] == "ILOCOS") {echo "selected";}?> value="ILOCOS">Region I (ILOCOS REGION)</option>
                                                                                    <option <?php if($row && $row['region'] == "CAGAYAN") {echo "selected";}?> value="CAGAYAN">Region II (CAGAYAN VALLEY)</option>
                                                                                    <option <?php if($row && $row['region'] == "CENTRAL") {echo "selected";}?> value="CENTRAL">Region III (CENTRAL LUZON)</option>
                                                                                    <option <?php if($row && $row['region'] == "CALABARZON") {echo "selected";}?> value="CALABARZON">Region IV-A (CALABARZON)</option>
                                                                                    <option <?php if($row && $row['region'] == "MIMAROPA") {echo "selected";}?> value="MIMAROPA">Region IV-B (MIMAROPA)</option>
                                                                                    <option <?php if($row && $row['region'] == "BICOL") {echo "selected";}?> value="BICOL">Region V (BICOL REGION)</option>
                                                                                    <option <?php if($row && $row['region'] == "WESTERN") {echo "selected";}?> value="WESTERN">Region VI (WESTERN VISAYAS)</option>
                                                                                    <option <?php if($row && $row['region'] == "CENTRAL_VISAYAS") {echo "selected";}?> value="CENTRAL_VISAYAS">Region VII (CENTRAL VISAYAS)</option>
                                                                                    <option <?php if($row && $row['region'] == "EASTERN") {echo "selected";}?> value="EASTERN">Region VIII (EASTERN VISAYAS)</option>
                                                                                    <option <?php if($row && $row['region'] == "ZAMBOANGA") {echo "selected";}?> value="ZAMBOANGA">Region IX (ZAMBOANGA PENINSULA)</option>
                                                                                    <option <?php if($row && $row['region'] == "NORTHERN") {echo "selected";}?> value="NORTHERN">Region X (NORTHERN MINDANAO)</option>
                                                                                    <option <?php if($row && $row['region'] == "DAVAO") {echo "selected";}?> value="DAVAO">Region XI (DAVAO REGION)</option>
                                                                                    <option <?php if($row && $row['region'] == "SOCCSKSARGEN") {echo "selected";}?> value="SOCCSKSARGEN">Region XII (SOCCSKSARGEN)</option>
                                                                                    <option <?php if($row && $row['region'] == "CARAGA") {echo "selected";}?> value="CARAGA">Region XIII (CARAGA)</option>
                                                                                    <option <?php if($row && $row['region'] == "BARMM") {echo "selected";}?> value="BARMM">Bangsamora Autonomous Region in Muslim Mindanao (BARMM)</option>
                                                                                    <!-- Add other regions as needed -->
                                                                                  </select>
                                                                                </div>
                                                                                <div class="col-lg-6 mb-3">
                                                                                  <label class="form-label">Province <span class="text-danger">*</span></label>
                                                                                  <select id="provinceSelect" class="default-select form-control default-select wide" name="province" required>
                                                                                    <option selected="">Choose Province</option>
                                                                                    <?php
                                                                                      if($row) {
                                                                                    ?>
                                                                                      <option value="<?=$row['province']?>" selected><?=$row['province']?></option>
                                                                                    <?php   
                                                                                      }
                                                                                    ?>
                                                                                    <!-- The province options will be dynamically populated here -->
                                                                                  </select>
                                                                                </div>
                                                                              <div class="col-lg-4 mb-3">
                                                                                <label class="form-label ">Barangay
                                                                                </label>
                                                                                 <input class="form-control form-control-lg" id="validationCustom04" rows="5" placeholder="Barangay"  name="barangay" value="<?php if($row) {echo $row['barangay'];} else {echo "";}?>"></row>
                                                                              </div>
                                                                              <div class="col-lg-4 mb-3">
                                                                                <label class="form-label ">State/Street/Subdivision
                                                                                </label>
                                                                                 <input class="form-control form-control-lg" id="validationCustom04" rows="5" placeholder="State/Street/Subdivision" name="sss" value="<?php if($row) {echo $row['sss'];} else {echo "";}?>"></input>
                                                                              </div>
                                                                               <div class="col-lg-4 mb-3">
                                                                                <label class="form-label ">Zip Code
                                                                                </label>
                                                                                 <input type="number" class="form-control form-control-lg" id="validationCustom04" rows="5" placeholder="e.g. 1234"  name="zipcode" value="<?php if($row) {echo $row['zipcode'];} else {echo "";}?>"></input>
                                                                              </div>
                                                                          </div>
                                                                     
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                    </tr>
                                    <?php 
                                        }
                                     ?>                
                                 </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
     </div> 
            </div>


    

<!--         <div class="content-body">
          <div class="container-fluid">
        <div class="row">
          <div class="col-xl-12">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
              <div class="input-group contacts-search mb-4">
              </div>
              <div class="mb-4">
                <a href="conferences.php" type="button" class="btn btn-primary btn-rounded fs-16"><i class="fas fa-plus me-3 scale4" style="color: #fff;"></i>Add More Conference Attended</a>
              </div>
              <div class="col-xl-12">
                    
              </div>        
                </div>    
                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="tableResearch">
                                        <thead>
                                            <tr>
                                                <th style="display: none;" class="col-md-1"><strong>#</strong></th>
                                                <th style="display: none;" class="col-md-3"><strong>Campus</strong></th>
                                                <th style="display: none;" class="col-md-1"><strong>College</strong></th>
                                                <th style="display: none;" class="col-md-5"><strong>Program</strong></th>
                                                <th style="display: none;" class="col-md-2"><strong>Abbreviation</strong></th>
                                                <th ><strong></strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       
                                          <tr>
                                                <td><strong>Paper Presenter. 8th IEEE International Conference on Automatic Control and Intelligent Systems (I2CACIS2023). Virtual. June 17, 2023 - June 17, 2023. (International)</strong></td>
                                                
                                                <td>
                                                  <div class="d-flex">
                                                    <a href="#" class="btn btn-dark shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="#" class="btn btn-dark shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                  </div>
                                                </td>
                                            </tr>
                                         
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
          </div>
        </div> -->
        <div class="modal fade bd-example-modal-lg">
            <div class="modal-dialog modal-lg ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="font-size: 23px">Update Conference</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Theme/Title</label>
                                <input class="form-control form-control-lg" rows="5" placeholder="Theme/Title"  name="themetitle"></input>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Organizer 
                                 </label>
                                <input class="form-control form-control-lg" id="validationCustom04" rows="5" placeholder="Organizer"  name="organizer"></input>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Venue</label>
                                 <input class="form-control form-control-lg" id="validationCustom04" rows="5" placeholder="Venue"  name="venue"></input>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Type of Participation</label>
                                  <select id="inputState" class="default-select form-control default-select wide" name="participation" style="border-radius: 1rem; border: 0.0625rem solid #9DB2BF; color: #000;">
                                      <option selected="">Choose Participation</option>
                                      <option>Resource Person</option>
                                      <option>Paper Presenter</option>
                                      <option>Poster Presenter</option>
                                      <option>Participant</option>
                                    </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                               <label class="form-label">Level of Conference
                                </label>
                                <select id="inputState" class="default-select form-control default-select wide" name="conference" style="border-radius: 1rem; border: 0.0625rem solid #9DB2BF; color: #000;">
                                    <option selected="">Choose Conference</option>
                                    <option>Local</option>
                                    <option>International</option>
                                  </select>
                              </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label">From
                                </label>
                                 <input type="date" value="" class="form-control form-control-lg" name="from_conference">
                            </div>
                             <div class="col-lg-6 mb-3">
                                <label class="form-label">To
                                </label>
                                 <input type="date" value="" class="form-control form-control-lg" name="to_conference">
                              </div>
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
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
  
  <!-- Dashboard 1 -->
  <script src="js/dashboard/dashboard-1.js"></script>
  
  <script src="vendor/owl-carousel/owl.carousel.js"></script>
  
  <script src="js/custom.min.js"></script>
  <script src="js/dlabnav-init.js"></script>

  <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="js/plugins-init/datatables.init.js"></script>

    <script src="vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="js/plugins-init/sweetalert.init.js"></script>

<script src=""></script>

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

  regionSelect.addEventListener("change", function () {
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function deleteRecord(e) {
        swal({
          title: "Are you sure to delete?",
          text: "Once deleted, you will not be able to recover this data!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((result) => {
          if(result) {
            var deleteRecord = new XMLHttpRequest();
            deleteRecord.open("GET", "delete.record.php?table=personal_profile&id="+e); // yung pangalan lang ng table ang papalitan
            deleteRecord.send();
            deleteRecord.onload = function() {
                swal({
                  title: "Success!",
                  text: "Record Deleted Successfully!",
                  icon: "success",
                  button: "OK",
                  dangerMode: true,
                })
                .then((r) => {
                    location.reload(true);
                })
            }
          }
        })
    }
</script>

</body>
</html>