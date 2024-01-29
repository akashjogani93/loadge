<?php include("sidebar.php");
include("connect.php");
$cnt = 0;
$sql = "SELECT max(cust_id) FROM chek_in";
$retval = mysqli_query($conn, $sql );

if(! $retval ) 
{
    die('Could not get data: ' . mysqli_error($conn));
}
while($row = mysqli_fetch_assoc($retval))
{
    $cnt=$row['max(cust_id)'];
    $cnt++;
}


?>

<?php 
	if(isset($_GET['room']))
    {
      	$room=$_GET['room'];
      ?>
		<script>
          	var wingname="<?php echo $room; ?>";
     
         	 var type = "12 Hour";
            let log=$.ajax({
                url: 'room_ajax.php',
                type: "POST",
                dataType:'json',
                data:  {
                    room: wingname,
                    type: type,
                }
                , success:function(data) {
                    $("#amt").val(data);
                    $("#remain").val(data);
					$("#rno").val(wingname);
                }

            });console.log(log)
		</script>
		<?php
    }
?>
<style>
    .class{
        font-size:14px;

    }
    form {
    padding: 30px;
}
.box{
    overflow-x:scroll;
}
</style>
<div class="page-content container-fluid" style="background-color:rgba(233, 245, 250, 1);">
    <div class="footer"style="background-color:rgba(233, 245, 250, 1);">
        <div class="d-flex justify-content-between">
             <h2 class="" style="font-size:36px; font-weight: 600">GUEST REGISTRATION</h2>
        </div>
     
    </div>
</div>                    
<main class="page-content"style="background-color:rgba(233, 245, 250, 1);">
    <div class="container">
       
        <form action="checkin_add.php" method="post" enctype="multipart/form-data" style="background-color:rgba(255, 255, 255, 0.4)" >
          
            <div class="row mt-2">
                    <input type="hidden" readonly value="<?php echo $cnt; ?>" class="form-control form-control-sm" name="id" id="id" placeholder="Customer Id">
               
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name"> Name</label>
                    <input type="text" class="form-control form-control-sm" required  name="name" id="name" placeholder="Enter First Name" pattern="[A-Za-z ]+"/>
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Company Name</label>
                    <input type="text" class="form-control form-control-sm"  name="cmp" id="cmp" placeholder="Enter Company Name"/>
                </div>
              	<div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Customer-GST</label>
                   
                    <input type="text" class="form-control form-control-sm" name="gst" id="gst" placeholder="Enter GST" pattern="[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[0-9A-Z]{1}[Z]{1}[0-9A-Z]{1}">
                </div>
            </div></br>
            <div class="row mt-2">
                
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Email</label>
                    <input type="email" class="form-control form-control-sm"  name="email" id="email" placeholder="Enter Email"/>
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Phone No</label>
                    <input type="tel" class="form-control form-control-sm" required name="phone" id="phone" placeholder="Enter Phone" pattern="^(?!0{10})\d{10}$"/>
                </div>
             	 <div class="group-form col-md-4">
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
            </div></br>
            <div class="row mt-2">
                
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Type</label>
                    <select class="form-control form-control-sm" required name="type" id="type" onchange="diver()">
                        <option>12 Hour</option>
                        <option>24 Hour</option>
                    </select>
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Room No</label>
                
                    <select class="form-control form-control-sm" required name="rno" id="rno" onchange="diver1()">
                        <option value="">Select Number</option>
                        <?php
                                $query="SELECT DISTINCT `room_no` FROM `room` WHERE `status`=0 ORDER BY `id` ASC";
                                $confirm=mysqli_query($conn,$query) or die(mysqli_error());
                                while($loca=mysqli_fetch_array($confirm))
                              {?>
                                  <option><?php echo $loca['room_no']; ?></option>
                              <?php   }   ?>
                    </select>
                </div>
              <div class="group-form col-sm-4">
                    <label class="form_label" for="company_name">Id Proof</label>
                    <input type="file" class="form-control form-control-sm" name="proof" id="proof" accept="image/x-png,image/jpg,image/jpeg" />
                </div>
            </div></br>

            <div class="row mt-2">
                <div class="group-form col-sm-4">
                    <label class="form_label" for="company_name">Extra Bed</label>
                
                    <select class="form-control form-control-sm" name="bed" id="bed">
                        <option value="">Select bed</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Cost</label>
                    <input type="text" class="form-control form-control-sm cost"  name="cost" id="cost" placeholder="Enter Amount" value="0"/>
                </div>
				<div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Rent Amount</label>
                   
                    <input type="text"  value="" class="form-control form-control-sm" readonly name="amt" id="amt" placeholder="Enter Amount">
                </div>
            </div>   </br>
            <div class="row mt-2">
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name"> Advance/Deposit</label>
                    <input type="text" class="form-control form-control-sm cost" name="dip" id="dip" placeholder="Deposit" value="0"/>
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Remain Amount</label>
                    <input type="email" class="form-control form-control-sm"  name="remain" id="remain" readonly placeholder="0"/>
                </div></br>
            </div></br>
        </br>
          <div class="row mt-2">
                <div class="group-form-btn col-md-12">
                   <center>
                    <button type="submit" name="submit" class="btn btn-sm btn-primary col-md-3">Check IN</button>
                    </center> 
            </div>
             
            
        </form>
                    
         <!-- Table -->
         <div class="box mt-4">
                    <div class="box-body">
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr style="text-align:center;">
                                    <th>Sl No</th>
                                    <th>Name</th>
                                    <th>E-Mail-Id</th>
                                    <th>Mobile</th>
                                    <th>Date & Time</th>
                                    <th>Type</th>
                                    <th>Room Number</th>
                                    <th>Proof</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $qry="SELECT * FROM `chek_in` WHERE `status`=0";
                                $exc=mysqli_query($conn,$qry);
                              	$i=0;
                                while($row=mysqli_fetch_array($exc))
                                {
                                    ?>
                                    <tr class="text-center">
                                        <td><?php echo $i+1; ?></td>
                                        <td><?php echo $row['full'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['phone'] ?></td>
                                        <td><?php echo $row['datecheck'] ?></td>
                                        <td><?php echo $row['type'] ?></td>
                                        <td><?php echo $row['room'] ?></td>
                                        <td><a href="<?php echo $row['proof']; ?>" target="_blank"><img src="<?php echo $row['proof']; ?>" height="50" width="50"></a></td>
                                    
                                    </tr>
                                    <?php
                                  	$i++;
                                }
                            ?>    
                        </table>
<!-- page-content" -->

</div>
</main>

<script>
    function diver()
    {
        var wingname = document.getElementById('rno').value;
        var type = document.getElementById('type').value;
        // //alert(wingname);
        let log=$.ajax({
            url: 'room_ajax.php',
            type: "POST",
            dataType:'json',
            data:  {
                room: wingname,
                type: type,
            }
            , success:function(data) {
                $("#amt").val(data);
                $("#remain").val(data);
                
            }

        });console.log(log)

    }


    function diver1()
    {
        // alert("hii")
        var wingname = document.getElementById('rno').value;
        var type = document.getElementById('type').value;
        // //alert(wingname);
        let log=$.ajax({
            url: 'room_ajax.php',
            type: "POST",
            dataType:'json',
            data:  {
                room: wingname,
                type: type,
            }
            , success:function(data) {
                $("#amt").val(data);
                $("#remain").val(data);
                
            }

        });console.log(log)
            
    }
    $(document).ready(function()
    {
        // alert('hii');
        $('.cost').keyup(function(){
            // alert('hii');
        var amt = $('#amt').val();
        var cost = $('#cost').val();
        // alert(cost);
        var dip = $('#dip').val();
        
        var calx= parseInt(amt) + parseInt(cost) - parseInt(dip);
        // alert(calx)
        $('#remain').val(calx.toFixed(2));
        });
    });
</script>
              
 <script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>             

