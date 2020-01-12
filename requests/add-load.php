<?php
include_once('../db.php');
if(isset($_POST['schedCode'])) {
    $schedId = $_POST['schedId'];
    $schedCode = $_POST['schedCode'];
    $subCode = $_POST['subCode'];
    $time = $_POST['time'];
    $semester = $_POST['semester'];
    $term = $_POST['term'];
    $studId = $_POST['studId'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $sql="select * from schedule where id=$schedId";
    $res=$conn->query($sql);
    while($row=$res->fetch_assoc()){
        $sem = $row['semester'];
        $term = $row['term'];
        $sql = "insert into studentload (student, sched_code, subj_code, time, semester, term) 
        values($studId, '$schedCode', '$subCode', '$time', '$sem', '$term')";
        if ($conn->query($sql) === TRUE) {
            // header('location: ../pages/studentloadhandler.php?added=true&id='.$studId.'&firstname='.$firstname.'&lastname='.$lastname);
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            //header('location: ../pages/instructor.php?added=false');
        }
    }       

    
    header('location: ../pages/studentloadhandler.php?added=true&id='.$studId.'&firstname='.$firstname.'&lastname='.$lastname);
    $conn->close();


    // for($x = $_POST['loadrow']; $x>0; $x--) {
    //     $sched = $_POST['schedCode-'.$x];
    //     $subj = $_POST['subjCode-'.$x];
    //     $sem = $_POST['semester-'.$x];
    //     $term = $_POST['term-'.$x];
    //     $lec = $_POST['lecture-'.$x];
    //     $lab = $_POST['laboratory-'.$x];
    //     $sql = "insert into studentload (student, sched_code, subj_code, semester, term) 
    //     values($id, '$sched', '$subj', '$sem', '$term', $lec, $lab, $lec+$lab)";
    //     if ($conn->query($sql) === TRUE) {
    //         //header('location: ../pages/instructor.php?added=true');
    //     } else {
    //         echo "Error: " . $sql . "<br>" . $conn->error;
    //         //header('location: ../pages/instructor.php?added=false');
    //     }
    // }
    //$conn->close();
    //header('location: ../pages/enroll.php?enrolled=true');
}
?>
