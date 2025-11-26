<?php
// views/users/about.php
// Aquí puedes usar variables como $contadorCarrito, $userName, etc.
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tienda V - Sobre nosotros</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
</head>

<body>
    <!-- Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">tiendav@company.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/templatemo" target="_blank"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.php?controller=home&action=index">
                Tienda V
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=home&action=index">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?controller=home&action=about">Sobre nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=producto&action=shop">Tienda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=contact&action=index">Contacto</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <a class="nav-icon position-relative text-decoration-none" href="index.php?controller=carrito&action=index">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">
                            <?php echo isset($contadorCarrito) ? $contadorCarrito : 0; ?>
                        </span>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">
                            <?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'Invitado'; ?>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Banner / Sobre nosotros -->
    <section class="bg-success py-5">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col-md-8 text-white">
                    <h1>Sobre nosotros</h1>
                    <p>
                        En Tienda V, nos especializamos en ofrecer ropa moderna y de calidad para todos los estilos. Nuestro objetivo es que encuentres prendas que te hagan sentir cómodo, seguro y a la moda.
                        Cada colección está cuidadosamente seleccionada para combinar tendencia, comodidad y durabilidad, asegurando que siempre tengas lo mejor en tu armario.
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="assets/img/about-hero.svg" alt="About Hero">
                </div>
            </div>
        </div>
    </section>

    <!-- Servicios -->
    <section class="container py-5">
        <div class="row text-center pt-5 pb-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Nuestros servicios</h1>
                <p>
                   En nuestra tienda encontrarás productos de moda cuidadosamente seleccionados, con atención personalizada y servicios diseñados para que tu experiencia de compra sea fácil, rápida y satisfactoria.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-truck fa-lg"></i></div>
                    <h2 class="h5 mt-4 text-center">Servicios de delivery</h2>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fas fa-exchange-alt"></i></div>
                    <h2 class="h5 mt-4 text-center">Envío y Devoluciones</h2>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-percent"></i></div>
                    <h2 class="h5 mt-4 text-center">Promociones</h2>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-user"></i></div>
                    <h2 class="h5 mt-4 text-center">24 Horas de servicios</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Marcas -->
    <section class="bg-light py-5">
        <div class="container my-4">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Nuestras marcas</h1>
                    <p>
                        Trabajamos con marcas que representan estilo, calidad y autenticidad. Cada una ha sido elegida para ofrecerte lo mejor de la moda actual, adaptándose a tu personalidad y forma de vestir.
                    </p>
                </div>
                <!-- Aquí podrías agregar tu carousel de marcas -->

                <!-- Start Brands Section -->
                <section class="bg-light py-5">
                    <div class="container my-4">
                        <div class="row text-center py-3">
                            <div class="col-lg-6 m-auto">
                                <h1 class="h1">Nuestras marcas</h1>
                                <p>
                                    Trabajamos con marcas que representan estilo, calidad y autenticidad. Cada una ha sido elegida para ofrecerte lo mejor de la moda actual.
                                </p>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-6 col-md-3 p-3">
                                <img src="assets/img/brand_01.png" class="img-fluid" alt="Brand 1">
                            </div>
                            <div class="col-6 col-md-3 p-3">
                                <img src="assets/img/brand_02.png" class="img-fluid" alt="Brand 2">
                            </div>
                            <div class="col-6 col-md-3 p-3">
                                <img src="assets/img/brand_03.png" class="img-fluid" alt="Brand 3">
                            </div>
                            <div class="col-6 col-md-3 p-3">
                                <img src="assets/img/brand_04.png" class="img-fluid" alt="Brand 4">
                            </div>
                            <!-- Agrega más marcas aquí -->
                        </div>
                    </div>
                </section>
                <!-- End Brands Section -->

            </div>
        </div>
    </section>

    <!-- Seccion de colaboradores -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row text-center mb-4">
                <div class="col">
                    <h1 class="h1">Nuestros colaboradores</h1>
                    <p>Conoce al equipo que hace posible este proyecto.</p>
                </div>
            </div>
            <div class="row justify-content-center">

                <!-- Colaborador 1 -->
                <div class="col-6 col-sm-4 col-md-2 text-center mb-4">
                    <img src="assets/img/colaborador1.jpg" class="img-fluid rounded-circle mb-2" alt="Colaborador 1">
                    <h6 class="mb-0">Alejandro Santos</h6>
                    <small>8-996-1474</small>
                </div>

                <!-- Colaborador 2 -->
                <div class="col-6 col-sm-4 col-md-2 text-center mb-4">
                    <img src="assets/img/colaborador2.jpg" class="img-fluid rounded-circle mb-2" alt="Colaborador 2">
                    <h6 class="mb-0">Nicole Valdés </h6>
                    <small>8-987-2165</small>
                </div>

                <!-- Colaborador 3 -->
                <div class="col-6 col-sm-4 col-md-2 text-center mb-4">
                    <img src="assets/img/colaborador3.jpg" class="img-fluid rounded-circle mb-2" alt="Colaborador 3">
                    <h6 class="mb-0">Sebastian Mejía</h6>
                    <small>4-816-1428</small>
                </div>

                <!-- Colaborador 4 -->
                <div class="col-6 col-sm-4 col-md-2 text-center mb-4">
                    <img src="assets/img/colaborador4.jpg" class="img-fluid rounded-circle mb-2" alt="Colaborador 4">
                    <h6 class="mb-0">Ezequiel Ríos</h6>
                    <small>8-991-592</small>
                </div>

                <!-- Colaborador 5 -->
                <div class="col-6 col-sm-4 col-md-2 text-center mb-4">
                    <img src="assets/img/colaborador5.jpg" class="img-fluid rounded-circle mb-2" alt="Colaborador 5">
                    <h6 class="mb-0">José Montenegro</h6>
                    <small>8-1000-318</small>
                </div>

            </div>
        </div>
    </section>
    <!-- End Seccion de colaboradores -->

    <!-- Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">Tienda V</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><i class="fas fa-map-marker-alt fa-fw"></i> Panamá, Panamá</li>
                        <li><i class="fa fa-phone fa-fw"></i> <a class="text-decoration-none" href="tel:010-020-0340">010-021-020-0340</a></li>
                        <li><i class="fa fa-envelope fa-fw"></i> <a class="text-decoration-none" href="mailto:tiendav@company.com">tiendav@company.com</a></li>
                    </ul>
                </div>
                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Productos</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="index.php?controller=tienda&action=index">Ropa hombre</a></li>
                        <li><a class="text-decoration-none" href="index.php?controller=tienda&action=index">Ropa mujer</a></li>
                    </ul>
                </div>
                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Información</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="index.php?controller=home&action=index">Inicio</a></li>
                        <li><a class="text-decoration-none" href="index.php?controller=home&action=about">Sobre nosotros</a></li>
                        <li><a class="text-decoration-none" href="#">FAQs</a></li>
                        <li><a class="text-decoration-none" href="#">Contacto</a></li>
                    </ul>
                </div>
            </div>
            <div class="w-100 bg-black py-3">
                <div class="container">
                    <p class="text-left text-light">Copyright &copy; 2025 Grupo #2 | Designed by <a rel="sponsored" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
