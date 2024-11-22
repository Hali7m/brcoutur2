<?php include('layout/header.php'); ?>

<div class="container my-5">
    <div class="text-center">
        <h1 class="display-4 fw-bold">Mon Panier / سلة التسوق</h1>
        <p class="lead">Vérifiez les articles ajoutés à votre panier et passez à la caisse. / تحقق من العناصر المضافة إلى سلتك وابدأ في الدفع.</p>
    </div>

    <!-- Cart Items Section -->
    <div class="row">
        <!-- Example cart item. Repeat this block for each product in the cart -->
        <div class="col-12 col-md-6 col-lg-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <img src="Public/image/product1.jpg" alt="Product Image" class="img-fluid" style="max-width: 120px; height: auto;">
                        <div class="ms-3 flex-grow-1">
                            <h5 class="card-title">Nom du Produit / اسم المنتج</h5>
                            <p class="card-text">20 DA</p>
                        </div>
                        <div class="d-flex flex-column align-items-center">
                            <input type="number" class="form-control mb-2" value="1" min="1" max="10" style="width: 60px;">
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Repeat for other products -->
        <div class="col-12 col-md-6 col-lg-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <img src="Public/image/product1.jpg" alt="Product Image" class="img-fluid" style="max-width: 120px; height: auto;">
                        <div class="ms-3 flex-grow-1">
                            <h5 class="card-title">Produit Exemple 2 / المنتج مثال 2</h5>
                            <p class="card-text">15 DA</p>
                        </div>
                        <div class="d-flex flex-column align-items-center">
                            <input type="number" class="form-control mb-2" value="1" min="1" max="10" style="width: 60px;">
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cart Summary -->
    <div class="d-flex justify-content-between my-4">
        <h4>Total / الإجمالي :</h4>
        <h4>35 DA</h4> <!-- Total price, can be calculated dynamically -->
    </div>

    <!-- Checkout Button -->
    <div class="text-center">
        <a href="checkout.php" class="btn btn-dark btn-lg">Passer à la Caisse / اذهب إلى الدفع</a>
    </div>
</div>

<?php include('layout/footer.php'); ?>
