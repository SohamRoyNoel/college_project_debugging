<?php include "includes/top.php"?>

<?php
    if (!isset($_SESSION['forgetHolder'])){
        header('index.php');
    }
?>

<?php
if (isset($_POST['submit'])){

    $realotp = $_SESSION['otp'];
    if (isset($_POST['submit'])){
        $valotp = $_POST['otp'];

        if ($valotp == $realotp){
            unset($_SESSION['otp']);
            header("Location: changepassword.php");
        } else {
            echo "<script>alert(\"OTP doesn't match.\")</script>";
        }
    }


}

?>

<body>
<div class="col-sm-4" style="margin-left: 450px">
    <div class="login-form-section">
        <div class="login-content">
            <form action="" method="post">
                <div class="section-title">
                    <img src="images/main-logo.png"><br><br><br>
                    <h2>Enter OTP</h2>
                </div>
                <div class="textbox-wrap">
                    <div class="input-group">
                        <span class="input-group-addon "><i class="fa fa-user"></i></span>
                        <input type="text" name="otp"  class="form-control" placeholder="OTP" required>
                    </div>
                </div>
                <div class="forgot">
                    <div class="clearfix"> </div>
                </div>
                <div class="form-actions">
                    <input type="submit" value="Next" name="submit" class="btn btn-primary btn-sm">
                </div>
            </form>
            <div class="login-bottom">
            </div>
        </div>
    </div>
</div>

</body>
