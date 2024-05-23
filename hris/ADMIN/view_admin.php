<!DOCTYPE html>
<html lang="en">
<?php

// Inialize session
session_start();
error_reporting(0);
   require_once("include/connection.php");
  $id = mysqli_real_escape_string($conn,$_GET['id']);


// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['admin_user'])) {
header('Location: index.html');
}
else{
    $uname=$_SESSION['admin_user'];
  //  $desired_dir="user_data/$uname/";
}
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="description" content="THESIS">
  <meta http-equiv="authors" content="GROUP 1 BSCS 3A">
  <title>VIEW ADMIN | ADMIN</title>
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

    <script src="js/jquery-1.8.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="medias/css/dataTable.css" />
    <script src="medias/js/jquery.dataTables.js" type="text/javascript"></script>
    <!-- end table-->
    <script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
      $('#dtable').dataTable({
                "aLengthMenu": [[5, 10, 15, 25, 50, 100 , -1], [5, 10, 15, 25, 50, 100, "All"]],
                "iDisplayLength": 10
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
#loader{
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('img/lg.flip-book-loader.gif') 50% 50% no-repeat rgb(249,249,249);
        opacity: 1;
    }
    table, th, td {
    border: 2px double #036557;
    border-radius: 10px;
    text-align: center;
    }
    th {
      color: #036557;
    }

    i {
      margin-right: 1rem;
    }
    
    #dashboard:hover {
      background: #032c62;
      color: white;
    }

    #add_admin {
      width: auto;
      border-radius: 5px;
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

    .fas {
            font-size: 18px;
    }
    .fas.fa-user-edit:hover::before {
        content: "Edit";
        font-size: 12px;
    }
    #delete_icon:hover::before {
        content: "Delete";
        font-size: 12px;
    }
  </style>

  <script src="jquery.min.js"></script>
  <script type="text/javascript">
  $(window).on('load', function(){
    //you remove this timeout
    setTimeout(function(){
          $('#loader').fadeOut('slow');  
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
               $id=$row['admin_user'];
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
                <li style="margin: 10px 15px">
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
        <a href="dashboard.php" class="list-group-item waves-effect" id="dashboard">
          <i class="fas fa-chart-pie mr-3"></i>Dashboard
        </a>
        
        <!-- <a href="#" class="list-group-item list-group-item-action waves-effect"  data-toggle="modal" data-target="#modalRegisterForm" id="add_admin">
          <i class="fas fa-user-plus"></i>Add Admin
        </a> -->

        <a href="view_admin.php" class="list-group-item active list-group-item-action waves-effect" id="view_admin">
          <i class="fas fa-users"></i> View Admin
        </a>

      <!--  <a href="#" class="list-group-item list-group-item-action waves-effect" data-toggle="modal" data-target="#modalRegisterForm2" id="add_user">
          <i class="fas fa-user-plus"></i>Add User
        </a> -->

        <a href="view_user.php" class="list-group-item list-group-item-action waves-effect" id="view_user">
          <i class="fas fa-users"></i>  View User
        </a>

        <a href="add_document.php" class="list-group-item list-group-item-action waves-effect" id="add_document">
          <i class="fas fa-file-medical"></i> Add Document
        </a>

        <a href="view_userfile.php" class="list-group-item list-group-item-action waves-effect" id="view_file">
          <i class="fas fa-folder-open"></i> View User File
        </a>

        <a href="../memo/index.php" class="list-group-item list-group-item-action waves-effect" id="send_memo">
          <i class="fas fa fa-envelope"></i> Send Memo
        </a>
        
        <a href="../201 files/index.php" class="list-group-item list-group-item-action waves-effect" id="send_memo">
          <i class="fa-solid fa-file"></i> 201 files
        </a><hr><hr>

        <div style="font-size:20px; color:#032c62;">CCC websites & Socials</div>
        <a href="https://www.caintacatholiccollege.edu.ph" target="_blank" class="list-group-item list-group-item-action waves-effect" id="send_memo">
        <i class="fa-solid fa-globe"></i>CCC portals</a>

        <a href="https://www.facebook.com/caintacatholiccollege.official" target="_blank" class="list-group-item list-group-item-action waves-effect" id="send_memo">
        <i class="fa-brands fa-facebook"></i>Facebook</a>

        <a href="https://www.youtube.com/@CaintaCatholicCollegeOfficial" target="_blank" class="list-group-item list-group-item-action waves-effect" id="send_memo">
        <i class="fa-brands fa-youtube"></i>Youtube</a>
        <a href="https://www.instagram.com/caintacatholiccollege.official/" target="_blank" class="list-group-item list-group-item-action waves-effect" id="send_memo">
        <i class="fa-brands fa-instagram"></i>instagram</a><hr>
                  
      </div>

    </div>
    <!-- Sidebar -->

  </header>

  <!--Add admin-->
  <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">

    <form action="create_Admin.php" method="POST">
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
          <input type="email" id="orangeForm-email" name="email_address" class="form-control validate" required>
          <label data-error="wrong" data-success="right" for="orangeForm-email">Email:</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="orangeForm-pass" name="user_password" class="form-control validate" required>
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Password:</label>
        </div>

         <div class="md-form mb-4" hidden>
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-pass" name="user_status" value = "Employee" class="form-control validate" readonly>
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
 <div id="loader"></div>
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
            <span>View Admin</span>
          </h4>

        </div>

      </div>
<div class="">

<button class="active list-group-item list-group-item-action waves-effect" data-toggle="modal" data-target="#modalRegisterForm" id="add_admin">
    <i class="fas fa-user-plus"></i> Add Admin
</button>

  
 <table id="dtable" class = "table table-striped text-center">


          <thead>
              <th>Name</th>
              <th>Admin User</th>
              <th>Admin Password</th>
              <th>Status</th>
              <th>Action</th>
          </thead><br /><br />
          <tbody>
     <?php
         require_once("include/connection.php");

            $query="SELECT * FROM admin_login";
            $result=mysqli_query($conn,$query);
            while($rs=mysqli_fetch_array($result)){
               $id =  $rs['id'];
               $fname=$rs['admin_name'];
               $admin=$rs['admin_user'];
               $pass = str_repeat("*", strlen($rs['admin_password'])); // Display asterisks instead of password
               $status=$rs['admin_status'];
           
          ?>       
    
           <tr>
               <td width='10%'><?php echo $fname; ?></td>
               <td align='center'><?php echo $admin; ?></td>
               <td align='center' width="20%"><?php echo $pass; ?></td>
               <td align='center'><?php echo $status; ?></td>
               <td align='center'>
                  <a href="#modalRegisterFormsss?id=<?php echo $id; ?>" class="text-success" data-toggle="modal" data-target="#modalRegisterFormsss">
                    <i class="fas fa-user-edit"></i>
                  </a>
    |
                  <a style="margin-left: 15px;" href="delete_admin.php?id=<?php echo htmlentities($rs['id']); ?>" class="text-danger" onclick="return confirm('Are you sure you want to delete this record?')">
                    <i id="delete_icon" class='far fa-trash-alt'></i>
                  </a>
              </td>
        
           </tr>
       
    <?php  } ?>
       </tbody>
   </table>
  
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

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"crossorigin="anonymous"></script>
  <script  src="/path/to/bootstrap-show-password.js"></script>

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
  <!--modal--->

<div class="modal fade" id="modalRegisterFormsss" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
    <?php 

require_once("include/connection.php");
  
$q = mysqli_query($conn,"select * from admin_login where id = '$id'") or die (mysqli_error($conn));
 $rs1 = mysqli_fetch_array($q);
 
               $id1=$rs1['id'];
               $fname1=$rs1['admin_name'];
               $admin1=$rs1['admin_user'];
               $pass1=$rs1['admin_password'];
               $status=$rs1['admin_status'];
?>
  <div class="modal-dialog" role="document">
    <form method="POST">
    
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold"><i class="fas fa-user-edit"></i> Edit Admin</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body mx-3">
           <div class="md-form mb-5">
            <input type="hidden" class="form-control" name="id" value="<?php echo $id1;?>"><br>
        </div>
        <div class="md-x mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Name:</label><br>
          <input type="text" id="orangeForm-name" name="name" value="<?php echo $fname1;?>" class="form-control validate">
        </div>
        <div class="md-x mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-email">Email:</label><br>
          <input type="email" id="orangeForm-email" name="admin_user" value="<?php echo $admin1;?>" class="form-control validate">
        </div>

        <div class="md-x mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Password:</label><br>
          <input type="password" id="orangeForm-pass" name="admin_password" value="<?php echo $pass1;?>" class="form-control validate">
        </div>
          <div hidden class="md-form mb-4">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-pass" name="status" value = "Admin" class="form-control validate" readonly="">
          <label data-error="wrong" data-success="right" for="orangeForm-pass" >Status:</label>
        </div>
      
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-primary" name="edit2">UPDATE</button>
      </div>
    </div>
  </div>
</div>
</form>

  <!--modal--->
 <?php 

 require_once("include/connection.php");

  
 if(isset($_POST['edit2'])){
         $user_name = mysqli_real_escape_string($conn,$_POST['name']);
         $admin_user = mysqli_real_escape_string($conn,$_POST['admin_user']);
         $admin_password = mysqli_real_escape_string($conn,$_POST['admin_password']);
       //  $user_status = mysqli_real_escape_string($conn,$_POST['status']);

     mysqli_query($conn,"UPDATE `admin_login` SET `admin_name` = '$user_name', `admin_user` = '$admin_user', `admin_password` = '$admin_password' where id='$id'") or die (mysqli_error($conn));
  
  echo "<script type = 'text/javascript'>alert('Admin successfully edited!!!');document.location='view_admin.php'</script>";

}

?>

</html>
