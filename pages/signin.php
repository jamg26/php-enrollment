<?php
	include '../components/navigation.php';
	include '../styles.php';
	if(isset($_SESSION['user'])) {
	    header('location: ../');
	}
	?>
<html>
	<head>
		<title>DCC | Sign In</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm">
				</div>
				<div class="mt-5">
					<hr>
					<div class="col-sm">
						<?php if(isset($_GET['logout'])) { echo '<div class="text-success">Logout success.</div>'; }  ?>
						<form action="../requests/signin.php" method="post">
							<div class="form-group">
								<?php if(isset($_GET['invalid'])) {
									echo '<div class="text-danger">Invalid email/password.</div>';
									} ?>
								<label for="exampleInputEmail1">Email address</label>
								<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
								<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
							</div>
							<button type="submit" class="btn btn-dark">Sign In</button>
							<hr>
						</form>
					</div>
				</div>
				<div class="col-sm">
				</div>
			</div>
		</div>
	</body>
</html>