<?php include 'includes/header_index.php'?>
<body>
<?php include 'includes/jumbotron.php'?>  
           
            <!-- Navigation -->
    <?php include 'includes/navigation.php'?>
 <div class="container">
<div class="row">
<div class="col-sm-12"> 	
<h1 class="parTitle"> Update Order </h1>
</div>
</div>
<?php
       if(isset($_GET['p_id'])){
                    
               $up_id= $_GET['p_id'];
         }      
               $query="SELECT * FROM orders WHERE order_id={$up_id} ";
               $update_product=mysqli_query($connection,$query);
               confirmQuery($update_product); 
               while($row = mysqli_fetch_assoc($update_product)) {
                                $id            = $row['order_id'];                           
                                $order_name     = $row['order_name'];
                                $color         = $row['order_color'];
                                $size          = $row['order_size'];
                                $price         = $row['order_price'];

                }

                 if(isset($_POST['update'])){                                
                                  $new_name	    = $_POST['new_name'];
                                  $new_color	= $_POST['new_color'];
                                  $new_size	    = $_POST['new_size'];
                                  $new_price    = $_POST['new_price'];
                         $query="UPDATE orders SET ";
                                      $query.="order_name='{$new_name}', "; 
                                      $query.="order_color='{$new_color}', "; 
                                      $query.="order_size= '{$new_size}', "; 
                                      $query.="order_price='{$new_price}' "; 
                                      $query.= "WHERE order_id ={$up_id} ";

                                      $update_order=mysqli_query($connection,$query);   
                                      confirmQuery($update_order);  
                                      header("Location:order");





               }
?>
<div class="row">
	<div class="col-sm-4"></div>
    <div class="col-sm-4">
    	<div class="well">
                    <h4>Update Form:</h4>
                    <form role="form" action="" method="post">

                        <div class="form-group">

                            <label for="Name">Name</label>
                            <input  type="text" class="form-control" name="new_name" value="<?php echo $order_name ?> " >
                        </div>
                        <div class="form-group">
                        	<label for="Color">Color</label><br>
                        	<select name="new_color" id="">
                            <option  value='<?php echo $color; ?>'><?php echo $color; ?></option>
                            <option  value='Black'>Black</option>
                            <option  value='Red'>Red</option>
                            <option  value='Green'>Green</option>
                            <option  value='White'>White</option>
                            
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="Size">Size</label><br>
                            <select name="new_size" id="">
                            <option  value='<?php echo $size; ?>'><?php echo $size; ?></option>
                            <option  value='Small'>Small</option>
                            <option  value='Regular'>Regular</option>
                            <option  value='Large'>Large</option>
                            <option  value='Extra Large'>Extra large</option>
                            </select> 
                            
                        </div>
                        <div class="form-group">
                            <label for="Price">Price</label>
                            <input  type="text" class="form-control" name="new_price"  value="<?php echo $price ?> " readonly >
                        </div>
                        <input type="submit" name="update" value='Update' class="btn btn-primary">
                    </form>
                </div>


    </div>
    <div class="col-sm-4"></div>
</div>
</div>
<br>
<hr>    
<?php include 'includes/footer_index.php'?>