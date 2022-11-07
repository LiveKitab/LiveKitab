<div class="col-lg-6">
<div class="modal fade" id="replymodal" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
                    <h5>Reply</h5>
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
                    <label for="">Reply:<sup style="color:red;">*</sup></label>
                      <textarea class="form-control" name="reply" id="reply" placeholder="Reply here..." rows="3"></textarea>
                </div>

                            
                                

                            <div class="col-md-9 form-group">                                
                            <button type="submit" class="ps-btn" name="submit"
                                    id="submit" style="background-color:#fd7e14;">Replay</button>
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
