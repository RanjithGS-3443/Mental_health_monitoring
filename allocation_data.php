<?php
// Include your database connection file
include 'db.php';

session_start();

// Check if the employee is logged in
if (!isset($_SESSION['employee_id'])) {
    echo "<script>window.location.href = 'employee_login.php';</script>";
    exit();
}

// Fetch psychologists allocation details from the database
$sql = "SELECT pa.allocation_id, u.username, u.email AS user_email, p.name AS psychologist_name, p.email AS psychologist_email, pa.appointment_date, pa.appointment_time 
        FROM psychologists_allocation pa 
        JOIN users u ON pa.user_id = u.user_id 
        JOIN psychologists p ON pa.psycho_id = p.psycho_id";
$result = $conn->query($sql);

// Close the database connection after fetching
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Psychologists Allocation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        header {
            background-color: #2c3e50;
            color: white;
            padding: 15px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: auto; /* Push footer to the bottom */
        }

        .container {
            background-color: #ffffff;
            padding: 40px; /* Increased padding */
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1200px; /* Increased max width */
            margin: 40px auto; /* Increased margin for more space */
            text-align: center;
            height: auto; /* Automatic height adjustment */
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 1.8rem;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #2980b9;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .home-button {
            background-color: #2980b9;
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .home-button:hover {
            background-color: #1f5a7d;
        }

        .table-header {
            margin-bottom: 20px;
            font-size: 1.2rem;
            font-weight: bold;
            color: #34495e;
        }
    </style>
</head>
<body>

<header>
    <h2>Psychologists Allocation</h2>
</header>

<div class="container">
    <div class="table-header">Allocated Psychologists</div>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <tr>
                <th>Allocation ID</th>
                <th>Username</th>
                <th>User Email</th>
                <th>Psychologist</th>
                <th>Psychologist Email</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['allocation_id']); ?></td>
                <td><?php echo htmlspecialchars($row['username']); ?></td>
                <td><?php echo htmlspecialchars($row['user_email']); ?></td>
                <td><?php echo htmlspecialchars($row['psychologist_name']); ?></td>
                <td><?php echo htmlspecialchars($row['psychologist_email']); ?></td>
                <td><?php echo htmlspecialchars($row['appointment_date']); ?></td>
                <td><?php echo htmlspecialchars($row['appointment_time']); ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No allocations found.</p>
    <?php endif; ?>

    <!-- Home button -->
    <a href="employees_menu.php" class="home-button">Home</a>
</div>

<footer>
    <p>&copy; 2024 Mental Health Management System</p>
</footer>

</body>
</html>
