<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Menu - Mental Health Management</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #121212; /* Dark background */
            color: #E0E0E0; /* Light gray text */
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header Styling */
        header {
            width: 100%;
            background-color: #1E1E1E; /* Dark header background */
            padding: 20px;
            color: white;
            text-align: center;
            position: relative;
            border-bottom: 1px solid #333;
        }

        header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .menu-toggle {
            position: absolute;
            left: 20px;
            top: 20px;
            cursor: pointer;
            font-size: 1.5rem;
            color: white;
        }

        .logout-button {
            position: absolute;
            right: 20px;
            top: 20px;
            background-color: #f44336; /* Red logout button */
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
        }

        nav {
            display: none; /* Hide navigation by default */
            position: absolute;
            left: 20px;
            top: 60px;
            background-color: #333; /* Darker background for nav */
            border-radius: 5px;
            padding: 10px;
            z-index: 1;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            margin: 5px 0;
        }

        nav ul li a {
            color: #E0E0E0; /* Light gray links */
            text-decoration: none;
            font-size: 1rem;
            font-weight: bold;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        /* Main Section Styling */
        main {
            flex: 1;
            text-align: center;
            padding: 30px;
            background-color: #1E1E1E; /* Darker background for main */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            margin: 20px;
            border-radius: 10px;
        }

        h2 {
            font-size: 2rem;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .menu-options {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .menu-item {
            padding: 20px 30px;
            border-radius: 10px;
            text-align: center;
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5); /* Darker shadow */
            width: 200px; /* Fixed width for uniformity */
        }

        .menu-item:nth-child(1) {
            background-color: #4CAF50; /* Green */
        }
        .menu-item:nth-child(2) {
            background-color: #2196F3; /* Blue */
        }
        .menu-item:nth-child(3) {
            background-color: #FF9800; /* Orange */
        }
        .menu-item:nth-child(4) {
            background-color: #9C27B0; /* Purple */
        }
        .menu-item:nth-child(5) {
            background-color: #f44336; /* Red */
        }

        .menu-item:hover {
            transform: translateY(-5px);
        }

        .menu-item a {
            color: white;
            text-decoration: none;
        }

        /* Footer Styling */
        footer {
            background-color: #1E1E1E;
            color: #E0E0E0;
            text-align: center;
            padding: 15px 0;
            margin-top: 30px;
            border-top: 1px solid #333;
        }

        footer p {
            margin: 0;
        }

        /* Chatbot Styling */
        .chatbot-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 300px;
            height: 400px;
            background-color: #333; /* Dark theme for chatbot */
            border: 2px solid #444; /* Slightly lighter border */
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.7); /* Dark shadow */
            z-index: 1000;
        }

        .chatbot-container iframe {
            width: 100%;
            height: 100%;
            border: none;
            border-radius: 10px;
        }

        .chatbot-container:hover {
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.8); /* Enhanced shadow on hover */
            transform: translateY(-2px);
            transition: all 0.3s ease-in-out;
        }

        /* Responsive Design for Small Screens */
        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                margin: 0;
            }

            nav ul li {
                margin: 10px 0;
            }

            .menu-options {
                flex-direction: column;
                gap: 20px;
            }
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <header>
        <div class="menu-toggle" onclick="toggleNav()">☰</div>
        <h1>Users Section</h1>
        <a href="logout.php" class="logout-button">Logout</a> <!-- Logout button -->
        <nav id="profileNav">
            <ul>
                <li><a href="user_profile.php">User Profile</a></li>
            </ul>
        </nav>
    </header>
    
    <script defer src="https://app.fastbots.ai/embed.js" data-bot-id="cm1d5qhwy1bfjsvblqobc1ia5"></script>
    <script>
        function toggleNav() {
            var nav = document.getElementById("profileNav");
            nav.style.display = (nav.style.display === "block") ? "none" : "block";
        }
    </script>

    <!-- Main Section -->
    <main>
        <h2>Select an Action</h2>

        <!-- Menu Options -->
        <div class="menu-options">
            <div class="menu-item">
                <a href="user_mental_problems.php">Manage Mental Problems</a>
            </div>
            <div class="menu-item">
                <a href="blogs.php">Blogs</a>
            </div>
            <div class="menu-item">
                <a href="assessment.php">Mental Assessment Quiz</a>
            </div>
            <div class="menu-item">
                <a href="mental_health_videos.php">Videos</a>
            </div>
            <div class="menu-item">
                <a href="feedback.php">Feedback</a>
            </div>
        </div>
    </main>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 Mental Health Management System. All Rights Reserved.</p>
    </footer>

</body>
</html>
