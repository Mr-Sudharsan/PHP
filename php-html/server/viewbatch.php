<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>bootstrap-4.3.1-dist/css/bootstrap.min.css">
	<script type="text/javascript" src="<?php echo $base_url ?>bootstrap-4.3.1-dist/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="../config/controller.js"></script>
</head>
<script type="text/javascript" src="<?php echo $base_url ?>bootstrap-4.3.1-dist/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../config/controller.js"></script>
<?php foreach ($customers as $customer) :  ?>
	<form method="post" id="deleteuser" page="<?= $page; ?>">
		<tr>
			<td><?= $customer['customer_id']; ?></td>
			<td><?= $customer['customer_name']; ?></td>
			<td><?= $customer['customer_age']; ?></td>
			<td><?= $customer['customer_email']; ?></td>
			<td><?= $customer['customer_gender']; ?></td>
			<td><?= $customer['customer_dob']; ?></td>
			<td><?= $customer['customer_address']; ?></td>
			<td><button class='btn btn-danger btn-sm delete-btn' id="<?= $customer['customer_id']; ?>">Delete</button></td>
			<td><a href="edituser.php?customer_id=<?= $customer['customer_id']; ?>&page=<?= $page; ?>" class='btn btn-info'>Edit</a></td>
		</tr>
	</form>
<?php endforeach; ?>

</html>