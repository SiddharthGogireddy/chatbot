

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(245, 245, 245);
            color: #f0f0f0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #f5c518;
        }
        .search-bar {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }
        .search-bar input, .search-bar select {
            padding: 10px;
            border-radius: 5px;
            border: none;
            width: 200px;
        }
        .search-bar button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
        }
        .alumni-card {
            background-color:rgb(254, 251, 251);
            color: black;
            padding: 15px;
            border-radius: 8px;
            margin: 10px auto;
            max-width: 600px;
            border-left: 5px solid #f5c518;
        }
        .alumni-card h3 {
            color: #4da6ff;
        }
        .alumni-card p {
            margin: 5px 0;
        }
        .linkedin-btn {
            background-color: #0077b5;
            color: white;
            padding: 6px 10px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            margin-top: 5px;
        }
        .navbar {
    background-color: #000;
    padding: 10px 0;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    margin-bottom: 20px;
}

.nav-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.logo a {
    color:rgb(248, 247, 243);
    font-size: 24px;
    text-decoration: none;
    font-weight: bold;
}

.nav-links {
    list-style: none;
    display: flex;
    gap: 20px;
    margin: 0;
    padding: 0;
}

.nav-links li a {
    color: white;
    text-decoration: none;
    font-size: 16px;
    transition: color 0.3s ease;
}

.nav-links li a:hover {
    color:rgb(179, 179, 176);
}

    </style>
    <nav class="navbar">
    <div class="nav-container">
        <div class="logo"><a href="index.php">JNTUCareers</a></div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="news.php">Hot News</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Sign Up</a></li>
        </ul>
    </div>
</nav>

    <h2>No news available at the moment</h2>
</body>
</html>