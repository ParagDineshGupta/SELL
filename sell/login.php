<?php include("header.php"); ?>
<?php include("content.php"); ?>
<?php 
if (isset($_SESSION['id'])) {
	header("Location:access.php");
}
?>
<img src="pic/20170420112053.jpg">
<div id="fdiv">
	
<form  method="post">
	<table>
		<tr>
			<th>EMAIL:</th>
			<th><input type="text" name="em" /><br></th>
		</tr>
		<tr>
			<th>PASSWORD:</th>
			<th><input type="password" name="pass"/><br></th>
		</tr>
		<tr>
		    <th></th>
		     <td><input type="submit"  name="login" value="login"/> <br></td>	</tr>

		     <tr>

		     	<td><br>
		     	<br>
		     	<br>
		     	<br><a href="forget.php">FORGOTTON PASSWORD?/</a></td>
<td><br>
		     	<br>
		     	<br>
		     	<br><a href="change.php">CHANGE PASSWORD</a></td>
		     	<td><br>
		     	<br>
		     	<br>
		     	<br><a href="help.php">ANY HELP</a></td>
		     </tr>
	</table>
	
</form>

</div>

<?php

if(isset($_POST['login'])) 
{    
	$em=$_POST['em'];
	 $pass=$_POST['pass'];
		
	$q="SELECT * FROM `customer` WHERE `em`='$em' AND `pass`='$pass' ";
   $result=mysqli_query($con,$q)or die("error");
   $num=mysqli_num_rows($result);
	 if($num==1)
	 {

		$row=mysqli_fetch_array($result);
		$_SESSION['id']=$row['c_id'];
		$_SESSION['em']=$row['em'];
		$_SESSION['pass']=$row['pass'];

      
		header("Location:access.php");
	}
	else{
		echo "<p><center><b>wrong password/email</b></center></p>";
	}
}
?>


<?php include("footer.php"); ?>