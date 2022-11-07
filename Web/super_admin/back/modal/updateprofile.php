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
                        <label for="">Name:</label>
                    <input type="text" class="form-control" name="sa_name1" id="sa_name1" style="width:450px;" placeholder="Name" value="<?php echo $sa_name;?>"
                        autocomplete="" maxlength="" />
                     </div>

                     <div class="form-group">
                            <label for="">Contact Number</label>
                    <input type="text" class="form-control" name="sa_cno1" id="sa_cno1"  style="width:450px;" placeholder="Contact No." value="<?php echo $sa_cno;?>"
                        autocomplete="" maxlength="" required />
                     </div>
                     
                     
                                  
                
                     <div class="form-group">
                         <label for="">E-mail</label>
                    <input type="text" class="form-control" name="sa_email1" id="sa_email1"  style="width:450px;" placeholder="Email" value="<?php echo $sa_email;?>"
                        autocomplete="" maxlength="" required />
                     </div>

                     <div class="form-group">
                         <label for="">Address</label>
                    <input type="text" class="form-control" name="sa_addr1" id="sa_addr1"  style="width:450px;" placeholder="Address" value="<?php echo $sa_addr;?>"
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
