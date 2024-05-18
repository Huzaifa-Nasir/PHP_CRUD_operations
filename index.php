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
    <a href="DisplayData.php">View Student Details</a></div>
</div>
    <div class="container">
        <h1>School Management System</h1>
        
        <h2>Add New Student</h2>
        <form id="addStudentForm" action="add_student.php" method="post">
            <label for="studentId">ID:</label>
            <input type="number" id="studentId" name="studentId" required>

            <label for="studentName">Name:</label>
            <input type="text" id="studentName" name="studentName" required>
            
            <label for="studentAge">Age:</label>
            <input type="number" id="studentAge" name="studentAge" required>
            
            <label for="studentClass">Class:</label>
            <input type="text" id="studentClass" name="studentClass" required>
            
            <button type="submit">Add Student</button>
        </form>
        
        
    </div>
    </div>
</body>
</html>
