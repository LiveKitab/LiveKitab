        <div class="modal fade" id="editcoursemodal" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                    <h5>Approve Course</h5>
                    <button type="button" class="close" style="font-size:20pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div> 
                            <div class="modal-body">
                            <form id="myform1" method="post" class="">
              
                                <input type="hidden" class="form-control" name="index" id="index" aria-describedby="helpId" required />
                                
                                <input type="hidden" class="form-control" name="courseid" id="courseid" aria-describedby="helpId" required />

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
                                
                                <div class="form-group">
                                    <label for="">Select Plan :<sup style="color:red;">*</sup></label>
                                    <select class="form-control" name="plan" id="plan">
                                    <option value="">-- Select --</option>
                                    <?php
                    $q1 = "select * from plan_details";
                    $result1 = mysqli_query($con,$q1);
                    while($rows1 = mysqli_fetch_array($result1))
                    {?>
                                <option value="<?php echo $rows1['plan_id'];?>"><?php echo $rows1['plan_name'];?>
                                </option>
                                <?php
                    }
                    ?>
                            </select>
                                </div>
                            
                            <div class="modal-footer">
                                <button type="submit" name="appr" id="appr" class="ps-btn" style="background-color: #28a745;">Submit</button>
                                <button type="reset" name="reset" id="reset" class="ps-btn" style="background-color: #dc3545;" data-dismiss="modal">Close</button>
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
