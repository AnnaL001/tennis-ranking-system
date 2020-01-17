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
            $stageid = $_GET['id'];
            if (isset($stageid)){
                            $sql = "SELECT * FROM stage WHERE stageId='$stageid'";
                            $result = $conn->query($sql);

                            if ($result){
                                    if ($result->num_rows > 0 ) {
                                   while ($row=$result->fetch_assoc()) {
                        ?>


                         <!-- Update User -->
                   
                              <div class="container" >

                             
                            <?php
                              include 'rsconn.php';
                              if (isset($_POST['edit_stages'])) {

                                
                                $stagename=$_POST['stagename'];
                                $tournamentId=$_POST['tournamentId'];
                                
                                
                                   
                             
                                   

                                //Inserting data
                                $sql="UPDATE stage SET stageName='$stagename',tournamentId='$tournamentId' WHERE stageId='$stageid'";

                                if ($conn->query($sql)) {
                                   $_SESSION['stageId']=$row['stageId'];
                                             if ($stageid == $_SESSION['stageId']) {?>
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
            <p id="profile-name" class="profile-name-card" style="font-size:18px;">Edit stage</p>
            <form class="form-signin" method="POST">
                                  <?php
                                  if ($_SESSION['user_type'] == 'Super admin'){
                                         ?>

                                                      <span id="reauth-email" class="reauth-email"></span>
              Stage<br>                                        
            <input type="text" name="stagename" id="inputEmail" class="form-control" placeholder="Stage name" value="<?php echo $row['stageName'] ?>">
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
            <input class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="edit_stages" style="width:269px; height:40px;color:white;font-size:16px" value="Edit stage">

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
<a href="rsmanagestages.php" class="btn btn-lg btn-primary btn-block btn-signin" style="text-decoration:none;width:269px; height:40px;color:white;font-size:16px;text-align:center;"> Back </a>
