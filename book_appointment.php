<?php
header("Content-Type: application/json");

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection settings
$host = "localhost";
$username = "root";  // Default XAMPP user
$password = "";      // Default is empty in XAMPP
$database = "mediconnect";

// Connect to MySQL
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Database connection failed: " . $conn->connect_error]));
}

// Retrieve form data
$doctor = $_POST['doctor'] ?? '';
$date = $_POST['date'] ?? '';
$time = $_POST['time'] ?? '';

// Validation
if (empty($doctor) || empty($date) || empty($time)) {
    echo json_encode(["success" => false, "message" => "All fields are required."]);
    exit;
}

// Prepare and execute query
$stmt = $conn->prepare("INSERT INTO appointments (doctor, date, time) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $doctor, $date, $time);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Failed to insert data."]);
}

$stmt->close();
$conn->close();
?>
