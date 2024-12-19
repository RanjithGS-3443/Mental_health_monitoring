<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Psychologist Status</title>
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

        input[type="email"],
        select {
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

        .home-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
        }

        .home-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h1>Update Psychologist Status</h1>
    <form action="" method="POST">
        <label>Email ID:</label>
        <input type="email" name="email" required>
        
        <label>Update Availability:</label>
        <select name="availability" required>
            <option value="available">Available</option>
            <option value="unavailable">Unavailable</option>
        </select>
        
        <input type="submit" name="submit" value="Update Status">
    </form>

    <?php
    include 'db.php';

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $availability = $_POST['availability'];

        // Update the availability in the database using the email
        $sql = "UPDATE psychologists SET availability = '$availability' WHERE email = '$email'";

        if ($conn->query($sql) === TRUE) {
            echo "<p style='color: green;'>Status updated successfully</p>";
        } else {
            echo "<p style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }
    }
    ?>

    <a href="index.php" class="home-button">Home</a>

</body>
</html>
