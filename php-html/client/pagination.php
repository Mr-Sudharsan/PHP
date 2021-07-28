<?php
include '../index/index.php';
include '../server/view.php';
?>
<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>bootstrap-4.3.1-dist/css/bootstrap.min.css">
</head>

<body>
	<div class="container well">
		<h1 class="text-center">Customers List</h1>
		<div class="row">
		</div>
		<div style="height: 600px; overflow-y: auto;">
			<table id="" class="table table-striped table-bordered">
				<thead>
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
				</thead>
				<tbody>
					<?php include '../server/viewbatch.php'; ?>
				</tbody>
			</table>
			<div class="col-md-10">
				<nav aria-label="Page navigation">
					<ul class="pagination justify-content-center">
						<li class="page-item"><strong><?php echo "Page no:" . $page ?></strong></li>
						<li class="page-item">
							<a class="page-link" href="pagination.php?page=<?= $Previous; ?>" aria-label="Previous">
								<span aria-hidden="true">&laquo; Previous</span>
							</a>
						</li>
						<?php for ($i = 1; $i <= $pages; $i++) : ?>
							<li class="page-item"><a class="page-link" href="pagination.php?page=<?= $i; ?>"><?= $i; ?></a></li>
						<?php endfor; ?>
						<li class="page-item">
							<a class="page-link" href="pagination.php?page=<?= $Next; ?>" aria-label="Next">
								<span aria-hidden="true">Next &raquo;</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
			<div style="text-align:left; color:black;"></div>
		</div>

	</div>
</body>

</html>