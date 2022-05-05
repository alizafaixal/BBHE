<!DOCTYPE html>
<html lang="en">
	<?php
	require_once('dbConn.php');
	session_start();
	?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Aliza Faisal, alizafaisal.mq1199@gmail.com">
	<title><?php echo $title ;?></title>
	<!-- CSS only -->
	<link rel="stylesheet" href="bbhe.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
	<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
	<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
	<link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
<script src="jQueryAssets/jquery-1.11.1.min.js"></script>
<script src="jQueryAssets/jquery.ui-1.10.4.datepicker.min.js"></script>
<script src="script.js">	</script>

	

</head>

<body>

	<!-- page header with navbar that has logo and navigation links -->
	<div class="header">
		<div class="navbar">
			<div class="logo">
				<a href="index.php"> <img src="images/BBHE_logo.png" alt="Barlings Beach Holiday Escapes logo"></a>
			</div>
			<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
			<nav class="topnav" id="myTopnav">

				<a href="index.php">Home</a>
				<a href="index.php#localHighlights">local Highlights</a>
					
					<div class="dropdown">
						<button class="dropbtn">Accomodation 
						<i class="fa fa-caret-down"></i>
						</button>
						<div class="dropdown-content">
						<?php
							$sql = "SELECT house_id, house_name FROM houses";
							$res = mysqli_query($conn, $sql)
									or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);

							if(mysqli_num_rows($res)<0){
								echo 'no houses found in database';
							}else{
								while($row = mysqli_fetch_array($res)){
								$house_id =  $row['house_id'];
								$house_name =  $row['house_name'];
								echo "<a href='houseDetails.php?id=".$house_id. "'>" . $house_name ." </a>";
							}}	
							 ?>
						
							</div>
					</div> 

					<a href="contact.php">Contact us</a>
					<div class="dropdown">
					<?php
					if(isset($_SESSION['USER_LOGIN'])){?>
						<button class="dropbtn"><?php echo $_SESSION['USER_NAME'] ?>
						<i class="fa fa-caret-down"></i>
						</button>
						<div class="dropdown-content">
					
						<a href="mybookings.php">My bookings</a>	
						<a href="logout.php">Logout</a>
						</div>
				
					<?php }else{
					
						echo '<a href="login.php">Login</a>';
					}
					?>
				</div>	
				
			</nav>
		</div>
	</div>
