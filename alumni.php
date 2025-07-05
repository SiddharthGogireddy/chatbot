<?php
include("config.php");

$country = $_GET['country'] ?? '';
$profession = $_GET['profession'] ?? '';
$company = $_GET['company'] ?? '';
$branch = $_GET['branch'] ?? '';
$year_of_passing = $_GET['year_of_passing'] ?? '';

$searchPerformed = $country || $profession || $company || $branch || $year_of_passing;

$query = "SELECT id, name, profession, company, graduation_year AS year_of_passing, country, branch, linkedin FROM alumni";
$conditions = [];

if (!empty($country)) {
    $conditions[] = "country LIKE '%$country%'";
}
if (!empty($profession)) {
    $conditions[] = "profession LIKE '%$profession%'";
}
if (!empty($company)) {
    $conditions[] = "company LIKE '%$company%'";
}
if (!empty($branch)) {
    $conditions[] = "branch LIKE '%$branch%'";
}
if (!empty($year_of_passing)) {
    $conditions[] = "graduation_year LIKE '%$year_of_passing%'";
}

if (count($conditions) > 0) {
    $query .= " WHERE " . implode(' AND ', $conditions);
}

$result = $searchPerformed ? mysqli_query($conn, $query) : null;
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
    <title>Alumni Directory</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap">

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
            padding: 20px;
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
            max-width: 800px;
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
            margin-bottom: 25px;
            color: var(--text-color);
            font-size: 28px;
            opacity: 0;
            animation: slideInUp 0.8s ease-out 0.4s forwards;
        }

        /* Search Bar */
        .search-bar {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
            opacity: 0;
            animation: fadeIn 0.8s ease-out 0.6s forwards;
        }

        .search-bar input, .search-bar select {
            padding: 10px 12px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 16px;
            background: var(--list-bg);
            color: var(--text-color);
            width: 200px;
        }

        .search-bar input::placeholder, .search-bar select::placeholder {
            color: #a0b0aa;
        }

        .search-bar input:focus, .search-bar select:focus {
            outline: 3px solid var(--btn-hover-bg);
            outline-offset: 2px;
        }

        .search-bar button {
            padding: 10px 20px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 8px;
            background: var(--btn-bg);
            color: #ffffff;
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
            cursor: pointer;
        }

        .search-bar button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px var(--focus-shadow);
            background: var(--btn-hover-bg);
        }

        .search-bar button:focus {
            outline: 3px solid var(--btn-hover-bg);
            outline-offset: 2px;
        }

        /* Select2 Styling */
        .select2-container--default .select2-selection--single {
            background: var(--list-bg);
            border: 1px solid var(--border-color);
            border-radius: 6px;
            height: 38px;
            color: var(--text-color);
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: var(--text-color);
            line-height: 38px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 38px;
        }

        .select2-dropdown {
            background: var(--list-bg);
            border: 1px solid var(--border-color);
            color: var(--text-color);
        }

        .select2-results__option {
            color: var(--text-color);
        }

        .select2-results__option--highlighted {
            background: var(--btn-bg) !important;
            color: #ffffff;
        }

        /* Alumni Card */
        .alumni-card {
            background: var(--list-bg);
            padding: 15px;
            border-radius: 8px;
            margin: 10px auto;
            max-width: 600px;
            border-left: 5px solid #ffd700;
            opacity: 0;
            animation: slideInUp 0.6s ease-out forwards;
        }

        .alumni-card:nth-child(1) { animation-delay: 0.8s; }
        .alumni-card:nth-child(2) { animation-delay: 0.9s; }
        .alumni-card:nth-child(3) { animation-delay: 1.0s; }
        .alumni-card:nth-child(4) { animation-delay: 1.1s; }
        .alumni-card:nth-child(5) { animation-delay: 1.2s; }

        .alumni-card h3 {
            color: var(--text-color);
            font-size: 22px;
            margin-bottom: 10px;
        }

        .alumni-card p {
            margin: 5px 0;
            color: var(--text-color);
        }

        .alumni-card p strong {
            color: #ffd700;
        }

        .linkedin-btn {
            background: #0077b5;
            color: #ffffff;
            padding: 6px 10px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            margin-top: 5px;
            margin-right: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
        }

        .linkedin-btn.profile-btn {
            background: #0056b3;
        }

        .linkedin-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 119, 181, 0.5);
            background: #005f8d;
        }

        .linkedin-btn.profile-btn:hover {
            background: #003d82;
        }

        .linkedin-btn:focus {
            outline: 3px solid #005f8d;
            outline-offset: 2px;
        }

        /* No Results Message */
        .no-results {
            text-align: center;
            color: var(--text-color);
            margin-top: 20px;
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
            header, .container, .container h2, .search-bar, .alumni-card, .no-results {
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
            .search-bar input, .search-bar select {
                width: 100%;
                margin-bottom: 10px;
            }
            .search-bar button {
                width: 100%;
                padding: 12px;
            }
            .alumni-card {
                margin: 10px 20px;
            }
            .alumni-card h3 {
                font-size: 20px;
            }
            .alumni-card p {
                font-size: 14px;
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
        <h2>Alumni Directory</h2>
        <form method="GET" class="search-bar">
            <input type="text" name="country" placeholder="Country" value="<?= htmlspecialchars($country) ?>">
            <select name="profession" id="profession-select">
                <option value="">-- Select or Type Profession --</option>
                <?php
                $professions = mysqli_query($conn, "SELECT DISTINCT profession FROM alumni");
                while ($row = mysqli_fetch_assoc($professions)) {
                    $selected = ($profession == $row['profession']) ? "selected" : "";
                    echo "<option value='" . htmlspecialchars($row['profession']) . "' $selected>" . htmlspecialchars($row['profession']) . "</option>";
                }
                ?>
            </select>
            <input type="text" name="company" placeholder="Company" value="<?= htmlspecialchars($company) ?>">
            <input type="text" name="branch" placeholder="Branch" value="<?= htmlspecialchars($branch) ?>">
            <input type="text" name="year_of_passing" placeholder="Year of Passing" value="<?= htmlspecialchars($year_of_passing) ?>">
            <button type="submit">Search</button>
        </form>

        <?php if ($result && mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="alumni-card">
                    <h3><?= htmlspecialchars($row['name']) ?></h3>
                    <p><strong>Profession:</strong> <?= htmlspecialchars($row['profession']) ?></p>
                    <p><strong>Company:</strong> <?= htmlspecialchars($row['company']) ?></p>
                    <p><strong>Year of Passing:</strong> <?= htmlspecialchars($row['year_of_passing']) ?></p>
                    <p><strong>Country:</strong> <?= htmlspecialchars($row['country']) ?></p>
                    <p><strong>Branch:</strong> <?= htmlspecialchars($row['branch']) ?></p>
                    <?php if (!empty($row['linkedin'])): ?>
                        <a href="<?= htmlspecialchars($row['linkedin']) ?>" class="linkedin-btn" target="_blank">LinkedIn</a>
                    <?php endif; ?>
                    <a href="alumni_profile.php?id=<?= $row['id'] ?>" class="linkedin-btn profile-btn">View Profile</a>
                </div>
            <?php endwhile; ?>
        <?php elseif ($searchPerformed): ?>
            <p class="no-results">No alumni found matching the criteria.</p>
        <?php endif; ?>
    </div>

    <!-- jQuery and Select2 JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#profession-select').select2();
        });
    </script>
</body>
</html>