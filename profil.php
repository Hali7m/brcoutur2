<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if the user is not logged in
    exit();
}
?>
<?php
// Include necessary files
include('layout/header.php');
include('Includes/dbh.inc.php'); // Include your database connection file

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

// Fetch user data from the database
$user_id = $_SESSION['user_id'];
$sql = "SELECT name, email, wilaya FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    // If the user is not found in the database
    echo "User not found!";
    exit();
}
?>
<?php if (isset($_SESSION['errors_profil'])): ?>
    <div class="alert alert-danger text-center mb-3">
        <ul>
            <?php foreach ($_SESSION['errors_profil'] as $error): ?>
                <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php unset($_SESSION['errors_profil']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['success_profil'])): ?>
    <div class="alert alert-success text-center">
        <?php echo htmlspecialchars($_SESSION['success_profil']); ?>
        <?php unset($_SESSION['success_profil']); ?>
    </div>
<?php endif; ?>

<div class="container my-5">
    <div class="text-center">
        <!-- Welcome message -->
        <h1 class="display-4 fw-bold text-dark">Bienvenue, <?php echo htmlspecialchars($user['name']); ?>! / أهلاً!</h1>
        <p class="lead text-dark">
            Voici vos informations personnelles : / هذه معلوماتك الشخصية:
        </p>
    </div>

    <!-- Profile Section -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-light text-dark text-center">
                    <h3 class="mb-0">Votre Profil / ملفك الشخصي</h3>
                </div>
                <div class="card-body">
                    <!-- Display Profile Information -->
                    <div class="mb-4">
                        <h5 class="text-dark">Nom Complet / الاسم الكامل</h5>
                        <p class="fs-5 text-muted"><?php echo htmlspecialchars($user['name']); ?></p>
                    </div>

                    <div class="mb-4">
                        <h5 class="text-dark">Email / البريد الإلكتروني</h5>
                        <p class="fs-5 text-muted"><?php echo htmlspecialchars($user['email']); ?></p>
                    </div>

                    <div class="mb-4">
                        <h5 class="text-dark">Wilaya / الولاية</h5>
                        <p class="fs-5 text-muted"><?php echo htmlspecialchars($user['wilaya'] ?? 'Non spécifié / غير محدد'); ?></p>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-success btn-lg me-3" data-bs-toggle="modal" data-bs-target="#updateProfileModal">
                        Modifier le Profil
                    </button>
                    <a href="index.php" class="btn btn-dark btn-lg">Retour à l'Accueil </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Section -->
    <div class="text-center my-4">
        <form method="POST"  action="Includes/logout.inc.php">
            <button type="submit" name="logout" class="btn btn-danger btn-lg">Déconnexion</button>
        </form>
    </div>
</div>

<!-- Update Profile Modal -->
<div class="modal fade" id="updateProfileModal" tabindex="-1" aria-labelledby="updateProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="updateProfileModalLabel">Modifier le Profil / تعديل الملف الشخصي</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="Includes/process-profile.php" method="POST">
                <div class="modal-body">
                    <!-- Form Fields for Update -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom Complet / الاسم الكامل</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email / البريد الإلكتروني</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="wilaya" class="form-label">Wilaya / الولاية</label>
                        <select class="form-control" id="wilaya" name="wilaya">
                            <option value="">Sélectionnez votre wilaya / اختر ولايتك</option>
                            <?php
                            $wilayas = ["Adrar", "Chlef", "Laghouat", "Oum El Bouaghi", "Batna", "Béjaïa", "Biskra", "Béchar", "Blida", 
                                        "Bouira", "Tamanrasset", "Tébessa", "Tlemcen", "Tiaret", "Tizi Ouzou", "Alger", "Djelfa", 
                                        "Jijel", "Sétif", "Saïda", "Skikda", "Sidi Bel Abbès", "Annaba", "Guelma", "Constantine", 
                                        "Médéa", "Mostaganem", "M’Sila", "Mascara", "Ouargla", "Oran", "El Bayadh", "Illizi", 
                                        "Bordj Bou Arréridj", "Boumerdès", "El Tarf", "Tindouf", "Tissemsilt", "Naama", "Ghardaïa", 
                                        "Relizane", "El Oued", "Khenchela", "Souk Ahras", "Tipaza", "Mila", "Aïn Defla", 
                                        "Aïn Témouchent", "Ghardaïa"];
                            foreach ($wilayas as $wilaya) {
                                $selected = ($user['wilaya'] === $wilaya) ? "selected" : "";
                                echo "<option value='$wilaya' $selected>$wilaya</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Nouveau Mot de Passe / كلمة السر الجديدة</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Laisser vide pour ne pas modifier">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler / إلغاء</button>
                    <button type="submit" class="btn btn-primary">Enregistrer / حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('layout/footer.php'); ?>
