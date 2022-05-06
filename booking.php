<?php
$title = 'BBHE- Booking';
include('header.php');
$html = "<button  class='refreshBtn'> Continue to checkout </button>";

function clean($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if(!isset($_SESSION['house_id'])){
    header('location:index.php');
}else{

$house_id = $_SESSION['house_id'];
$checkin = $_SESSION['check_in'];
$checkout=	$_SESSION['check_out'];
$date=date_create($checkin);
$checkin_date='';$checkout_date='';
$checkin_date=  date_format($date,"Y-m-d");
$date1=date_create($checkout);
$checkout_date=  date_format($date1,"Y-m-d");
$guests= 	$_SESSION['guests'];
$nights = $_SESSION['nights'];
$total = $_SESSION['total'];
$fnameerr = '';
$lnameerr = '';
$mobileErr = '';
$PaymentMethod= '';
$usernameErr='';
$nameErr='';
$emailErr='';
$passwordErr='';
$loginpasswordErr='';
$timeTocallErr = '';
$sql="SELECT house_name, house_HeroImg FROM `houses` WHERE house_id = '$house_id'";
				$res = mysqli_query($conn, $sql)
							or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
					if(mysqli_num_rows($res)<0){
						echo 'no house HeroImg found in database';
					}else{
						while($row = mysqli_fetch_array($res)){
                        $house_HeroImg = $row['house_HeroImg'];	
                        $house_name = $row['house_name'];	
						}
        
           }   
      }

    ?>
    <div class="container booking_container">
    <h1>Booking Details</h1>
         <div class="row">
             <div class="column-2">
                 <img src="<?php echo $house_HeroImg ?>" alt="">
             </div>
             <div class="column-2 booking_details">
                 <p>House name: <?php if(isset($house_name)){ echo $house_name;} ?></p>
             <p>Arrival date: </p><p><?php if(isset($_SESSION['check_in'])){ echo $checkin_date;} ?></p>
                <p>  Departure date :</p> <p><?php if(isset($_SESSION['check_out'])){ echo $checkout_date;} ?> </p>
            
            <p>  Number of guests: </p><p><?php if(isset($_SESSION['guests'])){ echo $_SESSION['guests'];}?>  </p> 
            <p>  Number of nights to stay:<?php if(isset($_SESSION['nights'])){ echo $_SESSION['nights'];}?>  </p> 
            <p>  Total rent: <?php if(isset($_SESSION['total'])){ echo $_SESSION['total'];}?>  </p>
             </div>
         </div>
    </div>
    <?php 	if(!isset($_SESSION['USER_LOGIN'])){?>
						
       <div class="container form_container">
       <h1>Create an account</h1>
    
  
            <div class="row">
                <div class="col">
                <?php
                  if(isset($_POST['Logsubmit'])){
                    $name = mysqli_real_escape_string($conn, $_POST['login_username']);
                    $loginpassword = mysqli_real_escape_string($conn, $_POST['login_password']);
                    if(empty($name)){
                        $nameErr = "<p> user name is required </p>";
                    }
                    if(empty($loginpassword)){
                        $loginpasswordErr = "<p> password is required </p>";
                    }
                    if($nameErr == ''  && $loginpasswordErr == ''){
                    $sql = "SELECT * FROM end_users WHERE username = '$name' AND user_password = '$loginpassword' ";
                    $res = mysqli_query($conn, $sql)
                    or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
                    $count = mysqli_num_rows( $res);
                    if($count>0){
                        $row = mysqli_fetch_assoc($res);
                        $user_id = $row['user_id'];
                        $_SESSION['USER_LOGIN'] ='yes';
                        $_SESSION['USER_ID'] =$row['user_id'];
                        $_SESSION['USER_NAME'] =$row['username'];
                        $logError= 'You are now logged in' . $html;
                       
                    }else{
                        $logError= 'please enter correct details';
                    }
                }
                  }
                ?>
                    <form id="LoginForm" method="post">
                    <h2>Login</h2>
                    <span>Required field has (*)</span>
                        <label for="login_username">Username*: </label><input type="text" name="login_username" id="login_username" placeholder="Username" value="<?php if(isset($name)){ echo $name ;}?>">  
                         <br> <span class="field_error" id="login_username_error"><?php if(isset($nameErr)){ echo $nameErr ;}?></span>
                     <label for="login_password">Password*
                         : </label> <input type="password"   name="login_password" id="login_password" placeholder="password" value="<?php if(isset($password)){ echo $password ;}?>">
                        <br> <span class="field_error" id="login_password_error"><?php if(isset($loginpasswordErr)){ echo $loginpasswordErr ;}?>
                   </span> <br> 
                      
                        <input type="submit" name="Logsubmit" class="btn" value="Login"><br>
                       
                            <p class="field_error login_msg"><?php if (isset($logError)){ echo $logError ;}?></p>
                        </form>
                </div>
              
                <div class="col">
                <?php
                  if(isset($_POST['Regsubmit'])){
                    $username = mysqli_real_escape_string($conn, $_POST['reg_username']);
                    $email = mysqli_real_escape_string($conn, $_POST['reg_email']);
                    $password = mysqli_real_escape_string($conn, $_POST['reg_password']);
                    if(empty($username)){
                        $usernameErr = "<p> user name is required </p>";
                    }
                    if(empty($email)){
                        $emailErr = "<p> email is required </p>";
                    }
                    if(empty($password)){
                        $passwordErr = "<p> password is required </p>";
                    }
                    if($usernameErr == '' && $emailErr == '' && $passwordErr == ''){
                            $count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM end_users WHERE user_email = '$email'")) ;
                            if($count>0){
                                $Regerror = 'This email is already registered, Please login';
                                
                            }else{
                                $insert = "INSERT INTO end_users (username,user_email,user_password) VALUES('$username', '$email', '$password')";
                                $res = mysqli_query($conn, $insert)
                                or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
                                $Regerror= 'You are now a member, Please login';
                        }
                    }
                }
            ?>
                    <form id="RegForm"  method="post">
                    <span>Required field has (*)</span>
  
                    <h2>Register</h2>
                    <label for="reg_username">Username*: </label><input type="text"  name="reg_username" id="reg_username" placeholder="Username"  value="<?php if(isset($username)){ echo $username ;}?>">
                                <br> <span class="field_error" id="reg_username_error"><?php if(isset($usernameErr)){ echo $usernameErr ;}?></span>
                                <label for="reg_email">Email*: </label> <input type="email"  name="reg_email" id="reg_email" placeholder="Email" value="<?php if(isset($email)){ echo $email ;}?>">
                                <br> <span class="field_error" id="reg_email_error"><?php if(isset($emailErr)){ echo $emailErr ;}?></span>
                                <label for="reg_password">Password*: </label><input type="password" name="reg_password" id="reg_password" placeholder="password" value="<?php if(isset($password)){ echo $password ;}?>">
                                <br> <span class="field_error" id="reg_password_error"><?php if(isset($passwordErr)){ echo $passwordErr ;}?></span>
                                <input type="submit" name="Regsubmit" class="btn" value="Register">
                                <p class="field_error register_msg"><?php if (isset($Regerror)){ echo $Regerror ;}?></p>
                            </form>
   
                </div>
            </div>
       </div>
       <?php }else{
       if(isset($_POST['userFormSubmit'])){
        if(isset($_POST['fname'])){$fname = clean($_POST['fname']);}
        if(isset($_POST['lname'])){$lname = clean($_POST['lname']);}
        if(isset($_POST['mobile'])){$mobile = clean($_POST['mobile']);}
        if(isset($_POST['comments'])){$comments = clean($_POST['comments']);}
        if(isset($_POST['email'])){$email = clean($_POST['email']);}
        $fullname = $fname . ' ' . $lname;
        $user_id =  $_SESSION['USER_ID'];
        if(isset($_POST['timeTocall'])){$timeTocall = clean($_POST['timeTocall']);}
        $booking_status = 'pending';
        $payment_status = 'pending';
        if(empty($fname)){
            $fnameerr = "<p> First Name is required </p>";
        }
        if(empty($lname)){
            $lnameerr = "<p> Last Name is required </p>";
        }
        if(empty($timeTocall)){
            $timeTocallErr = "<p> Please tell us time when we can call you </p>";
        }
        if(empty($mobile)){
            $mobileErr = "<p> Mobile Number is required </p>";
        // }elseif (!preg_match("\b([\+-]?\d{2}|\d{4})\s*\(?\d+\)?\s*(?:\d+\s*)+\b", $mobile)){
        //     $mobileErr = "<p> Mobile Number should be in the right format</p>";
        }
        if(empty($email)){
            $emailErr = "<p> Email  is required </p>";
        }
        if($fnameerr == '' && $lnameerr == '' && $mobileErr == '' && $timeTocallErr == '' && $emailErr == ''){
        
            $added_on = date('Y-m-d h:i:s');
           
            $sql = "INSERT INTO `bookings` ( `house_id`, `user_id`, `checkin`, `checkout`, `no_of_nights`, `no_of_guests`, `user_email`, `user_fullname`, `user_mobile`, `total_price`, `added_on`, `timeTocall`, `booking_status`, `payment_status`, `comments`) VALUES
             ('$house_id','$user_id','$checkin_date','$checkout_date','$nights', '$guests', '$email','$fullname','$mobile', '$total', '$added_on', '$timeTocall' ,'$booking_status', '$payment_status' ,'$comments')";
            mysqli_query($conn,$sql)
            or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
          
        
        $booking_id = mysqli_insert_id($conn); 

            mysqli_free_result($res);
             $insert = "INSERT INTO bookings_details (`booking_id`,`booked_dates`, `rack_rate`, `orignal_rate`, `house_id`) SELECT $booking_id, house_date ,Rack_rate,original_rate, house_id FROM `house_schedule` WHERE house_date BETWEEN '$checkin_date' AND '$checkout_date' AND Avaiable = 'Y' and house_id = '$house_id'";
            mysqli_query($conn,$insert)
             or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
             $update = "UPDATE house_schedule SET Avaiable = 'N' WHERE house_date BETWEEN '$checkin_date' AND '$checkout_date' AND house_id = '$house_id'";
             $res= mysqli_query($conn,$update)
             or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
             if($res){?>
             	<script>
                window.open
 (
  'mail.php?booking_id=<?php echo $booking_id; ?>',
//   '_blank' // <- This is what makes it open in a new window.
 );
// window.location.href="thankyou.html";



</script>
                 
             <?php  }
                }
    
       }
    ?>
      <div class=" container booking_details_container">
      <h2>Booking Form</h2>
     
  
        <form action="" method="post" class="row">
        <div class="col">
            <h3>Personal Details</h3>
            <span>Required field has (*)</span>
        <label for="fname">First Name*</label>
            <input type="text" id="fname" name="fname" value="<?php if(isset($fname)){ echo $fname ;}?>"> <br>
            <span><?php if(isset($fnameerr)){ echo $fnameerr ;}?></span>
            <label for="lname">Last Name*</label>
            <input type="text" id="lname" name="lname" value="<?php if(isset($lname)){ echo $lname ;}?>"> <br>
            <span><?php if(isset($lnameerr)){ echo $lnameerr ;}?></span>
            <label for="email">Email*</label>
            <input type="email" id="email" name="email" value="<?php if(isset($email)){ echo $email ;}?>"> <br>
            <span><?php if(isset($emailErr)){ echo $emailErr ;}?></span>
            <label for="Phone">Phone *</label>
            <input type="mob" id="Phone" name="mobile" value="<?php if(isset($mobile)){ echo $mobile ;}?>"> <br>
            <span><?php if(isset($mobileErr)){ echo $mobileErr ;}?></span>
            <label for="timeTocall">Convenient time to call *</label>
            <input type="text" id="timeTocall" name="timeTocall" value="<?php if(isset($timeTocall)){ echo $timeTocall ;}?>"> <br>
            <span><?php if(isset($timeTocallErr)){ echo $timeTocallErr ;}?></span>
            <label for="comments">Questions/Comments</label>
            <textarea name="comments" id="comments" ><?php if(isset($comments)){ echo $comments ;}?></textarea>
        </div>
            <div class="col">
                <h3>Payment Note</h3>
                <p>A 15% deposit is payable on confirmation of your booking with the balance due 30 days before your
arrival </p><p>
  
A full refund is available with <strong>10</strong>  days notice of cancellation in writing </p><p>
A 50% refund is available with less than 5 days notice of cancellation in writing</p>

                    <h3>Payment Method </h3>
                    <p> Fill in the detail form, with your convenient timing and Barbara who is the owner , she will give you a ring</p>
                    <p>Amount to pay on call: <?php if(isset($total)){ $payableAmount = $total/100*15 ; echo '&#36;' . $total . '/100 * 15 = ' . '&#36;' .$payableAmount;  }?></p>
                    <p>Remaining Balance: <?php if(isset($total)){ $remainAmount = $total - $payableAmount ; echo  '&#36;' .$total . ' - '. '&#36;' .$payableAmount . ' = '. '&#36;' .$remainAmount;} ?></p>
                    <input type="submit" name="userFormSubmit">
        </div>
        </div>
       
       </form>
       <?php 
       }
     

       include('footer.php');
       ?>
