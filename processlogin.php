<?php
session_start();

$errorCount = 0;
// verifying the data validation

$email = $_POST['email']!= "" ? $_POST['email'] :$errorCount++;
$password = $_POST['password']!= "" ? $_POST['password'] :$errorCount++;
$date = date("Y-m-d");
$time = date("h:i:sa");

$_SESSION['email'] =$email;
$_SESSION['date'] = $date;
$_SESSION['time'] = $time;
if($errorCount > 0){
    
    $session_error="You have ". $errorCount . " error";
    
    if($errorCount > 1){
        $session_error .= "s";
    }
    $session_error .=  " in your form submission";
    $_SESSION["error"] = $session_error ;
    header("location:login.php");

// scan DATABASE
}else{
    $allUsers = scandir("db/users");
    $countAllUsers = count($allUsers);

    
    for($i=0; $i < $countAllUsers;  $i++ ){
        $currentUser = $allUsers[$i];
        
        if($currentUser == $email . ".json"){
            $userString = file_get_contents("db/users/".$currentUser);
            $userObject = json_decode($userString);
            $passwordFromDB = $userObject->password;

            $passwordFromUser = password_verify($password, $passwordFromDB);

            if($passwordFromUser == $passwordFromDB){

                $_SESSION['loggedIn'] = $userObject->id;
                $_SESSION['fullName'] = $userObject->firstName . " ". $userObject->lastName;
                $_SESSION['role'] = $userObject->designation;
                $_SESSION['department'] = $userObject->department;
                $_SESSION['registration'] =$userObject->registration;

                if($_SESSION['role'] == 'Patient'){
                    
                    header("location:patient.php");
                }
                if($_SESSION['role']  == 'Medical Team(MT)'){
                    header("location:mt.php");
                }
                if($_SESSION['role'] =='Super Admin'){
                    header("location:admin/admindashboard.php");
                }
                die();
            }
        }
    }
    $_SESSION["error"] = "invalid Email or Password";
    header("location:login.php");
    die();
}

?>