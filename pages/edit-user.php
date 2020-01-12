<?php
	include '../components/navigation.php';
	include '../styles.php';
	include '../requests/session.php';
	?>
<html>
	<head>
		<title>DCC | Edit User</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm">
				</div>
				<div class="col-sm mt-5">
					<hr>
					<form action="../requests/update-user.php" method="post">
						<div class="form-group">
							<label>First Name</label>
							<input type="text" class="form-control" name="firstname" placeholder="" value="<?php echo $_POST['firstname']?>">
						</div>
						<div class="form-group">
							<label>Middle Name</label>
							<input type="text" class="form-control" name="middlename" placeholder="" value="<?php echo $_POST['middlename']?>">
						</div>
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" class="form-control" name="lastname" placeholder="" value="<?php echo $_POST['lastname']?>">
						</div>
						<div class="form-group">
							<label>Address</label>
							<input type="text" class="form-control" name="address" placeholder="" value="<?php echo $_POST['address']?>">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="email" placeholder="" value="<?php echo $_POST['email']?>">
							<small>Changing your email will change your login information.</small>
						</div>
						<input type="text" name="id" value="<?php echo $_POST['id']?>" hidden>
						<button type="submit" class="btn btn-dark">Update User</button>
					</form>
					<hr>
				</div>
				<div class="col-sm">
				</div>
			</div>
		</div>
	</body>
</html>