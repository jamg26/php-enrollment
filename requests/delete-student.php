<?php
include_once('../db.php');
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "delete from student where id=$id";
    if ($conn->query($sql) === TRUE) {
        header('location: ../pages/students.php?deleted=true');
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        header('location: ../pages/students.php?deleted=false');
    }
    $conn->close();
}
?>
