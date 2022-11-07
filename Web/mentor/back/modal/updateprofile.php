<div class="col-lg-6">
<div class="modal fade" id="modelId1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            
            <div class="modal-body">
                <div class="container">
                <div class="row">
                    <div class="col-md-6 form-group">
                    <form id="up" onsubmit="return updateprofile(this);" method="post" enctype="multipart/form-data">
                         <input type="hidden"  name="id" id="id" value="<?php echo $id;?>"/>
                       
                        
                    <div class="form-group">
                        <label for="">First Name: </label>
                    <input type="text" class="form-control" name="name" id="name" style="width:450px;" placeholder="First Name" value="<?php echo $c_name;?>"
                        autocomplete="" maxlength="" />
                     </div>
                     
                     <div class="form-group">
                        <label for="">Father Name: </label>
                    <input type="text" class="form-control" name="fname" id="fname" style="width:450px;" placeholder="Father Name" value="<?php echo $c_fname;?>"
                        autocomplete="" maxlength="" />
                     </div>
                     
                     <div class="form-group">
                        <label for="">Last Name: </label>
                    <input type="text" class="form-control" name="lname" id="lname" style="width:450px;" placeholder="Name" value="<?php echo $c_lname;?>"
                        autocomplete="" maxlength="" />
                     </div>

                     <div class="form-group">
                            <label for="">Contact Number: </label>
                    <input type="text" class="form-control" name="cno" id="cno"  style="width:450px;" placeholder="Contact No." value="<?php echo $c_cno;?>"
                        autocomplete="" maxlength="" readonly required />
                     </div>
                                  
                
                     <div class="form-group">
                         <label for="">E-mail: </label>
                    <input type="text" class="form-control" name="email" id="email"  style="width:450px;" placeholder="Email" value="<?php echo $c_email;?>"
                        autocomplete="" maxlength="" readonly required />
                     </div>

                     <div class="form-group">
                         <label for="">Address: </label>
                    <input type="text" class="form-control" name="addr" id="addr"  style="width:450px;" placeholder="Address" value="<?php echo $c_addr;?>"
                        autocomplete="" maxlength="" required />
                     </div>
                     
                     <div class="form-group">
                         <label for="">State: </label>
                    <input type="text" class="form-control" name="state" id="state"  style="width:450px;" placeholder="State" value="<?php echo $c_state;?>"
                        autocomplete="" maxlength="" required />
                     </div>
                     
                     <div class="form-group">
                         <label for="">City: </label>
                    <input type="text" class="form-control" name="city" id="city"  style="width:450px;" placeholder="City" value="<?php echo $c_city;?>"
                        autocomplete="" maxlength="" required />
                     </div>
                     
                     <div class="form-group">
                         <label for="">Education: </label>
                    <input type="text" class="form-control" name="edu" id="edu"  style="width:450px;" placeholder="Education" value="<?php echo $c_edu;?>"
                        autocomplete="" maxlength="" required />
                     </div>
                     
                     <div class="form-group">
                         <label for="">Specialization: </label>
                    <input type="text" class="form-control" name="spec" id="spec"  style="width:450px;" placeholder="Specialization" value="<?php echo $c_spec;?>"
                        autocomplete="" maxlength="" required />
                     </div>
                     
                     <div class="form-group">
                         <label for="">Account Holder Name: </label>
                    <input type="text" class="form-control" name="acc_holder" id="acc_holder"  style="width:450px;" placeholder="Account Holder Name" value="<?php echo $acc_holder_name;?>"
                        autocomplete="" maxlength="" required />
                     </div>
                     
                     <div class="form-group">
                         <label for="">Account Type: </label>
                    <input type="text" class="form-control" name="ac_type" id="ac_type"  style="width:450px;" placeholder="Account Type" value="<?php echo $acc_type;?>"
                        autocomplete="" maxlength="" required />
                     </div>
                     
                     <div class="form-group">
                         <label for="">Account No. : </label>
                    <input type="text" class="form-control" name="ac_no" id="ac_no"  style="width:450px;" placeholder="Account No." value="<?php echo $acc_no;?>"
                        autocomplete="" maxlength="" required />
                     </div>
                     
                     <div class="form-group">
                         <label for="">IFSC No. : </label>
                    <input type="text" class="form-control" name="ifsc_no" id="ifsc_no"  style="width:450px;" placeholder="IFSC No." value="<?php echo $ifsc;?>"
                        autocomplete="" maxlength="" required />
                     </div>
                     
                     <div class="form-group">
                         <label for="">Merchant ID: </label>
                    <input type="text" class="form-control" name="m_id" id="m_id"  style="width:450px;" placeholder="Merchant ID" value="<?php echo $mid;?>"
                        autocomplete="" maxlength="" required />
                     </div>
                     
                     <div class="form-group">
                         <label for="">Merchant Key: </label>
                    <input type="text" class="form-control" name="m_key" id="m_key"  style="width:450px;" placeholder="Merchant Key" value="<?php echo $m_key;?>"
                        autocomplete="" maxlength="" required />
                     </div>
                     
                     <div class="form-group">
                         <label for="">Mentor Photo: </label>
                    <input type="file" class="form-control" name="m_photo" id="m_photo" style="width:450px;" required />
                     </div>

                     

                                <button type="submit" class="ps-btn" name="update" id="update" style="background-color:#28a745;">Update</button>
                                <button type="button" name="close" id="close"class="ps-btn" data-dismiss="modal" >Close</button>
                        </form><br>

                        <div class="container" id="data"></div>

</div>
</div>
                </div>
            </div>
           
        </div>
    </div>
</div>
</div>
