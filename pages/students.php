<?php
	include '../components/navigation.php';
	include '../styles.php';
	include '../db.php';
	include '../requests/session.php';
	?>
<html>
	<head>
		<title>DCC | Students</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm">
				</div>
				<div class="col-sm-10">
					<?php
						if(@$_GET['deleted'] == 'true') {
						    echo '<div class="text-success">Student deleted!</div>';
						} else if(@$_GET['deleted'] == 'false') {
						    echo '<div class="text-danger">Failed!</div>';
						}
						if(@$_GET['updated'] == 'true') {
						    echo '<div class="text-success">Student updated!</div>';
						} else if(@$_GET['updated'] == 'false') {
						    echo '<div class="text-danger">Failed!</div>';
						}
						if(@$_GET['added'] == 'true') {
						    echo '<div class="text-success">Student added!</div>';
						} else if(@$_GET['added'] == 'false') {
						    echo '<div class="text-danger">Failed!</div>';
						}
						
						?>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">First Name</th>
								<th scope="col">Last Name</th>
								<th scope="col">Course</th>
								<th scope="col"><button type="button" onclick="window.location.href='./add-student.php'" class="btn btn-info"><i class="fas fa-plus"></i></button></th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql = "select * from student";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
								    while ($row = $result->fetch_assoc()) {
								        ?>
							<tr>
								<th scope="row"><?php echo $row['id'] ?></th>
								<td><?php echo $row['firstname'] ?></td>
								<td><?php echo $row['lastname'] ?></td>
								<td><?php echo $row['course'] ?></td>
								<form action="./edit-student.php" method="post">
									<input type="text" name="id" value="<?php echo $row['id'] ?>" hidden/>
									<input type="email" name="email" value="<?php echo $row['email'] ?>" hidden/>
									<input type="password" name="password" value="<?php echo $row['password'] ?>" hidden/>
									<input type="text" name="firstname" value="<?php echo $row['firstname'] ?>" hidden/>
									<input type="text" name="middlename" value="<?php echo $row['middlename'] ?>" hidden/>
									<input type="text" name="lastname" value="<?php echo $row['lastname'] ?>" hidden/>
									<input type="text" name="address" value="<?php echo $row['address'] ?>" hidden/>
									<input type="text" name="gender" value="<?php echo $row['gender'] ?>" hidden/>
									<input type="text" name="birthdate" value="<?php echo $row['birthdate'] ?>" hidden/>
									<input type="text" name="birthplace" value="<?php echo $row['birthplace'] ?>" hidden/>
									<input type="text" name="nationality" value="<?php echo $row['nationality'] ?>" hidden/>
									<input type="text" name="status" value="<?php echo $row['status'] ?>" hidden/>
									<input type="text" name="contact" value="<?php echo $row['contact'] ?>" hidden/>
									<input type="text" name="course" value="<?php echo $row['course'] ?>" hidden/>
									<td><button type="submit" class="btn btn-success"><i class="fas fa-edit"></i></button></td>
								</form>
								<form action="../requests/delete-student.php" method="post">
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