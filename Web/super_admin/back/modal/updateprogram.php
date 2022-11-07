<div class="modal fade" id="editmodal18" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
                    <h5>Update Program</h5>
                    <button type="button" class="close" style="font-size:20pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                
                    <form id="updateprogram" method="post">
                    <input type="hidden" name="index" id="index">
                    
                    

                                <div class="form-group">
                                    <label for="">Program Name:<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="pname1" id="pname1" aria-describedby="helpId" placeholder="Program Name" required />

                                </div>
                                
                                

                    <div class="modal-footer">
                            <button type="submit" class="ps-btn" name="update" id="update" style="background-color:#fd7e14;">Update</button>
                            <button type="button" class="ps-btn" name="resetbtn" id="resetbtn" data-dismiss="modal" >Close</button>
                    <div class="loader1" id="loader1">
                                    <img src="../loader/form.gif" width="180px" alt="">
                            </div>
                    </div>
                    </form>

                        <div class="container" id="data"></div>


            </div>
           
        </div>
    </div>
</div>