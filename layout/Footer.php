<hr class="my-5" style="width: 80%; margin: auto;">
<div class="container my-5">
    <div class="row text-center justify-content-center">
        <!-- Delivery Info -->
        <div class="col-12 col-md-4 d-flex align-items-center flex-column mb-4 mb-md-0 text-center">
            <i class="fas fa-truck fa-2x mb-2 text-dark"></i>
            <div>
                <h5 class="fw-bold mb-0">Livraison 58 wilayas</h5>
                <p class="text-muted mb-0">التوصيل إلى 58 ولاية</p>
            </div>
        </div>

        <!-- Support Info -->
        <div class="col-12 col-md-4 d-flex align-items-center flex-column mb-4 mb-md-0 text-center">
            <i class="fas fa-comments fa-2x mb-2 text-dark"></i>
            <div>
                <h5 class="fw-bold mb-0">Support</h5>
                <p class="text-muted mb-0">خدمة العملاء 24/7</p>
            </div>
        </div>

        <!-- Payment Info -->
        <div class="col-12 col-md-4 d-flex align-items-center flex-column text-center">
            <i class="fas fa-hand-holding-usd fa-2x mb-2 text-dark"></i>
            <div>
                <h5 class="fw-bold mb-0">Payment à la livraison</h5>
                <p class="text-muted mb-0">الدفع عند التسليم</p>
            </div>
        </div>
    </div>
</div>
<hr class="my-5" style="width: 80%; margin: auto;">

<!-- Footer -->
<footer class="text-center text-lg-start text-dark mt-3" style="background-color: #ffffff">
    <!-- Section: Social media -->
<!-- Social Media Links -->
<div class="text-center my-4 social-icons">
        <a href="#" class="facebook me-3"><i class="fab fa-facebook fa-beat fa-2x"></i></a>
        <a href="#" class="instagram me-3"><i class="fab fa-instagram fa-beat fa-2x"></i></a>
        <a href="#" class="whatsapp me-3"><i class="fab fa-whatsapp fa-beat fa-2x"></i></a>
        <a href="#" class="viber me-3"><i class="fab fa-viber fa-beat fa-2x"></i></a>
        <a href="#" class="facebook me-3"><i class="fab fa-telegram fa-beat fa-2x"></i></a>
    </div>

    </section>

    <!-- Section: Links -->
    <section>
        <div class="container text-center text-md-start mt-5">
            <div class="row mt-3">
                <!-- Column 1 -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <img src="Public/image/sans titre.png" alt="Bouira Couture Logo" draggable="false" style="height: 100px; transition: transform 0.3s;">
                </div>
                <!-- Column 2 -->
                <!-- Column 3 -->
                <!-- Quick Links Section -->
            <div class="col-12 col-md-4 mb-4">
                <h5 class="fw-bold">Liens rapides</h5>
                <ul class="list-unstyled">
                    <li><a href="index.php" class="text-dark text-decoration-none">Accueil</a></li>
                    <li><a href="boutique.php" class="text-dark text-decoration-none">Boutique / المتجر</a></li>
                    <li><a href="contact.php" class="text-dark text-decoration-none">Contactez-nous / اتصل بنا</a></li>
                </ul>
            </div>
               <!-- Contact Section -->
            <div class="col-12 col-md-4 mb-4">
                <h5 class="fw-bold">Contactez-nous</h5>
                <p><i class="fas fa-map-marker-alt fa-bounce"></i> Bouira, Algérie</p>
                <p><i class="fas fa-phone fa-shake"></i> +213 779 361 100</p>
                <p><i class="fas fa-envelope fa-flip"></i> contact@bouiracouture.com</p>
            </div>
            </div>
        </div>
    </section>

    <!-- Copyright -->
    <div class="text-center text-white p-3" style="background-color: #000000;">
        © 2024 Copyright:
        <a class="text-white" href="https://www.bouiracouture.dz">BouiraCouture.dz</a>
    </div>
</footer>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://kit.fontawesome.com/2afbb65f79.js" crossorigin="anonymous"></script>
</body>
</html>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get the current URL
        const currentPage = window.location.pathname.split("/").pop();

        // Get all nav links
        const navLinks = document.querySelectorAll(".nav-link");

        // Loop through each nav link
        navLinks.forEach(link => {
            // Get the href attribute of the link
            const page = link.getAttribute("href");

            // Check if it matches the current page
            if (currentPage === page) {
                // Add 'active' class to the parent <li>
                link.parentElement.classList.add("active");
            } else {
                // Remove 'active' class from non-active links
                link.parentElement.classList.remove("active");
            }
        });
    });
</script>
