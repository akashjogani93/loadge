<?php include("sidebar.php"); ?>
<style>
    body {
        /* background-image: linear-gradient(to bottom , #248ea9 40%, #fafdcb 40%); Standard syntax (must be last) */
        background-color:rgba(233, 245, 250, 1);   
    }
    .abc{
        background-color:rgba(96, 194, 142, 1);
    }
    .def{
        background-color:rgba(245, 89, 79, 1);
    }
</style>


<!-- sidebar-wrapper  -->
<main class="page-content" >
    <div class="container-fluid" >
        <div class="d-flex justify-content-between">
            <h2 class="" style=" font-weight: 600;">Rooms</h2>
        </div><br><br><br>
          <!-- Small boxes (Stat box) -->
          <div class="main-conten"style="background-color:white;padding:50px;">
          <div class="row">
        <div class="col">
            <div class="conatiner">
                <div class="row" style="margin-left:auto; margin-right:auto;width:100%; justify-content:center;">
                    <div class="col-6 col-sm-3" >
                        <div class="p-sm-3" style="background-color:rgba(100, 197, 143, 1);">
                         <h4 style="color:white;"> AVLIABLE</h4>
                         <h4 style="color:white;"> 8</h4>
                         
                        </div>
                    </div>
                    <div class="col-6 col-sm-3">
                        <div class="p-sm-3" style="background-color:rgba(245, 89, 79, 1);">
                            <h4 style="color:#fff;">BOOKED</h4>
                            <h4 style="color:#fff;float-right;">4</h4>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="conatiner pt-2 mt-4">
                <div class="row">
                    <div class="col-md-6">
                        <CENTER>  <h4><b>AVAILABLE ROOMS</b></h4></CENTER>
                            <?php $i = 10;
                            while ($i > 5) {
                            ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="p-3 abc m-1">
                                    <h6 style="color:#fff;">
                                        A<?php echo $i; ?>
                                    </h6>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="p-3 abc m-1">
                                    <h6 style="color:#fff;">
                                        A<?php echo $i; ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <?php
                            $i--;
                        } ?>
                    </div>

                    <div class="col-md-6">
                        <CENTER>  <h4><b>BOOKED ROOMS</b></h4></CENTER>
                            <?php $i = 10;
                            while ($i > 5) {
                            ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="p-3 def m-1">
                                    <h6 style="color:#fff;">
                                        A<?php echo $i; ?>
                                    </h6>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="p-3 def m-1">
                                    <h6 style="color:#fff;">
                                        A<?php echo $i; ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <?php
                            $i--;
                        } ?>
                    </div>
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


</main>

 <!-- footer -->
        <!-- <div id="sticky-footer" class="container-fluids">
           <div class="wthree-copyright m-3">
            <p class="text-center" style="font-weight:600; color:white;"> Design & Developed By Evon IT solution..</p>
           </div>
        </div> -->
  <!-- / footer -->
 




</body>

</html>

