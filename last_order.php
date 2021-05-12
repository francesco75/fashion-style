<?php include 'includes/header_index.php'?>
<body>
<?php include 'includes/jumbotron.php'?>  
           
            <!-- Navigation -->
    <?php include 'includes/navigation.php'?>
    
 <div class="container">
          <div class="row">
              <div class="col-sm-12">
                      <h2 class="parTitle">Last Orders</h2>
               </div>       
          </div>
          <?php
              $username=$_SESSION['username'];
              $query="SELECT *  FROM payment WHERE name='{$username}' ORDER BY created DESC ";
                          $all_payment=mysqli_query($connection,$query);                   
                          confirmQuery($all_payment);
          ?>
          <div class="row">
          	<div class="col-sm-6">
              <?php
                          $user=$_SESSION['user_id'];
                          $query="SELECT *  FROM lastorder WHERE last_id=$user ";
                          $last_order=mysqli_query($connection,$query);
                          $num_order=mysqli_num_rows($last_order);                     
                          confirmQuery($last_order);
                          if (!$num_order==0){
                              if ( isset($_GET['success']) && $_GET['success'] == 1 )
                                       {
                                            // treat the succes case ex:
                                                echo "<h2>Order Refund</h2><br>";
                                        }
                  ?>
                    <div class="table-responsive">  
                      <table class="table">
                        <thead>
          			    <tr>
          				<th>Name</th>
          				<th>Price</th>	
                  <th>Date</th>
          				</tr>
                  </thead>
          		    <tbody>
                    <?php        
                          while($row = mysqli_fetch_assoc($last_order)) {
                                $id             =$row['id'];             
                                $name          = $row['name'];
                                $refund        = $row['refund'];
                                $txn_id        = $row['txn_id'];
                                $date          = $row['date'];
                                $price         = $row['price'];  
                                ?>
          				<tr>
          				<td><?php echo "$name";?></td>
          				<td><?php echo "$price";?></td>
          				<td><?php echo "$date";?></td>
                  <td><a  class="btn btn-danger"  onClick=" return confirm('Are you sure you want to REFUND');" href="last_order.php?refund=<?php echo $refund;?>&thn=<?php echo $txn_id;?>">Refund</a></td>
          				</tr>                 
          			<?php } ?>
                <tfoot>  
              </tfoot>
              </tbody>
                </table>
                <?php
                             /*-- Refund One Order selected with the button --*/
                             
                       if (isset($_GET['refund']) && isset($_GET['thn'])){
                               $refund=$_GET['refund'];
                               $thn=$_GET['thn'];
                               // Refund Order
                               $ref=$refund; 
                               //include Stripe PHP library
                               require_once('stripe-php/init.php');
                               $stripe = new \Stripe\StripeClient('sk_test_XVaJTZebgNuX55jZ1va915yP');
                               $stripe->refunds->create([
                               'charge' => $ref,
                                ]);
                                   // Set total refund for each user          
                                $query="UPDATE users SET refund_count= refund_count + 1 WHERE user_id=$user " ;
                                $ref_count=mysqli_query($connection,$query);

                                  // Set Refund Payments
                                $query="UPDATE payment SET payment_status= 'Refund'  WHERE txn_id='{$thn}' " ;
                                $set_status=mysqli_query($connection,$query);

                                header("Location: last_order.php?success=1");
                                
                                // Delete the order in the table last order
                                $query1="DELETE FROM lastorder WHERE refund='{$refund}' ";
                                $refund_product=mysqli_query($connection,$query1);
                                confirmQuery($refund_product);
                                 }
                    ?>
              </div>
            <?php
                     }
                 else{
                          echo "<h2>The Last Order is Empty</h2>";
                          $num_order=0;
                 }
                 $query="SELECT *  FROM users WHERE user_id=$user ";
                                $refund1=mysqli_query($connection,$query);
                                 while($row=mysqli_fetch_assoc($refund1)){ 
                                   $tot_refund=$row['refund_count'];
                              }

            ?>               		
          	</div>
          	<div class="col-sm-6">
      <script type="text/javascript">
           google.charts.load("current", {packages:["corechart"]});
           google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Orders', 'Refunds'],
          ['Orders',  <?php echo $num_order;?>],
          ['Refunds',  <?php echo $tot_refund;?>],
        ]);

        var options = {
          title: 'My Orders And Refunds',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
      $(window).resize(function(){
              drawChart();
        });
    </script>
             <!-- <div id="donutchart" style="width: 500px; height: 500px;"></div> -->
                    <div id="donutchart" style="width: 100%; min-height: 450px;"></div>
                 </div> 
            </div>

            <div class="row">
              <div class="col-sm-12">
                <?php if($num_order>0 || $tot_refund>0):?>
                <h2>All Payments</h2><br>
                <div class="table-responsive">  
                      <table class="table">
                        <thead>
                    <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Price</th>
                  <th>Status</th>  
                  <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php        
                          while($row = mysqli_fetch_assoc($all_payment)) {           
                                $first_name    = $row['name'];
                                $pay_email     = $row['email'];
                                $payprice      = $row['item_price'];
                                $Status        = $row['payment_status'];
                                $date          = $row['created']; 

                                ?>
                  <tr>
                  <td><?php echo $first_name;?></td>
                  <td><?php echo $pay_email;?></td>
                  <td><?php echo $payprice." GBP";?></td>
                  <td><?php echo $Status;?></td>
                  <td><?php echo $date;?></td>
                  
                  </tr>
                  
                <?php } ?>
                <tfoot>  
              </tfoot>
              </tbody>
                </table>
              </div>
                          <?php else:?>
                          <h2>No Payment</h2>
            <?php endif;?>
            </div>
          </div>
</div>
<br>    
<?php include 'includes/footer_index.php'?>