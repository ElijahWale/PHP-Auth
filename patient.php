
<?php include_once "lib/header.php"; 
require_once('functions/alert.php');

if(!isset($_SESSION['loggedIn'])){
    header("location:login.php");
}
?>
<div class="container">
     


   
           
    <div class="card border-light mt-3 mb-3" style="width:900px">
    <!-- displays success message begins -->
    
            <?php
            print_error(); print_message();

           ?>
    <!-- display success message ends -->

        

        <div class="card-header text-center"><h3>Patients DASHBOARD</h3>
            <p>Hi, <strong><?= $_SESSION['fullName'];?></strong></p>
        </div>
        <div class="card-body">
    
            <div class="card-text">   
                <p> YOU ARE NOW LOGGED IN AS USER <?php echo $_SESSION['loggedIn'];?></p><br>
                <p>You role is as <?=  $_SESSION['role'];  ?></p><br>
                <p>Date of Registration: <?= $_SESSION['registration']; ?></p><br>
                <p>User Last Login Date : <?= $_SESSION['date']; ?></p><br>
                <p>User Last Login Time: <?= $_SESSION['time'];?> </p><br>
                <p>User Department: <?= $_SESSION['department'];?> </p><br>

                <!-- add links to Book Appointment and Pay bill -->
                <div>
                        <a href="paybill.php" class="btn btn-info">Pay Bill</a>
                        
                        <a href="bookappoint.php" class="btn btn-info">Book appointment</a>
                </div>
            </div> 
        </div>
    </div>
</div>
<?php include_once "lib/footer.php"; ?>