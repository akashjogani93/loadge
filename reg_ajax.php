<?php include("connect.php"); 

if(isset($_POST['rno']))
{
    $query="SELECT `hotelreg`.*,`login`.* FROM `hotelreg`,`login` WHERE `hotelreg`.`hid`=`login`.`hid`";
    $confirm=mysqli_query($conn,$query);
    $a=[];
    while($row=mysqli_fetch_array($confirm))
    {
        $name=$row['name'];
        $gst=$row['gst'];
        $fssi=$row['fssi'];
        $lic=$row['lic'];
        $tax=$row['tax'];
        $adds=$row['add'];
        $cont=$row['contact'];
        $email=$row['email'];
        $land=$row['land'];
        $user=$row['username'];
        $pass=$row['pass'];
        $logo=$row['logo'];
        array_push($a,$name,$gst,$fssi,$lic,$tax,$adds,$cont,$land,$email,$user,$pass,$logo);
    }
    
    echo json_encode($a);
    mysqli_close($conn);    
}


?>
