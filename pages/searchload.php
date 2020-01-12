<?php
	include '../components/navigation.php';
	include '../styles.php';
	include '../requests/session.php';
	?>
<html>
	<head>
		<title>DCC | Searchload</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm">
				<?php
					if(@$_GET['deleted'] == 'true') {
						echo '<div class="text-success">Load deleted!</div>';
					} else if(@$_GET['deleted'] == 'false') {
						echo '<div class="text-danger">Failed!</div>';
					}
					if(@$_GET['updated'] == 'true') {
						echo '<div class="text-success">Load updated!</div>';
					} else if(@$_GET['updated'] == 'false') {
						echo '<div class="text-danger">Failed!</div>';
					}
					if(@$_GET['added'] == 'true') {
						echo '<div class="text-success">Load added!</div>';
					} else if(@$_GET['added'] == 'false') {
						echo '<div class="text-danger">Failed!</div>';
					}
					
					?>
				<h1>Search load</h1>
					<form action="./searchload.php" method="get">
						<div class="form-group">
							<input type="text" name="search" class="form-control" value="<?php echo @$_GET['search'] ?>" placeholder="Search Student">
						</div>
						<button type="submit" class="btn btn-primary">Search</button>
					</form>
					<?php 
					if(isset($_GET['search'])) {
						?>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Firstname</th>
								<th scope="col">Lastname</th>
							</tr>
						</thead>
						<tbody>
					<?php
						}
					?>
					<?php
					if(isset($_GET['search'])) {
						include_once "../db.php";
						$student = $_GET['search'];
						$sql = "select * from student where firstname like '%$student%' or lastname like '%$student%'";
						$result = $conn->query($sql);
						$res = array();
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								?>
								<tr>
								<th scope="row"><?php echo $row['id'] ?></th>
								<td><?php echo $row['firstname'] ?></td>
								<td><?php echo $row['lastname'] ?></td>
								<form action="./studentloadhandler.php" method="get">
									<input type="text" name="id" value="<?php echo $row['id'] ?>" hidden/>
									<input type="text" name="firstname" value="<?php echo $row['firstname'] ?>" hidden/>
									<input type="text" name="lastname" value="<?php echo $row['lastname'] ?>" hidden/>
									<!-- <input type="text" name="loadrow" value="1" hidden> -->
									<td><button type="submit" class="btn btn-success"><i class="fas fa-eye"></i></button></td>
								</form>
								</tr>
								<?php
							}
						}
					}
					?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>