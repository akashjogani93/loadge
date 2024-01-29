<?php include("sidebar.php"); 
include("connect.php"); ?>
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
  padding: 15px;
  text-align: center;
}
th {
  background-color: rgba(21, 22, 23, 0.06);
}
td{
  background-color:white;
 
}
tr th{
    border: solid 0.2px rgba(206, 225, 233, 1);
    text-align:center;
}
</style>
<div class="page-content container-fluid" style="background-color:rgba(233, 245, 250, 1);">
    <div class="footer"style="background-color:rgba(233, 245, 250, 1);">
        <div class="d-flex justify-content-between">
             <h2 class="" style="font-size:36px; font-weight: 600">CHECK IN REPORT</h2>
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
                            <div class="group-form col-md-4">
                                <label class="form_label" for="company_name">From Date</label>
                                <input type="datetime-local" class="form-control form-control-sm cost" required name="from" placeholder="cost" value="0"/>
                            </div>
                            <div class="group-form col-md-4">
                                <label class="form_label" for="company_name">To Date</label>
                                <input type="datetime-local" class="form-control form-control-sm cost" required name="to" placeholder="cost" value="0"/>
                            </div>
                            <div class="group-form-btn col-md-2" style="margin-top:45px;">
                                <button type="submit" name="submit" class="btn btn-sm btn-success col-md-12">View</button>
                            </div>
                            <div class="group-form-btn col-md-2 " style="margin-top:45px;">
                                <a href="checkin_report.php" name="submit" class="btn btn-sm btn-info col-md-12">Refresh</a>
                            </div>
                        </div>
                    </form>
                    <br><br>

                    <div class="box mt-4"style="overflow-x:scroll">
                        <div class="box-body">
                             <table id="example" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Room No</th>
                                        <th>Room Type</th>
                                        <th>Check In Date & Time</th>
                                        <!-- <th>Stay Hours</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(!isset($_POST['submit']))
                                        {
                                            $qry="SELECT * FROM `chek_in` WHERE `status`=0";
                                        }else
                                        {
                                            $from=$_POST['from'];
                                            $to=$_POST['to'];
                                            $qry="SELECT * FROM `chek_in` WHERE `datecheck` BETWEEN '$from' to '$to'`status`=0";
                                        } 
                                        $exc=mysqli_query($conn,$qry);
                                        while($row=mysqli_fetch_array($exc))
                                        {
                                            ?>
                                            <tr class="text-center">
                                                <td><?php echo $row['cust_id'] ?></td>
                                                <td><?php echo $row['full'] ?></td>
                                                <td><?php echo $row['email'] ?></td>
                                                <td><?php echo $row['phone'] ?></td>
                                                <td><?php echo $row['room'] ?></td>
                                                <td><?php echo $row['type'] ?></td>
                                                <td><?php echo $row['datecheck'] ?></td>
                                            </tr>
                                            <?php
                                        }
                                    ?>
                                </tbody>
                                   
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
