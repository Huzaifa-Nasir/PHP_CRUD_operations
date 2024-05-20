<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="main">
<div class="NavBar">
<div class="one"> <h2>Meri Academy</h2></div>
<div class="two"> <a href="index.php">Add Student</a>
    <a href="DisplayData.php">View Student Details</a>
 <a href="teacherPage.php">Add Teacher</a>
    <a href="DisplayTeacherDetails.php">View Teacher Details</a></div>
</div>
    <div class="container">

        <h2>Add New Teacher</h2>
        <form id="addTeacherForm" action="add_teachers.php" method="post">
            <label for="teacherId">ID:</label>
            <input type="number" id="teacherId" name="teacherId" required>

            <label for="teacherName">Name:</label>
            <input type="text" id="teacherName" name="teacherName" required>
            
            <label for="teacherAge">Age:</label>
            <input type="number" id="teacherAge" name="teacherAge" required>
            
            <label for="teacherCourse">Course:</label>
            <input type="text" id="teacherCourse" name="teacherCourse" required>
            
            <button type="submit">Add Teacher</button>
        </form>
        
        
    </div>
    </div>
</body>
</html>
