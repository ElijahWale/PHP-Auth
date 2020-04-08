<?php 
session_start(); 

if(!isset($_SESSION['loggedIn'])){
    header("location:../login.php");
}



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
                <a class="nav-item nav-link" href="../index.php">Home|</a>

                <a class="nav-item nav-link" href="../logout.php">Log Out</a>

            </div>
        </div>
    </nav>
    <p>
           <?php
           if(isset($_SESSION['message']) &&  !empty($_SESSION['message'])){
               echo "<span style='color:green';text-align:center;>" . $_SESSION["message"] ."<span>";
               session_destroy();
           }

           ?>
    </p>

    <div class="container">
        <div class="card border-light mt-3 mb-3">
        <div class="card-header text-center"><h3> ADMIN DASHBOARD</h3>
            <p>Hi, <strong><?= $_SESSION['fullName'];?></strong></p>
        </div>
        <div class="card-body">
        
            <div class="card-text">   
                <p> YOU ARE NOW LOGGED IN AS ADMIN <?php echo $_SESSION['loggedIn'];?></p><br>
                <p>You role is as <?=  $_SESSION['role'];  ?></p><br>
                
                <div>
                    <a href="add_user.php" class="btn btn-info">Add New User</a>
                </div>
                
            </div> 
        </div>
    </div>








    <?php include_once "../lib/footer.php"; ?>

