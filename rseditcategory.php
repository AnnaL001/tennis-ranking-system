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
            $catid = $_GET['id'];
            if (isset($catid)){
                            $sql = "SELECT * FROM category WHERE categoryId='$catid'";
                            $result = $conn->query($sql);

                            if ($result){
                                    if ($result->num_rows > 0 ) {
                                   while ($row=$result->fetch_assoc()) {
                        ?>


                         <!-- Update User -->
                   
                              <div class="container" >

                             
                                    <?php
                                 include 'rsconn.php';
                                if (isset($_POST['edit_category'])) {

                                   $categoryname=$_POST['categoryname'];
			        	                   
			        	             
			        	                   

                                //Inserting data
                                $sql="UPDATE category SET categoryName='$categoryname' WHERE categoryId='$catid'";

                                if ($conn->query($sql)) {
                                   $_SESSION['categoryId']=$row['categoryId'];
                                             if ($catid == $_SESSION['categoryId']) {?>
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
            <p id="profile-name" class="profile-name-card" style="font-size:18px;">Edit category</p>
            <form class="form-signin" method="POST">
                                       <?php
                                       if ($_SESSION['user_type'] == 'Super admin'){
                                         ?>

                                                      <span id="reauth-email" class="reauth-email"></span>
            Category<br>                                          
            <input type="text" name="categoryname" id="inputEmail" class="form-control" placeholder="Category name" value="<?php echo $row['categoryName'] ?>">
            
            <input class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="edit_category" style="width:269px; height:40px;color:white;font-size:16px" value="Edit category">

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
<a href="rsmanagecategories.php" class="btn btn-lg btn-primary btn-block btn-signin" style="text-decoration:none;width:269px; height:40px;color:white;font-size:16px;text-align:center;"> Back </a>
