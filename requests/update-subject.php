<?php
include_once('../db.php');
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $code = $_POST['code'];
    $name = $_POST['name'];
    $lec = $_POST['lec'];
    $lab = $_POST['lab'];
    $total = $lec + $lab;
    $prereq = $_POST['prereq'];
    $sql = "update subject set code='$code', name='$name', lec=$lec, lab=$lab, total=$total, prereq='$prereq' where id=$id";
    if ($conn->query($sql) === TRUE) {
        header('location: ../pages/subject.php?updated=true');
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        header('location: ../pages/subject.php?updated=false');
    }
    $conn->close();
}
?>