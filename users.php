<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 8px;
            color: #555;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="date"],
        select {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="submit"] {
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .success-message, .error-message {
            text-align: center;
            margin-top: 10px;
            font-size: 16px;
        }
        .success-message {
            color: #28a745;
        }
        .error-message {
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add User</h1>
        <form action="" method="POST">
            <label>Username:</label>
            <input type="text" name="username" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Password:</label>
            <input type="password" name="password" required>

            <label>Date of Birth:</label>
            <input type="date" name="dob" required>

            <label>Gender:</label>
            <select name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <label>Phone Number:</label>
            <input type="text" name="phone" required>

            <input type="submit" name="submit" value="Register">
        </form>

        <?php
        // Include the database connection file
        include 'db.php';

        // Check if form is submitted
        if (isset($_POST['submit'])) {
            // Capture the form inputs
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password']; // Storing the password as plain text (not recommended for production)
            $dob = $_POST['dob'];
            $gender = $_POST['gender'];
            $phone = $_POST['phone'];

            // Insert query to add the user details into the users table
            $sql = "INSERT INTO users (username, email, password, date_of_birth, gender, phone_number)
                    VALUES ('$username', '$email', '$password', '$dob', '$gender', '$phone')";

            // Execute the query and check for success or failure
            if ($conn->query($sql) === TRUE) {
                // Redirect to users_menu.php after successful insertion
                header("Location: users_menu.php");
                exit();
            } else {
                echo "<div class='error-message'>Error: " . $sql . "<br>" . $conn->error . "</div>";
            }
        }
        ?>
    </div>
</body>
</html>
