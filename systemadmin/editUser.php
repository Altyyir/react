<?php  

require 'dbconn.php';

session_start();

if (isset($_SESSION['user_id'])) {
    if($_SESSION['authority'] == "Faculty Researcher") {
        header('location: ./');
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

$sql = "SELECT * FROM faculty_user WHERE id = $id";
$result = $conn->query($sql);
$userRow = $result->fetch_assoc();
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
    
    <!-- PAGE TITLE HERE -->
    <title>System Administrator</title>
    
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/bsu.png">
    <link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    
    <!-- Style css -->
    <link href="css/style.css" rel="stylesheet">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
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
                                User Management
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
                            </li>            
                            <li class="nav-item dropdown  header-profile">
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    <?php 
                                        $id = $_SESSION['user_id'];
                                        $sql = "SELECT * FROM `faculty_user` WHERE `id` = $id";
                                        $result = $conn->query($sql);
                                        $row = $result->fetch_assoc();
                                     ?>
                                    <img src="<?php echo $row['image_path'] != "" ? $row['image_path'] : 'profile_upload/bsu.png'; ?>" width="56" alt="">
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
                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                            <i class="fas fa-home"></i>
                            <span class="nav-text">University Setup</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="index.php">University</a></li>
                            <li><a href="campus.php">Campus</a></li>
                            <li><a href="college.php">College</a></li>
                            <li><a href="program.php">Program</a></li>
                        </ul>

                    </li>
                    <li><a href="user.php" class="" aria-expanded="false">
                            <i class="fas fa-user-cog"></i>
                            <span class="nav-text">User Management</span>
                        </a>
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
        <div class="content-body" style="min-height: 500px">
            <div class="container-fluid">
                <div class="row page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="user.php">User Management</a></li>
                        <li class="breadcrumb-item active"><a href="editUser.php">Update User</a></li>
                    </ol>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header" >
                                <h4 class="card-title">Update User</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form id="edit-user-php" method="post" action="edit.user.php">
                                        <input type="hidden" name="id" value="<?=$_GET['id']?>">
                                        <div class="row">
                                            <div class="mb-3 col-md-3">
                                                <label class="form-label">Title <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control form-control-lg" placeholder="Title" name="title" value="<?=$userRow['title']?>" required>
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label class="form-label">First Name <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control form-control-lg" placeholder="First Name" name="first_name" value="<?=$userRow['first_name']?>" required>
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label class="form-label">Middle Name
                                                </label>
                                                <input type="text" class="form-control form-control-lg" placeholder="Middle Name" name="middle_name" value="<?=$userRow['middle_name']?>" required>
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label class="form-label">Last Name <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control form-control-lg" placeholder="Last Name" name="last_name" value="<?=$userRow['last_name']?>" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="mb-3 col-md-3">
                                                <label class="form-label">Gender <span class="text-danger">*</span></label>
                                                <select id="inputState" class="form-control wide form-control-lg" name="gender" required>
                                                    <option>Select Gender</option>
                                                    <option <?php if($userRow['gender'] == 'Female'){echo 'selected';}?>>Female</option>
                                                    <option <?php if($userRow['gender'] == 'Male'){echo 'selected';}?>>Male</option>
                                                </select>
                                            </div> 
                                             <div class="mb-3 col-md-9">
                                                <label class="form-label">Email <span class="text-danger">*</span>
                                                </label>
                                                <input type="email" class="form-control form-control-lg" placeholder="Email" name="email" value="<?=$userRow['email']?>" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6 input-container">
                                                <label class="form-label">Password <span class="text-danger">*</span></label>
                                                <input type="password" id="password" class="form-control form-control-lg password-input" placeholder="Password" name="password" required>
                                                <i id="togglepassword" class="fas fa-eye password-icon"></i>
                                            </div> 
                                            <div class="mb-2 col-md-6">
                                                <label class="form-label">Privilege <span class="text-danger">*</span></label>
                                                <select id="privelege" class="form-control wide form-control-lg" name="privelege" onchange="setDD()" required>
                                                    <option selected="">Select Privilege</option>
                                                    <option>System Admin</option>
                                                    <option>Vice Chancellor for Research, Development & Extension Services</option>
                                                    <option>Head Research</option>
                                                    <option>Dean/Associate Dean</option>
                                                    <option>College Research Coordinator</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row" id="campCollDD">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Campus</label>
                                                <select id="campusDD" class="form-control wide form-control-lg" onclick="setCollegeDD()" name="campus">
                                                    
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">College</label>
                                                <select class="form-control wide form-control-lg" id="collegeDD" name="college">
                                                </select>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-md-2" style="margin-top: 5px;"></div>
                                         <div class="col-md-2" style="margin-top: 10px;">
                                            <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                               <a href="user.php" type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</a>
                                         </div>                       
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
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="vendor/draggable/draggable.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>
    <script src="js/plugins-init/password.js"></script>
<!--     <script>
        function setCollegeDD(campus) {
            var campus = document.getElementById("campusDD").value;

            var getCollege = new XMLHttpRequest();
            getCollege.open("GET", "getcampus.php?college=" + campus);
            getCollege.send();
            getCollege.onload = function() {
                var college = document.getElementById("collegeDD");
                college.innerHTML = "";
                var college_array = JSON.parse(this.responseText);
                college_array.forEach(function(element) {
                    var option = document.createElement("option");
                    option.value = element;
                    option.innerHTML = element;
                    college.appendChild(option);
                });
            }
        }
    </script> -->
    <script>
        setDD();
        function setCampusDD() {
            var campus = new XMLHttpRequest();
            campus.open("GET", "load.campus.php");
            campus.send();
            campus.onload = function() {
                document.getElementById('campusDD').innerHTML = this.responseText;

                setCollegeDD();
            }
        }

        function setCollegeDD(campus) {
            var campus = document.getElementById("campusDD").value;

            var getCollege = new XMLHttpRequest();
            getCollege.open("GET", "getcampus.php?college=" + campus);
            getCollege.send();
            getCollege.onload = function() {
                var college = document.getElementById("collegeDD");
                college.innerHTML = "";
                var college_array = JSON.parse(this.responseText);
                college_array.forEach(function(element) {
                    var option = document.createElement("option");
                    option.value = element['id'];
                    option.innerHTML = element['name'];
                    college.appendChild(option);
                });
            }
        }

        function setDD() {
            var privelege = document.getElementById("privelege").value;

            if(privelege == "Vice Chancellor for Research, Development & Extension Services" || privelege == "Head Research" || privelege == "System Admin" || privelege == "Select Privilege") {
                document.getElementById("campCollDD").style.display = "none";

                document.getElementById("campusDD").value = 'none';
                document.getElementById("collegeDD").value = 'none';
            } else {
                document.getElementById("campCollDD").style.display = "flex";

                setCampusDD();
            }
        }
    </script>

    <script>
        document.getElementById("edit-user-php").addEventListener("submit", function(event) {
            event.preventDefault();
            swal({
                title: "Update This User?",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "Cancel",
                        value: false,
                        visible: true,
                        closeModal: true,
                    },
                    confirm: {
                        text: "Confirm",
                        value: true,
                        visible: true,
                        closeModal: true
                    }
                },
                dangerMode: true,
            }).then((e)=>{
                if(e) {
                    swal({
                        title: "User Updated!",
                        icon: "success",
                    }).then(()=>{
                        document.getElementById("edit-user-php").submit();
                    });
                }
            });
        });
    </script>
</body>
</html>