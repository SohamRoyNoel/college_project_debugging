<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body id="myPage">

<!-- Team Container -->
<div class="w3-container w3-padding-64 w3-center" id="team">
    <h2>OUR TEAM</h2>
    <p>Meet the team - our precious squad</p>

    <div class=""><br>

        <div class="col-sm-3">
            <img src="favicon/soham.jpg" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
            <h3>Soham Roy</h3>
            <p>UI Developer</p>
        </div>

        <div class="col-sm-3">
            <img src="favicon/aditya.jpg" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
            <h3>Aditya Rahut</h3>
            <p>Admin Developer</p>
        </div>

        <div class="col-sm-2">
            <img src="favicon/ivy.jpg" alt="Boss" style="width:135px; height: 128px" class="w3-circle w3-hover-opacity">
            <h3>Ivy Saha</h3>
            <p>Analyst & Debugger</p>
        </div>

        <div class="col-sm-2">
            <img src="favicon/tanay.jpg" alt="Boss" style="width:135px; height: 136px"class="w3-circle w3-hover-opacity">
            <h3>Tanay Das</h3>
            <p>Tester</p>
        </div>

        <div class="col-sm-2">
            <img src="favicon/sreeparna.jpeg" alt="Boss" style="width:135px; height: 136px"class="w3-circle w3-hover-opacity">
            <h3>Sreeparna Dutta</h3>
            <p>Technical Writer</p>
        </div>
    </div>
</div>

<!-- Container -->
<div class="w3-container" style="position:relative">
    <a onclick="w3_open()" class="w3-button w3-xlarge w3-circle w3-teal"
       style="position:absolute;top:-28px;right:24px">+</a>
</div>

<!-- Pricing Row -->
<div class="w3-row-padding w3-center w3-padding-64" id="pricing">
    <h2>Seeker</h2>
    <p>Find who you are</p><br>
    <div class="w3-third w3-margin-bottom">
        <ul class="w3-ul w3-border w3-hover-shadow">
            <li class="w3-theme">
                <p class="w3-xlarge">Seeker.com</p>
            </li>
            <li class="w3-padding-16"><b>Seeker</b> Jobs</li>
            <li class="w3-padding-16"><b>No</b> Registration fees</li>
            <li class="w3-padding-16"><b>No</b> Unwanted Advertisements</li>
            <li class="w3-padding-16"><b>Endless</b> Opportunity</li>
            <li class="w3-padding-16">
                <h2 class="w3-wide"><i class="fa fa-usd"></i> 0</h2>
                <span class="w3-opacity">per month</span>
            </li>
            <li class="w3-theme-l5 w3-padding-24">
                <a href="login.php"> <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Login</button></a>
            </li>
        </ul>
    </div>

    <div class="w3-third w3-margin-bottom">
        <ul class="w3-ul w3-border w3-hover-shadow">
            <li class="w3-theme-l2">
                <p class="w3-xlarge">User</p>
            </li>
            <li class="w3-padding-16"><b>Endless</b> Jobs</li>
            <li class="w3-padding-16"><b>No</b> Registration fees</li>
            <li class="w3-padding-16"><b>No</b> Unwanted Advertisements</li>
            <li class="w3-padding-16"><b>Endless</b> Opportunity</li>
            <li class="w3-padding-16">
                <h2 class="w3-wide"><i class="fa fa-usd"></i> 0</h2>
                <span class="w3-opacity">per month</span>
            </li>
            <li class="w3-theme-l5 w3-padding-24">
                <a href="userlogin.php"> <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Register/Login</button></a>
            </li>
        </ul>
    </div>

    <div class="w3-third w3-margin-bottom">
        <ul class="w3-ul w3-border w3-hover-shadow">
            <li class="w3-theme">
                <p class="w3-xlarge">Company</p>
            </li>
            <li class="w3-padding-16"><b>Countless</b> Scholars</li>
            <li class="w3-padding-16"><b>No</b> Registration fees</li>
            <li class="w3-padding-16"><b>No</b> Unwanted Advertisements</li>
            <li class="w3-padding-16"><b>Endless</b> Opportunity</li>
            <li class="w3-padding-16">
                <h2 class="w3-wide"><i class="fa fa-usd"></i> 0</h2>
                <span class="w3-opacity">per month</span>
            </li>
            <li class="w3-theme-l5 w3-padding-24">
                <a href="companylogin.php"> <button class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Register/Login</button></a>
            </li>
        </ul>
    </div>


</div>
</body>
</html>
