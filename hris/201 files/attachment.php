<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Attachments | 201 Files</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/brands.css">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/mdb.min.css" rel="stylesheet">
  <style>
    @import url('https://fonts.cdnfonts.com/css/dana');
    body {
      font-family: sans-serif;
      background-image: url("../ADMIN/img/honey_im_subtle.png");
      background-color: silver;
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
    h1 {
            font-weight: bold;  
            margin-top: 10px;
            margin-left: 275px;
        }
    #user_btn {
    padding: 8px 16px; 
    border: 2px solid transparent; 
    }
    #user_btn a:hover{
      cursor: pointer;
      color: black;
      border: 2px black solid;
      font-weight: bold;
      font-size: 1rem;
    }
    #hr {
      padding: 3rem;
    }
  </style>
</head>

<body>
  <div class="d-flex justify-content-between px-3 py-2 border-bottom">
    <div class="d-flex align-items-center">
      <a href="../ADMIN/dashboard.php"><button>Back to Dashboard</button></a>
      <a href="index.php"><button>Back to 201 Files</button></a>
      <h1 class="text-center"><strong>ATTACHMENTS</strong></h1>
    </div>

    <div class="d-flex flex-wrap gap-2">
      <a id="form201" href="form201.php"><button>201 Register Form</button></a>
      </div>
      
  </div>
  <br>
  <hr>
  <?php
  require_once("../include/connection.php");

  // Fetch distinct values from the 'UPLOADER' column in the 'upload_files' table
  $sql = "SELECT DISTINCT UPLOADER FROM upload_files";
  $result = $conn->query($sql);

  if ($result) {
    if ($result->num_rows > 0) {
      $uniqueUploaders = array(); // To store unique uploader names

      while ($row = $result->fetch_assoc()) {
        $uploader = $row['UPLOADER'];

        // Check if the uploader name is not already added to the list
        if (!in_array($uploader, $uniqueUploaders)) {
          echo '<div id="user_btn" class="d-flex justify-content-center mt-0"><a href="user_files.php?uploader=' . urlencode($uploader) . '" class="btn btn-primary">' . $uploader . '</a></div>';


          $uniqueUploaders[] = $uploader; // Add the uploader name to the list
        }
      }
    } else {
      echo "No data available in the 'upload_files' table.";
    }
  } else {
    echo "Error executing the query: " . $conn->error;
  }
  
  // Close the database connection
  $conn->close();
  ?>
  <br>
  <hr id="hr">
</body>
</html>
