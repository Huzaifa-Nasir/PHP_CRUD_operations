<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['teacherId'];
    $name = $_POST['teacherName'];
    $age = $_POST['teacherAge'];
    $course = $_POST['teacherCourse'];
  

    $sql = "INSERT INTO teachers (tid, tname, tage,course) VALUES ('$id', '$name', '$age','$course')";

    if ($conn->query($sql) === TRUE) {
        header("Location: DisplayTeacherDetails.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>