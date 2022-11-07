<div class="modal fade" id="editmodal" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
                    <h5>Update Courses</h5>
                    <button type="button" class="close" style="font-size:20pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
            <div class="modal-body">
               
                    <form id="myform1" method="post">
                        
                    <input type="hidden" name="index" id="index">
                    
                                 <div class="form-group">
                  <label for="">Editor Name :<sup style="color:red;">*</sup></label>
                  <select class="form-control browser-default custom-select" name="e_name" id="e_name" required>
                    <option value="<?php echo $ename; ?>"><?php echo $ename; ?></option>
                    <?php
                            $q = "select * from editor_data";
                            $result = mysqli_query($con,$q);
                            while($rows = mysqli_fetch_array($result))
                    {
                    ?>
                            
                            <option value="<?php echo $rows['e_id'];?>"><?php echo $rows['e_name']; ?></option>
                    <?php
                    }               
                    ?>
                  </select>
                </div>
                                 
                                <div class="form-group">
                                    <label for="">Subject Name:<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="c_name" id="c_name" aria-describedby="helpId" placeholder="Subject Name" required />

                                </div>
                                
                                <div class="form-group">
                                    <label for="">Subject Code:<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="c_code" id="c_code" aria-describedby="helpId" placeholder="Subject Code" required />

                                </div>
                                
                                <div class="form-group">
                                    <label for="">Subject Credit:<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="c_credit" id="c_credit" aria-describedby="helpId" placeholder="Subject Credit" required />

                                </div>
                                
                                <div class="form-group">
                                <label for="t_date">Price:<sup style="color:red;">*</sup></label>
                                <input type="number" class="form-control" name="c_price" id="c_price" aria-describedby="helpId" placeholder="Price" required />

                                </div>
                                
                                <div class="form-group">
                                <label for="t_date">Discount in %:<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="c_dis" id="c_dis" aria-describedby="helpId" placeholder="Discount in %" required />

                                </div>

                    
                            <div class="form-group">
                                <label for="">Plan Duration:<sup style="color:red;">*</sup></label>
                                <input type="number" class="form-control" name="p_duration" id="p_duration" aria-describedby="helpId" placeholder="Plan Duration" required />
                                </div>
                                
                                <div class="form-group">
                                <label for="">Video Limit:<sup style="color:red;">*</sup></label>
                                <input type="number" class="form-control" name="v_limit" id="v_limit" aria-describedby="helpId" placeholder="Video Limit" required />
                                </div>
                                
                                
                            
                            <div class="form-group">
                    <label for="">Description:<sup style="color:red;">*</sup></label>
                      <textarea class="form-control" name="c_des" id="c_des" placeholder="Description here..." rows="3"></textarea>
                </div>

                            
                                

                            <div class="form-group">                                
                            <button type="submit" class="ps-btn" name="c_submit"
                                    id="c_submit" style="background-color:#fd7e14;">Update</button>
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
