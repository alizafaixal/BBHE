<?php
$seqID=1;
include('header.inc.php');
$sql = "SELECT * FROM `bookings` ORDER BY `added_on` desc";
$bookings = array();
$res = mysqli_query($conn, $sql)
or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
while($row = mysqli_fetch_array($res)){
    $bookings[] = $row;
}
// print_r($orders);
if(isset($_GET['type']) && $_GET['type'] != ''){
$id = clean($conn, $_GET['id']);
$type = clean($conn, $_GET['type']) ;
if($type=='delete'){
   $sql = "DELETE FROM bookings where booking_id = '$id'";
   $res = mysqli_query($conn, $sql)
   or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
   if($res){
      header('location:bookings.php');
   }
}}
?>


         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title"> bookings </h4>
                  
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
               
                                       <th>booking_id</th>
                                       <th>house_id</th>
                                       <th> user_id</th>
                                       <th> checkin</th>
                                       <th> checkout</th>
                                       <th> no_of_nights</th>
                                       <th> no_of_guests</th>
                                       <th> user_email</th>
                                       <th> user_fullname</th>
                                       <th> user_mobile</th>
                                       <th> payment_type</th>
                                       <th> total_price</th>
                                       <th> payment_status</th>
                                       <th> added_on</th>

                                     
                                    </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                     foreach($bookings as $list){?>
                                     <tr>
                                     <td><a  class="btn" href="orderDetails.php?id=<?php echo $list['booking_id']?>"><?php echo $seqID++;?></a></td>
                                     <td><?php echo $list['house_id'] ?></td>
                                     <td><?php echo $list['user_id'] ?></td>
                                     <td><?php echo $list['checkin'] ?></td>
                                     <td><?php echo $list['checkout'] ?></td>
                                     <td><?php echo $list['no_of_nights'] ?></td>
                                     <td><?php echo $list['no_of_guests'] ?></td>
                                     <td><?php echo $list['user_email'] ?></td>
                                     <td><?php echo $list['user_fullname'] ?></td>
                                     <td><?php echo $list['user_mobile'] ?></td>
                                     <td><?php echo $list['payment_type'] ?></td>
                                     <td><?php echo $list['total_price'] ?></td>
                                     <td><?php echo $list['payment_status'] ?></td>
                                     <td><?php echo $list['added_on'] ?></td>
                                     <td>
                                            <?php
                                         echo "<span class='badge badge-delete'><a href='?type=delete&id=".$list['booking_id']."'>Delete</a></span>&nbsp;";
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