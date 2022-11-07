<?php


include("../../../db/mconnect.php");
if(isset($_POST['title']))
{
    $name  =  mysqli_real_escape_string($con,$_POST['name']);
    $name = htmlspecialchars($name);
    $title  =  mysqli_real_escape_string($con,$_POST['title']);
    $title = htmlspecialchars($title);
    $description  =  mysqli_real_escape_string($con,$_POST['description']);
    // $img1 = htmlspecialchars($img1);
    // $img1 = str_replace(' ', '', $img1);
    $random=rand(1000,9999);
    $today = date("F j, Y, g:i a");  
     /* First Image*/
    $doc = $_FILES['img'];
	$imgname = $_FILES['img']['name'];
	if($imgname === '')
	{
	    $imgnamenew1='noimg.jpg';
	}
	else
	{
	$imgtmpname = $_FILES['img']['tmp_name'];
	$imgsize = $_FILES['img']['size'];
	$imgerror = $_FILES['img']['error'];
	$imgtype = $_FILES['img']['type'];

	$fileext = explode('.',$imgname);
	$fileact = strtolower(end($fileext));

	$allowed = array('jpg','jpeg','png','pdf','JPG','JPEG','PNG','PDF');

	if(in_array($fileact,$allowed))
	{
		if($imgerror === 0)
		{
			if($imgsize < 4000000)
			{
				$imgnamenew1 = $random.".".$fileact;
				$filedes1 = '../../../src/blog/'.$imgnamenew1;
				move_uploaded_file($imgtmpname,$filedes1);
			}
			else
			{
				echo'large file';
			}
		}
		else
		{
			echo'Error';
		}
	}
	else
	{
		echo'Invalid Ext.';
	}
	}
  


    $cmd="insert into blog (id,name,title,descr,img,date) values
    (null,'$name','$title','$description','$imgnamenew1','$today')";
	$result=mysqli_query($con,$cmd) or die(mysqli_error($con));
	if($result)
	{
            echo'
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
            "timeOut": "1500",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          }
            toastr["success"]("Blog Added Successfully..!","Blog Added")
</script>';
      }  
      else
      {
        echo'
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
            "timeOut": "1500",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          }
            toastr["error"]("Failed")
</script>';
      }
    
}
else
{
echo'
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
"timeOut": "1500",
"extendedTimeOut": "1000",
"showEasing": "swing",
"hideEasing": "linear",
"showMethod": "fadeIn",
"hideMethod": "fadeOut"
 }
toastr["warning"]("Something Went Wrong...!")
</script>';

}


$con -> close();
?>