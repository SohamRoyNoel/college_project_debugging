<?php session_start(); ?>
<?php
$books = $_GET['book'];
$path = "CV/$books";
header("Content-disposition: attachment; filename= $books");
header("Content-type: application/pdf");
readfile($path);
?>