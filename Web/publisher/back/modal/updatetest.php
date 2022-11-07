<div class="modal fade" id="testmodal" role="dialog">
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
                                <label for="">Test Title :<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="t_title" id="t_title" aria-describedby="helpId"  placeholder="Test Title"  required />

                                </div>
                    
                                 <div class="form-group">
                                  <label for="">Number of Question :<sup style="color:red;">*</sup></label>
                                <input type="number" class="form-control" name="t_que" id="t_que" aria-describedby="helpId"  placeholder="Number of Question"  required />
                                </div>
                                 
                                <div class="form-group">
                                    <label for="">Total Marks :<sup style="color:red;">*</sup></label>
                                <input type="number" class="form-control" name="t_total" id="t_total" aria-describedby="helpId" placeholder="Courses Name"  required />

                                </div>
                                
                                <div class="form-group">
                                <label for="t_date">Positive Marks For Correct :<sup style="color:red;">*</sup></label>
                                <input type="number" class="form-control" name="t_pos" id="t_pos" aria-describedby="helpId" placeholder="Positive Marks For Correct"  required />

                                </div>
                                
                                <div class="form-group">
                                <label for="t_date">Negative Marks For Incorrect :<sup style="color:red;">*</sup></label>
                                <input type="number" class="form-control" name="t_neg" id="t_neg" aria-describedby="helpId" placeholder="Negative Marks For Incorrect"  required />

                                </div>
                                
                                

                            <div class="modal-footer">                                
                            <button type="submit" class="ps-btn" name="t_submit"
                                    id="t_submit" style="background-color:#fd7e14;">Submit</button>
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
