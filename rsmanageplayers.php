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
            <a href="rsaddplayers.php"><button type="button" class="btn btn-info btn-lg" >Add female player</button></a>
               <?php
            }
               ?>
            
              
 </div>
 <!-- Display admins from the database -->

 <table class="table table-striped" style="margin-left:5px;font-size: 16px;">
   <thread>
      <tr >
         <th> ID </th>
         
         <th> Firstname</th>
         <th> Secondname</th>
         <th> Date of birth </th>
         <th> Start of Play</th>
         <th> End of play </th>
        
         <th> Action </th>
         
      </tr>
   </thread>

 <?php
   include "rsconn.php";
   
   //Selection of specific data for the logged in user
   if ($_SESSION['user_type'] == 'admin'||$_SESSION['user_type'] == 'Super admin'){
           $sql = "SELECT * FROM player ORDER BY playerId";
           $no = 1;

           $result = $conn->query($sql);

        if ($result){

           if ($result->num_rows > 0 ) {
              while ($row=$result->fetch_assoc()) {

    ?>

   <tbody>
      <tr >
          <td><?php echo $no++; ?></td>
          
          <td><?php  echo $row['firstname']; ?></td>
          <td><?php echo $row['secondname']; ?></td>
          <td><?php echo $row['dateOfBirth']; ?></td>
          <td><?php echo $row['startOfPlay']; ?></td>
          <td><?php echo $row['endOfPlay']; ?></td>
          
          <td>


                <a href="rseditplayers.php?id=<?php echo $row {'playerId'}; ?>"> 
                   <button type="button" class="btn btn-warning" style="font-size:16px;">Edit</button>
                </a>
                

                <!-- Indicates a dangerous or potentially negative action -->
                <a  onclick="return confirm('Are you sure you want to delete')" href="rsdeleteplayers.php?id=<?php echo $row {'playerId'}; ?>">
                  <button type="button" class="btn btn-danger" style="font-size:16px;">Delete</button></a>
                <a href="rsplayerprofile.php?id=<?php echo $row {'playerId'};?>"> 
                   <button type="button" class="btn btn-warning" style="font-size:16px;">Profile</button>
                </a>

                <a href="rsplayerscores.php?id=<?php echo $row {'playerId'}; ?>"> 
                   <button type="button" class="btn btn-warning" style="font-size:16px;">Scores</button>
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
   }
  ?>
  
 

  <td><a href="rshome.php"><button type="button" class="btn btn-info btn-lg" >Back</button></a></td>
    </tbody>
  </table>

 </div>

         <div style="margin-left: 20px;">       
        <?php
        //Check if the user type to know which button to display

           if ($_SESSION['user_type'] == 'admin'||$_SESSION['user_type'] == 'Super admin'){
        ?>
        
            <a href="rsaddmaleplayer.php"><button type="button" class="btn btn-info btn-lg" >Add male player</button></a><br>
               <?php
            }
               ?>
            </div>
              
<!-- Display male players from the database -->

 <br><table class="table table-striped" style="margin-left:5px;font-size: 16px;">
   <thread>
      <tr >
         <th> ID </th>
         <th> Firstname</th>
         <th> Secondname</th>
         <th> Date of birth </th>
         <th> Start of Play</th>
         <th> End of play </th>
        
         <th> Action </th>
         
      </tr>
   </thread>
<!-- Display users from the database -->
<?php
   include "rsconn.php";
   
   //Selection of specific data for the logged in user
   if ($_SESSION['user_type'] == 'admin'||$_SESSION['user_type'] == 'Super admin'){
           $sql = "SELECT * FROM maleplayers ORDER BY playerID";
           $no = 1;

           $result = $conn->query($sql);

        if ($result){

           if ($result->num_rows > 0 ) {
              while ($row=$result->fetch_assoc()) {

    ?>

   <tbody>
      <tr >
          <td><?php echo $no++; ?></td>
          
          <td><?php  echo $row['fname']; ?></td>
          <td><?php echo $row['lname']; ?></td>
          <td><?php echo $row['date_of_birth']; ?></td>
          <td><?php echo $row['start_of_play']; ?></td>
          <td><?php echo $row['end_of_play']; ?></td>
          
          
          <td>


                <a href="rseditmaleplayer.php?id=<?php echo $row {'playerID'}; ?>"> 
                   <button type="button" class="btn btn-warning" style="font-size:16px;">Edit</button>
                </a>
                

                <!-- Indicates a dangerous or potentially negative action -->
                <a  onclick="return confirm('Are you sure you want to delete')" href="rsdeletemaleplayer.php?id=<?php echo $row {'playerID'}; ?>">
                  <button type="button" class="btn btn-danger" style="font-size:16px;">Delete</button></a>
                <a href="rsmaleplayerprofile.php?id=<?php echo $row {'playerID'};?>"> 
                   <button type="button" class="btn btn-warning" style="font-size:16px;">Profile</button>
                </a>

                <a href="rsmaleplayerscores.php?id=<?php echo $row {'playerID'}; ?>"> 
                   <button type="button" class="btn btn-warning" style="font-size:16px;">Scores</button>
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


 </body>
             <?php
              }
            ?>
            