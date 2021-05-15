<?php

function redirect($location){


    header("Location:" . $location);
    exit;

}

function query($query){
  global $connection;
  return mysqli_query($connection,$query);
}


function ifItIsMethod($method=null){

    if($_SERVER['REQUEST_METHOD'] == strtoupper($method)){

        return true;

    }

    return false;

}
function escape($string){

global $connection;
return mysqli_real_escape_string($connection,trim($sting));

}
// Confirm query add post
function confirmQuery($result){
  global $connection;
  if (!$result){
    die("Query Failed .". mysqli_error($connection));
  }
}
       // Check login with only one username
                function username_exist($username){
                   global $connection;
                   $u_query= "SELECT username FROM users WHERE username= '$username'";
                   $result2=mysqli_query($connection,$u_query);
                  confirmQuery($result2);
                  if (mysqli_num_rows($result2)>0){
                    return true;
                  }
                  else{
                     return false;
                  } 

                }
                function email_exist($email){
                  global $connection;
                  $query1= "SELECT user_email FROM users WHERE user_email= '$email'";
                  $result3=mysqli_query($connection,$query1);
                  confirmQuery($result3);
                  if (mysqli_num_rows($result3)>0){
                    return true;
                  }
                  else{
                     return false;
                  }
                  
                }
function register_user($username, $email, $password){

    global $connection;

        $username = mysqli_real_escape_string($connection, $username);
        $email    = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);

        $password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 12));
            
            
        $query = "INSERT INTO users (username, user_email, user_password) ";
        $query .= "VALUES('{$username}','{$email}', '{$password}' )";
        $register_user_query = mysqli_query($connection, $query);
        confirmQuery($register_user_query);

}

 function login_user($username, $password,$model,$id,$type)
 {

     global $connection;

     $username = trim($username);
     $password = trim($password);

     $username = mysqli_real_escape_string($connection, $username);
     $password = mysqli_real_escape_string($connection, $password);


     $query = "SELECT * FROM users WHERE username = '{$username}' ";
     $select_user_query = mysqli_query($connection, $query);
     if (!$select_user_query) {

         die("QUERY FAILED" . mysqli_error($connection));

     }


     while ($row = mysqli_fetch_array($select_user_query)) {
         $db_user_id = $row['user_id'];
         $db_username = $row['username'];
         $db_user_password = $row['user_password'];
        
         if (password_verify($password,$db_user_password)) {

             $_SESSION['username'] = $db_username;
             $_SESSION['user_id'] =$db_user_id;
             
             if(!$model){
                redirect("index");
             }
             else{
                  $model=false;
                  switch ($type) {
                           case 'pant':redirect("product.php?p_id=$id");
                                break;
                           case 'skirt':redirect("product.php?skirt=$id");
                           break;
                           case 'bags':redirect("product.php?bags=$id");
                           break;
                           case 'shirt':redirect("product.php?shirt=$id");
                           break;
                           case 'jacket':redirect("product.php?jacket=$id");
                           break;
                           case 'glass':redirect("product.php?glass=$id");
                           break;
                           case 'hat':redirect("product.php?hat=$id");
                           break;
                          default:
                               
                       }
                                    
             }

         } else {

             return false;

         }

     }

     return true;

 }

                    /*-- UPDATE Total Reviews --*/ 
function update_totReviews($model,$id,$the_id,$rev_rate){
  global $connection;
                   switch ($rev_rate) {  

                             case 1:  
                               $query="UPDATE $model  SET  tot1= tot1 + 1 " ;
                               $query.="WHERE  $id={$the_id} ";
                               $tot1_value=mysqli_query($connection,$query);
                               
                               break;    
                             case 2:
                                $query="UPDATE $model  SET  tot2= tot2 + 2 " ;
                               $query.="WHERE  $id={$the_id} ";
                               $tot2_value=mysqli_query($connection,$query);
                               
                               break;
                               case 3:  
                               $query="UPDATE $model  SET  tot3= tot3 + 3 " ;
                               $query.="WHERE  $id={$the_id} ";
                               $tot3_value=mysqli_query($connection,$query);
                               break;    
                             case 4:
                                $query="UPDATE $model  SET  tot4= tot4 + 4 " ;
                               $query.="WHERE  $id={$the_id} ";
                               $tot4_value=mysqli_query($connection,$query);
                               break;
                             case 5:
                               $query="UPDATE $model  SET  tot5= tot5 + 5 " ;
                               $query.="WHERE  $id={$the_id} ";
                               $tot5_value=mysqli_query($connection,$query);
                               break;
                               default:
                               break;
                                     }
                    }
// Payment Stripe 
function pay_stripe($tot){
  global $connection;

  //check whether stripe token is not empty
if(!empty($_POST['stripeToken'])){
    //get token, card and user info from the form
    $token  = $_POST['stripeToken'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $card_num = $_POST['card_num'];
    $card_cvc = $_POST['cvc'];
    $card_exp_month = $_POST['exp_month'];
    $card_exp_year = $_POST['exp_year'];
  if (username_exist($name)&& email_exist($email)){
    //include Stripe PHP library
    require_once('stripe-php/init.php');
    
    //set api key
    $stripe = array(
      "secret_key"      => "sk_test_XVaJTZebgNuX55jZ1va915yP",
      "publishable_key" => "pk_test_gLQFHMecm1CuChbOHKkyNax7"
    );
    
    \Stripe\Stripe::setApiKey($stripe['secret_key']);
    
      


    //add customer to stripe
    $customer = \Stripe\Customer::create(array(
        'email' => $email,
        'source'  => $token

    ));
 
    //item information
    $itemName = "Order Fashion & Style";
    $itemPrice = $tot;
    $currency = "GBP";
    
     
     


    
    //charge a credit or a debit card
    $charge = \Stripe\Charge::create(array(
        'customer' => $customer->id,
        'amount'   => ($itemPrice*100),
        'currency' => $currency,
        'description' => $itemName,
        

           

    ));
    
    //retrieve charge details
    $chargeJson = $charge->jsonSerialize();
    
    //check whether the charge is successful
    if($chargeJson['amount_refunded'] == 0 && empty($chargeJson
['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){
        //order details 
        $amount = $chargeJson['amount'];
        $amount = ($amount/100);
        $balance_transaction = $chargeJson['balance_transaction'];
        $currency = $chargeJson['currency'];
        $refund = $chargeJson['id'];
        $status = $chargeJson['status'];

   //insert tansaction data into the database
        $sql = 
"INSERT INTO payment(name,email,card_num,card_cvc,card_exp_month,card_exp_year,
item_name,item_price,item_price_currency,paid_amount,
paid_amount_currency,txn_id,payment_status,created,modified) VALUES
('".$name."','".$email."','".$card_num."','".$card_cvc."','".$card_exp_month."',
'".$card_exp_year."','".$itemName."','".$itemPrice."','".$currency."',
'".$amount."','".$currency."','".$balance_transaction."'
,'".$status."',now(),now()  )";
        
        $insert = $connection->query($sql);
        $last_insert_id = $connection->insert_id;
              
        //if order inserted successfully
        if($status == 'succeeded'){
            $user=$_SESSION['user_id'];
            $query2="DELETE  FROM orders WHERE order_userid=$user ";
                               $delete_all_query=mysqli_query($connection,$query2);
                               confirmQuery($delete_all_query);                             
                               $query3="UPDATE users SET user_total= 0 " ;
                               $query3.="WHERE user_id=$user ";
                               $total1_count=mysqli_query($connection,$query3);
                               $query1="INSERT INTO lastorder (name,last_id,refund,txn_id,date,price) ";
                               $query1.="VALUES ('{$itemName}',{$user},'{$refund}','{$balance_transaction}',now(),{$itemPrice})";   
                               $create_last_order_query=mysqli_query($connection,$query1);
                               confirmQuery($create_last_order_query);                           
                               header("Location: payment.php");                                           
        }else{
            $statusMsg = "Transaction has been failed";
        }
    }else{
        $statusMsg = "Transaction has been failed";
    }
}else{
    $statusMsg = "<h2 style='color:blue;text-align:center;'>Insert Payment Details</h2>";
}

//show success or error message
echo $statusMsg;


}


    }

                               