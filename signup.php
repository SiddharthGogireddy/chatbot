<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Career Guidance</title>

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
            background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: #1a3c34;
        }

        /* Header */
        header {
            position: sticky;
            top: 0;
            background: linear-gradient(90deg, #28a745, #1e7e34);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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
            color: #ffd700;
        }

        .nav-link {
            color: white;
            font-weight: 400;
            margin-left: 20px;
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

        /* Signup Container */
        .signup-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            opacity: 0;
            animation: fadeIn 1s ease-out 0.2s forwards;
        }

        .signup-container h2 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #1e7e34;
            opacity: 0;
            animation: slideInUp 0.8s ease-out 0.4s forwards;
        }

        .form-control {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            opacity: 0;
            animation: fadeIn 0.6s ease-out forwards;
        }

        .form-control:nth-child(1) { animation-delay: 0.6s; }
        .form-control:nth-child(2) { animation-delay: 0.7s; }
        .form-control:nth-child(3) { animation-delay: 0.8s; }

        .form-control:focus {
            border-color: #28a745;
            box-shadow: 0 0 8px rgba(40, 167, 69, 0.3);
            outline: none;
        }

        .btn-signup {
            padding: 12px;
            font-size: 18px;
            font-weight: 600;
            border-radius: 8px;
            background: #28a745;
            color: white;
            border: none;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            opacity: 0;
            animation: scaleIn 0.6s ease-out 0.9s forwards;
        }

        .btn-signup:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(40, 167, 69, 0.3);
            background: #1e7e34;
        }

        .btn-signup:focus {
            outline: 3px solid #1e7e34;
            outline-offset: 2px;
        }

        .btn-signup::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.4);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.5s ease, height 0.5s ease;
        }

        .btn-signup:active::after {
            width: 300px;
            height: 300px;
        }

        .login-link {
            margin-top: 20px;
            font-size: 15px;
            opacity: 0;
            animation: fadeIn 0.6s ease-out 1s forwards;
        }

        .login-link a {
            color: #28a745;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .login-link a:hover {
            color: #1e7e34;
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

        @keyframes scaleIn {
            0% { opacity: 0; transform: scale(0.85); }
            100% { opacity: 1; transform: scale(1); }
        }

        /* Accessibility */
        @media (prefers-reduced-motion: reduce) {
            header, .signup-container, .signup-container h2, .form-control, .btn-signup, .login-link {
                animation: none;
                opacity: 1;
                transform: none;
            }
            .btn-signup:hover, .nav-link:hover {
                transform: none;
                box-shadow: none;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .signup-container {
                margin: 60px 20px;
                padding: 20px;
            }
            .signup-container h2 {
                font-size: 24px;
            }
            .btn-signup {
                font-size: 16px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Header 
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="main.php">CareerBot</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="main.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="login.php">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>-->

    <!-- Signup Form -->
    <div class="signup-container">
        <h2>Create Your Account</h2>
        <form action="register.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn-signup">Sign Up</button>
        </form>
        <p class="login-link text-center">
            Already have an account? <a href="login.php">Login</a>
        </p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>