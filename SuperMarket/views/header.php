<?php
session_start();
if (!isset($_SESSION['userName_sm'])) {
    header("location:index.php");

    die();
}


?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Super Market Sales System</title>
            <meta name="description" content="super market sales system">
            <meta name="keywords" content="super market , sales  management">
            <meta name="author" content="Software Engineering Team">
            <link href="styles/fonts-min.css" rel="stylesheet" type="text/css"/>
            <link href="styles/reset-min.css" rel="stylesheet" type="text/css"/>
            <link href="styles/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen"/>
            <link href="styles/styles.css" rel="stylesheet" type="text/css"/>
            <script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
            <link href="icon.png" rel="icon">
        </head>
         <body>
             <header id="mainHeader">



                <a href='' class="logoborder">  
                    <div id="logo">
                    </div>
                </a>
                <h3 id="welcome">Welcom  Admin <a href="" class="btn btn-toolbar"><span class="glyphicon glyphicon-user"></span> Logout</a></h3>

            </header>
              <div class="clearfix"></div>