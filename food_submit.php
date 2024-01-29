<?php include('connect.php'); ?>

<?php 
if(isset($_POST['food']))
{
    $rno = $_POST['rno'];
    $amt = $_POST['amount'];
    $foodbill= $_POST['foodbill'];
    
    
    $query="INSERT INTO `food`(`room_no`, `amt`,`food`) VALUES ('$rno','$amt','$foodbill');";
    $confirm = mysqli_query($conn,$query) or die(mysqli_error());
            if($confirm)
            {
                echo "<script>alert('Added Successfully');</script>";
                echo '<script> window.location= "food_ordered.php"; </script>';      
            }
            else{
                echo "<script>alert('unsuccessful');
                </script>";         
                echo '<script> window.location= "food_ordered.php"; </script>';
            }      
}
?>