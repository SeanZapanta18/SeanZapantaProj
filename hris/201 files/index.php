<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>201 Files | Admin</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/brands.css">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    <script>
        function searchTable() {
            var searchText = document.getElementById("searchInput").value.toLowerCase();
            var rows = document.getElementById("dtable").getElementsByTagName("tr");
            for (var i = 1; i < rows.length; i++) {
            var row = rows[i];
            var cells = row.getElementsByTagName("td");
            var found = false;
            for (var j = 0; j < cells.length; j++) {
            var cellText = cells[j].textContent.toLowerCase();
            if (cellText.includes(searchText)) {
            found = true;
            break;
                    }
                }
            row.style.display = found ? "" : "none";
            }
        }
        $(document).ready(function(){
      $('#dtable').dataTable({
                "aLengthMenu": [[5, 10, 15, 25, 50, 100 , -1], [5, 10, 15, 25, 50, 100, "All"]],
                "iDisplayLength": 10
            });
        })
    </script>
    <style>
        @import url('https://fonts.cdnfonts.com/css/dana');
        body {
            font-family: sans-serif;
            background-image: url("../ADMIN/img/honey_im_subtle.png");
            backgroundColor: silver;
        }

        h1 {
            font-weight: bold;  
            margin-top: 10px;
            margin-left: 500px;
        }

        table, th, td {
            border: 2px double #036557;
            border-radius: 0px;
            margin-top: -35px;
            text-align: center;
            margin-inline-start: center;
            margin-inline-start: center;

        }
        th {
            background-color:  #80d4ff;
            color: #082c4a;
            font-weight: bold;
        }
        .fas {
            font-size: 18px;
        }
        .fas.fa-user-edit:hover::before {
            content: "Edit";
            font-size: 12px;
        }
        .fas.fa-trash-alt:hover::before {
            content: "Delete";
            font-size: 12px;
        }
        
        .table.table-striped th {
            font-weight: bold;
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

    input {
      width: 87%;
      padding: 10px;
      margin-top: 10px;
      margin-right: 20px;
      font-size: 25px;
    }

    </style>
    
</head>
<body>
<div class="d-flex justify-content-between px-3 py-2 border-bottom">
  <div class="d-flex align-items-center">
    <a href="../ADMIN/dashboard.php"><button>Back to Dashboard</button></a>
    <h1><strong><center>201 FILES</center></strong></h1>
  </div>
  <div class="d-flex flex-wrap gap-2">
    <a id="form201" href="form201.php"><button>201 Register Form</button></a>
    <a id="empFile" href="attachment.php"><button>Attachments</button></a>
  </div>
</div>
<br>
<div class="row mb-3">
  <div class="col-md-6">
    <input type="text" class=" form-control-sm form-control" id="searchInput" placeholder="Search by name or username">
  </div>
  <div class="col-md-2">
    <button class="btn btn-primary btn-sm" onclick="searchTable()">Search</button>
  </div>
</div>
<table id="dtable" class = "table table-striped text-center">
<thead>
    <th>Employee ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Gender</th>
    <th>Birth Date</th>
    <th>Contact</th>
    <th>Email Address</th>
    <th>Location Address</th>
    <th>Department</th>
    <th>Job Position</th>
    <th>Rank</th>
    <th>Action</th>
</thead><br /><br />
<tbody>
<?php
require_once("../include/connection.php");

  $query="SELECT * FROM employees";
  $result=mysqli_query($conn,$query);
  while($rs=mysqli_fetch_array($result)){
     $id =  $rs['id'];
     $empId=$rs['employee_id'];
     $fname=$rs['first_name'];
     $lname=$rs['last_name'];
     $gender=$rs['gender'];
     $bdate=$rs['birth_date'];
     $contact=$rs['contact'];
     $email=$rs['email'];
     $address=$rs['address'];
     $dept=$rs['department'];
     $position=$rs['position'];
     $rank=$rs['rank'];
 
?>       

 <tr>
     <td align='center'><?php echo $empId; ?></td>
     <td align='center'><?php echo $fname; ?></td>
     <td align='center'><?php echo $lname; ?></td>
     <td align='center'><?php echo $gender; ?></td>
     <td align='center'><?php echo $bdate; ?></td>
     <td align='center'><?php echo $contact; ?></td>
     <td align='center'><?php echo $email; ?></td>
     <td align='center'><?php echo $address; ?></td>
     <td align='center'><?php echo $dept; ?></td>
     <td align='center'><?php echo $position; ?></td>
     <td align='center'><?php echo $rank; ?></td>
     <td align='center'>
     <a href="edit_form.php?id=<?php echo $id ?>"><i style="color: green; margin-right: 6px;" class="fas fa-user-edit"></i> </a>
        |
     <a href="delete.php?id=<?php echo $id ?>" onclick="return confirm('Are you sure you want to delete this record?')"><i style="color: red; margin-left: 6px;" class="fas fa-trash-alt"></i></a>


  
    </td>

  
 </tr>

<?php  } ?>
</tbody>
</table>

</body>
</html>