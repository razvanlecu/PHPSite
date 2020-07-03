
<?php
session_start();
?>
?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>
            <?php echo $title; ?>
        </title>
        <link rel="stylesheet" type="text/css" href="Styles/Stylesheet.css" />
    </head>
    <body>
        <div id="wrapper">
            <div id="banner">

            </div>
            <nav id="navigation">
                <ul id="nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="Food.php">Food</a></li>
                    <li><a href="Login/login.php">Login</a></li>
                    <li><a href="Contact.php">Contact</a></li>
                    <li><a href="FPDF/pdf.php">Lista PDF</a></li>
                    <li><a href="Login/logout.php">Logout</a></li>
                    <li><a href="RSS.php">RSS Feed</a></li>
                </ul>
            </nav>

            <div id="content_area">
                <?php echo $content; ?>
            </div>

            <div id="sidebar">
                <?php
                $con=mysqli_connect("localhost", "root", '') or die(mysqli_error($con));
                mysqli_select_db($con, 'magazindb') or die(mysqli_error($con));
                mysqli_query($con,"UPDATE counter SET counter = counter + 1");
                $count = mysqli_fetch_row(mysqli_query($con,"SELECT counter FROM counter"));
                print "View Counter: " . "$count[0]";

                ?>
                <br>
                <br>
                <?php

                if(isset($_SESSION['sess_user']))
                echo 'Welcome: ' . $_SESSION['sess_user'];
                ?>
            </div>

            <footer>
                <p>Hypermarket</p>
            </footer>
        </div>
    </body>
</html>
