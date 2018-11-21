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
				<span>Creators</span>
				</h2>
		    </div>
		    <br>
           <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Creators</h3>
								</div>
								<div class="panel-body">
                            
                                    <table class="table table-hover">
										<thead>
											<tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Address</th>
                        <th>Phone no</th>
                        <th>Email</th>
                        <th>Extra</th>
                        <th>Delete</th>
                   
        
                    </tr>
                </thead>
                
                      <tbody>
                      

  <?php 
    
    $query = "SELECT * FROM creators  ";
    $select_creators = mysqli_query($connection,$query);  
    while($row = mysqli_fetch_assoc($select_creators)) {
        $id             = $row['id'];
        $name            = $row['name'];
        $address        = $row['address'];
        $no          = $row['no'];
        $email          = $row['email'];
        $extra          = $row['extra'];
    
        
        echo "<tr>";
        
        echo "<td>$id </td>";
        echo "<td>$name</td>";
        echo "<td>$address</td>";

        echo "<td>$no</td>";
        echo "<td>$email</td>";
        echo "<td>$extra</td>";
        
        echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='creator_users.php?delete={$id}'><i class='fa fa-trash'></i></a></td>";
        echo "</tr>";
 
    }




      ?>


   
            </tbody>
            </table>
               </div>
</div>     

   
<?php

 
if(isset($_GET['delete'])){

    $the_user_id = escape($_GET['delete']);

        $query = "DELETE FROM creators WHERE id = {$the_user_id} ";
        $delete_user_query = mysqli_query($connection, $query);
        header("Location: creator_users.php");

            }   
?>     

      
            
            
            
            
            
            
            
      

