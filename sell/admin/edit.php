<?php
include 'admin_header.php';
$id=$_GET['id'];

	$q="select * from customer where c_id=$id ";
$result=mysqli_query($con, $q)or die() ;
$row=mysqli_fetch_array($result);

 ?>
 <form  method="post" enctype="multipart/form-data">
	<center>
		<table id="signup"  width="500px" align="center" border="0" cellpadding="4px" cellspacing="8px" >
		
			<caption><h2>Registration form</h2></caption>
		<tr>	
			<td>FIRST NAME*</td>
			<td><input type="text" name="fn" autocomplete="off" required value="<?php echo $row[0];?>"></td>
		</tr>	
		<tr>	
			<td>LAST NAME*</td>
			<td><input type="text" name="ln" required value="<?php echo $row[1] ;?>"></td>
		</tr>
		
		<tr>	
			<td>EMAIL*</td>
			<td><input type="email" name="em" required value="<?php echo $row[2] ;?>"></td>
		</tr>	
			
		<tr>	
			<td>GENDER</td>
			<td><span>MALE:</span>
				<input type="radio" name="gender" value="male" <?php  if($row[4]=='male') {echo "checked";}?>><br>
				<span>FEMALE:</span>
				<input type="radio" name="gender" value="female"  <?php  if($row[4]=='female') {echo "checked";} ?> ></span>
			</td>
		</tr>
		<tr>	
			<td><span>Date of birth:</span></td>
			<td>	<input type="date" name="dob" min="1900-01-01" max="<?php echo date('Y-m-d'); ?>" value="<?php echo $row[5] ;?>">
			</td>
		</tr>
		<tr>	
			<td><span>Mobile*</span></td>
			<td>	<input type="tel" name="mob" maxlength="10" minlength="10" placeholder="10 digit number" required value="<?php echo $row[6] ;?>">
			</td>
		</tr>
		<tr>	
			<td>IDENTITY* </td>
			<td><textarea name="identity" rows="2" placeholder="By  which we can recognize you" value=""><?php echo $row[7] ;?></textarea>
			</td>
		</tr>
		<tr>	
			<td>CITY*</td>
			<td><input list="city" name="city" value="<?php echo $row[8];?>">                         
				<datalist  id="city" >
				<option>INDORE</option>
				<option>BHOPAL</option>
				<option>GWALIAR</option>
			    </datalist>
			</td>
		</tr>
		<tr>	
			<td>ADDRESS* </td>
			<td><textarea name="address" rows="2" placeholder="where we would deliver our products" value=""><?php echo $row[9] ;?></textarea>
			</td>
		</tr>
		
		<tr>	
			<td>your clear Picture by which we can recognize you</td>
			<td><img src="../pic/<?php echo $row[10] ;?>" width="100px">
				<br>
				<input type="file" accept="image/*" name="pic" value="../pic/<?php echo $row[10]; ?>">
			</td>
		</tr>
		<tr>	
			<td>date of customer</td>
			<td><input type="date" name="dob" min="1900-01-01" max="<?php echo date('Y-m-d'); ?>" value="<?php echo $row[12] ;?>"></td>
		</tr>
        <tr>	
        	<td><input type="reset" name="reset"></td>
	        <td><input type="submit" name="submit" onclick="return confirm('are you sure to update data');" ></td>
		</tr>
	    </table>
    </center>
</form>
<?php 
if(isset($_POST['submit']))
{
	$x1=$_POST['fn'];
	$x2=$_POST['ln'];
	$x3=$_POST['em'];
	// $x4=$_POST['pass'];
	$x5=$_POST['gender'];
	$x6=$_POST['dob'];
	$x7=$_POST['mob'];
	$x8=$_POST['identity'];
	$x10=$_POST['city'];
	$x11=$_POST['address'];
	$x9=$_FILES['pic']['name'];
	$tn=$_FILES['pic']['tmp_name'];
	$target="../pic/".$x9;
	$d=date('Y-m-d');

	$q="update customer set fn='$x1',ln='$x2',em='$x3',gender='$x5',dob='$x6',mob='$x7',identity='$x8',city='$x10',address='$x11',date='$d' where c_id=$id ";
mysqli_query($con,$q)or die("ERROR");
if(move_uploaded_file($tn,$target))
	{
    $q="update customer set pic='$x9' where c_id=$id ";
       mysqli_query($con,$q)or die("EROR");
	}
?>
<script type="text/javascript">
 alert("data updated")
 </script>
<?php
header("Refresh:0;");}

 ?>