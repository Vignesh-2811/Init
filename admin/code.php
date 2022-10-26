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
else if(isset($_POST['update_announcement_btn']))
{
    $announcement_id = $_POST['announcement_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $shortdescription = $_POST['shortdescription'];
    $description = $_POST['description'];
    $registrationlink = $_POST['registrationlink'];
    $publish = isset($_POST['publish']) ? '1':'0';
    $registrationsopen = isset($_POST['registrationsopen']) ? '1':'0';

    $new_poster = $_FILES['poster']['name'];
    $old_poster = $_POST['old_poster'];

    if($new_poster != "")
    {
        $image_ext = pathinfo($new_poster, PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext;
    }
    else
    {
        $update_filename = $old_poster;
    }
    $path = "../uploads";

    $update_query = "UPDATE announcement SET title='$name', slug='$slug', shortdescription='$shortdescription', 
    description = '$description', registrationlink='$registrationlink', publish='$publish', registrationsopen='$registrationsopen', poster='$update_filename' WHERE id='$announcement_id' ";

    // print_r($update_query);die;

    $update_query_run = mysqli_query($conn, $update_query);

    if($update_query_run)
    {
        if($_FILES['poster']['name'] != "")
        {
            move_uploaded_file($_FILES['poster']['tmp_name'], $path.'/'.$update_filename);
            if(file_exists("../uploads/".$old_poster))
            {
                unlink("../uploads/".$old_poster);
            }
        }
        redirect("edit-announcement.php?id=$announcement_id","Announcement Updated Successfully");
    }
    else
    {
        redirect("edit-announcement.php?id=$announcement_id", "Something Went Wrong");
    }


}
?>