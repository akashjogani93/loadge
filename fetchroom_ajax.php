<?php


require_once('connect.php');

$type = $_POST['type'];

$sql = "SELECT `room_no` FROM `room` WHERE `branch`='$plan' AND `des`='Trainer'";


$a = array('Select...');
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
            $f=$row['fname'];
            $m=$row['mname'];
            $f=$row['lname'];
            $full=$row['fname']." ".$row['mname']." ".$row['lname'];

        array_push($a,$full);
    }

}

echo json_encode($a);
mysqli_close($conn);



?>