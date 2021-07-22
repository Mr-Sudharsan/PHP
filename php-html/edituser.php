<html>

<head>
    <title>Add User</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    
</head>
<?php

require_once 'database.php';
?>
<div class="container">
    <?php

    $customer_id = $_GET['customer_id'];
    if (isset($_POST['update'])) {

        if (
            empty($_POST['name']) || empty($_POST['age']) || empty($_POST['email']) || empty($_POST['gender'])
            || empty($_POST['dob']) || empty($_POST['address'])
        ) {
            echo "Please fillout all required fields";
        } else {
            $customer_name = $_POST['name'];
            $customer_age = $_POST['age'];
            $customer_email = $_POST['email'];
            $customer_gender = $_POST['gender'];
            $customer_dob = $_POST['dob'];
            $customer_address = $_POST['address'];

            $sql = "UPDATE customer SET customer_name ='{$customer_name}', customer_age='{$customer_age}', customer_email='{$customer_email}', 
            customer_gender='{$customer_gender}', customer_dob='{$customer_dob}', customer_address='{$customer_address}' 
            WHERE customer_id='{$customer_id}'";

            if (mysqli_query($con, $sql)) {
                http_response_code(201);
                $url="https://localhost/php-html/viewuser.php";
                echo '<script language="javascript">window.location.href ="'.$url.'"</script>';
            } else {
                http_response_code(422);
            }
        }
    }
    // $customer_id=$_GET['customer_id'];

    $sql = "SELECT * FROM customer WHERE customer_id=" . $customer_id;
    $result = mysqli_query($con, $sql);

    // if($result->num_rows < 1){
    // 	header('Location: index.php');
    // 	exit;
    // }
    $row = mysqli_fetch_assoc($result);
    ?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box">
                <h3>MODIFY User</h3>
                <form method="post" action="">
                    <input type="hidden" value="<?php echo $row['customer_id']; ?>" name="customer_id">     
                    <label>Name :</label>
                    <input type="text" name="name" id="name" value="<?php echo $row['customer_name'] ?>" placeholder="enter your name" required class="form-control" autofocus></br>
                    <label>Age :</label>
                    <input type="number" name="age" value="<?php echo $row['customer_age'] ?>" placeholder="enter your age" required class="form-control"></br>
                    <label>Email :</label>
                    <input type="email" name="email" value="<?php echo $row['customer_email'] ?>" placeholder="enter your email" required class="form-control"></br>
                    <label>Gender :</label>
                    <label class="form-control">
                        <input type="radio" name="gender" value="male"<?php if ($row['customer_gender']=="male") echo "checked"?>>Male
                        <input type="radio" name="gender" value="female"<?php if ($row['customer_gender']=="female") echo "checked"?>>Female
                        <input type="radio" name="gender" value="other" <?php if ($row['customer_gender']=="other") echo "checked"?>>Other</label></br>
                    <label>Date:</label>
                    <input type="date" name="dob" value="<?php echo $row['customer_dob'] ?>" required class="form-control"></br>
                    <label>Address :</label>
                    <input type="textarea" name="address" value="<?php echo $row['customer_address'] ?>" placeholder="enter your address" required class="form-control"></br>
                    <input type="submit" name="update" class="btn btn-success" value="Update">
                </form>
            </div>
        </div>
    </div>
</div>

</html>