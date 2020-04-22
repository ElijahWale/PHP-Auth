
<?php
session_start();

// if user session is not set

if(!isset($_SESSION['loggedIn'])){
    header("location:login.php");
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
<div class="container">
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">Full Name</th>
                <th scope="col">Designation</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
        

            </tr>
        </thead>
        <?php
            $allStaffs = scandir("../db/users");
            $countAllStaffs = count($allStaffs);
        
            for ($i = 2; $i < $countAllStaffs; $i++){
                $currentUser = $allStaffs[$i];
                $userString = file_get_contents("../db/users/".$currentUser);
                $userObject = json_decode($userString);
                $designationFromDB = $userObject->designation;
                $fullName = $userObject->firstName . " ". $userObject->lastName;
                $emailFromDB = $userObject->email;
                $genderFromDB = $userObject->gender;

                if($designationFromDB =="Medical Team(MT)"){
                   

                ?>
                <tr>
                    <td><?= $fullName;?></td>
                    <td><?= $designationFromDB;?></td>
                    <td><?= $emailFromDB;?></td>
                    <td><?= $genderFromDB;?></td>
                  
                    
                    
                </tr>
        <?php
                }
                
            }?>


    
    </table>

</div>









<?php include_once "../lib/footer.php"; ?>