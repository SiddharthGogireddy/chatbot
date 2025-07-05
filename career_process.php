<?php
session_start();
file_put_contents("debug_input.txt", print_r($_POST, true)); // Log input

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect user input
    $skills = [
        "Database Fundamentals" => $_POST["database_fundamentals"] ?? "",
        "Computer Architecture" => $_POST["computer_architecture"] ?? "",
        "Distributed Computing Systems" => $_POST["distributed_computing"] ?? "",
        "Cyber Security" => $_POST["cyber_security"] ?? "",
        "Networking" => $_POST["networking"] ?? "",
        "Software Development" => $_POST["software_development"] ?? "",
        "Programming Skills" => $_POST["programming_skills"] ?? "",
        "Project Management" => $_POST["project_management"] ?? "",
        "Computer Forensics Fundamentals" => $_POST["computer_forensics"] ?? "",
        "Technical Communication" => $_POST["technical_communication"] ?? "",
        "AI ML" => $_POST["ai_ml"] ?? "",
        "Software Engineering" => $_POST["software_engineering"] ?? "",
        "Business Analysis" => $_POST["business_analysis"] ?? "",
        "Communication skills" => $_POST["communication_skills"] ?? "",
        "Data Science" => $_POST["data_science"] ?? "",
        "Troubleshooting skills" => $_POST["troubleshooting_skills"] ?? "",
        "Graphics Designing" => $_POST["graphics_designing"] ?? ""
    ];

    file_put_contents("debug_input.txt", print_r($skills, true), FILE_APPEND); // Log processed input

    // Convert data to JSON
    $jsonData = json_encode($skills);
    file_put_contents("debug_input.txt", "\nJSON Sent: $jsonData\n", FILE_APPEND); // Log JSON

    // Call Python script
    $command = "python predict.py";
    $process = proc_open($command, [
        0 => ["pipe", "r"],
        1 => ["pipe", "w"],
        2 => ["pipe", "w"], // Capture errors
    ], $pipes);

    fwrite($pipes[0], $jsonData);
    fclose($pipes[0]);

    // Get Python output
    $result = stream_get_contents($pipes[1]);
    $errors = stream_get_contents($pipes[2]);
    fclose($pipes[1]);
    fclose($pipes[2]);
    proc_close($process);

    // Debugging: Log Python output and errors
    file_put_contents("debug_output.txt", "Python Output:\n$result\nErrors:\n$errors");

    // Decode JSON response
    $response = json_decode($result, true);
    if ($response && isset($response["predictions"])) {
        $_SESSION["predictions"] = $response["predictions"];
    } else {
        $_SESSION["predictions"] = ["Error in prediction! Check debug_output.txt"];
    }

    header("Location: career_result.php");
    exit();
}
?>
