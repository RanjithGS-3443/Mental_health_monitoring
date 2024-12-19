<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mental Health Videos</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #e9ecef;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header Styling */
        header {
            width: 100%;
            background-color: #007bff;
            padding: 20px;
            color: white;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        /* Main Section Styling */
        main {
            flex: 1;
            padding: 30px;
            text-align: center;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px;
            border-radius: 8px;
        }

        .video-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .video-card {
            background-color: #f8f9fa;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .video-card iframe {
            width: 100%;
            height: 200px;
        }

        .video-title {
            padding: 10px;
            font-size: 18px;
            font-weight: bold;
            color: #007bff;
            cursor: pointer;
            text-decoration: none;
        }

        .video-title:hover {
            text-decoration: underline;
        }

        /* YouTube Logo */
        .youtube-logo {
            width: 20px;
            vertical-align: middle;
            margin-right: 5px;
        }

        /* Footer Styling */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 30px;
            width: 100%;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <header>
        <h1>Mental Health Awareness Videos</h1>
    </header>

    <!-- Main Section -->
    <main>
        <h2>Learn More About Mental Health</h2>
        <div class="video-grid">
            <!-- Video Card 1 -->
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/xsEJ6GeAGb0" frameborder="0" allowfullscreen></iframe>
                <a class="video-title" href="https://www.youtube.com/watch?v=xsEJ6GeAGb0" target="_blank">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/42/YouTube_icon_%282013-2017%29.png" class="youtube-logo" alt="YouTube Logo">
                    Understanding Anxiety
                </a>
            </div>

            <!-- Video Card 2 -->
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/8Su5VtKeXU8" frameborder="0" allowfullscreen></iframe>
                <a class="video-title" href="https://www.youtube.com/watch?v=8Su5VtKeXU8" target="_blank">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/42/YouTube_icon_%282013-2017%29.png" class="youtube-logo" alt="YouTube Logo">
                    Coping with Depression
                </a>
            </div>

            <!-- Video Card 3 -->
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/Y4tCnpnVaAY" frameborder="0" allowfullscreen></iframe>
                <a class="video-title" href="https://www.youtube.com/watch?v=Y4tCnpnVaAY" target="_blank">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/42/YouTube_icon_%282013-2017%29.png" class="youtube-logo" alt="YouTube Logo">
                    The Importance of Self-Care
                </a>
            </div>

            <!-- Video Card 4 -->
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/ssss7V1_eyA" frameborder="0" allowfullscreen></iframe>
                <a class="video-title" href="https://www.youtube.com/watch?v=ssss7V1_eyA" target="_blank">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/42/YouTube_icon_%282013-2017%29.png" class="youtube-logo" alt="YouTube Logo">
                    Mindfulness and Meditation
                </a>
            </div>

            <!-- Additional Video Cards -->
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/zTuX_ShUrw0" frameborder="0" allowfullscreen></iframe>
                <a class="video-title" href="https://www.youtube.com/watch?v=zTuX_ShUrw0" target="_blank">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/42/YouTube_icon_%282013-2017%29.png" class="youtube-logo" alt="YouTube Logo">
                    Understanding Anxiety Techniques
                </a>
            </div>
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/4QHGYTP5HsE" frameborder="0" allowfullscreen></iframe>
                <a class="video-title" href="https://www.youtube.com/watch?v=4QHGYTP5HsE" target="_blank">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/42/YouTube_icon_%282013-2017%29.png" class="youtube-logo" alt="YouTube Logo">
                    Understanding Anxiety and Getting Out
                </a>
            </div>
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/-2zdUXve6fQ" frameborder="0" allowfullscreen></iframe>
                <a class="video-title" href="https://www.youtube.com/watch?v=-2zdUXve6fQ" target="_blank">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/42/YouTube_icon_%282013-2017%29.png" class="youtube-logo" alt="YouTube Logo">
                    Understanding Mindfulness Practices
                </a>
            </div>
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/6p_yaNFSYao" frameborder="0" allowfullscreen></iframe>
                <a class="video-title" href="https://www.youtube.com/watch?v=6p_yaNFSYao" target="_blank">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/42/YouTube_icon_%282013-2017%29.png" class="youtube-logo" alt="YouTube Logo">
                    Mindfulness and Meditation Guide
                </a>
            </div>
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/ZVcQXX7fmFI" frameborder="0" allowfullscreen></iframe>
                <a class="video-title" href="https://www.youtube.com/watch?v=ZVcQXX7fmFI" target="_blank">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/42/YouTube_icon_%282013-2017%29.png" class="youtube-logo" alt="YouTube Logo">
                    Clear Your Mind: A Guided Meditation
                </a>
            </div>
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/ztTexqGQ0VI" frameborder="0" allowfullscreen></iframe>
                <a class="video-title" href="https://www.youtube.com/watch?v=ztTexqGQ0VI" target="_blank">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/42/YouTube_icon_%282013-2017%29.png" class="youtube-logo" alt="YouTube Logo">
                    Mental Reset in 5 Minutes
                </a>
            </div>
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/G6M4HBc3_wo" frameborder="0" allowfullscreen></iframe>
                <a class="video-title" href="https://www.youtube.com/watch?v=G6M4HBc3_wo" target="_blank">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/42/YouTube_icon_%282013-2017%29.png" class="youtube-logo" alt="YouTube Logo">
                    The Importance of Self-Care
                </a>
            </div>
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/3QIfkeA6HBY" frameborder="0" allowfullscreen></iframe>
                <a class="video-title" href="https://www.youtube.com/watch?v=3QIfkeA6HBY" target="_blank">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/42/YouTube_icon_%282013-2017%29.png" class="youtube-logo" alt="YouTube Logo">
                    8 Things You Can Do To Improve Your Mental Health
                </a>
            </div>
        </div>
    </main>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 Mental Health Management System. All Rights Reserved.</p>
    </footer>

</body>
</html>
