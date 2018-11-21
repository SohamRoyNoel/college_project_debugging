<?php include "includes/header.php";?>


<?php include "includes/nav.php";?>
        <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 
  		<!--banner-->	
		    <div class="banner">
		   
				<h2>
				<a href="index.php">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Creator Jobs</span>
				</h2>
		    </div>
		    <br>
		<?php  
          

if(isset($_GET['source'])){

$source = $_GET['source'];

} else {

$source = '';

}

switch($source) {
    
    case 'add_cre_job';
    
     include "includes/add_cre_job.php";
    
    break; 
    
    
    case 'edit_cre_job';
    
    include "includes/edit_cre_job.php";
    break;
    

    default:
    
    include "includes/view_all_cre_jobs.php";
    
    break;
}
 ?>

<?php include "includes/footer.php";?>
	 

