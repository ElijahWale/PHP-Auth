<?php include_once "lib/header.php";

// if user is not logged redirect the user back to login page 
if(!isset($_SESSION['loggedIn'])){
    header("location:login.php");
}
if (!($_SESSION["role"] == "Medical Team(MT)")){
    header("location:index.php");
}

?>

<div class="container">
    <div class="card border-light mt-3 mb-3" style="width:900px">
       <div class="card-header text-center"><h3> Medical Team DASHBOARD</h3>
        <p>Hi, <strong><?= $_SESSION['fullName'];?></strong></p>
       </div>
       <div class="card-body">
    
            <div class="card-text"> 
                <p><a href="patientTransaction.php"  class="btn btn-info">View Patient Transactions</a> </p>  
                <p><a href="viewappointment.php"  class="btn btn-info">View all Appointments</a> </p>  
                <p> YOU ARE NOW LOGGED IN AS USER <?php echo $_SESSION['loggedIn'];?></p><br>
                <p>You role is as <?=  $_SESSION['role'];  ?></p><br>
                <p>Date of Registration: <?= $_SESSION['registration']; ?></p><br>
                <p>User Last Login Date : <?= $_SESSION['date']; ?></p><br>
                <p>User Last Login Time: <?= $_SESSION['time'];?> </p><br>
                <p>User Department: <?= $_SESSION['department'];?> </p><br>
            </div>
       </div> 
    </div>
</div>
<?php include_once "lib/footer.php"; ?>