<?php
include_once('../db.php');
if(isset($_POST['name'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $capacity = $_POST['capacity'];
    $sql = "insert into room (name, location, capacity) values('$name', '$location', $capacity)";
    if ($conn->query($sql) === TRUE) {
        header('location: ../pages/room.php?added=true');
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        header('location: ../pages/room.php?added=false');
    }
    $conn->close();
}
?>