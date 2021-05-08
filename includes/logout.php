<?php ob_start();?>
<?php session_start();?>
<?php
     $_SESSION['user_id']=null;
     $_SESSION['username'] = null;
  	 $_SESSION['password'] =null;
     $type=$_GET['type1'];
     $the_id=$_GET['the_id1'];
          switch ($type) {
                                      case 'pant': header("Location:../product.php?p_id=$the_id"); 
                                      break;
                                      case 'skirt': header("Location:../product.php?skirt=$the_id");
                                      break;
                                      case 'bags': header("Location:../product.php?bags=$the_id");
                                      break;
                                      case 'shirt': header("Location:../product.php?shirt=$the_id");
                                      break;
                                      case 'jacket': header("Location:../product.php?jacket=$the_id");
                                      break;
                                      case 'glass': header("Location:../product.php?glass=$the_id");
                                      break;
                                      case 'hat': header("Location:../product.php?hat=$the_id");
                                      break;
                                      default:
                                        case header("Location: ../index");
                                      break;
                                    }
 ?>