<div class="modal fade" id="abc<?php echo $row['id'] ?>" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                    <h5>View Mentor</h5>
                    <button type="button" class="close" style="font-size:20pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                            <div class="modal-body">
                            
                                
                                    <div class="row">
                                        <div class="col-md-5">Mentor Name</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $c_name; echo ' '; echo $c_fname; echo ' ';    echo $c_lname;?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Contact</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $c_cno; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Email</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $c_email; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Address</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $c_addr; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">State</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $c_state; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">City</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $c_city; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Education</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $c_edu; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Specialization</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $c_spec; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Join Date</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $c_joindate; ?></div>
                                    </div>
                                    
                                    
                                    
    
                            
                            <div class="modal-footer">
                                <button type="reset" name="reset" id="reset" value="reset" class="ps-btn" style="background-color: #dc3545;" data-dismiss="modal">Close</button>
                            </div>
                </div>
                
            </div>
            </div>
        </div>