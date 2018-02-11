<?php
include 'admin_header.php';
  ?>

<form  method="post" style="padding:20px">
	<table >
		<tr>
			<td><b>Product Name*:</b></td>
			<td><b><input type="text" name="name" required></b></td>
		</tr>
		<tr>
			<td><b>Quantity*:</b></td>
			<td><b><input type="text" name="quantity" required></b></td>
		</tr>
		<tr>
			<td><b>Rate*:</b></td>
			<td><b><input type="number" name="rate" required></b></td>
		</tr>
		<tr>
			<td><b>Product Description:</b></td>
			<td><b><textarea name="pdesc"></textarea></b></td>
		</tr>
		<tr>
			<td><b></b></td>
			<th><input type="submit" name="submit" value="ADD"></th>
		</tr>
	</table>
	
	
	

</form>

<?php
if(isset($_POST['submit'])) 
{$name=$_POST['name'];
$quantity=$_POST['quantity'];
$rate=$_POST['rate'];
$pdesc=$_POST['pdesc'];
 $q="insert into product values(0,'$name','$quantity',$rate,'$pdesc')";
 $result=mysqli_query($con,$q)or die("ERROR");
if($result){?>
<script>alert("product is added");</script>
<?php  }}		?>
