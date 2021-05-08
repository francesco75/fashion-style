<?php include 'includes/header_index.php'?>
<body>
<?php include 'includes/jumbotron.php'?>  
           
            <!-- Navigation -->
    <?php include 'includes/navigation.php'?>
   
<div class="container">
  
<div class="row">
  <div class="col-sm-12">
      <h2 class="parTitle">Jackets</h2>
  </div>
</div>
<div class='row'>    
      <?php
      $query="SELECT *  FROM jackets WHERE jacket_cat='Women' ";
      $pants_men=mysqli_query($connection,$query);
      $numrows=mysqli_num_rows($pants_men);
      while($row = mysqli_fetch_assoc($pants_men)) {
            $id            = $row['jacket_id'];
            $pant_name     = $row['jacket_name'];
            $category      = $row['jacket_cat'];
            $color         = $row['jacket_color'];
            $size          = $row['jacket_size'];
            $image         = $row['jacket_image'];
            $price         = $row['jacket_price'];
  
  echo "<div class='col-sm-4'>";
  // Start Panel
  echo  "<div class='panel panel-success'>";
  echo  "<div class='panel-heading'>";
  echo "<a href='./product.php?jacket=$id'>$pant_name</a>";
  echo  "</div>";
  echo "<div class='small1'>";
  echo "<a href='./product.php?jacket=$id'><div class='panel-body'>"; 
  echo "<img width='70%' src='./images/$image' class='img-responsive'  alt='Image'>";
  echo "</div></a>";
  echo "</div>";
  echo "<div class='panel-footer'>";
  echo "£". $price;
  echo "</div>";
  echo "</div>";
  // End Panel
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
