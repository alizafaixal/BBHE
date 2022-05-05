<?php
$title = 'BBHE- Home';
include('header.php');

?>
	<!-- start of website home page main template -->
	<main id="pageid-99">
		<!-- banner with call to action button -->
		<div class="banner">
			<div class="banner_text">
				<h1>Find your Perfect Holiday House</h1>
				<p>Looking to rent a place near Barlings Beach to enjoy your holiday. Explore our holiday deals.</p>
				<a href="#house">Explore stays</a>
			</div>
		</div>
		<!-- company desciption section -->

		<div class="container">
			<div class="flexbox">
				<div class="Imgslider">
					<!-- <button class="prev round" onclick="prev()">&#8249;</button> -->
					<img class="img" src="images/beach3.jfif" alt="barling beach images">
					<!-- <button class="next round" onclick="next()">&#8250;</button> -->
				</div>
				<div class="aside">
					<h2>About Barlings beach holiday escapes</h2>
					<div class="comp_info">
						<p><i class="fas fa-map-marker-alt"></i> Barlings Beach, New South Wales</p>
						<p><i class="fas fa-phone-volume"></i> +612 435 123 456</p>
						<p> <i class="fas fa-at"></i> johnandbarbara@bbhe.com.au</p>
					</div>
					<a href="index.php#contact">Message Host</a>
				</div>
			</div>
		</div>
		<!-- <img src="images/walk_view.jpg" alt=""> -->
		<!--		description box-->
		<div class="container">
			<div class="descBox">
				<p>We are a family-owned business offering short term holiday stays in the seaside town of Barlings
					Beach on the South Coast of NSW. Barlings Beach is located just minutes from the township of Mogo,
					or a 20-minute drive south of Batemans Bay. </p>
				<p id="Moretext">Our business has three properties available for short-term holiday rental: a luxury townhousesuitable for 4 people , a comfortable seaside holiday house suitable for 4-6 people and Barlings Beach Shack for maxium of 8 guests .</p>
				<button onclick="readMore()" id="ReadMore">Read More</button>
			</div>
		</div>
		 <!--		stays -->
		 <div class="container">
     
	 <div class="row" id="house">
	 <div class="section3">
	  <h2>Stays at Barlings Beach Holiday Escapes</h2>
		<?php
		   $sql = "SELECT * FROM `houses` WHERE house_status = 1 LIMIT 2";
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
		<div class="col-md-6">
		   <div class="Imgslider">
			  <div class="w3-content w3-display-container"> 
				 <?php	 
					$sqli='SELECT house_img FROM `house_imglib` WHERE house_id ='.$house_id; 
					$res = mysqli_query($conn, $sqli);
					
					foreach($res as $image_names){ 
								echo '<img class="mySlides'.$house_id.'" class="firstSlider" src="'.$image_names['house_img'].'" alt="house images">';
							}
					?>
				 <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1,<?php echo $count;?>)">&#10094;</button>							
				 <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1,<?php echo $count;?>)">&#10095;</button> 
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
		   $count +=1;
			   }
			   
		   }
		   ?> 
		<script type="text/javascript">

		 $(document).ready(function() {
			   $('#slider1').slajder();
			   $('#slider2').slajder();
		   });	
							   var slideIndex = [1, 1];
		   var slideId = ["mySlides1", "mySlides2"]
		   showDivs(1, 0);
		   showDivs(1, 1);
		   
		   function plusDivs(n, no) {
			 showDivs(slideIndex[no] += n, no);
		   }
		   
		   function showDivs(n, no) {
			 var i;
			 var x = document.getElementsByClassName(slideId[no]);
			 if (n > x.length) {
			   slideIndex[no] = 1
			 }
			 if (n < 1) {
			   slideIndex[no] = x.length
			 }
			 for (i = 0; i < x.length; i++) {
			   x[i].style.display = "none";
			 }
			 x[slideIndex[no] - 1].style.display = "block";
		   }
							   
		</script> 
	 </div>
  </div>
  </div>
		<div class="small_container">
			<h3>Why choose</h3>
			<h4>Barlings beach holiday escapes</h4>
			<div class="row">
				<div class="col">
					<div class="col_text">
					<div><i class="fas fa-wifi"></i></div>
						<div><h5>Free Wifi</h5></div>

					
					</div>
				</div>
				<div class="col">
					<div class="col_text">
					<div>	<i class="fas fa-utensils"></i></div>
						<div><h5>Breakfast packs</h5></div>
					
					</div>
				</div>
				<div class="col">
					<div class="col_text">
						<div><i class="fas fa-glass-cheers"></i></div>
						<div><h5>Picnic Hampers</h5></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="col_text">
				<div><i class="fas fa-hotdog"></i></div>
						<div ><h5>BBQ packs</h5></div>
					
					</div>
				</div>
				<div class="col">
					<div class="col_text">
						<div><i class="fas fa-dog"></i></div>			
		   				<div>	<h5>Dog walking </h5></div>
					</div>
				</div>
				<div class="col">
					<div class="col_text">
						<div><i class="fas fa-hand-holding-heart"></i></div>
		   				<div>	<h5>No booking fees</h5></div>
					
					</div>
				</div>
			</div>

		</div>
		<div id="localHighlights" class="container">
        <h4>LOCAL HIGHLIGHTS</h4>
        <div class="wrap">
            <div class="boxes">
                <!-- local hightlight number 1 -->
                <div class="box">
                    <p> <img src="images/Mogo-Wildlife-Park_Logo.jpg" alt="Mogo Wildlife Park Logo"></p>
                    <div class="box_text">
						<h5>Mogo Zoo</h5>
						<span><i class="fas fa-external-link-alt"></i> https://mogozoo.com.au/</span>
                        <p>Mogo Zoo is a privately owned zoo with a large collection of exotic animals on display. They
                            offer animal
                            feeding sessions and guided tours throughout the year. It’s located just 10 minutes drive
                            from
                            Barlings
                            Beach</p>
                    </div>

                </div>
                <!-- local hightlight number 2 -->
                <div class="box">
                    <p> <img src="images/Beach_and_Bush_Walks.jfif" alt="Beach and Bush Walks"></p>
                    <div class="box_text">
                        <h5>Beach and Bush Walks</h5>
                        <p>Local walking tracks are available for all ages and abilities. The beach walks follow the
                            coastline to many
                            coves, inlets and rocky outcrops. For the more serious walker, there are inland bush tracks
                            that
                            meander
                            upwards to amazing views of the coastline</p>
                      
                    </div>

                </div>
                <!-- local hightlight number 3-->
                <div class="box">
                    <p> <img src="images/Markets.jfif" alt="Markets and Galleries near Barling Beach"></p>
                    <div class="box_text">
                        <h5>Markets and Galleries</h5>
                        <p>Moruya markets are held each Saturday and feature local art, home-made goodies, ceramics, jewelleryand clothing. Local galleries are in abundance throughout the area. Many of these galleries have cafes that supply visitors with coffee and yummy cakes</p>
                    </div>

                </div>
            </div>
            <div class="boxes">
                <!-- local hightlight number 4 -->
                <div class="box">
                    <p> <img src="images/Restaurants.jfif" alt="Restaurants  near Barling Beach"></p>
                    <div class="box_text">
                        <h5>Wineries and Restaurants</h5>
                        <p>There are several wineries to visit in the area - offering cellar door sales, restaurants, cafes and tours. Along the way discover a foodie’s paradiseAn acclaimed restaurant in nearby Moruya offers tables with river views and locally sourced food treats</p>
                     
                    </div>
                </div>
                <!-- local hightlight number 5-->
                <div class="box">
                    <p> <img src="images/Shopping.jfif" alt="Beach and Bush Walks"></p>
                    <div class="box_text">
                        <h5>Shopping Adventures in Mogo</h5>
                        <p>A visit to nearby Mogo will not disappoint. Bookshops, giftware, home living and of course the odd handbag or that "must have" top are yours to purchase</p>
                    </div>
                </div>
                <!-- local hightlight number 6 -->
                <div class="box">
                    <p> <img src="images/Water_Sports.jfif" alt="Beach and Bush Walks"></p>
                    <div class="box_text">
                        <h5>Water Sports</h5>
                        <p>There’s endless fun for all. Sailing, fishing, kayaking, paddle boarding, snorkeling and surfing are yours to enjoy in and around Barlings Beach</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

		<div class="section">
			<h3>More resources</h3>
			<div class="row">
				<div class="box">
					<h4>Read the testimonals</h4>
					<p>Read what people say about their experience at bbhe<button onclick="togglePopup()"><i
								class="fas fa-arrow-right"></i></button></p>
					<div class="popup" id="popup">
						<div class="overlay"> </div>
						<div class="content">
							<h3>testimonals</h3>
							<div class="close-btn" onclick="togglePopup()">&times;</div>
							<div class="reviews">
								<div class="review">
									<div class="img"><img src="images/fb1.jpg" alt=""></div>
									<div class="comment">"We loved our holiday in your luxury townhouse. We will
										definitely stay longer
										next time!"</div>
										<div class="name">Sonia</div>
								</div>
								<div class="review">
								
									<div class="img"><img src="images/fb2.jpg" alt=""></div>
									<div class="comment">"This accommodation is close to everything. Our walks along
										the beach were
										amazing"</div>
										<div class="name">Luke</div>
								</div>
							</div>
							<div class="reviews">
								<div class="review">
								
									<div class="img"><img src="images/fb3.jpg" alt=""></div>
									<div class="comment">"Your attention to detail made our stay so relaxed and
										comfortable. We want to move in!"
									</div>
									<div class="name">Anna</div>
								</div>
								<div class="review">
									<div class="img"><img src="images/fb4.jpg" alt=""></div>
									<div class="comment">"What a magical stay at such an amazing place. Completely
										self-contained and very private. We loved it
										and plan to return again and again."</div>
										<div class="name">Saif</div>
								</div>

							</div>
							<div class="reviews">
							<div class="review">
								
									<div class="img"><img src="images/fb5.jpg" alt=""></div>
									<div class="comment">"A perfect get-away. We saw a migrating whale from the beach. Never felt so delighted!" </div>
									<div class="name">Huda</div>
								</div>
								<div class="review">
									
									<div class="img"><img src="images/fb6.jpg" alt=""></div>
									<div class="comment">"A few minutes walk to the beach with one of your   picnic hampers - so enjoyable and relaxing" </div>
									<div class="name">Salman</div>
								</div>
							</div>
							<a href="houseDetails.php?id=1#reviews">Read Reviews of Houses</a>
						</div>
					</div>

				</div>
				<div id="contact" class="box">
					<h4>Contact the owner</h4>
					<p>if you have any question, you can directly message the owner here now <a href="contact.php"><i class="fas fa-arrow-right"></i></a></p>
						

				
					</div>
				</div>
			</div>
		</div>
	</main>
<?php
include('footer.php');
?>