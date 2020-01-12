<?php
include_once('../db.php');
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $sql = "update users set firstname='$firstname', middlename='$middlename', lastname='$lastname', address='$address', email='$email' where id='$id'";
    if ($conn->query($sql) === TRUE) {
        header('location: ../pages/users.php?updated=true');
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        header('location: ../pages/users.php?updated=false');
    }
    $conn->close();
}
?>