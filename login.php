<?php
$title = 'BBHE- Login';
include('header.php');

function clean($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
  
    return $data;
}
$usernameErr='';
$nameErr='';
$emailErr='';
$passwordErr='';
$loginpasswordErr='';
$password='';
?>
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
                        $logError= 'You are now logged in';
                        header('location: index.php');
                    }else{
                        $logError= 'please enter correct details';
                    }
                }
                  }
                ?>
                    <form id="LoginForm" method="post">
                    <h2>Login</h2>
                        <label for="login_username">Username: </label><input type="text" name="login_username" id="login_username" placeholder="Username"> 
                         <br> <span class="field_error" id="login_username_error"><?php if(isset($nameErr)){ echo $nameErr ;}?></span>
                     <label for="login_password">Password: </label> <input type="password"   name="login_password" id="login_password" placeholder="password">
                        <br> <span class="field_error" id="login_password_error"><?php if(isset($loginpasswordErr)){ echo $loginpasswordErr ;}?></span> <br> 
                        <a href="">Forget Password</a>
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
                                $Regerror = 'This email is already registered ';
                                
                            }else{
                                $insert = "INSERT INTO end_users (username,user_email,user_password) VALUES('$username', '$email', '$password')";
                                $res = mysqli_query($conn, $insert)
                                or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
                                $Regerror= 'You are now a member';
                        }
                    }
                }
                  $user_id = mysqli_insert_id($conn);?>
                    <form id="RegForm"  method="post">
                    <h2>Register</h2>
                    <label for="reg_username">Username: </label><input type="text"  name="reg_username" id="reg_username" placeholder="Username">
                                <br> <span class="field_error" id="reg_username_error"><?php if(isset($usernameErr)){ echo $usernameErr ;}?></span>
                                <label for="reg_email">Email: </label> <input type="email"  name="reg_email" id="reg_email" placeholder="Email">
                                <br> <span class="field_error" id="reg_email_error"><?php if(isset($emailErr)){ echo $emailErr ;}?></span>
                                <label for="reg_password">Password: </label><input type="password" name="reg_password" id="reg_password" placeholder="password">
                                <br> <span class="field_error" id="reg_password_error"><?php if(isset($passwordErr)){ echo $passwordErr ;}?></span>
                                <input type="submit" name="Regsubmit" class="btn" value="Register">
                                <p class="field_error register_msg"><?php if (isset($Regerror)){ echo $Regerror ;}?></p>
                            </form>
   
                </div>
            </div>
            </div>
        
            <?php 
  
       include('footer.php');
       ?>
