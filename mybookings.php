<?php
$title = 'BBHE- My bookings';
include('header.php');

$uid =   $_SESSION['USER_ID'];
$res = mysqli_query($conn, "select * from bookings where user_id= '$uid'");
while($row = mysqli_fetch_assoc($res)){
  $checkin = $row['checkin'] ;
  $checkout = $row['checkout'] ;

}
//if(!isset($_SESSION['USER_LOGIN'])){
//	?>
	<script>
	//window.location.href='index.php';
  </script>
  
  <?php
 
//}
if(isset($_GET['type']) && $_GET['type'] != ''){
  $type = mysqli_real_escape_string($conn,$_GET['type']);

if($type == 'cancel'){
  $booking_id = mysqli_real_escape_string($conn,$_GET['booking_id']);
  $sql = "UPDATE bookings SET booking_status = 'cancelled' WHERE user_id = '$uid' and booking_id = '$booking_id'";
  mysqli_query($conn, $sql);
  $update = "UPDATE house_schedule SET Avaiable = 'Y' WHERE house_date BETWEEN '$checkin' AND '$checkout'";
  $res= mysqli_query($conn,$update)
  or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);


}
// if($type == 'uncancel'){
//   $booking_id = mysqli_real_escape_string($conn,$_GET['booking_id']);
//   $sql = "UPDATE bookings SET booking_status = 'processing' WHERE user_id = '$uid' and booking_id = '$booking_id'";
//   mysqli_query($conn, $sql);
// }
}

?>

<div class="container table_container">
<div class="table_header">
          <caption>My bookings</caption> 
            <span> Hello <?php echo $_SESSION['USER_NAME'] ?></span>
  </div>

        <table id="bookings">
  
          <thead>
          <tr>
                <th>
                    Booking ID
                </th>
                <th> checkin</th>
                <th> checkout</th>
                <th>Booking status</th>
                <th>Payment status</th>
            
              <th >Other options</th>
            
            </tr>
          </thead>
          <tbody>
           
            <tr>
                <?php
               
                $res = mysqli_query($conn, "select * from bookings where user_id= '$uid'");
                while($row = mysqli_fetch_assoc($res)){
                  ?>
                  <tr>
                    <td><a  class="btn" href="mybookingDetails.php?id=<?php echo $row['booking_id']?>"><?php echo $row['booking_id']?></a></td>
                
                    <td><?php echo $row['checkin']?></td>
                    <td><?php echo $row['checkout']?></td>
                    <td>
                    <?php  echo $row['booking_status'];?>
           
                  </td>
                    <td><?php  echo 
                     $row['payment_status'];?></td>
                 
                   
                  <td><a href="mybookingDetails.php?id=<?php echo $row['booking_id']?>">View</a> <br>
             
                    <?php if($row['booking_status'] == 'pending'){?>
                    <a href="?type=cancel&id=<?php echo $row['user_id']?>&booking_id=<?php echo $row['booking_id'] ?>">Cancel Trip</a> <br>
                    <?php } ?>
 
                 <?php }?>
                 
          
            </tr>
                </tbody>
            
        </table>
</div>
<?php 

include('footer.php');
?>