<?php session_start(); ?>
<?php ob_start(); ?>

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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>


    <link rel="stylesheet" href="css/styleR.css" type="text/css" media="all" />

    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>
    <script>
        $( function() {
            var availableTags = [
                "ActionScript",
                "AppleScript",
                "Asp",
                "BASIC",
                "C",
                "C++",
                "Clojure",
                "COBOL",
                "ColdFusion",
                "Erlang",
                "Fortran",
                "Groovy",
                "Haskell",
                "Java",
                "JavaScript",
                "Lisp",
                "Perl",
                "PHP",
                "Python",
                "Ruby",
                "Scala",
                "Scheme",
            ];
            $( "#tags" ).autocomplete({
                source: availableTags
            });
        } );
    </script>
</head>
<body>