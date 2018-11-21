<?php include "includes/header.php";?>
<div id="wrapper">

<?php include "includes/nav.php";?>
        <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 
  		<!--banner-->	
		    <div class="banner">
		   
				<h2>
				<a href="index.php">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Company</span>
				</h2>
		    </div>
		    <br>
		<!--//banner-->
           <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Users</h3>
								</div>
								<div class="panel-body">
                                    
                                    <table class="table table-hover">
										<thead>
											<tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Reg</th>
                        <th>ISO</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>Since</th>
                        <th>Address</th>
                        <th>Delete</th>
                   
        
                    </tr>
                </thead>
                
                      <tbody>
                      

  <?php 
    
    $query = "SELECT * FROM company ";
    $select_users = mysqli_query($connection,$query);  
    while($row = mysqli_fetch_assoc($select_users)) {
        $id             = $row['id'];
        $name            = $row['name'];
        $reg        = $row['reg'];
        $iso          = $row['iso'];
        $email          = $row['email'];
        $country          = $row['country'];
        $since          = $row['since'];
        $address          = $row['address'];
           
        
        echo "<tr>";
        
        echo "<td>$id </td>";
        echo "<td>$name</td>";
        echo "<td>$reg</td>";

        echo "<td>$iso</td>";
        echo "<td>$email</td>";
        echo "<td>$country</td>";
        echo "<td>$since</td>";
        echo "<td>$address</td>";
         echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='company.php?delete={$id}'><i class='fa fa-trash'></i></a></td>";
        echo "</tr>";
   
    }




      ?>


   
            </tbody>
            </table>
               </div>
</div>     

<script>
$(document).ready(function(){
    $(".btn-info").click(function(){
        $(".collapse").collapse('toggle');
    });
});
</script>         
<?php


if(isset($_GET['delete'])){

    $the_user_id = escape($_GET['delete']);

        $query = "DELETE FROM company WHERE id = {$the_user_id} ";
        $delete_user_query = mysqli_query($connection, $query);
        header("Location: company.php");

            }   
?>     
	<!--//content-->

<?php include "includes/footer.php";?>
	 

