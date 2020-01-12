<?php
	include '../components/navigation.php';
	include '../styles.php';
	if(!isset($_SESSION['user'])) {
	    header('location: ./signin.php');
	}
	
	?>
<html>
	<head>
		<title>DCC | Add User</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm">
				</div>
				<div class="col-sm">
					<form action="../requests/signup.php" method="post">
						<?php if(isset($_GET['success'])){
							if($_GET['success'] == 'true') {echo '<div class="text-success">Success!</div>';}
							if($_GET['success'] == 'false') {echo '<div class="text-danger">Failed!</div>';}
							} ?>
						<div class="form-group">
							<label >Email address</label>
							<input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
							<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" name="password" placeholder="Password" required>
						</div>
						<div class="form-group">
							<label>First Name</label>
							<input type="text" class="form-control" name="firstname" placeholder="">
						</div>
						<div class="form-group">
							<label>Middle Name</label>
							<input type="text" class="form-control" name="middlename" placeholder="">
						</div>
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" class="form-control" name="lastname" placeholder="">
						</div>
						<div class="form-group">
							<label>Address</label>
							<input type="text" class="form-control" name="address" placeholder="">
						</div>
						<button type="submit" class="btn btn-primary">Sign Up</button>
					</form>
				</div>
				<div class="col-sm">
				</div>
			</div>
		</div>
	</body>
</html>