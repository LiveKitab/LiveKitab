<div class="col-lg-6">
<div class="modal fade" id="abc<?php echo $row['id'] ?>" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
                    <h5>Update Course</h5>
                    <button type="button" class="close" style="font-size:20pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <div class="container">
                <div class="row">
                    <div class="col-md-6 form-group">
                    <form id="myform1" method="post">
                        
                    
                    
                                <div class="col-md-9 form-group">
                                    <label for="">ID :<sup style="color:red;">*</sup></label>
                                    <input type="text" name="index" id="index" value="<?php echo $id; ?>">
                                </div>
                                 
                                <div class="col-md-9 form-group">
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

                            <div class="col-md-9 form-group">                                
                            <button type="submit" class="ps-btn" name="appr"
                                    id="appr" style="background-color:#fd7e14;">Update</button>
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
           
        </div>
    </div>
</div>
</div>
