<?php
require_once('connect.php');


$value = $_POST['value'];
$que="UPDATE `room` SET `status`=0 WHERE `room_no`='$value'";
$con = mysqli_query($conn,$que) or die(mysqli_error());
echo json_encode("Completed");
mysqli_close($conn);
?>