<?php include("header.php"); ?>
<?php include("content.php"); ?>
<?php  if(isset($_POST['submit']))
{
	$x1=$_POST['fn'];
	$x2=$_POST['ln'];
	$x3=$_POST['em'];
	$x4=$_POST['pass'];
	$x5=$_POST['gender'];
	$x6=$_POST['dob'];
	$x7=$_POST['mob'];
	$x8=$_POST['identity'];
	$x10=$_POST['city'];
	$x11=$_POST['address'];
	$x9=$_FILES['pic']['name'];
	$tn=$_FILES['pic']['tmp_name'];
	$target="pic/".$x9;
	$d=date('Y-m-d');

	$q="insert into customer values
	('$x1','$x2','$x3','$x4','$x5','$x6','$x7','$x8','$x10','$x11','$x9','','$d','','')";
$result=mysqli_query($con,$q)or die("ERROR");
if($result==1){
move_uploaded_file($tn,$target);

$q="select c_id from customer where em='$x3' and pass='$x4'";
$result=mysqli_query($con,$q)or die("$q");
$row=mysqli_fetch_array($result);

$s=$row['c_id'].$x3;
$s=str_ireplace(array('@','.'),array('$','_'), $s);
	$q="create table $s(id int not null auto_increment primary key, date date,time time,product varchar(50),description varchar(50),quantity varchar(50),rs int,total varchar(50))";
	$result=mysqli_query($con,$q)or die("$q");
	mysqli_close($con);
}
?>
<script type="text/javascript">
alert("Plese Contact  With Us Once");
</script>
<?php

header("Location:login.php");
}
?>
<form action="#" method="post" enctype="multipart/form-data">
	<center>
		<table id="signup"  width="500px" align="center" border="0" cellpadding="4px" cellspacing="8px" id="reg">
		
			<caption><h2>Registration form</h2></caption>
		<tr>	
			<td>FIRST NAME*</td>
			<td><input type="text" name="fn" autocomplete="off" required></td>
		</tr>	
		<tr>	
			<td>LAST NAME*</td>
			<td><input type="text" name="ln" required ></td>
		</tr>
		
		<tr>	
			<td>EMAIL*</td>
			<td><input type="email" name="em" required></td>
		</tr>	
		<tr>	
			<td>PASSWORD*</td>
			<td><input type="password" name="pass" required placeholder="MAKE YOUR SECURE PASSWORD"></td>
		</tr>	
		<tr>	
			<td>GENDER</td>
			<td><span>MALE:</span>
				<input type="radio" name="gender" value="male" checked><br>
				<span>FEMALE:</span>
				<input type="radio" name="gender" value="female"></span>
			</td>
		</tr>
		<tr>	
			<td><span>Date of birth:</span></td>
			<td>	<input type="date" name="dob" min="1900-01-01" max="<?php echo date('Y-m-d'); ?>">
			</td>
		</tr>
		<tr>	
			<td><span>Mobile*</span></td>
			<td>	<input type="tel" name="mob" maxlength="10" minlength="10" placeholder="10 digit number" required>
			</td>
		</tr>
		<tr>	
			<td>IDENTITY* </td>
			<td><textarea name="identity" rows="2" placeholder="By  which we can recognize you"></textarea>
			</td>
		</tr>
		<tr>	
			<td>CITY*</td>
			<td><input list="city" name="city" >
				<datalist  id="city" >
				<option>INDORE</option>
				<option>BHOPAL</option>
				<option>GWALIAR</option>
			    </datalist>
			</td>
		</tr>
		<tr>	
			<td>ADDRESS* </td>
			<td><textarea name="address" rows="2" placeholder="where we would deliver our products"></textarea>
			</td>
		</tr>
		
		<tr>	
			<td>your clear Picture by which we can recognize you</td>
			<td><input type="file" name="pic" accept="image/*" placeholder="by which we can recognize you"></td>
		</tr>
        <tr>	
        	<td><input type="reset" name="reset"></td>
	        <td><input type="submit" name="submit"></td>
		</tr>
	    </table>
    </center>
  
</form>


<?php include("footer.php"); ?>