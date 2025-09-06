<?php
include('include/config.php');
if(!empty($_POST["specilizationid"])) 
{

  $sql = mysqli_query($con, "SELECT doctors.*, users.fullName
  FROM doctors
  LEFT JOIN users ON doctors.id = users.id
  WHERE doctors.specilization = '" . mysqli_real_escape_string($con, $_POST['specilizationid']) . "'");

 
 ?>
 <option selected="selected">Select Doctor </option>
 <?php
 while($row=mysqli_fetch_array($sql))
 	{?>
  <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['fullName']); ?></option>
  <?php
}
}


if(!empty($_POST["doctor"])) 
{

 $sql=mysqli_query($con,"select docFees from doctors where id='".$_POST['doctor']."'");
 while($row=mysqli_fetch_array($sql))
 	{?>
 <option value="<?php echo htmlentities($row['docFees']); ?>"><?php echo htmlentities($row['docFees']); ?></option>
  <?php
}
}

?>

