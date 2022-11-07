<div class="modal fade" id="editmodal19" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
                    <h5>Update Term</h5>
                    <button type="button" class="close" style="font-size:20pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                
                    <form id="updatetermform" method="post">
                    <input type="hidden" name="index" id="index">
                    
                                <div class="form-group">
  <label for="header">Medium:<sup style="color:red;">*</sup></label>
  <select class="form-control required" name="med" id="med" required>
                <option value="<?php echo $med; ?>" ><?php echo $med; ?></option>
                <option>	ENGLISH	</option>
                <option>	GUJARATI	</option>
                
                
                </select>
                </div>

                                <div class="form-group">
                                    <label for="">Term Name:<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="termname" id="termname" aria-describedby="helpId" placeholder="Term Name" required />

                                </div>
                                
                                

                    <div class="modal-footer">
                            <button type="submit" class="ps-btn" name="updateterm" id="updateterm" style="background-color:#fd7e14;">Update</button>
                            <button type="button" class="ps-btn" name="resetbtn" id="resetbtn" data-dismiss="modal" >Close</button>
                    <div class="loader1" id="loader1">
                                    <img src="../loader/form.gif" width="180px" alt="">
                            </div>
                    </div>
                    </form>

                        <div class="container" id="return"></div>


            </div>
           
        </div>
    </div>
</div>