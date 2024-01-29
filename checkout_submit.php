<?php include('connect.php'); ?>

<?php 
if(isset($_POST['checkout']))
{
    
    $date = $_POST['date'];
    $food = $_POST['food'];
  
    $rent = $_POST['rent'];
    $extrabed = $_POST['extrabed'];
    // $basic = $_POST['basic'];
  
    $total1 = $_POST['total1']; //with gst
  	// $adv = $_POST['adv'];
    // $total = $_POST['total']; //with gst
  
  	$final = $_POST['final'];
  	$discount = $_POST['discount'];
  
  
    $cust_id = $_POST['cust_id'];
    $pay = $_POST['contact'];
    $rno = $_POST['rno'];
    
    
    $query="INSERT INTO `check_out`(`checkout`, `famt`, `total`, `cust_id`, `pay`,`rno`,`discount`) VALUES ('$date','$food','$total1','$cust_id','$pay','$rno','$discount');";
    $confirm = mysqli_query($conn,$query) or die(mysqli_error());
            if($confirm)
            {
                $que="UPDATE `room` SET `status`=2 WHERE `room_no`='$rno'";
                $con = mysqli_query($conn,$que) or die(mysqli_error());
                $que1="UPDATE `food` SET `status`=1 WHERE `room_no`='$rno'";
                $con1 = mysqli_query($conn,$que1) or die(mysqli_error());
                $que2="UPDATE `chek_in` SET `status`=1 WHERE `room`='$rno' AND `cust_id`='$cust_id'";
                $con2 = mysqli_query($conn,$que2) or die(mysqli_error());
                echo "<script>alert('Checkout Successfully');</script>";
                echo '<script>window.location.href="final_print.php?cust_id='.$cust_id.'";</script>';
                // echo '<script> window.location= "check_out.php"; </script>';
                
            }
            else{
                echo "<script>alert('unsuccessful');
                </script>";         
                echo '<script> window.location= "check_out.php"; </script>';
            }      
}
?>