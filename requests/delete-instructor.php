<?php
include_once('../db.php');
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "delete from instructor where id=$id";
    if ($conn->query($sql) === TRUE) {
        header('location: ../pages/instructor.php?deleted=true');
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        header('location: ../pages/instructor.php?deleted=false');
    }
    $conn->close();
}
?>