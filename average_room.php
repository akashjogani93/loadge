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
             <h2 class="" style="font-size:36px; font-weight: 600">CHECK BY ROOM RENT</h2>
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
                                <label class="form_label" for="company_name">From Amount</label>
                                <input type="number" placeholder="Enter Amount" class="form-control form-control-sm cost" required name="from" min="1"/>
                            </div>
                            <div class="group-form col-md-4">
                                <label class="form_label" for="company_name">To Amount</label>
                                <input type="number" placeholder="Enter Amount" class="form-control form-control-sm cost" required name="to" min="1"/>
                            </div>
                            <div class="group-form-btn col-md-2" style="margin-top:45px;">
                                <button type="submit" name="submit" class="btn btn-sm btn-success col-md-12">View</button>
                            </div>
                            <div class="group-form-btn col-md-2 " style="margin-top:45px;">
                                <a href="average_room.php" name="submit" class="btn btn-sm btn-info col-md-12">Refresh</a>
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
                                        <th>Mobile</th>
                                        <th>Room Number</th>
                                        <th>Rent</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                        <th>Pay Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>                               
                                    <?php 
                                        if(!isset($_POST['submit']))
                                        {
                                            $qry="SELECT `chek_in`.*,`check_out`.* FROM `chek_in`,`check_out` WHERE `check_out`.`cust_id`=`chek_in`.`cust_id` ORDER BY `check_out`.`id`";
                                        }else
                                        {
                                            $from=$_POST['from'];
                                            $to=$_POST['to'];
                                          	echo $from;
                                          echo $to;
                                            $qry="SELECT `chek_in`.*,`check_out`.* FROM `chek_in`,`check_out` WHERE `check_out`.`total` >= '$from' AND `check_out`.`total` <= '$to' AND `check_out`.`cust_id`=`chek_in`.`cust_id` ORDER BY `check_out`.`id`";
                                        }
                                        $exc=mysqli_query($conn,$qry);
                                        $i=0;
                                        while($row=mysqli_fetch_array($exc))
                                        {
                                            ?>
                                            <tr class="text-center">
                                                <td><?php echo $i+1; ?></td>
                                                <td><?php echo $row['full']; ?></td>
                                                <td><?php echo $row['phone']; ?></td>
                                                <td><?php echo $row['rno']; ?></td>
                                                <td><?php echo $row['total']; ?></td>
                                                <td><?php echo $row['datecheck']; ?></td>
                                                <td><?php echo $row['checkout'];  ?></td>
                                                <td><?php echo $row['pay'];  ?></td>
                                                <td><a href="final_print.php?cust_id=<?php echo $row['cust_id']; ?>"><button class="btn btn-sm btn-primary">Print</button> </a></td>
                                            </tr>
                                            <?php
                                            $i++;
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
