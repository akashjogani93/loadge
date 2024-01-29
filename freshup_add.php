<?php include('connect.php'); ?>

<?php 
if(isset($_POST['freshup']))
{
    $rno = $_POST['rno'];
    $hour = $_POST['hour'];
    $name = $_POST['name'];
    $amt = $_POST['amt'];
    $mobile = $_POST['mobile'];
    $contact = $_POST['contact'];
    $date = $_POST['date'];

    $query="INSERT INTO `freshup`(`hour`, `datetime`, `roomno`, `name`, `amt`, `mobile`, `pay`) VALUES('$hour','$date','$rno','$name','$amt','$mobile','$contact');";
    $confirm = mysqli_query($conn,$query) or die(mysqli_error());
            if($confirm)
            {
                $que="UPDATE `room` SET `status`=3 WHERE `room_no`='$rno'";
                $con = mysqli_query($conn,$que) or die(mysqli_error());
                echo "<script>alert('Added Successfully');</script>";
                echo '<script> window.location= "freshup.php"; </script>';      
            }
            else{
                echo "<script>alert('unsuccessful');
                </script>";         
                echo '<script> window.location= "freshup.php"; </script>';
            }      
}

if(isset($_GET['complet']))
{
    $id=$_GET['complet'];

    $query="SELECT `roomno` FROM `freshup` WHERE `id`='$id'";
    $confirm = mysqli_query($conn,$query) or die(mysqli_error());
    while($row=mysqli_fetch_array($confirm))
    {
        $rno=$row['roomno'];
    }
    $que1="UPDATE `room` SET `status`=2 WHERE `room_no`='$rno'";
    $con1 = mysqli_query($conn,$que1) or die(mysqli_error());
    if($con1)
    {
        $que="UPDATE `freshup` SET `status`=1 WHERE `id`='$id'";
        $con = mysqli_query($conn,$que) or die(mysqli_error());
        echo "<script>alert('Successfully Checkout');</script>";
        echo '<script> window.location= "freshup.php"; </script>';
    }
    
}
?>