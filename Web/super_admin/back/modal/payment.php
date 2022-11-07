<div class="modal fade" id="EditModal1" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
                    <h5>Payment</h5>
                    <button type="button" class="close" style="font-size:20pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
            <div class="modal-body">
               
                    <form id="MyForm1" method="post">
                        
                    <input type="hidden" name="index1" id="index1">
                    <input type="hidden" name="c_id1" id="c_id1">
                    <input type="hidden" name="course_id1" id="course_id1">
                    
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
                  <label for="">Select Year :<sup style="color:red;">*</sup></label>
                  <select class="form-control browser-default custom-select" name="year" id="year" required>
                    <option value="" selected>--Select Year--</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                    
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
                            <button type="submit" class="ps-btn" name="pay"
                                    id="pay" style="background-color:#fd7e14;">Submit</button>
                            <button type="reset" class="ps-btn" id="cancelpayment" name="cancelpayment" data-dismiss="modal" style="background-color:#dc3545;">Close</button>
                            </div>
                            
                            <div class="loader1" id="loader1">
                                    <img src="../loader/form.gif" width="140px" alt="">
                            </div>
                            
                        </form>

                        <div id="return"></div>

                    </div>


            </div>
           
        </div>
    </div>
</div>
