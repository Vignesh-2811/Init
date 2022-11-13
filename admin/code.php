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
else if(isset($_POST['delete_announcement_btn']))
{
    $announcement_id = mysqli_real_escape_string($conn, $_POST['announcement_id']);

    $announcement_query = "SELECT * FROM announcement WHERE id='$announcement_id' ";
    $announcement_query_run = mysqli_query($conn, $announcement_query);
    $announcement_data = mysqli_fetch_array($announcement_query_run);
    $poster = $announcement_data['poster'];

    $delete_query = "DELETE FROM announcement WHERE id='$announcement_id' ";
    $delete_query_run = mysqli_query($conn, $delete_query);

    if($delete_query_run)
    {
        if(file_exists("../uploads/".$poster))
        {
            unlink("../uploads/".$poster);
        }
        redirect("announcement.php", "Announcement Deleted Successfully");
    }
    else
    {
        redirect("announcement.php", "Something Went Wrong");



    }
}
if(isset($_POST['add_details_btn']))
{
    $announcementid = $_POST['announcementid'];
    $organiser = $_POST['organiser'];
    $eventtype = $_POST['eventtype'];
    $payment = $_POST['payment'];
    $category = $_POST['category'];
    $venue = $_POST['venue'];
    $description = $_POST['description'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $timingsfrom = $_POST['timingsfrom'];
    $timingsto = $_POST['timingsto'];
    $prerequisites = $_POST['prerequisites'];
    $youtubelink = $_POST['youtubelink'];
    $paymentdetails = $_POST['paymentdetails'];
    $registrationlink = $_POST['registrationlink'];
    $contactperson1name = $_POST['contactperson1name'];
    $contactperson1number = $_POST['contactperson1number'];
    $contactperson2name = $_POST['contactperson2name'];
    $contactperson2number = $_POST['contactperson2number'];


    $add_details_query = "INSERT INTO announcementdetails 
    (announcementid, organiser, eventtype, payment, category, venue, description, startdate, enddate, timingsfrom, timingsto, prerequisites, youtubelink, paymentdetails, registrationlink, contactperson1name, contactperson1number, contactperson2name, contactperson2number)
    VALUES ('$announcementid', '$organiser', '$eventtype', '$payment', '$category', '$venue', '$description', '$startdate', '$enddate', '$timingsfrom', '$timingsto', '$prerequisites', '$youtubelink', '$paymentdetails', '$registrationlink', '$contactperson1name', '$contactperson1number', '$contactperson2name', '$contactperson2number')";

    // print_r($add_details_query);die;

    $add_details_query = mysqli_query($conn, $add_details_query);

    if($add_details_query)
    {
        redirect("details.php", "details added successfully");
    }
    else
    {
        redirect("details.php", "Something went wrong");
    }

}
?>