<?php
    if(!isset($_SESSION['e_email']))
    {
        echo "<script>window.location.href='back/function/logout.php';</script>";
        exit;
    }
?>