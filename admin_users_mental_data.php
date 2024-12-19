<?php
// Database connection
include 'db.php'; 

// Fetch user mental problem details
$sql = "SELECT * FROM user_mental_problems";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Mental Problems</title>
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 20px;
            width: 100%;
        }

        h1 {
            margin: 0;
            font-size: 28px;
        }

        /* Table Styling */
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td {
            color: #333;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <header>
        <h1>User Mental Problems Data</h1>
    </header>

    <!-- Data Table -->
    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Problem ID</th>
                    <th>User ID</th>
                    <th>Problem Description</th>
                    <th>Diagnosis Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['problem_id']); ?></td>
                    <td><?= htmlspecialchars($row['user_id']); ?></td>
                    <td><?= htmlspecialchars($row['problem_description']); ?></td>
                    <td><?= htmlspecialchars($row['diagnosis_date']); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No data found.</p>
    <?php endif; ?>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 Mental Health Management System. All Rights Reserved.</p>
    </footer>

</body>
</html>

<?php
$conn->close();
?>
