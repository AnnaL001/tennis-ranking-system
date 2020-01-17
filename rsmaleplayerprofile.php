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
       $sql = "SELECT * FROM maleplayers WHERE playerID='$playerid'";
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
                              $image=$row['player_image'];
                              echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'" style="height:340px; width:275px;"/>';
                               ?>
                             </div>
                             <div class="media-body">

                            <!--  Assigning row value with each element -->
                               <hr>
                               <h3>
                                  <strong>Firstname</strong>
                               </h3>
                               <p style="font-size:16px;"> 
                                <?php echo   $row['fname']; ?>
                               </p>

                               <hr>
                               <h3>
                                  <strong>Secondname</strong>
                               </h3>
                               <p style="font-size:16px;">
                                 <?php echo   $row['lname']; ?>
                               </p>

                               <hr>
                               <h3>
                                  <strong>Date of birth</strong>
                               </h3>
                               <p style="font-size:16px;">
                                  <?php echo   $row['date_of_birth']; ?>
                               </p><br>

                               <hr>
                               <h3>
                                  <strong>Start of play</strong>
                               </h3>
                               <p style="font-size:16px;">
                                  <?php echo  $row['start_of_play']; ?>
                               </p>

                               <hr>
                               <h3>
                                  <strong>End of play</strong>
                               </h3>
                               <p style="font-size:16px;">
                                  <?php echo   $row['end_of_play']; ?>
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
                           <?php echo  $row['fname']. "  "; ?>
                           
                              <?php echo   $row['lname']; ?>
                           
                           <i class="fa fa-check text-success" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="John Doe is sharing with you"></i>
                        </h1>

                        

                           
                    </span>
                    <br><br>

                    <p>
                        <u>
                           <h1 style="font-size:30px;">Player description</h1>
                        </u>
                        
                          <?php

                             if ($row['playerID']== $playerid){
                                ?>
                             <p style="font-size:16px;">
                             <?php echo $row['description'];?></p>
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