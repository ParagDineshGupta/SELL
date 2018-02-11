<?php
include '../dbcon.php';
session_start();
 ?>
<html>
<head>
	<title>admin section</title>
	<style type="text/css">
	div{
		background-color: yellow;
		width: 50%;
		height: 100%;
		
		padding: 50px;

	}
	div #fd{
		background-color: red;
	
		padding: 0px;
		padding-top: 30px; 
		border: 3px solid white;
		 box-sizing: border-box;
		 min-width: 200px;
		color: yellow;
		height:auto;
		
	}

	input{
		margin: 10px;
		display: block;

	}
	body{
		background-color: black;
	}

	</style>
</head>
<body>
	<center>
	
<div>
	<h1>ADMIN PORTAL</h1>
	<div id="fd">
	<form method="post">
		<span>Admin Name</span>
		<input type="text" name="name" autocomplete="off"><br>
		<span>Password</span>
		<input type="password" name="pass" maxlength="10"><br>
		<input type="submit" name="submit">
	</form>
	<?php 
if(isset($_POST['submit']))
  { $n=$_POST['name'];
     $p=$_POST['pass'];

  	$q="select * from admin_tbl where admin_name='$n' and password='$p' ";
  	$result=mysqli_query($con,$q)or die("AN ERROR OCCURED");
  	$row=mysqli_fetch_array($result);
  	$_SESSION['ad_id']=$row['admin_id'];
  	$_SESSION['ad_name']=$row['admin_name'];
  	$_SESSION['ad_pass']=$row['password'];
if (isset($_SESSION['ad_id'])) 
	header('Location:admin.php');
else
	echo "wrong password/user name";

   }

    ?>  
	</div>
</div>
    </center>
   
</body>
</html>
<?php  ?>