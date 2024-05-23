<?php
 require_once("include/connection.php");
 $id = "";
 $name = "";
 $email = "";
 $pass = "";
 $status = "Employee";
 
 if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	// Get method: Show the data of the client

	if (!isset($_GET["id"])) {
	  header("location: view_user.php");
	  exit;
	} 

	$id = $_GET["id"];

	$sql = "SELECT * FROM login_user WHERE id=$id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

		if (!$row) {
			header("Location: view_user.php");
			exit;
		  }

		  $name = $row["full_name"];
		  $email = $row["email_address"];
		  $pass = $row["user_password"];

} else {

	$id = $_POST["id"];
	$name = $_POST["full_name"];
	$email = $_POST["email_address"];
	$pass = $_POST["user_password"];

	do {

		$sql = "UPDATE login_user
                  SET full_name = '$name', email_address = '$email', user_password = '$pass'
                  WHERE id = '$id'";

		$result = $conn->query($sql);

		if (!$result) {
  			echo "<script type='text/javascript'>alert('Error!');
  			document.location='edit_user.php'</script>";
		}

			echo "<script type='text/javascript'>alert('Employee data successfully edited!');
		  	document.location='view_user.php'</script>";
	} while (false);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $name ?>'s Edit Form | ADMIN</title>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/brands.css">
  	<!-- Bootstrap core CSS -->
  	<link href="css/bootstrap.min.css" rel="stylesheet">
  	<link rel="stylesheet"href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"crossorigin="anonymous">

  	<!-- Material Design Bootstrap -->
  	<link href="css/mdb.min.css" rel="stylesheet">
  	<!-- Your custom styles (optional) -->
  	<link href="css/style.css" rel="stylesheet">
  	<!-- for dana font style -->
  	<link href="https://fonts.cdnfonts.com/css/dana" rel="stylesheet">

	<style>
		@import url('https://fonts.cdnfonts.com/css/dana');
		body{
      		background-image: url("img/honey_im_subtle.png");
    	}
	</style>

</head>
<body>
	<br>
	<hr>
	<div class="modal-dialog modal-lg" role="document">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold"><i class="fas fa-user-edit"></i>  Edit <?php echo $name ?>'s' Information</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="goBack()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
			
			<div class="modal-body mx-3">
           		<div class="md-form mb-5">
            		<input type="hidden" class="form-control" name="id" value="<?php echo $id;?>">
        		</div>

				<div class="md-x mb-5">
          			<i class="fas fa-user prefix grey-text"></i>
          			<label data-error="wrong" data-success="right" for="orangeForm-name"> Name:</label>
					<input type="text" id="orangeForm-name" name="full_name" value="<?php echo $name;?>" class="form-control validate">
        		</div>

				<div class="md-x mb-5">
          			<i class="fas fa-envelope prefix grey-text"></i>
          			<label data-error="wrong" data-success="right" for="orangeForm-email"> Email:</label>
					<input type="email" id="orangeForm-email" name="email_address" value="<?php echo $email;?>" class="form-control validate">
        		</div>

				<div class="md-x mb-4">
          			<i class="fas fa-lock prefix grey-text"></i>
          			<label data-error="wrong" data-success="right" for="orangeForm-pass">Password:</label>
					<input type="password" id="orangeForm-pass" name="user_password" value="<?php echo $pass;?>" class="form-control validate">
        		</div>

				<div hidden class="md-form mb-4">
          			<i class="fas fa-user prefix grey-text"></i>
          			<input type="text" id="orangeForm-pass" name="status" value="<?php echo $status;?>" class="form-control validate" readonly="">
          			<label data-error="wrong" data-success="right" for="orangeForm-pass">Status:</label>
        		</div>
			</div>
			<div class="modal-footer d-flex justify-content-center">
        		<button class="btn btn-primary">UPDATE</button>
      		</div>	
        </div>
    </form>
	</div>



<script>
    function goBack() {
        window.location.href = 'view_user.php';
    }
</script>

	
</body>
</html>