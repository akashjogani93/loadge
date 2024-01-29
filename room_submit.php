<?php include("connect.php"); ?>

<?php 
if(isset($_POST['room']))
{
    $name = $_POST['cat'];
    $rno = $_POST['rno'];
    $type = $_POST['type'];
    $amt = $_POST['amt'];
    $type1 = $_POST['type1'];
    $amt1 = $_POST['amt1'];
    

    $query="INSERT INTO `room`(`category`, `room_no`, `type`, `amt`, `type1`, `amt1`) VALUES ('$name','$rno','$type','$amt','$type1','$amt1');";
    $confirm = mysqli_query($conn,$query) or die(mysqli_error());
            if($confirm)
            {
                echo "<script>alert('Added Successfully');</script>";
                echo '<script> window.location= "room_master.php"; </script>';      
            }
            else{
                echo "<script>alert('unsuccessful');
                </script>";         
                echo '<script> window.location= "room_master.php"; </script>';
            }      
}

if(isset($_POST['upd']))
{
    $name = $_POST['cat'];
    $rno = $_POST['rno'];
    $type = $_POST['type'];
    $amt = $_POST['amt'];
    $type1 = $_POST['type1'];
    $amt1 = $_POST['amt1'];
    $idd = $_POST['idd'];

    $query="UPDATE `room` SET `category`='$name',`room_no`='$rno',`amt`='$amt',`amt1`='$amt1' WHERE `id`='$idd'";
    $con=mysqli_query($conn,$query);
    if($con)
    {
        echo "<script>alert('Updated Successfully');</script>";
        echo '<script> window.location= "room_master.php"; </script>';      
    }
    else{
        echo "<script>alert('Not Updated');
        </script>";         
        echo '<script> window.location= "room_master.php"; </script>';
    }  
}
?>