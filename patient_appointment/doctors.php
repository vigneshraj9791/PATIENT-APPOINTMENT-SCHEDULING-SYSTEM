<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Doctors</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Our Doctors</h2>
    <table>
        <tr><th>Name</th><th>Specialization</th></tr>
        <?php
        $result = $conn->query("SELECT * FROM doctors");
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>{$row['name']}</td><td>{$row['specialization']}</td></tr>";
        }
        ?>
    </table>
</div>
</body>
</html>