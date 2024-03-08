<!-- Modal  Reviews-->
<div id="myModal" class="modal fade" role="dialog">                               
                <!-- Reviews -->               
  <div class="modal-dialog ">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reviews</h4>
      </div>
      <div class="modal-body">
        <?php
                     $query="SELECT * FROM reviews WHERE rev_type='{$pant_name}'  ";                     
                     $select_rev_query=mysqli_query($connection,$query);
                     if (!$select_rev_query){
                                die('Query Failed'. mysqli_error($connection));
                              }
                     while($row=mysqli_fetch_assoc($select_rev_query)){
                         $rev_date=$row['rev_date'];
                         $rev_rate=$row['rev_rate'];
                         $rev_type=$row['rev_type'];
                         $rev_content=$row['rev_content'];
                         $rev_name=$row['rev_name'];
                   ?> 
                        <h4><?php echo $rev_name; ?>
                        <small><?php echo $rev_date; ?></small></h4>    
                        <?php echo $rev_rate. "*"; ?><br>
                        <?php echo $rev_content;?><br><br>  
                        <hr>
          <?php }?>                               
      </div>
      <div class="modal-footer">
        <a class="btn btn-default" data-dismiss="modal">Close</a>
      </div>
    </div>
  </div>
</div>