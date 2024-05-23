<?php
      
      $server = "localhost";
      $username = "root";
      $pass = "";
      $db = "hris_db";

      $conn = new mysqli($server, $username, $pass, $db);

      $id = "";
      $empid = "";
      $fname = "";
      $lname = "";
      $gender = "";
      $bdate = "";
      $contact = "";
      $email = "";
      $address = "";
      $dept = "";
      $position = "";
      $rank = "";

      if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // Get method: Show the data of the client

        if (!isset($_GET["id"])) {
          header("location: index.php");
          exit;
        } 

        $id = $_GET["id"];

        $sql = "SELECT * FROM employees WHERE id=$id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        if (!$row) {
          header("Location: index.php");
          exit;
        }

        $empid = $row["employee_id"];
        $fname = $row["first_name"];
        $lname = $row["last_name"];
        $gender = $row["gender"];
        $bdate = $row["birth_date"];
        $contact = $row["contact"];
        $email = $row["email"];
        $address = $row["address"];
        $dept = $row["department"];
        $position = $row["position"];
        $rank = $row["rank"];

      } else {
        // Post method : Update the data of the client

        $id = $_POST["id"];
        $empid = $_POST["empid"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $gender = $_POST["gender"];
        $bdate = $_POST["bdate"];
        $contact = $_POST["contact"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $dept = $_POST["dept"];
        $position = $_POST["position"];
        $rank = $_POST["rank"];

        do {

          $sql = "UPDATE employees
                  SET employee_id = '$empid', first_name = '$fname', last_name = '$lname', gender = '$gender', birth_date = '$bdate', contact = '$contact', email = '$email', address = '$address', department = '$dept', position = '$position', rank = '$rank'
                  WHERE id = '$id'";
          


          $result = $conn->query($sql);

          if (!$result) {
            echo "<script type='text/javascript'>alert('Error!');
            document.location='edit_form.php'</script>";
          }

          echo "<script type='text/javascript'>alert('Employee data successfully edited!');
					document.location='index.php'</script>";

        } while (false);

      }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee Form | 201 Files</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/brands.css">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.cdnfonts.com/css/dana');
        body{
            font-family: sans-serif;
            background-image: url("../ADMIN/img/honey_im_subtle.png");
            backgroundColor: silver;
        }

        h1 {
            font-weight: bold;  
            margin-top: 10px;
            margin-left: 150px;
        }
        
        button {
      background-color: #000066;
      color: white;
      padding: 10px;
      font-size: 20px;
      border-radius: 10px;
      border-color: gray;
      margin-left: 1rem;
    }

        button:hover {
      background-color: darkblue;
      cursor: pointer;
    }
    </style>
</head>
<body>

<div class="d-flex justify-content-between px-3 py-2 border-bottom">
  <div class="d-flex align-items-center">
    <a href="../ADMIN/dashboard.php"><button>Back to Dashboard</button></a>
    <a href="index.php"><button>Back to 201 Files</button></a>
    <h1 class="text-center"><strong>EDIT EMPLOYEE INFORMATION</strong></h1>
  </div>
  <div class="d-flex flex-wrap gap-2">
    <a id="form201" href="form201.php"><button>201 Register Form</button></a>
    <a id="empFile" href="attachment.php"><button>Attachments</button></a>
  </div>
</div>
<br>


<form method="POST" encytpe="multipart/form-data">
<div class="container" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold"><i class="fas fa-user-plus"></i> Employee</h4>
        
      </div>
      <div class="modal-body mx-5">
           <div class="md-form mb-15">

        </div>
        <input type="hidden" value="<?php echo $id; ?>" name="id">
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Employee ID:</label required><br><br>
          <input type="number" id="orangeForm-name" name="empid" value="<?php echo $empid; ?>" class="form-control validate">
          
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">First Name:</label required><br><br>
          <input type="text" id="orangeForm-name" name="fname" value="<?php echo $fname; ?>" class="form-control validate">
          
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Last Name:</label required><br><br>
          <input type="text" id="orangeForm-name" name="lname" value="<?php echo $lname; ?>" class="form-control validate">
          
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Gender:</label required><br><br>
          <input type="text" id="orangeForm-name" name="gender" value="<?php echo $gender; ?>" class="form-control validate">
          
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Birthdate:</label required><br><br>
          <input type="text" id="orangeForm-name" name="bdate" value="<?php echo $bdate; ?>" class="form-control validate">
          
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Contact Number:</label required><br><br>
          <input type="number" id="orangeForm-name" name="contact" value="<?php echo $contact; ?>" class="form-control validate">
          
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Email:</label required><br><br>
          <input type="email" id="orangeForm-name" name="email" value="<?php echo $email; ?>" class="form-control validate">
          
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Address:</label required><br><br>
          <input type="text" name="address" value="<?php echo $address; ?>" class="form-control validate">
          
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Department:</label required><br><br>
          <input type="text" id="orangeForm-name" name="dept" value="<?php echo $dept; ?>" class="form-control validate">
          
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Job Position:</label required><br><br>
          <input type="text" id="orangeForm-name" name="position" value="<?php echo $position; ?>" class="form-control validate">
          
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Rank:</label required><br><br>
          <input type="text" id="orangeForm-name" name="rank" value="<?php echo $rank; ?>" class="form-control validate">
          
        </div>

        <div class="modal-footer d-flex justify-content-center">
            <button class="btn btn-info">SUBMIT</button>
        </div>
    </div>
  </div>
</div>
</form>
</body>
</html>