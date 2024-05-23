

<?php

require_once("../include/connection.php");

session_start();

if(isset($_POST["adminlog"])){


  date_default_timezone_set("asia/manila");
  $date = date("M-d-Y h:i A",strtotime("+0 HOURS"));

 $username = mysqli_real_escape_string($conn, $_POST["admin_user"]);  
 $password = mysqli_real_escape_string($conn, $_POST["admin_password"]);

 $result = mysqli_query($conn, "SELECT * FROM admin_login WHERE admin_user = '$username'");
 $row = mysqli_fetch_assoc($result);
 $_SESSION["admin_name"] = $row["admin_name"];
 if(mysqli_num_rows($result) > 0) {
	if(($password) == $row['admin_password']){
		$_SESSION["login"] = true;
      	$_SESSION["id"] = $row["id"];
		echo "<script type='text/javascript'>alert('Log in successfully!!');
		document.location='../ADMIN/dashboard.php'</script>";
	}
}

$query=mysqli_query($conn,"SELECT * FROM admin_login WHERE admin_user = '$username'")or die(mysqli_error($conn));
		$row=mysqli_fetch_array($query);
           $id= isset($row['id']) ? $row['id'] : "";
           $admin= isset($row['admin_user']) ? $row['admin_user'] : "";

		   $_SESSION["user_no"] = isset($row["id"]) ? $row['id'] : "";
           $_SESSION["admin_user"] = isset($row["admin_user"]) ? $row['admin_user'] : "";

           $counter=mysqli_num_rows($query);
            
		  	if ($counter == 0) 
			  {	
				  echo "<script type='text/javascript'>alert('Incorrect Email Address or Password, Please try again!');
				  document.location='index.html'</script>";
			  } 
			  else if (md5($password) != $row['admin_password']) {
				echo "<script type='text/javascript'>alert('Incorrect Email Address or Password, Please try again!');
				document.location='index.html'</script>";
			  }
			  else if ($username != $row['admin_user']) {
				echo "<script type='text/javascript'>alert('Incorrect Email Address or Password, Please try again!');
				document.location='index.html'</script>";
			  }
			  else
			  {
			  	if(password_verify($password, isset($row["admin_password"]) ? $row['admin_password'] : ""))  
                     {
				        $_SESSION['admin_user']=$id;	

				         if (!empty($_SERVER["HTTP_CLIENT_IP"]))
							{
							 $ip = $_SERVER["HTTP_CLIENT_IP"];
							}
							elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
							{
							 $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
							}
							else
							{
							 $ip = $_SERVER["REMOTE_ADDR"];
							}

							$host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    
                 
			  	echo "<script type='text/javascript'>document.location='dashboard.php'</script>";  
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
	<title>Go to Dashboard</title>
</head>
<body>
	
</body>
</html>