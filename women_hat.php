<?php include 'includes/header_index.php'?>
<body>
<?php include 'includes/jumbotron.php'?>  
           
            <!-- Navigation -->
    <?php include 'includes/navigation.php'?>
   
<div class="container">
  
<div class="row">
  <div class="col-sm-12">
      <h2 class="parTitle">Hats</h2>
  </div>
</div>
<div class='row'>    
      <?php
      $query="SELECT *  FROM hats WHERE hat_cat='Women' ";
      $hat_women=mysqli_query($connection,$query);
      $numrows=mysqli_num_rows($hat_women);
      while($row = mysqli_fetch_assoc($hat_women)) {
            $id              = $row['hat_id'];
            $pant_name       = $row['hat_name'];
            $first_category  = $row['first_categ'];
            $category        = $row['hat_cat'];
            $color           = $row['hat_color'];
            $size            = $row['hat_size'];
            $image           = $row['hat_image'];
            $price           = $row['hat_price'];
  
  echo "<div class='col-sm-4'>";
  // Start Panel
  echo  "<div class='panel panel-success'>";
  echo  "<div class='panel-heading'>";
  echo "<a href='./product.php?hat=$id'>$pant_name</a>";
  echo  "</div>";
  echo "<div class='small1'>";
  echo "<a href='./product.php?hat=$id'><div class='panel-body'>"; 
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
