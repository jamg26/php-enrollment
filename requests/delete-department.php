<?php
include_once('../db.php');
if(isset($_POST['department'])) {
    $department = $_POST['department'];
    $sql = "delete from department where id=$department";
    if ($conn->query($sql) === TRUE) {
        header('location: ../pages/department.php?deleted=true');
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        header('location: ../pages/department.php?deleted=false');
    }
    $conn->close();
}
?>
