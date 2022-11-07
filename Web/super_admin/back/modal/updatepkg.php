<div class="modal fade" id="pkgmodal" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
                    <h5>Update Package</h5>
                    <button type="button" class="close" style="font-size:20pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
            <div class="modal-body">
               
                    <form id="MyForm" method="post">
                        
                    <input type="hidden" name="index" id="index">
                    
                    <div class="form-group">
                                <label for="">Package Title :<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="p_title" id="p_title" aria-describedby="helpId"  placeholder="Package Title"  required />

                                </div>
                    
                                 <div class="form-group">
                                  <label for="">University :</label>
                                <input type="text" class="form-control" name="p_uni" id="p_uni" aria-describedby="helpId" style="background-color:white;" placeholder="Mentor Name" readonly required />
                                </div>
                                
                                <div class="form-group">
                                  <label for="">Stream Name :</label>
                                <input type="text" class="form-control" name="p_str" id="p_str" aria-describedby="helpId" style="background-color:white;" placeholder="Mentor Name" readonly required />
                                </div>
                                 
                                <div class="form-group">
                                    <label for="">Program Name :</label>
                                <input type="text" class="form-control" name="p_pro" id="p_pro" aria-describedby="helpId" style="background-color:white;" placeholder="Courses Name" readonly required />

                                </div>
                                
                                <div class="form-group">
                                <label for="t_date">Branch Name :</label>
                                <input type="text" class="form-control" name="p_brn" id="p_brn" aria-describedby="helpId" style="background-color:white;" placeholder="Course Price" readonly required />

                                </div>
                                
                                <div class="form-group">
                                <label for="t_date">Semester :</label>
                                <input type="text" class="form-control" name="p_sem" id="p_sem" aria-describedby="helpId" style="background-color:white;" placeholder="Course Price" readonly required />

                                </div>
                                
                                <div class="form-group">
                                <label for="t_date">Medium :</label>
                                <input type="text" class="form-control" name="p_med" id="p_med" aria-describedby="helpId" style="background-color:white;" placeholder="Course Price" readonly required />

                                </div>
                                
                                <div class="form-group">
                                <label for="t_date">Price :<sup style="color:red;">*</sup></label>
                                <input type="number" class="form-control" name="p_price" id="p_price" aria-describedby="helpId"  placeholder="Price"  required />

                                </div>
                                
                                <div class="form-group">
                                <label for="t_date">Discount In % :<sup style="color:red;">*</sup></label>
                                <input type="number" class="form-control" name="p_dis" id="p_dis" aria-describedby="helpId"  placeholder="Discount In %"  required />

                                </div>
                                
                                <div class="form-group">
                                <label for="">Description:<sup style="color:red;">*</sup></label>
                      <textarea class="form-control" name="p_des" id="p_des" placeholder="Description here..." rows="3"></textarea>

                                </div>

                            <div class="modal-footer">                                
                            <button type="submit" class="ps-btn" name="p_submit"
                                    id="p_submit" style="background-color:#fd7e14;">Submit</button>
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
