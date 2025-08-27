<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Cancel Appointment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-container">
    <h2>Cancel Appointment</h2>
    <form method="POST">
        <input type="email" name="email" placeholder="Enter your email" required>
        <input type="date" name="date" required>
        <input type="time" name="time" required>
        <button type="submit" name="cancel">Cancel Appointment</button>
    </form>
</div>

<?php
if (isset($_POST['cancel'])) {
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $sql = "DELETE FROM appointments WHERE patient_email='$email' AND appointment_date='$date' AND appointment_time='$time'";

    if ($conn->query($sql) === TRUE && $conn->affected_rows > 0) {
        echo "<p class='success'>Appointment cancelled.</p>";
    } else {
        echo "<p class='error'>No such appointment found.</p>";
    }
}
?>
</body>
</html>