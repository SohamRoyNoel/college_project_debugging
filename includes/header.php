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
                        echo "<li><a href=\"./userprofile.php\"><img src=\"userImage/$img\" class=\"img-circle\" height=\"30\" width=\"35\" alt='No Pic'> </a></li>";
                    }
                    if ($sec == "XXX106") {
                        echo "<li><a href=\"./companyprofile.php\"><img src=\"companyImage/$img\" class=\"img-circle\" height=\"30\" width=\"35\" alt='No Pic'> </a></li>";
                    }
                }
                ?>
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
    <!--/.navbar-collapse-->
</nav>
<?php
if (isset($_POST['submit'])){
    $skill = $_POST['skill'];
    $location = $_POST['location'];
    header("Location: search.php?skill=$skill&location=$location");
}
?>
<div class="banner_1">
    <div class="container">
        <div id="search_wrapper1">
            <div id="search_form" class="clearfix">
                <?php
                if (!isset($_SESSION['iso'])){
                    ?>
                    <h1>Start your job search</h1>
                    <p>

                    <form action="" method="post">
                        <input required="" type="text" name="skill" id="tags" class="text" placeholder=" " value="Enter Skill" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Skill';}">
                        <input required type="text" name="location" class="text" placeholder=" " value="Location" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Location';}">
                        <label class="btn2 btn-2 btn2-1b"><input name="submit" type="submit" value="Find Jobs"></label>
                    </form>
                    <?php
                } else {
                    ?>
                    <h1>Start your job post</h1>
                <?php } ?>
                </p>
            </div>
        </div>
    </div>
</div>
