<?php
include 'rsconn.php';
$playerid = $_GET['id'];

if (isset($playerid)) {

$sql = "DELETE FROM player where playerId = '$playerid'";
if ($conn->query($sql)) {
         header("location:rsmanageplayers.php");
}else {
        echo "<script>alert('<?php  echo 'Error' .$conn->error;  ?>');location.href'rshome.php'</script>";

}

}
?>