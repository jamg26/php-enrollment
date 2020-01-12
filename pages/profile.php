<?php
	include '../components/navigation.php';
	include '../styles.php';
	include '../requests/session.php';
	?>
<html>
	<head>
		<title>DCC | Profile</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm">
					<!-- <img src="../images/profiles/15-001161.jpg" alt="..." class="img-thumbnail rounded mt-5" width="100px"/> -->
					<p>
					<h1><?php echo $_SESSION['user'][1] ?> <?php echo $_SESSION['user'][2] ?> <?php echo $_SESSION['user'][3] ?></h1>
					</p>
					<p>Student ID: <?php echo $_SESSION['user'][0] ?></p>
					<p>Email: <?php echo $_SESSION['user'][5] ?></p>
					<p>Birthday: </p>
					<p>Address: <?php echo $_SESSION['user'][4] ?></p>
					<p>Status: </p>
					<p>Nationality: </p>
					<p>Contact: </p>
				</div>
				<div class="col-sm">
					<p class="mt-5">Department: </p>
					<p>Course: </p>
					<p>Year: </p>
					<a href="../components/studentload.php" onclick="window.open('../components/studentload.php',
						'newwindow',
						'width=800,height=600');
						return false;">Student Load</a>
				</div>
			</div>
			<h1>Schedule</h1>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Subj. Code</th>
						<th scope="col">Description</th>
						<th scope="col">Room</th>
						<th scope="col">Time</th>
						<th scope="col">Instructor</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">-</th>
						<td>-</td>
						<td>-</td>
						<td>-</td>
						<td>-</td>
					</tr>
				</tbody>
			</table>
		</div>
	</body>
</html>