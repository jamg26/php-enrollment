<?php
	include '../components/navigation.php';
	include '../styles.php';
	include '../db.php';
	include '../requests/session.php';
	?>
<html>
	<head>
		<title>DCC | Subject</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm">
				</div>
				<div class="col-sm-10">
					<?php
						if(@$_GET['deleted'] == 'true') {
						    echo '<div class="text-success">Subject deleted!</div>';
						} else if(@$_GET['deleted'] == 'false') {
						    echo '<div class="text-danger">Failed!</div>';
						}
						if(@$_GET['updated'] == 'true') {
						    echo '<div class="text-success">Subject updated!</div>';
						} else if(@$_GET['updated'] == 'false') {
						    echo '<div class="text-danger">Failed!</div>';
						}
						if(@$_GET['added'] == 'true') {
						    echo '<div class="text-success">Subject added!</div>';
						} else if(@$_GET['updated'] == 'false') {
						    echo '<div class="text-danger">Failed!</div>';
						}
						
						?>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Code</th>
								<th scope="col">Name</th>
								<th scope="col">Lecture</th>
								<th scope="col">Laboratory</th>
								<th scope="col">Units</th>
								<th scope="col">Prerequisite</th>
								<th scope="col"><button type="button" onclick="window.location.href='./add-subject.php'" class="btn btn-info"><i class="fas fa-plus"></i></button></th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql = "select * from subject";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
								    while ($row = $result->fetch_assoc()) {
								        ?>
							<tr>
								<th scope="row"><?php echo $row['code'] ?></th>
								<td><?php echo $row['name'] ?></td>
								<td><?php echo $row['lec'] ?></td>
								<td><?php echo $row['lab'] ?></td>
								<td><?php echo $row['total'] ?></td>
								<td><?php echo $row['prereq'] ?></td>
								<form action="./edit-subject.php" method="post">
									<input type="text" name="id" value="<?php echo $row['id'] ?>" hidden/>
									<input type="text" name="code" value="<?php echo $row['code'] ?>" hidden/>
									<input type="text" name="name" value="<?php echo $row['name'] ?>" hidden/>
									<input type="text" name="lec" value="<?php echo $row['lec'] ?>" hidden/>
									<input type="text" name="lab" value="<?php echo $row['lab'] ?>" hidden/>
									<input type="text" name="prereq" value="<?php echo $row['prereq'] ?>" hidden/>
									<td><button type="submit" class="btn btn-success"><i class="fas fa-edit"></i></button></td>
								</form>
								<form action="../requests/delete-subject.php" method="post">
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