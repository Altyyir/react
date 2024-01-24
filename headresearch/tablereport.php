<?php 
session_start();

$user_id = $_SESSION['user_id'];

include 'dbconn.php';

if (isset($_SESSION['user_id'])) {
    if($_SESSION['authority'] == "System Admin") {
        header('location: ./systemadmin/');
    } elseif($_SESSION['authority'] == "Faculty Researcher") {
        header('location: ./');
    } elseif($_SESSION['authority'] == "Vice Chancellor for Research, Development & Extension Services") {
        header('location: ./vcrdes/');
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
        
                $query = "DELETE FROM conferences WHERE id='$id'";
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
  <title>Head of Research</title>
  
  <!-- FAVICONS ICON -->
  <link rel="shortcut icon" type="image/jpg" href="images/bsu.png">
  <link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
  <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
    <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"/>

  
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
                              <?php if(isset($_GET['college'])){ echo $_GET['college']; } ?>
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
              <li class="nav-item d-flex align-items-center">
                <div class="input-group search-area">
                  <input type="text" class="form-control" placeholder="Explore ReAcT">
                  <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
                </div>
              </li> 
             <!--  <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                  <svg width="28" height="28" viewbox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M23.3333 19.8333H23.1187C23.2568 19.4597 23.3295 19.065 23.3333 18.6666V12.8333C23.3294 10.7663 22.6402 8.75902 21.3735 7.12565C20.1068 5.49228 18.3343 4.32508 16.3333 3.80679V3.49996C16.3333 2.88112 16.0875 2.28763 15.6499 1.85004C15.2123 1.41246 14.6188 1.16663 14 1.16663C13.3812 1.16663 12.7877 1.41246 12.3501 1.85004C11.9125 2.28763 11.6667 2.88112 11.6667 3.49996V3.80679C9.66574 4.32508 7.89317 5.49228 6.6265 7.12565C5.35983 8.75902 4.67058 10.7663 4.66667 12.8333V18.6666C4.67053 19.065 4.74316 19.4597 4.88133 19.8333H4.66667C4.35725 19.8333 4.0605 19.9562 3.84171 20.175C3.62292 20.3938 3.5 20.6905 3.5 21C3.5 21.3094 3.62292 21.6061 3.84171 21.8249C4.0605 22.0437 4.35725 22.1666 4.66667 22.1666H23.3333C23.6428 22.1666 23.9395 22.0437 24.1583 21.8249C24.3771 21.6061 24.5 21.3094 24.5 21C24.5 20.6905 24.3771 20.3938 24.1583 20.175C23.9395 19.9562 23.6428 19.8333 23.3333 19.8333Z" fill="#717579"></path>
                    <path d="M9.9819 24.5C10.3863 25.2088 10.971 25.7981 11.6766 26.2079C12.3823 26.6178 13.1838 26.8337 13.9999 26.8337C14.816 26.8337 15.6175 26.6178 16.3232 26.2079C17.0288 25.7981 17.6135 25.2088 18.0179 24.5H9.9819Z" fill="#717579"></path>
                  </svg>
                                    <span class="badge light text-white bg-warning rounded-circle">1</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div id="DZ_W_Notification1" class="widget-media dlab-scroll p-3" >
                    <ul class="timeline">
                      <li>
                        <div class="timeline-panel">
                          <div class="media me-2">
                            <img alt="image" width="50" src="images/avatar/1.jpg">
                          </div>
                          <div class="media-body">
                            <h6 class="mb-1">5 days left to finished your paper</h6>
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
                    <img src="../profile_upload/<?php echo $row['image_path'] != "" ? $row['image_path'] : 'profile_upload/bsu.png'; ?>" width="56" alt="">
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                  <a href="profile.php" class="dropdown-item ai-icon">
                    <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    <span class="ms-2">Profile </span>
                  </a>
                  <a href="../logout.php" class="dropdown-item ai-icon">
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
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <div class="input-group contacts-search mb-4">
<!--                                <input type="text" class="form-control" placeholder="Search here...">
                                <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span> -->
                            </div>
                            <div class="mb-4" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                <a href="javascript:void(0);" class="btn btn-primary btn-rounded fs-16"><i style='font-size: 14px;' class='fas'>&#xf0b0;</i>  Filter
                </a>
              </div>
              <div class="modal fade" id="exampleModalCenter">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" style="font-size: 20px">Filter</h5>
                                                    </div>
                                                    <form method="post" action="query.filter.php">
                                                        <div class="modal-body">
                                                            <div class="col-lg-12 mb-3">    
                                                               <label class="form-label">Filter by
                                                                </label>
                                                                <select class="form-control" name="college" required>
                                                                    <option>All</option>
                                                                    <option>CABEIHM</option>
                                                                    <option>CAS</option>
                                                                    <option>CICS</option>
                                                                    <option>CONAHS</option>
                                                                    <option>CTE</option>
                                                                  </select>
                                                              </div>
                                                            <div class="col-lg-12 mb-3">    
                                                               <label class="form-label">Filter by
                                                                </label>
                                                                <select id="dataFilter" class="form-control" name="filterType" required>
                                                                    <option value="quarter">Quarterly</option>
                                                                    <option value="annual" selected>Annually</option>
                                                                  </select>
                                                              </div>
                                                              <div id="annualFilterRow" class="col-lg-12 mb-3" style="display: none;">
                                                               <label class="form-label">Filter by
                                                                </label>
                                                                <select id="annualFilterInput" class="form-control" name="year">
                                                                    <option value="none" selected="">Choose Year</option>
                                                                    <?php
                                                                    $sql = "SELECT DISTINCT(YEAR(dateAdded)) AS year FROM research_topic ORDER BY year DESC";
                                                                    $result = $conn->query($sql);
                                                                    while($yearRow = $result->fetch_assoc()) {
                                                                    ?>
                                                                    <option value="<?=$yearRow['year']?>"><?=$yearRow['year']?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
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
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display">
                                    <thead>
                                        <tr>
                                            <th style="display:none;" class='center-align px-3'><strong>#</strong></th>
                                           
                                            <th class="col-md-4"><strong>Quarter No.</strong></th>
                                            <th class="col-md-4" style="text-align: center;"><strong>Year</strong></th>
                                            <th class="col-md-4" style="padding-left: 275px"><strong>Action</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(isset($_GET['college']) && isset($_GET['filtertype']) && $_GET['filtertype'] == "quarter" && isset($_GET['year'])) {
                                                $count = 1;
                                                while($count <= 4) {
                                        ?>
                                                    <tr>
                                                        <td style="display: none;" class='center-align px-3'><strong></strong></strong></td>
                                                        <td class="col-md-4" >Q<?=$count?></td>
                                                        <td class="col-md-4" style="text-align: center;"><?=$_GET['year']?></td>
                                                        <td class="col-md-4" style="padding-left: 285px">
                                                            <a href="quarterlypdf.php?id=<?php echo $row['id'] ?>&year=<?=$_GET['year']?>&quarter=<?=$count?>&college=<?=$_GET['college']?>" target="_blank" class="btn btn-dark shadow btn-xs sharp me-1" name="approve" value="approve" ><i class="fas fa-cloud-download-alt" title='Report'></i></a>
                                                        </td>    
                                                        </td>
                                                    </tr>
                                        <?php
                                                    $count++;
                                                }
                                            } elseif(isset($_GET['college']) && isset($_GET['filtertype']) && $_GET['filtertype'] == "annual") {
                                                $sql = "SELECT DISTINCT(YEAR(dateAdded)) AS year FROM research_topic ORDER BY year DESC";
                                                $yearResult = $conn->query($sql);
                                                while($yearRow = $yearResult->fetch_assoc()) {
                                        ?>
                                                    <tr>
                                                        <td style="display: none;" class='center-align px-3'><strong></strong></strong></td>
                                                        <td class="col-md-4" >All Quarter</td>
                                                        <td class="col-md-4" style="text-align: center;"><?=$yearRow['year']?></td>
                                                        <td class="col-md-4" style="padding-left: 285px">
                                                            <a href="quarterlypdf.php?id=<?php echo $row['id'] ?>&year=<?=$yearRow['year']?>&college=<?=$_GET['college']?>" target="_blank" class="btn btn-dark shadow btn-xs sharp me-1" name="approve" value="approve" ><i class="fas fa-cloud-download-alt" title='Report'></i></a>
                                                        </td>    
                                                        </td>
                                                    </tr>
                                        <?php
                                                }
                                        ?>

                                        <?php
                                            }
                                        ?>
                                        <!-- <tr>
                                           <td style="display: none;" class='center-align px-3'><strong></strong></strong></td>
                                          <td class="col-md-4" >Q4</td>
                                            <td class="col-md-4" style="text-align: center;">2023</td>
                                            <td class="col-md-4" style="padding-left: 285px">
                                                <a href="quarterlypdf.php?id=<?php echo $row['id'] ?>" target="_blank" class="btn btn-dark shadow btn-xs sharp me-1" name="approve" value="approve" ><i class="fas fa-cloud-download-alt" title='Report'></i></a>
                                        </td>
                                                
                                        </td>
                                    </tr> -->              
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
    <script>
        document.getElementById("dataFilter").addEventListener('change', showSelect);

        function showSelect() {
            var annualFilterRow = document.getElementById("annualFilterRow");

            var annualFilterInput = document.getElementById("annualFilterInput");

            if(this.value == "quarter") {
                annualFilterRow.style.display = "block";
            } else if(this.value == "annual") {
                annualFilterRow.style.display = "none";
            } else if(this.value == "none") {
                annualFilterRow.style.display = "none";
                annualFilterInput.value = "none";
            }
        }
    </script>

</body>
</html>