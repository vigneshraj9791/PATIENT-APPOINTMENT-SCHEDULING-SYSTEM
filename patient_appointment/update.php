<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Reschedule Appointment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-container">
    <h2>Reschedule Appointment</h2>
    <form method="POST">
        <input type="email" name="email" placeholder="Enter your email" required>
        <input type="date" name="old_date" placeholder="Old Date" required>
        <input type="time" name="old_time" placeholder="Old Time" required>
        <input type="date" name="new_date" placeholder="New Date" required>
        <input type="time" name="new_time" placeholder="New Time" required>
        <button type="submit" name="update">Update Appointment</button>
    </form>
</div>

<?php
if (isset($_POST['update'])) {
    $email = $_POST['email'];
    $old_date = $_POST['old_date'];
    $old_time = $_POST['old_time'];
    $new_date = $_POST['new_date'];
    $new_time = $_POST['new_time'];

    $sql = "UPDATE appointments 
            SET appointment_date='$new_date', appointment_time='$new_time' 
            WHERE patient_email='$email' AND appointment_date='$old_date' AND appointment_time='$old_time'";

    if ($conn->query($sql) === TRUE && $conn->affected_rows > 0) {
        echo "<p class='success'>Appointment rescheduled.</p>";
    } else {
        echo "<p class='error'>Slot unavailable or no appointment found.</p>";
    }
}
?>
</body>
</html>