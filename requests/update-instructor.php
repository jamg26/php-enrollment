<?php
include_once('../db.php');
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $sql = "update instructor set name='$name' where id=$id";
    if ($conn->query($sql) === TRUE) {
        header('location: ../pages/instructor.php?updated=true');
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        header('location: ../pages/instructor.php?updated=false');
    }
    $conn->close();
}

?>