<?php
$date1=date_create("2020-06-30");
$date2=date_create(date('Y-m-d'));
$diff=date_diff($date1,$date2);
 $diff->format("%a");
if($diff->format("%a") > 367)
{
    echo "expired purchased course";
}
else
{
    echo "purchased course";
}





?>



