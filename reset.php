<?php include_once "lib/header.php";

//if token is taken

if(!isset($_GET['token']) && !isset($_SESSION['token'])){
    $_SESSION['error'] ="you are not authorized to view that page";
    header("location:login.php");
}

?>

<!-- Message for Message Successful -->
        <p>
           <?php
           if(isset($_SESSION['message']) &&  !empty($_SESSION['message'])){
               echo "<span style='color:green'>" . $_SESSION["message"] ."<span>";
               session_destroy();
           }

           ?>
       </p>
<h3 class="text-center">Reset Password</h3>

<p>Reset Password associated with your account: [email]</p>
<!-- update email address above as they enter it -->

<form action="processreset.php" method="POST">
        <p>
           <?php
           if(isset($_SESSION['error']) &&  !empty($_SESSION['error'])){
               echo "<span style='color:red'>" . $_SESSION['error']. "</span>";
               session_destroy();
           }

           ?>
       </p>
       <input
       
            <?php
           if(isset($_SESSION['token'])){
               echo "value='" . $_SESSION["token"] . "'";
           }else{
               echo "value='" . $_GET['token'] . "'";
           }

           ?>
       
       type="hidden" name="token" value="<?php echo $_GET['token']; ?>">

    <p>
        <label>Email</label><br>
        <input 
        
            <?php
           if(isset($_SESSION['email'])){
               echo "value=" . $_SESSION["email"];
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