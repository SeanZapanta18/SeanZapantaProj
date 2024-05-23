<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="description" content="THESIS">
  <meta http-equiv="authors" content="GROUP 1 BSCS 3A">
  <title>REGISTER | H.R.I.S.</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
  <!-- for dana font style -->
  <link href="https://fonts.cdnfonts.com/css/dana" rel="stylesheet">
 <style type="text/css">
    @import url('https://fonts.cdnfonts.com/css/dana');
      #loader{
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('img/loading.gif') 50% 50% no-repeat rgb(249,249,249);
        opacity: 1;
    }
 </style>
</head>

<body style="padding:0px; margin:0px; background-color:silver;font-family: 'dana', sans-serif;">

  <!-- Start your project here-->
<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
<a style="letter-spacing: 3px; margin-left: 10rem;" class="navbar-brand" href="index.html"><img src="js/img/Files_Download.png" width="120px" height="70px"> <font size="6" color="#F0B56F">H</font>uman <font size="6" color="#F0B56F">R</font>esources <font size="6" color="#F0B56F">I</font>nformation <font size="6" color="#F0B56F">S</font>ystem</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
    <ul style="margin-right: 13rem;" class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i> Admin Login </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
          <a class="dropdown-item" href="Private_Dashboard/index.html">Go To ADMIN SECURITY</a>

        </div>
      </li>
    </ul>
  </div>
</nav>
<!--/.Navbar -->
<br><Br>
<div id="loader"></div>
<!-- Card -->
<div class="container col-md-5">
 <!-- Card -->
<div class="card">

    <!-- Card body -->
    <div class="card-body">

        <!-- Material form register -->
        <form action="insert.php" method="POST">
            <p class="h4 text-center py-4">User Sign Up</p>

             <!-- Material input full name -->

             <div class="md-form">
              <input type="text" name="full_name" class="form-control" required>
              <label for="materialFormCardEmailEx" class="font-weight-light">Your full name</label>
          </div>

            <!-- Material input email -->

            <div class="md-form">
                <input type="email" name="email_address" class="form-control" required>
                <label for="materialFormCardEmailEx" class="font-weight-light">Your email</label>
            </div>

            <!-- Material input password -->
            
            <div class="md-form">
                <input type="password" name="user_password" class="form-control pass1" id="myInput" required>
                <label for="materialFormCardPasswordEx" class="font-weight-light">Your password</label>
                <span class="eye" onClick="eyeHidden()">
                  <i id="eye-hide1" class="fas fa-eye"></i>
                  <i id="eye-hide2" class="fas fa-eye-slash"></i>
                </span>
            </div>

            <!-- Textbox for matching password -->

            <h5 style="color:indianred"></h5>

            <!-- Material input confirm password -->

            <div class="md-form">
                <input type="password" name="user_password" class="form-control pass2" id="myInput2" required>
                <label for="materialFormCardPasswordEx" class="font-weight-light">Confirm password</label>
                <span class="eye" onClick="eyeHidden2()">
                  <i id="eye-hide3" class="fas fa-eye"></i>
                  <i id="eye-hide4" class="fas fa-eye-slash"></i>
                </span>
            </div>

            <!-- User status = Employee (Hidden) -->

            <div class="md-form mb-4" hidden>
                <input type="text" id="orangeForm-pass" name="user_status" value = "Employee" class="form-control validate" readonly="">
                <label data-error="wrong" data-success="right" for="orangeForm-pass">User Status</label>
            </div>

            <div class="text-center py-4 mt-3">
                <button class="btn btn-default btn-lg btn-block" name = "register" id="login" type="submit">Sign Up</button>
            </div>
      
            <h4>Already have account? <a href="login.html">Log In Now!</a></h4>
        </form>
        <!-- Material form register -->

    </div>

    <!-- Card body -->

</div>
<!-- Card --></div>
<!-- Card -->
  <!-- /Start your project here-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
</body>

<script type="text/javascript">
   $("#login").on("click", function () {
   
          uservalidate();
          passvalidate();
   
         if (uservalidate() === true
          && passvalidate() === true
   
          ) {
   
   };
   
   
   });
   
   
   function uservalidate() {
   if ($('#materialFormCardEmailEx').val() == '') { 
       $('#materialFormCardEmailEx').css('border-color', '#dc3545');
    return false;
     } else {
      $('#materialFormCardEmailEx').css('border-color', '#28a745'); 
       return true;
   }
   
   };
   
   function passvalidate() {
   if ($('#materialFormCardPasswordEx').val() == '') { 
    $('#materialFormCardPasswordEx').css('border-color', '#dc3545');
    return false;
     } else {
      $('#materialFormCardPasswordEx').css('border-color', '#28a745'); 
       return true;
   }
   
   };
   
   
</script>
  <script src="js/script.js"></script>
  <script src = "jss/jquery.js"></script>
  <script src = "jss/bootstrap.js"></script>
  <script src = "jss/login.js"></script>
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
</html>
