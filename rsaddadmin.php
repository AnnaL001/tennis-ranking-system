<?php
  include "rsconn.php";
  include 'rsheader.php';
    if (!isset($_SESSION['emailadd']) && !isset($_SESSION['pswd'])) {
      header('location:rslogin.php');
    }?>



<!DOCTYPE html>
  <html>
    <head>
      <title>Add admin</title>
  
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
              if(isset($_POST['add_admin'])){
          
               include_once 'rsbcrypt.php';
                $image = $_FILES['playerImage']['tmp_name'];
                $imageContent = addslashes(file_get_contents($image));
  
              $username=$_POST["username"];
              $email=$_POST["emailaddress"];
              $password=bcrypt($_POST["password"]);
               
               $dateofbirth=$_POST['dateofbirth'];
               $phoneNo=$_POST["phoneno"];
               $address=$_POST["address"];
               $sql="INSERT INTO users(username,email,password, dateofbirth,userimage,phoneno,usertype,address) VALUES('$username','$email','$password','$dateofbirth','$imageContent','$phoneNo','admin','$address')";
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
        if ($_SESSION['user_type'] == 'Super admin'){
      ?>
           <div class="card card-container">
              <p id="profile-name" class="profile-name-card" style="font-size:18px;">Add admin
              </p>
                     
      
                  <?php   
        }  
                   ?>
        
          
           
           
         <?php
            if ($_SESSION['user_type'] == 'Super admin'){
         ?>

              <form action = "" class="form-signin" method="POST" enctype="multipart/form-data" >
                <span id="reauth-email" class="reauth-email"></span>
                   Username<br>
                   <input type="text" name="username" id="inputEmail" class="form-control" required><br>
                   Email<br>
                   <input type="email" name="emailaddress" id="inputEmail" class="form-control" required autofocus><br>
                   Password<br>
                   <input type="password" name="password" id="inputPassword" class="form-control" required><br>
                   Date of birth<br>
                  <input type="date" name="dateofbirth" id="inputEmail" class="form-control"  required><br>
                  Phone no<br>
                  <input type="tel" name="phoneno" id="inputEmail" class="form-control" required><br>
                  Address<br>
                  <input type="text" name="address" id="inputEmail" class="form-control" required><br>
                  Image<br>
                  <input type="file" name="playerImage" /><br>
                  <input class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="add_admin" style="width:269px; height:40px;color:white;font-size:16px" value="Add admin">

             <?php
                              }

                       ?>

      

     <?php
                              }
                              ?>

          
          <a href="rsmanageadmin.php" class="btn btn-lg btn-primary btn-block btn-signin" style="text-decoration:none;width:269px; height:40px;color:white;font-size:16px;text-align:center;"> Back </a>
</form>
         


  </body>
</html>




