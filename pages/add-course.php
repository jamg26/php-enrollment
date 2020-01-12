<?php
	include '../components/navigation.php';
	include '../styles.php';
	include '../db.php';
	include '../requests/session.php';
	?>
<html>
	<head>
		<title>DCC | Add Course</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm">
				</div>
				<div class="col-sm-6 mt-5">
					<hr>
					<form action="../requests/add-course.php" method="post">
						<div class="form-group">
							<label for="exampleInputEmail1">Code</label>
							<input type="text" name="code" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Description</label>
							<input type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Department</label>
							<select class="form-control" name="department" id="exampleFormControlSelect1">
								<?php
									$sql = "select * from department";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
									    while ($row = $result->fetch_assoc()) {
									        $course = $row['code'];
									        ?>
								<option>
									<?php echo $course; ?>
								</option>
								<?php }} ?>
							</select>
						</div>
						<button type="submit" class="btn btn-dark">Add Course</button>
					</form>
					<hr>
				</div>
				<div class="col-sm">
				</div>
			</div>
		</div>
	</body>
</html>