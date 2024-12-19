<?php
// Include database connection
include 'db.php';

// Fetch employee data
$sql = "SELECT employee_id, name, role, phone_number, email, hire_date FROM employees";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Data</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        header {
            width: 100%;
            background-color: #007bff;
            padding: 20px;
            color: white;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        /* Table Styling */
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        table th, table td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #007bff;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Footer Styling */
        footer {
            width: 100%;
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 30px;
        }

        footer p {
            margin: 0;
        }

    </style>
</head>
<body>

    <!-- Header Section -->
    <header>
        <h1>Employee Details</h1>
    </header>

    <!-- Employee Data Table -->
    <table>
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Role</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Hire Date</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['employee_id']); ?></td>
                        <td><?= htmlspecialchars($row['name']); ?></td>
                        <td><?= htmlspecialchars($row['role']); ?></td>
                        <td><?= htmlspecialchars($row['phone_number']); ?></td>
                        <td><?= htmlspecialchars($row['email']); ?></td>
                        <td><?= htmlspecialchars($row['hire_date']); ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No employees found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 Mental Health Management System. All Rights Reserved.</p>
    </footer>

</body>
</html>
