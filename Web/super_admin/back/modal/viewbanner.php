<div class="modal fade" id="abc<?php echo $row['id'] ?>" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                    <h5>View Banner</h5>
                    <button type="button" class="close" style="font-size:20pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                            <div class="modal-body">
                            
                                
                                    <div class="row">
                                        <div class="col-md-5">Client Name</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $party_name; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Client Contact</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $party_contact; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Client Email</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $party_email; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Client Address</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $party_addr; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Client Description</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $banner_des; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Price</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $price; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Discount</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $descount; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Start Date</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $s_date; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">End Date</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $e_date; ?></div>
                                    </div>
                                    
                                    
    
                            
                            <div class="modal-footer">
                                <button type="reset" name="reset" id="reset" value="reset" class="ps-btn" style="background-color: #dc3545;" data-dismiss="modal">Close</button>
                            </div>
                </div>
                
            </div>
            </div>
        </div>