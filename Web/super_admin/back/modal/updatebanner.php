<div class="col-lg-6">
<div class="modal fade" id="editmodal16" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
                    <h5>Update Banner</h5>
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
                                    <label for="">Party Name:<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="b_name" id="b_name" aria-describedby="helpId" placeholder="Party Name" required />

                                </div>
                                
                                <div class="col-md-9 form-group">
                                <label for="t_date">Party Contact:<sup style="color:red;">*</sup></label>
                                <input type="number" class="form-control" name="b_cont" id="b_cont" aria-describedby="helpId" placeholder="Party Contact" required />

                                </div>

                    
                            <div class="col-md-9 form-group">
                                <label for="">Party Email:<sup style="color:red;">*</sup></label>
                                <input type="email" class="form-control" name="b_email" id="b_email" aria-describedby="helpId" placeholder="Party Email" required />
                                </div>
                                
                                <div class="col-md-9 form-group">
                    <label for="">Address:<sup style="color:red;">*</sup></label>
                      <textarea class="form-control" name="b_addr" id="b_addr" placeholder="Address here..." rows="3"></textarea>
                </div>
                            
                            <div class="col-md-9 form-group">
                    <label for="">Description:<sup style="color:red;">*</sup></label>
                      <textarea class="form-control" name="b_des" id="b_des" placeholder="Description here..." rows="3"></textarea>
                </div>
                             <div class="col-md-9 form-group">
                                <label for="">Price:<sup style="color:red;">*</sup></label>
                                <input type="number" class="form-control" name="b_price" id="b_price" aria-describedby="helpId" placeholder=" Price" required />

                                </div>
                                
                                <div class="col-md-9 form-group">
                                <label for="">Discount:<sup style="color:red;">*</sup></label>
                                <input type="number" class="form-control" name="b_dis" id="b_dis" aria-describedby="helpId" placeholder="Discount" required />

                                </div>
                                
                                <div class="col-md-9 form-group">
                                <label for="">Start Date:<sup style="color:red;">*</sup></label>
                                <input type="date" class="form-control" name="b_sdate" id="b_sdate" aria-describedby="helpId" placeholder="Start Date" required />

                                </div>
                                
                                <div class="col-md-9 form-group">
                                <label for="">End Date:<sup style="color:red;">*</sup></label>
                                <input type="date" class="form-control" name="b_edate" id="b_edate" aria-describedby="helpId" placeholder="End Date" required />

                                </div>


                            
                                

                            <div class="col-md-9 form-group">                                
                            <button type="submit" class="ps-btn" name="b_submit"
                                    id="b_submit" style="background-color:#fd7e14;">Update</button>
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
