<?php
$msg= '';
require("conn.inc.php");
require("functions.inc.php");
if(isset($_POST['submit'])){
  $username = clean($conn, $_POST['username']);
  $password = clean($conn, $_POST['password']);
  $sql = "SELECT * FROM admin_user WHERE admin_username = '$username' AND admin_password ='$password' ";
 $msg ='';
  $res = mysqli_query($conn, $sql);
  if(mysqli_num_rows($res) > 0){
   $_SESSION['ADMIN_LOGIN'] = 'yes';
   $_SESSION['ADMIN_USERNAME'] = $username;
   header('location: houses.php'); 
  }else{
     $msg = "Please enter correct details ";

  }
}

?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Login Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css"> 
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/6.3.0/css/flag-icons.min.css">
      
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body class="bg-dark">
      <div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
            <div class="login-content">
               <div class="login-form mt-150">
                  <form action="login.php" method="post" >
                     <div class="form-group">
                        <label>User name</label>
                        <input type="text" name="username" required class="form-control" placeholder="username">
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" required class="form-control" placeholder="Password">
                     </div>
                     <button type="submit" name="submit"  class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                    <div class="formError"> <?php echo $msg;?></div>
					</form>
               </div>
            </div>
         </div>
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" type="text/javascript"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/draggable/1.0.0-beta.9/plugins.min.js" type="text/javascript"></script>
      <script src="assets/js/main.js" type="text/javascript"></script>
   </body>
</html>