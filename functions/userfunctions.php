<?php
session_start();
include('config/connection.php');


function getAllActive($table)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE publish='1' ";
    return $query_run = mysqli_query($conn,$query);
}

function getSlugActive($table, $slug)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE slug ='$slug' AND publish='0' LIMIT 1";
    return $query_run = mysqli_query($conn, $query);
}

function getIDActive($table, $id)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE id ='$id' AND status='0' ";
    return $query_run = mysqli_query($conn, $query);
}

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit();
}

?>