<?php

 require_once("include/connection.php");

$id = mysqli_real_escape_string($conn,$_GET['ID']);

$getimg="SELECT * FROM upload_files WHERE ID='".$id."'";
$imgresult=mysqli_query($conn,$getimg);
$data=mysqli_fetch_array($imgresult);

$path='../uploads/'.$data['NAME'];
@unlink($path);


mysqli_query($conn,"DELETE FROM upload_files WHERE ID='$id'")or die(mysql_error());
echo "<script type='text/javascript'>alert('Deleted Record!');document.location='view_userfile.php'</script>";
?>
