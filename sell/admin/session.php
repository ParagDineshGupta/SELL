<?php 
session_start();
if (!isset($_SESSION['ad_id'])) 
{
	header('Location:index.php');
}
?>