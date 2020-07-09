<?php 

include_once "lib/header.php"; 
include_once "functions/alert.php";

if(!isset($_SESSION['loggedIn'])){
    header("location:login.php");
}?>
<div class="container">
    <?php
    print_success(); 
    
    print_errormsg();?>

    <div class="card border-light mt-3 mb-3" style="width:900px">
    
        <div class="card-header text-center"><h3> DASHBOARD</h3>
            
        </div>
        <div class="card-body">

        <!-- form to collect info for payment -->
    
        <form action="processpayment.php" method="POST">
                  

                    <p>
                        <label>First Name</label><br>
                        <input 
                        type="text" name="firstName" class="form-control" placeholder="First Name"  required >
                    </p><br>
                    <p>
                        <label>Last Name</label><br>
                        <input
                        type="text" name="lastName" class="form-control" placeholder="Last Name"  required >
                    </p><br>
                    <p>
                        <label>Email</label><br>
                        <input 
                        type="text" name="email" class="form-control" placeholder="Email" required>
                    </p><br>
                    <p>
                        <label>Amount(amount you want to pay)</label><br>
                        <input 
                        type="text" name="amount" class="form-control" placeholder="5000 for five thousand"  required >
                    </p><br>

                    <button type="submit" class="btn-block btn-lg btn-primary" name="submit">Submit Payment</button>

                </form>   
                
            </div> 
        </div>
    </div>
</div>



<?php include_once "lib/footer.php"; ?>