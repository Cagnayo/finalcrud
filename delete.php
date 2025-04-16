<?php
include 'connection.php';
$id=$_GET ['deletedid'];
$sql = "delete from `list` where id = $id";
$result = mysqli_query($con,$sql);
if($result){
    header ('location:read.php');
} else {
    die(mysqli_error($con));
}

?>