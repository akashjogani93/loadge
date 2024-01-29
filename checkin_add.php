<?php include('connect.php'); ?>

<?php 
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $type = $_POST['type'];
    $rno = $_POST['rno'];
    $bed = $_POST['bed'];
    $cost = $_POST['cost'];
    $dip = $_POST['dip'];
    $remain = $_POST['remain'];
    $amt = $_POST['amt'];
    $cmp = $_POST['cmp'];
    $gst = $_POST['gst'];

    $image = $_FILES['proof'];
    $profile = upload_Profile($image,"./img/");

    $query="INSERT INTO `chek_in`(`full`, `email`, `datecheck`, `type`, `room`, `rent`, `bed`, `coast`,`total`, `advance`,`phone`,`proof`,`cmp`,`gst`) VALUES ('$name','$email','$date','$type','$rno','$amt','$bed','$cost','$remain','$dip','$phone','$profile','$cmp','$gst');";
    $confirm = mysqli_query($conn,$query) or die(mysqli_error());
            if($confirm)
            {
                $que="UPDATE `room` SET `status`=1 WHERE `room_no`='$rno'";
                $con = mysqli_query($conn,$que) or die(mysqli_error());
                echo "<script>alert('Added Successfully');</script>";
                echo '<script> window.location= "checkin.php"; </script>';      
            }
            else{
                echo "<script>alert('unsuccessful');
                </script>";         
                echo '<script> window.location= "checkin.php"; </script>';
            }      
}

function upload_Profile($image, $target_dir)
    {   
        if($image['name']!=""){
        $target_file = $target_dir . basename($image["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $msg = " ";
        try {
            $check = getimagesize($image["tmp_name"]);
            $msg = array();
            if ($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                $msg[1] = "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if ($imageFileType != "pdf" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                $msg[2] = "Sorry, only PDF, JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $msg[3] = "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($image["tmp_name"], $target_file)) {
                    //$msg= "The file ". basename( $image["name"]). " has been uploaded.";
                } else {
                    $msg[4] = "Sorry, there was an error uploading your file.";
                }
            }
            // echo "<pre>";
            // print_r($msg);
            return ltrim($target_file, '');
            } catch (Exception $e) {
            // echo "Message" . $e->getmessage();
        }
    }else{
        return "";
    }
    }
?>