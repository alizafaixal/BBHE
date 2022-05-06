<?php
require('conn.inc.php');
require('functions.inc.php');
if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){

}else{
	header('location:login.php');
	die();
}
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Dashboard Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/6.3.0/css/flag-icons.min.css">
      
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body>
      <aside id="left-panel" class="left-panel">
         <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
               <ul class="nav navbar-nav">
                  <li class="menu-title">Menu</li>
                  <li class="menu-item-has-children dropdown">
                     <a href="houses.php" > Houses Master</a>
                  </li>
               
				  <li class="menu-item-has-children dropdown">
                     <a href="bookings.php" > House Bookings Master</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="house_reviews.php" > House Reviews Master</a>
                  </li>
				  <li class="menu-item-has-children dropdown">
                     <a href="users.php" > House User Master</a>
                  </li>
				  <li class="menu-item-has-children dropdown">
                     <a href="contact_us.php" > House Contact Us</a>
                  </li>
                  <li class="">
                  <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
                  </li>
				  
               </ul>
            </div>
         </nav>
      </aside>
      <div id="right-panel" class="right-panel">
         <header id="header" class="header">
            <div class="top-left">
               <div class="navbar-header">
                  <a class="navbar-brand" href="houses.php"><img src="../images/BBHE_logo.png" alt="Logo"></a>
                  <a class="navbar-brand hidden" href="houses.php"><img src="../images/BBHE_logo.png" height= 200px; alt="Logo"></a>
                
               </div>
            </div>
            <div class="top-right">
               <div class="header-menu">
                  <div class="user-area dropdown float-right">
                 
                     <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome Admin  </a>
                   
                  </div>
               </div>
            </div>
         </header>