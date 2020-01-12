<?php
include_once('../db.php');
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $capacity = $_POST['capacity'];
    $sql = "update room set name='$name', location='$location', capacity=$capacity where id=$id";
    if ($conn->query($sql) === TRUE) {
        header('location: ../pages/room.php?updated=true');
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        header('location: ../pages/room.php?updated=false');
    }
    $conn->close();
}
?>