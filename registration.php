<?php include("sidebar.php"); ?>
<style>
  .innerbox{
    padding:30px;
    background-color: rgba(255, 255, 255, 0.4);
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
             <h2 class="" style="font-size:36px; font-weight: 600">HOTEL INFORMATION</h2>
        </div>
     
    </div>
</div>

<main class="page-content"style="background-color: rgba(233, 245, 250, 1);">
    <div class="container">
        <form action="reg_submit.php" method="post" enctype="multipart/form-data">
            <div class="row innerbox">
                <div class="col-md-3 .item"><br>
                    <!-- <img src="img/Group 64.png" alt="" width="159" height="172"> -->
                    <div class="group-form col-sm-10" style="padding:0;">
                        <img id="img1" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSlc_piJr999mRLgWEgWyB5bJRR1uR3lImSTfhyTaxFi_TPOjm5" height="150px" width="150px" onclick="image_select()" >
                        <input type="file" style="Display:none;" class="form-control-sm" placeholder="" name="screen" id="screen" onchange="readURL(this); Filevalidation();">
                        <input type="file" class="form-control form-control-sm" accept="image/x-png,image/jpg,image/jpeg" id="imageupdate" name="imageupdate"/>
                    </div>
                    <script type="text/javascript">
                            // function image_select(){
                            //     $('#screen').trigger('click');
                            // }

                            function readURL(input){
                                if(input.files && input.files[0])
                                    {
                                        var reader =new FileReader();
                                        reader.onload=function(e){
                                            $('#img1').attr('src',e.target.result);
                                        }
                                        reader.readAsDataURL(input.files[0]);
                                    }
                            }
                    </script>
                </div>


                <div class="col-md-6">
                    <div class="group-form col-md-12">
                        <label class="form_label" for="company_name"> Hotel Name</label>
                        <input type="text" class="form-control form-control-sm" name="name" id="name" required />
                    </div>
                    <div class="group-form col-md-12">
                        <label class="form_label" for="company_name"> GST </label>
                        <input type="text" class="form-control form-control-sm" name="gst" id="gst" required />
                    </div>
                    <div class="group-form col-md-12">
                        <label class="form_label" for="company_name"> FSSI</label>
                        <input type="text" class="form-control form-control-sm" name="fssi" id="fssi" required />
                    </div>
                    <div class="group-form col-md-12">
                        <label class="form_label" for="company_name"> Trade License </label>
                        <input type="text" class="form-control form-control-sm" name="lic" id="lic" required />
                    </div>
                    <!-- <div class="group-form col-md-12">
                        <label class="form_label" for="company_name"> Tax</label>-->
                        <input type="hidden" class="form-control form-control-sm" name="tax" id="tax" required />
                    <!-- </div>  -->
                    <div class="group-form col-md-12">
                        <label class="form_label" for="company_name"> Address</label>
                        <input type="text" class="form-control form-control-sm" name="adds" id="adds" required />
                    </div>
                    <div class="group-form col-md-12">
                        <label class="form_label" for="company_name"> Contact No</label>
                        <input type="text" class="form-control form-control-sm" name="cont" id="cont" required />
                    </div>
                    <div class="group-form col-md-12">
                        <label class="form_label" for="company_name"> Landline No</label>
                        <input type="text" class="form-control form-control-sm" name="land" id="land" required />
                    </div>
                    <div class="group-form col-md-12">
                        <label class="form_label" for="company_name"> E-Mail</label>
                        <input type="text" class="form-control form-control-sm" name="email" id="email" required />
                    </div>
                    <div class="group-form col-md-12">
                        <label class="form_label" for="company_name">User Name</label>
                        <input type="text" class="form-control form-control-sm" name="user" placeholder="Enter Username" id="user" required />
                    </div>
                    <div class="group-form col-md-12">
                        <label class="form_label" for="company_name"> Password</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter Password" name="pass" id="pass" required />
                    </div>
                </div>


                <div class="col-md-3"><br>
                    <h5>Action Buttons</h5>
                    <div class="group-form-btn col-md-12">
                        <button type="submit" name="update" class="btn btn-sm btn-success col-md-12">Update</button>                 
                    </div>

                    <div class="group-form-btn col-md-12">
                        <a  href="registration.php" name="submit" class="btn btn-sm  col-md-12" style="background-color: #9B59B6;color:white;">Refresh</a>                
                    </div>
                </div>
            </div>
        </form>
        <script>
            $(document).ready(function(){
                let log=$.ajax({
                    url: 'reg_ajax.php',
                    type: "POST",
                    dataType:'json',
                    data: {
                        rno: 'rno'
                    }
                    , success:function(data) {
                        $("#name").val(data[0]);
                        $("#gst").val(data[1]);
                        $("#fssi").val(data[2]);
                        $("#lic").val(data[3]);
                        $("#tax").val(data[4]);
                        $("#adds").val(data[5]);
                        $("#cont").val(data[6]);
                        $("#land").val(data[7]);
                        $("#email").val(data[8]);
                        $("#user").val(data[9]);
                        $("#pass").val(data[10]);
                        // $("#pass").val(data[10]);
                        console.log(data[11])
                        de=data[11];
                        if(de !='')
                        {
                            // var pic = de.slice(3);
                            // $('#dow').show();
                            // $(".item a[href='#']").prop("href", de);
                            document.getElementById('img1').src = de.replace();
                        }
                    }

                });console.log(log)
            });
        </script>
                            <!-- <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Hotel Name</th>
                                        <th>GST</th>
                                        <th>FSSI</th>
                                        <th>Trade license</th>
                                        <th>Tax</th>
                                        <th>Address</th>
                                        <th>Contact No</th>
                                        <th>Landline</th>

                                        <th>Extra Bed</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>                               
                                    <tr class="text-center">
                                        <td>Hotel  Welcome</td>
                                        <td>O7ACCVB988OB1ZH</td>
                                        <td>12345678919873</td>
                                        <td>23456789198731</td>
                                        <td>0090-9987-887</td>
                                        <td>2/23, Plot no 1,Banglore - 560001.</td>
                                        <td>+91 9877676544</td>
                                        <td>020-45658</td>
                                    
                                    </tr>
                                </tbody>
                                   
                            </table> -->
                       
    </div>
</main>
