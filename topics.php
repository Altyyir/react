<?php 
include "dbconn.php";

if(isset($_POST['submit'])){
	$title = $_POST['title'];
	$authors = $_POST['authors'];
	$college = $_POST['college'];
	$program = $_POST['program'];
	$budget = $_POST['budget'];
	$status= $_POST['status'];
	$date_started= $_POST['datestarted'];
	$end_date = $_POST['enddate'];
	$revision_no = $_POST['revisionno'];
	//$file_path = $_FILES['filepath'];

	$sql = "INSERT INTO `faculty_research` (`faculty_research_id`, `title`, `authors`, `college`, `program`, `budget`, `status`, `date_started`, `end_date`, `revision_no`) VALUES (NULL, '$title', '$authors', '$college', '$program', '$budget', '$status', '$date_started', '$end_date', '$revision_no')";

	$result =mysqli_query($conn, $sql);

	if($result){
		header("Location: ./kanban.php?success");
	}
	else {
		echo "Failed: " . mysqli_error($conn);
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
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	
	<!-- PAGE TITLE HERE -->
	<title>Faculty Researcher Dashboard</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">

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
            <a href="index.html" class="brand-logo">
					<img src="images/bsu.png" class="circle" width="65" height="55">
				<div class="brand-title">
					<h2 class="">REACT</h2>
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
                                Research Title
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
							<li class="nav-item d-flex align-items-center">
								<div class="input-group search-area">
									<input type="text" class="form-control" placeholder="Explore REACT">
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
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell-link " href="message.html">
								<svg width="28" height="28" viewbox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M27.076 6.24662C26.962 5.48439 26.5787 4.78822 25.9955 4.28434C25.4123 3.78045 24.6679 3.50219 23.8971 3.5H4.10289C3.33217 3.50219 2.58775 3.78045 2.00456 4.28434C1.42137 4.78822 1.03803 5.48439 0.924011 6.24662L14 14.7079L27.076 6.24662Z" fill="#717579"></path>
									<path d="M14.4751 16.485C14.3336 16.5765 14.1686 16.6252 14 16.6252C13.8314 16.6252 13.6664 16.5765 13.5249 16.485L0.875 8.30025V21.2721C0.875926 22.1279 1.2163 22.9484 1.82145 23.5536C2.42659 24.1587 3.24707 24.4991 4.10288 24.5H23.8971C24.7529 24.4991 25.5734 24.1587 26.1786 23.5536C26.7837 22.9484 27.1241 22.1279 27.125 21.2721V8.29938L14.4751 16.485Z" fill="#717579"></path>
								</svg>
									<span class="badge light text-white bg-danger rounded-circle">0</span>
                                </a>
							</li>	
							
							
							<li class="nav-item dropdown  header-profile">
								<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
									<img src="images/user.jpg" width="56" alt="">
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="app-profile.html" class="dropdown-item ai-icon">
										<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
										<span class="ms-2">Profile </span>
									</a>
									<a href="page-error-404.html" class="dropdown-item ai-icon">
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
                    <li><a href="index.html">
							<i class="fas fa-home"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                    </li>
                     <li><a href="topics.php" class="">
						    <i class="fas fa-clipboard"></i>
							<span class="nav-text">Research Topic</span>
						</a>
					</li>
					 
					<li><a class="">
						     <i class="fas fa-award"></i>
							 <span class="nav-text">Certificates</span>
						</a>
					</li>
					<li><a class="">
						     <i class="fas fa-file-alt"></i>
							 <span class="nav-text">Technical CV</span>
						</a>
					</li>
					<li><a class="">
						     <i class="fas fa-users"></i>
							 <span class="nav-text">Attended Conference</span>
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
		<div class="content-body">
			<div class="container-fluid">
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="kanban.php">Research Topic</a></li>
						<li class="breadcrumb-item active"><a href="topics.php">Research Title</a></li>
					</ol>
                </div>
				<div class="row">
					<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header" >
                                <h4 class="card-title">Topic</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                	<form method="post" action="topics.php">
	                                	<div class="row">
                                            <div class="mb-12 col-md-12">
                                                <label class="form-label ">Research Project Title <span class="text-danger">*</span>
                                                </label>
                                                <textarea class="form-control" id="validationCustom04" rows="5" placeholder="Research Title" required="" name="title"></textarea>
                                            </div>
                                    	</div>

                                    	<div class="row" style="margin-top: 14px;">
                                    		<div class="mb-3 col-md-3">
                                                <label class="form-label">Author(s) <span class="text-danger">*</span></label>
                                                <textarea class="form-control" id="validationCustom04" rows="5" placeholder="Authors" required="" name="authors"></textarea>
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label class="form-label">College <span class="text-danger">*</span></label>
                                                <select id="inputState" class="default-select form-control wide" name="college"required>
                                                    <option selected="">Choose...</option>
                                                    <option>CTE</option>
                                                    <option>CET</option>
                                                    <option>CICS</option>
                                                    <option>CAS</option>
                                                    <option>CABEIHM</option>
                                                    <option>CONAHS</option>
                                                    <option>Others</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label class="form-label">Program <span class="text-danger">*</span></label>
                                                <select id="inputState" class="default-select form-control wide" name="program" required>
                                                    <option selected="">Choose...</option>
                                                    <option>BSIT</option>
                                                    <option>BSBA</option>
                                                    <option>BSHRM</option>
                                                    <option>BSCA</option>
                                                    
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label>Budget <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control"required name="budget">
                                            </div>	
                                    	</div>

                                        <div class="row">
                                            <div class="mb-3 col-md-3">
                                                <label class="form-label">Status <span class="text-danger">*</span></label>
                                                <select id="inputState" class="default-select form-control wide" name="status" required>
                                                    <option selected="">Choose...</option>
                                                    <option>On Going</option>
                                                    <option>Pending</option>
                                                    <option>Completed</option>
                                                    <option>Published</option>
                                                </select>
                                            </div>
                                            <div class="mb-2 col-md-3">
                                                <label class="form-label">Date Started <span class="text-danger">*</span></label>
                                                <input type="date" value="" class="form-control"required name="datestarted">
                                            </div>
                                            <div class="mb-2 col-md-3">
                                                <label class="form-label">End Date <span class="text-danger">*</span></label>
                                                <input type="date" value="" class="form-control"required name="enddate">
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label>Revision No.</label>
                                                <input type="text" class="form-control" name="revisionno">
                                            </div>	
                                        </div>
                      				    <div class="col-md-2" style="margin-top: 5px;">
          				    			<button type="button" class="btn btn-rounded btn-success" name="filepath">
          				    				<input type="file" id="uploadbtn">
          				    				<label for="uploadbtn"><i class="fas fa-upload"></i>Upload file</label>	
              				    		</button>
                      				    	</div>
                      				    	 <div class="col-md-2" style="margin-top: 10px;">
                  				    			<button id="clickme" type="submit" class="btn btn-primary mb-2" name="submit">Submit</button>
													<a href="kanban.php"><type="Closed" class="btn btn-danger light">Close</a>
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
                <p>Copyright © Designed &amp; Developed by REACT 2023</p>
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


    <script src="vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="js/plugins-init/sweetalert.init.js"></script>
	

</body>
</html>