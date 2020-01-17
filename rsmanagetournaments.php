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
            <a href="rsaddtournaments.php"><button type="button" class="btn btn-info btn-lg" >Add tournament</button></a>
               <?php
            }
               ?>
            
              
 </div>
 <!-- Display admins from the database -->

 <table id="myTable" class="table table-striped" style="margin-left:5px;font-size: 16px;">
   <thread>
      <tr >
         <th> ID </th>
         <th> Tournament</th>
         <th> Tournament Strength</th>
         <th> Destination</th>
         <th> Category </th>
         <th> Action </th>
         
      </tr>
   </thread>

 <?php
   include "rsconn.php";
   
   //Selection of specific data for the logged in user
   if ($_SESSION['user_type'] == 'Super admin'){
           $sql = "SELECT * FROM tournament ORDER BY tournamentId";
           $no = 1;

           $result = $conn->query($sql);

        if ($result){

           if ($result->num_rows > 0 ) {
              while ($row=$result->fetch_assoc()) {
$spot_category= $conn->query("SELECT categoryName AS categoryname FROM category WHERE categoryId=" . $row['categoryId'] ." LIMIT 1")->fetch_assoc();

    ?>

   <tbody>
      <tr >
          <td><?php echo $no++; ?></td>
          <td><?php  echo $row['tournamentName']; ?></td>
          <td><?php echo $row['tournamentStrength']; ?></td>
          <td><?php echo  $row['destination']; ?></td>
          <td><?php echo $spot_category['categoryname']; ?></td>
          <td>


                <a href="rsedittournaments.php?id=<?php echo $row {'tournamentId'}; ?>"> 
                	 <button type="button" class="btn btn-warning" style="font-size:16px;">Edit</button>
                </a>
                

                <!-- Indicates a dangerous or potentially negative action -->
                <a  onclick="return confirm('Are you sure you want to delete')" href="rsdeletetournaments.php?id=<?php echo $row {'tournamentId'}; ?>">
                	<button type="button" class="btn btn-danger" style="font-size:16px;">Delete</button></a>

                

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
   }
  ?>

    <td><a href="rshome.php"><button type="button" class="btn btn-info btn-lg" >Back</button></a></td>
    </tbody>

  </table>

 </div>
<!-- Display users from the database -->

 <!-- Trigger add button -->
 <div style="margin-bottom: 10px;margin-left: 20px;">
                
        <?php
        //Check if the user type to know which button to display

           if ($_SESSION['user_type'] == 'Super admin'){
        ?>
            <a href="rsaddmaletournaments.php"><button type="button" class="btn btn-info btn-lg" >Add tournament</button></a>
               <?php
            }
               ?>
            
              
 </div>
 <!-- Display admins from the database -->

 <table id="myTable" class="table table-striped" style="margin-left:5px;font-size: 16px;">
   <thread>
      <tr >
         <th> ID </th>
         <th> Tournament</th>
         <th> Tournament Strength</th>
         <th> Destination</th>
         <th> Category </th>
         <th> Action </th>
         
      </tr>
   </thread>

 <?php
   include "rsconn.php";
   
   //Selection of specific data for the logged in user
   if ($_SESSION['user_type'] == 'Super admin'){
           $sql = "SELECT * FROM maletournaments ORDER BY tournamentID";
           $no = 1;

           $result = $conn->query($sql);

        if ($result){

           if ($result->num_rows > 0 ) {
              while ($row=$result->fetch_assoc()) {
$spot_category= $conn->query("SELECT categoryName AS categoryname FROM category WHERE categoryId=" . $row['categoryId'] ." LIMIT 1")->fetch_assoc();

    ?>

   <tbody>
      <tr >
          <td><?php echo $no++; ?></td>
          <td><?php  echo $row['tournament_name']; ?></td>
          <td><?php echo $row['tournament_strength']; ?></td>
          <td><?php echo  $row['destination']; ?></td>
          <td><?php echo $spot_category['categoryname']; ?></td>
          <td>


                <a href="rseditmaletournaments.php?id=<?php echo $row {'tournamentID'}; ?>"> 
                   <button type="button" class="btn btn-warning" style="font-size:16px;">Edit</button>
                </a>
                

                <!-- Indicates a dangerous or potentially negative action -->
                <a  onclick="return confirm('Are you sure you want to delete')" href="rsdeletemaletournaments.php?id=<?php echo $row {'tournamentID'}; ?>">
                  <button type="button" class="btn btn-danger" style="font-size:16px;">Delete</button></a>

                

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
            