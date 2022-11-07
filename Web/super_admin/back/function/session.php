<?php
    if(!isset($_SESSION['sa_email']))
    {
        echo "<script>window.location.href='back/function/logout.php';</script>";
        exit;
    }
?>