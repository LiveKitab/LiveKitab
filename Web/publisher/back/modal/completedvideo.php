        <div class="modal fade" id="complete" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                    <h5>Final Video</h5>
                    <button type="button" class="close" style="font-size:20pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div> 
                            <div class="modal-body">
                            <form onsubmit="return finalvideo(this);" id="MyForm" method="post" class="" enctype="multipart/form-data">
              
                                <input type="hidden" name="id" id="id" aria-describedby="helpId" required />
                                
                                <div class="form-group">
                                    <label for="">Video Title:<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="vtitle" id="vtitle" aria-describedby="helpId" placeholder="Video Title" required />

                                </div>
                                
                                <div class="form-group">
                                    <label for="">Chapter Name:<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="ch_name" id="ch_name" aria-describedby="helpId" placeholder="Chapter Name" required />

                                </div>
                                
                                <div class="form-group">
                                <label for="t_date">Video Link:<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="vlink" id="vlink" aria-describedby="helpId" placeholder="Video Link" required />

                                </div>
                                
                                <div class="form-group">
                              <label for="">Video Description:<sup style="color:red;">*</sup></label>
                              <textarea class="form-control" name="v_des" id="v_des" placeholder="Video Description here..." rows="3"></textarea>
                            </div>
                                
                                <label for="">Thumbnail:<sup style="color:red;">*</sup></label>        
                  <div class="col-sm-2 imgUp">
                    <div class="imagePreview" style="width:250% !important;"></div>
                		<input type="file" class="uploadFile img" style="height:45px; border:none;" name="thm_img" id="thm_img" />
                  </div>
  
                      <label for="">Attechment:<sup style="color:red;">*</sup></label>        
                      <div class="col-sm-2 imgUp">
                        <div class="imagePreview" style="width:250% !important;"></div>
                    	    <input type="file" class="uploadFile img" style="height:45px; border:none;" name="att_img" id="att_img" />
                      </div>
  
                            <div class="modal-footer">
                                                                <button type="submit" name="v_submit" id="v_submit" class="ps-btn" style="background-color: #28a745;">Add</button>
                                <button type="reset" name="cancel" id="cancel" class="ps-btn" style="background-color: #dc3545;" data-dismiss="modal">Close</button>
                            <div class="loader" id="loader">
                                    <img src="../loader/form.gif" width="140px" alt="">
                            </div>
                            </div>
                            
                            </form>
                            <div id="return"></div>
                </div>
                
            </div>
            </div>
        </div>
