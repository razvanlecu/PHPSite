<?php
if(isset($_POST['submit'])){
    $to = "razvan.lecu@hotmail.com";
    $from = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = "PHP Test";
    $account = "razvanphptest@gmail.com";
    $password = "gigel1010";
    $message = $first_name . " " . $last_name . " a scris:" . "\n\n" . $_POST['message'] . " si are mailul: " . $from;
    echo "Email trimis " . $first_name . ", te contactam noi.";


    include("phpmailer/class.phpmailer.php");
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->CharSet = 'UTF-8';
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth= true;
    $mail->Port = 587;
    $mail->Username= $account;
    $mail->Password= $password;
    $mail->SMTPSecure = 'tls';
    $mail->setFrom ($from, $first_name);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->addAddress($to);
    if(!$mail->send()){
        echo "Mailer Error: " . $mail->ErrorInfo;
    }else{
        echo "E-Mail has been sent";
        header("Location: Mailsent.php");
    }

}
$title = 'Contact';
$content = '<form action="" method="post">
    First Name: <input type="text" name="first_name"><br>
    Last Name: <input type="text" name="last_name"><br>
    Email: <input type="text" name="email"><br>
    Message:<br><textarea rows="5" name="message" cols="30"></textarea><br>
    <input type="submit" name="submit" value="Submit">
</form>';
include ('Template.php');
?>
