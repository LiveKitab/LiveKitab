<?php
    if(!isset($_SESSION['c_email']))
    {
        echo "<script>window.location.href='back/function/logout.php';</script>";
        exit;
    }
?>

