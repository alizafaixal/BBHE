<?php
$title = 'BBHE- Contact';

include('header.php');

		//creating function to remove spaces, lashes..
        function inputTesting($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
         
            return $data;

        }
        $fnameErr='';
        $mobileErr='';
        $emailErr='';
        $user_PreferredMethodErr='';
        $msgErr='';
		$error = '';
?>

<body>
   <div class="container contact_container">
       <div class="section">
<div class="row">
<div class="box-1">
<div class="contact_map">
	   <h3>Contact Info </h3>
	   <p><i class="fas fa-map-marker-alt"></i> Barlings Beach, New South Wales</p>
						<p><i class="fas fa-phone-volume"></i> +612 435 123 456</p>
						<p> <i class="fas fa-at"></i> johnandbarbara@bbhe.com.au</p>

		   <h3>Map here <i class="fas fa-hand-point-down"></i></h3>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3312.8150076915713!2d151.2041925152775!3d-33.86865812648289!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12ae3f6e3ef5d7%3A0xebf0ac7c5ecf6239!2sKing%20St%2C%20Sydney%20NSW%202000!5e0!3m2!1sen!2sau!4v1599459505802!5m2!1sen!2sau"
            style="border:0;width:100%;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		 </div>
		 <div class="contact_text">
       <h3>How to get to Barlings Beach</h3>
        <p>
            It is easy to find our accommodation. Drive south from Sydney along the M1 then the A1 to Mogo then
            turn left at the Tomakin Road intersection
            Another option is to fly from Sydney airport to Moruya airport. We offer transfers to and from Moruya
            airport for a small fee.
		</p>
	
       </div> 
  
		
</div>
<div class="box-2">
<h1>Contact us</h1>
		 	<!--validating form data and  sending data to the database table user_messages when form submitted -->
     <?php
						if(isset($_POST['submit'])){
							if (empty($_POST["fullname"])){
								$fnameErr = "Full Name is Required";
							} else {
							   $fname = inputTesting($_POST["fullname"]);
							   if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
							   $fnameErr = "Only letters and white space allowed";
							 }
						   }
						
							if(empty($_POST["email"])){
								$emailErr = "Email is required";
						   } else{
							   $email = inputTesting($_POST["email"]);
							   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
							   $emailErr = "Invalid email format";
							 }
						   }
						   if (empty($_POST["mob"])){
							   $mobileErr ="Mobile is required";
						   } else{
								$mobile = inputTesting($_POST["mob"]);
						   }
						   if (empty($_POST["user_PreferredMethod"])){
							   $user_PreferredMethodErr ="User Preferred Method is required";
						   } else{
							   $user_PreferredMethod = inputTesting($_POST["user_PreferredMethod"]);
						   }
						  
						   if (empty($_POST["msg"])){
							   $msgErr = "Please write your message, cannot send an empty message";
						   } else{ 
							   $msg = inputTesting($_POST["msg"]);
						   }
					   
                            if(isset($_SESSION['USER_ID'])){$user_id = mysqli_real_escape_string($conn, $_SESSION['USER_ID']);} else{$user_id = '0';}
                            if($fnameErr == '' && $emailErr  == '' && $mobileErr  == '' && $user_PreferredMethodErr  == '' && $msgErr  == ''){
							$added_on = date('Y-m-d h:i:s');
							$sql = "INSERT INTO user_messages(user_id,user_fullName,user_number,user_email, user_PreferredMethod,user_comments,added_on)
									VALUES('$user_id', '$fname','$mobile', '$email','$user_PreferredMethod','$msg','$added_on')";
							  $res = mysqli_query($conn, $sql)
							  or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
							if($res){
								$error = "You message was sent";
							}else{
								$error = "Unable to send message, Please try again later";
							}	  

						
							}
						if($error == "You message was sent"){
							$fname = '';
							$email = '';
							$mobile = '';
							$msg = '';
						}
					}?>
     <form action="contact.php" method="post">
		 <span>required *</span>

     <label for="name"><b>Full name*</b></label>
							<input type="text" placeholder="Enter your full name" name="fullname" value="<?php if(isset($fname)){ echo $fname ;}?>" >
							<br> <span class="field_error" id="fnameErr"><?php if(isset($fnameErr)){ echo $fnameErr ;}?></span>
							<label for="email"><b>Email*</b></label>
							<input type="text" placeholder="Enter Email" name="email" value="<?php if(isset($email)){ echo $email ;}?>"  >
							<br> <span class="field_error" id="emailErr"><?php if(isset($emailErr)){ echo $emailErr ;}?></span>
							<label for="mob"><b>Phone*</b></label>
							<input type="text" placeholder="Enter your mobile number" name="mob"  value="<?php if(isset($mobile)){ echo $mobile ;}?>" >
							<br> <span class="field_error" id="mobileErr"><?php if(isset($mobileErr)){ echo $mobileErr ;}?></span>
							<label for="prefer">How should we contact you?*</label> 
							<input id="prefer" type="checkbox" name="user_PreferredMethod" value="mobile" >Mobile
							<input type="checkbox" name="user_PreferredMethod" value="email">Email 
							<br> <span class="field_error" id="user_PreferredMethodErr"><?php if(isset($user_PreferredMethodErr)){ echo $user_PreferredMethodErr ;}?></span>
							<label for="msg">Your question?</label>
							<textarea name="msg" id="msg"> <?php if(isset($msg)){ echo $msg ;}?></textarea>
                            <br> <span class="field_error" id="msgErr"><?php if(isset($msgErr)){ echo $msgErr ;}?></span>
                            <br> <span class="field_error" id="err"><?php if(isset($error)){ echo $error ;}?></span> <br>
							<input type="submit" name="submit" class="btn">
							

                        </form>

      
	</div>
	

</div>
</div>
   </div>
    <?php
include('footer.php');
?>