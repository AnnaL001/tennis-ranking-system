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
            <a href="rsaddstages.php"><button type="button" class="btn btn-info btn-lg" >Add stages</button></a>
               <?php
            }
               ?>
            
              
 </div>
 <!-- Display admins from the database -->

 <table class="table table-striped" style="margin-left:5px;font-size: 16px;">
   <thread>
      <tr >
         <th> ID </th>
         <th> Stage Name </th>
         <th> Tournament ID </th>
         <th> Action </th>
         
      </tr>
   </thread>

 <?php
   include "rsconn.php";
   
   //Selection of specific data for the logged in user
   if ($_SESSION['user_type'] == 'Super admin'){
           $sql = "SELECT * FROM stage ORDER BY stageId";
           $no = 1;

           $result = $conn->query($sql);

        if ($result){

           if ($result->num_rows > 0 ) {
              while ($row=$result->fetch_assoc()) {
                 $spot_tournament= $conn->query("SELECT tournamentName AS tournamentname FROM tournament WHERE tournamentId=" . $row['tournamentId'] ." LIMIT 1")->fetch_assoc();

    ?>

   <tbody>
      <tr >
          <td><?php echo $no++; ?></td>
          <td><?php  echo $row['stageName']; ?></td>
          <td><?php echo $spot_tournament['tournamentname']; ?></td>
          <td>


                <a href="rseditstages.php?id=<?php echo $row {'stageId'}; ?>"> 
                   <button type="button" class="btn btn-warning" style="font-size:16px;">Edit</button>
                </a>
                

                <!-- Indicates a dangerous or potentially negative action -->
                <a  onclick="return confirm('Are you sure you want to delete')" href="rsdeletestages.php?id=<?php echo $row {'stageId'}; ?>">
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

           if ($_SESSION['user_type'] == 'Super admin'){
        ?>
            <a href="rsaddmalestages.php"><button type="button" class="btn btn-info btn-lg" >Add male stages</button></a>
               <?php
            }
               ?>
            
              
 </div>
 <!-- Display admins from the database -->

 <table class="table table-striped" style="margin-left:5px;font-size: 16px;">
   <thread>
      <tr >
         <th> ID </th>
         <th> Stage Name </th>
         <th> Tournament ID </th>
         <th> Action </th>
         
      </tr>
   </thread>

 <?php
   include "rsconn.php";
   
   //Selection of specific data for the logged in user
   if ($_SESSION['user_type'] == 'Super admin'){
           $sql = "SELECT * FROM malestages ORDER BY stageID";
           $no = 1;

           $result = $conn->query($sql);

        if ($result){

           if ($result->num_rows > 0 ) {
              while ($row=$result->fetch_assoc()) {
                 $spot_tournament= $conn->query("SELECT tournament_name AS tournamentname FROM maletournaments WHERE tournamentID=" . $row['tournamentID'] ." LIMIT 1")->fetch_assoc();

    ?>

   <tbody>
      <tr >
          <td><?php echo $no++; ?></td>
          <td><?php  echo $row['stage_name']; ?></td>
          <td><?php echo $spot_tournament['tournamentname']; ?></td>
          <td>


                <a href="rseditmalestages.php?id=<?php echo $row {'stageID'}; ?>"> 
                   <button type="button" class="btn btn-warning" style="font-size:16px;">Edit</button>
                </a>
                

                <!-- Indicates a dangerous or potentially negative action -->
                <a  onclick="return confirm('Are you sure you want to delete')" href="rsdeletemalestages.php?id=<?php echo $row {'stageID'}; ?>">
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
            