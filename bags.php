<?php include 'includes/header_index.php'?>
<body>
<?php include 'includes/jumbotron.php'?>            
            <!-- Navigation -->
    <?php include 'includes/navigation.php'?>
   
<div class="container">
  
<div class="row">
  <div class="col-sm-12">
      <h2 class="parTitle"> Bags</h2>
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
        <option value="40">40</option>
        <option value="55">55</option>
        <option value="70">70</option>
      </select>
    </div>
      <div class="input-group">
      <label for="-Max Price">Max Price</label>
       <select name="max">
        <option value="82">Max Price</option>
        <option value="75">75</option>
        <option value="80">80</option>
        <option value="82">82</option>
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
          $max=82;   
      }
      $query1="SELECT *  FROM bags WHERE bag_price BETWEEN $min AND $max ";
      $bags_women=mysqli_query($connection,$query1);
      if($min>0 && $max<82){
         $numrows=0;
      }
      else{
      $numrows=mysqli_num_rows($bags_women);
      }
      
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
  
  for ($x = 1; $x <= $numrows; $x++) {
    if ($bag_id==$x*3){
    echo "</div><div class='row'>";
  }
  }
  }  
  echo "</div>";
  echo "</div>";
echo "<br>";
echo "<br>";

?>
<?php include 'includes/footer_index.php'?>
