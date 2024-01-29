<?php include("sidebar.php");
include("connect.php");
?>
<style>

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
  text-align:center;
}
tr th{
    border: solid 0.2px rgba(206, 225, 233, 1);
}
.inboxes{
    width:100%;
    display: grid;
    margin: auto;
    justify-content: center;
    align-items: center;
    background-color:rgba(255, 255, 255, 0.4);
    padding:30px 10px 50px 10px;
}
</style>
<div class="page-content container-fluid" style="background-color:rgba(233, 245, 250, 1);">
    <div class="footer"style="background-color:rgba(233, 245, 250, 1);">
        <div class="d-flex justify-content-between">
             <h2 class="" style="font-size:36px; font-weight: 600">FRESH UP</h2>
        </div>
     
    </div>
</div>

                    
<main class="page-content"style="background-color: rgba(233, 245, 250, 1);">
    <div class="container">
        <div class=" inboxes">
            <form action="freshup_add.php" method="post" enctype="multipart/form-data" >

                <div class="row ">
                    <div class="group-form col-md-6">
                        <label class="form_label" for="company_name">Room No</label>
                        <select class="form-control form-control-sm" required name="rno" id="rno">
                            <option value="">Select Number</option>
                            <?php
                                    $query="SELECT DISTINCT `room_no` FROM `room` WHERE `status`=0 ORDER BY `id` ASC";
                                    $confirm=mysqli_query($conn,$query) or die(mysqli_error());
                                    while($loca=mysqli_fetch_array($confirm))
                                {?>
                                    <option><?php echo $loca['room_no']; ?></option>
                                <?php   }   ?>
                        <select>
                    </div>
                    <div class="group-form col-md-6">
                        <label class="form_label" for="company_name">Check In Date & Time</label>
                        <input type="datetime-local" class="form-control form-control-sm" name="date" id="date" required>
                        <script>
                            let now = new Date();
                            let year = now.getFullYear();
                            let month = (now.getMonth() + 1).toString().padStart(2, '0');
                            let day = now.getDate().toString().padStart(2, '0');
                            let hours = now.getHours().toString().padStart(2, '0');
                            let minutes = now.getMinutes().toString().padStart(2, '0');
                            let datetime = `${year}-${month}-${day}T${hours}:${minutes}`;
                            document.getElementById("date").value = datetime;
                            document.getElementById("date").min = datetime;
                        </script>
                    </div>
                </div>

                <div class="row">
                    <div class="group-form col-md-6">
                        <label class="form_label" required for="company_name">Name</label>
                        <input type="text" class="form-control form-control-sm"  required placeholder="Enter Name" name="name" pattern="[A-Za-z ]+"/>
                    </div>
                    <div class="group-form col-md-6">
                        <label class="form_label" for="company_name">Amount</label>
                        <input type="number" class="form-control form-control-sm"  required placeholder="Enter Amount" name="amt" min="1"/>
                    </div>
                </div>

                <div class="row">
                    <div class="group-form col-md-6">
                        <label class="form_label" for="company_name">Mobile No</label>
                        <input type="tel" class="form-control form-control-sm"  required placeholder="Enter Mobile" name="mobile" pattern="^(?!0{10})\d{10}$"/>
                    </div>
                    <div class="group-form col-md-6">
                        <label class="form_label" required for="company_name">Hourly Check-In Time</label>
                        <select class="form-control form-control-sm" required name="hour" id="hour">
                            <option value="">Select Hour</option>
                            <option>1 Hour</option>
                            <option>2 Hour</option>
                            <option>3 Hour</option>
                            <option>4 Hour</option>
                            <option>5 Hour</option>
                            <option>6 Hour</option>
                            <option>7 Hour</option>
                            <option>8 Hour</option>
                        <select>
                    </div>
                
                </div>
                <div class="row">
                <div class="group-form col-md-6">
                        <label class="form_label" for="company_name">Payment Mode</label><br>
                        <input type="radio" id="contactChoice1" name="contact" value="Online" />
                        <label for="contactChoice1" style="margin-right:20px;">Online</label>

                        <input type="radio" checked id="contactChoice2" name="contact" value="Cash" />
                        <label for="contactChoice2">Cash</label>
                    </div> 
                    <div class="group-form-btn col-md-6">
                        <button type="submit" name="freshup" class="btn btn-sm btn-success col-md-12">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        
            <div class="box" style="overflow-x:scroll;">
                        <table style="width:100%; ">
                            <tr>
                                <th>Sl No</th>
                                <th>Room No</th>
                                <th>Name</th>
                                <th>Mobile No</th>
                                <th>Check In Time</th>
                                <th>Hourly Time</th>
                                <th>Amount</th>
                                <th>Payment Mode</th>
                                <th>Action</th>

                            </tr>
                            <?php 
                                    $qry="SELECT * FROM `freshup` WHERE `status`=0";
                                    $exc=mysqli_query($conn,$qry);
                                    $i=0;
                                    while($row=mysqli_fetch_array($exc))
                                    {
                                        ?>
                                        <tr class="text-center">
                                            <td><?php echo $i+1; ?></td>
                                            <td><?php echo $row['roomno'] ?></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['mobile'] ?></td>
                                            <td><?php echo $row['datetime'] ?></td>
                                            <td><?php echo $row['hour'] ?></td>
                                            <td><?php echo $row['amt'] ?></td>
                                            <td><?php echo $row['pay'] ?></td>
                                            <td>
                                            <a href="freshup_add.php?complet=<?php echo $row['id']?>"><button class="btn btn-sm btn-primary">Checkout</button> </a></td>
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
        
    </div>
</main>
