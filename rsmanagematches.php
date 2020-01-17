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

           if ($_SESSION['user_type'] == 'admin'||$_SESSION['user_type'] == 'Super admin'){
        ?>
            <a href="rsaddmatches.php"><button type="button" class="btn btn-info btn-lg" >Add female matches</button></a>
               <?php
            }
               ?>
            
              
 </div>
 <!-- Display admins from the database -->

 <table class="table table-striped" style="margin-left:5px;font-size: 16px;">
   <thread>
      <tr >
         <th> ID </th>
         <th> Hostplayer</th>
         <th> Guestplayer</th>
         <th> Stagename </th>
         <th> Date </th>
         <th> Action </th>
         
      </tr>
   </thread>

 <?php
   include "rsconn.php";
   
   //Selection of specific data for the logged in user
   if ($_SESSION['user_type'] == 'admin'||$_SESSION['user_type'] == 'Super admin'){
           $sql = "SELECT * FROM matches ORDER BY matchId";
           $no = 1;
           $result = $conn->query($sql);
        if ($result){
           if ($result->num_rows > 0 ) {
              while ($row=$result->fetch_assoc()) {

$spot_host = $conn->query("SELECT secondname AS hostPlayer FROM player WHERE playerId = " . $row['hostId'] . " LIMIT 1")->fetch_assoc();

$spot_guest = $conn->query("SELECT secondname AS guestPlayer FROM player WHERE playerId = " . $row['guestId'] . " LIMIT 1")->fetch_assoc();
$spot_stage= $conn->query("SELECT stageName AS stagename FROM stage WHERE stageId=" . $row['stageId'] ." LIMIT 1")->fetch_assoc();
    ?>

   <tbody>
      <tr >
          <td><?php echo $no++; ?></td>
          <td><?php echo $spot_host['hostPlayer']; ?></td>
          <td><?php echo $spot_guest['guestPlayer']; ?></td>
          <td><?php echo $spot_stage['stagename']; ?></td>
          <td><?php echo $row['matchdate'];?></td>
          <td>


                <a href="rseditmatches.php?id=<?php echo $row {'matchId'}; ?>"> 
                   <button type="button" class="btn btn-warning" style="font-size:16px;">Edit</button>
                </a>
                

                <!-- Indicates a dangerous or potentially negative action -->
                <a  onclick="return confirm('Are you sure you want to delete')" href="rsdeletematches.php?id=<?php echo $row {'matchId'}; ?>">
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
<div style="margin-left: 20px;">
                
        <?php
        //Check if the user type to know which button to display

           if ($_SESSION['user_type'] == 'admin'||$_SESSION['user_type'] == 'Super admin'){
        ?>
            <a href="rsaddmalematches.php"><button type="button" class="btn btn-info btn-lg" >Add male matches</button></a><br>
               <?php
            }
               ?>
            
              
 </div>
 <br><table class="table table-striped" style="margin-left:5px;font-size: 16px;">
   <thread>
      <tr >
         <th> ID </th>
         <th> Hostplayer</th>
         <th> Guestplayer</th>
         <th> Stagename </th>
         <th> Date </th>
         <th> Action </th>
         
      </tr>
   </thread>

 <?php
   include "rsconn.php";
   
   //Selection of specific data for the logged in user
   if ($_SESSION['user_type'] == 'admin'||$_SESSION['user_type'] == 'Super admin'){
           $sql = "SELECT * FROM malematches ORDER BY matchID";
           $no = 1;
           $result = $conn->query($sql);
        if ($result){
           if ($result->num_rows > 0 ) {
              while ($row=$result->fetch_assoc()) {

$spot_host = $conn->query("SELECT lname AS hostPlayer FROM maleplayers WHERE playerID = " . $row['hostID'] . " LIMIT 1")->fetch_assoc();

$spot_guest = $conn->query("SELECT lname AS guestPlayer FROM maleplayers WHERE playerID = " . $row['guestID'] . " LIMIT 1")->fetch_assoc();
$spot_stage= $conn->query("SELECT stage_name AS stage_name FROM malestages WHERE stageID=" . $row['stageID'] ." LIMIT 1")->fetch_assoc();
    ?>

   <tbody>
      <tr >
          <td><?php echo $no++; ?></td>
          <td><?php echo $spot_host['hostPlayer']; ?></td>
          <td><?php echo $spot_guest['guestPlayer']; ?></td>
          <td><?php echo $spot_stage['stage_name']; ?></td>
          <td><?php echo $row['matchDate'];?></td>
          <td>


                <a href="rseditmalematches.php?id=<?php echo $row {'matchID'}; ?>"> 
                   <button type="button" class="btn btn-warning" style="font-size:16px;">Edit</button>
                </a>
                

                <!-- Indicates a dangerous or potentially negative action -->
                <a  onclick="return confirm('Are you sure you want to delete')" href="rsdeletemalematches.php?id=<?php echo $row {'matchID'}; ?>">
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

 </body>
             <?php
              }
            ?>
            