        <div class="modal fade" id="editcoursemodal" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                    <h5>Update Course</h5>
                    <button type="button" class="close" style="font-size:20pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div> 
                            <div class="modal-body">
                            <form id="myform1" method="post" class="">
              
                                <input type="hidden" class="form-control" name="index" id="index" aria-describedby="helpId" required />
                                
                                <div class="form-group">
                                    <label for="">Select Publisher :<sup style="color:red;">*</sup></label>
                                    <select class="form-control" name="pub" id="pub">
                                    <option value="">-- Select --</option>
                                    <?php
                    $q = "select * from editor_data";
                    $result = mysqli_query($con,$q);
                    while($rows = mysqli_fetch_array($result))
                    {?>
                                <option value="<?php echo $rows['e_id'];?>"><?php echo $rows['e_name'];?>
                                </option>
                                <?php
                    }
                    ?>
                            </select>
                                </div>
                                
                                
  
                            <div class="modal-footer">
<button type="submit" class="ps-btn" name="appr"
                                    id="appr" style="background-color:#fd7e14;">Update</button>
                            <button type="reset" class="ps-btn" id="reset" name="reset" data-dismiss="modal" style="background-color:#dc3545;">Close</button>                            </div>
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
