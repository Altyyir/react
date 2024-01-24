<?php

include 'dbconn.php';
$query = "SELECT * FROM research_topic ORDER BY dateAdded DESC";
$result = mysqli_query($conn, $query);
$count = 1;

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
	<title>Faculty Researcher Dashboard</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/maamdj.jpg">
	<link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link href="vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
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
                                Research Topic
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
                                    <div id="DZ_W_Notification1" class="widget-media dlab-scroll p-3" style="height:280px;">
										<ul class="timeline">
											<li>
												<div class="timeline-panel">
													<div class="media me-2">
														<img alt="image" width="50" src="images/avatar/1.jpg">
													</div>
													<div class="media-body">
														<h6 class="mb-1">5 ddays left to finished your paper</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>

										</ul>
									</div>
                      <a class="all-notification" href="javascript:void(0);">See all notifications <i class="ti-arrow-end"></i></a>
                  </div>
              </li>
							<li class="nav-item dropdown  header-profile">
								<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
									<img src="images/maamdj.jpg" width="56" alt="">
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
                    <li><a href="index.php">
							<i class="fas fa-home"></i>
							<span class="nav-text">Dashboard</span>
						</a>
         	 </li>
         	 <li>
           	<a href="#" class="">
						    <i class="fas fa-bullseye"></i>
							<span class="nav-text">Target</span>
						</a>
					</li>
         	 <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
							<i class="fas fa-user"></i>
							<span class="nav-text">My Profile</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="personalprofiles.php">Personal Profile</a></li>
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
					<li><a href="certificates.php" class="">
						     <i class="fas fa-award"></i>
							 <span class="nav-text">Certificates</span>
						</a>
					</li>
					<li><a href="cv.php" class="">
						     <i class="fas fa-file-alt"></i>
							 <span class="nav-text">Technical CV</span>
						</a>
					</li>
					<li>
						<a class="has-arrow " href="#" aria-expanded="false">
							<i class="fas fa-server	"></i>
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
				<?php
					if (isset($_GET['success'])) {
						echo '<div class="alert alert-success alert-dismissible fade show">
					<svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
					<strong>Success!</strong> New record created successfully.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
		            </button>
				</div>';
					}
				?>

				<div class="row">
					<div class="col-xl-12">
						<div class="d-flex justify-content-between align-items-center flex-wrap">
							<div class="input-group contacts-search mb-4">
<!-- 								<input type="text" class="form-control" placeholder="Search here...">
								<span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span> -->
							</div>
							<div class="mb-4">
								<a href="javascript:void(0);" class="btn btn-primary btn-rounded fs-16"><i style='font-size: 14px;' class='fas'>&#xf0b0;</i>  Filter
								</a>
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
				                            <th style="width: 150px;" class='titleHeader'><strong>Title of Projects</strong></th>
				                            <th class="center-align" style="width: 100px;"><strong>Types of Research Funding</strong></th>
				                            <th class="center-align" style="width: 80px;"><strong>Inclusive Period</strong></th>
				                            <th class="center-align" style="width: 100px;"><strong>Researcher/s</strong></th>
				                            <th class="center-align" style="width: 100px;"><strong>Status</strong></th>
				                            <th class="center-align"><strong>Action</strong></th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                    	<?php 
				                    	while($row = mysqli_fetch_array($result)) {
				                    	 ?>
				                	 	<tr>
					                  	   <td style="display: none;" class='center-align px-3'><strong><?php echo $count?></strong></td>
					                       <td class='titleHeader'><div class="d-flex align-items-center" class="rounded-lg me-2" width="350px" alt="" style="text-align: left;"><?php echo $row["project_title"]?></div></td>
					                      <td class="center-align"><?php echo $row["partnership"]?></td>
					                      
					                      <?php
											$start_date = strtotime($row['start_date']);
											$start_date = date("M d, Y", $start_date);
											$end_date = strtotime($row['end_date']);
											$end_date = date("M d, Y", $end_date);
											?>

										  <td class="center-align"><?php echo $start_date . " - " . $end_date; ?></td>
					                      <td class="center-align"></td>
					                      <td>
					                      	<div style="background-color: <?php if($row['status'] == "Approved With Notice to Proceed") {echo "#1f89e5";} else if($row['status'] == "Ongoing") {echo "#a19c9c";} else if($row['status'] == "Completed") {echo "#1dbf1d";} else if($row['status'] == "For Evaluation") {echo "#ff0000";}?>; text-align: center; border-radius: 10px;"><?=$row['status']?></div></td>
					                      <td style="padding-right: 38px;"> 
					                      	
												<div>
													<div class="row justify-content-end">
													<a href="" class="btn btn-dark shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#exampleModalCenter1" onclick="setImage(`<?=$row['approval_letter']?>` )" title='Approve Letter'><i class="fas fa-clipboard-check"></i></a>
													<div class="modal fade" id="exampleModalCenter1" >
					                                    <div class="modal-dialog modal-dialog-centered" role="document">
					                                        <div class="modal-content">
					                                            <div class="modal-header">
					                                                <h5 class="modal-title" style="font-size:20px">Approval Letter</h5>
					                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
					                                                </button>
					                                            </div>
					                                            <div class="modal-body" style="max-height:250px;">
					                             					 <div class="container3" style="margin-top: 0px;">
									                                    <div id="img-area3" data-img="">
									                                      <img id="image">
									                                    </div>
									                              </div>
					                                            </div>
					                                            <div class="modal-footer">
					                                                	

																</div>
					                                        </div>
					                                    </div>
					                                </div>
													<a href="#" class="btn btn-dark shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#exampleModalCenter_<?php echo $row['id'] ?>" onclick="setId(`<?=$row['id']?>`)"title='Comment'><i class="fas fa-comments"></i></a>
													<a href="pdf.php?id=<?php echo $row['id'] ?>" target="_blank" class="btn btn-dark shadow btn-xs sharp me-1" name="approve" value="approve" title='Project Proposal'><i class="fas fa-cloud-download-alt"></i></a>
												</div>
												<div class="modal fade" id="exampleModalCenter_<?php echo $row['id'] ?>" >
			                                    <div class="modal-dialog modal-dialog-centered" role="document">
			                                        <div class="modal-content">
			                                            <div class="modal-header">
			                                                <h5 class="modal-title" style="font-size:20px">Comment</h5>
			                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
			                                                </button>
			                                            </div>
			                                            <div class="modal-body" style="max-height:250px; overflow-y: auto;">
			                                                <div class="row">
			                                                	<!-- Comments Section -->
															    <div id="comments_<?=$row['id']?>">
															        <!-- Comments will be displayed here -->
															    </div>

															   </div>
			                                            </div>
			                                            <div class="modal-footer">
			                                                	<div class="d-flex project-image">
																	<img src="images/customers/22.jpg" alt="">
															 		<textarea id="commentText_<?=$row['id']?>" style="width:340px; padding-left: 10px; border-radius: 13px;" rows="2" placeholder="Write a comment..."></textarea>
															 		<button type="button" class="btn btn-primary" style="margin: 5px;" onclick="addComment()">Send</button>
														    	</div>

														    	</div>
			                                        </div>
			                                    </div>
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

  <script src="vendor/sweetalert2/dist/sweetalert2.min.js"></script>
  <script src="js/plugins-init/sweetalert.init.js"></script>

  <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
  <script src="js/plugins-init/datatables.init.js"></script>

  <script src="js/plugins-init/comment.js"></script>
  <script>
  		function setApprovalId(id) {
  			document.getElementById('approval_id').value = id;
  		}

  		function setImage(img) {
  			document.getElementById('image').src = "../headResearch/" + img;
  		}
  	</script>


</body>
</html>