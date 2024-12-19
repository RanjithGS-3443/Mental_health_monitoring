<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allocate Physiologist</title>
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

        input[type="number"],
        input[type="date"],
        input[type="time"] {
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

        .home-button {
            margin-top: 30px;
        }

        .home-button a {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .home-button a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Allocate Psychologist to User</h1>
    <form action="" method="POST">
        <label>User ID:</label>
        <input type="number" name="user_id" required>
        
        <label>Physiologist ID:</label>
        <input type="number" name="psycho_id" required>
        
        <label>Allocation Date:</label>
        <input type="date" name="appointment_date" required>
        
        <label>Allocation Time:</label>
        <input type="time" name="appointment_time" required>
        
        <input type="submit" name="submit" value="Allocate Physiologist">
    </form>

    <?php
    include 'db.php';

    if (isset($_POST['submit'])) {
        $user_id = $_POST['user_id'];
        $psycho_id = $_POST['psycho_id'];
        $appointment_date = $_POST['appointment_date'];
        $appointment_time = $_POST['appointment_time'];

        $sql = "INSERT INTO psychologists_allocation (user_id, psycho_id, appointment_date, appointment_time)
                VALUES ('$user_id', '$psycho_id', '$appointment_date', '$appointment_time')";

        if ($conn->query($sql) === TRUE) {
            echo "<p class='success'>Psychologists allocated successfully!</p>";
        } else {
            echo "<p class='error'>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }
    }
    ?>

    <div class="home-button">
        <a href="index.php">Home</a>
    </div>
</body>
</html>
