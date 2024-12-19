<?php
// Include your database connection file
include 'db.php';

session_start();

// Check if the employee is logged in
if (!isset($_SESSION['employee_id'])) {
    echo "<script>window.location.href = 'employee_login.php';</script>";
    exit();
}

// Fetch psychologists details from the database
$sql = "SELECT psycho_id, name, specialization, phone_number, email, years_of_experience, created_at, availability 
        FROM psychologists";
$result = $conn->query($sql);

// Close the database connection after fetching
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Psychologists</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            text-align: center;
        }

        footer {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: auto; /* Push footer to the bottom */
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
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
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .home-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .home-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<header>
    <h2>Psychologists</h2>
</header>

<div class="container">
    <h1>Available Psychologists</h1>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <tr>
                <th>Psycho ID</th>
                <th>Name</th>
                <th>Specialization</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Years of Experience</th>
                <th>Availability</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['psycho_id']); ?></td>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['specialization']); ?></td>
                <td><?php echo htmlspecialchars($row['phone_number']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['years_of_experience']); ?></td>
                <td><?php echo htmlspecialchars($row['availability']); ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No psychologists found.</p>
    <?php endif; ?>

    <!-- Home button -->
    <a href="employees_menu.php" class="home-button">Home</a>
</div>

<footer>
    <p>&copy; 2024 Mental Health Management System</p>
</footer>

</body>
</html>
