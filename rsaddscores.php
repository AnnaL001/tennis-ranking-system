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
	     <?php
		     include "rsconn.php";
         if ($_SESSION['user_type'] == 'admin'||$_SESSION['user_type'] == 'Super admin'){
            //Super Admin has the ability for adding categories
              if(isset($_POST['add_score'])){
               $playerId=$_POST['playerId'];
              
               $setswon=$_POST['setswon'];
               $status=$_POST['status'];
               $matchId=$_POST['matchId'];
               $stageId=$_POST['stageId'];
               $tournamentId=$_POST['tournamentId'];
               $categoryId=$_POST['categoryId'];
               $points=$_POST['points'];
                              
            //Inserting data
               
               $sql="INSERT INTO score(playerId,sets_won,status,matchId,stageId,tournamentId,categoryId,points) VALUES('$playerId','$setswon','$status','$matchId','$stageId','$tournamentId','$categoryId','$points')";
               if($conn->query($sql)) {
                       ?>
                        <center>
                           <div class="alert alert-success" role="alert" style="margin-left: 20px;margin-right: 20px;width:350px">
                               <?php echo " Successful"; ?>
                           </div>
                        </center>

                       <?php
                   

            }else
                      //Display error message
                  {
                       ?>
                <center>
                     <div class="alert alert-danger" role="alert" style="margin-left: 20px;margin-right: 20px;width:350px">
                        <?php echo " Not successful"."<br>".$conn->error; ?>
                     </div>
                </center>

                      <?php
                  }
        }

                      ?>
  <br><br>   
               
                      


					          
	
		<form action="rsaddscores.php" method="POST">
			<?php    
        if ($_SESSION['user_type'] == 'admin'||$_SESSION['user_type'] == 'Super admin'){
			?>
			     <div class="card card-container">
              <p id="profile-name" class="profile-name-card" style="font-size:18px;">Add scores
              </p>
                     
      
                  <?php   
        }  
                   ?>
			  
			  	
           
           
         <?php
            if ($_SESSION['user_type'] == 'admin'||$_SESSION['user_type'] == 'Super admin'){
         ?>

              <form class="form-signin" method="POST">
			           <span id="reauth-email" class="reauth-email"></span>
                   
                    <?php
     $spot_player = "SELECT playerId, CONCAT(firstname, ' ' ,secondname) AS playerName  FROM player";
   $player_res = $conn->query($spot_player);
         ?>
    Player<br>       
   <select name="playerId" class="form-control" required>
  <option> ---Select Player--- </option>
  <?php while($player_res_row = $player_res->fetch_assoc()){ ?>
  <option value = "<?php print $player_res_row["playerId"]; ?>"><?php print $player_res_row["playerName"]; ?></option>
  <?php } ?>
   </select><br>
                   Sets won<br>
                   <input type="number" name="setswon" id="inputEmail" class="form-control" placeholder="Sets won" required><br>
                   Player status<br>
                   <select name="status" class="form-control">
                      <option value="W">Win</option>
                      <option value="L">Lose</option>
                   </select><br>
                     <?php
     $spot_match = "SELECT matchId,hostId,guestId FROM matches";
   $match_res = $conn->query($spot_match);
   

         ?>
    Match<br>
   <select name="matchId" class="form-control" required>
  <option> ---Select Match--- </option>
  <?php while($match_res_row = $match_res->fetch_assoc()){
      $spot_host = $conn->query("SELECT secondname AS hostPlayer FROM player WHERE playerId = " . $match_res_row['hostId'] . " LIMIT 1")->fetch_assoc();
   $spot_guest = $conn->query("SELECT secondname AS guestPlayer FROM player WHERE playerId = " . $match_res_row['guestId'] . " LIMIT 1")->fetch_assoc();

   ?>
  <option value = "<?php print $match_res_row["matchId"]; ?>"><?php print $spot_host["hostPlayer"]." "."Vs"." ".$spot_guest["guestPlayer"]; ?></option>
  <?php } ?>
</select><br>
<?php
     $spot_stage = "SELECT stageId,stageName FROM stage";
   $stage_res = $conn->query($spot_stage);
         ?>
      Stage<br>     
   <select name="stageId" class="form-control" required>
  <option> ---Select Stage--- </option>
  <?php while($stage_res_row = $stage_res->fetch_assoc()){ ?>
  <option value = "<?php print $stage_res_row["stageId"]; ?>"><?php print $stage_res_row["stageName"]; ?></option>
  <?php } ?>
</select><br>
<?php
     $spot_tournament = "SELECT tournamentId,tournamentName FROM tournament";
   $tournament_res = $conn->query($spot_tournament);
         ?>
       Tournament<br>    
   <select name="tournamentId" class="form-control" required>
  <option> ---Select Tournament--- </option>
  <?php while($tournament_res_row = $tournament_res->fetch_assoc()){ ?>
  <option value = "<?php print $tournament_res_row["tournamentId"]; ?>"><?php print $tournament_res_row["tournamentName"]; ?></option>
  <?php } ?>
</select><br>
<?php
     $spot_category = "SELECT categoryId,categoryName FROM category";
   $category_res = $conn->query($spot_category);
         ?>
   Category<br>    
   <select name="categoryId" class="form-control" required>
  <option> ---Select Category--- </option>
  <?php while($category_res_row = $category_res->fetch_assoc()){ ?>
  <option value = "<?php print $category_res_row["categoryId"]; ?>"><?php print $category_res_row["categoryName"]; ?></option>
  <?php } ?>
</select><br>
Points<br>
<input type="text" name="points" id="inputEmail" class="form-control" placeholder="Points" required><br>
<input class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="add_score" style="width:269px; height:40px;color:white;font-size:16px" value="Add scores">


             <?php
                              }

                       ?>

      

     <?php
                              }
                              ?>

			    
			    <a href="rsmanagescores.php" class="btn btn-lg btn-primary btn-block btn-signin" style="text-decoration:none;width:269px; height:40px;color:white;font-size:16px;text-align:center;"> Back </a>

			   


  </body>
</html>


