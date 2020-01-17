<?php
 //navigation bar
 include 'rsheader.php';
?>
<!DOCTYPE html>
<html>
    <head>
    	     <title>Home</title>
    	     <!-- Latest compiled and minified CSS -->
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
           <!-- Latest compiled JavaScript -->
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
           <link rel="stylesheet" type="text/css" href="rscss.css">
    </head>
    <body>
	        <div class="container" style="display: flex;display: -webkit-flex;-webkit-box-sizing: border-box;box-sizing: border-box;">
              <div class="list-group" style="margin-right: 50px;width: 400px;font-size:16px;">
                    <?php
                      if ($_SESSION['user_type'] == 'Super admin'){
                                 ?>
                          <a href="rsprofile.php?id=<?php echo $_SESSION['userid'];?>" class="list-group-item">Update Profile </a>
                          <a href="rsmanageadmin.php" class="list-group-item">Manage admin</a>
                          <a href="rsmanagecategories.php" class="list-group-item">Manage categories</a>
                          <a href="rsmanagetournaments.php" class="list-group-item">Manage tournaments</a>
                          <a href="rsmanagestages.php" class="list-group-item">Manage stages</a>
                          <a href="rsmanagematches.php" class="list-group-item">Manage matches</a>
                          <a href="rsmanageplayers.php" class="list-group-item">Manage players</a>
                          <a href="rsmanagescores.php" class="list-group-item">Manage scores</a>
                          <a href="rsranking.php" class="list-group-item">Rankings</a>
                          <a href="rslogout.php" class="list-group-item">Log Out</a>


                    <?php
                        }elseif ($_SESSION['user_type'] == 'admin'){
                    ?>
                          <a href="rsprofile.php?id=<?php echo $_SESSION['userid'];?>" class="list-group-item ">Update Profile </a>
                          
                          <a href="rsmanagematches.php" class="list-group-item">Manage matches</a>
                          <a href="rsmanageplayers.php" class="list-group-item">Manage players</a>
                          <a href="rsmanagescores.php" class="list-group-item">Manage scores</a>
                          <a href="rsranking.php" class="list-group-item">Rankings</a>
                          <a href="rslogout.php" class="list-group-item">Log Out</a>
                    <?php
                        }
                    ?>

                   


                </div>

                <!-- jumbotron -->
                <br><br>
                <div class="jumbotron" style="margin-left: 50px" style="height: 170px;">

                     <?php
                     if ($_SESSION['user_type'] == 'Super admin'){
                     ?>
                     <h2>Hello, Super admin</h2>
                     <p>
                	       Welcome to the Kenya Tennis Ranking System(KTRS).<br>
                	       The aim is to provide consistent and objective rankings for tennis players.<br>
                         This is the administration panel.
                     </p>

                     <?php
                     }elseif ($_SESSION['user_type'] == 'admin') {
                     ?>
                       <h2>Hello, admin</h2>
                       <p>
                         Welcome to the Kenya Tennis Ranking System(KTRS).<br>
            	           The aim is to provide consistent and objective rankings for tennis players.<br>
                         This is the administration panel.
                       </p>
                     <?php

                       }else{
                         header("location: rslogin.php");
                       }
                     ?>

             </div>
      </div>



<!--container -->

  </body>
  </html>