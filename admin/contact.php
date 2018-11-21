
<?php include "includes/header.php";?>

<?php include "includes/nav.php";?>
 
        <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 
  		<!--banner-->	
		    <div class="banner">
		   
				<h2>
				<a href="index.php">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Contacts</span>
				</h2>
		    </div>
		    <br>
   

           <div class="panel">
								<div class="panel-heading">
								
								</div>
								<div class="panel-body">

                                    <table class="table table-hover">
										<thead>
											<tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Message</th>
                        <th>Phone</th>
                        <th>Reply</th>
                        <th>Delete</th>
                         <th>Email</th>
                         <th>Submit</th>
                   
        
                    </tr>
                </thead>
                
                      <tbody>
                      

  <?php 
                    

    $query = "SELECT * FROM contact ";
    $select_users = mysqli_query($connection,$query);  
    while($row = mysqli_fetch_assoc($select_users)) {
        $id             = $row['id'];
        $name            = $row['name'];
        $message      = $row['message'];
        $phone          = $row['phone'];
        $email          = $row['email'];
        $reply          = $row['reply'];
    
    
        
        echo "<tr>";
        
        echo "<td>$id  </td>";
        echo "<td>$name </td>";
        echo "<td>$message</td>";

        echo "<td>$phone</td>";
        
         echo "<td>$reply</td>";
      echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='contact.php?delete={$id}'><i class='fa fa-trash'></i></a></td>"; 
        
        if(isset($_POST['c_id'])){
    
    $the_id =  escape($_POST['c_id']);

    }
 require_once ('../PHPMailer/PHPMailerAutoload.php');                   
    if(isset($_POST['submit'])){
            $reply   =  escape($_POST['reply']);
          $email1   =  escape($_POST['email1']);
         $query = "UPDATE contact SET reply  = '{$reply}' WHERE id = $the_id"; 
            $select = mysqli_query($connection,$query);

                        $mail = new PHPMailer();
                        $mail->isSMTP();
                        $mail->SMTPAuth = true;
                        $mail->SMTPSecure = 'ssl';
                        $mail->Host = 'smtp.gmail.com';
                        $mail->Port = '465';
                        $mail->isHTML();
                        $mail->Username='jobseekerowner@gmail.com';
                        $mail->Password = 'iloveass1234';
                        $mail->SetFrom('no-reply@howcode.org');
                        $mail->Subject = 'Reply';
                        $mail->Body = $reply;
                        $mail->AddAddress($email1);
                        $mail->Send();
                  if(!$mail->Send()){
                         echo "<script>alert(\"Not sent.\")</script>";
                  }
                     else {
                        echo "<script>alert(\"sent.\")</script>";
                    }

        }
          echo "<form id=''  action='' method='post'>
        <td> <input value='{$email}' name='email1' readonly></td>;  
     <td><input type='text' placeholder='type' required=''  name='reply'><input type=\"hidden\" name=\"c_id\" value=\"{$id}\"><input name='submit' type='submit' value='submit'></td></form>";    
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

        $query = "DELETE FROM contact WHERE id = {$the_user_id} ";
        $delete_user_query = mysqli_query($connection, $query);
        header("Location: contact.php");

            }   
?>                        


<?php include "includes/footer.php";?>