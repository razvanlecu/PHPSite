<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
        Register
    </title>
    <link rel="stylesheet" type="text/css" href="../Styles/Stylesheet.css" />
</head>
<body>
<div id="wrapper">
    <div id="banner">

    </div>
    <nav id="navigation">
        <ul id="nav">
            <li><a href="../index.php">Home</a></li>
            <li><a href="../Food.php">Food</a></li>
            <li><a href="../Login/login.php">Login</a></li>
            <li><a href="../Contact.php">Contact</a></li>
            <li><a href="../FPDF/pdf.php">Lista PDF</a></li>
            <li><a href="../Login/logout.php">Logout</a></li>
            <li><a href="../RSS.php">RSS Feed</a></li>
        </ul>
    </nav>

    <div id="content_area">
        <p><a href="register.php">Register</a> | <a href="login.php">Login</a> | <a href="../index.php">Home</a></p>
        <h3>Registration Form</h3>
        <form action="" method="POST">
            Username: <input type="text" name="user"><br />
            Password: <input type="password" name="pass"><br />
            <input type="submit" value="Register" name="submit" />
        </form>
        <?php
        if(isset($_POST["submit"])){

            if(!empty($_POST['user']) && !empty($_POST['pass'])) {
                $user=$_POST['user'];
                $pass=$_POST['pass'];
                $pass=md5($pass);

                $con=mysqli_connect('localhost','root','', 'magazindb') or die(mysqli_error($con));
                mysqli_select_db($con,'magazindb') or die("cannot select DB");

                $query=mysqli_query($con,"SELECT * FROM login WHERE username='".$user."'");
                if (!$query) {
                    die("Select failed");
                }
                $numrows=mysqli_num_rows($query);
                if($numrows==0)
                {
                    $sql="INSERT INTO login(username,password) VALUES('$user','$pass')";

                    $result=mysqli_query($con,$sql);


                    if($result){
                        echo "Cont creat";
                    } else {
                        echo "Failure!";
                    }

                } else {
                    echo "Username-ul deja exista";
                }

            } else {
                echo "Completati toate field-urile";
            }
        }
        ?>
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
        session_start();
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