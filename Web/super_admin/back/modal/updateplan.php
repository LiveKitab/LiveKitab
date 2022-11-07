<div class="col-lg-6">
<div class="modal fade" id="editmodal15" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
                    <h5>Update Plan</h5>
                    <button type="button" class="close" style="font-size:20pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <div class="container">
                <div class="row">
                    <div class="col-md-6 form-group">
                    <form id="myform1" method="post">
                        
                    <div class="col-md-9 form-group">
                                <input type="hidden" class="form-control" name="index" id="index" aria-describedby="helpId" placeholder="Plan Name" required />

                                </div>

                                <div class="col-md-9 form-group">
                                    <label for="">Plan Name:<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="p_name" id="p_name" aria-describedby="helpId" placeholder="Plan Name" required />

                                </div>
                                
                                <div class="col-md-9 form-group">
                                <label for="t_date">Plan Price:<sup style="color:red;">*</sup></label>
                                <input type="number" class="form-control" name="p_price" id="p_price" aria-describedby="helpId" placeholder="Plan Price" required />

                                </div>

                    
                            <div class="col-md-9 form-group">
                                <label for="">Plan Title:<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="p_title" id="p_title" aria-describedby="helpId" placeholder="Plan Title" required />
                                </div>
                                
                                <div class="col-md-9 form-group">
                    <label for="">Plan Description:<sup style="color:red;">*</sup></label>
                      <textarea class="form-control" name="plan_des" id="plan_des" placeholder="Plan Description here..." rows="3"></textarea>
                </div>
                            
                            <div class="col-md-9 form-group">
                    <label for="">Description:<sup style="color:red;">*</sup></label>
                      <textarea class="form-control" name="plan_tc" id="plan_tc" placeholder="Description here..." rows="3"></textarea>
                </div>

                            
                                

                            <div class="col-md-9 form-group">                                
                            <button type="submit" class="ps-btn" name="p_submit"
                                    id="p_submit" style="background-color:#fd7e14;">Update</button>
                            <button type="reset" class="ps-btn" id="reset" name="reset" data-dismiss="modal" style="background-color:#dc3545;">Close</button>
                            </div>
                            
                            <div class="loader" id="loader">
                                    <img src="../loader/form.gif" width="180px" alt="">
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
