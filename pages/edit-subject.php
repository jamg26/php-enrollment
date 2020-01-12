<?php
	include '../components/navigation.php';
	include '../styles.php';
	include '../requests/session.php';
	?>
<html>
	<head>
		<title>DCC | Edit Subject</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm">
				</div>
				<div class="col-sm mt-5">
					<hr>
					<form action="../requests/update-subject.php" method="post">
						<div class="form-group">
							<label for="exampleInputEmail1">Code</label>
							<input type="text" name="code" class="form-control" value="<?php echo $_POST['code'] ?>" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Name</label>
							<input type="text" name="name" class="form-control" value="<?php echo $_POST['name'] ?>" required>
                        </div>
						<div class="form-group">
							<label for="exampleInputPassword1">Lecture</label>
							<input type="number" name="lec" class="form-control" value="<?php echo $_POST['lec'] ?>" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Laboratory</label>
							<input type="number" name="lab" class="form-control" value="<?php echo $_POST['lab'] ?>" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Prerequisite</label>
							<select class="form-control" name="prereq" id="exampleFormControlSelect1">
								<option>
									None
								</option>
								<?php
									include_once '../db.php';
									$sql = "select * from subject";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
									    while ($row = $result->fetch_assoc()) {
									        $code = $row['code'];
									        ?>
								<option <?php if($code == $_POST['prereq']) echo 'selected'; ?>>
									<?php echo $code; ?>
								</option>
								<?php }} ?>
							</select>
						</div>
                        <input type="text" name="id" value="<?php echo $_POST['id'] ?>" hidden>
						<button type="submit" class="btn btn-dark">Update Subject</button>
					</form>
					<hr>
				</div>
				
				<div class="col-sm">
				</div>
			</div>
		</div>
	</body>
</html>