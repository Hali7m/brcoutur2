<?php include('layout/header.php'); ?>

<div class="container my-5">
    <!-- Hero Section -->
    <div class="row align-items-center mb-5">
        <div class="col-12 col-md-6">
            <h1 class="display-4 fw-bold">Bienvenue chez BouiraCouture</h1>
            <p class="lead">
                Votre destination unique pour l'achat et la réparation de machines à coudre et accessoires. <br />
                وجهتك المثالية لشراء وإصلاح آلات الخياطة والإكسسوارات.
            </p>
            <a href="produit.php" class="btn btn-dark btn-lg me-3"><span class="fa fa-shopping-bag"></span> Nos Produits</a>
            <a href="contact.php" class="btn btn-success btn-lg"><span class="fa fa-envelope"></span> Contactez-nous</a>
        </div>
        <div class="col-12 col-md-6 text-center">
            <img src="public/image/sans titre.png" class="img-fluid rounded" alt="BouiraCouture Hero Image">
        </div>
    </div>
    <div class="text-center my-4 social-icons">
        <a href="#" class="facebook me-3"><i class="fab fa-facebook fa-2x"></i></a>
        <a href="#" class="instagram me-3"><i class="fab fa-instagram fa-2x"></i></a>
        <a href="#" class="whatsapp me-3"><i class="fab fa-whatsapp fa-2x"></i></a>
        <a href="#" class="viber me-3"><i class="fab fa-viber fa-2x"></i></a>
        <a href="#" class="facebook me-3"><i class="fab fa-telegram fa-2x"></i></a>
    </div>

    <!-- Featured Services Section -->
    <div class="text-center my-5">
        <h2 class="fw-bold">Nos Services / خدماتنا</h2>
        <p class="lead">Découvrez ce que nous offrons pour vos projets de couture.</p>
    </div>
    <div class="row text-center">
    <div class="col-12 col-md-4 mb-4">
        <i class="fas fa-tools fa-4x mb-3 icon-repair"></i> <!-- Custom red -->
        <h4 class="fw-bold">Réparation / الصيانة</h4>
        <p>Réparation rapide et efficace de vos machines à coudre.</p>
        <p>صيانة سريعة وفعالة لآلات الخياطة الخاصة بك.</p>
    </div>
    <div class="col-12 col-md-4 mb-4">
        <i class="fas fa-shopping-bag fa-4x mb-3 icon-sale"></i> <!-- Custom green -->
        <h4 class="fw-bold">Vente / البيع</h4>
        <p>Découvrez notre large gamme de machines et accessoires.</p>
        <p>اكتشف مجموعتنا الواسعة من الآلات والإكسسوارات.</p>
    </div>
    <div class="col-12 col-md-4 mb-4">
        <i class="fas fa-headset fa-4x mb-3 icon-support"></i> <!-- Custom blue -->
        <h4 class="fw-bold">Support Client / دعم العملاء</h4>
        <p>Assistance complète pour vos questions et besoins.</p>
        <p>دعم كامل لأسئلتك واحتياجاتك.</p>
    </div>
</div>



    <!-- Featured Products Section -->
    <div class="my-5">
        <div class="text-center">
            <h2 class="fw-bold">Produits Vedettes / المنتجات المميزة</h2>
            <p class="lead">Explorez nos meilleures machines et accessoires.</p>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 mb-4">
                <div class="card">
                    <img src="public/image/product1.jpg" class="card-img-top" alt="Product 1">
                    <div class="card-body text-center">
                        <h5 class="card-title">Machine à Coudre Standard</h5>
                        <p class="text-success">Prix : 20,000 DA</p>
                        <a href="product-detail.php?id=1" class="btn btn-dark">Détails / التفاصيل</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="card">
                    <img src="public/image/product1.jpg" class="card-img-top" alt="Product 2">
                    <div class="card-body text-center">
                        <h5 class="card-title">Kit d'Accessoires</h5>
                        <p class="text-success">Prix : 5,000 DA</p>
                        <a href="product-detail.php?id=2" class="btn btn-dark">Détails / التفاصيل</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="card">
                    <img src="public/image/product1.jpg" class="card-img-top" alt="Product 3">
                    <div class="card-body text-center">
                        <h5 class="card-title">Machine Pro</h5>
                        <p class="text-success">Prix : 35,000 DA</p>
                        <a href="product-detail.php?id=3" class="btn btn-dark">Détails / التفاصيل</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Nos Marques Section -->
    <div class="my-5">
        <div class="text-center">
            <h2 class="fw-bold">Nos Marques / ماركاتنا</h2>
            <p class="lead">Découvrez les marques que nous représentons avec fierté.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-4 mb-4">
                <div class="brand-card text-center">
                    <img src="public/image/singer.jpg" class="img-fluid" alt="Singer" style="height: 100px; object-fit: contain;">
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="brand-card text-center">
                    <img src="public/image/comel.jpg" class="img-fluid" alt="Comel" style="height: 100px; object-fit: contain;">
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="brand-card text-center">
                    <img src="public/image/sunsir.jpg" class="img-fluid" alt="Sunsir" style="height: 100px; object-fit: contain;">
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="brand-card text-center">
                    <img src="public/image/jack.jpg" class="img-fluid" alt="Jack" style="height: 100px; object-fit: contain;">
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="brand-card text-center">
                    <img src="public/image/zoje.jpg" class="img-fluid" alt="zoje" style="height: 100px; object-fit: contain;">
                </div>
            </div>
        </div>
    </div>


    <!-- Location Section -->
    <div class="my-5">
        <div class="row align-items-center">
            <div class="col-12 col-md-6">
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe 
                            id="gmap_canvas" 
                            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d803.1161025801179!2d3.897219100690237!3d36.373749999999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzbCsDIyJzI1LjUiTiAzwrA1Myc1My4xIkU!5e0!3m2!1sen!2sdz!4v1731525482799!5m2!1sen!2sdz" 
                            frameborder="0" 
                            scrolling="no" 
                            style="width: 100%; height: 300px; border: none; border-radius: 15px;"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <h2 class="fw-bold text-center">Nous Localiser</h2>
                <p class="lead text-center">Trouvez-nous facilement grâce à notre carte interactive.</p>
                <h2 class="fw-bold text-center">موقعنا</h2>
                <p class="lead text-center">تجدنا بسهولة من خلال خريطتنا التفاعلية.</p>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="text-center my-5">
        <h3 class="fw-bold">Besoin d'aide ou de conseils ? / هل تحتاج إلى مساعدة أو نصائح؟</h3>
        <p class="lead">Contactez notre équipe dès aujourd'hui ! / تواصل مع فريقنا اليوم!</p>
        <a href="contact.php" class=" fa-beat btn btn-lg btn-dark">Contactez-nous / اتصل بنا <span class="fa fa-phone fa-rotate-270"></span></a>
    </div>
</div>

<?php include('layout/footer.php'); ?>
