<?php
	include '../components/navigation.php';
	include '../styles.php';
	include '../db.php';
	include '../requests/session.php';
	?>
<html>
	<head>
		<title>DCC | Edit Instructor</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm">
				</div>
				<div class="col-sm-6 mt-5">
					<hr>
					<form action="../requests/update-instructor.php" method="post">
						<div class="form-group">
							<label for="exampleInputEmail1">Name</label>
							<input type="text" name="name" class="form-control" value="<?php echo $_POST['name'] ?>" required>
						</div>
                        <input type="text" name="id" value="<?php echo $_POST['id'] ?>" hidden>
						<button type="submit" class="btn btn-dark">Update Instructor</button>
					</form>
					<hr>
				</div>
				<div class="col-sm">
				</div>
			</div>
		</div>
	</body>
</html>