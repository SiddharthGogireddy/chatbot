<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT name, profession, company, graduation_year AS year_of_passing, branch, country, profile_pic FROM alumni WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Alumni not found.";
        exit;
    }
} else {
    echo "No ID provided.";
    exit;
}
?>

<?php
// Include the header
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Profile</title>

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
            padding: 40px;
        }

        /* Header */
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

        /* Main Container */
        .container.form-container {
            max-width: 600px;
            margin: 100px auto 60px;
            padding: 30px;
            background: var(--container-bg);
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
            opacity: 0;
            animation: fadeIn 1s ease-out 0.2s forwards;
        }

        .container h2 {
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--text-color);
            font-size: 28px;
            opacity: 0;
            animation: slideInUp 0.8s ease-out 0.4s forwards;
        }

        /* Profile Picture */
        .profile-pic {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            border: 3px solid #ffd700;
            margin: 0 auto 20px;
            background-color: var(--list-bg);
            background-size: cover;
            background-position: center;
            opacity: 0;
            animation: fadeIn 0.8s ease-out 0.6s forwards;
        }

        /* Info Styling */
        .info {
            margin: 10px 0;
            color: var(--text-color);
            font-size: 18px;
            opacity: 0;
            animation: fadeIn 0.8s ease-out 0.6s forwards;
        }

        .info strong {
            color: #ffd700;
            font-weight: 600;
        }

        /* Error Message */
        .error {
            color: #dc3545;
            text-align: center;
            margin-bottom: 20px;
            opacity: 0;
            animation: fadeIn 0.8s ease-out 0.6s forwards;
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
            header, .container, .container h2, .profile-pic, .info, .error {
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
            .container h2 {
                font-size: 24px;
            }
            .profile-pic {
                width: 120px;
                height: 120px;
            }
            .info {
                font-size: 16px;
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
    <div class="container form-container">
        <div class="profile-pic" style="background-image: url('<?php echo !empty($row['profile_pic']) ? htmlspecialchars($row['profile_pic']) : 'default-profile.png'; ?>');"></div>
        <h2><?php echo htmlspecialchars($row['name']); ?></h2>
        <p class="info"><strong>Profession:</strong> <?php echo isset($row['profession']) ? htmlspecialchars($row['profession']) : 'N/A'; ?></p>
        <p class="info"><strong>Company:</strong> <?php echo isset($row['company']) ? htmlspecialchars($row['company']) : 'N/A'; ?></p>
        <p class="info"><strong>Year of Passing:</strong> <?php echo isset($row['year_of_passing']) ? htmlspecialchars($row['year_of_passing']) : 'N/A'; ?></p>
        <p class="info"><strong>Branch:</strong> <?php echo isset($row['branch']) ? htmlspecialchars($row['branch']) : 'N/A'; ?></p>
        <p class="info"><strong>Country:</strong> <?php echo isset($row['country']) ? htmlspecialchars($row['country']) : 'N/A'; ?></p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>