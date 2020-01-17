
 <head>
	<link rel="stylesheet" type="text/css" href="rscss.css">
 </head>

 <!--header-->
 <?php
   include 'rsheader.php';
 ?>
 <!-- Trigger add button -->
 <div style="margin-bottom: 10px;margin-left: 20px;">
                
        <?php
        //Check if the user type to know which button to display

           if ($_SESSION['user_type'] == 'Super admin'){
        ?>
            <a href="rsaddadmin.php"><button type="button" class="btn btn-info btn-lg" >Add Admin</button></a>
               <?php
            }
               ?>
            
              
 </div>
 <!-- Display admins from the database -->

 <table  class="table table-striped" style="margin-left:5px;font-size: 16px;">
   <thread>
      <tr >
         <th> ID </th>
         <th> Username </th>
         <th> Email </th>
         <th> Date of birth </th>
         <th> Phone No </th>
         <th> User type</th>
         <th> Address </th>
         <th> Action </th>
      </tr>
   </thread>

 <?php
   include "rsconn.php";
   $usid = $_SESSION['userid'];

   //Selection of specific data for the logged in user
   if ($_SESSION['user_type'] == 'Super admin'){
           $sql = "SELECT * FROM users where usertype='admin'";
           $no = 1;

           $result = $conn->query($sql);

        if ($result){

           if ($result->num_rows > 0 ) {
              while ($row=$result->fetch_assoc()) {

    ?>

   <tbody>
      <tr >
          <td><?php echo $no++; ?></td>
          <td><?php  echo $row['username']; ?></td>
          <td><?php echo  $row['email']; ?></td>
          <td><?php echo $row['dateofbirth']; ?></td>
          <td><?php  echo $row['phoneno']; ?></td>
          <td><?php  echo $row['usertype']; ?></td>
          <td><?php  echo $row['address']; ?></td>

          <td>


                <a href="rseditadmin.php?id=<?php echo $row {'userId'}; ?>"> 
                	 <button type="button" class="btn btn-warning" style="font-size:16px;">Edit</button>
                </a>

                <!-- Indicates a dangerous or potentially negative action -->
                <a  onclick="return confirm('Are you sure you want to delete')" href="rsdelete.php?id=<?php echo $row {'userId'}; ?>">
                	<button type="button" class="btn btn-danger" style="font-size:16px;">Delete</button></a>
                  <a href="rsprofile.php?id=<?php echo $row {'userId'};?>"> 
                   <button type="button" class="btn btn-warning" style="font-size:16px;">Profile</button>
                </a>
                  
          </td>

      </tr>

     <?php
          }
       }else{
     ?>
     <center>
          <div class="alert alert-danger" role="alert" style="margin-left: 20px;margin-right: 20px;width:350px">
               <?php echo " Not successful"."<br>".$conn->error; ?>
          </div>
     </center>
        <?php
            }
          }else{
        ?>
      <center>
           <div class="alert alert-danger" role="alert" style="margin-left: 20px;margin-right: 20px;width:350px">
                  <?php  echo "No data found"; ?>
           </div>
      </center>
            <?php
     }
  ?>
  <td><a href="rshome.php"><button type="button" class="btn btn-info btn-lg" >Back</button></a></td>
    </tbody>

  </table>

 </div>
<!-- Display users from the database -->


 </body>
             <?php
              }
            ?>
            