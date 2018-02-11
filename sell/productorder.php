<?php
include 'header.php';
include 'session.php';

echo $_SESSION['ty'];
if($_SESSION['ty']=='customer'){
$cid=$_SESSION['id'];
$q="select * from items";
$result=mysqli_query($con,$q);
// $nr=mysqli_num_rows($result);
if (isset($_GET['submit'])) 
{
// foreach($_GET as $x=>$value)
	$checkbox=$_GET['checkbox'];
	$q=$_GET['q'];
	$c=count($checkbox);
	for ($i=0; $i < $c; $i++) 
	{ 
	echo $pid=$checkbox[$i];
	echo $v=$q[$i];
	
	$q="insert into iorder(item,detail,id)values($pid,'$v',$cid)";
echo $result2=mysqli_query($con,$q);
echo "<br>";
	}
	
}
?>
<form action="" method="GET">
<table border="1">
	<tr>
		<th>Product id</th>
		<th>name</th>
		<th>description</th>
		<th>available quantity</th>
		<th>order quantity</th>
		<th>select</th>
	</tr>
<?php
$j=1;
while($row=mysqli_fetch_array($result)){
$x1=$row['iid'];
$x2=$row['name'];
$x3=$row['idesc'];
$x4=$row['quantity'];
// echo "<input type=hidden name="."h".$j." ".">";
$j++;?>
<tr>
	<td><?php echo $x1 ;?></td>
	<td><?php echo $x2; ?></td>
	<td><?php echo $x3 ;?></td>
	<td><?php echo $x4; ?></td>
	<td>
		<input type="number" name="q[]" >
	</td>
	<td>
		<input type="checkbox" name="checkbox[]" id="checkbox[]" value="<?php echo $x1 ;?>" >
	</td>
</tr>
<?php } ?>
</table>
<input type="submit" name="submit"></form> <?php }?>