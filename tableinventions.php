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
        
                $query = "DELETE FROM inventions WHERE id='$id'";
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
                                    <a href="inventions.php" type="button" class="btn btn-primary btn-rounded fs-16"><i class="fas fa-plus me-3 scale4" style="color: #fff;"></i>Add More Invention</a>
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
                                            <th style="display:none;" class='center-align px-3'><strong>#</strong></th>
                                            <th class="col-md-3"><strong>Title</strong></th>
                                            <th class="col-md-2" style="text-align: center;"><strong>IP Rights Type</strong></th>
                                            <th class="col-md-3" style="text-align: center;"><strong>Principal Author/Inventor</strong></th>
                                            <th class="col-md-2" style="text-align: center;"><strong>Date Issued</strong></th>
                                            <th class="col-md-1" style="text-align: center;"><strong>Action</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                                $query = "SELECT * FROM inventions WHERE added_by = {$user_id} ORDER BY `id` DESC";
                                                $result = mysqli_query($conn, $query);
                                                $count = 1;
                                                while($row = mysqli_fetch_array($result)) {
                                             ?>
                                        <tr>
                                           <td style="display: none;" class='center-align px-3'><strong></strong></strong></td>
                                           <td class="col-md-3"><?php echo $row["title"]?></td>
                                           <td class="col-md-2" style="text-align: center;"><?php echo $row["right_type"]?></td>
                                           <td class="col-md-3" style="text-align: center;"><?php echo $row["principal_author"] ?></td>
                                           <?php
                                            $date_inventions = strtotime($row['date_inventions']);
                                            $date_inventions_formatted = date("M d, Y", $date_inventions);
                                            ?>

                                            <td class="col-md-2" style="text-align: center;"><?php echo $date_inventions_formatted; ?></td>

                                            <td class="col-md-1">
                                            <div class="d-flex justify-content-center">
                                                <a href="#" class="btn btn-dark shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#edit-modal-<?=$row['id']?>" title="Update"><i class="fas fa-pencil-alt"></i></a>
                                                <a onclick="deleteRecord(`<?=$row['id']?>`)" class="btn btn-dark shadow btn-xs sharp me-1" title="Delete"><i class="fas fa-trash"></i></a>
                                                    <div id="edit-modal-<?=$row['id']?>" class="modal fade bd-example-modal-lg">
                                                        <div class="modal-dialog modal-lg" style="min-height: 200px;">
                                                            <div class="modal-content">
                                                                <form method="post" action="edit.inventions.php">
                                                                <input type="hidden" name="id" value="<?=$row['id']?>">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" style="font-size: 23px">Update Inventions</h5>
                                                                </div>
                                                                <div class="modal-body" style="overflow-y: scroll; max-height: calc(100vh - 200px);">
                                                                    <div class="row">
                                                                        <div class="col-lg-12 mb-3">
                                                                             <label class="form-label">Title 
                                                                             </label>
                                                                            <input class="form-control form-control-lg" id="validationCustom04" rows="5" placeholder="If Applicable" name="title" value="<?=$row['title']?>"></input>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-6 mb-3">
                                                                             <label class="form-label">IP Right Type <span class="text-danger">*</span>
                                                                            </label>
                                                                             <select id="inputState" class="form-control form-control-lg" name="right_type" style="border-radius: 1rem; border: 0.0625rem solid #9DB2BF; color: #000;">
                                                                               <option>Choose IP Right</option>
                                                                              <option <?php if($row['right_type'] == 'Patent'){echo "selected";}?>>Patent</option>
                                                                              <option <?php if($row['right_type'] == 'Utility Model'){echo "selected";}?>>Utility Model</option>
                                                                              <option <?php if($row['right_type'] == 'Copyright'){echo "selected";}?>>Copyright</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-lg-6 mb-3">
                                                                            <label class="form-label">Registration/ Patent No. <span class="text-danger">*</span>
                                                                             </label>
                                                                            <input class="form-control form-control-lg" id="validationCustom04" rows="5" placeholder="Patent No." name="patent_no" value="<?=$row['patent_no']?>" required></input>
                                                                          </div>
                                                                          <div class="col-lg-12 mb-3">
                                                                            <label class="form-label">Principal Author/ Inventor 
                                                                             </label>
                                                                            <input class="form-control form-control-lg" id="validationCustom04" rows="5" placeholder="Last Name, First Name, Middle Name" name="principal_author" value="<?=$row['principal_author']?>"></input>
                                                                          </div>
                                                                          <div class="col-lg-6 mb-3">
                                                                            <label class="form-label">Date Issued
                                                                             </label>
                                                                            <input type="date" class="form-control form-control-lg" id="validationCustom04" rows="5" placeholder="Edition" name="date_inventions" value="<?=$row['date_inventions']?>"></input>
                                                                          </div>
                                                                        <div class="col-lg-6 mb-3">
                                                                          <label class="form-label">Country</label>
                                                                          <select id="inputState" class="default-select form-control default-select wide" name="country" style="border-radius: 1rem; border: 0.0625rem solid #9DB2BF; color: #000;"required>
                                                                            <option>Choose Country</option>
                                                                            <option<?php if($row['country'] == 'Afghanistan'){echo "selected";}?>>Afghanistan</option>
                                                                            <option <?php if($row['country'] == 'Albania'){echo "selected";}?>>Albania</option>
                                                                            <option <?php if($row['country'] == 'Algeria'){echo "selected";}?>>Algeria</option>
                                                                            <option <?php if($row['country'] == 'Andorra'){echo "selected";}?>>Andorra</option>
                                                                            <option <?php if($row['country'] == 'Angola'){echo "selected";}?>>Angola</option>
                                                                            <option <?php if($row['country'] == 'Antigua and Barbuda'){echo "selected";}?>>Antigua and Barbuda</option>
                                                                            <option <?php if($row['country'] == 'Argentina'){echo "selected";}?>>Argentina</option>
                                                                            <option <?php if($row['country'] == 'Armenia'){echo "selected";}?>>Armenia</option>
                                                                            <option <?php if($row['country'] == 'Australia'){echo "selected";}?>>Australia</option>
                                                                            <option <?php if($row['country'] == 'Austria'){echo "selected";}?>>Austria</option>
                                                                            <option <?php if($row['country'] == 'Azerbaijan'){echo "selected";}?>>Azerbaijan</option>
                                                                            <option <?php if($row['country'] == 'Bahamas'){echo "selected";}?>>Bahamas</option>
                                                                            <option <?php if($row['country'] == 'Bahrain'){echo "selected";}?>>Bahrain</option>
                                                                            <option <?php if($row['country'] == 'Bangladesh'){echo "selected";}?>>Bangladesh</option>
                                                                            <option <?php if($row['country'] == 'Barbados'){echo "selected";}?>>Barbados</option>
                                                                            <option <?php if($row['country'] == 'Belarus'){echo "selected";}?>>Belarus</option>
                                                                            <option <?php if($row['country'] == 'Belgium'){echo "selected";}?>>Belgium</option>
                                                                            <option <?php if($row['country'] == 'Belize'){echo "selected";}?>>Belize</option>
                                                                            <option <?php if($row['country'] == 'Benin'){echo "selected";}?>>Benin</option>
                                                                            <option <?php if($row['country'] == 'Bhutan'){echo "selected";}?>>Bhutan</option>
                                                                            <option <?php if($row['country'] == 'Bolivia'){echo "selected";}?>>Bolivia</option>
                                                                            <option> <?php if($row['country'] == 'Bosnia'){echo "selected";}?>Bosnia and Herzegovina</option>
                                                                            <option <?php if($row['country'] == 'Botswana'){echo "selected";}?>>Botswana</option>
                                                                            <option <?php if($row['country'] == 'Brazil'){echo "selected";}?>>Brazil</option>
                                                                            <option <?php if($row['country'] == 'Brunei'){echo "selected";}?>>Brunei</option>
                                                                            <option <?php if($row['country'] == 'Bulgaria'){echo "selected";}?>>Bulgaria</option>
                                                                            <option <?php if($row['country'] == 'Burkina Faso'){echo "selected";}?>>Burkina Faso</option>
                                                                            <option <?php if($row['country'] == 'Burundi'){echo "selected";}?>>Burundi</option>
                                                                            <option <?php if($row['country'] == 'Cambodia'){echo "selected";}?>>Cambodia</option>
                                                                            <option <?php if($row['country'] == 'Cameroon'){echo "selected";}?>>Cameroon</option>
                                                                            <option <?php if($row['country'] == 'Canada'){echo "selected";}?>>Canada</option>
                                                                            <option <?php if($row['country'] == 'Cape Verde'){echo "selected";}?>>Cape Verde</option>
                                                                            <option <?php if($row['country'] == 'Central African Republic'){echo "selected";}?>>Central African Republic</option>
                                                                            <option <?php if($row['country'] == 'Chad'){echo "selected";}?>>Chad</option>
                                                                            <option <?php if($row['country'] == 'Chile'){echo "selected";}?>>Chile</option>
                                                                            <option <?php if($row['country'] == 'China'){echo "selected";}?>>China</option>
                                                                            <option <?php if($row['country'] == 'Colombia'){echo "selected";}?>>Colombia</option>
                                                                            <option <?php if($row['country'] == 'Comoros'){echo "selected";}?>>Comoros</option>
                                                                            <option <?php if($row['country'] == 'Congo'){echo "selected";}?>>Congo</option>
                                                                            <option <?php if($row['country'] == 'Costa Rica'){echo "selected";}?>>Costa Rica</option>
                                                                            <option <?php if($row['country'] == 'Croatia'){echo "selected";}?>>Croatia</option>
                                                                            <option <?php if($row['country'] == 'Cuba'){echo "selected";}?>>Cuba</option>
                                                                            <option <?php if($row['country'] == 'Cyprus'){echo "selected";}?>>Cyprus</option>
                                                                            <option <?php if($row['country'] == 'Czech Republic'){echo "selected";}?>>Czech Republic</option>
                                                                            <option <?php if($row['country'] == 'Democratic Republic of the Congo'){echo "selected";}?>>Democratic Republic of the Congo</option>
                                                                            <option> <?php if($row['country'] == 'Denmark'){echo "selected";}?>Denmark</option>
                                                                            <option <?php if($row['country'] == 'Djibouti'){echo "selected";}?>>Djibouti</option>
                                                                            <option <?php if($row['country'] == 'Dominica'){echo "selected";}?>>Dominica</option>
                                                                            <option <?php if($row['country'] == 'Dominican Republic'){echo "selected";}?>>Dominican Republic</option>
                                                                            <option <?php if($row['country'] == 'East Timor'){echo "selected";}?>>East Timor</option>
                                                                            <option <?php if($row['country'] == 'Ecuador'){echo "selected";}?>>Ecuador</option>
                                                                            <option <?php if($row['country'] == 'Egypt'){echo "selected";}?>>Egypt</option>
                                                                            <option <?php if($row['country'] == 'El Salvador'){echo "selected";}?>>El Salvador</option>
                                                                            <option <?php if($row['country'] == 'Equatorial Guinea'){echo "selected";}?>>Equatorial Guinea</option>
                                                                            <option <?php if($row['country'] == 'Eritrea'){echo "selected";}?>>Eritrea</option>
                                                                            <option <?php if($row['country'] == 'Estonia'){echo "selected";}?>>Estonia</option>
                                                                            <option <?php if($row['country'] == 'Eswatini'){echo "selected";}?>>Eswatini</option>
                                                                            <option <?php if($row['country'] == 'Ethiopia'){echo "selected";}?>>Ethiopia</option>
                                                                            <option <?php if($row['country'] == 'Fiji'){echo "selected";}?>>Fiji</option>
                                                                            <option <?php if($row['country'] == 'Finland'){echo "selected";}?>>Finland</option>
                                                                            <option <?php if($row['country'] == 'France'){echo "selected";}?>>France</option>
                                                                            <option <?php if($row['country'] == 'Gabon'){echo "selected";}?>>Gabon</option>
                                                                            <option <?php if($row['country'] == 'Gambia'){echo "selected";}?>>Gambia</option>
                                                                            <option <?php if($row['country'] == 'Georgia'){echo "selected";}?>>Georgia</option>
                                                                            <option <?php if($row['country'] == 'Germany'){echo "selected";}?>>Germany</option>
                                                                            <option <?php if($row['country'] == 'Ghana'){echo "selected";}?>>Ghana</option>
                                                                            <option <?php if($row['country'] == 'Greece'){echo "selected";}?>>Greece</option>
                                                                            <option <?php if($row['country'] == 'Grenada'){echo "selected";}?>>Grenada</option>
                                                                            <option <?php if($row['country'] == 'Guatemala'){echo "selected";}?>>Guatemala</option>
                                                                            <option <?php if($row['country'] == 'Guinea'){echo "selected";}?>>Guinea</option>
                                                                            <option <?php if($row['country'] == 'Guinea-Bissau'){echo "selected";}?>>Guinea-Bissau</option>
                                                                            <option <?php if($row['country'] == 'Guyana'){echo "selected";}?>>Guyana</option>
                                                                            <option <?php if($row['country'] == 'Haiti'){echo "selected";}?>>Haiti</option>
                                                                            <option <?php if($row['country'] == 'Honduras'){echo "selected";}?>>Honduras</option>
                                                                            <option <?php if($row['country'] == 'Hungary'){echo "selected";}?>>Hungary</option>
                                                                            <option <?php if($row['country'] == 'Iceland'){echo "selected";}?>>Iceland</option>
                                                                            <option <?php if($row['country'] == 'India'){echo "selected";}?>>India</option>
                                                                            <option <?php if($row['country'] == 'Indonesia'){echo "selected";}?>>Indonesia</option>
                                                                            <option <?php if($row['country'] == 'Iran'){echo "selected";}?>>Iran</option>
                                                                            <option <?php if($row['country'] == 'Iraq'){echo "selected";}?>>Iraq</option>
                                                                            <option <?php if($row['country'] == 'Ireland'){echo "selected";}?>>Ireland</option>
                                                                            <option <?php if($row['country'] == 'Israel'){echo "selected";}?>>Israel</option>
                                                                            <option <?php if($row['country'] == 'Italy'){echo "selected";}?>>Italy</option>
                                                                            <option <?php if($row['country'] == 'Ivory Coast'){echo "selected";}?>>Ivory Coast</option>
                                                                            <option <?php if($row['country'] == 'Jamaica'){echo "selected";}?>>Jamaica</option>
                                                                            <option <?php if($row['country'] == 'Japan'){echo "selected";}?>>Japan</option>
                                                                            <option <?php if($row['country'] == 'Jordan'){echo "selected";}?>>Jordan</option>
                                                                            <option <?php if($row['country'] == 'Kazakhstan'){echo "selected";}?>>Kazakhstan</option>
                                                                            <option <?php if($row['country'] == 'Kenya'){echo "selected";}?>>Kenya</option>
                                                                            <option <?php if($row['country'] == 'Kiribati'){echo "selected";}?>>Kiribati</option>
                                                                            <option <?php if($row['country'] == 'Kuwait'){echo "selected";}?>>Kuwait</option>
                                                                            <option <?php if($row['country'] == 'Kyrgyzstan'){echo "selected";}?>>Kyrgyzstan</option>
                                                                            <option <?php if($row['country'] == 'Laos'){echo "selected";}?>>Laos</option>
                                                                            <option <?php if($row['country'] == 'Latvia'){echo "selected";}?>>Latvia</option>
                                                                            <option <?php if($row['country'] == 'Lebanon'){echo "selected";}?>>Lebanon</option>
                                                                            <option <?php if($row['country'] == 'Lesotho'){echo "selected";}?>>Lesotho</option>
                                                                            <option <?php if($row['country'] == 'Liberia'){echo "selected";}?>>Liberia</option>
                                                                            <option <?php if($row['country'] == 'Libya'){echo "selected";}?>>Libya</option>
                                                                            <option <?php if($row['country'] == 'Liechtenstein'){echo "selected";}?>>Liechtenstein</option>
                                                                            <option <?php if($row['country'] == 'Lithuania'){echo "selected";}?>>Lithuania</option>
                                                                            <option <?php if($row['country'] == 'Luxembourg'){echo "selected";}?>>Luxembourg</option>
                                                                            <option <?php if($row['country'] == 'Madagascar'){echo "selected";}?>>Madagascar</option>
                                                                            <option <?php if($row['country'] == 'Malawi'){echo "selected";}?>>Malawi</option>
                                                                            <option <?php if($row['country'] == 'Malaysia'){echo "selected";}?>>Malaysia</option>
                                                                            <option <?php if($row['country'] == 'Maldives'){echo "selected";}?>>Maldives</option>
                                                                            <option <?php if($row['country'] == 'Mali'){echo "selected";}?>>Mali</option>
                                                                            <option <?php if($row['country'] == 'Malta'){echo "selected";}?>>Malta</option>
                                                                            <option <?php if($row['country'] == 'Marshall Islands'){echo "selected";}?>>Marshall Islands</option>
                                                                            <option <?php if($row['country'] == 'Mauritania'){echo "selected";}?>>Mauritania</option>
                                                                            <option <?php if($row['country'] == 'Mauritius'){echo "selected";}?>>Mauritius</option>
                                                                            <option <?php if($row['country'] == 'Mexico'){echo "selected";}?>>Mexico</option>
                                                                            <option <?php if($row['country'] == 'Micronesia'){echo "selected";}?>>Micronesia</option>
                                                                            <option <?php if($row['country'] == 'Moldova'){echo "selected";}?>>Moldova</option>
                                                                            <option <?php if($row['country'] == 'Monaco'){echo "selected";}?>>Monaco</option>
                                                                            <option <?php if($row['country'] == 'Mongolia'){echo "selected";}?>>Mongolia</option>
                                                                            <option <?php if($row['country'] == 'Montenegro'){echo "selected";}?>>Montenegro</option>
                                                                            <option <?php if($row['country'] == 'Morocco'){echo "selected";}?>>Morocco</option>
                                                                            <option <?php if($row['country'] == 'Mozambique'){echo "selected";}?>>Mozambique</option>
                                                                            <option <?php if($row['country'] == 'Myanmar'){echo "selected";}?>>Myanmar</option>
                                                                            <option <?php if($row['country'] == 'Namibia'){echo "selected";}?>>Namibia</option>
                                                                            <option <?php if($row['country'] == 'Nauru'){echo "selected";}?>>Nauru</option>
                                                                            <option <?php if($row['country'] == 'Nepal'){echo "selected";}?>>Nepal</option>
                                                                            <option <?php if($row['country'] == 'Netherlands'){echo "selected";}?>>Netherlands</option>
                                                                            <option <?php if($row['country'] == 'New Zealand'){echo "selected";}?>>New Zealand</option>
                                                                            <option <?php if($row['country'] == 'Nicaragua'){echo "selected";}?>>Nicaragua</option>
                                                                            <option <?php if($row['country'] == 'Niger'){echo "selected";}?>>Niger</option>
                                                                            <option <?php if($row['country'] == 'Nigeria'){echo "selected";}?>>Nigeria</option>
                                                                            <option <?php if($row['country'] == 'North Korea'){echo "selected";}?>>North Korea</option>
                                                                            <option <?php if($row['country'] == 'North Macedonia'){echo "selected";}?>>North Macedonia</option>
                                                                            <option <?php if($row['country'] == 'Norway'){echo "selected";}?>>Norway</option>
                                                                            <option <?php if($row['country'] == 'Oman'){echo "selected";}?>>Oman</option>
                                                                            <option <?php if($row['country'] == 'Pakistan'){echo "selected";}?>>Pakistan</option>
                                                                            <option <?php if($row['country'] == 'Palau'){echo "selected";}?>>Palau</option>
                                                                            <option <?php if($row['country'] == 'Panama'){echo "selected";}?>>Panama</option>
                                                                            <option <?php if($row['country'] == 'Papua New Guinea'){echo "selected";}?>>Papua New Guinea</option>
                                                                            <option <?php if($row['country'] == 'Paraguay'){echo "selected";}?>>Paraguay</option>
                                                                            <option <?php if($row['country'] == 'Peru'){echo "selected";}?>>Peru</option>
                                                                            <option <?php if($row['country'] == 'Philippines'){echo "selected";}?>>Philippines</option>
                                                                            <option <?php if($row['country'] == 'Poland'){echo "selected";}?>>Poland</option>
                                                                            <option <?php if($row['country'] == 'Portugal'){echo "selected";}?>>Portugal</option>
                                                                            <option <?php if($row['country'] == 'Qatar'){echo "selected";}?>>Qatar</option>
                                                                            <option <?php if($row['country'] == 'Romania'){echo "selected";}?>>Romania</option>
                                                                            <option <?php if($row['country'] == 'Russia'){echo "selected";}?>>Russia</option>
                                                                            <option <?php if($row['country'] == 'Rwanda'){echo "selected";}?>>Rwanda</option>
                                                                            <option <?php if($row['country'] == 'Saint Kitts and Nevis'){echo "selected";}?>>Saint Kitts and Nevis</option>
                                                                            <option <?php if($row['country'] == 'Saint Lucia'){echo "selected";}?>>Saint Lucia</option>
                                                                            <option <?php if($row['country'] == 'Saint Vincent and the Grenadines'){echo "selected";}?>>Saint Vincent and the Grenadines</option>
                                                                            <option <?php if($row['country'] == 'Samoa'){echo "selected";}?>>Samoa</option>
                                                                            <option <?php if($row['country'] == 'San Marino'){echo "selected";}?>>San Marino</option>
                                                                            <option <?php if($row['country'] == 'Sao Tome and Principe'){echo "selected";}?>>Sao Tome and Principe</option>
                                                                            <option <?php if($row['country'] == 'Saudi Arabia'){echo "selected";}?>>Saudi Arabia</option>
                                                                            <option <?php if($row['country'] == 'Senegal'){echo "selected";}?>>Senegal</option>
                                                                            <option <?php if($row['country'] == 'Serbia'){echo "selected";}?>>Serbia</option>
                                                                            <option <?php if($row['country'] == 'Seychelles'){echo "selected";}?>>Seychelles</option>
                                                                            <option <?php if($row['country'] == 'Sierra Leone'){echo "selected";}?>>Sierra Leone</option>
                                                                            <option <?php if($row['country'] == 'Singapore'){echo "selected";}?>>Singapore</option>
                                                                            <option <?php if($row['country'] == 'Slovakia'){echo "selected";}?>>Slovakia</option>
                                                                            <option <?php if($row['country'] == 'Slovenia'){echo "selected";}?>>Slovenia</option>
                                                                        </select>
                                                                    </div>
                                                                    <!--  <div class="col-lg-12 mb-3">
                                                                          <label class="form-label">Upload Proof of IPO registration:</label>
                                                                          <input type="file" class="form-control form-control-lg" id="validationCustom04" rows="5" name="ipo_registration" style="padding-top: 10px;" accept=".pdf" ></input>
                                                                          <div style="padding-left: 121px; color: #ff0000; font-size: 14px; "><?php echo $row['ipo_registration'] ?>
                                                                           </div>
                                                                        </div> -->
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                            </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                            </div>
                                                
                                        </td>
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
                deleteRecord.open("GET", "delete.record.php?table=inventions&id="+e); // yung pangalan lang ng table ang papalitan
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