<?php include("sidebar.php");
        include("connect.php");
        $cnt = 0;
        $sql = "SELECT max(food_id) FROM food";
        $retval = mysqli_query($conn, $sql );
        
        if(! $retval ) {
            die('Could not get data: ' . mysqli_error($conn));
        }
        while($row = mysqli_fetch_assoc($retval)) {
            $cnt=$row['max(food_id)'];
            $cnt++;
        }
?>
<style>
  
  .box{
   
    width:100%;
    margin:auto;
    justify-content:center;
  }
  .innerbox{
    display:grid;
    margin:auto;
    width:100%;
    justify-content:center;
    background-color: rgba(255, 255, 255, 0.4);
    padding:50px 0 50px 0;
  }
  .inbox{
    padding:30px 0 50px 0;
    background-color:white;
    display:grid;
    margin:auto;
    width:100%;
    justify-content:center;
  }
  .group-form{
    margin-top:18px;
  }
  th, td {
  padding: 15px;
  text-align: left;
}
th {
  background-color: rgba(21, 22, 23, 0.06);
}
td{
  background-color:white;
  text-align:center;
}
tr th{
    border: solid 0.2px rgba(206, 225, 233, 1);
}
</style>
<div class="page-content container-fluid" style="background-color:rgba(233, 245, 250, 1);">
    <div class="footer"style="background-color:rgba(233, 245, 250, 1);">
        <div class="d-flex justify-content-between">
             <h2 class="" style="font-size:36px; font-weight: 600">FOOD ORDERED</h2>
        </div>
     
    </div>
</div>

                    
<main class="page-content"style="background-color: rgba(233, 245, 250, 1);">
    <div class="container">
        <div class="row">
            <div class="col-md-12 box">
                <div class="innerbox">
                    <div class="inbox">
                    <form action="food_submit.php" method="post" enctype="multipart/form-data"  >
                      		<div class="group-form col-md-12">
                                <label class="form_label" for="company_name">Sl No</label>
                                <input type="text" class="form-control form-control-sm" readonly value="<?php echo $cnt; ?>" placeholder="001"/>
                            </div>
                            <div class="group-form col-md-12">
                                <label class="form_label" for="company_name">Room No</label>
                                <select class="form-control form-control-sm" required name="rno" id="rno" onchange="diver1()">
                                    <option value="">Select Number</option>
                                    <?php
                                            $query="SELECT DISTINCT `room_no` FROM `room` WHERE `status`=1 ORDER BY `id` ASC";
                                            $confirm=mysqli_query($conn,$query) or die(mysqli_error());
                                            while($loca=mysqli_fetch_array($confirm))
                                        {?>
                                            <option><?php echo $loca['room_no']; ?></option>
                                        <?php   }   ?>
                                <select>
                            </div>
                            <div class="group-form col-md-12">
                                <label class="form_label" for="company_name">Food Bill No</label>
                                <input type="number" class="form-control form-control-sm" id="foodbill" name="foodbill" placeholder="Enter Bill No" required min="1"/>
                            </div>
                            <div class="group-form col-md-12">
                                <label class="form_label" for="company_name">Total Amount</label>
                                <input type="number" class="form-control form-control-sm" required name="amount" placeholder="Enter Amount" min="1"/>
                            </div>
                            <div class="group-form-btn col-md-12">
                                <button type="submit" name="food" class="btn btn-sm btn-success col-md-12">Submit</button>
                            </div>
                        </form>
                    </div>
                    <table style="width:100%; overflow-x:scroll;">
                        <tr >
                            <th>Sl No</th>
                            <th>Room Number</th>
                            <th>Food Bill Number</th>
                            <th>Total Amount</th>
                        </tr>
                        <?php 
                                $qry="SELECT * FROM `food` WHERE `status`=0";
                                $exc=mysqli_query($conn,$qry);
                                $i=0;
                                while($row=mysqli_fetch_array($exc))
                                {
                                    ?>
                                    <tr class="text-center">
                                        <td><?php echo $i+1; ?></td>
                                        <td><?php echo $row['room_no'] ?></td>
                                        <td><?php echo $row['food'] ?></td>
                                        <td><?php echo $row['amt'] ?></td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            ?>    
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</main>
