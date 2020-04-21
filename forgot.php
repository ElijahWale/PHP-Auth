<?php include_once "lib/header.php"; 
require_once('functions/alert.php');
?>

<?php
    print_error();
?>
                
<div class="container-card">
    <!-- Displays error message when the email is incorrect -->
                
    <div class="card border-light mt-3 mb-3" style="width:900px">
        <div class="card-header text-center">
            <h3>Forgot Password</h3>
            <p>Provide the email address associated with your account</p>
        </div>
        <div class="card-body">

            <form action="processforgot.php" method="POST">

            

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
                <button type="submit" name="submit">Send Reset Code</button>
            </form>
        </div>

    </div>

</div>

<?php include_once "lib/footer.php"; ?>