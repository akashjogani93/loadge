<?php include('connect.php'); 

if(isset($_POST['update']))
{
    
    

    $name = $_POST['name'];
    $gst = $_POST['gst'];
    $fssi = $_POST['fssi'];
    $lic = $_POST['lic'];
    $tax = $_POST['tax'];
    $adds = $_POST['adds'];
    $cont = $_POST['cont'];
    $land = $_POST['land'];
    $email = $_POST['email'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $image = $_FILES['imageupdate'];
    $profile = upload_Profile($image,"./img/");
    
    $query="UPDATE `hotelreg` SET `name`='$name',`gst`='$gst',`fssi`='$fssi',`lic`='$lic',`tax`='$tax',`add`='$adds',`contact`='$cont',`land`='$land',`email`='$email',`logo`='$profile' WHERE `hid`=1";
    $confirm = mysqli_query($conn,$query) or die(mysqli_error());
    if($confirm)
    {
        $que="UPDATE `login` SET `username`='$user',`pass`='$pass' WHERE `hid`=1";
        $con = mysqli_query($conn,$que) or die(mysqli_error());

        echo "<script>alert('Details Updated');</script>";
        echo '<script> window.location= "registration.php"; </script>';
    }else
    {
        echo "<script>alert('Not Updated');</script>";
        echo '<script> window.location= "registration.php"; </script>';
    }


    //upload images profele & other document in jpg,png format
    
    
    
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