<?php
	include '../components/navigation.php';
	include '../styles.php';
	include '../requests/session.php';
	?>
<html>
	<head>
		<title>DCC | Edit Room</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm">
				</div>
				<div class="col-sm mt-5">
					<hr>
					<form action="../requests/update-room.php" method="post">
						<div class="form-group">
							<label for="exampleInputEmail1">Name</label>
							<input type="text" name="name" value="<?php echo $_POST['name']?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Location</label>
							<input type="text" name="location" value="<?php echo $_POST['location']?>" class="form-control" id="exampleInputPassword1" placeholder="" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Capacity</label>
							<input type="number" name="capacity" value="<?php echo $_POST['capacity']?>" class="form-control" id="exampleInputPassword1" placeholder="" required>
						</div>
						<input type="text" name="id" value="<?php echo $_POST['id']?>" hidden>
						<button type="submit" class="btn btn-dark">Update Room</button>
					</form>
					<hr>
				</div>
				<div class="col-sm">
				</div>
			</div>
		</div>
	</body>
</html>