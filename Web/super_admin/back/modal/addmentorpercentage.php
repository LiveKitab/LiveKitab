<div class="modal fade" id="EditModal" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
                    <h5>Add Mentor Percentage</h5>
                    <button type="button" class="close" style="font-size:20pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
            <div class="modal-body">
               
                    <form id="MyForm" method="post">
                        
                    <input type="hidden" name="index" id="index">
                    <input type="hidden" name="mentorid" id="mentorid">
                    <input type="hidden" name="course_id" id="course_id">
                    
                                 <div class="form-group">
                                  <label for="">Mentor Name :<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="m_name" id="m_name" aria-describedby="helpId" style="background-color:white;" placeholder="Mentor Name" readonly required />
                                </div>
                                 
                                <div class="form-group">
                                    <label for="">Subject Name:<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="c_name" id="c_name" aria-describedby="helpId" style="background-color:white;" placeholder="Courses Name" readonly required />

                                </div>
                                
                                <div class="form-group">
                                <label for="t_date">Subject Price:<sup style="color:red;">*</sup></label>
                                <input type="number" class="form-control" name="c_price" id="c_price" aria-describedby="helpId" style="background-color:white;" placeholder="Course Price" readonly required />

                                </div>
                                
                                <div class="form-group">
                                <label for="t_date">Number of Video:<sup style="color:red;">*</sup></label>
                                <input type="number" class="form-control" name="video" id="video" aria-describedby="helpId" style="background-color:white;" placeholder="Course Price" readonly required />

                                </div>
                                
                                <div class="form-group">
                                <label for="t_date">Number of Subscribers:<sup style="color:red;">*</sup></label>
                                <input type="number" class="form-control" name="subs" id="subs" aria-describedby="helpId" style="background-color:white;" placeholder="" readonly required />

                                </div>
                                
                                <div class="form-group">
                                <label for="t_date">Number of Likes:<sup style="color:red;">*</sup></label>
                                <input type="number" class="form-control" name="likes" id="likes" aria-describedby="helpId" style="background-color:white;" placeholder="" readonly required />

                                </div>
                                
                                <div class="form-group">
                                <label for="t_date">Enter Percentage:<sup style="color:red;">*</sup></label>
                                <input type="text" class="form-control" name="per" id="per" aria-describedby="helpId" placeholder="Discount in %" required />

                                </div>

                            <div class="modal-footer">                                
                            <button type="submit" class="ps-btn" name="submit"
                                    id="submit" style="background-color:#fd7e14;">Submit</button>
                            <button type="reset" class="ps-btn" id="reset" name="reset" data-dismiss="modal" style="background-color:#dc3545;">Close</button>
                            <div class="loader" id="loader">
                                    <img src="../loader/form.gif" width="140px" alt="">
                            </div>
                            </div>
                            
                            
                            
                        </form>

                        <div id="return"></div>

                    </div>


            </div>
           
        </div>
    </div>
</div>
