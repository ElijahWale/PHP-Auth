<?php
 session_start();


 function sanitize($data) {
    $text = trim($data);
    $text = stripslashes($text);
    $text = htmlspecialchars($text);

    return $text;
}




 // verifying the data validation
 $firstName = $_POST['firstName'];
 $lastName = $_POST['lastName'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $gender = $_POST['gender'];
 $designation = $_POST['designation'];
 $department= $_POST['department'];
 //  User date of registration
 $registration= date("Y-m-d");
 
// VAlidation for firstName
if(empty($firstName)){
    $errors = "<br>your username is empty";
} elseif (strlen($firstName) < 2) {
        $errors .= "First Name cannot be less than 2";
    

} elseif(!preg_match("/^[a-zA-Z]+$/", $firstName)){
    $errors .= "Name should not be Numbers";
}else{
    $firstName = sanitize($firstName);
}

  
// VAlidation for lastName  
if(empty($lastName)){
    $errors .= "<br>your lastName is empty";
   
}elseif (strlen($lastName) < 2) {
        $errors .= "last Name cannot be less than 2";
    

} elseif(!preg_match("/^[a-zA-Z]+$/", $lastName)){
    $errors .= "Name should not be Numbers";
}else{
    $lastName = sanitize($lastName);
}

// VAlidation for email
if(empty($email)){
    $errors .= "<br>your email is empty";
    
}elseif(strlen($email) < 5){
    $errors .= "<br>Email must not be less than 5";
} else{
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors .= "Enter a valid email address";   
    }
}


// VAlidation for password
if(empty($password)){
    $errors .= "<br>your password is empty";
    
}

// VAlidation for firstName
if(empty($gender)){
    $errors .= "<br>your gender is empty";
    
}

// VAlidation for designation
if(empty($designation)){
    $errors .= "<br>your designation is empty";
    
}

// VAlidation for department
if(empty($department)){
    $errors .= "<br>your department is empty";
    
}




 
 
 $_SESSION['firstName'] =$firstName;
 $_SESSION['lastName'] =$lastName;
 $_SESSION['email'] =$email;
 $_SESSION['password'] =$password;
 $_SESSION['gender'] =$gender;
 $_SESSION['designation'] =$designation;
 $_SESSION['department'] =$department;




 


if($errors){
    $session_error = '<div class="alert alert-danger">' . $errors .'</div>';

    $_SESSION["error"] = $session_error ;
    header("location:register.php");
    exit;
}else{
    // count all users

    $allUsers = scandir("db/users");
        $countAllUsers = count($allUsers); 

        $newUserId = ($countAllUsers-1);


    $userObject =[
        'id'=> $newUserId,
        'firstName'=> $firstName,
        'lastName'=> $lastName,
        'email'=> $email,
        'password'=> password_hash($password,PASSWORD_DEFAULT),
        'gender'=> $gender,
        'designation'=> $designation,
        'department'=> $department,
        'registration' => $registration

    ];

    // check if user exists
    for($i=0;$i < $countAllUsers;$i++){
        $currentUser = $allUsers[$i];

        if($currentUser == $email . ".json"){
            $session_user = '<div class="alert alert-danger">' ." Registration Failed, user already exists" .'</div>';

            $_SESSION["error"] = $session_user;
            header("location:register.php");
            die();
        }
    }

    
    
    // store in the database

    
    file_put_contents("db/users/". $email . ".json", json_encode($userObject));
    if($_SESSION['role'] =='Super Admin'){

        $_SESSION["message"] ="Your Registration is succesful for  " . $firstName;
        header("location:admin/admindashboard.php");
   ;
    }else{

    $_SESSION["message"] ="Registration succesful you can now login in Here " . $firstName;
    
    header("location:login.php");
    }
    
}




?>