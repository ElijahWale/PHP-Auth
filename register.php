<?php 
include_once "lib/header.php";
require_once('functions/alert.php');

if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    switch($_SESSION['role']){
        case "Patient":
        header("location:patient.php");
        break;

        case "Medical Team(MT)":
            header("location:mt.php");
        break;
        default:
            header("logout.php");
        break;

    }
}

?>
<div class="container-card">
        
        <div class="card border-light mt-3 mb-3" style="width:600px">
            <div class="card-header text-center">
                <h2>Register Here</h2>
                <p>All fields are required</p>
            </div>
            <div class="card-body">
                <form action="processregister.php" method="POST">
                    <p>
                        <?php
                        print_error();
                        ?>
                    </p>

                    <p>
                        <label>First Name</label><br>
                        <input 
                        <?php
                            if(isset($_SESSION['firstName']) &&  !empty($_SESSION['firstName'])){
                                echo "value=" . $_SESSION['firstName'];
                            }

                        ?>
                        type="text" name="firstName" class="form-control" placeholder="First Name" >
                    </p><br>
                    <p>
                        <label>Last Name</label><br>
                        <input
                        <?php
                            if(isset($_SESSION['lastName']) &&  !empty($_SESSION['lastName'])){
                                echo "value=" . $_SESSION['lastName'];
                            }

                        ?> 
                        type="text" name="lastName" class="form-control" placeholder="Last Name" >
                    </p><br>
                    <p>
                        <label>Email</label><br>
                        <input 
                        <?php
                            if(isset($_SESSION['email']) &&  !empty($_SESSION['email'])){
                                echo "value=" . $_SESSION['email'];
                            }

                        ?>
                        type="text" name="email" class="form-control" placeholder="Email" >
                    </p><br>
                    <p>
                        <label>Password</label><br>
                        <input type="password" name="password" class="form-control" placeholder="Password" >
                    </p><br>
                    <p>
                        <label>Gender</label><br>
                        <select class="form-control" name="gender">
                            <option value="">Select one</option>
                            <option
                            <?php
                            if(isset($_SESSION['gender']) &&  !empty($_SESSION['gender'] == 'Male')){
                                echo "selected";
                            }
                            ?>
                            >Male</option>
                            <option
                            <?php
                            if(isset($_SESSION['gender']) &&  !empty($_SESSION['gender'] == 'Female')){
                                echo "selected";
                            }
                            ?>
                            >female</option>
                        </select>
                    </p>
                    <p>
                        <label>Designation</label><br>
                        <select class="form-control" name="designation" >
                            <option value="">Select one</option>
                            <option
                            <?php
                            if(isset($_SESSION['designation']) &&  !empty($_SESSION['designation'] == 'Medical Team(MT)')){
                                echo "selected";
                            }
                            ?>
                            >Medical Team(MT)</option>
                            <option
                            <?php
                            if(isset($_SESSION['designation']) &&  !empty($_SESSION['designation'] == 'Patient')){
                                echo "selected";
                            }
                            ?>
                            >Patient</option>
                        </select>
                    </p>
                    <p>
                        <label>Department</label><br>
                    <input type="text" name="department" class="form-control" placeholder="department" >
                    </p><br>
                
                    <button type="submit" class="btn-block btn-lg btn-primary" name="submit">Register</button>
                    <p>
                        <a href="forgot.php">Forgot Password</a><br>
                        <a href="login.php">Already have an account? Login</a>
                    </p>

                </form>
            </div>
        </div>

</div>



<?php include_once "lib/footer.php"; ?>