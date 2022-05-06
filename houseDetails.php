<?php
$title = 'BBHE- house details';
   include('header.php');
  
   $error= '';
   $id = mysqli_real_escape_string($conn, $_GET['id']);
   $nights= '';
   $total ='';
   $ans = mysqli_query($conn, "SELECT COUNT(review_id) as reviews_count FROM `house_reviews` WHERE house_id = '$id'");
   $row = mysqli_fetch_array($ans);
   $reviews_count = $row['reviews_count'];
   $result = mysqli_query($conn, "SELECT ROUND(AVG(rating),2) AS rating FROM `house_reviews` WHERE house_id = '$id'");
   $row = mysqli_fetch_array($result);
   $rating = $row['rating'];
   $sql = "SELECT * FROM `houses` where houses.house_id = '$id'";
   $res = mysqli_query($conn, $sql)
   or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
   if(mysqli_num_rows($res)<0){
   echo 'no houses found in database';
   }else{
   while($row = mysqli_fetch_array($res)){
   $house_id = $row['house_id'];
   $house_name =  $row['house_name'];
   $house_reviews = $row['house_reviews'];
   $house_location = $row['house_location'];
   $house_features = $row['house_features'];
   $house_kitchen = $row['house_kitchen'];
   $house_baths = $row['house_baths'];
   $house_toilets = $row['house_toilets'];
   $house_rooms = $row['house_rooms'];
   $house_garage = $row['house_garage'];
   $house_short_desc = $row['house_short_desc'];
   $house_long_desc = $row['house_long_desc'];
   $house_max_guest = $row['house_max_guest'];
   $house_mainImg = $row['house_HeroImg'];
   $house_img1 = $row['house_img1'];
   $house_img2 = $row['house_img2'];
   $house_img3 = $row['house_img3'];
   $house_img4 = $row['house_img4'];
   $house_amenities = $row['house_amenities'];
   
   
   }
   }
   
   ?>
<?php
   $image_name = array();
   $sql="SELECT house_img FROM `house_imglib` WHERE house_id = '$house_id'";
   $res = mysqli_query($conn, $sql)
   			or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
   	if(mysqli_num_rows($res)<0){
   		echo 'no images found in database';
   	}else{
   		while($row = mysqli_fetch_array($res)){
   		$image_name = $row;	
   		}
   	}
   ?>
<main id="page-97">
   <div class="container">
   <h1 class="page-header"><?php  echo $house_name ?></h1>
   <div class="p"><span>Reviews: <?php  echo $rating . '  (' . $reviews_count . ')';  ?></span> <span> <small> <?php  echo $house_location?></small></div>
   </span>
   <!-- Photo Grid -->
<div class="row "> 
  <div class="column gallery-column">
  <a data-lightbox="mygallery" href="<?php  echo $house_mainImg ?>"><img style="margin-bottom:8.5vh;" src="<?php  echo $house_mainImg ?>" alt="house image" class="largeimg"></a>
  <a data-lightbox="mygallery" href="images/walk_view.jpg"><img  style="margin-top:-1.2vh;" src="images/walk_view.jpg" alt="walk view " class="largeimg"></a>
  </div>
  <div class="column gallery-column ">
  <a data-lightbox="mygallery" href="<?php  echo $house_img1 ?>"><img style="height:88%;" src="<?php  echo $house_img1 ?>" alt="" class="midImg imgOne"></a>
    
   
  </div>  
  <div class="column gallery-column ">
 
      <a data-lightbox="mygallery" href="<?php  echo $house_img2 ?>"><img style="height:88%;" src="<?php  echo $house_img2 ?>" alt="" class="midImg imgTwo"></a>
   
  </div>  
  <div class="column gallery-column ">
  <a data-lightbox="mygallery" href="<?php  echo $house_img3 ?>"><img src="<?php  echo $house_img3 ?>" alt="" class="midImg imgThree"></a>
      <a data-lightbox="mygallery" href="<?php  echo $house_img4 ?>"><img style="margin-top:1.9vh;" src="<?php  echo $house_img4 ?>" alt="" class="midImg imgFour"></a>
  
  </div>
 
</div>
   <div class="row">
      <div class="col-2">
         <h2>Entire <?php echo $house_name ?> hosted By BBHE </h2>
         <div class="house_info">
            <span> <i class="fas fa-sink"></i><?php  echo $house_kitchen ?> kitchen </span>
            <span><i class="fas fa-bath"></i> <?php  echo $house_baths ?> Baths</span>
            <span><i class="fas fa-restroom"></i> <?php  echo $house_toilets?> toilets</span>
            <span><i class="fas fa-door-open"></i> <?php  echo $house_rooms?> Bedrooms</span>  <br> <br>
            <span><i class="fas fa-warehouse"></i> <?php  echo $house_garage?> Garage</span> 
            <span><i class="fas fa-user-alt"></i> <?php  echo $house_max_guest?> Max Guests</span>
         </div>
         <div class="features">
            <?php  echo $house_features?>
         </div>
         <p class="info">
            <?php 
               $sql = "SELECT SUBSTR(house_long_desc, 1, 287) AS lessText FROM houses WHERE house_id = '$house_id'"; 
               $res = mysqli_query($conn, $sql)
               	or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
               while($row = mysqli_fetch_array($res)){
               	$lessText = $row['lessText'];
               	echo $lessText;
               }
               ?>
         </p>
         <p class=" info moreInfo" id="text">
            <?php	$sql = "SELECT SUBSTR(house_long_desc, 288, 1000) AS moreText FROM houses WHERE house_id = '$house_id'"; 
               $res = mysqli_query($conn, $sql)
               	or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
               while($row = mysqli_fetch_array($res)){
               	$moreText = $row['moreText'];
               	echo $moreText;
               }?>
         </p>
         <button id="textBtn" onclick="MoreText()">Read More</button>
         <h3>Payment note</h3>
         <p class="info">
            A 15% deposit is payable on confirmation of your booking with the balance due 30 days before
            your
            arrival
            A full refund is available with 10 days notice of cancellation in writing
            A 50% refund is available with less than 5 days notice of cancellation in writing
         </p>
         <div class="area">
            <h3>Sleeping Arrangements</h3>
            <div class="bedroom">
               <?php
                  $sql = "SELECT * FROM `house_rooms` WHERE house_id = '$id'";
                  $res = mysqli_query($conn, $sql)
                  or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
                  while($row = mysqli_fetch_array($res)){
                  $room_title = $row['room_title'];
                  $room_detail = $row['room_detail'];
                  $room_icon = $row['room_icon'];
                  ?>
               <div class="bed ">
                  <div class="text">
                     <img src="<?php echo $room_icon; ?>"
                        width="10px" alt="">
                     <h4><?php echo $room_title; ?></h4>
                     <p><?php echo $room_detail; ?></p>
                  </div>
               </div>
               <?php
                  } ?>
            </div>
         </div>
         <div class="amenities">
            <h3>Amenities</h3>
            <?= $house_amenities ;?>
            <?php 
               $dates = array();
               $sql = "SELECT DATE_FORMAT(house_date, '%d-%m-%Y') AS Date1 FROM house_schedule where `Avaiable` = 'N' AND house_id = '$id'";
               $res = mysqli_query($conn, $sql)
               			or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
               	if(mysqli_num_rows($res)<0){
               		echo 'no dates found in database';
               	}else{
               		while($row = mysqli_fetch_array($res)){
               		$dates[] =  $row['Date1'];	
               		}
               		// print_r($dates);
               	
               	
               }
               	
               
               ?>
            <div id="Holder">
               <?php //var_dump($dates)?>
               <h3>Current Availabilty</h3>
               <div id="Datepicker1" class="datepicker">
               </div>
               <script> 
                  var dateToday = new Date(); 
                  var array = <?php echo json_encode($dates) ?>;   
                  $(function() {
                  $('#Datepicker1').datepicker({
                  	language:'TR',
                     minDate: dateToday,
                  	numberOfMonths: 1,
                  	beforeShowDay: function(date){
                  		var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
                  		return [ array.indexOf(string) == -1 ]
                  	}
                  }); 			  
                  $('#from, #to').datepicker({
                  	language:'TR',
                     minDate: dateToday,
                  	numberOfMonths: 1,
                  	beforeShowDay: function(date){
                  		var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
                  		return [ array.indexOf(string) == -1 ]
                  	}
                  });		 
                  	});		 
                  
              
                             
               </script>
            </div>
         </div>
         <div class="col-2 after sticky">
            <?php
            
               if(isset($_POST['submit'])){
               	if(isset($_POST['checkin'])){$checkin = mysqli_real_escape_string($conn, $_POST['checkin']);} else{$checkin = '';}
               	
               		if(isset($_POST['checkout'])){$checkout = mysqli_real_escape_string($conn, $_POST['checkout']);} else{$checkout = '';}
               	if(isset($_POST['guests'])){$guests = mysqli_real_escape_string($conn, $_POST['guests']);} else{$guests = '';}
               	if($checkin == ''){
                     $error = 'you select ' . $_SESSION['guests'] ;
               		$error = 'Please select a check in date';
               	}
               	if($checkout == ''){
               		$error = 'Please select a check out date';
               	}
               	if($guests > $house_max_guest){
               		$error = 'Sorry this property can have ' .$house_max_guest.' max guest. ';
               	}
               	if($error){
               		$error .= ' Please correct issue';
               	}else{
                     $date=date_create($checkin);
                   $checkin_date=  date_format($date,"Y-m-d");
                  //  $checkin_date = date_add($checkin, date_interval_create_from_date_string("1 day"));
                     $date1=date_create($checkout);
                     $checkout_date=  date_format($date1,"Y-m-d"); 
               	$sql = "SELECT Rack_rate , COUNT(house_date) AS nights , SUM(Rack_rate) AS total FROM `house_schedule` WHERE house_date between '".$checkin_date."' and '".$checkout_date."' AND Avaiable = 'Y' AND house_id ='$id'";
               	$res = mysqli_query($conn, $sql)
               	or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
               } while($row = mysqli_fetch_array($res)){
               	$Rack_rate =  $row['Rack_rate'];
                  $total =  $row['total'];
                  $nights =  $row['nights'];	
                  $nights = $nights-1;
                  $total = $total - $Rack_rate;
               }
               	$_SESSION['house_id']=$house_id;
               	$_SESSION['check_in']=$checkin;
               	$_SESSION['check_in']=$checkin;
               	$_SESSION['check_out']=$checkout;
               	$_SESSION['guests']=$guests;
               	$_SESSION['nights']=$nights;
               	$_SESSION['total']= $total;
               	
               }
               		
               ?>
            <?php if(isset($total) && $total !== '') {?>
            <small>Total<span>
            <span class=" normalPrice">$<?php echo $total; ?></span>
            <?php }?>
            <?php if(isset($Distotal) && $Distotal !== '') {?>
            <span class=" SalePrice">$<?php echo $Distotal; ?></span> 
            <?php }?>
            </span> </small>
            <form action="houseDetails.php?id=<?php echo $id ;?>" method="post">
               <div class="date">
                  <div class="check-in">
                     <p>
                        <label for="from">Check-In</label>
                     </p>
                     <input type="text" id="from" name="checkin" value="<?php if(isset( $checkin )){ echo $checkin ;}?>">
                  </div>
                  <div class="check-out">
                     <p>
                        <label for="to">Check-Out</label>
                     </p>
                     <input type="text" id="to" name="checkout" value="<?php if(isset( $checkout )){ echo $checkout ;}?>">
                  </div>
               </div>
               <div class="guests">
                  <p>Guests </p>
                  <select name="guests" id="">
                     <?php 
                     
                     if ($_SESSION['guests']<$house_max_guest){
                        $_SESSION['guests'] = $_SESSION['guests'];
                     }else{
                        $_SESSION['guests'] = $house_max_guest;
                     }
                        ?>
                    
                     <option value="<?php if(isset($_SESSION['guests'])){echo $_SESSION['guests'];}?>"><?php if(isset($_SESSION['guests'])){echo $_SESSION['guests'];}?></option>
                     <?php
                        for($i =1; $i <10; $i++){
                        	echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                        ?>
                  </select>
                  <div class="error"><?php if(isset($error)){echo $error; }?></div>
               </div>
               <?php if( !isset($_POST['submit']) || $error == true) {?>
               <input type="submit" name="submit" value="Check Price">
               <?php }else{ ?>
               <a class="bookNowBtn" href="booking.php">Book now</a>
               <?php }?>
            </form>
            <?php if(isset($Rack_rate) && isset($nights)){ ?>
            <div class="pricing">
               <span>$<?php echo $Rack_rate; ?> per night x <?php echo $nights; ?> nights</span>
               <span>  <?php if(isset($total)){ echo '$' . $total ;} ?>  </span>
            </div>
            <?php } ?>
            <?php if(isset($total) && $total !== ''){ ?>
            <div class="total">
               <span>Total</span>
               <span>$ <?php echo $total; ?>  </span>
            </div>
            <?php } ?>
         </div>

         <!-- end of col-2after -->
      
      </div>
      <!-- end of .row div -->
   </div>
   <!-- end of container div -->


   <div class="container">
      <span class="span-margin"><i class="fas fa-star"></i>
      <?php 
         echo $rating . ' ' ;
         echo '(' . $reviews_count . ')';
         ?>  reviews</span>
      <div class="reviews" id="reviews">
         <?php
            $sql = "SELECT * FROM `house_reviews` where house_id = $id ORDER BY `house_reviews`.`review_id` DESC LIMIT 4";
            $res = mysqli_query($conn, $sql)
            	or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
            if(mysqli_num_rows($res)<0){
            	echo 'no reviews found for this property';
            }else{
            	while($row = mysqli_fetch_array($res)){
            		$user_pic =  $row['user_pic'];
            		$user_comment =  $row['user_comment'];
            		$user_name =  $row['user_name'];
            ?>
            
         <div class="review">
            <div class="img"><?php if($user_pic == '' || $user_pic == 'images/'){
               ?><img src="images/default.jpg" alt=""> 
               <?php }else{ ?>
               <img src="<?php  echo $user_pic ?>" alt="">
               <?php } ?>
            </div>
            <div class="name"><?php  echo $user_name ?></div>
            <div class="comment"><?php  echo $user_comment ?></div>
         </div>
         <?php
            }
            }
            ?>
      </div>
      <div class="buttons">
         <!-- storing reviews in database when form submitted-->
         <?php
            if(isset($_POST['Reviewsubmit'])){
            //creating function to remove spaces, lashes..
            function inputTesting($data){
            	
            	$data = stripslashes($data);
            	$data = htmlspecialchars($data);
            
            	return $data;
            
            }
            $nameErr='';
            $imageErr='';
            $reviewErr='';
            $ratingErr='';
            if (empty($_POST["name"])){
            	$nameErr = "Full Name is Required";
            } else {
               $name = inputTesting($_POST["name"]);
               if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
               $nameErr = "Only letters and white space allowed";
             }
            }
            
            if (empty($_POST["review"])){
            	$reviewErr = "Review is Required";
            	} else {
            	$review = inputTesting($_POST["review"]);
            	}
            	if (empty($_POST["rating"])){
            		$ratingErr = "Rating is Required";
            		} else {
            		$rating = inputTesting($_POST["rating"]);
            		if (!preg_match("/^[0-5]+(\.[0-9]{1,2})?$/",$rating)) {
            			$ratingErr = "Format is wrong please write like 4.7 ";
            		  }
            		}
            if($nameErr=='' && $reviewErr =='' && $ratingErr == ''){
               if(!isset($_FILES['image']['name'])){
            	$image = 'images/' ;
            	
               }else{
            	$image = 'images/' . $_FILES['image']['name'];
            	$dir = 'C:/wamp64/www/bbhe/images/'. $_FILES['image']['name'];
            	move_uploaded_file($_FILES['image']['tmp_name'], $image);
            	move_uploaded_file($_FILES['image']['tmp_name'], $dir);
               }
            	
            	
            	
            	$added_on = date('Y-m-d h:i:s');
            	$sql = "INSERT INTO house_reviews(`house_id`, `user_pic`, `user_comment`, `user_name`, `added_on`, `rating`)
            			VALUES('$house_id', '$image','$review', '$name','$added_on', '$rating')";
            	$res = mysqli_query($conn, $sql)
            	or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
            
            }
            }
            ?>
         <button class="reviewBtn" onclick="openForm()">Leave A Review</button>
         <button onclick="togglePopup()">Read All Reviews</button>
      </div>
      <div class="form-popup" id="myForm">
         <form action="houseDetails.php?id=<?php echo $id ;?>" method="post" class="form-container"  enctype="multipart/form-data">
            <button type="button" class="btn cancel" onclick="closeForm()"><i
               class="fas fa-times"></i></button>
            <h5>Leave a review </h5>
            <label for="name"><b>Full name</b></label>
            <input type="text" placeholder="Enter your full name" name="name" value="<?php if(isset($name)){ echo $name ;}?>">
            <br> <span class="field_error" ><?php if(isset($nameErr)){ echo $nameErr ;}?></span>
            <label for="img">Please Upload Your Image</label>
            <input type="file" name="image" id="img" value="<?php if(isset($image)){ echo $image ;}?>">
               <br> <span class="field_error" ><?php if(isset($imageErr)){ echo $imageErr ;}?></span>
            <label for="msg">Your review?</label>
            <textarea name="review" id="msg"><?php if(isset($review)){ echo $review ;}?></textarea>
            <br> <span class="field_error" ><?php if(isset($reviewErr)){ echo $reviewErr ;}?></span>
            <label for="rating"><b> Rating(Out of 5)</b></label>
            <input type="text" placeholder="Enter your rating" name="rating" value="<?php if(isset($rating)){ echo $rating ;}?>">
            <br> <span class="field_error" ><?php if(isset($ratingErr)){ echo $ratingErr ;}?></span>
            <button type="submit" name="Reviewsubmit" class="btn">Submit</button>
         </form>
      </div>
      <div class="popup" id="popup">
         <div class="overlay"> </div>
         <div class="content">
            <h3>All Reviews</h3>
            <div class="close-btn" onclick="togglePopup()">&times;</div>
            <div class="reviews">
               <?php 
                  $sql = "SELECT * FROM `house_reviews` where house_id = $id";
                  $res = mysqli_query($conn, $sql)
                  	or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
                  if(mysqli_num_rows($res)<0){
                  	echo 'no reviews found for this property';
                  }else{
                  	while($row = mysqli_fetch_array($res)){
                  		$user_pic =  $row['user_pic'];
                  		$user_comment =  $row['user_comment'];
                  		$user_name =  $row['user_name'];
                  ?>
               <div class="review">
                  <div class="img"><img src="<?php  echo $user_pic ?>" alt=""></div>
                  <div class="comment"><?php  echo $user_comment ?></div>
                  <div class="name"><?php  echo 'By ' . $user_name ?></div>
               </div>
               <?php
                  }
                  }
                  ?>
            </div>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="map">
         <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6469.56984936617!2d150.1954516761638!3d-35.82975227063954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b15eccfbd2892ad%3A0x6e37ab8cf20a643d!2sBarlings%20Beach!5e0!3m2!1sen!2sau!4v1602651710348!5m2!1sen!2sau"
            width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
            tabindex="0"></iframe>
      </div>
   </div>
</main>
<?php include('footer.php');
   ?>
</body>
</html>