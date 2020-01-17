<?php
include 'rsconn.php';
$usid = $_GET['id'];

if (isset($usid)) {

$sql = "DELETE FROM users where userId = '$usid'";
if ($conn->query($sql)) {
         header("location:rsmanageadmin.php");
}else {
        echo "<script>alert('<?php  echo 'Error' .$conn->error;  ?>');location.href'rshome.php'</script>";

}

}
?>