<?php
include 'rsconn.php';
$catid = $_GET['id'];

if (isset($catid)) {

$sql = "DELETE FROM category where categoryId = '$catid'";
if ($conn->query($sql)) {
         header("location:rsmanagecategories.php");
}else {
        echo "<script>alert('<?php  echo 'Error' .$conn->error;  ?>');location.href'rshome.php'</script>";

}

}
?>