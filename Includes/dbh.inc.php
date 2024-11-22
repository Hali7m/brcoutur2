<?php

$servername = "localhost";
$dBUsername = "root";
$dBpassword = "";
$dBName = "bouiracouture";

$conn = new mysqli($servername, $dBUsername, $dBpassword, $dBName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set character set to utf8mb4
$conn->set_charset("utf8mb4");

?>
