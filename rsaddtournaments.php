<?php
  include "rsconn.php";
  include 'rsheader.php';
    if (!isset($_SESSION['emailadd']) && !isset($_SESSION['pswd'])) {
      header('location:rslogin.php');
    }?>



<!DOCTYPE html>
  <html>
    <head>
	    <title>Add tournament</title>
	
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
         if ($_SESSION['user_type'] == 'Super admin'){
            //Super Admin has the ability for adding categories
              if(isset($_POST["add_tournament"])){
            
               $tournamentname=$_POST["tournamentname"];
               $tournamentstrength=$_POST['tournamentstrength'];
               $destination=$_POST['destination'];     
               $categoryId=$_POST["categoryId"];
               
            //Inserting data
               
               $sql="INSERT INTO tournament(tournamentName,tournamentStrength,destination,categoryId) VALUES('$tournamentname','$tournamentstrength','$destination','$categoryId')";
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
               
                      


					          
	
		<form action="rsaddtournaments.php" method="POST">
			<?php    
        if ($_SESSION['user_type'] == 'Super admin'){
			?>
			     <div class="card card-container">
              <p id="profile-name" class="profile-name-card" style="font-size:18px;">Add tournament
              </p>
                     
      
                  <?php   
        }  
                   ?>
			  
			  	
           
           
         <?php
            if ($_SESSION['user_type'] == 'Super admin'){
         ?>

              <form class="form-signin" method="POST">
			           <span id="reauth-email" class="reauth-email"></span>
                   Tournament<br>
                   <input type="text" name="tournamentname" id="inputEmail" class="form-control"  required><br>
                   Tournament strength<br>
                   <input type="text" name="tournamentstrength" id="inputEmail" class="form-control"  required><br>
                   Destination<br>
                   <input type="text" name="destination" id="inputEmail" class="form-control"  required><br>
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
                   
                   
                  <input class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="add_tournament" style="width:269px; height:40px;color:white;font-size:16px" value="Add tournament">


             <?php
                              }

                       ?>

      

     <?php
                              }
                              ?>

			    
			    <a href="rsmanagetournaments.php" class="btn btn-lg btn-primary btn-block btn-signin" style="text-decoration:none;width:269px; height:40px;color:white;font-size:16px;text-align:center;"> Back </a>

			   


  </body>
</html>


