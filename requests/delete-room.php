<?php
include_once('../db.php');
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "delete from room where id='$id'";
    if ($conn->query($sql) === TRUE) {
        header('location: ../pages/room.php?deleted=true');
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        header('location: ../pages/room.php?deleted=false');
    }
    $conn->close();
}
?>
