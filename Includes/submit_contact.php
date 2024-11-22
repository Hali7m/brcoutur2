<?php
// Include database connection file
include('dbh.inc.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and validate input data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Error messages array
    $errors_contact = [];

    // Validate fields
    if (empty($name)) {
        $errors_contact[] = "Le champ 'Nom' est obligatoire. / حقل الاسم مطلوب.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors_contact[] = "Veuillez entrer un email valide. / الرجاء إدخال بريد إلكتروني صالح.";
    }
    if (empty($message)) {
        $errors_contact[] = "Le champ 'Message' est obligatoire. / حقل الرسالة مطلوب.";
    }

    // If there are errors_contact, redirect back with errors_contact
    if (!empty($errors_contact)) {
        $_SESSION['errors_contact'] = $errors_contact;
        $_SESSION['old'] = $_POST;
        header("Location: ../contact.php");
        exit;
    }

    // Insert data into the database
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    if ($stmt->execute()) {
        
        $_SESSION['success_contact'] = "Votre message a été enregistré avec succès. / تم تسجيل رسالتك بنجاح.";
        header("Location: ../contact.php");
    } else {
        
        $_SESSION['errors_contact'] = ["Un problème est survenu lors de l'enregistrement de votre message. / حدثت مشكلة أثناء تسجيل رسالتك."];
        header("Location: ../contact.php");
    }

    $stmt->close();
    $conn->close();
} else {
    // If accessed directly, redirect to the contact form
    header("Location: ../contact.php");
    exit;
}
