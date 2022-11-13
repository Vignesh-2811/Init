<?php
session_start();
use  PHPMailer\PHPMailer\PHPMailer;
use  PHPMailer\PHPMailer\Exception;
require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

include("../functions/myfunctions.php");
include('../config/connection.php');

if (isset($_POST["contact_message"])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject= $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth= true;
    $mail->Username= 'initmessenger@gmail.com';
    $mail->Password= 'ijiqaaorllfismcl';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('initmessenger@gmail.com');
    $mail->FromName = $name;
    $mail->addAddress('init8055@gmail.com');
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = '<b>From:</b>'.$email.'<br><br>'.$message;
    if(!$mail->send()) {
        redirect("../contact.php", "Error in Sending Message");
    } 
    else {

        $sname = mysqli_real_escape_string($conn,$name);
        $semail = mysqli_real_escape_string($conn,$email);
        $ssubject = mysqli_real_escape_string($conn,$subject);
        $smessage = mysqli_real_escape_string($conn,$message);

        // Insert user data
        $insert_query="INSERT INTO messages(name,email,subject,message) VALUES('$sname','$semail','$ssubject','$smessage')";
        // $insert_query="INSERT INTO `users`(`name`,`email`,`phone`,`password`) VALUES('ji','qwe@qwe','234','ewe')";

        $insert_query_run=mysqli_query($conn,$insert_query);
        // print_r($insert_query);die;

        if($insert_query_run){
            redirect("../contact.php", "Message has been sent");
            // $_SESSION['message'] = "Registered Successfully";
            // header('Location: ../login.php');
        }
        else{
            redirect("../contact.php", "Message not updated in Database");
            // $_SESSION['message'] = "Something went wrong";
            // header('Location: ../register.php');
        }
}
}