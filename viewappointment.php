<?php include_once "lib/header.php";
require_once "functions/user.php"; ?>

<?php
    if(!isset($_SESSION['loggedIn'])){
        header("location:login.php");
    }

?>
 <a href="mt.php" class="btn btn-outline-primary mt-3 ml-2">Go Back</a>
<div class="container">
    <table class="table mt-3">
        <thead class="thead-light">
            <tr>
        
                <th scope="col">Patient Name</th>
                <th scope="col">initial Appointment</th>
                <th scope="col">Nature of Appointment</th>
                <th scope="col">Department</th>
                <th scope="col">Date of Appointment</th>
                <th scope="col">Time of Appointment</th>
                
                
            </tr>
        </thead>

            <?php

        
            
           
                // get appointments from DB
                $allAppointments= scandir("db/appointments");
                $countAllAppointment = count($allAppointments); 
                
            for($i=2; $i<$countAllAppointment; $i++){
                $currentUser = $allAppointments[$i];
                $appointmentString = file_get_contents("db/appointments/".$currentUser);
                $appointmentObject = json_decode($appointmentString);
                $initialComplaintDB = $appointmentObject->initialComplaint;
                $natureComplaintDB = $appointmentObject-> natureComplaint;
                $departmentDB = $appointmentObject->department;
                $dateAppointDB = $appointmentObject->dateAppointment;
                $timeAppointDB = $appointmentObject->timeAppointment;
                

                $userString = file_get_contents("db/users/".$currentUser);
                $userObject = json_decode($userString);
                $patientName = $userObject->firstName . " ". $userObject->lastName;

               
                                 

                
                
                    // check if user dept is equals to department booked with
                
                
                if($departmentDB == $_SESSION['department']){
    ?> 

                
            <tr>
                <td><?=$patientName;?></td>
                <td><?=$initialComplaintDB;?></td>
                <td><?=$natureComplaintDB;?></td>
                <td><?=$departmentDB;?></td>
                <td><?=$dateAppointDB;?></td>
                <td><?=$timeAppointDB;?></td>
               
                
            </tr>
    

    <?php  
            }
            
        } ?>

        

       
    </table>
</div>












<?php include_once "lib/footer.php"; ?>
