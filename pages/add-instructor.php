<?php
	include '../components/navigation.php';
	include '../styles.php';
	include '../db.php';
	include '../requests/session.php';
	?>
<html>
	<head>
		<title>DCC | Add Instructor</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm">
				</div>
				<div class="col-sm-6 mt-5">
					<hr>
					<form action="../requests/add-instructor.php" method="post">
						<div class="form-group">
							<label for="exampleInputEmail1">Name</label>
							<input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>
						</div>
						<button type="submit" class="btn btn-dark">Add Instructor</button>
					</form>
					<hr>
				</div>
				<div class="col-sm">
				</div>
			</div>
		</div>
	</body>
</html>