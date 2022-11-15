<?php

session_start();
include("../functions/myfunctions.php");
include('../config/connection.php');

if(isset($_POST['register_btn']))
{
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $cpassword = mysqli_real_escape_string($conn,$_POST['confirmpassword']);

    //Check if email already registered
    $check_email_query = "SELECT email FROM users WHERE email='$email'";
    $check_email_query_run = mysqli_query($conn,$check_email_query);

    if(mysqli_num_rows($check_email_query_run) > 0)
    {
        redirect("../register.php", "Email already registered");
        // $_SESSION['message'] = "Email already registered";
        // header("Location: ../register.php");
    }
    else
    {
        

        if($password == $cpassword)
        {
            // Insert user data
            $insert_query="INSERT INTO users(name,email,password) VALUES('$name','$email','$password')";
            // $insert_query="INSERT INTO `users`(`name`,`email`,`phone`,`password`) VALUES('ji','qwe@qwe','234','ewe')";

            $insert_query_run=mysqli_query($conn,$insert_query);
            // print_r($insert_query);die;
        
            if($insert_query_run)
            {
                redirect("../login.php", "Registered Successfully");
                // $_SESSION['message'] = "Registered Successfully";
                // header('Location: ../login.php');
            }
            else
            {
                redirect("../register.php", "Something went wrong");
                // $_SESSION['message'] = "Something went wrong";
                // header('Location: ../register.php');
            }

        }
        else
        {
            redirect("../register.php", "Passwords do not match");
            // $_SESSION['message'] = "Passwords do not match";
            // header("Location: ../register.php");
        }
    }
}
else if(isset($_POST['login_btn']))
{
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $login_query_run = mysqli_query($conn, $login_query);
    
    if(mysqli_num_rows($login_query_run) > 0)
    {
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $userid = $userdata['id'];
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $role_as = $userdata['role_as'];

        $_SESSION['auth_user'] = [
            'user_id' => $userid,
            'name' => $username,
            'email' => $useremail,
        ];

        $_SESSION['role_as'] = $role_as;

        if($role_as == 1)
        {
            // $_SESSION['message'] = "Welcome to dashboard";
            // header('Location: ../admin/index.php');
            redirect("../admin/announcement.php","Welcome to dashboard");
        }
        else
        {
            // $_SESSION['message'] = "Logged in Successfully";
            // header('Location: ../index.php');
            redirect("../index.php","Logged in Successfully");
        }
    }
    else
    {
        // $_SESSION['message'] = "Invalid Credentials";
        //     header('Location: ../login.php');
        
        redirect("../login.php","Invalid Credentials");
    }
}
else if(isset($_POST['adminlogin_btn']))
{
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $login_query = "SELECT * FROM admins WHERE email='$email' AND password='$password'";
    $login_query_run = mysqli_query($conn, $login_query);
    
    if(mysqli_num_rows($login_query_run) > 0)
    {
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $userid = $userdata['id'];
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $role_as = $userdata['role_as'];

        $_SESSION['auth_user'] = [
            'user_id' => $userid,
            'name' => $username,
            'email' => $useremail,
            'role_as' => $role_as,
        ];
        $_SESSION['role_as'] = $role_as;
        if($role_as == '1')
        {
            redirect("../admin/announcement.php","Welcome to dashboard");
        }
        else
        {
            redirect("../index.php","Logged in Successfully");
        }
    }
    else
    {
        redirect("../adminlogin.php","Invalid Credentials");
    }
}
