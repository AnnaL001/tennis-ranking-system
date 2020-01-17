<!DOCTYPE html>
<html>
<head>
  <title>Stage update</title>
  <link rel="stylesheet" type="text/css" href="rscss.css">
    <script type="text/javascript" src="rsjs.js"></script>
</head>
<body>
          <!-- header -->
        <?php    include 'rsheader.php'  ?>
        <!-- header -->

    <!--  content -->

           <?php
            $scoreid = $_GET['id'];
            if (isset($scoreid)){
                            $sql = "SELECT * FROM malescores WHERE scoreID='$scoreid'";
                            $result = $conn->query($sql);

                            if ($result){
                                    if ($result->num_rows > 0 ) {
                                   while ($row=$result->fetch_assoc()) {
                        ?>


                         <!-- Update User -->
                   
                              <div class="container" >

                             
                            <?php
                              include 'rsconn.php';
                              if (isset($_POST['edit_male_score'])) {

               $playerId=$_POST['playerId'];                 
               
               $setswon=$_POST['setswon'];
               $status=$_POST['status'];
               $matchId=$_POST['matchId'];
               $stageId=$_POST['stageId'];
               $tournamentId=$_POST['tournamentId'];
               $categoryId=$_POST['categoryId'];
               $points=$_POST['points'];
                                   
                             
                                   

                                //Inserting data
                                $sql="UPDATE malescores SET playerID='$playerId', setswon='$setswon', status='$status',matchID='$matchId',stageID='$stageId',tournamentID='$tournamentId',categoryId='$categoryId',points='$points' WHERE scoreID='$scoreid'";

                                if ($conn->query($sql)) {
                                   $_SESSION['scoreID']=$row['scoreID'];
                                             if ($scoreid == $_SESSION['scoreID']) {?>
                                             <center>
                                                <div class="alert alert-success" role="alert" style="margin-left: 20px;margin-right: 20px;width:350px">
                                              <?php echo " Successful"; ?>
                                           </div></center><?php
                                             
                                             }else{  header("location:rshome.php");?>
                                               <?php
                                              }

                                }else  {
                                     ?>
                                      <div class="alert alert-danger" role="alert" style="margin-left: 20px;margin-right: 20px;width:350px">
                                           <?php echo " A problem occured"."<br>".$conn->error; ?>
                                           </div>

                                    <?php
                                }
                             }
                                    ?>



                                  <div class="card card-container">
            <p id="profile-name" class="profile-name-card" style="font-size:18px;">Edit male player scores</p>
            <form class="form-signin" method="POST">
                                  <?php
                                  if ($_SESSION['user_type'] == 'admin'||$_SESSION['user_type'] == 'Super admin'){
                                         ?>

                                                      <span id="reauth-email" class="reauth-email"></span>
                    <?php
     $spot_player = "SELECT playerID, CONCAT(fname, ' ' ,lname) AS playerName  FROM maleplayers";
   $player_res = $conn->query($spot_player);
         ?>
  Player<br>       
   <select name="playerId" class="form-control" required>
  <option> ---Select Player--- </option>
  <?php while($player_res_row = $player_res->fetch_assoc()){ ?>
  <option value = "<?php print $player_res_row["playerID"]; ?>"><?php print $player_res_row["playerName"]; ?></option>
  <?php } ?>
   </select><br>                                   
Sets won<br>                 
<input type="number" name="setswon" id="inputEmail" class="form-control" placeholder="Sets won" value="<?php echo $row['setswon'];?>"><br>
Status<br>
<select name="status" class="form-control" value="<?php echo $row['status']?>">
    <option value="W">Win</option>
    <option value="L">Lose</option>
    </select><br>
                     <?php
     $spot_match = "SELECT matchID,hostID,guestID FROM malematches";
   $match_res = $conn->query($spot_match);

         ?>
   Match<br>        
   <select name="matchId" class="form-control" required>
  <option> ---Select Match--- </option>
  <?php while($match_res_row = $match_res->fetch_assoc()){
       $spot_host = $conn->query("SELECT lname AS hostPlayer FROM maleplayers WHERE playerID = " . $match_res_row['hostID'] . " LIMIT 1")->fetch_assoc();
   $spot_guest = $conn->query("SELECT lname AS guestPlayer FROM maleplayers WHERE playerID = " . $match_res_row['guestID'] . " LIMIT 1")->fetch_assoc();

   ?>
  <option value = "<?php print $match_res_row["matchID"]; ?>"><?php print $spot_host["hostPlayer"]." "."Vs"." ".$spot_guest["guestPlayer"]; ?></option>
  <?php } ?>
</select><br>
                 <?php
     $spot_stage = "SELECT stageID,stage_name FROM malestages";
   $stage_res = $conn->query($spot_stage);
         ?>
    Stage<br>       
   <select name="stageId" class="form-control" required>
  <option> ---Select Stage--- </option>
  <?php while($stage_res_row = $stage_res->fetch_assoc()){ ?>
  <option value = "<?php print $stage_res_row["stageID"]; ?>"><?php print $stage_res_row["stage_name"]; ?></option>
  <?php } ?>
</select><br>
                  <?php
     $spot_tournament = "SELECT tournamentID,tournament_name FROM maletournaments";
   $tournament_res = $conn->query($spot_tournament);
         ?>
   Tournament<br>        
   <select name="tournamentId" class="form-control" required>
  <option> ---Select Tournament--- </option>
  <?php while($tournament_res_row = $tournament_res->fetch_assoc()){ ?>
  <option value = "<?php print $tournament_res_row["tournamentID"]; ?>"><?php print $tournament_res_row["tournament_name"]; ?></option>
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
<input type="number" name="points" id="inputEmail" class="form-control" placeholder="Points" value="<?php echo $row['points'];?>"><br>

<input class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="edit_male_score" style="width:269px; height:40px;color:white;font-size:16px" value="Edit scores">

                                                             <?php
                                                          }
                                                          }
                                    } else  {
                                             ?>
                                      <div class="alert alert-danger" role="alert" style="margin-left: 20px;margin-right: 20px;">
                                           <?php
                                                  header( "location: rshome.php" );
                                                  ?>
                                           </div>
                                          <?php
                                        }
                                    }
                                     else{
                                        echo "Database Error";
                                     }
                         ?>

                        <?php
      }else{

    header( "location: rshome.php" );

            }
?>
<a href="rsmanagescores.php" class="btn btn-lg btn-primary btn-block btn-signin" style="text-decoration:none;width:269px; height:40px;color:white;font-size:16px;text-align:center;"> Back </a>
