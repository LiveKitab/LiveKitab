<div class="modal fade" id="ExploreCourse" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
                    <h5>Approve For Course</h5>
                    <button type="button" class="close" style="font-size:20pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
            <div class="modal-body">
               
                    <form onsubmit="return applycourse(this);" id="MyForm" method="post">
                        
                    <input type="hidden" name="id" id="id">
                    
                               <div class="form-group">
                                <label for="">Days :<sup style="color:red;">*</sup></label>
                                <input type="number" class="form-control" name="days" id="days" aria-describedby="helpId" placeholder="Days" required />
                                </div>
                    
                           
                                <div class="form-group">
                                <label for="">Price :<sup style="color:red;">*</sup></label>
                                <input type="number" class="form-control" name="price" id="price" aria-describedby="helpId" placeholder="Price" required />
                                </div>
                                
                                <div class="form-group">
                                <label for="">Discount :<sup style="color:red;">*</sup></label>
                                <input type="number" class="form-control" name="dis" id="dis" aria-describedby="helpId" placeholder="Discount In %" required />
                                </div>
                            
                            <div class="form-group">
                                <label for="">Description :<sup style="color:red;">*</sup></label>
                                  <textarea class="form-control" name="des" id="des" placeholder="Description Here..!" rows="3"></textarea>
                            </div>
        
                            <div class="form-group">                                
                            <button type="submit" class="ps-btn" name="submit"
                                    id="submit" style="background-color:#fd7e14;">Submit</button>
                            <button type="reset" class="ps-btn" id="reset22" name="reset22" data-dismiss="modal" style="background-color:#dc3545;">Close</button>
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
