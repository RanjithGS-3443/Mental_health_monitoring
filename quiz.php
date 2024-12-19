<?php
session_start();

// Array holding the quiz questions and their possible answers
$questions = [
    "How often do you feel anxious?" => ["Often" => 4, "Sometimes" => 3, "Rarely" => 2, "Never" => 1],
    "Do you experience mood swings?" => ["Yes, frequently" => 4, "Sometimes" => 3, "Rarely" => 2, "No, never" => 1],
    "How would you rate your stress levels?" => ["High" => 4, "Moderate" => 3, "Low" => 2, "Very Low" => 1],
    "Do you find it difficult to relax?" => ["Always" => 4, "Often" => 3, "Sometimes" => 2, "Rarely" => 1],
    "Do you often feel fatigued?" => ["Yes, very often" => 4, "Yes, occasionally" => 3, "Rarely" => 2, "No" => 1],
    "How often do you feel hopeless?" => ["Always" => 4, "Often" => 3, "Sometimes" => 2, "Never" => 1],
    "Do you have trouble sleeping?" => ["Yes, frequently" => 4, "Sometimes" => 3, "Rarely" => 2, "No" => 1],
    "How often do you feel overwhelmed?" => ["Always" => 4, "Often" => 3, "Sometimes" => 2, "Rarely" => 1],
    "Do you struggle with focus or concentration?" => ["Yes, very often" => 4, "Sometimes" => 3, "Rarely" => 2, "No" => 1],
    "Do you feel you have adequate support for your mental health?" => ["No, not at all" => 4, "Not really" => 3, "Somewhat" => 2, "Yes, fully" => 1]
];

// Get the current question index
$questionIndex = isset($_SESSION['questionIndex']) ? $_SESSION['questionIndex'] : 0;

// If form is submitted, store the previous answer in the session
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $answer = isset($_POST['answer']) ? intval($_POST['answer']) : 0;
    $_SESSION['answers'][] = $answer;
    $questionIndex++;
    $_SESSION['questionIndex'] = $questionIndex;
}

// If all questions are answered, redirect to the results page
if ($questionIndex >= count($questions)) {
    header("Location: result.php");
    exit;
}

// Get the current question and its options
$currentQuestion = array_keys($questions)[$questionIndex];
$options = $questions[$currentQuestion];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mental Health Quiz - Question <?= $questionIndex + 1 ?></title>
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

        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            margin: 10px 0 5px;
            display: block;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        button {
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #46c37f;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #3eaf6b;
        }
    </style>
</head>
<body>

    <h1>Question <?= $questionIndex + 1 ?></h1>

    <form action="quiz.php" method="POST">
        <p><?= $currentQuestion ?></p>
        <?php foreach ($options as $optionText => $optionValue): ?>
            <label><input type="radio" name="answer" value="<?= $optionValue ?>" required> <?= $optionText ?></label>
        <?php endforeach; ?>

        <button type="submit">Next</button>
    </form>

</body>
</html>
