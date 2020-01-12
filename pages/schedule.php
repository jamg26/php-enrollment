<?php
	include '../components/navigation.php';
	include '../styles.php';
	include '../db.php';
	include '../requests/session.php';
	?>
<html>
	<head>
		<title>DCC | Schedules</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm">
				</div>
				<div class="col-sm-10">
					<?php
						if(@$_GET['deleted'] == 'true') {
						    echo '<div class="text-success">Schedule deleted!</div>';
						} else if(@$_GET['deleted'] == 'false') {
						    echo '<div class="text-danger">Failed!</div>';
						}
						if(@$_GET['updated'] == 'true') {
						    echo '<div class="text-success">Schedule updated!</div>';
						} else if(@$_GET['updated'] == 'false') {
						    echo '<div class="text-danger">Failed!</div>';
						}
						if(@$_GET['added'] == 'true') {
						    echo '<div class="text-success">Schedule added!</div>';
						} else if(@$_GET['updated'] == 'false') {
						    echo '<div class="text-danger">Failed!</div>';
						}
						
						?>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Subject</th>
								<th scope="col">Time</th>
								<th scope="col">Room</th>
								<th scope="col">Instructor</th>
								<th scope="col">Semester</th>
								<th scope="col">Term</th>
								<th scope="col">Year</th>
								<th scope="col"><button type="button" onclick="window.location.href='./add-schedule.php'" class="btn btn-info"><i class="fas fa-plus"></i></button></th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql = "select * from schedule";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
								    while ($row = $result->fetch_assoc()) {
								        ?>
							<tr>
								<th scope="row"><?php echo $row['subject'] ?></th>
								<td><?php echo $row['time'] ?></td>
								<td><?php echo $row['room'] ?></td>
								<td><?php echo $row['instructor'] ?></td>
								<td><?php echo $row['semester'] ?></td>
								<td><?php echo $row['term'] ?></td>
								<td><?php echo $row['year'] ?></td>
								<form action="./edit-schedule.php" method="post">
									<input type="text" name="id" value="<?php echo $row['id'] ?>" hidden/>
									<input type="text" name="subject" value="<?php echo $row['subject'] ?>" hidden/>
									<input type="text" name="time" value="<?php echo $row['time'] ?>" hidden/>
									<input type="text" name="room" value="<?php echo $row['room'] ?>" hidden/>
									<input type="text" name="instructor" value="<?php echo $row['instructor'] ?>" hidden/>
									<input type="text" name="semester" value="<?php echo $row['semester'] ?>" hidden/>
									<input type="text" name="term" value="<?php echo $row['term'] ?>" hidden/>
									<input type="text" name="year" value="<?php echo $row['year'] ?>" hidden/>
									<td><button type="submit" class="btn btn-success"><i class="fas fa-edit"></i></button></td>
								</form>
								<form action="../requests/delete-schedule.php" method="post">
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