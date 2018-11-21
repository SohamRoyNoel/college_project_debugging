<?php ob_start(); ?>
<?php session_start(); ?>


<!DOCTYPE HTML>
<?php include "db.php"?>
<?php include "functions.php" ?>
<html>
<head>
    <title>Seeking an Job</title>
    <link rel="shotcut icon" type="image/png" href="favicon/job-seekers-1.png">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" />
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt=""/></a>
        </div>
        <!--/.navbar-header-->
        <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Jobs<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php">All Jobs</a></li>
                        <li><a href="jobbycompany.php">Jobs by Company</a></li>
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
                <?php
                if (!isset($_SESSION['iso']) && !isset($_SESSION['sex'])){
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Recruiters<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="./companylogin.php">Recruiters Login</a></li>
                            <li><a href="./Company_reg.php">Recruiters Registration</a></li>
                            <li><a href="./login.php">Admin Login</a></li>
                        </ul>
                    </li>
                <?php } ?>
                <?php
                if (isset($_SESSION['em'])){
                    echo "<li><a href=\"./logout.php\">Logout</a></li>";
                } else {
                    echo "<li><a href=\"./userlogin.php\">Login</a></li>";
                }
                ?>
                <li><a href="./about.php">About</a></li>
                <li><a href="./contact.php">Contact</a></li>
                <li><a href="./faq.php">FAQ</a></li>
                <?php
                if (isset($_SESSION['secret'])){
                    $sec = $_SESSION['secret'];
                    $img = $_SESSION['img'];
                    if ($sec == "XXX105") {
                        echo "<li><a href=\"./userprofile.php\"><img src=\"userImage/$img\" class=\"img-circle\" height=\"30\" width=\"35\" alt=''> </a></li>";
                    }
                    if ($sec == "XXX106") {
                        echo "<li><a href=\"./companyprofile.php\"><img src=\"companyImage/$img\" class=\"img-circle\" height=\"30\" width=\"35\" alt=''> </a></li>";
                    }
                    if ($sec == "XXX107") {
                        echo "<li><a href=\"/JOBS/admin\"><img src=\"admin/images/$img\" class=\"img-circle\" height=\"30\" width=\"35\" alt=''> </a></li>";
                    }
                }
                ?>
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
    <!--/.navbar-collapse-->
    <?php
    if (isset($_POST['submit'])){
        $skill = $_POST['skill'];
        $location = $_POST['location'];
        header("Location: search.php?skill=$skill&location=$location");
    }
    ?>
</nav>
<div class="banner">
    <div class="container">
        <div id="search_wrapper">
            <div id="search_form" class="clearfix">
                <h1>Start your job search</h1>
                <p>
                <form action="" method="post">
                    <input required="" type="text" name="skill" id="tags" class="text" placeholder=" " value="Enter Skill" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Skill';}">
                    <input required type="text" name="location" class="text" placeholder=" " value="Location" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Location';}">
                    <label class="btn2 btn-2 btn2-1b"><input name="submit" type="submit" value="Find Jobs"></label>
                </form>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="grid_1">
        <?php
        if (isset($_SESSION['confirmQ'])){
            $val = $_SESSION['confirmQ'];
            if ($val == "true"){
                echo "<script>alert(\"You have successfully applied for the job.\")</script>";
                unset($_SESSION['confirmQ']);
            }
        }
        ?>
        <h3>Featured Employers</h3>
        <ul id="flexiselDemo3">
            <li><img src="images/c1.gif"  class="img-responsive" /></li>
            <li><img src="images/c2.gif"  class="img-responsive" /></li>
            <li><img src="images/c3.gif"  class="img-responsive" /></li>
            <li><img src="images/c4.gif"  class="img-responsive" /></li>
            <li><img src="images/c5.gif"  class="img-responsive" /></li>
            <li><img src="images/c6.gif"  class="img-responsive" /></li>
        </ul>
        <script type="text/javascript">
            $(window).load(function() {
                $("#flexiselDemo3").flexisel({
                    visibleItems: 6,
                    animationSpeed: 1000,
                    autoPlay:false,
                    autoPlaySpeed: 3000,
                    pauseOnHover: true,
                    enableResponsiveBreakpoints: true,
                    responsiveBreakpoints: {
                        portrait: {
                            changePoint:480,
                            visibleItems: 1
                        },
                        landscape: {
                            changePoint:640,
                            visibleItems: 2
                        },
                        tablet: {
                            changePoint:768,
                            visibleItems: 3
                        }
                    }
                });

            });
        </script>
        <script type="text/javascript" src="js/jquery.flexisel.js"></script>
    </div>
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
        </div>

        <?php
                $post_query_count =  "select * from jobs";
                $find_count = mysqli_query($connection, $post_query_count);
                $count = mysqli_num_rows($find_count);

                $count = ceil($count / 5);
        ?>

        <?php

        if (isset($_GET['page'])){
            $page = $_GET['page'];
        } else {
            $page = "";
        }

        if ($page == "" || $page == 1){
            $page_1 = 0;
        } else {
            $page_1 = ($page * 5) - 5;
        }

        $jobs = "select * from jobs limit $page_1, 5";
        $query = mysqli_query($connection, $jobs);
        while ($row = mysqli_fetch_assoc($query)){
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
            $img = $row['img'];
            $type = $row['type'];

            $company = "select * from company where id = {$cid1}";
            $cquery = mysqli_query($connection, $company);
            while ($row = mysqli_fetch_assoc($cquery)){
                $db_company_id = $row['id'];
                $db_company_name = $row['name'];
                $db_company_reg = $row['reg'];
                $db_company_iso = $row['iso'];
                $db_company_em = $row['email'];
                $db_company_dob = $row['since'];
                $db_company_img = $row['img'];
                $db_company_password = $row['password'];
            }
            ?>
            <div class="col-md-8 pull-right">
                <div class="col_1">
                    <div class="col-sm-4 row_2">
                        <a href="watchJobdetails.php?j=<?php echo $id1; ?>"><img src="<?php if($type == "company"){ echo 'companyImage/' . $db_company_img;} else {echo 'companyImage/20.jpg';} ?>" class="img-responsive" alt=""/></a>
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
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>


        <?php } ?>

        <div class="col-md-5 pull-right">
            <ul class="pagination">
                <li class="<?php echo $page == 1? 'disabled':$page == ''? 'disabled':'' ?>"><a href="index.php?page=<?php echo $page>=0? $page - 1:$page?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
<!--                <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>-->
                <?php
                      for ($j=1; $j <= $count; $j++)  {

                          if ($j == $page){
                              echo "<li><a style='background: #f15f43 !important;' href=\"index.php?page={$j}\">$j</a></li>";
                          } else {
                              echo "<li><a href=\"index.php?page={$j}\">$j</a></li>";
                          }

                      }
                ?>
                <li class="<?php echo $page == $count? 'disabled':'' ?>"><a href="index.php?page=<?php echo $page + 1?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
            </ul>
        </div>

        <div class="clearfix"> </div>
    </div>
</div>
<div class="footer">
    <div class="" style="margin-left: 460px">
        <p>Copyright © 2018 Seeking . All Rights Reserved . Design by <a href="" target="_blank">PreciousSquad</a> </p>
    </div>
</div>
</body>
</html>