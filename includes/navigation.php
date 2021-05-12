<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index">F&S</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li ><a href="index">Home</a></li>
        <?php
              $query = "SELECT * FROM categories";
              $select_all_categories_query = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_all_categories_query)) {
       $cat_id = $row['cat_id'];
       $cat_name = $row['cat_name'];
        
        echo "<li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' href='#'>{$cat_name}";
        echo "<span class='caret'></span></a>";
        echo "<ul class='dropdown-menu'>";
        if ($cat_name=='Men'){ 
        echo "<li><a href='./pants'>Men Pants</a></li>";
        echo "<li><a href='./shirt_men'>Shirts</a></li>";
        echo "<li><a href='./Jacket_men'>Jackets</a></li>";
        
        }
        elseif ($cat_name=='Women'){
        echo "<li><a href='./women_pant'>Trousers</a></li>";
        echo "<li><a href='./women_shirt'>Shirts</a></li>";
        echo "<li><a href='./women_Jacket'>Jackets</a></li>";
        echo "<li><a href='./skirts'>Skirts</a></li>";
        }

        
        if ($cat_name=='Accessories' ){ 
             echo"<li class='dropdown-submenu'>";   
             echo "<a class='test' tabindex='-1' href='#''>Men <span class='caret'></span></a>";
             echo "<ul class='dropdown-menu'>";
             echo "<li><a tabindex='-1' href='./men_glass'>Men Glasses</a></li>";
             echo "<li><a tabindex='-1' href='./hat_men'>Men Hats </a></li>";
             echo"</li>";
             echo"</ul>";
             echo"<li class='dropdown-submenu'>";   
             echo "<a class='test' tabindex='-1' href='#''>Women <span class='caret'></span></a>";
             echo "<ul class='dropdown-menu'>";
             echo "<li><a tabindex='-1' href='./women_glass'>Women Glasses</a></li>";
             echo "<li><a tabindex='-1' href='./women_hat'>Women Hats </a></li>";
             echo "<li><a tabindex='-1' href='./bags'>Women Bags </a></li>";
             echo"</li>";
             echo"</ul>";  
              }      
            
        echo"</ul>";
        echo "</li>";
    }

        ?>
        <?php if (!isset($_SESSION['username'])): ?>
        <li><a href="./registration">Registration</a></li>
        <?php endif;?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if (!isset($_SESSION['username'])): ?>
        <li><a href="login"><span class="glyphicon glyphicon-user"></span> Login</a></li>
        <?php else: ?>

          <li><a href="./includes/logout"><?php echo $_SESSION['username']." ";?><span class="glyphicon glyphicon-user"></span> Logout</a></li>

          <li><a href="./order"><span class="glyphicon glyphicon-shopping-cart"></span> Cart
          <?php
         $user= $_SESSION['user_id']; 
         $u_query= "SELECT order_userid FROM orders WHERE order_userid=$user";
                  $result2=mysqli_query($connection,$u_query);
                  confirmQuery($result2);
                  $num_order=mysqli_num_rows($result2);
                  echo "$num_order";
                     

        ?>
        </a></li>
        <li><a href="./last_order">Your Orders</a></li>
        <?php endif;?>  
        
        
      </ul>
    </div>
  </div>
</nav>
<?php include 'box_social.php'?>
  