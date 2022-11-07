<div class="modal fade" id="EditModal" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
                    <h5>Payment</h5>
                    <button type="button" class="close" style="font-size:20pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
            <div class="modal-body">
               
                    <form id="MyForm" method="post">
                        
                    <input type="hidden" name="index" id="index">
                    <input type="hidden" name="c_id" id="c_id">
                    <input type="hidden" name="course_id" id="course_id">
                    
                                 <div class="form-group">
                  <label for="">Select Month :<sup style="color:red;">*</sup></label>
                  <select class="form-control browser-default custom-select" name="month" id="month" required>
                    <option value="" selected>--Select Month--</option>
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                  </select>
                </div>
                                 
                                <div class="form-group">
                                    <label for="">Payment Method:<sup style="color:red;">*</sup></label>
<select class="form-control browser-default custom-select" name="pm" id="pm" required>
                    <option value="" selected>--Select Any One--</option>
                    <option value="Offline">Offline</option>
                    <option value="Online">Online</option>
                  </select>
                                </div>
                                
                                <div class="form-group">
                                <label for="t_date">Amount:<sup style="color:red;">*</sup></label>
                                <input type="number" class="form-control" name="amt" id="amt" aria-describedby="helpId" placeholder="Amount" required />

                                </div>
                                
                                
                                
                                
                            
                            <div class="form-group">
                    <label for="">Remark:<sup style="color:red;">*</sup></label>
                      <textarea class="form-control" name="rmk" id="rmk" placeholder="Remarks..." rows="3"></textarea>
                </div>

                            
                                

                            <div class="form-group">                                
                            <button type="submit" class="ps-btn" name="submit"
                                    id="submit" style="background-color:#fd7e14;">Submit</button>
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
