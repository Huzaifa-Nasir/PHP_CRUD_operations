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
    <a href="DisplayData.php">View Student Details</a>
 <a href="teacherPage.php">Add Teacher</a>
    <a href="DisplayTeacherDetails.php">View Teacher Details</a></div>
</div>
    <div class="container">
    <h2>Teacher List</h2>
        <table>
            <thead>
                <tr>
                    <th>Teacher ID</th>
                    <th>Teaacher Name</th>
                    <th>Teacher Age</th>
                    <th>Course</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db_connect.php';

                $sql = "SELECT * FROM teachers";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["tid"] . "</td>";
                        echo "<td>" . $row["tname"] . "</td>";
                        echo "<td>" . $row["tage"] . "</td>";
                        echo "<td>" . $row["course"] . "</td>";
                        echo "<td>
                            <form action='update_teacher.php' method='post' class='inline-form'>
                                <input type='hidden' name='teacherId' value='" . $row["tid"] . "'>
                                <button type='submit'>Update</button>
                            </form>
                            <form action='delete_teacher.php' method='post' class='inline-form'>
                                <input type='hidden' name='teacherId' value='" . $row["tid"] . "'>
                                <button type='submit'>Delete</button>
                            </form>
                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No Teachers found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    </div>
    
</body>
</html>