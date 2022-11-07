<div class="modal fade" id="Paymentmodal" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
                    <h5>Update Payment Details</h5>
                    <button type="button" class="close" style="font-size:20pt;" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                
                    <form id="updatepayment" method="post">
                    <input type="hidden" name="id" id="id">
                                
                                <div class="form-group">
                                  <label for="header">Transaction Id :<sup style="color:red;">*</sup></label>
                                  <input type="text" class="form-control" name="transaction_id" id="transaction_id" aria-describedby="helpId" placeholder="Transaction ID" readonly />
                                </div>

                                <div class="form-group">
                                    <label for="">Bill ID :<sup style="color:red;">*</sup></label>
                                   <input type="text" class="form-control" name="bill_id" id="bill_id" aria-describedby="helpId" placeholder="Bill ID" readonly />
                                </div>
                                
                                <div class="form-group">
                                  <label for="header">Order ID :<sup style="color:red;">*</sup></label>
                                  <input type="text" class="form-control" name="order_id" id="order_id" aria-describedby="helpId" placeholder="Order ID" readonly />
                                </div>
                                
                                <div class="form-group">
                                  <label for="header">Payment Mode :<sup style="color:red;">*</sup></label>
                                  <input type="text" class="form-control" name="payment_mode" id="payment_mode" aria-describedby="helpId" placeholder="Payment Mode"  readonly />
                                </div>
                                
                                <div class="form-group">
                                  <label for="header">Amount :<sup style="color:red;">*</sup></label>
                                  <input type="text" class="form-control" name="amount" id="amount" aria-describedby="helpId" placeholder="Amount" required />
                                </div>
                                
                                

                    <div class="modal-footer">
                            <button type="submit" class="ps-btn" name="editpayment" id="editpayment" style="background-color:#fd7e14;">Pay</button>
                            <button type="button" class="ps-btn" name="resetbtn" id="resetbtn" data-dismiss="modal" >Close</button>
                    <!--<div class="loader1" id="loader1">-->
                    <!--                <img src="../loader/form.gif" width="180px" alt="">-->
                    <!--        </div>-->
                    </div>
                    </form>

                        <div class="container" id="return"></div>


            </div>
           
        </div>
    </div>
</div>