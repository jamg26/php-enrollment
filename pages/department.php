<?php
	include '../components/navigation.php';
	include '../styles.php';
	include '../db.php';
	include '../requests/session.php';
	?>
<html>
	<head>
		<title>DCC | Department</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm">
				</div>
				<div class="col-sm-10">
					<?php
						if(@$_GET['deleted'] == 'true') {
						    echo '<div class="text-success">Department deleted!</div>';
						} else if(@$_GET['deleted'] == 'false') {
						    echo '<div class="text-danger">Failed!</div>';
						}
						if(@$_GET['updated'] == 'true') {
						    echo '<div class="text-success">Department updated!</div>';
						} else if(@$_GET['updated'] == 'false') {
						    echo '<div class="text-danger">Failed!</div>';
						}
						if(@$_GET['added'] == 'true') {
						    echo '<div class="text-success">Department added!</div>';
						} else if(@$_GET['added'] == 'false') {
						    echo '<div class="text-danger">Failed!</div>';
						}
						
						?>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Code</th>
								<th scope="col">Description</th>
								<th scope="col">Head</th>
								<th scope="col"><button type="button" onclick="window.location.href='./add-department.php'" class="btn btn-info"><i class="fas fa-plus"></i></button></th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql = "select * from department";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
								    while ($row = $result->fetch_assoc()) {
								        ?>
							<tr>
								<th scope="row"><?php echo $row['code'] ?></th>
								<td><?php echo $row['description'] ?></td>
								<td><?php echo $row['head'] ?></td>
								<form action="./edit-department.php" method="post">
									<input type="text" name="id" value="<?php echo $row['id'] ?>" hidden/>
									<input type="text" name="code" value="<?php echo $row['code'] ?>" hidden/>
									<input type="text" name="description" value="<?php echo $row['description'] ?>" hidden/>
									<input type="text" name="head" value="<?php echo $row['head'] ?>" hidden/>
									<td><button type="submit" class="btn btn-success"><i class="fas fa-edit"></i></button></td>
								</form>
								<form action="../requests/delete-department.php" method="post">
									<input type="text" name="department" value="<?php echo $row['id'] ?>" hidden/>
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