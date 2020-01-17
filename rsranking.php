<?php
  include "rsconn.php";
  include 'rsheader.php';
    if (!isset($_SESSION['emailadd']) && !isset($_SESSION['pswd'])) {
      header('location:rslogin.php');
    }?>



<!DOCTYPE html>
  <html>
    <head>
	    <title>Add scores</title>
	
	    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <!-- Latest compiled and minified JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
         integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
         crossorigin="anonymous">
      </script>
      <script type="text/javascript" src="rsjs.js"></script>
      <link rel="stylesheet" type="text/css" href="rscss.css">
    </head>
    <body>
       <table class="table table-striped" style="margin-left:5px;font-size: 16px;">
   <thread>
		<tr>
			<th> Rank </th>
      <th>  </th>
		  <th>Player</th>
			<th> No of tournaments </th>
			<th> No of matches</th>
			<th> No of wins</th>
			<th> Tournament pts </th>
      <th> Rank pts</th>
		</tr>
   </thread>
   
                  
			<?php

      $no=1;
			$player_performance = "SELECT DISTINCT(score.playerId),SUM(score.points) AS total_points, COUNT(score.playerId) AS no_matches, COUNT(DISTINCT(score.tournamentId)) AS no_tournaments FROM score GROUP BY score.playerId ORDER BY total_points DESC";
     
			$perform_res = $conn->query($player_performance);
      

				//Check query
				if ($perform_res){
					//If the info is available
					if ($perform_res->num_rows > 0 ) {
						//Loop through the row
						while ($perform_row = $perform_res->fetch_assoc()) {
							
							$spot_playerid = $perform_row["playerId"];
              $player_image=$conn->query("SELECT playerImage AS playerimage FROM player WHERE playerId='$spot_playerid'")->fetch_assoc();
              $spot_player= $conn->query("SELECT secondname AS hostplayer FROM player WHERE playerId ='$spot_playerid' "  . " LIMIT 1")->fetch_assoc();
							$player_wins = "SELECT COUNT(score.status) AS total_win FROM score WHERE score.playerId = '$spot_playerid' AND score.status = 'W' GROUP BY score.playerId"; $win_res = $conn->query($player_wins); $win_row = $win_res->fetch_assoc();

							$rank = (1/$perform_row["no_tournaments"])*$perform_row["total_points"]+(1.35/$perform_row["no_matches"])*$win_row["total_win"];
              
				?>
        <tbody>	 
				<tr>
					<td><?php echo $no++?></td>
          <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($player_image['playerimage']).'" style="height:40px; width:40px;" class="img-circle"/>';?></td>  
          
					<td><?php echo $spot_player['hostplayer']; ?></td>
					<td> <?php echo $perform_row["no_tournaments"]; ?></td>
					<td> <?php echo $perform_row["no_matches"]; ?></td>
					<td> <?php echo $win_row["total_win"]; ?></td>
					<td> <?php echo $perform_row["total_points"]; ?></td>
          <td> <?php echo $rank; ?> </td>
				</tr>
         </tbody>
				<?php 
							}
						}
					}
				?>
  
   <tfroot>
    
		<tr>
			<th> Rank </th>
			<th>  </th>
			<th> Player</th>
			<th> No of tournaments </th>
			<th> No of matches</th>
			<th> No of wins</th>
			<th> Tournament pts </th>
      <th> Rank pts</th>
		</tr>
 
   </tfroot>

 </table>
  <table class="table table-striped" style="margin-left:5px;font-size: 16px;">
   <thread>
    <tr>
      <th> Rank </th>
      <th>  </th>
      <th>Player</th>
      <th> No of tournaments </th>
      <th> No of matches</th>
      <th> No of wins</th>
      <th> Tournament pts </th>
      <th> Rank pts</th>
    </tr>
   </thread>
   
                  
      <?php

      $no=1;
      $player_performance = "SELECT DISTINCT(malescores.playerID),SUM(malescores.points) AS total_points, COUNT(malescores.playerID) AS no_matches, COUNT(DISTINCT(malescores.tournamentID)) AS no_tournaments FROM malescores GROUP BY malescores.playerID ORDER BY total_points DESC";
     
      $perform_res = $conn->query($player_performance);
      

        //Check query
        if ($perform_res){
          //If the info is available
          if ($perform_res->num_rows > 0 ) {
            //Loop through the row
            while ($perform_row = $perform_res->fetch_assoc()) {
              
              $spot_playerid = $perform_row["playerID"];
              $player_image=$conn->query("SELECT player_image AS playerimage FROM maleplayers WHERE playerID='$spot_playerid'")->fetch_assoc();
              $spot_player= $conn->query("SELECT lname AS hostplayer FROM maleplayers WHERE playerID ='$spot_playerid' "  . " LIMIT 1")->fetch_assoc();
              $player_wins = "SELECT COUNT(malescores.status) AS total_win FROM malescores WHERE malescores.playerID = '$spot_playerid' AND malescores.status = 'W' GROUP BY malescores.playerID"; $win_res = $conn->query($player_wins); $win_row = $win_res->fetch_assoc();

              $rank = (1/$perform_row["no_tournaments"])*$perform_row["total_points"]+(1.35/$perform_row["no_matches"])*$win_row["total_win"];
              
        ?>
        <tbody>  
        <tr>
          <td><?php echo $no++?></td>
          <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($player_image['playerimage']).'" style="height:40px; width:40px;" class="img-circle"/>';?></td>  
          
          <td><?php echo $spot_player['hostplayer']; ?></td>
          <td> <?php echo $perform_row["no_tournaments"]; ?></td>
          <td> <?php echo $perform_row["no_matches"]; ?></td>
          <td> <?php echo $win_row["total_win"]; ?></td>
          <td> <?php echo $perform_row["total_points"]; ?></td>
          <td> <?php echo $rank; ?> </td>
        </tr>
         </tbody>
        <?php 
              }
            }
          }
        ?>
  
   <tfroot>
    
    <tr>
      <th> Rank </th>
      <th>  </th>
      <th> Player</th>
      <th> No of tournaments </th>
      <th> No of matches</th>
      <th> No of wins</th>
      <th> Tournament pts </th>
      <th> Rank pts</th>
    </tr>
 
   </tfroot>

 </table>
      
    </body>
    </html>