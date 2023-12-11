<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$conn = new mysqli("localhost", "root", "", "dynamic_forms_generator");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT AVG(nota) AS averageRating FROM recenzii");

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo round($row["averageRating"], 2);
} else {
    echo 'N/A';
}

$conn->close();
?>
