<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="THESIS">
    <meta http-equiv="authors" content="GROUP 1 BSCS 3A">
    <title>ADMIN INSERT | H.R.I.S.</title>
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet"/>
</head>
<body>
    
</body>
</html>
<?php 

    $fullname = $_POST[('full_name')];
    $email = $_POST[('admin_user')];
    $password = $_POST[('admin_password')];
    $user_status = $_POST[('admin_status')];

    if ( !empty($fullname) || !empty($username) || !empty($email) || !empty($password)) {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "hris_db";

        $conn = new mysqli ($host, $user, $pass, $dbname);

        if(mysqli_connect_error()) {
            die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
        }else {
            $select = "SELECT admin_user FROM admin_login WHERE admin_user = ? Limit 1";
            $insert = "INSERT INTO admin_login (admin_name, admin_user, admin_password, admin_status) VALUES(?, ?, ?, ?)";

            // prepare statement
            $stmt = $conn->prepare($select);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($email);
            $stmt->store_result();
            $rnum = $stmt->num_rows;

            if ($rnum == 0) {
                $stmt->close();

                $stmt = $conn->prepare($insert);
                $stmt->bind_param("ssss", $fullname, $email, $password, $user_status);
                $stmt->execute();
                echo "<script type='text/javascript'>alert('New admin added successfully!!');
					document.location='admin_register.php'</script>";
            }else {
                echo "<script type='text/javascript'>alert('Email(s) have already been used, please try another.');
					document.location='admin_register.php'</script>";
            }
            $stmt->close();
            $conn->close();
    
        }
    }else {
        echo '<script>alert("All field are required.")</script>';
        die();
    }
?>