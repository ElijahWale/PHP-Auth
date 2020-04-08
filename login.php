<?php 
include_once "lib/header.php";

if(isset($_SESSION['role']) && !empty($_SESSION['role'])){
    header("location:admin/admindashboard.php");
}


?>
<div class="container">
   
            <!-- Message for Registration Successful -->
            <p>
            <?php
            if(isset($_SESSION['message']) &&  !empty($_SESSION['message'])){
                echo "<span style='color:green'>" . $_SESSION["message"] ."<span>";
                session_destroy();
            }

            ?>
        </p>
        
        
        <div class="card border-light mt-3 mb-3">
            <div class="card-header text-center">
            <h2>Login Here</h2>
                <p>All fields are required</p>
            </div>
            <div class="card-body">

                    <!-- Login Form -->

                <form action="processlogin.php" method="POST">

                
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
                    <p>
                        <label>Password</label><br>
                        <input type="password" name="password" placeholder="Password" >
                    </p><br>
                    <button type="submit" name="submit">login</button>
                </form>

            </div>
        </div>
</div>

<?php include_once "lib/footer.php"; ?>