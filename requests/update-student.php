<?php
include_once('../db.php');
if(isset($_POST['id'])) {
    $id = $_POST['id'];
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
    $sql = "update student set 
            firstname='$firstname', 
            middlename='$middlename', 
            lastname='$lastname', 
            address='$address', 
            gender='$gender', 
            birthdate='$birthdate', 
            birthplace='$birthplace', 
            nationality='$nationality', 
            status='$status', 
            contact='$contact', 
            course='$course', 
            email='$email', 
            password='$password' 
            where id='$id'";
    if ($conn->query($sql) === TRUE) {
        header('location: ../pages/students.php?updated=true');
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        header('location: ../pages/students.php?updated=false');
    }
    $conn->close();
}
?>
