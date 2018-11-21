<?php include "includes/top.php"?>
<?php include "includes/header.php"?>

<?php
if (!isset($_SESSION['secret']) || !isset($_GET['j'])){
    header("Location: error.php");
}

if (isset($_POST['subs'])){
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    $jobid = $_GET['j'];
    $user_id = $_SESSION['id'];

    if (!empty($q1) && !empty($q2) && !empty($q3)){
        $query = "insert into confirm(jobid, userid, q1, q2, q3) values ('{$jobid}', {$user_id}, '{$q1}', '{$q2}', '{$q3}')";
        $execute = mysqli_query($connection, $query);
        $_SESSION['confirmQ'] = "true";

        if (!$execute){
            mysqli_error($connection);
        }
        header("Location: index.php");
    } else {
        echo "<script>alert(\"You can not leave any field empty.\")</script>";
    }
}

?>

<div class="single">
    <div class="col-md-4">
        <div class="col_3">
            <h3>Todays Jobs</h3>
            <ul class="list_1">
                <li><a href="#">Department of Health - Western Australia</a></li>
            </ul>
        </div>
        <div class="col_3">
            <h3>Jobs by Category</h3>
            <ul class="list_2">
                <li><a href="#">Railway Recruitment</a></li>
            </ul>
        </div>
    </div>

    <h2>Please Answer this following Questions</h2>
    <form action="" method="post">
        <div class="col-md-8 single_right">
            <div class="panel panel-primary">
                <div class="panel-heading">Why do we hire you?</div>
                <div class="panel-body">
                    <textarea required cols="102" rows="6" name="q1" onfocus="this.value='';" onblur="if (this.value == '') {this.value = '';}"> </textarea>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">What would you like to do for company?</div>
                <div class="panel-body">
                    <textarea required cols="102" rows="6" name="q2"  onfocus="this.value='';" onblur="if (this.value == '') {this.value = '';}"> </textarea>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">What is your expectation from company?</div>
                <div class="panel-body">
                    <textarea required cols="102" rows="6" name="q3"  onfocus="this.value='';" onblur="if (this.value == '') {this.value = '';}"> </textarea>
                </div>
            </div>

            <div class="form-actions">
                <input type="submit" value="Submit" name="subs" class="btn btn-primary btn-sm"><br><br>
            </div>
        </div>
    </form>

</div>
<div class="clearfix"> </div>
</div>

<div class="clearfix"> </div>
</div>
<div class="footer">
    <div class="" style="margin-left: 460px">
        <p>Copyright © 2018 Seeking . All Rights Reserved . Design by <a href="" target="_blank">PreciousSquad</a> </p>
    </div>
</div>