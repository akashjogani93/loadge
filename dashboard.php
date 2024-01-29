<?php include("sidebar.php"); 
include("connect.php"); 
$r=0;?>
<style>
    body {
        /* background-image: linear-gradient(to bottom , #248ea9 40%, #fafdcb 40%); Standard syntax (must be last) */
        background-color:rgba(233, 245, 250, 1);
        /* background-color: #946000; */
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
        overflow-y: hidden;
        font-family: 'Ropa Sans', sans-serif;
    }
    .abc{
        background-color:rgba(96, 194, 142, 1);
      padding:20px 0;
    }
    .def{
        background-color:rgba(245, 89, 79, 1);
      	padding:20px 0;
    }
      .abc1{
        background-color:rgb(255, 217, 102);
      	padding:20px 34px;
    }
  	a:link{
      	text-decoration:none;
  }
 
</style>
<?php 
    $query="SELECT DISTINCT * FROM `room` WHERE `status`=0 ORDER BY `id` ASC";
    $confirm=mysqli_query($conn,$query) or die(mysqli_error());
    $co=mysqli_query($conn,$query) or die(mysqli_error());
    
    $quer="SELECT DISTINCT * FROM `room` WHERE `status`=1 ORDER BY `id` ASC";
    $conf=mysqli_query($conn,$quer) or die(mysqli_error());
    $con=mysqli_query($conn,$quer) or die(mysqli_error());
    
?>

<!-- sidebar-wrapper  -->
<main class="page-content" >
    <div class="container-fluid" >
    	<div class="d-flex justify-content-between">
        </div><br><br><br>
        <div class="row">
           <div class="col">
                <div class="conatiner">
                    <div class="row" style="margin-left:auto; margin-right:auto;width:100%; justify-content:center;">
                        <div class="col-6 col-sm-3" >
                            <div class="p-sm-3" style="background-color:rgba(127, 32, 84, 0.6);">
                                 <h4 style="color:white;">Available</h4>
                                <?php
                                    $r=0;
                                    while($loca=mysqli_fetch_array($co))
                                    {
                                        $r=$r+1;
                                    }
                                    echo '<h4 style="color:white;">'.$r.'</h4>';
                                ?>
                                
                                
                            </div>
                        </div>
                        <div class="col-6 col-sm-3">
                        <div class="p-sm-3" style="background-color:rgba(45, 80, 78, 0.6);">
                            <h4 style="color:#fff;">Booked</h4>
                            <?php
                                $r=0;
                                while($loca=mysqli_fetch_array($con))
                                {
                                    $r=$r+1;
                                }
                                echo '<h4 style="color:white;">'.$r.'</h4>';
                            ?>
                        </div>
                    </div>
                  	<div class="col-6 col-sm-3" >
                        <a href="checkin_report.php" ><div class="p-sm-3" style="background-color:rgba(127, 32, 84, 0.6);">
                         <h4 style="color:white;">Check In Reports</h4>
                         <?php
                          	$check="SELECT * FROM `chek_in` WHERE `status`=0";
    						$check1=mysqli_query($conn,$check) or die(mysqli_error());
                            $r=0;
                          	while($che=mysqli_fetch_array($check1))
                            {
                              	$r=$r+1;
                            }
                            
                            echo '<h4 style="color:white;">'.$r.'</h4>';
                         ?>
                         
                         
                        </div></a>
                    </div>
                  	<div class="col-6 col-sm-3" >
                        <a href="checkout_report.php" ><div class="p-sm-3" style="background-color:rgba(45, 80, 78, 0.6);">
                         <h4 style="color:white;">Check Out Reports</h4>
                         <?php
                          	$checkout="SELECT * FROM `check_out`";
    						$check2=mysqli_query($conn,$checkout) or die(mysqli_error());
                            $r=0;
                          	while($che1=mysqli_fetch_array($check2))
                            {
                              	$r=$r+1;
                            }
                            
                            echo '<h4 style="color:white;">'.$r.'</h4>';
                         ?>
                         
                         
                    </div></a>
                </div>
            </div>
        </div>
        <div class="conatiner pt-2 mt-4" style="padding:0 15px;">
            <div class="row">
                <div class="col-sm-4">
                    <h6><b>AVAILABLE ROOMS</b></h6>
                    <div class="row">
                        <?php 
                            $available=mysqli_num_rows($confirm);
                            if($available>0)
                            {
                                $r=0;
                                while($loca=mysqli_fetch_array($confirm))
                                {
                                    $r=$r+1;
                                    ?>
                                    <div class="col-sm-4">
                                        <a href="checkin.php?room=<?php echo $loca['room_no']; ?>" ><div class=" abc m-1">
                                        <center> <h6 style="color:#fff;">
                                                <?php echo $loca['room_no']; ?>
                                        </h6> </center>
                                        </div></a>
                                    </div>
                                    <?php
                                }
                            }else
                                {
                                    ?>
                                        <div class="col-sm-12">
                                            <div style="display:flex; justify-content:center; align-items:center;">
                                                <img src="img/no-room.png" style="object-fit:contain; height: 200px; width: 200px;"/>
                                            </div>
                                        </div>
                                    <?php
                                }
                        ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <h6><b>BOOKED ROOMS</b></h6>
                    <div class="row">
                        <?php 
                            $bokking=mysqli_num_rows($conf);
                            if($bokking>0)
                            {
                                $r=0;
                                while($loca=mysqli_fetch_array($conf))
                                {
                                    ?>
                                        <div class="col-sm-4">
                                            <a href="check_out.php?id=<?php echo $loca['room_no']; ?>" > <div class="def m-1">
                                                <center> <h6 style="color:#fff;">
                                                    <?php echo $loca['room_no']; ?>
                                                </h6></center>
                                            </div></a>
                                        </div>
                                    <?php
                                }
                            }else
                                {
                                    ?>
                                        <div class="col-sm-12">
                                            <div style="display:flex; justify-content:center; align-items:center;">
                                                <img src="img/no-room.png" style="object-fit:contain; height: 200px; width: 200px;"/>
                                            </div>
                                        </div>
                                    <?php
                                }
                        ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <h6><b>SERVICE ROOMS</b></h6>
                    <div class="row">
                        <?php 
                            $r=0;
                            $quer11="SELECT DISTINCT * FROM `room` WHERE `status`=2 ORDER BY `id` ASC";
                            $conf11=mysqli_query($conn,$quer11) or die(mysqli_error());
                            $service=mysqli_num_rows($conf11);
                            if($service>0)
                            {
                                while($loca11=mysqli_fetch_array($conf11))
                                {
                                    $r=$r+1;
                                    ?>
                                    <div class="col-sm-4">
                                        <a href="#" class="btn btn1" onclick="confirmAction('<?php echo $loca11['room_no']; ?>')"><div class="abc1 m-1">
                                        <center>
                                        <h6 style="color:#fff;">
                                        <?php echo $loca11['room_no']; ?>
                                        </h6></center>
                                        </div></a>
                                    </div>
                                    <?php
                                }
                            }else
                                {
                                    ?>
                                        <div class="col-sm-12">
                                            <div style="display:flex; justify-content:center; align-items:center;">
                                                <img src="img/no-room.png" style="object-fit:contain; height: 200px; width: 200px;"/>
                                            </div>
                                        </div>
                            		<?php
                                }
                        ?>
                    </div>
                </div>
            </div></br>
            <div class="row">
                <div class="col-sm-4">
                    <h6><b>FRESHUP ROOMS BOOKED</b></h6>
                    <div class="row">
                        <?php 
                            $freshup="SELECT DISTINCT * FROM `room` WHERE `status`=3 ORDER BY `id` ASC";
                            $freshcon=mysqli_query($conn,$freshup) or die(mysqli_error());
                            $freshavail=mysqli_num_rows($freshcon);
                            if($freshavail>0)
                            {
                                $r=0;
                                while($loca=mysqli_fetch_array($freshcon))
                                {
                                    $r=$r+1;
                                    ?>
                                    <div class="col-sm-4">
                                        <a href="freshup.php"><div class="def m-1">
                                        <center> <h6 style="color:#fff;">
                                                <?php echo $loca['room_no']; ?>
                                        </h6> </center>
                                        </div></a>
                                    </div>
                                    <?php
                                }
                            }else
                                {
                                    ?>
                                        <div class="col-sm-12">
                                            <div style="display:flex; justify-content:center; align-items:center;">
                                                <img src="img/no-room.png" style="object-fit:contain; height: 200px; width: 200px;"/>
                                            </div>
                                        </div>
                                    <?php
                                }
                        ?>
                    </div>
                </div>
            </div>



                <?php $i = 10;
                while ($i > 5) {
                ?>
                    <!-- <div class="row">

                        <div class="col-sm-2">
                            <div class="p-3 abc m-1">
                                <h6 style="color:#fff;">
                                    A<?php echo $i; ?>
                                </h6>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="p-3 abc m-1">
                                <h6 style="color:#fff;">
                                    A<?php echo $i; ?>
                                </h6>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="p-3 abc m-1">
                                <h6 style="color:#fff;">
                                    A<?php echo $i; ?>
                                </h6>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="p-3 abc m-1">
                                <h6 style="color:#fff;">
                                    A<?php echo $i; ?>
                                </h6>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="p-3 def m-1">
                                <h6 style="color:#fff;">
                                    A<?php echo $i; ?>
                                </h6>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="p-3 abc m-1">
                                <h6 style="color:#fff;">
                                    A<?php echo $i; ?>
                                </h6>
                            </div>
                        </div>
                    </div> -->
                <?php
                    $i--;
                } ?>


            </div>
        </div>
    </div>
        
    </div>
    <div class="hrs" style="border-top:1px white solid;"></div>

    <!-- Countdown 
    <div class="col-md-12" style="margin-top:20px;">
        <img class="img-responsive img-thumbnail" style="height:450px; width:800px;" src="assets/image/dbs.jpg">
    </div>
    // Countdown -->

    <div id="sticky-footer" class="container-fluids">
           <div class="wthree-copyright m-3">
            <center><p class="text-center" style="font-weight:600;"> Design & Developed By Evon IT solution..</p></center>
           </div>
   </div>
</main>

 <!-- footer -->
    
  <!-- / footer -->
  <?php
// include("./footer.php");
?>
</div>
</div>

<script>
  function diver(value)
  {
      	//console.log(value);
        // //alert(wingname);
        let log=$.ajax({
            url: 'service_ajax.php',
            type: "POST",
            dataType:'json',
            data:  {
                value: value,
            }
            , success:function(data) 
          	{
                window.location.href = "dashboard.php";
            }

        });console.log(log)
    
  }
  
  function confirmAction(value) 
  {
  	if (confirm("Replace The Room To Available..?")) 
    {
      let log=$.ajax({
            url: 'service_ajax.php',
            type: "POST",
            dataType:'json',
            data:  {
                value: value,
            }
            , success:function(data) 
          	{
                window.location.href = "dashboard.php";
            }

        });console.log(log)
      
  	} else {
    // If the user clicked "Cancel", do nothing
    console.log("Action cancelled");
  }
}


</script>
</body>

</html>

