        <div class="modal fade" id="editcoursemodal1" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                    <h5>Reject Course</h5>
                    <button type="button" class="close" style="font-size:20pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div> 
                            <div class="modal-body">
                            <form id="myform2" method="post" class="">
              
                                <input type="hidden" class="form-control" name="index1" id="index1" aria-describedby="helpId" required />
                                
                                <div class="form-group">
                                    <label for="">Reason :<sup style="color:red;">*</sup></label>
                                <textarea type="text" class="form-control" name="reason" id="reason" aria-describedby="helpId" placeholder="Describe Reason..." required></textarea>

                                </div>
                                
  
                            <div class="modal-footer">
                                                                <button type="submit" name="rej" id="rej" class="ps-btn" style="background-color: #28a745;">Submit</button>
                                <button type="reset" name="cancel" id="cancel" class="ps-btn" style="background-color: #dc3545;" data-dismiss="modal">Close</button>
                            <div class="loader align-right" id="loader">
                                    <img src="../loader/form.gif" width="140px" alt="">
                            </div>
                            </div>
                            
                            </form>
                            <div id="return"></div>
                </div>
                
            </div>
            </div>
        </div>