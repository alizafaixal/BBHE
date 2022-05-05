
<?php
$title = 'BBHE- My bookings details';
include('header.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
$id = $_GET['id'];
$uid =   $_SESSION['USER_ID'];
$res = mysqli_query($conn, "select * from bookings where booking_id= '$id'");
while($row = mysqli_fetch_assoc($res)){
  $house_id =  $row['house_id'];
  $checkin =  $row['checkin'];
  $checkout =  $row['checkout'];
  $nights =  $row['no_of_nights'];
  $guests =  $row['no_of_guests'];
  $payment_status =  $row['payment_status'];
  $total =  $row['total_price'];
   $booking_status =  $row['booking_status'];
   $comments =  $row['comments'];
}
$res = mysqli_query($conn, "SELECT house_name, house_HeroImg FROM `houses` WHERE `house_id` = '$house_id'");
while($row = mysqli_fetch_assoc($res)){
    $house_name =  $row['house_name'];
    $house_HeroImg =  $row['house_HeroImg'];
}
?>
   <div class="container booking_container">
    <h1 style="margin:40px 0px;" >My Booking Details</h1>
   
         <div class="row">
             <div class="column-2">
                 <img src="<?php echo $house_HeroImg ?>" alt="">
             </div>
             <div class="column-2 booking_details">
                 <p>House name: <?php if(isset($house_name)){ echo $house_name;} ?></p>
             <p>Arrival date: </p><p><?php if(isset($checkin)){ echo $checkin;} ?></p>
                <p>  Departure date :</p> <p><?php if(isset($checkout)){ echo $checkout;} ?> </p>
            
            <p>  Number of guests: </p><p><?php if(isset($guests)){ echo $guests;}?>  </p> 
            <p>  Number of nights to stay:<?php if(isset($nights)){ echo $nights;}?>  </p> 
            <p>  Total rent: <?php if(isset($total)){ echo $total;}?>  </p>
             </div>
         </div>
      
       <div class="button_Section">
       <a href="mybookings.php"  class="more">Go back</a>
    
       </div>
    </div>
    <!-- <a href="order_pdf.php?id= -->
    <?php //echo $id ;?>
    <!-- " class="more">Download Booking Pdf </a>   -->
 