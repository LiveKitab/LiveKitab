<div class="col-lg-6">
<div class="modal fade" id="editmodal16" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
                    <h5>Update Video</h5>
                    <button type="button" class="close" style="font-size:20pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <div class="container">
                <div class="row">
                    <div class="col-md-6 form-group">
                    <form id="myform1" method="post">
                        
                    <input type="hidden" name="index" id="index">
                    
                                 <div class="col-md-9 form-group">
                                    <label for="">Sequence:<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="v_sequence" id="v_sequence" aria-describedby="helpId" placeholder="Sequence" required />

                                </div>
                                 
                                <div class="col-md-9 form-group">
                                    <label for="">Title Name:<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="v_title" id="v_title" aria-describedby="helpId" placeholder="Title Name" required />

                                </div>
                                
                                
                                <div class="col-md-9 form-group">
                                    <label for="">Chapter Name:<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="v_ch_name" id="v_ch_name" aria-describedby="helpId" placeholder="Chapter Name" required />

                                </div>
                                
                                <div class="col-md-9 form-group">
                                <label for="t_date">Video Link:<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="v_link" id="v_link" aria-describedby="helpId" placeholder="Video Link" required />

                                </div>

                    
                            
                                
                                
                            
                            <div class="col-md-9 form-group">
                    <label for="">Video Description:<sup style="color:red;">*</sup></label>
                      <textarea class="form-control" name="v_des" id="v_des" placeholder="Video Description here..." rows="3"></textarea>
                </div>
                
                <div class="col-md-9 form-group">
                    <label for="">Remark:<sup style="color:red;">*</sup></label>
                      <textarea class="form-control" name="v_remk" id="v_remk" placeholder="Remark here..." rows="3"></textarea>
                </div>

                            
                                

                            <div class="col-md-9 form-group">                                
                            <button type="submit" class="ps-btn" name="v_submit"
                                    id="v_submit" style="background-color:#fd7e14;">Update</button>
                            <button type="reset" class="ps-btn" id="reset" name="reset" data-dismiss="modal" style="background-color:#dc3545;">Close</button>
                            </div>
                            
                            <div class="loader" id="loader">
                                    <img src="../loader/form.gif" width="140px" alt="">
                            </div>
                            
                        </form>

                        <div id="return"></div>

                    </div>

</div>
</div>
                </div>
            </div>
           
        </div>
    </div>
</div>
</div>
