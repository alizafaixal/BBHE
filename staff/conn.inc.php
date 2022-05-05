<?php
if(!isset($_SESSION)){
session_start();
}
$conn = mysqli_connect("localhost","root","", "bbhe");
if(mysqli_connect_errno()){
    echo "Database connection error " . mysqli_connect_error();
}
?>
