<?php
session_start();
include 'header.php'; // Maintain header/navigation consistency
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choosing the Right Career Path</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap">

    <!-- Custom Styles -->
    <style>
        :root {
            --primary-color: #28a745;
            --secondary-color: #1e7e34;
            --accent-color: #ffd700;
            --background-color: #1c2526;
            --text-color: #f1f1f1;
            --light-text: #ffffff;
            --section-bg: #2a2e2e;
            --shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            --border-radius: 10px;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--background-color), #2a2e2e);
            color: var(--text-color);
            min-height: 100vh;
            padding-top: 80px;
        }

        header {
            position: sticky;
            top: 0;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            animation: slideDown 0.8s ease-out;
        }

        h1 {
            color: var(--accent-color);
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 40px;
            opacity: 0;
            animation: slideInUp 0.8s ease-out 0.2s forwards;
        }

        .section {
            margin-bottom: 30px;
            background: var(--section-bg);
            padding: 20px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
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
        .section:nth-child(5) { animation-delay: 0.7s; }

        h2 {
            color: var(--primary-color);
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 15px;
            transition: color 0.3s ease;
        }

        h2:hover {
            color: var(--secondary-color);
        }

        ul {
            padding-left: 20px;
            color: var(--text-color);
        }

        li {
            margin-bottom: 10px;
            font-size: 1rem;
            line-height: 1.6;
        }

        li strong {
            color: var(--light-text);
        }

        @keyframes slideDown {
            0% { transform: translateY(-100%); }
            100% { transform: translateY(0); }
        }

        @keyframes slideInUp {
            0% { opacity: 0; transform: translateY(30px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(30px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @media (prefers-reduced-motion: reduce) {
            header, h1, .section {
                animation: none;
                opacity: 1;
                transform: none;
            }
        }

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

    <h1>How to Choose the Right Career Path as a Student</h1>

    <div class="section">
        <h2>1. Know Your Strengths and Interests</h2>
        <ul>
            <li><strong>Self-assessment:</strong> Understand what you're good at and what you enjoy doing—this lays the foundation.</li>
            <li><strong>Use Tools:</strong> Try career aptitude tests, personality quizzes (like MBTI), or skill assessments.</li>
        </ul>
    </div>

    <div class="section">
        <h2>2. Research Career Options</h2>
        <ul>
            <li><strong>Explore Fields:</strong> Learn about emerging industries like AI, sustainability, fintech, and biotech.</li>
            <li><strong>Job Shadowing:</strong> Talk to professionals, attend webinars, or intern to gain real-world insight.</li>
        </ul>
    </div>

    <div class="section">
        <h2>3. Understand the Job Market</h2>
        <ul>
            <li><strong>Scope:</strong> Look at the future demand, salary prospects, and location flexibility.</li>
            <li><strong>Trends:</strong> Stay updated with job trends on LinkedIn, Naukri, or government skill platforms like NSDC.</li>
        </ul>
    </div>

    <div class="section">
        <h2>4. Set Short-Term and Long-Term Goals</h2>
        <ul>
            <li><strong>Short-term:</strong> Courses, internships, or certifications you can pursue in college.</li>
            <li><strong>Long-term:</strong> The career you aim to build over 5–10 years. Define milestones to get there.</li>
        </ul>
    </div>

    <div class="section">
        <h2>5. Talk to Mentors and Alumni</h2>
        <ul>
            <li><strong>Mentorship:</strong> Connect with seniors, teachers, or industry mentors for clarity.</li>
            <li><strong>Alumni Networks:</strong> Explore your college alumni portal or LinkedIn to find people working in fields you’re considering.</li>
        </ul>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
