<?php
include 'rsconn.php';
$scoreid = $_GET['id'];

if (isset($scoreid)) {

$sql = "DELETE FROM malescores where scoreID = '$scoreid'";
if ($conn->query($sql)) {
         header("location:rsmanagescores.php");
}else {
        echo "<script>alert('<?php  echo 'Error' .$conn->error;  ?>');location.href'rshome.php'</script>";

}

}
?>