<!DOCTYPE html>
<html>
<head>
  <title>Player update</title>
  <link rel="stylesheet" type="text/css" href="rscss.css">
    <script type="text/javascript" src="rsjs.js"></script>
</head>
<body>
          <!-- header -->
        <?php    include 'rsheader.php'  ?>
        <!-- header -->

    <!--  content -->

           <?php
            $playerid = $_GET['id'];
            if (isset($playerid)){
                            $sql = "SELECT * FROM player WHERE playerId='$playerid'";
                            $result = $conn->query($sql);

                            if ($result){
                                    if ($result->num_rows > 0 ) {
                                   while ($row=$result->fetch_assoc()) {
                        ?>


                         <!-- Update User -->
                   
                              <div class="container" >

                             
                            <?php
                              include 'rsconn.php';
                              if (isset($_POST['edit_player'])) {

                             
                                $firstname=$_POST['firstname'];
                                $secondname=$_POST['secondname'];
                                $dateofbirth=$_POST['dateofbirth'];
                                $startofplay=$_POST['startofplay'];
                                $endofplay=$_POST['endofplay'];
                                $description=$_POST['description'];
                                
                             
                                   

                                //Inserting data
                                $sql="UPDATE player SET  firstname='$firstname',secondname='$secondname', dateOfBirth='$dateofbirth',startOfPlay='$startofplay', endOfPlay='$endofplay', description='$description' WHERE playerId='$playerid'";

                                if ($conn->query($sql)) {
                                   $_SESSION['playerId']=$row['playerId'];
                                             if ($playerid == $_SESSION['playerId']) {?>
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
            <p id="profile-name" class="profile-name-card" style="font-size:18px;">Edit player</p>
            <form class="form-signin" method="POST">
                                  <?php
                                  if ($_SESSION['user_type'] == 'admin'||$_SESSION['user_type'] == 'Super admin'){
                                         ?>

                                                      <span id="reauth-email" class="reauth-email"></span>
                  Firstname<br>
                  <input type="text" name="firstname" id="inputEmail" class="form-control" placeholder="Firstname" value="<?php echo $row['firstname'] ?>"><br>
                  Secondname<br>
                  <input type="text" name="secondname" id="inputEmail" class="form-control" placeholder="Secondname" value="<?php echo $row['secondname']?>"><br>
                  Date of birth<br>
                  <input type="date" name="dateofbirth" id="inputEmail" class="form-control" placeholder="Date of birth" value="<?php echo $row['dateOfBirth'] ?>"><br>
                  Start of play<br>
                  <input type="date" name="startofplay" id="inputEmail" class="form-control" placeholder="Start of play" value="<?php echo $row['startOfPlay']?>"><br>
                  End of play<br>
                  <input type="date" name="endofplay" id="inputEmail" class="form-control" placeholder="End of play" value="<?php echo $row['endOfPlay']?>"><br>
                  Player description<br>
                  <textarea name="description" rows="13" cols="35"><?php echo $row['description']?></textarea><br>
                  
                  
                  <input class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="edit_player" style="width:269px; height:40px;color:white;font-size:16px" value="Edit player">
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
<a href="rsmanageplayers.php" class="btn btn-lg btn-primary btn-block btn-signin" style="text-decoration:none;width:269px; height:40px;color:white;font-size:16px;text-align:center;"> Back </a>
