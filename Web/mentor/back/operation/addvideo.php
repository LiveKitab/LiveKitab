<?php
include("../../../db/mconnect.php");

if(isset($_POST['title']) && isset($_POST['link']) && isset($_POST['v_des']) && isset($_POST['remark']) && isset($_POST['ch_no']))
{
   
    $title  =  mysqli_real_escape_string($con,$_POST['title']);
    $title = htmlspecialchars($title);
    $link  =  mysqli_real_escape_string($con,$_POST['link']);
    $v_des  =  mysqli_real_escape_string($con,$_POST['v_des']);
    $v_des = htmlspecialchars($v_des);
    $remark  =  mysqli_real_escape_string($con,$_POST['remark']);
    $remark = htmlspecialchars($remark);
    $subject_id  =  mysqli_real_escape_string($con,$_POST['subject_id']);
    $subject_id = htmlspecialchars($subject_id);
    $ch_no  =  mysqli_real_escape_string($con,$_POST['ch_no']);
    $ch_no = htmlspecialchars($ch_no);
    date_default_timezone_set("Asia/Kolkata");
    $vdate = date('Y-m-d-H:i:s');
    
    
    $fetch = "select * from creator_video where subject_id='$subject_id' and ch_id='$ch_no' and c_id='$c_id'";
    $runq = mysqli_query($con,$fetch);
    if(mysqli_num_rows($runq)>0)
    {
        while($temp = mysqli_fetch_array($runq))
        {
            $oldseq = $temp['sequence'];
            $oldseq=$oldseq+1;
        }
    }
    else
    {
        $oldseq = 1;
    }
    
    $cmd1="select no_of_video from apply_for_subject where c_id='$c_id' and sub_id='$subject_id' LIMIT 1";
    $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
    while($row1=mysqli_fetch_array($result1))
    {     
        $no_of_video=$row1['no_of_video'];
    }

    
    $sel="select * from creator_video where v_title='$title'";
	$run=mysqli_query($con,$sel) or die(mysqli_error($con));
    if(mysqli_num_rows($run)<1)
    {
            $cmd="select * from creator_video ORDER BY id DESC LIMIT 1";
            $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
            if(mysqli_fetch_row($result)<1)
            {
                    $id = 0;
            }
            else
            {
            $cmd1="select * from creator_video ORDER BY id DESC LIMIT 1";
            $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
            while($row=mysqli_fetch_array($result1))
            {
                $id=$row['id'];
            }
        }
        $id = $id + 1;
        $prefix = 'VID';
        $vid = $prefix.$id;
        
    
    $cmd="insert into creator_video (id,c_id,subject_id,v_id,ch_id,sequence,v_title,v_link,v_des,v_rmk,v_counter,v_date,v_status) values
	 (null,'$c_id','$subject_id','$vid','$ch_no','$oldseq','$title','$link','$v_des','$remark','0','$vdate','0')";
	$result=mysqli_query($con,$cmd) or die(mysqli_error($con));
	if($result)
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
            "timeOut": "2500",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          }
            toastr["success"]("Video Added","Success")
		</script>
		<?php
	}
	else
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
            "timeOut": "2500",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          }
            toastr["error"]("Video Added Failed","Error")
		</script>
		<?php
    }
    
    }
    else
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
            "timeOut": "2500",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          }
            toastr["warning"]("Video Already Added with Title Named <?php echo $title; ?>","Warning")
		</script>
		<?php
    }
 
  }
  else
  {
      header('location:../../404');
  }

?>