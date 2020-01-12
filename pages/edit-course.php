<?php
	include '../components/navigation.php';
	include '../styles.php';
	include '../db.php';
	include '../requests/session.php';
	?>
<html>
	<head>
		<title>DCC | Edit Course</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm">
				</div>
				<div class="col-sm-6 mt-5">
					<hr>
					<form action="../requests/update-course.php" method="post">
						<div class="form-group">
							<?php if (isset($_GET['success'])) { echo '<div class="text-success">Updated!</div>'; }?>
							<?php if (isset($_GET['invalid'])) { echo '<div class="text-danger">Invalid!</div>'; }?>
							<label for="exampleInputEmail1">Code</label>
							<input type="text" name="code" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $_POST['code']?>" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Description</label>
							<input type="text" name="description" class="form-control" id="exampleInputPassword1" value="<?php echo $_POST['description']?>" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Department</label>
							<select class="form-control" name="department" id="exampleFormControlSelect1">
								<?php
									$sql = "select * from department";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
									    while ($row = $result->fetch_assoc()) {
									        $department = $row['code'];
									        ?>
								<option <?php if($_POST['department'] == $department) echo 'selected'?>>
									<?php echo $department; ?>
								</option>
								<?php }} ?>
							</select>
						</div>
						<input type="text" name="id" value="<?php echo $_POST['id']?>" hidden>
						<button type="submit" class="btn btn-dark">Edit Course</button>
					</form>
					<hr>
				</div>
				<div class="col-sm">
				</div>
			</div>
		</div>
	</body>
</html>