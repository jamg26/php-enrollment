<?php
	@include '../styles.php';
	session_start();
	?>
<html>
	<body>
	    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand text-info" href="../">DCC</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<?php if(isset($_SESSION['user'])) {
						//<a id="enroll" class="nav-item nav-link" href="../pages/enroll.php">Enroll</a>
						//echo '<a id="profile" class="nav-item nav-link" href="../pages/profile.php">Profile</a>';
						if($_SESSION['user']['role'] == 'admin') {
						    echo '
						    <a id="course" class="nav-item nav-link" href="../pages/course.php">Course</a>
						    <a id="department" class="nav-item nav-link" href="../pages/department.php">Department</a>
						    <a id="users" class="nav-item nav-link" href="../pages/users.php">Users</a>
						    <a id="students" class="nav-item nav-link" href="../pages/students.php">Students</a>
						    <a id="schedule" class="nav-item nav-link" href="../pages/schedule.php">Schedule</a>
						    <a id="room" class="nav-item nav-link" href="../pages/room.php">Room</a>
							<a id="instructor" class="nav-item nav-link" href="../pages/instructor.php">Instructor</a>
							<a id="subject" class="nav-item nav-link" href="../pages/subject.php">Subject</a>
							<a id="searchload" class="nav-item nav-link" href="../pages/searchload.php">Studentload</a>
						    ';
						}
						echo '
						<a class="nav-item nav-link text-danger" href="../logout.php">Logout</a>
						';
						} else {
						echo '
						<a id="signin" class="nav-item nav-link" href="../pages/signin.php">Sign In</a>
						';
						} ?>
				</div>
			</div>
		</nav>
		<script>
			var pathname = window.location.pathname;
			pathname = pathname.split('/');
			name = pathname[2].replace('.php', "");
			$("#" + name).attr('class', 'nav-item nav-link active text-success');
		</script>
	</body>
</html>