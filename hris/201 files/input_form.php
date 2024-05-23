<?php

// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hris_db";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Check if form is submitted
  if (isset($_POST['add201'])) {
    // Get form data
    $empId = $_POST['empId'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $bdate = $_POST['bdate'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $dept = $_POST['dept'];
    $position = $_POST['position'];
    $rank = $_POST['rank'];

    // Sanitize and validate inputs (optional, add more as needed)
    $empId = filter_var($empId, FILTER_SANITIZE_NUMBER_INT);
    $fname = filter_var($fname, FILTER_SANITIZE_STRING);
    $lname = filter_var($lname, FILTER_SANITIZE_STRING);

    do {
        if (empty($empId) || empty($fname) || empty($lname) || empty($gender) || empty($bdate) || empty($contact) || empty($email) || empty($address) ||  empty($dept) || empty($position) || empty($rank)) {
            echo "<script type='text/javascript'>alert('All the fields are required!');
					  document.location='form201.php'</script>";
            break;
        }
        echo "<script type='text/javascript'>alert('Employee data inserted successfully!');
					document.location='index.php'</script>";
    // Prepare and execute SQL query
    $sql = "INSERT INTO employees (employee_id, first_name, last_name, gender, birth_date, contact, email, address, department, position, rank) VALUES (:empId, :fname, :lname, :gender, :bdate, :contact, :email, :address, :dept, :position, :rank)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':empId', $empId);
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':lname', $lname);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':bdate', $bdate);
    $stmt->bindParam(':contact', $contact);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':dept', $dept);
    $stmt->bindParam(':position', $position);
    $stmt->bindParam(':rank', $rank);
    $stmt->execute();

    }while(false);

  }

} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$conn = null;

?>
