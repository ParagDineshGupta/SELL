<?php
include 'admin_header.php';
$q="select * from product order by pn desc";
$result=mysqli_query($con,$q)or die("ERROR");
?>
	<table style="padding:20px" border="1" >
		<tr>
			<td><b>S.No.</b></td>
			<td><b>Product Name</b></td>
			<td><b>Quantity</b></td>
			<td><b>Rate</b></td>
			<td><b>Product Description</b></td>
			<td><b>Action</b></td>
		</tr>
<?php
$i=1;		
while($row=mysqli_fetch_array($result))
{  ?>
	<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $row['pn']; ?></td>
			<td><?php echo $row['pq']; ?></td>
			<td><?php echo $row['pr']; ?> Rs</td>
			<td><?php echo $row['pd']; ?></td>
			<td>EDIT DELETE AVELABLE</td>
		</tr>
<?php $i++;}
  ?>


	</table>
</form>
