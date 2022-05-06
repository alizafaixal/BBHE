<?php
include('header.inc.php');
 if(isset($_GET['type']) && $_GET['type'] != ''){
   $type = clean($conn,$_GET['type']);
   if($type == 'status'){
      $operation = clean($conn,$_GET['operation']);
      $id = clean($conn,$_GET['id']);
     
      if($operation == 'active'){
         $status = '1';
      }else{
         $status = '0';
      }
      $sql = "UPDATE houses set house_status='$status' WHERE house_id = '$id'";
      mysqli_query($conn, $sql);

   }
   if($type == 'delete'){
      $id = clean($conn,$_GET['id']);
      $sql = "DELETE  FROM houses WHERE house_id = '$id'";
      mysqli_query($conn, $sql);

   }
}
$sql = "SELECT * FROM houses ORDER BY house_id desc";
$res = mysqli_query($conn, $sql);
?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title"> Houses </h4>
                           <h5 class="box-title"> <a href="add_houses.php">Add Houses</a> </h5>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
               
                                       <th>Houses ID</th>
                                       <th> Houses Name</th>
                                       <th> Houses location</th>
                                       <th> Houses reviews</th>
                                       <th> Houses features</th>
                                       <th> Houses kitchen</th>
                                       <th> Houses baths</th>
                                       <th> Houses toilets</th>
                                       <th> Houses rooms</th>
                                       <th> Houses garage</th>
                                       <th> Houses short desciption</th>
                                       <th> Houses Long desciption</th>
                                       <th> Houses Max guests</th>
                                       <th> Houses Amenities</th>
                                       <th> Houses Hero Imaage</th>
                                       <th> Houses Imaage 1</th>
                                       <th> Houses Imaage 2</th>
                                       <th> Houses Imaage 3</th>
                                       <th> Houses Imaage 4</th>
                                       <th> Houses Status</th>
                                       <th> other options</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php while($row= mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                      
                                       
                                       <td> <?php echo $row['house_id'] ?> </td>
                                       <td> <?php echo $row['house_name'] ?> </td>
                                       <td> <?php echo $row['house_location'] ?> </td>
                                       <td> <?php echo $row['house_reviews'] ?> </td>
                                       <td class="fearures"> <?php echo $row['house_features'] ?> </td>
                                       <td> <?php echo $row['house_kitchen'] ?> </td>
                                       <td> <?php echo $row['house_baths'] ?> </td>
                                       <td> <?php echo $row['house_toilets'] ?> </td>
                                       <td> <?php echo $row['house_rooms'] ?> </td>
                                       <td> <?php echo $row['house_garage'] ?> </td>
                                       <td> <?php echo $row['house_short_desc'] ?> </td>
                                       <td> <?php echo $row['house_long_desc'] ?> </td>
                                       <td> <?php echo $row['house_max_guest'] ?> </td>
                                       <td> <?php echo $row['house_amenities'] ?> </td>
                                       <td> <img src="../<?php echo $row['house_HeroImg'] ?>" alt=""> </td>
                                       <td> <img src="../<?php echo $row['house_img1'] ?>" alt=""></td>
                                       <td> <img src="../<?php echo $row['house_img2'] ?>" alt=""> </td>
                                       <td> <img src="../<?php echo $row['house_img3'] ?> " alt=""></td>
                                       <td> <img src="../<?php echo $row['house_img4'] ?>" alt=""> </td>
                                       <td><?php
								if($row['house_status']==1){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['house_id']."'>Active</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['house_id']."'>Deactive</a></span>&nbsp;";
                        }?> </td>
                        <td>
                           <?php
                           echo "<span class='badge badge-edit'><a href='edit_category.php?id=".$row['house_id']."'>Edit</a></span>&nbsp;";
								
                           echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['house_id']."'>Delete</a></span>";
                           ?>
                        </td>
                   
                                      
                                    </tr>
                                    <?php }?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
         <div class="clearfix"></div>
         <?php
include('footer.inc.php');
?>