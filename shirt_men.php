<?php include 'includes/header_index.php'?>
<body>
<?php include 'includes/jumbotron.php'?>  
           
            <!-- Navigation -->
    <?php include 'includes/navigation.php'?>
   
<div class="container">
  
<div class="row">
  <div class="col-sm-12">
      <h2 class="parTitle">Shirts</h2>
  </div>
</div>
<div class='row'>    
      <?php
      $query="SELECT *  FROM shirts WHERE shirt_cat='Men' ";
      $shirt_men=mysqli_query($connection,$query);
      $numrows=mysqli_num_rows($shirt_men);
      while($row = mysqli_fetch_assoc($shirt_men)) {
            $id            = $row['shirt_id'];
            $pant_name     = $row['shirt_name'];
            $category      = $row['shirt_cat'];
            $color         = $row['shirt_color'];
            $size          = $row['shirt_size'];
            $image         = $row['shirt_image'];
            $price         = $row['shirt_price'];
  
  echo "<div class='col-sm-4'>";
  // -- Start Panel --

  echo  "<div class='panel panel-success'>";
  echo  "<div class='panel-heading'>";
  echo "<a href='./product.php?shirt=$id'>$pant_name</a>";
  echo  "</div>";
  echo "<div class='small1'>";
  echo "<a href='./product.php?shirt=$id'><div class='panel-body'>"; 
  echo "<img width='70%' src='./images/$image' class='img-responsive'  alt='Image'>";
  echo "</div></a>";
  echo "</div>";
  echo "<div class='panel-footer'>";
  echo "£". $price;
  echo "</div>";
  echo "</div>";
  
  // -- End Panel --
  echo "</div>";
  for ($x = 1; $x <= $numrows; $x++) { 
    if ($id==$x*3){
    echo "</div><div class='row'>";
  }
  }
  }  
echo "</div>";
echo "</div>";
echo "<br>";

?>

<?php include 'includes/footer_index.php'?>
