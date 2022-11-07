<div class="col-lg-6">
<div class="modal fade" id="modelId1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            
            <div class="modal-body">
                <div class="container">
                <div class="row">
                    <div class="col-md-6 form-group">
                    <form id="updateprofile" method="post">
                        <input type="hidden"  name="id" id="id" value="<?php echo $id;?>"/>

                    <div class="form-group">
                        <label for="">Name: </label>
                    <input type="text" class="form-control" name="name" id="name" style="width:450px;" placeholder="First Name" value="<?php echo $e_name;?>"
                        autocomplete="" maxlength="" />
                     </div>
                     
                     

                     <div class="form-group">
                            <label for="">Contact Number: </label>
                    <input type="text" class="form-control" name="cno" id="cno"  style="width:450px;" placeholder="Contact No." value="<?php echo $e_cno;?>"
                        autocomplete="" maxlength=""  required />
                     </div>
                                  
                
                     <div class="form-group">
                         <label for="">E-mail: </label>
                    <input type="text" class="form-control" name="email" id="email"  style="width:450px;" placeholder="Email" value="<?php echo $e_email;?>"
                        autocomplete="" maxlength=""  required />
                     </div>

                     <div class="form-group">
                         <label for="">Address: </label>
                    <input type="text" class="form-control" name="addr" id="addr"  style="width:450px;" placeholder="Address" value="<?php echo $e_addr;?>"
                        autocomplete="" maxlength="" required />
                     </div>
                     
                     <div class="form-group">
                         <label for="">State: </label>
                    <input type="text" class="form-control" name="state" id="state"  style="width:450px;" placeholder="State" value="<?php echo $e_state;?>"
                        autocomplete="" maxlength="" required />
                     </div>
                     
                     <div class="form-group">
                         <label for="">City: </label>
                    <input type="text" class="form-control" name="city" id="city"  style="width:450px;" placeholder="City" value="<?php echo $e_city;?>"
                        autocomplete="" maxlength="" required />
                     </div>
                     
                     
                     
                     

                     

                                <button type="submit" class="ps-btn" name="update" id="update" style="background-color:#28a745;">Update</button>
                                <button type="button" class="ps-btn" data-dismiss="modal" >Close</button>
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
