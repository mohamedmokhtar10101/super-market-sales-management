<?php
session_start();
if(isset($_SESSION['userName_sm']))
{
    header('Location:../index.php');
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
                <link href="../styles/fonts-min.css" rel="stylesheet" type="text/css"/>
                <link href="../styles/reset-min.css" rel="stylesheet" type="text/css"/>
                <link href="../styles/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen"/>
                <link href="../styles/styles.css" rel="stylesheet" type="text/css"/>
                <script src="../js/jquery-1.11.1.min.js" type="text/javascript"></script>
                <link href="../icon.png" rel="icon">
    </head>
    <body>
        
        
        
        

        <section id="login">
           <h1>Login To The Application</h1>
           <span class="error"><?php echo $message?></span>
            <form id="loginForm" name="loginForm" method="post" action="../controllers/login_c.php" autocomplete="on">
                <input class = "input-lg" id="userName" name="userName" type="text" placeholder="Enter your user name here !" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your user name here !'">
                <input class = "input-lg " id="userPassword" name="userPassword" type="password"  placeholder="Enter password here !" onfocus="this.placeholder=''" onblur="this.placeholder='Enter password here !'" >
                <input class = "btn-lg btn-primary" id="LoginBtn" type="submit" value="Login" onmousedown="this.classList.remove('btn-primary');this.classList.add('btn-success');" onmouseup="this.classList.remove('btn-success');this.classList.add('btn-primary');" onmouseout="this.classList.remove('btn-success');this.classList.add('btn-primary');">
            </form>
            
            
            
        </section>

    </body>
</html>
