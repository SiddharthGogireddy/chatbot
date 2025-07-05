<?php
// Include the header
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Career Guidance Chatbot</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <!-- Custom CSS -->
    <style>
        /* Root Variables for Consistent Theming */
        :root {
            --primary-color: #007bff; /* Bootstrap Blue */
            --secondary-color: #ff4d4d; /* Coral Red from original button */
            --accent-color: #28a745; /* Green for vibrancy */
            --background-color: #f8f9fa; /* Light Gray from original about-section */
            --text-color: #333333; /* Dark Gray */
            --light-text: #ffffff; /* White */
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            --border-radius: 15px; /* Matches original about-img */
            --transition: all 0.3s ease;
        }

        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
            font-size: 16px;
        }

        /* About Section Styling */
        .about-section {
            padding: 80px 0;
            text-align: center;
            background: linear-gradient(135deg, var(--background-color), #e9ecef);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            animation: fadeIn 1s ease-out;
        }

        /* Typography */
        .about-title {
            font-size: 45px; /* Retained from original */
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--text-color);
            position: relative;
            animation: slideIn 0.8s ease-out;
        }

        .about-title::after {
            content: '';
            position: absolute;
            width: 80px;
            height: 4px;
            background-color: var(--secondary-color);
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .about-text {
            font-size: 18px; /* Retained from original */
            color: #555;
            max-width: 800px;
            margin: 0 auto 1.5rem;
            opacity: 0;
            animation: fadeInUp 1s ease-out 0.3s forwards;
        }

        /* Image Styling */
        .about-img {
            width: 100%;
            max-width: 500px; /* Retained from original */
            border-radius: var(--border-radius); /* Retained from original */
            margin: 20px auto; /* Retained from original */
            display: block;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .about-img:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        /* Blog Button */
        .btn-blog {
            background: var(--secondary-color); /* Retained from original */
            color: var(--light-text);
            font-size: 18px; /* Retained from original */
            padding: 10px 25px; /* Retained from original */
            border-radius: 30px; /* Retained from original */
            margin-top: 20px; /* Retained from original */
            display: inline-block;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .btn-blog:hover {
            background: #cc0000; /* Retained from original */
            transform: translateY(-3px);
            box-shadow: var(--shadow);
        }

        .btn-blog::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.3),
                transparent
            );
            transition: 0.5s;
        }

        .btn-blog:hover::before {
            left: 100%;
        }

        /* Keyframes for Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        /* Apply Pulse Animation on Hover for Button */
        .btn-blog:hover {
            animation: pulse 0.5s;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .about-title {
                font-size: 36px;
            }

            .about-text {
                font-size: 16px;
                padding: 0 1rem;
            }

            .about-img {
                max-width: 400px;
            }

            .about-section {
                padding: 60px 0;
            }
        }

        @media (max-width: 480px) {
            .about-title {
                font-size: 28px;
            }

            .about-text {
                font-size: 14px;
            }

            .about-img {
                max-width: 100%;
            }

            .btn-blog {
                padding: 8px 20px;
                font-size: 16px;
            }

            .about-section {
                padding: 40px 0;
            }
        }

        /* Utility Classes */
        .text-center { text-align: center; }
        .mt-2 { margin-top: 2rem; }
        .mb-2 { margin-bottom: 2rem; }
    </style>
</head>
<body>

<!-- About Section -->
<div class="about-section">
    <h2 class="about-title">About Career Guidance Chatbot</h2>
    <p class="about-text">
        JNTUCareers is a career guidance system designed to help students and professionals
        find the best career path based on their skills and interests. Whether you're looking for
        career advice, relevant courses, or job recommendations, JNTUCareers is your one-stop destination
        for making informed career decisions.
    </p>
    <img src="./img/about.png" alt="Career Guidance" class="about-img">
    <br>
    <a href="blog.php" class="btn-blog">Explore Our Blog</a>
</div>

</body>
</html>