<?php 
session_start();
require_once('../functions/alert.php');

if(!$_SESSION['role']=='Super Admin'){
    header('location: ../login.php');
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

<a href="admindashboard.php" class="btn btn-outline-primary mt-3 ml-2">Go Back</a>

    
                    <p>
                        <?php
                            print_error(); print_message();


                        ?>
                    </p>
                     
<div class="container-card">        

        <div class="card border-light mt-3 mb-3"  style="width:800px">
            <div class="card-header text-center">
                <h2>Add User</h2>
                <p>All fields are required</p>
            </div>
            <div class="card-body">
                <form action="../processregister.php" method="POST">

                <!-- display error message -->
                      <!-- form begins -->
                    <p>
                        <label>First Name</label><br>
                        <input 
                        <?php
                            if(isset($_SESSION['firstName']) &&  !empty($_SESSION['firstName'])){
                                echo "value=" . $_SESSION['firstName'];
                            }

                        ?>
                        type="text" name="firstName" class="form-control" placeholder="First Name" >
                    </p><br>
                    <p>
                        <label>Last Name</label><br>
                        <input
                        <?php
                            if(isset($_SESSION['lastName']) &&  !empty($_SESSION['lastName'])){
                                echo "value=" . $_SESSION['lastName'];
                            }

                        ?> 
                        type="text" name="lastName" class="form-control" placeholder="Last Name" >
                    </p><br>
                    <p>
                        <label>Email</label><br>
                        <input 
                        <?php
                            if(isset($_SESSION['email']) &&  !empty($_SESSION['email'])){
                                echo "value=" . $_SESSION['email'];
                            }

                        ?>
                        type="text" name="email" class="form-control" placeholder="Email" >
                    </p><br>
                    <p>
                        <label>Password</label><br>
                        <input type="password" name="password" class="form-control" placeholder="Password" >
                    </p><br>
                    <p>
                        <label>Gender</label><br>
                        <select class="form-control" name="gender">
                            <option value="">Select one</option>
                            <option
                            <?php
                            if(isset($_SESSION['gender']) &&  !empty($_SESSION['gender'] == 'Male')){
                                echo "selected";
                            }
                            ?>
                            >Male</option>
                            <option
                            <?php
                            if(isset($_SESSION['gender']) &&  !empty($_SESSION['gender'] == 'Female')){
                                echo "selected";
                            }
                            ?>
                            >female</option>
                        </select>
                    </p>
                    <p>
                        <label>Designation</label><br>
                        <select class="form-control" name="designation" >
                            <option value="">Select one</option>
                            <option
                            <?php
                            if(isset($_SESSION['designation']) &&  !empty($_SESSION['designation'] == 'Medical Team(MT)')){
                                echo "selected";
                            }
                            ?>
                            >Medical Team(MT)</option>
                            <option
                            <?php
                            if(isset($_SESSION['designation']) &&  !empty($_SESSION['designation'] == 'Patient')){
                                echo "selected";
                            }
                            ?>
                            >Patient</option>
                        </select>
                    </p>
                    <p>
                        <label>Department</label><br>
                    <input type="text" name="department" class="form-control" placeholder="department" >
                    </p><br>
                
                    <button type="submit" class="btn-block btn-lg btn-primary" name="submit">Register</button>

                </form>
            </div>
        </div>

</div>

       <?php include_once "../lib/footer.php"; ?>