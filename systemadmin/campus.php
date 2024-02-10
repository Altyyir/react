 <?php
	require 'dbconn.php';

	session_start();

	if (isset($_SESSION['user_id'])) {
		if ($_SESSION['authority'] == "Faculty Researcher") {
			header('location: ./');
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

 	<!-- PAGE TITLE HERE -->
 	<title>System Administrator</title>

 	<!-- FAVICONS ICON -->
 	<link rel="shortcut icon" type="image/jpg" href="images/bsu.png">
 	<link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
 	<link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
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
 									<img src="<?php echo $row['image_path'] != "" ? $row['image_path'] : 'profile_upload/bsu.png'; ?>" width="56" alt="">
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
 		<div class="content-body">
 			<div class="container-fluid">
 				<div class="row">
 					<div class="col-xl-12">
 						<div class="d-flex justify-content-between align-items-center flex-wrap">
 							<div class="input-group contacts-search mb-4">
 							</div>
 							<div class="mb-4">
 								<button type="button" class="btn btn-primary btn-rounded fs-16" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg"><i class="fas fa-plus me-3 scale4" style="color: #fff;"></i>Create Campus</a></button>
 							</div>
 							<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
 								<div class="modal-dialog modal-lg">
 									<div class="modal-content">
 										<div class="modal-header">
 											<h5 class="modal-title" style="font-size: 23px">Add Campus</h5>
 										</div>
 										<form action="add.campus.php" method="post" id="addCampus">
 											<div class="modal-body">
 												<div class="row">
 													<div class="col-md-3">
 														<label class="form-label">Campus <span class="text-danger">*</span></label>
 													</div>
 													<input type="text" name="campus_name" class="form-control form-control-lg" placeholder="Campus" required>
 												</div>
 												<div class="row" style="margin-top: 14px;">
 													<div class="col-md-3">
 														<label class="form-label">Address <span class="text-danger">*</span></label>
 													</div>
 													<input type="text" name="address" class="form-control form-control-lg" placeholder="Address" required>
 												</div>
 											</div>
 											<div class="modal-footer">
 												<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
 												<button type="button" onclick="showAlert()" class="btn btn-primary">Add</button>
 											</div>
 										</form>
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
 													<th class="col-md-1"><strong>#</strong></th>
 													<th class="col-md-5"><strong>Campus</strong></th>
 													<th class="col-md-5"><strong>Address</strong></th>
 													<th class="col-md-5"><strong>Action</strong></th>
 												</tr>
 											</thead>
 											<tbody>
 												<?php
													$query = "SELECT * FROM campus ORDER BY dateAdded DESC";
													$result = mysqli_query($conn, $query);
													$count = 1;
													while ($row = mysqli_fetch_array($result)) {
													?>
 													<tr>
 														<td><strong><?php echo $count ?></strong></td>
 														<td>
 															<div class="d-flex align-items-center"><span class="w-space-no"><?php echo $row["campus_name"] ?></span></div>
 														</td>
 														<td><?php echo $row["address"] ?></td>
 														<td>
 															<div class="d-flex">
 																<a class="btn btn-dark shadow btn-xs sharp me-1" onclick="setData(`<?= $row['id'] ?>`, `<?= $row['campus_name'] ?>`, `<?= $row['address'] ?>`)" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg-1" title="Update"><i class="fas fa-pencil-alt"></i></a>
 																<div class="modal fade bd-example-modal-lg-1" tabindex="-1" role="dialog" aria-hidden="true">
 																	<div class="modal-dialog modal-lg">
 																		<div class="modal-content">
 																			<div class="modal-header">
 																				<h5 class="modal-title" style="font-size: 23px">Update Campus</h5>
 																			</div>
 																			<form action="edit.campus.php" method="post" id="edit-campus-php">
 																				<div class="modal-body">
 																					<input type="hidden" name="updateid" id="updateid" class="form-control" placeholder="" required>
 																					<div class="row">
 																						<div class="col-md-3">
 																							<label class="form-label">Campus<span class="text-danger">*</span></label>
 																						</div>
 																						<input style="border-radius: 1rem; border: 0.0625rem solid #9DB2BF; padding: 1.25rem; color: #000;" type="text" name="updateCampus" id="updateCampus" class="form-control form-control-lg" placeholder="Campus" required>
 																					</div>
 																					<div class="row" style="margin-top: 14px;">
 																						<div class="col-md-3">
 																							<label class="form-label">Address <span class="text-danger">*</span></label>
 																						</div>
 																						<input style="border-radius: 1rem; border: 0.0625rem solid #9DB2BF; padding: 1.25rem; color: #000;" type="text" name="updateAddress" id="updateAddress" class="form-control form-control-lg" placeholder="Address" required>
 																					</div>
 																				</div>
 																				<div class="modal-footer">
 																					<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
 																					<button type="submit" class="btn btn-primary">Save Changes</button>
 																				</div>
 																			</form>
 																		</div>
 																	</div>
 																</div>
 																<a onclick="deleteRecord(`<?= $row['id'] ?>`)" class="btn btn-dark shadow btn-xs sharp" title="Delete"><i class="fa fa-trash"></i></a> <!-- maglagay lang ng onclick="deleteCampus(`naandito yung id`)", tapos tanggalin ng yung href="..." -->
 															</div>
 														</td>
 													</tr>
 												<?php
														$count++;
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

 	<script>
 		function setData(q, w, r) {
 			document.getElementById('updateid').value = q;
 			document.getElementById('updateCampus').value = w;
 			document.getElementById('updateAddress').value = r;
 		}
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
 					if (result) {
 						var deleteRecord = new XMLHttpRequest();
 						deleteRecord.open("GET", "delete.record.php?table=campus&id=" + e); // yung pangalan lang ng table ang papalitan
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
 	<script>
 		// Function to show SweetAlert
 		function showAlert() {
 			swal({
 				title: "Good job!",
 				text: "Your work has been saved!",
 				icon: "success",
 				button: "OK",
 				dangerMode: true,
 			}).then((e) => {
 				document.getElementById("addCampus").submit();
 			});

 			// Example: Call the showAlert function on button click
 			$(document).ready(function() {
 				$('#showAlertButton').click(function() {
 					showAlert();
 				});
 			});
 		}
 	</script>

 	<script>
 		document.getElementById("edit-campus-php").addEventListener("submit", function(event) {
 			event.preventDefault();
 			swal({
 				title: "Update this Campus?",
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
 			}).then((e) => {
 				if (e) {
 					swal({
 						title: "Campus Updated!",
 						icon: "success",
 					}).then(() => {
 						document.getElementById("edit-campus-php").submit();
 					});
 				}
 			});
 		});
 	</script>

 </body>

 </html>