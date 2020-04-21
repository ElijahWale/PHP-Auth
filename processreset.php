<?php
session_start();

$errorCount = 0;
// verifying the data validation

if(!$_SESSION['loggedIn']){
    $token = $_POST['token']!= "" ? $_POST['token'] :$errorCount++;
    $_SESSION['token'] = $token;
}

$email = $_POST['email']!= "" ? $_POST['email'] :$errorCount++;
$password = $_POST['password']!= "" ? $_POST['password'] :$errorCount++;


$_SESSION['email'] =$email;

if($errorCount > 0){
    
    $session_error="You have ". $errorCount . " error";
    
    if($errorCount > 1){
        $session_error .= "s";
    }
    $session_error .=  " in your form submission";
    $_SESSION["error"] = $session_error ;
    header("location:reset.php");

// scan DATABASE
}else{
    //  check that the email is registered in tokens folder
    //  check if the content of the registered token(in our folder) is the same as $token

    $allUserTokens =scandir("db/tokens/");

    $countAllUserTokens = count($allUserTokens);



    for($i=0; $i < $countAllUserTokens;  $i++ ){

        $currentTokenFile= $allUserTokens[$i];
        
        
        if($currentTokenFile == $email . ".json"){

            $tokenContent = file_get_contents("db/tokens/".$currentTokenFile);
            $tokenObject = json_decode($tokenContent);
            $tokenFromDB = $tokenObject->token;

            if($_SESSION['loggedIn']){
                $checkToken = true;
            }else{
                $checkToken = $tokenFromDB == $token;
            }

            if($checkToken){
                
                $allUsers = scandir("db/users");
                $countAllUsers = count($allUsers);
            
                
                for($i=0; $i < $countAllUsers;  $i++ ){

                    $currentUser = $allUsers[$i];
                    
                    if($currentUser == $email . ".json"){
                        // check user password
                        $userString = file_get_contents("db/users/".$currentUser);

                        $userObject = json_decode($userString);

                        $userObject->password = password_hash($password, PASSWORD_DEFAULT);

                        unlink("db/users/" . $currentUser);//file delete,user data delete
                        
                        file_put_contents("db/users/". $email . ".json", json_encode($userObject));

                      

                        /**
                         * INFORM USER OF PASSWORD RESET
                         */
                        $subject ="Password Reset Successful";
                        $message ="Your account on cvh has just been updated, your password has changed. if you did not initiate the password change, please visit snh.org and reset your password immediately";
                        $headers = "From:no-reply@snh.org" ."\r\n".
                        "CC:wale@snh.org";
            
                        $try = mail($email,$subject,$message,$headers);
                        
                          if($try){
                            $_SESSION['message'] = "Password Reset Successfully, you can now login";
                          }else{   
                            header("location:login.php");
                            die();
                          }

                         /**
                          * Inform user of password reset ends
                          */
                          
                        
                    }  
            
                }

            }
        }
    }

    $_SESSION["error"] ="Password Reset failed,token/email invalide or expired";
    
    header("location:login.php");

}




?>