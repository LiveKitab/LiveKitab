<div class="modal fade" id="exmodal" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
                    <h5>Update Test</h5>
                    <button type="button" class="close" style="font-size:20pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
            <div class="modal-body">
               
                    <form id="MyForm" method="post">
                        
                    <input type="hidden" name="id" id="id">
                    
                    <div class="form-group">
                                <label for="">Excercise's Title :<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId"  placeholder="Excercise's Title"  required />

                                </div>
                    
                                 <div class="form-group">
                                  <label for="">Excercise's Description :<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="descr" id="descr" aria-describedby="helpId"  placeholder="Excercise's Description"  required />
                                </div>
                                 
                                
                            <div class="modal-footer">                                
                            <button type="submit" class="ps-btn" name="e_submit"
                                    id="e_submit" style="background-color:#fd7e14;">Submit</button>
                            <button type="reset" class="ps-btn" id="ret" name="ret" data-dismiss="modal" style="background-color:#dc3545;">Close</button>
                            <div class="loader" id="loader">
                                    <img src="../loader/form.gif" width="140px" alt="">
                            </div>
                            </div>
                            
                            
                            
                        </form>

                        <div id="return"></div>

                    </div>


            </div>
           
        </div>
    </div>
</div>
