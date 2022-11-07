<div class="col-lg-6">
    <div class="modal fade" id="FeeDiscountModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Add Fee Discount</h5>
                    <button type="button" class="close" style="font-size:20pt;"
                        data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 form-group">
                    <form id="feediscount" method="post">

                                <div style="display:none;" class="col-md-9 form-group">                   
                                <input type="hideen" class="form-control" name="cid" id="cid" placeholder="Mentor ID" readonly>
                                </div>
                               
                        <!--        <div class="col-md-9 form-check">-->
                        <!--    <label for="a_name">Discount Type :<sup style="color:red;">*</sup> </label>-->
                        <!--    <div style="margin-top:10px;"></div>-->
                        <!--    <input type="radio" class="form-check-input" name="distype" id="distype" value="Rupees"-->
                        <!--        style="width:15px; height:15px; margin-left:1%;" checked>-->
                        <!--    &nbsp;&nbsp;<span>&nbsp;&nbsp;</span> Rupees(₹)<br>-->
                        <!--    <input type="radio" class="form-check-input" name="distype" id="distype" value="Percentage"-->
                        <!--        style="width:15px; height:15px; margin-left:1%;"> &nbsp;&nbsp;<span>&nbsp;&nbsp;</span>-->
                        <!--    Percentage(%)-->
                        <!--</div>-->
                        <br>
                                
                                <div class="col-md-9 form-group">
                                    <label for="chequeno">Enter Discount : <sup style="color:red;">*</sup> </label>
                                    <input type="text" class="form-control" name="discount" id="discount" placeholder="Enter Discount"/>
                                </div>
                                
                                <div class="col-md-9 form-group">
                                    <label for="">Remarks : </label>
                                    <input type="text" class="form-control" name="remark" id="remark" placeholder="Enter Remarks"/>
                                </div>
                               
                                    

                                    <div class="col-md-9 form-group">
                                        <button type="submit" class="ps-btn" name="adddis"
                                            id="adddis" style="background-color:#28a745;">Pay
                                        </button>
                                        <button type="button" class="ps-btn" data-dismiss="modal"
                                            style="background-color:#dc3545;">Close</button>
                                    </div>

                                </form>

                                <div class="container" id="data">

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>