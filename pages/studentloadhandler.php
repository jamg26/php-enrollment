<?php
	include '../components/navigation.php';
	include '../styles.php';
	include '../db.php';
	include '../requests/session.php';
	?>
<html>
	<head>
		<title>DCC | Studentload</title>
	</head>
	<body>
		<div class="container">
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
					} else if(@$_GET['added'] == 'false') {
						echo '<div class="text-danger">Failed!</div>';
					}
					
					?>
			<div class="row" id="studentInfo">
				<div class="col-sm">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID</label>
                        <input type="text" name="id" class="form-control" value="<?php echo $_GET['id'] ?>" disabled>
                    </div>
				</div>
				<div class="col-sm">
                        <div class="form-group">
							<label for="exampleInputEmail1">First Name</label>
							<input type="text" name="firstname" class="form-control" value="<?php echo $_GET['firstname'] ?>" disabled>
						</div>
				</div>
				<div class="col-sm">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Last Name</label>
                        <input type="text" name="lastname" class="form-control" value="<?php echo $_GET['lastname'] ?>" disabled>
                        
                        
                    </div>
				</div>
			</div>
			<form action="./studentloadhandler.php" method="get">
				<div class="form-group">
					<input type="text" name="id" class="form-control" value="<?php echo $_GET['id'] ?>" hidden>
					<input type="text" name="firstname" class="form-control" value="<?php echo $_GET['firstname'] ?>" hidden>
					<input type="text" name="lastname" class="form-control" value="<?php echo $_GET['lastname'] ?>" hidden>
					<input type="text" name="searchSub" class="form-control" placeholder="Search Subject">
				</div>
				<button type="submit" class="btn btn-primary">Search</button>
			</form>

			<!-- Search subject -->
			<?php 
					if(isset($_GET['searchSub'])) {
						?>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Schedule Code</th>
								<th scope="col">Subject</th>
								<th scope="col">Time</th>
								<th scope="col">Semester</th>
								<th scope="col">Term</th>
							</tr>
						</thead>
						<tbody>
					<?php
						}
					?>
					<?php
					if(isset($_GET['searchSub'])) {
						include_once "../db.php";
						$subject = $_GET['searchSub'];
						$sql = "select * from schedule where subject like '%$subject%'";
						$result = $conn->query($sql);
						$res = array();
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								?>
								<tr>
								<th scope="row"><?php echo $row['code'] ?></th>
								<td><?php echo $row['subject'] ?></td>
								<td><?php echo $row['time'] ?></td>
								<td><?php echo $row['semester'] ?></td>
								<td><?php echo $row['term'] ?></td>
								<form action="../requests/add-load.php" method="post">
									<input type="text" name="schedId" value="<?php echo $row['id'] ?>" hidden/>
									<input type="text" name="schedCode" value="<?php echo $row['code'] ?>" hidden/>
									<input type="text" name="subCode" value="<?php echo $row['subject'] ?>" hidden/>
									<input type="text" name="time" value="<?php echo $row['time'] ?>" hidden/>
									<input type="text" name="semester" value="<?php echo $row['semester'] ?>" hidden/>
									<input type="text" name="term" value="<?php echo $row['term'] ?>" hidden/>
									<input type="text" name="studId" value="<?php echo $_GET['id'] ?>" hidden/>
									<input type="text" name="firstname" value="<?php echo $_GET['firstname'] ?>" hidden/>
									<input type="text" name="lastname" value="<?php echo $_GET['lastname'] ?>" hidden/>
									<!-- <input type="text" name="loadrow" value="1" hidden> -->
									<td><button type="submit" class="btn btn-success"><i class="fas fa-plus"></i></button></td>
								</form>
								</tr>
								<?php
							}
						}
					}
					?>
						</tbody>
					</table>



            <table class="table" id="studentLoad">
                <thead>
                    <tr>
                        <th scope="col">Load ID</th>
                        <th scope="col">Student ID</th>
                        <th scope="col">Schedule Code</th>
                        <th scope="col">Subject Code</th>
                        <th scope="col">Time</th>
                        <th scope="col">Semester</th>
                        <th scope="col">term</th>
                </thead>
                <tbody>
                <?php
					if(isset($_GET['id'])) {
						include_once "../db.php";
						$studentid = $_GET['id'];
						$sql = "select * from studentload where student=$studentid";
						$result = $conn->query($sql);
						$res = array();
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								?>
								<tr>
								<th scope="row"><?php echo $row['id'] ?></th>
								<td><?php echo $row['student'] ?></td>
								<td><?php echo $row['sched_code'] ?></td>
								<td><?php echo $row['subj_code'] ?></td>
								<td><?php echo $row['time'] ?></td>
								<td><?php echo $row['semester'] ?></td>
								<td><?php echo $row['term'] ?></td>
								<form action="../requests/delete-studentload.php" method="post">
									<input type="text" name="id" value="<?php echo $row['id'] ?>" hidden/>
									<input type="text" name="studId" value="<?php echo $_GET['id'] ?>" hidden/>
									<input type="text" name="firstname" value="<?php echo $_GET['firstname'] ?>" hidden/>
									<input type="text" name="lastname" value="<?php echo $_GET['lastname'] ?>" hidden/>
									<td><button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
								</form>
								</tr>
								<?php
							}
                        }
                    }
					?>
                </tbody>
            </table>
			<button type="button" onclick="printData()" class="btn btn-primary btn-lg btn-block">Print</button>
		</div>
	</body>
	<script>
		function printData() {
				var divToPrint=document.getElementById("studentLoad");
				var divToPrint2=document.getElementById("studentInfo");
				newWin= window.open("");
				newWin.document.write(divToPrint2.outerHTML);
				newWin.document.write(divToPrint.outerHTML);
				newWin.print();
				newWin.close();
			}
	</script>
</html>
