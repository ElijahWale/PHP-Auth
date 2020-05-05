<?php include_once "lib/header.php";
require_once "functions/user.php"; ?>

<?php
    if(!isset($_SESSION['loggedIn'])){
        header("location:login.php");
    }

?>
 <a href="mt.php" class="btn btn-outline-primary mt-3 ml-2">Go Back</a>

 <div class="container">
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">s/n</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Amount(#)</th>
                <th scope="col">Status</th>
               
                
                

            </tr>
        </thead>
        <?php
            $allTransactions = scandir("db/transactions/");
            $countAllTransactions = count($allTransactions);
            for($i=2; $i< $countAllTransactions; $i++){
                      $currentTransaction = $allTransactions[$i];
                      $TransactionString = file_get_contents("db/transactions/". $currentTransaction);
                      $TransactionObject = json_decode($TransactionString); 
         $newUserId =  $TransactionObject->id;
         $email     =  $TransactionObject-> email;
          $amount          =  $TransactionObject-> Amount;
           $action         =  $TransactionObject-> action;
           $fullName =  $TransactionObject->fullName;
               
               
                   

                ?>
                <tr>
                    <td><?=  $newUserId;?></td>
                    <td><?= $fullName;?></td>
                    <td><?= $email;?></td>
                    <td><?= $amount;?></td>
                    <td><?= $action;?></td>  
                    
                    
                </tr>
        <?php
                
                
            }?>
                  
                
            


    
    </table>

</div>












<?php include_once "lib/footer.php"; ?>
