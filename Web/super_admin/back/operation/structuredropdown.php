<?php
include("../../../db/connect.php");
if(isset($_POST['datapost']))
{
$id  =  mysqli_real_escape_string($con,$_POST['datapost']);
?>
    <option value="">--Select--</option>
<?php
$q = "select * from program_data where stream_id ='$id'";
$result = mysqli_query($con,$q);
while($rows = mysqli_fetch_array($result))
            
      {
      ?>
				<option value="<?php echo $rows['pr_id'];?>"><?php echo $rows['program_name'];?></option>
	<?php
		}
}

elseif(isset($_POST['datapost1']))
{
$id  =  mysqli_real_escape_string($con,$_POST['datapost1']);
?>
    <option value="">--Select--</option>
<?php
$q = "select * from branch_data where pr_id ='$id'";
$result = mysqli_query($con,$q);
while($rows = mysqli_fetch_array($result))
            
      {
      ?>
				<option value="<?php echo $rows['b_id'];?>"><?php echo $rows['b_name'];?></option>
	<?php
		}
}

elseif(isset($_POST['datapost2']))
{
$id  =  mysqli_real_escape_string($con,$_POST['datapost2']);
?>
    <option value="">--Select--</option>
<?php
$q = "select * from term_data where b_id ='$id'";
$result = mysqli_query($con,$q);
while($rows = mysqli_fetch_array($result))
            
      {
      ?>
				<option value="<?php echo $rows['term_id'];?>"><?php echo $rows['term_name']; ?> / <?php echo $rows['med']; ?></option>
	<?php
		}
}
?>

