<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Appointments</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 0;
            margin: 0;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 24px;
            position: relative;
        }

        .home-button {
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translateY(-50%);
            background-color: white;
            color: #4CAF50;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .home-button:hover {
            background-color: #45a049;
            color: white;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        .container {
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
            margin: 10px 0;
            display: block;
        }

        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .no-appointments {
            color: red;
        }

        .content {
            min-height: 100vh;
            padding-bottom: 60px; /* Footer height */
        }
    </style>
</head>
<body>

    <header>
        <a href="index.php" class="home-button">Home</a>
        Mental Health Monitoring System
    </header>

    <div class="content">
        <div class="container">
            <h1>View Appointments</h1>
            <form action="" method="POST">
                <label for="email">Enter your Email ID:</label>
                <input type="email" name="email" id="email" required>
                <input type="submit" name="submit" value="View Appointments">
            </form>

            <?php
            include 'db.php';

            if (isset($_POST['submit'])) {
                $email = $_POST['email'];

                // Fetch the psychologist ID using email
                $query = "SELECT psycho_id FROM psychologists WHERE email = '$email'";
                $result = $conn->query($query);

                if ($result && $result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $psycho_id = $row['psycho_id'];

                    // Fetch appointments along with user details based on psychologist ID
                    $appointmentQuery = "
                        SELECT a.user_id, a.appointment_date, a.appointment_time, u.username, u.email
                        FROM psychologists_allocation a
                        JOIN users u ON a.user_id = u.user_id
                        WHERE a.psycho_id = '$psycho_id'";
                    
                    $appointmentResult = $conn->query($appointmentQuery);

                    if ($appointmentResult) {
                        if ($appointmentResult->num_rows > 0) {
                            echo "<table>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Appointment Date</th>
                                        <th>Appointment Time</th>
                                    </tr>";

                            while ($appointmentRow = $appointmentResult->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $appointmentRow['user_id'] . "</td>
                                        <td>" . $appointmentRow['username'] . "</td>
                                        <td>" . $appointmentRow['email'] . "</td>
                                        <td>" . $appointmentRow['appointment_date'] . "</td>
                                        <td>" . $appointmentRow['appointment_time'] . "</td>
                                      </tr>";
                            }

                            echo "</table>";
                        } else {
                            echo "<p class='no-appointments'>No appointments found for this psychologist.</p>";
                        }
                    } else {
                        echo "<p class='no-appointments'>Error fetching appointments: " . $conn->error . "</p>";
                    }
                } else {
                    echo "<p class='no-appointments'>No psychologist found with the provided email ID.</p>";
                }
            }
            ?>
        </div>
    </div>

    <footer>
        &copy; 2024 Mental Health Monitoring System. All Rights Reserved.
    </footer>

</body>
</html>
