<?php
include 'session.php';
include '../dbcon.php';
// $adminname=$_SESSION['ad_name'];
 ?>
<html>
<head>
	<title>admin</title>
	<link rel="stylesheet" type="text/css" href="adminstyle.css">

</head>
<body>
<div id="header">
	<center>
		<h1> Shopkeeper </h1>
        <span><?php echo $_SESSION['ad_name']; ?></span>
    </center>

</div>
<div id="navi">
	<div class="setting">
	<button><a href="admin.php">HOME</a></button>
    </div>
	
	<div class="setting">
          <button>DASHBOARD</button>
	      <div class="cont">
	      	<a href="customerlist.php">Customer list</a>
	        <a href="order.php">Order list</a>
	        <a href="../signup.php?name=admin">Add New customer</a>
	        <a href="addproduct.php">Add New Product</a>
	        <a href="productlist.php">Product List</a>
	      </div>
	</div>



<div class="setting">
	<form action="admin_logout.php" >
	
	<input type="submit" value="LOGOUT" id="logout" style="padding:12px" >
	</form>
	</div>
	<button onclick="location.reload();">REFRESH</button>
</div>


<div id="lefty"></div>
	<div id="container">