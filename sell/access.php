<?php include 'header.php';?>
<?php include 'session.php';?>
<?php include 'content.php'; ?>
<?php
$eem=$_SESSION['em'];
$eem=str_ireplace(array('@','.'),array('$','_'),$eem);
?>
<?php
$q="select * from product";
$result=mysqli_query($con,$q);
if (isset($_POST['submit'])) 
{
if (!isset($_POST['checkbox'] )&& !isset($_POST['qs'] )){
	echo"<script>alert('please select something to order')</script>";
}else{
	$pids=$_POST['checkbox'];
	$qs=$_POST['q'];
	$c=count($pids);
	$c2=count($qs);
	$wrong=1;
	for ($j=0;$j<$c;$j++) 
	{
	if(isset($pids[$j]) && !$qs[$pids[$j]-1]>0){$wrong=0;}}
	if($wrong==0){echo "<script>alert('please check order')</script>";}
	else{
	for ($i=0;$i<$c;$i++) 
	{
	if(isset($pids[$i]) && $qs[$pids[$i]-1]>0){
		
	$pid=$pids[$i];
	$oq=$qs[$pid-1];

	$q4= "select * from product where pid=$pid";
	$result4=mysqli_query($con,$q4)or die("THERE IS AN ERROR");
	$row4=mysqli_fetch_array($result4);
	date_default_timezone_set("Asia/Kolkata");
	$q5="insert into ".$_SESSION['id'].$eem." values(0,'".date('Y-m-d')."','".date('H:i:sa')."','".$row4['pn']."','".$row4['pq']."',".$oq.",".$row4['pr'].",".$oq*$row4['pr'].")";
    $q6="pic,fn,ln,identity,mobile,address,c_id,pn,pq,oq,date,time";
    $q6="insert into orders values('".date('Y-m-d')."','".date('H:i:sa')."','".$row4['pn']."','".$row4['pq']."',".$oq.",".$_SESSION['id'].",'".$_SESSION['em']."')";
    $result5=mysqli_query($con,$q5)or die($q5);//
    $result6=mysqli_query($con,$q6)or die($q6);//
	
	}
	}}
//	echo "<script>alert('order placed')</script>";

}}
?>
<form action="" method="POST">
<table border="1">
	<tr>
		<th>serial no</th>
		<th>name</th>
		<th>description</th>
		<th>quantity</th>
		<th>rate</th>
		<th>order how many</th>
		<th>select</th>
	</tr>
<?php
$j=0;
while($row=mysqli_fetch_array($result)){
$x1=$row['pid'];
$x2=$row['pn'];
$x3=$row['pd'];
$x4=$row['pq'];
$x5=$row['pr'];
$j++;?>
<tr>
	<td><?php echo $j ;?></td>
	<td><?php echo $x2; ?></td>
	<td><?php echo $x3 ;?></td>
	<td><?php echo $x4; ?></td>
	<td><?php echo $x5; ?></td>
	<td>
		<input type="number" name="q[]"  min="1" max="20">
	</td>
	<td>
		<input type="checkbox" name="checkbox[]"  id="checkbox[]" value="<?php echo $x1 ;?>" >
	</td>
</tr>
<?php } ?>
</table>
<input type="submit" name="submit" value="ORDER" onclick="return confirm('are you want to order')"></form>


    
    

<?php
$q1="select * from ".$_SESSION['id'].$eem;
$result1=mysqli_query($con,$q1)or die($q1);
$cpd=mysqli_fetch_array($result1);

$q2="select * from customer where c_id=".$_SESSION['id'];
$result2=mysqli_query($con,$q2);
$cd=mysqli_fetch_array($result2);
$bal=$cd['balance'];
?>
your total balance:
<input type=text style="width:40px" value="<?php echo $bal ; ?>" readonly /><br>
<!-- your total teacup: -->
<!-- <input type=text style="width:40px" value="" readonly /> -->
<?php 
mysqli_close($con);
 ?>
<?php include 'footer.php';?>

