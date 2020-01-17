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

           if ($_SESSION['user_type'] == 'admin'|| $_SESSION['user_type'] == 'Super admin'){
        ?>
            <a href="rsaddscores.php"><button type="button" class="btn btn-info btn-lg" >Add scores</button></a>
               <?php
            }
               ?>
            
              
 </div>
 <!-- Display admins from the database -->

 <table class="table table-striped" style="margin-left:5px;font-size: 16px;">
   <thread>
      <tr >
         <th> No </th>
         <th> Player Name </th>
         
         <th> Sets won </th>
         <th> Status</th>
         <th> Match Name</th>
         <th> Stage Name</th>
         <th> Tournament Name</th>
         <th> Category Name</th>
         <th> Points </th>
         <th> Action </th>
         
      </tr>
   </thread>

 <?php
   include "rsconn.php";
   
   //Selection of specific data for the logged in user
   if ($_SESSION['user_type'] == 'admin'||$_SESSION['user_type'] == 'Super admin'){
           $sql = "SELECT * FROM score ORDER BY scoreId";
           $no=1;

           $result = $conn->query($sql);

        if ($result){

           if ($result->num_rows > 0 ) {
              while ($row=$result->fetch_assoc()) {

  $spot_player= $conn->query("SELECT secondname AS hostplayer FROM player WHERE playerId = " . $row['playerId'] . " LIMIT 1")->fetch_assoc();
  $spot_match = "SELECT matchId,hostId,guestId FROM matches WHERE matchId = " . $row['matchId'] ."";
   $match_res = $conn->query($spot_match);
   $match_res_row = $match_res->fetch_assoc();

    $spot_host = $conn->query("SELECT secondname AS hostPlayer FROM player WHERE playerId = " . $match_res_row['hostId']. " LIMIT 1")->fetch_assoc();
   $spot_guest = $conn->query("SELECT secondname AS guestPlayer FROM player WHERE playerId = " . $match_res_row['guestId']. " LIMIT 1")->fetch_assoc();
   $spot_stage= $conn->query("SELECT stageName AS stagename FROM stage WHERE stageId=" . $row['stageId'] ." LIMIT 1")->fetch_assoc();
    $spot_tournament= $conn->query("SELECT tournamentName AS tournamentname FROM tournament WHERE tournamentId=" . $row['tournamentId'] ." LIMIT 1")->fetch_assoc();
    $spot_category= $conn->query("SELECT categoryName AS categoryname FROM category WHERE categoryId=" . $row['categoryId'] ." LIMIT 1")->fetch_assoc();
    

    ?>

   <tbody>
      <tr >
          <td><?php echo $no++ ?></td>
          <td><?php echo $spot_player['hostplayer'];?></td>
          <td><?php  echo $row['sets_won']; ?></td>
          <td><?php echo $row['status']; ?></td>
          <td><?php echo $spot_host["hostPlayer"]." "."Vs"." ".$spot_guest["guestPlayer"]; ?></td>
          <td><?php echo $spot_stage['stagename']; ?></td>
          <td><?php echo $spot_tournament['tournamentname']; ?></td>
          <td><?php echo $spot_category['categoryname']; ?></td>
          <td><?php echo $row['points']; ?></td>
          <td>


                <a href="rseditscores.php?id=<?php echo $row {'scoreId'}; ?>"> 
                   <button type="button" class="btn btn-warning" style="font-size:16px;">Edit</button>
                </a>
                

                <!-- Indicates a dangerous or potentially negative action -->
                <a  onclick="return confirm('Are you sure you want to delete')" href="rsdeletescores.php?id=<?php echo $row {'scoreId'}; ?>">
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
<div style="margin-bottom: 10px;margin-left: 20px;">
                
        <?php
        //Check if the user type to know which button to display

           if ($_SESSION['user_type'] == 'admin'||$_SESSION['user_type'] == 'Super admin'){
        ?>
            <a href="rsaddmalescores.php"><button type="button" class="btn btn-info btn-lg" >Add scores</button></a>
               <?php
            }
               ?>
            
              
 </div>
 <!-- Display admins from the database -->

 <table class="table table-striped" style="margin-left:5px;font-size: 16px;">
   <thread>
      <tr >
         <th> No </th>
         <th> Player Name </th>
         
         <th> Sets won </th>
         <th> Status</th>
         <th> Match Name</th>
         <th> Stage Name</th>
         <th> Tournament Name</th>
         <th> Category Name</th>
         <th> Points </th>
         <th> Action </th>
         
      </tr>
   </thread>
   <?php
   include "rsconn.php";
   
   //Selection of specific data for the logged in user
   if ($_SESSION['user_type'] == 'admin'||$_SESSION['user_type'] == 'Super admin'){
           $sql = "SELECT * FROM malescores ORDER BY scoreID";
           $no=1;

           $result = $conn->query($sql);

        if ($result){

           if ($result->num_rows > 0 ) {
              while ($row=$result->fetch_assoc()) {

  $spot_player= $conn->query("SELECT lname AS hostplayer FROM maleplayers WHERE playerID= " . $row['playerID'] . " LIMIT 1")->fetch_assoc();
  $spot_match = "SELECT matchID,hostID,guestID FROM malematches WHERE matchID = " . $row['matchID'] ."";
   $match_res = $conn->query($spot_match);
   $match_res_row = $match_res->fetch_assoc();

    $spot_host = $conn->query("SELECT lname AS hostPlayer FROM maleplayers WHERE playerID = " . $match_res_row['hostID']. " LIMIT 1")->fetch_assoc();
   $spot_guest = $conn->query("SELECT lname AS guestPlayer FROM maleplayers WHERE playerID = " . $match_res_row['guestID']. " LIMIT 1")->fetch_assoc();
   $spot_stage= $conn->query("SELECT stage_Name AS stagename FROM malestages WHERE stageID=" . $row['stageID'] ." LIMIT 1")->fetch_assoc();
    $spot_tournament= $conn->query("SELECT tournament_name AS tournamentname FROM maletournaments WHERE tournamentID=" . $row['tournamentID'] ." LIMIT 1")->fetch_assoc();
    $spot_category= $conn->query("SELECT categoryName AS categoryname FROM category WHERE categoryId=" . $row['categoryId'] ." LIMIT 1")->fetch_assoc();
    

    ?>

   <tbody>
      <tr >
          <td><?php echo $no++ ?></td>
          <td><?php echo $spot_player['hostplayer'];?></td>
          <td><?php  echo $row['setswon']; ?></td>
          <td><?php echo $row['status']; ?></td>
          <td><?php echo $spot_host["hostPlayer"]." "."Vs"." ".$spot_guest["guestPlayer"]; ?></td>
          <td><?php echo $spot_stage['stagename']; ?></td>
          <td><?php echo $spot_tournament['tournamentname']; ?></td>
          <td><?php echo $spot_category['categoryname']; ?></td>
          <td><?php echo $row['points']; ?></td>
          <td>


                <a href="rseditmalescores.php?id=<?php echo $row {'scoreID'}; ?>"> 
                   <button type="button" class="btn btn-warning" style="font-size:16px;">Edit</button>
                </a>
                

                <!-- Indicates a dangerous or potentially negative action -->
                <a  onclick="return confirm('Are you sure you want to delete')" href="rsdeletemalescores.php?id=<?php echo $row {'scoreID'}; ?>">
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
            