<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap">

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

        /* Contact Container */
        .container.contact-container {
            max-width: 500px;
            margin: 100px auto;
            padding: 30px;
            background: var(--container-bg);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            text-align: center;
            opacity: 0;
            animation: fadeIn 1s ease-out 0.2s forwards;
        }

        .container.contact-container h2 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--accent-color);
            opacity: 0;
            animation: slideInUp 0.8s ease-out 0.4s forwards;
        }

        .contact-info {
            font-size: 20px;
            margin: 15px 0;
            color: var(--text-color);
            opacity: 0;
            animation: fadeIn 0.6s ease-out forwards;
        }

        .contact-info:nth-child(2) { animation-delay: 0.6s; }
        .contact-info:nth-child(3) { animation-delay: 0.7s; }

        .contact-info a {
            color: var(--light-text);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .contact-info a:hover {
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
            header, .container.contact-container, .container.contact-container h2, .contact-info {
                animation: none;
                opacity: 1;
                transform: none;
            }
            .nav-link:hover, .contact-info a:hover {
                transform: none;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container.contact-container {
                margin: 60px 20px;
                padding: 20px;
            }
            .container.contact-container h2 {
                font-size: 24px;
            }
            .contact-info {
                font-size: 18px;
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>

<div class="container contact-container">
    <h2>Contact Us</h2>
    <p class="contact-info"> Email Us at: <a href="mailto:support@JNTUcareers.com">support@JNTUCareers.com</a></p>
    <p class="contact-info"> Call Us at: <a href="tel:+1234567890">+1 234 567 890</a></p>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>