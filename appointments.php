<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 50px;
            text-align: center;
        }

        h1 {
            color: #4CAF50;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: inline-block;
            text-align: left;
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="number"],
        input[type="date"],
        input[type="time"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .psychologists-section {
            margin-top: 40px;
        }

        table {
            margin: 20px auto;
            width: 80%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        td {
            background-color: #f9f9f9;
        }

        .home-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
        }

        .home-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h1>Book Appointment</h1>

    <!-- Appointment Form -->
    <form action="" method="POST">
        <label>User ID:</label>
        <input type="number" name="user_id" required>

        <label>Physiologist ID:</label>
        <input type="number" name="physio_id" required>

        <label>Appointment Date:</label>
        <input type="date" name="appointment_date" required>

        <label>Appointment Time:</label>
        <input type="time" name="appointment_time" required>

        <input type="submit" name="submit" value="Book Appointment">
    </form>

    <?php
    include 'db.php';

    // Fetch psychologists from the database
    $query = "SELECT physio_id, name, specialty, contact FROM psychologists";
    $result = $conn->query($query);

    // Display the psychologists
    if ($result->num_rows > 0) {
        echo "<div class='psychologists-section'>";
        echo "<h2>Available Psychologists</h2>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Specialty</th><th>Contact</th></tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['physio_id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['specialty'] . "</td><td>" . $row['contact'] . "</td></tr>";
        }
        echo "</table></div>";
    } else {
        echo "<p>No psychologists available at the moment.</p>";
    }

    // Handle form submission
    if (isset($_POST['submit'])) {
        $user_id = $_POST['user_id'];
        $physio_id = $_POST['physio_id'];
        $appointment_date = $_POST['appointment_date'];
        $appointment_time = $_POST['appointment_time'];

        $sql = "INSERT INTO appointments (user_id, physio_id, appointment_date, appointment_time)
                VALUES ('$user_id', '$physio_id', '$appointment_date', '$appointment_time')";

        if ($conn->query($sql) === TRUE) {
            echo "<p style='color: green;'>Appointment booked successfully</p>";
        } else {
            echo "<p style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }
    }

    $conn->close();
    ?>

    <a href="index.php" class="home-button">Home</a>

</body>
</html>
