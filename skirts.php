<?php include 'includes/header_index.php'?>
<body>
<?php include 'includes/jumbotron.php'?>           
            <!-- Navigation -->
    <?php include 'includes/navigation.php'?>
   
<div class="container">
  
<div class="row">
  <div class="col-sm-12">
      <h2 class="parTitle">Skirts</h2>
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
        <option value="25">25</option>
        <option value="30">30</option>
        <option value="34">34</option>
      </select>
    </div>
      <div class="input-group">
      <label for="-Max Price">Max Price</label>
       <select name="max">
        <option value="62">Max Price</option>
        <option value="55">55</option>
        <option value="60">60</option>
        <option value="62">62</option>
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
<div class='row'>
<?php
    if(isset($_POST['findPrice'])){
         $min=$_POST['min'];
         $max=$_POST['max'];
      }
      else{
          $min=0;
          $max=62;   
      }
      $query1="SELECT *  FROM skirt WHERE skirt_price BETWEEN $min AND $max ";
      $skirt_women=mysqli_query($connection,$query1);
       if($min>0 && $max<62){
         $numrows=0;
      }
      else{
      $numrows=mysqli_num_rows($skirt_women);
      }
      
      while($row = mysqli_fetch_assoc($skirt_women)) {
            $skirt_id         = $row['id'];
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
  
 
 for ($x = 1; $x <= $numrows; $x++) { 
   if ($skirt_id==$x*3){
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