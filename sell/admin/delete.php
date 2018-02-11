<?php
$id=$_GET['id'];
$con=mysqli_connect('localhost','root')or die();
mysqli_select_db($con,'sell');
$o="select * from customer where c_id=$id ";
$result=mysqli_query($con, $q)or die() ;
$row=mysql_fetch_array($result);
$tn=$row['em'];
$tn=str_ireplace(array('@','.'),array('$','_'), $tn).$id;
$p="drop table".$tn;
$result=mysqli_query($con, $p)or die() ;
$q="delete from customer where c_id=$id ";
$result=mysqli_query($con, $q)or die() ;
header("Location:customerlist.php");
 ?>