<?php include "includes/top.php"?>
<?php include "includes/header.php"?>

<?php
if(isset($_SESSION['id'])) {

}
?>

<div class="container">
    <div class="single">
        <?php include "includes/sidebar.php"?>
        <div class="col-md-8 single_right">
            <div class="login-form-section">
                <div class="login-content">
                        <div class="section-title">
                        </div>
                        <div>
                            <style>
                                .collapsible {
                                    background-color: #72d2ff;
                                    color: white;
                                    cursor: pointer;
                                    padding: 18px;
                                    width: 100%;
                                    border: none;
                                    text-align: left;
                                    outline: none;
                                    font-size: 15px;
                                }

                                .active, .collapsible:hover {
                                    background-color: #2185C5;
                                }

                                .collapsible:after {
                                    content: '\002B';
                                    color: white;
                                    font-weight: bold;
                                    float: right;
                                    margin-left: 5px;
                                }

                                .active:after {
                                    content: "\2212";
                                }

                                .content {
                                    padding: 0 18px;
                                    max-height: 0;
                                    overflow: hidden;
                                    transition: max-height 0.2s ease-out;
                                    background-color: #f1f1f1;
                                }
                            </style>


                            <h2>Your Applications</h2>
                            <?php
                                    if (isset($_POST['cancel'])){
                                        $jobs_del = $_POST['hide'];
                                        $candidate_id = $_SESSION['id'];

                                        $qdel = "delete from confirm where jobid={$jobs_del} and userid={$candidate_id}";
                                        $execute = mysqli_query($connection, $qdel);
                                        header("Location: userApplied.php");
                                    }
                            ?>

                            <?php
                            $id = $_SESSION['id'];
                            $query = "select * from confirm where userid={$id}";
                            $send = mysqli_query($connection, $query);

                            if (!$send){
                                die("failed".mysqli_error());
                            }


                            while ($row = mysqli_fetch_assoc($send)){
                                $job_id = $row['jobid'];
                                $status = $row['status'];
                                $query1 = "select * from jobs where id={$job_id}";
                                $send1 = mysqli_query($connection, $query1);

                                while ($row=mysqli_fetch_assoc($send1)) {
                                    $id1 = $row['id'];
                                    $company_idp = $row['company_id'];
                                    $object1 = $row['object'];
                                    $title1 = $row['title'];
                                    $dates1 = $row['date'];
                                    $hremail1 = $row['HRem'];
                                    $hrcontact1 = $row['HRph'];
                                    $salary1 = $row['salary'];
                                    $location1 = $row['location'];
                                    $target1 = $row['targetTo'];
                                    $skill1 = $row['skill'];
                                    $education1 = $row['mineducation'];
                                    $role1 = $row['role'];


                                    $query2 = "select * from company where id = {$company_idp}";
                                    $execute = mysqli_query($connection, $query2);
                                    while ($r = mysqli_fetch_assoc($execute)) {
                                        $cname = $r['name'];
                                        $cimg = $r['img'];

                                        ?>
                                        <button class="collapsible"
                                                style="color: black"><?php echo $cname; ?></button>
                                        <div class="content">
                                            <p>
                                            <h4 style="font-family: 'Bell MT'; font-size: 30px"><b><img src="companyImage/<?php echo $cimg; ?>" style="height: 50px; width: 70px">&nbsp; <?php echo $cname; ?><i class="pull-right"> <?php

                                                    if ($status==0 && $status != null){
                                                        echo "<button disabled class=\"btn btn-danger\">Rejected</button>";
                                                    }
                                                    if ($status==1){
                                                        echo  "<button disabled class=\"btn btn-success\">Invited</button>";
                                                    }
                                                    if ($status == null){
                                                        echo "<button disabled class=\"btn btn-warning\">Pending</button>";
                                                    }

                                                    ?></i></b></h4>
                                            </p>
                                            <p>Job Title : &nbsp;<?php echo $title1; ?></p>
                                            <p>Role : &nbsp;<?php echo $role1; ?></p>
                                            <p>Education : &nbsp;<?php echo $education1; ?></p>
                                            <p>Skill : &nbsp;<?php echo $skill1; ?></p>
                                            <p>Target To : &nbsp;<?php echo $target1; ?></p>
                                            <p>Location : &nbsp;<?php echo $location1; ?></p>
                                            <p>Salary : &nbsp;<?php echo $salary1; ?></p>
                                            <p>HR Contact : &nbsp;<?php echo $hrcontact1; ?></p>
                                            <p>HR email : &nbsp;<?php echo $hremail1; ?></p>
                                            <p>Object : &nbsp;<?php echo $object1; ?></p>
                                            <form action="" method="post">
                                                <p><input name="hide" type="hidden" class="btn btn-danger" value="<?php echo $id1?>"/></p>
                                                <p><input name="cancel" type="submit" class="btn btn-danger" value="Cancel Your Job Interest"/></p>
                                            </form>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                            ?>

                            <script>
                                var coll = document.getElementsByClassName("collapsible");
                                var i;

                                for (i = 0; i < coll.length; i++) {
                                    coll[i].addEventListener("click", function() {
                                        this.classList.toggle("active");
                                        var content = this.nextElementSibling;
                                        if (content.style.maxHeight){
                                            content.style.maxHeight = null;
                                        } else {
                                            content.style.maxHeight = content.scrollHeight + "px";
                                        }
                                    });
                                }
                            </script>
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