<?php
session_start();
include 'db.php'; // Database connection

// Handle feedback retrieval
$feedbackScore = null;
$feedbackResults = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['feedback_score'])) {
    $feedbackScore = intval($_POST['feedback_score']);

    // Validate the feedback score
    if ($feedbackScore >= 1 && $feedbackScore <= 5) {
        // Fetch feedback details based on the score
        $stmt = $conn->prepare("SELECT * FROM feedback WHERE feedback_score = ?");
        $stmt->bind_param('i', $feedbackScore);
        $stmt->execute();
        $feedbackResults = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    } else {
        $error = "Please enter a valid score between 1 and 5.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Menu</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #121212; /* Dark background */
            color: #e0e0e0; /* Light text color */
            margin: 0;
            padding: 0;
        }

        header {
            background-color: blue; /* Header background */
            padding: 15px;
            text-align: center;
            position: relative; /* Allows positioning of elements inside */
        }

        /* Style for the Home button */
        .home-button {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: #007bff; /* Button color */
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .home-button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        nav {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        nav a {
            color: #e0e0e0;
            text-decoration: none;
            padding: 10px 15px;
            background-color: #3a3a3a; /* Nav link background */
            border-radius: 5px;
        }

        nav a:hover {
            background-color: #4a4a4a; /* Hover effect */
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: green; /* Footer background */
            color: #e0e0e0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .content {
            padding: 20px;
            min-height: calc(100vh - 80px); /* For positioning footer at the bottom */
        }

        .feedback-section {
            margin-top: 20px;
            background-color: #1f1f1f;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }

        .error {
            color: red;
        }

        .feedback-results {
            margin-top: 10px;
        }

        input[type="number"], input[type="submit"] {
            background-color: #333; 
            color: #e0e0e0; 
            border: 1px solid #555; 
            padding: 10px; 
            font-size: 18px; /* Increased font size */
            border-radius: 5px; 
            width: 100%;
            margin-bottom: 15px;
        }

        input[type="submit"] {
            background-color: #28a745; 
            color: white; 
            border: none; 
            cursor: pointer; 
        }

        /* Buttons with larger sizes and different colors */
        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn-group a {
            padding: 15px 30px;
            font-size: 18px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            text-align: center;
            flex-grow: 1;
            margin-right: 10px;
        }

        .btn-group a:nth-child(1) {
            background-color: #007bff; /* Blue */
        }

        .btn-group a:nth-child(2) {
            background-color: #ffc107; /* Yellow */
        }

        .btn-group a:nth-child(3) {
            background-color: #dc3545; /* Red */
        }

        .btn-group a:nth-child(4) {
            background-color: #28a745; /* Green */
        }

        .btn-group a:hover {
            opacity: 0.9;
        }

    </style>
</head>
<body>

<header>
    <h1>Mental Health Management System</h1>
    <h2>Your mental Health Our priority</h2>
    <h3>ADMIN DASHBOARD</h3>
    <!-- Home button on the right -->
    <a href="index.php" class="home-button">Home</a>
</header>

<div class="content">
    <div class="feedback-section">
        <h2>View Feedback</h2>
        <form method="post">
            <label for="feedback_score" style="color: #e0e0e0;">Enter Feedback Score (1-5):</label>
            <input type="number" name="feedback_score" id="feedback_score" min="1" max="5" required>
            <input type="submit" value="Retrieve Feedback">
        </form>

        <?php if (isset($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <?php if ($feedbackResults): ?>
            <div class="feedback-results">
                <h3>Feedback Results:</h3>
                <ul>
                    <?php foreach ($feedbackResults as $feedback): ?>
                        <li>
                            <strong>Feedback By:</strong> <?= htmlspecialchars($feedback['name']) ?> (<?= htmlspecialchars($feedback['email']) ?>)<br>
                            <strong>Psychologist:</strong> <?= htmlspecialchars($feedback['psychologist_name']) ?> (<?= htmlspecialchars($feedback['psychologist_email']) ?>)<br>
                            <strong>Feedback Comment:</strong> <?= htmlspecialchars($feedback['feedback']) ?><br>
                            <strong>Score:</strong> <?= htmlspecialchars($feedback['feedback_score']) ?><br>
                            <strong>Submitted At:</strong> <?= htmlspecialchars($feedback['submitted_at']) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>

    <!-- Button Group for navigation or actions -->
    <div class="btn-group">
        <a href="admin_approvals.php">Approve Requests</a>
        <a href="employees_data.php">Employee List</a>
        <a href="admin_users_data.php">Users Info</a>
        <a href="admin_users_mental_data.php">Mental Data</a>
    </div>
</div>

<footer>
    <p>&copy; 2024 Mental Health Monitoring System. All Rights Reserved.</p>
</footer>

</body>
</html>
