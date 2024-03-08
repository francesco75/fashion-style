<?php include 'includes/header_index.php'?>
<body>
<?php include 'includes/jumbotron.php'?>  
           
            <!-- Navigation -->
    <?php include 'includes/navigation.php'?>
   
<div class="container">
  
<div class="row">
  <div class="col-sm-12">
      <h2 class="parTitle">Glasses</h2>
  </div>
</div>
<div class='row'>    
      <?php
      $query="SELECT *  FROM glasses WHERE glass_category='Women' ";
      $glass_women=mysqli_query($connection,$query);
      $numrows=mysqli_num_rows($glass_women);
      while($row = mysqli_fetch_assoc($glass_women)) {
            $id              = $row['glass_id'];
            $pant_name       = $row['glass_name'];
            $first_category  = $row['glass_cat'];
            $category        = $row['glass_category'];
            $color           = $row['glass_color'];
            $image           = $row['glass_image'];
            $price           = $row['glass_price'];
  
  echo "<div class='col-sm-4'>";
  // Start Panel
  echo  "<div class='panel panel-success'>";
  echo  "<div class='panel-heading'>";
  echo "<a href='./product.php?glass=$id'>$pant_name</a>";
  echo  "</div>";
  echo "<div class='small1'>";
  echo "<a href='./product.php?glass=$id'><div class='panel-body'>"; 
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
