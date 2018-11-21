<?php include "includes/top.php"?>
<?php include "includes/header.php"?>
<?php
if(isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $query = "select * from user where id={$id}";
    $send = mysqli_query($connection, $query);
    if (!$send){
        die("failed".mysqli_error());
    }
    while ($row = mysqli_fetch_assoc($send)){
        $name = $row['name'];
        $phone = $row['phone'];
        $sex = $row['sex'];
        $dob = $row['dob'];
        $add = $row['address'];
        $em = $row['email'];
        $extra = $row['extra'];
        $interest = $row['interest'];
        $password = $row['password'];
        $pic = $row['img'];
        $cv = $row['CV'];
    }
} else{
    header("Location: error/index.php");
}
?>

<?php
if (isset($_POST['bt1'])){
    $ns = $_POST['names'];
    $up1 = "update user set name = '{$ns}' where id = {$id}";
    $ups = mysqli_query($connection, $up1);
    header("Location: userprofile.php");
}
if (isset($_POST['bt2'])){
    $phones = $_POST['phones'];
    $up1 = "update user set phone = '{$phones}' where id = {$id}";
    $ups = mysqli_query($connection, $up1);
    header("Location: userprofile.php");
}
if (isset($_POST['bt3'])){
    $sexs = $_POST['sexs'];
    $up1 = "update user set sex = '{$sexs}' where id = {$id}";
    $ups = mysqli_query($connection, $up1);
    header("Location: userprofile.php");
}
if (isset($_POST['bt4'])){
    $dobs = $_POST['dobs'];
    $up1 = "update user set dob = '{$dobs}' where id = {$id}";
    $ups = mysqli_query($connection, $up1);
    header("Location: userprofile.php");
}
if (isset($_POST['bt5'])){
    $adds = $_POST['adds'];
    $up1 = "update user set address = '{$adds}' where id = {$id}";
    $ups = mysqli_query($connection, $up1);
    header("Location: userprofile.php");
}
if (isset($_POST['bt6'])){
    $extras = $_POST['extras'];
    $up1 = "update user set extra = '{$extras}' where id = {$id}";
    $ups = mysqli_query($connection, $up1);
    header("Location: userprofile.php");
}
if (isset($_POST['bt7'])){
    $interests = $_POST['interests'];
    $up1 = "update user set interest = '{$interests}' where id = {$id}";
    $ups = mysqli_query($connection, $up1);
    header("Location: userprofile.php");
}
?>

<?php
if (isset($_POST['imgs'])) {
    // remove pic from server
    $path = "CV/".$pic;
    unlink($path);
    // end
    $ext = pathinfo($_FILES['images']['name'], PATHINFO_EXTENSION);
    //echo $ext;
    if ($ext == "jpeg" || $ext == "png" || $ext == "gif" || $ext == "jpg") {
        $idps = $_SESSION['id'];
        $p_image = $_FILES['images']['name'];
        $post_image_temp = $_FILES['images']['tmp_name'];
        move_uploaded_file($post_image_temp, "userImage/$p_image");
        $imgdata = "update user set img = '{$p_image}' where id = {$idps}";
        $executes = mysqli_query($connection, $imgdata);
    } else{
        echo "<script>alert(\"You've Uploaded A Wrong File\")</script>";
    }
    header("Location: userprofile.php");
}
?>

<?php
if (isset($_POST['cvs'])) {
    // remove pic from server
    $path = "CV/".$cv;
    unlink($path);
    // end
    $exts = pathinfo($_FILES['cv']['name'], PATHINFO_EXTENSION);
    //echo $ext;
    if ($exts == "docx" || $exts == "pdf") {
        $idps = $_SESSION['id'];
        $p_image = $_FILES['cv']['name'];
        $post_image_temp = $_FILES['cv']['tmp_name'];
        move_uploaded_file($post_image_temp, "CV/$p_image");
        $imgdata = "update user set CV = '{$p_image}' where id = {$idps}";
        $executes = mysqli_query($connection, $imgdata);
    } else{
        echo "<script>alert(\"Only .doc & .pdf files are allowed. \")</script>";
    }
    header("Location: userprofile.php");
}
?>

<div class="container">
    <div class="col-sm-4">
        <div class="single">
            <div class="righ" style="alignment: right">
                <img height="300" width="350" class="img-rounded" src="userImage/<?php echo is_null($pic) ?  'miss.png' : $pic?>">
                <br><br>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="input-group" style="margin-bottom: 5px">
                        <input class="btn btn-default" type="file" name="images" required>
                        <span class="input-group-btn">
                        <button class="btn btn2-danger" name="imgs" type="submit">Upload</button>
                        </span>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="single">
            <div class="form-container">
                <h2>Welcome <?php echo $name; ?></h2>
                <div class="accordation">
                    <div class="jb-accordion-wrapper">
                        <div class="jb-accordion-title"><?php echo $name; ?><button type="button" class="jb-accordion-button" data-toggle="collapse" data-target="#accordion3"><i class="fa fa-angle-double-down"> </i></button></div>
                        <p><!-- /.accordion-title -->
                        </p><div id="accordion3" class="jb-accordion-content collapse ">
                            <p>Name : <?php echo $name?></p>
                            <p>Phone : <?php echo $phone?>  </p>
                            <p>Sex : <?php echo $sex?>  </p>
                            <p>Date of Birth : <?php echo $dob?>  </p>
                            <p>Address : <?php echo $add?>  </p>
                            <p>Email : <?php echo $em?>  </p>
                            <p>Skill : <?php echo $extra?>  </p>
                            <p>Interest : <?php echo ($interest==1?"Programmer":($interest==2?"Algorithmist":($interest==3?"Network Security"
                                    :($interest==4?"IT":($interest==5?"All Jobs":($interest==6?"Car Consultant":($interest==7?"Nursing"
                                        :($interest==8?"Security":($interest==9?"Driver":($interest==10?"Resturant":($interest==11?"Programmer"
                                            :($interest==12?"Programmer":($interest==13?"Programmer":($interest==14?"Programmer":($interest==15?"Programmer"
                                                :$interest==16?"Programmer":""))))))))))))))) ?>  </p>
                            <p>Password : <?php echo $password?>  </p>
                        </div>
                        <p><!-- /.collapse --></p>
                    </div>
                    <a href="userApplied.php"><button type="button" class="btn btn-primary btn-lg btn-block">Watch Jobs You Applied</button></a>
                </div>

            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="single">

            <h2>Easy Edit</h2>
            <form action="" method="post">
                <p>
                <div class="input-group" style="margin-bottom: 5px">
                    <input type="text" class="form-control" name="names"  maxlength="50" placeholder="Name" value="<?php echo $name?>">
                    <span class="input-group-btn">
                <button class="btn btn-default" name="bt1" type="submit">Edit!!</button>
                </span>
                </div>
                </p>
            </form>

            <form action="" method="post">
                <p>
                <div class="input-group" style="margin-bottom: 5px">
                    <input type="text" class="form-control" name="phones" maxlength="10" placeholder="Phone" onkeypress="return isNumberKey(event)" value="<?php echo $phone; ?>">
                    <span class="input-group-btn">
                        <button class="btn btn-default" name="bt2" type="submit">Edit!!</button>
                        </span>
                </div>
                </p>
            </form>
            <script>
                function isNumberKey(evt){
                    var charCode = (evt.which) ? evt.which : event.keyCode
                    if (charCode > 31 && (charCode < 48 || charCode > 57))
                        return false;
                    return true;
                }
            </script>

            <form action="" method="post">
                <p>
                <div class="input-group" style="margin-bottom: 5px">
                    <input type="text" class="form-control" name="sexs" placeholder="Sex" value="<?php echo $sex?>">
                    <span class="input-group-btn">
                        <button class="btn btn-default" name="bt3" type="submit">Edit!!</button>
                        </span>
                </div>
                </p>
            </form>

            <form action="" method="post">
                <p>
                <div class="input-group" style="margin-bottom: 5px">
                    <input type="text" class="form-control" name="dobs" id="datepicker" placeholder="Date Of Birth" value="<?php echo $dob?>">
                    <span class="input-group-btn">
                        <button class="btn btn-default" name="bt4" type="submit">Edit!!</button>
                        </span>
                </div>
                </p>
            </form>

            <form action="" method="post">
                <p>
                <div class="input-group" style="margin-bottom: 5px">
                    <input type="text" class="form-control" name="adds" placeholder="Address" maxlength="255" value="<?php echo $add?>">
                    <span class="input-group-btn">
                        <button class="btn btn-default" name="bt5" type="submit">Edit!!</button>
                        </span>
                </div>
                </p>
            </form>

            <form action="" method="post">
                <p>
                <div class="input-group" style="margin-bottom: 5px">
                    <input type="text" class="form-control" id="tags" name="extras" maxlength="255" placeholder="Skill" value="<?php echo $extra?>">
                    <span class="input-group-btn">
                        <button class="btn btn-default" name="bt6" type="submit">Edit!!</button>
                        </span>
                </div>
                </p>
            </form>

            <form action="" method="post">
                <p>
                <div class="input-group" style="margin-bottom: 5px">
                    <select name="interests" id="country" class="form-control input-sm">
                        <option value=""><?php echo ($interest==1?"Programmer":($interest==2?"Algorithmist":($interest==3?"Network Security"
                                :($interest==4?"IT":($interest==5?"All Jobs":($interest==6?"Car Consultant":($interest==7?"Nursing"
                                    :($interest==8?"Security":($interest==9?"Driver":($interest==10?"Resturant":($interest==11?"Programmer"
                                        :($interest==12?"Programmer":($interest==13?"Programmer":($interest==14?"Programmer":($interest==15?"Programmer"
                                            :$interest==16?"Programmer":""))))))))))))))) ?></option>
                        <option value="1">Programmer</option>
                        <option value="2">Algorithmist</option>
                        <option value="3">Network Security</option>
                        <option value="4">IT</option>
                        <option value="5">All Jobs</option>
                        <option value="6">Car Consultant</option>
                        <option value="7">Nursing</option>
                        <option value="8">Security</option>
                        <option value="9">Driver</option>
                        <option value="10">Restaurant</option>
                        <option value="11">Tech Support</option>
                        <option value="12">Part Time Jobs</option>
                        <option value="13">Health Care</option>
                        <option value="14">Internships</option>
                        <option value="15">Research</option>
                        <option value="16">Defence Jobs</option>
                    </select>
                    <span class="input-group-btn">
                        <button class="btn btn-default" name="bt7" type="submit">Edit!!</button>
                        </span>
                </div>
                </p>
            </form>

            <form action="" method="post" enctype="multipart/form-data">
                <?php
                if (is_null($cv)){
                    echo "Upload your CV here";
                } else {
                    echo "<b>You have Uploaded Your CV</b>";
                }
                ?>
                <div class="input-group" style="margin-bottom: 5px">
                    <input class="form-control" value="<?php echo $cv; ?>" style="border: none" type="file" name="cv" required>
                    <span class="input-group-btn">
                        <button class="btn btn-default" name="cvs" type="submit">Upload CV</button>
                        </span>
                </div>
            </form>

            <form action="" method="post">
                <p>
                <div class="input-group" style="margin-bottom: 5px">
                    <input type="text" class="form-control" placeholder="Email" maxlength="255" value="<?php echo $em?>" disabled>
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">NoEdit!!</button>
                        </span>
                </div>
                </p>
            </form>

            <form action="" method="post">
                <p>
                <div class="input-group" style="margin-bottom: 5px">
                    <input type="text" class="form-control" placeholder="Password Change : Use Forget password" disabled>
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">NoEdit!!</button>
                        </span>
                </div>
                </p>
            </form>
        </div>
    </div>
</div>
</div>
<div class="footer">
    <div class="" style="margin-left: 460px">
        <p>Copyright © 2018 Seeking . All Rights Reserved . Design by <a href="" target="_blank">PreciousSquad</a> </p>
    </div>
</div>