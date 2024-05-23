<!DOCTYPE html>
<html>
<head>
  <title>SEND EMAIL | ADMIN</title>
  <style>
    body {
      font-family: sans-serif;
      background-image: url("../ADMIN/img/honey_im_subtle.png");
      background-color: silver;
      margin: 0;
    }

    form, table {
      width: 800px;
      margin: 0 auto;
    }

    table {
      margin-top: 0rem;
      margin-bottom: 1rem;
      width: 80%;
    

    }
    th {
      background: #000066;
      color: white;
      padding: 15px 0;
    }

    td {
      border: solid 1.5px blue;
    }

    h1 {
      font-family: 'dana', sans-serif;
      text-align: center;
      font-weight: bold;
      font-size: 3rem;
      color: #000066;
    }

    #searchInput {
      width: 25.3%;
      margin-left: 10.80rem;
      margin-top: 2rem;
      margin-bottom: .2rem;
    }

    input {
      width: 87%;
      padding: 10px;
      margin-bottom: 10px;
      font-size: 25px;
    }

    textarea {
      width: 87.5%;
      height: 180px;
      padding: 10px;
      margin-bottom: 10px;
      font-size: 20px;
    }

    #email-list button {
      float: right;
      margin-right: .2rem;
    }

    a button {
      margin: 1rem 2rem 0;
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

    .error {
      color: red;
    }
    #sendemail {
      margin-left: 0rem;
    }

  </style>
  <script>
    function showAlert(message) {
      alert(message);
    }
    function addEmailField() {
    // Create a new email input element
    var emailInput = document.createElement('input');

    // Set the type of the input element to email
    emailInput.type = 'email';

    // Set the name of the input element to email[]
    emailInput.name = 'email[]';

    // Set the placeholder text for the input element
    emailInput.placeholder = 'To:';

    // Append the email input element to the email list div
    document.getElementById('email-list').appendChild(emailInput);
   }
  </script>
</head>
<body>
  <a href="../ADMIN/dashboard.php"><button>Back to Dashboard</button></a><h1>SEND MEMO</h1>

  <form action="memo.php" method="post">
  <div id="email-list">
    <input type="email" name="email[]" placeholder="To:">
    <button type="button" onclick="addEmailField()">Add</button>
  </div>
  <input type="text" name="subject" placeholder="Subject:">
  <textarea name="message" placeholder="Enter your message here:"></textarea>
  <button id="sendemail"type="submit">Send Email</button>
</form>

<div class="container">
  <div class="row">
    <div class="col-lg-6"> <!-- Adjust the column size based on your needs -->
      <div class="input-group mb-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Search Name:" aria-label="Search for a name..." aria-describedby="basic-addon2">
        <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i></span>
      </div>
    </div>
    <div class="col-lg-6"> <!-- Adjust the column size based on your needs -->
      <table id="dtable" class="table table-striped text-center table-bordered">
        <thead>
          <tr>
            <th>Full Name</th>
            <th>Email Address</th>
          </tr>
        </thead>
        <tbody>
          <?php
            require_once("connection.php");

            $query = "SELECT * FROM login_user";
            $result = mysqli_query($conn, $query);

            while ($rs = mysqli_fetch_array($result)) {
              $id = $rs['id'];
              $fname = $rs['full_name'];
              $email = $rs['email_address'];
              $pass = $rs['user_password'];
              $status = $rs['user_status'];

              ?>
              <tr>
                <td style="text-align: center; padding: 15px 10px;"><?php echo $fname; ?></td>
                <td style="text-align: center; padding: 15px 10px;"><?php echo $email; ?></td>
              </tr>
              <?php
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>



<script>
const searchInput = document.getElementById('searchInput');
searchInput.addEventListener('keyup', function() {
  const searchText = searchInput.value.toLowerCase();

  const tableRows = document.querySelectorAll('#dtable tbody tr');
  for (const row of tableRows) {
    const rowText = row.textContent.toLowerCase();
    if (!rowText.includes(searchText)) {
      row.style.display = 'none';
    } else {
      row.style.display = '';
    }
  }
});
</script>
</body>

</html>
