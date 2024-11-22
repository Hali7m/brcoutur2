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
    <!-- Login Hero Section -->
    <div class="text-center my-5">
        <h1 class="display-4 fw-bold text-dark">Se Connecter / تسجيل الدخول</h1>
    </div>
    <?php if (isset($_SESSION['errors'])): ?>
        <div class="alert alert-danger text-center mb-3">
            <?php foreach ($_SESSION['errors'] as $error): ?>
                <?php echo htmlspecialchars($error); ?>
            <?php endforeach; ?>
        </div>
        <?php unset($_SESSION['errors']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success text-center">
            <?php echo htmlspecialchars($_SESSION['success']); ?>
            <?php unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>


    <!-- Login Form -->
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <form action="Includes/login.inc.php" method="POST">
                <!-- Email Field -->
                <div class="mb-3">
                    <label for="email" class="form-label"><i class="fas fa-envelope"></i> Email / البريد الإلكتروني</label>
                    <input type="email" class="form-control" id="email" name="email"  required>
                </div>

                <!-- Password Field -->
                <div class="mb-3 position-relative">
                    <label for="password" class="form-label"><i class="fas fa-lock"></i> Mot de Passe / كلمة السر</label>
                        <div class="input-group">
                        <input type="password" class="form-control pr-5" id="password" name="password" required>
                        <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                <!-- Forgot Password Link -->
                <div class="mb-3 text-end">
                    <a href="forgot-password.php" class="text-secondary text-decoration-none">Mot de passe oublié? / هل نسيت كلمة السر؟</a>
                </div>

                <!-- Login Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg"><i class="fas fa-sign-in-alt"></i> Se Connecter / تسجيل الدخول</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Sign Up Section -->
    <div class="text-center my-4">
        <p>Vous n'avez pas de compte ? <a href="signup.php" class="text-secondary">Créer un compte</a> / ليس لديك حساب؟ <a href="signup.php" class="text-secondary">إنشاء حساب</a></p>
    </div>
</div>

<?php include('layout/footer.php'); ?>

<!-- Add Font Awesome for the Eye icon -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<script>
    // Toggle password visibility for password field
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");

    togglePassword.addEventListener("click", function() {
        // Toggle the password visibility
        const type = password.type === "password" ? "text" : "password";
        password.type = type;

        // Toggle the eye icon between open and closed
        this.querySelector("i").classList.toggle("fa-eye");
        this.querySelector("i").classList.toggle("fa-eye-slash");
    });
</script>
