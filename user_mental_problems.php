<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User Mental Problem</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;  /* Dark background for the theme */
            color: #e0e0e0;  /* Light text color */
            margin: 0;
            padding: 0;
        }

        /* Header styles */
        header {
            background-color: #1e1e1e;  /* Darker shade for header */
            padding: 20px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
        }

        header nav {
            display: flex;
            align-items: center;
        }

        /* Profile Button (Hamburger Menu) on the left */
        .profile-button {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: white;
            padding-right: 20px;
        }

        /* Home button on the right */
        .home-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
        }

        .home-button:hover {
            background-color: #45a049;
        }

        footer {
            background-color: #1e1e1e;
            padding: 10px;
            text-align: center;
            color: white;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        footer p {
            margin: 5px 0;
        }

        main {
            text-align: center;
            padding: 50px;
        }

        h2 {
            color: #4CAF50;
            margin-bottom: 20px;
        }

        /* Enhanced form design for dark theme */
        form {
            background-color: #1e1e1e;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.5);
            display: inline-block;
            text-align: left;
            width: 400px;
            transition: transform 0.2s ease-in-out;
        }

        form:hover {
            transform: scale(1.02);
        }

        label {
            margin: 10px 0;
            display: block;
            font-size: 14px;
            font-weight: bold;
            color: #e0e0e0;  /* Light text for labels */
        }

        input[type="email"],
        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 12px;
            margin: 8px 0 20px;
            border: 1px solid #333;  /* Darker borders */
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 14px;
            background-color: #333;  /* Dark input background */
            color: #e0e0e0;  /* Light input text */
            transition: border 0.3s;
        }

        input[type="email"]:focus,
        input[type="text"]:focus,
        input[type="date"]:focus,
        textarea:focus {
            border-color: #4CAF50;
            outline: none;
        }

        textarea {
            resize: none;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .message {
            color: green;
            font-size: 16px;
            font-weight: bold;
            margin-top: 20px;
        }

    </style>
</head>
<body>

    <!-- Header Section -->
    <header>
        <!-- Profile Button (hamburger icon) -->
       <!-- Profile Button (hamburger icon) linked to another file -->
<a href="user_profile.php">
    <button class="profile-button">&#9776;</button>
</a>

        <h1>Mental Health Portal</h1>
        <!-- Home button at top-right -->
        <a href="users_menu.php" class="home-button">Home</a>
    </header>

    <!-- Main Content -->
    <main>
        <h2>Add User Mental Problem</h2>
        <form action="" method="POST">
            <label>Email ID:</label>
            <input type="email" name="email" required>
            
            <label>Phone Number:</label>
            <input type="text" name="phone" required>
            
            <label>Mental Problem Description:</label>
            <textarea name="problem_description" rows="4" required></textarea>
            
            <label>Diagnosis Date:</label>
            <input type="date" name="diagnosis_date" required>
            
            <input type="submit" name="submit" value="Add Problem">
        </form>

        <?php
        include 'db.php';

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $problem_description = $_POST['problem_description'];
            $diagnosis_date = $_POST['diagnosis_date'];

            // Fetch user_id using email and phone
            $query = "SELECT user_id FROM users WHERE email = '$email' AND phone_number = '$phone'";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $user_id = $row['user_id'];

                // Insert the mental problem
                $sql = "INSERT INTO user_mental_problems (user_id, problem_description, diagnosis_date)
                        VALUES ('$user_id', '$problem_description', '$diagnosis_date')";

                if ($conn->query($sql) === TRUE) {
                    echo "<p class='message'>Problem added successfully</p>";
                } else {
                    echo "<p style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
                }
            } else {
                echo "<p style='color: red;'>No user found with the provided email and phone number.</p>";
            }
        }
        ?>

    </main>

    <!-- Footer Section -->
    <footer>
        <p>>&copy; 2024 Mental Health Portal. All rights reserved. Contact us: ranjithgs1234@gmail.com.com | +91 7204962838</p>
    </footer>

</body>
</html>
