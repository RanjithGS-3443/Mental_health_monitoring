<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Psychologist Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: yellow;
            color: black;
            padding: 15px 0;
            text-align: center;
            font-size: 24px;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 10px 0;
            text-align: center;
            margin-top: auto; /* Push the footer to the bottom */
        }

        .content {
            flex-grow: 1;
            text-align: center;
            padding: 50px;
        }

        h1 {
            color: #4CAF50;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: inline-block;
            text-align: left;
            width: 300px;
        }

        label {
            margin: 10px 0;
            display: block;
        }

        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            margin-top: 10px;
        }

        .home-button, .register-button {
            margin-top: 20px;
        }

        .home-button a, .register-button a {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .home-button a:hover, .register-button a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <header>
        <h1>Welcome to the Psychologist Portal</h1>
        <p>Mental Health Management System</p>
    </header>

    <div class="content">
        <h1>Psychologist Login</h1>

        <form action="psychologists_login.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" name="login" value="Login">
        </form>

        <?php
        if (isset($_POST['login'])) {
            include 'db.php'; // Include your DB connection

            $email = $_POST['email'];
            $password = $_POST['password'];

            // Query to check if the psychologist exists and password matches
            $query = "SELECT * FROM psychologists WHERE email = '$email' AND password = '$password'";
            $result = $conn->query($query);

            if ($result && $result->num_rows > 0) {
                // Login successful, redirect to psychologist menu
                header("Location: psychologists_menu.php");
                exit();
            } else {
                echo "<p class='error'>Invalid email or password. Please try again.</p>";
            }
        }
        ?>

        <div class="home-button">
            <a href="index.php">Home</a>
        </div>
        <div class="register-button">
            <a href="psychologists.php">Register</a>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Mental Health Monitoring System. All Rights Reserved.</p>
    </footer>

</body>
</html>
