	<div class="content-top">
			<div class="col-md-4 ">
			<a href="jobs.php">
				<div class="content-top-1">
				<div class="col-md-6 top-content">
					<h5>Jobs</h5>
					
					  <?php 

                        $query = "SELECT * FROM jobs";
                        $select_all_job = mysqli_query($connection,$query);
                        $job_count = mysqli_num_rows($select_all_job);

                      echo  "<label>{$job_count}</label>";

                        ?>

				</div>
				<div class="col-md-6 top-content1">	   
					
				</div>
				 <div class="clearfix"> </div>
				</div>
                </a>
                <a href="company.php">
				<div class="content-top-1">
				<div class="col-md-6 top-content">
					<h5>Company</h5>

					<?php 
                                $query = "SELECT * FROM company";
                                    $select_all_company = mysqli_query($connection,$query);
                                    $company_count = mysqli_num_rows( $select_all_company);

                                   echo  "<label>{$company_count}</label>";

                                    ?>
				</div>
		
				 <div class="clearfix"> </div>
				</div>
                </a>
                <a href="users.php">
				<div class="content-top-1">
				<div class="col-md-6 top-content">
					<h5>Users</h5>
					
					<?php 

                                        $query = "SELECT * FROM user";
                                        $select_all_users = mysqli_query($connection,$query);
                                        $user_count = mysqli_num_rows($select_all_users);

                                      echo  "<label>{$user_count}</label>";

                                        ?>
			
				</div>
			
		
				 <div class="clearfix"> </div>
				</div>
                </a>
			</div>
			
<div class="content-mid">
			
			<div class="col-md-7 mid-content-top">
				<div class="middle-content">
					<h3>Partners</h3>
					<!-- start content_slider -->
		<div id="owl-demo" class="owl-carousel text-center">
			
			<div class="item">
				<img class="lazyOwl img-responsive" data-src="images/2.jpg" alt="name">
			</div>
			<div class="item">
				<img class="lazyOwl img-responsive" data-src="images/3.jpg" alt="name">
			</div>
			<div class="item">
				<img class="lazyOwl img-responsive" data-src="images/4.jpg" alt="name">
			</div>
			<div class="item">
				<img class="lazyOwl img-responsive" data-src="images/5.jpg" alt="name">
			</div>
			<div class="item">
				<img class="lazyOwl img-responsive" data-src="images/6.jpg" alt="name">
			</div>
			<div class="item">
				<img class="lazyOwl img-responsive" data-src="images/7.jpg" alt="name">
			</div>
			
		</div>
		</div>
		<!--//sreen-gallery-cursual---->
		<!-- requried-jsfiles-for owl -->
		<link href="css/owl.carousel.css" rel="stylesheet">
		<script src="js/owl.carousel.js"></script>
			<script>
				$(document).ready(function() {
					$("#owl-demo").owlCarousel({
						items : 2,
						lazyLoad : true,
						autoPlay : true,
						pagination : true,
						nav:true,
					});
				});
			</script>
		<!-- //requried-jsfiles-for owl -->
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="clearfix"> </div>
		</div>
		<!---->