<?php
include 'session.php';
$val=$_POST['active'];
$aid=$_POST['id'];
$con=mysqli_connect('localhost','root')or die();
mysqli_select_db($con,'sell');

	$q="update customer set active='$val' where c_id=$aid";

$result=mysqli_query($con, $q)or die() ;
if($result)
{
	if($val=="active")
		echo "deactive";
	else
		echo "active";
}
?>