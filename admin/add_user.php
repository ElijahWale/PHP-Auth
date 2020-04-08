<?php 
session_start(); 

if(!$_SESSION['role']=='Super Admin'){
    header('location: login.php');
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

<div class="container">

    <div class="card border-light mt-3 mb-3">
        <div class="card-header text-center">
            <h2>Register Here</h2>
            <p>All fields are required</p>
        </div>
        <div class="card-body">

            <form action="../processregister.php" method="POST">
                <p>
                    <?php
                    if(isset($_SESSION['error']) &&  !empty($_SESSION['error'])){
                        echo $_SESSION["error"];
                        session_unset();
                    }

                    ?>
                </p>

                <p>
                    <label>First Name</label><br>
                    <input 
                    <?php
                        if(isset($_SESSION['firstName']) &&  !empty($_SESSION['firstName'])){
                            echo "value=" . $_SESSION['firstName'];
                        }

                    ?>
                    type="text" name="firstName" placeholder="First Name" >
                </p><br>
                <p>
                    <label>Last Name</label><br>
                    <input
                    <?php
                        if(isset($_SESSION['lastName']) &&  !empty($_SESSION['lastName'])){
                            echo "value=" . $_SESSION['lastName'];
                        }

                    ?> 
                    type="text" name="lastName" placeholder="Last Name" >
                </p><br>
                <p>
                    <label>Email</label><br>
                    <input 
                    <?php
                        if(isset($_SESSION['email']) &&  !empty($_SESSION['email'])){
                            echo "value=" . $_SESSION['email'];
                        }

                    ?>
                    type="text" name="email" placeholder="Email" >
                </p><br>
                <p>
                    <label>Password</label><br>
                    <input type="password" name="password" placeholder="Password" >
                </p><br>
                <p>
                    <label>Gender</label><br>
                    <select name="gender">
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
                    <select name="designation" >
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
                        <option
                        <?php
                        if(isset($_SESSION['designation']) &&  !empty($_SESSION['designation'] == 'Super Admin')){
                            echo "selected";
                        }
                        ?>
                        >Super Admin</option>
                    </select>
                </p>
                <p>
                    <label>Department</label><br>
                <input type="text" name="department" placeholder="department" >
                </p><br>
                
                <button type="submit" name="submit">Register</button>

            </form>
        </div>
    </div>
</div>

       <?php include_once "../lib/footer.php"; ?>