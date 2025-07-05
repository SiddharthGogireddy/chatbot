<?php  
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Guidance - Home</title>

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
            --light-text: #ffffff; /* White for buttons and navbar */
            --updates-bg: #2a2e2e; /* Dark background for updates box */
            --shadow: 0 8px 20px rgba(0, 0, 0, 0.3); /* From login.php */
            --border-radius: 10px; /* From login.php */
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

        .navbar-nav .nav-item {
            margin-left: 15px; /* Retained from original */
        }

        .btn-logout {
            background: #dc3545;
            color: var(--light-text);
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .btn-logout:hover {
            background: #c82333;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .btn-logout::after {
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

        .btn-logout:active::after {
            width: 200px;
            height: 200px;
        }

        /* Hero Section */
        .hero {
            text-align: center;
            padding: 100px 0;
            background: url('./img/bg.jpg') no-repeat center center/cover;
            color: var(--light-text);
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            animation: fadeIn 1.2s ease-out;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Dark overlay for text visibility */
            z-index: 1;
        }

        .hero h1 {
            font-size: 45px;
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--light-text); /* Changed to white for visibility */
            position: relative;
            z-index: 2;
            opacity: 0;
            animation: slideInUp 0.8s ease-out 0.3s forwards;
        }

        .hero .btn {
            padding: 15px 30px;
            font-size: 20px;
            border-radius: 30px;
            text-decoration: none;
            transition: var(--transition);
            margin: 10px;
            display: inline-block;
            width: 250px;
            text-align: center;
            position: relative;
            z-index: 2;
            overflow: hidden;
            opacity: 0;
            animation: scaleIn 0.6s ease-out forwards;
        }

        .hero .btn:nth-child(2) { animation-delay: 0.5s; }
        .hero .btn:nth-child(3) { animation-delay: 0.6s; }
        .hero .btn:nth-child(4) { animation-delay: 0.7s; }

        .btn-start {
            background: #ff4d4d; /* Retained from original */
            color: var(--light-text);
        }

        .btn-start:hover {
            background: #cc0000;
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
        }

        .btn-alumni {
            background: #007bff; /* Retained from original */
            color: var(--light-text);
        }

        .btn-alumni:hover {
            background: #0056b3;
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
        }

        .btn-trends {
            background: var(--primary-color); /* Aligned with login.php */
            color: var(--light-text);
        }

        .btn-trends:hover {
            background: var(--secondary-color);
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
        }

        .hero .btn::after {
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

        .hero .btn:active::after {
            width: 300px;
            height: 300px;
        }

        /* Welcome Message */
        .welcome {
            text-align: center;
            font-size: 22px;
            color: var(--accent-color); /* Gold for visibility */
            margin: 20px auto;
            opacity: 0;
            animation: fadeIn 0.8s ease-out 0.2s forwards;
        }

        /* Updates Box */
        .updates-box {
            background: var(--updates-bg);
            border: 1px solid #444;
            border-radius: var(--border-radius);
            padding: 20px;
            margin: 20px auto;
            max-width: 800px;
            box-shadow: var(--shadow);
            opacity: 0;
            animation: fadeInUp 0.8s ease-out 0.3s forwards;
        }

        .updates-box h3 {
            margin-bottom: 15px;
            color: var(--accent-color); /* Gold for visibility */
            font-weight: 600;
        }

        .updates-box ul {
            list-style: none;
            padding: 0;
        }

        .updates-box li {
            margin-bottom: 10px;
            color: var(--text-color);
        }

        .updates-box li strong {
            color: var(--light-text);
        }

        .updates-box .text-muted {
            color: #aaaaaa !important; /* Lighter gray for visibility */
        }

        .btn-admin {
            background: #ffc107; /* Retained from original */
            color: #1a3c34;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            opacity: 0;
            animation: scaleIn 0.6s ease-out 0.4s forwards;
        }

        .btn-admin:hover {
            background: #e0a800;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .btn-admin::after {
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

        .btn-admin:active::after {
            width: 200px;
            height: 200px;
        }

        .delete-link {
            color: #dc3545; /* Retained from original */
            margin-left: 10px;
            font-size: 14px;
            text-decoration: none;
            transition: var(--transition);
        }

        .delete-link:hover {
            color: #c82333;
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

        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(30px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes scaleIn {
            0% { opacity: 0; transform: scale(0.85); }
            100% { opacity: 1; transform: scale(1); }
        }

        @keyframes slideInUp {
            0% { opacity: 0; transform: translateY(30px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        /* Accessibility */
        @media (prefers-reduced-motion: reduce) {
            header, .hero, .hero h1, .hero .btn, .welcome, .updates-box, .btn-admin, .delete-link {
                animation: none;
                opacity: 1;
                transform: none;
            }
            .hero .btn:hover, .btn-logout:hover, .btn-admin:hover {
                transform: none;
                box-shadow: none;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero {
                padding: 60px 20px;
            }
            .hero h1 {
                font-size: 36px;
            }
            .hero .btn {
                width: 200px;
                font-size: 18px;
                padding: 12px 25px;
            }
            .welcome {
                font-size: 20px;
            }
            .updates-box {
                margin: 15px;
                padding: 15px;
            }
        }

        @media (max-width: 480px) {
            .hero {
                padding: 40px 15px;
            }
            .hero h1 {
                font-size: 28px;
            }
            .hero .btn {
                width: 100%;
                max-width: 180px;
                font-size: 16px;
                padding: 10px 20px;
            }
            .welcome {
                font-size: 18px;
            }
            .updates-box {
                margin: 10px;
                padding: 10px;
            }
            .updates-box h3 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>
<?php include 'config.php'; ?>

<div class="container">
    <?php if (isset($_SESSION['username'])): ?>
        <p class="welcome">Welcome, <?= htmlspecialchars($_SESSION['username']); ?>!</p>

        <!-- Show "Post Update" for Admin only -->
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
            <div class="text-center mb-4">
                <a href="add_update.php" class="btn btn-admin">➕ Post New Update (Admin)</a>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <!-- 📢 Important Updates Section -->
    <div class="updates-box">
        <h3> Important Updates</h3>
        <ul>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM updates ORDER BY posted_on DESC LIMIT 5");
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<li><strong>" . htmlspecialchars($row['title']) . "</strong>: " .
                         htmlspecialchars($row['message']) .
                         " <small class='text-muted'>(" . $row['posted_on'] . ")</small>";

                    // 🔴 Show Delete link only if user is admin
                    if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
                        echo " <a class='delete-link' href='delete_update.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this update?')\">[Delete]</a>";
                    }

                    echo "</li>";
                }
            } else {
                echo "<li>No updates available.</li>";
            }
            ?>
        </ul>
    </div>
</div>

<div class="hero">
    <h1>Find the right job for you</h1>
    <a href="career_input.php" class="btn btn-start">Start</a>
    <a href="alumni.php" class="btn btn-alumni">View Alumni</a>
    <a href="industry_trends.php" class="btn btn-trends">View Industry Trends</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

