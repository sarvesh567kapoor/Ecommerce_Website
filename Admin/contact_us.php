<?php 
require('header.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
      $type = get_save_value($conn,$_GET['type']);
     

      if($type=='delete')
      {
         $id= get_save_value($conn,$_GET['id']);
         
         $delete_record_sql= "delete from  Contact_us where id= '$id'";
         $res= mysqli_query($conn,$delete_record_sql);
          
      }
}


$sql= "select * from Contact_us order by id desc";
$res=mysqli_query($conn,$sql);

?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Contact Us </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th >ID</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Mobile</th>
                                       <th>Query</th>
                                       <th>Date</th>
                                       <th></th>
                                    </tr>
                                 </thead>
                              
                                 <tbody>
                                     
                                 <?php
                                 $i=1;
                                  while($row=mysqli_fetch_assoc($res)){  ?>
                                     <tr>
                                     <td class="serial"><?php echo $i; ?></td>
                                     <td><?php echo $row['id']; ?></td>
                                     <td><?php echo $row['name']; ?></td>
                                     <td><?php echo $row['email']; ?></td>
                                     <td><?php echo $row['mobile']; ?></td>
                                     <td><?php echo $row['comment']; ?></td>
                                     <td><?php echo date("F j, Y, g:i a",strtotime($row['date'])); ?></td>
                                     <td><?php echo "<span class= 'badge badge-delete'><a href= '?type=delete&id=".$row['id']."'>Delete</a></span>&nbsp;";?></td>
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



          <?php 
require('footer.inc.php');

?>