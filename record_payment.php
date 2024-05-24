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
    $student_id = $_POST["student_id"];
    $fee_id = $_POST["fee_id"];
    $payment_date = $_POST["payment_date"];
    $amount_paid = $_POST["amount_paid"];
    $payment_method = $_POST["payment_method"];
    $payment_id = $_POST["payment_id"];

    $sql = "SELECT amount FROM fees WHERE fee_id = '$fee_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total_amount = $row["amount"];

    $sql = "SELECT SUM(amount_paid) AS total_paid FROM payments WHERE student_id = '$student_id' AND fee_id = '$fee_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total_paid = $row["total_paid"] + $amount_paid;
    

    $balance_due = $total_amount - $total_paid;

    $sql = "INSERT INTO payments (payment_id,student_id, fee_id, payment_date, amount_paid, balance_due, payment_method)
            VALUES ('$payment_id','$student_id', '$fee_id', '$payment_date', '$amount_paid', '$balance_due', '$payment_method')";

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
    <title>Record Payment</title>
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
        <h1>Record Payment</h1>
        <form method="POST" action="record_payment.php">
            <label for="payment_id">Payment ID:</label>
            <input type="number" id="payment_id" name="payment_id" required>
            <label for="student_id">Student ID:</label>
            <input type="number" id="student_id" name="student_id" required>
            <label for="fee_id">Fee ID:</label>
            <input type="number" id="fee_id" name="fee_id" required>
            <label for="payment_date">Payment Date:</label>
            <input type="date" id="payment_date" name="payment_date" required>
            <label for="amount_paid">Amount Paid:</label>
            <input type="number" id="amount_paid" name="amount_paid" required>
            <label for="payment_method">Payment Method:</label>
            <input type="text" id="payment_method" name="payment_method" required>
            <input type="submit" value="Record Payment">
        </form>
    </div>
</body>
</html>
