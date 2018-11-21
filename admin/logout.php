<?php ob_start(); ?>
<?php session_start(); ?>

<?php 

$_SESSION['name'] = null;
$_SESSION['email'] = null;
$_SESSION['no'] = null;
$_SESSION['extra'] = null;
$_SESSION['img'] = null;
$_SESSION['em'] = null;
session_destroy();
    
header("Location: ../index.php");

?>