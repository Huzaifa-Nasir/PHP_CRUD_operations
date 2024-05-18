<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['studentId'];
    $name = $_POST['studentName'];
    $age = $_POST['studentAge'];
    $class = $_POST['studentClass'];

    $sql = "INSERT INTO students (id, name, age, class) VALUES ('$id', '$name', '$age', '$class')";

    if ($conn->query($sql) === TRUE) {
        header("Location: DisplayData.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
