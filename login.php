<?php 
include_once "lib/header.php";
require_once('functions/alert.php');


// Redirect the user to different designations

if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    switch($_SESSION['role']){
        

        case "Medical Team(MT)":
            header("location:mt.php");
        break;
        case "Super Admin":
            header("location:admin/admindashboard.php");
        break;

        case "patient.php";
        header("location:patient.php");
        break;

        default:
            header("logout.php");
        break;

    }
   
   
}
       
?> 

<div class="container-card">
   
   
        
        
        <div class="card border-light mt-3 mb-3" style="width:600px">
        <?php
// <!-- Message for Registration Successful -->
        print_error(); print_message();
        ?>
            <div class="card-header text-center">
            <h2>Login Here</h2>
                <p>All fields are required</p>
            </div>
            <div class="card-body">

                    <!-- Login Form -->

                <form action="processlogin.php" method="POST">

                
                    
                    
                    <p>
                        <label>Email</label><br>
                        <input 
                        <?php
                            if(isset($_SESSION['email']) &&  !empty($_SESSION['email'])){
                                echo "value=" . $_SESSION['email'];
                            }

                        ?>
                        type="text" name="email" class="form-control"  placeholder="Email" >
                    </p><br>
                    <p>
                        <label>Password</label><br>
                        <input type="password" name="password" class="form-control" placeholder="Password" >
                    </p><br>
                    <button type="submit" class="btn-block btn-lg btn-primary" name="submit">login</button>
                </form>

            </div>
        </div>
</div>

<?php include_once "lib/footer.php"; ?>