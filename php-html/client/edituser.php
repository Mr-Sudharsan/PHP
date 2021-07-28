<?php
require '../index/index.php';
require_once '../config/database.php';
$page = $_GET['page'];
?>
<html>
<head>
  <title>Add User</title>
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>bootstrap-4.3.1-dist/css/bootstrap.min.css">
  </head>
  <script type="text/javascript" src="<?php echo $base_url ?>bootstrap-4.3.1-dist/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../config/controller.js"></script>
  <script>
    function emailVal(str) {
      if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "Empty";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            resp = JSON.parse(this.responseText);
            status = resp.status;
            if (status == 0) {
              $('#submitbtn').removeAttr('disabled');
            } else if (status == 1) {
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

<div class="container">
   <?php

  $customer_id = $_GET['customer_id'];
  $sql = "SELECT * FROM customer WHERE customer_id=" . $customer_id;
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($result);
  ?>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="box">
        <h3>MODIFY User</h3>
        <form id="edituser" >
        <input type="hidden" id="page" page="<?=$page?>">
          <input type="hidden" value="<?php echo $row['customer_id']; ?>" name="customer_id">
          <div class="form-group">
            <label>Name :</label>
            <input type="text" name="name" id="name" value="<?php echo $row['customer_name'] ?>" required class="form-control" autofocus>
          </div>
          <div class="form-group">
            <label>Age :</label>
            <input type="number" name="age" value="<?php echo $row['customer_age'] ?>" required class="form-control">
          </div>
          <div class="form-group">
            <label>Email :</label>
            <input type="email" name="email" value="<?php echo $row['customer_email'] ?>" onchange="emailVal(this.value)" required class="form-control">
            <p><span id="txtHint"></span></p>
          </div>
          <div class="form-group">
            <label>Gender :</label>
            <label class="form-control">
              <input type="radio" name="gender" value="Male" <?php if ($row['customer_gender'] == "Male") echo "checked" ?>>Male
              <input type="radio" name="gender" value="Female" <?php if ($row['customer_gender'] == "Female") echo "checked" ?>>Female
              <input type="radio" name="gender" value="Other" <?php if ($row['customer_gender'] == "Other") echo "checked" ?>>Other
            </label>
          </div>
          <div class="form-group">
            <label>Date:</label>
            <input type="date" name="dob" value="<?php echo $row['customer_dob'] ?>" required class="form-control">
          </div>
          <div class="form-group">
            <label>Address :</label>
            <input type="textarea" name="address" value="<?php echo $row['customer_address'] ?>" required class="form-control">
          </div>
          <input id="submitbtn" type="submit" name="update" class="btn btn-success" value="Update">
        </form>
      </div>
    </div>
  </div>
</div>
</html>