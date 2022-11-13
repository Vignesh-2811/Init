<?php
session_start();
error_reporting(E_ERROR | E_PARSE);

include("../functions/myfunctions.php");

if(isset($_SESSION['auth']))
{
    if($_SESSION['role_as'] != '1')
    {
        // $_SESSION['message'] = "You are not authorized to access this page";
        // header('Location: ../index.php');
        redirect("../index.php","You are not authorized to access this page");
    }
}
else
{
    // $_SESSION['message'] = "login to continue";
    // header('Location: ../login.php');
    redirect("../login.php","login to continue");
}

?>