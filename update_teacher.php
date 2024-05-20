<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['updateTeacher'])) {
    $id = $_POST['teacherId'];

    $sql = "SELECT * FROM teachers WHERE tid = $id";
    $result = $conn->query($sql);
   $teacher = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateTeacher'])) {
    $id = $_POST['teacherID'];
    $name = $_POST['teacherName'];
    $age = $_POST['teacherAge'];
$course = $_POST['teacherCourse'];

    $sql = "UPDATE teachers SET tname = '$name', tage = '$age', course = '$course' WHERE tid = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: DisplayTeacherDetails.php");
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
    <title>Update Teacher</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Update Teacher</h1>
        
        <form action="update_teacher.php" method="post">
            <input type="hidden" name="teacherID" value="<?php echo$teacher['tid']; ?>">
            
            <label for="teacherName">Name:</label>
            <input type="text" id="teacherName" name="teacherName" value="<?php echo$teacher['tname']; ?>" required>
            
            <label for="teacherAge">Age:</label>
            <input type="number" id="teacherAge" name="teacherAge" value="<?php echo$teacher['tage']; ?>" required>
            
            <label for="teacherCourse">Course:</label>
            <input type="text" id="teacherCourse" name="teacherCourse" value="<?php echo$teacher['course']; ?>" required>
            
            <button type="submit" name="updateTeacher">Update Student</button>
        </form>
    </div>
</body>
</html>
