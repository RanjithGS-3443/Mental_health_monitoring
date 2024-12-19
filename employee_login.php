<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header Styling */
        header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 20px;
        }

        header h1 {
            font-size: 1.8rem;
        }

        /* Container for the form */
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin: 20px auto;
            text-align: center;
            flex: 1; /* Make sure the container takes available space */
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input[type="text"], input[type="password"] {
            padding: 10px;
            margin: 10px 0;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        .error-message {
            color: #dc3545;
            margin-top: 10px;
            font-size: 14px;
        }

        /* Footer Styling */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px 0;
        }

        footer p {
            margin: 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            header h1 {
                font-size: 1.5rem;
            }

            .container {
                padding: 20px;
                max-width: 90%;
            }

            input[type="submit"] {
                width: 100%;
                font-size: 14px;
            }
        }

        @media (min-width: 769px) {
            .container {
                max-width: 500px;
            }

            input[type="submit"] {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <header>
        <h1>Employee Login</h1>
    </header>

    <!-- Main Container -->
    <div class="container">
        <h1>Login</h1>
        <form action="" method="POST">
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="login" value="Login">
        </form>

        <!-- PHP to handle form submission -->
        <?php
// Include your database connection file
include 'db.php';

session_start(); // Start the session

// Check if the login form is submitted
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to check if the employee exists and the credentials match
    $sql = "SELECT employee_id, name FROM employees WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    // If employee credentials are correct, store their ID and name in session
    if ($result->num_rows > 0) {
        $employee = $result->fetch_assoc();
        $_SESSION['employee_id'] = $employee['employee_id'];
        $_SESSION['employee_name'] = $employee['name']; // Store name in session
        echo "<script>window.location.href = 'employees_menu.php';</script>";
    } else {
        echo "<div class='error-message'>Invalid email or password.</div>";
    }
}
?>

    </div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 Company Name. All rights reserved.</p>
    </footer>

</body>
</html>
