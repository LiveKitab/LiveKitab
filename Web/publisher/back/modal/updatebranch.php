        <div class="modal fade" id="editmodal14" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                    <h5>Upload Branch</h5>
                    <button type="button" class="close" style="font-size:20pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div> 
                            <div class="modal-body">
                            <form onsubmit="return editbranch(this);" id="myform1" method="post" class="" enctype="multipart/form-data">
              
                                <input type="hidden" class="form-control" name="id" id="id" aria-describedby="helpId" required />
                                
                                <div class="form-group">
                                    <label for="">Branch Name:<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="b_name" id="b_name" aria-describedby="helpId" placeholder="Name" required />

                                </div>
                                
                                <label for="">Image:<sup style="color:red;">*</sup></label>        
  <div class="col-sm-2 imgUp">
    <div class="imagePreview" style="width:250% !important;"></div>

				<input type="file" class="uploadFile img" style="height:45px; border:none;" name="ub_img" id="ub_img" required />
				
  </div>
  
                            <div class="modal-footer">
                                                                <button type="submit" name="edit" id="edit" class="ps-btn" style="background-color: #28a745;">Change</button>
                                <button type="reset" name="cancel" id="cancel" class="ps-btn" style="background-color: #dc3545;" data-dismiss="modal">Close</button>
                            </div>
                            
                            </form>
                            <div id="editbranch"></div>
                </div>
                
            </div>
            </div>
        </div>