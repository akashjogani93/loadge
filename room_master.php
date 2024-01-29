<?php include("sidebar.php");
include("connect.php");
$update='true';
?>
<style>
  
  .box{
   
    width:100%;
    margin:auto;
    justify-content:center;
  }
  .innerbox{
  
    background-color: rgba(255, 255, 255, 0.4);
  }
  .inbox {
    width:90%;
    display: grid;
    margin: auto;
    justify-content: center;
    align-items: center;
    background-color: white;
    padding:20px 10px 50px 10px;
    /* background-color: white;
    display: grid;
    margin: auto;
    width: 100%;
    justify-content: center;
    align-items: center;
    padding:20px 0 50px 0; */
}
.bbq{
    width:90%;
    display: grid;
    margin: auto;
    /* justify-content: center;
    align-items: center; */
    overflow-x:scroll;
}
.group-form{
    margin:0;
    
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
    text-align:center;
}
</style>
<div class="page-content container-fluid" style="background-color:rgba(233, 245, 250, 1);">
    <div class="footer"style="background-color:rgba(233, 245, 250, 1);">
        <div class="d-flex justify-content-between">
             <h2 class="" style="font-size:36px; font-weight: 600">ROOM MASTER</h2>
        </div>
     
    </div>
</div>
<?php 
    $cat=$amt=$amt1=$room='';
     if(isset($_GET['edit']))
     {
        $id=$_GET['edit'];
        $qry="SELECT * FROM `room` WHERE `id`='$id'";
        $conf=mysqli_query($conn,$qry);
        while($row=mysqli_fetch_array($conf))
        {
            $idd=$row['id'];
            $cat=$row['category'];
            $room=$row['room_no'];
            $amt=$row['amt'];
            $amt1=$row['amt1'];
            $update='false';
        }
     }
?>
                    
<main class="page-content"style="background-color: rgba(233, 245, 250, 1);">
    <div class="container">
        <div class="row">
            <div class="col-md-12 box">
                <div class="innerbox">
                    <div class="inbox">
                    <form action="room_submit.php" method="post" enctype="multipart/form-data" style="margin:auto; width:100%; justify-content:center;" >
                        <div class="row">
                            <div class="group-form col-sm-10">
                                    <label class="form_label" for="company_name">Room Category</label>
                                
                                    <select class="form-control form-control-sm" required name="cat" id="cat">
                                        <?php if($update=='false')
                                        {
                                            
                                            echo '<option>'.$cat.'</option>';
                                        }
                                        else
                                        {
                                            echo '<option value="">Select Category</option>';
                                        }
                                        ?>
                                        <option>Regular</option>
                                        <option>Family</option>
                                    <select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="group-form col-md-10">
                                <label class="form_label" for="company_name" id="checku">Room No</label>
                                <input type="text" class="form-control form-control-sm" name="rno" id="rno" onInput="checku()" required value="<?php echo $room; ?>" placeholder="Enter Room No"/>
                                <input type="hidden" name='idd' value="<?php echo $idd; ?>";>
                            </div>
                        </div>
                        <div class="row">
                            <div class="group-form col-md-5">
                                <label class="form_label" for="company_name">Type</label>
                                <input type="text" class="form-control form-control-sm" name="type" value="12 Hour" readonly/>
                            </div>
                            <div class="group-form col-md-5">
                                <label class="form_label" for="company_name" style="padding-bottom:16px;"></label>
                                <input type="number" class="form-control form-control-sm" name="amt" value="<?php echo $amt; ?>" required placeholder="Enter Amount" min="1"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="group-form col-md-5">
                                <label class="form_label" for="company_name">Type</label>
                                <input type="text" class="form-control form-control-sm" name="type1" value="24 Hour" readonly />
                            </div>
                            <div class="group-form col-md-5">
                                <label class="form_label" for="company_name" style="padding-bottom:16px;"></label>
                                <input type="number" class="form-control form-control-sm" name="amt1" value="<?php echo $amt1; ?>" required placeholder="Enter Amount" min="1"/>
                            </div>
                        </div>
                           
                            <div class="row">
                                <div class="group-form col-md-10">
                                <?php
                                    if($update=='false')
                                    {
                                        echo '<button type="submit" name="upd" class="btn btn-sm btn-danger col-md-12">Update</button></br>';
                                        echo '</br>';
                                        echo '<a href="room_master.php" class="btn btn-sm btn-success col-md-12">Back</a>';
                                        
                                    }else
                                    {
                                        echo '<button type="submit" id="sub" name="room" class="btn btn-sm btn-success col-md-12">Submit</button>';
                                    }
                                ?>
                                </div>
                            </div>
                        </form>
                        </div>
                            <div class="bbq">
                                <table id="example" class="table table-striped table-bordered">
                                  <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Category</th>
                                    <th>Room No</th>
                                    <th>12 Hour</th>
                                    <th>24 Hour</th>
                                    <!-- <th>Amount</th>
                                    <th>Payment Mode</th>-->
                                    <th>Action</th> 

                                </tr>
                                  </thead>
                                  <tbody>
                                <?php 
                                
                                        $qry="SELECT * FROM `room` ORDER BY `id`";
                                        $exc=mysqli_query($conn,$qry);
                                        $i=0;
                                        while($row=mysqli_fetch_array($exc))
                                        {
                                            ?>
                                            <tr class="text-center">
                                                <td><?php echo $i+1; ?></td>
                                                <td><?php echo $row['category'] ?></td>
                                                <td><?php echo $row['room_no'] ?></td>
                                                <td><?php echo $row['amt'] ?></td>
                                                <td><?php echo $row['amt1'] ?></td>
                                                <td>
                                                <a href="room_master.php?edit=<?php echo $row['id']; ?>"><button class="btn btn-sm btn-primary">Edit</button> </a></td>
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
          
  <script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
    </div>
<?php 
if($update=='true')
{
    ?>
<script>
    function checku()
    {
        // alert('hi');
    jQuery.ajax({
        url:'room_master_ajax.php',
        data:'acc=' +$("#rno").val(),
        type:"POST",
        success:function(data){
            $("#checku").html(data);
        },
        error:function(){}

    });
    }

    </script>
    <?php
}
    ?>
</main>
