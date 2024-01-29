<?php include("sidebar.php");
include("connect.php");

		$cnt = 0;
        $sql = "SELECT max(id) FROM check_out";
        $retval = mysqli_query($conn, $sql );
        
        if(! $retval ) {
            die('Could not get data: ' . mysqli_error($conn));
        }
        while($row = mysqli_fetch_assoc($retval)) {
            $cnt=$row['max(id)'];
            $cnt++;
        }
?>
<style>
    .class{
        font-size:14px;

    }
    form {
    padding: 30px;
}
.container{
    background-color:rgba(255, 255, 255, 0.4);
}

.infos{
    background-color:white;
}
th{
    padding-right:20px;
}
th, td {
padding: 5px;
text-align: left;
}
#profile-table tr th, tr td {
    border:none;
}
.group-form {
    margin-top:17px;
}
</style>
<div class="page-content container-fluid" style="background-color:rgba(233, 245, 250, 1);">
    <div class="footer"style="background-color:rgba(233, 245, 250, 1);">
        <div class="d-flex justify-content-between">
             <h2 class="" style="font-size:36px; font-weight: 600">CUSTOMER CHECK-OUT</h2>
        </div>
     
    </div>
</div>

<?php 
	if(isset($_GET['id']))
    {
      $id=$_GET['id'];
      ?>
		<script>
          	var id="<?php echo $id; ?>";
        	let log=$.ajax({
            url: 'checkout_ajax.php',
            type: "POST",
            dataType:'json',
            data:  {
                rno: id,
            }
            , success:function(data) 
              {
                // alert(data);
                $("#name").val(data[0]);
                $("#cust_id").val(data[1]);
                $("#rent").val(data[2]);
                $("#bed").val(data[3]);
                $("#food").val(data[4]);
                $("#remain").val(data[6]);
                $("#adv").val(data[5]);
				$("#rno").val(data[7]);
                $("#datecheck").val(data[8]);
                let basic=parseFloat(data[2])+parseFloat(data[3]);
                $("#basic").val(basic);
                let total1=((basic*18)/100)+basic;
                $("#total1").val(total1);
                let total=total1-parseFloat(data[5]);
                $("#total").val(total.toFixed(2));
              	var final=data[4]+total;
                $("#final").val(final.toFixed(2));
                $("#net_amount").val(final.toFixed(2));
                console.log(data)
            }
        });console.log(log)
          	
		</script>
<?php
    }
?>
                    
<main class="page-content"style="background-color:rgba(233, 245, 250, 1);">
    <div class="container">
        <form action="checkout_submit.php" method="post" enctype="multipart/form-data"  >
            <div class="row lefts">
                <div class="col-md-4"style="back-">
                    <input type="hidden" class="form-control form-control-sm" value="<?php echo $cnt; ?>" readonly placeholder=""/>
                    <div class="group-form ">
                        <label class="form_label" for="company_name"> Room No</label>
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
                    <div class="group-form ">
                        <label class="form_label" for="company_name"> Name</label>
                        <input type="text" class="form-control form-control-sm" id="name" readonly placeholder=""/>
                    </div> 
                    <div class="group-form ">
                        <label class="form_label" for="company_name"> Customer Id</label>
                        <input type="text" class="form-control form-control-sm" id="cust_id" name="cust_id" readonly placeholder=""/>
                    </div> 
                    <div class="group-form ">
                        <label class="form_label" for="company_name">Check In Time</label>
                        <input type="text" class="form-control form-control-sm" id="datecheck" name="datecheck" readonly placeholder=""/>
                    </div>
                    <div class="group-form ">
                        <label class="form_label" for="company_name"> Room Rent</label>
                        <input type="text" class="form-control form-control-sm" id="rent" name="rent" readonly placeholder=""/>
                    </div> 
                    <div class="group-form ">
                        <label class="form_label" for="company_name">Extra Bed Cost</label>
                        <input type="text" class="form-control form-control-sm" id="bed" name="extrabed" readonly placeholder=""/>
                    </div> 
                    <!-- <div class="group-form ">
                        <label class="form_label" for="company_name"> Check-Out Type</label>
                        <input type="text" class="form-control form-control-sm" readonly required   placeholder=""/>
                    </div> 
                    <div class="group-form ">
                        <label class="form_label" for="company_name"> Check-Out Date</label>
                        <input type="text" class="form-control form-control-sm" readonly required   placeholder=""/>
                    </div> -->
                     <div class="group-form">
                       <label class="form_label" for="company_name">Basic Amount</label>
                       		<input type="text" class="form-control form-control-sm" id="basic" required  readonly placeholder=""/>
                        </div> 
                </div>

                <div class="col-md-8">
                    <div class="row">
                        <!--   -->
                        <!-- <div class="group-form col-md-6">
                            <label class="form_label" for="company_name">Remaning Amount</label>
                            <input type="text" class="form-control form-control-sm" id="remain" required   placeholder=""/>
                        </div> -->
                        <div class="group-form col-md-6">
                            <label class="form_label" for="company_name">Including GST(18%)</label>
                            <input type="text" class="form-control form-control-sm" id="total1" name="total1" required  readonly placeholder=""/>
                        </div>
                      	<div class="group-form col-md-6">
                            <label class="form_label" for="company_name">Deposit Amount</label>
                            <input type="text" class="form-control form-control-sm" id="adv" required readonly placeholder=""/>
                        </div>
                    </div>

                    <div class="row">
                        
                        <div class="group-form col-md-6">
                            <label class="form_label" for="company_name">Payable Amount</label>
                            <input type="text" class="form-control form-control-sm"  id="total" required readonly  placeholder=""/>
                        </div>
                        <div class="group-form col-md-6 ">
                          <label class="form_label" for="company_name">Food Amount</label>
                          <input type="text" class="form-control form-control-sm" id="food" name="food" readonly placeholder=""/>
                      </div>
                    </div>

                    <div class="row">
                      	<div class="group-form col-md-6 ">
                          <label class="form_label" for="company_name">Gross Amount</label>
                          <input type="text" class="form-control form-control-sm" id="final" name="final" readonly placeholder=""/>
                      	</div>
                        <div class="group-form col-md-6 ">
                          <label class="form_label" for="company_name">Discount</label>
                          <input type="number" class="form-control form-control-sm" id="discount" name="discount" placeholder="" min="0"/>
                      	</div>
                    </div>
                    <div class="row mt-2">
                      	<div class="group-form col-md-6 ">
                          <label class="form_label" for="company_name">Final Amount</label>
                          <input type="text" class="form-control form-control-sm" id="net_amount" name="net_amount" readonly placeholder=""/>
                      	</div>
                      	<div class="group-form col-md-6">
                            <label class="form_label" for="company_name">Check Out Date & Time</label>
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
                  <div class="row mt-2">
                    	<div class="group-form col-md-6">
                            <label class="form_label" for="company_name">Payment Type</label><br>
                            <input type="radio" checked id="contactChoice1" name="contact" value="Online" />
                            <label for="contactChoice1" style="margin-right:20px;">Online</label>

                            <input type="radio" id="contactChoice2" name="contact" value="Case" />
                            <label for="contactChoice2">Cash</label>
                        </div> 
                        <div class="group-form-btn col-md-6">
                          <button type="submit" name="checkout" class="btn btn-sm btn-primary col-md-4">Checkout</button>
                    	</div>
                  </div>
            	</div>
             </div>
        </form>
</div>
</main>

<script>
    function diver1()
    {
        // alert('hii');
        // var rno=document.getElementbyId('rno').value;
        var rno = document.getElementById('rno').value;
        let log=$.ajax({
            url: 'checkout_ajax.php',
            type: "POST",
            dataType:'json',
            data:  {
                rno: rno,
            }
            , success:function(data) {
                $("#name").val(data[0]);
                $("#cust_id").val(data[1]);
                $("#rent").val(data[2]);
                $("#bed").val(data[3]);
                $("#food").val(data[4]);
                $("#remain").val(data[6]);
                $("#adv").val(data[5]);
                $("#datecheck").val(data[8]);

                let basic=parseFloat(data[2])+parseFloat(data[3]);
                $("#basic").val(basic);
                let total1=((basic*18)/100)+basic;
                $("#total1").val(total1);
                let total=total1-parseFloat(data[5]);
                $("#total").val(total.toFixed(2));
              	var final=data[4]+total;
                $("#final").val(final.toFixed(2));
              $("#net_amount").val(final.toFixed(2));
                console.log(data)
            }
        });console.log(log)
    }
  $('#discount').keyup(function()
  {
      	var discount = document.getElementById('discount').value;
    	var gross=$('#final').val();
    	
    	var filal=gross-discount;
    	$("#net_amount").val(filal.toFixed(2));
      
  });
</script>
       