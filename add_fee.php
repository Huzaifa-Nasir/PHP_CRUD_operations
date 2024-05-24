<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $class = $_POST["class"];
    $amount = $_POST["amount"];
    $due_date = $_POST["due_date"];

    $sql = "INSERT INTO fees (fee_id,class, amount, due_date) VALUES ('$id','$class', '$amount', '$due_date')";

    if ($conn->query($sql) === TRUE) {
        echo "";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Fee</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="NavBar">
    
    <div class="one"> <h2>Meri Academy</h2></div>
    <div class="two"> <a href="index.php">Add Student</a>
        <a href="DisplayData.php">View Student Details</a>
     <a href="teacherPage.php">Add Teacher</a>
        <a href="DisplayTeacherDetails.php">View Teacher Details</a>
        <a href="add_fee.php">Add Fee</a>
        <a href="record_payment.php">Record Payment</a>
        <a href="view_reports.php">View Reports</a>
    </div>
    </div>
    <div class="container">
        <h1>Add Fee</h1>
        <form method="POST" action="add_fee.php">
        <label for="class">Fee ID:</label>
            <input type="number" id="id" name="id" required>
            <label for="class">Class:</label>
            <input type="text" id="class" name="class" required>
            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" required>
            <label for="due_date">Due Date:</label>
            <input type="date" id="due_date" name="due_date" required>
            <input type="submit" value="Add Fee">
        </form>
    </div>
</body>
</html>
