<?php
$con=mysqli_connect('localhost','root')or die("conection probleam");
mysqli_select_db($con,'sell');
if (mysqli_connect_errno($con)) {//it return 0 in succesful conection
 echo "Database connection failed!: " . mysqli_connect_error();}
?>