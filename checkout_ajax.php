<?php


require_once('connect.php');

$rno = $_POST['rno'];

$sql ="SELECT * FROM `chek_in` WHERE `room`='$rno' AND `status`=0";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{
    $a=[];
    $amt=0;
    while($row = mysqli_fetch_assoc($result))
    {
        $full=$row['full'];
        $cust=$row['cust_id'];
        $rent=$row['rent'];
        $coast=$row['coast'];
        $advance=$row['advance'];
        $total=$row['total'];
        $datecheck=$row['datecheck'];
        $sql1 ="SELECT `amt` FROM `food` WHERE `room_no`='$rno' AND `status`=0";
        $result1 = mysqli_query($conn, $sql1);
        while($row1 = mysqli_fetch_assoc($result1))
        {
            $amt4=$row1['amt'];
            $amt=$amt+$amt4;
        }
        $total1=$total+$amt;
        array_push($a,$full,$cust,$rent,$coast,$amt,$advance,$total1,$rno,$datecheck);
        
    }

}

echo json_encode($a);
mysqli_close($conn);



?>