<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Analyst Courses</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap">

    <!-- Custom Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --bg-color: #1a3c34;
            --text-color: #e0eafc;
            --container-bg: #2a4d3e;
            --btn-bg: #28a745;
            --btn-hover-bg: #1e7e34;
            --logout-bg: #dc3545;
            --logout-hover-bg: #c82333;
            --header-bg-start: #228b3b;
            --header-bg-end: #155d27;
            --border-color: #4a7066;
            --focus-shadow: rgba(40, 167, 69, 0.5);
            --list-bg: #344c46;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--bg-color);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: var(--text-color);
        }

        header {
            position: sticky;
            top: 0;
            background: linear-gradient(90deg, var(--header-bg-start), var(--header-bg-end));
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            animation: slideDown 0.8s ease-out;
        }

        .navbar {
            padding: 15px 0;
        }

        .container {
            max-width: 1200px;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: 700;
            color: #ffffff;
            transition: color 0.3s ease;
        }

        .navbar-brand:hover {
            color: #ffd700;
        }

        .nav-link {
            color: #ffffff;
            font-weight: 400;
            margin: 0 15px;
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #ffd700;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background: #ffd700;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .navbar-toggler {
            border: none;
            padding: 8px;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba(255, 255, 255, 0.9)' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }

        .navbar-collapse {
            transition: height 0.3s ease, opacity 0.3s ease;
        }

        .navbar-collapse.show {
            opacity: 1;
            background: linear-gradient(90deg, var(--header-bg-start), var(--header-bg-end));
            padding: 10px;
        }

        .btn-logout {
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 8px;
            background: var(--logout-bg);
            color: #ffffff;
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
        }

        .btn-logout:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.5);
            background: var(--logout-hover-bg);
        }

        .btn-logout:focus {
            outline: 3px solid var(--logout-hover-bg);
            outline-offset: 2px;
        }

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

        .container h1, .container h2 {
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

        .container ul {
            list-style: none;
            padding: 0;
            opacity: 0;
            animation: fadeIn 0.8s ease-out 0.6s forwards;
        }

        .container ul li {
            background: var(--list-bg);
            color: var(--text-color);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            margin-bottom: 10px;
            padding: 15px;
            opacity: 0;
            animation: slideInUp 0.6s ease-out forwards;
        }

        .container ul li:nth-child(1) { animation-delay: 0.8s; }
        .container ul li:nth-child(2) { animation-delay: 0.9s; }
        .container ul li:nth-child(3) { animation-delay: 1.0s; }
        .container ul li:nth-child(4) { animation-delay: 1.1s; }
        .container ul li:nth-child(5) { animation-delay: 1.2s; }

        .container ul li a {
            color: var(--text-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .container ul li a:hover {
            color: #ffd700;
        }

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

        @media (prefers-reduced-motion: reduce) {
            header, .container, .container h1, .container h2, .container ul, .container ul li, .container p {
                animation: none;
                opacity: 1;
                transform,line: 1777
            }
        }

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
            .container ul li {
                font-size: 14px;
                padding: 12px;
            }
            .navbar-brand {
                font-size: 20px;
            }
            .nav-link {
                margin: 5px 0;
                font-size: 14px;
            }
            .btn-logout {
                margin: 10px 0;
                width: 100%;
                text-align: center;
            }
            .navbar-collapse.show {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Assuming header.php is included -->
    <?php include 'header.php'; ?>

    <div class="container form-container">
        <h1>Business Analyst Courses</h1>

        <h2>Recommended Certifications and Courses</h2>
        <ul>
            <li><a href="https://www.tableau.com/learn/certification/certified-data-analyst">Tableau Certified Data Analyst</a></li>
            <li><a href="https://learn.microsoft.com/en-us/credentials/certifications/data-analyst-associate/">Microsoft Certified: Power BI Data Analyst Associate</a></li>
            <li><a href="https://www.coursera.org/specializations/excel-mysql">Excel to MySQL: Analytics for Business (Duke, Coursera)</a></li>
            <li><a href="https://www.coursera.org/learn/introduction-to-business-management-winning-externally">Business Analytics Specialization</a></li>
            <li><a href="https://www.coursera.org/professional-certificates/meta-data-analyst/">Meta Data Analytics Professional Certificate</a></li>
        </ul>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>