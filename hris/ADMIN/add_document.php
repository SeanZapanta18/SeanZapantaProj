<!DOCTYPE html>
<html lang="en">
<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['admin_user'])) {
header('Location: index.html');
}

?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta http-equiv="authors" content="GROUP 1 BSCS 3A">
  <title>DOCUMENTS | ADMIN</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/brands.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
  <!-- for dana font style -->
  <link href="https://fonts.cdnfonts.com/css/dana" rel="stylesheet">

    <script src="js/jquery-1.8.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="medias/css/dataTable.css" />
    <script src="medias/js/jquery.dataTables.js" type="text/javascript"></script>
    <!-- end table-->
    <script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
      $('#dtable').dataTable({
                "aLengthMenu": [[5, 10, 15, 25, 50, 100 , -1], [5, 10, 15, 25, 50, 100, "All"]],
                "iDisplayLength": 10
                //"destroy":true;
            });
  })
    </script>

  <style>
    @import url('https://fonts.cdnfonts.com/css/dana');
          select[multiple], select[size] {
    height: auto;
    width: 20px;
}
.pull-right {
    float: right;
    margin: 2px !important;
}

    .map-container{
overflow:hidden;
padding-bottom:56.25%;
position:relative;
height:0;
}
.map-container iframe{
left:0;
top:0;
height:100%;
width:100%;
position:absolute;
}
#loaders{
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('img/lg.flip-book-loader.gif') 50% 50% no-repeat rgb(249,249,249);
        opacity: 1;
    }

    .table.table-striped th {
      font-weight: bold;
    }


    table, th, td {
      border: 2px double #036557;
      border-radius: 10px;
    }
    th {
      color: #07b5b5;
      font-weight: bold;
    }

    td {
      color: #0a565c;
    }
    
    #dashboard:hover {
      background: #032c62;
      color: white;
    }

    #add_admin:hover {
      background: #032c62;
      border-radius: 5px;
      color: white;
    }

    #view_admin:hover {
      background: #032c62;
      border-radius: 5px;
      color: white;
    }

    #add_user:hover {
      background: #032c62;
      border-radius: 5px;
      color: white;
    }

    #view_user:hover {
      background: #032c62;
      border-radius: 5px;
      color: white;
    }

    #add_document:hover {
      background: #032c62;
      border-radius: 5px;
      color: white;
    }

    #view_file:hover {
      background: #032c62;
      border-radius: 5px;
      color: white;
    }

    #send_memo:hover {
      background: #032c62;
      border-radius: 5px;
      color: white;
    }

    body{
      background-image: url("img/honey_im_subtle.png");
    }

    .fa.fa-download:hover::before {
      content: "Download";
      font-size: 12px;
    }

    .fa.fa-trash:hover::before {
      content: "Delete";
      font-size: 12px;
    }
  </style>

  <script src="jquery.min.js"></script>
  <script type="text/javascript">
  $(window).on('load', function(){
    //you remove this timeout
    setTimeout(function(){
          $('#loaders').fadeOut('slow');  
      });
      //remove the timeout
      //$('#loader').fadeOut('slow'); 
  });
  </script>
</head>

<body style="padding:0px; margin:0px; background-color:silver; font-family: 'dana', sans-serif;">

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
      <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="#">
          <strong class="blue-text"></strong>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->
          <ul class="navbar-nav mr-auto">
          
          </ul>
            <?php 

             require_once("include/connection.php");


               $id = mysqli_real_escape_string($conn,$_SESSION['admin_user']);


              $r = mysqli_query($conn,"SELECT * FROM admin_login where id = '$id'") or die (mysqli_error($con));

              $row = mysqli_fetch_array($r);

              if($row){
               $id = $row['admin_user'];
               
              }

              // $query="SELECT * FROM admin_login";
              // $result=mysqli_query($conn,$query);
              // while($rs=mysqli_fetch_array($result)){
              //    $id =  $rs['id'];
              //    $fname=$rs['admin_name'];
              //    $admin=$rs['admin_user'];
              //    $pass=$rs['admin_password'];
              //    $status=$rs['admin_status'];    
              // }
            ?>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
                <li style="margin:10px 15px">
                  <font size="4">Welcome,</font><font size="4" color="#1a66ff"> <?php echo ucwords(htmlentities($id));?> </font>
                </li>
            
            <li class="nav-item">
              <a href="logout.php" class="nav-link border border-light rounded waves-effect">
               <i class="far fa-user-circle"></i>Sign out
              </a>
            </li>
          </ul>

        </div>

      </div>
    </nav>
    <!-- Navbar -->

    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed">
      <a class="">
        <CENTER> <img src="img/catholic.png" style="margin-top: 1rem" width="145px" height="150px;" class="img-fluid" alt=""></CENTER>  
      </a>
      <hr>

    <div class="list-group list-group-flush">
        <a href="dashboard.php" id="dashboard" class="list-group-item waves-effect">
          <i class="fas fa-chart-pie mr-3"></i>Dashboard
        </a>
        
       <!-- <a href="#" id="add_admin" class="list-group-item list-group-item-action waves-effect"  data-toggle="modal" data-target="#modalRegisterForm">
          <i class="fas fa-user-plus"></i>Add Admin
        </a> -->

        <a href="view_admin.php" id="view_admin" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-users"></i> View Admin
        </a>

       <!--  <a href="#" id="add_user" class="list-group-item list-group-item-action waves-effect" data-toggle="modal" data-target="#modalRegisterForm2">
          <i class="fas fa-user-plus"></i>Add User
        </a> -->

        <a href="view_user.php" id="view_user" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-users"></i>  View User
        </a>

        <a href="add_document.php" id="add_document" class="list-group-item active list-group-item-action waves-effect">
          <i class="fas fa-file-medical"></i> Add Document
        </a>

        <a href="view_userfile.php" id="view_file" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-folder-open"></i> View User File
        </a>

        <a href="../memo/index.php" id="send_memo" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa fa-envelope"></i> Send Memo
        </a>
        
        <a href="../201 files/index.php" class="list-group-item list-group-item-action waves-effect" id="send_memo">
          <i class="fa-solid fa-file"></i> 201 files
        </a><hr><hr>


        <div style="font-size:20px;color:#032c62;">CCC websites & Socials</div>
        <a href="https://www.caintacatholiccollege.edu.ph" target="_blank" class="list-group-item list-group-item-action waves-effect" id="send_memo">
        <i class="fa-solid fa-globe"></i>CCC portals</a>

        <a href="https://www.facebook.com/caintacatholiccollege.official" target="_blank" class="list-group-item list-group-item-action waves-effect" id="send_memo">
        <i class="fa-brands fa-facebook"></i>Facebook</a>

        <a href="https://www.youtube.com/@CaintaCatholicCollegeOfficial" target="_blank" class="list-group-item list-group-item-action waves-effect" id="send_memo">
        <i class="fa-brands fa-youtube"></i>Youtube</a>
        <a href="https://www.instagram.com/caintacatholiccollege.official/" target="_blank" class="list-group-item list-group-item-action waves-effect" id="send_memo">
        <i class="fa-brands fa-instagram"></i>instagram</a><hr>

    </div>
    <!-- Sidebar -->

  </header> 
 
  <!--Add admin-->
  <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
    <form action="create_admin.php" method="POST">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold"><i class="fas fa-user-plus"></i> Add Admin</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body mx-3">
            <div class="md-form mb-5">
          </div>

            <div class="md-form mb-5">
              <i class="fas fa-user prefix grey-text"></i>
              <input type="text" id="orangeForm-name" name="name" class="form-control validate" required="">
              <label data-error="wrong" data-success="right" for="orangeForm-name">Name:</label>
            </div>
        
            <div class="md-form mb-5">
              <i class="fas fa-envelope prefix grey-text"></i>
              <input type="email" id="orangeForm-email" name="admin_user" class="form-control validate" required="">
              <label data-error="wrong" data-success="right" for="orangeForm-email">Email:</label>
            </div>

            <div class="md-form mb-4">
              <i class="fas fa-lock prefix grey-text"></i>
              <input type="password" id="orangeForm-pass" name="admin_password" class="form-control validate" required="">
              <label data-error="wrong" data-success="right" for="orangeForm-pass">Password:</label>
            </div>

            <div class="md-form mb-4" hidden>
              <i class="fas fa-user prefix grey-text"></i>
              <input type="text" id="orangeForm-pass" name="admin_status" value = "Admin" class="form-control validate" readonly="">
              <label data-error="wrong" data-success="right" for="orangeForm-pass">Status:</label>
            </div>

        </div>

            <div class="modal-footer d-flex justify-content-center">
              <button class="btn btn-info" name="reg">Sign up</button>
            </div>
      </div>
    
    </div>
    </form>
  </div>
  <!--end modaladmin-->

  <!--Add user-->
  <div class="modal fade" id="modalRegisterForm2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
  <form action="create_user.php" method="POST">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold"><i class="fas fa-user-plus"></i> Add User Employee</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
           <div class="md-form mb-5">

        </div>
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-name" name="name" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-name">Name:</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="orangeForm-email" name="email_address" class="form-control validate" required="">
          <label data-error="wrong" data-success="right" for="orangeForm-email">Email:</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="orangeForm-pass" name="user_password" class="form-control validate" required="">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Password:</label>
        </div>
         <div class="md-form mb-4" hidden>
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-pass" name="user_status" value = "Employee" class="form-control validate" readonly="">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Status:</label>
        </div>
        </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-info" name="reguser">Sign up</button>
      </div>
    </div>
  </div>
</div>
</form>
</div>
<!--end modaluser-->

  </header>
  <!--Main Navigation-->
 <div id="loaders"></div>
  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="dashboard.php">Home Page</a>
            <span>/</span>
            <span>Add Document</span>
          </h4>

        </div>

      </div>
      <!-- Heading -->
      <div class="">
      <!--   <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalRegisterForm">Add File</button> -->
    <a href="./add_file.php" class="btn btn-success"><i class="fas fa-file-medical"></i> ADD FILES</a>
    
    </div>
  
  <hr>
 
 <div class="col-md-12">

 <table id="dtable" class = "table table-striped text-center">
     <thead>

    <th>File Name</th>
    <th>File Size</th>
    <th>File Uploader</th>
    <th>Status</th>   
    <th>Date/Time Upload</th>
    <th>Total Downloads</th>
    <th>Action</th>

    </thead>
    <tbody>

    
    <tr>
        <?php 
   
        require_once("include/connection.php");

      $query = mysqli_query($conn,"SELECT DISTINCT ID,NAME,SIZE,UPLOADER,ADMIN_STATUS,TIMERS,DOWNLOAD FROM upload_files group by NAME DESC") or die (mysqli_error($con));
      while($file=mysqli_fetch_array($query)){
         $id =  $file['ID'];
         $name =  $file['NAME'];
         $size =  $file['SIZE'];
         $uploads =  $file['UPLOADER'];
         $status =  $file['ADMIN_STATUS'];
         $time =  $file['TIMERS'];
         $download =  $file['DOWNLOAD'];
    
      ?>
     
      <td width="20%"><?php echo  $name; ?></td>
      <td><?php echo floor($size / 1000) . ' KB'; ?></td>
      <td><?php echo $uploads; ?></td>
      <td><?php echo $status; ?></td>
      <td><?php echo $time; ?></td>
      <td><?php echo $download; ?></td>
      <td><a href='downloads.php?file_id=<?php echo $id; ?>'  class="btn btn-sm btn-outline-primary"><i class="fa fa-download"></i></a> <a href='delete.php?ID=<?php echo $id; ?>'  class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a></td>
    </tr>
    <?php } ?>
        </tbody>
   </table>
    </div>  

  </footer>
  <!--/.Footer-->

<!-- Card -->
  <!-- /Start your project here-->
  <script>
    const navLinks = document.querySelectorAll('.list-group-item');

  navLinks.forEach((navLink) => {
  navLink.addEventListener('click', () => {
    // Remove the active class from all nav links
    navLinks.forEach((navLink) => {
      navLink.classList.remove('active');
    });

    // Add the active class to the clicked nav link
    navLink.classList.add('active');
  });
  });
  </script> 

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>

  <script type="text/javascript" src="js/popper.min.js"></script>

  <script type="text/javascript" src="js/bootstrap.min.js"></script>

  <script type="text/javascript" src="js/mdb.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css"/>   
<script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/1.0.3/css/dataTables.responsive.css">
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/1.0.3/js/dataTables.responsive.js"></script>

</body>

</html>
