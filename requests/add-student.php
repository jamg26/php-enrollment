<?php
include_once('../db.php');
if(isset($_POST['email'])) {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];
    $birthplace = $_POST['birthplace'];
    $nationality = $_POST['nationality'];
    $status = $_POST['status'];
    $contact = $_POST['contact'];
    $course = $_POST['course'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $sql = "insert into student (firstname, middlename, lastname, address, gender, birthdate, birthplace, nationality, status, contact, course, email, password, role)
            values ('$firstname', '$middlename', '$lastname', '$address','$gender', '$birthdate', '$birthplace', '$nationality','$status', '$contact','$course', '$email', '$password', 'student')";
    
    if ($conn->query($sql) === TRUE) {
        header('location: ../pages/students.php?added=true');
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        header('location: ../pages/students.php?added=false');
    }
    $conn->close();
}
?>
