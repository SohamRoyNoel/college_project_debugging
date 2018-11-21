<?php include "includes/top.php"?>
<?php include "includes/header.php"?>

<?php
    // validation layer 1
    if (!isset($_SESSION['id']) && !isset($_SESSION['reg']) && !isset($_SESSION['iso']) && !isset($_GET['j'])){
        header("Location: error.php");
    }

    // validation layer 2
    $jobval = $_GET['j'];
    $compval = $_GET['k'];
    $real = $_SESSION['id'];
    if ($compval != $real){
        header("Location: error.php");
    }

    // validation layer 3
    $validationq = "select * from jobs where id = {$jobval} and company_id = {$compval}";
    $valudatione = mysqli_query($connection, $validationq);
    while ($v = mysqli_fetch_assoc($valudatione)){
        $titlexp = $v['title'];
    }
    if (empty($titlexp)){
        header("Location: error.php");
    }
?>
<?php
if (isset($_POST['invite'])){
    $grab = $_POST['hola'];
    $hole = "1";
    $qs = "update confirm set status = '{$hole}' where id = {$grab}";
    $ex = mysqli_query($connection, $qs);
    header("Location: companyResponse.php?j=$jobval&k=$compval");
}
if (isset($_POST['decline'])){
    $grab = $_POST['hola'];
    $holes = "0";
    $qs = "update confirm set status = '{$holes}' where id = {$grab}";
    $ex = mysqli_query($connection, $qs);
    header("Location: companyResponse.php?j=$jobval&k=$compval");
}
?>

<div class="container">
    <div class="single">
        <div>
            <?php
                $jobid = $_GET['j'];
                $companyID = $_SESSION['id'];

                $query = "select * from confirm where jobid = {$jobid}";
                $execute = mysqli_query($connection, $query);

                if (!$execute){mysqli_error($connection);}

                $query2 = "select * from jobs where id = {$jobid}";
                $execute2 = mysqli_query($connection, $query2);
                while ($r = mysqli_fetch_assoc($execute2)){
                    $jobname = $r['title'];
                }
            ?>
            <h2>Responses Related To The JOB</h2>
            <h4 style="margin-left: 420px; font-size: 25px; background-color: #D2CF99; margin-right: 420px"><b><?php echo $jobname?></b></h4><br>
            <center>
            <table class="table table-responsive">
                <thead>
                    <th>Candidate name</th>
                    <th>Phone</th>
                    <th>Sex</th>
                    <th>DOB</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Skill</th>
                    <th>Interest</th>
                    <th>CV</th>
                    <th>Invite</th>
                    <th>Decline</th>
                </thead>
                <tbody>
                <?php
                        while ($row = mysqli_fetch_assoc($execute)) {
                            $user_id = $row['userid'];
                            $id = $row['id'];


                            $query1 = "select * from user where id = {$user_id}";
                            $execute1 = mysqli_query($connection, $query1);
                            while ($row = mysqli_fetch_assoc($execute1)) {
                                $db_user_name = $row['name'];
                                $db_user_phone = $row['phone'];
                                $db_user_sex = $row['sex'];
                                $db_user_dob = $row['dob'];
                                $db_user_add = $row['address'];
                                $db_user_em = $row['email'];
                                $db_user_extra = $row['extra'];
                                $interest = $row['interest'];
                                $db_user_cv = $row['CV'];
                                ?>
                                <tr>
                                    <td><?php echo $db_user_name; ?></td>
                                    <td><?php echo $db_user_phone; ?></td>
                                    <td><?php echo $db_user_sex; ?></td>
                                    <td><?php echo $db_user_dob; ?></td>
                                    <td><?php echo $db_user_add; ?></td>
                                    <td><?php echo $db_user_em; ?></td>
                                    <td><?php echo $db_user_extra; ?></td>
                                    <td><?php echo ($interest==1?"Programmer":($interest==2?"Algorithmist":($interest==3?"Network Security"
                                            :($interest==4?"IT":($interest==5?"All Jobs":($interest==6?"Car Consultant":($interest==7?"Nursing"
                                                :($interest==8?"Security":($interest==9?"Driver":($interest==10?"Resturant":($interest==11?"Programmer"
                                                    :($interest==12?"Programmer":($interest==13?"Programmer":($interest==14?"Programmer":($interest==15?"Programmer"
                                                        :$interest==16?"Programmer":""))))))))))))))) ?></td>

                                    <td><a href="download.php?book=<?php echo $db_user_cv?>" class="btn btn-outline-light btn-lg"><i
                                                    class="fa fa-download"></i><span>&nbsp;&nbsp;Download CV</span></a></td>

                                    <form action="" method="post">
                                        <td><input type="submit" class="btn btn-success" name="invite" value="Invite"></td>
                                        <input type="hidden" name="hola" value="<?php echo $id; ?>">
                                        <td><input type="submit" class="btn btn-danger" name="decline" value="Decline"></td>
                                    </form>
                                </tr>
                                <?php
                            }
                        }
                ?>
                </tbody>
            </table>
            </center>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<div class="footer">
    <div class="" style="margin-left: 460px">
        <p>Copyright © 2018 Seeking . All Rights Reserved . Design by <a href="" target="_blank">PreciousSquad</a> </p>
    </div>
</div>