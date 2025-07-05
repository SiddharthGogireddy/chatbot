<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Guidance Chatbot</title>

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

    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #1c1c1c 0%, #2a2a2a 100%);
        min-height: 100vh;
        color: #f1f1f1;
    }

    header {
        position: sticky;
        top: 0;
        background: linear-gradient(90deg, #1e7e34, #145c2d);
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
        color: white;
        transition: color 0.3s ease;
    }

    .navbar-brand:hover {
        color: #00e676;
    }

    .nav-link {
        color: white;
        font-weight: 400;
        margin-left: 20px;
        position: relative;
        transition: color 0.3s ease;
    }

    .nav-link:hover {
        color: #00e676;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: -5px;
        left: 0;
        background: #00e676;
        transition: width 0.3s ease;
    }

    .nav-link:hover::after {
        width: 100%;
    }

    .hero-container {
        text-align: center;
        padding: 120px 20px;
        max-width: 900px;
        margin: 0 auto;
        opacity: 0;
        animation: fadeIn 1s ease-out 0.2s forwards;
    }

    .hero-container h1 {
        font-size: 48px;
        font-weight: 700;
        margin-bottom: 25px;
        color: #4caf50;
        opacity: 0;
        animation: slideInUp 0.8s ease-out 0.4s forwards;
    }

    .hero-container p {
        font-size: 18px;
        color: #bbb;
        margin-bottom: 40px;
        opacity: 0;
        animation: fadeIn 1s ease-out 0.6s forwards;
    }

    .btn-get-started {
        display: inline-block;
        padding: 15px 40px;
        font-size: 20px;
        font-weight: 600;
        border-radius: 50px;
        background: #4caf50;
        color: white;
        text-decoration: none;
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        opacity: 0;
        animation: scaleIn 0.6s ease-out 0.8s forwards;
    }

    .btn-get-started:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(76, 175, 80, 0.3);
        background: #3e8e41;
    }

    .btn-get-started:focus {
        outline: 3px solid #3e8e41;
        outline-offset: 2px;
    }

    .btn-get-started::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        transition: width 0.5s ease, height 0.5s ease;
    }

    .btn-get-started:active::after {
        width: 300px;
        height: 300px;
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
        0% { opacity: 0; transform: translateY(40px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    @keyframes scaleIn {
        0% { opacity: 0; transform: scale(0.85); }
        100% { opacity: 1; transform: scale(1); }
    }

    @media (prefers-reduced-motion: reduce) {
        header, .hero-container, .hero-container h1, .hero-container p, .btn-get-started {
            animation: none;
            opacity: 1;
            transform: none;
        }

        .btn-get-started:hover, .nav-link:hover {
            transform: none;
            box-shadow: none;
        }
    }

    @media (max-width: 768px) {
        .hero-container h1 {
            font-size: 36px;
        }

        .hero-container p {
            font-size: 16px;
        }

        .btn-get-started {
            padding: 12px 30px;
            font-size: 18px;
        }

        .navbar-brand {
            font-size: 20px;
        }

        .nav-link {
            margin-left: 10px;
        }
    }

    @media (max-width: 576px) {
        .hero-container {
            padding: 80px 15px;
        }
    }
</style>
</head>
<body>
    <!-- Header 
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">CareerBot</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>-->

    <!-- Hero Section -->
    <div class="hero-container">
        <h1>Career Guidance Chatbot</h1>
        <p>Discover your dream career with personalized guidance and AI-powered insights.</p>
        <a href="login.php" class="btn-get-started">Get Started</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

