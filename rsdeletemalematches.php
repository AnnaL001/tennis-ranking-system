<?php
include 'rsconn.php';
$matchid = $_GET['id'];

if (isset($matchid)) {

$sql = "DELETE FROM malematches where matchID = '$matchid'";
if ($conn->query($sql)) {
         header("location:rsmanagematches.php");
}else {
        echo "<script>alert('<?php  echo 'Error' .$conn->error;  ?>');location.href'rshome.php'</script>";

}

}
?>