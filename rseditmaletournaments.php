<!DOCTYPE html>
<html>
<head>
  <title>Tournament update</title>
  <link rel="stylesheet" type="text/css" href="rscss.css">
    <script type="text/javascript" src="rsjs.js"></script>
</head>
<body>
          <!-- header -->
        <?php    include 'rsheader.php'  ?>
        <!-- header -->

    <!--  content -->

           <?php
            $tournid = $_GET['id'];
            if (isset($tournid)){
                            $sql = "SELECT * FROM maletournaments WHERE tournamentID='$tournid'";
                            $result = $conn->query($sql);

                            if ($result){
                                    if ($result->num_rows > 0 ){
                                   while ($row=$result->fetch_assoc()){
                        ?>


                         <!-- Update User -->
                   
                              <div class="container" >

                             
                            <?php
                              include 'rsconn.php';
                              if (isset($_POST['edit_male_tournament'])) {

                                $tournamentname=$_POST['tournamentname'];
                                $tournamentstrength=$_POST['tournamentstrength'];
                                $destination=$_POST['destination'];  
                                $categoryId=$_POST['categoryId'];
                                   
                             
                                   

                                //Inserting data
                                $sql="UPDATE maletournaments SET tournament_name='$tournamentname',tournament_strength='$tournamentstrength',destination='$destination', categoryId='$categoryId' WHERE tournamentID='$tournid'";

                                if ($conn->query($sql)) {
                                   $_SESSION['tournamentID']=$row['tournamentID'];
                                             if ($tournid == $_SESSION['tournamentID']) {?>
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
            <p id="profile-name" class="profile-name-card" style="font-size:18px;">Edit male tournament</p>
            <form class="form-signin" method="POST">
                                  <?php
                                  if ($_SESSION['user_type'] == 'Super admin'){
                                         ?>

                                                      <span id="reauth-email" class="reauth-email"></span>
            Tournament<br>                                          
            <input type="text" name="tournamentname" id="inputEmail" class="form-control" placeholder="Tournament name" value="<?php echo $row['tournament_name']; ?>">
            Tournament strength<br>
             <input type="text" name="tournamentstrength" id="inputEmail" class="form-control" placeholder="Tournament strength" value="<?php echo $row['tournament_strength']; ?>">
             Destination<br>
             <input type="text" name="destination" id="inputEmail" class="form-control" placeholder="Destination" value="<?php echo $row['destination']; ?>">
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
            <input class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="edit_male_tournament" style="width:269px; height:40px;color:white;font-size:16px" value="Edit male tournament">

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
<a href="rsmanagetournaments.php" class="btn btn-lg btn-primary btn-block btn-signin" style="text-decoration:none;width:269px; height:40px;color:white;font-size:16px;text-align:center;"> Back </a>
