<?php
include('header.inc.php');
$house_id ='';
$house_name ='';
$house_location ='';
$house_reviews='';
$house_features='';
$house_kitchen='';
$house_baths='';
$house_toilets='';
$house_rooms='';
$house_garage='';
$house_short_desc='';
$house_long_desc='';
$house_max_guest='';
$house_amenities='';
$house_HeroImg='';
$house_img1='';
$house_img2='';
$house_img3='';
$house_img4='';
$house_status='';
$msg ='';

if(isset($_POST['submit'])){
   $house_name=clean($conn, $_POST['house_name']);
   $house_location=clean($conn, $_POST['house_location']);
   $house_reviews=clean($conn, $_POST['house_reviews']);
   $house_features=clean($conn, $_POST['house_features']);
   $house_kitchen=clean($conn, $_POST['house_kitchen']);
   $house_baths=clean($conn, $_POST['house_baths']);
   $house_toilets=clean($conn, $_POST['house_toilets']);
   $house_rooms=clean($conn, $_POST['house_rooms']);
   $house_garage=clean($conn, $_POST['house_garage']);
   $house_short_desc=clean($conn, $_POST['house_short_desc']);
   $house_long_desc= clean($conn, $_POST['house_long_desc']);
   $house_HeroImg= clean($conn, $_POST['house_HeroImg']);
   $house_img1= clean($conn, $_POST['house_img1']);
   $house_img2= clean($conn, $_POST['house_img2']);
   $house_img3= clean($conn, $_POST['house_img3']);
   $house_img4= clean($conn, $_POST['house_img4']);
   $house_status= clean($conn, $_POST['house_status']);
   $newdir = 'C:/wamp64/www/bbhe/images/'. $_FILES['image']['name'];
   $image= 'images/'. $_FILES['image']['name'];
  
    $check = "SELECT * FROM `houses` WHERE `house_name` = '$house_name'";
    $ans =  mysqli_query($conn, $check)
    or trigger_error("Query Failed! SQL: $check - Error: ".mysqli_error($conn), E_USER_ERROR);
    if(mysqli_num_rows($ans)>0){
        $msg=  'house with this house name already exists, Cannot add  the same house name again, Modify the details';
    }else{
    
        $sql =  "INSERT INTO `houses` ( `category_id`, `product_name`, `product_mrp`, `product_price`, `product_qty`, `product_img`, `product_short_desc`, `product_desc`, `product_meta_title`, `product_meta_desc`, `product_meta_keywords`, `product_status`) VALUES ($category_id, '$product_name', '$product_mrp', '$product_price', '$product_qty', '$image', '$product_short_desc', '$product_desc', '$product_meta_title', '$product_meta_desc', '$product_meta_keywords', '$product_status');";
        $res =  mysqli_query($conn, $sql)
        or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
        if ($res){
            $msg=  'new record inserted';
        }
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
        move_uploaded_file($_FILES['image']['tmp_name'], $newdir);
    }
   
}
?>
 <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Add Houses</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                           <div class="form-group"><label for="house_name"  class=" form-control-label">House name</label>
                           <input type="text" name="house_name" required id="house_name" placeholder="Enter the house name" class="form-control"  value="<?php echo $house_name ;?>" ></div>
                           <div class="form-group"><label for="house_location"  class=" form-control-label">house location</label>
                           <input type="text" name="house_location" required id="house_location" placeholder="Enter the house location" class="form-control"  value="<?php echo $house_location ;?>" ></div>
                           <div class="form-group"><label for="house_reviews"  class=" form-control-label">house reviews</label>
                           <input type="text" name="house_reviews" required id="house_reviews" placeholder="Enter the house reviews" class="form-control"  value="<?php echo $house_reviews ;?>" ></div>
                           <div class="form-group"><label for="house_features"  class=" form-control-label">house features</label>
                           <input type="number" name="house_features" required id="house_features" placeholder="Enter the house features" class="form-control"  value="<?php echo $house_features ;?>" ></div>
                           <div class="form-group"><label for="house_kitchen"  class=" form-control-label">house kitchen</label>
                           <input type="text" name="house_kitchen"  id="house_kitchen"  class="form-control" value="<?php echo $house_kitchen ;?>" ><div>
                           <div class="form-group"><label for="house_baths"  class=" form-control-label">house baths</label>
                            <input type="number" name="house_baths" required id="house_baths" placeholder="Enter the house baths" class="form-control" value="<?php echo $house_baths ;?>" ></div>
                        
                           <div class="form-group"><label for="house_toilets"  class=" form-control-label">house toilets</label>
                           <input type="number" name="house_toilets" id="house_toilets" class="form-control" value="<?php echo $house_toilets ;?>"></div>
                           <div class="form-group"><label for="house_rooms"  class=" form-control-label">house rooms</label>
                           <input name="house_rooms"  id="house_rooms" class="form-control" value="<?php echo $house_rooms ;?>"></div> 
                           <div class="form-group"><label for="house_garage"  class=" form-control-label">house garage</label>
                           <input type="text" name="product_meta_desc" id="meta_desc" class="form-control"  value="<?php echo $house_garage ;?>"></div>
                           <div class="form-group"><label for="house_short_desc"  class=" form-control-label">house short desc</label>
                           <textarea type="text" name="house_short_desc"  id="house_short_desc"  class="form-control"> <?php echo $house_short_desc ;?> </textarea></div>
                           <div class="form-group"><label for="house_long_desc"  class=" form-control-label">house long desc</label>
                           <textarea type="text" name="house_long_desc"  id="house_long_desc"  class="form-control"> <?php echo $house_long_desc ;?> </textarea></div>
                           <div class="form-group"><label for="house_max_guest"  class=" form-control-label">house max guest</label>
                           <input type="number" name="house_max_guest" required id="house_max_guest" placeholder="Enter the house max guest" class="form-control"  value="<?php echo $house_max_guest ;?>" ></div>
                           <div class="form-group"><label for="house_features"  class=" form-control-label">house amenities</label>
                           <textarea type="number" name="house_features" required id="house_features" class="form-control" > <?php echo $house_amenities ;?></textarea></div>
                           <div class="form-group"><label for="house_features"  class=" form-control-label">house HeroImg</label>
                           <input type="file" name="house_HeroImg" required id="house_HeroImg" placeholder="Enter the house hero img" class="form-control"  value="<?php echo $house_HeroImg ;?>" ></div>
                           <div class="form-group"><label for="house_img1"  class=" form-control-label">house img1</label>
                           <input type="file" name="house_img1" required id="house_features" placeholder="Enter the house img 1" class="form-control"  value="<?php echo $house_img1 ;?>" ></div>
                           <div class="form-group"><label for="house_img2"  class=" form-control-label">house img 2</label>
                           <input type="file" name="house_img2" required id="house_img2" placeholder="Enter the house img 2" class="form-control"  value="<?php echo $house_img2 ;?>" ></div>
                           <div class="form-group"><label for="house_img3"  class=" form-control-label">house img 3</label>
                           <input type="file" name="house_img3" required id="house_img3" placeholder="Enter the house img 3" class="form-control"  value="<?php echo $house_img3 ;?>" ></div>
                           <div class="form-group"><label for="house_img4"  class=" form-control-label">house img 4</label>
                           <input type="file" name="house_img4" required id="house_img4" placeholder="Enter the house img 4" class="form-control"  value="<?php echo $house_img4 ;?>" ></div>
                           <div class="form-group"><label for="house_status"  class=" form-control-label">houses status</label>
                           <input type="text" name="house_status" required id="status" placeholder="Enter the house status" class="form-control"  value="<?php echo $house_status ;?>" ></div>
                           <button name="submit" type="submit" id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                           <span id="payment-button-amount">Submit</span>
                           </button>
                           
                        </div>
                        <div class="field_error"><?php echo $msg;?></div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="clearfix"></div>

         <?php
include('footer.inc.php');
?>