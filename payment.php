<?php include 'includes/header_index.php'?>

<body>
<?php include 'includes/jumbotron.php'?>  
           
            <!-- Navigation -->

    <?php include 'includes/navigation.php'?>
<?php    if(isset($_GET['tot'])){
                $user_id=$_SESSION['user_id']; 
                $query1="SELECT *  FROM users WHERE user_id={$user_id} ";
                $user_product=mysqli_query($connection,$query1);
                confirmQuery($user_product);
                while($row = mysqli_fetch_assoc($user_product)) {
                                $tot            = $row['user_total'];
                                
                        }                   
                pay_stripe($tot);
                

                }
                else{
         $tot=0; 
         $statusMsg = "<h2 style='color:blue;text-align:center;'>The Transaction was successful.</h2>"; 
         echo $statusMsg;
    } 

?>
<div class="container">
     <div class="row">
     	<div class="col-sm-4"></div>
     	<div class="col-sm-4">
     		<div class="well">
     		<h1 class="class1">Charge £ <?php echo $tot;?> </h1>
<!-- display errors returned by createToken -->
<span class="payment-errors"></span>
<!-- stripe payment form -->
<form action="" method="POST" id="paymentFrm">    
    	<div class="form-group">
        <label>Name</label>
        <input type="text" name="name" placeholder="Insert Username" size="20" />
        </div>
        <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" placeholder="Insert Email" size="20" />
        </div>
        <div class="form-group">
        <label>Card Number</label>
        <input type="text" name="card_num" placeholder="Insert card" size="20" autocomplete="off" class="card-number" />
        </div>
        <div class="form-group">
        <label>CVC</label>
        <input type="text" name="cvc" size="4" placeholder="CVC " autocomplete="off" class="card-cvc" />
        </div>
         <div class="form-group">    
        <label>Expiration (MM/YYYY)</label>
        <input type="text" name="exp_month" placeholder="MM" size="2" class="card-expiry-month"/>
        <span> / </span>
        <input type="text" name="exp_year" placeholder="Year" size="4" class="card-expiry-year"/>
         </div>
    <input  type="submit" id="p
    ayBtn" value="Submit Payment">
</form>
         </div>
     	</div>
     	<div class="col-sm-4"></div>
     </div>
</div> 

<script src="./js/payStripe.js"></script>
<?php include 'includes/footer_index.php'?>