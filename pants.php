<?php include 'includes/header_index.php'?>
<body>
<?php include 'includes/jumbotron.php'?>  
           
            <!-- Navigation -->
    <?php include 'includes/navigation.php'?>
   
<div class="container">
  
<div class="row">
  <div class="col-sm-12">
      <h2 class="parTitle"> Pants</h2>
  </div>
</div>   
<div class="row">
  <div class="col-sm-4">
      <div class="box">
      <h3>Filter</h3>
      <hr>  
    <form class="" action='' method="post">
      <div class="form-group">
      <label for="Min Price">Min Price</label>
      <select name="min">      
        <option value="0">Min Price</option>
        <option value="30">30</option>
        <option value="35">35</option>
        <option value="40">40</option>
      </select>
    </div>
      <div class="input-group">
      <label for="-Max Price">Max Price</label>
       <select name="max">
        <option value="75">Max Price</option>
        <option value="55">55</option>
        <option value="57">57</option>
        <option value="75">75</option>
      </select>  
            <span class="input-group-btn">  
            <input class="btn btn-primary" type="submit" name="findPrice">
          </span>
        </div>
    </form>

    <hr>
  </div>
</div>
  
  <div class="col-sm-8"></div>
</div>
<div class="row"> 
      <?php
      if(isset($_POST['findPrice'])){
         $min=$_POST['min'];
         $max=$_POST['max'];
      }
      else{
          $min=0;
          $max=75;   
      }
      $query="SELECT *  FROM pants WHERE category='Men ' AND price BETWEEN $min AND $max ";
      $pants_men=mysqli_query($connection,$query);
      if($min>0 && $max<75){
         $numrows=0;
      }
      else{
      $numrows=mysqli_num_rows($pants_men);
      }
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
