<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url('round.jpeg'); /* Add your image URL here */
            background-size: cover;
            background-position: center;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            text-align: center;
            color: white; /* Change text color for better contrast */
        }

        header {
            background-color: #1A237E; /* Dark navy blue */
            color: white;
            padding: 40px; /* Increased padding for height */
            position: relative;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            font-size: 2rem; /* Increased font size */
        }

        h1 {
            margin: 0;
        }

        .menu-toggle {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .profile-menu {
            display: none;
            position: absolute;
            right: 20px;
            top: 60px;
            background-color: rgba(26, 35, 126, 0.9); /* Semi-transparent dark navy */
            border-radius: 5px;
            padding: 10px;
            z-index: 1;
        }

        .profile-menu a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-bottom: 1px solid white;
        }

        .profile-menu a:hover {
            background-color: #3949ab; /* Lighter shade on hover */
        }

        .button-container {
            background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent black */
            padding: 40px; /* Increased padding for size */
            border-radius: 10px;
            display: inline-block; /* Center the box */
            margin: 40px auto; /* Center on page */
            width: 80%; /* Wider box */
            max-width: 900px; /* Limit max width */
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        nav ul li {
            margin: 10px 0;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            font-size: 18px;
            padding: 12px 20px;
            border-radius: 5px;
            background-color: #0D47A1; /* Darker blue for buttons */
            display: inline-block;
            width: 200px; /* Fixed width for buttons */
            transition: background-color 0.3s ease, transform 0.3s ease; /* Transition for color and transform */
        }

        nav ul li a:hover {
            background-color: #003c8f; /* Even darker shade on hover */
            transform: scale(1.05); /* Slightly enlarge the button on hover */
        }

        footer {
            background-color: #1A237E; /* Dark navy blue */
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: auto; /* Push footer to the bottom */
        }

        footer p {
            margin: 0;
            font-size: 0.9em;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .menu-toggle {
                font-size: 1.2rem;
            }

            .profile-menu a {
                padding: 8px;
                font-size: 0.9rem;
            }

            nav ul li a {
                width: 100%; /* Full width on smaller screens */
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Employees Section</h1>
        <div class="menu-toggle" onclick="toggleMenu()">☰</div>
        <div class="profile-menu" id="profileMenu">
            <a href="employee_profile.php">Employee Profile</a>
            <a href="index.php">Logout</a>
        </div>
    </header>
    
    <div class="button-container">
        <nav>
            <ul>
                <li><a href="psychologists_allocation.php">Assign Psychologists</a></li>
                <li><a href="users_data.php">Display Users' Details</a></li>
                <li><a href="users_mental_data.php">Display Users' Mental Problems</a></li>
                <li><a href="psychologist_details.php">View Psychologists</a></li>
                <li><a href="allocation_data.php">View Allocations</a></li>
            </ul>
        </nav>
    </div>

    <footer>
        <p>&copy; 2024 Mental Health Management System</p>
    </footer>

    <script>
        function toggleMenu() {
            var menu = document.getElementById("profileMenu");
            menu.style.display = (menu.style.display === "block") ? "none" : "block";
        }

        // Close the menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.menu-toggle')) {
                var menu = document.getElementById("profileMenu");
                if (menu.style.display === "block") {
                    menu.style.display = "none";
                }
            }
        }
    </script>
</body>
</html>
