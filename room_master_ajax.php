<?php
include("connect.php");

if(!empty($_POST['acc']))
{
    $acc=$_POST['acc'];
    $query = "SELECT * FROM `room` WHERE `room_no`='$acc'";
    $result=mysqli_query($conn,$query);
    $count=mysqli_num_rows($result);
    if($count>0) {
        echo "<span style='color:red'>Room Number already exists..</span>";
        echo "<script>$('#sub').prop('disabled',true);</script>";
     } else{
            echo "<span style='color:green'>Room Number Is available To Enter</span>";
            echo "<script>$('#sub').prop('disabled',false);</script>";

        }
    }



?>