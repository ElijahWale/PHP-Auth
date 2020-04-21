<?php include_once "lib/header.php";
require_once('functions/alert.php');
require_once('functions/user.php');


//if user is not logged in and token is not set

if(!is_User_LoggedIn() && !is_token_set()){
    $_SESSION['error'] ="you are not authorized to view that page";
    header("location:login.php");
}

?>

    
<h3 class="text-center">Reset Password</h3>

<p>Reset Password associated with your account:<?= $_SESSION['email'];?></p>
<!-- update email address above as they enter it -->

<form action="processreset.php" method="POST">

    <!-- error message and success message begins -->
        <p>
           <?php
           error(); message();

           ?>
       </p>

    <!-- error message and success message ends -->

    <!-- when user is not loggedIn token is not set -->
       <?php if(!is_User_LoggedIn()){ ?>
       <input
       
            <?php
           if( is_token_set_in_session()){
               echo "value='" . $_SESSION["token"] . "'";
           }else{
               echo "value='" . $_GET['token'] . "'";
           }

           ?>
       
       type="hidden" name="token">
        <?php } ?>
    <p>
        <label>Email</label><br>
        <input 
        
            <?php
           if(isset($_SESSION['email'])){
               echo "value=" . $_SESSION['email'];
           }

           ?>
        type="text" name="email" placeholder="Email" >
    </p><br>
    <p>
        <label>Enter New Password</label><br>
        <input type="password" name="password" placeholder="Password" >
    </p><br>
    <button type="submit" name="submit">Update Password</button>
</form>


<?php include_once "lib/footer.php"; ?>