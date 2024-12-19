<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
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
        }

        .user-details {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: inline-block;
            text-align: left;
            width: 300px;
        }

        h2 {
            color: #4CAF50;
            margin-bottom: 20px;
        }

        p {
            margin: 10px 0;
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
    <h1>User Registered Successfully</h1>

    <div class="user-details">
        <h2>User Details:</h2>
        <p><strong>User ID:</strong> <?php echo htmlspecialchars($_GET['user_id'] ?? ''); ?></p>
        <p><strong>Username:</strong> <?php echo htmlspecialchars($_GET['username'] ?? ''); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($_GET['email'] ?? ''); ?></p>
        <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($_GET['dob'] ?? ''); ?></p>
        <p><strong>Gender:</strong> <?php echo htmlspecialchars($_GET['gender'] ?? ''); ?></p>
        <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($_GET['phone'] ?? ''); ?></p>
    </div>

    <a href="index.php" class="home-button">Home</a>

</body>
</html>
