<?php
    include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap">

    <title>Available Careers</title>

    <!-- Custom Styles -->
    <style>
        /* Root Variables for Consistent Theming */
        :root {
            --primary-color: #28a745; /* Green from login.php */
            --secondary-color: #1e7e34; /* Darker green */
            --accent-color: #ffd700; /* Gold */
            --background-color: #1c2526; /* Dark gray-black */
            --container-bg: #2a2e2e; /* Darker container */
            --text-color: #f1f1f1; /* Light text */
            --light-text: #ffffff; /* White for links */
            --shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            --border-radius: 10px;
            --transition: all 0.3s ease;
        }

        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, var(--background-color), #2a2e2e);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: var(--text-color);
        }

        /* Header */
        header {
            position: sticky;
            top: 0;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            animation: slideDown 0.8s ease-out;
        }

        .navbar {
            padding: 15px 20px;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: 700;
            color: var(--light-text);
            transition: color 0.3s ease;
        }

        .navbar-brand:hover {
            color: var(--accent-color);
        }

        .nav-link {
            color: var(--light-text);
            font-weight: 400;
            margin-left: 20px;
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--accent-color);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background: var(--accent-color);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* Main Container */
        .container.careers-container {
            max-width: 600px;
            margin: 100px auto;
            padding: 30px;
            background: var(--container-bg);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            text-align: center;
            opacity: 0;
            animation: fadeIn 1s ease-out 0.2s forwards;
        }

        .container.careers-container h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--accent-color);
            opacity: 0;
            animation: slideInUp 0.8s ease-out 0.4s forwards;
        }

        /* Career List */
        .career-list {
            list-style: none;
            padding: 0;
            text-align: left;
        }

        .career-item {
            background: #344c46;
            color: var(--text-color);
            border: 1px solid #4a7066;
            border-radius: var(--border-radius);
            margin-bottom: 15px;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            opacity: 0;
            animation: slideInUp 0.6s ease-out forwards;
        }

        .career-item:nth-child(1) { animation-delay: 0.6s; }
        .career-item:nth-child(2) { animation-delay: 0.7s; }
        .career-item:nth-child(3) { animation-delay: 0.8s; }
        .career-item:nth-child(4) { animation-delay: 0.9s; }
        .career-item:nth-child(5) { animation-delay: 1.0s; }
        .career-item:nth-child(6) { animation-delay: 1.1s; }
        .career-item:nth-child(7) { animation-delay: 1.2s; }
        .career-item:nth-child(8) { animation-delay: 1.3s; }
        .career-item:nth-child(9) { animation-delay: 1.4s; }
        .career-item:nth-child(10) { animation-delay: 1.5s; }

        .career-item a {
            color: var(--light-text);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .career-item a:hover {
            color: var(--accent-color);
            text-decoration: underline;
        }

        /* Keyframes */
        @keyframes slideDown {
            0% { transform: translateY(-100%); }
            100% { transform: translateY(0); }
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        @keyframes slideInUp {
            0% { opacity: 0; transform: translateY(30px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        /* Accessibility */
        @media (prefers-reduced-motion: reduce) {
            header, .container.careers-container, .container.careers-container h1, .career-item {
                animation: none;
                opacity: 1;
                transform: none;
            }
            .nav-link:hover, .career-item a:hover {
                transform: none;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container.careers-container {
                margin: 60px 20px;
                padding: 20px;
            }
            .container.careers-container h1 {
                font-size: 24px;
            }
            .career-item {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }
            .career-item a {
                display: block;
                margin-top: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="container careers-container">
        <h1>Available Careers</h1>
        <ul class="career-list">
            <li class="career-item">Project Manager <a href='project_manager.php'>Click here</a></li>
            <li class="career-item">Cyber Security Specialist <a href='cyber_security_specialist.php'>Click here</a></li>
            <li class="career-item">Business Analyst <a href='business_analyst.php'>Click here</a></li>
            <li class="career-item">API Specialist <a href='api_specialist.php'>Click here</a></li>
            <li class="career-item">AI/ML Engineer <a href='AIML_engineer.php'>Click here</a></li>
            <li class="career-item">Application Support Engineer <a href='application_support_engineer.php'>Click here</a></li>
            <li class="career-item">Software Tester <a href='software_tester.php'>Click here</a></li>
            <li class="career-item">Software Developer <a href='software_developer.php'>Click here</a></li>
            <li class="career-item">Networking Engineer <a href='networking_engineer.php'>Click here</a></li>
            <li class="career-item">Helpdesk Engineer <a href='helpdesk_engineer.php'>Click here</a></li>
        </ul>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>