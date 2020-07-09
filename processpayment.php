<?php
session_start();

// fetching data from form
if(isset($_POST['submit'])){
    $firstname = $_POST['firstName'];
    $lastname= $_POST['lastName'];
    $email = $_POST['email'];
    $amount = $_POST['amount'];

// storing in sessions
$_SESSION['fullName'] = $firstname . " " . $lastname;
$_SESSION['emailPayment']  = $email;
$_SESSION['amount'] = $amount;

    
   


    // processing rave payment

  
    $curl = curl_init();

    $customer_email = $email;
    $amount = $amount;  
    $currency = "NGN";
    /**
             * GENERATE token key CODE STARTS
             */
            $token ="";
            $alphanumeric =['1','2','3','4','5','6','7','8','9','C','D','E','F','G'];

            for($i=0;$i < 10;$i++){
                $index =rand(0,count($alphanumeric)-1);
                $token.= $alphanumeric[$index];
            }

            /**
             * TOKEN GENERATION ENDS
             */
    $txref = "rave-". $token ; // ensure you generate unique references per transaction.
    
    $PBFPubKey = "FLWPUBK_TEST-f1655365a11772b5634ae37a67cfb768-X"; // get your public key from the dashboard.
    $redirect_url = "https://localhost/php/PHP-Auth/success.php";
    


    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode([
        'amount'=>$amount,
        'customer_email'=>$customer_email,
        'currency'=>$currency,
        'txref'=>$txref,
        'PBFPubKey'=>$PBFPubKey,
        'redirect_url'=>$redirect_url
    ]),
    CURLOPT_HTTPHEADER => [
        "content-type: application/json",
        "cache-control: no-cache"
    ],
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    if($err){
    // there was an error contacting the rave API
    die('Curl returned error: ' . $err);
    }

    $transaction = json_decode($response);

    if(!$transaction->data && !$transaction->data->link){
    // there was an error from the API
    print_r('API returned error: ' . $transaction->message);
    }

    // uncomment out this line if you want to redirect the user to the payment page
    //print_r($transaction->data->message);


    // redirect to page so User can pay
    // uncomment this line to allow the user redirect to the payment page

    header('Location: ' . $transaction->data->link);
    
}