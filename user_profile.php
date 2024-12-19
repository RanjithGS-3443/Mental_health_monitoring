<?php
session_start();

// Include the database connection file
include 'db.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login if not authenticated
    exit();
}

// Fetch user details from the database
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT username, email, date_of_birth, gender, phone_number FROM users WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
} else {
    $error = "User not found.";
}

// Close the statement
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Mental Health Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: rgba(76, 175, 80, 0.8);
            padding: 20px;
            color: white;
            text-align: center;
            position: relative; /* Allows absolute positioning for the home button */
        }

        h1 {
            margin-bottom: 10px;
        }

        .home-button {
            background-color: red;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            position: absolute; /* Position it at the top left */
            top: 20px; /* Adjust to fit nicely */
            left: 20px; /* Position from the left */
        }

        main {
            flex: 1;
            padding: 30px;
            background-color: white;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin: 20px;
            border-radius: 10px;
        }

        h2 {
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .user-details {
            margin-bottom: 20px;
        }

        .user-details label {
            font-weight: bold;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px 0;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>

    <header>
        <a href="users_menu.php" class="home-button">Home</a>
        <h1>User Profile</h1>
    </header>

    <main>
        <h2>Your Details</h2>
        <div class="user-details">
            <?php if (isset($error)): ?>
                <p style="color: #dc3545;"><?= htmlspecialchars($error) ?></p>
            <?php else: ?>
                <p><label>Name:</label> <?= htmlspecialchars($userData['username']) ?></p>
                <p><label>Email:</label> <?= htmlspecialchars($userData['email']) ?></p>
                <p><label>Date of Birth:</label> <?= htmlspecialchars($userData['date_of_birth']) ?></p>
                <p><label>Gender:</label> <?= htmlspecialchars($userData['gender']) ?></p>
                <p><label>Phone Number:</label> <?= htmlspecialchars($userData['phone_number']) ?></p>
            <?php endif; ?>
        </div>
        <a href="edit_profile.php">Edit Profile</a>
    </main>

    <footer>
        <p>&copy; 2024 Mental Health Management System. All Rights Reserved.</p>
    </footer>

</body>
</html>
