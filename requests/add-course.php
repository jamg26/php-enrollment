<?php
include_once('../db.php');
if(isset($_POST['code'])) {
    $code = $_POST['code'];
    $description = $_POST['description'];
    $department = $_POST['department'];
    $sql = "insert into course (code, description, department) values('$code', '$description', '$department')";
    if ($conn->query($sql) === TRUE) {
        header('location: ../pages/course.php?added=true');
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        header('location: ../pages/course.php?added=false');
    }
    $conn->close();
}

?>