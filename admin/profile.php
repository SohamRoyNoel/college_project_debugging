<?php include "includes/header.php";?>

<?php include "includes/nav.php";?>
		 <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 
 	<!--banner-->	
		    <div class="banner">
		    	<h2>
				<a href="index.php">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Profile</span>
				</h2>
		    </div>
		<!--//banner-->
 	 <!--gallery-->
 	 <div class=" profile">

		<div class="profile-bottom">
			<h3><i class="fa fa-user"></i>Profile</h3>
			<div class="profile-bottom-top">
			<div class="col-md-4 profile-bottom-img">
				<img width='130' src="images/<?php echo $_SESSION['img']; ?>" alt="">
			</div>
			<div class="col-md-8 profile-text">
				<h6> <?php echo $_SESSION['name']; ?></h6>
				<table>
				<tr><td>Extra</td>  
				<td>:</td>  
				<td><?php echo $_SESSION['extra']; ?></td></tr>
				
				<tr>
				<td>Email</td>
				<td> :</td>
				<td><?php echo $_SESSION['email']; ?></td>
				</tr>
				<tr>
				<td>Address</td>
				<td> :</td>
				<td><?php echo $_SESSION['address']; ?></td>
				</tr>
				<tr>
				<td>Sex</td>
				<td> :</td>
				<td><?php echo $_SESSION['sex']; ?></td>
				</tr>
				</table>
			</div>
			<div class="clearfix"></div>
			</div>
			<div class="profile-bottom-bottom">
			
			<div class="col-md-4 profile-fo">
				
				<p>Edit</p>
				<a href="edit_profile.php" class="pro1"><i class="fa fa-user"></i>Edit Profile</a>
			</div>
			
			<div class="clearfix"></div>
			</div>
			
			 
			
		</div>
           </div>


<?php include "includes/footer.php";?>
