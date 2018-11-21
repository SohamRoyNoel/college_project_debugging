<?php include "includes/top.php"?>
<?php include "includes/header.php"?>

<div class="container">
    <div class="single">
        <div class="col-md-4">
            <div class="col_3">
                <h3>Jobs By Companies</h3>
                <ul class="list_1">
                    <?php
                    $company = "Select * from jobs where type='company'";
                    $execute = mysqli_query($connection, $company);
                    while ($row = mysqli_fetch_assoc($execute)) {
                        $ids = $row['id'];
                        $titles = $row['title'];

                        ?>
                        <li><a href="watchJobdetails.php?j=<?php echo $ids; ?>"><?php echo $titles?></a></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="col_3">
                <h3>Jobs By Seeker.com</h3>
                <ul class="list_2">
                    <?php
                    $company = "Select * from jobs where type='creator'";
                    $execute = mysqli_query($connection, $company);
                    while ($row = mysqli_fetch_assoc($execute)) {
                        $ids = $row['id'];
                        $titles = $row['title'];

                        ?>
                        <li><a href="watchJobdetails.php?j=<?php echo $ids; ?>"><?php echo $titles?></a></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="col_3">
                <h3>Companies</h3>
                <ul class="list_2">
                    <?php

                    $company = "select * from company";
                    $cquery = mysqli_query($connection, $company);
                    while ($row = mysqli_fetch_assoc($cquery)){
                        $db_company_id = $row['id'];
                        $db_company_name = $row['name'];

                        ?>
                        <li><a href="jobbycompany.php?jp=<?php echo $db_company_id ?>"><?php echo $db_company_name; ?></a></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="col-md-8 single_right">
            <div class="login-form-section">
                <div class="login-content">
                    <div class="section-title">
                        <h3>Jobs According To Your Search</h3>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if (isset($_GET['skill']) && isset($_GET['location'])) {
            $skill = $_GET['skill'];
            $location = $_GET['location'];

            if (empty($skill) || empty($location)){
                echo "You did not mention Skill or Location, Please search again";
            }

            // echo $jid;
            $jobfetch = "select * from jobs where skill = '{$skill}' and location = '{$location}'";
            $execute = mysqli_query($connection, $jobfetch);

            if (!$execute)
                echo mysqli_error($connection);
            $flag = 0;

            while ($row = mysqli_fetch_assoc($execute)) {
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
                    $db_company_password = $row['password'];
                    $flag = 1;
                }

                if ($flag ==1) {
                    ?>

                    <div class="col-md-8 pull-right">
                        <div class="col_1">
                            <div class="col-sm-4 row_2">
                                <a href="watchJobdetails.php?j=<?php echo $id1; ?>"><img
                                            src="companyImage/<?php echo $db_company_img; ?>" class="img-responsive"
                                            alt=""/></a>
                            </div>
                            <div class="col-sm-8 row_1">
                                <h4><a href="watchJobdetails.php?j=<?php echo $id1; ?>"><?php echo $title1; ?></a></h4>
                                <h6>Posted On <span class="dot">·</span> <?php echo $date; ?></h6>
                                <p><?php echo $object1; ?></p>
                                <div class="social">
                                    <a class="btn_1" href="watchJobdetails.php?j=<?php echo $id1; ?>">
                                        <i class="fa fa-eye"></i>
                                        <span class="share1 fb">Watch Details</span>
                                    </a>
                                    <a class="btn_1" href="#">
                                        <i class="fa fa-envelope"></i>
                                        <span class="share1">Apply</span>
                                    </a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <?php
                }
            }
            if ($flag == 0){
                echo "No Job found related to " . $skill  . " in " . $location . " try Something new";
            }
        }?>
        <div class="clearfix"> </div>
    </div>
</div>
<div class="footer">
    <div class="" style="margin-left: 460px">
        <p>Copyright © 2018 Seeking . All Rights Reserved . Design by <a href="" target="_blank">PreciousSquad</a> </p>
    </div>
</div>
