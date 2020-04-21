<?php 
session_start(); 
require_once('../functions/alert.php');

if(!isset($_SESSION['role'])){
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
    <link rel="stylesheet" href="../css/style.css">

    <title>CVH:Corona Virus Hospital </title>
</head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal">CoronaVirus Hospital</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="../index.php">Home</a>
            <?php if(!isset($_SESSION['loggedIn'])){?>
            <a class="p-2 text-dark" href="../login.php">Log In</a>
            <a class="btn btn-primary" href="../register.php">Register</a>
            <!-- <a class="p-2 text-dark" href="forgot.php">Forgot Password</a> -->
            <?php }else{?>
            <a class="p-2 text-dark" href="../logout.php">Log Out</a>
            <a class="p-2 text-dark" href="../reset.php">Reset Password</a>
            <?php }?>
        </nav>
        
    </div>

    <p>
           <?php
            print_error(); print_message();

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
                        <a href="add_user.php" class="btn btn-outline-primary mb-2">Add New User</a>
                        <a href="viewStaffs.php" class="btn btn-outline-primary mb-2">View All Staffs</a>
                        <a href="viewPatients.php" class="btn btn-outline-primary mb-2">View All Patients</a>
                    </div>
                    
                </div> 
            </div>
        
    </div>








    <?php include_once "../lib/footer.php"; ?>

