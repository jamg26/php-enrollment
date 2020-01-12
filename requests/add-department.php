<?php
include_once('../db.php');
if(isset($_POST['code'])) {
    $code = $_POST['code'];
    $description = $_POST['description'];
    $head = $_POST['head'];
    $sql = "insert into department (code, description, head) values('$code', '$description', '$head')";
    if ($conn->query($sql) === TRUE) {
        header('location: ../pages/department.php?added=true');
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        header('location: ../pages/department.php?added=false');
    }
    $conn->close();
}
?>