
<!DOCTYPE html>
<html lang="en">
<?php
// include('Private_Dashboard/include/connection.php');
session_start();
if(!isset($_SESSION["email_address"])){
    header("location:../login.html");

}

require_once("include/connection.php");

$id = mysqli_real_escape_string($conn,$_SESSION['email_address']);
$user = mysqli_query($conn,"SELECT * FROM login_user where id = '$id'") or die (mysqli_error($con));

$_SESSION["id"] =1;
$sId = $_SESSION["id"];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM login_user WHERE id = $sId"));
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>DOCUMENTS | USERS</title>
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

  <script src="js/jquery-1.8.3.min.js"></script>
  <link rel="stylesheet" type="text/css" href="media/css/dataTable.css" />
  <script src="media/js/jquery.dataTables.js" type="text/javascript"></script>
    
  <script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
      $('#dtable').dataTable({
                "aLengthMenu": [[5, 10, 15, 25, 50, 100 , -1], [5, 10, 15, 25, 50, 100, "All"]],
                "iDisplayLength": 10
                //"destroy":true;
            });
  })
    </script>
    
<style type="text/css">
  @import url('https://fonts.cdnfonts.com/css/dana');

  body {
    background-image: url("../ADMIN/img/white.png");
  }
  select[multiple], select[size] {
  height: auto;
  width: 20px;
}
.pull-right {
    float: right;
    margin: 2px !important;
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
    
    i {
    font-size: 20px;
    }

    #logo{
      margin-right:6.5rem;
      margin-left:2rem;
    }

    .rounded {
      margin-top: .-6rem;
      margin-bottom: -.5rem;
      margin-left: .5rem;
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

<body style="padding:0px; margin:0px; background-color:#fff;font-family:arial,helvetica,sans-serif,verdana,'Open Sans'">
<?php 
  require_once("include/connection.php");

  $id = mysqli_real_escape_string($conn, $_SESSION['email_address']);

  $r = mysqli_query($conn, "SELECT * FROM login_user WHERE email_address = '$id'") or die(mysqli_error($conn));

  $row = mysqli_fetch_array($r);
  if ($row) {
    $full_name = $row['full_name'];
  }
?>

<!-- Start your project here-->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color fixed-top">
  <a style="letter-spacing: 3px; font-size: 50px;" class="navbar-brand" href="#">
    <img style="margin-right: 0px" id="logo" src="img/catholic.png" width="120px" height="90px">
    <font size="8" color="#ffff99">H</font>uman <font size="8" color="#ffff99">R</font>esources <font size="8" color="#ffff99">I</font>nformation <font size="8" color="#ffff99">S</font>ystem
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
    <ul class="navbar-nav ml-auto">
      <ul class="navbar-nav nav-flex-icons">
        <li style="margin: 10px 15px">
        <font size="4.5">Welcome,</font><font size="4.5" color="#0000ff"> <?php echo ucwords(htmlentities($full_name));?> </font>

        </li>
        <li class="nav-item">
          <a style="padding: 8px" href="logout.php" class="nav-link border border-light rounded waves-effect">
            <i class="far fa-user-circle"></i> Sign out
          </a>
        </li>
      </ul>
    </ul>
  </div>
</nav>
<br>
<!--/.Navbar -->
<br><Br><br>
<!-- Card -->
<div style="margin-top: 3rem" class="container">
  <div class="row">
     <div class="col-md-9">


     <div class="container">
  <div class="table-responsive">
    <table id="dtable" class="table table-striped table-bordered text-center">
      <thead class="table-dark">
        <tr>
          <th>Filename</th>
          <th>FileSize</th>
          <th>Uploader</th>
          <th>Status</th>
          <th>Date/Time Upload</th>
        </tr>
      </thead>
      <tbody>
        <?php
          require_once("include/connection.php");

          $query = mysqli_query($conn, "SELECT ID, NAME, SIZE, UPLOADER, ADMIN_STATUS, TIMERS, DOWNLOAD FROM upload_files group by NAME DESC") or die(mysqli_error($conn));
          while ($file = mysqli_fetch_array($query)) {
            $id = $file['ID'];
            $name = $file['NAME'];
            $size = $file['SIZE'];
            $uploads = $file['UPLOADER'];
            $status = $file['ADMIN_STATUS'];
            $time = $file['TIMERS'];
            $download = $file['DOWNLOAD'];
        ?>
        <tr>
          <td><?php echo $name; ?></td>
          <td><?php echo floor($size / 1000) . ' KB'; ?></td>
          <td><?php echo $uploads; ?></td>
          <td><?php echo $status; ?></td>
          <td><?php echo $time; ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>



    </div>
 


</script>



<div class="col-md-3" style="border-top: 5px solid #17a2b8;border-radius: 4px;  box-shadow: 0px 1px 1px 0px  #6c757d;">



<br>
  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

  <!-- <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
      aria-controls="pills-home" aria-selected="true">Home</a>
  </li> -->

  <i style="margin-top: 10px; margin-left: 30px"  class="fas fa-users"></i> 
  
  <li style="margin-left: 30px" class="nav-item">
    
    <a  class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
      aria-controls="pills-profile" aria-selected="false">About</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
      aria-controls="pills-contact" aria-selected="false">Contact</a>
  </li>

<div class="tab-content pt-2 pl-1" id="pills-tabContent">
  
  <div class="tab-pane fade show active" id="pills-profile-tab" role="tabpanel" aria-labelledby="pills-profile-tab">
    
  </div>
  
  <hr>
  <div class="">
    


 <img  src="img/transfer.jpg" alt="" height=120 width=240 class="rounded"></a> 
    <!-- <div class=""><p style="font-weight: bold"><b style="font-size: 1.1em; color: #0000ff">Position:</b> Employee</p></div> -->
  </div><hr>


  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
   <h6 style="font-size: 1.1em">Human Resources Information System (HRIS)</h6><Hr>
  is a system (based on computer programs in the case of the management of digital documents) used to track, manage and store documents and reduce paper. Most are capable of keeping a record of the various versions created and modified by different users (history tracking).</div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"><h6 style="font-size: 1.1em; margin-left: 30px">Cainta Catholic College</h6><Hr><div class=""><p><b style="font-size: 1.1em; font-weight: bold">Tel.No.:</b><b style=" color: #0000ff"> (02) 643-2000</b></p></div><p><b style="font-size: 1em; font-weight: bold">Website: </b><a href="https://www.caintacatholiccollege.edu.ph/" target="_blank">
        <i class=""></i>caintacatholiccollege.official</a><br><b style="font-size: 1em; font-weight: bold">Facebook Page: </b><a href="https://www.facebook.com/caintacatholiccollege.official" target="_blank">
        <i class=""></i>caintacatholiccollege.official</a>
</div><hr>
<!--   <div class="card">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Cras justo odio</li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul>
</div><br> -->
   <!-- Card -->

<div class="card" style="border-top: 4px solid #17a2b8;border-radius: 4px;">

  <!-- Card image -->
  <div class="view overlay">

      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body">

    <!-- Title -->
    <h4 class="card-title">File Document</h4><hr>
    <!-- Text -->

    <ul>
      <li> <p>Ensuring changes and revisions are clearly identified</p></li>
      <li> <p>Ensuring that documents remain legible and identifiable</p></li>
      <li> <p>Preventing “unintended” use of obsolete documents</p></li>
    </ul>
    <!-- Button -->
    <a href="add_file.php" class="btn btn-primary">ADD FILES</a>

  </div>

</div>
<!-- Card -->

 </div>
</div>
</div>


<!-- Card -->
  <!-- /Start your project here-->

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
