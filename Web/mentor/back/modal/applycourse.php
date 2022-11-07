<div class="modal fade" id="ExploreCourse" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
                    <h5>Apply For Course</h5>
                    <button type="button" class="close" style="font-size:20pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
            <div class="modal-body">
               
                    <form onsubmit="return applycourse(this);" id="MyForm" method="post">
                        
                    <input type="hidden" name="sub_id" id="sub_id">
                    <input type="hidden" name="sub_name" id="sub_name">
                    <input type="hidden" name="sub_code" id="sub_code">
                    
                           <div class="form-group">
                                    <label for="">Title Name :<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="t_name" id="t_name" aria-describedby="helpId" placeholder="Title Name" required />

                                </div>
                    
                            <div class="form-group">
                                <label for="">Subject Duration :<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="s_duration" id="s_duration" aria-describedby="helpId" placeholder="Subject Duration In Hours" required />
                                </div>
                                
                                <div class="form-group">
                                <label for="">Video Limit :<sup style="color:red;">*</sup></label>
                                <input type="number" class="form-control" name="v_limit" id="v_limit" aria-describedby="helpId" placeholder="Number of Video Limit" required />
                                </div>
                                
                                <div class="form-group">
                                <label for="">Test Limit :<sup style="color:red;">*</sup></label>
                                <input type="number" class="form-control" name="t_limit" id="t_limit" aria-describedby="helpId" placeholder="Number of Test Limit" required />
                                </div>
                            
                            <div class="form-group">
                                <label for="">Remarks :<sup style="color:red;">*</sup></label>
                                  <textarea class="form-control" name="rmk" id="rmk" placeholder="Remarks..." rows="3"></textarea>
                            </div>
        
                            <div class="form-group">                                
                            <button type="submit" class="ps-btn" name="submit"
                                    id="submit" style="background-color:#fd7e14;">Submit</button>
                            <button type="reset" class="ps-btn" id="reset22" name="reset22" data-dismiss="modal" style="background-color:#dc3545;">Close</button>
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
