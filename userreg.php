<?php include "includes/top.php"?>
<?php include "includes/header.php"?>

<?php
if (isset($_POST['register'])){
    $name = escape($_POST['name']);
    $phone = escape($_POST['phone']);
    $sex = escape($_POST['sex']);
    $dob = escape($_POST['dob']);
    $address = escape($_POST['address']);
    $email = escape($_POST['email']);
    $extra = escape($_POST['extra']);
    $interest = escape($_POST['interest']);
    $password = escape($_POST['password']);

    //CAPTCHA

    $secretkey = "6LfTpHsUAAAAANMny2MKqV6Fvfm_3E13o0IQlH3_";
    $responseKey = $_POST['g-recaptcha-response'];
    $userIP = $_SERVER['REMOTE_ADDR'];

    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$responseKey&remoteip=$userIP";
    $response = file_get_contents($url);
    $response = json_decode($response);
    if ($response->success){
        if (!empty($name) && !empty($phone) && !empty($sex) && !empty($dob) && !empty($address) && !empty($email) && !empty($extra) && !empty($interest)){

            $querys = "select * from user";
            $send = mysqli_query($connection, $querys);
            $flag = 1;

            while ($row = mysqli_fetch_assoc($send)) {
                $em = $row['email'];
                if ($em == $email){
                    $flag = 0;
                }
            }

            if ($flag == 1) {
                $query = "insert into user (name, phone, sex, dob, address, email, extra, interest, password) values ('{$name}', '{$phone}', '{$sex}', '{$dob}', '{$address}', '{$email}', '{$extra}', '{$interest}', '{$password}')";
                $execute = mysqli_query($connection, $query);

                Confirm();
            }

            if ($flag == 0){
                Hold();
            }
        }
    } else {
        echo "<script>alert(\"Something Went Wrong.\")</script>";
    }

    //End CAPTCHA


}
?>
<div class="container">
    <div class="single">
        <div class="form-container">
            <h2>User's Registration</h2>
            <form action="" method="post">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-lable" for="firstName">Candidate Name</label>
                        <div class="col-md-9">
                            <input type="text" id="name" name="name" maxlength="50" class="form-control input-sm" required/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-lable" for="lastName">Phone No.</label>
                        <div class="col-md-9">
                            <input type="text" name="phone" id="phone" maxlength="10" class="form-control input-sm" onkeypress="return isNumberKey(event)" required/>
                        </div>
                    </div>
                </div>
                <script>
                    function isNumberKey(evt){
                        var charCode = (evt.which) ? evt.which : event.keyCode
                        if (charCode > 31 && (charCode < 48 || charCode > 57))
                            return false;
                        return true;
                    }
                </script>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-lable" for="country">Sex</label>
                        <div class="col-md-9">
                            <select name="sex" id="country" class="form-control input-sm">
                                <option value="0">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-lable" for="dob">Birthday</label>
                        <div class="col-md-9">
                            <input type="text" name="dob" id="datepicker"  class="form-control input-sm" required/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-lable" for="lastName">Address</label>
                        <div class="col-md-9">
                            <input type="text" name="address" id="lastName" maxlength="255" class="form-control input-sm" required/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-lable" for="email">Email</label>
                        <div class="col-md-9">
                            <input type="text" name="email" id="email" maxlength="255" class="form-control input-sm" required/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-lable" for="email">Extra Skills In</label>
                        <div class="col-md-9">
                            <input type="text" name="extra" id="tags" maxlength="255" class="form-control input-sm" required/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-lable" for="country">Interested In</label>
                        <div class="col-md-9">
                            <select name="interest" id="country" class="form-control input-sm">
                                <option value="0">Select A Job</option>
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
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-md-3 control-lable" maxlength="255" for="email">Password</label>
                        <div class="col-md-9">
                            <input type="password" name="password" class="form-control input-sm" required/>
                        </div>
                    </div>
                </div>
                <div class="g-recaptcha" data-sitekey="6LfTpHsUAAAAAEyNe-MJPRt1mS7m3HW8gUiBJN4y"></div>
                <div class="row">
                    <div class="form-actions floatRight">
                        <input type="submit" value="Register" name="register" class="btn btn-primary btn-sm">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="footer">
    <div class="" style="margin-left: 460px">
        <p>Copyright © 2018 Seeking . All Rights Reserved . Design by <a href="" target="_blank">PreciousSquad</a> </p>
    </div>
</div>