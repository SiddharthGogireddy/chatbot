<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI/ML Engineer Courses</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap">

    <!-- Custom Styles -->
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* CSS Variables for Dark Mode */
        :root {
            --bg-color: #1a3c34; /* Dark green background */
            --text-color: #e0eafc; /* Light blue text */
            --container-bg: #2a4d3e; /* Darker green for container */
            --btn-bg: #28a745; /* Green button */
            --btn-hover-bg: #1e7e34;
            --logout-bg: #dc3545; /* Red logout button */
            --logout-hover-bg: #c82333;
            --header-bg-start: #228b3b; /* Darker green for header */
            --header-bg-end: #155d27;
            --border-color: #4a7066; /* Subtle border */
            --focus-shadow: rgba(40, 167, 69, 0.5);
            --list-bg: #344c46; /* Dark background for list items */
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--bg-color);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: var(--text-color);
        }

        /* Main Container */
        .container.form-container {
            max-width: 600px;
            margin: 100px auto 60px;
            padding: 30px;
            background: var(--container-bg);
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            text-align: left;
            opacity: 0;
            animation: fadeIn 1s ease-out 0.2s forwards;
        }

        .container h1, .container h2, .container h3, .container h4 {
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--text-color);
            opacity: 0;
            animation: slideInUp 0.8s ease-out 0.4s forwards;
        }

        .container h1 {
            font-size: 32px;
            text-align: center;
        }

        .container h2 {
            font-size: 24px;
        }

        .container h3 {
            font-size: 20px;
        }

        .container h4 {
            font-size: 18px;
        }

        /* Link Styling */
        .course-link {
            display: block;
            background: var(--list-bg);
            color: var(--text-color);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            margin-bottom: 10px;
            padding: 15px;
            text-decoration: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
            opacity: 0;
            animation: slideInUp 0.6s ease-out forwards;
        }

        .course-link:nth-child(1) { animation-delay: 0.8s; }
        .course-link:nth-child(2) { animation-delay: 0.9s; }
        .course-link:nth-child(3) { animation-delay: 1.0s; }
        .course-link:nth-child(4) { animation-delay: 1.1s; }

        .course-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px var(--focus-shadow);
            background: var(--btn-hover-bg);
            color: #ffffff;
        }

        .course-link:focus {
            outline: 3px solid var(--btn-hover-bg);
            outline-offset: 2px;
        }

        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #2a4d3e;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--btn-bg);
            border-radius: 4px;
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
            .container, .container h1, .container h2, .container h3, .container h4, .course-link {
                animation: none;
                opacity: 1;
                transform: none;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container.form-container {
                margin: 80px 20px 40px;
                padding: 20px;
            }
            .container h1 {
                font-size: 28px;
            }
            .container h2 {
                font-size: 20px;
            }
            .container h3 {
                font-size: 18px;
            }
            .container h4 {
                font-size: 16px;
            }
            .course-link {
                font-size: 14px;
                padding: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="container form-container">
        <h1>AI/ML Engineer Courses</h1>
        <a href="https://aws.amazon.com/certification/certified-machine-learning-engineer-associate/" class="course-link">
            <h2>AWS Certified Machine Learning Associate</h2>
        </a>
        <a href="https://aws.amazon.com/certification/certified-cloud-practitioner/" class="course-link">
            <h2>AWS Certified Cloud Practitioner</h2>
        </a>
        <a href="https://learn.microsoft.com/en-us/credentials/certifications/azure-ai-engineer/?practice-assessment-type=certification" class="course-link">
            <h2>Azure AI Engineer Associate</h2>
        </a>
        <a href="https://www.coursera.org/professional-certificates/ibm-machine-learning" class="course-link">
            <h2>IBM Machine Learning Professional Certificate</h2>
        </a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>