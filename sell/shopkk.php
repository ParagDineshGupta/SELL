
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>MultiSelect Dialog Box parag</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="./cssjs/example-1.css">
		<script type="application/javascript" src="cssjs/jquery-2.2.2.min.js"></script>
		<script type="application/javascript" src="cssjs/m-select-d-box.js"></script>
		<script type="application/javascript" src="cssjs/ex-1-custom-appear.js"></script>
		<script type="application/javascript" src="cssjs/example-1.js"></script>
	</head>
<body>


	


<div class="m-select-d-box m-select-d-box_hidden">
<ul class="m-select-d-box__list-container">
	<li class="m-select-d-box__list-item" data-msdbid="0">alpha</li><li class="m-select-d-box__list-item" data-msdbid="1">beta</li><li class="m-select-d-box__list-item" data-msdbid="2">gamma</li><li class="m-select-d-box__list-item" data-msdbid="3">delta</li><li class="m-select-d-box__list-item" data-msdbid="4">epsilon</li><li class="m-select-d-box__list-item" data-msdbid="5">zeta</li><li class="m-select-d-box__list-item" data-msdbid="6">eta</li><li class="m-select-d-box__list-item" data-msdbid="7">theta</li><li class="m-select-d-box__list-item" data-msdbid="8">iota</li><li class="m-select-d-box__list-item" data-msdbid="9">kappa</li><li class="m-select-d-box__list-item" data-msdbid="10">lambda</li><li class="m-select-d-box__list-item" data-msdbid="11">mu</li><li class="m-select-d-box__list-item" data-msdbid="12">nu</li><li class="m-select-d-box__list-item" data-msdbid="13">xi</li><li class="m-select-d-box__list-item" data-msdbid="14">omicron</li><li class="m-select-d-box__list-item" data-msdbid="15">pi</li><li class="m-select-d-box__list-item" data-msdbid="16">rho</li><li class="m-select-d-box__list-item" data-msdbid="17">sigma</li><li class="m-select-d-box__list-item" data-msdbid="18">tau</li><li class="m-select-d-box__list-item" data-msdbid="19">upsilon</li><li class="m-select-d-box__list-item" data-msdbid="20">phi</li><li class="m-select-d-box__list-item" data-msdbid="21">chi</li><li class="m-select-d-box__list-item" data-msdbid="22">psi</li><li class="m-select-d-box__list-item" data-msdbid="23">omega</li></ul>
</div>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<?php //include("header.php"); ?>
<?php //include("content.php"); ?>
<?php  if(isset($_POST['submit']))
{
	$x1=$_POST['sn'];
	$x2=$_POST['skn'];
	$x3=$_POST['em'];
	$x4=$_POST['mob'];
	$x5=$_POST['amob'];
	$x6=$_POST['address'];
	$x7=$_POST['st'];
	$x8=$_POST['lod'];
     $d=date('Y-m-d H:i:s');

	$q="insert into shopkeeper values
	('$x1','$x2','$x3','$x4','$x5','$x6','$x7','$x8','','$d','','')";
$result=mysqli_query($con,$q)or die("ERROR");
if($result==1){
	?>
<script type="text/javascript">
alert("your information saved");
</script>
<?php
	mysqli_close($con);
	?>
	<script type="text/javascript">
alert("Please Contact  With Us Once");
</script>
<?php
}
?>

<?php

header("Location:login.php");
}
?>
<form action="#" method="post" >
	<center>
		<table id="signup"  width="500px" align="center" border="0" cellpadding="4px" cellspacing="8px" id="reg">
		
			<caption><h2>Register Your Shop</h2></caption>
		<tr>	
			<td>SHOPKEEPER NAME*</td>
			<td><input type="text" name="skn" autocomplete="off" placeholder="proprietor name" required></td>
		</tr>	
		<tr>	
			<td>SHOP NAME*</td>
			<td><input type="text" name="sn" required placeholder="Ex.Shri Ram Kirana Store " ></td>
		</tr>
		<tr>	
			<td>ADDRESS* </td>
			<td><textarea name="address" rows="2" placeholder=""></textarea>
			</td>
		</tr>
		<tr>	
			<td>EMAIL*</td>
			<td><input type="email" name="em" required></td>
		</tr>	
		<tr>	
			<td><span>MOBILE*</span></td>
			<td>	<input type="tel" name="mob" maxlength="10" minlength="10" placeholder="10 digit number" required>
			</td>
		</tr>
		<tr>	
			<td><span>ALTERNATE MOBILE*</span></td>
			<td>	<input type="tel" name="amob" maxlength="10" minlength="10" placeholder="10 digit number" required>
			</td>
		</tr>
		
		<tr>	
			<td>Shop Type*</td>
			<td><select name="st" multiple>
  <option value="gr" selected>Grossary</option>
  <option value="fo">Food</option>
  <option value="cl" selected>cloths</option>
  <option value="bu" >buityparlar</option>
</select>
			</td>
		</tr>

<tr>	
			<td><span>Locations of delivery</span></td>
			<td>	
				<div class=" std-plate_thick-pad std-plate_rounded" style="display:inline-block;">
		<table class="form-table form-table_sep" style="width:420px;height:20px;">

			<tbody>
			
			<tr>
				
				<td>
					<label style="width:100%;" name="lod" id="msdb-0" class=" m-select-d-box__control_type_spec">
						<div class="m-select-d-box__selected-holder"></div>
						<input class="m-select-d-box__control-input" placeholder="Locations of delivery"></label>
				</td>
			</tr>

		</tbody></table>
	</div>
			</td>
		</tr>

        <tr>	
        	<td><input type="reset" name="reset"></td>
	        <td><input type="submit" name="submit"></td>
		</tr>
	    </table>
    </center>
  
</form>

</body>