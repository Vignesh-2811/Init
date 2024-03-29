<?php
require 'config/database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <!-- CUSTOM STYLESHEET -->
    <link rel="stylesheet" href="./assets/css/styles.css">
    <!-- ICONSCOUT CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Rubik:wght@400;500;700&family=Urbanist:wght@100&display=swap" rel="stylesheet">
</head>

<body>
    <nav>
        <div class="container nav__container">
            <a href="index.php" class="nav__logo">INIT</a>
            <ul class="nav__items">
                <li><a href="blog.php">Blog</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="signin.php">Signin</a></li>
                <li class="nav__profile">
                    <div class="avatar">
                        <img src="./assets/images/avatar1.jpg" alt="avatar">
                    </div>

                    <ul>
                        <li><a href="dashboard.html">Dashboard</a></li>
                        <li><a href="logout.html">Logout</a></li>
                    </ul>
                </li>

            </ul>
            <button id="open__nav-btn"><i class="uil uil-bars"></i></button>
            <button id="close__nav-btn"><i class="uil uil-multiply"></i></button>
        </div>
    </nav>