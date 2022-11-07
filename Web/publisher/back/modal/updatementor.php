<div class="col-lg-6">
<div class="modal fade" id="editmodal12" role="dialog">
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
                    <form id="updatementor" method="post">
                    <input type="hidden" name="id" id="id">
                    
                    

                                <div class="col-md-9 form-group">
                                    <label for="">Name:<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="m_name" id="m_name" aria-describedby="helpId" placeholder="Name" required />

                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <label for="">Fater Name:<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="m_fname" id="m_fname" aria-describedby="helpId" placeholder="Name" required />

                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <label for="">Last Name:<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="m_lname" id="m_lname" aria-describedby="helpId" placeholder="Name" required />

                                </div>
                                
                                <div class="col-md-9 form-group">
                                <label for="t_date">Contact:<sup style="color:red;">*</sup></label>
                                <input type="number" class="form-control" name="m_cont" id="m_cont" aria-describedby="helpId" placeholder="Contact" required />

                                </div>

                    
                            <div class="col-md-9 form-group">
                                <label for="">Email:<sup style="color:red;">*</sup></label>
                                <input type="email" class="form-control" name="m_email" id="m_email" aria-describedby="helpId" placeholder="Email" required />
                                </div>
                                
                                <div class="col-md-9 form-group">
                    <label for="">Address:<sup style="color:red;">*</sup></label>
                      <textarea class="form-control" name="m_addr" id="m_addr" placeholder="Address here..." rows="3"></textarea>
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
