<div class="modal fade" id="managepkgmodal" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
                    <h5>Update Manage Packge</h5>
                    <button type="button" class="close" style="font-size:20pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
            <div class="modal-body">
               
                    <form id="myform1" method="post">
                        
                    <input type="hidden" name="id" id="id">
                    
                                 <div class="form-group">
                  <label for="">Subject Name :<sup style="color:red;">*</sup></label>
                  <select class="form-control browser-default custom-select" name="c_name" id="c_name" required>
                    <option value="" selected >--- Select Subject ---</option>
                    <?php
                            $q = "select * from course_data where stream_id='$stream_id' and pr_id='$pr_id' and b_id='$b_id' and term_id='$term_id'";
                            $result = mysqli_query($con,$q);
                            while($rows = mysqli_fetch_array($result))
                    {
                    ?>
                            
                            <option value="<?php echo $rows['course_id'];?>"><?php echo $rows['course_name']; ?></option>
                    <?php
                    }               
                    ?>
                  </select>
                </div>
                                 
                                
                                
                                
                            
                            <div class="form-group">
                    <label for="">Remarks:<sup style="color:red;">*</sup></label>
                      <textarea class="form-control" name="p_rmk" id="p_rmk" placeholder="Description here..." rows="3"></textarea>
                </div>

                            
                                

                            <div class="form-group">                                
                            <button type="submit" class="ps-btn" name="p_submit"
                                    id="p_submit" style="background-color:#fd7e14;">Update</button>
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
