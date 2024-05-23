<?php 
$conn = mysqli_connect("localhost","root","","hris_db");

if(!$conn){
	die("Connection error: " . mysqli_connect_error());	
}
?>