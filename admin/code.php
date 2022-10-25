<?php

session_start();
include('../config/connection.php');
include('../functions/myfunctions.php');

if(isset($_POST['add_announcement_btn']))
{
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $shortdescription = $_POST['shortdescription'];
    $description = $_POST['description'];
    $registrationlink = $_POST['registrationlink'];
    $publish = isset($_POST['publish']) ? '1':'0';
    $registrationsopen = isset($_POST['registrationsopen']) ? '1':'0';

    $image = $_FILES['poster']['name'];

    $path ="../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    $announcement_query = "INSERT INTO announcement 
    (title,slug,shortdescription,description,registrationlink,publish,registrationsopen,poster)
    VALUES ('$name', '$slug', '$shortdescription', '$description', '$registrationlink', '$publish', '$registrationsopen', '$filename')";

    // print_r($announcement_query);die;

    $announcement_query_run = mysqli_query($conn, $announcement_query);

    if($announcement_query_run)
    {
        move_uploaded_file($_FILES['poster']['tmp_name'], $path.'/'.$filename);
        redirect("add-announcement.php", "Announcement added successfully");
    }
    else
    {
        redirect("add-announcement.php", "Something went wrong");
    }

}
?>