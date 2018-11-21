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
                        <th>Address</th>
                        <th>Phone no</th>
                        <th>Email</th>
                        <th>Extra</th>
                        <th>Role</th>
                         <th>Delete</th>
                   
        
                    </tr>
                </thead>
                
                      <tbody>
                      

  <?php 
    
    $query = "SELECT * FROM user WHERE user_pos = 'creator' ";
    $select_users = mysqli_query($connection,$query);  
    while($row = mysqli_fetch_assoc($select_users)) {
        $user_id             = $row['id'];
        $username            = $row['name'];
        $user_address        = $row['address'];
        $user_phone          = $row['phone'];
        $user_email          = $row['email'];
        $user_extra          = $row['extra'];
        $user_role           = $row['user_role'];
    
        
        echo "<tr>";
        
        echo "<td>$user_id </td>";
        echo "<td>$username</td>";
        echo "<td>$user_address</td>";

        echo "<td>$user_phone</td>";
        echo "<td>$user_email</td>";
        echo "<td>$user_extra</td>";
        echo "<td>$user_role</td>";
        
        echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='creator_users.php?delete={$user_id}'><i class='fa fa-trash'></i></a></td>";
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

        $query = "DELETE FROM user WHERE id = {$the_user_id} ";
        $delete_user_query = mysqli_query($connection, $query);
        header("Location: users.php");

            }   
?>     

      
            
            
            
            
            
            
            
      