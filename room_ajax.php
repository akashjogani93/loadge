<?php


require_once('connect.php');

$room = $_POST['room'];
$type = $_POST['type'];
if($type=='12 Hour')
{
    $sql = "SELECT `amt` FROM `room` WHERE `room_no`='$room'";
}else
{
    $sql = "SELECT `amt1` FROM `room` WHERE `room_no`='$room'";
}

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{
    // output data of each row
    $a=[];
    while($row = mysqli_fetch_assoc($result))
    {
        if($type=='12 Hour')
        {
            $amt=$row['amt'];
        }else
        {
            $amt=$row['amt1'];
        }
           
        array_push($a,$amt);
    }

}

echo json_encode($a);
mysqli_close($conn);



?>