<?php include_once "lib/header.php";?>

<div>
    <div class="card border-light mt-3 mb-3">
        <div class="card-header text-center">
            <h3>Forgot Password</h3>
            <p>Provide the email address associated with your account</p>
        </div>
        <div class="card-body">

            <form action="processforgot.php" method="POST">
                <p>
                    <?php
                    if(isset($_SESSION['error']) &&  !empty($_SESSION['error'])){
                        echo $_SESSION["error"];
                        session_destroy();
                    }

                    ?>
                </p>

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