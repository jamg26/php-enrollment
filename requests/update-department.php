<?php
include_once('../db.php');
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $code = $_POST['code'];
    $description = $_POST['description'];
    $head = $_POST['head'];
    $sql = "update department set code='$code', description='$description', head='$head' where id=$id";
    if ($conn->query($sql) === TRUE) {
        header('location: ../pages/department.php?updated=true');
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        header('location: ../pages/department.php?updated=false');
    }
    $conn->close();
}

?>