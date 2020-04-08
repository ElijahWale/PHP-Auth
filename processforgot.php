<?php
session_start();

$errorCount = 0;
// verifying the data validation

$email = $_POST['email']!= "" ? $_POST['email'] :$errorCount++;

$_SESSION['email'] =$email;

    
if($errorCount > 0){
    
    $session_error="You have ". $errorCount . " error";
    
    if($errorCount > 1){
        $session_error .= "s";
    }
    $session_error .=  " in your form submission";
    $_SESSION["error"] = $session_error ;
    header("location:forgot.php");

// scan DATABASE
}else{
    $allUsers = scandir("db/users");
    $countAllUsers = count($allUsers);

    
    for($i=0; $i < $countAllUsers;  $i++ ){
        $currentUser = $allUsers[$i];
        
        if($currentUser == $email . ".json"){
            // send the email and redirect to the reset password page

            /**
             * GERATE TOKEN CODE STARTS
             */
            $token ="";
            $alphabets =['a','b','c','d','e','f','g','A','B','C','D','E','F','G'];

            for($i=0;$i < 26;$i++){
                $index =rand(0,count($alphabets)-1);
                $token.= $alphabets[$index];
            }

            /**
             * TOKEN GENERATION ENDS
             */
            $subject ="Password Reset link";
            $message ="A password reset has been iniated from your account,if you did not initiate this reset,please 
            ignore this message, otherwise visit:localhost/php/cvh/reset.php?token=" . $token;
            $headers = "From:no-reply@snh.org" ."\r\n".
            "CC:wale@snh.org";
            // check if token was saved before sending it 
            file_put_contents("db/tokens/". $email . ".json", json_encode(['token'=>$token]));

           $try = mail($email,$subject,$message,$headers);

          

            if($try){
                // display a success message
                $_SESSION["error"] = "password reset has been sent to your email: " . $email;
                header("location:login.php");


            }else{
                // display a error message
                $_SESSION["error"] = "Somethin went wrong, we could not send password reset to: " . $email;
                header("location:forgot.php");


            }
            die();
        
        }

    }
$_SESSION["error"] = "Email not registered with us ERR: " . $email;
header("location:forgot.php");

}

?>