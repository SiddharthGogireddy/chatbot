<?php
session_start();
if (!isset($_SESSION["predictions"])) {
    echo "<div class='alert alert-danger text-center'>No predictions available.</div>";
    exit();
}

$predictions = $_SESSION["predictions"];
unset($_SESSION["predictions"]);

// Function to generate file name from career name
function generateFileName($career) {
    return strtolower(str_replace(' ', '_', $career)) . ".php";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Predictions</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap">

    <!-- Custom Styles -->
    <style>
        /* Root Variables for Consistent Theming */
        :root {
            --primary-color: #28a745; /* Green from login.php */
            --secondary-color: #1e7e34; /* Darker green */
            --accent-color: #ffd700; /* Gold */
            --background-color: #1c2526; /* Dark gray-black */
            --container-bg: #2a2e2e; /* Darker container */
            --text-color: #f1f1f1; /* Light text */
            --light-text: #ffffff; /* White for buttons */
            --shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            --border-radius: 10px;
            --transition: all 0.3s ease;
            --btn-spacing: 15px; /* Increased spacing for buttons */
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

        /* Main Container */
        .container.form-container {
            max-width: 600px;
            margin: 100px auto;
            padding: 30px;
            background: var(--container-bg);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            text-align: center;
            opacity: 0;
            animation: fadeIn 1s ease-out 0.2s forwards;
        }

        .container h2 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--accent-color);
            opacity: 0;
            animation: slideInUp 0.8s ease-out 0.4s forwards;
        }

        /* List Group */
        .list-group {
            list-style: none;
            padding: 0;
            margin-bottom: 30px;
            opacity: 0;
            animation: fadeIn 0.8s ease-out 0.6s forwards;
        }

        .list-group-item {
            background: #344c46;
            color: var(--text-color);
            border: 1px solid #4a7066;
            border-radius: var(--border-radius);
            margin-bottom: 15px;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            opacity: 0;
            animation: slideInUp 0.6s ease-out forwards;
        }

        .list-group-item:nth-child(1) { animation-delay: 0.8s; }
        .list-group-item:nth-child(2) { animation-delay: 0.9s; }
        .list-group-item:nth-child(3) { animation-delay: 1s; }

        .list-group-item .btn-container {
            display: flex;
            gap: var(--btn-spacing);
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* Buttons */
        .btn-success, .btn-view-more, .btn-info, .btn-primary {
            padding: 10px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 8px;
            background: var(--primary-color);
            color: var(--light-text);
            border: none;
            width: 130px; /* Fixed width for consistency */
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
            opacity: 0;
            animation: scaleIn 0.6s ease-out forwards;
        }

        .btn-success:nth-child(1), .btn-view-more:nth-child(2), .btn-info:nth-child(3) { animation-delay: 1s; }
        .btn-primary { animation-delay: 1.2s; }

        .btn-success:hover, .btn-view-more:hover, .btn-info:hover, .btn-primary:hover {
            background: var(--secondary-color);
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(40, 167, 69, 0.3);
        }

        .btn-success:focus, .btn-view-more:focus, .btn-info:focus, .btn-primary:focus {
            outline: 3px solid var(--secondary-color);
            outline-offset: 2px;
        }

        .btn-success::after, .btn-view-more::after, .btn-info::after, .btn-primary::after {
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

        .btn-success:active::after, .btn-view-more:active::after, .btn-info:active::after, .btn-primary:active::after {
            width: 300px;
            height: 300px;
        }

        .btn-info {
            background: #17a2b8; /* Bootstrap info color */
        }

        .btn-info:hover {
            background: #138496;
        }

        .btn-info:focus {
            outline: 3px solid #138496;
            outline-offset: 2px;
        }

        /* Alert */
        .alert-danger {
            background: #4a252e;
            color: #ffcccb;
            border: 1px solid #dc3545;
            border-radius: var(--border-radius);
            margin-bottom: 20px;
            opacity: 0;
            animation: fadeIn 0.8s ease-out 0.2s forwards;
        }

        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--container-bg);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-color);
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

        @keyframes scaleIn {
            0% { opacity: 0; transform: scale(0.85); }
            100% { opacity: 1; transform: scale(1); }
        }

        /* Accessibility */
        @media (prefers-reduced-motion: reduce) {
            header, .container, .container h2, .list-group, .list-group-item, .btn-success, .btn-view-more, .btn-info, .btn-primary, .alert {
                animation: none;
                opacity: 1;
                transform: none;
            }
            .btn-success:hover, .btn-view-more:hover, .btn-info:hover, .btn-primary:hover {
                transform: none;
                box-shadow: none;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container.form-container {
                margin: 60px 20px;
                padding: 20px;
            }
            .container h2 {
                font-size: 24px;
            }
            .list-group-item {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            .list-group-item .btn-container {
                flex-direction: column;
                gap: 10px;
                width: 100%;
            }
            .btn-success, .btn-view-more, .btn-info, .btn-primary {
                width: 100%;
                font-size: 14px;
                padding: 8px;
            }
            .navbar-brand {
                font-size: 20px;
            }
            .nav-link {
                margin-left: 10px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container form-container">
        <h2 class="mb-4">Top 3 Career Recommendations</h2>

        <ul class="list-group">
    <?php foreach ($predictions as $career): ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <?php echo htmlspecialchars($career); ?>
            <div class="btn-container">
                <a href="<?php echo generateFileName($career); ?>" class="btn btn-success">View More</a>
                <a href="alumni.php?profession=<?php echo urlencode($career); ?>" class="btn btn-primary">View Alumni</a>
                <a href="roadmap_result.php?career=<?php echo urlencode($career); ?>" class="btn btn-info">View Roadmap</a>
            </div>
        </li>
    <?php endforeach; ?>
</ul>

        <div class="btn-container">
            <a href="career_input.php" class="btn btn-primary">Try Again</a>
            <a href="careers_list.php" class="btn btn-primary">View Career list</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>