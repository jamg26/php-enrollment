<?php
	include '../components/navigation.php';
	include '../styles.php';
	include '../db.php';
	include '../requests/session.php';
	?>
<html>
	<head>
		<title>DCC | Instructors</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm">
				</div>
				<div class="col-sm-6">
					<?php
						if(@$_GET['deleted'] == 'true') {
						    echo '<div class="text-success">Instructor deleted!</div>';
						} else if(@$_GET['deleted'] == 'false') {
						    echo '<div class="text-danger">Failed!</div>';
						}
						if(@$_GET['updated'] == 'true') {
						    echo '<div class="text-success">Instructor updated!</div>';
						} else if(@$_GET['updated'] == 'false') {
						    echo '<div class="text-danger">Failed!</div>';
						}
						if(@$_GET['added'] == 'true') {
						    echo '<div class="text-success">Instructor added!</div>';
						} else if(@$_GET['updated'] == 'false') {
						    echo '<div class="text-danger">Failed!</div>';
						}
						
						?>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Name</th>
								<th scope="col"><button type="button" onclick="window.location.href='./add-instructor.php'" class="btn btn-info"><i class="fas fa-plus"></i></button></th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql = "select * from instructor";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
								    while ($row = $result->fetch_assoc()) {
								        ?>
							<tr>
								<th scope="row"><?php echo $row['id'] ?></th>
								<td><?php echo $row['name'] ?></td>
								<form action="./edit-instructor.php" method="post">
									<input type="text" name="id" value="<?php echo $row['id'] ?>" hidden/>
									<input type="text" name="name" value="<?php echo $row['name'] ?>" hidden/>
									<td><button type="submit" class="btn btn-success"><i class="fas fa-edit"></i></button></td>
								</form>
								<form action="../requests/delete-instructor.php" method="post">
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