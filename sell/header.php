<?php 
session_start();
include 'dbcon.php';
?>

<html>
<head>
	<title>ICH</title>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
	<div id="header">
		<span>
			<img id="logo" src="pic/logo.jpg" >
		</span> 
		<span>
			<center>
			<h1>INDIAN COFFI HOUSE</h1>
		     </center>
		 </span>
		 
				<?php 
		if (isset($_SESSION['id'])) 
		{
		$p=$_SESSION['id'];
		$fq="select * from customer where c_id='$p' ";
		$fresult=mysqli_query($con,$fq); 
		$row=mysqli_fetch_array($fresult);
		$pic=$row['pic'];
		$name=$row['fn'];
		$em=$row['em'];
		?>
		<span>
		<a id="pic" target="_new" href="pic/<?php echo $pic;  ?>">
		<img  height="120px"   src="pic/<?php echo $pic;  ?>" alt="your pic">
		</a><br>
		<?php  } 
              ?>
         </span>
		<div id="nav">
			<ul>
				<?php if (!isset($_SESSION['id'])) {?>
				<li><a href="http://localhost/sell/">Home</a></li>
				<li><a href="about.php">About Us</a></li>
				<li><a href="contactus.php">Contact Us</a></li>
				<li><a href="login.php">login</a></li>
				<li><a href="signup.php">Sign Up</a></li>
			
				<?php }else{ ?>
				<li><a href="http://localhost/sell/">Home</a></li>
				<li><a href="about.php">About Us</a></li>
				<li><a href="contactus.php">Contact Us</a></li>
				<li><a href="logout.php">Logout</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>