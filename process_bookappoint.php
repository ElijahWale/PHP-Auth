<?php
session_start();



// collecting data from the form and  data validation

$dateAppointment = $_POST['dateAppointment']!= "" ? $_POST['dateAppointment'] : $errors = "Your date Appointment field is empty";
$timeAppointment = $_POST['timeAppointment']!= "" ? $_POST['timeAppointment'] : $errors .= "Your Time appointment field is empty";
$department = $_POST['department']!= "" ? $_POST['department'] : $errors .= "Your Department field is empty";
$natureComplaint = $_POST['natureComplaint']!= "" ? $_POST['natureComplaint'] : $errors .= "Your Nature of Complaint field is empty";
$initialComplaint = $_POST['initialComplaint']!= "" ? $_POST['initialComplaint'] : $errors .= "Your intial complaint field is empty";
$email = $_POST['email'];

// store each data in a session

$_SESSION['dateAppointment'] = $dateAppointment;
$_SESSION['timeAppointment'] = $timeAppointment;
$_SESSION['department'] = $department;
$_SESSION['natureComplaint'] = $natureComplaint;
$_SESSION['initialComplaint'] = $initialComplaint;


// display error when user does not complete field

if($errors){
    $session_error =  $errors ;
        $_SESSION["error"] = $session_error ;
        header("location:bookappoint.php");
    exit;
} else{
    // count all appoitnments
    $allAppointments= scandir("db/appointments");
    $countAllAppointment = count($allAppointments); 

    // generate id for each appointments
    $newUserId = ($countAllAppointment -1);

    // store them in userobject
    $userObject =[
        'id'=> $newUserId,
        'dateAppointment'=> $dateAppointment,
        'timeAppointment'=> $timeAppointment,
        'department'=> $department,   
        'initialComplaint'=> $initialComplaint,
        'natureComplaint'=> $natureComplaint
    ];

     
    // store in the database

    
    file_put_contents("db/appointments/" . $email . ".json", json_encode($userObject));
   
    $_SESSION["message"] = "Appointment booked with the Medical Team ";
    header("location:bookappoint.php");
    

}






?>