<?php
// - Pants --
      if (isset($_GET['p_id'])){
            $the_id=$_GET['p_id'];
            $query="SELECT *  FROM pants WHERE id={$the_id}  ";
            $pants_men=mysqli_query($connection,$query);
      while($row = mysqli_fetch_assoc($pants_men)) {
            $id            = $row['id'];
            $pant_name     = $row['pant_name'];
            $category      = $row['category'];
            $color         = $row['color'];
            $size          = $row['size'];
            $info          = $row['info_product']; 
            $image         = $row['image'];
            $price         = $row['price'];
            $tot1          = $row['tot1'];
            $tot2          = $row['tot2'];
            $tot3          = $row['tot3'];
            $tot4          = $row['tot4'];
            $tot5          = $row['tot5'];
              

      }
           $type="pant";
    }
      
      //  -- Skirts --

   if (isset($_GET['skirt'])){
        $the_id=$_GET['skirt'];
      $query1="SELECT *  FROM skirt WHERE id={$the_id} ";
      $skirt_women=mysqli_query($connection,$query1);
      while($row = mysqli_fetch_assoc($skirt_women)) {
            $id          = $row['id'];
            $pant_name   = $row['skirt_name'];
            $category    = $row['skirt_category'];
            $color       = $row['skirt_color'];
            $size        = $row['skirt_size'];
            $info        = $row['skirt_product']; 
            $image       = $row['skirt_image'];
            $price       = $row['skirt_price'];
            $tot1        = $row['tot1'];
            $tot2        = $row['tot2'];
            $tot3        = $row['tot3'];
            $tot4        = $row['tot4'];
            $tot5        = $row['tot5'];
            
      }
        $type="skirt";
       
    }
      // -- Bags --

    if (isset($_GET['bags'])){
        $the_id=$_GET['bags'];
   
    $query2="SELECT *  FROM bags  WHERE bag_id={$the_id} ";
      $bags_women=mysqli_query($connection,$query2);
      while($row = mysqli_fetch_assoc($bags_women)) {
            $id         = $row['bag_id'];
            $pant_name  = $row['bag_name'];
            $category   = $row['bag_category'];
            $color      = $row['bag_color'];
            $size       = $row['bag_size'];
            $info       = $row['bag_product'];
            $image      = $row['bag_image'];
            $price      = $row['bag_price'];
            $tot1       = $row['tot1'];
            $tot2       = $row['tot2'];
            $tot3       = $row['tot3'];
            $tot4       = $row['tot4'];
            $tot5       = $row['tot5'];
            
                                                   }
         $type="bags";                                          
    }
         // -- Shirts --

    if (isset($_GET['shirt'])){
        $the_id=$_GET['shirt'];
   
    $query="SELECT *  FROM shirts WHERE shirt_id={$the_id} ";
      $shirt_men=mysqli_query($connection,$query);
      while($row = mysqli_fetch_assoc($shirt_men)) {
            $id            = $row['shirt_id'];
            $pant_name     = $row['shirt_name'];
            $category      = $row['shirt_cat'];
            $color         = $row['shirt_color'];
            $size          = $row['shirt_size'];
            $info          = $row['shirt_product'];
            $image         = $row['shirt_image'];
            $price         = $row['shirt_price'];
            $tot1          = $row['tot1'];
            $tot2          = $row['tot2'];
            $tot3          = $row['tot3'];
            $tot4          = $row['tot4'];
            $tot5          = $row['tot5'];
            
                                               
                                                   } 
         $type="shirt";                                          
    }
        // -- Jackets
        if (isset($_GET['jacket'])){
        $the_id=$_GET['jacket'];
          $query="SELECT *  FROM jackets WHERE jacket_id={$the_id} ";
          $pants_men=mysqli_query($connection,$query);
          while($row = mysqli_fetch_assoc($pants_men)) {
            $id            = $row['jacket_id'];
            $pant_name     = $row['jacket_name'];
            $category      = $row['jacket_cat'];
            $color         = $row['jacket_color'];
            $size          = $row['jacket_size']; 
            $info          = $row['jacket_product'];
            $image         = $row['jacket_image'];
            $price         = $row['jacket_price'];
            $tot1          = $row['tot1'];
            $tot2          = $row['tot2'];
            $tot3          = $row['tot3'];
            $tot4          = $row['tot4'];
            $tot5          = $row['tot5'];
            
                                                      }
         $type="jacket";                                             
        }
        // -- Glasses
        if (isset($_GET['glass'])){
        $the_id=$_GET['glass'];
               $query="SELECT *  FROM glasses WHERE glass_id={$the_id} ";
              $glass_men=mysqli_query($connection,$query);
          while($row = mysqli_fetch_assoc($glass_men)) {
            $id              = $row['glass_id'];
            $pant_name       = $row['glass_name'];
            $category        = $row['glass_cat'];
            $first_category  = $row['glass_category'];
            $color           = $row['glass_color'];
            $info            = $row['glass_product'];
            $image           = $row['glass_image'];
            $price           = $row['glass_price'];
            $tot1            = $row['tot1'];
            $tot2            = $row['tot2'];
            $tot3            = $row['tot3'];
            $tot4            = $row['tot4'];
            $tot5            = $row['tot5'];
          
                                                    }
            $type="glass";                                        
         } 
         // -- Hat --
         if (isset($_GET['hat'])){
        $the_id=$_GET['hat'];
         $query="SELECT *  FROM hats WHERE hat_id={$the_id}";
         $hat_men=mysqli_query($connection,$query);
      while($row = mysqli_fetch_assoc($hat_men)) {
            $id              = $row['hat_id'];
            $pant_name       = $row['hat_name'];
            $category        = $row['first_categ'];
            $first_category  = $row['hat_cat'];
            $color           = $row['hat_color'];
            $size            = $row['hat_size'];
            $info            = $row['hat_product'];
            $image           = $row['hat_image'];
            $price           = $row['hat_price'];
            $tot1            = $row['tot1'];
            $tot2            = $row['tot2'];
            $tot3            = $row['tot3'];
            $tot4            = $row['tot4'];
            $tot5            = $row['tot5'];
            
                                                   }
              $type="hat";
                                                   
              }
           $tot6=$tot1+$tot2+$tot3+$tot4+$tot5;

?>
