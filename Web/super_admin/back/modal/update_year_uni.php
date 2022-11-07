<div class="modal fade" id="unimodal" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
                    <h5>Update Board</h5>
                    <button type="button" class="close" style="font-size:20pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                
                    <form id="updateuniver" method="post">
                    <input type="hidden" name="id" id="id">
                    
                    

                                <div class="form-group">
                                    <label for="">Board Name:<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="u_name" id="u_name" aria-describedby="helpId" placeholder="University Name" required />

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