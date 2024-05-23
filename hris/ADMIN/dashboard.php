<!DOCTYPE html>
<html lang="en">
<?php

session_start();
if(!isset($_SESSION["admin_user"])){
    header("location:index.html");

} else{
    $uname = $_SESSION['admin_user'];
}
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="description" content="THESIS">
  <meta http-equiv="authors" content="GROUP 1 BSCS 3A">
  <title>DASHBOARD | ADMIN</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/brands.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
  <!-- for dana font style -->
  <link href="https://fonts.cdnfonts.com/css/dana" rel="stylesheet">
  <style>
    @import url('https://fonts.cdnfonts.com/css/dana');
    body{
      background-image: url("img/honey_im_subtle.png");
      backgroundColor: silver;
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
      background-image: url("img/white.png");
    }

    .profile-text{
      margin: 0 2.5rem;
      color: gray;
      font-size: 18px;
    }

    .fa-camera{
      position: absolute;
      left: -.1rem;
      transform: scale(1.2);
    }

    .popup{
    width: 305.5px;
    height: 495px;
    text-align: center  
}


.popup img{
    cursor: pointer
}

.show{
  width: 300px;
  height: 1px;
    z-index: 999;
    display: none;
    
}
.show .overlay{
    width: 101.5%;
    height: 100%;
    background: rgba(0,0,0,.66);
    position: absolute;
    top: 0;
    left: 0;  
}

.show .img-show{
    width: 730px;
    height: 750px;
    position: absolute;
    top: 48.55%;
    right: -140%;
    transform: translate(-50%,-50%);
    overflow: hidden
    
}
.img-show span{
    position: absolute;
    top: 7px;  
    right: 45px;
    z-index: 99;
    cursor: pointer;
}
.img-show img{
    width: 60%;
    height: 100%;
    position: absolute;
    top: 0%;
    right: 5%;
}.profile-text{
      margin: 0 2.5rem;
      color: gray;
      font-size: 18px;
    }

    .fa-camera{
      position: absolute;
      left: -.1rem;
      transform: scale(1.2);
    }

    .popup{
    width: 305.5px;
    height: 495px;
    text-align: center  
}


.popup img{
    cursor: pointer
}

.show{
  width: 300px;
  height: 1px;
    z-index: 999;
    display: none;
    
}
.show .overlay{
    width: 101.5%;
    height: 100%;
    background: rgba(0,0,0,.66);
    position: absolute;
    top: 0;
    left: 0;  
}

.show .img-show{
    width: 730px;
    height: 750px;
    position: absolute;
    top: 48.55%;
    right: -140%;
    transform: translate(-50%,-50%);
    overflow: hidden
    
}
.img-show span{
    position: absolute;
    top: 7px;  
    right: 45px;
    z-index: 99;
    cursor: pointer;
}
.img-show img{
    width: 60%;
    height: 100%;
    position: absolute;
    top: 0%;
    right: 5%;
}

  </style>
  <script>

  </script>

  <script src="jquery.min.js"></script>
  <script type="text/javascript">
  $(window).on('load', function(){
    // you remove this timeout
    setTimeout(function(){
          $('#loader').fadeOut('slow');  
      });
      // remove the timeout
      // $('#loader').fadeOut('slow'); 
  });

  $(function () {
    "use strict";
    
    $(".popup img").click(function () {
        var $src = $(this).attr("src");
        $(".show").fadeIn();
        $(".img-show img").attr("src", $src);
    });
    
    $("span, .overlay").click(function () {
        $(".show").fadeOut();
    });
    
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
                  <li style="margin: 10px 15px">
                  <font size="4.5">Welcome!</font><font size="4.5" color="#1a66ff"> <?php echo ucwords(htmlentities($id));?> </font>
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
    <div id="loader"></div>

    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed">
      <a class="">
        <CENTER> <img src="img/catholic.png" style="margin-top: 1rem" width="145px" height="150px;" class="img-fluid" alt=""></CENTER>
      </a>
      <hr>

      <div class="list-group list-group-flush">
        <a href="dashboard.php" class="list-group-item active waves-effect" id="dashboard">
          <i class="fas fa-chart-pie mr-3"></i>Dashboard
        </a>
        
       <!-- <a href="#" class="list-group-item list-group-item-action waves-effect"  data-toggle="modal" data-target="#modalRegisterForm" id="add_admin">
          <i class="fas fa-user-plus"></i>Add Admin
        </a> -->

        <a href="view_admin.php" class="list-group-item list-group-item-action waves-effect" id="view_admin">
          <i class="fas fa-users"></i> View Admin
        </a>

       <!-- <a href="#" class="list-group-item list-group-item-action waves-effect" data-toggle="modal" data-target="#modalRegisterForm2" id="add_user">
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



        <!-- <a href="user_log.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-chalkboard-teacher"></i> User logged
        </a> -->
                  
      </div>

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
              <input type="text" id="orangeForm-name" name="name" class="form-control validate" required>
              <label data-error="wrong" data-success="right" for="orangeForm-name">Name:</label>
            </div>
        
            <div class="md-form mb-5">
              <i class="fas fa-envelope prefix grey-text"></i>
              <input type="email" id="orangeForm-email" name="admin_user" class="form-control validate" required>
              <label data-error="wrong" data-success="right" for="orangeForm-email">Email:</label>
            </div>

            <div class="md-form mb-4">
              <i class="fas fa-lock prefix grey-text"></i>
              <input type="password" id="orangeForm-pass" name="admin_password" class="form-control validate" id="myInput" required>
              <label data-error="wrong" data-success="right" for="orangeForm-pass">Password:</label>
              
            </div>

            <div class="md-form mb-4" hidden>
              <i class="fas fa-user prefix grey-text"></i>
              <input type="text" id="orangeForm-pass" name="admin_status" value = "Admin" class="form-control validate" readonly>
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
  <form action="create_user.php" method="POST" encytpe="multipart/form-data">
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
          <label data-error="wrong" data-success="right" for="orangeForm-name">Full Name:</label required>
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="orangeForm-email" name="email_address" class="form-control validate" required>
          <label data-error="wrong" data-success="right" for="orangeForm-email">Email:</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="orangeForm-pass" name="user_password" class="form-control validate" id="myInput2" required>
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Password:</label>
          
        </div>

        <div class="md-form mb-4" hidden>
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-pass" name="user_status" value = "Employee" class="form-control validate" readonly>
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Status:</label>
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

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <span>Home Page</span>
            <span>/</span>
            <span>Dashboard</span>
          </h4>

        </div>

      </div>
      <!-- Heading -->

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-9 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <div class="card-body">

              <?php

                       require_once("include/connection.php");

                             $sql ="SELECT *,count(UPLOADER) as count FROM upload_files group by UPLOADER;";
                             $result = mysqli_query($conn,$sql);
                             $chart_data="";
                             while ($row = mysqli_fetch_array($result)) { 
                     
                                $name[]  = $row['UPLOADER']  ;
                                $counts[] = $row['count'];
                            }
                     
                     
                     
             
                     
                    ?>
                <CENTER><h2 class="page-header" >Number of Files per Admin and Employee </h2></CENTER>  
      

              <canvas id="myChart"></canvas>

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 mb-4">

          <!--Card-->
          <div class="card mb-4">

            <!-- Card header -->
            <div class="">
            <img src="img/cccbanner.jpg" width="120%" height="100px;" class="img-fluid" alt="">

            <div class="">
            <img src="img/schoolcalendar.jpg" style="width: 100%;" alt="">
</div>
<div class="show">
  <div class="overlay"></div>
  <div class="img-show">
    <span>❌</span>
    <img src="">
  </div>
</div>

          
          <!--/.Card-->

        

  </footer>
  <!--/.Footer-->

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
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- extra js for optional if needed -->
  <script src="../js/script.js"></script>

  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>

  <!-- Charts -->
  <script>
    // Line
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
     data: {
            labels:<?php echo json_encode($name); ?>,
            datasets: [{
                      backgroundColor: ["#99ccff", "#ffff99", "#99ffd6",  "#ff9999", "#ff99ff", "#9999ff", "#e6b3b3"],
                      // hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"],
                data:<?php echo json_encode($counts); ?>,
            }]
        },
      options: {
          legend: {
            display: false
          },
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]

        }
      }
    });


    /*
    //pie
    var ctxP = document.getElementById("pieChart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
      type: 'pie',
      data: {
        labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
        datasets: [{
          data: [300, 50, 100, 40, 120],
          backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
          hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
        }]
      },
      options: {
        responsive: true,
        legend: false
      }
    });
      */

    
  
  </script>
</body>
</html>
