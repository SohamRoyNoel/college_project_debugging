
<?php ob_start(); ?>


<?php include "includes/db.php";?>

<?php include "functions.php"; ?>
<?php session_start(); ?>
<?php 




if(isset($_SESSION['name'])) {



} else {

header("location: ../index.php");


}




 ?>

<!DOCTYPE HTML>
<html>
<head>
<link rel="icon" type="image/png" href="images/user 1.png"/>
<title>Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Minimal" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link href="css/style.css" rel='stylesheet' type='text/css' />
 <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
 <link href='https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/css/froala_editor.min.css' rel='stylesheet' type='text/css' />
<link href='https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/css/froala_style.min.css' rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery.min.js"> </script>
<!-- Mainly scripts -->
<script src="js/jquery.metisMenu.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<link href="css/custom.css" rel="stylesheet">
<script src="js/Chart.js"></script>
<script src="js/custom.js"></script>
<script src="js/screenfull.js"></script>
 <script src="js/jquery.js"></script>   
        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/js/froala_editor.min.js'></script>
         

		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});
			

			
		});
		</script>

<!----->

<!--pie-chart--->
<script src="js/pie-chart.js" type="text/javascript"></script>
 <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#3bb2d0',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#fbb03b',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ed6498',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

           
        });

    </script>
 
<!--skycons-icons-->
<script src="js/skycons.js"></script>
<!--//skycons-icons-->
</head>
<body>
<div id="wrapper">


