<?php
session_start();
include 'db.php'; // Include your database connection file

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    header('Location: users_menu.php'); // Redirect to dashboard if already logged in
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT user_id, username, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a user was found
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Compare plain text password (DO NOT USE in production)
        if ($password === $user['password']) {
            $_SESSION['user_id'] = $user['user_id']; // Store user ID in session
            $_SESSION['userData'] = $user; // Store user data in session
            header('Location: users_menu.php'); // Redirect to dashboard
            exit();
        } else {
            $error = "Invalid email or password.";
        }
    } else {
        $error = "No account found with that email.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #121212;  /* Dark background for the entire page */
            color: #e0e0e0;  /* Light text color */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header Section */
        header {
            background-color: #1e1e1e;
            padding: 20px;
            color: white;
            text-align: center;
            font-size: 24px;
        }

        /* Footer Section */
        footer {
            background-color: #1e1e1e;
            padding: 10px;
            text-align: center;
            color: white;
            position: relative;
            bottom: 0;
            width: 100%;
            margin-top: auto;
        }

        footer p {
            margin: 5px 0;
        }

        /* Main container for the form */
        .container {
            background-color: #1e1e1e;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 400px;
            text-align: center;
            margin: 50px auto;
        }

        h1 {
            color: #4CAF50;
            margin-bottom: 20px;
        }

        label {
            margin-bottom: 8px;
            display: block;
            color: #e0e0e0;
            text-align: left;
        }

        input[type="email"],
        input[type="password"] {
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
            background-color: #333;  /* Dark input background */
            color: #e0e0e0;  /* Light text color */
            transition: border-color 0.3s;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #4CAF50;  /* Green border on focus */
            outline: none;
        }

        input[type="submit"] {
            padding: 12px;
            background-color: #4CAF50;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: #dc3545;
            text-align: center;
            margin-top: 10px;
        }

        p {
            margin-top: 20px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <header>
        <h1>Mental Health Portal</h1>
    </header>

    <!-- Main Content Section -->
    <div class="container">
        <h1>Login</h1>
        <form action="login.php" method="POST">
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <input type="submit" value="Login">
        </form>
        <p>Don't have an account? <a href="users.php">Register here</a></p>
        <?php if (isset($error)): ?>
            <div class="error-message"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
    </div>

    <!-- Footer Section -->
    <footer>

        <p>&copy; 2024 Mental Health Portal. All rights reserved. Contact us: ranjithgs1234@gmail.com | +91 7204962838</p>
    </footer>

</body>
</html>
