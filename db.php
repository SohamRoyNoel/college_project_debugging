<?php

$db["db_host"] = "localhost";
$db["db_user"] = "root";
$db["db_pass"] = "";
$db["db_name"] = "jobseeker";

foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//$connection = mysqli_connect('localhost','root', '', 'pdf');
if ($connection) {
    // echo "we are connected";
}
?>