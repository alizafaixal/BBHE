<?php
require('conn.inc.php');
$image= 'images/'.  $_FILES['image']['name'];

move_uploaded_file($_FILES['image']['tmp_name'], $image);  
$sql = "INSERT INTO `image` (`image`) VALUES ('$image')";
 $res = mysqli_query($conn, $sql)
    or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
?>


<form method="post" enctype="multipart/form-data">
<div class="form-group"><label for="img"  class=" form-control-label">product img</label>
<input type="file" name="image" required id="img" placeholder="Enter the Product img" class="form-control"  ></div>
                        

<button name="submit" type="submit" id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
<span id="payment-button-amount">Submit</span>
</button>
</form>