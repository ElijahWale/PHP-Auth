
<?php include_once "lib/header.php"; 

if(!isset($_SESSION['loggedIn'])){
    header("location:login.php");
}
?>
<div class="container">
    <div class="card border-light mt-3 mb-3">
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
        </div> 
    </div>
</div>
<?php include_once "lib/footer.php"; ?>