<?php
include_once('../db.php');
if(isset($_POST['code'])) {
    $code = $_POST['code'];
    $name = $_POST['name'];
    $lec = $_POST['lec'];
    $lab = $_POST['lab'];
    $total = $lec + $lab;
    $prereq = $_POST['prereq'];
    $sql = "insert into subject (code, name, lec, lab, total, prereq) values('$code', '$name', $lec, $lab, $total, '$prereq')";
    if ($conn->query($sql) === TRUE) {
        header('location: ../pages/subject.php?added=true');
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        header('location: ../pages/subject.php?added=false');
    }
    $conn->close();
}
?>