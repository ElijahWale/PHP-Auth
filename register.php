<?php 
include_once "lib/header.php";
if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    header("location:dashboard.php");
}

?>
<div class="container">
        
        <div class="card border-light mt-3 mb-3">
            <div class="card-header text-center">
                <h2>Register Here</h2>
                <p>All fields are required</p>
            </div>
            <div class="card-body">
                <form action="processregister.php" method="POST">
                    <p>
                        <?php
                        if(isset($_SESSION['error']) &&  !empty($_SESSION['error'])){
                            echo $_SESSION["error"];
                            session_unset();
                        }

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
                        type="text" name="firstName" placeholder="First Name" >
                    </p><br>
                    <p>
                        <label>Last Name</label><br>
                        <input
                        <?php
                            if(isset($_SESSION['lastName']) &&  !empty($_SESSION['lastName'])){
                                echo "value=" . $_SESSION['lastName'];
                            }

                        ?> 
                        type="text" name="lastName" placeholder="Last Name" >
                    </p><br>
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
                    <p>
                        <label>Gender</label><br>
                        <select name="gender">
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
                        <select name="designation" >
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
                    <input type="text" name="department" placeholder="department" >
                    </p><br>
                
                    <button type="submit" name="submit">Register</button>

                </form>
            </div>
        </div>

</div>



<?php include_once "lib/footer.php"; ?>