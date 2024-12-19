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

// Check if session variables are set; if not, initialize them
if (!isset($_SESSION['questionIndex'])) {
    $_SESSION['questionIndex'] = 0;
    $_SESSION['answers'] = [];
}

// Get the current question index
$questionIndex = $_SESSION['questionIndex'];

// If form is submitted, store the previous answer in the session
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $answer = isset($_POST['answer']) ? intval($_POST['answer']) : 0;
    $_SESSION['answers'][] = $answer;
    $questionIndex++;
    $_SESSION['questionIndex'] = $questionIndex;
}

// If all questions are answered, calculate the score and show the result
if ($questionIndex >= count($questions)) {
    $totalScore = array_sum($_SESSION['answers']);

    // Define score ranges and corresponding feedback
    $resultMessage = "";
    $suggestions = "";

    if ($totalScore <= 10) {
        $resultMessage = "Your mental health seems to be in a good state.";
        $suggestions = "Continue practicing self-care, maintain a healthy work-life balance, and seek support if needed.";
    } elseif ($totalScore <= 20) {
        $resultMessage = "You may be experiencing some mild mental health challenges.";
        $suggestions = "Consider implementing stress-relieving activities like meditation or exercise. Seek support from friends or family.";
    } elseif ($totalScore <= 30) {
        $resultMessage = "It seems you are dealing with moderate mental health issues.";
        $suggestions = "Consider consulting a mental health professional or counselor. Taking time to de-stress and talk to someone may help.";
    } else {
        $resultMessage = "You may be experiencing severe mental health challenges.";
        $suggestions = "It’s highly recommended that you seek professional help. Therapy, counseling, and possibly medical intervention may be necessary.";
    }

    // Clear the session after the quiz is completed
    session_unset();
    session_destroy();

    // Display result
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Quiz Result</title>
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
                color: #2980b9;
            }
            .result {
                background-color: white;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                text-align: center;
            }
            .suggestions {
                margin-top: 10px;
                padding: 15px;
                background-color: #f9f9f9;
                border-radius: 8px;
                border: 1px solid #ddd;
            }
        </style>
    </head>
    <body>
        <h1>Your Result</h1>
        <div class='result'>
            <p><strong>Your total score is:</strong> $totalScore</p>
            <p>$resultMessage</p>
        </div>
        <div class='suggestions'>
            <h3>Suggestions:</h3>
            <p>$suggestions</p>
        </div>
        <a href='assessment.php'>Take the quiz again</a>
        <a href='index.php'>Home</a>
    </body>
    </html>";
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
            justify-content: space-between;
            min-height: 100vh;
            color: #333;
        }

        header, footer {
            background-color: #2980b9;
            color: white;
            text-align: center;
            padding: 20px 0;
            width: 100%;
        }

        header h1 {
            margin: 0;
            font-size: 2rem;
        }

        footer p {
            margin: 0;
        }

        .container {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 600px;
            text-align: left;
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

    <!-- Header Section -->
    <header>
        <h1>Mental Health Quiz</h1>
    </header>

    <!-- Main Content Section -->
    <div class="container">
        <h1>Question <?= $questionIndex + 1 ?></h1>

        <form action="assessment.php" method="POST">
            <p><?= $currentQuestion ?></p>
            <?php foreach ($options as $optionText => $optionValue): ?>
                <label><input type="radio" name="answer" value="<?= $optionValue ?>" required> <?= $optionText ?></label>
            <?php endforeach; ?>

            <button type="submit">Next</button>
        </form>
    </div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; <?= date('Y'); ?> Mental Health Assessment Quiz. All Rights Reserved.</p>
        <a href="index.php" style="color: white; text-decoration: none;">Home</a>
    </footer>

</body>
</html>
