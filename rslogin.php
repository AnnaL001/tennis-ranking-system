   <?php
       session_start();
       if(isset($_POST['login'])){
           include "rsconn.php";
           include "rsbcrypt.php";

           //Capture input from the user
           $email=$_POST['emailaddress'];
           $password=$_POST['password'];

           //Clean up data retrieved from a HTML form 
           $email=stripcslashes($email);
           $password=stripcslashes($password);

           //escape variables for security
           $email=mysqli_real_escape_string($conn,$email);
           $password=mysqli_real_escape_string($conn,$password);
           
           $result=mysqli_query($conn,"SELECT * FROM users where email='$email'")or die("Failed to query database".mysqli_error());
             
           $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

          
           if(password_verify($password, $row["password"])) {
                    //Select data from the db
                    $userId= $row['userId'];    
                    $user = $row['username'];
                    $emailaddress=$row['email'];
                    $passwd=$row['password'];
                    
                    $dateofbirth=$row['dateofbirth'];
                    $image= $row['userimage'];
                    $address =$row['address'];
                    $usertype = $row['usertype'];
                    $phoneno=$row['phoneno'];
                        

                    //$_SESSION['userId']=$userId
                    $_SESSION['username']= $user;
                    $_SESSION['emailadd']= $emailaddress;
                    $_SESSION['pswd']= $passwd;
                    $_SESSION['dateOfBirth']=$dateofbirth;
                    $_SESSION['image'] =  $image;
                    $_SESSION['address']= $address;
                    $_SESSION['user_type']= $usertype;
                    $_SESSION['phoneNo']=$phoneno;
                    $_SESSION['userid']=$userId;

                    header("location:rshome.php");
            

              }else{
                ?>
              <center>
                 <div class="alert alert-danger" role="alert" style="margin-left: 20px;margin-right: 20px;width:350px">
                    <?php echo "Invalid login.Please try again!"."<br>".$conn->error; 
                    ?>
                 </div>
              </center>
                    <?php
           }
        }
       

?>
<!DOCTYPE html>
<html>
   <head>
  
       <title>Login</title>
       <!-- Latest compiled and minified CSS -->
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
       <!-- Latest compiled JavaScript -->
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

       <link rel="stylesheet" type="text/css" href="rscss.css">
       <script type="text/javascript" src="rsjs.js"></script>

   </head>
   <body>
        <div class="container">
           <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
               <img id="profile-img" class="profile-img-card" src="avatar_2x.png" />
               <p id="profile-name" class="profile-name-card"></p>
              <!-- /form -->
               <form class="form-signin" method="POST">
                   <span id="reauth-email" class="reauth-email"></span>
                   <input type="email" name="emailaddress" id="inputEmail" class="form-control" placeholder="Email address"  required autofocus>
                   <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password"  required>
                   <br>
                  <input class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="login" style="width:269px; height:40px;color:white;font-size:16px" value="Login">
              </form> 
            
          </div><!-- /card-container -->
       </div><!-- /container -->
    </body>
    </html>