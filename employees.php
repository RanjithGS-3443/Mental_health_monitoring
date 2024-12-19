<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
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

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="password"] {
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
    </style>
</head>
<body>
    <h1>Add Employee</h1>
    <form action="" method="POST">
        <label>Name:</label>
        <input type="text" name="name" required><br>

        <label>Role:</label>
        <input type="text" name="role" required><br>

        <label>Phone Number:</label>
        <input type="text" name="phone" required><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Hire Date:</label>
        <input type="date" name="hire_date" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" name="submit" value="Add Employee">
    </form>

    <?php
    include 'db.php';

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $role = $_POST['role'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $hire_date = $_POST['hire_date'];
        $password = $_POST['password']; // Hashing password for security

        $sql = "INSERT INTO employees (name, role, phone_number, email, hire_date, password)
                VALUES ('$name', '$role', '$phone', '$email', '$hire_date', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "<p class='success'>Employee added successfully</p>";
        } else {
            echo "<p class='error'>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }
    }
    ?>
</body>
</html>
