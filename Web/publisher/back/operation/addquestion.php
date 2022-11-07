<?php
include("../../../db/pconnect.php");

if(isset($_POST['testid']) && isset($_POST['qs']) && isset($_POST['a']) && isset($_POST['b']) && isset($_POST['c']) && isset($_POST['d']) && isset($_POST['answer']))
{
	$testid  =  mysqli_real_escape_string($con,$_POST['testid']);
	$qs  =  mysqli_real_escape_string($con,$_POST['qs']);
	$a  =  mysqli_real_escape_string($con,$_POST['a']);
	$b  =  mysqli_real_escape_string($con,$_POST['b']);
	$c  =  mysqli_real_escape_string($con,$_POST['c']);
	$d  =  mysqli_real_escape_string($con,$_POST['d']);
	$answer  =  mysqli_real_escape_string($con,$_POST['answer']);
    $sol  =  mysqli_real_escape_string($con,$_POST['sol']);
    
    $cmd2="select * from video_question_data ORDER BY id DESC LIMIT 1";
    $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
    if(mysqli_fetch_row($result2)<1)
    {
                $id = 0;
    }
    else
    {
        $cmd1="select * from video_question_data ORDER BY id DESC LIMIT 1";
        $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
        while($row=mysqli_fetch_array($result1))
        {
            $id=$row['id'];
        }
    }
    $id = $id + 1;
    $prefix = 'QUE';
    $que_id = $tstid.$prefix.$id;
    
    
	$cmd="INSERT INTO `video_question_data`(`id`, `test_id`, `que_id`, `question`, `a`, `b`, `c`, `d`, `sol`, `correct`, `status`) values
	 (null,'$testid','$que_id','$qs','$a','$b','$c','$d','$sol','$answer','0')";
	$result=mysqli_query($con,$cmd) or die(mysqli_error($con));
	if($result)
	{
	    
        echo'<script>
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
            toastr["success"]("Question Created Successfully...","Success")
        </script>';	
    }
	else
	{
        echo'<script>
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
            toastr["error"]("Question Creation Failed...","Error")
        </script>';			

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
	"timeOut": "5000",
	"extendedTimeOut": "1000",
	"showEasing": "swing",
	"hideEasing": "linear",
	"showMethod": "fadeIn",
	"hideMethod": "fadeOut"
  }
	toastr["error"]("Data Not Post.. !")
</script>
<?php
}
$con -> close();
?>