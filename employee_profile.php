<?php
// Include your database connection file
include 'db.php';

session_start();

// Check if the employee is logged in
if (!isset($_SESSION['employee_id'])) {
    echo "<script>window.location.href = 'employee_login.php';</script>";
    exit();
}

$employee_id = $_SESSION['employee_id'];
$employee_name = $_SESSION['employee_name']; // Get the employee name from the session

// Fetch employee details from the database
$sql = "SELECT employee_id, name, role, phone_number, email, hire_date, created_at FROM employees WHERE employee_id = $employee_id";
$result = $conn->query($sql);

// If employee details found, store them in an associative array
if ($result->num_rows > 0) {
    $employee = $result->fetch_assoc();
} else {
    echo "Employee details not found!";
    exit();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Profile</title>
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
            max-width: 500px;
            margin: 20px auto;
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

        .welcome {
            font-size: 1.2rem;
            color: #4CAF50;
            margin-bottom: 20px;
        }

    </style>
</head>
<body>

<header>
    <h2>Employee Profile</h2>
</header>

<div class="container">
    <h1>Your Profile</h1>
    <div class="welcome">
        Welcome, <?php echo htmlspecialchars($employee_name); ?>! <!-- Display the logged-in employee's name -->
    </div>
    <div class="profile-info">
        <table>
            <tr>
                <th>Employee ID</th>
                <td><?php echo $employee['employee_id']; ?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?php echo $employee['name']; ?></td>
            </tr>
            <tr>
                <th>Role</th>
                <td><?php echo $employee['role']; ?></td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td><?php echo $employee['phone_number']; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $employee['email']; ?></td>
            </tr>
            <tr>
                <th>Hire Date</th>
                <td><?php echo $employee['hire_date']; ?></td>
            </tr>
            <tr>
                <th>Created At</th>
                <td><?php echo $employee['created_at']; ?></td>
            </tr>
        </table>
    </div>

    <!-- Home button redirect to home page (modify the link as necessary) -->
    <a href="employees_menu.php" class="home-button">Home</a>
</div>

<footer>
    <p>&copy; 2024 Mental Health Management System</p>
</footer>

</body>
</html>
