<?php 
session_start(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>CVH:Corona Virus Hospital </title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="#navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link" href="index.php">Home |</a>
                <?php if(!isset($_SESSION['loggedIn'])){?>
                <a class="nav-item nav-link" href="login.php">Log In |</a>
                <a class="nav-item nav-link" href="register.php">Register |</a>
                <a class="nav-item nav-link" href="forgot.php">Forgot Password </a>
                <?php }else{?>
                <a class="nav-item nav-link" href="logout.php">Log Out</a>
                <?php }?>
            </div>
        </div>
    </nav>
    