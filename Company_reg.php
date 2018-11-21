<?php include "includes/top.php"?>
<?php

if (isset($_POST['submit'])){
    $cname = escape($_POST['name']);
    $creg = escape($_POST['reg']);
    $ciso = escape($_POST['iso']);
    $cdob = escape($_POST['dob']);
    $cem = escape($_POST['em']);
    $ccountry = escape($_POST['con']);
    $cpassword = escape($_POST['ps']);

    // Captcha setup
    $secretkey = "6LfTpHsUAAAAANMny2MKqV6Fvfm_3E13o0IQlH3_";
    $responseKey = $_POST['g-recaptcha-response'];
    $userIP = $_SERVER['REMOTE_ADDR'];

    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$responseKey&remoteip=$userIP";
    $response = file_get_contents($url);
    $response = json_decode($response);
    if ($response->success){
        if (!is_null($cname) && !is_null($creg) && !is_null($ciso) && !is_null($cdob) && !is_null($cem) && !is_null($ccountry) && !is_null($cpassword)){

            $querys = "select * from company";
            $send = mysqli_query($connection, $querys);
            $flag = 1;

            while ($row = mysqli_fetch_assoc($send)) {
                $ems = $row['email'];
                $isos = $row['iso'];
                $regs = $row['reg'];
                if ($ems == $cem || $isos == $ciso || $regs == $creg){
                    $flag = 0;
                }
            }

            if ($flag == 1) {
                $query = "insert into company (name, reg, iso, email, password, country, since) values ('{$cname}', '{$creg}', '{$ciso}', '{$cem}', '{$cpassword}', '{$ccountry}', '{$cdob}')";
                $execute = mysqli_query($connection, $query);

                Confirm1();
                header("Location: companylogin.php");
            }

            if ($flag == 0){
                Hold();
                header("Location: Company_reg.php");
            }

        }
    } else {
        echo "<script>alert(\"Something Went Wrong.\")</script>";
    }
    // end code
}


?>
<div>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./index.php"><img src="images/logo.png" alt=""/></a>
            </div>
            <!--/.navbar-header-->
            <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Jobs<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="location.html">All Jobs</a></li>
                            <li><a href="location.html">Walkin Jobs</a></li>
                            <li><a href="location.html">Jobs by Company</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <div class="row">
                                <div class="col-sm-4">
                                    <ul class="multi-column-dropdown">
                                        <li><a href="services.php?job=car">Cars</a></li>
                                        <li><a href="services.php?job=nurse">Nurse</a></li>
                                        <li><a href="services.php?job=security">Security</a></li>
                                        <li><a href="services.php?job=driver">Driver</a></li>
                                        <li><a href="services.php?job=fooding">Fooding</a></li>
                                    </ul>
                                </div>
                            </div>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Recruiters<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="./companylogin.php">Recruiters Login</a></li>
                            <li><a href="./Company_reg.php">Recruiters Registration</a></li>
                            <li><a href="./login.php">Admin Login</a></li>
                        </ul>
                    </li>
                    <?php
                    if (isset($_SESSION['id'])){
                        echo "<li><a href=\"./logout.php\">Logout</a></li>";
                    } else {
                        echo "<li><a href=\"./userlogin.php\">Login</a></li>";
                    }
                    ?>

                    <li><a href="./about.php">About</a></li>
                    <li><a href="./contact.php">Contact</a></li>
                    <li><a href="./faq.php">FAQ</a></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
        <!--/.navbar-collapse-->
    </nav>
    <div class="banner_1">
        <div class="container">
            <div id="search_wrapper1">
                <div id="search_form" class="clearfix">
                    <h1>Register your Company</h1>

                </div>
            </div>
        </div>
    </div>

</div>

<div class="main-w3ls">
    <div class="left-content">
        <div class="w3ls-content">
            <!-- logo -->
            <h1>
                <a href="index.php"><i class="fab fa-accusoft"></i>Welcome To Seeker.com</a>
            </h1>
            <!-- //logo -->
            <h2>We provide better opportunity both company & candidate.</h2>
            <a href="#" class="button-w3ls">
                <i class="fas fa-long-arrow-alt-right"></i>
            </a>
            <ul style="color: black" class="nav-w3ls">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="about.php">About Us</a>
                </li>
                <li>
                    <a href="contact.php">Contact</a>
                </li>
                <li>
                    <a href="faq.php">FAQ</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="right-form-agile">
        <!-- content -->
        <div class="sub-main-w3">
            <h3>Signup Now</h3>
            <h5>Creating an account is free..</h5>
            <form action="" method="post">
                <div class="form-style-agile">
                    <label>Company Name</label>
                    <div class="pom-agile">
                        <span class="fa fa-building-o"></span>
                        <input placeholder="Company Name" maxlength="100" name="name" type="text" required="">
                    </div>
                </div>
                <div class="form-style-agile">
                    <label>Registration No.</label>
                    <div class="pom-agile">
                        <span class="glyphicon glyphicon-registration-mark"></span>
                        <input placeholder="Registration No." maxlength="15" minlength="15" name="reg" type="text" required="">
                    </div>
                </div>
                <div class="form-style-agile">
                    <label>ISO</label>
                    <div class="pom-agile">
                        <span class="fa fa-info-circle"></span>
                        <input placeholder="ISO" name="iso" type="text" onkeypress="return isNumberKey(event)" required="">
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
                <div class="form-style-agile">
                    <label>Since</label>
                    <div class="pom-agile">
                        <span class="fa fa-calendar"></span>
                        <input placeholder="Since" id="datepicker"  name="dob" type="text" required="">
                    </div>
                </div>
                <div class="form-style-agile">
                    <label>Email</label>
                    <div class="pom-agile">
                        <span class="fa fa-envelope"></span>
                        <input placeholder="Email" maxlength="100" name="em" type="email" required="">
                    </div>
                </div>
                <div class="form-style-agile">
                    <label>Country</label>
                    <div class="pom-agile">
                        <span class="fa fa-globe"></span>
                        <select name="con" path="country" id="country" class="form-control input-sm" style="border: none">
                            <option value="">Select Country</option>
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

                    </div>
                </div>
                <div class="form-style-agile">
                    <label>Password</label>
                    <div class="pom-agile">
                        <span class="fa fa-key"></span>
                        <input placeholder="Password" minlength="5" name="ps" type="password" id="password1" required="">
                    </div>
                </div>
                <div class="g-recaptcha" data-sitekey="6LfTpHsUAAAAAEyNe-MJPRt1mS7m3HW8gUiBJN4y"></div>
                <div class="sub-agile">
                    <i style="color: white" class="glyphicon glyphicon-exclamation-sign"></i>
                    <label for="brand1">
                        <span></span>Here You Accept to the Terms & Conditions</label>
                </div>
                <input type="submit" name="submit" value="Register">
            </form>
        </div>
    </div>
</div>
<!-- //content -->
<!-- password-script -->
<script>
    window.onload = function () {
        document.getElementById("password1").onchange = validatePassword;
        document.getElementById("password2").onchange = validatePassword;
    }

    function validatePassword() {
        var pass2 = document.getElementById("password2").value;
        var pass1 = document.getElementById("password1").value;
        if (pass1 != pass2)
            document.getElementById("password2").setCustomValidity("Passwords Don't Match");
        else
            document.getElementById("password2").setCustomValidity('');
        //empty string means no validation error
    }
</script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="footer">
    <div class="" style="margin-left: 460px">
        <p>Copyright © 2018 Seeking . All Rights Reserved . Design by <a href="" target="_blank">PreciousSquad</a> </p>
    </div>
</div>