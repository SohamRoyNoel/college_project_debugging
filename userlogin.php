<?php include "includes/top.php"?>
<?php include "includes/header.php"?>

<?php
if (isset($_POST['login'])){
    $em = $_POST['email'];
    $ps = $_POST['password'];

    $query = "select * from user where email='{$em}' and password='{$ps}'";
    $send = mysqli_query($connection, $query);

    if (!$send){
        die("failed".mysqli_error());
    }

    while ($row = mysqli_fetch_assoc($send)){
        $db_user_id = $row['id'];
        $db_user_name = $row['name'];
        $db_user_phone = $row['phone'];
        $db_user_sex = $row['sex'];
        $db_user_dob = $row['dob'];
        $db_user_add = $row['address'];
        $db_user_em = $row['email'];
        $db_user_extra = $row['extra'];
        $db_user_img = $row['img'];
        $db_user_interest = $row['interest'];
        $db_user_password = $row['password'];

        $_SESSION['id'] = $db_user_id;
        $_SESSION['name'] = $db_user_name;
        $_SESSION['phone'] = $db_user_phone;
        $_SESSION['sex'] = $db_user_sex;
        $_SESSION['dob'] = $db_user_dob;
        $_SESSION['add'] = $db_user_add;
        $_SESSION['em'] = $db_user_em;
        $_SESSION['extra'] = $db_user_extra;
        $_SESSION['interest'] = $db_user_interest;
        $_SESSION['password'] = $db_user_password;
        $_SESSION['img'] = $db_user_img;
        $_SESSION['secret'] = "XXX105";

        if (isset($_GET['j'])){
            $val = $_GET['j'];
            header("Location: companyCONFIRM.php?j=$val");
        } else {
            header("Location: userprofile.php");
        }


    }
}
?>

<div class="container">
    <div class="single">
        <?php include "includes/sidebar.php"?>
        <div class="col-md-8 single_right">
            <div class="login-form-section">
                <div class="login-content">
                    <form action="" method="post">
                        <div class="section-title">
                            <h3>LogIn to your Account</h3>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-user"></i></span>
                                <input type="text" name="email"  class="form-control" placeholder="User email" required>
                            </div>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-key"></i></span>
                                <input type="password" name="password" class="form-control " placeholder="Password" required>
                            </div>
                        </div>
                        <div class="forgot">
                            <div class="login-para">
                                <p><a href="forgetpassword.php?user=user"> Forgot Password? </a></p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="form-actions">
                            <input type="submit" value="Login" name="login" class="btn btn-primary btn-sm">
                        </div>
                    </form>
                    <div class="login-bottom">
                        <p>With your social media account</p>
                        <div class="social-icons">
                            <div class="button">
                                <a class="tw" href="#"> <i class="fa fa-twitter tw2"> </i><span>Twitter</span>
                                    <div class="clearfix"> </div></a>
                                <a class="fa" href="#"> <i class="fa fa-facebook tw2"> </i><span>Facebook</span>
                                    <div class="clearfix"> </div></a>
                                <a class="go" href="#"><i class="fa fa-google-plus tw2"> </i><span>Google+</span>
                                    <div class="clearfix"> </div></a>
                                <div class="clearfix"> </div>
                            </div>
                            <h4>Don't have an Account? <a href="userreg.php"> Register Now!</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<div class="footer">
    <div class="" style="margin-left: 460px">
        <p>Copyright © 2018 Seeking . All Rights Reserved . Design by <a href="" target="_blank">PreciousSquad</a> </p>
    </div>
</div>
