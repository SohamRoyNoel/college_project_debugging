<?php include "includes/top.php"?>
<?php
if (!isset($_SESSION['forgetHolder'])){
    header('index.php');
}
?>
<?php

if (isset($_POST['submit'])){
    $fst = $_POST['psw1'];
    $snd = $_POST['psw2'];
    $em = $_SESSION['changer'];
    unset($_SESSION['changer']);
    $f = $_SESSION['used'];

    if ($f == "user") {
        if ($fst == $snd) {
            $query = "update user set password = '{$fst}' where email='{$em}'";
            $execute = mysqli_query($connection, $query);
            header("Location: index.php");
        }
    }

    if ($f == "company"){
        if ($fst == $snd){
            $query = "update company set password = '{$fst}' where email='{$em}'";
            $execute = mysqli_query($connection, $query);
            header("Location: index.php");
        }
    }
     if ($f == "creator"){
        if ($fst == $snd){
            $query = "update creators set password = '{$fst}' where email='{$em}'";
            $execute = mysqli_query($connection, $query);
            header("Location: index.php");
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
                    <h2>Change your password here</h2>
                </div>
                <div class="textbox-wrap">
                    <div class="input-group">
                        <span class="input-group-addon "><i class="fa fa-key"></i></span>
                        <input type="password" name="psw1" id="ps1"  class="form-control" placeholder="Enter Password" required>
                    </div>
                </div>
                <div class="textbox-wrap">
                    <div class="input-group">
                        <span class="input-group-addon "><i class="fa fa-key"></i></span>
                        <input type="password" name="psw2" id="ps2" class="form-control" placeholder="ReEnter Password" required>
                    </div>
                </div>
                <div class="forgot">
                    <div class="clearfix"> </div>
                </div>
                <div class="form-actions">
                    <input type="submit" value="Next" name="submit" id="submit" class="btn btn-primary btn-sm">
                </div>
            </form>
            <div class="login-bottom">
            </div>
        </div>
    </div>
</div>


</body>
