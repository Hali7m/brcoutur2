<?php
session_start();

// Redirect logged-in users to the profile page
if (isset($_SESSION['user_id'])) {
    header("Location: profil.php");
    exit();
}
?>
<?php include('layout/header.php'); ?>
<div class="container my-5">
    <!-- Sign Up Hero Section -->
    <div class="text-center my-5">
        <h1 class="display-4 fw-bold">Créer un Compte / إنشاء حساب</h1>
        <p class="lead">Rejoignez-nous pour profiter des meilleurs produits et services ! <br />
        انضم إلينا للاستمتاع بأفضل المنتجات والخدمات!</p>
    </div>

    <!-- Notification for errors or success -->
    <?php if (isset($_SESSION['errors'])): ?>
        <div class="alert alert-danger text-center mb-3">
            <ul class="text-decoration-none">
                <?php foreach ($_SESSION['errors'] as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php unset($_SESSION['errors']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success text-center">
            <?php echo htmlspecialchars($_SESSION['success']); ?>
            <?php unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>

    <!-- Sign Up Form -->
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <form action="Includes/signup.inc.php" method="POST" id="signupForm">
                <!-- Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nom Complet / الاسم الكامل</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $_SESSION['old']['name'] ?? ''; ?>" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email / البريد الإلكتروني</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['old']['email'] ?? ''; ?>" required>
                </div>
                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de Passe / كلمة السر</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" required >
                        <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <small id="passwordHelp" class="form-text text-muted">
                        Le mot de passe doit contenir au moins 8 caractères, une majuscule et un chiffre.
                    </small>
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirmer le Mot de Passe / تأكيد كلمة السر</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        <span class="input-group-text" id="toggleConfirmPassword" style="cursor: pointer;">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>
                <!-- Terms and Conditions -->
                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="agree_terms" name="agree_terms" <?php echo isset($_SESSION['old']['agree_terms']) && $_SESSION['old']['agree_terms'] ? 'checked' : ''; ?> required>
                        <label class="form-check-label" for="agree_terms">J'accepte les <a href="terms.php " class="form-check-label text-secondary">termes et conditions</a> / أوافق على <a class="form-check-label text-secondary" href="terms.php">الشروط والأحكام</a></label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg">S'inscrire / التسجيل</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Already have an account section -->
    <div class="text-center my-4">
        <p>Vous avez déjà un compte ? <a class="form-check-label text-secondary" href="login.php">Se connecter</a> / هل لديك حساب؟ <a class="form-check-label text-secondary" href="login.php">تسجيل الدخول</a></p>
    </div>
</div>

<?php include('layout/footer.php'); ?>

<script>
    // Toggle password visibility for password field
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");

    // Initialize the icon state
    const togglePasswordIcon = togglePassword.querySelector("i");

    togglePassword.addEventListener("click", function() {
        // Toggle the password visibility
        const type = password.type === "password" ? "text" : "password";
        password.type = type;

        // Toggle the eye icon between open and closed
        togglePasswordIcon.classList.toggle("fa-eye");
        togglePasswordIcon.classList.toggle("fa-eye-slash");
    });

    // Toggle password visibility for confirm password field
    const toggleConfirmPassword = document.querySelector("#toggleConfirmPassword");
    const confirmPassword = document.querySelector("#confirm_password");

    // Initialize the icon state
    const toggleConfirmPasswordIcon = toggleConfirmPassword.querySelector("i");

    toggleConfirmPassword.addEventListener("click", function() {
        // Toggle the password visibility
        const type = confirmPassword.type === "password" ? "text" : "password";
        confirmPassword.type = type;

        // Toggle the eye icon between open and closed
        toggleConfirmPasswordIcon.classList.toggle("fa-eye");
        toggleConfirmPasswordIcon.classList.toggle("fa-eye-slash");
    });
</script>
