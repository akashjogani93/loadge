<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <!-- icon -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <?php
    include("connect.php");
    $query="SELECT * FROM `hotelreg` WHERE `hid`=1";
    $confirm=mysqli_query($conn,$query) or die(mysqli_error());
    while($loca=mysqli_fetch_array($confirm))
    {
        $gst=$loca['gst'];
        $add=$loca['add'];
        $contact=$loca['contact'];
        $logo=$loca['logo'];
    }
  ?>

    
<html>
    <style>
        .form-group{
            display:inline-block;
            font-size:17px;
        }
        .table{
            width:93%;
           
            margin-left:30px;
        }
      
        th{
           
            font-size:17px;
        }
        td{
         
            margin-left:5px;
            font-size:17px;
        }
        .table td, .table th {
            padding: 8px;
            margin-left:10px;
        }

    
        p {
            margin-top: 0;
            margin-bottom: 0rem;
        }
        img{
            width:80px;
            height:80px;
            float:left;
           margin-left:10px;
  
        }

        .form-group {
    margin-bottom: 0px;
}
      @page{
        	margin:0;
        padding:0;
      }

        </style>
    <body>
        <script>
			$(document).ready(function() {
			    // function myFunction()
                // {
                    window.print();
                    window.onafterprint = function(event)
                    {
                        window.location.href ="dashboard.php";
                    };
                // }
			});
		</script>
        <form>
            <?php 
                    $cust_id=$_GET['cust_id'];
                    $qry="SELECT `chek_in`.*,`check_out`.* FROM `chek_in`,`check_out` WHERE `chek_in`.`cust_id`=`check_out`.`cust_id` AND `chek_in`.`cust_id`='$cust_id' ";
                    $exc=mysqli_query($conn,$qry);
                    while($row=mysqli_fetch_array($exc))
                    {
                        $full=$row['full'];
                        $phone=$row['phone'];
                        $cmp=$row['cmp'];
                        $cgst=$row['gst'];
                        $id=$row['id'];
                        
                        $rent=$row['rent'];
                        $famt=$row['famt'];
                        $coast=$row['coast'];
                        $adv=$row['advance'];
                        $out=$row['checkout'];
                        $check=$row['datecheck'];
                        $room=$row['room'];
                      	$discount=floatval($row['discount']);
                    }
                
        	?>
            <div class="card container" >
                <div class="card-body">            
                    <div class="panel-heading">                       
                    <div class="panel-title">     
                          <img src="<?php echo $logo; ?>">
                                <center><P style="float:right;"><b>GSTIN:</b><?php echo $gst?></p><h5 >SHIVA LODGE</h5> </center>
                              <center><h4 style="margin-right:170px;"></h4> </center>
                              <center>
                                <div style="margin-right:170px;">
                                    <p><?php echo $add?></p>
                                    <p style="margin-left:100px;">Mobile Number :- <?php echo $contact?></p> </center>
                                </div>
                                    <hr>
                      	</div>
                    </div><br>
                        <?php $curdate = date("d/m/Y"); ?>   
                        <div class="row">
                            <div class="col-sm-8" style="margin-left: 30px;">
                                <div class="form-group">
                                    <label><b>Customer_id: </b><?php echo $cust_id; ?></label>
                                </div>
                            </div>
                            <div class="col-offset-sm-4" style="margin-left: 30px;">
                                <div class="form-group">
                                    <label><b>Invoice No: </b><?php echo $id; ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8" style="margin-left: 30px;">
                                <div class="form-group">
                                    <label><b>Mr/Miss: </b> <?php echo $full ?></label>
                                </div>
                            </div>
                            <div class="col-offset-sm-4" style="margin-left: 30px;">
                                <div class="form-group">
                                    <label><b>Mobile: </b> <?php echo $phone; ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8" style="margin-left: 28px;">
                                <div class="form-group">
                                    <label><b>Company_name: </b> <?php echo $cmp; ?></label>
                                </div>
                            </div>
                            <div class="col-offset-sm-4" style="margin-left: 30px;">
                                <div class="form-group">
                                    <label><b>Customer-GST: </b> <?php echo $cgst; ?></label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="panel-body" >
                            <!-- table here -->
                            <table class="table table-bordered ">
                                <tr>
                                  	<th>Sl.No</th>
                                  	<th>Room NO</th>
                                    <th>Checkin</th>
                                    <th>Checkout</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    
                                </tr>
                                <tr>
                                    <td rowspan="9x">1</td>
                                  	<td rowspan="9x"><?php echo $room?></td>
                                    <td rowspan="9x"><?php echo $check?></td>
                                    <td rowspan="9x"><?php echo $out?></td>
                                    <td>Room Charge:</td>
                                   <td><?php echo $rent?></td>
                                </tr>
                              <?php if($coast>0)
								{
                              ?>
                                <tr>
                                  <td>Extra Bed</td>
                                  <td><?php echo number_format($coast,2); ?></td>
                                </tr>
                              <?php
								}
                              ?>
                                <tr>
                                    <?php $tax=$rent+$coast;
                                            $tax1=$tax*18/100; 
                                            $final=$tax+$tax1?>
                                    <td>C.GST(9%):</td>
                                   <td><?php echo number_format($tax1/2,2); ?></td>
                                </tr>
                              	<tr>
                                    <td>S.GST(9%):</td>
                                   <td><?php echo number_format($tax1/2,2); ?></td>
                                </tr>
                                <?php if($adv>0)
                                        {
                                            ?>
                                                <tr>
                                                    <td>Deposit</td>
                                                    <td><?php echo number_format($adv,2)?></td>
                                                </tr>
                                            <?php
                                        }
                                ?> 
                                <tr>
                                
                                    <td class="h6">Payble:</td>
                                   <td><?php $final1=$final-$adv; echo number_format($final1,2); ?></td>
                                </tr>
                               	<?php if($famt>0)
                                        {
                                            ?>
                                                <tr>
                                                    <td>Food Charge</td>
                                                    <td><?php echo number_format($famt,2); ?></td>
                                                </tr>
                                            <?php
                                        }
                                ?>
                              <?php if($discount>0)
                                        {
                                            ?>
                                                <tr>
                                                    <td>Discount Amount</td>
                                                    <td><?php echo number_format($discount,2); ?></td>
                                                </tr>
                                            <?php
                                        }
                                ?>
                              	<tr>
                                
                                    <td class="h6">Final Amount:</td>
                                   <td><?php  $net=($final1+$famt)-$discount; echo number_format($net,2); ?></td>
                                </tr>
                         </table><hr>
                        
                   </div>
              		E.& O.E
                </div>
        </form>
    </body>
    
</html>

