
<?php include 'includes/header_index.php'?>
<body>
<?php include 'includes/jumbotron.php'?>  
           
            <!-- Navigation -->
    <?php include 'includes/navigation.php'?>
   
<div class="container">
 
<div class="row">
  <div class="col-sm-12">
      <h2 class="parTitle">Product</h2>
  </div>
</div> 
<div class="row">
   <div class="col-sm-4">   
       <?php  include 'includes/select_product.php'?>
          
    <div class='small1'>  
    <div class="item_img">
     <?php echo"<img width='70%' src='./images/$image' class='img-responsive'  alt='Image'>";?>
    </div>
  </div>
    <div class="item2">
     <?php if ($tot6>8 || $tot6>=10):?>

       <span class="fa fa-star checked"></span> 
       <span class="fa fa-star checked"></span> 
       <span class="fa fa-star checked"></span>
       <span class="fa fa-star checked"></span>
       <span class="fa fa-star checked"></span>
    <?php endif;?>   
     <?php if ($tot6>=4  && $tot6<=8) :?>
       <span class="fa fa-star checked"></span> 
       <span class="fa fa-star checked"></span> 
       <span class="fa fa-star checked"></span>
       <span class="fa fa-star checked"></span>
       <span class="fa fa-star"></span>
       
      <?php elseif ($tot6<=3):?>
       <span class="fa fa-star checked"></span> 
       <span class="fa fa-star checked"></span> 
       <span class="fa fa-star checked"></span>
       <span class="fa fa-star "></span>
       <span class="fa fa-star"></span>      
     <?php endif;?>  
    </div>
   <hr>
   <!-- Reviews Comments -->
   <?php 
                    
                   if(isset($_POST['create_review'])){
                         
                         $rev_name=$_POST['rev_name'];
                         $rev_content=$_POST['rev_content'];
                         $rev_rate=$_POST['rev_rate'];
                         
                         
                                                    
                         if (!empty($rev_name)&& !empty($rev_content) && !empty($rev_rate) ){

                               $query="INSERT INTO reviews (rev_name,rev_id_product,rev_rate,rev_type,rev_content,rev_date) ";
                               $query.="VALUES ('{$rev_name}',$the_id,$rev_rate,'{$pant_name}','{$rev_content}',now()) ";
                               $create_review_query=mysqli_query($connection,$query);
                               $query1="UPDATE reviews SET rev_tot= rev_tot + 1 " ;
                               $rev_count=mysqli_query($connection,$query1);                               
                              if (!$create_review_query){
                                die('Query Failed'. mysqli_error($connection));
                              }

                         
                          
                             
                            /* -- VALUES Reviews Tot Charts --*/
                            
                            if ($type=='pant'){
                                 $model='pants';
                                 $id='id';
                                 update_totReviews($model,$id,$the_id,$rev_rate);
                                 header("Location:product.php?p_id={$the_id}"); 
                                   }

                              if ($type=='skirt'){
                                update_totReviews(skirt,id,$the_id,$rev_rate);
                                header("Location:product.php?skirt={$the_id}");
                                   }
                             if ($type=='bags'){
                                    update_totReviews(bags,bag_id,$the_id,$rev_rate);
                                    header("Location:product.php?bags={$the_id}");
                                   }      

                               if ($type=='shirt'){
                                      update_totReviews(shirts,shirt_id,$the_id,$rev_rate);
                                      header("Location:product.php?shirt={$the_id}");
                                   } 

                               if ($type=='jacket'){
                                        update_totReviews(jackets,jacket_id,$the_id,$rev_rate);
                                        header("Location:product.php?jacket={$the_id}");
                                   }

                               if ($type=='glass'){
                                        update_totReviews(glasses,glass_id,$the_id,$rev_rate);
                                        header("Location:product.php?glass={$the_id}");
                                   }   
                             if ($type=='hat'){
                                   update_totReviews(hats,hat_id,$the_id,$rev_rate);
                                   header("Location:product.php?hat={$the_id}");

                                   }
                         /*-- End Charts Total Reviews --*/                  
                                   
                         }
                         else {
                                 echo "<h3 style='background-color:red'>The fields cannot be empty</h3>"; 
                         }
                     }

                 ?>

        <!-- Chart Reviews -->         
  <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Reviews', 'Rate Reviews'],
          ["5 *****", <?php echo $tot5;?>],
          ["4 ****", <?php echo $tot4;?>],
          ["3 ***", <?php echo $tot3;?>],
          ["2 **", <?php echo $tot2;?>],
          ["1 *", <?php echo $tot1;?>]
        ]);

        var options = {
          title: 'Reviews Client',
          width: 300,
          legend: { position: 'none' },
          chart: { title: 'Reviews Client',
                   subtitle: 'Rate Total Reviews' },
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Total Rate'} // Top x-axis.
            }
          },
          bar: { groupWidth: "40%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
      
    </script>
  

<!-- Reviews Form -->
                <div class="well">
                    <h4>Leave a Review:</h4>
                    <form role="form" action="" method="post">

                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input  type="text" class="form-control" name="rev_name">
                        </div>
                        <div class="form-group">
                            <label for="Rate">Rate</label><br>
                            <select name="rev_rate" id="">
                              <option  value='0' >Client Rating</option>
                              <option  value='1' >1</option>
                              <option  value='2' >2</option>
                              <option  value='3' >3</option>
                              <option  value='4' >4</option>
                              <option  value='5' >5</option>
                            </select>  
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="Review">Your Review</label>
                            <textarea name="rev_content" class="form-control" rows="3"></textarea>
                        </div>
                        <input type="submit" name="create_review" class="btn btn-primary">
                    </form>
                </div>

                <hr>
                        
                   <?php
                     $query="SELECT * FROM reviews WHERE rev_type='{$pant_name}'  ";                     
                     $select_rev_query=mysqli_query($connection,$query);
                     $reviews_count=mysqli_num_rows($select_rev_query);
                     if (!$select_rev_query){
                                die('Query Failed'. mysqli_error($connection));
                              }
                     $i=0;
                     while($row=mysqli_fetch_assoc($select_rev_query)){
                         $rev_date=$row['rev_date'];
                         $rev_rate=$row['rev_rate'];
                         $rev_type=$row['rev_type'];
                         $rev_content=$row['rev_content'];
                         $rev_name=$row['rev_name'];
                         $i++;
                   ?> 

                <!-- Review -->
                <?php if($i<=3):?>
                 <div class="item1">
                <div class="media"> 
                    <div class="media-body">
                        <h4 class="media-heading">
                            <?php echo $rev_name; ?>
                            <small><?php echo $rev_date; ?></small>
                        </h4>
                        <?php echo $rev_rate. "*"; ?><br>
                        <?php echo $rev_content;?>
                         <br><br>
                    </div>
                    
                </div>
                </div>   
                <?php endif;?>

      <?php }
         echo "<div class='item1'>";       
       if($reviews_count>3){
                              /* Trigger the Modal Reviews with a button */
                       echo "<a data-toggle='modal' data-target='#myModal'>Read More</a>";  
                       }
                   ?>
      </div>
      <hr>             
  </div>
  <div class='col-sm-4'>
  <ul class="item1">          
  <?php echo "<li>Name: $pant_name</li>";?><br>
  <?php echo "<li>Category: $category</li>";?><br>
  <?php echo "<li>Color: $color</li>";?><br>
  <?php  
        if  ($category!=='Accessories')  { 
          echo "<li>Size: $size</li>";
                                         } 
         else {echo "<li>Gender: $first_category</li>";
               }        

            ?><br>
  <?php echo "<li>Price  £ ". $price;?><br>
  </li><br>
  </ul>
  <?php

                    
                     /* - Create Order - */                    
                
                if(isset($_POST['create_order'])){
                                                                        
                           $user= $_SESSION['user_id'];
                           $query1="INSERT INTO orders (order_name,order_userid,order_color,order_size,order_price)";
                           $query1.="VALUES ('{$pant_name}',{$user},'{$color}','{$size}',{$price})";
                           $create_order_query=mysqli_query($connection,$query1);
                              if (!$create_order_query){
                                die('Query Failed'. mysqli_error($connection));
                              }
                              else{
                                    
                                    switch ($type) {
                                      case 'pant': header("Location:product.php?p_id={$the_id}&success=1");       
                                      break;
                                      case 'skirt': header("Location:product.php?skirt={$the_id}&success=1");
                                      break;
                                      case 'bags': header("Location:product.php?bags={$the_id}&success=1");
                                      break;
                                      case 'shirt': header("Location:product.php?shirt={$the_id}&success=1");
                                      break;
                                      case 'jacket': header("Location:product.php?jacket={$the_id}&success=1");
                                      break;
                                      case 'glass': header("Location:product.php?glass={$the_id}&success=1");
                                      break;
                                      case 'hat': header("Location:product.php?hat={$the_id}&success=1");
                                      break;
                                      default:
                                        # code...
                                      break;
                                      
                                    }

                                    
                              }
                              $query="UPDATE users SET user_total= user_total + $price " ;
                              $query.="WHERE user_id=$user ";
                              $total_count=mysqli_query($connection,$query);                   
                  }        
                  ?>


    <div class="item1"> 
       <?php if(!isset($_SESSION['username'])):?>
                 
            <a class='btn btn-success' href='login.php'>Continue Like Guest</a>
     <?php else: ?> 
      <form action='' method='post'> 
            <?php
                   if ( isset($_GET['success']) && $_GET['success'] == 1 )
              {
                          // treat the succes case ex:
                           echo "<h2>Order Created</h2><br>";
                     }

                     
            ?>
             <input class='btn btn-success' type='submit' name='create_order' value='Add Chart'>
      </form>         
    <?php endif;?>
    </div>
    <hr>
            
  <div class="panel panel-info">
      <div class="panel-heading">Information Product</div>
        
      <div class="panel-body"><p><?php echo $info;?></p>
                            
                           </div>
    </div>
                      <!-- -- Chart Reviews -- -->
<?php
    if($tot1>0 || $tot2>0 || $tot3>0 || $tot4>0 || $tot5>0){    
     echo "<div id='top_x_div' style='width: 300px; height: 300px;'></div>";
    }
    else {
             echo "<h2 class='item1'> No Reviews </h2>";
    }
?>
 </div>
 <br>  
  <?php
        if(ifItIsMethod('post')){
            if(isset($_POST['username']) && isset($_POST['password'])){
                $model=true; 
                login_user($_POST['username'], $_POST['password'],$model,$the_id,$type);
            }
        }
?>

  <div class='col-sm-4'>
<div class="well">
                     <?php if(isset($_SESSION['username'])):?>
                           <h4>Logged in as <?php echo $_SESSION['username'];  ?></h4>
                          <?php   echo "<a href='./includes/logout.php?type1=$type&the_id1=$the_id' btn btn-primary>Logout</a>";?>
                                    
                     <?php else: ?> 
                        <h4>Login</h4>
                         <form  method="post">
                    <div class="form-group">
                        <input name="username" type="text" class="form-control" placeholder="Enter Username">
                        
                    </div>
                    <div class="input-group">
                        <input name="password" type="password" class="form-control" placeholder="Enter Password">
                        <span class="input-group-btn">                         
                            <input   name="login" class="btn btn-primary" type="submit" value="Submit">
                        </span>
                    </div>
                    
                </form><!-- Form Login -->
                    <!-- /.input-group -->
                     <?php endif;?>         
                </div>
  </div>
  </div>
  </div>
<br>

<?php include 'includes/footer_index.php'?>
<?php include 'includes/modal_reviews.php'?>
                      