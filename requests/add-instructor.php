<?php
include_once('../db.php');
if(isset($_POST['name'])) {
    $name = $_POST['name'];
    $department = $_POST['department'];
    $sql = "insert into instructor (name) values('$name')";
    if ($conn->query($sql) === TRUE) {
        header('location: ../pages/instructor.php?added=true');
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        header('location: ../pages/instructor.php?added=false');
    }
    $conn->close();
}

?>