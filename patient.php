
<?php include_once "lib/header.php"; 
require_once('functions/alert.php');

if(!isset($_SESSION['loggedIn']) && empty($_SESSION['loggedIn'])){
    header("location:login.php");
}


?>
<div class="container">
     


   
           
    <div class="card border-light mt-3 mb-3" style="width:900px">
        
    <?php
        print_error();
        print_message();

        ?>

        <!-- display success and error msg for payment -->
        <?php
        print_success(); 
        
        print_errormsg();?>

        

        <div class="card-header text-center"><h3>Patients DASHBOARD</h3>
            <p>Hi, <strong><?= $_SESSION['fullName'];?></strong></p>
        </div>
        <div class="card-body">
    
            <div class="card-text">   
                <p> YOU ARE NOW LOGGED IN AS USER <?php echo $_SESSION['loggedIn'];?></p><br>
                <p>You role is as <?=  $_SESSION['role'];  ?></p><br>
                <p>Date of Registration: <?= $_SESSION['registration']; ?></p><br>
                <p>User Last Login Date : <?= $_SESSION['date']; ?></p><br>
                <p>User Last Login Time: <?= $_SESSION['time'];?> </p><br>
                <p>User Department: <?= $_SESSION['department'];?> </p><br>

                <!-- add links to Book Appointment and Pay bill -->
                <div>
                        <a href="paybill.php" class="btn btn-info">Pay Bill</a>
                        
                        <a href="bookappoint.php" class="btn btn-info">Book appointment</a>
                </div>
                <div class="mt-3">
                    <h3>Transaction History</h3>
                    <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">email</th>
                            <th scope="col">Amount</th> 
                            <th scope="col">Action</th>                       
                        </tr>
                    </thead>

                      <?php  

                    //   get Transactions from db
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

                    // check if email that paid is equals to patient email
                        
                        if (strtolower($email == $_SESSION['email'])){

                        
                        ?>

                        <tr>

                            <th><?= $newUserId;?></th>
                            <th><?= $email;?> </th>
                            <th><?=$amount;?></th>
                            <th><?=$action;?></th>
                        </tr> 
                      <?php }}?>
                    </table>
                </div>
            </div> 
        </div>
    </div>
</div>
<?php include_once "lib/footer.php"; ?>