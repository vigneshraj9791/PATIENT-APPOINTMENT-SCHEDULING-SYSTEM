<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Book Appointment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-container">
    <h2>Book Appointment</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="Patient Name" required>
        <input type="email" name="email" placeholder="Patient Email" required>
        
        <label for="doctor">Choose Doctor:</label>
        <select name="doctor" required>
            <?php
            $result = $conn->query("SELECT * FROM doctors");
            while($row = $result->fetch_assoc()) {
                echo "<option value='{$row['id']}'>{$row['name']} - {$row['specialization']}</option>";
            }
            ?>
        </select>

        <input type="date" name="date" required>
        <input type="time" name="time" required>
        <button type="submit" name="book">Book Appointment</button>
    </form>
</div>

<?php
if (isset($_POST['book'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $doctor = $_POST['doctor'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    // Check if slot already exists
    $check = "SELECT * FROM appointments WHERE doctor_id='$doctor' AND appointment_date='$date' AND appointment_time='$time'";
    $result = $conn->query($check);

    if ($result->num_rows > 0) {
        echo "<p class='error'>❌ This slot is already booked. Please choose another time.</p>";
    } else {
        $sql = "INSERT INTO appointments (patient_name, patient_email, doctor_id, appointment_date, appointment_time) 
                VALUES ('$name', '$email', '$doctor', '$date', '$time')";

        if ($conn->query($sql) === TRUE) {
            echo "<p class='success'>✅ Appointment booked successfully!</p>";
        } else {
            echo "<p class='error'>⚠️ Error booking appointment.</p>";
        }
    }
}
?>
</body>
</html>
