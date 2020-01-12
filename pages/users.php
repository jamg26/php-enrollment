<?php
	include '../components/navigation.php';
	include '../styles.php';
	include '../db.php';
	include '../requests/session.php';
	?>
<html>
	<head>
		<title>DCC | Users</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm">
				</div>
				<div class="col-sm-10">
					<?php
						if(@$_GET['deleted'] == 'true') {
						    echo '<div class="text-success">User deleted!</div>';
						} else if(@$_GET['deleted'] == 'false') {
						    echo '<div class="text-danger">Failed!</div>';
						}
						if(@$_GET['updated'] == 'true') {
						    echo '<div class="text-success">User updated!</div>';
						} else if(@$_GET['updated'] == 'false') {
						    echo '<div class="text-danger">Failed!</div>';
						}
						
						?>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">First Name</th>
								<th scope="col">Middle Name</th>
								<th scope="col">Last Name</th>
								<th scope="col">Address</th>
								<th scope="col">Email</th>
								<th scope="col"><button type="button" onclick="window.location.href='./signup.php'" class="btn btn-info"><i class="fas fa-plus"></i></button></th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql = "select * from users";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
								    while ($row = $result->fetch_assoc()) {
								        ?>
							<tr>
								<th scope="row"><?php echo $row['id'] ?></th>
								<td><?php echo $row['firstname'] ?></td>
								<td><?php echo $row['middlename'] ?></td>
								<td><?php echo $row['lastname'] ?></td>
								<td><?php echo $row['address'] ?></td>
								<td><?php echo $row['email'] ?></td>
								<form action="./edit-user.php" method="post">
									<input type="text" name="id" value="<?php echo $row['id'] ?>" hidden/>
									<input type="text" name="firstname" value="<?php echo $row['firstname'] ?>" hidden/>
									<input type="text" name="middlename" value="<?php echo $row['middlename'] ?>" hidden/>
									<input type="text" name="lastname" value="<?php echo $row['lastname'] ?>" hidden/>
									<input type="text" name="address" value="<?php echo $row['address'] ?>" hidden/>
									<input type="text" name="email" value="<?php echo $row['email'] ?>" hidden/>
									<td><button type="submit" class="btn btn-success"><i class="fas fa-edit"></i></button></td>
								</form>
								<form action="../requests/delete-user.php" method="post">
									<input type="text" name="id" value="<?php echo $row['id'] ?>" hidden/>
									<td><button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
								</form>
								<?php }
									} ?>
						</tbody>
					</table>
				</div>
				<div class="col-sm">
				</div>
			</div>
		</div>
	</body>
</html>