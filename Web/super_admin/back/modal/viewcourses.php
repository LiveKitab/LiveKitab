<div class="modal fade" id="abc<?php echo $row['id'] ?>" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                    <h5>View Course</h5>
                    <button type="button" class="close" style="font-size:20pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                            <div class="modal-body">
                            
                                
                                    <div class="row">
                                        <div class="col-md-5">Subject Name</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $course_name; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Subject Code</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $sub_code; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Subject Credit</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $credit; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Price</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $course_price; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Discount</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $course_dis; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Plan Duration</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $course_plan_duration; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Description</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $course_des; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Video Limit</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $course_video_limit; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Start Date</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $course_sdate; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">End Date</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $course_edate; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Reject Reason</div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5"><?php echo $rej_reason; ?></div>
                                    </div>
                                    
                                    
                                    
    
                            
                            <div class="modal-footer">
                                <button type="reset" name="reset" id="reset" value="reset" class="ps-btn" style="background-color: #dc3545;" data-dismiss="modal">Close</button>
                            </div>
                </div>
                
            </div>
            </div>
        </div>