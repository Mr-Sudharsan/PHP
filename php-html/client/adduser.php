<?php require '../index/index.php';
?>
<html>
<head>
  <title>Add User</title>
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>bootstrap-4.3.1-dist/css/bootstrap.min.css"> 
</head>
<script type="text/javascript" src="<?php echo $base_url ?>bootstrap-4.3.1-dist/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="../config/controller.js"></script>
  <script type='text/javascript'>
    function emailVal(str) {
      if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            resp = JSON.parse(this.responseText);
            status = resp.status;
            if (status == 0) {
              $('#submitbtn').removeAttr('disabled');
            } else {
              $('#submitbtn').attr('disabled', 'disabled');
            }
            message = resp.message;
            //console.log(resp.status);
            document.getElementById("txtHint").innerHTML = message;
            document.getElementById("")
          }
        }
        xmlhttp.open("GET", "validation.php?customer_email=" + str, true);
        xmlhttp.send();
      }
    }
  </script>

<body>
  <div class="container p-3 my-3 border">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="box">
          <h3>Add New User</h3>
          <form id="adduser" action='<?php echo $base_url ?>server/create.php'>
            <div class="form-group">
              <label>Name :</label>
              <input type="text" name="name" id="name" value="" placeholder="enter your name" required class="form-control" autofocus>
            </div>
            <div class="form-group">
              <label>Age :</label>
              <input type="number" name="age" value="" placeholder="enter your age" required class="form-control">
            </div>
            <div class="form-group">
              <label>Email :</label>
              <input type="email" name="email" value="" placeholder="enter your email" onchange="emailVal(this.value)" required class="form-control">
              <p><span id="txtHint"></span></p>
            </div>
            <div class="form-group">
              <label>Gender :</label>
              <label class="form-control">
                <input type="radio" name="gender" value="Male" checked> Male
                <input type="radio" name="gender" value="Female"> Female
                <input type="radio" name="gender" value="Other"> Other
              </label>
            </div>
            <div class="form-group">
              <label>Date:</label>
              <input type="date" name="dob" value="" placeholder="enter your dob" required class="form-control">
            </div>
            <div class="form-group">
              <label>Address :</label>
              <input type="textarea" name="address" value="" placeholder="enter your address" required class="form-control">
            </div>
            <input id="submitbtn" disabled="" type="submit" name="addnew" class="btn btn-success" value="Add New">
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>