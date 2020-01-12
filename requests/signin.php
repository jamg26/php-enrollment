<?php 
include_once('../db.php');
session_start();
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "select * from users where email = '$email' and password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        //$_SESSION['user'] = [$row['id'], $row['firstname'], $row['middlename'], $row['lastname'], $row['address'], $row['email'], $row['role']];
        $_SESSION['user'] = $row;
        header('location: /');
    }
} else {
    $sql = "select * from student where email = '$email' and password = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            //$_SESSION['user'] = [$row['id'], $row['firstname'], $row['middlename'], $row['lastname'], $row['address'], $row['email'], $row['role']];
            $_SESSION['user'] = $row;
            header('location: /');
        }
    } else {
        header('location: ../pages/signin.php?invalid=true');
    }
}

$conn->close();

?>