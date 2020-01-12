<?php
include_once('../db.php');
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $subject = $_POST['subject'];
    $time = $_POST['timeFrom']."-".$_POST['timeTo'];
    $room = $_POST['room'];
    $instructor = $_POST['instructor'];
    $semester = $_POST['semester'];
    $term = $_POST['term'];
    $year = $_POST['yearFrom']."-".$_POST['yearTo'];
    $sql = "update schedule set subject='$subject', time='$time', room='$room', instructor='$instructor', semester=$semester, term=$term, year='$year' where id=$id";
    if ($conn->query($sql) === TRUE) {
        header('location: ../pages/schedule.php?updated=true');
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        header('location: ../pages/schedule.php?updated=false');
    }
    $conn->close();
}
?>