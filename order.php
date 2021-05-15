<?php include 'includes/header_index.php'?>
<body>
<?php include 'includes/jumbotron.php'?>  
           
            <!-- Navigation -->
    <?php include 'includes/navigation.php'?>
 <div class="container">
          <div class="row">
              <div class="col-sm-12">
                      <h2 class="parTitle">Orders</h2>
               </div>       
          </div>
          
          <div class="row">
          	<div class="col-sm-8">
              <?php
                if(isset($_GET['p_id'])){     
                          $the_id= $_GET['p_id']; 
                          $query="SELECT *  FROM orders WHERE order_id={$the_id} ";
                          $new_product=mysqli_query($connection,$query);
                          confirmQuery($new_product);
                          $num_order=mysqli_num_rows($new_product);
                          
                          while($row = mysqli_fetch_assoc($new_product)) {
                                $id            = $row['order_id'];                           
                                $order_name     = $row['order_name'];
                                $color         = $row['order_color'];
                                $size          = $row['order_size'];
                                $price         = $row['order_price'];                       
                           $user= $_SESSION['user_id'];
                           $query1="INSERT INTO orders (order_name,order_userid,order_color,order_size,order_price)";
                           $query1.="VALUES ('{$order_name}',{$user},'{$color}','{$size}',{$price})";
                           $create_order_query=mysqli_query($connection,$query1);
                              if (!$create_order_query){
                                die('Query Failed'. mysqli_error($connection));
                              }
                              else{
                                    header("Location:order"); 
                              }
                              $query="UPDATE users SET user_total= user_total + $price " ;
                              $query.="WHERE user_id=$user ";
                              $user_total=mysqli_query($connection,$query);
                 }             

               }   
                     

                 ?>
          		
          		<?php
                    if(!isset($_SESSION['username'])){
                    	echo "Login First ";
                  }  	  
                 elseif (!$num_order==0){?>
                    <div class="table-responsive">  
                      <table>
                        <thead>
          			    <tr>
          				<th>Name</th>
          				<th>Color</th>
          				<th>Size</th>
          				<th>Price</th>	
          				</tr>
                  </thead>

                    <?php
                         // - Show the Table Orders --

                    	    $user=$_SESSION['user_id']; 
                          $query="SELECT *  FROM orders WHERE order_userid={$user} ";
                          $order_product=mysqli_query($connection,$query);
                          confirmQuery($order_product);
                          $num_order=mysqli_num_rows($order_product);
                          
                          while($row = mysqli_fetch_assoc($order_product)) {
                                $id            = $row['order_id'];
                                $order_name     = $row['order_name'];
                                $order_userid  = $row['order_userid'];
                                $color         = $row['order_color'];
                                $size          = $row['order_size'];
                                $price         = $row['order_price'];
                      		?>
          		    <tbody>
          				<tr>
          				<td><?php echo "$order_name";?></td>
          				<td><?php echo "$color";?></td>
          				<td><?php echo "$size";?></td>
          				<td><?php echo "£ ".$price;?></td>
                  <td><a  class="btn btn-primary" href="./order.php?p_id=<?php echo $id;?> ">Add+</a></td>
                  <td><a  class="btn btn-info" href="edit.php?p_id=<?php echo $id;?>">Edit</a></td>
                  <td><a  class="btn btn-danger"  onClick=" return confirm('Are you sure you want to delete');" href="order.php?delete=<?php echo $id;?>">Del -</a></td>
          				</tr>
                  
          			<?php }?>
                <tfoot>  
                <tr>
                 <td class="parPrice">Total</td>
                 <td></td> 
                 <td></td>
                <td>
                  <?php 
                          
                          $query1="SELECT *  FROM users WHERE user_id={$order_userid} ";
                          $user_product=mysqli_query($connection,$query1);
                          confirmQuery($user_product);
                          while($row = mysqli_fetch_assoc($user_product)) {
                                $total            = $row['user_total'];
                                
                        }

                  echo "£ ".$total;
               
                ?>
                  
                </td>
                <td><a  class="btn btn-danger btn-sm"  onClick=" return confirm('Are you sure you want DELETE ALL ORDERS');" href="order.php?del_all">Empty the Basket
                     <span class="glyphicon glyphicon-trash"></span></a></td>   
                </tr>
              </tfoot>
              </tbody>
                </table>
              </div>
                <?php
                               /*-- Delete All the items --*/
                    if (isset($_GET['del_all'])){
                               //$user_order=$_SESSION['user_id'];   
                               $query2="DELETE  FROM orders WHERE order_userid=$user ";
                               $delete_all_query=mysqli_query($connection,$query2);
                               confirmQuery($delete_all_query);                             
                               $query3="UPDATE users SET user_total= 0 " ;
                               $query3.="WHERE user_id=$user ";
                               $total1_count=mysqli_query($connection,$query3);
                               header("Location: order");

                 }
                ?>
                <?php
                             /*-- Delete One item selected with the button --*/
                       if (isset($_GET['delete'])){
                               $the_id=$_GET['delete'];
                               $query1="SELECT *  FROM orders WHERE order_id={$the_id} ";
                               $user_product=mysqli_query($connection,$query1);
                               confirmQuery($user_product);
                               while($row = mysqli_fetch_assoc($user_product)) {
                                         $price1 = $row['order_price'];
                                
                                }
                               $query="DELETE FROM orders WHERE order_id={$the_id} ";
                               $delete_query=mysqli_query($connection,$query);
                               $query="UPDATE users SET user_total= user_total - $price1 " ;
                              $query.="WHERE user_id=$user ";
                              $total_count=mysqli_query($connection,$query);
                               header("Location: order");
                            }


                             ?>
              </div>
                 <?php
                            }
                 else{
                          echo "<h2>The Basket is Empty</h2>";
                          
                 }               
                ?>
          	</div>
          	<div class="col-sm-4">
              <?php if(isset($_SESSION['username'])): ?>
                    <div class="panel panel-success">
                    <div class="panel-heading">Proceed to Checkout</div>
                 <div class="panel-body">
                       <p class="parPrice"><?php 
                       if ($num_order==0){
                         echo "£ 0";
                       }
                      else{
                       echo "£ " .$total; }?><br>
                       <?php echo "  "."(Items ". $num_order. ")"; ?></p> 
                 </div>
                 
                 <div class='panel-footer'>
            
            
              <a href='payment.php?tot'><button type='button' class='btn btn-success'>ChecKout</button></a>
              
                              
                 </div>
                 
</div>
<?php endif?> 
            </div>
          </div>
</div>

<br>



<?php include 'includes/footer_index.php'?>