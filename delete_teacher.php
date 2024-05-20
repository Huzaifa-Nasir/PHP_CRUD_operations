<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['teacherId'];

    $sql = "DELETE FROM teachers WHERE tid = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location:DisplayTeacherDetails.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}
?>
