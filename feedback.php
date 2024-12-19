<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Feedback</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #e9ecef;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
        }

        header {
            width: 100%;
            background-color: #007bff;
            padding: 20px;
            color: white;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        /* Form Styling */
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: left;
        }

        label {
            margin: 10px 0;
            display: block;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .success, .error {
            margin-top: 20px;
            font-weight: bold;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }

        .home-button {
            margin-top: 20px;
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
        }

        .home-button:hover {
            background-color: #218838;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 30px;
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
        <h1>User Feedback</h1>
    </header>

    <!-- Feedback Form -->
    <form action="" method="POST">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Your Email:</label>
        <input type="text" id="email" name="email" required>

        <label for="psychologist_name">Psychologist Name:</label>
        <input type="text" id="psychologist_name" name="psychologist_name" required>

        <label for="psychologist_email">Psychologist Email:</label>
        <input type="text" id="psychologist_email" name="psychologist_email" required>

        <label for="feedback_score">Feedback Score:</label>
        <select id="feedback_score" name="feedback_score" required>
            <option value="">Select a score</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <label for="feedback">Feedback:</label>
        <textarea id="feedback" name="feedback" rows="5" required></textarea>

        <input type="submit" name="submit" value="Submit Feedback">
    </form>

    <?php
    include 'db.php';

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $psychologist_name = $_POST['psychologist_name'];
        $psychologist_email = $_POST['psychologist_email'];
        $feedback_score = $_POST['feedback_score'];
        $feedback = $_POST['feedback'];

        $sql = "INSERT INTO feedback (name, email, psychologist_name, psychologist_email, feedback_score, feedback) VALUES ('$name', '$email', '$psychologist_name', '$psychologist_email', '$feedback_score', '$feedback')";

        if ($conn->query($sql) === TRUE) {
            echo "<p class='success'>Feedback submitted successfully!</p>";
        } else {
            echo "<p class='error'>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }
    }
    ?>

    <!-- Home Button -->
    <a href="index.php" class="home-button">Home</a>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 Mental Health Management System. All Rights Reserved.</p>
    </footer>

</body>
</html>
