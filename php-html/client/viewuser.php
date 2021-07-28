<html>
<?php require '../index/index.php';
?>

<head>
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>bootstrap-4.3.1-dist/css/bootstrap.min.css">
</head>
<script type="text/javascript" src="<?php echo $base_url ?>bootstrap-4.3.1-dist/jquery-3.6.0.min.js"></script>
<script>
    $(document).on("click", ".delete-btn", function() {
        // e.preventDefault();
        var customer_id = $(this).attr("id");
        if (confirm("Are you sure delete this ?" + customer_id)) {
            var element = this;
            $.ajax({
                url: "<?php echo $base_url ?>server/delete.php",
                type: "POST",
                cache: false,
                data: {
                    "customer_id": customer_id
                },
                success: function(data) {
                    alert("User record deleted successfully");
                }
            });
        }
    });
</script>
<body>
    <?php
    require_once '../config/database.php';

    echo "<button><a href='../index/index.php'>HOME</a></button>";

    $sql     = "SELECT * FROM customer";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
    ?>
        <div class="container">
            <h2>List of all Users</h2>
            <table class="table table-bordered">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Address</th>
                    <th width="70px">Delete</th>
                    <th width="70px">EDIT</th>
                </tr>
                <?php
                $count = 0;
                while ($row = $result->fetch_assoc()) {
                ?>
                    <form action='' method='POST'>
                        <input type='hidden' value='<?php echo $row['customer_id'] ?>' name='customer_id' />
                        <tr>
                            <td><?php echo $row['customer_id'] ?></td>
                            <td><?php echo $row['customer_name'] ?></td>
                            <td><?php echo $row['customer_age'] ?></td>
                            <td><?php echo $row['customer_email'] ?></td>
                            <td><?php echo $row['customer_gender'] ?></td>
                            <td><?php echo $row['customer_dob'] ?></td>
                            <td><?php echo $row['customer_address'] ?></td>
                            <td><button class='btn btn-danger btn-sm delete-btn' id="<?php echo $row['customer_id'] ?>">Delete</button></td>
                            <td><a href="edituser.php?customer_id=<?php echo $row['customer_id'] ?>" class='btn btn-info'>Edit</a></td>
                        </tr>
                    </form>
                <?php
                    $count++;
                }
                ?>
            </table>
        </div>
    <?php
    } else {
        echo "<br><br>No Record Found";
    }
    ?>
    </div>
</body>

</html>