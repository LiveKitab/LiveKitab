<div class="modal fade" id="editmodal" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
                    <h5>Update Publisher</h5>
                    <button type="button" class="close" style="font-size:20pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                
                    <form id="myform1" method="post">
                        
                    <input type="hidden" name="index" id="index">

                                <div class="form-group">
                                    <label for="">Name:<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="p_name" id="p_name" aria-describedby="helpId" placeholder="Name" required />

                                </div>
                                
                                <div class="form-group">
                                <label for="t_date">Contact:<sup style="color:red;">*</sup></label>
                                <input type="number" class="form-control" name="p_cont" id="p_cont" aria-describedby="helpId" placeholder="Contact" required />

                                </div>

                    
                            <div class="form-group">
                                <label for="">Email:<sup style="color:red;">*</sup></label>
                                <input type="email" class="form-control" name="p_email" id="p_email" aria-describedby="helpId" placeholder="Email" required />
                                </div>
                                
                                <div class="form-group">
                    <label for="">Address:<sup style="color:red;">*</sup></label>
                      <textarea class="form-control" name="p_addr" id="p_addr" placeholder="Address here..." rows="3"></textarea>
                </div>
                            
                            <div class="form-group">
                    <label for="">Description:<sup style="color:red;">*</sup></label>
                      <textarea class="form-control" name="p_des" id="p_des" placeholder="Description here..." rows="3"></textarea>
                </div>
                            
                            <div class="modal-footer">                                
                            <button type="submit" class="ps-btn" name="p_submit"
                                    id="p_submit" style="background-color:#fd7e14;">Update</button>
                            <button type="reset" class="ps-btn" id="reset" name="reset" data-dismiss="modal" style="background-color:#dc3545;">Close</button>
                            <div class="loader" id="loader">
                                    <img src="../loader/form.gif" width="180px" alt="">
                            </div>
                            </div>
                            
                        </form>

                        <div id="return"></div>
                </div>
            </div>
           
        </div>
    </div>
</div>