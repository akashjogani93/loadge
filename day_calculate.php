<?php include("sidebar.php");
include("connect.php");
?>
<style>
  .innerbox{
    width:100%;
    margin:auto;
    
    justify-content:center;
    background-color: rgba(255, 255, 255, 0.4);
  }
  .group-form{
    margin-top:18px;
  }
  th, td {
  padding: 7px;
  text-align: center;
}
th {
  background-color: rgba(21, 22, 23, 0.06);
}
/* td{
  background-color:white;
} */
tr th{
    border: solid 0.2px rgba(206, 225, 233, 1);
    text-align:center;

}
.akash{
    background:blue;
}
</style>
<div class="page-content container-fluid" style="background-color:rgba(233, 245, 250, 1);">
    <div class="footer"style="background-color:rgba(233, 245, 250, 1);">
        <div class="d-flex justify-content-between">
             <h2 class="" style="font-size:36px; font-weight: 600">Payment Calculation</h2>
        </div>
     
    </div>
</div>

                    
<main class="page-content"style="background-color: rgba(233, 245, 250, 1);">
    <div class="container">
        <div class="row">
            <div class="col-md-12 box">
                <div class="innerbox">
                    <form action="" method="post" enctype="multipart/form-data"  style="padding:0 20px 0 20px;">

                        <div class="row mt-2">
                            <?php 
                                $currentDate = date("Y-m-d");
                                // echo $currentDate;
                            ?>
                            <div class="group-form col-md-3">
                                <label class="form_label" for="company_name">Date From</label>
                                <input type="date" class="form-control form-control-sm cost" value="<?php echo $currentDate; ?>" required name="from" id="fdate"/>
                            </div>
                            <div class="group-form col-md-3">
                                <label class="form_label" for="company_name">Date To</label>
                                <input type="date" class="form-control form-control-sm cost" value="<?php echo $currentDate; ?>" required name="from1" id="tdate"/>
                            </div>
                            <div class="group-form-btn col-md-2" style="margin-top:45px;">
                                <button type="submit" name="submit" class="btn btn-sm btn-success col-md-12">View</button>
                            </div>
                            <div class="group-form-btn col-md-2 " style="margin-top:45px;">
                                <a href="day_calculate.php" name="submit" class="btn btn-sm btn-info col-md-12">Refresh</a>
                            </div>
                            <div class="group-form-btn col-md-2 " style="margin-top:45px;">
                                <a onclick="printClick()" class="btn btn-sm btn-warning col-md-12">Print</a>
                                <!-- <a name="pp" onclick="printClick()" class="btn btn-info" style="background-color:#B29CBE; color:white;">Print</a> -->

                            </div>
                            <script>
                                function printClick()
                                {
                                    // alert('hi');
                                    var fdate=$('#fdate').val();
                                    var tdate=$('#tdate').val();
                                    window.location.href = "day_cal.php?fdate=" + fdate + "&tdate=" + tdate;
                                }
                            </script>
                        </div>
                    </form>
                    <br><br>

                    <div class="box mt-4"style="overflow-x:scroll">
                        <div class="box-body">
                            <table id="example" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>SL NO</th>
                                        <th>ROOM</th>
                                        <th>RENT</th>
                                        <th>CGST 9%</th>
                                        <th>SGST 9%</th>
                                        <th>FOOD</th>
                                        <th>DISCOUNT</th>
                                        <th>NET</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>                               
                                    <?php 
                                        $net1=$dis=$famt2=$GST1=$basic=$slno=0;
                                        if(!isset($_POST['submit']))
                                        {
                                            $from=date("Y-m-d");;
                                            $qry="SELECT `chek_in`.*,`check_out`.* FROM `chek_in`,`check_out` WHERE DATE(checkout) = '$from' AND `check_out`.`cust_id`=`chek_in`.`cust_id` ORDER BY `check_out`.`id`";

                                        }else
                                        {
                                            $from=$_POST['from'];
                                            $from1=$_POST['from1'];
                                            ?>
                                                <script>
                                                    var fdate="<?php echo $from; ?>";
                                                    var tdate="<?php echo $from1; ?>";
                                                    $('#fdate').val(fdate);
                                                    $('#tdate').val(tdate);
                                                </script>
                                            <?php

                                            $qry="SELECT `chek_in`.*,`check_out`.* FROM `chek_in`,`check_out` WHERE DATE(checkout) BETWEEN '$from' AND '$from1' AND `check_out`.`cust_id`=`chek_in`.`cust_id` ORDER BY `check_out`.`id`";
                                        }
                                        $exc=mysqli_query($conn,$qry);
                                        $i=1;
                                        while($row=mysqli_fetch_array($exc))
                                        {
                                            $rent=$row['rent'];
                                            $coast=$row['coast'];
                                            $famt=$row['famt'];
                                            $discount=$row['discount'];
                                            $discount1 = floatval($discount);

                                            $rent1 = floatval($rent);
                                            $coast1 = floatval($coast);

                                            $famt1 = floatval($famt);
                                            $GST=(($rent1+$coast1)*18)/100;
                                            $net=($rent1+$coast1+$famt1+$GST)-$discount1;
                                            ?>
                                            <tr class="text-center">
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row['rno']; ?></td>
                                                <td><?php echo number_format($rent1+$coast1,2);?></td>
                                                <td><?php echo number_format($GST/2,2); ?></td>
                                                <td><?php echo number_format($GST/2,2); ?></td>
                                                <td><?php echo number_format($famt1,2); ?></td>
                                                <td><?php echo number_format($discount1,2);  ?></td>
                                                <td style="background: #cc4b4b; color: #fff;"><?php echo number_format($net,2);  ?></td>
                                            </tr>
                                            <?php

                                            $slno=$slno+1;

                                            $basic=$basic+$rent1+$coast1;
                                            $GST1=$GST1+$GST;
                                            $famt2=$famt2+$famt1;
                                            $dis=$dis+$discount1;
                                            $net1=$net1+$net;
                                            $i=$i+1;
                                        }
                                    ?>
                                </tbody>
                                   
                            </table>
                            <br><br>
                            <table class="table table-bordered table-striped">
                            <tr style="background: #cc4b4b; color: #fff;">
                                <td>
                                    <h5>Booked: &nbsp;&nbsp;
                                        <?php echo $slno; ?>
                                    </h5>
                                </td>
                                <td>
                                    <h5>Total Rent &nbsp;&nbsp;
                                    <?php echo number_format($basic,2); ?>
                                    </h5>
                                </td>
                                <td>
                                    <h5>GST 18%: &nbsp;&nbsp;
                                     
                                    <?php echo number_format($GST1,2); ?>
                                    </h5>
                                </td>
                                <td>
                                    <h5>Food Amount: &nbsp;&nbsp;
                                     
                                    <?php  echo number_format($famt2,2); ?>
                                    </h5>
                                </td>
                                <td>
                                    <h5>Discount: &nbsp;&nbsp;
                                     
                                    <?php echo number_format($dis,2); ?>
                                    </h5>
                                </td>
                                <td>
                                    <h5>Net Amt: &nbsp;&nbsp;
                                        
                                    <?php echo number_format($net1,2); ?>
                                    </h5>
                                </td>
                            </tr>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
  
  <script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
</main>
