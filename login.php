<?php
session_start();
include 'config.php'; // Database connection file

$error = ""; // To store login errors

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate input fields
    if (empty($email) || empty($password)) {
        $error = "Please enter both email and password.";
    } else {
        // Prepare SQL query to check user by email
        $query = "SELECT id, username, password, role FROM users WHERE email = ?";

        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            mysqli_stmt_bind_result($stmt, $user_id, $username, $hashed_password, $role);
            mysqli_stmt_fetch($stmt);

            // Verify password
            if (password_verify($password, $hashed_password)) {
                // Authentication Successful - Store session data
                $_SESSION['user_id'] = $user_id;
                $_SESSION['email'] = $email;
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role;

                // Redirect to index.php
                header("Location: index.php");
                exit();
            } else {
                $error = "Invalid email or password.";
            }
        } else {
            $error = "User not found.";
        }

        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Career Guidance</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap">

    <!-- Custom Styles -->
    <style>
        /* Root Variables for Consistent Theming */
        :root {
            --primary-color: #28a745; /* Green from signup.php */
            --secondary-color: #1e7e34; /* Darker green from signup.php */
            --accent-color: #ffd700; /* Gold from signup.php */
            --background-color: #1c2526; /* Dark gray-black for body */
            --text-color: #f1f1f1; /* Light text for contrast */
            --input-bg: #3a3f41; /* Dark input background */
            --input-border: #555; /* Input border */
            --input-text: #ffffff; /* Brighter white for input text */
            --placeholder-color: #aaaaaa; /* Lighter placeholder for visibility */
            --light-text: #ffffff; /* White for contrast */
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

        /* Login Container */
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            background: #2a2e2e;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            opacity: 0;
            animation: fadeIn 1s ease-out 0.2s forwards;
        }

        .login-container h3 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--accent-color);
            opacity: 0;
            animation: slideInUp 0.8s ease-out 0.4s forwards;
        }

        .form-label {
            color: var(--text-color);
            font-weight: 500;
        }

        .form-control {
            padding: 12px;
            border: 1px solid var(--input-border);
            border-radius: 8px;
            background: var(--input-bg);
            color: var(--input-text);
            transition: border-color 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
            opacity: 0;
            animation: fadeIn 0.6s ease-out forwards;
        }

        .form-control:nth-child(1) { animation-delay: 0.6s; }
        .form-control:nth-child(2) { animation-delay: 0.7s; }

        .form-control::placeholder {
            color: var(--placeholder-color);
            opacity: 1;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 8px rgba(40, 167, 69, 0.3);
            outline: none;
            transform: scale(1.02);
            background: var(--input-bg);
        }

        .btn-login {
            padding: 12px;
            font-size: 18px;
            font-weight: 600;
            border-radius: 8px;
            background: var(--primary-color);
            color: var(--light-text);
            border: none;
            width: 100%;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            opacity: 0;
            animation: scaleIn 0.6s ease-out 0.8s forwards;
        }

        .btn-login:hover {
            background: var(--secondary-color);
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(40, 167, 69, 0.3);
        }

        .btn-login:focus {
            outline: 3px solid var(--secondary-color);
            outline-offset: 2px;
        }

        .btn-login::after {
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

        .btn-login:active::after {
            width: 300px;
            height: 300px;
        }

        .error {
            color: #dc3545;
            text-align: center;
            font-size: 14px;
            margin-bottom: 15px;
            opacity: 0;
            animation: fadeIn 0.6s ease-out 0.5s forwards;
        }

        .text-center a {
            color: var(--accent-color);
            text-decoration: none;
            transition: color 0.3s ease;
            opacity: 0;
            animation: fadeIn 0.6s ease-out 0.9s forwards;
        }

        .text-center a:hover {
            color: var(--primary-color);
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
            header, .login-container, .login-container h3, .form-control, .btn-login, .error, .text-center a {
                animation: none;
                opacity: 1;
                transform: none;
            }
            .btn-login:hover, .nav-link:hover, .form-control:focus {
                transform: none;
                box-shadow: none;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .login-container {
                margin: 60px 20px;
                padding: 20px;
            }
            .login-container h3 {
                font-size: 24px;
            }
            .btn-login {
                font-size: 16px;
                padding: 10px;
            }
        }

        @media (max-width: 480px) {
            .login-container {
                margin: 40px 15px;
                padding: 15px;
            }
            .login-container h3 {
                font-size: 20px;
            }
            .btn-login {
                font-size: 14px;
            }
            .error {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<div class="container">
    <div class="login-container">
        <h3 class="text-center">Login to Your Account</h3>

        <!-- Show error message if login fails -->
        <?php if (!empty($error)) : ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <form method="POST" action="login.php">
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder="Enter your password">
            </div>

            <button type="submit" class="btn btn-login">Login</button>
        </form>

        <p class="text-center mt-3">
            Don't have an account? <a href="signup.php">Sign Up</a>
        </p>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>