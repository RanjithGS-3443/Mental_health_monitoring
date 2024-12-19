<?php
session_start();

// Check if answers are set in the session
if (!isset($_SESSION['answers'])) {
    header("Location: quiz.php");
    exit;
}

// Calculate the total score
$totalScore = array_sum($_SESSION['answers']);

// Provide result based on total score
if ($totalScore >= 35) {
    $result = "You may be experiencing high levels of stress and anxiety. It might be beneficial to seek professional help.";
} elseif ($totalScore >= 25) {
    $result = "You are experiencing moderate stress levels. Consider relaxation techniques and coping strategies.";
} elseif ($totalScore >= 15) {
    $result = "You have mild stress and anxiety. Keep an eye on it and engage in self-care practices.";
} else {
    $result = "You seem to be in a good mental state. Keep up the positive mental health practices!";
}

// Clear session data to allow the user to retake the quiz
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mental Health Quiz Results</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            color: #333;
        }

        h1 {
            margin-bottom: 20px;
            color: #2980b9;
        }

        p {
            margin-bottom: 20px;
        }

        a {
            display: inline-block;
            text-decoration: none;
            color: white;
            background-color: #46c37f;
            padding: 10px 15px;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <h1>Quiz Results</h1>
    <p><?= $result ?></p>

    <a href="quiz.php">Retake Quiz</a>
    <a href="index.php" style="background-color: #2980b9;">Home</a>

</body>
</html>
