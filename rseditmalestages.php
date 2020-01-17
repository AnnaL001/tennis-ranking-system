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
                            $sql = "SELECT * FROM malestages WHERE stageID='$stageid'";
                            $result = $conn->query($sql);

                            if ($result){
                                    if ($result->num_rows > 0 ) {
                                   while ($row=$result->fetch_assoc()) {
                        ?>


                         <!-- Update User -->
                   
                              <div class="container" >

                             
                            <?php
                              include 'rsconn.php';
                              if (isset($_POST['edit_male_stages'])) {

                                
                                $stagename=$_POST['stagename'];
                                $tournamentId=$_POST['tournamentId'];
                                
                                
                                   
                             
                                   

                                //Inserting data
                                $sql="UPDATE malestages SET stage_name='$stagename',tournamentID='$tournamentId' WHERE stageID='$stageid'";

                                if ($conn->query($sql)) {
                                   $_SESSION['stageID']=$row['stageID'];
                                             if ($stageid == $_SESSION['stageID']) {?>
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
            <p id="profile-name" class="profile-name-card" style="font-size:18px;">Edit male stage</p>
            <form class="form-signin" method="POST">
                                  <?php
                                  if ($_SESSION['user_type'] == 'Super admin'){
                                         ?>

                                                      <span id="reauth-email" class="reauth-email"></span>
              Stage<br>                                        
            <input type="text" name="stagename" id="inputEmail" class="form-control" placeholder="Stage name" value="<?php echo $row['stage_name'] ?>">
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
            <input class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="edit_male_stages" style="width:269px; height:40px;color:white;font-size:16px" value="Edit stage">

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
