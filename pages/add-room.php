<?php
	include '../components/navigation.php';
	include '../styles.php';
	include '../requests/session.php';
	?>
<html>
	<head>
		<title>DCC | Add Room</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm">
				</div>
				<div class="col-sm mt-5">
					<hr>
					<form action="../requests/add-room.php" method="post">
						<div class="form-group">
							<?php if (isset($_GET['success'])) { echo '<div class="text-success">Added!</div>'; }?>
							<?php if (isset($_GET['invalid'])) { echo '<div class="text-danger">Invalid!</div>'; }?>
							<label for="exampleInputEmail1">Name</label>
							<input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Location</label>
							<input type="text" name="location" class="form-control" id="exampleInputPassword1" placeholder="" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Capacity</label>
							<input type="number" name="capacity" class="form-control" id="exampleInputPassword1" placeholder="" required>
						</div>
						<button type="submit" class="btn btn-dark">Add Room</button>
					</form>
					<hr>
				</div>
				<div class="col-sm">
				</div>
			</div>
		</div>
	</body>
</html>