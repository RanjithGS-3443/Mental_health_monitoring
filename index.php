<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mental Health Management System</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-image: url('brainbird.jpeg');
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat; 
            color: #2c3e50; 
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header Styling */
        header {
            width: 100%;
            background-color: rgba(46, 204, 113, 0.9);
            padding: 1px 5px; 
            color: white;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        header img {
            max-width: 50%; /* Reduced image size */
            height: auto; /* Let height adjust automatically */
            max-height: 100px; /* Set maximum height for the image */
            margin-bottom: 5px; 
        }

        h1 {
            font-size: 28px; /* Increased font size */
            font-family: 'Verdana', sans-serif; /* Changed font style */
            color: black; /* Changed color to black */
            margin-bottom: 5px; 
        }

        h2 {
            font-size: 16px; /* Increased font size */
            font-family: 'Georgia', serif; /* Changed font style */
            color: black; /* Changed color to black */
            margin-top: 5px; 
            font-weight: 300;
        }

        /* Main Section Styling */
        main {
            flex: 1;
            text-align: center;
            padding: 40px 20px;
            background-color: rgba(255, 255, 255, 0.9); 
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
            margin: 20px auto;
            border-radius: 8px;
            max-width: 1200px; 
        }

        p {
            font-size: 20px;
            color: #34495e; 
            margin-bottom: 40px;
            line-height: 1.6; 
        }

        /* Dashboard Styling */
        .dashboard {
            display: flex; 
            justify-content: center; 
            flex-wrap: wrap; 
            gap: 30px; 
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.7); /* Semi-transparent white */
            border-radius: 10px; /* Optional: Rounded corners */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Optional: Shadow effect */
        }

        .dashboard-item {
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            color: white;
            font-size: 22px;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            min-width: 180px; 
            flex: 1 1 200px; 
        }

        /* Admin Button Color */
        .dashboard-item.admin {
            background-color: rgba(231, 76, 60, 0.8); /* Red color */
        }

        /* Dashboard Item Colors */
        .dashboard-item.users {
            background-color: rgba(52, 152, 219, 0.8); /* Blue color */
        }

        .dashboard-item.psychologists {
            background-color: rgba(241, 196, 15, 0.8); /* Yellow color */
        }

        .dashboard-item.employees {
            background-color: rgba(46, 204, 113, 0.8); /* Green color */
        }

        /* Hover Effects */
        .dashboard-item:hover {
            transform: translateY(-5px);
        }

        .dashboard-item a {
            color: white;
            text-decoration: none;
        }

        /* Footer Styling */
        footer {
            background-color: yellow; 
            color: white; 
            text-align: center;
            padding: 10px 0; 
            margin-top: 30px;
        }

        footer p {
            margin: 0;
            font-size: 16px;
        }

        /* Responsive Design for Small Screens */
        @media (max-width: 768px) {
            h1 {
                font-size: 24px;
            }

            p {
                font-size: 18px;
            }

            .dashboard-item {
                font-size: 20px; 
            }
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <header>
        <img src="img1.jpeg" alt="Mental Health">
        <h1>Mental Health Management System</h1>
        <h2>Your Well-being, Our Priority</h2>
    </header>

    <!-- Main Section -->
    <main>
        <h1>Welcome</h1>
        <p>Please select an option from the dashboard below to proceed.</p>

        <!-- Dashboard with links -->
        <div class="dashboard">
            <div class="dashboard-item admin">
                <a href="admin_login.php">Admin</a>
            </div>
            <div class="dashboard-item users">
                <a href="login.php">Users</a>
            </div>
            <div class="dashboard-item psychologists">
                <a href="psychologists_login.php">Psychologists</a>
            </div>
            <div class="dashboard-item employees">
                <a href="employee_login.php">Employees</a>
            </div>
        </div>
    </main>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 Mental Health Management System. All Rights Reserved.</p>
    </footer>

</body>
</html>
