<?php
include('header.inc.php');
$seqID=1;
$sql = "SELECT * FROM user_messages ORDER BY  added_on desc";
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
   mysqli_query($conn, "DELETE FROM user_messages WHERE message_id = '$id'");
   ?>
   <script>
   window.location.href= 'contact_us.php';
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
                           <h4 class="box-title"> user messages </h4>
                        
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
               
                                       <th>Message ID</th>
                                       <th>User Name</th>
                                       <th> user number</th>
                                       <th> user email</th>
                                       <th> user preffered method to contact</th>
                                       <th> user message</th>
                                       <th> Added on</th>
                                       <th> other options</th>

                                      
                                    </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                     foreach($msgs as $list){?>
                                     <tr>
                                     <td><?php echo $seqID++ ?></td>
                                     <td><?php echo $list['user_fullName'] ?></td>
                                     <td><?php echo $list['user_number'] ?></td>
                                     <td><?php echo $list['user_email'] ?></td>
                                     <td><?php echo $list['user_PreferredMethod'] ?></td>
                                     <td><?php echo $list['user_comments'] ?></td>
                                     <td><?php echo $list['added_on'] ?></td>
                                     <td>
                                        
                                            <?php
                                         echo "<span class='badge badge-delete'><a href='?type=delete&id=".$list['message_id']."'>Delete</a></span>&nbsp;";
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