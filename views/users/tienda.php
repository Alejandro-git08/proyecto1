<!-- views/users/tienda.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Tienda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

    <style>
        .filtro-genero span { cursor: pointer; margin-right: 15px; font-weight: bold; }
        .filtro-genero .activo { color: #c2185b; text-decoration: underline; }
        .categoria-item { cursor: pointer; display: block; margin-bottom: 5px; }
        .categoria-item.activa { font-weight: bold; color: #c2185b; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php?controller=home&action=index">Tienda V</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php?controller=home&action=index">Inicio</a></li>
                <li class="nav-item"><a class="nav-link active" href="index.php?controller=tienda&action=index">Tienda</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?controller=cliente&action=verCarrito">Carrito</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?controller=login&action=logout">Cerrar sesión</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container py-5">
    <h2 class="mb-4 text-center">Tienda</h2>

    <!-- Filtro de género arriba de los productos -->
    <div class="filtro-genero mb-4 text-center">
        <?php 
            $generos = ['todos' => 'Todos', 'hombre' => 'Hombres', 'mujer' => 'Mujeres'];
            foreach($generos as $key => $label): 
                $clase = ($key == ($genero ?? 'todos')) ? 'activo' : '';
        ?>
            <span class="<?= $clase ?>" onclick="aplicarFiltroGenero('<?= $key ?>')"><?= $label ?></span>
        <?php endforeach; ?>
    </div>

    <div class="row">
        <!-- Sidebar filtros -->
        <div class="col-md-3">
            <div class="sidebar">
                <h6>Departamento</h6>
                <?php foreach($generos as $key => $label): 
                    $clase = ($key == ($genero ?? 'todos')) ? 'activo' : '';
                ?>
                    <span class="<?= $clase ?>" onclick="aplicarFiltroGenero('<?= $key ?>')"><?= $label ?></span><br>
                <?php endforeach; ?>

                <h6>Categorías</h6>
                <?php
                    $categoriasMostrar = [];
                    if(($genero ?? 'todos') == 'hombre') $categoriasMostrar = $categoriasHombre;
                    elseif(($genero ?? 'todos') == 'mujer') $categoriasMostrar = $categoriasMujer;
                    elseif(($genero ?? 'todos') == 'todos') $categoriasMostrar = array_merge($categoriasHombre, $categoriasMujer);

                    foreach($categoriasMostrar as $cat):
                        $clase = ($cat['id_categoria'] == ($categoria ?? '')) ? 'activa' : '';
                ?>
                    <span class="categoria-item <?= $clase ?>" onclick="aplicarFiltroCategoria('<?= $cat['id_categoria'] ?>')"><?= $cat['nombre_categoria'] ?></span>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Productos -->
        <div class="col-md-9">
            <div class="row">
                <?php foreach($productos as $prod): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm border-0 rounded-3">
                            <div class="position-relative">
                                <img src="<?php echo $prod['imagen']; ?>" class="card-img-top rounded-top" alt="<?php echo $prod['nombre_producto']; ?>">
                                <div class="position-absolute top-0 end-0 p-2">
                                    <span class="badge bg-<?php echo $prod['stock'] > 0 ? 'success' : 'secondary'; ?>">
                                        <?php echo $prod['stock'] > 0 ? 'Disponible' : 'Agotado'; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?php echo $prod['nombre_producto']; ?></h5>
                                <p class="card-text text-muted small"><?php echo $prod['descripcion_producto']; ?></p>
                                <p class="text-success fw-bold mb-3">$<?php echo number_format($prod['precio'],2); ?></p>
                                <p class="text-muted">Stock: <?php echo $prod['stock']; ?></p>
                                <form action="index.php?controller=tienda&action=agregarAlCarrito" method="POST" class="mt-auto">
                                    <input type="hidden" name="id_producto" value="<?php echo $prod['id_producto']; ?>">
                                    <div class="input-group mb-2">
                                        <input type="number" name="cantidad" value="1" min="1" class="form-control">
                                        <button type="submit" class="btn btn-success">Agregar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function aplicarFiltroGenero(genero){
        const categoria = ''; // resetear categoría al cambiar género
        window.location.href = `index.php?controller=tienda&action=index&genero=${genero}&categoria=${categoria}`;
    }

    function aplicarFiltroCategoria(idCategoria){
        const genero = '<?= $genero ?? 'todos' ?>';
        window.location.href = `index.php?controller=tienda&action=index&genero=${genero}&categoria=${idCategoria}`;
    }
</script>
</body>
</html>
