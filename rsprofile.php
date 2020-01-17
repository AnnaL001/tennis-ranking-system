  <head>
     <link rel="stylesheet" type="text/css" href="rscss.css">
  </head>

  <!-- header -->
  <?php  
     include 'rsheader.php'; 
  ?>

  <?php
    $userid = $_GET['id'];

    //Getting information on logged in user
    if (isset($userid)) {
       $sql = "SELECT * FROM users WHERE userId='$userid'";
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
                              $image=$row['userimage'];
                              echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'" style="height:300px; width:280px;"/>';
                               ?>

                             </div>
                             <div class="media-body">

                            <!--  Assigning row value with each element -->
                               <hr>
                               <h3>
                                  <strong>Username</strong>
                               </h3>
                               <p style="font-size:16px;"> 
                                <?php echo   $row['username']; ?>
                               </p>

                               <hr>
                               <h3>
                                  <strong>Email</strong>
                               </h3>
                               <p style="font-size:16px;">
                                 <?php echo   $row['email']; ?>
                               </p>

                               <hr>
                               <h3>
                                  <strong>Date of birth</strong>
                               </h3>
                               <p style="font-size:16px;">
                                  <?php echo   $row['dateofbirth']; ?>
                               </p><br>

                               <hr>
                               <h3>
                                  <strong>Phone No</strong>
                               </h3>
                               <p style="font-size:16px;">
                                  <?php echo  $row['phoneno']; ?>
                               </p>

                               <hr>
                               <h3>
                                  <strong>Address</strong>
                               </h3>
                               <p style="font-size:16px;">
                                  <?php echo   $row['address']; ?>
                               </p>

                               <hr>
                               <h3>
                                  <strong>Usertype</strong>
                               </h3>
                               <p style="font-size:16px;">
                                  <?php echo   $row['usertype']; ?>
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
                           <?php echo  $row['username']. "  "; ?>
                           <small>
                              <?php echo   $row['email']; ?>
                           </small>
                           <i class="fa fa-check text-success" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="John Doe is sharing with you"></i>
                        </h1>

                        <div class="dropdown pull-right">
                            <a href="rsprofileupdate.php?id=<?php echo  $row['userId']; ?>">
                                 <button type="button" class="btn btn-warning" style="font-size:16px;">Update</button>
                            </a>

                            </button>
                        </div>
                    </span>
                    <br><br>

                    <p>
                        <u>
                           <h1 style="font-size:30px;">User Information</h1>
                        </u>
                        <p style="font-size:16px;"> 
                          <?php echo  $row['username']; ?> is a 
                          <?php  echo  $row['usertype']; ?>
                        </p>
                          <?php

                             if ($row['usertype']== 'Super admin'){
                                ?>
                             <p style="font-size:16px;">
                             The  Super Administrator  is allowed to: <br><br>
                                  1. Change his/her personal details including password but NOT the username.<br></p><p style="font-size:16px;">
                                  2. Manage admin will allow the Super admin to: <br></p>

                                  <div style="margin-left: 30px;font-size:16px;">
                                        a.    Add a new admin. <br>
                                        b.    View a list of all other admins.<br>
                                        c.    Make changes to any admin details.<br>
                                        d.    Delete any admin and related information.

                                    </div></p>
                                    <p style="font-size:16px;">
                                    3.Manage stages will allow the super admin to:<br>
                                    <div style="margin-left: 30px;font-size:16px;">
                                        a.    Add a new tournament stage. <br>
                                        b.    View a list of all other tournament stages.<br>
                                        c.    Make changes to any tournament stages.<br>
                                        d.    Delete any tournament stage and related information.
                                    </div>
                                    <p style="font-size:16px;">
                                    4.View tournaments added by the admin so as to input the tournament stages.</p>
                                    <p style="font-size:16px;">
                                    5.View matches and players added by the admin into the system.</p>
                                    <p style="font-size:16px;">
                                    6.View rankings produced by the system.</p>
                                    <a href="rshome.php"><button type="button" class="btn btn-info btn-lg" >Back</button></a>
                            </p>

                            <?php
                               } elseif ($row['usertype'] == 'admin'){
                                ?>

                                    <p style="font-size:16px;">    
                                    The  Administrator  is allowed to: <br><br>
                                    1. Change his/her personal details including password but NOT the username.</p>
                                    <p style="font-size:16px;">
                                    2. Manage  tournaments will allow the admin to:</p>

                                    <div style="margin-left: 30px;font-size:16px;">
                                          a. Add a tournament. <br>
                                          b. View a list of all tournaments.<br>
                                          c. Make changes to any tournament details.<br>
                                          d. Delete any tournament and related information. 
                                    </div>
                                         <p style="font-size:16px;">
                                    3.Manage  match will allow the admin to:</p>

                                    <div style="margin-left: 30px;font-size:16px;">
                                          a. Add a new tennis match. <br>
                                          b. View a list of all tennis matches.<br>
                                          c. Make changes to any tennis match details.<br>
                                          d. Delete any tennis match and related information. 
                                      </div>
                                      <p style="font-size:16px;"> 
                                    4. Manage  scores will allow the admin to:</p>

                                      <div style="margin-left: 30px;font-size:16px;">
                                           a. Add a new players' scores that relates to a tennis match. <br>
                                           b. View a list of all players' scores in relation to a match.<br>
                                           c. Make changes to any players' scores in relation to a match.<br>
                                           d. Delete any tennis match and related information. 
                                      </div>
                                    <p style="font-size:16px;"> 
                                    5. Manage players will allow the admin to:</p>

                                      <div style="margin-left: 30px;font-size:16px;">
                                           a. Add a new player and their related information. <br>
                                           b. View a list of all players.<br>
                                           c. Make changes to any players' information.<br>
                                           d. Delete any player and their related information from the system. 
                                      </div>
                                    <p style="font-size:16px;">
                                    6. View stages added by the super admin so as to input the matches and players participating in the tournament stages.</p>
                                    <p style="font-size:16px;">
                                    7. View rankings produced by the system.</p>
                                    <a href="rshome.php"><button type="button" class="btn btn-info btn-lg" >Back</button></a>
                          <?php
                                      }
                                }
                              }else  {
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