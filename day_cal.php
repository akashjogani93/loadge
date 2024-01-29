<body class="hold-transition skin-blue sidebar-mini"onload="myFunction()" >
    <div class="wrapper" id="form1">
    <style>
        body{
            background-color:white;
        }
    *{
        font-size:11pt;
    }
    th{
        font-size:12px;
        font-weight:600;
    }
    td{
        font-size:12px;
        
    }
    span{
        font-size:12px;
    }
    h5{
        font-size: 12px;
        margin-top: -7px !important;
        margin-bottom: 8px !important;
        font-weight:700 !important;
    }
    h6{
        font-size: 10px;
        margin-top: -7px !important;
    margin-bottom: 8px !important;
    }

    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
        padding: 8px;
        line-height: 1 !important;
        vertical-align: top;
        border-top: 1px solid #ddd;
    }

@page{
    margin:0;
    padding:0;
}
.box-body{
    width:100%;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 1px !important;

}
    
    </style>
       <?php require_once("sidebar.php"); ?>
        <?php
            // $tdate = $_GET['tdate'];
            // $tabsec = $_GET['tabsec'];
            $fdate = $_GET['fdate'];

        ?>
        
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" id="mainprint" style="background-color:white;">
            <!-- Content Header (Page header) -->
            <section class="content">
                <!-- Table -->
                <div class="box" >
                    <!-- /.box-header -->
                    <div class="box-body">
                    <div class="col-md-12 addres">
                             <center><b>
                                <!-- <h5>SHIVA HOTEL</h5></b>
                            <h6>MAKANUR CROSS, NH4</h6>
                            <h6>RANEBENNUR</h6> -->
                            <b><h5>Sales Calculation-Day Wise</h5></b>
                            <h6>Date: <?php echo $fdate; ?></h6>
                        </center>
                        </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:30%" class="text-center">Date</th>
                                <th style="width:20%" class="text-center">BAmt</th>
                                <th style="width:15%" class="text-center">CGST</th>
                                <th style="width:15%" class="text-center">SGST</th>
                                <th style="width:20%" class="text-center">NAmt</th>
                            </tr>
                        </thead>
                        <tbody id="tb">
                            <?php
                                require_once("connect.php");
                                $grandTotal = 0;
                                $netprc = 0;
                               
                                //     $sql3= "SELECT slno, SUM(gndtot) as gndtot, date, SUM(gstamt) AS gsttot, SUM(nettot) AS netprc FROM tabletot WHERE date BETWEEN '$fdate' AND '$tdate' GROUP BY DAY(date)";
                                
                                // $result = mysqli_query($conn, $sql3);
                                // $result2= mysqli_query($conn, $sql3);
                                // $res= mysqli_fetch_assoc($result2);
                                // if (mysqli_num_rows($result) > 0) 
                                // {
                                //     while($row = mysqli_fetch_assoc($result)) 
                                //     {
                                //         $grandTotal += $row['gndtot'];
                                //         $netprc += $row['netprc'];

                                //         $gndtot= $row['gndtot'];
                                //         $GST=($gndtot*5)/100;
                                //         ?>
                                         <!-- <tr>
                                             <td class="text-left"><span style="margin-left:5px;"><?php echo date("d-M-Y", strtotime( $row['date'])); ?></span></td>
                                             <td class="text-right"><span style="margin-right:5px;"><?php echo number_format($gndtot,2); ?></span></td>
                                             <td class="text-right"><span style="margin-right:5px;"><?php echo number_format($GST/2,2); ?></span></td>
                                             <td class="text-right"><span style="margin-right:5px;"><?php echo number_format($GST/2,2); ?></span></td>
                                             <td class="text-right"><span style="margin-right:5px;"><?php echo number_format($row['netprc'],2); ?></span></td>
                                         </tr> -->
                                         <?php
                                //     }
                                // }
                            ?>
                        </tbody>
                        <!-- <tfoot>
                            <tr>
                                <td class="text-center"><b><?php echo "Total"; ?></b></td>
                                <td class="text-right"><b style="margin-right:5px;"><?php echo number_format($grandTotal,2); ?></b></td>
                                <td  class="text-right"><b style="margin-right:5px;"><?php echo "CGST"." ".number_format(($GST=($grandTotal*5)/100)/2,2); ?></b></td>
                                <td  class="text-right"><b style="margin-right:5px;"><?php echo "SGST"." ".number_format($GST=(($grandTotal*5)/100)/2,2); ?></b></td>
                                <td class="text-right"><b style="margin-right:5px;"><?php echo number_format($netprc,2); ?></b></td>
                            </tr>
                        </tfoot> -->
                        </table>
                    </div>
                </div>
            </section>
        </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="jquery.PrintArea.js"></script>
    <script type="text/javascript">

function myFunction()
{
    window.print();
    // window.onafterprint = function(event)
    // {
    //     window.location.href ="day_calculate.php";
    // };
}

</script> 
</body>

</html>