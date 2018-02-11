<?php include 'admin_header.php'; ?>
<?php
$q="select * from orders order by date desc,time desc";
$result=mysqli_query($con,$q)or die("e1");
$d="";
$t="";
$em="";
$cid="";
while($row=mysqli_fetch_array($result))
{ 
	if (!($d==$row['date']&&$t==$row['time'])) 
	{if (!($d==""&&$t==""&&$em==""&&$cid=="")) 
		{echo "<button>recieved</button></form>";
		echo "<div  style='clear:both;float:right '><button>cancel</button></div>";}
		$c=1;
	$em=$row['em'];
	$cid=$row['uid'];
	$d=$row['date'];
	$t=$row['time'];
	$p="select * from customer where c_id=$cid and em='$em'";
	$res=mysqli_query($con,$p);
	$ro=mysqli_fetch_array($res);
	$fn=$ro['fn'];
	$ln=$ro['ln'];
	$mob=$ro['mob'];
	$ad=$ro['address'];
	$identity=$ro['identity'];
	$balance=$ro['balance'];
	echo"<form><hr><div>$fn $ln  $identity $mob $ad <br> $d $t</div>";
	}
	else{
		$c=0;
	}
	echo "<table border='1'><tr>";
	echo "<td>".$pn=$row['pn']."</td>";
	echo "<td>".$pq=$row['pq']."</td>";
	echo "<td>".$oq=$row['oq']."</td>";
	echo "<td><input type='checkbox' checked>"."</td>";
	echo "</tr></table>";
}
if (!($d==""&&$t==""&&$em==""&&$cid=="")) 
{
	echo "</form>";
}
header("Refresh:300");
?>
