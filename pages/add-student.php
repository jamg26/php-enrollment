<?php
	include '../components/navigation.php';
	include '../styles.php';
	include '../db.php';
	include '../requests/session.php';
	?>
<html>
	<head>
		<title>DCC | Add Student</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm">
				</div>
				<div class="col-sm-6 mt-5">
					<hr>
					<form action="../requests/add-student.php" method="post">
						<div class="form-group">
							<label for="exampleInputEmail1">Email</label>
							<input type="email" name="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Password</label>
							<input type="password" name="password" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">First Name</label>
							<input type="text" name="firstname" class="form-control"  required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Middle Name</label>
							<input type="text" name="middlename" class="form-control">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Last Name</label>
							<input type="text" name="lastname" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Address</label>
							<input type="text" name="address" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Gender</label>
							<select class="form-control" name="gender">
								<option>
									Male
								</option>
								<option>
									Female
								</option>
								<option>
									Prefer not to say
								</option>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Birth Date</label>
							<input type="date" name="birthdate" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Birth Place</label>
							<input type="text" name="birthplace" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Nationality</label>
							<input type="text" name="nationality" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Status</label>
							<select class="form-control" name="status">
								<option>
									Single
								</option>
								<option>
									Married
								</option>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Contact</label>
							<input type="text" name="contact" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Course</label>
							<select class="form-control" name="course" id="exampleFormControlSelect1">
								<?php
									$sql = "select * from course";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
									    while ($row = $result->fetch_assoc()) {
									        $department = $row['code'];
									        ?>
								<option>
									<?php echo $department; ?>
								</option>
								<?php }} ?>
							</select>
						</div>
						<button type="submit" class="btn btn-dark">Add Student</button>
					</form>
					<hr>
				</div>
				<div class="col-sm">
				</div>
			</div>
		</div>
	</body>
</html>