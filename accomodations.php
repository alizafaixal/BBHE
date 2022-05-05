
<?php
$title = 'BBHE- Accomodations';
   include('header.php');

   ?>
   	 <div class="container">
     
	 <div class="row" id="house" style="height:auto;">
	 <div class="section3"  style="height:auto;">
	  <h2>All Stays at Barlings Beach Holiday Escapes</h2>
		<?php
		   $sql = "SELECT * FROM `houses` WHERE house_status = 1 ";
		   $res = mysqli_query($conn, $sql)
				   or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
		   if(mysqli_num_rows($res)<0){
			   echo 'no houses found in database';
		   }else{
			   while($row = mysqli_fetch_array($res))
					$rows[] = $row;
				 $count = 0;
		   foreach($rows as $row)
			   {
				   $house_id = $row['house_id'];
				 $house_name =  $row['house_name'];
				 $house_kitchen = $row['house_kitchen'];
				 $house_baths = $row['house_baths'];
				 $house_toilets = $row['house_toilets'];
				 $house_rooms = $row['house_rooms'];
				 $house_garage = $row['house_garage'];
				 $house_short_desc = $row['house_short_desc'];
				 $house_max_guest = $row['house_max_guest'];
                 $house_mainImg = $row['house_HeroImg'];
               
				  
				 ?>
		<div class="col-md-6" >
		   <div class="Imgslider">
			  <div class="w3-content w3-display-container"> 
				
					<img  class="firstSlider" src="<?php echo $house_mainImg?>" alt="">
					
			
			  </div>
		   </div>
		   <div class="text">
			  <a href="houseDetails.php?id=<?php echo $house_id?>">
				 <h3><?php  echo $house_name ?></h3>
			  </a>
			  <p><?php  echo $house_short_desc ; ?></p>
			  <ul class="printinline">
			  <li><span> <i class="fas fa-sink"></i><?php  echo $house_kitchen ?>kitchen </span></li>
			  <li><span><i class="fas fa-bath"></i> <?php  echo $house_baths ?> Baths</span></li>
			  <li><span><i class="fas fa-restroom"></i> <?php  echo $house_toilets ?> toilets</span></li>
			  <li><span><i class="fas fa-door-open"></i> <?php  echo $house_rooms ?> Bedrooms</span></li>
			  <li><span><i class="fas fa-warehouse"></i> <?php  echo $house_garage ?> Garage</span></li>
			  </ul>
			  <a href="houseDetails.php?id=<?php echo $house_id?>"><button>Rent now</button></a>
		   </div>
        </div>
     
       
 
   <?php
   }}?>
  </div>
   </div>
   </div>
   
   <?php
    include('footer.php');
   ?>
  