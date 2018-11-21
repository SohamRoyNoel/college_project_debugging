<?php include "includes/top.php"?>
<?php include "includes/header.php"?>

<?php
if(isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $query = "select * from company where id={$id}";
    $send = mysqli_query($connection, $query);

    if (!$send){
        die("failed".mysqli_error());
    }


    while ($row = mysqli_fetch_assoc($send)){
        $name = $row['name'];
        $reg = $row['reg'];
        $iso = $row['iso'];
        $scale = $row['scale'];
        $country = $row['country'];
        $subject = $row['subject'];
        $estd = $row['since'];
        $em = $row['email'];
        $password = $row['password'];
        $pic = $row['img'];
        $address = $row['address'];
    }
} else{
    header("Location: error/index.php");
}
?>

<?php
if (isset($_POST['bt1'])){
    $ns = $_POST['names'];
    $up1 = "update company set name = '{$ns}' where id = {$id}";
    $ups = mysqli_query($connection, $up1);
    header("Location: companyprofile.php");
}
if (isset($_POST['bt2'])){
    $isos = $_POST['isos'];
    $up1 = "update company set iso = '{$isos}' where id = {$id}";
    $ups = mysqli_query($connection, $up1);
    header("Location: companyprofile.php");
}
if (isset($_POST['bt5'])){
    $scales = $_POST['scales'];
    $up1 = "update company set scale = '{$scales}' where id = {$id}";
    $ups = mysqli_query($connection, $up1);
    header("Location: companyprofile.php");
}
if (isset($_POST['bt3'])){
    $countries = $_POST['countries'];
    $up1 = "update company set country = '{$countries}' where id = {$id}";
    $ups = mysqli_query($connection, $up1);
    header("Location: companyprofile.php");
}
if (isset($_POST['bt4'])){
    $estds = $_POST['estds'];
    $up1 = "update company set since = '{$estds}' where id = {$id}";
    $ups = mysqli_query($connection, $up1);
    header("Location: companyprofile.php");
}
if (isset($_POST['bt6'])){
    $subs = $_POST['subs'];
    $up1 = "update company set subject = '{$subs}' where id = {$id}";
    $ups = mysqli_query($connection, $up1);
    header("Location: companyprofile.php");
}
if (isset($_POST['bt7'])){
    $address = $_POST['address'];
    $up1 = "update company set address = '{$address}' where id = {$id}";
    $ups = mysqli_query($connection, $up1);
    header("Location: companyprofile.php");
}
?>

<?php
if (isset($_POST['imgs'])) {

    // remove pic from server

    $path = "companyImage/".$pic;
    unlink($path);

    // end

    $ext = pathinfo($_FILES['images']['name'], PATHINFO_EXTENSION);
    //echo $ext;
    if ($ext == "jpeg" || $ext == "png" || $ext == "gif" || $ext == "jpg") {

        $idps = $_SESSION['id'];
        $p_image = $_FILES['images']['name'];
        $post_image_temp = $_FILES['images']['tmp_name'];

        move_uploaded_file($post_image_temp, "companyImage/$p_image");

        $imgdata = "update company set img = '{$p_image}' where id = {$idps}";
        $executes = mysqli_query($connection, $imgdata);
    } else{
        echo "<script>alert(\"You've Uploaded A Wrong File\")</script>";
    }

    header("Location: companyprofile.php");
}
?>


<div class="container">
    <div class="col-sm-4">
        <div class="single">
            <div class="righ" style="alignment: right">
                <img height="300" width="350" class="img-rounded" src="companyImage/<?php echo is_null($pic) ?  'miss.png' : $pic?>">
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
                            <p><b><i>Name :</i></b> <?php echo $name?></p>
                            <p><b>Registration :</b> <?php echo $reg?>  </p>
                            <p><b>ISO :</b> <?php echo $iso?>  </p>
                            <p><b>Scale :</b> <?php echo $scale?>  </p>
                            <p><b>Email :</b> <?php echo $em?>  </p>
                            <p><b>Address :</b> <?php echo $address?>  </p>
                            <p><b>Country :</b> <?php echo $country?>  </p>
                            <p><b>Subject :</b> <?php echo $subject?>  </p>
                            <p><b>ESTD :</b> <?php echo $estd?>  </p>
                            <p><b>Password :</b> <?php echo $password?>  </p>
                        </div>
                        <p><!-- /.collapse --></p>
                    </div>
                    <a href="companyjob.php"><button type="button" class="btn btn-primary btn-lg btn-block">Post Job Or See Previous</button></a>
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
                    <input type="text" class="form-control" name="" maxlength="10" placeholder="Phone" onkeypress="return isNumberKey(event)" value="<?php echo $reg; ?>" disabled>
                    <span class="input-group-btn">
                        <button class="btn btn-default" name="bt2" type="submit">Edit!!</button>
                        </span>
                </div>
                </p>
            </form>
            <form action="" method="post">
                <p>
                <div class="input-group" style="margin-bottom: 5px">
                    <input type="text" class="form-control" name="isos" maxlength="10" placeholder="Phone" onkeypress="return isNumberKey(event)" value="<?php echo $iso; ?>">
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
                    <input type="text" class="form-control" name="scales" placeholder="Scale" value="<?php echo $scale?>">
                    <span class="input-group-btn">
                        <button class="btn btn-default" name="bt5" type="submit">Edit!!</button>
                        </span>
                </div>
                </p>
            </form>
            <form action="" method="post">
                <p>
                <div class="input-group" style="margin-bottom: 5px">
                    <input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo $address?>">
                    <span class="input-group-btn">
                        <button class="btn btn-default" name="bt7" type="submit">Edit!!</button>
                        </span>
                </div>
                </p>
            </form>
            <form action="" method="post">
                <p>
                <div class="input-group" style="margin-bottom: 5px">
                    <select name="countries" id="country" class="form-control input-sm">
                        <option value=""><?php echo $country; ?></option>
                        <option value="Japan">Japan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Dubai">Dubai</option>
                        <option value="Italy">Italy</option>
                        <option value="Greece">Greece</option>
                        <option value="Iceland">Iceland</option>
                        <option value="China">China</option>
                        <option value="Doha">Doha</option>
                        <option value="Irland">Irland</option>
                        <option value="Srilanka">Srilanka</option>
                        <option value="Russia">Russia</option>
                        <option value="Hong Kong">Hong Kong</option>
                        <option value="Germany">Germany</option>
                        <option value="Canada">Canada</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Spain">Spain</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Poland">Poland</option>
                    </select>
                    <span class="input-group-btn">
                        <button class="btn btn-default" name="bt3" type="submit">Edit!!</button>
                        </span>
                </div>
                </p>
            </form>

            <form action="" method="post">
                <p>
                <div class="input-group" style="margin-bottom: 5px">
                    <input type="text" class="form-control" name="estds" id="datepicker" placeholder="Date Of Birth" value="<?php echo $estd?>">
                    <span class="input-group-btn">
                        <button class="btn btn-default" name="bt4" type="submit">Edit!!</button>
                        </span>
                </div>
                </p>
            </form>

            <form action="" method="post">
                <p>
                <div class="input-group" style="margin-bottom: 5px">
                    <input type="textarea" class="form-control" name="subs" placeholder="Subject" maxlength="255" value="<?php echo $subject?>">
                    <span class="input-group-btn">
                        <button class="btn btn-default" name="bt6" type="submit">Edit!!</button>
                        </span>
                </div>
                </p>
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