<?php include 'includes/header_index.php'?>
<body>
 
           <!-- carousel -->
  <?php include 'includes/carousel.php'?>
            <!-- Navigation -->
    <?php include 'includes/navigation.php'?>
  
<div class="container">
  
<div class="row">
  <div class="col-sm-12">
      <h2 class="parTitle">Men Offers</h2>
  </div>
</div>    
 <div class="row">
    
      <?php
      $query="SELECT *  FROM pants LIMIT 0,3";
      $pants_men=mysqli_query($connection,$query);
      while($row = mysqli_fetch_assoc($pants_men)) {
            $id            = $row['id'];
            $pant_name     = $row['pant_name'];
            $category      = $row['category'];
            $color         = $row['color'];
            $size          = $row['size'];
            $image         = $row['image'];
            $price         = $row['price'];
  
  echo "<div class='col-sm-4'>";
  
  // -- Start Panel --
  echo  "<div class='panel panel-success'>";
  echo  "<div class='panel-heading'>";
  echo "<a href='./product.php?p_id=$id'>$pant_name</a>";
  echo  "</div>";
  echo "<div class='small1'>";
  echo "<a href='./product.php?p_id=$id'><div class='panel-body'>"; 
  echo "<img width='70%' src='./images/$image' class='img-responsive'  alt='Image'>";
  echo "</div></a>";
  echo "</div>";
  echo "<div class='panel-footer'>";
  echo "£". $price;
  echo "</div>";
  echo "</div>";
  // -- End Panel

  echo"</div>";
  }  
  echo "</div>";
echo "<br>";
?>
<!--   Women  container -->
  <div class="row">
  <div class="col-sm-12">
      <h2 class="parTitle">Women Offers</h2>
  </div>
</div>
<div class="row">
  <?php
      $query1="SELECT *  FROM skirt LIMIT 0,3";
      $skirt_women=mysqli_query($connection,$query1);
      while($row = mysqli_fetch_assoc($skirt_women)) {
            $skirt_id          = $row['id'];
            $skirt_name       = $row['skirt_name'];
            $skirt_category   = $row['skirt_category'];
            $skirt_color      = $row['skirt_color'];
            $skirt_size       = $row['skirt_size'];
            $skirt_image      = $row['skirt_image'];
            $skirt_price      = $row['skirt_price'];
  
  echo "<div class='col-sm-4'>";

  // --- Panel Start ---
  echo  "<div class='panel panel-success'>";
  echo  "<div class='panel-heading'>";
  echo "<a href='./product.php?skirt=$skirt_id'>$skirt_name</a>";
  echo  "</div>";
  echo "<div class='small1'>";
  echo "<a href='./product.php?skirt=$skirt_id'><div class='panel-body'>"; 
  echo "<img width='70%' src='./images/$skirt_image' class='img-responsive'  alt='Image'>";
  echo "</div></a>";
  echo "</div>";
  echo "<div class='panel-footer'>";
  echo "£". $skirt_price;
  echo "</div>";
  echo "</div>";
  // End Panel

  echo"</div>";
  }  
  echo "</div>";
  echo "<br>";
  echo "<br>";
?>
<!--  Accessories container -->
    <div class="row">
  <div class="col-sm-12">
      <h2 class="parTitle">Accessories Offers</h2>
  </div>
</div>
<div class="row">
  <?php
      $query2="SELECT *  FROM bags LIMIT 0,3";
      $bags_women=mysqli_query($connection,$query2);
      while($row = mysqli_fetch_assoc($bags_women)) {
            $bag_id         = $row['bag_id'];
            $bag_name       = $row['bag_name'];
            $bag_category   = $row['bag_category'];
            $bag_color      = $row['bag_color'];
            $bag_size       = $row['bag_size'];
            $bag_image      = $row['bag_image'];
            $bag_price      = $row['bag_price'];
  
  echo "<div class='col-sm-4'>";

  //   -- Start Panel --
  echo  "<div class='panel panel-success'>";
  echo  "<div class='panel-heading'>";
  echo "<a href='./product.php?bags=$bag_id'>$bag_name</a>";
  echo  "</div>";
  echo "<div class='small1'>";
  echo "<a href='./product.php?bags=$bag_id'><div class='panel-body'>"; 
  echo "<img width='70%' src='./images/$bag_image' class='img-responsive'  alt='Image'>";
  echo "</div></a>";
  echo "</div>";
  echo "<div class='panel-footer'>";
  echo "£". $bag_price;
  echo "</div>";
  echo "</div>";
  // -- End Panel --

  echo"</div>";
  }  
echo "</div>";
echo "</div>";

echo "<br>";
echo "<br>";

?>

<?php include 'includes/footer_index.php'?>
