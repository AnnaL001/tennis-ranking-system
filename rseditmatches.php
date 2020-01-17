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
            $matchid = $_GET['id'];
            if (isset($matchid)){
                            $sql = "SELECT * FROM matches WHERE matchId='$matchid'";
                            $result = $conn->query($sql);

                            if ($result){
                                    if ($result->num_rows > 0 ) {
                                   while ($row=$result->fetch_assoc()) {
                        ?>


                         <!-- Update User -->
                   
                              <div class="container" >

                             
                            <?php
                              include 'rsconn.php';
                              if (isset($_POST['edit_match'])) {

                                $hostId=$_POST['hostId'];
                                $guestId=$_POST['guestId'];
                                $stageId=$_POST['stageId'];
                                $matchdate=$_POST['matchdate'];
                                
                                   
                             
                                   

                                //Inserting data
                                $sql="UPDATE matches SET hostId='$hostId',guestId='$guestId', stageId='$stageId',matchdate='$matchdate' WHERE matchId='$matchid'";

                                if ($conn->query($sql)) {
                                   $_SESSION['matchId']=$row['matchId'];
                                             if ($matchid == $_SESSION['matchId']) {?>
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
            <p id="profile-name" class="profile-name-card" style="font-size:18px;">Edit match</p>
            <form class="form-signin" method="POST">
                                  <?php
                                  if ($_SESSION['user_type'] == 'admin'||$_SESSION['user_type'] == 'Super admin'){
                                         ?>

                                                      <span id="reauth-email" class="reauth-email"></span>
                                                        <?php
     $spot_player = "SELECT playerId,secondname FROM player";
   $player_res = $conn->query($spot_player);
         ?>
   Host player<br>        
   <select name="hostId" class="form-control" required>
  <option> ---Select Host Player--- </option>
  <?php while($player_res_row = $player_res->fetch_assoc()){ ?>
  <option value = "<?php print $player_res_row["playerId"]; ?>"><?php print $player_res_row["secondname"]; ?></option>
  <?php } ?>
</select><br>
<?php
     $spot_player = "SELECT playerId,secondname FROM player";
   $player_res = $conn->query($spot_player);
         ?>
    Guest player<br>       
   <select name="guestId" class="form-control" required>
  <option> ---Select Guest Player--- </option>
  <?php while($player_res_row = $player_res->fetch_assoc()){ ?>
  <option value = "<?php print $player_res_row["playerId"]; ?>"><?php print $player_res_row["secondname"]; ?></option>
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
 Match date<br>           
<input type="date" name="matchdate" id="inputEmail" class="form-control" placeholder="Match date(YYYY-MM-DD)" value="<?php echo $row['matchdate'] ?>"><br>
<input class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="edit_match" style="width:269px; height:40px;color:white;font-size:16px" value="Edit match">

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
<a href="rsmanagematches.php" class="btn btn-lg btn-primary btn-block btn-signin" style="text-decoration:none;width:269px; height:40px;color:white;font-size:16px;text-align:center;"> Back </a>
