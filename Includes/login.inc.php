<?php
// Include database connection file
include_once 'dbh.inc.php';

// Start session
session_start();

// Check if form is submitted
if (isset($_POST['email']) && isset($_POST['password'])) {
    // Escape the inputs to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // Query to check if the user exists
    $sql = "SELECT * FROM users WHERE email = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters (s for string type)
        $stmt->bind_param("s", $email);
        $stmt->execute();
        
        // Get the result
        $result = $stmt->get_result();
        
        // Check if user exists
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            
            // Verify password
            if (password_verify($password, $user['password'])) {
                // Password is correct, start the session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                
                // Redirect to the dashboard or home page
                header("Location: ../profil.php"); 
                exit();
            } else {
                // Incorrect password
                $_SESSION['errors'] = [
                    "Mot de passe incorrect. Veuillez réessayer." , 
                    "كلمة السر غير صحيحة. يرجى المحاولة مرة أخرى."
                ];
            }
        } else {
            // User doesn't exist
            $_SESSION['errors'] = [
                "Aucun utilisateur trouvé avec cet email.", 
                "لا يوجد مستخدم بهذا البريد الإلكتروني."
            ];
        }
        
        $stmt->close();
    } else {
        // Database error
        $_SESSION['errors'] = [
            "Erreur de traitement de la demande. Veuillez réessayer plus tard.",
            "حدث خطأ أثناء معالجة الطلب. يرجى المحاولة لاحقاً."
        ];
    }
} else {
    // If email or password is not set
    $_SESSION['errors'] = [
        "Veuillez remplir les deux champs.", 
        "يرجى ملء الحقول كلاهما."
    ];
}

// Redirect back to login page if there are errors
header("Location: ../login.php");
exit();
?>
