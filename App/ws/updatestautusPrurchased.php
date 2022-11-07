<?php
	include '../inc/connection.php';

    
    $payment_mode = mysqli_real_escape_string($conn,$_POST['payment_mode']);
    $payment_mode = htmlspecialchars ($payment_mode);
    
    $tran_id = mysqli_real_escape_string($conn,$_POST['tran_id']);
    $tran_id = htmlspecialchars ($tran_id);
    
    $status = mysqli_real_escape_string($conn,$_POST['status']);
    $status = htmlspecialchars ($status);
    
    $time = mysqli_real_escape_string($conn,$_POST['time']);
    $time = htmlspecialchars ($time);
    
    $BankName = mysqli_real_escape_string($conn,$_POST['BankName']);
    $BankName = htmlspecialchars ($BankName);
    
     $TXNIDPAYTM = mysqli_real_escape_string($conn,$_POST['TXNIDPAYTM']);
    $TXNIDPAYTM = htmlspecialchars ($TXNIDPAYTM);
    
  /*  $payment_mode ="PPI";
    $tran_id="TRA35";
    $status='Success';
    $time="2020-08-09 11:32:43.0";
     $BankName="WALLET";*/
    
    
    $response=array();
    
    $sql="UPDATE user_transaction SET transaction_time='$time',status='$status',payment_mode='$payment_mode',BankName='$BankName',TXNIDPAYTM='$TXNIDPAYTM' WHERE transaction_id='$tran_id'";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($sql));
    if($result)
    {
        $response['message']="Success";
    }
    else
    {
        $response['message']="Failed";
    }
    echo json_encode($response);
	 mysqli_close($conn);




?>