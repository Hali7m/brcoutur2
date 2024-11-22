<?php
// Process the order if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $nom_client = $_POST['nom_client'];
    $email_client = $_POST['email_client'];
    $adresse_client = $_POST['adresse_client'];
    $produit_id = $_POST['produit_id'];
    $quantite = $_POST['quantite'];

    // Insert order into the Commande table
    $query = "INSERT INTO Commande (nom_client, email_client, adresse_client, produit_id, quantite) 
              VALUES ('$nom_client', '$email_client', '$adresse_client', '$produit_id', '$quantite')";
    
    if (mysqli_query($conn, $query)) {
        // Order placed successfully
        echo "<div class='alert alert-success'>Votre commande a été placée avec succès!</div>";
    } else {
        // Error while placing order
        echo "<div class='alert alert-danger'>Erreur lors de la commande. Veuillez réessayer.</div>";
    }
}
?>

<?php include('layout/header.php'); ?>

<div class="container my-5">
    <!-- Page Header -->
    <div class="text-center mb-5">
        <h1 class="fw-bold">Commander / طلب</h1>
        <p>Veuillez remplir le formulaire pour passer votre commande.</p>
    </div>

    <!-- Order Form -->
    <form method="POST" action="commander.php">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nom_client" class="form-label">Nom / الاسم</label>
                    <input type="text" class="form-control" id="nom_client" name="nom_client" required>
                </div>
                <div class="mb-3">
                    <label for="email_client" class="form-label">Email / البريد الإلكتروني</label>
                    <input type="email" class="form-control" id="email_client" name="email_client" required>
                </div>
                <div class="mb-3">
                    <label for="adresse_client" class="form-label">Adresse / العنوان</label>
                    <input type="text" class="form-control" id="adresse_client" name="adresse_client" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="produit_id" class="form-label">Choisir un produit / اختر منتجًا</label>
                    <select class="form-select" id="produit_id" name="produit_id" required>
                        <option value="">Sélectionner un produit / اختر منتجًا</option>
                        <?php
                        // Fetch products from the database
                        $result = mysqli_query($conn, "SELECT * FROM Produit");
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['id_produit'] . "'>" . $row['nom_produit'] . " - " . $row['prix_produit'] . " DA</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="quantite" class="form-label">Quantité / الكمية</label>
                    <input type="number" class="form-control" id="quantite" name="quantite" min="1" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-dark">Passer la commande / تقديم الطلب</button>
    </form>
</div>

<?php include('layout/footer.php'); ?>
