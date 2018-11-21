<?php include "includes/header.php";?>

<?php include "includes/nav.php";?>
<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="content-main">

        <!--banner-->
        <div class="banner">

            <h2>
                <a href="index.php">Home</a>
                <i class="fa fa-angle-right"></i>
                <span>Add Admin</span>
            </h2>
        </div>



        <div class="validation-system">

            <div class="validation-form">
                <!---->

                <?php
                if(isset($_POST['add_user'])) {


                    $no = $_POST['no'];
                    $sex = $_POST['sex'];
                    $dob = $_POST['dob'];
                    $add = $_POST['address'];
                    $extra = $_POST['extra'];
                    $email = $_POST['email'];
                    $images = $_FILES['image']['name'];
                    $image_temps = $_FILES['image']['tmp_name'];


                    $name = $_POST['name'];
                    $password = $_POST['password'];
                    move_uploaded_file($image_temps, "images/$images" );


                   $query = "INSERT INTO creators(no, sex, dob,address,extra,img,name,password,email) ";
                   $query .= "VALUES('{$no}','{$sex}','{$dob}','{$add}','{$extra}', '{$images}','{$name}','{$password}','{$email}') "; 
                    


                    $edit_user_query = mysqli_query($connection,$query);

                    confirmQuery($edit_user_query);
                     print("<script>window.alert('User Created');</script>");
                    
                    
                }
                ?>
                
                

                <form id="form"  action="" method="post" enctype="multipart/form-data">
                    <div class="vali-form">
                        <div class="col-md-6 form-group1">
                            <label for="usname" class="control-label">Name</label>
                            <input minlength="4" maxlength="10" type="text" placeholder="Name" required="" name="name">
                        </div>
                    
                        <div class="clearfix"> </div>
                    </div>

                    <div class="col-md-6 form-group1">
                        <label class="control-label">Phone no</label>
                        <input minlength="10" maxlength="10" onkeypress="return isNumberKey(event)" name="no" type="text" placeholder="No." required="">
                    </div>
                    <script>
                    function isNumberKey(evt){
                        var charCode = (evt.which) ? evt.which : event.keyCode
                        if (charCode > 31 && (charCode < 48 || charCode > 57))
                            return false;
                        return true;
                    }
                </script>
                    <div class="col-md-6 form-group1">
                        <label class="control-label">Date of Birth</label>
                        <input name="dob" type="date" placeholder="" required="">
                    </div>
                    <div class="clearfix"> </div>
                    <div class="col-md-6 form-group1">
                        <label class="control-label">Address</label>
                        <input minlength="4" maxlength="50" name="address" type="text" placeholder="Address" required="">
                    </div>
                    <br>
                    <div class="clearfix"> </div>
                    <br>
                    <div class="col-md-6 form-group1">
                 <label for="email">Email</label>
               <input minlength="5" maxlength="50" type="email" class="form-control" placeholder="email" name="email">
               </div>
                    <div class="clearfix"> </div>
                    <div class="panel-body">
                        
        <select name="sex" id="" class="form-control">
        <option value="male">Select Options</option>
          <option value="female">Female</option>
          <option value="male">Male</option>
           
        
       </select>
                    </div>
                    
                    <div class="form-group">
             <label for="image" for="exampleInputFile">File Input</label>
              <input type="file"  name="image" id="exampleInputFile">
                </div>

                    <div class="col-md-6 form-group1">
                        <label for="extra" class="control-label">Extra</label>
                        <input minlength="3" maxlength="10" type="text" placeholder="Extra" required=""  name="extra">
                    </div>
                    <div class="clearfix"> </div>
                    <div class="col-md-12 form-group1 ">
                        <label for="password" class="control-label">Password</label>
                        <input minlength="4" type="password"  name="password"  placeholder="password" required="">
                    </div>
                    <div class="clearfix"> </div>
                    <div class="col-md-12 form-group">
                        <button name="add_user" type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </div>

                    <div class="clearfix"> </div>

                </form>
                <!---->
            </div>

        </div>
        <?php include "includes/footer.php";?>
	 