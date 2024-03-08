<?php include 'includes/header_index.php'?>
<body>
<?php include 'includes/jumbotron.php'?>  
           
            <!-- Navigation -->
    <?php include 'includes/navigation.php'?>
   
<div class="container">
  
<div class="row">
  <div class="col-sm-12">
      <h2 class="parTitle">Pants</h2>
  </div>
</div>
<div class='row'>    
      <?php
      $query="SELECT *  FROM pants WHERE category='Women' ";
      $pants_men=mysqli_query($connection,$query);
      $numrows=mysqli_num_rows($pants_men);
      while($row = mysqli_fetch_assoc($pants_men)) {
            $id            = $row['id'];
            $pant_name     = $row['pant_name'];
            $category      = $row['category'];
            $color         = $row['color'];
            $size          = $row['size'];
            $image         = $row['image'];
            $price         = $row['price'];
  
  echo "<div class='col-sm-4'>";
  //   -- Start Panel
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
  // End panel
  echo"</div>";
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
