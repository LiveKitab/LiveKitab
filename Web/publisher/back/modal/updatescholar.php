<div class="col-lg-6">
<div class="modal fade" id="editmodal13" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
                    <h5>Update Mentor</h5>
                    <button type="button" class="close" style="font-size:20pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <div class="container">
                <div class="row">
                    <div class="col-md-6 form-group">
                    <form id="updatescholar" method="post">
                    <input type="hidden" name="id" id="id">
                    
                    

                                <div class="col-md-9 form-group">
                                    <label for="">Username:<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="s_name" id="s_name" aria-describedby="helpId" placeholder="User Name" required />

                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <label for="">First Name:<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="s_fname" id="s_fname" aria-describedby="helpId" placeholder="First Name" required />

                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <label for="">Last Name:<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="s_lname" id="s_lname" aria-describedby="helpId" placeholder="Last Name" required />

                                </div>
                                
                                <div class="col-md-9 form-group">
                                <label for="t_date">Contact:<sup style="color:red;">*</sup></label>
                                <input type="number" class="form-control" name="s_cont" id="s_cont" aria-describedby="helpId" placeholder="Contact" required />

                                </div>

                    
                            <div class="col-md-9 form-group">
                                <label for="">Email:<sup style="color:red;">*</sup></label>
                                <input type="email" class="form-control" name="s_email" id="s_email" aria-describedby="helpId" placeholder="Email" required />
                                </div>
                                
                                <div class="col-md-9 form-group">
                    <label for="">Address:<sup style="color:red;">*</sup></label>
                      <textarea class="form-control" name="s_addr" id="s_addr" placeholder="Address here..." rows="3"></textarea>
                </div>
                
                <div class="col-md-9 form-group">
                                    <label for="">State:<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="s_state" id="s_state" aria-describedby="helpId" placeholder="State" required />

                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <label for="">City:<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="s_city" id="s_city" aria-describedby="helpId" placeholder="City" required />

                                </div>

                    <div class="col-md-9 form-group">
                            <button type="submit" class="ps-btn" name="update" id="update" style="background-color:#fd7e14;">Update</button>
                            <button type="button" class="ps-btn" name="reset" id="reset" data-dismiss="modal" >Close</button>
                    </div>
                    <div class="loader" id="loader">
                                    <img src="../loader/form.gif" width="180px" alt="">
                            </div>
                    </form>

                        <div class="container" id="data"></div>

</div>
</div>
                </div>
            </div>
           
        </div>
    </div>
</div>
</div>
