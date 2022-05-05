<?php
$conn = mysqli_connect('localhost' , 'root' , '' , 'bbhe' );
if(mysqli_connect_errno()){
    echo 'Database connection problem '  . mysqli_connect_error($conn);
}
?>