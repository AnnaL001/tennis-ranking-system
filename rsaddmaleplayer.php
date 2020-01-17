<?php
  include "rsconn.php";
  include 'rsheader.php';
    if (!isset($_SESSION['emailadd']) && !isset($_SESSION['pswd'])) {
      header('location:rslogin.php');
    }?>



<!DOCTYPE html>
  <html>
    <head>
	    <title>Add Players</title>
	
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
              if(isset($_POST['add_male_player'])){
				  
	             
                $image = $_FILES['playerImage']['tmp_name'];
                $imageContent = addslashes(file_get_contents($image));
	
               $firstname=$_POST['firstname'];
               $secondname=$_POST['secondname'];
               $dateOfBirth=$_POST['dateOfBirth'];
               $startOfPlay=$_POST['startofplay'];
               $endOfPlay=$_POST['endofplay'];
               $description=$_POST['description'];
              
              
               $sql="INSERT INTO maleplayers(fname,lname,date_of_birth,player_image,start_of_play,end_of_play, description, gender) VALUES('$firstname','$secondname','$dateOfBirth','$imageContent','$startOfPlay','$endOfPlay','$description','Male')";
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

			<?php    
        if ($_SESSION['user_type'] == 'admin'||$_SESSION['user_type'] == 'Super admin'){
			?>
			     <div class="card card-container">
              <p id="profile-name" class="profile-name-card" style="font-size:18px;">Add male player
              </p>
                     
      
                  <?php   
        }  
                   ?>
			  
			  	
           
           
         <?php
            if ($_SESSION['user_type'] == 'admin'||$_SESSION['user_type'] == 'Super admin'){
         ?>

              <form action = "" class="form-signin" method="POST" enctype="multipart/form-data" >
			           <span id="reauth-email" class="reauth-email"></span>
                   
Firstname<br>                
<input type="text" name="firstname" id="inputEmail" class="form-control" required><br>
Secondname<br>
<input type="text" name="secondname" id="inputEmail" class="form-control" required><br>
Date of Birth<br>
<input type="date" name="dateOfBirth" id="inputEmail" class="form-control" required><br>
Start of play<br>
<input type="date" name="startofplay" id="inputEmail" class="form-control" required><br>
End of play<br>
<input type="date" name="endofplay" id="inputEmail" class="form-control" required><br>
Player description
<textarea name="description" rows="13" cols="35" required></textarea><br><br>
Player image<br>
<input type="file" name="playerImage" /><br>
<input class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="add_male_player" style="width:269px; height:40px;color:white;font-size:16px" value="Add male player">
			

             <?php
                              }

                       ?>

      

     <?php
                              }
                              ?>

			    
			    <a href="rsmanageplayers.php" class="btn btn-lg btn-primary btn-block btn-signin" style="text-decoration:none;width:269px; height:40px;color:white;font-size:16px;text-align:center;"> Back </a>
</form>
			   


  </body>
</html>


