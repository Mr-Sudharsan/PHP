<html>
<?php $base_url = 'http://localhost:1011/php-html/' ?>

<head>
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>bootstrap-4.3.1-dist/css/bootstrap.min.css">
</head>

<body>
    <div class="menu">
        <nav id="main-navigation">
            <ul>
                <a class="btn btn-primary" href="<?php echo $base_url ?>client/adduser.php">Add User</a>
                <a class="btn btn-primary" href="<?php echo $base_url ?>client/viewuser.php">View All user</a>
                <a class="btn btn-primary" href="<?php echo $base_url ?>client/pagination.php">View user Pagination </a>

            </ul>
        </nav>
    </div>
</body>

</html>