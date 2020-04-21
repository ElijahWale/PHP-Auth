<?php


// Display error message 
function print_error(){

    if(isset($_SESSION['error']) &&  !empty($_SESSION['error'])){
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' text-center >" . $_SESSION["error"] . "<button type = 'button' class='close' data-dismiss='alert' arial-label='Close'>" . "<span aria-hidden='true'>" . '&times;'. "</span>" ."</div>";
        session_destroy();
    }
    

}

// Display Success message
function print_message(){

    if(isset($_SESSION['message']) &&  !empty($_SESSION['message'])){
        echo "<div class='alert alert-success alert-dismissible fade show text-center' role='alert' >" . $_SESSION['message'] . "<button type = 'button' class='close' data-dismiss='alert' arial-label='Close'>" . "<span aria-hidden='true'>" . '&times;'. "</span>" ."</div>";
        session_destroy();
    }
}
function set_alert($type="message",$content =""){
    switch($type){
        case "message":
            $_SESSION['message'] = $content;
        break;
        case "error":
            $_SESSION['error'] = $content;

        break;
        case "info":
            $_SESSION['info'] = $content;
        break;
        default:
            $_SESSION['message'] = $content;
        break;

    }

}

// function get_alert(){

//     // for printing message and error

//     $types = ['message','info','error'];
//     $colors = ['alert-success','alert-primary', 'alert-danger'];
//     for($i = 0; $i < count($types); $i++){

//         if(isset($_SESSION[$type[$i]]) && !empty($_SESSION['error'])){
//             echo "<div class='alert . $colors[$i] . alert-dismissible fade show' role='alert' text-center >" . $_SESSION[$types[$i]] . "<button type = 'button' class='close' data-dismiss='alert' arial-label='Close'>" . "<span aria-hidden='true'>" . '&times;'. "</span>" ."</div>";
//             session_destroy();
//         }
//     }
// }















?>