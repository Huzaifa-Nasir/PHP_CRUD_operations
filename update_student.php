<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['updateStudent'])) {
    $id = $_POST['studentId'];

    $sql = "SELECT * FROM students WHERE id = $id";
    $result = $conn->query($sql);
    $student = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateStudent'])) {
    $id = $_POST['studentId'];
    $name = $_POST['studentName'];
    $age = $_POST['studentAge'];
    $class = $_POST['studentClass'];

    $sql = "UPDATE students SET name = '$name', age = '$age', class = '$class' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: DisplayData.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Update Student</h1>
        
        <form action="update_student.php" method="post">
            <input type="hidden" name="studentId" value="<?php echo $student['id']; ?>">
            
            <label for="studentName">Name:</label>
            <input type="text" id="studentName" name="studentName" value="<?php echo $student['name']; ?>" required>
            
            <label for="studentAge">Age:</label>
            <input type="number" id="studentAge" name="studentAge" value="<?php echo $student['age']; ?>" required>
            
            <label for="studentClass">Class:</label>
            <input type="text" id="studentClass" name="studentClass" value="<?php echo $student['class']; ?>" required>
            
            <button type="submit" name="updateStudent">Update Student</button>
        </form>
    </div>
</body>
</html>
