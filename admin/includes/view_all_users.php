

           <div class="panel">
								<div class="panel-heading">
								
								</div>
								<div class="panel-body">
                                    <button type="button" class="btn btn-info">Industrial</button>                           
                                    <div class="collapse">
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
                        <th>Admin</th>
                        <th>Subscriber</th>
                         <th>Delete</th>
                   
        
                    </tr>
                </thead>
                
                      <tbody>
                      

  <?php 
    
    $query = "SELECT * FROM user WHERE user_pos = 'pro' ";
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
        
     echo "<td><a href='users.php?change_to_admin={$user_id}'><i class='fa fa-bug'></i></a></td>";
        echo "<td><a href='users.php?change_to_sub={$user_id}'><i class='fa fa-industry'></i></a></td>";
        echo "<td><a href='users.php?delete={$user_id}'><i class='fa fa-trash'></i></a></td>";
        echo "</tr>";
   
    }
 ?>
   </tbody>
            </table>
               </div>
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

if(isset($_GET['change_to_admin'])) {
    
    $the_user_id = escape($_GET['change_to_admin']);
    
    $query = "UPDATE user SET user_role = 'admin' WHERE id = $the_user_id   ";
    $change_to_admin_query = mysqli_query($connection, $query);
    header("Location: users.php");
    
    
}
if(isset($_GET['change_to_sub'])){
    
    $the_user_id = escape($_GET['change_to_sub']);
    

    $query = "UPDATE user SET user_role = 'subscriber' WHERE id = $the_user_id   ";
    $change_to_sub_query = mysqli_query($connection, $query);
    header("Location: users.php");
}
    
if(isset($_GET['delete'])){

    $the_user_id = escape($_GET['delete']);

        $query = "DELETE FROM user WHERE user = {$the_user_id} ";
        $delete_user_query = mysqli_query($connection, $query);
        header("Location: users.php");

            }   
?>                        
            
            
            
            
            
            
            
      