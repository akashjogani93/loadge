<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
    

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>LOADGING</title>

    <style>
        body, html{
        height: 100%;
        font-family: 'Inter';
        }
        .container-fluid{
            padding:0;
            margin:0; 
            /* width:100%; */
            height:100%;
            overflow-x:hidden;
            overflow-y:hidden;
        }
        .back {
        /* The image used */
        background-image: url("Group.png");
            margin:0;
            padding:0;
        /* Full height */
        height: 100% !important;

        /* Center and scale the image nicely */
        /* /* background-position: center; */
        background-repeat: no-repeat;
        background-size: cover;
        }
        .log{
            /* margin-left:auto;
            margin-right:auto; */
            margin:auto;
            width:auto;
        }
        IMG.displayed {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
       h6{
            font-weight:600;
            font-size:16px;
            font-family: 'Inter';
       }

       .group 			  { 
    position:relative; 
    margin-bottom:15px; 
    }
    input 				{
    font-size:18px;
    /* padding:0px 10px 0px 5px; */
    display:block;
    width:350px;
    border:none;
    border-bottom:2px solid rgba(0, 0, 0, 0.6); 
    }
    input:focus 		{ outline:none; }

    ::placeholder{
        color:rgba(0, 0, 0, 0.6);
        font-size:14px;
        font-family: 'Inter';
    }
    /* LABEL ======================================= */
    label{
    color:rgba(0, 0, 0, 0.6); 
    font-size:16px;
    font-weight:600;
    font-family: 'Inter';
    }
    .btn{
        width: 100%;
        background-color:rgba(0, 0, 0, 0.6);
        color:white;
    }
    .btn:hover{
        background-color:rgba(0, 0, 0, 0.6);
        color:white;
    }
    /* BOTTOM BARS ================================= */
    .bar 	{ position:relative; display:block; width:300px; }
    .bar:before, .bar:after 	{
    content:'';
    height:2px; 
    width:0;
    bottom:1px; 
    position:absolute;
    background:#5264AE; 
    transition:0.2s ease all; 
    -moz-transition:0.2s ease all; 
    -webkit-transition:0.2s ease all;
    }
    /* .bar:before {
    left:50%;
    }
    .bar:after {
    right:50%; 
    } */

    /* active state
    input:focus ~ .bar:before, input:focus ~ .bar:after {
    width:50%;
    } */
    .input-wrapper {
  display: flex;
  flex-direction: column;
  margin-bottom: 20px;
}

.password-input-wrapper {
  position: relative;
}

.toggle-password {
  position: absolute;
  top: 50%;
  right: 5px;
  transform: translateY(-50%);
  cursor: pointer;
}

.toggle-password i {
  font-size: 20px;
}

.toggle-password i {
  color: blue;
}
input::-webkit-calendar-picker-indicator {
    display: none;
}

input::-webkit-datetime-edit-fields-wrapper,
input::-webkit-datetime-edit-text,
input::-webkit-datetime-edit-month-field,
input::-webkit-datetime-edit-day-field,
input::-webkit-datetime-edit-year-field,
input::-webkit-datetime-edit-ampm-field {
    color: inherit;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}

datalist {
    display: none;
}

    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row"  style="height:100%;">
            <div class="col-md-8 back1">
                <div class="back"></div>
            </div>
            <div class="co1-md-4 log">
                <div class="logo">
                    <img src="./img/logo.png" alt="" class="displayed">
                    <center><h6>WELCOME TO THE LODGING</h6></center>
                </div></br>
                <div class="form2">
                <form  name="Login_Form" method="POST">
                    <div class="group">     
                        <label>Username</label>
                        <input type="text" required placeholder="Type here..." name="user" id="user" autocomplete="off" autofocus>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                    </div>
      
                    <div class="group">  
                    <div class="input-wrapper">
                        <label for="password">Password:</label>
                        <div class="password-input-wrapper">
                            <input type="password" id="password" name="pass" placeholder="*******" autocomplete="off">
                            <div class="toggle-password" onclick="togglePassword()">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            </div>
                        </div>
                        </div>
                        <script>
                              var input = document.getElementById('user');
                                input.addEventListener('click', function() {
                                    input.removeAttribute('list');
                                });
                            function togglePassword() 
                            {
                                const passwordField = document.getElementById("password");
                                const toggleButton = document.querySelector(".toggle-password i");
                                if (passwordField.type === "password") {
                                    passwordField.type = "text";
                                    toggleButton.classList.remove("fa-eye");
                                    toggleButton.classList.add("fa-eye-slash");
                                } else {
                                    passwordField.type = "password";
                                    toggleButton.classList.remove("fa-eye-slash");
                                    toggleButton.classList.add("fa-eye");
                                }
                            }

                        </script>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                    </div></br>
                    <div class="group">  
                        
                        <button type="submit" name="login" class="btn">Log-in</button>
                        
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>
</body>
<?php
if(isset($_POST['login']))
    {
        include('connect.php');
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		$query="SELECT * FROM `login` WHERE `username`='$user' AND `pass`='$pass'";
		$confirm=mysqli_query($conn,$query) or die(mysqli_error());
		$result=mysqli_num_rows($confirm);
		if($result!=0)
		{   
            $_SESSION['Is_Login']=true;
            $out=mysqli_fetch_array($confirm);
            echo "<script>alert('login successful');</script>";
            echo "<script>window.location='dashboard.php';</script>";
        }
        echo "<script>alert('login unsuccessful Wrong Password!');</script>";
    }
?>
</html>