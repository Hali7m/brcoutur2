<?php
// Include database connection and header
include('layout/header.php');
// Get product ID from URL (e.g., product-detail.php?id=1)
$product_id = isset($_GET['id']) ? $_GET['id'] : 0;

// Fetch product details from the database
$query = "SELECT p.*, c.nom_categorie FROM Produit p
          JOIN Categorie c ON p.id_categorie = c.id_categorie
          WHERE p.id_produit = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();
?>

<div class="container my-5">
    <!-- Page Header -->
    <div class="text-center mb-5">
        <h1 class="fw-bold">Détails du Produit / تفاصيل المنتج</h1>
    </div>

    <!-- Product Details Section -->
    <div class="row align-items-center">
        <!-- Product Image -->
        <div class="col-12 col-md-6 text-center">
            <img src="Public/image/<?php echo $product['img_produit']; ?>" alt="Product Image" class="img-fluid rounded" style="max-height: 400px;">
        </div>

        <!-- Product Information -->
        <div class="col-12 col-md-6">
            <h2 class="fw-bold"><?php echo $product['nom_produit']; ?> / <?php echo $product['nom_produit']; ?></h2>
            <p class="lead text-muted">Catégorie : <?php echo $product['nom_categorie']; ?> / فئة: <?php echo $product['nom_categorie']; ?></p>
            <p class="text-success fw-bold">Prix : دج <?php echo number_format($product['prix_produit']); ?></p>
            <p>
                <strong>Description :</strong> <?php echo $product['description']; ?>
            </p>
            <ul>
                <li>Nombre de points : <?php echo $product['nombre_points']; ?> / عدد الغرز: <?php echo $product['nombre_points']; ?></li>
                <li>Type : <?php echo $product['type_produit']; ?> / النوع: <?php echo $product['type_produit']; ?></li>
                <li>Garantie : <?php echo $product['garantie']; ?> / الضمان: <?php echo $product['garantie']; ?></li>
            </ul>
            <a href="commander.php" class="btn btn-dark btn-lg">Acheter Maintenant / شراء الآن</a>
        </div>
    </div>

    <!-- Additional Information -->
    <div class="row my-5">
        <div class="col-12">
            <h3 class="fw-bold">Caractéristiques / الخصائص</h3>
            <p>
                La machine est livrée avec plusieurs accessoires pour améliorer votre expérience de couture, notamment des aiguilles, des pieds presseurs, et un manuel d'utilisation détaillé.
                <br>
                يتم توفير الماكينة مع العديد من الملحقات لتحسين تجربة الخياطة الخاصة بك، بما في ذلك الإبر وأقدام الضاغط ودليل مستخدم مفصل.
            </p>
        </div>
    </div>

    <!-- Related Products Section -->
    <div class="row my-5">
        <div class="col-12">
            <h3 class="fw-bold text-center">Produits Connexes / منتجات ذات صلة</h3>
        </div>
        <!-- Related Product 1 -->
        <div class="col-12 col-md-4 text-center">
            <div class="card h-100">
                <img src="Public/image/<?php echo $product['img_produit']; ?>" class="card-img-top" alt="Related Product">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $product['nom_produit']; ?> / <?php echo $product['nom_produit']; ?></h5>
                    <p class="text-success fw-bold">Prix : <?php echo number_format($product['prix_produit'], 2); ?> دج</p>
                    <a href="product-detail.php?id=<?php echo $product['id_produit']; ?>" class="btn btn-dark btn-sm">Voir Plus / عرض المزيد</a>
                </div>
            </div>
        </div>
        <!-- Add more related products here -->
    </div>
</div>

<?php include('layout/footer.php'); ?>
