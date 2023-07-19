<?php
session_start();

// Periksa apakah pengguna sudah login
if (isset($_SESSION['user_id'])) {
    // Jika pengguna telah login, redirect ke halaman user
    header("Location: user/index.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PALADA</title>
    <link rel="stylesheet" href="style.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- link CDN -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <!-- LINK FONT  -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&family=Secular+One&display=swap" rel="stylesheet">
<link rel="icon" href="images/logo.png">
</head>

<body>
<section id="header">
        <a href="index.php"><img src="images/logo.png" class="logo" ></a>
    
        <div>
         
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
            <li><a href="divisi.php">Divisi</a></li>
            <li><a href="pengurus.php">Pengurus</a></li>
            <li><a href="activity.php">Activity</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="login.php">Login</a></li>
                <a href="#" id="close"> <i class="far fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <i id="bar" class="fas fa-outdent"> </i>
            
        </div>
    </section>
