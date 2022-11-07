<div class="modal fade" id="abc<?php echo $row['id'] ?>" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                    <h5>View Video</h5>
                    <button type="button" class="close" style="font-size:20pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                            <div class="modal-body">
                            
                                
                                    <div class="row">
                                        <div class="col-md-5">Video Title</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $v_title; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Chapter Name</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $ch_name; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Play Video</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><a href="<?php echo $v_link1; ?>" target="_blank" title="Play"><i class="fa fa-play-circle-o" style="font-size:25pt;"></i></a></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Video Description</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $v_des; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Remark</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $v_rmk; ?></div>
                                    </div>
                                    
                                    
                                    
                                    
                                    
    
                            
                            <div class="modal-footer">
                                <button type="reset" name="reset" id="reset" value="reset" class="ps-btn" style="background-color: #dc3545;" data-dismiss="modal">Close</button>
                            </div>
                </div>
                
            </div>
            </div>
        </div>