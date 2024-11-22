<?php
// Include the database connection file
include_once 'dbh.inc.php';

// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Get user data from the session
$user_id = $_SESSION['user_id'];

// Initialize variables
$name = $email = $wilaya = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $wilaya = mysqli_real_escape_string($conn, $_POST['wilaya']);

    // Check if there are any errors before proceeding with the update
    if (isset($_SESSION['errors_profil'])) {
        header("Location: profil.php");
        exit();
    }

    // Update the user data in the database
    $sql = "UPDATE users SET name = ?, email = ?, wilaya = ? WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("sssi", $name, $email, $wilaya, $user_id);
        // Execute the query
        if ($stmt->execute()) {
            $_SESSION['success_profil'] = "Profile updated successfully!";
        } else {
            $_SESSION['errors_profil'] = ["Error updating profile. Please try again."];
        }
        $stmt->close();
    }

    // Redirect back to the profile page
    header("Location: ../profil.php");
    exit();
}
