<!DOCTYPE html>
<html>
<head>
	<title>Profile update</title>
	<link rel="stylesheet" type="text/css" href="rscss.css">
    <script type="text/javascript" src="rsjs.js"></script>
</head>
<body>
	        <!-- header -->
        <?php    include 'rsheader.php'  ?>
        <!-- header -->

    <!--  content -->

           <?php
            $usid = $_GET['id'];
            if (isset($usid)){
                            $sql = "SELECT * FROM users WHERE userId=$usid";
                            $result = $conn->query($sql);

                            if ($result){
                                    if ($result->num_rows > 0 ) {
                                   while ($row=$result->fetch_assoc()) {
                        ?>


                         <!-- Update User -->
                   
                              <div class="container" >

                             
                                    <?php
                                 include 'rsconn.php';
                            if (isset($_POST['update_profile'])) {
                            include 'rsbcrypt.php';
                             $username=$_POST['username'];
			        	             $email=$_POST['emailaddress'];
			        	             $password=bcrypt($_POST['password']);
			        	             $dateofbirth=$_POST['dateofbirth'];
			        	             $phoneNo=$_POST['phoneno'];
			        	             $address=$_POST['address'];

                                //Inserting data
                                $sql="UPDATE users SET username='$username',email='$email',password='$password',dateofbirth='$dateofbirth',phoneno='$phoneNo', address='$address' WHERE userId='$usid'";

                                if ($conn->query($sql)) {

                                             if ($usid == $_SESSION['userid']) {?>
                                             <center>
                                                <div class="alert alert-success" role="alert" style="margin-left: 20px;margin-right: 20px;width:350px">
                                              <?php echo " Successful"; ?>
                                           </div></center><?php
                                             //header("location:rsprofile.php?id=$usid;"); }
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
            <p id="profile-name" class="profile-name-card" style="font-size:18px;">Update Profile</p>
            <form class="form-signin" method="POST">
                                       <?php
                                       if ($_SESSION['user_type'] == 'Super admin'){
                                         ?>

                                                      <span id="reauth-email" class="reauth-email"></span>
            Username<br>                                          
            <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Username" value="<?php echo $row['username'] ?>">
            Email<br>
            <input type="text" name="emailaddress" id="inputEmail" class="form-control" placeholder="Email" value="<?php echo $row['email'] ?>"  required autofocus>
            Password<br>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" value="<?php echo $row['password'] ?>">
            Date of birth<br>
            <input type="date" name="dateofbirth" id="inputEmail" class="form-control" placeholder="Date of Birth" value="<?php echo $row['dateofbirth'] ?>">
            Phone No<br>
            <input type="tel" name="phoneno" id="inputEmail" class="form-control" placeholder="Phone No" value="<?php echo $row['phoneno'] ?>">
            Address<br>
            <input type="text" name="address" id="inputEmail" class="form-control" placeholder="Address" value="<?php echo $row['address'] ?>">
            <input class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="update_profile" style="width:269px; height:40px;color:white;font-size:16px" value="Update Profile">
            <a href="rsprofile.php?id=<?php echo  $row['userId']; ?>" class="btn btn-lg btn-primary btn-block btn-signin" style="text-decoration:none;width:269px; height:40px;color:white;font-size:16px;text-align:center;"> Back </a>

                                                             <?php
                                                          }
                                                  elseif ($_SESSION['user_type'] == 'admin')  {
                                                        ?>

                                                       <span id="reauth-email" class="reauth-email"></span>
             Username<br>                                          
            <input type="text" name="username" id="inputText" class="form-control" placeholder="Username" value="<?php echo $row['username'] ?>">
            Email<br>
            <input type="text" name="emailaddress" id="inputEmail" class="form-control" placeholder="Email" value="<?php echo $row['email'] ?>"  required autofocus>
            Password<br>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" value="<?php echo $row['password'] ?>">
            Date of birth<br>
            <input type="date" name="dateofbirth" id="inputText" class="form-control" placeholder="Date of Birth" value="<?php echo $row['dateofbirth'] ?>">
            Phone no<br>
            <input type="tel" name="phoneno" id="inputText" class="form-control" placeholder="Phone No" value="<?php echo $row['phoneno'] ?>">
            Address<br>
            <input type="text" name="address" id="inputText" class="form-control" placeholder="Address" value="<?php echo $row['address'] ?>">
            <input class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="update_profile" style="width:269px; height:40px;color:white;font-size:16px" value="Update Profile">
            <a href="rsprofile.php?id=<?php echo  $row['userId']; ?>" class="btn btn-lg btn-primary btn-block btn-signin" style="text-decoration:none;width:269px; height:40px;color:white;font-size:16px;text-align:center;"> Back </a>

                                                      </form>
                                                  


                                            </div>
                                          </div>
                                        
                                    

                              <?php
                          }
                       }
                                    } else  {
                                             ?>
                                      <div class="alert alert-danger" role="alert" style="margin-left: 20px;margin-right: 20px;width:350px">
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
      }else{?>
       <?php
    header( "location: 'rshome.php'" );

            }
?>
  <!-- Update User -->



</body>
</html>