<?php
include_once('../db.php');

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$sql = "insert into users (firstname, middlename, lastname, address, email, password, role) values ('$firstname', '$middlename', '$lastname', '$address', '$email', '$password', 'admin')";

if ($conn->query($sql) === TRUE) {
    header('location: ../pages/signup.php?success=true');
} else {
    header('location: ../pages/signup.php?success=false');
    echo $conn->error;
}
$conn->close();

?>