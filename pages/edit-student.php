<?php
	include '../components/navigation.php';
	include '../styles.php';
	include '../db.php';
	include '../requests/session.php';
	?>
<html>
	<head>
		<title>DCC | Edit Student</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm">
				</div>
				<div class="col-sm-6 mt-5">
					<hr>
					<form action="../requests/update-student.php" method="post">
						<div class="form-group">
							<label for="exampleInputEmail1">Email</label>
							<input type="email" name="email" class="form-control" value="<?php echo $_POST['email']?>" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Password</label>
							<input type="password" name="password" class="form-control" value="<?php echo $_POST['password']?>" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">First Name</label>
							<input type="text" name="firstname" class="form-control" value="<?php echo $_POST['firstname']?>" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Middle Name</label>
							<input type="text" name="middlename" class="form-control" value="<?php echo $_POST['middlename']?>">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Last Name</label>
							<input type="text" name="lastname" class="form-control" value="<?php echo $_POST['lastname']?>" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Address</label>
							<input type="text" name="address" class="form-control" value="<?php echo $_POST['address']?>" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Gender</label>
							<select class="form-control" name="gender">
								<option <?php if ($_POST['gender'] == 'Male') echo 'selected'; ?>>
									Male
								</option>
								<option <?php if ($_POST['gender'] == 'Female') echo 'selected'; ?>>
									Female
								</option>
								<option <?php if ($_POST['gender'] == 'Prefer not to say') echo 'selected'; ?>>
									Prefer not to say
								</option>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Birth Date</label>
							<input type="date" name="birthdate" class="form-control" value="<?php echo $_POST['birthdate']?>" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Birth Place</label>
							<input type="text" name="birthplace" class="form-control" value="<?php echo $_POST['birthplace']?>" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Nationality</label>
							<input type="text" name="nationality" class="form-control" value="<?php echo $_POST['nationality']?>" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Status</label>
							<select class="form-control" name="status" value="<?php echo $_POST['status']?>">
								<option <?php if ($_POST['status'] == 'Single') echo 'selected'; ?>>
									Single
								</option>
								<option <?php if ($_POST['status'] == 'Married') echo 'selected'; ?>>
									Married
								</option>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Contact</label>
							<input type="text" name="contact" class="form-control" value="<?php echo $_POST['contact']?>" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Course</label>
							<select class="form-control" name="course" id="exampleFormControlSelect1" value="<?php echo $_POST['gender']?>">
								<?php
									$sql = "select * from course";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
									    while ($row = $result->fetch_assoc()) {
									        $department = $row['code'];
									        ?>
								<option <?php if ($_POST['course'] == $department) echo 'selected'; ?>>
									<?php echo $department; ?>
								</option>
								<?php }} ?>
							</select>
						</div>
						<input type="text" name="id" value="<?php echo $_POST['id']?>" hidden>
						<button type="submit" class="btn btn-dark">Edit Student</button>
					</form>
					<hr>
				</div>
				<div class="col-sm">
				</div>
			</div>
		</div>
	</body>
</html>