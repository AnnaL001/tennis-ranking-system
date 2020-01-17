<?php
  include "rsconn.php";
  include 'rsheader.php';
    if (!isset($_SESSION['emailadd']) && !isset($_SESSION['pswd'])) {
      header('location:rslogin.php');
    }?>



<!DOCTYPE html>
  <html>
    <head>
	    <title>Add matches</title>
	
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
              if(isset($_POST['add_male_match'])){
               //$matchId=$_POST['matchId'];
               $hostId=$_POST['hostId'];
               $guestId=$_POST['guestId'];
               $stageId=$_POST['stageId'];
               $matchdate=$_POST['matchdate'];
               
            //Inserting data
               
               $sql="INSERT INTO malematches(hostID,guestID,stageID,matchDate) VALUES('$hostId','$guestId','$stageId','$matchdate')";
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
               
                      


					          
	
		<form action="" method="POST">
			<?php    
        if ($_SESSION['user_type'] == 'admin'||$_SESSION['user_type'] == 'Super admin'){
			?>
			     <div class="card card-container">
              <p id="profile-name" class="profile-name-card" style="font-size:18px;">Add male match
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
     $spot_player = "SELECT playerID,lname FROM maleplayers";
   $player_res = $conn->query($spot_player);
         ?>
   Host player<br>       
   <select name="hostId" class="form-control" required>
  <option> ---Select Host Player--- </option>
  <?php while($player_res_row = $player_res->fetch_assoc()){ ?>
  <option value = "<?php print $player_res_row["playerID"]; ?>"><?php print $player_res_row["lname"]; ?></option>
  <?php } ?>
</select><br>
<?php
     $spot_player = "SELECT playerID,lname FROM maleplayers";
   $player_res = $conn->query($spot_player);
         ?>
    Guest player<br>      
   <select name="guestId" class="form-control" required>
  <option> ---Select Guest Player--- </option>
  <?php while($player_res_row = $player_res->fetch_assoc()){ ?>
  <option value = "<?php print $player_res_row["playerID"]; ?>"><?php print $player_res_row["lname"]; ?></option>
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
Date<br>
<input type="date" name="matchdate" id="inputEmail" class="form-control" placeholder="Match date(YYYY-MM-DD)" required><br>
                   
  <input class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="add_male_match" style="width:269px; height:40px;color:white;font-size:16px" value="Add male match">


             <?php
                              }

                       ?>

      

     <?php
                              }
                              ?>

			    
			    <a href="rsmanagematches.php" class="btn btn-lg btn-primary btn-block btn-signin" style="text-decoration:none;width:269px; height:40px;color:white;font-size:16px;text-align:center;"> Back </a>

			   


  </body>
</html>


