<?php
include 'db.php'; // Database connection

$message = ""; // Initialize the message variable

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone_number'];
    $password = $_POST['password']; // Secure password hashing can be done if needed
    $role = 'psychologist'; // Role set to psychologist
    $date_of_birth = $_POST['date_of_birth'];
    $years_of_experience = $_POST['years_of_experience'];
    $education = $_POST['education'];

    // Insert into pending_approvals
    $stmt = $conn->prepare("INSERT INTO pending_approvals (username, email, password, phone_number, role, date_of_birth, years_of_experience, education) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssssis', $username, $email, $password, $phone, $role, $date_of_birth, $years_of_experience, $education);

    if ($stmt->execute()) {
        $message = "Your details have been sent to admin. Please wait for the approval."; // Success message
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Psychologist Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input, textarea {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        textarea {
            resize: vertical;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .container {
                width: 90%;
                padding: 15px;
            }
        }

        /* Message Styles */
        .message {
            margin: 20px 0;
            padding: 10px;
            font-size: 16px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            text-align: center;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Home button */
        .home-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .home-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Home Button -->
        <a href="index.php" class="home-button">Home</a>

        <h1>Psychologist Registration</h1>

        <!-- Show message if available -->
        <?php if ($message): ?>
            <div class="message <?= strpos($message, 'Error') !== false ? 'error' : '' ?>">
                <?= $message ?>
            </div>
        <?php endif; ?>

        <form action="psychologists.php" method="post">
            <label for="username">Full Name</label>
            <input type="text" name="username" id="username" required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>

            <label for="phone_number">Phone Number</label>
            <input type="tel" name="phone_number" id="phone_number" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>

            <label for="date_of_birth">Date of Birth</label>
            <input type="date" name="date_of_birth" id="date_of_birth" required>

            <label for="years_of_experience">Years of Experience</label>
            <input type="number" name="years_of_experience" id="years_of_experience" required>

            <label for="education">Education Details</label>
            <textarea name="education" id="education" rows="5" required></textarea>

            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>
