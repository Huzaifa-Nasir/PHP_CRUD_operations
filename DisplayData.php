<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <h2>Student List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Class</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db_connect.php';

                $sql = "SELECT * FROM students";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["age"] . "</td>";
                        echo "<td>" . $row["class"] . "</td>";
                        echo "<td>
                            <form action='update_student.php' method='post' class='inline-form'>
                                <input type='hidden' name='studentId' value='" . $row["id"] . "'>
                                <button type='submit'>Update</button>
                            </form>
                            <form action='delete_student.php' method='post' class='inline-form'>
                                <input type='hidden' name='studentId' value='" . $row["id"] . "'>
                                <button type='submit'>Delete</button>
                            </form>
                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No students found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    </div>
    
</body>
</html>