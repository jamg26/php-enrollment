<?php
include_once('../db.php');
if(isset($_POST['code'])) {
    $id = $_POST['id'];
    $code = $_POST['code'];
    $description = $_POST['description'];
    $department = $_POST['department'];
    $sql = "update course set code='$code', description='$description', department='$department' where id=$id";
    if ($conn->query($sql) === TRUE) {
        header('location: ../pages/course.php?updated=true');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        //header('location: ../pages/course.php?updated=false');
    }
    $conn->close();
}

?>