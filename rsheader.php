<?php
  include "rsconn.php";
  session_start();
  if (!isset($_SESSION['emailadd']) && !isset($_SESSION['pswd'])) {
     header("location:rslogin.php");
   }
?>
<!DOCTYPE html>
<html>
  <head>
      <title></title>
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
     <!-- navbar -->
     <nav class="navbar navbar-inverse" navbar.static-top>
     <div class="container-fluid">

    <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
           <span class="sr-only" >Toggle navigation</span>
           <span class="icon-bar" ></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
       </button>
       <a class="navbar-brand" style="background-color:#006600" href="rshome.php">KTRS</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="background-color:#006600">
      <ul class="nav navbar-nav">
        <?php
         if ($_SESSION['user_type'] == 'Super admin'){
                     ?>
             <li class="active"><a href="rshome.php" style="background-color:#003300">Home<span class="sr-only">(current)</span></a></li>
             <li class="active"><a href="rsmanageadmin.php" style="background-color:#003300">Manage admin<span class="sr-only">(current)</span></a></li>
             <li class="active"><a href="rsmanagecategories.php" style="background-color:#003300">Manage categories <span class="sr-only">(current)</span></a></li>
             <li class="active"><a href="rsmanagetournaments.php" style="background-color:#003300">Manage tournaments <span class="sr-only">(current)</span></a></li>
             <li class="active"><a href="rsmanagestages.php" style="background-color:#003300">Manage stages <span class="sr-only">(current)</span></a></li>
             <li class="active"><a href="rsranking.php" style="background-color:#003300">Rankings <span class="sr-only">(current)</span></a></li>
             <li class="active"><a href="rsprofile.php?id=<?php echo $_SESSION['userid'];?>" style="background-color:#003300">Profile <span class="sr-only">(current)</span></a></li>
        <?php
        }elseif ($_SESSION['user_type'] == 'admin') {
             ?>
             <li class="active"><a href="rshome.php" style="background-color:#003300">Home <span class="sr-only">(current)</span></a></li>
             
             <li class="active"><a href="rsmanagematches.php" style="background-color:#003300">Manage matches<span class="sr-only">(current)</span></a></li>
             <li class="active"><a href="rsmanageplayers.php" style="background-color:#003300">Manage players<span class="sr-only">(current)</span></a></li>
             
             <li class="active"><a href="rsmanagescores.php" style="background-color:#003300">Manage scores<span class="sr-only">(current)</span></a></li>
             
             <li class="active"><a href="rsranking.php" style="background-color:#003300">Rankings <span class="sr-only">(current)</span></a></li>
             
             <li class="active"><a href="rsprofile.php?id=<?php echo $_SESSION['userid'];?>" style="background-color:#003300">Profile <span class="sr-only">(current)</span></a></li>
                      <?php
                    }
 ?>
  </ul>
      
        
      
       <ul class="nav navbar-nav navbar-right" style="background-color:#006600">
        <li class="dropdown" >
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?php  echo $_SESSION['username']; ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a  href="rsprofile.php?id=<?php echo $_SESSION['userid'];?>">Profile</a></li>
             <li><a  href="rslogout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>

</body>
</html>