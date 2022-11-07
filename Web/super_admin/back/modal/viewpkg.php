<div class="modal fade" id="abc<?php echo $row['id'] ?>" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                    <h5>View Packahe</h5>
                    <button type="button" class="close" style="font-size:20pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                            <div class="modal-body">
                            
                                
                                    <div class="row">
                                        <div class="col-md-5">University/Stream Name</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $uni; ?> / <?php echo $stream_name; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Program Name</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $pr_id; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Branch Name</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $b_id; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Semester/Medium</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $term_name; ?> / <?php echo $med; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Price</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $price; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Discount</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $dis; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Description</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $descr; ?></div>
                                    </div>
                                    
                                    
                                    
                                    
    
                            
                            <div class="modal-footer">
                                <button type="reset" name="reset" id="reset" value="reset" class="ps-btn" style="background-color: #dc3545;" data-dismiss="modal">Close</button>
                            </div>
                </div>
                
            </div>
            </div>
        </div>