<?php include "includes/top.php"?>
<?php include "includes/header.php"?>

<?php
if (isset($_GET['j'])){
    $idJob = intval($_GET['j']);

    $jobs = "select * from jobs where id = {$idJob}";
    $query = mysqli_query($connection, $jobs);
    while ($row = mysqli_fetch_assoc($query)) {
        $id1 = $row['id'];
        $title1 = $row['title'];
        $date = $row['date'];
        $cid1 = $row['company_id'];
        $object1 = $row['object'];
        $hremail1 = $row['HRem'];
        $hrcontact1 = $row['HRph'];
        $salary1 = $row['salary'];
        $location1 = $row['location'];
        $target1 = $row['targetTo'];
        $skill1 = $row['skill'];
        $education1 = $row['mineducation'];
        $role1 = $row['role'];
        $type = $row['type'];

        $company = "select * from company where id = {$cid1}";
        $cquery = mysqli_query($connection, $company);
        while ($row = mysqli_fetch_assoc($cquery)) {
            $db_company_id = $row['id'];
            $db_company_name = $row['name'];
            $db_company_reg = $row['reg'];
            $db_company_iso = $row['iso'];
            $db_company_em = $row['email'];
            $db_company_dob = $row['since'];
            $db_company_img = $row['img'];

            $db_company_scale = $row['scale'];
            $db_company_address = $row['address'];
            $db_company_country = $row['country'];
            $db_company_subject = $row['subject'];
        }
    }
}
?>


<div class="single">
    <?php include "includes/sidebar.php"?>

    <div class="col-md-8 single_right">
        <?php
        if ($type == "company") {
            ?>
        <h3>Watch The Company Profile Details</h3>
                <div class="row_1">
                    <div class="col-sm-5 single_img">
                        <img src="companyImage/<?php echo $db_company_img; ?>" class="img-responsive" alt=""/>
                    </div>
                    <div class="col-sm-7 single-para">
                        <p><b><i>Posted By :</i></b> <?php echo $db_company_name ?></p>
                        <p><b>Registration :</b> <?php echo $db_company_reg ?>  </p>
                        <p><b>ISO :</b> <?php echo $db_company_iso ?>  </p>
                        <p><b>Scale :</b> <?php echo $db_company_scale ?>  </p>
                        <p><b>Email :</b> <?php echo $db_company_em ?>  </p>
                        <p><b>Address :</b> <?php echo $db_company_address ?>  </p>
                        <p><b>Country :</b> <?php echo $db_company_country ?>  </p>
                        <p><b>Subject :</b> <?php echo $db_company_subject ?>  </p>
                        <p><b>ESTD :</b> <?php echo $db_company_dob ?>  </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php
            }
        ?>
        <h5>Job Details Related To This Post</h5>
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <div style="color: black">
                        <b style="color: #00acee">Company :</b> &nbsp; <?php echo $type == "company"? $db_company_name : "Seeker.com" ?><br>
                        <b style="color: #00acee">Title :</b>&nbsp; <?php echo $title1; ?><br>
                        <b style="color: #00acee">Role :</b>&nbsp;<?php echo $role1; ?><br>
                        <b style="color: #00acee">Min Education :</b>&nbsp;<?php echo $education1; ?><br>
                        <b style="color: #00acee">Skill :</b>&nbsp;<?php echo $skill1; ?><br>
                        <b style="color: #00acee">Target :</b>&nbsp;<?php echo $target1; ?><br>
                        <b style="color: #00acee">Location :</b>&nbsp;<?php echo $location1; ?><br>
                        <b style="color: #00acee">Salary :</b>&nbsp;<?php echo $salary1; ?><br>
                        <b style="color: #00acee">HRPhone :</b>&nbsp;<?php echo $hrcontact1; ?><br>
                        <b style="color: #00acee">HRMail :</b>&nbsp;<?php echo $hremail1; ?><br>
                        <b style="color: #00acee">Job Objective :</b>&nbsp;<?php echo $object1; ?><br>
                        <b style="color: #00acee">Posted On :</b>&nbsp; <?php echo $date; ?><br>
                    </div>
                </h4>
            </div>
        </div>
        <h5>Points To Be Noted While Apply</h5>
        <p>
        <ul class="list-group">
            <li class="list-group-item list-group-item-success">1. Now You are seeing the job</li>
            <li class="list-group-item list-group-item-info">2. If you are interested simply click <b>APPLY</b></li>
            <li class="list-group-item list-group-item-warning">3. Login Or Register Yourself</li>
            <li class="list-group-item list-group-item-danger">4. Give answer of two or three questions</li>
            <li class="list-group-item list-group-item-default">5. Final click on submit will post your PROFILE to company</li>
        </ul>
        </p>

        <?php
                if (isset($_SESSION['id'])){
                    echo "<a href=\"companyCONFIRM.php?j=$idJob\"> <input type=\"submit\" class=\"btn btn-primary btn-lg btn-block\" value=\"Apply Now\"></input></a>";
                } else {
                    echo "<a href=\"userlogin.php?j=$idJob\"> <input type=\"submit\" class=\"btn btn-primary btn-lg btn-block\" value=\"Apply Now\"></input></a>";
                }
        ?>


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