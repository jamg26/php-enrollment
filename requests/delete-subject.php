<?php
include_once('../db.php');
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "delete from subject where id=$id";
    if ($conn->query($sql) === TRUE) {
        header('location: ../pages/subject.php?deleted=true');
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        header('location: ../pages/subject.php?deleted=false');
    }
    $conn->close();
}
?>
