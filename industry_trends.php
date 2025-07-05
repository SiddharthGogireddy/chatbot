<?php
session_start();
include 'header.php'; // Added for consistency with other pages
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Industry Trends in Jobs</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap">

    <!-- Custom Styles -->
    <style>
        /* Root Variables for Consistent Theming */
        :root {
            --primary-color: #28a745; /* Green from login.php */
            --secondary-color: #1e7e34; /* Darker green from login.php */
            --accent-color: #ffd700; /* Gold from login.php */
            --background-color: #1c2526; /* Dark gray-black for body */
            --text-color: #f1f1f1; /* Light text for contrast */
            --light-text: #ffffff; /* White for emphasis */
            --section-bg: #2a2e2e; /* Dark background for sections */
            --shadow: 0 8px 20px rgba(0, 0, 0, 0.3); /* From login.php */
            --border-radius: 10px; /* From original section */
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
            background: linear-gradient(135deg, var(--background-color), #2a2e2e); /* Black to dark gray */
            color: var(--text-color);
            min-height: 100vh;
            padding-top: 80px; /* Space for sticky header */
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

        /* Main Content */
        h1 {
            color: var(--accent-color); /* Gold for visibility */
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 40px;
            opacity: 0;
            animation: slideInUp 0.8s ease-out 0.2s forwards;
        }

        .section {
            margin-bottom: 30px; /* Retained from original */
            background: var(--section-bg); /* Dark background */
            padding: 20px; /* Retained from original */
            border-radius: var(--border-radius); /* Retained from original */
            box-shadow: var(--shadow); /* Enhanced shadow */
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            opacity: 0;
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .section:nth-child(1) { animation-delay: 0.3s; }
        .section:nth-child(2) { animation-delay: 0.4s; }
        .section:nth-child(3) { animation-delay: 0.5s; }
        .section:nth-child(4) { animation-delay: 0.6s; }

        h2 {
            color: var(--primary-color); /* Green for consistency */
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 15px;
            transition: color 0.3s ease;
        }

        h2:hover {
            color: var(--secondary-color);
        }

        ul {
            padding-left: 20px; /* Retained from original */
            color: var(--text-color);
        }

        li {
            margin-bottom: 10px;
            font-size: 1rem;
            line-height: 1.6;
        }

        li strong {
            color: var(--light-text); /* White for emphasis */
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

        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(30px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideInUp {
            0% { opacity: 0; transform: translateY(30px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        /* Accessibility */
        @media (prefers-reduced-motion: reduce) {
            header, h1, .section {
                animation: none;
                opacity: 1;
                transform: none;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            body {
                padding-top: 60px;
            }
            h1 {
                font-size: 2rem;
            }
            .section {
                margin: 15px;
                padding: 15px;
            }
            h2 {
                font-size: 1.25rem;
            }
            li {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.75rem;
            }
            .section {
                margin: 10px;
                padding: 10px;
            }
            h2 {
                font-size: 1.1rem;
            }
            li {
                font-size: 0.85rem;
            }
        }
    </style>
</head>
<body>

    <h1>Industry Trends in Jobs</h1>

    <div class="section">
        <h2>1. Information Technology (IT)</h2>
        <ul>
            <li><strong>Trending Roles:</strong> AI/ML Specialist, Cloud Engineer, DevOps Engineer</li>
            <li><strong>In-demand Skills:</strong> Python, AWS, Docker, Kubernetes</li>
            <li><strong>Trend:</strong> 25% YoY growth in AI-based job roles (LinkedIn, 2024)</li>
        </ul>
    </div>

    <div class="section">
        <h2>2. Healthcare</h2>
        <ul>
            <li><strong>Trending Roles:</strong> Health Data Analyst, Telemedicine Specialist</li>
            <li><strong>In-demand Skills:</strong> Health Informatics, Data Visualization, Remote Monitoring Tools</li>
            <li><strong>Trend:</strong> Rise in demand due to digital transformation in healthcare</li>
        </ul>
    </div>

    <div class="section">
        <h2>3. Finance and FinTech</h2>
        <ul>
            <li><strong>Trending Roles:</strong> Blockchain Developer, FinTech Analyst</li>
            <li><strong>In-demand Skills:</strong> Blockchain, Python, Risk Analysis, Cybersecurity</li>
            <li><strong>Trend:</strong> Surge in digital payments and decentralized finance platforms</li>
        </ul>
    </div>

    <div class="section">
        <h2>4. E-commerce and Digital Marketing</h2>
        <ul>
            <li><strong>Trending Roles:</strong> SEO Specialist, Digital Marketing Analyst</li>
            <li><strong>In-demand Skills:</strong> Google Ads, SEO, Data Analytics, Content Strategy</li>
            <li><strong>Trend:</strong> 40% increase in e-commerce job postings post-pandemic</li>
        </ul>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>