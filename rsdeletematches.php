<?php
include 'rsconn.php';
$matchid = $_GET['id'];

if (isset($matchid)) {

$sql = "DELETE FROM matches where matchId = '$matchid'";
if ($conn->query($sql)) {
         header("location:rsmanagematches.php");
}else {
        echo "<script>alert('<?php  echo 'Error' .$conn->error;  ?>');location.href'rshome.php'</script>";

}

}
?>