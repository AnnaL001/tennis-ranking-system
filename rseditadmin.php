<!DOCTYPE html>
<html>
<head>
  <title>Category update</title>
  <link rel="stylesheet" type="text/css" href="rscss.css">
    <script type="text/javascript" src="rsjs.js"></script>
</head>
<body>
          <!-- header -->
        <?php    include 'rsheader.php'  ?>
        <!-- header -->

    <!--  content -->

           <?php
            $userid = $_GET['id'];
            if (isset($userid)){
                            $sql = "SELECT * FROM users WHERE userId='$userid'";
                            $result = $conn->query($sql);

                            if ($result){
                                    if ($result->num_rows > 0 ) {
                                   while ($row=$result->fetch_assoc()) {
                        ?>


                         <!-- Update User -->
                   
                              <div class="container" >

                             
                                    <?php
                                 include 'rsconn.php';
                                if (isset($_POST['edit_admin'])) {

                                   $username=$_POST['username'];
                                   $email=$_POST['emailadd'];
                                   $dateofbirth=$_POST['dateofbirth'];
                                   $phoneno=$_POST['phoneno'];
                                   $usertype=$_POST['usertype'];
                                   $address=$_POST['address'];

                                   
                             
                                   

                                //Inserting data
                                $sql="UPDATE users SET username='$username', email='$email', dateofbirth='$dateofbirth',phoneno='$phoneno',usertype='admin',address='$address' WHERE userId='$userid'";

                                if ($conn->query($sql)) {
                                   $_SESSION['userid']=$row['userId'];
                                             if ($userid == $_SESSION['userid']) {?>
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
            <p id="profile-name" class="profile-name-card" style="font-size:18px;">Edit admin</p>
            <form class="form-signin" method="POST">
                                       <?php
                                       if ($_SESSION['user_type'] == 'Super admin'){
                                         ?>

                                                      <span id="reauth-email" class="reauth-email"></span>
            Username<br>                                          
            <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Username" value="<?php echo $row['username'] ?>">
            Email<br>
            <input type="email" name="emailadd" id="inputEmail" class="form-control" placeholder="Email" value="<?php echo $row['email'] ?>" autofocus>
            Date of birth<br>
            <input type="date" name="dateofbirth" id="inputEmail" class="form-control" placeholder="Date of birth" value="<?php echo $row['dateofbirth'] ?>">
            Phone no<br>
            <input type="tel" name="phoneno" id="inputEmail" class="form-control" placeholder="Phone no" value="<?php echo $row['phoneno'] ?>">
            Usertype<br>
            <input type="text" name="usertype" id="inputEmail" class="form-control" placeholder="Usertype" value="<?php echo $row['usertype'];?>" disabled>
            Address<br>
            <input type="text" name="address" id="inputEmail" class="form-control" placeholder="Address" value="<?php echo $row['address'] ?>">


            
            <input class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="edit_admin" style="width:269px; height:40px;color:white;font-size:16px" value="Edit admin">

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
<a href="rsmanageadmin.php" class="btn btn-lg btn-primary btn-block btn-signin" style="text-decoration:none;width:269px; height:40px;color:white;font-size:16px;text-align:center;"> Back </a>
