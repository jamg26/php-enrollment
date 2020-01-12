<?php
include_once('../db.php');
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $studId = $_POST['studId'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $sql = "delete from studentload where id=$id";
    if ($conn->query($sql) === TRUE) {
        header('location: ../pages/studentloadhandler.php?deleted=true&id='.$studId.'&firstname='.$firstname.'&lastname='.$lastname);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        //header('location: ../pages/searchload.php?deleted=false');
    }
    $conn->close();
}
?>
