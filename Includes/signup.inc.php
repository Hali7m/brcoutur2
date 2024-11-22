<?php
session_start();
include('dbh.inc.php'); // Ensure your DB connection is properly configured.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate the inputs
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $agree_terms = isset($_POST['agree_terms']) ? true : false;

    // Error messages
    $errors = [];

    // Validate fields
    if (empty($name)) $errors[] = "Le nom complet est obligatoire.";
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Veuillez entrer un email valide.";
    if (strlen($password) < 8) $errors[] = "Le mot de passe doit contenir au moins 8 caractères.";
    if (!preg_match('/[A-Z]/', $password)) $errors[] = "Le mot de passe doit contenir au moins une majuscule.";
    if (!preg_match('/\d/', $password)) $errors[] = "Le mot de passe doit contenir au moins un chiffre.";
    if ($password !== $confirm_password) $errors[] = "Les mots de passe ne correspondent pas.";
    if (!$agree_terms) $errors[] = "Vous devez accepter les termes et conditions.";

    // If there are errors, redirect back to the form with the errors
    if (count($errors) > 0) {
        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = $_POST;  // Store old input data for repopulating the form
        header("Location: ../signup.php");
        exit;
    }

    // Check if the email is already taken
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['errors'][] = "Cet email est déjà utilisé.";
        $_SESSION['old'] = $_POST;
        header("Location: ../signup.php");
        exit;
    }

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into the database
    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $hashed_password);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Compte créé avec succès! Vous pouvez maintenant vous connecter.";
        header("Location: ../login.php");
    } else {
        $_SESSION['errors'] = ["Une erreur s'est produite, veuillez réessayer plus tard."];
        header("Location: ../signup.php");
    }

    $stmt->close();
    $conn->close();
}
?>
