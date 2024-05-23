<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="THESIS">
    <meta http-equiv="authors" content="GROUP 1 BSCS 3A">
    <title>INSERT | H.R.I.S.</title>
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet"/>
</head>
<body>
    
</body>
</html>
<?php
session_start();

$fullname = $_POST['full_name'];
$email = $_POST['email_address'];
$password = md5($_POST['user_password']);
$user_status = $_POST['user_status'];

if (!empty($fullname) || !empty($email) || !empty($password)) {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "hris_db";

    $conn = new mysqli($host, $user, $pass, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
    } else {
        $select = "SELECT full_name FROM login_user WHERE email_address = ? LIMIT 1";
        $insert = "INSERT INTO login_user (full_name, email_address, user_password, user_status) VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($select);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum == 0) {
            $stmt->close();

            $stmt = $conn->prepare($insert);
            $stmt->bind_param("ssss", $fullname, $email, $password, $user_status);
            $stmt->execute();

            echo "<script type='text/javascript'>alert('Sign up successfully!!');
                document.location='register.php'</script>";
        } else {
            echo "<script type='text/javascript'>alert('Email(s) have already been used, please try another.');
                document.location='register.php'</script>";
        }
        $stmt->close();
        $conn->close();
    }
} else {
    echo '<script>alert("All fields are required.")</script>';
    die();
}
?>

