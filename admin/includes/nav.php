
        <nav class="navbar-default navbar-static-top" role="navigation">
             <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <h1> <a class="navbar-brand" href="../index.php">Home</a></h1>         
			   </div>
			 <div class="border-bottom">
        	<div class="full-left">
        	  
			<li>
<?php
if(isset($_SESSION['name'])) {
echo $_SESSION['name'];


}
?></li>
            <div class="clearfix"> </div>
           </div>
         
		    
		        <ul class="nav navbar-right top-nav">
		        
		        <div class="clearfix"> </div>
		        <div class="full-right">
		        <li>Users Online: <span class="usersonline"></span></li>
		       	<li>
                   <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><img width='45' src="images/<?php echo $_SESSION['img']; ?>"></a>
		            </li>
                    </div>
                    <div class="clearfix"> </div>
		        </ul>
		
			<div class="clearfix"></div>
	  
		    <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
				
                    <li>
                        <a href="index.php" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboards</span> </a>
                    </li>
                      <li><a href="jobs.php" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i>All Jobs</a></li>

                  <li><a href="cre_jobs.php" class=" hvr-bounce-to-right"><i class="fa fa-bus nav_icon"></i>Other Jobs</a></li>
      
                    <li>
                        <a href="users.php" class=" hvr-bounce-to-right"><i class="fa fa-user nav_icon"></i><span class="nav-label">Users</span> </a>
                    </li>
                    <li>
                        <a href="company.php" class=" hvr-bounce-to-right"><i class="fa fa-industry nav_icon"></i><span class="nav-label">Company</span> </a>
                    </li>
                    <li>
                        <a href="qna.php" class=" hvr-bounce-to-right"><i class="fa fa-fax nav_icon"></i><span class="nav-label">QNA</span> </a>
                    </li>
                    <li>
                        <a href="add_creator.php" class=" hvr-bounce-to-right"><i class="fa fa-user nav_icon"></i><span class="nav-label">Add admin</span> </a>
                    </li>
                    <li>
                        <a href="contact.php" class=" hvr-bounce-to-right"><i class="fa fa-book nav_icon"></i><span class="nav-label">Contact</span> </a>
                    </li>
                    <li>
                        <a href="profile.php" class=" hvr-bounce-to-right"><i class="fa fa-user nav_icon"></i><span class="nav-label">Profile</span> </a>
                    </li>
                    <li>
                        <a href="logout.php" class=" hvr-bounce-to-right"><i class="fa fa-trash nav_icon"></i><span class="nav-label">Logout</span> </a>
                    </li>

          
                </ul>
            </div>
			</div>
            </div>
        </nav>
        <script>
function loadUsersOnline() {


	$.get("functions.php?onlineusers=result", function(data){

		$(".usersonline").text(data);


	});



}


setInterval(function(){

	loadUsersOnline();


},500);

</script>