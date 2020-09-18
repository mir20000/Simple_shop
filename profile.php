<?php 
session_start();
if($_SESSION['email']!=NULL) 
{  
	echo "<h6>Hi, ".$_SESSION['email']."</h6>"; 
 } 
?>