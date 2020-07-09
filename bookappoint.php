<?php include_once "lib/header.php";
require_once('functions/alert.php');

if(!isset($_SESSION['loggedIn']) && empty($_SESSION['loggedIn'])){
    header("location:login.php");
}
?>
 <a href="patient.php" class="btn btn-outline-primary mt-3 ml-2">Go Back</a>
<div class="container-card">                        
                       

         <!-- form for book appointment -->
        <div class="card border-light mt-3 mb-3 " style="width:600px">

        <!-- printing error and success message -->
                        <?php
                        print_error(); print_message();

                        ?>

                    
            <div class="card-header text-center">
                <h2>Book Appointment Form</h2>
                <p>All fields are required</p>
            </div>
            <div class="card-body">
                <form action="process_bookappoint.php" method="POST">
                    
                    <p>
                        <label>Date of Appointment</label><br>

                        <input type="date" name="dateAppointment" class="form-control" placeholder="Date of appointment">
                    </p><br>
                    <p>
                        <label>Time of Appointment</label><br>

                        <input type="time" name="timeAppointment" class="form-control" placeholder="Time of appointment">
                    </p><br>
                    <p>
                        <label>Department to book appointment for:</label><br>
                        <input type="text" name="department" class="form-control" placeholder="department" >
                    </p><br>
                    <p>
                        <label>Nature of Complaint</label><br>
                        
                        <textarea name="natureComplaint" class="form-control" rows="3"></textarea>
                    </p><br>
                    <p>
                        <label>Initial Complaint</label><br>
                        
                        <textarea name="initialComplaint" class="form-control" rows="3"></textarea>
                    </p><br>
                   
                    
                
                    <button type="submit" class="btn-block btn-lg btn-primary" name="submit">Book Appointment</button>

                </form>
            </div>
        </div>

</div>


<?php include_once "lib/footer.php"; ?>