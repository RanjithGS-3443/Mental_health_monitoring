<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Psychologists Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            text-align: center;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
        }

        h1 {
            margin: 0;
            font-size: 2.5em;
        }

        nav {
            flex-grow: 1; /* Allow navigation to take up remaining space */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            margin: 15px 0;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            font-size: 1.2em;
            padding: 10px 15px;
            border-radius: 5px;
            background-color: #4CAF50; /* Background color for the options */
            transition: background-color 0.3s ease;
            display: inline-block; /* Ensures the padding is respected */
        }

        nav ul li a:hover {
            background-color: #45a049; /* Darker shade on hover */
        }

        footer {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 15px;
        }

        footer p {
            margin: 0;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <header>
        <h1>Pychologists Section</h1>
    </header>
    <nav>
        <ul>
            <li><a href="status.php">Update Status</a></li>
            <li><a href="appointments_by_email.php">View Appointments</a></li>
        </ul>
    </nav>

    <footer>
        <p>&copy; 2024 Mental Health Management System</p>
    </footer>
</body>
</html>
