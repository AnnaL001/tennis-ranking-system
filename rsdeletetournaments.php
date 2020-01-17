<?php
include 'rsconn.php';
$tournid = $_GET['id'];

if (isset($tournid)) {

$sql = "DELETE FROM tournament where tournamentId = '$tournid'";
if ($conn->query($sql)) {
         header("location:rsmanagetournaments.php");
}else {
        echo "<script>alert('<?php  echo 'Error' .$conn->error;  ?>');location.href'rshome.php'</script>";

}

}
?>