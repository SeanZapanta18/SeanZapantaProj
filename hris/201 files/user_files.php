<?php
require_once("../include/connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET["uploader"])) {
    $uploader = $_GET["uploader"];

    // Prepared statement to prevent SQL injection
    $sql = "SELECT * FROM upload_files WHERE UPLOADER = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $uploader);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result) {
        echo "Error executing the query: " . $conn->error;
        exit; // Terminate script if there's an error
    }

    $user = $uploader; // Set $user as the uploader

    // Display the uploader's name and their attachments
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $user ?>'s | Attachments</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/brands.css">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    
    <style>

        body {
            font-family: sans-serif;
    background-image: url("../ADMIN/img/honey_im_subtle.png");
      background-color: silver;
        }

        .table.table-striped th {
            font-weight: bold;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            font-size: 20px;
        }

        table, th, td {
            border: 2px double #036557;
            border-radius: 10px;
            text-align: center;
            margin-inline-start: 5px;
            margin-inline-start: 5px;
        }

        th {
            background-color: #5bbdb6;
            color: #082c4a;
            font-weight: bold;
        }

        h1 {
            font-weight: bold;  
            margin-top: 10px;
            margin-left: 200px;
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
    <h1 class="text-center"><strong><?php echo $user ?>'s Attachments</strong></h1>
  </div>
  <div class="d-flex flex-wrap gap-2">
    <a id="form201" href="form201.php"><button>201 Register Form</button></a>
    <a id="empFile" href="attachment.php"><button>Attachments</button></a>
  </div>
</div>
    <hr>
    <br><br>
    
    <table id="table" class="table table-striped text-center">
        <thead>
            <th>File Name</th>
            <th>File Size</th>
            <th>Total Downloads</th>
            <th>Time Uploaded</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php while ($rs = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $rs["NAME"] ?></td>
                <td><?php echo $rs["SIZE"] ?> KB</td>
                <td><?php echo $rs["DOWNLOAD"] ?></td>
                <td><?php echo $rs["TIMERS"] ?></td>
                <td>
                <a href='downloads.php?file_id=<?php echo urlencode($rs["NAME"]); ?>'>
                    <button class='btn btn-sm btn-outline-primary'>
                        <i class="fa fa-download"></i> Download
                    </button>
                </a>

                <!-- Delete button -->
    
                <!-- Delete button -->
                <a href='file_delete.php?file_id=<?php echo urlencode($rs["NAME"]); ?>' onclick="return confirm('Are you sure you want to delete this record?')">
                    <button class='btn btn-sm btn-outline-danger'>
                        <i class="fa fa-trash"></i> Delete
                    </button>
                </a>
            </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
<?php
} else {
    echo "No uploader specified.";
}
?>
