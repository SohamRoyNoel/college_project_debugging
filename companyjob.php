<?php include "includes/top.php"?>
<?php include "includes/header.php"?>

<?php
if (!isset($_SESSION['id']) && !isset($_SESSION['reg']) && !isset($_SESSION['iso'])){
    header("Location: error.php");
}
?>

<?php
if (isset($_POST['submit'])){
    $company_id = $_SESSION['id'];
    $title = $_POST['title'];
    $object = $_POST['object'];
    $hremail = $_POST['hremail'];
    $hrcontact = $_POST['hrcontact'];
    $salary = $_POST['salary'];
    $location = $_POST['location'];
    $target = $_POST['target'];
    $skill = $_POST['skill'];
    $education = $_POST['education'];
    $role = $_POST['role'];
    $date = date("Y/m/d");

    if (!is_null($object) && !is_null($hremail) && !is_null($hrcontact) && !is_null($salary) && !is_null($location) && !is_null($target) && !is_null($skill) && !is_null($education) && !is_null($role)){

        $query = "insert into jobs (company_id, title, role, mineducation, skill, targetTo, location, salary, HRph, HRem, object, date, type) values 
                          ('{$company_id }', '{$title}', '{$role}', '{$education}', '{$skill}', '{$target}', '{$location}', '{$salary}', '{$hrcontact}', '{$hremail}', '{$object}', '{$date}', 'company')";
        $execute = mysqli_query($connection, $query);

        header("Location: companyjob.php");

    }
}
?>


<div class="container">
    <div class="col-sm-7">
        <div class="single">
            <div class="form-container">
                <h2>Post Job Here</h2>
                <form action="" method="post">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="col-md-3 control-lable" for="firstName">Job Title</label>
                            <div class="col-md-9">
                                <input value="" type="text" path="firstName" maxlength="50" minlength="4" id="firstName" name="title" class="form-control input-sm" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="col-md-3 control-lable" for="firstName">Job Role</label>
                            <div class="col-md-9">
                                <input type="text" path="firstName" maxlength="15" minlength="4" id="firstName" name="role" class="form-control input-sm" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="col-md-3 control-lable" for="lastName">Education</label>
                            <div class="col-md-9">
                                <input type="text" path="lastName" id="lastName" maxlength="20" minlength="2" name="education" class="form-control input-sm" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="col-md-3 control-lable" for="lastName">Skill</label>
                            <div class="col-md-9">
                                <input type="text" path="lastName" id="lastName" maxlength="50" minlength="1" name="skill" class="form-control input-sm" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="col-md-3 control-lable" for="country">Target To</label>
                            <div class="col-md-9">
                                <select name="target" path="country" id="country" class="form-control input-sm">
                                    <option value="">Select Type Of Job</option>
                                    <option value="Tech Support">Tech Support</option>
                                    <option value="Part Time">Part Time</option>
                                    <option value="Full Time">Full Time</option>
                                    <option value="Internship">Internship</option>
                                    <option value="Health Care">Health Care</option>
                                    <option value="Research">Research</option>
                                    <option value="Defence">Defence</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="col-md-3 control-lable" for="dob">Job Location</label>
                            <div class="col-md-9">
                                <input type="text" name="location" maxlength="15" minlength="4" id="loc" class="form-control input-sm" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="col-md-3 control-lable" for="dob">Salary</label>
                            <div class="col-md-9">
                                <input type="text" name="salary" path="dob" maxlength="10" minlength="4" id="dob" class="form-control input-sm" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="col-md-3 control-lable" for="dob">HR Contact</label>
                            <div class="col-md-9">
                                <input type="text" path="dob" name="hrcontact" maxlength="10" minlength="10" id="dob" class="form-control input-sm" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="col-md-3 control-lable" for="email">HR Email</label>
                            <div class="col-md-9">
                                <input type="text" path="email" name="hremail" maxlength="50" minlength="4" id="email" class="form-control input-sm" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="col-md-3 control-lable" for="subjects">Object</label>
                            <div class="col-md-9 sm_1">
                                <textarea maxlength="200" minlength="10" required name="object" cols="77" rows="6" value=" " onfocus="this.value='';" onblur="if (this.value == '') {this.value = '';}"> </textarea>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-actions floatRight">
                            <input type="submit" name="submit" value="Post" class="btn btn-primary btn-sm">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="single">
            <div class="form-container">
                <h2>Your Previous Jobs</h2>

                <style>
                    .collapsible {
                        background-color: #00aced;
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
                        background-color: #555;
                    }

                    .content {
                        padding: 0 18px;
                        display: none;
                        overflow: hidden;
                        background-color: #f1f1f1;
                    }
                </style>

                <!--Edit-->
                <?php

                if (isset($_POST['editsubmit'])){
                    $idP = $_POST['hidden'];
                    $titleP=$_POST['titleP'];
                    $roleP=$_POST['roleP'];
                    $educationP=$_POST['educationP'];
                    $skillP=$_POST['skillP'];
                    $targetP=$_POST['targetP'];
                    $locationP=$_POST['locationP'];
                    $salaryP=$_POST['salaryP'];
                    $hrcontactP=$_POST['hrcontactP'];
                    $hremailP=$_POST['hremailP'];
                    $objectP=$_POST['objectP'];

                    $up1 = "update jobs set title='{$titleP}', role='{$roleP}' ,mineducation='{$educationP}', skill='{$skillP}', targetTo='{$targetP}', location='{$locationP}', salary='{$salaryP}', HRph='{$hrcontactP}', HRem='{$hremailP}', object='{$objectP}' where id = {$idP}";
                    $ups = mysqli_query($connection, $up1);
                    header("Location: companyjob.php");
                }
                ?>
                <!--Edit-->

                <!--Delete-->
                <?php

                    if (isset($_POST['delete'])){
                        $delid = $_POST['hidden'];  //gets job table job id
                        $querydel = "delete from jobs where id = {$delid}";
                        $querydel1 = "delete from confirm where jobid = {$delid}";
                        $executedel = mysqli_query($connection, $querydel);
                        $executedel1 = mysqli_query($connection, $querydel1);
                        header("Location: companyjob.php");
                    }

                ?>
                <!--Delete-->

                <?php
                $companys_id = $_SESSION['id'];
                $query = "select * from jobs where company_id='{$companys_id}'";
                $send = mysqli_query($connection, $query);

                if (!$send){
                    die("failed".mysqli_error());
                }

                while ($row = mysqli_fetch_assoc($send)){
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

                    ?>

                    <button class="collapsible">
                        <div style="color: black">
                            <b style="color: #D2CF99">Company :</b> <?php echo $_SESSION['name']; ?><br>
                            <b style="color: #D2CF99">Company :</b> <?php echo $title1; ?><br>
                            <b style="color: #D2CF99">Role :</b><?php echo $role1; ?><br>
                            <b style="color: #D2CF99">Min Education :</b><?php echo $education1; ?><br>
                            <b style="color: #D2CF99">Skill :</b><?php echo $skill1; ?><br>
                            <b style="color: #D2CF99">Target :</b><?php echo $target1; ?><br>
                            <b style="color: #D2CF99">Location :</b><?php echo $location1; ?><br>
                            <b style="color: #D2CF99">Salary :</b><?php echo $salary1; ?><br>
                            <b style="color: #D2CF99">HRPhone :</b><?php echo $hrcontact1; ?><br>
                            <b style="color: #D2CF99">HRMail :</b><?php echo $hremail1; ?><br>
                            <b style="color: #D2CF99">Job Objective :</b><?php echo $object1; ?><br>
                            <b style="color: #D2CF99">Posted On :</b> <?php echo $dates1; ?><br>
                        </div>
                    </button>
                    <div class="content">
                        <!--inside edit form-->
                        <p>
                        <h2>Edit</h2>
                        <div class="container">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="col-md-3 control-lable" for="firstName">Job Title</label>
                                        <div class="col-md-9">
                                            <input value="<?php echo $title1?>" type="text" path="firstName" maxlength="50" minlength="4" id="firstName" name="titleP" class="form-control input-sm" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="col-md-3 control-lable" for="firstName">Job Role</label>
                                        <div class="col-md-9">
                                            <input value="<?php echo $role1?>" type="text" path="firstName" maxlength="15" minlength="4" id="firstName" name="roleP" class="form-control input-sm" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="col-md-3 control-lable" for="lastName">Education</label>
                                        <div class="col-md-9">
                                            <input type="text" value="<?php echo $education1?>" path="lastName" id="lastName" maxlength="20" minlength="2" name="educationP" class="form-control input-sm" required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="col-md-3 control-lable" for="lastName">Education</label>
                                        <div class="col-md-9">
                                            <input type="hidden" value="<?php echo $id1?>" path="lastName" id="lastName" maxlength="20" minlength="2" name="hidden" class="form-control input-sm" required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="col-md-3 control-lable" for="lastName">Skill</label>
                                        <div class="col-md-9">
                                            <input type="text" value="<?php echo $skill1?>" path="lastName" id="lastName" maxlength="50" minlength="1" name="skillP" class="form-control input-sm" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="col-md-3 control-lable" for="country">Target To</label>
                                        <div class="col-md-9">
                                            <select name="targetP" path="country" id="country" class="form-control input-sm">
                                                <option value="<?php echo $target1?>"><?php echo $target1?></option>
                                                <option value="Tech Support">Tech Support</option>
                                                <option value="Part Time">Part Time</option>
                                                <option value="Full Time">Full Time</option>
                                                <option value="Internship">Internship</option>
                                                <option value="Health Care">Health Care</option>
                                                <option value="Research">Research</option>
                                                <option value="Defence">Defence</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="col-md-3 control-lable" for="dob">Job Location</label>
                                        <div class="col-md-9">
                                            <input type="text" value="<?php echo $location1?>" name="locationP" maxlength="15" minlength="4" id="loc" class="form-control input-sm" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="col-md-3 control-lable" for="dob">Salary</label>
                                        <div class="col-md-9">
                                            <input type="text" value="<?php echo $salary1?>" name="salaryP" path="dob" maxlength="10" minlength="4" id="dob" class="form-control input-sm" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="col-md-3 control-lable" for="dob">HR Contact</label>
                                        <div class="col-md-9">
                                            <input type="text" path="dob" value="<?php echo $hrcontact1?>" name="hrcontactP" maxlength="10" minlength="10" id="dob" class="form-control input-sm" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="col-md-3 control-lable" for="email">HR Email</label>
                                        <div class="col-md-9">
                                            <input type="text" path="email" value="<?php echo $hremail1?>" name="hremailP" maxlength="50" minlength="4" id="email" class="form-control input-sm" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="col-md-3 control-lable" for="subjects">Object</label>
                                        <div class="col-md-9 sm_1">
                                            <input type="text" path="email" value="<?php echo $object1?>" name="objectP" maxlength="200" minlength="10" id="email" class="form-control input-sm" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-actions">
                                        <a href="companyResponse.php?j=<?php echo $id1; ?>&k=<?php echo $company_idp?>"><input type="button" name="editsubmit" value="Response" class="btn btn-primary btn-sm"></a>
                                        <input type="submit" name="editsubmit" value="Edit" class="btn btn-primary btn-sm">
                                        <input type="submit" name="delete" value="Delete" class="btn btn-primary btn-sm">
                                    </div>
                                </div>
                            </form>
                            <br>
                        </div>
                        </p>
                        <!--inside edit form-->
                    </div>
                <?php } ?>
                <script>
                    var coll = document.getElementsByClassName("collapsible");
                    var i;

                    for (i = 0; i < coll.length; i++) {
                        coll[i].addEventListener("click", function() {
                            this.classList.toggle("active");
                            var content = this.nextElementSibling;
                            if (content.style.display === "block") {
                                content.style.display = "none";
                            } else {
                                content.style.display = "block";
                            }
                        });
                    }
                </script>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <div class="" style="margin-left: 460px">
        <p>Copyright © 2018 Seeking . All Rights Reserved . Design by <a href="" target="_blank">PreciousSquad</a> </p>
    </div>
</div>