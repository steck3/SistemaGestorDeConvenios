<?php 
$conn = mysqli_connect("192.168.200.120","usrconvenios","conv3usr","bdconvenios");

if(!$conn){
	die("Connection error: " . mysqli_connect_error());	
}
?>