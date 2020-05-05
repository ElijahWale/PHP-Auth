<?php
session_start();

// Handling payment response / verifying transaction.
    if (isset($_GET['txref'])) {
        $ref = $_GET['txref'];
        $amount = $_SESSION['amount']; //Correct Amount from Server$_SESSION['amount']
        $currency = "NGN"; //Correct Currency from Server

        $query = array(
            "SECKEY" => "FLWSECK_TEST-fee06e81124c5cdb93b2e9fd875bdfea-X",
            "txref" => $ref
        );

        $data_string = json_encode($query);
                
        $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify');                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                              
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $response = curl_exec($ch);

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        curl_close($ch);

        $resp = json_decode($response, true);

        $paymentStatus = $resp['data']['status'];
        $chargeResponsecode = $resp['data']['chargecode'];
        $chargeAmount = $resp['data']['amount'];
        $chargeCurrency = $resp['data']['currency'];

        if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {
        // transaction was successful...
            // please check other things like whether you already gave value for this ref
        // if the email matches the customer who owns the product etc
            //Give Value and return to Success page

            $allTransactions = scandir("db/transactions/");
            $countAllTransactions = count($allTransactions);
            $newUserId = ($countAllTransactions-1);

            $userObject =[
                'id'=> $newUserId,
                'email'=>$_SESSION['emailPayment'],
                'Amount'=> $_SESSION['amount'],
                'action'=>"Paid",
                'fullName'=>$_SESSION['fullName']  
            ];

           $successTransaction = file_put_contents("db/transactions/". $newUserId . ".json", json_encode($userObject));
           
           if($successTransaction){
                $_SESSION['success'] = "payment receipt has been sent to your email" ;
                header("location:patient.php");
           }
               


            
            
        } else {
            //Dont Give Value and return to Failure page

            
            file_put_contents("db/users/". $email . ".json", json_encode($userObject));
            $_SESSION['errormsg'] = "Payment was not successful,try again later";
            header("location:paybill.php");
        }
    }
        else {
    die('No reference supplied');
    }

?>