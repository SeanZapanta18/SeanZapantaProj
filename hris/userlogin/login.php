<?php 

require_once("../include/connection.php");

session_start();

if(isset($_POST["logIn"])){

  date_default_timezone_set("asia/manila");
  $date = date("M-d-Y h:i A",strtotime("+0 HOURS"));

 $username = mysqli_real_escape_string($conn, $_POST["email_address"]);  
 $password = mysqli_real_escape_string($conn, $_POST["user_password"]);

$result = mysqli_query($conn, "SELECT * FROM login_user WHERE email_address = '$username'");
$row = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result) > 0) {
	if($password == $row['user_password']){
		$_SESSION["login"] = true;
      	$_SESSION["id"] = $row["id"];
		echo "<script type='text/javascript'>alert('Log in successfully!!');
		document.location='../USER/home.php'</script>";
	}else{
		echo "<script type='text/javascript'>alert('Incorrect Email Address or Password, Please try again!');
		document.location='../login.html'</script>";
	}
}

$query=mysqli_query($conn,"SELECT * FROM  login_user WHERE email_address = '$username'")or die(mysqli_error($conn));
		$row=mysqli_fetch_array($query);
           $id=$row['id'];
           $user=$row['email_address'];

           $_SESSION["user_no"] = $row["id"];
		   $_SESSION["email_address"] = $row["email_address"];
    
           $counter=mysqli_num_rows($query);
            
		  	if ($counter < 0) {	
				  echo "<script type='text/javascript'>alert('Incorrect Email Address or Password, Please try again!');
				  document.location='../login.html'</script>";
			  	} 
				if (md5($password) != $row['user_password']) {
					echo "<script type='text/javascript'>alert('Incorrect Email Address or Password, Please try again!');
					document.location='../login.html'</script>";
				  }
				  if ($username != $row['email_address']) {
					echo "<script type='text/javascript'>alert('Incorrect Email Address or Password, Please try again!');
					document.location='../login.html'</script>";
				  }
				  else {
			  		if(password_verify($password, $row["user_password"])) {
				  		$_SESSION['email_address']=$id;	
			
                        if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
							 $ip = $_SERVER["HTTP_CLIENT_IP"];
							} elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
							 $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
							} else {
							 $ip = $_SERVER["REMOTE_ADDR"];
							}

							$host = gethostbyaddr($_SERVER['REMOTE_ADDR']);


                 
			  	echo "<script type='text/javascript'>document.location='../USER/home.php'</script>";  
		 }
	  }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="THESIS">
  <meta http-equiv="authors" content="GROUP 1 BSCS 3A">
	<title>USER LOG IN || H.R.I.S.</title>
</head>
<body>
	
</body>
</html>

