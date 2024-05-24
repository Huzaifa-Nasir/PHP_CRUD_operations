<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$total_fees_collected = 0;
$outstanding_payments = [];
$payment_history = [];

$sql = "SELECT SUM(amount_paid) AS total_fees_collected FROM payments";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_fees_collected = $row["total_fees_collected"];
}

$sql = "SELECT s.id, s.name, f.amount - COALESCE(SUM(p.amount_paid), 0) AS outstanding_amount
        FROM students s
        LEFT JOIN payments p ON s.id = p.student_id
        LEFT JOIN fees f ON p.fee_id = f.fee_id
        GROUP BY s.id, s.name, f.amount";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $outstanding_payments[] = $row;
}

$sql = "SELECT s.id, s.name, p.payment_date, p.amount_paid, p.payment_method
        FROM students s
        JOIN payments p ON s.id = p.student_id
        ORDER BY s.id, p.payment_date";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $payment_history[] = $row;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Reports</title>
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
        <h1>View Reports</h1>
        <h2>Total Fees Collected</h2>
        <p><?php echo $total_fees_collected; ?></p>

        <h2>Outstanding Payments by Student</h2>
        <table>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Outstanding Amount</th>
            </tr>
            <?php foreach ($outstanding_payments as $payment): ?>
                <tr>
                    <td><?php echo $payment["id"]; ?></td>
                    <td><?php echo $payment["name"]; ?></td>
                    <td><?php echo $payment["outstanding_amount"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h2>Payment History</h2>
        <table>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Payment Date</th>
                <th>Amount Paid</th>
                <th>Payment Method</th>
            </tr>
            <?php foreach ($payment_history as $history): ?>
                <tr>
                    <td><?php echo $history["id"]; ?></td>
                    <td><?php echo $history["name"]; ?></td>
                    <td><?php echo $history["payment_date"]; ?></td>
                    <td><?php echo $history["amount_paid"]; ?></td>
                    <td><?php echo $history["payment_method"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
