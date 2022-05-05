<?php
include('header.inc.php');
$sql = "SELECT * FROM `house_reviews` ORDER BY  added_on desc";
$msgs = array();
$res = mysqli_query($conn, $sql)
or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
while($row = mysqli_fetch_array($res)){
    $msgs[] = $row;
}
if(isset($_GET['type']) && $_GET['type'] != ''){
$type = $_GET['type'];
$id = $_GET['id'];
if($type = 'delete'){
   mysqli_query($conn, "DELETE FROM house_reviews WHERE review_id = '$id'");
   ?>
   <script>
   window.location.href= 'house_reviews.php';
</script>
   <?php
}}
?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title"> user reviews </h4>
                        
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th>House ID</th>
                                       <th>Review ID</th>
                                       <th> user pic</th>
                                       <th> user comment</th>
                                       <th> user Name</th>
                                       <th> Added on</th>
                                       <th> other options</th>

                                      
                                    </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                     foreach($msgs as $list){?>
                                     <tr>
                                     <td><?php echo $list['house_id'] ?></td>
                                     <td><?php echo $list['review_id'] ?></td>
                                     <td><img src="../<?php echo $list['user_pic'] ?>" alt=""></td>
                                     <td><?php echo $list['user_comment'] ?></td>
                                     <td><?php echo $list['user_name'] ?></td>
                                     <td><?php echo $list['added_on'] ?></td>
                                     <td>
                                           <?php
                                         echo "<span class='badge badge-delete'><a href='?type=delete&id=".$list['review_id']."'>Delete</a></span>&nbsp;";
                                         ?>
                                     </td>
                                     </tr>

                                  <?php   }
                                     ?>
                                   
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
         <div class="clearfix"></div>
<?php
include('footer.inc.php');
?>