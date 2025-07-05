<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Blog - CareerBot</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Root Variables for Consistent Theming */
        :root {
            --primary-color: #4caf50; /* Green from original blog-header */
            --secondary-color: #00e676; /* Brighter green from blog-title */
            --accent-color: #007bff; /* Bootstrap Blue for contrast */
            --background-color: #1c1c1c; /* Dark gradient start from original */
            --card-background: #292929; /* Original blog-card background */
            --text-color: #f1f1f1; /* Light text from original */
            --muted-text: #aaa; /* From blog-meta */
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.3); /* From original blog-card */
            --border-radius: 15px; /* From original blog-card */
            --transition: all 0.3s ease;
        }

        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, var(--background-color), #2a2a2a); /* Retained from original */
            color: var(--text-color);
            line-height: 1.6;
            font-size: 16px;
        }

        /* Blog Header Styling */
        .blog-header {
            text-align: center;
            padding: 60px 20px 20px; /* Retained from original */
            animation: fadeIn 1s ease-out;
        }

        .blog-header h1 {
            color: var(--primary-color); /* Retained from original */
            font-weight: 700;
            font-size: 2.5rem;
            position: relative;
            animation: slideIn 0.8s ease-out;
        }

        .blog-header h1::after {
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

        .blog-header p.text-muted {
            font-size: 1.125rem;
            color: var(--muted-text);
            max-width: 800px;
            margin: 1rem auto;
            opacity: 0;
            animation: fadeInUp 1s ease-out 0.3s forwards;
        }

        /* Blog Container */
        .blog-container {
            padding: 30px; /* Retained from original */
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Blog Card Styling */
        .blog-card {
            background-color: var(--card-background); /* Retained from original */
            border-radius: var(--border-radius); /* Retained from original */
            padding: 25px; /* Retained from original */
            margin-bottom: 30px; /* Retained from original */
            box-shadow: var(--shadow); /* Retained from original */
            transition: var(--transition);
            animation: fadeInUp 1s ease-out forwards;
            animation-delay: calc(0.2s * var(--card-index, 0));
        }

        .blog-card:hover {
            transform: translateY(-5px); /* Retained from original */
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
        }

        .blog-title {
            color: var(--secondary-color); /* Retained from original */
            font-size: 22px; /* Retained from original */
            font-weight: 600;
            margin-bottom: 0.5rem;
            transition: var(--transition);
        }

        .blog-title:hover {
            color: lighten(var(--secondary-color), 10%);
        }

        .blog-meta {
            font-size: 14px; /* Retained from original */
            color: var(--muted-text); /* Retained from original */
            margin-bottom: 10px; /* Retained from original */
        }

        .blog-content {
            font-size: 16px; /* Retained from original */
            color: #ccc; /* Retained from original */
            margin-bottom: 1rem;
        }

        .read-more {
            display: inline-block;
            margin-top: 15px; /* Retained from original */
            color: var(--primary-color); /* Retained from original */
            text-decoration: none;
            font-weight: 500;
            position: relative;
            transition: var(--transition);
            overflow: hidden;
        }

        .read-more:hover {
            color: var(--secondary-color); /* Retained from original */
            animation: pulse 0.5s;
        }

        .read-more::before {
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

        .read-more:hover::before {
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .blog-header {
                padding: 40px 15px 15px;
            }

            .blog-header h1 {
                font-size: 2rem;
            }

            .blog-header p.text-muted {
                font-size: 1rem;
            }

            .blog-container {
                padding: 20px;
            }

            .blog-card {
                padding: 20px; /* Retained from original */
            }

            .blog-title {
                font-size: 20px;
            }

            .blog-content {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .blog-header h1 {
                font-size: 1.75rem;
            }

            .blog-header p.text-muted {
                font-size: 0.9rem;
            }

            .blog-card {
                padding: 15px;
            }

            .blog-title {
                font-size: 18px;
            }

            .blog-content {
                font-size: 13px;
            }

            .read-more {
                font-size: 14px;
                margin-top: 10px;
            }
        }

        /* Utility Classes */
        .text-center { text-align: center; }
        .mt-2 { margin-top: 2rem; }
        .mb-2 { margin-bottom: 2rem; }
    </style>
</head>
<body>

<div class="blog-header">
    <h1>Career Insights & Blog</h1>
    <p class="text-muted">Read latest articles, tips, and updates on industry trends and career development.</p>
</div>

<div class="container blog-container">
    <!-- Blog Card 1 -->
    <div class="blog-card" style="--card-index: 1;">
        <div class="blog-title">Top 5 AI Careers in 2025</div>
        <div class="blog-meta">Posted on July 2, 2025 • by CareerBot Team</div>
        <div class="blog-content">
            Artificial Intelligence continues to reshape industries. Learn about roles like Machine Learning Engineer, Data Scientist, AI Researcher...
        </div>
        <a href="blog1.php" class="read-more">Read More →</a>
    </div>

    <!-- Blog Card 2 -->
    <div class="blog-card" style="--card-index: 2;">
        <div class="blog-title">How to Choose the Right Career Path as a Student</div>
        <div class="blog-meta">Posted on June 25, 2025 • by CareerBot Experts</div>
        <div class="blog-content">
            Choosing the right career can feel overwhelming. This guide breaks down how to align your interests and strengths with market demand...
        </div>
        <a href="blog2.php" class="read-more">Read More →</a>
    </div>

    <!-- Blog Card 3 -->
    <div class="blog-card" style="--card-index: 3;">
        <div class="blog-title">Industry Trends in IT, Healthcare, and Design</div>
        <div class="blog-meta">Posted on June 10, 2025 • by Guest Author</div>
        <div class="blog-content">
            Stay updated with evolving job demands in major sectors like Information Technology, Healthcare, and Creative Design. Discover where the opportunities lie...
        </div>
        <a href="industry_trends.php" class="read-more">Explore Trends →</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
