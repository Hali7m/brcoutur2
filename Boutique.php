<?php include('layout/Header.php'); ?>

<div class="container my-5">
    <!-- Page Title -->
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold">Nos Produits / منتجاتنا</h1>
        <p class="lead">
            Découvrez notre large gamme de machines à coudre et accessoires / 
            اكتشف مجموعة واسعة من آلات الخياطة والإكسسوارات
        </p>
        <hr class="my-4 mx-auto" style="width: 60%; border-top: 2px solid #000;" />
    </div>

    <div class="row">
        <!-- Sidebar Filters -->
        <aside class="col-lg-3 collapse d-lg-block" id="filtersCollapse">
            <div class="card shadow-sm p-4">
                <h5 class="fw-bold mb-3">Filtres / تصفية</h5>
                
                <!-- Price Filter -->
                <div class="mb-4">
                    <label for="priceRange" class="form-label">Filtrer par Prix:</label>
                    <input type="range" class="form-range" id="priceRange" min="0" max="50000" step="1000" />
                    <div class="d-flex justify-content-between">
                        <span>0 DA</span>
                        <span>50,000 DA</span>
                    </div>
                </div>

                <!-- Categories Filter -->
                <div class="mb-4">
                    <label for="categorySelect" class="form-label">Catégories de Produits:</label>
                    <select class="form-select" id="categorySelect">
                        <option value="">Toutes les catégories</option>
                        <?php
                        $categories = $conn->query("SELECT id_categorie, nom_categorie FROM Categorie");
                        while ($cat = $categories->fetch_assoc()):
                            echo "<option value='{$cat['id_categorie']}'>{$cat['nom_categorie']}</option>";
                        endwhile;
                        ?>
                    </select>
                </div>

                <!-- Stock Status Filter -->
                <div>
                    <label class="form-label">Stock Status:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="inStock">
                        <label class="form-check-label" for="inStock">En Stock</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="onSale">
                        <label class="form-check-label" for="onSale">En Vente</label>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Products Section -->
        <section class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    Afficher:
                    <a href="?display=9" class="btn btn-outline-secondary btn-sm">9</a>
                    <a href="?display=12" class="btn btn-outline-secondary btn-sm">12</a>
                    <a href="?display=18" class="btn btn-outline-secondary btn-sm">18</a>
                </div>
                <div>
                    Tri:
                    <select class="form-select form-select-sm w-auto d-inline-block">
                        <option value="recent">Plus Récent</option>
                        <option value="low-price">Prix Croissant</option>
                        <option value="high-price">Prix Décroissant</option>
                    </select>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                <?php
                $products = $conn->query("SELECT * FROM Produit LIMIT 12");
                while ($product = $products->fetch_assoc()):
                    $isOnSale = rand(0, 1); // Random badge demo
                    $price = number_format($product['prix_produit']);
                ?>
                <div class="col">
                    <div class="card shadow-sm h-100">
                        <div class="position-relative">
                            <img src="<?= htmlspecialchars($product['img_produit']) ?: 'Public/image/default-product.jpg' ?>" 
                                alt="<?= htmlspecialchars($product['nom_produit']) ?>" 
                                class="card-img-top" style="height: 200px; object-fit: cover;">
                        </div>
                        <div class="card-body">
                            <h6 class="text-truncate"><?= htmlspecialchars($product['nom_produit']) ?></h6>
                            <p class="text-success fw-bold"><?= $price ?> DA</p>
                            <a href="product-detail.php?id=<?= $product['id_produit'] ?>" class="btn btn-outline-dark btn-sm w-100">Voir Plus</a>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </section>
    </div>
</div>

<?php include('layout/footer.php'); ?>
