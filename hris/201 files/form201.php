<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Form | 201 Files</title>
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
            margin-left: 100px;
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</head>
<body>
<div class="d-flex justify-content-between px-3 py-2 border-bottom">
  <div class="d-flex align-items-center">
  <a href="../ADMIN/dashboard.php"><button>Back to Dashboard</button></a>
    <a href="index.php"><button>Back to 201 Files</button></a>
    <h1 class="text-center"><strong>PERSONAL INFORMATION / WORK</strong></h1>
  </div>

  <div class="d-flex flex-wrap gap-2">
    <!-- <a id="form201" href="form201.php"><button class="btn btn-primary">201 Register Form</button></a> -->
    <a id="empFile" href="attachment.php"><button>Attachments</button></a>
  </div>
</div>
<br>
<form action="input_form.php" method="POST" encytpe="multipart/form-data">
<div class="container" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold"><i class="fas fa-user-plus"></i> Employee</h4>
        
      </div>
      <div class="modal-body mx-5">
           <div class="md-form mb-15">

        </div>

        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Employee ID:</label required><br><br>
          <input type="number" id="orangeForm-name" name="empId" class="form-control validate">
          
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">First Name:</label required><br><br>
          <input type="text" id="orangeForm-name" name="fname" class="form-control validate">
          
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Last Name:</label required><br><br>
          <input type="text" id="orangeForm-name" name="lname" class="form-control validate">
          
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Gender:</label required><br><br>
          <input type="text" id="orangeForm-name" name="gender" class="form-control validate">
          
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Birthdate:</label required><br><br>
          <input type="text" id="orangeForm-name" name="bdate" class="form-control validate">
          
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Contact Number:</label required><br><br>
          <input type="number" id="orangeForm-name" name="contact" class="form-control validate">
          
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Email:</label required><br><br>
          <input type="email" id="orangeForm-name" name="email" class="form-control validate">
          
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Address:</label required><br><br>
          <input type="text" name="address" class="form-control validate">
          
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Department:</label required><br><br>
          <input type="text" id="orangeForm-name" name="dept" class="form-control validate">
          
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Job Position:</label required><br><br>
          <input type="text" id="orangeForm-name" name="position" class="form-control validate">
          
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Rank:</label required><br><br>
          <input type="text" id="orangeForm-name" name="rank" class="form-control validate">
          
        </div>

        <div class="modal-footer d-flex justify-content-center">
            <button class="btn btn-info" name="add201">SUBMIT</button>
        </div>
    </div>
  </div>
</div>
</form>
</body>
</html>