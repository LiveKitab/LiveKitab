<?php
session_start();
include("../../../db/connect.php");


// $teacher_data = $sc_id.'_'.'teacher_data';
// $teacher_data = strtolower($teacher_data);

$flag = 0;
    require('../spreadsheet/excel_reader2.php');
    require('../spreadsheet/SpreadsheetReader.php');
    
    if(isset($_FILES['file']))
    {
        $allowed_extension = array('xls','xlsx');
        $file_array = explode(".",$_FILES["file"]["name"]);
        $file_extension = end($file_array);

        if(in_array($file_extension,$allowed_extension))
        {
            $uploadFilePath = '../../../excel/'.basename($_FILES['file']['name']);
            move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);
            
            $Reader = new SpreadsheetReader($uploadFilePath);
            $totalSheet = count($Reader->sheets());
            //echo "You have total ".$totalSheet." sheets";
            
                for($i=0;$i<$totalSheet;$i++)
                {
                    $Reader->ChangeSheet($i);
                    foreach ($Reader as $Row)
                    {
                        
                         
                        
                        
        
                        $sub_code = isset($Row[0]) ? $Row[0] : ''; 
                        $sub_code = mysqli_real_escape_string($con,$sub_code);
                        $sub_code = htmlspecialchars($sub_code);
    
                        $sub_name = isset($Row[1]) ? $Row[1] : '';
                        $sub_name = mysqli_real_escape_string($con,$sub_name);
                        $sub_name = htmlspecialchars($sub_name);
                        
                        $sub_status = isset($Row[2]) ? $Row[2] : '';
                        $sub_status = mysqli_real_escape_string($con,$sub_status);
                        $sub_status = htmlspecialchars($sub_status);
                        
                        
             
				
				// $alpha = "";
				// $word = explode(" ",$t_fname);
				// foreach($word as $w)
				// {
				// 	$alpha .= $w[0];
				// }
				// $alpha = strtoupper($alpha);
				// $alpha = $alpha.'.png';
				
                
                $cmd="select * from subject_data ORDER BY id DESC LIMIT 1";
                $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
                if(mysqli_fetch_row($result)<1)
                {
                            $id = 0;
                }

                else
                {
                    $cmd1="select * from subject_data ORDER BY id DESC LIMIT 1";
                    $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
                    while($row=mysqli_fetch_array($result1))
                    {
                        $id=$row['id'];
                    }
                }
                // $id = $id + 1;
                // $prefix = $sc_id.'TIDN';
                // $t_id = $prefix.$id;
                
                
                        $id = $id + 1;
                        $prefix1 = 'UNIVER';
                        $uid = $prefix1.$id;
                        
                        // $id = $id + 1;
                        $prefix2 = 'STREAM';
                        $sid = $prefix2.$id;
                        
                        // $id = $id + 1;
                        $prefix3 = 'PROGRAM';
                        $prid = $prefix3.$id;
                        
                        // $id = $id + 1;
                        $prefix4 = 'BID';
                        $bid = $prefix4.$id;
                        
                        // $id = $id + 1;
                        $prefix5 = 'TERM';
                        $tid = $prefix5.$id;
                        
                        // $id = $id + 1;
                        $prefix6 = 'SUB';
                        $sub_id = $prefix6.$id;
                
                
                $sel = "select * from school_data where sc_id='$sc_id'";
                $val = mysqli_query($con,$sel) or die(mysqli_error($con));
                while($row=mysqli_fetch_array($val))
                {
                    $sc_uname = $row['sc_uname'];
                }
                
                 $t_ext = substr($t_fname, 0, 3);
                 $t_ext = strtoupper($t_ext);		
        	     $finalid=$sc_uname.''.'TH'.''.$t_ext.''.$id;



                if($t_fname === "First Name")
                {    
                    
                }
                elseif($t_fname === "")
                {

                }
                elseif($t_fname === " ")
                {

                }
                else
                {
                    $t_pass = password_hash($t_pass, PASSWORD_DEFAULT);
                    $val = "select * from $teacher_data where t_cont= '$t_cont' and t_email='$t_email' and role='HR' OR t_cont= '$t_cont' and t_email='$t_email' and role='HOD'";
                    $cmd = mysqli_query($con,$val) or die(mysqli_error($con));
                    
                    $val1 = "select * from master_teacher where t_cont= '$t_cont'";
                    $cmd1 = mysqli_query($con,$val1) or die(mysqli_error($con));

                        if(mysqli_fetch_row($cmd)<1 && mysqli_fetch_row($cmd1)<1)
                        {
                            $data = "insert into subject_data (id,university_id,stream_id,pr_id,b_id,term_id,sub_id,sub_code,sub_name,sub_bg,sub_status) values (null,'$uid','$sid','$prid','$bid','$tid','$sub_id','$sub_code','$sub_name','NA','0')";
                            $result = mysqli_query($con,$data) or die(mysqli_error($con));
                            if($result)
                            {
                            $val = "insert into master_teacher (id,t_id,t_cont,t_pass,t_table,lastlogin,usercount,status) values (null,'$t_id','$t_cont','$t_pass','$teacher_data','Not Sign In Yet','0','0')";
                            $sql = mysqli_query($con,$val) or die(mysqli_error($con));  
                            if($sql)
                            {
                                $flag = 1;
                            }
                            else
                            {
                                $flag = 2;
                            }
                        
                        }
                        else
                        {
                            $flag = 3;
                        }
                    }
                    else
                    {
                        $flag = 4;
                    }
                }   
   }
                
   }
}
fclose($handle);   

if($flag === 1)
                {
                    ?>
                    <script>
                    toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                    toastr["success"]("Import Done")
                </script>
		        <?php
                }
                elseif($flag === 2)
                {
                    ?>
                    <script>
                    toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                    toastr["warning"]("Registeration Success But Password Generation Fail Please Contact Admin !")
                </script>
		        <?php
                }
                elseif($flag === 3)
                {
                    ?>
                    <script>
                    toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                    toastr["error"]("Import Failed")
                </script>
		        <?php
                }
                elseif($flag === 4)
                {
                    ?>
                    <script>
                    toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                    toastr["warning"]("Subject Already Uploaded...")
                </script>
		        <?php
                }
                elseif($flag === 5)
                {
                    ?>
                    <script>
                    toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                    toastr["warning"]("CSV File Currupted...")
                </script>
		        <?php
                }
  }
$con -> close();
?>