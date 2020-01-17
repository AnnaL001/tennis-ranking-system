
  <head>
     <link rel="stylesheet" type="text/css" href="rscss.css">
  </head>

  <!-- header -->
  <?php  
     include 'rsheader.php'; 
  ?>

  <?php
    $playerid = $_GET['id'];

    //Getting information on logged in user
    if (isset($playerid)) {
       $sql = "SELECT * FROM player WHERE playerId='$playerid'";
       $result = $conn->query($sql);

    
        //Check query
        if ($result){
        //If the info is available
            if ($result->num_rows > 0 ) {
               //Loop through the row
              while ($row=$result->fetch_assoc()) {
           
  ?> 
  <!DOCTYPE html>
    <html>
       <head>
          <title>Profile</title>
       </head>
       <body>
          <div style="margin-top: 30px;"></div>
            <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
                <div class="panel panel-default">
                   <div class="panel-body" style="background-color:#F7F7F7; ">
                         <div class="media">
                             <div align="center">

                          <?php
                              $image=$row['playerImage'];
                               echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'" style="height:300px; width:280px;"/>';
                                ?>
                             </div>
                             <div class="media-body">

                            <!--  Assigning row value with each element -->
                               <hr>
                               <h3>
                                  <strong>Firstname</strong>
                               </h3>
                               <p style="font-size:16px;"> 
                                <?php echo   $row['firstname']; ?>
                               </p>

                               <hr>
                               <h3>
                                  <strong>Secondname</strong>
                               </h3>
                               <p style="font-size:16px;">
                                 <?php echo   $row['secondname']; ?>
                               </p>

                               <hr>
                               <h3>
                                  <strong>Date of birth</strong>
                               </h3>
                               <p style="font-size:16px;">
                                  <?php echo   $row['dateOfBirth']; ?>
                               </p><br>

                               <hr>
                               <h3>
                                  <strong>Start of play</strong>
                               </h3>
                               <p style="font-size:16px;">
                                  <?php echo  $row['startOfPlay']; ?>
                               </p>

                               <hr>
                               <h3>
                                  <strong>End of play</strong>
                               </h3>
                               <p style="font-size:16px;">
                                  <?php echo   $row['endOfPlay']; ?>
                               </p>

                               


                            </div>
                        </div>
                  </div>
                </div>
            </div>




<!-- Users Priviledges based on usertype -->

          <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
              <div class="panel panel-default" style="background-color:#c1bfbf; ">
                 <div class="panel-body" style="background-color:#F7F7F7; ">
                    <span>
                        <h1 class="panel-title pull-left" style="font-size:30px;">
                           <?php echo  $row['firstname']. "  "; ?>
                           
                              <?php echo   $row['secondname']; ?>
                           
                           <i class="fa fa-check text-success" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="John Doe is sharing with you"></i>
                        </h1>

                        

                           
                    </span>
                    <br><br>

                    <p>
                        <u>
                           <h1 style="font-size:30px;">Player Performance</h1>
                        </u>
                        
                          <?php

                             if ($row['playerId'] == $playerid){
$player_performance = "SELECT DISTINCT(score.playerId), SUM(score.points) AS total_points, COUNT(score.playerId) AS no_matches, COUNT(DISTINCT(score.tournamentId)) AS no_tournaments FROM score WHERE score.playerId = '$playerid' GROUP BY score.playerId ORDER BY total_points DESC";

$player_wins = "SELECT DISTINCT(score.playerId), COUNT(score.status) AS total_win FROM score WHERE score.playerId = '$playerid' AND score.status = 'W' GROUP BY score.playerId ORDER BY total_win DESC";
							 
$perform_res = $conn->query($player_performance); $win_res = $conn->query($player_wins);

$perform_row = $perform_res->fetch_assoc(); $win_row = $win_res->fetch_assoc();
							 ?>
							 
	 <p style="font-size:16px;">
   
		<strong>Total Points:</strong> <?php print " ". $perform_row["total_points"]; ?>  <br>
  
		<strong>No Matches:</strong><?php print " ". $perform_row["no_matches"]; ?><br>
    
		<strong>No Tournaments:</strong><?php print " ". $perform_row["no_tournaments"]; ?><br>
    
		<strong>Total Win:</strong><?php print " ". $win_row["total_win"]; ?>
	 </p> <br>                       
                               <a href="rsmanageplayers.php"><button type="button" class="btn btn-info btn-lg" >Back</button></a>  
                          <?php
                                      }
                                }
                              }else {
                              ?>
                                    <div class="alert alert-danger" role="alert" style="margin-left: 20px;margin-right: 20px;width:350px"">
                                           <?php echo " Not records found"."<br>".$conn->error;
                                             header( "location: rshome.php" );
                           ?>
                                      </div>
                                       <?php
                                    }
                        }else{
                                        ?>
                                  <div class="alert alert-danger" role="alert" style="margin-left: 20px;margin-right: 20px;width:350px">
                                        <?php echo " Database Error"."<br>";
                                          header( "location: rshome.php" );
                                         ?>
                                  </div>
                                       <?php
                                        }
                                    }       
                                ?>
                                     </p>

                 </div>
             </div>
           <hr>
        </div>



   </body>
   </html>