<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    if((!isset($_SESSION['e_email'])) && (!isset($_SESSION['e_con'])))
    {
      header('location:../back/function/logout');
      exit;
    }
  }
  else
  {
    $con=mysqli_connect("localhost","zocaryzg","Encender@24/7","zocaryzg_videobook") or die("ERROR IN CONNECTION");
	//$con1=mysqli_connect("localhost","zocaryzg","Encender@24/7","zocaryzg_testing") or die("ERROR IN CONNECTION");
  }

?>

