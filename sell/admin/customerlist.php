
<?php
include 'admin_header.php';
if(isset($_POST['submit']))
{
	$id=$_POST['id'];
	$q="delete from customer where c_id=$id ";
		
$result=mysqli_query($con, $q)or die("ERROR") ;

}
$q="select * from customer order by date desc ";
$result=mysqli_query($con,$q)or die("ERROR");
?>
<table border=1>
<tr>
	<th>FIRST NAME</th>
	<th>LAST NAME</th>
	<th>EMAIL</th>
	<th>GENDER</th>
	<th>DOB</th>
	<th>MOBILE</th>
	<th>IDENTITY</th>
	<th>CITY</th>
	<th>ADDRESS</th>
	<th>PIC</th>
	<th>BALANCE</th>
	<th>DATE</th>
	<th>ACTION</th>
	
	
</tr>
<?php
while($row=mysqli_fetch_array($result))
{
	echo "<tr>";
	echo "<tr><td>$row[0]</td>";
	echo "<td>$row[1]</td>";
	echo "<td>$row[2]</td>";
	echo "<td>$row[4]</td>";
	
	echo "<td>$row[5]</td>";
	echo "<td>$row[6]</td>";
	echo "<td>$row[7]</td>";
	echo "<td>$row[8]</td>";
	echo "<td>$row[9]</td>";
	echo "<td>$row[10]</td>";
	echo "<td>$row[11]</td>";
	echo "<td>$row[12]</td>";

	?>

	<td>
		<input type="button" value="<?php if($row[13]=='active') echo 'deactive';else echo 'active'; ?>"  
		onclick="active(this.value,this.id)" onload="pl(this.id)" id="<?php  echo $row[14]; ?>" >
		<form method="post">
			<input type="hidden" name="id" value="<?php echo $row[14]; ?>" >
			<input type="submit" name="submit" onclick="return confirm('are you want to delete');" value="DELETE">
		</form>
	   <button><a href="edit.php?id=<?php echo $row[14]; ?>">EDIT</a></button>

		
		
	</td>
	<?php

	echo "</tr>";
}
echo "</table>";
?>



<?php
include 'admin_footer.php';
 ?>
 <script type="text/javascript">
function active(val,aid){
           var req=new XMLHttpRequest();
           req.open("POST","active.php",true);
           req.setRequestHeader("Content-type","application/x-www-form-urlencoded");
           var data="active="+val+"&id="+aid;
           req.send(data);
      alert(val);
	   req.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById(aid).value = this.responseText;
                
            }
        };
	
	
}
 </script>
 <script type="text/javascript">
function pl(a){
if(document.getElementById(a).value =='active') 
                  {
                  	document.getElementById(a).style.color = "blue";
                  document.getElementById(a).style.backgroundColor = "red";

                   }
                   if(document.getElementById(a).value =='deactive') 
                  {
                  	document.getElementById(a).style.color = "red";
                  document.getElementById(a).style.backgroundColor = "blue";

                   }
}
</script>