<?php 
$conn = mysqli_connect("localhost","usrconvenios","conv3usr","bdconvenios");

if(!$conn){
	die("Connection error: " . mysqli_connect_error());	
}
?>